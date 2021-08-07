<?php

class Pengembalian extends Database{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function addPengembalian($jumlah, $id_invent, $statuskembali, $id_pinjam)
    {
        $sql = "UPDATE inventaris SET jumlah = jumlah + '$jumlah' WHERE id_inventaris = '$id_invent'; 
                UPDATE peminjaman SET status_peminjaman = '$statuskembali', tanggal_kembali = NOW() WHERE id_peminjaman = '$id_pinjam'";
        return $this->db->multiadd($sql);
    }

    public function viewPengembalian()
    {
        $sql = "SELECT peminjaman.*, pegawai.nama_pegawai, inventaris.nama FROM pegawai JOIN peminjaman ON pegawai.id_pegawai = peminjaman.id_pegawai
                JOIN detail_pinjam ON peminjaman.id_peminjaman = detail_pinjam.id_peminjaman JOIN inventaris ON inventaris.id_inventaris = detail_pinjam.id_inventaris WHERE peminjaman.status_peminjaman = 'sudah dikembalikan'
                ORDER BY peminjaman.id_peminjaman DESC";
        return $this->db->resultSet($sql);
    }

    public function searchPengembalian($keyword)
    {
        $sql = "SELECT pegawai.nama_pegawai, pegawai.nip, peminjaman.tanggal_kembali, peminjaman.id_peminjaman, peminjaman.status_peminjaman, inventaris.nama
                FROM pegawai JOIN peminjaman ON pegawai.id_pegawai = peminjaman.id_pegawai JOIN detail_pinjam ON peminjaman.id_peminjaman = detail_pinjam.id_peminjaman
                JOIN inventaris ON inventaris.id_inventaris = detail_pinjam.id_inventaris WHERE peminjaman.status_peminjaman = 'sudah dikembalikan' AND pegawai.nip LIKE '%$keyword%'";
        return $this->db->resultSet($sql);
    }

    public function detailPengembalian($id)
    {
        $sql = "SELECT peminjaman.*, inventaris.*, ruang.nama_ruang, pegawai.nama_pegawai, detail_pinjam.jumlah AS jumlahpinjam, jenis.nama_jenis FROM pegawai
                JOIN peminjaman ON pegawai.id_pegawai = peminjaman.id_pegawai JOIN detail_pinjam ON peminjaman.id_peminjaman = detail_pinjam.id_peminjaman JOIN inventaris ON inventaris.id_inventaris = detail_pinjam.id_inventaris
                JOIN jenis ON jenis.id_jenis = inventaris.id_jenis JOIN ruang ON ruang.id_ruang = inventaris.id_ruang
                WHERE peminjaman.id_peminjaman = '$id'";
        return $this->db->single($sql);
    }
}