<?php
// defined('BASEPATH') or exit('No direct script access allowed');
require_once 'vendor/autoload.php';

use Dompdf\Dompdf as Dompdf;

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
        $data['kasus'] = $this->kasus_model->readfilter($xtanggalawal, $xtanggalakhir);
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

    public function cetak()
    {
        $data['title'] = 'Laporan Kasus';
        $xtanggalawal = $this->input->get('tglawal');
        $xtanggalakhir = $this->input->get('tglakhir');

        $data['tanggalawal'] = date('d F Y', strtotime($xtanggalawal));
        $data['tanggalakhir'] = date('d F Y', strtotime($xtanggalakhir));
        $data['kasus'] = $this->kasus_model->readfilter($xtanggalawal, $xtanggalakhir);

        $dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'Portrait');
        $html = $this->load->view('kasus/cetak', $data, true);
        $dompdf->load_html($html);
        $dompdf->render();
        $dompdf->stream('Laporan Data Kasus ', array("Attachment" => false));
    }
}
