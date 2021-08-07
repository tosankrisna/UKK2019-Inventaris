<?php
    require_once('../templates/navigate.php');
?>

<div class="main">

    <div class="form-tambah-invent" style="height: 400px;">
        <div class="head-form-invent">
            <p>Tambah Data</p>
        </div>

        <form action="../../controllers/prosesPeminjam.php?aksi=tambah" method="post" class="form-invent" style="padding: 25px 28px;">
            <label for="namapeminjam" style="margin-right: 20px;">
                Nama Peminjam
            </label>
            <input type="text" name="namapeminjam" autocomplete="off" required oninvalid="this.setCustomValidity('Nama pegawai tidak boleh kosong!')" oninput="setCustomValidity('')">

            <label for="nip" style="margin-right: 110px;">
                NIP
            </label>
            <input type="number" name="nip" autocomplete="off" required oninvalid="this.setCustomValidity('NIP tidak boleh kosong!')" oninput="setCustomValidity('')" style="width: 600px; display: inline; border: 1px solid #A9A9A9; margin-bottom: 5px; padding: 0px 5px; height: 30px;">

            <label for="" style="margin-right: 65px;">
                Password
            </label>
            <input type="password" name="password" autocomplete="off" required oninvalid="this.setCustomValidity('Password petugas tidak boleh kosong!')" oninput="setCustomValidity('')" style="width: 600px; display: inline; border: 1px solid #A9A9A9; margin-bottom: 15px; padding: 0px 5px; height: 30px;">

            <label for="alamat" style="margin-right: 85px;">
                Alamat
            </label>
            <textarea name="alamat" id="" cols="30" rows="5"></textarea>
            
            <input type="button" name="batal" value="Batal" onclick="history.go(-1);" style="margin-right: 10px;">
            <input type="submit" name="tambah" value="Tambah Data">
        </form>
    </div>
</div>