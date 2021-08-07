<?php 
    require_once('../templates/navigate.php');
    require_once('../../init.php');

    $pengembalian = new Pengembalian;
    $data = $pengembalian->viewPengembalian();

    if(isset($_POST['submit'])){
        if(empty($_POST['cari'])){
            echo "<script>window.location(-1);</script>";
        } else {
            $data = $pengembalian->searchPengembalian($_POST['cari']);
        }
    }
?>

<div class="main" style="margin-left: 20px;">

    <form action="" method="post" style="margin-left: 90px;">
        <input type="text" name="cari" class="cari" placeholder="Masukan NIP Pegawai..." autocomplete="off">
        <button type="submit" name="submit" class="btn-cari">
            <i class="fas fa-search"></i>
        </button>
    </form>

    <table style="margin-top: 60px;">
        <tr class="head-table">
            <th class="col1">No</th>
            <th class="col2" style="width: 250px;">Nama Barang</th>
            <th class="col3" style="width: 200px;">Peminjam</th>
            <th class="col5" style="width: 200px;">Tgl Kembali</th>
            <th class="col5" style="width: 250px;">Status Pinjam</th>
            <th class="col5" style="border-radius: 0px 10px 0px 0px;">Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach($data as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['nama_pegawai']; ?></td>
            <td><?= date('d M Y', strtotime($row['tanggal_kembali'])); ?></td>
            <td><?= $row['status_peminjaman']; ?></td>

            <td>
                <a href="detail_pengembalian.php?id=<?= $row['id_peminjaman']; ?>">
                    <button class="fas fa-info-circle"></button>
                </a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</div>