<?php

require_once 'database.php';

class Peminjaman extends Database{
    private $db;

    function __construct()
    {
        $this->db = new Database;
    }

    public function viewAllPinjaman()
    {
        $sql = "SELECT peminjaman.*, pegawai.nama_pegawai, detail_pinjam.jumlah, inventaris.nama, inventaris.id_inventaris FROM pegawai JOIN peminjaman ON pegawai.id_pegawai = peminjaman.id_pegawai 
                JOIN detail_pinjam ON peminjaman.id_peminjaman = detail_pinjam.id_peminjaman
                JOIN inventaris ON inventaris.id_inventaris = detail_pinjam.id_inventaris WHERE peminjaman.status_peminjaman = 'belum dikembalikan'
                ORDER BY peminjaman.id_peminjaman DESC";
        return $this->db->resultSet($sql);
    }

    public function viewPinjamanUser()
    {
        $sql = "SELECT peminjaman.*, pegawai.nama_pegawai, detail_pinjam.jumlah, inventaris.nama FROM pegawai
                JOIN peminjaman ON pegawai.id_pegawai = peminjaman.id_pegawai JOIN detail_pinjam ON peminjaman.id_peminjaman = detail_pinjam.id_peminjaman
                JOIN inventaris ON inventaris.id_inventaris = detail_pinjam.id_inventaris WHERE pegawai.nama_pegawai = '{$_SESSION['username']}' AND peminjaman.status_peminjaman = 'belum dikembalikan'
                ORDER BY detail_pinjam.id_detail_pinjam DESC";
        return $this->db->resultSet($sql);
    }

    public function addPinjaman($tglpinjam, $statuspinjam, $pegawai, $id, $jumlah)
    {
        $sql = "INSERT INTO peminjaman VALUES('', '$tglpinjam', 'NULL', '$statuspinjam', '$pegawai');
                INSERT INTO detail_pinjam VALUES('', '$id', LAST_INSERT_ID(), '$jumlah');";
        return $this->db->multiadd($sql);
    }

    public function searchAllPinjaman($keyword)
    {
        $sql = "SELECT pegawai.nama_pegawai, pegawai.nip, peminjaman.tanggal_pinjam, peminjaman.id_peminjaman, peminjaman.status_peminjaman, detail_pinjam.jumlah, inventaris.nama
                  FROM pegawai JOIN peminjaman ON pegawai.id_pegawai = peminjaman.id_pegawai JOIN detail_pinjam ON peminjaman.id_peminjaman = detail_pinjam.id_peminjaman
                  JOIN inventaris ON inventaris.id_inventaris = detail_pinjam.id_inventaris WHERE pegawai.nip LIKE '%$keyword%' AND peminjaman.status_peminjaman = 'belum dikembalikan' ORDER BY peminjaman.id_peminjaman DESC";
        return $this->db->resultSet($sql);
    }

    public function searcPinjamanUser($keyword)
    {
        $sql = "SELECT pegawai.nama_pegawai, peminjaman.tanggal_pinjam, peminjaman.id_peminjaman, peminjaman.status_peminjaman, detail_pinjam.jumlah, inventaris.nama, inventaris.kode_inventaris
                FROM pegawai JOIN peminjaman ON pegawai.id_pegawai = peminjaman.id_pegawai JOIN detail_pinjam ON peminjaman.id_peminjaman = detail_pinjam.id_peminjaman
                JOIN inventaris ON inventaris.id_inventaris = detail_pinjam.id_inventaris WHERE pegawai.nama_pegawai = '{$_SESSION['username']}' AND peminjaman.status_peminjaman = 'belum dikembalikan' AND inventaris.kode_inventaris LIKE '%$keyword%'";
        return $this->db->resultSet($sql);
    }

    public function viewDetailPinjaman($id)
    {
        $sql = "SELECT peminjaman.*, inventaris.*, ruang.nama_ruang, pegawai.nama_pegawai, petugas.id_level, detail_pinjam.jumlah AS jumlahpinjam, jenis.nama_jenis FROM pegawai
                JOIN peminjaman ON pegawai.id_pegawai = peminjaman.id_pegawai JOIN detail_pinjam ON peminjaman.id_peminjaman = detail_pinjam.id_peminjaman JOIN inventaris ON inventaris.id_inventaris = detail_pinjam.id_inventaris
                JOIN jenis ON jenis.id_jenis = inventaris.id_jenis JOIN ruang ON ruang.id_ruang = inventaris.id_ruang JOIN petugas ON petugas.id_petugas = inventaris.id_petugas WHERE peminjaman.id_peminjaman = '$id'";
        return $this->db->single($sql);
    }

}