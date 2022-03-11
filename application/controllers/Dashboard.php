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

        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $xtanggalawal = $this->input->post('tglawal');
        $xtanggalakhir = $this->input->post('tglakhir');

        if (!empty($xtanggalawal) && !empty($xtanggalakhir)) {
            $xtanggalawal = $this->input->post('tglawal');
            $xtanggalakhir = $this->input->post('tglakhir');
        } else {
            $xtanggalawal = date('Y-m-d 00:00:00');
            $xtanggalakhir = date('Y-m-d H:i:s', strtotime('+1 days'));
        }
        $data['tanggalawal'] = $xtanggalawal;
        $data['tanggalakhir'] = $xtanggalakhir;

        $data['graph'] = $this->rangkuman_model->read($xtanggalawal, $xtanggalakhir);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/index', $data);
    }
}
