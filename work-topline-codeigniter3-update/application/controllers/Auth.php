<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $conf['header'] = 'Login';
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/auth_header', $conf);
            $this->load->view('auth/login');
            $this->load->view('layout/auth_footer');
            return;
        }

        $username = $this->input->post('username');
        $pass = $this->input->post('password');

        $get_user = $this->db->get_where('user', ['username' => $username]);

        if ($get_user->num_rows() > 0) {
            $user = $get_user->row();
            if (password_verify($pass, $user->password)) {
                $data_user = [
                    'id' => $user->id,
                    'username' => $user->username,
                    'nama' => $user->nama,
                    'alamat' => $user->alamat,
                    'tanggal_lahir' => $user->tanggal_lahir,
                    'foto' => $user->foto
                ];
                $this->session->set_userdata($data_user);
                redirect(base_url('pages/dashboard'));
            } else {
                redirect(base_url('/?message=Login Tidak Valid'));
            }
        } else {
            redirect(base_url('/?message=Login Tidak Valid'));
        }
    }

    public function signup()
    {
        $conf['header'] = 'Registration';
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('layout/auth_header', $conf);
            $this->load->view('auth/signup');
            $this->load->view('layout/auth_footer');
            return;
        }

        $username = $this->input->post('username');
        $pass = $this->input->post('password');

        $data = [
            'username' => $username,
            'password' => password_hash($pass, PASSWORD_DEFAULT)
        ];

        $insert = $this->db->insert('user', $data);

        if ($insert) {
            redirect(base_url());
        }
    }

    public function logout()
    {
        session_destroy();
        redirect(base_url());
    }
}
