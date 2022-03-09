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

        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dashboard/index', $data);
    }
}
