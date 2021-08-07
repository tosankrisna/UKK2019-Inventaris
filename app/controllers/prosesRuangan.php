<?php

    require_once('../init.php');

    $rng = new Ruangan;
    $aksi = $_GET['aksi'];
    $id = $_GET['id'];

    if($aksi == 'tambah'){
        $koderuang = htmlspecialchars($_POST['kode_ruang']);
        $namaruang = htmlspecialchars($_POST['nama_ruang']);
        $keterangan = htmlspecialchars($_POST['keterangan']);

        $rng->addRuangan($koderuang, $namaruang, $keterangan);
        header('Location: ../views/dashboard/ruangan.php');
    } 
    else if($aksi == 'update'){
        $koderuang = htmlspecialchars($_POST['kode_ruang']);
        $namaruang = htmlspecialchars($_POST['nama_ruang']);
        $keterangan = htmlspecialchars($_POST['keterangan']);
        
        $rng->editRuangan($namaruang, $koderuang, $keterangan, $id);
        header('Location: ../views/dashboard/ruangan.php');
    }
    else if($aksi == 'hapus'){
        $rng->deleteRuangan($id);
        header('Location: ../views/dashboard/ruangan.php');
    }