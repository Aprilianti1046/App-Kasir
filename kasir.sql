-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2024 at 03:47 AM
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
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ahmad`
--

INSERT INTO `ahmad` (`id_barang`, `nama_barang`, `harga_beli`) VALUES
(1, 'Kue Sagu', 27000),
(2, 'Kue Nastar', 32000),
(3, 'Kue Kacang', 27000),
(4, 'Kue Lidah Kucing', 27000),
(5, 'Cokelat Chip Cookies', 37000);

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
(5, 'Kue Basah', '2024-02-24 03:11:26');

-- --------------------------------------------------------

--
-- Table structure for table `maman`
--

CREATE TABLE `maman` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `harga_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `maman`
--

INSERT INTO `maman` (`id_barang`, `nama_barang`, `harga_beli`) VALUES
(1, 'Kue Pukis', 3000),
(2, 'Bolu Kukus', 4000),
(3, 'Banana Roll Cake', 4000),
(4, 'Brownies', 27000),
(5, 'Lapis Legit', 27000);

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
(6, 0, 0, 0, '0000-00-00', 3, 'Ahmad', 0, 0, 0, '', '2024-03-01 13:45:14');

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
(117, 0, 0, '0000-00-00', 0, '', 1, 3000, 0, 0, '', '2024-02-29 07:56:50'),
(118, 0, 0, '0000-00-00', 0, '', 2, 6000, 0, 0, '', '2024-02-29 07:58:42'),
(119, 0, 0, '0000-00-00', 0, 'Cokelat Chip Cookies', 3, 120000, 0, 0, '', '2024-02-29 07:59:41');

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
(37, 0, 'Kue Sagu', 4, 'Kotak', 27000, 30000, '22', '2024-03-01 13:45:07'),
(38, 0, 'Kue Nastar', 4, 'Kotak', 32000, 35000, '19', '2024-03-01 13:43:55'),
(39, 0, 'Kue Kacang ', 4, 'Kotak', 27000, 30000, '11', '2024-03-01 12:30:46'),
(40, 0, 'Kue Lidah Kucing', 4, 'Kotak', 27000, 30000, '5', '2024-02-24 10:57:41'),
(41, 0, 'Cokelat Chip Cookies', 4, 'Kotak', 37000, 40000, '17', '2024-02-29 07:59:29'),
(42, 0, 'Kue Pukis', 5, 'pcs', 3000, 5000, '52', '2024-03-01 13:43:26'),
(43, 0, 'Bolu Kukus', 5, 'pcs', 4000, 5000, '33', '2024-03-01 13:41:05'),
(44, 0, 'Banana Roll Cake', 5, 'pcs', 4000, 5000, '47', '2024-03-01 13:42:25'),
(45, 0, 'Brownies', 5, 'Kotak', 27000, 30000, '18', '2024-03-01 13:44:13'),
(46, 0, 'Lapis Legit', 5, 'Kotak', 27000, 30000, '12', '2024-03-01 13:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `suplier`
--

CREATE TABLE `suplier` (
  `id_suplier` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama_suplier` varchar(50) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `tlp_hp` varchar(50) NOT NULL,
  `alamat_suplier` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suplier`
--

INSERT INTO `suplier` (`id_suplier`, `id_toko`, `nama_suplier`, `barang`, `tlp_hp`, `alamat_suplier`, `created_at`) VALUES
(1, 100406, 'Ahmad', 'Kue Sagu', 'Balokang', '098654374279', '2024-02-29 06:25:37'),
(2, 100406, 'Maman', 'Kue Nastar', 'Ciamis', '077541935418', '2024-02-29 06:28:04');

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
  ADD PRIMARY KEY (`id_barang`);

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
  ADD PRIMARY KEY (`id_barang`);

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
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT for table `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `maman`
--
ALTER TABLE `maman`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `no_faktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `ID_Petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `suplier`
--
ALTER TABLE `suplier`
  MODIFY `id_suplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
