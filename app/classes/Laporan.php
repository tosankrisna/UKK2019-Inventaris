<?php

class Laporan extends Database{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function viewLaporanPeminjaman($bulan)
    {
        $sql = "SELECT peminjaman.*, pegawai.nama_pegawai, detail_pinjam.jumlah, inventaris.nama, ruang.nama_ruang FROM pegawai
                JOIN peminjaman ON pegawai.id_pegawai = peminjaman.id_pegawai JOIN detail_pinjam ON peminjaman.id_peminjaman = detail_pinjam.id_peminjaman
                JOIN inventaris ON inventaris.id_inventaris = detail_pinjam.id_inventaris JOIN ruang ON ruang.id_ruang = inventaris.id_ruang WHERE peminjaman.status_peminjaman = 'belum dikembalikan' AND MONTH(peminjaman.tanggal_pinjam) = '$bulan'";
        return $this->db->resultSet($sql);
    }

    public function getTotalPeminjaman($bulan)
    {
        $sql = "SELECT SUM(detail_pinjam.jumlah) AS jumlah, peminjaman.tanggal_pinjam FROM peminjaman
                JOIN detail_pinjam ON peminjaman.id_peminjaman = detail_pinjam.id_peminjaman 
                WHERE peminjaman.status_peminjaman = 'belum dikembalikan' AND MONTH(peminjaman.tanggal_pinjam) = '$bulan'";
        return $this->db->single($sql);
    }

    public function viewLaporanPengembalian($bulan)
    {
        $sql = "SELECT peminjaman.*, pegawai.nama_pegawai, detail_pinjam.jumlah, inventaris.nama, ruang.nama_ruang FROM pegawai
                JOIN peminjaman ON pegawai.id_pegawai = peminjaman.id_pegawai JOIN detail_pinjam ON peminjaman.id_peminjaman = detail_pinjam.id_peminjaman
                JOIN inventaris ON inventaris.id_inventaris = detail_pinjam.id_inventaris JOIN ruang ON ruang.id_ruang = inventaris.id_ruang WHERE peminjaman.status_peminjaman = 'sudah dikembalikan' AND MONTH(peminjaman.tanggal_kembali) = '$bulan'";
        return $this->db->resultSet($sql);
    }

    public function getTotalPengembalian($bulan)
    {
        $sql = "SELECT SUM(detail_pinjam.jumlah) AS jumlah, peminjaman.tanggal_kembali FROM peminjaman
                JOIN detail_pinjam ON peminjaman.id_peminjaman = detail_pinjam.id_peminjaman 
                WHERE peminjaman.status_peminjaman = 'sudah dikembalikan' AND MONTH(peminjaman.tanggal_kembali) = '$bulan'";
        return $this->db->single($sql);
    }
}