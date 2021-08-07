<?php

require_once 'database.php';

class Inventarisir extends Database{

    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function viewInventarisir()
    {
        $sql = "SELECT inventaris.*, jenis.nama_jenis, ruang.nama_ruang FROM jenis JOIN inventaris ON jenis.id_jenis = inventaris.id_jenis
                    JOIN ruang ON ruang.id_ruang = inventaris.id_ruang WHERE inventaris.id_jenis = jenis.id_jenis AND inventaris.id_ruang = ruang.id_ruang ORDER BY id_inventaris DESC";
        return $this->db->resultSet($sql);
    }

    public function viewEdit($id)
    {
        $sql = "SELECT * FROM inventaris WHERE id_inventaris = '$id'";
        return $this->db->single($sql);
    }

    public function addInventarisir($nama, $kondisi, $keterangan, $jumlah, $jenis, $tgl_register, $ruang, $kode_inventaris, $petugas)
    {
        $sql = "INSERT INTO inventaris VALUES('', '$nama', '$kondisi', '$keterangan', '$jumlah', '$jenis', '$tgl_register', '$ruang', '$kode_inventaris', '$petugas')";
        return $this->db->add($sql);
    }

    public function editInventarisir($id, $nama, $kondisi, $keterangan, $jumlah, $jenis, $tgl_register, $ruang, $kode_inventaris, $petugas)
    {
        $sql = "UPDATE inventaris SET nama = '$nama', kondisi = '$kondisi', keterangan = '$keterangan', jumlah = '$jumlah', 
                    id_jenis = '$jenis', tanggal_register = '$tgl_register', id_ruang = '$ruang', kode_inventaris = '$kode_inventaris', id_petugas = '$petugas' WHERE id_inventaris = '$id'";
        return $this->db->update($sql);
    }

    public function deleteInventarisir($id)
    {
        $sql = "DELETE FROM inventaris WHERE id_inventaris = '$id'";
        return $this->db->delete($sql);
    }

    public function searchInventarisir($keyword)
    {
        $sql = "SELECT inventaris.*, jenis.nama_jenis, ruang.nama_ruang FROM inventaris 
                  JOIN ruang ON ruang.id_ruang = inventaris.id_ruang JOIN jenis ON jenis.id_jenis = inventaris.id_jenis
                  WHERE kode_inventaris LIKE '%$keyword%' ORDER BY id_inventaris DESC";
        return $this->db->resultSet($sql);
    }

    public function searchSingleData($keyword)
    {
        $sql = "SELECT inventaris.*, jenis.nama_jenis, ruang.nama_ruang FROM inventaris 
                  JOIN ruang ON ruang.id_ruang = inventaris.id_ruang JOIN jenis ON jenis.id_jenis = inventaris.id_jenis
                  WHERE kode_inventaris LIKE '%$keyword%'";
        return $this->db->single($sql);
    }

    public function viewJenis()
    {
        $sql = "CALL SPtampiljenis";
        return $this->db->resultSet($sql);
    }

    public function viewJumlah($id)
    {
        $sql = "SELECT jumlah FROM inventaris WHERE id_inventaris = '$id'";
        return $this->db->resultSet($sql);
    }

}