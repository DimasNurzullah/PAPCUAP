-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Apr 2020 pada 06.34
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `papcuap_a`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama_anggota` varchar(200) NOT NULL,
  `jenis_kelamin` enum('L','P','','') NOT NULL,
  `kelas` enum('A','B','C','') NOT NULL,
  `foto_profil` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama_anggota`, `jenis_kelamin`, `kelas`, `foto_profil`) VALUES
(1, 'Sukma', 'P', 'A', NULL),
(4, 'Novitas', 'P', 'A', ''),
(5, 'dimas', 'L', 'A', '/uploads/gambar_anggota/anggota_1586869102.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `autentikasi`
--

CREATE TABLE `autentikasi` (
  `id_autentikasi` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `autentikasi`
--

INSERT INTO `autentikasi` (`id_autentikasi`, `id_anggota`, `username`, `password`) VALUES
(1, 1, 'admin', '202cb962ac59075b964b07152d234b70'),
(2, 4, 'admin', '7d49e40f4b3d8f68c19406a58303f826'),
(3, 5, 'Dimas', '8277e0910d750195b448797616e091ad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuap`
--

CREATE TABLE `cuap` (
  `id_cuap` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `post` text NOT NULL,
  `post_parent_id` int(11) DEFAULT NULL,
  `post_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indeks untuk tabel `autentikasi`
--
ALTER TABLE `autentikasi`
  ADD PRIMARY KEY (`id_autentikasi`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indeks untuk tabel `cuap`
--
ALTER TABLE `cuap`
  ADD PRIMARY KEY (`id_cuap`),
  ADD KEY `id_anggota` (`id_anggota`),
  ADD KEY `post_parent_id` (`post_parent_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `autentikasi`
--
ALTER TABLE `autentikasi`
  MODIFY `id_autentikasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `cuap`
--
ALTER TABLE `cuap`
  MODIFY `id_cuap` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `autentikasi`
--
ALTER TABLE `autentikasi`
  ADD CONSTRAINT `autentikasi_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`);

--
-- Ketidakleluasaan untuk tabel `cuap`
--
ALTER TABLE `cuap`
  ADD CONSTRAINT `cuap_ibfk_1` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
