<?php
    require_once('../templates/navigate.php');
    require_once('../../init.php');

    $pnj = new Peminjam;
    $id = $_GET['id'];

    $data = $pnj->getPeminjam($id);
?>

<div class="main">

    <div class="form-tambah-invent" style="height: 400px;">
        <div class="head-form-invent">
            <p>Edit Data</p>
        </div>

        <form action="../../controllers/prosesPeminjam.php?aksi=update&id=<?= $data['id_pegawai']; ?>" method="post" class="form-invent" style="padding: 25px 28px;">
            <label for="namapeminjam" style="margin-right: 20px;">
                Nama Peminjam
            </label>
            <input type="text" name="namapeminjam" value="<?= $data['nama_pegawai']; ?>" autocomplete="off" required oninvalid="this.setCustomValidity('Nama pegawai tidak boleh kosong!')" oninput="setCustomValidity('')">

            <label for="nip" style="margin-right: 110px;">
                NIP
            </label>
            <input type="text" name="nip" value="<?= $data['nip']; ?>" autocomplete="off" required oninvalid="this.setCustomValidity('NIP tidak boleh kosong!')" oninput="setCustomValidity('')" style="width: 600px; display: inline; border: 1px solid #A9A9A9; margin-bottom: 5px; padding: 0px 5px; height: 30px;">

            <label for="" style="margin-right: 65px;">
                Password
            </label>
            <input type="password" name="password" value="<?= $data['password']; ?>" autocomplete="off" required oninvalid="this.setCustomValidity('Password petugas tidak boleh kosong!')" oninput="setCustomValidity('')" style="width: 600px; display: inline; border: 1px solid #A9A9A9; margin-bottom: 15px; padding: 0px 5px; height: 30px;">

            <label for="alamat" style="margin-right: 85px;">
                Alamat
            </label>
            <textarea name="alamat" id="" cols="30" rows="5"><?= $data['alamat']; ?></textarea>
            
            <input type="button" name="batal" value="Batal" onclick="history.go(-1);" style="margin-right: 10px;">
            <input type="submit" name="tambah" value="Edit Data">
        </form>
    </div>
</div>