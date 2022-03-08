<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('jenis_model');
    }
    public function index()
    {

        $data['title'] = 'Master Jenis';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Jenis/index', $data);
    }
    public function getJenis()
    {
        $jen = $this->input->get('jen');
        $query = $this->jenis_model->getjeniss2($jen, 'nama_jenis');
        echo json_encode($query);
    }
}
