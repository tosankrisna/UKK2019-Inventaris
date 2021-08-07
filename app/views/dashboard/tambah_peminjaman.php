<?php
    require_once('../templates/navigate.php');
    require_once('../../init.php');

    $invent = new Inventarisir;

    if(isset($_POST['cari'])){
        $datapinjam = $invent->searchSingleData($_POST['caribarang']);
    }

?>

<div class="main">

    <div class="head-form-invent" style="width: 500px; position: absolute; margin: 10px 290px;">
        <p>Tambah Data</p>
    </div>
        
        <div class="form-tambah-pinjam" style="min-height: 45px; margin: 57px 290px; width: 500px; float: left;">
            <form action="" method="post" class="form-invent" style="padding: 10px 15px; margin-top: 10px;">
                <label style="display: block; margin-bottom: 5px;">
                    Cari Barang
                </label>
                <input type="text" name="caribarang" required oninvalid="this.setCustomValidity('Masukan kode barang!')" oninput="setCustomValidity('')" style="width: 430px; border: 1px solid #A9A9A9; margin: 0px; padding: 5px 5px;" placeholder="Masukan kode barang..." oninput="setCustomValidity('')" autocomplete="off">
                <button type="submit" id="caribrg" name="cari" value="Cari" class="btn-cari-brg" style="padding: 7.5px 10px;">
                    <i class="fas fa-search"></i>
                </button>
            </form>

            <form action="../../controllers/prosesPeminjaman.php" method="post" class="form-invent" id="listbrg" style="padding: 0px 15px;">
                <?php if(isset($_POST['cari'])){ ?>
                    <label for="" style="margin-right: 34px;">
                        Nama Barang
                    </label>
                        <input type="text" id="nama" value="<?= $datapinjam['nama']; ?>" name="nama_barang" required readonly autocomplete="off" style="display: inline; border: 1px solid #A9A9A9; padding: 0px 5px; height: 30px; margin-top: 7px; width: 462px;">
                    <label for="" style="margin-right: 60px;">
                        Stok Barang
                    </label>
                        <input type="number" id="stok" value="<?= $datapinjam['jumlah']; ?>" name="stok" required readonly style="width: 600px; display: inline; border: 1px solid #A9A9A9; padding: 0px 5px; height: 30px; margin-top: 7px; width: 462px;">
                        <input type="hidden" name="id_inventaris" value="<?= $datapinjam['id_inventaris']; ?>">
                <?php } ?>
                
                <label for="" style="margin-right: 60px;">
                    Jumlah Pinjam
                </label>
                <input type="number" name="jumlah" required oninvalid="this.setCustomValidity('Jumlah tidak boleh kosong!')" oninput="setCustomValidity('')" style="width: 600px; display: inline; border: 1px solid #A9A9A9; padding: 0px 5px; height: 30px; margin-top: 7px; width: 462px;">
                
                <label for="">
                    Tgl Pinjam
                </label>
                <input type="date" name="tgl_pinjam" style="width: 600px; display: inline; border: 1px solid #A9A9A9; padding: 0px 5px; height: 30px; margin-top: 7px; width: 462px;">

                <input type="hidden" name="status_pinjam" value="belum dikembalikan">
                <input type="hidden" name="pegawai" value="<?= $_SESSION['id_pegawai']; ?>">
                
                <input type="button" name="batal" value="Batal" style="margin-right: 6px;" onclick="history.go(-1);">
                <input type="submit" id="btntmbh" name="tambah" value="Pinjam Barang" style="margin: 10px 5px 20px 0px;">
            </form>
        </div>
</div>