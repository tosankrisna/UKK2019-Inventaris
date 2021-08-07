<?php
    require_once('../templates/navigate.php');
    require_once('../../init.php');

    $opr = new Operator;
    $id = $_GET['id'];

    $data = $opr->getOperator($id);
?>

<div class="main">

    <div class="form-tambah-invent" style="height: 360px;">
        <div class="head-form-invent">
            <p>Edit Data</p>
        </div>

        <form action="../../controllers/prosesOperator.php?aksi=update&id=<?= $data['id_petugas']; ?>" method="post" class="form-invent" style="padding: 25px 28px;">
            <label for="username" style="margin-right: 60px;">
                Username
            </label>
            <input type="text" name="username" value="<?= $data['username']; ?>" autocomplete="off" required oninvalid="this.setCustomValidity('Nama tidak boleh kosong!')" oninput="setCustomValidity('')">

            <label for="password" style="margin-right: 62px;">
                Password
            </label>
            <input type="password" name="password" value="<?= $data['password']; ?>" autocomplete="off" required oninvalid="this.setCustomValidity('Password tidak boleh kosong!')" oninput="setCustomValidity('')" style="width: 600px; display: inline; border: 1px solid #A9A9A9; margin-bottom: 15px; padding: 0px 5px; height: 30px;">

            <label for="" style="margin-right: 27px;">
                Nama Petugas
            </label>
            <input type="text" name="nama_petugas" value="<?= $data['nama_petugas']; ?>" autocomplete="off" required oninvalid="this.setCustomValidity('Nama petugas tidak boleh kosong!')" oninput="setCustomValidity('')" style="margin-bottom: 15px;">

            <label for="level" style="margin-right: 94px;">
                Level
            </label>
            <select name="level" id="">
                <option value="2">Operator</option>
            </select>
            
            <input type="button" name="batal" value="Batal" onclick="history.go(-1);" style="margin-right: 10px;">
            <input type="submit" name="tambah" value="Edit Data">
        </form>
    </div>
</div>