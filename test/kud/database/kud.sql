-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 20. Desember 2012 jam 08:44
-- Versi Server: 5.1.41
-- Versi PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kud`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE IF NOT EXISTS `anggota` (
  `id_anggota` int(3) NOT NULL,
  `nama_anggota` varchar(30) NOT NULL,
  `password` varchar(35) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  PRIMARY KEY (`id_anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `password`, `alamat`, `telepon`) VALUES
(1234, 'fuad', '0c0e38071f16c92feb087d0f77961c15', 'Papringan', '085725886207'),
(12345, 'panji', '827ccb0eea8a706c4c34a16891f84e7b', 'papringan', '0876456754');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE IF NOT EXISTS `barang` (
  `id_barang` int(3) NOT NULL DEFAULT '0',
  `nama_barang` varchar(30) NOT NULL,
  `jumlah_barang` int(2) NOT NULL,
  `harga_jual` int(7) NOT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `jumlah_barang`, `harga_jual`) VALUES
(124, 'Pupuk Organik a', 20, 4000),
(127, 'Barang ', 50, 1000),
(128, 'Barang 2', 34, 2000),
(129, 'Pupuk a', 35, 2500),
(130, 'Pupuk 2 a', 35, 3000),
(131, 'Bibit Padi', 45, 15000),
(132, 'Bibit Padi 2', 35, 9500),
(133, 'Kolor Ijo a', 100, 10000),
(99000, 'QQQQ a', 300, 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir`
--

CREATE TABLE IF NOT EXISTS `kasir` (
  `id_kasir` int(3) NOT NULL,
  `nama_kasir` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  PRIMARY KEY (`id_kasir`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `nama_kasir`, `password`, `alamat`, `telepon`) VALUES
(4, 'D', 'a87ff679a2f3e71d9181a67b7542122c', 'gf', '087654'),
(123, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'timoho', '09876544'),
(3456, 'admin', 'def7924e3199be5e18060bb3e1d547a7', 'timoho 2', '09876544563');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurus`
--

CREATE TABLE IF NOT EXISTS `pengurus` (
  `id_pengurus` int(3) NOT NULL,
  `id_anggota` int(3) NOT NULL,
  `nama_pengurus` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  PRIMARY KEY (`id_pengurus`),
  KEY `id_anggota` (`id_anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengurus`
--

INSERT INTO `pengurus` (`id_pengurus`, `id_anggota`, `nama_pengurus`, `password`, `alamat`, `telepon`) VALUES
(1234, 1234, 'fuadadib', '0c0e38071f16c92feb087d0f77961c15', 'Papringan', '085725886207');

-- --------------------------------------------------------

--
-- Struktur dari tabel `titip_barang`
--

CREATE TABLE IF NOT EXISTS `titip_barang` (
  `id_titipbarang` int(3) NOT NULL AUTO_INCREMENT,
  `id_pengurus` int(3) NOT NULL,
  `id_anggota` int(3) NOT NULL,
  `id_barang` int(3) NOT NULL,
  `jml_barang` int(2) NOT NULL,
  `tgl_titip` datetime NOT NULL,
  `harga_beli` int(7) NOT NULL,
  PRIMARY KEY (`id_titipbarang`),
  UNIQUE KEY `id_anggota` (`id_anggota`,`id_barang`),
  KEY `id_pengurus` (`id_pengurus`,`id_anggota`,`id_barang`),
  KEY `id_barang` (`id_barang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `titip_barang`
--

INSERT INTO `titip_barang` (`id_titipbarang`, `id_pengurus`, `id_anggota`, `id_barang`, `jml_barang`, `tgl_titip`, `harga_beli`) VALUES
(5, 1234, 1234, 124, 50, '2012-12-14 00:00:00', 5000),
(6, 1234, 12345, 127, 40, '2012-12-14 23:05:00', 4500),
(8, 1234, 1234, 127, 40, '2012-12-14 23:58:59', 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `no` int(5) NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(3) NOT NULL,
  `id_barang` int(3) NOT NULL,
  `id_kasir` int(3) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  PRIMARY KEY (`no`),
  KEY `id_barang` (`id_barang`,`id_kasir`),
  KEY `id_kasir` (`id_kasir`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`no`, `id_transaksi`, `id_barang`, `id_kasir`, `tgl_transaksi`) VALUES
(1, 1, 124, 123, '2012-12-14 22:49:41'),
(2, 1, 124, 123, '2012-12-15 22:49:51'),
(3, 2, 124, 123, '2012-12-12 00:00:00'),
(4, 2, 128, 123, '2012-12-18 15:21:04'),
(5, 0, 127, 123, '2012-12-18 15:45:54'),
(6, 0, 124, 123, '2012-12-18 15:45:58'),
(7, 0, 124, 123, '2012-12-18 15:45:59'),
(8, 0, 124, 123, '2012-12-18 15:46:00'),
(9, 3, 99000, 123, '2012-12-20 08:42:27');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengurus`
--
ALTER TABLE `pengurus`
  ADD CONSTRAINT `pengurus_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `titip_barang`
--
ALTER TABLE `titip_barang`
  ADD CONSTRAINT `titip_barang_ibfk_1` FOREIGN KEY (`id_pengurus`) REFERENCES `pengurus` (`id_pengurus`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `titip_barang_ibfk_2` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `titip_barang_ibfk_3` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_kasir`) REFERENCES `kasir` (`id_kasir`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
