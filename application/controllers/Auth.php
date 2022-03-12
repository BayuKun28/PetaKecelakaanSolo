<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('auth_model');
    }
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'E-PetaKec';
            $this->load->view('auth/login', $data);
        } else {
            $this->_login();
        }
    }
    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('pengguna', ['username' => $username])->row_array();
        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id' => $user['id'],
                        'username' => $user['username'],
                        'level' => $user['level'],
                        'is_logged_in' => TRUE
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong Password.!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not active.!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username is not registered.!</div>');
            redirect('auth');
        }
    }
    public function pengguna()
    {
        $data['title'] = 'Pengguna';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['pengguna'] = $this->auth_model->read();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('auth/pengguna');
    }
    public function FormInput()
    {

        $data['title'] = 'Form Input Pengguna';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('auth/input', $data);
    }

    public function tambah()
    {
        $username = $this->input->post('username');
        $cekusername = $this->auth_model->cekusername($username);
        if ($cekusername > 0) {
            $this->session->set_flashdata('message', 'Username Sudah Ada');
            redirect('Auth/FormInput');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'nama' => $this->input->post('nama'),
                'level' => $this->input->post('level'),
                'is_active' => 1
            );
            $this->db->insert('pengguna', $data);
            $this->session->set_flashdata('message', 'Berhasil Ditambah');
            redirect('Auth/pengguna');
        }
    }
    public function edit()
    {
        $data['title'] = 'Form Edit Pengguna';
        $data['user'] = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        $data['pengguna'] = $this->auth_model->detail($this->uri->segment(3));
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('auth/edit', $data);
    }
    public function simpanedit()
    {
        $id = $this->input->post('idedit');
        $data = array(
            'username' => $this->input->post('username'),
            'password' =>  password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'nama' => $this->input->post('nama'),
            'level' => $this->input->post('level')
        );
        $this->db->where('id', $id);
        $this->db->update('pengguna', $data);
        $this->session->set_flashdata('message', 'Berhasil Di Update');

        $cekuser = $this->db->get_where('pengguna', ['username' => $this->session->userdata('username')])->row_array();
        if ($cekuser['id'] ==  $this->input->post('idedit')) {
            redirect('Auth/logout');
        } else {
            redirect('Auth/pengguna');
        }
    }
    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pengguna');
        $this->session->set_flashdata('message', 'Berhasil Dihapus');
        redirect('Auth/pengguna');
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('is_logged_in');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You Have been LogOut.!</div>');
        redirect('/');
    }

    public function blocked()
    {
        $data['title'] = 'Acces Blocked';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('auth/blocked', $data);
        $this->load->view('templates/footer', $data);
    }
}
