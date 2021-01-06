-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jan 2021 pada 21.21
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_buku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `nama_lengkap` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'rahaganteng', 'pakebanget', 'rahagantengbanget');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(100) DEFAULT NULL,
  `penulis_buku` varchar(100) DEFAULT NULL,
  `penerbit_buku` varchar(100) DEFAULT NULL,
  `tahun` date DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `foto_buku` varchar(100) NOT NULL,
  `harga_buku` int(11) NOT NULL,
  `sinopsis_buku` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `penulis_buku`, `penerbit_buku`, `tahun`, `genre`, `foto_buku`, `harga_buku`, `sinopsis_buku`) VALUES
(5, 'AKU TERLANJUR', 'CINTA KEPADAMU', 'DAN TELAH KUBERIKAN', '2000-10-30', 'SELURUH HATIKU', '132033499_241037497393694_6263766216181779112_o.jpg', 100000, 'TAPI MENGAPA BARU KALI INI KAU PERTANYAAKAN, KARENA SEKALI CINTA AKU TETAP CINTA'),
(7, 'Raha sang pahlawan', 'DUCATI', 'Raha Co.', '2000-05-22', 'Tidak ada genre', '132265328_241037527393691_6471376826591663752_o.jpg', 120000, 'Menceritakan seorang pria yang ganteng'),
(9, 'IN THE END OF THE WORLD', 'ih dagatau', 'DAN TELAH KUBERIKAN', '1995-05-05', 'ih dakamumah', 'lalor.jpg', 375123, 'ADUHADUHADUH'),
(10, 'wadidaw wassap', 'AWEASDAWDAWD', 'GATAU', '1995-01-05', 'Tidak ada genre', 'unnamed.jpg', 123321, 'anehdeh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `kota`, `tarif`) VALUES
(1, 'Bandung', 10000),
(2, 'Madagaskar', 500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) DEFAULT NULL,
  `password_pelanggan` varchar(100) DEFAULT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `telepon_pelanggan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`) VALUES
(1, 'rahaganteng@gmail.com', 'apatuh', 'Rahabanget', '082316548795'),
(2, 'kamusiapa@gmail.com', 'apacik', 'aku juga gatau aku siapa', '02215687452');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tarif` int(11) NOT NULL,
  `tanggal_pembelian` date DEFAULT NULL,
  `total_pembelian` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tarif`, `tanggal_pembelian`, `total_pembelian`) VALUES
(1, 1, 1, 0, '2020-12-24', 150000),
(2, 1, 2, 0, '2021-01-07', 150000),
(3, 1, 2, 0, '2021-01-06', 475623),
(4, 1, 1, 0, '2021-01-06', 485123),
(5, 1, 1, 0, '2021-01-06', 485123),
(6, 1, 2, 0, '2021-01-07', 100500),
(7, 1, 1, 10000, '2021-01-07', 605123);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_buku`
--

CREATE TABLE `pembelian_buku` (
  `id_pembelian_buku` int(11) NOT NULL,
  `id_pembelian` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `jumlah_pembelian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian_buku`
--

INSERT INTO `pembelian_buku` (`id_pembelian_buku`, `id_pembelian`, `id_buku`, `jumlah_pembelian`) VALUES
(1, 1, 7, 1),
(2, 4, 9, 1),
(3, 4, 5, 1),
(4, 5, 9, 1),
(5, 5, 5, 1),
(6, 6, 5, 1),
(7, 7, 7, 1),
(8, 7, 5, 1),
(9, 7, 9, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pembelian_buku`
--
ALTER TABLE `pembelian_buku`
  ADD PRIMARY KEY (`id_pembelian_buku`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `pembelian_buku`
--
ALTER TABLE `pembelian_buku`
  MODIFY `id_pembelian_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
