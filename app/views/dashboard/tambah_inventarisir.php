<?php
    require_once '../templates/navigate.php';
    require_once '../../init.php';

    $invent = new Inventarisir;
    $rng = new Ruangan;
?>

<div class="main">

    <div class="form-tambah-invent">
        <div class="head-form-invent">
            <p>Tambah Data</p>
        </div>

        <form action="../../controllers/prosesInventarisir.php?aksi=tambah" method="post" class="form-invent">
            <label for="" style="margin-right: 79px;">
                Nama
            </label>
            <input type="text" name="nama" autocomplete="off" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong!')" oninput="setCustomValidity('')">

            <label for="" style="margin-right: 70px;">
                Kondisi
            </label>
            <select name="kondisi" id="">
                <option value="baik">Baik</option>
                <option value="rusak">Rusak</option>
            </select>

            <label for="" style="margin-right: 40px;">
                Keterangan
            </label>
            <textarea name="keterangan" cols="30" rows="5"></textarea>

            <label for="jumlah" style="margin-right: 73px;">
                Jumlah
            </label>
            <input type="number" name="jumlah" autocomplete="off" required oninvalid="this.setCustomValidity('Jumlah tidak boleh kosong!')" oninput="setCustomValidity('')">

            <label for="" style="margin-right: 88px;">
                Jenis
            </label>
            <select name="jenis" id="">
                <?php $data = $invent->viewJenis(); ?>
                <?php foreach($data as $row) : ?>
                    <option value="<?= $row['id_jenis'] ?>"><?= $row['nama_jenis']; ?></option>
                <?php endforeach; ?>
            </select>

            <label for="" style="margin-right: 37px;">
                Tgl Register
            </label>
            <input type="date" name="tgl_register" id="tgl" autocomplete="off" required oninvalid="this.setCustomValidity('Tanggal tidak boleh kosong!')" oninput="setCustomValidity('')">

            <label for="" style="margin-right: 75px;">
                Ruang
            </label>
            <select name="ruang" id="">
                <?php $data = $rng->viewRuangan(); ?>
                <?php foreach($data as $row) : ?>
                    <option value="<?= $row['id_ruang'] ?>"><?= $row['nama_ruang']; ?></option>
                <?php endforeach; ?>   
            </select>

            <label for="" style="margin-right: 11px;">
                Kode Inventaris
            </label>
            <input type="text" name="kode_inventaris" maxlength="18" autocomplete="off" required oninvalid="this.setCustomValidity('Kode inventaris tidak boleh kosong!')" oninput="setCustomValidity('')">

            <input type="hidden" name="petugas" value="1">
            
            <input type="button" name="batal" value="Batal" onclick="history.go(-1);">
            <input type="submit" name="tambah" value="Tambah Data">
        </form>
    </div>
</div>