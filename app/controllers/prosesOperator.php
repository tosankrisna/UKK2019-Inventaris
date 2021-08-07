<?php

    require_once('../init.php');

    $opr = new Operator;
    $aksi = $_GET['aksi'];
    $id = $_GET['id'];

    if($aksi == 'tambah'){
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $namapetugas = htmlspecialchars($_POST['nama_petugas']);
        $level = htmlspecialchars($_POST['level']);

        $opr->addOperator($username, $password, $namapetugas, $level);
        header('Location: ../views/dashboard/operator.php');
    } 
    else if($aksi == 'update'){
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $namapetugas = htmlspecialchars($_POST['nama_petugas']);
        $level = htmlspecialchars($_POST['level']);

        $opr->editOperator($username, $password, $namapetugas, $level, $id);
        header('Location: ../views/dashboard/operator.php');
    }
    else if($aksi == 'hapus'){
        $opr->deleteOperator($id);
        header('Location: ../views/dashboard/operator.php');
    }