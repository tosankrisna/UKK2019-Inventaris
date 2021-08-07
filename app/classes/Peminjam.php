<?php

require_once 'database.php';

class Peminjam extends Database{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function viewPeminjam()
    {
        $sql = "CALL SPtampilpeminjam()";
        return $this->db->resultSet($sql);
    }

    public function addPeminjam($namapeminjam, $nip, $password, $alamat)
    {
        $sql = "INSERT INTO pegawai VALUES('', '$namapeminjam', '$nip', '$password', '$alamat')";
        return $this->db->add($sql);
    }

    public function editPeminjam($namapeminjam, $nip, $password, $alamat, $id)
    {
        $sql = "UPDATE pegawai SET nama_pegawai = '$namapeminjam', nip = '$nip', password = '$password', alamat = '$alamat' WHERE id_pegawai = '$id' ";
        return $this->db->add($sql);
    }

    public function getPeminjam($id)
    {
        $sql = "SELECT * FROM pegawai WHERE id_pegawai = '$id'";
        return $this->db->single($sql);
    }

    public function deletePeminjam($id)
    {
        $sql = "DELETE FROM pegawai WHERE id_pegawai = '$id'";
        return $this->db->delete($sql);
    }
}