<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rangkuman_model extends CI_Model
{
    public function read($tglawal, $tglakhir)
    {
        $query = "SELECT COUNT(k.id) as jumlahkasus,kec.nama_kecamatan
        FROM kecamatan kec
        LEFT JOIN kasus k on kec.id = k.kecamatan
        WHERE k.tanggal BETWEEN '$tglawal' AND '$tglakhir'
        GROUP BY kec.id";
        return $this->db->query($query)->result();
        echo json_encode($query);
    }
    public function total($tglawal, $tglakhir)
    {
        $query = "SELECT COUNT(k.id) as totalkasus
        FROM kecamatan kec
        LEFT JOIN kasus k on kec.id = k.kecamatan
        WHERE k.tanggal BETWEEN '$tglawal' AND '$tglakhir' ";
        return $this->db->query($query)->row_array();
        echo json_encode($query);
    }
}
