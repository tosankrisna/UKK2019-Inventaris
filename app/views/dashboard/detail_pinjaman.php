<?php
    require_once '../templates/navigate.php';
    require_once '../../init.php';

    $pinjam = new Peminjaman;
    $id = $_GET['id'];
    $data = $pinjam->viewDetailPinjaman($id);
?>

<div class="main">

    <div class="form-tambah-invent" style="height: 540px;">
        <div class="head-form-invent">
            <p>Detail Pinjaman</p>
        </div>

        <form action="../../controllers/prosesPengembalian.php?aksi=pengembalian&id_pinjam=<?= $data['id_peminjaman']; ?>&id_invent=<?= $data['id_inventaris']; ?>" method="post" class="form-invent" style="padding: 25px 28px;">
            <label style="margin-right: 35px;">
                Nama Barang
            </label>
            <input type="text" name="nama_barang" value="<?= $data['nama']; ?>" readonly>

            <label style="margin-right: 62px;">
                Peminjam
            </label>
            <input type="text" name="peminjam" value="<?= $data['nama_pegawai']; ?>" readonly style="width: 600px; display: inline; border: 1px solid #A9A9A9; margin-bottom: 10px; padding: 0px 5px; height: 30px;">
 
            <label style="margin-right: 81px;">
                Kondisi
            </label>
            <input type="text" name="kondisi" value="<?= $data['kondisi']; ?>" readonly style="width: 600px; display: inline; border: 1px solid #A9A9A9; margin-bottom: 10px; padding: 0px 5px; height: 30px;">

            <label style="margin-right: 58px;">
                Tgl Pinjam
            </label>
            <input type="text" name="tgl_pinjam" value="<?= date('d M Y', strtotime($data['tanggal_pinjam'])); ?>" readonly style="width: 600px; display: inline; border: 1px solid #A9A9A9; margin-bottom: 10px; padding: 0px 5px; height: 30px;">
            
            <label style="margin-right: 84px;">
                Jumlah
            </label>
            <input type="text" name="jumlah" value="<?= $data['jumlahpinjam']; ?>" readonly style="width: 600px; display: inline; border: 1px solid #A9A9A9; margin-bottom: 10px; padding: 0px 5px; height: 30px;">
            
            <label style="margin-right: 99px;">
                Jenis
            </label>
            <input type="text" name="jenis" value="<?= $data['nama_jenis']; ?>" readonly style="width: 600px; display: inline; border: 1px solid #A9A9A9; margin-bottom: 10px; padding: 0px 5px; height: 30px;">
            
            <label style="margin-right: 86px;">
                Ruang
            </label>
            <input type="text" name="ruang" value="<?= $data['nama_ruang']; ?>" readonly style="width: 600px; display: inline; border: 1px solid #A9A9A9; margin-bottom: 10px; padding: 0px 5px; height: 30px;">

            <label style="margin-right: 16px;">
                Status Pinjaman
            </label>
            <input type="text" name="status_pinjaman" value="<?= $data['status_peminjaman']; ?>" readonly style="width: 600px; display: inline; border: 1px solid #A9A9A9; margin-bottom: 10px; padding: 0px 5px; height: 30px;">
            
            <input type="hidden" name="status_kembali" value="sudah dikembalikan">
            
            <input type="button" name="batal" value="Kembali" onclick="history.go(-1);" style="margin-right: 10px;">
            
            <?php if($_SESSION['nama_level'] == 'petugas') { ?>
                <input type="submit" name="tambah" value="Ubah Status">
            <?php } ?>
        </form>
    </div>
</div>