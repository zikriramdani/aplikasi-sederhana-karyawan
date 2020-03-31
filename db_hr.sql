-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Mar 2020 pada 18.23
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hr`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bagian`
--

CREATE TABLE `tbl_bagian` (
  `id_bagian` int(5) NOT NULL,
  `kode_bagian` char(5) NOT NULL,
  `nama_bagian` varchar(50) NOT NULL,
  `kepala_bagian` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bagian`
--

INSERT INTO `tbl_bagian` (`id_bagian`, `kode_bagian`, `nama_bagian`, `kepala_bagian`) VALUES
(8, '1', 'Estate Management', 'Kepala Bagian'),
(9, '2', 'Human Resources', 'Kepala Bagian'),
(10, '3', 'Finance & Accounting', 'Kepala Bagian'),
(11, '4', 'Information Technologi', 'Kepala Bagian');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gaji`
--

CREATE TABLE `tbl_gaji` (
  `id_gaji` int(11) NOT NULL,
  `no_induk` char(9) NOT NULL,
  `tahun` int(10) NOT NULL,
  `bulan` char(10) NOT NULL,
  `kode_gaji` char(3) NOT NULL,
  `jumlah` int(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_gaji`
--

INSERT INTO `tbl_gaji` (`id_gaji`, `no_induk`, `tahun`, `bulan`, `kode_gaji`, `jumlah`) VALUES
(92, '001', 2015, 'Jan', 'GP', 100000),
(93, '002', 2016, 'Jan', 'TO', 1000000),
(94, '003', 2018, 'Jan', 'IN', 100000),
(95, '004', 2016, 'Jan', 'GP', 100000),
(96, '005', 2014, 'Jan', 'GP', 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `no_induk` char(9) NOT NULL,
  `kode_bagian` char(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` datetime NOT NULL,
  `tanggal_masuk` datetime NOT NULL,
  `golongan` char(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id_karyawan`, `no_induk`, `kode_bagian`, `nama`, `tempat_lahir`, `tanggal_lahir`, `tanggal_masuk`, `golongan`) VALUES
(5, '001', '4', 'Zikri', 'Tangerang', '2015-01-01 00:00:00', '2020-03-31 00:00:00', '1'),
(6, '002', '4', 'Ramdani', 'Tangerang', '2016-01-01 00:00:00', '2020-03-31 00:00:00', '2'),
(7, '003', '3', 'Zikri Ramdani', 'Tangerang', '2018-01-01 00:00:00', '2020-03-31 00:00:00', '2'),
(8, '004', '2', 'Zikri Ramdani', 'Tangerang', '2016-01-01 00:00:00', '2020-03-31 00:00:00', '3'),
(9, '005', '1', 'Zikri Ramdani', 'Tangerang', '2014-01-01 00:00:00', '2020-03-31 00:00:00', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  ADD PRIMARY KEY (`kode_bagian`),
  ADD UNIQUE KEY `id_bagian` (`id_bagian`);

--
-- Indeks untuk tabel `tbl_gaji`
--
ALTER TABLE `tbl_gaji`
  ADD PRIMARY KEY (`no_induk`,`tahun`,`bulan`,`kode_gaji`),
  ADD UNIQUE KEY `no_indek` (`no_induk`),
  ADD UNIQUE KEY `id_gaji` (`id_gaji`);

--
-- Indeks untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`no_induk`),
  ADD UNIQUE KEY `no_indek` (`no_induk`),
  ADD UNIQUE KEY `id_karyawan` (`id_karyawan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_bagian`
--
ALTER TABLE `tbl_bagian`
  MODIFY `id_bagian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_gaji`
--
ALTER TABLE `tbl_gaji`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
