-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 08, 2022 at 09:10 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petakecelakaansolo`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

DROP TABLE IF EXISTS `jenis`;
CREATE TABLE IF NOT EXISTS `jenis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jenis` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `nama_jenis`) VALUES
(1, 'Laka Lantas'),
(2, 'Laka Tunggal');

-- --------------------------------------------------------

--
-- Table structure for table `kasus`
--

DROP TABLE IF EXISTS `kasus`;
CREATE TABLE IF NOT EXISTS `kasus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kecamatan` int(11) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `jenis` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kasus`
--

INSERT INTO `kasus` (`id`, `kecamatan`, `lokasi`, `keterangan`, `jenis`, `jumlah`, `lat`, `lng`, `tanggal`) VALUES
(1, 1, 'Batik Priyayi Solo, Jalan Ronggowarsito, Kampung Baru, Surakarta, Kecamatan Pasar Kliwon, Central Java, 57131, Indonesia', 'Kecelakaan Motor Dengan Plat nomor AD XXXX XX Dengan Motor Dengan Plat AD XXXX XX', 1, 1, '-7.569191726196338', '110.82606308550346', '2022-03-07 16:44:45'),
(2, 2, 'kolam Renang Saraga, Jalan Ronggowarsito, Kampung Baru, Surakarta, Kecamatan Pasar Kliwon, Central Java, 57131, Indonesia', 'Kecelakaan Motor Dengan Motor Ber Plat nomor AD XXXX XX dan AD XXXX XX', 1, 1, '-7.569351256423955', '110.82759349219566', '0000-00-00 00:00:00'),
(3, 1, 'sma muhammadiyah 1 ska, Jalan R.M. Said, Keprabon, Surakarta, Central Java, 57132, Indonesia', 'Testing Keterangan', 1, 1, '-7.564691952406349', '110.82186663045292', '0000-00-00 00:00:00'),
(4, 1, 'Batik Priyayi Solo, Jalan Ronggowarsito, Kampung Baru, Surakarta, Kecamatan Pasar Kliwon, Central Java, 57131, Indonesia', 'TEST', 1, 1, '-7.569255538294471', '110.82619737207364', '0000-00-00 00:00:00'),
(5, 2, 'Miroso, 18, Jalan Imam Bonjol, Kampung Baru, Surakarta, Kecamatan Pasar Kliwon, Central Java, 57131, Indonesia', 'a', 1, 1, '-7.5705051899793645', '110.82607923883253', '2022-03-07 06:34:49'),
(6, 1, 'Batik Priyayi Solo, Jalan Ronggowarsito, Kampung Baru, Surakarta, Kecamatan Pasar Kliwon, Central Java, 57131, Indonesia', 'B', 2, 1, '-7.569409750825965', '110.82641215978471', '2022-03-07 06:36:25'),
(7, 2, 'Jalan Imam Bonjol, Kampung Baru, Surakarta, Kecamatan Pasar Kliwon, Central Java, 57131, Indonesia', 'sa', 2, 1, '-7.56942570384332', '110.82619200238086', '2022-03-09 07:22:19'),
(8, 1, 'Jalan MGR. Sugiyopranoto, Kampung Baru, Surakarta, Central Java, 57131, Indonesia', 'asd', 1, 1, '-7.567351806638852', '110.82561207556095', '2022-03-07 07:22:50'),
(9, 1, 'Kampung Baru, Surakarta, Kecamatan Pasar Kliwon, Central Java, 57131, Indonesia', 'sa', 2, 1, '-7.569324668056795', '110.82721224400849', '2022-02-28 07:23:07'),
(10, 1, 'Kampoeng Baroe Resto, 57, Jalan Ronggowarsito, Kampung Baru, Surakarta, Kecamatan Pasar Kliwon, Central Java, 57131, Indonesia', 'as', 2, 1, '-7.569074737325247', '110.82571946941646', '2022-03-07 07:23:28'),
(11, 1, 'Kampung Baru, Surakarta, Kecamatan Pasar Kliwon, Central Java, 57131, Indonesia', 'z', 2, 1, '-7.569133231764762', '110.82633161439308', '1970-01-01 07:00:00'),
(12, 1, 'Jalan Kenanga, Kampung Baru, Surakarta, Kecamatan Pasar Kliwon, Central Java, 57131, Indonesia', 'abc', 2, 1, '-7.568899253959083', '110.82665379595969', '2022-03-07 07:27:00'),
(13, 1, 'Jalan Kenanga, Kampung Baru, Surakarta, Kecamatan Pasar Kliwon, Central Java, 57131, Indonesia', 'ss', 1, 1, '-7.568936477709394', '110.82678266858635', '2022-03-07 07:29:19'),
(14, 1, 'Kampung Baru, Surakarta, Kecamatan Pasar Kliwon, Central Java, 57131, Indonesia', 'auo', 2, 1, '-7.569228949921408', '110.82678266858635', '2022-03-07 19:31:16'),
(15, 1, 'Jalan Imam Bonjol, Kampung Baru, Surakarta, Kecamatan Pasar Kliwon, Central Java, 57131, Indonesia', 'oh yeah', 2, 1, '-7.569191726196338', '110.82624569930863', '2022-03-31 19:32:29'),
(16, 1, 'Batik Priyayi Solo, Jalan Ronggowarsito, Kampung Baru, Surakarta, Kecamatan Pasar Kliwon, Central Java, 57131, Indonesia', 'jm', 2, 1, '-7.569468245220036', '110.82641752947751', '2022-03-07 20:46:02'),
(17, 2, 'RS. Hermina Surakarta, Jalan Kolonel Sutarto, Purwodiningratan, Surakarta, Central Java, 57128, Indonesia', 'Anu nih cuma ngetes', 2, 1, '-7.560457023826668', '110.84035997897125', '2022-03-07 23:49:10'),
(18, 1, 'Kampung Baru, Surakarta, Kecamatan Pasar Kliwon, Central Java, 57131, Indonesia', 'Kecelakaan Mobil ', 2, 1, '-7.569271491317538', '110.82709947024473', '2022-03-08 10:17:47'),
(19, 1, 'Jalan Imam Bonjol, Kampung Baru, Surakarta, Kecamatan Pasar Kliwon, Central Java, 57131, Indonesia', 'Teddy Kecelakaan Dengan Tembok', 1, 1, '-7.569228949921408', '110.82622418242893', '2022-03-08 14:04:15'),
(20, 1, 'Batik Priyayi Solo, Jalan Ronggowarsito, Kampung Baru, Surakarta, Kecamatan Pasar Kliwon, Central Java, 57131, Indonesia', 'Coba Aja Sih', 1, 1, '-7.5693299857303495', '110.82613830545309', '2022-03-08 20:54:15'),
(21, 1, 'Jalan Kenanga, Kampung Baru, Surakarta, Kecamatan Pasar Kliwon, Central Java, 57131, Indonesia', '[][][][][]', 2, 1, '-7.56896838377853', '110.82660009903191', '2022-03-08 21:06:22');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

DROP TABLE IF EXISTS `kecamatan`;
CREATE TABLE IF NOT EXISTS `kecamatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kecamatan` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id`, `nama_kecamatan`, `lat`, `lng`) VALUES
(1, 'Banjarsari', '-7.5449358', '110.8183257'),
(2, 'Jebres', '-7.5514073', '110.8484709'),
(3, 'Laweyan', '', ''),
(5, 'Serengan', '', ''),
(6, 'Pasar Kliwon', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

DROP TABLE IF EXISTS `pengguna`;
CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password`, `nama`, `level`, `is_active`) VALUES
(1, 'admin', '$2y$10$/I7laWi1mlNFxYSv54EUPOH8MuZhmRWxhE.LaddTK9TSmVe.IHP2C', 'admin', 1, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;