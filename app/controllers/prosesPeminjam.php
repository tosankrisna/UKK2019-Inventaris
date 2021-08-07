<?php

    require_once('../init.php');

    $pnj = new Peminjam;
    $aksi = $_GET['aksi'];
    $id = $_GET['id'];

    if($aksi == 'tambah'){
        $namapeminjam = htmlspecialchars($_POST['namapeminjam']);
        $nip = htmlspecialchars($_POST['nip']);
        $password = htmlspecialchars($_POST['password']);
        $alamat = htmlspecialchars($_POST['alamat']);

        $pnj->addPeminjam($namapeminjam, $nip, $password, $alamat);
        header('Location: ../views/dashboard/peminjam.php');
    }
    else if($aksi == 'update'){
        $namapeminjam = htmlspecialchars($_POST['namapeminjam']);
        $nip = htmlspecialchars($_POST['nip']);
        $password = htmlspecialchars($_POST['password']);
        $alamat = htmlspecialchars($_POST['alamat']);

        $pnj->editPeminjam($namapeminjam, $nip, $password, $alamat, $id);
        header('Location: ../views/dashboard/peminjam.php');
    }
    else if($aksi == 'hapus'){
        $pnj->deletePeminjam($id);
        header('Location: ../views/dashboard/peminjam.php');
    }

