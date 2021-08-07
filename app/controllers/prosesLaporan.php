<?php
    require_once '../init.php';
    session_start();

    $jenis = $_GET['jenis'];
    $bulan = $_GET['bulan'];
    $laporan = new Laporan;

    if($jenis == 'peminjaman'){
        $data = $laporan->viewLaporanPeminjaman($bulan);
        $total = $laporan->getTotalPeminjaman($bulan);
        $_SESSION['data'] = $data;
        $_SESSION['total'] = $total;
        header('Location: ../views/dashboard/cetak.php?bulan=' .$bulan. '&jenis=' .$jenis);

    } elseif($jenis == 'pengembalian'){
        $data = $laporan->viewLaporanPengembalian($bulan);
        $total = $laporan->getTotalPengembalian($bulan);
        $_SESSION['data'] = $data;
        $_SESSION['total'] = $total;
        header('Location: ../views/dashboard/cetak.php?bulan=' .$bulan. '&jenis=' .$jenis);
    }
?>