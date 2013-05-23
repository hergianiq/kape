-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 23. Mei 2013 jam 06:48
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbimagine`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absensi`
--

CREATE TABLE IF NOT EXISTS `tb_absensi` (
  `id_absensi` int(5) NOT NULL,
  `id_siswa` int(3) NOT NULL,
  `id_program` int(3) NOT NULL,
  `id_jenis_kelas` int(2) NOT NULL,
  `jml_hadir` int(3) NOT NULL,
  `id_pembayaran` int(3) NOT NULL,
  `update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_absensi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_absensi_trainer`
--

CREATE TABLE IF NOT EXISTS `tb_absensi_trainer` (
  `id_absensi` int(3) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `hari` date NOT NULL,
  `status_absensi` int(1) NOT NULL,
  PRIMARY KEY (`id_absensi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bayar`
--

CREATE TABLE IF NOT EXISTS `tb_bayar` (
  `id_bayar` int(3) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(3) NOT NULL,
  `id_pembayaran` int(3) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `id_siswa` int(3) NOT NULL,
  PRIMARY KEY (`id_bayar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `tb_bayar`
--

INSERT INTO `tb_bayar` (`id_bayar`, `id_karyawan`, `id_pembayaran`, `tgl_bayar`, `id_siswa`) VALUES
(1, 91, 1, '2012-06-06', 68),
(2, 91, 2, '2012-04-04', 91);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_kelas`
--

CREATE TABLE IF NOT EXISTS `tb_jenis_kelas` (
  `id_jenis_kelas` int(2) NOT NULL,
  `jenis_kelas` varchar(16) NOT NULL,
  PRIMARY KEY (`id_jenis_kelas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_jenis_kelas`
--

INSERT INTO `tb_jenis_kelas` (`id_jenis_kelas`, `jenis_kelas`) VALUES
(1, 'reguler'),
(2, 'private'),
(3, 'studycase');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_karyawan`
--

CREATE TABLE IF NOT EXISTS `tb_karyawan` (
  `id_karyawan` int(3) NOT NULL AUTO_INCREMENT,
  `nama_karyawan` varchar(32) NOT NULL,
  `phone_karyawan` varchar(15) NOT NULL,
  `email` varchar(32) NOT NULL,
  `id_person` int(2) NOT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Dumping data untuk tabel `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id_karyawan`, `nama_karyawan`, `phone_karyawan`, `email`, `id_person`) VALUES
(1, '', '', '', 0),
(11, 'saya andi', '08678766559', 'indheee@yahoo.co.id', 7),
(89, 'joko s', '08678766559', 'hanhinhun@gmail.com', 3),
(90, 'susanto', '08678766559', 'indheee@yahoo.co.id', 5),
(91, 'ina', '08678766559', 'indheee@gmail.com', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE IF NOT EXISTS `tb_login` (
  `level` int(2) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(6) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_login`
--

INSERT INTO `tb_login` (`level`, `username`, `password`, `status`) VALUES
(1, 'aku', '123456', 'Manager'),
(2, 'aku', '12345', 'FO'),
(3, 'aku', '1234', 'Keuangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE IF NOT EXISTS `tb_pembayaran` (
  `id_pembayaran` int(3) NOT NULL,
  `status_pembayaran` varchar(15) NOT NULL,
  `jml_pertemuan` int(2) NOT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `status_pembayaran`, `jml_pertemuan`) VALUES
(1, 'Lunas', 14),
(2, 'Belum Lunas', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_person`
--

CREATE TABLE IF NOT EXISTS `tb_person` (
  `id_person` int(2) NOT NULL,
  `jenis_person` varchar(16) NOT NULL,
  PRIMARY KEY (`id_person`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_person`
--

INSERT INTO `tb_person` (`id_person`, `jenis_person`) VALUES
(1, 'calon siswa'),
(2, 'siswa'),
(3, 'trainer'),
(4, 'FO'),
(5, 'keuangan'),
(6, 'manager'),
(7, 'karyawan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_program`
--

CREATE TABLE IF NOT EXISTS `tb_program` (
  `id_program` int(3) NOT NULL,
  `nama_program` varchar(64) NOT NULL,
  `jumlah_sesi` int(2) NOT NULL,
  `id_jenis_kelas` int(2) NOT NULL,
  `id_karyawan` int(3) NOT NULL,
  `harga` int(7) NOT NULL,
  PRIMARY KEY (`id_program`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_program`
--

INSERT INTO `tb_program` (`id_program`, `nama_program`, `jumlah_sesi`, `id_jenis_kelas`, `id_karyawan`, `harga`) VALUES
(0, 'Tidak Mengikuti Kelas', 0, 1, 11, 1000000),
(1, 'Android Academy', 10, 2, 89, 400000),
(2, 'Java Programming', 14, 1, 11, 400000),
(3, 'Java Programming', 14, 2, 0, 1000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE IF NOT EXISTS `tb_siswa` (
  `id_siswa` int(3) NOT NULL AUTO_INCREMENT,
  `nama_siswa` varchar(32) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `kampus` varchar(16) NOT NULL,
  `facebook` varchar(20) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `id_person` int(2) NOT NULL,
  `id_status` int(1) NOT NULL,
  `id_program` int(3) NOT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=133 ;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nama_siswa`, `phone`, `kampus`, `facebook`, `tgl_daftar`, `id_person`, `id_status`, `id_program`) VALUES
(68, 'indri', '087839944838', 'uin', 'indri aja', '2013-04-08', 2, 1, 2),
(90, 'hana s', '087838292595', 'UII', 'indheee', '2013-05-03', 1, 1, 1),
(91, 'susanti', '087777777777', 'uii', 'indri aja', '2013-05-10', 2, 1, 1),
(106, 'aini', '087839944838', 'uii', 'indri aja', '2013-05-10', 1, 1, 3),
(107, 'hanhinhun', '087838292595', 'ugm', 'indheee', '2013-05-10', 1, 1, 1),
(113, 'joko', '08132888888', 'uii', 'indri aja', '2013-05-10', 1, 1, 1),
(119, 'hana soffa', '087838292595', 'UII', 'hans', '2013-05-10', 1, 1, 1),
(121, 'rahma', '087839944838', 'ugm', 'indri aja', '2013-05-10', 1, 1, 1),
(122, '', '', '', '', '2013-05-14', 0, 1, 0),
(123, 'aku', '087839944838', 'uin', 'indheee', '2012-05-15', 1, 1, 1),
(124, '', '', '', '', '2013-05-21', 0, 1, 0),
(125, '', '', '', '', '2013-05-21', 0, 1, 0),
(126, 'saskia', '908888', 'uii', 'indheee', '2013-05-21', 2, 1, 1),
(127, '', '', '', '', '2013-05-21', 0, 1, 0),
(128, 'saya indri', '087839944838', 'ugm', 'indheee', '2013-05-21', 2, 1, 1),
(129, '', '', '', '', '2013-05-21', 0, 1, 0),
(130, '', '', '', '', '2013-05-21', 1, 2, 0),
(131, '', '', '', '', '2013-05-21', 1, 1, 0),
(132, '', '', '', '', '2013-05-21', 1, 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_status`
--

CREATE TABLE IF NOT EXISTS `tb_status` (
  `id_status` int(1) NOT NULL,
  `status` varchar(12) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_status`
--

INSERT INTO `tb_status` (`id_status`, `status`) VALUES
(1, 'Aktif'),
(2, 'Tidak Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_trainer`
--

CREATE TABLE IF NOT EXISTS `tb_trainer` (
  `id_trainer` int(3) NOT NULL,
  `nama_trainer` varchar(32) NOT NULL,
  `phone_trainer` varchar(13) NOT NULL,
  `email_trainer` varchar(25) NOT NULL,
  PRIMARY KEY (`id_trainer`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
