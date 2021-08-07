<?php

    require_once('../init.php');
    
    $invent = new Inventarisir;
    $pinjam = new Peminjaman;
    
    $id = htmlspecialchars($_POST['id_inventaris']);
    $jumlah = htmlspecialchars($_POST['jumlah']);
    $tglpinjam = htmlspecialchars($_POST['tgl_pinjam']);
    $statuspinjam = htmlspecialchars($_POST['status_pinjam']);
    $pegawai = htmlspecialchars($_POST['pegawai']);
        
    $jmlbrg = $invent->viewJumlah($id);
    
    foreach($jmlbrg as $row) {
        if($row['jumlah'] < $jumlah){
            echo "<script>alert('Jumlah yang dimasukan melebihi stok!');
            history.go(-1);</script>";
        } else {
            $pinjam->addPinjaman($tglpinjam, $statuspinjam, $pegawai, $id, $jumlah);
            echo "<script>
                    var confirm = confirm('Peminjaman berhasil, ingin pinjam lagi?');
                    if(confirm == true){
                        window.location.href='../views/dashboard/tambah_peminjaman.php';
                    } else {
                        window.location.href='../views/dashboard/peminjaman.php';
                    }
                </script>";
        }
    }
