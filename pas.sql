-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Okt 2024 pada 00.17
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `price` int(20) NOT NULL,
  `qty` int(20) NOT NULL,
  `itemCode` int(60) NOT NULL,
  `gambar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `product` varchar(500) NOT NULL,
  `total` int(50) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `method` varchar(50) NOT NULL,
  `cardNumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `history`
--

INSERT INTO `history` (`id`, `name`, `address`, `email`, `phone`, `product`, `total`, `message`, `method`, `cardNumber`) VALUES
(94, 'Dhea Febrianti', 'Bandung, Banjaran', 'dheafebrianti@gmail.com', '0832523325', 'Hibiscus rosa-sinensis x2<br>Chlorophytum Hipotus x4<br>', 650000, 'Thankyou.', 'Credit Card', '1212412125215115'),
(96, 'Daffa Ramadhan', 'Bandung, Banjaran', 'daffaramadhan929@gmail.com', '08320007078', 'Sansevieria trifasciata x3<br>Hydragea x3<br>Mandevilla x2<br>', 504000, '-', 'Credit Card', '7264872637462385'),
(102, 'Daffa Ramadhan', 'Bandung, Rancamanyar', 'daffaramadhan929@gmail.com', '081221049828', 'Hydragea x1<br>Adenium oleifolium x1<br>', 160000, 'werwer', 'Credit Card', 'rwr'),
(103, 'Daffa Ramadhan', 'Bandung, Rancamanyar', 'daffaramadhan929@gmail.com', '083532523325', 'Mandevilla x4<br>Chlorophytum Hipotus x5<br>', 788000, '-', 'Credit Card', '7635872657237952'),
(104, 'Faza MT', 'Jakarta Utara, Kebon Nanas', 'fazamuhammad@gmail.com', '08642835638', 'Mandevilla x3<br>Adenium oleifolium x4<br>Chlorophytum comosum x2<br>Hibiscus rosa-sinensis x1<br>', 821000, '-', 'Credit Card', '7236492364923692'),
(105, 'Ilyas Al Hafiz', 'Papua, Raja Ampat', 'ilyasaaaa@gmail.com', '084679356748', 'Hibiscus rosa-sinensis x1<br>Chlorophytum comosum x1<br>Hydragea x1<br>', 220000, '-', 'Credit Card', '-'),
(106, 'Freddryne Mosk', 'Russia, Moskow', 'fedddz@gmail.com', '62384628346', 'Chlorophytum Hipotus x10<br>', 1000000, '-', 'Credit Card', '7345634564295697'),
(107, 'Freddryne Mosk', 'Russia, Moskow', 'fedddz@gmail.com', '62384628346', 'Jhukut x1<br>', 30000, '-', 'Credit Card', '-');

-- --------------------------------------------------------

--
-- Struktur dari tabel `message`
--

CREATE TABLE `message` (
  `id` int(1) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `message`
--

INSERT INTO `message` (`id`, `fname`, `lname`, `email`, `message`) VALUES
(17, 'Dhea', 'Febrianti', 'dheafebrianti@gmail.com', 'Pengiriman sangat cepat!!\r\nmenyala abangkuh 🔥🔥🔥'),
(18, 'Daffa', 'Ramadhan', 'daffaramadhan929@gmail.com', 'tetap ilmu padi king!! 👑🔥'),
(19, 'Faza', 'MT', 'fazamuhammad@gmail.com', 'Arigatooo (*/ω＼*)'),
(23, 'Ilyas', 'Al Hafiz', 'ilyasaaaa@gmail.com', '⭐⭐⭐⭐⭐'),
(24, 'Fedrynne', 'Mosk', 'fedddz@gmail.com', '⭐⭐⭐⭐⭐');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(25) NOT NULL,
  `stock` int(25) NOT NULL,
  `itemCode` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `stock`, `itemCode`, `gambar`, `description`) VALUES
(10, 'Mandevilla', 72000, 67, 101, '66571d726daa1.png', 'Mandevilla Flower                                    '),
(11, 'Hydragea', 65000, 82, 102, '66571d9e01471.png', 'Hydragea Flower                                    '),
(12, 'Hibiscus rosa-sinensis', 85000, 87, 103, '6657269da67ba.png', 'Hibiscus rosa-sinensis Flower                                                                        '),
(14, 'Ficus lyrata', 45000, 89, 104, '66572b8773fa7.png', 'Ficus lyrata Flower                                    '),
(15, 'Sansevieria trifasciata', 55000, 93, 105, '6657462c0b877.png', 'Sansevieria trifasciata Flower                                    '),
(18, 'Chlorophytum comosum', 70000, 82, 106, '665bd0bf048cf.png', 'Chlorophytum comosum Flower                                                                        '),
(19, 'Adenium oleifolium', 95000, 81, 107, '665f30682920f.png', 'Adenium oleifolium Flower                                    '),
(20, 'Chlorophytum Hipotus', 100000, 61, 108, '6660286941a91.png', 'Chlorophytum Hipotus Flower                                                                                                                                                                                                                                                                                                                                                                                                                                                '),
(26, 'Jhukut', 30000, 99, 1009, '66628fe996c69.png', 'Jhukut Flower'),
(27, 'hgdhwbed', 300000, 100, 1010, '6662972c6eb3a.png', 'Flower');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `transaction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `transaction`) VALUES
(1, 'admin', 'admin123', 999),
(28, 'Dhea Febrianti', '$2y$10$9SuMAuB19vtl3drIukU2he8AMUMlagZh4f24LZkskhceVCXLvvzou', 1),
(29, 'Daffa Ramadhan', '$2y$10$4u0ReiJzv0WQe5TEK7OVAOD2RzNrvO11x8QD6R.05SSyfncdW5MIW', 3),
(34, 'Faza', '$2y$10$C4pJfoyjUNaHu9KDSe8Re.J05LGoAVlNQBaxuT9xkEUf0NgRsLuXe', 2),
(35, 'Ilyas', '$2y$10$7J8lNr2nMtrVhDd1sJLLeulZkzyIsV1yzxhMzdoSthbF2tXRD6JIO', 1),
(36, 'Fedryyne', '$2y$10$0llx.59ZC8f628eLGcUaP.e6nDhgg7IWDfpfgoA6EyJC4m/FMxukW', 1),
(38, 'Daff', '$2y$10$TEXDs7rUXqvqBfU3umythu5oMXs7i/yT4afCKfQbTRO2Vd9Tj7HJK', 0),
(39, 'x', '$2y$10$skDqPX.sG48c.Gx.kszYbuHk4Asm9iyoSahXb/vOQ3sICLOOlHaN.', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT untuk tabel `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT untuk tabel `message`
--
ALTER TABLE `message`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
