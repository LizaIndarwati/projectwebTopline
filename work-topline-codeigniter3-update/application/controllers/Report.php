<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $conf['header'] = 'Report';
        $conf['nav_active'] = 'report';

        $this->db->select('*, riwayat.satuan as satuan');
        $this->db->from('riwayat');
        $this->db->join('games', 'games.id = riwayat.id_game', 'LEFT');
        $data['report'] = $this->db->get()->result_array();

        $this->load->view('layout/header', $conf);
        $this->load->view('layout/sidebar', $conf);
        $this->load->view('layout/navbar');
        $this->load->view('pages/report', $data);
        $this->load->view('layout/footer');
    }
}
