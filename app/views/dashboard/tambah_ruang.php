<?php
    require_once('../templates/navigate.php');
?>

<div class="main">

    <div class="form-tambah-invent" style="height: 360px;">
        <div class="head-form-invent">
            <p>Tambah Data</p>
        </div>

        <form action="../../controllers/prosesRuangan.php?aksi=tambah" method="post" class="form-invent" style="padding: 25px 28px;">
            <label style="margin-right: 40px;">
                Kode Ruang
            </label>
            <input type="text" name="kode_ruang" autocomplete="off" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong!')" oninput="setCustomValidity('')">

            <label style="margin-right: 35px;">
                Nama Ruang
            </label>
            <input type="text" name="nama_ruang" autocomplete="off" required oninvalid="this.setCustomValidity('Password tidak boleh kosong!')" oninput="setCustomValidity('')" style="width: 600px; display: inline; border: 1px solid #A9A9A9; margin-bottom: 15px; padding: 0px 5px; height: 30px;">

            <label style="margin-right: 47px;">
                Keterangan
            </label>
            <textarea name="keterangan" id="" cols="30" rows="5"></textarea>

            <input type="button" name="batal" value="Kembali" onclick="history.go(-1);" style="margin-right: 10px;">
            <input type="submit" name="tambah" value="Tambah Data">
        </form>
    </div>
</div>