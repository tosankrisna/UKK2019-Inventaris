<?php 
    require_once('../templates/navigate.php');
    require_once('../../init.php');

    $invent = new Inventarisir;
    $data = $invent->viewInventarisir();
    if(isset($_POST['submit'])){
        $data = $invent->searchInventarisir($_POST['cari']);
    }
?>

<div class="main">

    <a href="tambah_inventarisir.php" class="table-btn" style="margin-top: 10px; margin-left: 5px;">
        <i class="fas fa-plus-circle">
            <span>Tambah Data</span>
        </i>
    </a>

    <form action="" method="post">
        <input type="text" name="cari" class="cari" placeholder="Masukan kode barang..." autocomplete="off">
        <button type="submit" name="submit" class="btn-cari">
            <i class="fas fa-search"></i>
        </button>
    </form>

    <table style="margin-top: 60px;">
        <tr class="head-table">
            <th class="col1">No</th>
            <th class="col2">Nama</th>
            <th class="col5">Keterangan</th>
            <th class="col4">Kondisi</th>
            <th class="col5">Jumlah</th>
            <th class="col3">Jenis</th>
            <th class="col7">Tgl Register</th>
            <th class="col3">Ruang</th>
            <th class="col9">Aksi</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach($data as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $row['nama']; ?></td>
            <td><?= $row['keterangan']; ?></td>
            <td><?= $row['kondisi']; ?></td>

            <td><?= $row['jumlah']; ?></td>
            <td><?= $row['nama_jenis']; ?></td>
            <td><?= date("d M Y", strtotime($row['tanggal_register'])); ?></td>
            <td><?= $row['nama_ruang'] ?></td>
            <td>
                <a href="edit_inventarisir.php?id=<?= $row['id_inventaris']; ?>">
                    <button class="fas fa-pen"></button>
                </a>
                
                <a href="../../controllers/prosesInventarisir.php?id=<?= $row['id_inventaris']; ?>&aksi=hapus" onclick="return confirm('Yakin ingin menghapus data?');">
                    <button class="fas fa-trash-alt"></button>
                </a>
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>
    </table>
</div>