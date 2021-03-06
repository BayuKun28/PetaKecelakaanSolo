<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kasus_model');
        $this->load->model('rangkuman_model');

        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
    }
    public function index()
    {

        $title = 'Dashboard';
        $xtanggalawal = $this->input->post('tglawal');
        $xtanggalakhir = $this->input->post('tglakhir');

        if (!empty($xtanggalawal) && !empty($xtanggalakhir)) {
            $xtanggalawal = $this->input->post('tglawal');
            $xtanggalakhir = $this->input->post('tglakhir');
        } else {
            $xtanggalawal = date('Y-m-01 00:00:00');
            $xtanggalakhir = date('Y-m-d H:i:s', strtotime('+1 days'));
        }

        $graph = $this->rangkuman_model->read($xtanggalawal, $xtanggalakhir);
        $status = $this->rangkuman_model->status($xtanggalawal, $xtanggalakhir);
        $data = $this->kasus_model->readmapfilter($xtanggalawal, $xtanggalakhir);
        $hasil = array();

        foreach ($data as $row) {
            $hasil[] = array($row->jumlah, $row->lat, $row->lng, $row->keterangan, $row->lokasi);
        }
        $this->map = array(
            'daftar' => $data,
            'lokasi' => $hasil,
            'graph' => $graph,
            'status' => $status,
            'title' => $title,
            'user' =>  $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array(),
            'tanggalawal' => $xtanggalawal,
            'tanggalakhir' => $xtanggalakhir
        );

        $this->load->view('templates/header', $this->map);
        $this->load->view('templates/sidebar', $this->map);
        $this->load->view('templates/topbar', $this->map);
        $this->load->view('dashboard/index', $this->map);
    }
}
