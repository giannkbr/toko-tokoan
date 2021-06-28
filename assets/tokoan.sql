-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 28, 2021 at 07:45 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tokoan`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(3) NOT NULL,
  `id_pelanggan` int(3) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `rekening_pembayaran` varchar(30) DEFAULT NULL,
  `rekening_pelanggan` varchar(30) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `id_rekening` int(3) DEFAULT NULL,
  `tanggal_bayar` varchar(20) DEFAULT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(3) NOT NULL,
  `id_produk` int(3) NOT NULL,
  `judul_gambar` varchar(50) DEFAULT NULL,
  `gambar` varchar(50) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_produk`, `judul_gambar`, `gambar`, `tanggal_update`) VALUES
(17, 37, 'Semprotan2', 'Dashboard_(6)1.png', '2021-06-26 13:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `namaweb` varchar(50) NOT NULL,
  `tagline` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `id_user`, `namaweb`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `tanggal_update`) VALUES
(1, 0, 'Leather', 'Leather Oke', 'Leather@gmail.com', 'http://Leather.id', 'ok', 'ok', '6285850518483', 'Jl. M. H. Mas Mansyur, Thamrin City, 2nd Floor, Block E31 No. 3 Tanah Abang, Jakarta Pusat. 10240', 'https://www.facebook.com/Leather', 'https://instagram.com/Leather', 'ok', 'pngnih2.png', 'iconnih.png', '2020-08-07 13:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `id_merk` int(3) NOT NULL,
  `slug_merk` varchar(255) NOT NULL,
  `nama_merk` varchar(50) NOT NULL,
  `urutan` int(3) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id_merk`, `slug_merk`, `nama_merk`, `urutan`, `gambar`, `tanggal_update`) VALUES
(14, 'nike-adidas', 'Nike Adidas', 1, 'Dashboard_(6).png', '2021-06-26 12:18:48'),
(15, 'azpor-mahanna', 'Azpor Mahanna', 2, 'Dashboard_(7).png', '2021-06-26 12:29:55');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(3) NOT NULL,
  `status_pelanggan` varchar(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `status_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon`, `alamat`, `tanggal_daftar`, `tanggal_update`) VALUES
(11, 'Pending', 'Eza Ananda P', 'admin@gmail.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', '62838925148251', 'Jl. H. Mali Rt 10/01 No. 12 Kel. Duri Kosambi Kec. Cengkareng Jakarta Barat', '2020-07-15 13:37:44', '2020-07-15 11:37:44'),
(12, 'Pending', 'Meydina Rahmawati', 'admin2@gmail.com', '315f166c5aca63a157f7d41007675cb44a948b33', '6283892514825', 'Jl. Anggrek Cakra RT 04 / RW 06 Sukabumi Utara Kebon Jeruk Jakarta Barat', '2020-08-12 20:37:55', '2020-08-12 18:37:55'),
(13, 'Pending', 'tester  jjjj', 'tester@gmail.com', 'ab4d8d2a5f480a137067da17100271cd176607a1', '6282221628291', 'aaa', '2020-09-09 06:39:34', '2020-09-09 04:39:34'),
(14, 'Pending', 'test', 'test@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '6282221628291', '', '2020-09-09 07:13:40', '2020-09-09 05:13:40'),
(15, 'Pending', 'Virgian', 'akbar@gmail.com', 'ba4038f9c03b05fe25172940a6052d9e3634887b', '085850518483', 'Dusun Nawung, Rt 01/02\r\nDesa Tunggur, Kecamatan Lembeyan', '2021-06-25 19:32:58', '2021-06-25 17:32:58');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(3) NOT NULL,
  `id_users` int(3) NOT NULL,
  `id_merk` int(3) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(3) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `status_produk` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_users`, `id_merk`, `kode_produk`, `nama_produk`, `slug_produk`, `keterangan`, `harga`, `stok`, `gambar`, `status_produk`, `tanggal_post`, `tanggal_update`) VALUES
(37, 1, 15, 'S-212-232312', 'Semprotan Lalat', 'semprotan-lalat-s-212-232312', 'backend/produkbackend/produk', 40000, 2, 'Dashboard_(6).png', 'Publish', '2021-06-26 20:15:24', '2021-06-26 13:15:24');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(3) NOT NULL,
  `id_users` int(3) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `nomor_rekening` varchar(30) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `id_users`, `nama_bank`, `nomor_rekening`, `nama_pemilik`, `gambar`, `tanggal_post`) VALUES
(4, 4, 'BANK CNIB', '6546754765476', 'Andre', NULL, '2020-08-06 18:49:13'),
(5, 4, 'BANK KE', '4543456763', 'wert', NULL, '2020-08-06 18:49:41'),
(6, 1, 'BANK JAGO', '234234234', 'Egi Harsono', NULL, '2021-06-26 14:21:56');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(3) NOT NULL,
  `id_pelanggan` int(3) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_produk` int(3) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `transaksi` FOR EACH ROW BEGIN
	UPDATE produk SET stok = stok-NEW.jumlah
    WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `no_employee` char(18) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `gender` char(1) NOT NULL,
  `email` varchar(100) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(1) NOT NULL,
  `position_id` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `no_employee`, `nama`, `gender`, `email`, `photo`, `password`, `role_id`, `position_id`, `date_created`) VALUES
(1, '', 'Administrator', '', 'admin@gmail.com', NULL, '$2y$10$VqvV0UfbaEhwfR0v1nQUOOz0SY461B3Q41cwaHiqocwfN5uG9lUge', 1, 0, '2020-04-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_rekening` (`id_rekening`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id_merk`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`),
  ADD KEY `id_user` (`id_users`),
  ADD KEY `id_kategori` (`id_merk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD UNIQUE KEY `nomor_rekening` (`nomor_rekening`),
  ADD KEY `id_user` (`id_users`),
  ADD KEY `id_rekening` (`id_rekening`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `id_merk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD CONSTRAINT `header_transaksi_ibfk_3` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `header_transaksi_ibfk_4` FOREIGN KEY (`id_rekening`) REFERENCES `rekening` (`id_rekening`);

--
-- Constraints for table `gambar`
--
ALTER TABLE `gambar`
  ADD CONSTRAINT `gambar_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `header_transaksi_ibfk_2` FOREIGN KEY (`kode_transaksi`) REFERENCES `detail_transaksi` (`kode_transaksi`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`kode_transaksi`) REFERENCES `detail_transaksi` (`kode_transaksi`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
