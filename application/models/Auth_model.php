<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function getUser($username)
    {
        $this->db->where('username', $username);
        return $this->db->get('pengguna');
    }

    public function read()
    {
        $query = "SELECT * FROM pengguna";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
}
