<?php

require_once 'database.php';

class Ruangan extends Database{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function viewRuangan()
    {
        $sql = "CALL SPtampilruang";
        return $this->db->resultSet($sql);
    }

    public function addRuangan($namaruang, $koderuang, $keterangan)
    {
        $sql = "INSERT INTO ruang VALUES('', '$namaruang', '$koderuang', '$keterangan')";
        return $this->db->add($sql);
    }

    public function editRuangan($namaruang, $koderuang, $keterangan, $id)
    {
        $sql = "UPDATE ruang SET nama_ruang = '$namaruang', kode_ruang = '$koderuang', keterangan = '$keterangan' WHERE id_ruang = '$id' ";
        return $this->db->add($sql);
    }

    public function getRuangan($id)
    {
        $sql = "SELECT * FROM ruang WHERE id_ruang = '$id' ";
        return $this->db->single($sql);
    }

    public function deleteRuangan($id)
    {
        $sql = "DELETE FROM ruang WHERE id_ruang = '$id' ";
        return $this->db->delete($sql);
    }
}