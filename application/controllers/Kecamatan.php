<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kecamatan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kecamatan_model');
        if (!$this->session->userdata('is_logged_in')) {
            redirect('/');
        }
    }
    public function index()
    {

        $data['title'] = 'Kecamatan';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['kecamatan'] = $this->kecamatan_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kecamatan/index', $data);
    }
    public function FormInput()
    {

        $data['title'] = 'Form Input Kecamatan';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kecamatan/input', $data);
    }
    public function tambah()
    {
        $data = array(
            'nama_kecamatan' => $this->input->post('nama')
        );

        $this->db->insert('kecamatan', $data);
        $this->session->set_flashdata('message', 'Berhasil Ditambah');
        redirect('Kecamatan');
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kecamatan');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Kecamatan');
    }
    public function edit()
    {
        $id = $this->input->post('idedit');
        $data = array(
            'nama_kecamatan' => $this->input->post('namaedit')
        );
        $this->db->where('id', $id);
        $this->db->update('kecamatan', $data);
        $this->session->set_flashdata('message', 'Berhasil Di Update');
        redirect('Kecamatan');
    }
    public function getKecamatan()
    {
        $kec = $this->input->get('kec');
        $query = $this->kecamatan_model->getkecamatans2($kec, 'nama_kecamatan');
        echo json_encode($query);
    }
}
