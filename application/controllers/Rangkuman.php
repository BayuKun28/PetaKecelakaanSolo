<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rangkuman extends CI_Controller
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
    public function peta()
    {

        $title = 'Rangkuman / Peta';
        $xtanggalawal = $this->input->post('tglawal');
        $xtanggalakhir = $this->input->post('tglakhir');

        if (!empty($xtanggalawal) && !empty($xtanggalakhir)) {
            $xtanggalawal = $this->input->post('tglawal');
            $xtanggalakhir = $this->input->post('tglakhir');
        } else {
            $xtanggalawal = date('Y-m-01 00:00:00');
            $xtanggalakhir = date('Y-m-d H:i:s', strtotime('+1 days'));
        }
        $data = $this->kasus_model->readmapfilter($xtanggalawal, $xtanggalakhir);
        $hasil = array();

        foreach ($data as $row) {
            $hasil[] = array($row->jumlah, $row->lat, $row->lng, $row->keterangan, $row->lokasi);
        }
        $this->map = array(
            'daftar' => $data,
            'lokasi' => $hasil,
            'title' => $title,
            'user' =>  $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array(),
            'tanggalawal' => $xtanggalawal,
            'tanggalakhir' => $xtanggalakhir
        );

        $this->load->view('templates/header', $this->map);
        $this->load->view('templates/sidebar', $this->map);
        $this->load->view('templates/topbar', $this->map);
        $this->load->view('rangkuman/peta', $this->map);
    }
    public function chart()
    {
        $data['title'] = 'Rangkuman / Chart';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $xtanggalawal = $this->input->post('tglawal');
        $xtanggalakhir = $this->input->post('tglakhir');

        if (!empty($xtanggalawal) && !empty($xtanggalakhir)) {
            $xtanggalawal = $this->input->post('tglawal');
            $xtanggalakhir = $this->input->post('tglakhir');
        } else {
            $xtanggalawal = date('Y-m-01 00:00:00');
            $xtanggalakhir = date('Y-m-d H:i:s', strtotime('+1 days'));
        }
        $data['tanggalawal'] = $xtanggalawal;
        $data['tanggalakhir'] = $xtanggalakhir;

        $data['graph'] = $this->rangkuman_model->read($xtanggalawal, $xtanggalakhir);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('rangkuman/chart', $data);
    }
    public function batang()
    {
        $data['title'] = 'Rangkuman / Diagram Batang';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $xtanggalawal = $this->input->post('tglawal');
        $xtanggalakhir = $this->input->post('tglakhir');

        if (!empty($xtanggalawal) && !empty($xtanggalakhir)) {
            $xtanggalawal = $this->input->post('tglawal');
            $xtanggalakhir = $this->input->post('tglakhir');
        } else {
            $xtanggalawal = date('Y-m-01 00:00:00');
            $xtanggalakhir = date('Y-m-d H:i:s', strtotime('+1 days'));
        }
        $data['tanggalawal'] = $xtanggalawal;
        $data['tanggalakhir'] = $xtanggalakhir;

        $data['graph'] = $this->rangkuman_model->read($xtanggalawal, $xtanggalakhir);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('rangkuman/batang', $data);
    }
}
