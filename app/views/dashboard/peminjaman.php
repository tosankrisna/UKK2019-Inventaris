<?php
    require_once '../templates/navigate.php';
    require_once '../../init.php';

    $pinjam = new Peminjaman;
    
    $datapetugas = $pinjam->viewAllPinjaman();
    $datapegawai = $pinjam->viewPinjamanUser();

    if(isset($_POST['submit'])){
        if(empty($_POST['cari'])){
            echo "<script>window.location(-1);</script>";
        } else {
            $datapetugas = $pinjam->searchAllPinjaman($_POST['cari']);
            $datapegawai = $pinjam->searcPinjamanUser($_POST['cari']);
        }    
    }
?>

<div class="main" style="margin-left: 20px;">

    <?php if($_SESSION['nama_level'] == 'pegawai') { ?>
        <a href="tambah_peminjaman.php" class="table-btn" style="margin-top: 10px; margin-left: 5px;">
            <i class="fas fa-plus-circle">
                <span>Tambah Data</span>
            </i>
        </a>
        <form action="" method="post">
            <input type="text" name="cari" class="cari-peg" placeholder="Masukan Kode Barang..." autocomplete="off">
            <button type="submit" name="submit" class="btn-cari-peg">
                <i class="fas fa-search"></i>
            </button>
        </form>

    <?php } elseif($_SESSION['nama_level'] == 'petugas') { ?>
        <form action="" method="post" style="margin-left: 110px;">
            <input type="text" name="cari" class="cari" placeholder="Masukan NIP Pegawai..." autocomplete="off">
            <button type="submit" name="submit" class="btn-cari">
                <i class="fas fa-search"></i>
            </button>
        </form>
    <?php } ?>

    <table style="margin-top: 60px;">
        <tr class="head-table">
            <th class="col1">No</th>
            <th class="col2" style="width: 300px;">Nama Barang</th>
            <th class="col3" style="width: 200px;">Peminjam</th>
            <th class="col5" style="width: 200px;">Tgl Pinjam</th>
            <th class="col5" style="width: 150px;">Jumlah</th>
            
            <th class="col5" style="width: 250px;">Status Pinjam</th>
            <th class="col5" style="border-radius: 0px 10px 0px 0px;">Aksi</th>
        </tr>

        <?php if($_SESSION['nama_level'] == 'pegawai') { ?>
            <?php $i = 1; ?>
            <?php foreach($datapegawai as $row) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['nama_pegawai']; ?></td>
                    <td><?= date('d M Y', strtotime($row['tanggal_pinjam'])); ?></td>
                    <td><?= $row['jumlah']; ?></td>
                    <td><?= $row['status_peminjaman']; ?></td>

                    <td>
                        <a href="detail_pinjaman.php?id=<?= $row['id_peminjaman'] ?>">
                            <button class="fas fa-info-circle"></button>
                        </a>
                    </td>
                </tr>
            <?php $i++; ?>
            <?php endforeach; ?>

        <?php } elseif($_SESSION['nama_level'] == 'petugas') { ?>
            <?php $i = 1; ?>
            <?php foreach($datapetugas as $row) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['nama_pegawai']; ?></td>
                    <td><?= date('d M Y', strtotime($row['tanggal_pinjam'])); ?></td>
                    <td><?= $row['jumlah']; ?></td>
                    <td><?= $row['status_peminjaman']; ?></td>

                    <!-- <td>
                        <a href="../../controllers/prosesPengembalian.php?id_pinjam=<?= $row['id_peminjaman']; ?>&id_invent=<?= $row['id_inventaris']; ?>&jumlah=<?= $row['jumlah']; ?>">
                            <button class="fas fa-info-circle" onclick="return confirm('Ubah status barang?');"></button>
                        </a>
                    </td> -->
                    <td>
                        <a href="detail_pinjaman.php?id=<?= $row['id_peminjaman'] ?>">
                            <button class="fas fa-info-circle"></button>
                        </a>
                    </td>
                </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        <?php } ?>
    </table>
</div>