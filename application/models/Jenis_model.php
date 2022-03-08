<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis_model extends CI_Model
{
    public function read()
    {
    }

    public function getJeniss2($jen)
    {
        $query = "SELECT id,nama_jenis FROM jenis WHERE nama_jenis LIKE '%$jen%'";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
}
