-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2024 at 01:29 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts_yanto`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(10) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kode_supplier` varchar(5) NOT NULL,
  `tgl_masuk` varchar(10) NOT NULL,
  `jumlah_barang` int(250) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `kode_supplier`, `tgl_masuk`, `jumlah_barang`, `price`) VALUES
('BCK', 'Chitato Keju', 'SUP1', '2021-07-02', 250, 13000),
('BDSM', 'Duckbill Sensi Mask', 'SUP4', '2021-07-13', 200, 15000),
('BSQC', 'SilverQueen Chunkybar', 'SUP2', '2021-07-02', 100, 20000),
('BY', 'Yakult', 'SUP5', '2021-07-14', 100, 8500),
('BZEDT', 'Switsal Eau De Toilette', 'SUP3', '2021-07-13', 50, 25000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `kode_pelanggan` varchar(8) NOT NULL,
  `kode_barang` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`kode_pelanggan`, `kode_barang`) VALUES
('P111', 'BCK'),
('P112', 'BDSM'),
('P122', 'BY'),
('P222', 'BDSM'),
('P221', 'BY'),
('P427', ''),
('P571', 'VCD');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `kode_penjualan` varchar(10) NOT NULL,
  `kode_barang` varchar(10) NOT NULL,
  `kode_pelanggan` varchar(5) NOT NULL,
  `banyaknya` varchar(10) NOT NULL,
  `total_transaksi` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`kode_penjualan`, `kode_barang`, `kode_pelanggan`, `banyaknya`, `total_transaksi`) VALUES
('KP001', 'BY', 'P222', '2 pcs', 17000),
('KP002', 'BSQC', 'P111', '1 pcs', 20000),
('KP003', 'BZEDT', 'P112', '1 buah', 25000),
('KP004', 'BY', 'P221', '1 pcs', 8500),
('KP005', 'BCK', 'P111', '3 pcs', 39000),
('KP007', 'BDSM', 'P221', '2 pcs', 30000),
('KP008', 'BCK', 'P222', '1 pcs', 13000),
('KP009', 'BY', 'P112', '1 pcs', 8500),
('KP010', 'BSQC', 'P122', '2 pcs', 40000),
('KP012', 'PQS', 'P782', '6 Box', 150000),
('KP013', 'PKZ', 'P218', '10 Dus', 140000),
('KP014', 'FRQIX', 'P351', '27 Box', 1470000);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` varchar(5) NOT NULL,
  `nama_supplier` varchar(30) NOT NULL,
  `lokasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kode_supplier`, `nama_supplier`, `lokasi`) VALUES
('SUP1', 'Agen Ciki', 'Jatinegara'),
('SUP2', 'Distributor Coklat', 'Pancoran'),
('SUP3', 'Toko Sebelah', 'Bekasi'),
('SUP4', 'Toko Masker', 'Senayan'),
('SUP5', 'Lancar Jaya', 'Bogor'),
('SUP 6', 'Toko Kelontong Budi Fari', 'Pulogadung 2'),
('SUP7', 'Toko Amanah', 'Tebet');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
