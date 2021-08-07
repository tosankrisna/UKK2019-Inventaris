<?php
    require_once '../templates/navigate.php';
?>

<div class="main">

    <div class="form-tambah-invent" style="height: 360px; width: 500px; margin: 30px 275px;">
        <div class="head-form-invent" style="width: 500px;">
            <p>Buat Laporan</p>
        </div>

        <form action="../../controllers/prosesLaporan.php" method="get" class="form-invent" style="padding: 25px 28px;">
            <label>Jenis Laporan</label>
            <select name="jenis" style="margin: 10px 0px; height: 35px; width: 440px;">
                <option value="peminjaman">Peminjaman</option>
                <option value="pengembalian">Pengembalian</option>
            </select>

            <label>Bulan</label>
            <select name="bulan" style="margin: 10px 0px; height: 35px; width: 440px;">
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
    
            <input type="submit" name="cetak" value="Cetak Laporan" style="padding: 10px; width: 440px; margin-top: 20px;">
        </form>
    </div>
</div>