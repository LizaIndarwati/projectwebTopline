<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function password()
    {
        $id = $this->session->userdata('id');
        $password = $this->input->post('password');

        $data = array(
            'password' => password_hash($password, PASSWORD_DEFAULT)
        );

        $this->db->update("tbl_user", $data, array('id' => $this->session->id));

        return $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode("ok"));
    }

    public function profil()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['encrypt_name']         = TRUE;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('foto')) {
            $data = [
                "username" => $this->input->post('username'),
                "nama" => $this->input->post('nama'),
                "alamat" => $this->input->post('alamat'),
                "tanggal_lahir" => $this->input->post('tanggal_lahir')
            ];
        } else {
            $foto = $this->upload->data();
            $filename = $foto['file_name'];
            $data = [
                "username" => $this->input->post('username'),
                "nama" => $this->input->post('nama'),
                "alamat" => $this->input->post('alamat'),
                "tanggal_lahir" => $this->input->post('tanggal_lahir'),
                "foto" => $filename
            ];
        }

        $this->session->set_userdata($data);
        $this->db->update("tbl_user", $data, array('id' => $this->session->id));

        return $this->output
            ->set_status_header(200)
            ->set_content_type('application/json', 'utf-8')
            ->set_output(json_encode("ok"));
    }
}
