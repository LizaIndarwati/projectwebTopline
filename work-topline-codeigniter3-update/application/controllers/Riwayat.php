<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        if (!$this->session->userdata('username')) {
            redirect(base_url());
            return;
        }

        $conf['header'] = 'Riwayat Pesanan';
        $conf['nav_active'] = 'riwayat';

        $data['riwayat'] = $this->db->get('riwayat')->result_array();

        $this->load->view('layout/header', $conf);
        $this->load->view('layout/sidebar', $conf);
        $this->load->view('layout/navbar');
        $this->load->view('pages/riwayat', $data);
        $this->load->view('layout/footer');
    }
}
