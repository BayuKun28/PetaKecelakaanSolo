<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rangkuman_model extends CI_Model
{
    public function read()
    {
        $query = "SELECT COUNT(k.jumlah) as jumlahkasus,kec.nama_kecamatan
        FROM kecamatan kec
        LEFT JOIN kasus k on kec.id = k.kecamatan
        GROUP BY kec.id";
        return $this->db->query($query)->result();
        echo json_encode($query);
    }
}
