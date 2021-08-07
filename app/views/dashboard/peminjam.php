<?php
    require_once('../templates/navigate.php');
    require_once('../../init.php');

    $pnj = new Peminjam;
    $data = $pnj->viewPeminjam();
?>

<div class="main" style="margin-left: 170px;">

    <a href="tambah_peminjam.php" class="table-btn">
        <i class="fas fa-plus-circle">
            <span>Tambah Data</span>
        </i>
    </a>

    <table style="margin-top: 50px;">
        <tr class="head-table">
            <th class="col1">No</th>
            <th class="col2" style="width: 200px;">Nama Pegawai</th>
            <th class="col3" style="width: 125px;">NIP</th>
            <th class="col5" style="width: 200px;">Alamat</th>
            <th class="col5" style="border-radius: 0px 10px 0px 0px;">Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach($data as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row['nama_pegawai']; ?></td>
            <td><?= $row['nip']; ?></td>
            <td><?= $row['alamat']; ?></td>
            <td>
                <a href="edit_peminjam.php?id=<?= $row['id_pegawai']; ?>">
                    <button class="fas fa-pen"></button>
                </a>
                
                <a href="../../controllers/prosesPeminjam.php?id=<?= $row['id_pegawai']; ?>&aksi=hapus" onclick="return confirm('Yakin ingin menghapus data?');">
                    <button class="fas fa-trash-alt"></button>
                </a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</div>