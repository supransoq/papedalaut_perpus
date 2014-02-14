-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 03, 2013 at 01:18 AM
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
  `nis` int(10) NOT NULL,
  `jurusan` enum('IPA','IPS','Bahasa') DEFAULT NULL,
  `kelas` enum('X','XI','XII') DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `tgl_daftar_buku` datetime DEFAULT NULL,
  PRIMARY KEY (`kode_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_buku`
--

INSERT INTO `tbl_buku` (`kode_buku`, `judul_buku`, `subjek`, `penulis`, `penerbit`, `tahun_terbit`, `jumlah_halaman`, `kota`, `bahasa`, `panjang`, `lebar`, `ISBN`, `cetakan`, `keterangan`, `tgl_daftar_buku`) VALUES
('009-B-Matematika', 'Matematika SMP 1', 'Matematika,Bahasa Inggris', 'Retno Uhuy', 'Pabelan', 2008, 130, 'Jogjakarta', 'Indonesia', 12, 14, '08899', '2', '<p>Heloo</p>', NULL),
('e45_009', 'Fisika bikin pusing', 'Fisika', 'Yolanda', 'Press', 2000, 123, 'Sorong', 'Inggris', 12, 10, 'ffrttt', 'ke 2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buku_anggota`
--

CREATE TABLE IF NOT EXISTS `tbl_buku_anggota` (
  `kode_buku` varchar(45) DEFAULT NULL,
  `id_pinjam` int(45) DEFAULT NULL,
  `prioritas_buku` enum('Tinggi','Sedang','Rendah') DEFAULT NULL,
  KEY `kode_buku` (`kode_buku`),
  KEY `id_pinjam` (`id_pinjam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_denda`
--

CREATE TABLE IF NOT EXISTS `tbl_denda` (
  `id_denda` int(45) NOT NULL,
  `id_pinjam` int(45) DEFAULT NULL,
  `denda` float DEFAULT NULL,
  PRIMARY KEY (`id_denda`),
  KEY `id_pinjam` (`id_pinjam`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_history`
--

CREATE TABLE IF NOT EXISTS `tbl_history` (
  `id_history` int(45) DEFAULT NULL,
  `id_pinjam` int(45) DEFAULT NULL,
  `id_kembali` int(45) DEFAULT NULL,
  KEY `id_pinjam` (`id_pinjam`),
  KEY `id_kembali` (`id_kembali`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peminjaman`
--

CREATE TABLE IF NOT EXISTS `tbl_peminjaman` (
  `id_pinjam` int(45) NOT NULL AUTO_INCREMENT,
  `nis` int(10) DEFAULT NULL,
  `tgl_pinjam` datetime DEFAULT NULL,
  `tgl_kembali` datetime DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_pinjam`),
  KEY `nis` (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengembalian`
--

CREATE TABLE IF NOT EXISTS `tbl_pengembalian` (
  `id_kembali` int(45) NOT NULL,
  `id_pinjam` int(45) DEFAULT NULL,
  `id_denda` int(45) DEFAULT NULL,
  `tgl_dikembalikan` datetime DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_kembali`),
  KEY `id_pinjam` (`id_pinjam`),
  KEY `id_denda` (`id_denda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_siswa`
--

CREATE TABLE IF NOT EXISTS `tbl_siswa` (
  `nis` int(10) NOT NULL,
  `nisn` int(25) DEFAULT NULL,
  `nama_depan` varchar(255) DEFAULT NULL,
  `nama_belakang` varchar(255) DEFAULT NULL,
  `nama_panggilan` varchar(255) DEFAULT NULL,
  `tempat_lahir` varchar(255) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `gender` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `gol_darah` enum('A','B','AB','O') DEFAULT NULL,
  `agama` enum('Islam','Katholik','Protestan','Budha','Hindu') DEFAULT NULL,
  `suku` varchar(255) DEFAULT NULL,
  `status_keluarga` enum('Anak Kandung','Anak Angkat') DEFAULT NULL,
  `saudara_ke` int(2) DEFAULT NULL,
  `jumlah_saudara` int(2) DEFAULT NULL,
  `warga_negara` varchar(255) DEFAULT NULL,
  `alamat_rumah` varchar(255) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `jarak` enum('Kurang dari 5 Km','Antara 5 Km - 10 Km','Lebih dari 0 Km') DEFAULT NULL,
  `nama_ayah` varchar(255) DEFAULT NULL,
  `pekerjaan_ayah` varchar(255) DEFAULT NULL,
  `penghasilan_ayah` float DEFAULT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) DEFAULT NULL,
  `penghasilan_ibu` float DEFAULT NULL,
  `kendaraan` enum('Roda-2','Roda-4','Lainnya') DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `password` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `tgl_daftar_siswa` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`nis`),
  KEY `FK_tbl_siswa` (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `level` enum('Administrator','Petugas') DEFAULT NULL,
  `status_otentikasi` enum('0','1') DEFAULT NULL,
  `keterangan` text,
  `tgl_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_anggota`
--
ALTER TABLE `tbl_anggota`
  ADD CONSTRAINT `tbl_anggota_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `tbl_siswa` (`nis`);

--
-- Constraints for table `tbl_buku_anggota`
--
ALTER TABLE `tbl_buku_anggota`
  ADD CONSTRAINT `tbl_buku_anggota_ibfk_1` FOREIGN KEY (`kode_buku`) REFERENCES `tbl_buku` (`kode_buku`),
  ADD CONSTRAINT `tbl_buku_anggota_ibfk_2` FOREIGN KEY (`id_pinjam`) REFERENCES `tbl_peminjaman` (`id_pinjam`);

--
-- Constraints for table `tbl_denda`
--
ALTER TABLE `tbl_denda`
  ADD CONSTRAINT `tbl_denda_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `tbl_peminjaman` (`id_pinjam`);

--
-- Constraints for table `tbl_history`
--
ALTER TABLE `tbl_history`
  ADD CONSTRAINT `tbl_history_ibfk_2` FOREIGN KEY (`id_kembali`) REFERENCES `tbl_pengembalian` (`id_kembali`),
  ADD CONSTRAINT `tbl_history_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `tbl_peminjaman` (`id_pinjam`);

--
-- Constraints for table `tbl_peminjaman`
--
ALTER TABLE `tbl_peminjaman`
  ADD CONSTRAINT `tbl_peminjaman_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `tbl_siswa` (`nis`);

--
-- Constraints for table `tbl_pengembalian`
--
ALTER TABLE `tbl_pengembalian`
  ADD CONSTRAINT `tbl_pengembalian_ibfk_1` FOREIGN KEY (`id_pinjam`) REFERENCES `tbl_peminjaman` (`id_pinjam`),
  ADD CONSTRAINT `tbl_pengembalian_ibfk_2` FOREIGN KEY (`id_denda`) REFERENCES `tbl_denda` (`id_denda`);

--
-- Constraints for table `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD CONSTRAINT `tbl_siswa_ibfk_1` FOREIGN KEY (`user`) REFERENCES `tbl_user` (`username`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
