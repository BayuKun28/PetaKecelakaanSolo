<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kecamatan_model extends CI_Model
{
    public function read()
    {
        $query = "SELECT * FROM kecamatan";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }

    public function getKecamatans2($kec)
    {
        $query = "SELECT id,nama_kecamatan FROM kecamatan WHERE nama_kecamatan LIKE '%$kec%'";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
}
