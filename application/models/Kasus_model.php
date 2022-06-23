<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kasus_model extends CI_Model
{
    public function read()
    {
        $query = "SELECT k.id,ke.nama_kecamatan as kecamatan,k.kecamatan as kdkecamatan,k.jenis as kdjenis,k.lokasi,k.keterangan,j.nama_jenis as jenis,
        k.tanggal,k.lat,k.lng
        FROM kasus k
        LEFT JOIN kecamatan ke on ke.id = k.kecamatan
        LEFT JOIN jenis j on j.id = k.jenis 
        ORDER BY k.tanggal DESC";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
    public function readfilter($tglawal, $tglakhir)
    {
        $query = "SELECT k.id,ke.nama_kecamatan as kecamatan,k.kecamatan as kdkecamatan,k.jenis as kdjenis,k.lokasi,k.keterangan,j.nama_jenis as jenis,
        k.tanggal,k.lat,k.lng
        FROM kasus k
        LEFT JOIN kecamatan ke on ke.id = k.kecamatan
        LEFT JOIN jenis j on j.id = k.jenis 
        WHERE k.tanggal BETWEEN '$tglawal' AND '$tglakhir'
        ORDER BY k.tanggal DESC";
        return $this->db->query($query)->result_array();
        echo json_encode($query);
    }
    public function readmap()
    {
        $query = $this->db->get('kasus');
        return $query;
    }
    public function readmapfilter($tglawal, $tglakhir)
    {
        $query = "
                SELECT * FROM kasus 
                WHERE tanggal BETWEEN '$tglawal' AND '$tglakhir'
        ";
        return $this->db->query($query)->result();
        return $query;
    }
    public function detail($id)
    {
        $query = "SELECT k.id,ke.nama_kecamatan as kecamatan,k.kecamatan as kdkecamatan,k.jenis as kdjenis,k.lokasi,k.keterangan,j.nama_jenis as jenis,
        k.tanggal,k.lat,k.lng
        FROM kasus k
        LEFT JOIN kecamatan ke on ke.id = k.kecamatan
        LEFT JOIN jenis j on j.id = k.jenis 
        WHERE k.id = $id
        ORDER BY k.tanggal DESC";
        return $this->db->query($query)->row_array();
        echo json_encode($query);
    }
}
