<?php 
    require_once '../init.php';

    $pengembalian = new Pengembalian;
    $aksi = $_GET['aksi'];
    $id_invent = $_GET['id_invent'];
    $id_pinjam = $_GET['id_pinjam'];

    $jumlah = htmlspecialchars($_POST['jumlah']);
    $statuskembali = htmlspecialchars($_POST['status_kembali']);

    // $jumlah = $_GET['jumlah'];
    // $statuskembali = 'sudah dikembalikan';

    $pengembalian->addPengembalian($jumlah, $id_invent, $statuskembali, $id_pinjam);
    header('Location: ../views/dashboard/pengembalian.php');

?>