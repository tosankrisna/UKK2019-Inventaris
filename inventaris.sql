-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 17 Jun 2019 pada 14.04
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `SPtampiljenis` ()  SELECT id_jenis, nama_jenis FROM jenis$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPtampilpeminjam` ()  BEGIN
	SELECT * FROM pegawai;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPtampilpetugas` ()  BEGIN
	SELECT * FROM petugas WHERE id_level = 2;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `SPtampilruang` ()  SELECT * from ruang$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `id_detail_pinjam` int(11) NOT NULL,
  `id_inventaris` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `jumlah` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pinjam`
--

INSERT INTO `detail_pinjam` (`id_detail_pinjam`, `id_inventaris`, `id_peminjaman`, `jumlah`) VALUES
(82, 8, 96, 1),
(83, 6, 97, 1),
(84, 2, 98, 1),
(85, 2, 99, 1),
(86, 4, 100, 1),
(87, 8, 102, 1),
(88, 6, 103, 1),
(89, 9, 104, 1),
(90, 6, 105, 1),
(91, 2, 106, 1),
(92, 1, 107, 1),
(93, 4, 108, 1),
(94, 9, 109, 1),
(95, 2, 110, 1),
(96, 8, 111, 2),
(97, 4, 113, 1),
(98, 2, 112, 2),
(99, 8, 96, 4),
(100, 9, 97, 1),
(101, 4, 114, 1),
(102, 4, 115, 1),
(103, 1, 118, 1);

--
-- Trigger `detail_pinjam`
--
DELIMITER $$
CREATE TRIGGER `peminjaman` AFTER INSERT ON `detail_pinjam` FOR EACH ROW UPDATE inventaris SET jumlah = jumlah - NEW.jumlah
WHERE id_inventaris = NEW.id_inventaris
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE `inventaris` (
  `id_inventaris` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kondisi` varchar(25) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `tanggal_register` date NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `kode_inventaris` varchar(18) NOT NULL,
  `id_petugas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`id_inventaris`, `nama`, `kondisi`, `keterangan`, `jumlah`, `id_jenis`, `tanggal_register`, `id_ruang`, `kode_inventaris`, `id_petugas`) VALUES
(1, 'Canon IP2770', 'baik', 'baik ', 6, 1, '2019-02-05', 1, 'BRG201902053310980', 1),
(2, 'Acer Aspire E5', 'baik', 'baik', 13, 2, '2019-02-04', 3, 'BRG201902042009819', 1),
(4, 'LKS Bahasa Indonesia', 'baik', 'baik', 46, 3, '2019-03-15', 2, 'BRG201903150887809', 1),
(6, 'Lap Kanebo', 'baik', 'baik', 23, 4, '2019-03-31', 4, 'BRG201903319987008', 1),
(8, 'LKS Agama Hindu ', 'baik', 'baik', 17, 3, '2019-03-31', 2, 'BRG201903310098993', 1),
(9, 'Kemoceng', 'baik', 'baik', 19, 4, '2019-03-31', 4, 'BRG201903319887500', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `kode_jenis` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `kode_jenis`, `keterangan`) VALUES
(1, 'Printer', 1, 'baik'),
(2, 'Laptop', 2, 'baik'),
(3, 'Buku', 3, 'baik'),
(4, 'Alat Kebersihan', 4, 'baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `nip` int(18) NOT NULL,
  `password` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `nip`, `password`, `alamat`) VALUES
(1, 'Adi Saputra', 2028178977, 'adisptra', 'kesiman kertalangu'),
(3, 'Aditya Putra', 1112098890, 'adit13', 'Jalan Raya Ungasan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `status_peminjaman` varchar(25) NOT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tanggal_pinjam`, `tanggal_kembali`, `status_peminjaman`, `id_pegawai`) VALUES
(96, '2019-04-07', '2019-04-08', 'sudah dikembalikan', 1),
(97, '2019-04-07', '2019-04-10', 'sudah dikembalikan', 1),
(98, '2019-04-07', '2019-04-07', 'sudah dikembalikan', 1),
(99, '2019-04-07', '2019-04-07', 'sudah dikembalikan', 1),
(100, '2019-04-07', '2019-04-07', 'sudah dikembalikan', 1),
(102, '2019-04-07', '2019-04-07', 'sudah dikembalikan', 1),
(103, '2019-04-07', '2019-04-07', 'sudah dikembalikan', 1),
(104, '2019-04-07', '2019-04-08', 'sudah dikembalikan', 3),
(105, '2019-04-07', '2019-04-07', 'sudah dikembalikan', 3),
(106, '2019-04-08', '2019-04-08', 'sudah dikembalikan', 3),
(107, '2019-04-08', '2019-04-08', 'sudah dikembalikan', 3),
(108, '2019-04-08', '2019-04-08', 'sudah dikembalikan', 3),
(109, '2019-04-08', '2019-04-08', 'sudah dikembalikan', 3),
(110, '2019-04-08', '2019-04-08', 'sudah dikembalikan', 1),
(111, '2019-04-08', '2019-04-08', 'sudah dikembalikan', 1),
(112, '2019-04-08', '2019-04-08', 'sudah dikembalikan', 3),
(113, '2019-04-08', '2019-04-08', 'sudah dikembalikan', 3),
(114, '2019-04-10', '2019-04-10', 'sudah dikembalikan', 1),
(115, '2019-04-10', '2019-04-10', 'sudah dikembalikan', 1),
(118, '2019-04-10', '0000-00-00', 'belum dikembalikan', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `id_level`) VALUES
(1, 'admin', 'admin', 'admin', 1),
(7, 'operator', 'operator', 'Gede hartawan', 2),
(10, 'gedeari', 'gede13', 'gede ari', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(11) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL,
  `kode_ruang` varchar(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `kode_ruang`, `keterangan`) VALUES
(1, 'Tata Usaha', 'RNG10010010', 'baik'),
(2, 'Perpustakaan', 'RNG10020011', 'baik'),
(3, 'Lab Komputer', 'RNG10030012', 'baik'),
(4, 'Gudang', 'RNG10040013', 'baik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD PRIMARY KEY (`id_detail_pinjam`),
  ADD KEY `id_inventaris` (`id_inventaris`),
  ADD KEY `id_peminjaman` (`id_peminjaman`);

--
-- Indexes for table `inventaris`
--
ALTER TABLE `inventaris`
  ADD PRIMARY KEY (`id_inventaris`),
  ADD KEY `keterangan` (`keterangan`),
  ADD KEY `id_ruang` (`id_ruang`,`id_petugas`),
  ADD KEY `id_jenis` (`id_jenis`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_pegawai` (`id_pegawai`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`),
  ADD KEY `nama_ruang` (`nama_ruang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  MODIFY `id_detail_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `inventaris`
--
ALTER TABLE `inventaris`
  MODIFY `id_inventaris` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD CONSTRAINT `detail_pinjam_ibfk_1` FOREIGN KEY (`id_inventaris`) REFERENCES `inventaris` (`id_inventaris`),
  ADD CONSTRAINT `detail_pinjam_ibfk_2` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`);

--
-- Ketidakleluasaan untuk tabel `inventaris`
--
ALTER TABLE `inventaris`
  ADD CONSTRAINT `inventaris_ibfk_1` FOREIGN KEY (`id_jenis`) REFERENCES `jenis` (`id_jenis`),
  ADD CONSTRAINT `inventaris_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`),
  ADD CONSTRAINT `inventaris_ibfk_3` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`);

--
-- Ketidakleluasaan untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD CONSTRAINT `petugas_ibfk_1` FOREIGN KEY (`id_level`) REFERENCES `level` (`id_level`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
