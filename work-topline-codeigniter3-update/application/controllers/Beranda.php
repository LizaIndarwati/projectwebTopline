<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $conf['header'] = 'Dashboard';
        $conf['nav_active'] = 'beranda';
        $this->load->view('layout/header', $conf);
        $this->load->view('layout/sidebar', $conf);
        $this->load->view('layout/navbar');
        $this->load->view('pages/beranda');
        $this->load->view('layout/footer');
    }
}
