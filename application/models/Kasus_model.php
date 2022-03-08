<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasus_model extends CI_Model
{
    public function read()
    {
        $query = "SELECT k.id,ke.nama_kecamatan as kecamatan,k.lokasi,k.keterangan,j.nama_jenis as jenis,
        k.jumlah,k.tanggal,k.lat,k.lng
        FROM kasus k
        LEFT JOIN kecamatan ke on ke.id = k.kecamatan
        LEFT JOIN jenis j on j.id = k.jenis 
        ORDER BY k.tanggal DESC";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
    public function readmap()
    {
        $query = $this->db->get('kasus');
        return $query;
    }
}
