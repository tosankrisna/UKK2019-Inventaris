<?php
    session_start();

    $bulan = [
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
    ];

    $getbulan = $bulan[$_GET['bulan']];
    $jenis = $_GET['jenis'];
    $datalaporan = $_SESSION['data'];
    $total = $_SESSION['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Laporan</title>
</head>
<body>
    <div class="cetak">
        <span>
            <h1>Laporan <?= $jenis; ?></h1>
            <h2>Data Barang Bulan <?= $getbulan; ?></h2>
        </span>

        <table>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Peminjam</th>
                
                <?php if($jenis == 'peminjaman') { ?>
                <th style="width: 175px;">Tanggal Pinjam</th>

                <?php } elseif($jenis == 'pengembalian') { ?>
                <th style="width: 140px;">Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <?php } ?>

                <th style="width: 130px;">Status Pinjam</th>
                <th>Ruang</th>
                <th>Jumlah</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach($datalaporan as $row) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['nama_pegawai']; ?></td>

                <?php if($jenis == 'peminjaman') { ?>
                <td><?= date('d M Y', strtotime($row['tanggal_pinjam'])); ?></td>

                <?php } elseif($jenis == 'pengembalian') { ?>
                <td><?= date('d M Y', strtotime($row['tanggal_pinjam'])); ?></td>
                <td><?= date('d M Y', strtotime($row['tanggal_kembali'])); ?></td>
                <?php } ?>

                <td><?= $row['status_peminjaman']; ?></td>
                <td><?= $row['nama_ruang']; ?></td>
                <td><?= $row['jumlah']; ?></td>

            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
            
            <tr>
                <?php if($jenis == 'peminjaman') { ?>
                    <td colspan="6" style="font-weight: bold; padding: 10px 60px; font-size: 15px; text-align: left;">
                        TOTAL :
                    </td>
                    <td style="font-weight: bold; font-size: 15px;">
                        <?= $total['jumlah']; ?>
                    </td>
                <?php } elseif($jenis == 'pengembalian') { ?>
                    <td colspan="7" style="font-weight: bold; padding: 10px 60px; font-size: 15px; text-align: left;">
                        TOTAL :
                    </td>
                    <td style="font-weight: bold; font-size: 15px;">
                        <?= $total['jumlah']; ?>
                    </td>
                <?php } ?>
            </tr>
        </table>
    </div>
</body>

<script>
    window.print();
    window.history.back(-1);
</script>

</html>