<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kasus_model');

        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
    }
    public function index()
    {

        $title = 'Dashboard';
        $data = $this->kasus_model->readmap()->result();
        $hasil = array();

        foreach ($data as $row) {
            $hasil[] = array($row->jumlah, $row->lat, $row->lng, $row->keterangan, $row->lokasi);
        }
        $this->map = array(
            'daftar' => $data,
            'lokasi' => $hasil,
            'title' => $title,
            'user' => $this->db->get('pengguna', ['username' => $this->session->userdata('username')])->row_array()
        );

        $this->load->view('templates/header', $this->map);
        $this->load->view('templates/sidebar', $this->map);
        $this->load->view('templates/topbar', $this->map);
        $this->load->view('dashboard/index', $this->map);
    }
}
