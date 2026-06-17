-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2026 at 04:09 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simulasi_pbo_ti1c_nadiarizkyrahmadani`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` int NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(50) DEFAULT NULL,
  `lokasi_kampus` varchar(50) DEFAULT NULL,
  `jenis_prestasi` varchar(50) DEFAULT NULL,
  `tingkat_prestasi` varchar(50) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(50) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
(1, 'Ahmad Fauzi', 'SMAN 1 Semarang', '85.50', '250000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(2, 'Budi Santoso', 'SMKN 2 Salatiga', '78.00', '250000.00', 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
(3, 'Citra Lestari', 'SMA Kristen 1', '92.25', '250000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(4, 'Dedi Wijaya', 'SMAN 3 Surakarta', '80.00', '250000.00', 'Reguler', 'Sistem Informasi', 'Kampus Cabang', NULL, NULL, NULL, NULL),
(5, 'Eka Putri', 'MAN 1 Kendal', '88.75', '250000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(6, 'Fajar Nugroho', 'SMAN 1 Demak', '75.50', '250000.00', 'Reguler', 'Sistem Informasi', 'Kampus Cabang', NULL, NULL, NULL, NULL),
(7, 'Gita Permata', 'SMA Terang Bangsa', '83.40', '250000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
(8, 'Hendra Kusuma', 'SMAN 1 Kudus', '95.00', '150000.00', 'Prestasi', 'Teknik Informatika', NULL, 'Olimpiade Matematika', 'Nasional', NULL, NULL),
(9, 'Indah Cahyani', 'SMAN 3 Semarang', '91.00', '150000.00', 'Prestasi', 'Teknik Informatika', NULL, 'Futsal', 'Provinsi', NULL, NULL),
(10, 'Joko Susilo', 'SMKN 1 Purwodadi', '89.50', '150000.00', 'Prestasi', 'Sistem Informasi', NULL, 'LKS Web Technologies', 'Nasional', NULL, NULL),
(11, 'Kartika Sari', 'SMA Institusi', '93.00', '150000.00', 'Prestasi', 'Teknik Informatika', NULL, 'Debat Bahasa Inggris', 'Nasional', NULL, NULL),
(12, 'Laksana Tri', 'SMAN 1 Ungaran', '87.20', '150000.00', 'Prestasi', 'Sistem Informasi', NULL, 'Bulutangkis', 'Kabupaten', NULL, NULL),
(13, 'Mega Utami', 'MAN 2 Semarang', '90.10', '150000.00', 'Prestasi', 'Teknik Informatika', NULL, 'Tahfidz Al-Quran', 'Provinsi', NULL, NULL),
(14, 'Naufal Rizqullah', 'SMAN 2 Kebumen', '94.80', '150000.00', 'Prestasi', 'Sistem Informasi', NULL, 'Olimpiade Fisika', 'Nasional', NULL, NULL),
(15, 'Oki Darmawan', 'SMAN 1 Magelang', '86.00', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-990/IKATAN-DINAS/2026', 'Dinas Kominfo Provinsi'),
(16, 'Putri Ayu', 'SMAN 1 Purworejo', '89.90', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-991/IKATAN-DINAS/2026', 'Badan Siber dan Sandi Negara'),
(17, 'Qomaruddin', 'MAN Demak', '82.30', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-992/IKATAN-DINAS/2026', 'Dinas Perhubungan'),
(18, 'Rini Andayani', 'SMAN 1 Wonosobo', '91.50', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-993/IKATAN-DINAS/2026', 'Kementerian Keuangan'),
(19, 'Satria Perkasa', 'SMAN 4 Surakarta', '87.40', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-994/IKATAN-DINAS/2026', 'Kementerian Perhubungan'),
(20, 'Tania Kirana', 'SMA Kebon Dalem', '88.00', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-995/IKATAN-DINAS/2026', 'Kementerian Dalam Negeri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  MODIFY `id_pendaftaran` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
