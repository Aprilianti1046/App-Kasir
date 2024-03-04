-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 02:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `ahmad`
--

CREATE TABLE `ahmad` (
  `id_suplier` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `nama_suplier` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ahmad`
--

INSERT INTO `ahmad` (`id_suplier`, `nama_barang`, `harga_beli`, `nama_suplier`, `kategori`) VALUES
(1, 'Kue Sagu', 27000, 'Ahmad', 'Kue Kering'),
(2, 'Kue Kacang', 27000, 'Ahmad', 'Kue Kering'),
(3, 'Kue Nastar', 32000, 'Ahmad', 'Kue kering'),
(4, 'Kue Lidah Kucing', 27000, 'Ahmad', 'Kue Kering'),
(5, 'Cokelat Chip Cookies', 37000, 'Ahmad', 'Kue Kering');

-- --------------------------------------------------------

--
-- Table structure for table `barang_suplier`
--

CREATE TABLE `barang_suplier` (
  `id_barang_suplier` int(11) NOT NULL,
  `nama_suplier` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_suplier`
--

INSERT INTO `barang_suplier` (`id_barang_suplier`, `nama_suplier`, `nama_barang`, `kategori`, `harga`) VALUES
(1, 'Ahmad', 'Kue Sagu', 'Kue Kering', '27000'),
(2, 'Ahmad', 'Kue Nastar', 'Kue Kering', '32000'),
(3, 'Ahmad', 'Kue Kacang', 'Kue Kering', '27000'),
(4, 'Ahmad', 'Kue Lidah Kucing', 'Kue Kering', '27000'),
(5, 'Ahmad', 'Cokelat Chip Cookies', 'Kue Kering', '37000'),
(6, 'Maman', 'Kue Pukis', 'Kue Basah', '3000'),
(7, 'Maman', 'Bolu Kukus', 'Kue Basah', '4000'),
(8, 'Maman', 'Banana Roll Cake', 'Kue Basah', '4000'),
(9, 'Maman', 'Brownies', 'Kue Basah', '27000'),
(10, 'Maman', 'Lapis Legit', 'Kue Basah', '27000'),
(11, 'Rangga', 'Mini Cake', 'Kue Ulang Tahun', '27000'),
(12, 'Rangga', 'Black Forest', 'Kue Ulang Tahun', '84000'),
(13, 'Rangga', 'Fruit Fair Cake', 'Kue Ulang Tahun', '90000'),
(14, 'Rangga', 'Chocolate Cake', 'Kue Ulang Tahun', '130000'),
(15, 'Rangga', 'Cheese Cake', 'Kue Ulang Tahun', '15000');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `id_detail_beli` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail_penjualan` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail_penjualan`, `kategori`, `nama_produk`, `qty`, `harga_beli`, `harga_jual`, `created_at`) VALUES
(11, 'Kerupuk', 'Kerupuk Pilus Pedas', 0, 4000, 5000, '2024-02-21 01:13:44'),
(12, 'Kerupuk', 'Kerupuk Pilus Pedas', 0, 4000, 5000, '2024-02-21 01:37:32'),
(13, 'Kerupuk ', 'Kerupuk Pilus Ori', 0, 4000, 5000, '2024-02-21 01:37:32'),
(14, 'Kerupuk', 'Kerupuk Polong', 0, 4000, 5000, '2024-02-21 01:39:09'),
(15, 'Kerupuk', 'Kerupuk Tempe', 0, 4000, 5000, '2024-02-21 01:39:09'),
(16, 'Kerupuk', 'Kerupuk Ramba', 0, 4000, 5000, '2024-02-21 01:40:25'),
(17, 'Keripik', 'Keripik Singkong', 0, 4000, 5000, '2024-02-21 01:40:25'),
(18, 'Keripik', 'Keripik Pisang', 0, 4000, 5000, '2024-02-21 01:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `faktur`
--

CREATE TABLE `faktur` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hitung`
--

CREATE TABLE `hitung` (
  `id` int(11) NOT NULL,
  `pelanggan` varchar(255) NOT NULL,
  `suplier` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(255) NOT NULL,
  `bayar` int(255) NOT NULL,
  `sisa` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori`, `nama_kategori`, `created_at`) VALUES
(4, 'Kue Kering', '2024-02-24 03:11:26'),
(5, 'Kue Basah', '2024-02-24 03:11:26'),
(6, 'Kue Ulang Tahun', '2024-03-04 12:47:47');

-- --------------------------------------------------------

--
-- Table structure for table `maman`
--

CREATE TABLE `maman` (
  `id_suplier` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `nama_suplier` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maman`
--

INSERT INTO `maman` (`id_suplier`, `nama_barang`, `harga_beli`, `nama_suplier`, `kategori`) VALUES
(1, 'Kue Pukis', 27000, 'Maman', 'Kue Basah'),
(2, 'Bolu Kukus', 4000, 'Maman', 'Kue Basah'),
(3, 'Banana Roll Cake', 4000, 'Maman', 'Kue Basah'),
(4, 'Brownies', 27000, 'Maman', 'Kue Basah'),
(5, 'Lapis Legit', 27000, 'Maman', 'Kue Basah');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_toko`, `nama_pelanggan`, `alamat`, `no_hp`, `created_at`) VALUES
(1, 100406, 'Aisyah', 'Batulawang', '088974316417', '2024-02-20 07:20:22'),
(2, 100406, 'Maman', 'Tasikmalaya', '077541597874', '2024-02-20 07:20:53'),
(3, 100406, 'Rangga', 'Parunglesang', '087703719335', '2024-02-06 04:39:45'),
(4, 100406, 'Umum', 'Kota Banjar', '089668101706', '2024-02-19 08:48:25');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `no_faktur` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `qty` int(11) NOT NULL,
  `id_suplier` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`no_faktur`, `id_pembelian`, `id_toko`, `id_user`, `tanggal_pembelian`, `qty`, `id_suplier`, `total`, `bayar`, `sisa`, `keterangan`, `created_at`) VALUES
(24, 0, 0, 0, '0000-00-00', 2, 'Ahmad', 74000, 74000, 0, '', '2024-03-04 01:36:10'),
(26, 0, 0, 0, '0000-00-00', 40, 'Ahmad', 1080000, 1080000, 0, '', '2024-03-04 11:26:33'),
(27, 0, 0, 0, '0000-00-00', 5, 'Ahmad', 135000, 135000, 0, '', '2024-03-04 11:27:04'),
(28, 0, 0, 0, '0000-00-00', 3, 'Ahmad', 81000, 81000, 0, '', '2024-03-04 11:27:48');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `sisa` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `id_toko`, `id_user`, `tanggal_penjualan`, `id_pelanggan`, `nama_barang`, `qty`, `total`, `bayar`, `sisa`, `keterangan`, `created_at`) VALUES
(126, 0, 0, '0000-00-00', 0, 'Kue Nastar', 2, 70000, 0, 0, '', '2024-03-04 07:21:26'),
(127, 0, 0, '0000-00-00', 0, 'Black Forest', 1, 100000, 0, 0, '', '2024-03-04 12:52:36'),
(129, 0, 0, '0000-00-00', 0, 'Kue Lidah Kucing', 3, 90000, 0, 0, '', '2024-03-04 12:54:03'),
(130, 0, 0, '0000-00-00', 0, 'Kue Pukis', 6, 30000, 0, 0, '', '2024-03-04 12:54:36');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `ID_Petugas` int(11) NOT NULL,
  `ID_Toko` int(11) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `No_Hp` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`ID_Petugas`, `ID_Toko`, `Nama`, `Alamat`, `No_Hp`) VALUES
(1, 100406, 'Siska', 'Kota Banjar', '089076424678'),
(2, 100406, 'Aulia', 'Bandung', '087703719335');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stok` varchar(225) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_toko`, `nama_produk`, `id_kategori`, `satuan`, `harga_beli`, `harga_jual`, `stok`, `created_at`) VALUES
(37, 100406, 'Kue Sagu', 4, 'Kotak', 27000, 30000, '30', '2024-03-04 11:34:58'),
(38, 100406, 'Kue Nastar', 4, 'Kotak', 32000, 35000, '45', '2024-03-04 11:34:58'),
(39, 100406, 'Kue Kacang ', 4, 'Kotak', 27000, 30000, '66', '2024-03-04 11:34:58'),
(40, 100406, 'Kue Lidah Kucing', 4, 'Kotak', 27000, 30000, '10', '2024-03-04 12:53:56'),
(41, 100406, 'Cokelat Chip Cookies', 4, 'Kotak', 37000, 40000, '19', '2024-03-04 11:34:58'),
(42, 100406, 'Kue Pukis', 5, 'pcs', 3000, 5000, '51', '2024-03-04 12:54:25'),
(43, 100406, 'Bolu Kukus', 5, 'pcs', 4000, 5000, '43', '2024-03-04 11:34:58'),
(44, 100406, 'Banana Roll Cake', 5, 'pcs', 4000, 5000, '73', '2024-03-04 11:34:58'),
(45, 100406, 'Brownies', 5, 'Kotak', 27000, 30000, '75', '2024-03-04 11:34:58'),
(46, 100406, 'Lapis Legit', 5, 'Kotak', 27000, 30000, '12', '2024-03-04 11:34:03'),
(47, 100406, 'Mini Cake', 6, 'buah', 27000, 35000, '10', '2024-03-04 12:50:44'),
(48, 100406, 'Black Forest', 6, 'buah', 84000, 100000, '4', '2024-03-04 12:52:06'),
(49, 100406, 'Fruit Fair Cake', 6, 'buah', 90000, 120000, '6', '2024-03-04 12:50:44'),
(50, 100406, 'Chocolate Cake', 6, 'buah', 130000, 145000, '10', '2024-03-04 12:50:44'),
(51, 100406, 'Cheese Cake', 6, 'buah', 15000, 25000, '15', '2024-03-04 12:50:44');

-- --------------------------------------------------------

--
-- Table structure for table `rangga`
--

CREATE TABLE `rangga` (
  `id_suplier` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `nama_suplier` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rangga`
--

INSERT INTO `rangga` (`id_suplier`, `nama_barang`, `harga_beli`, `nama_suplier`, `kategori`) VALUES
(1, 'Mini Cake', 27000, 'Rangga', 'Kue Ulang Tahun'),
(2, 'Black Forest', 84000, 'Rangga', 'Kue Ulang Tahun'),
(3, 'Fruit Fair Cake', 90000, 'Rangga', 'Kue Ulang Tahun'),
(5, 'Chocolate Cake', 130000, 'Rangga', 'Kue Ulang Tahun'),
(6, 'Cheese Cake', 15000, 'Rangga', 'Kue Ulang Tahun');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama_suplier` varchar(50) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `tlp_hp` varchar(50) NOT NULL,
  `alamat_suplier` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `id_toko`, `nama_suplier`, `kategori`, `tlp_hp`, `alamat_suplier`, `created_at`) VALUES
(1, 100406, 'Ahmad', 'Kue Kering', '098654374288', 'Pangandaran', '2024-03-04 12:41:30'),
(2, 100406, 'Maman', 'Kue Basah', '0775419354189', 'Ciamis', '2024-03-04 12:43:04'),
(4, 100406, 'Rangga', 'Kue Ulang Tahun', '087703719334', 'Parung Lesang', '2024-03-04 07:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tlp_hp` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `toko`
--

INSERT INTO `toko` (`id_toko`, `nama_toko`, `alamat`, `tlp_hp`, `created_at`) VALUES
(100406, 'Kampuh Jaya', 'Tanjung Sukur', '089668101706', '2024-02-08 02:44:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `access_level` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `id_toko`, `username`, `password`, `email`, `nama_lengkap`, `alamat`, `access_level`, `created_at`) VALUES
(1, 100406, 'Aprilianti', '$2y$10$7XQ3hPy/FcRwhlKJ5Llwc.jgFf5yLCmrKgkRvosDgJoiZ5yVbvDBa', 'Aprilianti0720@gmail.com', 'Aprilianti', 'Tanjung Sukur ', 'Admin', '2024-02-01 07:27:01'),
(2, 100406, 'siska', '$2y$10$7XQ3hPy/FcRwhlKJ5Llwc.jgFf5yLCmrKgkRvosDgJoiZ5yVbvDBa', 'siskaaulia@gmail.com', 'Siska Aulia', 'Kota Banjar', 'Petugas', '2024-02-19 09:30:15'),
(3, 130204, 'kirana', '$2y$10$7XQ3hPy/FcRwhlKJ5Llwc.jgFf5yLCmrKgkRvosDgJoiZ5yVbvDBa', 'kirana@gmail.com', 'Velyza Kirana Putri', '087703719335', 'petugas', '2024-02-19 09:29:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ahmad`
--
ALTER TABLE `ahmad`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indexes for table `barang_suplier`
--
ALTER TABLE `barang_suplier`
  ADD PRIMARY KEY (`id_barang_suplier`);

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`id_detail_beli`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail_penjualan`);

--
-- Indexes for table `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hitung`
--
ALTER TABLE `hitung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `maman`
--
ALTER TABLE `maman`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`no_faktur`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`ID_Petugas`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `rangga`
--
ALTER TABLE `rangga`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indexes for table `suplier`
--
ALTER TABLE `suplier`
  ADD PRIMARY KEY (`id_suplier`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ahmad`
--
ALTER TABLE `ahmad`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `barang_suplier`
--
ALTER TABLE `barang_suplier`
  MODIFY `id_barang_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `id_detail_beli` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `faktur`
--
ALTER TABLE `faktur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hitung`
--
ALTER TABLE `hitung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `maman`
--
ALTER TABLE `maman`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `no_faktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `ID_Petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `rangga`
--
ALTER TABLE `rangga`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130205;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
