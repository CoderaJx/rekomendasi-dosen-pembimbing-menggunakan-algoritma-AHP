-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jun 2025 pada 16.54
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ahp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`) VALUES
(2, 'admin', '$2y$10$G4DkSMalZ1gCYo9qMoO3dOKC/jc/l/vgHW4mBoYX9c4i278exgJzy', 'Fabio');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(100) DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `keahlian` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama_dosen`, `nik`, `keahlian`) VALUES
(3, 'Adi Fajaryanto Cobantoro, S. Kom, M.Kom ', '19840924 201309 13', 'Jaringan'),
(4, 'Andy Triyanto, S.T, M.Kom', '19710521 201101 13', 'RPL'),
(5, 'Angga Prasetyo, S.T, M.Kom', '19820819 201112 13', 'IOT'),
(6, 'Arin Yuliastuti, S.Kom., M.Kom', '19890717 201309 13', 'RPL'),
(7, 'Dr. Aslan Alwi, S.SI, M.Cs', '19720324 201101 13', 'DATA SCIENCE'),
(8, 'Dra. Ida Widaningrum, M.Kom', '19660417 201101 13', 'RPL'),
(9, 'Dyah Mustikasari, S.T, M.Eng', '19871007 201609 13', 'RPL'),
(10, 'Ellisia Kumalasari, S.Pd., M.Pd', '19850905 201309 13', 'MATEMATIKA'),
(11, 'Dr. Fauzan Masykur, S.T., M.Kom', '19810316 202109 12', 'JARINGAN'),
(12, 'Ghulam Asrofi Buntoro, S.T., M.Eng', '19870723 202109 12', 'AI'),
(13, 'Indah Puji Astuti, S.Kom., M.Kom', '19860424 201609 13', 'RPL'),
(14, 'Ismail Abdurrozzaq Z, S.Kom., M.Kom', '19880728 201804 13', 'RPL'),
(15, 'Jamilah Karaman, S.Kom., M.Kom', ' 19900322 201909 13', 'RPL'),
(16, 'Khoiru Nurfitri, S.Kom., M.Kom', '19920430 201808 13', 'RPL'),
(17, 'Ir. Moh. Bhanu Setyawan, S.T., M.Kom', '19800225 201309 13', 'RPL'),
(18, 'Munirah Muslim, S.Kom., M.T', '19791107 200912 13', 'DATA SCIENCE'),
(19, 'Rifqi Rahmatika Az-Zahra, S.Kom., M.Kom', '19931031 202303 13', 'RPL'),
(20, 'Sugianti, S.SI., M.Kom', '19780505 201101 13', 'RPL'),
(22, 'Yovi Litanianda, S.Pd, M.Kom', '19810221 201309 13', 'IOT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`) VALUES
(5, 'komunikasi'),
(6, 'keahlian'),
(7, 'waktu'),
(8, 'pendidikan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `username`, `password`) VALUES
(3, 'Fabio Fajar Kurniawan', '20533357', '$2y$10$wpzpIFwCx0FcJjtPBmELYuqXJZvl1TZuMwd3E8A.SjhWLAlwQrSfO'),
(4, 'Fabio Fajar', '1111111', '$2y$10$zmuptpUYNnicKdeBLTepFekGr5S7tIaB2E/HM.nIXPm52VjHh/q4i');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_dosen`
--

CREATE TABLE `penilaian_dosen` (
  `id` int(11) NOT NULL,
  `dosen_id` int(11) DEFAULT NULL,
  `kriteria_id` int(11) DEFAULT NULL,
  `nilai` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian_dosen`
--

INSERT INTO `penilaian_dosen` (`id`, `dosen_id`, `kriteria_id`, `nilai`) VALUES
(1, 3, 5, 3),
(2, 3, 6, 4),
(3, 3, 7, 5),
(4, 3, 8, 4),
(5, 4, 5, 4),
(6, 4, 6, 4),
(7, 4, 7, 4),
(8, 4, 8, 5),
(9, 5, 5, 3),
(10, 5, 6, 3),
(11, 5, 7, 4),
(12, 5, 8, 5),
(13, 6, 5, 5),
(14, 6, 6, 5),
(15, 6, 7, 3),
(16, 6, 8, 3),
(17, 7, 5, 5),
(18, 7, 6, 5),
(19, 7, 7, 5),
(20, 7, 8, 4),
(21, 8, 5, 3),
(22, 8, 6, 4),
(23, 8, 7, 3),
(24, 8, 8, 5),
(25, 9, 5, 4),
(26, 9, 6, 5),
(27, 9, 7, 4),
(28, 9, 8, 5),
(29, 10, 5, 3),
(30, 10, 6, 4),
(31, 10, 7, 4),
(32, 10, 8, 4),
(33, 11, 5, 4),
(34, 11, 6, 4),
(35, 11, 7, 3),
(36, 11, 8, 4),
(37, 12, 5, 4),
(38, 12, 6, 3),
(39, 12, 7, 5),
(40, 12, 8, 5),
(41, 13, 5, 3),
(42, 13, 6, 5),
(43, 13, 7, 4),
(44, 13, 8, 4),
(45, 14, 5, 5),
(46, 14, 6, 4),
(47, 14, 7, 3),
(48, 14, 8, 3),
(49, 15, 5, 4),
(50, 15, 6, 4),
(51, 15, 7, 4),
(52, 15, 8, 4),
(53, 16, 5, 4),
(54, 16, 6, 5),
(55, 16, 7, 3),
(56, 16, 8, 4),
(57, 17, 5, 4),
(58, 17, 6, 5),
(59, 17, 7, 4),
(60, 17, 8, 4),
(61, 18, 5, 4),
(62, 18, 6, 3),
(63, 18, 7, 5),
(64, 18, 8, 5),
(65, 19, 5, 5),
(66, 19, 6, 4),
(67, 19, 7, 5),
(68, 19, 8, 3),
(69, 20, 5, 4),
(70, 20, 6, 4),
(71, 20, 7, 5),
(72, 20, 8, 4),
(73, 22, 5, 3),
(74, 22, 6, 3),
(75, 22, 7, 5),
(76, 22, 8, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_kriteria`
--

CREATE TABLE `penilaian_kriteria` (
  `id` int(11) NOT NULL,
  `mahasiswa_id` int(11) DEFAULT NULL,
  `kriteria1_id` int(11) DEFAULT NULL,
  `kriteria2_id` int(11) DEFAULT NULL,
  `nilai_perbandingan` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian_kriteria`
--

INSERT INTO `penilaian_kriteria` (`id`, `mahasiswa_id`, `kriteria1_id`, `kriteria2_id`, `nilai_perbandingan`) VALUES
(13, 4, 5, 6, 3),
(14, 4, 5, 7, 3),
(15, 4, 5, 8, 1),
(16, 4, 6, 7, 5),
(17, 4, 6, 8, 5),
(18, 4, 7, 8, 3),
(55, 3, 5, 6, 3),
(56, 3, 6, 5, 0.333333),
(57, 3, 5, 7, 5),
(58, 3, 7, 5, 0.2),
(59, 3, 5, 8, 5),
(60, 3, 8, 5, 0.2),
(61, 3, 6, 7, 3),
(62, 3, 7, 6, 0.333333),
(63, 3, 6, 8, 1),
(64, 3, 8, 6, 1),
(65, 3, 7, 8, 3),
(66, 3, 8, 7, 0.333333);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD UNIQUE KEY `nidn` (`nik`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`username`);

--
-- Indeks untuk tabel `penilaian_dosen`
--
ALTER TABLE `penilaian_dosen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dosen_id` (`dosen_id`),
  ADD KEY `kriteria_id` (`kriteria_id`);

--
-- Indeks untuk tabel `penilaian_kriteria`
--
ALTER TABLE `penilaian_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`),
  ADD KEY `kriteria1_id` (`kriteria1_id`),
  ADD KEY `kriteria2_id` (`kriteria2_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penilaian_dosen`
--
ALTER TABLE `penilaian_dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `penilaian_kriteria`
--
ALTER TABLE `penilaian_kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penilaian_dosen`
--
ALTER TABLE `penilaian_dosen`
  ADD CONSTRAINT `penilaian_dosen_ibfk_1` FOREIGN KEY (`dosen_id`) REFERENCES `dosen` (`id_dosen`),
  ADD CONSTRAINT `penilaian_dosen_ibfk_2` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id_kriteria`);

--
-- Ketidakleluasaan untuk tabel `penilaian_kriteria`
--
ALTER TABLE `penilaian_kriteria`
  ADD CONSTRAINT `penilaian_kriteria_ibfk_1` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswa` (`id`),
  ADD CONSTRAINT `penilaian_kriteria_ibfk_2` FOREIGN KEY (`kriteria1_id`) REFERENCES `kriteria` (`id_kriteria`),
  ADD CONSTRAINT `penilaian_kriteria_ibfk_3` FOREIGN KEY (`kriteria2_id`) REFERENCES `kriteria` (`id_kriteria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
