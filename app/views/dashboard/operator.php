<?php
    require_once('../templates/navigate.php');
    require_once('../../init.php');

    $opr = new Operator;
    $data = $opr->viewOperator();
?>

<div class="main" style="margin-left: 150px;">

    <a href="tambah_operator.php" class="table-btn">
        <i class="fas fa-plus-circle">
            <span>Tambah Data</span>
        </i>
    </a>

    <table style="margin-top: 50px;">
        <tr class="head-table">
            <th class="col1">No</th>
            <th class="col2">Username</th>
            <th class="col2">Nama Petugas</th>
            <th class="col2" style="border-radius: 0px 10px 0px 0px;">Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach($data as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row['username']; ?></td>
            <!-- <td><?= $row['password']; ?></td> -->
            <td><?= $row['nama_petugas']; ?></td>
            <td>
                <a href="edit_operator.php?id=<?= $row['id_petugas']; ?>">
                    <button class="fas fa-pen"></button>
                </a>
                
                <a href="../../controllers/prosesOperator.php?id=<?= $row['id_petugas']; ?>&aksi=hapus" onclick="return confirm('Yakin ingin menghapus data?');">
                    <button class="fas fa-trash-alt"></button>
                </a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</div>