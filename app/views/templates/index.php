<?php 
    require_once('navigate.php');
    require_once('../../init.php');
    session_start();

    $db = new Database();
    $data = [
        "satu" => count($db->resultSet("SELECT * FROM inventaris")),
        "dua" => count($db->resultSet("SELECT * FROM peminjaman WHERE status_peminjaman = 'belum dikembalikan' ")),
        "tiga" => count($db->resultSet("SELECT * FROM peminjaman WHERE status_peminjaman = 'sudah dikembalikan' "))
    ];
?>

<?php if($_SESSION['level'] == '1' OR $_SESSION['level'] == '2'){ ?>
    <div class="main" style="padding-top: 30px;">
        <span class="satu">
            <p class="mainp"><?= $data["satu"]; ?></p>
            <p>Data Barang</p>
        </span>
        <span class="dua">
            <p class="mainp"><?= $data["dua"]; ?></p>
            <p>Data Peminjaman</p>
        </span>
        <span class="tiga">
            <p class="mainp"><?= $data["tiga"]; ?></p>
            <p>Data Pengembalian</p>
        </span>
    </div>
<?php } elseif($_SESSION['level'] == '3') { ?>
    <div class="main" style="padding-top: 40px; margin-left: 5px;">
        <div class="dashwell">
            <h2 style="text-align: left;">Selamat Datang <?= $_SESSION['username']; ?></h2>
            <h3>Di Website Inventaris Sarana dan Prasarana SMK</h3>
        </div>
    </div>
<?php } ?>

