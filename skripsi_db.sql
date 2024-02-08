-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Feb 2024 pada 06.37
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `banding_masuk`
--

CREATE TABLE `banding_masuk` (
  `npm` int(11) NOT NULL,
  `plat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `counter`
--

CREATE TABLE `counter` (
  `id` int(11) NOT NULL,
  `counter_masuk` int(11) NOT NULL,
  `counter_keluar` int(11) NOT NULL,
  `counter_isi` int(11) NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `counter`
--

INSERT INTO `counter` (`id`, `counter_masuk`, `counter_keluar`, `counter_isi`, `waktu`) VALUES
(1, 2, 2, 0, '2024-01-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_keluar`
--

CREATE TABLE `log_keluar` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `plat` varchar(20) DEFAULT NULL,
  `waktu_keluar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `log_keluar`
--

INSERT INTO `log_keluar` (`id`, `uid`, `plat`, `waktu_keluar`) VALUES
(13, 1910501076, 'N4560R', '2024-02-05 09:03:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_masuk`
--

CREATE TABLE `log_masuk` (
  `id` int(11) NOT NULL,
  `uid` int(11) DEFAULT NULL,
  `plat` varchar(20) DEFAULT NULL,
  `waktu_masuk` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `log_masuk`
--

INSERT INTO `log_masuk` (`id`, `uid`, `plat`, `waktu_masuk`) VALUES
(18, 1910501077, 'N4560R', '2024-01-11 03:09:39'),
(19, 1910501011, 'N4560R', '2024-01-11 07:56:00'),
(20, 1910501011, 'N4560R', '2024-01-13 14:55:40'),
(21, 1910501011, 'N4560R15', '2024-01-13 15:02:34'),
(22, 1910501077, '4Z560R', '2024-01-13 15:16:25'),
(23, 1910501077, 'N4560R17/', '2024-01-13 15:38:27'),
(24, 1910501077, 'N4560R', '2024-01-13 15:50:29'),
(25, 1910501077, 'NZS6OR', '2024-01-13 15:59:14'),
(26, 1910501011, 'NSOMT', '2024-01-13 15:59:14'),
(27, 1910501077, 'NG560R', '2024-01-13 15:59:14'),
(28, 1910501011, 'N4560R0<49', '2024-01-15 09:01:10'),
(29, 1910501011, 'N4560RIA', '2024-01-15 09:06:00'),
(30, 1910501011, 'N4560R1235', '2024-01-15 09:06:00'),
(31, 1910501011, 'NL560R', '2024-01-15 09:12:01'),
(32, 1910501011, 'N4560R', '2024-01-15 09:34:16'),
(33, 1910501011, 'N4560RI45', '2024-01-15 09:40:16'),
(34, 1910501011, 'ASGOR', '2024-01-15 09:45:09'),
(35, 1910501011, 'N4560R', '2024-01-15 10:12:12'),
(36, 1910501011, 'NZ560REES', '2024-01-15 10:19:14'),
(37, 1910501077, 'N4560R', '2024-01-16 07:37:56'),
(38, 1910501077, 'NZ5G0R', '2024-01-16 07:49:04'),
(39, 1910501011, 'NZ5SOR', '2024-01-16 07:55:32'),
(40, 1910501011, 'NZ56ORA', '2024-01-16 07:57:59'),
(46, 1910501076, 'N4560R', '2024-02-05 08:42:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `npm` bigint(20) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `jurusan` varchar(50) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`npm`, `nama`, `email`, `jurusan`, `gambar`) VALUES
(1910501073, 'Pradita Eka Saputra', 'pradita@gmail.com', 'S1 Teknik Elektro', '2024_01_05_15_20_13.jpg'),
(1910501076, 'Muhammad Irfan Badriawan', 'irfan@students.ac.id', 'S1 Teknik Elektro', '2024_01_05_17_35_01.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$QbQb1nO.oa9pUV1TU9iDxeUoQ5IXQZJ5IwZgc5D4mY4blNCjhkbBO'),
(2, 'user', '$2y$10$j/jGG6eUmuZq2WlxueCXo.nvHDGPFg2S3zPzjrWnGI6Co8qPfm/EC'),
(3, 'irfan', '$2y$10$dNSSXHlR8LWKYBZt0FQZZ.ld1/88QcXLkiPdFUoiU4KCYqRV/FLe.');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `banding_masuk`
--
ALTER TABLE `banding_masuk`
  ADD PRIMARY KEY (`npm`);

--
-- Indeks untuk tabel `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_keluar`
--
ALTER TABLE `log_keluar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_masuk`
--
ALTER TABLE `log_masuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`npm`) USING BTREE;

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `counter`
--
ALTER TABLE `counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `log_keluar`
--
ALTER TABLE `log_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `log_masuk`
--
ALTER TABLE `log_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
