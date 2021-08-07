<?php

    require_once('../init.php');

    $log = new login();

    if(isset($_POST['login'])){
        $usernip = htmlspecialchars($_POST['usernip']);
        $password = htmlspecialchars($_POST['password']);
        $akses = $_POST['akses'];

        if($akses == 'petugas'){
            $log->loginPetugas($usernip, $password);
        } 
        else if($akses == 'pegawai'){
            $log->loginPegawai($usernip, $password);
        }
    }