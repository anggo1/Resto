-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2020 at 10:28 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restoran_sj`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bahan`
--

CREATE TABLE `tbl_bahan` (
  `no_bahan` char(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(10) NOT NULL,
  `supplier` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bahan`
--

INSERT INTO `tbl_bahan` (`no_bahan`, `nama`, `harga`, `stok`, `satuan`, `supplier`) VALUES
('B001', 'Avena Minyak Goreng 5 ltr', 63000, 10, 'PCS', 'Toko Haji Muhidin'),
('B002', 'Beras Ketan Hitam Curah /', 7000, 71, 'TON', 'Toko Haji Muhidin'),
('B003', 'Beras Ketan Putih Curah /', 9000, 1, 'CG', 'Toko Haji Muhidin'),
('B004', 'Bimoli Minyak Goreng Boto', 15000, 1, 'TON', 'Toko Haji Muhidin'),
('B005', 'Bimoli Minyak Goreng Klas', 25000, 1, 'PCS', 'Toko Haji Muhidin'),
('B006', 'Bimoli N.Kolesterol Jerig', 23000, 1, 'DAG', 'Toko Haji Muhidin'),
('B007', 'Bimoli Special Refil 2ltr', 26000, 1, 'DG', 'Toko Haji Muhidin'),
('B008', 'Bimoli Special Refill 1lt', 15000, 9, 'CG', 'Toko Haji Muhidin'),
('B009', 'Filma Minyak Goreng Non K', 13000, 1, 'ONS', 'Toko Haji Muhidin'),
('B010', 'Filma Refil 2 ltr (minyak goreng)', 26000, 1, 'DAG', 'Toko Haji Muhidin'),
('B011', 'Gula Merah Curah 1/2 Kg', 4000, 1, 'KG', 'Toko Haji Muhidin'),
('B012', 'Gula Merah Curah 1/4 Kg', 3000, 1, 'KG', 'Toko Haji Muhidin'),
('B013', 'Hemart & Higienis 1000ml', 11000, 1, 'KUINTAL', 'Toko Haji Muhidin'),
('B014', 'Hemart minyak goreng 2000', 21000, 1, 'BOTOL', 'Toko Haji Muhidin'),
('B015', 'Honig Macaroni 100gr', 7000, 1, 'DAG', 'Toko Haji Muhidin'),
('B016', 'Honig Macaroni 200gr', 7000, 1, 'ONS', 'Toko Haji Muhidin'),
('B017', 'Kunci Mas 1ltr', 12000, 1, 'KG', 'Toko Haji Muhidin'),
('B018', 'Kunci Mas Refill 2ltr ? p', 24000, 6, 'KUINTAL', 'Toko Haji Muhidin'),
('B019', 'Madina Minyak Goreng 1ltr', 12000, 1, 'KG', 'Toko Haji Muhidin'),
('B021', 'Madina Minyak Goreng 5ltr', 55000, 1, 'KG', 'Toko Haji Muhidin'),
('B022', 'Palma Minyak Goreng 2ltr ', 22000, 1, 'GRAM', 'Toko Haji Muhidin'),
('B023', 'Rose Brand Tepung Beras 5', 4000, 1, 'KG', 'Toko Haji Muhidin'),
('B024', 'Rose Brand Tepung Ketan P', 5000, 1, 'TON', 'Toko Haji Muhidin'),
('B025', 'Sania Minyak Goreng 2l tr', 25000, 1, 'DAG', 'Toko Haji Muhidin'),
('B026', 'Sania Minyak Goreng Non K', 25000, 1, 'PCS', 'Toko Haji Muhidin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail`
--

CREATE TABLE `tbl_detail` (
  `detail_id` int(11) NOT NULL,
  `detail_menu_id` int(11) DEFAULT NULL,
  `detail_menu_nama` varchar(100) DEFAULT NULL,
  `detail_harjul` double DEFAULT NULL,
  `detail_porsi` int(11) DEFAULT NULL,
  `detail_subtotal` double DEFAULT NULL,
  `detail_inv_no` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_detail`
--

INSERT INTO `tbl_detail` (`detail_id`, `detail_menu_id`, `detail_menu_nama`, `detail_harjul`, `detail_porsi`, `detail_subtotal`, `detail_inv_no`) VALUES
(3, 5, 'Menu 4', 17000, 1, 17000, 'INV2112161'),
(4, 3, 'Menu 2', 18000, 1, 18000, 'INV211216112162'),
(5, 5, 'Menu 4', 17000, 1, 17000, 'INV211216112162'),
(6, 6, 'Menu 5', 20000, 1, 20000, 'INV211216112163'),
(7, 2, 'Menu 1', 18000, 1, 18000, 'INV211216112164'),
(8, 2, 'Menu 1', 18000, 1, 18000, 'INV211216112165'),
(9, 3, 'Menu 2', 18000, 1, 18000, 'INV211216112166'),
(10, 5, 'Menu 4', 17000, 2, 34000, 'INV211216112167'),
(11, 10, 'menu 9', 20000, 1, 20000, 'INV221216000001'),
(12, 5, 'Menu 4', 17000, 1, 17000, 'INV231216000001'),
(13, 4, 'Menu 3', 20000, 1, 20000, 'INV231216000002'),
(14, 5, 'Menu 4', 17000, 1, 17000, 'INV251216000001'),
(15, 5, 'Menu 4', 17000, 2, 34000, 'INV070517000001'),
(16, 3, 'Menu 2', 18000, 1, 18000, 'INV070517000001'),
(17, 2, 'Menu 1', 18000, 1, 18000, 'INV070517000002'),
(18, 5, 'Menu 4', 17000, 1, 17000, 'INV070517000002');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_extra`
--

CREATE TABLE `tbl_extra` (
  `no_extra` char(4) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_extra`
--

INSERT INTO `tbl_extra` (`no_extra`, `nama`, `harga`) VALUES
('EX01', 'Ekstra Keju', 2000),
('EX02', 'Ekstra Saus', 2000),
('EX03', 'Ekstra Sayuran', 2000),
('EX04', 'Nasi', 3000),
('EX05', 'Kentang Saus BBQ', 8000),
('EX06', 'Kentang Saus BBQ Keju', 9000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_galeri`
--

CREATE TABLE `tbl_galeri` (
  `galeri_id` int(11) NOT NULL,
  `galeri_judul` varchar(100) DEFAULT NULL,
  `galeri_deskripsi` varchar(200) DEFAULT NULL,
  `galeri_gambar` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_galeri`
--

INSERT INTO `tbl_galeri` (`galeri_id`, `galeri_judul`, `galeri_deskripsi`, `galeri_gambar`) VALUES
(1, 'Judul Gallery', 'Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi.', 'file_1482157998.jpg'),
(2, 'Judul Gallery', 'Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi.', 'file_1482158023.jpg'),
(3, 'Judul Gallery', 'Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi.', 'file_1482158031.jpg'),
(4, 'Judul Gallery', 'Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi.', 'file_1482158044.jpg'),
(5, 'Judul Gallery', 'Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi Ini adalah deskrpsi.', 'file_1482158055.jpg'),
(6, 'Es Coklat Mint', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi.', 'file_1494172386.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `inv_no` varchar(15) NOT NULL,
  `inv_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `inv_plg_id` int(11) DEFAULT NULL,
  `inv_plg_nama` varchar(80) DEFAULT NULL,
  `inv_status` varchar(40) DEFAULT NULL,
  `inv_total` double DEFAULT NULL,
  `inv_rek_id` varchar(10) DEFAULT NULL,
  `inv_rek_no` varchar(60) DEFAULT NULL,
  `inv_rek_bank` varchar(30) DEFAULT NULL,
  `inv_rek_nama` varchar(50) DEFAULT NULL,
  `inv_rek_cabang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`inv_no`, `inv_tanggal`, `inv_plg_id`, `inv_plg_nama`, `inv_status`, `inv_total`, `inv_rek_id`, `inv_rek_no`, `inv_rek_bank`, `inv_rek_nama`, `inv_rek_cabang`) VALUES
('INV070517000001', '2017-05-07 09:14:22', 1, 'M Fikri Setiadi', 'Transaksi Selesai', 52000, 'COD', NULL, NULL, NULL, NULL),
('INV070517000002', '2017-05-07 09:16:25', 1, 'M Fikri Setiadi', 'Transaksi Selesai', 35000, '002', '548501007458536', 'BRI', 'M Fikri Setiadi', 'Padang'),
('INV2112160', '2016-11-21 01:59:10', 1, 'M Fikri Setiadi', 'Menunggu Konfirmasi', 17000, '003', NULL, 'Mandiri', NULL, NULL),
('INV2112161', '2016-11-21 02:00:35', 1, 'M Fikri Setiadi', 'Menunggu Konfirmasi', 17000, '003', NULL, 'Mandiri', NULL, NULL),
('INV211216112162', '2016-11-21 02:32:21', 1, 'M Fikri Setiadi', 'Menunggu Konfirmasi', 35000, 'COD', NULL, NULL, NULL, NULL),
('INV211216112163', '2016-12-21 03:24:22', 1, 'M Fikri Setiadi', 'Konfirmasi Tidak Valid', 20000, '003', NULL, 'Mandiri', NULL, NULL),
('INV211216112164', '2016-12-21 03:42:27', 1, 'M Fikri Setiadi', 'Menunggu Konfirmasi', 18000, '003', '', 'Mandiri', '', ''),
('INV211216112165', '2016-12-21 03:44:55', 1, 'M Fikri Setiadi', 'Dalam Pengiriman', 18000, '002', '1497385798375', 'BRI', 'M Fikri Setiadi', 'Padang'),
('INV211216112166', '2016-12-21 04:45:59', 1, 'M Fikri Setiadi', 'Menunggu Konfirmasi', 18000, 'COD', NULL, NULL, NULL, NULL),
('INV211216112167', '2016-12-22 07:38:28', 1, 'M Fikri Setiadi', 'Menunggu Konfirmasi', 34000, '003', '1497385798375', 'Mandiri', 'M Fikri Setiadi', 'Padang'),
('INV221216000001', '2016-12-22 13:10:38', 10, 'dedi', 'Pembayaran Selesai', 20000, '002', '1497385798375', 'BCA', 'M Fikri Setiadi', 'Padang'),
('INV231216000001', '2016-12-23 05:22:50', 1, 'M Fikri Setiadi', 'Pembayaran Selesai', 17000, '002', '1497385798375', 'BCA', 'M Fikri Setiadi', 'Padang'),
('INV231216000002', '2016-12-23 05:23:27', 1, 'M Fikri Setiadi', 'Transaksi Selesai', 20000, 'COD', NULL, NULL, NULL, NULL),
('INV251216000001', '2016-12-25 06:24:41', 10, 'dedi', 'Transaksi Selesai', 17000, 'COD', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Makanan'),
(2, 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori_menu`
--

CREATE TABLE `tbl_kategori_menu` (
  `no_kategori` char(2) NOT NULL,
  `kategori` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori_menu`
--

INSERT INTO `tbl_kategori_menu` (`no_kategori`, `kategori`, `keterangan`) VALUES
('DR', 'DRINKS', 'Daftar Aneka Minuman'),
('RO', 'ROASTED', 'Tanpa Tepung dan Dipanggang'),
('RS', 'RICE WITH SOUCE', 'Nasi Disiram Dengan Sauce Pilihan'),
('SC', 'SPICY AND CRYSPY', 'Dengan Tepung dan Digoreng'),
('SP', 'SPAGHETTI', 'Sphaghetti Pilihan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konfirmasi`
--

CREATE TABLE `tbl_konfirmasi` (
  `konfirmasi_id` int(11) NOT NULL,
  `konfirmasi_invoice` varchar(15) DEFAULT NULL,
  `konfirmasi_nama` varchar(60) DEFAULT NULL,
  `konfirmasi_bank` varchar(50) DEFAULT NULL,
  `konfirmasi_jumlah` double DEFAULT NULL,
  `konfirmasi_bukti` varchar(20) DEFAULT NULL,
  `konfirmasi_status` int(11) DEFAULT '0',
  `konfirmasi_tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_konfirmasi`
--

INSERT INTO `tbl_konfirmasi` (`konfirmasi_id`, `konfirmasi_invoice`, `konfirmasi_nama`, `konfirmasi_bank`, `konfirmasi_jumlah`, `konfirmasi_bukti`, `konfirmasi_status`, `konfirmasi_tanggal`) VALUES
(1, 'INV231216000001', 'M Fikri Setiadi', 'Bank BRI', 100000, 'file_1494171423.jpg', 1, '2017-05-07 15:37:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `menu_id` int(11) NOT NULL,
  `menu_nama` varchar(100) DEFAULT NULL,
  `menu_deskripsi` varchar(200) DEFAULT NULL,
  `menu_harga_lama` double DEFAULT NULL,
  `menu_harga_baru` double DEFAULT NULL,
  `menu_likes` int(11) DEFAULT '0',
  `menu_kategori_id` int(11) DEFAULT NULL,
  `menu_kategori_nama` varchar(30) DEFAULT NULL,
  `menu_status` int(11) DEFAULT '1',
  `menu_gambar` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`menu_id`, `menu_nama`, `menu_deskripsi`, `menu_harga_lama`, `menu_harga_baru`, `menu_likes`, `menu_kategori_id`, `menu_kategori_nama`, `menu_status`, `menu_gambar`) VALUES
(2, 'Menu Pedes', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', 18000, 12000, 11, 1, 'Makanan', 1, 'file_1481423289.jpg'),
(3, 'Sate Madura', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', 20000, 18000, 3, 1, 'Makanan', 1, 'file_1481423323.jpg'),
(4, 'Burger', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 20000, 0, 1, 'Makanan', 1, 'file_1481423391.jpg'),
(5, 'Pizza', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', 20000, 17000, 4, 1, 'Makanan', 1, 'file_1481423407.jpg'),
(6, 'Menu 5', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 20000, 0, 1, 'Makanan', 1, 'file_1481423428.jpg'),
(7, 'Menu 6', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 20000, 0, 1, 'Makanan', 1, 'file_1481505660.jpg'),
(9, 'Manu 8', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 20000, 0, 1, 'Makanan', 1, 'file_1481505718.jpg'),
(10, 'menu 9', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 20000, 1, 1, 'Makanan', 1, 'file_1481505737.jpg'),
(11, 'Coklat Hangat', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 12000, 0, 2, 'Minuman', 1, 'file_1494160941.jpg'),
(12, 'Es Coklat Mint', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', 16000, 15000, 0, 2, 'Minuman', 1, 'file_1494160974.jpg'),
(13, 'Ice Lemon', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 12000, 0, 2, 'Minuman', 1, 'file_1494161014.jpg'),
(14, 'Es Semangka', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 12000, 0, 2, 'Minuman', 1, 'file_1494161073.jpg'),
(15, 'Coca Cola Dingin', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 10000, 0, 2, 'Minuman', 1, 'file_1494161100.jpg'),
(16, 'Kopi Latte', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 14000, 0, 2, 'Minuman', 1, 'file_1494161133.jpg'),
(17, 'Kopi Latte Moca', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 15000, 0, 2, 'Minuman', 1, 'file_1494161156.jpg'),
(18, 'Kwetiau', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 16000, 0, 1, 'Makanan', 1, 'file_1494161185.jpg'),
(19, 'Rendang', 'Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah deskripsi Ini adalah ', NULL, 20000, 0, 1, 'Makanan', 1, 'file_1494161206.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `plg_id` int(11) NOT NULL,
  `plg_nama` varchar(80) DEFAULT NULL,
  `plg_alamat` varchar(60) DEFAULT NULL,
  `plg_jenkel` varchar(2) DEFAULT NULL,
  `plg_notelp` varchar(30) DEFAULT NULL,
  `plg_email` varchar(40) DEFAULT NULL,
  `plg_facebook` varchar(30) DEFAULT NULL,
  `plg_instagram` varchar(30) DEFAULT NULL,
  `plg_line` varchar(30) DEFAULT NULL,
  `plg_whatapp` varchar(30) DEFAULT NULL,
  `plg_path` varchar(30) DEFAULT NULL,
  `plg_photo` varchar(20) DEFAULT NULL,
  `plg_register` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `plg_password` varchar(35) DEFAULT NULL,
  `plg_status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`plg_id`, `plg_nama`, `plg_alamat`, `plg_jenkel`, `plg_notelp`, `plg_email`, `plg_facebook`, `plg_instagram`, `plg_line`, `plg_whatapp`, `plg_path`, `plg_photo`, `plg_register`, `plg_password`, `plg_status`) VALUES
(1, 'M Fikri Setiadi', 'Padang', 'L', '081277159401', 'setiadi@mfikri.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-10-01 03:39:00', 'e10adc3949ba59abbe56e057f20f883e', 0),
(2, 'Daria Setvsova', 'Rusia', 'P', '081277159401', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-10-01 03:39:14', 'e10adc3949ba59abbe56e057f20f883e', 0),
(3, 'Valeria Dubravina', 'Rusia', 'P', '081277159401', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-10-09 03:39:15', 'e10adc3949ba59abbe56e057f20f883e', 0),
(4, 'Elanor Rigby', 'Rusia', 'P', '081277159401', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-10-11 03:39:17', 'e10adc3949ba59abbe56e057f20f883e', 0),
(5, 'Svetlana Sorokina', 'Rusia', 'P', '081277159401', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-10-11 03:39:18', 'e10adc3949ba59abbe56e057f20f883e', 0),
(6, 'Nika Jurov', 'Slovenia', 'P', '081277159401', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-10-11 03:39:20', 'e10adc3949ba59abbe56e057f20f883e', 0),
(7, 'Angle Gustov', 'Paland', 'P', '081277159401', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-10-11 03:39:21', 'e10adc3949ba59abbe56e057f20f883e', 0),
(8, 'Thomas Muller', 'Germany', 'L', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-10-11 03:39:22', 'e10adc3949ba59abbe56e057f20f883e', 0),
(9, 'Kevin De Bruyne', 'Belgia', 'L', '081277159401', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-10-11 03:39:25', 'e10adc3949ba59abbe56e057f20f883e', 0),
(10, 'dedi', 'Jl. Bunda VI ulak karang padang', 'L', '082169071552', 'hp3.andespen@gmail.com', 'D.irawan', 'D.irawan', 'D.irawan', 'D.irawan', 'D.irawan', 'file_1482412219.jpg', '2016-10-22 13:10:19', 'c02a1084e241dc98962150a81dfc0e0d', 1),
(11, 'Jack Welch', 'USA', 'L', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-10-23 05:58:00', 'e10adc3949ba59abbe56e057f20f883e', 0),
(12, 'Jim Rohn', 'USA', 'L', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-11-23 06:00:57', 'e10adc3949ba59abbe56e057f20f883e', 0),
(13, 'Jhon Medina', 'USA', 'L', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-11-23 06:00:58', 'e10adc3949ba59abbe56e057f20f883e', 0),
(14, 'Iarmalenko', 'Swedia', 'L', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-11-23 06:01:01', 'e10adc3949ba59abbe56e057f20f883e', 0),
(15, 'Irma Cantika', 'Padang', 'P', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-11-23 06:01:03', 'e10adc3949ba59abbe56e057f20f883e', 0),
(16, 'Nadia Cantika', 'Padang', 'P', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-11-23 06:04:12', 'e10adc3949ba59abbe56e057f20f883e', 0),
(17, 'Suci Ningsih', 'Padang', 'P', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-11-23 06:04:16', 'e10adc3949ba59abbe56e057f20f883e', 0),
(18, 'Putri Lubis', 'Padang', 'P', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-11-23 06:04:19', 'e10adc3949ba59abbe56e057f20f883e', 0),
(19, 'Julian', 'Padang', 'L', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-11-23 06:04:21', 'e10adc3949ba59abbe56e057f20f883e', 0),
(20, 'Toni', 'Padang', 'L', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-11-23 06:04:24', 'e10adc3949ba59abbe56e057f20f883e', 0),
(21, 'Mega', 'Padang', 'P', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-11-23 06:04:26', 'e10adc3949ba59abbe56e057f20f883e', 0),
(22, 'Weny', 'Padang', 'P', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-12-23 06:04:28', 'e10adc3949ba59abbe56e057f20f883e', 0),
(23, 'Dhea', 'Padang', 'P', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-12-23 06:04:31', 'e10adc3949ba59abbe56e057f20f883e', 0),
(24, 'Santi', 'Padang', 'P', '082169071552', 'email@gmail.com', NULL, NULL, NULL, NULL, NULL, 'user_blank.png', '2016-12-23 06:04:33', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembayaran`
--

CREATE TABLE `tbl_pembayaran` (
  `no_pembayaran` char(10) NOT NULL,
  `no_bayar` varchar(11) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` text NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pembelian`
--

CREATE TABLE `tbl_pembelian` (
  `no_pembelian` char(10) NOT NULL,
  `no_faktur` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `supplier` varchar(35) NOT NULL,
  `item` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `pengguna_id` int(11) NOT NULL,
  `pengguna_nama` varchar(60) DEFAULT NULL,
  `pengguna_jenkel` varchar(2) DEFAULT NULL,
  `pengguna_username` varchar(30) DEFAULT NULL,
  `pengguna_password` varchar(35) DEFAULT NULL,
  `pengguna_email` varchar(50) DEFAULT NULL,
  `pengguna_nohp` varchar(30) DEFAULT NULL,
  `pengguna_status` int(2) DEFAULT '1',
  `pengguna_level` varchar(2) DEFAULT NULL,
  `pengguna_photo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`pengguna_id`, `pengguna_nama`, `pengguna_jenkel`, `pengguna_username`, `pengguna_password`, `pengguna_email`, `pengguna_nohp`, `pengguna_status`, `pengguna_level`, `pengguna_photo`) VALUES
(2, 'M Fikri Setiadi', 'L', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'fikri@mahakaryapromosindo.co.id', '081277159401', 1, '1', 'file_1481349520.jpg'),
(5, 'test', 'L', 'test', '098f6bcd4621d373cade4e832627b4f6', 'anggoro@sinarjayagroup.co.id', '1234', 1, '1', 'file_1599723377.jpg'),
(6, 'test', 'L', 'test', '098f6bcd4621d373cade4e832627b4f6', 'anggoro@sinarjayagroup.co.id', '1234', 1, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `no_struk` char(10) NOT NULL,
  `no_check` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `sub_total` int(11) NOT NULL,
  `diskon` float NOT NULL,
  `potongan` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `kembalian` int(11) NOT NULL,
  `no_casheir` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`no_struk`, `no_check`, `tanggal`, `waktu`, `sub_total`, `diskon`, `potongan`, `total_bayar`, `cash`, `kembalian`, `no_casheir`) VALUES
('JL14000001', 1, '2014-06-07', '11:23:26', 224000, 0, 0, 224000, 250000, 26000, 'PCS14DD001'),
('JL14000002', 2, '2014-06-07', '11:27:52', 788000, 0.1, 78800, 709200, 710000, 800, 'PCS14DD001'),
('JL14000003', 1, '2014-06-08', '21:03:52', 380000, 0.05, 19000, 361000, 370000, 9000, 'PCS14DD001'),
('JL14000004', 1, '2014-06-17', '23:23:10', 48000, 0, 0, 48000, 50000, 2000, 'PCS14DD001'),
('JL14000005', 1, '2014-06-25', '17:24:53', 228000, 0, 0, 228000, 300000, 72000, 'PCS14DD001'),
('JL14000006', 2, '2014-06-25', '19:50:51', 159000, 0, 0, 159000, 170000, 11000, 'PCS14DD001'),
('JL20000001', 2, '2020-09-09', '09:48:26', 33000, 0, 0, 33000, 50000, 17000, 'casheir'),
('JL20000007', 1, '2020-09-09', '09:47:37', 32000, 0, 0, 32000, 50000, 18000, 'casheir');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan_detail`
--

CREATE TABLE `tbl_penjualan_detail` (
  `no_struk` char(10) NOT NULL,
  `tanggal` date NOT NULL,
  `item` varchar(50) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjualan_detail`
--

INSERT INTO `tbl_penjualan_detail` (`no_struk`, `tanggal`, `item`, `kategori`, `harga`, `jumlah`, `total`) VALUES
('JL14000001', '2014-06-07', 'Spaghetti Sirloin Cheese', 'SPAGHETTI', 19000, 3, 57000),
('JL14000001', '2014-06-07', 'White Coffee', 'DRINKS', 6000, 2, 12000),
('JL14000001', '2014-06-07', 'Nasi Chicken Extra Souce', 'RICE WITH SOUCE', 17000, 2, 34000),
('JL14000001', '2014-06-07', 'Spaghetti Chicken Katsu Cheese', 'SPAGHETTI', 17000, 3, 51000),
('JL14000001', '2014-06-07', 'Susu  Cokelat / Putih', 'DRINKS', 6000, 2, 12000),
('JL14000001', '2014-06-07', 'Ekstra Sayuran', 'EXTRA TAMBAHAN', 2000, 2, 4000),
('JL14000001', '2014-06-07', 'Jerus Peres Susu', 'DRINKS', 7000, 2, 14000),
('JL14000001', '2014-06-07', 'Nasi Tenderloin Extra Souce', 'RICE WITH SOUCE', 20000, 2, 40000),
('JL14000002', '2014-06-07', 'Spaghetti Chicken Katsu Cheese', 'SPAGHETTI', 17000, 3, 51000),
('JL14000002', '2014-06-07', 'Nasi Sirloin Extra Souce', 'RICE WITH SOUCE', 19000, 5, 95000),
('JL14000002', '2014-06-07', 'Chicken Crispy Spicy', 'SPICY AND CRYSPY', 16000, 4, 64000),
('JL14000002', '2014-06-07', 'Sirloin Spicy', 'SPICY AND CRYSPY', 17000, 4, 68000),
('JL14000002', '2014-06-07', 'Nasi Tenderloin Extra Souce', 'RICE WITH SOUCE', 20000, 6, 120000),
('JL14000002', '2014-06-07', 'Nasi Chicken Extra Souce', 'RICE WITH SOUCE', 17000, 3, 51000),
('JL14000002', '2014-06-07', 'Chicken Katsu Spicy', 'SPICY AND CRYSPY', 16000, 5, 80000),
('JL14000002', '2014-06-07', 'Tenderloin Panggang', 'ROASTED', 17000, 5, 85000),
('JL14000002', '2014-06-07', 'Spaghetti Bolognese Cheese', 'SPAGHETTI', 12000, 4, 48000),
('JL14000002', '2014-06-07', 'White Coffee', 'DRINKS', 6000, 5, 30000),
('JL14000002', '2014-06-07', 'LEVEL 5', 'LEVEL PEDAS', 1000, 3, 3000),
('JL14000002', '2014-06-07', 'Ekstra Saus', 'EXTRA TAMBAHAN', 2000, 4, 8000),
('JL14000002', '2014-06-07', 'Air Mineral Botol', 'DRINKS', 3000, 4, 12000),
('JL14000002', '2014-06-07', 'Ekstra Sayuran', 'EXTRA TAMBAHAN', 2000, 5, 10000),
('JL14000002', '2014-06-07', 'Kentang Saus BBQ Keju', 'EXTRA TAMBAHAN', 9000, 3, 27000),
('JL14000002', '2014-06-07', 'Ekstra Keju', 'EXTRA TAMBAHAN', 2000, 6, 12000),
('JL14000002', '2014-06-07', 'Kentang Saus BBQ', 'EXTRA TAMBAHAN', 8000, 3, 24000),
('JL14000003', '2014-06-08', 'Nasi Tenderloin Extra Souce', 'RICE WITH SOUCE', 20000, 3, 60000),
('JL14000003', '2014-06-08', 'Sirloin Panggang', 'ROASTED', 16000, 2, 32000),
('JL14000003', '2014-06-08', 'Spaghetti Chicken Katsu Cheese', 'SPAGHETTI', 17000, 8, 136000),
('JL14000003', '2014-06-08', 'Nasi Sirloin Extra Souce', 'RICE WITH SOUCE', 19000, 4, 76000),
('JL14000003', '2014-06-08', 'Spaghetti Sirloin Cheese', 'SPAGHETTI', 19000, 4, 76000),
('JL14000004', '2014-06-17', 'Chicken Crispy Spicy', 'SPICY AND CRYSPY', 16000, 3, 48000),
('JL14000005', '2014-06-25', 'Spaghetti Chicken Katsu Cheese', 'SPAGHETTI', 17000, 6, 102000),
('JL14000005', '2014-06-25', 'Nasi Sirloin Extra Souce', 'RICE WITH SOUCE', 19000, 2, 38000),
('JL14000005', '2014-06-25', 'Sirloin Panggang', 'ROASTED', 16000, 3, 48000),
('JL14000005', '2014-06-25', 'Nasi Tenderloin Extra Souce', 'RICE WITH SOUCE', 20000, 2, 40000),
('JL14000006', '2014-06-25', 'Sirloin Spicy', 'SPICY AND CRYSPY', 17000, 3, 51000),
('JL14000006', '2014-06-25', 'Tenderloin Panggang', 'ROASTED', 17000, 3, 51000),
('JL14000006', '2014-06-25', 'Spaghetti Sirloin Cheese', 'SPAGHETTI', 19000, 3, 57000),
('JL20000007', '2020-09-09', 'Chicken Crispy Spicy', 'SPICY AND CRYSPY', 16000, 2, 32000),
('JL20000001', '2020-09-09', 'Chicken Katsu Spicy', 'SPICY AND CRYSPY', 16000, 1, 16000),
('JL20000001', '2020-09-09', 'Sirloin Spicy', 'SPICY AND CRYSPY', 17000, 1, 17000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posisi`
--

CREATE TABLE `tbl_posisi` (
  `no_posisi` char(2) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_posisi`
--

INSERT INTO `tbl_posisi` (`no_posisi`, `nama`) VALUES
('MG', 'Manager'),
('CS', 'Casheir'),
('WT', 'Waiters'),
('CL', 'Cleaner');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `rek_id` varchar(10) NOT NULL,
  `rek_no` varchar(60) DEFAULT NULL,
  `rek_nama` varchar(50) DEFAULT NULL,
  `rek_bank` varchar(30) DEFAULT NULL,
  `rek_cabang` varchar(50) DEFAULT NULL,
  `rek_logo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`rek_id`, `rek_no`, `rek_nama`, `rek_bank`, `rek_cabang`, `rek_logo`) VALUES
('001', '1497385798375', 'M Fikri Setiadi', 'BCA', 'Padang', 'file_1482154688.png'),
('002', '548501007458536', 'M Fikri Setiadi', 'BRI', 'Padang', 'file_1482156414.png'),
('003', '1497385798375', 'M Fikri Setiadi', 'Mandiri', 'Padang', 'file_1482154772.png'),
('004', '1497385798375', 'M Fikri Setiadi', 'Syariah Mandiri', 'Padang', 'file_1482154795.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_satuan`
--

CREATE TABLE `tbl_satuan` (
  `value` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_satuan`
--

INSERT INTO `tbl_satuan` (`value`) VALUES
('ML'),
('KG'),
('MM'),
('LITER'),
('CG'),
('TON'),
('BOTOL'),
('GRAM'),
('DAG'),
('PCS'),
('KUINTAL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `status_id` int(11) NOT NULL,
  `status_nama` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`status_id`, `status_nama`) VALUES
(1, 'Menunggu Konfirmasi'),
(2, 'Menunggu Pembayaran'),
(3, 'Pembayaran Selesai'),
(4, 'Dalam Pembuatan'),
(5, 'Dalam Pengemasan'),
(6, 'Dalam Pengiriman'),
(7, 'Transaksi Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `no_supplier` char(4) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `telp` varchar(14) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`no_supplier`, `nama`, `telp`, `alamat`) VALUES
('S001', 'Toko Haji Muhidin', '0898989899', 'Jln. Jengkol 12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `User_id` int(11) NOT NULL,
  `nip` varchar(12) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `User_Type` varchar(50) NOT NULL,
  `lokasi` varchar(25) NOT NULL,
  `wilayah` varchar(6) NOT NULL,
  `bagian` varchar(15) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`User_id`, `nip`, `UserName`, `Password`, `FirstName`, `LastName`, `User_Type`, `lokasi`, `wilayah`, `bagian`, `foto`) VALUES
(39, '', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '', 'Admin', 'Cibitung 2', '', 'humaskum', 'admin.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_bahan`
--
ALTER TABLE `tbl_bahan`
  ADD PRIMARY KEY (`no_bahan`);

--
-- Indexes for table `tbl_detail`
--
ALTER TABLE `tbl_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `detail_inv_no` (`detail_inv_no`),
  ADD KEY `detail_menu_id` (`detail_menu_id`);

--
-- Indexes for table `tbl_extra`
--
ALTER TABLE `tbl_extra`
  ADD PRIMARY KEY (`no_extra`);

--
-- Indexes for table `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  ADD PRIMARY KEY (`galeri_id`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`inv_no`),
  ADD KEY `inv_plg_id` (`inv_plg_id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `tbl_kategori_menu`
--
ALTER TABLE `tbl_kategori_menu`
  ADD PRIMARY KEY (`no_kategori`);

--
-- Indexes for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  ADD PRIMARY KEY (`konfirmasi_id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `menu_kategori_id` (`menu_kategori_id`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`plg_id`);

--
-- Indexes for table `tbl_pembayaran`
--
ALTER TABLE `tbl_pembayaran`
  ADD PRIMARY KEY (`no_pembayaran`);

--
-- Indexes for table `tbl_pembelian`
--
ALTER TABLE `tbl_pembelian`
  ADD PRIMARY KEY (`no_pembelian`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`pengguna_id`);

--
-- Indexes for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`no_struk`);

--
-- Indexes for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`rek_id`);

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`no_supplier`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_detail`
--
ALTER TABLE `tbl_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_galeri`
--
ALTER TABLE `tbl_galeri`
  MODIFY `galeri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_konfirmasi`
--
ALTER TABLE `tbl_konfirmasi`
  MODIFY `konfirmasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  MODIFY `plg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `pengguna_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_detail`
--
ALTER TABLE `tbl_detail`
  ADD CONSTRAINT `tbl_detail_ibfk_1` FOREIGN KEY (`detail_inv_no`) REFERENCES `tbl_invoice` (`inv_no`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_detail_ibfk_2` FOREIGN KEY (`detail_menu_id`) REFERENCES `tbl_menu` (`menu_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD CONSTRAINT `tbl_invoice_ibfk_1` FOREIGN KEY (`inv_plg_id`) REFERENCES `tbl_pelanggan` (`plg_id`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD CONSTRAINT `tbl_menu_ibfk_1` FOREIGN KEY (`menu_kategori_id`) REFERENCES `tbl_kategori` (`kategori_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
