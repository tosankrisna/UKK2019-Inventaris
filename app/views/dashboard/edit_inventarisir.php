<?php
    require_once('../templates/navigate.php');
    require_once('../../init.php');
    
    $id = $_GET['id'];
    $invent = new Inventarisir;
    $data = $invent->viewEdit($id);
?>

<div class="main">

    <div class="form-tambah-invent" style="height: 580px;">
        <div class="head-form-invent">
            <p>Edit Data</p>
        </div>

        <form action="../../controllers/prosesInventarisir.php?aksi=update&id=<?= $data['id_inventaris']; ?>" method="post" class="form-invent">
            <input type="hidden" name="id_inventaris" value="<?= $id; ?>">    

            <label for="" style="margin-right: 79px;">
                Nama
            </label>
            <input type="text" name="nama" autocomplete="off" value="<?= $data['nama']; ?>" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong!')" oninput="setCustomValidity('')">

            <label for="" style="margin-right: 70px;">
                Kondisi
            </label>
            <select name="kondisi" id="">
                <?php if($data['kondisi'] == 'baik') { ?>
                    <option value="baik">Baik</option>
                    <option value="rusak">Rusak</option>
                <?php } else if($data['kondisi'] == 'rusak') { ?> 
                    <option value="rusak">Rusak</option>
                    <option value="baik">Baik</option>
                <?php } ?>
            </select>

            <label for="" style="margin-right: 40px;">
                Keterangan
            </label>
            <textarea name="keterangan" cols="30" rows="5"><?= $data['keterangan']; ?></textarea>

            <label for="jumlah" style="margin-right: 73px;">
                Jumlah
            </label>
            <input type="number" name="jumlah" autocomplete="off" value="<?= $data['jumlah']; ?>" required oninvalid="this.setCustomValidity('Jumlah tidak boleh kosong!')" oninput="setCustomValidity('')">

            <label for="" style="margin-right: 88px;">
                Jenis
            </label>
            <select name="jenis" id="">
                <?php if($data['id_jenis'] == 1) { ?>
                    <option value="1">Printer</option>
                    <option value="2">Laptop</option>
                    <option value="3">Buku</option>
                    <option value="4">Alat Kebersihan</option>
                <?php } else if($data['id_jenis'] == 2) { ?> 
                    <option value="2">Laptop</option>
                    <option value="3">Buku</option>
                    <option value="4">Alat Kebersihan</option>
                    <option value="1">Printer</option>
                <?php } else if($data['id_jenis'] == 3) { ?>
                    <option value="3">Buku</option>
                    <option value="4">Alat Kebersihan</option>
                    <option value="1">Printer</option>
                    <option value="2">Laptop</option>
                <?php } else if($data['id_jenis'] == 4) { ?>
                    <option value="4">Alat Kebersihan</option>
                    <option value="1">Printer</option>
                    <option value="2">Laptop</option>
                    <option value="3">Buku</option>
                <?php } ?>
            </select>

            <label for="" style="margin-right: 37px;">
                Tgl Register
            </label>
            <input type="date" name="tgl_register" id="tgl" value="<?= $data['tanggal_register']; ?>" required oninvalid="this.setCustomValidity('Tanggal tidak boleh kosong!')" oninput="setCustomValidity('')" autocomplete="off">

            <label for="" style="margin-right: 75px;">
                Ruang
            </label>
            <select name="ruang" id="">
                <?php if($data['id_ruang'] == 1) { ?>
                    <option value="1">Tata Usaha</option>
                    <option value="2">Perpustakaan</option>
                    <option value="3">Lab Komputer</option>
                    <option value="4">Gudang</option>
                <?php } else if($data['id_ruang'] == 2) { ?> 
                    <option value="2">Perpustakaan</option>
                    <option value="3">Lab Komputer</option>
                    <option value="4">Gudang</option>
                    <option value="1">Tata Usaha</option>
                <?php } else if($data['id_ruang'] == 3) { ?>
                    <option value="3">Lab Komputer</option>
                    <option value="4">Gudang</option>
                    <option value="1">Tata Usaha</option>
                    <option value="2">Perpustakaan</option>
                <?php } else if($data['id_ruang'] == 4) { ?>
                    <option value="4">Gudang</option>
                    <option value="1">Tata Usaha</option>
                    <option value="2">Perpustakaan</option>
                    <option value="3">Lab Komputer</option>
                <?php } ?> 
            </select>

            <label for="" style="margin-right: 11px;">
                Kode Inventaris
            </label>
            <input type="text"  maxlength="18" name="kode_inventaris" value="<?= $data['kode_inventaris']; ?>" required oninvalid="this.setCustomValidity('Kode inventaris tidak boleh kosong!')" oninput="setCustomValidity('')" autocomplete="off">

            <input type="hidden" name="petugas" value="1" id="">
            
            <input type="button" name="batal" value="Batal" onclick="history.go(-1);">
            <input type="submit" name="tambah" value="Edit Data">
        </form>
    </div>
</div>