<?php
    require_once('../templates/navigate.php');
    require_once('../../init.php');

    $rng = new Ruangan;
    $data = $rng->viewRuangan();
?>

<div class="main" style="margin-left: 150px;">

    <a href="tambah_ruang.php" class="table-btn">
        <i class="fas fa-plus-circle">
            <span>Tambah Data</span>
        </i>
    </a>

    <table style="margin-top: 50px;">
        <tr class="head-table">
            <th class="col1">No</th>
            <th class="col2">Kode Ruang</th>
            <th class="col2">Nama Ruang</th>
            <th class="col2" style="border-radius: 0px 10px 0px 0px;">Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach($data as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row['kode_ruang']; ?></td>
            <td><?= $row['nama_ruang']; ?></td>
            <td>
                <a href="edit_ruangan.php?id=<?= $row['id_ruang']; ?>">
                    <button class="fas fa-pen"></button>
                </a>
                
                <a href="../../controllers/prosesRuangan.php?id=<?= $row['id_ruang']; ?>&aksi=hapus" onclick="return confirm('Yakin ingin menghapus data?');">
                    <button class="fas fa-trash-alt"></button>
                </a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</div>