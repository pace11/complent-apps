-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 24, 2019 at 12:23 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plnsentani`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` varchar(15) NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `acc` int(1) NOT NULL,
  `finish` int(1) NOT NULL,
  `file` text,
  `view` int(1) NOT NULL,
  `ket` text,
  `data` text NOT NULL,
  `datas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `id_pelanggan` varchar(15) NOT NULL,
  `no_kwh` varchar(15) NOT NULL,
  `idpel` varchar(12) NOT NULL,
  `nama_lengkap_pelanggan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL,
  `data` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`id_pelanggan`, `no_kwh`, `idpel`, `nama_lengkap_pelanggan`, `alamat`, `lat`, `lng`, `data`) VALUES
('PELANGGAN000001', '3456789', '36003341884', 'Firman Giri Febriyanto', 'Jalan H Junib, RT.14/RW.7, Duri Kosambi, West Jakarta City, Jakarta Barat', '-2.57438400', '140.51470900', ''),
('PELANGGAN000002', '3456893', '54435678990', 'Thufail Erlangga', 'BSD City, Sampora, Tangerang, Banten', '-2.53479000', '140.71045800', ''),
('PELANGGAN000003', '123', '421201003886', 'SUMADI', 'JL DOYO BARU DEPAN ADVENT NO 52 RT/RW 2 / 1 SENTANI\r\n', '-2.53976610', '140.46070050', ''),
('PELANGGAN000004', '674536', '421201000188', 'STIKES JAYAPURA', 'Jl Youmakhe NO 21 Rt/Rw 1/1 Hinikombe', '-2.56870000', '140.49220833', ''),
('PELANGGAN000005', '3232242', '421200135588', 'HENRIKO TANKA, SE', 'JL JL IFAR GUNUNG ( POJOK ) NO 0 RT/RW 02  / 1\r\n', '-2.56643167', '140.51993333', ''),
('PELANGGAN000006', '2323112334', '421200999535', 'TELKOMSEL DOYO GRAND', 'Jl Btn Doyo Grand No 21 RT/RW 1/2 Sentani', '-2.55183570', '140.47847660', ''),
('PELANGGAN000007', '', '421200996504', 'TELKOMSEL PUSKOPAD', 'PR BTN PUSKOPAD NO 09L6 RT/RW 5 / 12 SENTANI\r\n', '-2.57651130', '140.52291580', ''),
('PELANGGAN000008', '', '421201018909', 'TSEL BTS JAP544', 'JL TABITA KEMIRI SENTANI NO 00100 RT/RW 1 / 1 HINEKOMBE\r\n', '-2.56180500', '140.49359000', ''),
('PELANGGAN000009', '', '421201017893', 'TSEL BTS JAP447', 'JL PASIR NO 51 RT/RW 2 / 1 SENTANI\r\n', '-2.57053000', '140.51852833', ''),
('PELANGGAN000010', '', '421201038893', 'MCR BTN PEMDA DOYO', 'JL PERUM BTN PEMDA DOYO BARU NO 9  RT/RW 1 / 3 WAIBU\r\n', '-2.54507640', '140.46832350', ''),
('PELANGGAN000011', '', '421210142534', 'SYAMSUL', 'JL JLBTN PINBAR KARYA DY BARU NO 0 RT/RW 04 / 05 JAYAPURA\r\n', '-2.54439850', '140.46781030', ''),
('PELANGGAN000012', '', '421210142542', 'PRIYONO', 'JL JLBTN PINBAR DY BR BLOK C-7 NO 0 RT/RW 003 / 03 JAYAPURA\r\n', '-2.54439850', '140.46781030', ''),
('PELANGGAN000013', '', '421210142829', 'YUSTINA KLIMBIAB', 'DS DSPANJANGREJO MARIBU NO 0 RT/RW 02 / 03 JAYAPURA\r\n', '-2.50915860', '140.38641940', ''),
('PELANGGAN000014', '', '421210142852', 'SUKESWO', 'DS DSPANJANGREJO MARIBU NO 0 RT/RW 02 / 04 JAYAPURA\r\n', '-2.50173250', '140.37544630', ''),
('PELANGGAN000015', '', '421210142965', 'ANDREAS YABANSABRA', 'DS MARIBU DISTR SENTANI BARAT NO  RT/RW 02 / 01 JAYAPURA\r\n', '-2.49634300', '140.37383280', ''),
('PELANGGAN000016', '', '421210142973', 'YOMIMA ANDATU', 'DS DS MARIBU TUA DISTR STN BARAT NO 0 RT/RW 02 / 05 JAYAPURA\r\n', '-2.48720490', '140.36899250', ''),
('PELANGGAN000017', '', '421210143017', 'CHRISTIAN SELLY', 'DS DSPANJANGREJO MARIBU NO 0 RT/RW 02 / 02 JAYAPURA\r\n', '-2.50173250', '140.37544630', ''),
('PELANGGAN000018', '', '421210143337', 'YOMBON ENEMBE', 'JL KHEMBILI MILINIK HINEKOMBE SENTANI NO 0 RT/RW 01 / 09 JAYAPURA\r\n', '-2.56487160', '140.51459050', ''),
('PELANGGAN000019', '', '421210143345', 'PAKURENIT ENEMBE', 'JL KHEMBILI MILINIK HINEKOMBE SENTANI NO 0 RT/RW 03 / 09 JAYAPURA\r\n', '-2.56487160', '140.51459050', ''),
('PELANGGAN000020', '', '421210143655', 'RIDWAN WERO, S. SOS', 'JL JLKOMP PASAR BARU SENTANI NO 0 RT/RW 01 / 08 JAYAPURA\r\n', '-2.56218260', '140.49240690', ''),
('PELANGGAN000021', '', '421210143701', 'IMAH SITTI', 'JL JL YAHIM BTN PURWODADI STN NO 0 RT/RW 02 / 01 JAYAPURA\r\n', '-2.57598300', '140.50692890', ''),
('PELANGGAN000022', '', '421210144911', 'JANUARIUS NGUTRA', 'JL JLBTN PUSKOPAD HAWAY SENTANI NO 0 RT/RW 03 / 04 JAYAPURA\r\n', '-2.57709440', '140.52278750', ''),
('PELANGGAN000023', '', '421210144986', 'ADRIANUS YAPASEDANYA', 'JL JLDOSAY NO 0 RT/RW 01 / 01 JAYAPURA\r\n', '-2.51428020', '140.40062280', ''),
('PELANGGAN000024', '', '421210145012', 'IR . SLAMET SUWARNO', 'JL JLTABITA SENTANI NO 0 RT/RW 01 / 06 JAYAPURA\r\n', '-2.56684833', '140.49347167', ''),
('PELANGGAN000025', '', '421210145598', 'MARIA ROHDIANA', 'JL JLBT DY BR PERMAI-6-BLOK-C6-19 NO 0 RT/RW 0 / 0 JAYAPURA\r\n', '-2.54137700', '140.46490160', ''),
('PELANGGAN000026', '', '421210147033', 'LUKAS MOKAY', 'JL JLKAMPUNG ENGGELE AJAU/IFALE NO 0 RT/RW 01 /  JAYAPURA\r\n', '-2.56744490', '140.51100190', ''),
('PELANGGAN000027', '', '421210149443', 'LA ODE KAIMUDIN', 'JL JLKAMPUNG BUTON SALATIGA SENTANI NO 0 RT/RW 01 / 06 JAYAPURA\r\n', '-2.56530010', '140.50985000', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` varchar(10) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(5) NOT NULL,
  `role` int(1) NOT NULL,
  `last_active` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_lengkap`, `email`, `jabatan`, `username`, `password`, `role`, `last_active`) VALUES
('USRPLN0001', 'administrator', 'ryanjoker87@gmail.com', 'Super Admin', 'admin11', 'admin', 1, '2019-06-24 09:52:20'),
('USRPLN0002', 'Sri Fajar Riantri Alvani', 'riantri271@gmail.com', 'Supervisor PLN Rayon Sentani', 'riantri', 'rian3', 2, '2019-06-24 09:51:49'),
('USRPLN0003', 'Ahmad Solihin ', 'ahmad@gmail.com', 'Petugas Lapangan Area Sentani Timur', 'ahmad', 'ahmad', 4, '2019-06-24 08:12:37'),
('USRPLN0004', 'Abdul Malik Khoiri', 'malik@gmail.com', 'Petugas Lapangan Area Sentani Barat', 'malik', 'malik', 4, '2019-05-03 03:02:52'),
('USRPLN0005', 'budiman', 'budiman@gmail.com', 'petugas lapangan sentani barat', 'budiman', 'budi0', 4, '2019-06-24 09:51:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD CONSTRAINT `tbl_jadwal_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
