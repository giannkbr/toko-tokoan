-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2021 at 04:12 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `ongkir` varchar(50) DEFAULT NULL,
  `tanggal_bayar` varchar(20) DEFAULT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `id_pelanggan`, `nama_pelanggan`, `email`, `telepon`, `alamat`, `kode_transaksi`, `tanggal_transaksi`, `jumlah_transaksi`, `status_bayar`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_bayar`, `id_rekening`, `ongkir`, `tanggal_bayar`, `nama_bank`, `tanggal_post`, `tanggal_update`) VALUES
(1, 23, 'ads', 'ads@gmail.com', '62897598475', 'jl raya baru', 'RVE7AZ', '2021-07-01 00:00:00', 20000, 'Konfirmasi', 20000, '57866983', 'Ads', 'krl1.png', 6, NULL, '01-07-2021', 'BCA', '2021-07-01 19:44:49', '2021-07-01 12:44:49'),
(2, 25, 'sari', 'sari@gmail.com', '62897859475', 'jl raya ujung no 45', 'VUHCJ1', '2021-07-01 00:00:00', 40000, 'Konfirmasi', 40000, '576678687', 'Sari', 'pemkab.png', 6, NULL, '01-07-2021', 'Bank Jago', '2021-07-01 19:53:22', '2021-07-01 12:53:22'),
(3, 24, 'tester', 'tester123@gmail.com', '629098765456', 'kjbvhcfguihlj', 'YTI8JX', '2021-07-01 00:00:00', 60000, 'Konfirmasi', 60000, '87654567', 'hgssjxbjxbs', 'WIN_20200911_08_22_12_Pro2.jpg', 6, NULL, '01-07-2021', 'bank anu', '2021-07-01 19:59:42', '2021-07-01 12:59:42'),
(4, 25, 'sari', 'sari@gmail.com', '62897859475', 'jl raya ujung no 45', 'IE0XFY', '2021-07-01 00:00:00', 60000, 'Konfirmasi', 60000, '57689787', 'Sari', 'pemkap.png', 6, NULL, '01-07-2021', 'BCA', '2021-07-01 20:23:33', '2021-07-01 13:23:33'),
(5, 25, 'sari', 'sari@gmail.com', '62897859475', 'jl raya ujung no 45', 'LSCSCY', '2021-07-01 00:00:00', 30000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-01 20:55:16', '2021-07-01 13:55:16'),
(6, 28, 'egi', 'egi@gmail.com', '62789789574', 'jl raya bogor', '2NHAX6', '2021-07-01 00:00:00', 30000, 'Konfirmasi', 30000, '57897328', 'egi', 'krl2.png', 6, NULL, '01-07-2021', 'BCA', '2021-07-01 22:05:38', '2021-07-01 15:05:38'),
(7, 29, 'rio', 'rio@gmail.com', '627987987392', 'jl semangka', 'CE6J9R', '2021-07-05 00:00:00', 60000, 'Menunggu Konfirmasi', 60000, '57868736', 'Rio', 'Screen_Shot_2021-07-05_at_16_46_11.png', 6, NULL, '05-07-2021', 'Bank Mandiri', '2021-07-05 17:41:11', '2021-07-05 10:41:11'),
(8, 14, 'test', 'test@gmail.com', '6282221628291', 'kdckndcksnx', 'ONKG0I', '2021-07-05 00:00:00', 30000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-05 17:51:05', '2021-07-05 10:51:05'),
(9, 24, 'tester', 'tester123@gmail.com', '629098765456', 'kjbvhcfguihlj', 'UHFDPC', '2021-07-24 00:00:00', 120000, 'Konfirmasi', 126000, '9876545678', 'Ilham godchild', 'Adaptasi-Kebiasaan-Baru-Santri-Pondok-Pesantren-AlHasanah-Benteng-2-1040x6751.jpeg', 6, '6000', '24-07-2021', 'Bank Bca', '2021-07-24 14:16:51', '2021-07-24 07:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(3) NOT NULL,
  `id_produk` int(3) NOT NULL,
  `judul_gambar` varchar(50) DEFAULT NULL,
  `gambar` varchar(50) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_produk`, `judul_gambar`, `gambar`, `tanggal_update`) VALUES
(17, 37, 'Semprotan2', 'Dashboard_(6)1.png', '2021-06-26 13:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(3) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `gambar`, `tanggal_update`) VALUES
(14, 'cair', 'Cair', 'Kiwi-logo-ID.png', '2021-06-26 12:18:48'),
(20, 'krim', 'Krim', 'download1.png', '2021-07-01 13:11:55'),
(23, 'spray', 'spray', 'Sketchpad.png', '2021-07-24 08:39:39');

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
  `keywords` text,
  `metatext` text,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `deskripsi` text,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `id_user`, `namaweb`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `tanggal_update`) VALUES
(1, 0, 'Leather Care Shop', 'Rawat Bahan Kulit Mu', 'Leather@gmail.com', 'http://Leather.id', 'ok', 'ok', '6285850518483', '', 'https://www.facebook.com/Leather', 'https://instagram.com/Leather', 'ok', 'pngnih2.png', 'iconnih.png', '2020-08-07 13:17:56');

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
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `status_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon`, `alamat`, `tanggal_daftar`, `tanggal_update`) VALUES
(12, 'Pending', 'Meydina Rahmawati', 'admin2@gmail.com', '315f166c5aca63a157f7d41007675cb44a948b33', '6283892514825', 'Jl. Anggrek Cakra RT 04 / RW 06 Sukabumi Utara Kebon Jeruk Jakarta Barat', '2020-08-12 20:37:55', '2020-08-12 18:37:55'),
(13, 'Pending', 'tester  jjjj', 'tester@gmail.com', 'ab4d8d2a5f480a137067da17100271cd176607a1', '6282221628291', 'aaa', '2020-09-09 06:39:34', '2020-09-09 04:39:34'),
(14, 'Pending', 'test', 'test@gmail.com', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '6282221628291', '', '2020-09-09 07:13:40', '2020-09-09 05:13:40'),
(16, 'Pending', 'doni', 'doni@gmail.com', 'f6ab621081026b865129321a915b1310070c793b', '620785748879', 'jl walang sangit', '2021-06-30 22:11:57', '2021-06-30 15:11:57'),
(17, 'Pending', 'adi', 'adi@gmail.com', 'dfc87a8a900d23c665de66efee2248b6881b7771', '62980975458', 'jl raya barat', '2021-07-01 18:58:11', '2021-07-01 11:58:11'),
(23, 'Pending', 'ads', 'ads@gmail.com', '91a19bc26b70a4939941bb4f70b5cba44b6cbdc3', '62897598475', 'jl raya baru', '2021-07-01 19:05:28', '2021-07-01 12:05:28'),
(24, 'Pending', 'tester', 'tester123@gmail.com', 'ab4d8d2a5f480a137067da17100271cd176607a1', '629098765456', 'kjbvhcfguihlj', '2021-07-01 19:17:51', '2021-07-01 12:17:51'),
(25, 'Pending', 'sari', 'sari@gmail.com', '7ea56624ccdd741ac3ac60fbc8b1b1e063463efa', '62897859475', 'jl raya ujung no 45', '2021-07-01 19:52:48', '2021-07-01 12:52:48'),
(26, 'Pending', 'baba', 'baba@gmail.com', '899160ad6512ca92cf5590e6f3345bdb0809824d', '76543234567', 'uhgfythjku', '2021-07-01 20:20:15', '2021-07-01 13:20:15'),
(27, 'Pending', 'tio', 'tio@gmail.com', '940a1f5e1f6db32a2774f66e69cac31ba2aabe0c', '62987897549', 'jl utama raya', '2021-07-01 20:20:21', '2021-07-01 13:20:21'),
(28, 'Pending', 'egi', 'egi@gmail.com', '7eda0f3dd4b93b34247bd556703c1623c28aa489', '62789789574', 'jl raya bogor', '2021-07-01 22:04:54', '2021-07-01 15:04:54'),
(29, 'Pending', 'rio', 'rio@gmail.com', '13774352b79db3dd22b8a8dedf9403c69b2e6dbe', '627987987392', 'jl semangka', '2021-07-05 17:39:19', '2021-07-05 10:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(3) NOT NULL,
  `id_users` int(3) NOT NULL,
  `id_kategori` int(3) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(3) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `status_produk` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `terjual` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_users`, `id_kategori`, `kode_produk`, `nama_produk`, `slug_produk`, `keterangan`, `harga`, `stok`, `gambar`, `status_produk`, `tanggal_post`, `tanggal_update`, `terjual`) VALUES
(41, 1, 23, 'sd12', 'Mink Oil', 'mink-oil-sd12', 'Untuk bersihkan bagian depan sepatu', 60000, 8, 'images_(1).jpeg', 'Publish', '2021-07-01 20:12:42', '2021-07-01 13:12:42', NULL),
(42, 1, 14, 'Kiwi-1', 'Shoe Polish', 'shoe-polish-kiwi-1', 'Kilapkan sepatu', 30000, 7, 'BROWNPOLISH.jpg', 'Publish', '2021-07-01 20:54:21', '2021-07-01 13:54:21', NULL),
(45, 1, 20, 'WK2', 'Wakari Biopolish', 'wakari-biopolish-wk2', 'Biopolish Leather Care Natural Beeswax Polish merupakan cairan pembersih untuk perawatan produk-produk berbahan kulit asli, kulit sintetis, vinyl, karet dan lain-lain. Seperti jaket, tas, sepatu, jok dan interior mobil, sofa, leather goods dan leather furniture lainya.\r\n', 70000, 9, 'leather_cleaner_chemical_guys_eu_16_oz_473ml_1.jpg', 'Publish', '2021-07-05 20:46:55', '2021-07-05 13:46:55', NULL);

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
  `tanggal_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `id_users`, `nama_bank`, `nomor_rekening`, `nama_pemilik`, `gambar`, `tanggal_post`) VALUES
(4, 1, 'BANK BRI', '6546754765476', 'Egi Harsono', NULL, '2020-08-06 18:49:13'),
(5, 1, 'BANK Mandiri', '5789707074047390', 'Egi Harsono', NULL, '2020-08-06 18:49:41'),
(6, 1, 'BANK BCA', '5820201975', 'Egi Harsono', NULL, '2021-06-26 14:21:56');

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
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pelanggan`, `kode_transaksi`, `id_produk`, `harga`, `jumlah`, `total_harga`, `tanggal_transaksi`, `tanggal_update`) VALUES
(1, 23, 'RVE7AZ', 0, 20000, 1, 20000, '2021-07-01 00:00:00', '2021-07-01 12:44:49'),
(2, 25, 'VUHCJ1', 37, 40000, 1, 40000, '2021-07-01 00:00:00', '2021-07-01 12:53:22'),
(3, 24, 'YTI8JX', 0, 20000, 1, 20000, '2021-07-01 00:00:00', '2021-07-01 12:59:42'),
(4, 24, 'YTI8JX', 37, 40000, 1, 40000, '2021-07-01 00:00:00', '2021-07-01 12:59:42'),
(5, 25, 'IE0XFY', 41, 60000, 1, 60000, '2021-07-01 00:00:00', '2021-07-01 13:23:33'),
(6, 25, 'LSCSCY', 42, 30000, 1, 30000, '2021-07-01 00:00:00', '2021-07-01 13:55:16'),
(7, 28, '2NHAX6', 42, 30000, 1, 30000, '2021-07-01 00:00:00', '2021-07-01 15:05:38'),
(8, 29, 'CE6J9R', 41, 60000, 1, 60000, '2021-07-05 00:00:00', '2021-07-05 10:41:11'),
(9, 14, 'ONKG0I', 42, 30000, 1, 30000, '2021-07-05 00:00:00', '2021-07-05 10:51:05'),
(10, 24, 'UHFDPC', 45, 70000, 1, 70000, '2021-07-24 00:00:00', '2021-07-24 07:16:51'),
(11, 24, 'UHFDPC', 44, 50000, 1, 50000, '2021-07-24 00:00:00', '2021-07-24 07:16:52');

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
  `username` varchar(100) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(1) NOT NULL,
  `position_id` int(11) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `no_employee`, `nama`, `gender`, `username`, `photo`, `password`, `role_id`, `position_id`, `date_created`) VALUES
(1, '', 'Administrator', '', 'admin', NULL, '$2y$10$VqvV0UfbaEhwfR0v1nQUOOz0SY461B3Q41cwaHiqocwfN5uG9lUge', 1, 0, '2020-04-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD KEY `id_detail_transaksi` (`id_detail_transaksi`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD KEY `id_gambar` (`id_gambar`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD KEY `id_merk` (`id_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD KEY `id_rekening` (`id_rekening`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
