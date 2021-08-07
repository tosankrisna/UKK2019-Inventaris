<?php

require_once 'database.php';

class Operator extends Database{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function viewOperator()
    {
        $sql = "CALL SPtampilpetugas";
        return $this->db->resultSet($sql);
    }

    public function addOperator($username, $password, $namapetugas, $level)
    {
        $sql = "INSERT INTO petugas VALUES('', '$username', '$password', '$namapetugas', '$level')";
        return $this->db->add($sql);
    }

    public function editOperator($username, $password, $namapetugas, $level, $id)
    {
        $sql = "UPDATE petugas SET username = '$username', password = '$password', nama_petugas = '$namapetugas', id_level = '$level' WHERE id_petugas = '$id' ";
        return $this->db->add($sql);
    }

    public function getOperator($id)
    {
        $sql = "SELECT * FROM petugas WHERE id_petugas = '$id' ";
        return $this->db->single($sql);
    }

    public function deleteOperator($id)
    {
        $sql = "DELETE FROM petugas WHERE id_petugas = '$id' ";
        return $this->db->delete($sql);
    }
}