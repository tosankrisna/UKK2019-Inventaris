<?php 

    require_once('../init.php');

    $invent = new Inventarisir;
    $id = $_GET['id'];
    $aksi = $_GET['aksi'];

    if($aksi == 'tambah'){
        $nama = htmlspecialchars($_POST['nama']);
        $kondisi = htmlspecialchars($_POST['kondisi']);
        $keterangan = htmlspecialchars($_POST['keterangan']);
        $jumlah = htmlspecialchars($_POST['jumlah']);
        $jenis = htmlspecialchars($_POST['jenis']);
        $tgl_register = htmlspecialchars($_POST['tgl_register']);
        $ruang = htmlspecialchars($_POST['ruang']);
        $kode_inventaris = htmlspecialchars($_POST['kode_inventaris']);
        $petugas = htmlspecialchars($_POST['petugas']);
        
        $invent->addInventarisir($nama, $kondisi, $keterangan, $jumlah, $jenis, $tgl_register, $ruang, $kode_inventaris, $petugas);
        header('Location: ../views/dashboard/inventarisir.php');
    }
    else if($aksi == 'update'){
        $id = htmlspecialchars($_POST['id_inventaris']);
        $nama = htmlspecialchars($_POST['nama']);
        $kondisi = htmlspecialchars($_POST['kondisi']);
        $keterangan = htmlspecialchars($_POST['keterangan']);
        $jumlah = htmlspecialchars($_POST['jumlah']);
        $jenis = htmlspecialchars($_POST['jenis']);
        $tgl_register = htmlspecialchars($_POST['tgl_register']);
        $ruang = htmlspecialchars($_POST['ruang']);
        $kode_inventaris = htmlspecialchars($_POST['kode_inventaris']);
        $petugas = htmlspecialchars($_POST['petugas']);
        
        $invent->editInventarisir($id, $nama, $kondisi, $keterangan, $jumlah, $jenis, $tgl_register, $ruang, $kode_inventaris, $petugas);
        header('Location: ../views/dashboard/inventarisir.php');
    }
    else if($aksi == 'hapus'){
        $invent->deleteInventarisir($id);
        header('Location: ../views/dashboard/inventarisir.php');
    }
    