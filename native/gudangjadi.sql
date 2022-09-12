-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Apr 2022 pada 09.51
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudangjadi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE `golongan` (
  `id` int(11) NOT NULL,
  `kdgol` varchar(10) NOT NULL,
  `namagol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`id`, `kdgol`, `namagol`) VALUES
(1, 'A', 'Koyo Lokal'),
(2, 'B', 'Obat  Jamu untuk obat luar (bentuk sediaan cair  semisolid)'),
(3, 'C', 'Obat  Jamu untuk diminum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id` int(11) NOT NULL,
  `kdjenis` varchar(10) NOT NULL,
  `namajenis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis`
--

INSERT INTO `jenis` (`id`, `kdjenis`, `namajenis`) VALUES
(1, 'K', 'Koyo'),
(2, 'P', 'Plaster'),
(3, 'COL', 'COL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluar`
--

CREATE TABLE `keluar` (
  `no` int(11) NOT NULL,
  `tglform` date NOT NULL,
  `noform` varchar(20) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `jumlah` decimal(20,2) NOT NULL,
  `tanggal` datetime NOT NULL,
  `saldo` decimal(20,2) NOT NULL,
  `adm` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `master`
--

CREATE TABLE `master` (
  `id` int(11) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `nama` text NOT NULL,
  `ukuran` text NOT NULL,
  `sat1` varchar(20) NOT NULL,
  `max1` varchar(10) NOT NULL,
  `sat2` varchar(20) NOT NULL,
  `max2` varchar(10) NOT NULL,
  `sat3` varchar(20) NOT NULL,
  `kdgol` varchar(20) NOT NULL,
  `kdjenis` varchar(20) NOT NULL,
  `tgl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `master`
--

INSERT INTO `master` (`id`, `kode`, `nama`, `ukuran`, `sat1`, `max1`, `sat2`, `max2`, `sat3`, `kdgol`, `kdjenis`, `tgl`) VALUES
(1, 'A.001.01', 'KOYO CABE (KECIL)  20 Sachet', '55 mm x 45 mm', 'Karton', '50', 'Box', '20', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(2, 'A.001.02', 'KOYO CABE (KECIL) @ 40 Sachet', '55 mm x 45 mm', 'Karton', '30', 'Box', '40', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(3, 'A.002.01', 'KOYO CABE (BESAR)', '17 cm x 11,5 cm', 'Karton', '50', 'Box', '24', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(4, 'A.003.01', 'GINGER PLESTER', '95 mm x 60 mm', 'Karton', '50', 'Box', '20', 'Kantong', '1', '1', '0000-00-00 00:00:00'),
(5, 'A.004.01', 'MASTER GLUCOSAMINE PATCH', '10 cm x 7 cm', 'Karton', '60', 'Box', '12', 'Kantong', '1', '1', '0000-00-00 00:00:00'),
(6, 'A.005.01', 'TAKAHI HOT (isi 10 lembar)', '55 mm x 45 mm', 'Karton', '100', 'Box', '12', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(7, 'A.005.02', 'TAKAHI HOT (RENCENG isi 2 lembar)', '55 mm x 45 mm', 'Karton', '60', 'Hanger', '20', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(8, 'A.006.01', 'KOYO YUNNAN', '80 mm x 45 mm', 'Karton', '30', 'MDS', '12', 'VDS', '1', '1', '0000-00-00 00:00:00'),
(9, 'A.007.01', 'SICIE PLASTER (TIPE SACHET)', '90 mm x 60 mm', 'Karton', '30', 'Box', '20', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(10, 'A.007.02', 'SICIE PLASTER (TIPE KALENG)', '10 cm x 40 cm', 'Karton', '6', 'Shrink', '6', 'Kaleng', '1', '1', '0000-00-00 00:00:00'),
(11, 'A.008.01', 'KOYO TAKAHI', '65 mm x 42 mm', 'Karton', '100', 'Box', '12', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(12, 'A.008.02', 'KOYO TAKAHI (RENCENG isi 2 lembar)', '65 mm x 42 mm', 'Karton', '60', 'Hanger', '20', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(13, 'A.009.01', 'TAKAHI PLASTER PENGHANGAT LEHER', '50 mm x 75 mm', 'Karton', '50', 'Box', '12', 'Kantong', '1', '1', '0000-00-00 00:00:00'),
(14, 'B.001.01', 'BALSEM JAHE', '20 gram', 'Karton', '20', 'MDS', '12', 'VDS', '1', '1', '0000-00-00 00:00:00'),
(15, 'B.002.01', 'BALSEM SI CIE', '20 gram', 'Karton', '20', 'MDS', '12', 'VDS', '1', '1', '0000-00-00 00:00:00'),
(16, 'B.003.01', 'BALSEM STICK CAP BUNGA CABE', '15 gram', 'Karton', '20', 'MDS', '12', 'VDS', '1', '1', '0000-00-00 00:00:00'),
(17, 'B.004.01', 'BALSEM CABE ', '20 gram', 'Karton', '20', 'MDS', '12', 'VDS', '1', '1', '0000-00-00 00:00:00'),
(18, 'B.005.01', 'KRIM CABE (HOT CREAM)', '30 gram', 'Karton', '12', 'MDS', '12', 'VDS', '1', '1', '0000-00-00 00:00:00'),
(19, 'B.006.01', 'MASTER REFRESHING OIL (Aroma Therapy) (10 ml)', '10 ml', 'Karton', '24', 'MDS', '12', 'VDS', '1', '1', '0000-00-00 00:00:00'),
(20, 'B.006.02', 'MASTER REFRESHING OIL (Aroma Therapy) (5 ml)', '5 ml', 'Karton', '24', 'MDS', '12', 'VDS', '1', '1', '0000-00-00 00:00:00'),
(21, 'B.007.01', 'MINYAK ANGIN CAP CABE (50 ml)', '50 ml', 'Karton', '6', 'MDS', '12', 'VDS', '1', '1', '0000-00-00 00:00:00'),
(22, 'B.007.02', 'MINYAK ANGIN CAP CABE (10 ml)', '10 ml', 'Karton', '20', 'MDS', '12', 'VDS', '1', '1', '0000-00-00 00:00:00'),
(23, 'B.007.03', 'MINYAK ANGIN CAP CABE (3 ml)', '3 ml', 'Karton', '50', 'MDS', '12', 'VDS', '1', '1', '0000-00-00 00:00:00'),
(24, 'B.007.04', 'MINYAK ANGIN CAP CABE (3 ml Blister)', '3 ml', 'Karton', '20', 'MDS', '12', 'Pack', '1', '1', '0000-00-00 00:00:00'),
(25, 'B.008.01', 'MINYAK ANGIN JAHE (10 ml)', '10 ml', 'Karton', '20', 'MDS', '12', 'VDS', '1', '1', '0000-00-00 00:00:00'),
(26, 'B.008.02', 'MINYAK ANGIN JAHE (3 ml)', '3 ml', 'Karton', '50', 'MDS', '12', 'VDS', '1', '1', '0000-00-00 00:00:00'),
(27, 'B.008.03', 'MINYAK ANGIN JAHE (3 ml Blister)', '3 ml', 'Karton', '20', 'MDS', '12', 'Pack', '1', '1', '0000-00-00 00:00:00'),
(28, 'B.008.04', 'MINYAK ANGIN JAHE (50 ml)', '50 ml', 'Karton', '6', 'MDS', '12', 'VDS', '1', '1', '0000-00-00 00:00:00'),
(29, 'B.009.01', 'MAMI MINYAK KAYU PUTIH HANGAT (100 ml)', '100 ml', 'Karton', '12', 'Box', '12', 'Shrink', '1', '1', '0000-00-00 00:00:00'),
(30, 'B.009.02', 'MAMI MINYAK KAYU PUTIH HANGAT (60 ml)', '60 ml', 'Karton', '20', 'Box', '20', 'Box', '1', '1', '0000-00-00 00:00:00'),
(31, 'B.009.03', 'MAMI MINYAK KAYU PUTIH HANGAT (30 ml)', '30 ml', 'Karton', '30', 'Box', '30', 'Box', '1', '1', '0000-00-00 00:00:00'),
(32, 'B.009.04', 'MAMI MINYAK KAYU PUTIH HANGAT (15 ml)', '15 ml', 'Karton', '50', 'Box', '50', 'Box', '1', '1', '0000-00-00 00:00:00'),
(33, 'B.010.01', 'SICIE OIL (Botol Pendek)', '40 ml', 'Karton', '12', 'MDS', '12', 'VDS', '1', '1', '0000-00-00 00:00:00'),
(34, 'B.010.02', 'SICIE OIL (Botol Tinggi)', '40 ml', 'Outer Karton', '6', 'Inner Karton', '12', 'Box', '1', '1', '0000-00-00 00:00:00'),
(35, 'B.010.03', 'SICIE OIL (Kaleng)', '40 ml', 'Outer Karton', '6', 'Inner Karton', '10', 'Cans', '1', '1', '0000-00-00 00:00:00'),
(36, 'B.011.01', 'SICIE OIL MILD', '40 ml', 'Outer Karton', '6', 'Inner Karton', '12', 'Box', '1', '1', '0000-00-00 00:00:00'),
(37, 'C.001.01', 'SEJUK SARI JERUK NIPIS (Hanger)', 'Hanger', 'Karton', '24', 'Hanger', '24', 'sachet', '1', '1', '0000-00-00 00:00:00'),
(38, 'C.001.02', 'SEJUK SARI JERUK NIPIS (Box)', 'Box', 'Karton', '12', 'MDS', '12', 'VDS', '1', '1', '0000-00-00 00:00:00'),
(39, 'C.001.03', 'SEJUK SARI JERUK NIPIS (Topples)', 'Topples', 'Karton', '12', 'toples', '60', 'sachet', '1', '1', '0000-00-00 00:00:00'),
(40, 'D.001.01', 'OKE FANCY PLASTER (EMOTICON)', '19 mm x 64 mm', 'Karton', '120', 'Hgr', '10', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(41, 'D.002.01', 'OKE FANCY PLASTER (BOX)', '19 mm x 64 mm', 'Karton', '100', 'Box', '100', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(42, 'D.002.02', 'OKE FANCY PLASTER (HANGER)', '19 mm x 64 mm', 'Karton', '120', 'Hgr', '10', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(43, 'D.003.01', 'OKE PLAST FIRST AID DRESSING ', '19 mm x 64 mm', 'Karton', '100', 'Box', '100', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(44, 'D.003.02', 'OKE PLAST FIRST AID DRESSING (SUPERMARKET)', '19 mm x 64 mm', 'Karton', '36', 'Box', '30', 'Amplop', '1', '1', '0000-00-00 00:00:00'),
(45, 'D.003.03', 'OKE PLAST FIRST AID DRESSING (RENCENG isi 5 Strip)', '19 mm x 64 mm', 'Karton', '60', 'Hgr', '30', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(46, 'D.004.01', 'OKE PLAST FIRST AID DRESSING (SPIDER)', '19 mm x 64 mm', 'Karton', '120', 'Hgr', '10', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(47, 'D.005.01', 'OKE PLAST FIRST AID DRESSING (BATIK)', '19 mm x 64 mm', 'Karton', '120', 'Hgr', '10', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(48, 'D.005.02', 'OKE PLAST FIRST AID DRESSING (BATIK SUPERMARKET)', '19 mm x 64 mm', 'Karton', '36', 'Box', '30', 'Amplop', '1', '1', '0000-00-00 00:00:00'),
(49, 'D.006.01', 'OKE PLAST FIRST AID DRESSING (COLOR)', '19 mm x 64 mm', 'Karton', '120', 'Hgr', '10', 'Amplop', '1', '1', '0000-00-00 00:00:00'),
(50, 'D.007.01', 'MAMI PLAST', '19 mm x 64 mm', 'Karton', '100', 'Box', '100', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(51, 'D.008.01', 'BAYPLAST ELASTIC STRIP', '19 mm x 64 mm', 'Karton', '100', 'Box', '100', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(52, 'D.009.01', 'CROSS BRAND FIRST AID DRESSING ', '19 mm x 64 mm', 'Karton', '100', 'Box', '100', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(53, 'D.010.01', 'FIRSTRIP FRIST AID DRESSING ', '19 mm x 64 mm', 'Karton', '100', 'Box', '100', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(54, 'E.001.01', 'OK PLAST PLASTIC BANDAGE', '25 mm', 'Karton', '100', 'Box', '100', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(55, 'E.002.01', 'OKEPLAST ASSORTED PLASTER', ' 10 Amplop', 'Karton', '10', 'Box', '9', 'Pack', '1', '1', '0000-00-00 00:00:00'),
(56, 'F.001.01', 'SURGIN PAD SURGICAL DRESSING (UK 5 CM X 7,5 CM)', '50 mm x 75 mm', 'Karton', '200', 'box', '10', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(57, 'F.001.02', 'SURGIN PAD SURGICAL DRESSING (UK 8 CM X 10 CM)', '80 mm x 100 mm', 'Karton', '100', 'box', '10', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(58, 'F.002.01', 'OKE TRENDY PLASTER FIRST AID DRESSING ', '19 mm x 64 mm', 'Karton', '100', 'Hanger', '10', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(59, 'G.001.01', 'CHILLI PLAST PLASTER PEREKAT (1/2 X 1)', '12,5 mm x 1 m', 'Karton', '60', 'Box', '12', 'Roll', '1', '1', '0000-00-00 00:00:00'),
(60, 'G.001.02', 'CHILLI PLAST PLASTER PEREKAT (1/2 X 5)', '12,5 mm x 4,5 m', 'Karton', '30', 'Box', '12', 'Roll', '1', '1', '0000-00-00 00:00:00'),
(61, 'G.001.03', 'CHILLI PLAST PLASTER PEREKAT (1 X 1)', '25 mm x 1 m', 'Karton', '36', 'Box', '12', 'Roll', '1', '1', '0000-00-00 00:00:00'),
(62, 'G.001.04', 'CHILLI PLAST PLASTER PEREKAT (1 X 5)', '25 mm x 4,5 m', 'Karton', '20', 'Box', '12', 'Roll', '1', '1', '0000-00-00 00:00:00'),
(63, 'G.001.05', 'CHILLI PLAST PLASTER PEREKAT (2 X 5)', '50 mm x 4,5 m', 'Karton', '24', 'Box', '6', 'Roll', '1', '1', '0000-00-00 00:00:00'),
(64, 'G.001.06', 'CHILLI PLAST PLASTER PEREKAT (3 X 5)', '75 mm x 4,5 m', 'Karton', '24', 'Box', '6', 'Roll', '1', '1', '0000-00-00 00:00:00'),
(65, 'H.001.01', 'MASTER PLAST PLASTIC ADHESIVE PLASTER (0,5 X 10 YR)', '12,5 mm x 10 yard', 'Karton', '12', 'Shrink', '6', 'Box', '1', '1', '0000-00-00 00:00:00'),
(66, 'H.001.02', 'MASTER PLAST PLASTIC ADHESIVE PLASTER (1,0 X 10 YR)', '25 mm x 10 yard', 'Karton', '8', 'Shrink', '6', 'Box', '1', '1', '0000-00-00 00:00:00'),
(67, 'I.001.01', 'MASTER PLAST NON WOVEN ADHESIVE PLASTER (0,5 X 10)', '0,5 inch x 10 yard', 'Karton', '12', 'Shrink', '6', 'Box', '1', '1', '0000-00-00 00:00:00'),
(68, 'I.001.02', 'MASTER PLAST NON WOVEN ADHESIVE PLASTER (0,5 X 10 DB)', '0,5 inch x 10 yard', 'Karton', '12', 'Box', '12', 'Roll', '1', '1', '0000-00-00 00:00:00'),
(69, 'I.001.03', 'MASTER PLAST NON WOVEN ADHESIVE PLASTER (1 X 10)', '1 inch x 10 yard', 'Karton', '8', 'Shrink', '6', 'Bh', '1', '1', '0000-00-00 00:00:00'),
(70, 'I.002.01', 'MAMI FIX ADHESIVE MESH BANDAGE (10 X 5)', '10 cm x 5 m', 'Karton', '75', 'Box', '1', 'Roll', '1', '1', '0000-00-00 00:00:00'),
(71, 'I.002.02', 'MAMI FIX ADHESIVE MESH BANDAGE (15 X 5)', '15 cm x 5 m', 'Karton', '50', 'Box', '1', 'Roll', '1', '1', '0000-00-00 00:00:00'),
(72, 'I.002.03', 'MAMI FIX ADHESIVE MESH BANDAGE (5 X 5)', '5 cm x 5 m', 'Karton', '125', 'Box', '1', 'Roll', '1', '1', '0000-00-00 00:00:00'),
(73, 'J.001.01', 'MAMI NON WOVEN PADS STERIL ', '12 mm x 10 cm', 'Karton', '60', 'Box', '10', 'Ktg', '1', '1', '0000-00-00 00:00:00'),
(74, 'J.002.01', 'MAMI PLESTER KOMPRES TIPE LEMON (BOX)', ' 1 lembar', 'Karton', '30', 'Box', '12', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(75, 'J.002.02', 'MAMI PLESTER KOMPRES TIPE LEMON (HANGER)', ' 12 Sachet', 'Karton', '7', 'Kantong', '6', 'Hgr', '1', '1', '0000-00-00 00:00:00'),
(76, 'J.003.01', 'MAMI PLESTER KOMPRES (BOX)', ' 1 lembar', 'Karton', '30', 'Box', '12', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(77, 'J.003.02', 'MAMI PLESTER KOMPRES (HANGER)', ' 12 Sachet', 'Karton', '7', 'Kantong', '6', 'Hgr', '1', '1', '0000-00-00 00:00:00'),
(78, 'J.004.01', 'MAMI PLESTER KOMPRES TIPE STRAWBERRY (BOX)', ' 1 lembar', 'Karton', '30', 'Box', '12', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(79, 'J.004.02', 'MAMI PLESTER KOMPRES TIPE STRAWBERRY (HANGER)', ' 12 Sachet', 'Karton', '7', 'Kantong', '6', 'Hgr', '1', '1', '0000-00-00 00:00:00'),
(80, 'J.005.01', 'MAMI PLESTER KOMPRES TIPE APPLE (BOX)', ' 1 lembar', 'Karton', '30', 'Box', '12', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(81, 'J.005.02', 'MAMI PLESTER KOMPRES TIPE APPLE (HANGER)', ' 12 Sachet', 'Karton', '7', 'Kantong', '6', 'Hgr', '1', '1', '0000-00-00 00:00:00'),
(82, 'J.006.01', 'MASTER X''TRA COOL PLESTER KOMPRES (JASMINE)', ' 2 Lembar', 'Karton', '30', 'Box', '12', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(83, 'J.006.02', 'MASTER X''TRA COOL PLESTER KOMPRES (SANDAL WOOD)', ' 2 Lembar', 'Karton', '30', 'Box', '12', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(84, 'J.006.03', 'MASTER X''TRA COOL PLESTER KOMPRES (TEA)', ' 2 Lembar', 'Karton', '30', 'Box', '12', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(85, 'J.007.01', 'SAVANA PLESTER KOMPRES (SANDALWOOD)', ' 2 Lembar', 'Karton', '30', 'Box', '12', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(86, 'J.007.02', 'SAVANA PLESTER KOMPRES (JASMINE)', ' 2 Lembar', 'Karton', '30', 'Box', '12', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(87, 'J.007.03', 'SAVANA PLESTER KOMPRES (TEA)', ' 2 Lembar', 'Karton', '30', 'Box', '12', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(88, 'K.001.01', 'MAMI BREAST PUMP', '12 VDS', 'Karton', '12', 'MDS', '12', 'VDS', '1', '1', '0000-00-00 00:00:00'),
(89, 'K.001.02', 'MAMI BREAST PUMP (TANPA DUS)', 'TANPA DUS', 'Karton', '12', 'MDS', '15', 'Pcs', '1', '1', '0000-00-00 00:00:00'),
(90, 'K.002.01', 'MAMI SILICONE BREAST PUMP', '12 Box', 'Outer Karton', '12', 'Inner Karton', '12', 'Box', '1', '1', '0000-00-00 00:00:00'),
(91, 'K.003.01', 'MAMI FEEDING BOTTLE (60 ML)', '60 ml', 'Karton', '8', 'Shrink', '6', 'Botol', '1', '1', '0000-00-00 00:00:00'),
(92, 'K.003.02', 'MAMI FEEDING BOTTLE (120 ML)', '120 ml', 'Karton', '8', 'Shrink', '6', 'Botol', '1', '1', '0000-00-00 00:00:00'),
(93, 'K.003.03', 'MAMI FEEDING BOTTLE (250 ML) ', '250 ml', 'Karton', '8', 'Shrink', '6', 'Botol', '1', '1', '0000-00-00 00:00:00'),
(94, 'K.004.01', 'MAMI SILICON NIPPLE (S)', 'size S', 'Karton', '8', 'Shrink', '12', 'Box', '1', '1', '0000-00-00 00:00:00'),
(95, 'K.004.02', 'MAMI SILICON NIPPLE (M)', 'size M', 'Karton', '8', 'Shrink', '12', 'Box', '1', '1', '0000-00-00 00:00:00'),
(96, 'K.004.03', 'MAMI SILICON NIPPLE (L)', 'size L', 'Karton', '8', 'Shrink', '12', 'Box', '1', '1', '0000-00-00 00:00:00'),
(97, 'K.005.01', 'MAMI BABY BOTTLE & NIPPLE', '1 set', 'Karton', '12', 'Box', '1', 'Set', '1', '1', '0000-00-00 00:00:00'),
(98, 'K.006.01', 'MAMI HANDSANITIZER (60 ML)', ' 60 ml', 'Karton', '24', 'Shrink', '6', 'Botol', '1', '1', '0000-00-00 00:00:00'),
(99, 'K.006.02', 'MAMI HANDSANITIZER (100 ML)', ' 100 ml', 'Karton', '24', 'Shrink', '6', 'Botol', '1', '1', '0000-00-00 00:00:00'),
(100, 'K.006.03', 'MAMI HANDSANITIZER (500 ML)', ' 500 ml', 'Karton', '24', 'Botol', '500', 'ml', '1', '1', '0000-00-00 00:00:00'),
(101, 'K.006.04', 'MAMI HANDSANITIZER (1 L)', ' 1 Liter', 'Karton', '12', 'Jerigen', '1', 'Liter', '1', '1', '0000-00-00 00:00:00'),
(102, 'K.006.05', 'MAMI HANDSANITIZER (5 L)', ' 5 Liter', 'Karton', '2', 'Jerigen', '5', 'Liter', '1', '1', '0000-00-00 00:00:00'),
(103, 'L.001.01', 'HUNDREDPLAST 100''s', '64 mm x 19 mm', 'Karton', '2', 'IC', '100', 'Box', '1', '1', '0000-00-00 00:00:00'),
(104, 'L.001.02', 'HUNDREDPLAST 100'' + 20%', '64 mm x 19 mm', 'Karton', '2', 'IC', '100', 'Box', '1', '1', '0000-00-00 00:00:00'),
(105, 'L.001.03', 'HUNDREDPLAST 200'' + BONUS', '64 mm x 19 mm', 'Karton', '2', 'IC', '50', 'Box', '1', '1', '0000-00-00 00:00:00'),
(106, 'L.002.01', 'MAMI PLAST (HYGEIAN)', '64 mm x 19 mm', 'Karton', '100', 'box', '100', 'strip', '1', '1', '0000-00-00 00:00:00'),
(107, 'L.003.01', 'SAPL ADHESIVE PLASTER UK. 25 MM X 5 M', '25 mm x 5 m', 'Karton', '10', 'Box', '12', 'Roll', '1', '1', '0000-00-00 00:00:00'),
(108, 'L.003.02', 'SAPL ADHESIVE PLASTER UK. 50 MM X 5 M', '50 mm x 5 m', 'Karton', '10', 'Box', '6', 'Roll', '1', '1', '0000-00-00 00:00:00'),
(109, 'L.003.03', 'SAPL ADHESIVE PLASTER UK. 75 MM X 5 M', '75 mm x 5 m', 'Karton', '8', 'Box', '6', 'Roll', '1', '1', '0000-00-00 00:00:00'),
(110, 'L.004.01', 'TOPPLAST 100''', '64 mm x 19 mm', 'Karton', '2', 'IC', '100', 'Box', '1', '1', '0000-00-00 00:00:00'),
(111, 'L.004.02', 'TOPPLAST 100'' + 20%', '64 mm x 19 mm', 'Karton', '2', 'IC', '100', 'Box', '1', '1', '0000-00-00 00:00:00'),
(112, 'L.004.03', 'TOPPLAST 200'' + BONUS', '64 mm x 19 mm', 'Karton', '2', 'IC', '50', 'Box', '1', '1', '0000-00-00 00:00:00'),
(113, 'L.004.04', 'TOPPLAST 300''', '64 mm x 19 mm', 'Karton', '36', 'Box', '30', 'Amplop', '1', '1', '0000-00-00 00:00:00'),
(114, 'M.001.01', 'COSMOPLAST First Aid Dressing', '19 x 72 mm', 'Karton', '100', 'box', '100', 'strip', '1', '1', '0000-00-00 00:00:00'),
(115, 'N.001.01', 'BALLYETON GINGER PLASTER ', '17 cm x 11,5 cm ', 'Karton', '50', 'Box', '24', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(116, 'N.002.01', 'BALLYETON MEDICATED PLASTER', '65 mm x 42 mm', 'Karton', '25', 'MDS', '20', 'VDS', '1', '1', '0000-00-00 00:00:00'),
(117, 'N.003.01', 'BALLYETON POROUS CAPSICUM PLASTER', '17 cm x 11,5 cm ', 'Karton', '50', 'Box', '24', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(118, 'N.004.01', 'COSMOPAS MEDICATED PLASTER ', '65 mm x 42 mm', 'Karton', '45', 'MDS', '20', 'VDS', '1', '1', '0000-00-00 00:00:00'),
(119, 'N.005.01', 'COSMOS CAPSICUM PLASTER DUOPHARMA', '17 cm x 11,5 cm ', 'Karton', '50', 'Box', '24', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(120, 'N.006.01', 'KOYO TAKAHI HOT MEDICATED PLASTER BESAR PKM', '17 cm x 11,5 cm ', 'Karton', '50', 'Box', '24', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(121, 'N.007.01', 'KOYO TAKAHI HOT BESAR (MACAU)', '17 cm x 11,5 cm ', 'Karton', '50', 'Box', '24', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(122, 'N.008.01', 'KOYOK HUNDREDPLAST', '65 mm x 42 mm', 'Karton', '2', 'IC', '25', 'MDS', '1', '1', '0000-00-00 00:00:00'),
(123, 'N.009.01', 'NEOBUN CAPSICUM PLASTER KECIL', '65 mm x 42 mm', 'Karton', '2', 'IC', '25', 'MDS', '1', '1', '0000-00-00 00:00:00'),
(124, 'N.009.02', 'NEOBUN CAPSICUM PLASTER BESAR', '11 cm x 18 cm ', 'Karton', '50', 'Box', '24', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(125, 'N.010.01', 'NEOBUN MEDICATED PLASTER WITH GINGER AND LEMONGRASS', '9 cm x 6 cm', 'Karton', '50', 'Box', '20', 'Kantong', '1', '1', '0000-00-00 00:00:00'),
(126, 'N.011.01', 'OOPAS MEDICATED PLASTER', '65 mm x 42 mm', 'Karton', '25', 'MDS', '20', 'VDS', '1', '1', '0000-00-00 00:00:00'),
(127, 'N.012.01', 'OOPAS HOT PLASTER ', '17 cm x 11,5 cm ', 'Karton', '50', 'Box', '24', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(128, 'N.013.01', 'PLASTER BERUBAT NEOBUN PLUS KECIL', '65 mm x 42 mm', 'Karton', '2', 'IC', '25', 'MDS', '1', '1', '0000-00-00 00:00:00'),
(129, 'N.013.02', 'PLASTER BERUBAT NEOBUN PLUS BESAR', '11 cm x 18 cm ', 'Karton', '50', 'Box', '24', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(130, 'N.013.03', 'PLASTER BERUBAT NEOBUN PLUS KECIL ZIP & LOCK', '65 mm x 42 mm', 'Karton', '50', 'Box', '20', 'Kantong', '1', '1', '0000-00-00 00:00:00'),
(131, 'N.014.01', 'PISHUHO MEDICATED PLASTER ', '65 mm x 42 mm', 'Karton', '2', 'IC', '25', 'MDS', '1', '1', '0000-00-00 00:00:00'),
(132, 'N.015.01', 'PAK LI MEDICATED PLASTER ', '10 cm x 7 cm', 'Karton', '36', 'MDS', '20', 'VDS', '1', '1', '0000-00-00 00:00:00'),
(133, 'N.016.01', 'SAIBOONS POROUS CAPSICUM PLASTER ', '17 cm x 11,5 cm ', 'Karton', '50', 'Box', '24', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(134, 'N.017.01', 'SHANGSHI KOYOK ZIP & LOCK', '7 cm x 5 cm', 'Karton', '50', 'Box', '20', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(135, 'N.018.01', 'SICIE PLASTER (MACAU)', '90 mm x 60 mm ', 'Karton', '30', 'Box', '20', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(136, 'N.019.01', 'TAKAHI HANGAT PUI KIAN MING', '65 mm x 42 mm', 'Karton', '50', 'MDS', '20', 'VDS', '1', '1', '0000-00-00 00:00:00'),
(137, 'N.020.01', 'TAKAHI HOT (MEDIUM isi 6 lembar)', '85 mm x 55 mm', 'Karton', '75', 'Box', '25', 'Sachet', '1', '1', '0000-00-00 00:00:00'),
(138, 'O.001.01', 'BALLYETON MENTHOL OINTMENT 23 GR', '23 gram', 'Karton', '24', 'Plastik Shrink', '12', 'Box', '1', '1', '0000-00-00 00:00:00'),
(139, 'O.001.02', 'BALLYETON MENTHOL OINTMENT 85 GR', '85 gram', 'Karton', '24', 'Plastik Shrink', '6', 'Box', '1', '1', '0000-00-00 00:00:00'),
(140, 'O.002.01', 'SICIE OIL BOTOL PANJANG (MACAU)', '40 ml', 'Karton', '6', 'IC', '12', 'Box', '1', '1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masuk`
--

CREATE TABLE `masuk` (
  `no` int(11) NOT NULL,
  `tglform` date NOT NULL,
  `noform` varchar(20) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `jumlah` decimal(20,2) NOT NULL,
  `tanggal` datetime NOT NULL,
  `saldo` decimal(20,2) NOT NULL,
  `adm` int(10) NOT NULL,
  `suplai` varchar(50) NOT NULL,
  `cat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat`
--

CREATE TABLE `riwayat` (
  `no` int(20) NOT NULL,
  `tglform` date NOT NULL,
  `noform` varchar(20) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `masuk` decimal(20,2) NOT NULL,
  `keluar` decimal(20,2) NOT NULL,
  `saldo` decimal(50,2) NOT NULL,
  `ket` varchar(20) NOT NULL,
  `tanggal` datetime NOT NULL,
  `adm` int(10) NOT NULL,
  `suplai` text NOT NULL,
  `cat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `saldo`
--

CREATE TABLE `saldo` (
  `no` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `saldo` decimal(50,2) NOT NULL,
  `tglform` date NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `saldo`
--

INSERT INTO `saldo` (`no`, `kode`, `saldo`, `tglform`, `tanggal`) VALUES
(1, 'A.001.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(2, 'A.001.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(3, 'A.002.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(4, 'A.003.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(5, 'A.004.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(6, 'A.005.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(7, 'A.005.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(8, 'A.006.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(9, 'A.007.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(10, 'A.007.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(11, 'A.008.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(12, 'A.008.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(13, 'A.009.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(14, 'B.001.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(15, 'B.002.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(16, 'B.003.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(17, 'B.004.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(18, 'B.005.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(19, 'B.006.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(20, 'B.006.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(21, 'B.007.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(22, 'B.007.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(23, 'B.007.03', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(24, 'B.007.04', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(25, 'B.008.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(26, 'B.008.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(27, 'B.008.03', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(28, 'B.008.04', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(29, 'B.009.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(30, 'B.009.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(31, 'B.009.03', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(32, 'B.009.04', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(33, 'B.010.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(34, 'B.010.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(35, 'B.010.03', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(36, 'B.011.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(37, 'C.001.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(38, 'C.001.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(39, 'C.001.03', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(40, 'D.001.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(41, 'D.002.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(42, 'D.002.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(43, 'D.003.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(44, 'D.003.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(45, 'D.003.03', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(46, 'D.004.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(47, 'D.005.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(48, 'D.005.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(49, 'D.006.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(50, 'D.007.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(51, 'D.008.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(52, 'D.009.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(53, 'D.010.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(54, 'E.001.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(55, 'E.002.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(56, 'F.001.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(57, 'F.001.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(58, 'F.002.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(59, 'G.001.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(60, 'G.001.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(61, 'G.001.03', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(62, 'G.001.04', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(63, 'G.001.05', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(64, 'G.001.06', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(65, 'H.001.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(66, 'H.001.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(67, 'I.001.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(68, 'I.001.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(69, 'I.001.03', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(70, 'I.002.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(71, 'I.002.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(72, 'I.002.03', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(73, 'J.001.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(74, 'J.002.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(75, 'J.002.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(76, 'J.003.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(77, 'J.003.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(78, 'J.004.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(79, 'J.004.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(80, 'J.005.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(81, 'J.005.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(82, 'J.006.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(83, 'J.006.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(84, 'J.006.03', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(85, 'J.007.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(86, 'J.007.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(87, 'J.007.03', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(88, 'K.001.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(89, 'K.001.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(90, 'K.002.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(91, 'K.003.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(92, 'K.003.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(93, 'K.003.03', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(94, 'K.004.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(95, 'K.004.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(96, 'K.004.03', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(97, 'K.005.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(98, 'K.006.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(99, 'K.006.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(100, 'K.006.03', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(101, 'K.006.04', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(102, 'K.006.05', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(103, 'L.001.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(104, 'L.001.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(105, 'L.001.03', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(106, 'L.002.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(107, 'L.003.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(108, 'L.003.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(109, 'L.003.03', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(110, 'L.004.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(111, 'L.004.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(112, 'L.004.03', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(113, 'L.004.04', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(114, 'M.001.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(115, 'N.001.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(116, 'N.002.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(117, 'N.003.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(118, 'N.004.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(119, 'N.005.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(120, 'N.006.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(121, 'N.007.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(122, 'N.008.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(123, 'N.009.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(124, 'N.009.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(125, 'N.010.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(126, 'N.011.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(127, 'N.012.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(128, 'N.013.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(129, 'N.013.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(130, 'N.013.03', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(131, 'N.014.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(132, 'N.015.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(133, 'N.016.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(134, 'N.017.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(135, 'N.018.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(136, 'N.019.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(137, 'N.020.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(138, 'O.001.01', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(139, 'O.001.02', '0.00', '0000-00-00', '0000-00-00 00:00:00'),
(140, 'O.002.01', '0.00', '0000-00-00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `fullname` varchar(30) NOT NULL,
  `role` enum('admin','user','manager') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `username`, `password`, `fullname`, `role`) VALUES
(2, 'ricky', '21232f297a57a5a743894a0e4a801fc3', 'Ricky Pratama Putra', 'admin'),
(3, 'chennie', '21232f297a57a5a743894a0e4a801fc3', 'Lim Chen Nie', 'manager'),
(4, 'indosar', '7b7a53e239400a13bd6be6c91c4f6c4e', 'Toni', 'user'),
(5, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'user'),
(6, 'gudang', '7b7a53e239400a13bd6be6c91c4f6c4e', 'Admin Gudang', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keluar`
--
ALTER TABLE `keluar`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masuk`
--
ALTER TABLE `masuk`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `saldo`
--
ALTER TABLE `saldo`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `keluar`
--
ALTER TABLE `keluar`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `masuk`
--
ALTER TABLE `masuk`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `no` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `saldo`
--
ALTER TABLE `saldo`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
