-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Sep 2023 pada 08.00
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
-- Database: `rak-buku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `tahun` year(4) NOT NULL,
  `sampul` varchar(255) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `judul`, `pengarang`, `tahun`, `sampul`, `harga`) VALUES
(1, 'The Pragmatic Programmer', 'Andrew Hunt dan David Thomas', '1999', 'https://i.pinimg.com/736x/81/21/dc/8121dc48ec937ecf919bc2c54aa961a4.jpg', 75600.00),
(2, 'Clean Code', 'Robert Cecil Martin atau paman bob', '2008', 'https://i.pinimg.com/564x/11/eb/25/11eb252a18738c71703f618c2143c08d.jpg', 95700.00),
(3, 'Introduction to Algorithms', 'Profesor Ronald Linn Rivest', '1989', 'https://i.pinimg.com/736x/01/90/37/019037bbe4fd77a459e4ca4b415f9d98.jpg', 87500.00),
(5, 'si kancil', 'Yamada Kyuuri', '2023', 'https://i.pinimg.com/564x/10/2e/40/102e407b530f898e0e1193378f353d8f.jpg', 300000.00),
(6, 'Harry Potter dan si Anak Terkutuk', 'J. K. Rowling', '2016', 'https://i.pinimg.com/736x/70/d6/e7/70d6e7f2443194d12c8f6209b7a40dbe.jpg', 89500.00),
(7, 'Manga AI no Idenshi 7', 'Yamada Kyuuri', '2023', 'https://i.pinimg.com/564x/10/2e/40/102e407b530f898e0e1193378f353d8f.jpg', 300000.00),
(12, 'si kancil', 'wak suaibe', '1967', 'https://i.pinimg.com/736x/70/d6/e7/70d6e7f2443194d12c8f6209b7a40dbe.jpg', 15000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rak`
--

CREATE TABLE `rak` (
  `id_rak` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rak`
--

INSERT INTO `rak` (`id_rak`, `judul`, `deskripsi`) VALUES
(1, 'Rak umum', 'untuk buku-buku umum'),
(2, 'Rak fiksi', 'untuk buku-buku fiksi'),
(3, 'Rak fantasi', 'untuk buku-buku fiksi'),
(4, 'Rak non-fiksi', 'untuk buku-buku non-fiksi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `rak`
--
ALTER TABLE `rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
