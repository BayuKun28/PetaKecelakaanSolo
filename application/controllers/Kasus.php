<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasus extends CI_Controller
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

        $data['title'] = 'Data Kasus';
        $data['user'] = $this->db->get('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['kasus'] = $this->kasus_model->read();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kasus/index', $data);
    }

    public function FormInput()
    {

        $data['title'] = 'Form Input Kasus';
        $data['user'] = $this->db->get('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kasus/input', $data);
    }

    public function Tambah()
    {
        $xtgl = $this->input->post('tanggal');
        $data = array(
            'kecamatan' => $this->input->post('kecamatan'),
            'lokasi' => $this->input->post('lokasi'),
            'keterangan' => $this->input->post('keterangan'),
            'jenis' => $this->input->post('jenis'),
            'jumlah' => $this->input->post('jumlah'),
            'lat' => $this->input->post('lat'),
            'lng' => $this->input->post('lng'),
            'tanggal' => date('Y-m-d H:i:s', strtotime($xtgl))
        );
        $this->db->insert('kasus', $data);
        $this->session->set_flashdata('message', 'Berhasil Ditambah');
        redirect('Kasus');
    }

    public function edit()
    {
        $id = $this->uri->segment(3);
        $data['kasus'] = $this->kasus_model->detail($id);
        $data['title'] = 'Form Edit Kasus';
        $data['user'] = $this->db->get('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kasus/edit', $data);
    }

    public function simpanedit()
    {
        $xtgl = $this->input->post('tanggal');
        $id = $this->input->post('idedit');
        $data = array(
            'kecamatan' => $this->input->post('kecamatan'),
            'lokasi' => $this->input->post('lokasi'),
            'keterangan' => $this->input->post('keterangan'),
            'jenis' => $this->input->post('jenis'),
            'jumlah' => $this->input->post('jumlah'),
            'lat' => $this->input->post('lat'),
            'lng' => $this->input->post('lng'),
            'tanggal' => date('Y-m-d H:i:s', strtotime($xtgl))
        );
        $this->db->where('id', $id);
        $this->db->update('kasus', $data);
        $this->session->set_flashdata('message', 'Berhasil Di Update');
        redirect('Kasus');
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kasus');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Kasus');
    }
}
