-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Mar 2024 pada 08.28
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galeri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `albumid` int(11) NOT NULL,
  `namaalbum` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggalbuat` date NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`albumid`, `namaalbum`, `deskripsi`, `tanggalbuat`, `userid`) VALUES
(1, 'SoLev', 'Solo Leveling', '2024-02-01', 1),
(3, 'TBATE', 'The Beginning After The End', '2024-02-02', 1),
(4, 'Kucing', 'kumpulan foto kucing imut', '2024-02-03', 1),
(7, 'mawar', 'bunga mawar', '2024-02-13', 1),
(8, 'Tulip', 'Bunga tulip yang cantikkk', '2024-02-13', 1),
(11, 'Noragami', 'Anime Noragami', '2024-02-13', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dislikefoto`
--

CREATE TABLE `dislikefoto` (
  `dislikeid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tanggaldislike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `fotoid` int(11) NOT NULL,
  `judulfoto` varchar(255) NOT NULL,
  `deskripsifoto` text NOT NULL,
  `tanggalunggah` date NOT NULL,
  `lokasifile` varchar(255) NOT NULL,
  `albumid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`fotoid`, `judulfoto`, `deskripsifoto`, `tanggalunggah`, `lokasifile`, `albumid`, `userid`) VALUES
(1, 'Arthur', 'Arthur Leywin', '2024-03-07', '2025521787-27799-Arthur-LeywinThe-Beginning-After-The-End-HD-Wallpaper.png', 3, 1),
(6, 'meong', 'meong turu', '2024-02-03', '1673543174-WhatsApp Image 2024-02-03 at 14.08.35.jpeg', 4, 1),
(7, 'kitten', 'this is kucing', '2024-02-07', '1484647482-cat4.jpg', 4, 2),
(8, 'SJW', 'Sung Jin Woo', '2024-02-12', '1697011678-1377025-sung-jinwoo-solo-leveling-manhwa-4k-pc-wallpaper.jpg', 1, 1),
(12, 'sjw2', 'sungjinwoo', '2024-02-13', '1368981604-sjw.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentarfoto`
--

CREATE TABLE `komentarfoto` (
  `komentarid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `isikomentar` text NOT NULL,
  `tanggalkomentar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentarfoto`
--

INSERT INTO `komentarfoto` (`komentarid`, `fotoid`, `userid`, `isikomentar`, `tanggalkomentar`) VALUES
(10, 6, 2, 'lucuu', '2024-02-12'),
(11, 7, 1, 'AAA LUCUU BGT MENGNYAA><', '2024-02-12'),
(12, 7, 1, 'lucuuuuuuu><', '2024-02-13'),
(17, 12, 3, 'keren cuy', '2024-02-15'),
(20, 8, 1, 'p', '2024-02-15'),
(21, 8, 1, 'p', '2024-02-15'),
(22, 8, 1, 'p', '2024-02-15'),
(24, 8, 3, 'ya gatau cuma mau ngetes wrap nya bisa atau ngga bwahaha \r\n', '2024-02-24'),
(25, 6, 1, 'y', '2024-02-28'),
(36, 8, 2, 'y', '2024-03-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `likefoto`
--

CREATE TABLE `likefoto` (
  `likeid` int(11) NOT NULL,
  `fotoid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tanggallike` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `likefoto`
--

INSERT INTO `likefoto` (`likeid`, `fotoid`, `userid`, `tanggallike`) VALUES
(30, 1, 2, '2024-02-07'),
(32, 7, 2, '2024-02-07'),
(35, 7, 1, '2024-02-11'),
(39, 1, 1, '2024-02-12'),
(40, 12, 1, '2024-02-24'),
(80, 8, 1, '2024-03-07'),
(93, 6, 1, '2024-03-08'),
(116, 8, 2, '2024-03-09'),
(127, 12, 2, '2024-03-09'),
(135, 6, 2, '2024-03-09'),
(155, 12, 3, '2024-03-16'),
(167, 8, 3, '2024-03-16'),
(173, 1, 3, '2024-03-16'),
(201, 6, 3, '2024-03-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `likekomen`
--

CREATE TABLE `likekomen` (
  `likekomenid` int(11) NOT NULL,
  `komentarid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tanggallikekomen` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `likekomen`
--

INSERT INTO `likekomen` (`likekomenid`, `komentarid`, `userid`, `tanggallikekomen`) VALUES
(3, 11, 1, '2024-02-13'),
(4, 10, 1, '2024-02-13'),
(6, 11, 2, '2024-02-15'),
(7, 12, 2, '2024-02-15'),
(14, 17, 3, '2024-02-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `namalengkap` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `email`, `namalengkap`, `alamat`) VALUES
(1, 'bibah', '12345', 'nuraisyafitri@gmail.com', 'Nurhabibah Aisyafitri', 'jln inpres'),
(2, 'Ibna', '123', 'ibna@gmail.com', 'ibna aini', 'jln'),
(3, 'syifa', '123', 'syifanabila@gmiail.com', 'Syifa Nabila', 'yo ndak tau');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `dislikefoto`
--
ALTER TABLE `dislikefoto`
  ADD PRIMARY KEY (`dislikeid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`fotoid`),
  ADD KEY `albumid` (`albumid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD PRIMARY KEY (`komentarid`),
  ADD KEY `fotoid` (`fotoid`),
  ADD KEY `userid` (`userid`);

--
-- Indeks untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`likeid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `fotoid` (`fotoid`);

--
-- Indeks untuk tabel `likekomen`
--
ALTER TABLE `likekomen`
  ADD PRIMARY KEY (`likekomenid`),
  ADD KEY `kometarid` (`komentarid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `komentarid` (`komentarid`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `albumid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `dislikefoto`
--
ALTER TABLE `dislikefoto`
  MODIFY `dislikeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `fotoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  MODIFY `komentarid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `likeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT untuk tabel `likekomen`
--
ALTER TABLE `likekomen`
  MODIFY `likekomenid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `dislikefoto`
--
ALTER TABLE `dislikefoto`
  ADD CONSTRAINT `dislikefoto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dislikefoto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`albumid`) REFERENCES `album` (`albumid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentarfoto`
--
ALTER TABLE `komentarfoto`
  ADD CONSTRAINT `komentarfoto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentarfoto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD CONSTRAINT `likefoto_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likefoto_ibfk_2` FOREIGN KEY (`fotoid`) REFERENCES `foto` (`fotoid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `likekomen`
--
ALTER TABLE `likekomen`
  ADD CONSTRAINT `likekomen_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likekomen_ibfk_2` FOREIGN KEY (`komentarid`) REFERENCES `komentarfoto` (`komentarid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
