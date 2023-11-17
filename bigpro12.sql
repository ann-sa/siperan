-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2019 at 02:25 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Siperan`
--

-- --------------------------------------------------------

--
-- Table structure for table `atasnama`
--

DROP TABLE IF EXISTS `atasnama`;

CREATE TABLE `atasnama` (
  `id` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `NIP` varchar(50) NOT NULL,
  `atas_nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `atasnama`
--

INSERT INTO `atasnama` (`id`, `id_fakultas`, `NIP`, `atas_nama`, `jabatan`, `identifier`) VALUES
(1, 14, '196108171987011001', 'Prof. Dr. Drs. Opim Salim Sitompul, M.Sc', 'Dekan', ''),
(2, 14, '197007162005012002', 'Dr. Elviawaty Muisa Zamzami, ST., MT., MM', 'Wakil Dekan I', ''),
(3, 14, '182283728479898', 'Bagus Tambunan S.T', 'Wakil Dekan II', '');

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

DROP TABLE IF EXISTS `fakultas`;

CREATE TABLE `fakultas` (
  `id_fakultas` int(11) NOT NULL,
  `Fakultas` varchar(100) NOT NULL,
  `Alamat_Fakultas` text NOT NULL,
  `Telp` text NOT NULL,
  `Laman` text NOT NULL,
  `Email_Fakultas` text NOT NULL,
  `logo_fakultas` text NOT NULL,
  `logo_fakultas_lama` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`id_fakultas`, `Fakultas`, `Alamat_Fakultas`, `Telp`, `Laman`, `Email_Fakultas`, `logo_fakultas`, `logo_fakultas_lama`) VALUES
(1, 'Fakultas Kedokteran', 'Jalan Dr. T. Mansur No.5, Padang Bulan, Medan Baru, Kota Medan, Sumatera Utara 20155', '0618211045', 'fk.usu.ac.id', 'dean.med@usu.ac.id', 'f01_fk.png', ''),
(2, 'Fakultas Hukum', 'Universitas Sumatera Utara, Jl. Universitas No.4, Padang Bulan, Medan Baru, Kota Medan, Sumatera Utara 20155', '0618213571', 'fh.usu.ac.id', 'fh@usu.ac.id', 'f02_fh.png', ''),
(3, 'Fakultas Pertanian', 'Jalan Prof. A. Sofyan No. 3 Kampus USU Medan', '0618213236', 'fp.usu.ac.id', 'fp@usu.ac.id', 'f03_fp.png', ''),
(4, 'Fakultas Teknik', 'Kampus USU, Jl. Almamater, Padang Bulan, Medan Baru, Kota Medan, Sumatera Utara 20155', '0618213250', 'ft.usu.ac.id', 'ft@usu.ac.id', 'f04_ft.png', ''),
(5, 'Fakultas Ekonomi', 'Jl. Prof. Hanafiah, Padang Bulan, Medan Baru, Kota Medan, Sumatera Utara 20222', '0618213250', 'feb.usu.ac.id', 'feb@usu.ac.id', 'f05_feb.png', ''),
(6, 'Fakultas Kedokteran Gigi', 'Universitas Sumatera Utara, Jl. Universitas No.9, Padang Bulan, Medan Baru, Kota Medan, Sumatera Utara 20222', '0618216131', 'fkg.usu.ac.id', 'fkg@usu.ac.id', 'f06_fkg.png', ''),
(7, 'Fakultas Ilmu Budaya', 'Jl. Universitas No.19, Padang Bulan, Medan Baru, Kota Medan, Sumatera Utara 20155', '0618215956', 'fib.usu.ac.id', 'fib@usu.ac.id', 'f07_fib.png', ''),
(8, 'Fakultas Matematika dan IPA', 'Jl. Bioteknologi No.1, Padang Bulan, Medan Baru, Kota Medan, Sumatera Utara 20155', '0618214290', 'fmipa.usu.ac.id', 'fmipa@usu.ac.id', 'f08_fmipa.png', ''),
(9, 'Fakultas Ilmu-Ilmu Sosial dan Ilmu Politik', 'Jl. Dr. A. Sofian No.1A, Padang Bulan, Medan Baru, Kota Medan, Sumatera Utara 20222', '0618211965', 'fisip.usu.ac.id', 'fisip@usu.ac.id', 'f09_fisip.png', ''),
(10, 'Fakultas Kesehatan Masyarakat', 'Universitas Sumatera Utara, Jl. Universitas No.32, Padang Bulan, Medan Baru, Kota Medan, Sumatera Utara 20222', '0000000000', 'fkm.usu.ac.id', 'fkm@usu.ac.id', 'f10_fkm.png', ''),
(11, 'Fakultas Keperawatan', 'USU, Jl. Prof. T. Maas No.3, Kampus, Padang Bulan, Medan Baru, Kota Medan, Sumatera Utara 20155', '0618213318', 'fkep.usu.ac.id', 'fkep@usu.ac.id', 'f11_fper.png', ''),
(12, 'Fakultas Kehutanan', 'Padang Bulan, Medan Baru, Kota Medan, Sumatera Utara 20155', '0618220605', 'fhut.usu.ac.id', 'fhut@usu.ac.id', 'f12_fhut.png', ''),
(13, 'Fakultas Psikologi', 'Jl. DR. Mansyur No.7, Padang Bulan, Medan Baru, Kota Medan, Sumatera Utara 20155', '0618220122', 'fpsi.usu.ac.id', 'fpsi@usu.ac.id', 'f13_fpsi.png', ''),
(14, 'Fakultas Ilmu Komputer dan Teknologi Informasi', 'Jalan Universitas No. 9 Kampus USU Medan 20155', '061-8222129', 'www.fasilkom-ti.usu.ac.id', 'fasilkomti@usu.ac.id', 'f14_fasilkomti.png', ''),
(15, 'Fakultas Farmasi', 'Jl. Tri Dharma, Padang Bulan, Medan Baru, Kota Medan, Sumatera Utara 20222', '0618223558', 'ffar.usu.ac.id', 'farmasi@usu.ac.id', 'f15_far.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `lampiran`
--

DROP TABLE IF EXISTS `lampiran`;

CREATE TABLE `lampiran` (
  `id_lampiran` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `id_layout` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `judul_lampiran` varchar(255) NOT NULL,
  `link_lampiran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lampiran_eksternal`
--

DROP TABLE IF EXISTS `lampiran_eksternal`;

CREATE TABLE `lampiran_eksternal` (
  `id_lampiraneksternal` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `judul_lampiran` varchar(255) NOT NULL,
  `link_lampiran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `layout`
--

DROP TABLE IF EXISTS `layout`;

CREATE TABLE `layout` (
  `id_layout` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `judul_inggris` varchar(255) NOT NULL,
  `format_nosur` varchar(255) NOT NULL,
  `setting` text NOT NULL,
  `setting_inggris` text NOT NULL,
  `show_form_hal` varchar(2) NOT NULL,
  `show_form_penerima` varchar(2) NOT NULL,
  `show_lampiran` varchar(2) NOT NULL,
  `identifier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layout`
--

INSERT INTO `layout` (`id_layout`, `id_fakultas`, `judul`, `judul_inggris`, `format_nosur`, `setting`, `setting_inggris`, `show_form_hal`, `show_form_penerima`, `show_lampiran`, `identifier`) VALUES
(1, 14, 'UNDANGAN', 'INVITATION', 'UND', '<p style=\"text-align:center\"><u><span style=\"font-size:24px\">SURAT [JudulSurat]</span></u></p>\r\n\r\n<p style=\"text-align:center\">Nomor: [NomorSurat]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Kepada:</p>\r\n\r\n<p>Jabatan dan Organisasi</p>\r\n\r\n<p>Instansi</p>\r\n\r\n<p>Kota</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Sehubungan dengan itu diharapkan hadir pada:</p>\r\n\r\n<p>Tanggal :</p>\r\n\r\n<p>Hari :</p>\r\n\r\n<p>Pukul :</p>\r\n\r\n<p>Tempat :</p>\r\n\r\n<p>Acara :</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Atas perhatian dan kehadiran Saudara kami mengucapkan terima kasih.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">[TempatSurat], [TanggalSurat]</p>\r\n\r\n<p style=\"text-align:right\">[Jabatan_AN]</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><u>[Nama_AN]</u></p>\r\n\r\n<p style=\"text-align:right\">NIP. [NIP_AN]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tembusan:</p>\r\n\r\n<ol>\r\n	<li>&nbsp;</li>\r\n	<li>&nbsp;</li>\r\n</ol>\r\n\r\n<p>NB:</p>\r\n', '<p style=\"text-align:center\"><u><span style=\"font-size:24px\">[JudulSurat]</span></u></p>\r\n\r\n<p style=\"text-align:center\">Number: [NomorSurat]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>To:</p>\r\n\r\n<p>Position and Organization</p>\r\n\r\n<p>Agency</p>\r\n\r\n<p>City</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In connection with that it is expected to be present at:</p>\r\n\r\n<p>Date:</p>\r\n\r\n<p>Day:</p>\r\n\r\n<p>Hit:</p>\r\n\r\n<p>The place :</p>\r\n\r\n<p>Event :</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>For your attention and attendance, we thank you.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">[TempatSurat], [TanggalSurat]</p>\r\n\r\n<p style=\"text-align:right\">[Jabatan_AN]</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><u>[Nama_AN]</u></p>\r\n\r\n<p style=\"text-align:right\">NIP. [NIP_AN]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Copy:</p>\r\n\r\n<ol>\r\n	<li>&nbsp;</li>\r\n	<li>&nbsp;</li>\r\n</ol>\r\n\r\n<p>Note:</p>\r\n', 'on', 'on', 'on', ''),
(2, 14, 'Pengumuman', 'Announcement', 'PMN', '<p>Gunakan [JudulSurat] untuk menampilkan judul layout surat.<br />\r\nGunakan [NomorSurat] untuk menampilkan nomor surat.<br />\r\n<br />\r\nGunakan [TempatSurat] untuk menampilkan tempat surat.<br />\r\nGunakan [TanggalSurat] untuk menampilkan tanggal surat.<br />\r\n<br />\r\nGunakan [Jabatan_AN] untuk menampilkan jabatan atas nama.<br />\r\nGunakan [Nama_AN] untuk menampilkan nama atas nama.<br />\r\nGunakan [NIP_AN] untuk menampilkan NIP atas nama.</p>\r\n', '<p>Gunakan [JudulSurat] untuk menampilkan judul layout surat.<br />\r\nGunakan [NomorSurat] untuk menampilkan nomor surat.<br />\r\n<br />\r\nGunakan [TempatSurat] untuk menampilkan tempat surat.<br />\r\nGunakan [TanggalSurat] untuk menampilkan tanggal surat.<br />\r\n<br />\r\nGunakan [Jabatan_AN] untuk menampilkan jabatan atas nama.<br />\r\nGunakan [Nama_AN] untuk menampilkan nama atas nama.<br />\r\nGunakan [NIP_AN] untuk menampilkan NIP atas nama.</p>\r\n', 'on', 'on', 'on', '38f5b71c3a60942abf2181c3d867648f');

-- --------------------------------------------------------

--
-- Table structure for table `layout_mhs`
--

DROP TABLE IF EXISTS `layout_mhs`;

CREATE TABLE `layout_mhs` (
  `id_layout_mhs` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `judul_inggris` varchar(255) NOT NULL,
  `format_nosur` varchar(255) NOT NULL,
  `setting` text NOT NULL,
  `setting_inggris` text NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `borang1status` enum('off','text','file') NOT NULL DEFAULT 'off',
  `borang2status` enum('off','text','file') NOT NULL DEFAULT 'off',
  `borang3status` enum('off','text','file') NOT NULL DEFAULT 'off',
  `borang4status` enum('off','text','file') NOT NULL DEFAULT 'off',
  `borang5status` enum('off','text','file') NOT NULL DEFAULT 'off',
  `borang6status` enum('off','text','file') NOT NULL DEFAULT 'off',
  `borang7status` enum('off','text','file') NOT NULL DEFAULT 'off',
  `borang8status` enum('off','text','file') NOT NULL DEFAULT 'off',
  `borang9status` enum('off','text','file') NOT NULL DEFAULT 'off',
  `borang10status` enum('off','text','file') NOT NULL DEFAULT 'off',
  `borang1judul` varchar(255) NOT NULL,
  `borang2judul` varchar(255) NOT NULL,
  `borang3judul` varchar(255) NOT NULL,
  `borang4judul` varchar(255) NOT NULL,
  `borang5judul` varchar(255) NOT NULL,
  `borang6judul` varchar(255) NOT NULL,
  `borang7judul` varchar(255) NOT NULL,
  `borang8judul` varchar(255) NOT NULL,
  `borang9judul` varchar(255) NOT NULL,
  `borang10judul` varchar(255) NOT NULL,
  `borang1desc` text NOT NULL,
  `borang2desc` text NOT NULL,
  `borang3desc` text NOT NULL,
  `borang4desc` text NOT NULL,
  `borang5desc` text NOT NULL,
  `borang6desc` text NOT NULL,
  `borang7desc` text NOT NULL,
  `borang8desc` text NOT NULL,
  `borang9desc` text NOT NULL,
  `borang10desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `layout_mhs`
--

INSERT INTO `layout_mhs` (`id_layout_mhs`, `id_fakultas`, `judul`, `judul_inggris`, `format_nosur`, `setting`, `setting_inggris`, `identifier`, `borang1status`, `borang2status`, `borang3status`, `borang4status`, `borang5status`, `borang6status`, `borang7status`, `borang8status`, `borang9status`, `borang10status`, `borang1judul`, `borang2judul`, `borang3judul`, `borang4judul`, `borang5judul`, `borang6judul`, `borang7judul`, `borang8judul`, `borang9judul`, `borang10judul`, `borang1desc`, `borang2desc`, `borang3desc`, `borang4desc`, `borang5desc`, `borang6desc`, `borang7desc`, `borang8desc`, `borang9desc`, `borang10desc`) VALUES
(1, 14, 'Surat Aktif Kuliah', 'Active Status Letter', 'KMS', '<p style=\"text-align:center\"><span style=\"font-size:22px\"><u>[JudulSurat]</u></span></p>\r\n\r\n<p style=\"text-align:center\">[NomorSurat]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:22px\"><strong>Data mahasiswa</strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nama / NIM: [Nama_Mahasiswa] / [NIM_Mahasiswa]</p>\r\n\r\n<p>Email / No HP: [Email_Mahasiswa] / [NoHP_Mahasiswa]</p>\r\n\r\n<p>Tempat/tanggal lahir: [TempatLahir_Mahasiswa] / [TanggalLahir_Mahasiswa]</p>\r\n\r\n<p>Jenjang Studi/Tahun Terdaftar: [JenjangStudi_Mahasiswa] / [TahunTerdaftar_Mahasiswa]</p>\r\n\r\n<p>Prodi/Fakultas: [Prodi_Mahasiswa] / [Fakultas_Mahasiswa]</p>\r\n\r\n<p>Alamat: [Alamat_Mahasiswa]</p>\r\n\r\n<p>Nama Orang Tua: [NamaAyah_Mahasiswa]</p>\r\n\r\n<p>Alamat Orang Tua: [AlamatOrtu_Mahasiswa]</p>\r\n\r\n<p>IPS/IPK : [Form_IPS] / [Form_IPK]</p>\r\n\r\n<p>Rencana Tamat : [Form_Rencana Tamat]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>adalah benar mahasiswa aktif Fakultas Ilmu Komputer dan Teknologi Informasi. Surat ini dibuat untuk keperluan <strong>[Form_Keperluan]</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">[TempatSurat], [TanggalSurat]</p>\r\n\r\n<p style=\"text-align:right\">a.n. [Jabatan_AN]</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><u>[Nama_AN]</u></p>\r\n\r\n<p style=\"text-align:right\">NIP. [NIP_AN]</p>\r\n', '<p style=\"text-align:center\"><span style=\"font-size:22px\"><u>[JudulSurat]</u></span></p>\r\n\r\n<p style=\"text-align:center\">[NomorSurat]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"font-size:22px\"><strong>Student Identity</strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Nama / NIM: [Nama_Mahasiswa] / [NIM_Mahasiswa]</p>\r\n\r\n<p>Email / No HP: [Email_Mahasiswa] / [NoHP_Mahasiswa]</p>\r\n\r\n<p>Tempat/tanggal lahir: [TempatLahir_Mahasiswa] / [TanggalLahir_Mahasiswa]</p>\r\n\r\n<p>Jenjang Studi/Tahun Terdaftar: [JenjangStudi_Mahasiswa] / [TahunTerdaftar_Mahasiswa]</p>\r\n\r\n<p>Prodi/Fakultas: [Prodi_Mahasiswa] / [Fakultas_Mahasiswa]</p>\r\n\r\n<p>Alamat: [Alamat_Mahasiswa]</p>\r\n\r\n<p>Nama Orang Tua: [NamaAyah_Mahasiswa]</p>\r\n\r\n<p>Alamat Orang Tua: [AlamatOrtu_Mahasiswa]</p>\r\n\r\n<p>IPS/IPK : [Form_IPS] / [Form_IPK]</p>\r\n\r\n<p>Rencana Tamat : [Form_Rencana Tamat]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>adalah benar mahasiswa aktif Fakultas Ilmu Komputer dan Teknologi Informasi. Surat ini dibuat untuk keperluan <strong>[Form_Keperluan]</strong>.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">[TempatSurat], [TanggalSurat]</p>\r\n\r\n<p style=\"text-align:right\">a.n. [Jabatan_AN]</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><u>[Nama_AN]</u></p>\r\n\r\n<p style=\"text-align:right\">NIP. [NIP_AN]</p>\r\n', 'f7537ff1d74f8d17b2b5faf742547a2b', 'text', 'text', 'text', 'text', 'file', 'file', 'off', 'off', 'off', 'off', 'IPS', 'IPK', 'Rencana Tamat', 'Keperluan', 'Scan KTM', 'Scan Billing Statement', '', '', '', '', 'Tulis IPS Anda', 'Tulis IPK terbaru Anda', 'Tulis tahun rencana tamat Anda', 'Tuliskan keperluan Anda membuat surat aktif kuliah', 'Upload file scan KTM Anda', 'Upload file scan billing statemant Anda', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `isi_log` text NOT NULL,
  `kapan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `id_fakultas`, `isi_log`, `kapan`) VALUES
(1, 14, 'TU dengan NIP tu1 membuat surat baru dengan layout ber id_layout = 1 , bahasa: inggris.', '2018-12-26 02:25:40'),
(2, 14, 'TU dengan NIP tu1 membuat surat baru dengan layout ber id_layout = 1 , bahasa: indonesia.', '2018-12-26 02:51:19'),
(3, 14, 'TU dengan NIP tu1 membuat surat baru dengan layout ber id_layout = 1 , bahasa: indonesia.', '2018-12-26 03:19:52'),
(4, 14, 'Mahasiswa dengan NIM 171402039 mnengirim permintaan surat', '2018-12-27 02:24:56'),
(5, 14, 'Mahasiswa dengan NIM 171402039 mnengirim permintaan surat', '2018-12-27 02:25:39'),
(6, 14, 'TU dengan NIP tu14 menerima permintaan surat dari mahasiswa dengan NIM 171402090', '2018-12-27 02:26:21'),
(7, 14, 'TU dengan NIP tu14 menolak permintaan surat dari mahasiswa dengan NIM 171402048', '2018-12-27 02:26:47'),
(8, 14, 'Mahasiswa dengan NIM 171402087 mnengirim permintaan surat', '2019-01-01 03:38:02'),
(9, 14, 'TU dengan NIP tu14.1 menerima permintaan surat dari mahasiswa dengan NIM 171402087', '2019-01-01 04:12:53'),
(10, 14, 'Mahasiswa dengan NIM 171402090 mnengirim permintaan surat', '2019-01-01 13:27:23'),
(11, 14, 'TU dengan NIP tu14 menerima permintaan surat dari mahasiswa dengan NIM 171402090', '2019-01-01 16:45:49'),
(12, 14, 'Mahasiswa dengan NIM 171402090 mnengirim permintaan surat', '2019-01-02 19:01:35'),
(13, 14, 'TU dengan NIP tu14 menerima permintaan surat dari mahasiswa dengan NIM 171402090', '2019-01-02 19:58:29'),
(14, 14, 'TU dengan NIP tu14 menolak permintaan surat dari mahasiswa dengan NIM 171402090', '2019-01-03 12:46:10'),
(15, 14, 'Mahasiswa dengan NIM 171402090 mnengirim permintaan surat', '2019-01-03 12:46:45'),
(16, 14, 'TU dengan NIP tu14 menerima permintaan surat dari mahasiswa dengan NIM 171402090', '2019-01-03 12:46:53'),
(17, 14, 'TU dengan NIP tu14.1 membuat surat baru dengan layout ber id_layout = 1 , bahasa: indonesia.', '2019-01-03 13:17:18'),
(18, 14, 'TU dengan NIP tu14.1 membuat surat baru dengan layout ber id_layout = 1 , bahasa: indonesia.', '2019-01-03 13:18:44');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;

CREATE TABLE `mahasiswa` (
  `NIM` varchar(9) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `TempatLahir` varchar(50) NOT NULL,
  `TanggalLahir` date NOT NULL,
  `JenisKelamin` varchar(15) NOT NULL,
  `Agama` varchar(25) NOT NULL,
  `JenjangStudi` enum('D-3','D-4','S-1','S-2','S-3') NOT NULL,
  `Kewarganegaraan` varchar(10) NOT NULL,
  `Alamat` text NOT NULL,
  `AlamatOrtu` text NOT NULL,
  `AsalSekolah` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `NamaAyah` varchar(50) NOT NULL,
  `NamaIbu` varchar(50) NOT NULL,
  `TahunMasuk` year(4) NOT NULL,
  `LinkFoto` text NOT NULL,
  `Id_Fakultas` int(5) NOT NULL,
  `Id_Prodi` int(5) NOT NULL,
  `Ac_Status` varchar(100) NOT NULL,
  `kode_pulih` varchar(255) NOT NULL DEFAULT 'normal'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NIM`, `Nama`, `Password`, `TempatLahir`, `TanggalLahir`, `JenisKelamin`, `Agama`, `JenjangStudi`, `Kewarganegaraan`, `Alamat`, `AlamatOrtu`, `AsalSekolah`, `Email`, `hp`, `NamaAyah`, `NamaIbu`, `TahunMasuk`, `LinkFoto`, `Id_Fakultas`, `Id_Prodi`, `Ac_Status`, `kode_pulih`) VALUES
('171402012', 'Aflah Mutsanni Pulungan', 'b1df7f60a64cbceb7bf02fef697e4017', ' KAB. MANDAILING NATAL', '1999-09-02', ' Perempuan', ' ISLAM', 'S-1', ' WNI', ' Jl. Bakti Abri, Panyabungan, Mandailing Natal', ' Jl. Bakti Abri, Panyabungan, Mandailing Natal', ' SMTA Lain-lain,', '', '', ' Hanafi Pulungan', ' Rapeah Lubis', 2017, 'https://portal.usu.ac.id/photos/171402012.jpg', 14, 46, 'verified', 'normal'),
('171402018', 'Farhan Abdillah', 'c4ca4238a0b923820dcc509a6f75849b', ' KOTA P.SIANTAR', '1999-10-17', ' Laki-laki', ' ISLAM', '', ' WNI', 'gggdhfh', 'tgytytyt', ' MA Negeri, P. Siantar', 'kodrat@gmail.com', '', ' SUHERNO', ' NINGSIH', 2017, 'https://portal.usu.ac.id/photos/171402018.jpg', 14, 46, 'email_changed', 'Normal'),
('171402039', 'Okky Nadiya', '8ff1119461891dd5413a7afd39b6490d', ' KOTA MEDAN', '1999-10-11', ' Perempuan', ' ISLAM', '', ' WNI', '1', '1', ' SMU Negeri 15, Medan', 'okky@ad.tni', '', ' SUGINO', ' INDRAWATI', 2017, 'https://portal.usu.ac.id/photos/171402039.jpg', 14, 46, 'verified', 'normal'),
('171402048', 'ANNISA', 'c1c52723fddb0c53c21f8e50dfd8efb0', ' KOTA MEDAN', '1999-01-13', ' Perempuan', ' ISLAM', 'S-1', ' WNI', ' Jalan Marelan VII Gang Amal Baru No. 16B Medan Marelan', ' Jalan Marelan VII Gang Amal Baru No. 16B Medan Marelan', ' SMU Negeri 16, Medan', '', '', ' Edy Francis', ' Nursabriati', 2017, 'https://portal.usu.ac.id/photos/171402048.jpg', 14, 46, 'verified', 'normal'),
('171402069', 'RIO PRATAMA KARO-KARO', '49c89f05404d83bcf5815729948adb35', ' KAB. KARO', '1999-09-16', ' Laki-laki', ' ISLAM', '', ' WNI', ' Desa Merdeka Kec. Merdeka Kab. Karo', ' Desa Merdeka Kec. Merdeka Kab. Karo', ' SMTA Lain-lain,', 'rio@mail.com', '', ' Rudianto Karo-karo', ' Juliana', 2017, 'https://portal.usu.ac.id/photos/171402069.jpg', 14, 46, 'verified', 'normal'),
('171402087', 'ARSIL NUGRAHA', 'e4cef2ce9b2af576e4359914aef86f6a', ' KOTA MEDAN', '2000-08-12', ' Laki-laki', ' ISLAM', 'S-1', ' WNI', ' JL LAKSANA GG GANI NO 17 MEDAN', ' JL LAKSANA GG GANI NO 17 MEDAN', ' SMU Negeri 6, Medan', 'nugrahaarsil@gmail.com', '082272175944', ' SAMAD', ' SUYATI', 2017, 'https://portal.usu.ac.id/photos/171402087.jpg', 14, 46, 'verified', 'normal'),
('171402090', 'MUHAMMAD BAGUS SYAHPUTRA TAMBUNAN', '0cc175b9c0f1b6a831c399e269772661', ' KAB. ASAHAN', '1999-07-30', ' Laki-laki', ' ISLAM', 'S-1', ' WNI', ' Air Genting Dusun 2, Kec. Air Batu', ' Air Genting Dusun 2, Kec. Air Batu', ' SMTA Lain-lain,', 'b@mail.com', '081234567890', ' Rahman Arif Tambunan', ' Siti Asrimah', 2017, 'https://portal.usu.ac.id/photos/171402090.jpg', 14, 46, 'verified', 'Normal'),
('171402108', 'GEUBRIE ROSANNA', '2c0978a5b5195bb49069ee066395ed72', ' KOTA BANDA ACEH', '1999-05-12', ' Perempuan', ' ISLAM', 'S-1', ' WNI', ' Jl.Kenari Komplek Bank Duta Ceudah, Uteunbayi No.11 ', ' Jl.Kenari Komplek Bank Duta Ceudah, Uteunbayi No.11 ', ' SMU Yapena, Lhokseumawe', '', '', ' Ridwan', ' Mala Fajriah', 2017, 'https://portal.usu.ac.id/photos/171402108.jpg', 14, 46, 'verified', 'normal'),
('171402150', 'Ariel Febrian', '52f48a1f44daf3658d084b02dc09535b', ' KAB.ACEH SINGKIL', '1998-02-09', ' Laki-laki', ' ISLAM', '', ' WNI', ' Jl. Siti ambia, kab. Aceh singkil', ' Jl. Siti ambia, kab. Aceh singkil', ' SMTA Lain-lain,', 'ariel@mail.com', '', ' udin pohan', ' saminar', 2017, 'https://portal.usu.ac.id/photos/171402150.jpg', 14, 46, 'verified', 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

DROP TABLE IF EXISTS `notifikasi`;

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `notifikasi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `notifikasi`) VALUES
(1, 'notifikasi_terbaca'),
(2, 'kirim_sa'),
(3, 'notif_mhs');

-- --------------------------------------------------------

--
-- Table structure for table `pemberitahuan`
--

DROP TABLE IF EXISTS `pemberitahuan`;

CREATE TABLE `pemberitahuan` (
  `id` int(11) NOT NULL,
  `NIM` varchar(9) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subjek` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `seen` enum('new','seen') NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemberitahuan`
--

INSERT INTO `pemberitahuan` (`id`, `NIM`, `date`, `subjek`, `isi`, `seen`) VALUES
(1, '171402090', '2018-12-26 02:36:18', 'Surat anda ditolak', 'Permintaan surat aktif kuliah Anda ditolak oleh TU. Mohon cek kembali surat Anda. Keterangan: ga mood', 'seen'),
(2, '171402090', '2018-12-26 03:31:56', 'Surat anda disetujui', 'Permintaan surat aktif kuliah Anda telah disetujui oleh TU. Silahkan ambil surat Anda di TU Fakultas.', 'seen'),
(3, '171402090', '2018-12-26 17:00:16', 'Surat anda disetujui', 'Permintaan surat aktif kuliah Anda telah disetujui oleh TU. Silahkan ambil surat Anda di TU Fakultas.', 'seen'),
(4, '171402090', '2018-12-26 17:19:46', 'Surat anda ditolak', 'Permintaan surat aktif kuliah Anda ditolak oleh TU. Mohon cek kembali surat Anda. Keterangan: malas', 'seen'),
(5, '171402048', '2018-12-26 18:36:41', 'Surat anda disetujui', 'Permintaan surat aktif kuliah Anda telah disetujui oleh TU. Silahkan ambil surat Anda di TU Fakultas.', 'new'),
(6, '171402090', '2018-12-27 02:26:21', 'Surat anda disetujui', 'Permintaan surat aktif kuliah Anda telah disetujui oleh TU. Silahkan ambil surat Anda di TU Fakultas.', 'seen'),
(7, '171402048', '2018-12-27 02:26:47', 'Surat anda ditolak', 'Permintaan surat aktif kuliah Anda ditolak oleh TU. Mohon cek kembali surat Anda. Keterangan: kurang lengkap berkas', 'new'),
(8, '171402087', '2019-01-01 04:12:53', 'Surat anda disetujui', 'Permintaan surat aktif kuliah Anda telah disetujui oleh TU. Silahkan ambil surat Anda di TU Fakultas.', 'new'),
(9, '171402090', '2019-01-01 16:45:49', 'Surat anda disetujui', 'Permintaan surat aktif kuliah Anda telah disetujui oleh TU. Silahkan ambil surat Anda di TU Fakultas.', 'seen'),
(10, '171402090', '2019-01-02 19:58:29', 'Surat anda disetujui', 'Permintaan surat aktif kuliah Anda telah disetujui oleh TU. Silahkan ambil surat Anda di TU Fakultas.', 'new'),
(11, '171402090', '2019-01-03 12:46:11', 'Surat anda ditolak', 'Permintaan surat aktif kuliah Anda ditolak oleh TU. Mohon cek kembali surat Anda. Keterangan: kacau', 'seen'),
(12, '171402090', '2019-01-03 12:46:53', 'Surat anda disetujui', 'Permintaan surat aktif kuliah Anda telah disetujui oleh TU. Silahkan ambil surat Anda di TU Fakultas.', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

DROP TABLE IF EXISTS `prodi`;

CREATE TABLE `prodi` (
  `id_prodi` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `Prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `id_fakultas`, `Prodi`) VALUES
(1, 1, 'Pendidikan Dokter'),
(2, 2, 'Ilmu Hukum'),
(3, 2, 'Ilmu Hukum'),
(4, 3, 'Agroekoteknologi'),
(5, 3, 'Manajemen Sumber Daya Perairan'),
(6, 3, 'Agribisnis'),
(7, 3, 'Ilmu dan Teknologi Pangan'),
(8, 3, 'Peternakan'),
(9, 3, 'Keteknikan Pertanian'),
(10, 4, 'Teknik Mesin'),
(11, 4, 'Teknik Industri'),
(12, 4, 'Teknik Sipil'),
(13, 4, 'Teknik Kimia'),
(14, 4, 'Arsitektur'),
(15, 4, 'Teknik Lingkungan'),
(16, 5, 'Ekonomi Pembangunan'),
(17, 5, 'Manajemen'),
(18, 5, 'Akuntansi'),
(19, 6, 'Pendidikan Dokter Gigi'),
(20, 7, 'Sastra Indonesia'),
(21, 7, 'Sastra Batak'),
(22, 7, 'Sastra Melayu'),
(23, 7, 'Sastra Arab'),
(24, 7, 'Sastra Inggris'),
(25, 7, 'Ilmu Sejarah'),
(26, 7, 'Etnomusikologi'),
(27, 7, 'Sastra Jepang'),
(28, 7, 'Ilmu Perpustakaan'),
(29, 7, 'Sastra Cina'),
(30, 8, 'Fisika'),
(31, 8, 'Kimia'),
(32, 8, 'Matematika'),
(33, 8, 'Biologi'),
(34, 9, 'Sosiologi'),
(35, 9, 'Ilmu Kesejahteraan Sosial'),
(36, 9, 'Ilmu Administrasi Negara'),
(37, 9, 'Ilmu Komunikasi'),
(38, 9, 'Antropologi Sosial'),
(39, 9, 'Ilmu Politik'),
(40, 9, 'Ilmu Administrasi Niaga'),
(41, 10, 'Kesehatan Masyarakat'),
(42, 11, 'Ilmu Keperawatan'),
(43, 12, 'Kehutanan'),
(44, 13, 'Psikologi'),
(45, 14, 'Ilmu Komputer'),
(46, 14, 'Teknologi Informasi'),
(47, 15, 'Farmasi');

-- --------------------------------------------------------

--
-- Table structure for table `staff_tu`
--

DROP TABLE IF EXISTS `staff_tu`;

CREATE TABLE `staff_tu` (
  `NIP` varchar(50) NOT NULL,
  `Nama` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `foto_profil` varchar(255) NOT NULL DEFAULT 'default.png',
  `id_fakultas` int(11) NOT NULL,
  `kode_pulih` varchar(255) NOT NULL DEFAULT 'normal',
  `Jabatan` varchar(25) NOT NULL,
  `level` enum('biasa','super') NOT NULL DEFAULT 'biasa'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_tu`
--

INSERT INTO `staff_tu` (`NIP`, `Nama`, `Email`, `Password`, `foto_profil`, `id_fakultas`, `kode_pulih`, `Jabatan`, `level`) VALUES
('tu1', 'TU Kedokteran', 'tukedokteran@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 1, 'normal', 'Kepala Bagian TU', 'super'),
('tu1.1', 'TU Kedokteran', 'tukedokteran1@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 1, 'normal', 'Staff TU', 'biasa'),
('tu10', 'TU Fakultas Kesehatan Masyarakat', 'fkm@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 10, 'normal', 'Kepala Bagian TU', 'super'),
('tu10.1', 'TU Fakultas Kesehatan Masyarakat', 'tufkm@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 10, 'normal', 'Staff TU', 'biasa'),
('tu11', 'TU Fakultas Keperawatan', 'fkep@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 11, 'normal', 'Kepala Bagian TU', 'super'),
('tu11.1', 'TU Fakultas Keperawatan', 'tufkep@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 11, 'normal', 'Staff TU', 'biasa'),
('tu12', 'TU Fakultas Kehutanan', 'fahutan@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 12, 'normal', 'Kepala Bagian TU', 'super'),
('tu12.1', 'TU Fakultas Kehutanan', 'tufahutan@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 12, 'normal', 'Staff TU', 'biasa'),
('tu13', 'TU Fakultas Psikologi', 'fpsi@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 13, 'normal', 'Kepala Bagian TU', 'super'),
('tu13.1', 'TU Fakultas Psikologi', 'tufpsi@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 13, 'normal', 'Staff TU', 'biasa'),
('tu14', 'TU FasilkomTI', 'tu1@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'Cute_R_05.png', 14, 'Normal', 'Kepala Bagian TU', 'super'),
('tu14.1', 'Staff TU', 'tu11@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 14, 'normal', '', 'biasa'),
('tu15', 'TU Fakultas Farmasi', 'farmasi@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 15, 'normal', 'Kepala Bagian TU', 'super'),
('tu15.1', 'TU Fakultas Farmasi', 'tufarmasi@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 15, 'normal', 'Staff TU', 'biasa'),
('tu2', 'TU Fakultas Hukum', 'tufakum@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 2, 'normal', 'Kepala Bagian TU', 'super'),
('tu2.1', 'TU Fakultas Hukum', 'fakum@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 2, 'normal', 'Staff TU', 'biasa'),
('tu3', 'TU Fakultas Pertanian', 'fp@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 3, 'normal', 'Kepala Bagian TU', 'super'),
('tu3.1', 'TU Fakultas Pertanian', 'tufp@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 3, 'normal', 'Staff TU', 'biasa'),
('tu4', 'TU Fakultas Teknik', 'faktek@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 4, 'normal', 'Kepala Bagian TU', 'super'),
('tu4.1', 'TU Fakultas Teknik', 'tufaktek@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 4, 'normal', 'Staff TU', 'biasa'),
('tu5', 'TU Fakultas Ekonomi', 'fakon@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 5, 'normal', 'Kepala Bagian TU', 'super'),
('tu5.1', 'TU Fakultas Teknik', 'tufakon@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 5, 'normal', 'Staff TU', 'biasa'),
('tu6', 'TU Fakultas Kedokteran Gigi', 'fakedgi@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 6, 'normal', 'Kepala Bagian TU', 'super'),
('tu6.1', 'TU Fakultas Kedokteran Gigi', 'tufakedgi@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 6, 'normal', 'Staff TU', 'biasa'),
('tu7', 'TU Fakultas Ilmu Budaya', 'fakilbud@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 7, 'normal', 'Kepala Bagian TU', 'super'),
('tu7.1', 'TU Fakultas Ilmu Budaya', 'tufakilbud@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 7, 'normal', 'Staff TU', 'biasa'),
('tu8', 'TU Fakultas Matematika dan IPA', 'fmipa@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 8, 'normal', 'Kepala Bagian TU', 'super'),
('tu8.1', 'TU Fakultas Matematika dan IPA', 'tufmipa@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 8, 'normal', 'Staff TU', 'biasa'),
('tu9', 'TU Fakultas Ilmu-Ilmu Sosial dan Ilmu Politik', 'fisip@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 9, 'normal', 'Kepala Bagian TU', 'super'),
('tu9.1', 'TU Fakultas Ilmu-Ilmu Sosial dan Politik', 'tufisip@gmail.com', 'af0a79c636f142ed01aae662177abff4', 'default.png', 9, 'normal', 'Staff TU', 'biasa');

-- --------------------------------------------------------

--
-- Table structure for table `surat_disposisi`
--

DROP TABLE IF EXISTS `surat_disposisi`;

CREATE TABLE `surat_disposisi` (
  `id_suratdisposisi` int(11) NOT NULL,
  `id_surat` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `nip` varchar(11) NOT NULL,
  `no_agenda` int(11) NOT NULL,
  `Pengirim` varchar(50) NOT NULL,
  `DidisposisikanKepada` text NOT NULL,
  `isidisposisi` text NOT NULL,
  `Catatan` text NOT NULL,
  `Tanggal_Surat` date NOT NULL,
  `KembalikanKepada` text NOT NULL,
  `TanggalDikembalikan` date NOT NULL,
  `tindakan` enum('arsip','non-arsip') NOT NULL DEFAULT 'non-arsip'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_disposisi`
--

INSERT INTO `surat_disposisi` (`id_suratdisposisi`, `id_surat`, `id_fakultas`, `nip`, `no_agenda`, `Pengirim`, `DidisposisikanKepada`, `isidisposisi`, `Catatan`, `Tanggal_Surat`, `KembalikanKepada`, `TanggalDikembalikan`, `tindakan`) VALUES
(17, 33, 14, 'tu14', 2, 'Kepala Bagian TU', 'Kasub. Bag. Penelitian, PKM, dan Kerjasama', 'mohon dihadiri', 'dihadiri kemudian beri laporan', '2019-01-01', 'Bagian TU', '2019-01-24', 'arsip');

-- --------------------------------------------------------

--
-- Table structure for table `surat_eksternal`
--

DROP TABLE IF EXISTS `surat_eksternal`;

CREATE TABLE `surat_eksternal` (
  `id` int(11) NOT NULL,
  `nomorsurat` varchar(100) NOT NULL,
  `perihal` varchar(255) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `nip_staff_tu` varchar(50) NOT NULL,
  `asal` varchar(255) NOT NULL,
  `tanggal_input` date NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `tanggal_surat` date NOT NULL,
  `TingkatKeamanan` enum('Sangat Rahasia','Rahasia','Biasa','') NOT NULL,
  `isi_surat` text NOT NULL,
  `KategoriSurat` varchar(50) NOT NULL,
  `sebagai` enum('draft','uploaded') NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `status_disposisi` varchar(25) NOT NULL,
  `tindakan` enum('non-arsip','arsip') NOT NULL DEFAULT 'non-arsip'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_eksternal`
--

INSERT INTO `surat_eksternal` (`id`, `nomorsurat`, `perihal`, `id_fakultas`, `nip_staff_tu`, `asal`, `tanggal_input`, `tanggal_diterima`, `tanggal_surat`, `TingkatKeamanan`, `isi_surat`, `KategoriSurat`, `sebagai`, `identifier`, `status_disposisi`, `tindakan`) VALUES
(32, 'A11/123', 'asfsa', 14, 'tu11', 'asfsa', '2018-12-26', '2018-12-31', '2018-12-31', 'Sangat Rahasia', 'safasf', 'Surat Keputusan', 'uploaded', 'c4c16eeae0cc00f62d6f3983d6543ac5', 'memiliki disposisi', 'arsip'),
(33, 'A11/1232', 'dsadsa', 14, 'tu11', 'sadas', '2018-12-26', '2018-01-01', '2018-12-31', 'Sangat Rahasia', 'dsadsa', 'Surat Keputusan', 'uploaded', '189e97662096b4ed46cd691cfe207c4c', 'memiliki disposisi', 'non-arsip'),
(34, '', '', 14, 'tu11', '', '2018-12-27', '0000-00-00', '0000-00-00', 'Sangat Rahasia', '', '', 'draft', 'edb32b962c867effb5aa8b78c5e08d9f', '', 'non-arsip');

-- --------------------------------------------------------

--
-- Table structure for table `surat_flex`
--

DROP TABLE IF EXISTS `surat_flex`;

CREATE TABLE `surat_flex` (
  `id_surat` int(11) NOT NULL,
  `id_layout` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `pembuatan` enum('siperan','unggahan') NOT NULL DEFAULT 'siperan',
  `nomorsurat` varchar(50) NOT NULL,
  `bahasa` enum('indonesia','inggris') NOT NULL DEFAULT 'indonesia',
  `NIP_surat` varchar(50) NOT NULL,
  `hal_surat` varchar(255) NOT NULL,
  `isi_surat` text NOT NULL,
  `penerima_surat` text NOT NULL,
  `tempat_surat` varchar(255) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `atasnama_surat` int(11) NOT NULL,
  `status_surat` enum('non-arsip','arsip') NOT NULL DEFAULT 'non-arsip',
  `identifier` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_flex`
--

INSERT INTO `surat_flex` (`id_surat`, `id_layout`, `id_fakultas`, `pembuatan`, `nomorsurat`, `bahasa`, `NIP_surat`, `hal_surat`, `isi_surat`, `penerima_surat`, `tempat_surat`, `tanggal_surat`, `atasnama_surat`, `status_surat`, `identifier`) VALUES
(1, 1, 14, 'siperan', '1/UN5.2.1.14/UND/2018', 'inggris', 'tu1', '', '<p><u><span style=\"font-size:24px\">[JudulSurat]</span></u></p>\r\n\r\n<p>Number: [NomorSurat]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>To:</p>\r\n\r\n<p>Position and Organization</p>\r\n\r\n<p>Agency</p>\r\n\r\n<p>City</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>In connection with that it is expected to be present at:</p>\r\n\r\n<p>Date:</p>\r\n\r\n<p>Day:</p>\r\n\r\n<p>Hit:</p>\r\n\r\n<p>The place :</p>\r\n\r\n<p>Event :</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>For your attention and attendance, we thank you.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p>[TempatSurat], [TanggalSurat]</p>\r\n\r\n<p>[Jabatan_AN]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><u>[Nama_AN]</u></p>\r\n\r\n<p>NIP. [NIP_AN]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Copy:</p>\r\n\r\n<ol>\r\n	<li>&nbsp;</li>\r\n	<li>&nbsp;</li>\r\n</ol>\r\n\r\n<p>Note:</p>\r\n', '', 'Medan', '2018-12-26', 1, 'arsip', 'ba169bdec57e75caf02a82b71c7bbfb2'),
(2, 1, 14, 'siperan', '2/UN5.2.1.14/UND/2018', 'indonesia', 'tu1', '', '<p style=\"text-align:center\"><u><span style=\"font-size:24px\">SURAT [JudulSurat]</span></u></p>\r\n\r\n<p style=\"text-align:center\">Nomor: [NomorSurat]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Kepada:</p>\r\n\r\n<p>Jabatan dan Organisasi</p>\r\n\r\n<p>Instansi</p>\r\n\r\n<p>Kota</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Sehubungan dengan itu diharapkan hadir pada:</p>\r\n\r\n<p>Tanggal :</p>\r\n\r\n<p>Hari :</p>\r\n\r\n<p>Pukul :</p>\r\n\r\n<p>Tempat :</p>\r\n\r\n<p>Acara :</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Atas perhatian dan kehadiran Saudara kami mengucapkan terima kasih.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">[TempatSurat], [TanggalSurat]</p>\r\n\r\n<p style=\"text-align:right\">[Jabatan_AN]</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><u>[Nama_AN]</u></p>\r\n\r\n<p style=\"text-align:right\">NIP. [NIP_AN]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tembusan:</p>\r\n\r\n<ol>\r\n	<li>&nbsp;</li>\r\n	<li>&nbsp;</li>\r\n</ol>\r\n\r\n<p>NB:</p>\r\n', '', 'Medan', '2018-12-26', 1, 'arsip', '56e9fb6b7b9c5942e396b89ce85e4999'),
(3, 1, 14, 'siperan', '3/UN5.2.1.14/UND/2018', 'indonesia', 'tu1', '', '<p><u><span style=\"font-size:24px\">SURAT [JudulSurat]</span></u></p>\r\n\r\n<p>Nomor: [NomorSurat]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Kepada:</p>\r\n\r\n<p>Jabatan dan Organisasi</p>\r\n\r\n<p>Instansi</p>\r\n\r\n<p>Kota</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Sehubungan dengan itu diharapkan hadir pada:</p>\r\n\r\n<p>Tanggal :</p>\r\n\r\n<p>Hari :</p>\r\n\r\n<p>Pukul :</p>\r\n\r\n<p>Tempat :</p>\r\n\r\n<p>Acara :</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Atas perhatian dan kehadiran Saudara kami mengucapkan terima kasih.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">[TempatSurat], [TanggalSurat]</p>\r\n\r\n<p style=\"text-align:right\">[Jabatan_AN]</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\">&nbsp;</p>\r\n\r\n<p style=\"text-align:right\"><u>[Nama_AN]</u></p>\r\n\r\n<p style=\"text-align:right\">NIP. [NIP_AN]</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Tembusan:</p>\r\n\r\n<ol>\r\n	<li>&nbsp;</li>\r\n	<li>&nbsp;</li>\r\n</ol>\r\n\r\n<p>NB:</p>\r\n', '', 'Medan', '2018-12-26', 1, 'non-arsip', 'eb71051eabf092ce956e40f89bd80823'),
(4, 1, 14, 'unggahan', '4/UN5.2.1.14/UND/2019', 'indonesia', 'tu14.1', '', '', '', 'Medan', '2019-01-03', 1, 'non-arsip', 'bd42ca8d46cbdad0d36a2942c7fd0b09'),
(5, 1, 14, 'unggahan', '5/UN5.2.1.14/UND/2019', 'indonesia', 'tu14.1', '', '45388494_2513730148652161_5254317871571402752_n.jpg', '', 'Medan', '2019-01-03', 1, 'non-arsip', '95d19312c360e84890785e98ecf94fab');

-- --------------------------------------------------------

--
-- Table structure for table `surat_flex_mhs`
--

DROP TABLE IF EXISTS `surat_flex_mhs`;

CREATE TABLE `surat_flex_mhs` (
  `id_surat_mhs` int(11) NOT NULL,
  `id_layout_mhs` int(11) NOT NULL,
  `id_fakultas` int(11) NOT NULL,
  `nomorsurat` varchar(50) NOT NULL,
  `bahasa` enum('indonesia','inggris') NOT NULL DEFAULT 'indonesia',
  `atasnama_surat` int(11) DEFAULT NULL,
  `tgl_kirim` date DEFAULT NULL,
  `tgl_terima` date DEFAULT NULL,
  `tempat_surat` varchar(255) NOT NULL DEFAULT 'Medan',
  `status_surat` enum('draft','pending','approved','rejected','arsip') NOT NULL DEFAULT 'draft',
  `identifier` varchar(255) NOT NULL,
  `NIM_mhs` varchar(9) NOT NULL,
  `borang1` text NOT NULL,
  `borang2` text NOT NULL,
  `borang3` text NOT NULL,
  `borang4` text NOT NULL,
  `borang5` text NOT NULL,
  `borang6` text NOT NULL,
  `borang7` text NOT NULL,
  `borang8` text NOT NULL,
  `borang9` text NOT NULL,
  `borang10` text NOT NULL,
  `tindakan` enum('non-arsip','arsip') NOT NULL DEFAULT 'non-arsip'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_flex_mhs`
--

INSERT INTO `surat_flex_mhs` (`id_surat_mhs`, `id_layout_mhs`, `id_fakultas`, `nomorsurat`, `bahasa`, `atasnama_surat`, `tgl_kirim`, `tgl_terima`, `tempat_surat`, `status_surat`, `identifier`, `NIM_mhs`, `borang1`, `borang2`, `borang3`, `borang4`, `borang5`, `borang6`, `borang7`, `borang8`, `borang9`, `borang10`, `tindakan`) VALUES
(16, 1, 14, '2/UN5.2.1.14/KMS/2019', 'indonesia', 1, '2019-01-03', '2019-01-03', 'Medan', 'approved', 'e0c67d054baa497ffa71b681befe0717', '171402090', '3.65', '3.66', '2021', 'Mengikuti lomba Arkavidia', '39227073_249926832318866_6151174903459479552_n.jpg', '5bf3d3f6a049f27575_5.jpg', '', '', '', '', 'non-arsip');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atasnama`
--
ALTER TABLE `atasnama`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`id_fakultas`);

--
-- Indexes for table `lampiran`
--
ALTER TABLE `lampiran`
  ADD PRIMARY KEY (`id_lampiran`);

--
-- Indexes for table `lampiran_eksternal`
--
ALTER TABLE `lampiran_eksternal`
  ADD PRIMARY KEY (`id_lampiraneksternal`);

--
-- Indexes for table `layout`
--
ALTER TABLE `layout`
  ADD PRIMARY KEY (`id_layout`);

--
-- Indexes for table `layout_mhs`
--
ALTER TABLE `layout_mhs`
  ADD PRIMARY KEY (`id_layout_mhs`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NIM`),
  ADD KEY `Id_Prodi` (`Id_Prodi`),
  ADD KEY `mahasiswa_ibfk_1` (`Id_Fakultas`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`);

--
-- Indexes for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- Indexes for table `staff_tu`
--
ALTER TABLE `staff_tu`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `id_fakultas` (`id_fakultas`);

--
-- Indexes for table `surat_disposisi`
--
ALTER TABLE `surat_disposisi`
  ADD PRIMARY KEY (`id_suratdisposisi`);

--
-- Indexes for table `surat_eksternal`
--
ALTER TABLE `surat_eksternal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surat_flex`
--
ALTER TABLE `surat_flex`
  ADD PRIMARY KEY (`id_surat`);

--
-- Indexes for table `surat_flex_mhs`
--
ALTER TABLE `surat_flex_mhs`
  ADD PRIMARY KEY (`id_surat_mhs`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atasnama`
--
ALTER TABLE `atasnama`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fakultas`
--
ALTER TABLE `fakultas`
  MODIFY `id_fakultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lampiran`
--
ALTER TABLE `lampiran`
  MODIFY `id_lampiran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lampiran_eksternal`
--
ALTER TABLE `lampiran_eksternal`
  MODIFY `id_lampiraneksternal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `layout`
--
ALTER TABLE `layout`
  MODIFY `id_layout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `layout_mhs`
--
ALTER TABLE `layout_mhs`
  MODIFY `id_layout_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prodi`
--
ALTER TABLE `prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `surat_disposisi`
--
ALTER TABLE `surat_disposisi`
  MODIFY `id_suratdisposisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `surat_eksternal`
--
ALTER TABLE `surat_eksternal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `surat_flex`
--
ALTER TABLE `surat_flex`
  MODIFY `id_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `surat_flex_mhs`
--
ALTER TABLE `surat_flex_mhs`
  MODIFY `id_surat_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`Id_Fakultas`) REFERENCES `fakultas` (`id_fakultas`),
  ADD CONSTRAINT `mahasiswa_ibfk_3` FOREIGN KEY (`Id_Prodi`) REFERENCES `prodi` (`id_prodi`);

--
-- Constraints for table `prodi`
--
ALTER TABLE `prodi`
  ADD CONSTRAINT `prodi_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`);

--
-- Constraints for table `staff_tu`
--
ALTER TABLE `staff_tu`
  ADD CONSTRAINT `staff_tu_ibfk_1` FOREIGN KEY (`id_fakultas`) REFERENCES `fakultas` (`id_fakultas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
