<?php
    session_start();
    header("Cache-Control: no cache");

    if(!$_SESSION['login']){
        header('Location: ../login/index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <script src="../../assets/js/jquery.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Cantarell|Nunito+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Inknut+Antiqua" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cormorant" rel="stylesheet">
    <title>Invent App</title>
</head>
<body>
<div class="dash-container">
    <div class="dashhead">
        <p class="title">invent app</p>
        <p class="user"><?= $_SESSION['username']; ?>, <?= $_SESSION['nama_level']; ?></p>
    </div>

    <div class="sidebar">
        <ul>
            <li>
                <i class="fas fa-tachometer-alt"></i>
                <a href="../templates/index.php">dashboard</a>
            </li>

            <?php if($_SESSION['level'] == '1'){ ?>
                <li>
                    <i class="fas fa-dolly-flatbed"></i>
                    <a href="../dashboard/inventarisir.php">inventarisir</a>
                </li>
                <li>
                    <i class="fas fa-user-check"></i>
                    <a href="../dashboard/operator.php">operator</a>
                </li>
                <li>
                    <i class="fas fa-users"></i>
                    <a href="../dashboard/peminjam.php">peminjam</a>
                </li>
                <li>
                    <i class="fas fa-home"></i>
                    <a href="../dashboard/ruangan.php">ruangan</a>
                </li>
                <li>
                    <i class="fas fa-hand-holding-heart"></i>
                    <a href="../dashboard/peminjaman.php">peminjaman</a>
                </li>
                <li>
                    <i class="fas fa-reply"></i>
                    <a href="../dashboard/pengembalian.php">pengembalian</a>
                </li>
                <li>
                    <i class="fas fa-file-signature"></i>
                    <a href="../dashboard/laporan.php">laporan</a>
                </li>

            <?php } else if($_SESSION['level'] == '2'){ ?>
                <li>
                    <i class="fas fa-hand-holding-heart"></i>
                    <a href="../dashboard/peminjaman.php">peminjaman</a>
                </li>
                <li>
                    <i class="fas fa-reply"></i>
                    <a href="../dashboard/pengembalian.php">pengembalian</a>
                </li>

            <?php } else if($_SESSION['level'] = '3') { ?>
                <li>
                    <i class="fas fa-hand-holding-heart"></i>
                    <a href="../dashboard/peminjaman.php">peminjaman</a>
                </li>
            <?php } ?>

            <li>
                <i class="fas fa-power-off"></i>
                <a href="../../controllers/proseslogout.php" onclick="return confirm('Yakin akan logout?');">log out</a>
            </li>
        </ul>
    </div>
</div>