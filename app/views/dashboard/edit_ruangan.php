<?php
    require_once('../templates/navigate.php');
    require_once('../../init.php');

    $rng = new Ruangan;
    $id = $_GET['id'];

    $data = $rng->getRuangan($id);
?>

<div class="main">

    <div class="form-tambah-invent" style="height: 360px;">
        <div class="head-form-invent">
            <p>Edit Data</p>
        </div>

        <form action="../../controllers/prosesRuangan.php?aksi=update&id=<?= $data['id_ruang']; ?>" method="post" class="form-invent" style="padding: 25px 28px;">
            <label for="username" style="margin-right: 43px;">
                Kode Ruang
            </label>
            <input type="text" name="kode_ruang" value="<?= $data['kode_ruang']; ?>" autocomplete="off" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong!')" oninput="setCustomValidity('')">

            <label style="margin-right: 37px;">
                Nama Ruang
            </label>
            <input type="text" name="nama_ruang" value="<?= $data['nama_ruang']; ?>" autocomplete="off" required oninvalid="this.setCustomValidity('Password tidak boleh kosong!')" oninput="setCustomValidity('')" style="width: 600px; display: inline; border: 1px solid #A9A9A9; margin-bottom: 15px; padding: 0px 5px; height: 30px;">

            <label for="" style="margin-right: 50px;">
                Keterangan
            </label>
            <textarea name="keterangan" id="" cols="30" rows="5"><?= $data['keterangan']; ?></textarea>
            
            <input type="button" name="batal" value="Batal" onclick="history.go(-1);" style="margin-right: 10px;">
            <input type="submit" name="tambah" value="Edit Data">
        </form>
    </div>
</div>