<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Game extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {

        if (!$this->session->userdata('username')) {
            redirect(base_url());
            return;
        }

        $conf['header'] = 'Data Games';
        $conf['nav_active'] = 'game';

        $data['games'] = $this->db->get('games')->result_array();

        $this->load->view('layout/header', $conf);
        $this->load->view('layout/sidebar', $conf);
        $this->load->view('layout/navbar');
        $this->load->view('pages/game/index', $data);
        $this->load->view('layout/footer');
    }

    public function tambah()
    {

        if (!$this->session->userdata('username')) {
            redirect(base_url());
            return;
        }

        $conf['header'] = 'Tambah Data Games';
        $conf['nav_active'] = 'game';


        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', ['required' => '%s harus diisi']);
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric', ['required' => '%s harus diisi', 'numeric' => 'Hanya angka yang diperbolehkan']);
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|numeric', ['required' => '%s harus diisi', 'numeric' => 'Hanya angka yang diperbolehkan']);
        $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required', ['required' => '%s harus diisi']);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $conf);
            $this->load->view('layout/sidebar', $conf);
            $this->load->view('layout/navbar');
            $this->load->view('pages/game/tambah');
            $this->load->view('layout/footer');
            return;
        }

        $config['upload_path']          = './assets/img/covers/';
        $config['allowed_types']        = 'jpeg|jpg|png';

        $config['file_name'] = 'covers_' . time();

        $this->load->library('upload', $config);

        $data = [
            'nama' => $this->input->post('nama'),
            'harga' => $this->input->post('harga'),
            'jumlah' => $this->input->post('jumlah'),
            'satuan' => $this->input->post('satuan'),
        ];

        if ($this->upload->do_upload('gambar')) {
            $data['gambar'] = $this->upload->data('file_name');
        }

        $insert = $this->db->insert('games', $data);
        if ($insert) {
            redirect(base_url('pages/game'));
        }
    }

    public function edit($id)
    {

        if (!$this->session->userdata('username')) {
            redirect(base_url());
            return;
        }

        $conf['header'] = 'Edit Data Games';
        $conf['nav_active'] = 'game';

        $data_read['game'] = $this->db->get_where('games', ['id' => $id])->row_array();


        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', ['required' => '%s harus diisi']);
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric', ['required' => '%s harus diisi', 'numeric' => 'Hanya angka yang diperbolehkan']);
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'trim|required|numeric', ['required' => '%s harus diisi', 'numeric' => 'Hanya angka yang diperbolehkan']);
        $this->form_validation->set_rules('satuan', 'Satuan', 'trim|required', ['required' => '%s harus diisi']);

        if ($this->form_validation->run() == false) {
            $this->load->view('layout/header', $conf);
            $this->load->view('layout/sidebar', $conf);
            $this->load->view('layout/navbar');
            $this->load->view('pages/game/edit', $data_read);
            $this->load->view('layout/footer');
            return;
        }

        $config['upload_path']          = './assets/img/covers/';
        $config['allowed_types']        = 'jpeg|jpg|png';

        $config['file_name'] = 'covers_' . time();

        $this->load->library('upload', $config);

        $data = [
            'nama' => $this->input->post('nama'),
            'harga' => $this->input->post('harga'),
            'jumlah' => $this->input->post('jumlah'),
            'satuan' => $this->input->post('satuan'),
        ];

        if ($this->upload->do_upload('gambar')) {
            $data['gambar'] = $this->upload->data('file_name');
            unlink('./assets/img/covers/' . $data_read['game']['gambar']);
        } else {
            $data['gambar'] = $data_read['game']['gambar'];
        }

        $update = $this->db->update('games', $data, ['id' => $id]);
        if ($update) {
            redirect('pages/game');
        }
    }

    public function hapus($id)
    {
        $data_read['game'] = $this->db->get_where('games', ['id' => $id])->row_array();

        $delete = $this->db->delete('games', ['id' => $id]);
        if ($delete) {
            $data['id_game'] = 0;
            $this->db->update('riwayat', $data, ['id' => $id]);
            unlink('./assets/img/covers/' . $data_read['game']['gambar']);
        }

        redirect('pages/game');
    }
}
