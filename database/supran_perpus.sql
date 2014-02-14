-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2013 at 01:05 PM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `supran_perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota`
--

CREATE TABLE IF NOT EXISTS `tbl_anggota` (
  `no_induk` varchar(45) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jurusan` enum('IPA','IPS','Bahasa') DEFAULT NULL,
  `kelas` enum('X','XI','XII') DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`no_induk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_anggota`
--

INSERT INTO `tbl_anggota` (`no_induk`, `nama`, `jurusan`, `kelas`, `alamat`, `keterangan`) VALUES
('98788', 'Supran', 'Bahasa', 'XI', 'Perumnas', '<p>Saya Oke</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku`
--

CREATE TABLE IF NOT EXISTS `tbl_buku` (
  `kode_buku` varchar(45) NOT NULL,
  `judul_buku` varchar(255) DEFAULT NULL,
  `subjek` set('Matematika','Fisika','Biologi','Kimia','Ekonomi','Antropologi','Bahasa Inggris','Bahasa Prancis') DEFAULT NULL,
  `penulis` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `tahun_terbit` int(4) DEFAULT NULL,
  `jumlah_halaman` int(10) DEFAULT NULL,
  `kota` varchar(10) DEFAULT NULL,
  `bahasa` set('Indonesia','Inggris','Daerah','Jerman','Prancis','Jepang','Cina','Melayu') DEFAULT NULL,
  `panjang` float DEFAULT NULL,
  `lebar` float DEFAULT NULL,
  `ISBN` varchar(255) DEFAULT NULL,
  `cetakan` varchar(255) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`kode_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`kode_buku`, `judul_buku`, `subjek`, `penulis`, `penerbit`, `tahun_terbit`, `jumlah_halaman`, `kota`, `bahasa`, `panjang`, `lebar`, `ISBN`, `cetakan`, `keterangan`) VALUES
('009-B-Matematika', 'Matematika SMP 1', 'Matematika,Bahasa Inggris', 'Retno Uhuy', 'Pabelan', 2008, 130, 'Jogjakarta', 'Indonesia', 12, 14, '08899', '2', '<p>Heloo</p>'),
('e45_009', 'Fisika bikin pusing', 'Fisika', 'Yolanda', 'Press', 2000, 123, 'Sorong', 'Inggris', 12, 10, 'ffrttt', 'ke 2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku_anggota`
--

CREATE TABLE IF NOT EXISTS `tbl_buku_anggota` (
  `kode_buku` varchar(45) DEFAULT NULL,
  `id_pinjam` varchar(45) DEFAULT NULL,
  `prioritas` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_buku_anggota`
--

INSERT INTO `tbl_buku_anggota` (`kode_buku`, `id_pinjam`, `prioritas`) VALUES
('e45_009', '10', 1),
('009-B-Matematika', '10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_denda`
--

CREATE TABLE IF NOT EXISTS `tbl_denda` (
  `id` int(45) DEFAULT NULL,
  `id_pinjam` int(45) DEFAULT NULL,
  `denda` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_history`
--

CREATE TABLE IF NOT EXISTS `tbl_history` (
  `id` int(45) DEFAULT NULL,
  `kode_buku` varchar(45) DEFAULT NULL,
  `no_induk` varchar(45) DEFAULT NULL,
  `tgl_pinjam` date DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjaman`
--

CREATE TABLE IF NOT EXISTS `tbl_peminjaman` (
  `id_pinjam` int(45) NOT NULL AUTO_INCREMENT,
  `no_induk` varchar(45) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  PRIMARY KEY (`id_pinjam`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_peminjaman`
--

INSERT INTO `tbl_peminjaman` (`id_pinjam`, `no_induk`, `tanggal_pinjam`, `tanggal_kembali`) VALUES
(10, '98788', '2012-08-06', '2012-08-08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tgl_pengembalian`
--

CREATE TABLE IF NOT EXISTS `tgl_pengembalian` (
  `id` int(45) NOT NULL,
  `kode_buku` varchar(45) DEFAULT NULL,
  `no_induk` varchar(45) DEFAULT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `tgl_dikembalikan` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_ci`
--

CREATE TABLE IF NOT EXISTS `user_ci` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` int(4) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user_ci`
--

INSERT INTO `user_ci` (`id`, `username`, `password`, `email`, `level`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@example.com', 1, '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
