-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jan 2024 pada 09.29
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `komahas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `catering`
--

CREATE TABLE `catering` (
  `ID_CATERING` char(15) NOT NULL,
  `NAMA_MENU` varchar(150) NOT NULL,
  `KATEGORI` enum('AYAM','SEAFOOD','SAPI','STEAK','KAMBING') NOT NULL,
  `DESKRIPSI` text NOT NULL,
  `HARGA` int(11) NOT NULL,
  `GAMBAR` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `catering`
--

INSERT INTO `catering` (`ID_CATERING`, `NAMA_MENU`, `KATEGORI`, `DESKRIPSI`, `HARGA`, `GAMBAR`) VALUES
('CTR-CWX36NRPIKU', 'NASI KEBULI AYAM', 'AYAM', 'Isi dalam box berupa Nasi, Ayam Goreng, Sambal, Lalapan, Acar|Harga untuk per 1 kotak/box|Pemesanan minimal H-1', 23000, '16894329621689432962_aaf4ab70ba7293502591.jpg'),
('CTR-VAP183CD5MA', 'DAGING SAPI LADA HITAM', 'SAPI', 'Isi dalam box berupa Nasi, Sapi Panggang, Sambal, Lalapan, Acar, Jamur Crispi|Harga untuk per 1 kotak/box|Pemesanan minimal H-1', 35000, '16894330431689433043_70b214649828d91de937.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cleaning_service`
--

CREATE TABLE `cleaning_service` (
  `ID_CLEANING_SERVICE` char(15) NOT NULL,
  `NAMA_SERVICE` varchar(100) NOT NULL,
  `DURASI` varchar(15) NOT NULL,
  `HARGA` int(11) NOT NULL,
  `DESKRIPSI` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `cleaning_service`
--

INSERT INTO `cleaning_service` (`ID_CLEANING_SERVICE`, `NAMA_SERVICE`, `DURASI`, `HARGA`, `DESKRIPSI`) VALUES
('CSS-HGMZCWSOY6U', 'PAKET 1 JAM INCLUDE PERALATAN', '1', 55000, 'Pemesan tidak perlu menyiapkan peralatan kerja|Peralatan yang disediakan meliputi sapu lantai, alat pel, kain pel, sabun pembersih, kemucing|Area yang dibersihkan meliputi menyapu lantai, dan membersihkan kamar mandi'),
('CSS-UVQM7GKW2DX', 'PAKET 1 JAM TANPA PERALATAN', '1', 45000, 'Pemesan harus menyiapkan keperluan untuk kebersihan|Peralatan yang dibutuhkan meliputi sapu lantai, alat pel, kain pel, sabun pembersih, kemucing|Area yang dibersihkan meliputi menyapu lantai, dan membersihkan kamar mandi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kost`
--

CREATE TABLE `kost` (
  `ID_KOST` char(15) NOT NULL,
  `FASILITAS` text NOT NULL,
  `HARGA` int(11) NOT NULL,
  `JENIS_KOST` enum('PUTRA','PUTRI') NOT NULL,
  `NAMA_KOST` varchar(150) NOT NULL,
  `AREA` enum('KLOJEN','LOWOKWARU','SUKUN','BLIMBING') NOT NULL,
  `PERIODE` enum('HARI','MINGGU','BULAN','TAHUN') NOT NULL,
  `GAMBAR` text NOT NULL,
  `REKOMENDASI` enum('YA','TIDAK') NOT NULL DEFAULT 'TIDAK',
  `TERSEDIA` int(11) NOT NULL DEFAULT 0,
  `ALAMAT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kost`
--

INSERT INTO `kost` (`ID_KOST`, `FASILITAS`, `HARGA`, `JENIS_KOST`, `NAMA_KOST`, `AREA`, `PERIODE`, `GAMBAR`, `REKOMENDASI`, `TERSEDIA`, `ALAMAT`) VALUES
('KST-DRLLERVWYQ3', 'Dekat dengan UB, UM, Polinema|Kamar mandi dalam|Terdapat shower', 8500000, 'PUTRA', 'KOST PAK HARTONO', 'KLOJEN', 'TAHUN', '16894229601689422960_2de1985494fbaceaab96.jpg', 'YA', 10, 'Jl. Terusan Surabaya, No. 32'),
('KST-HBFBZPMIW0S', 'Dekat dengan UB, UM, Polinema|Kamar mandi dalam|Terdapat shower', 700000, 'PUTRA', 'KOST PAK BUDI', 'SUKUN', 'BULAN', '16894231011689423101_9de2532b7f5b5c3a5871.webp', 'YA', 11, 'Jl. Teluk Mandar, No. 43'),
('KST-IAKQGTHP1DV', 'Dekat dengan UB, UM, Polinema|Kamar mandi dalam|Terdapat shower', 900000, 'PUTRI', 'KOST IBU MARIAH', 'LOWOKWARU', 'BULAN', '16894230531689423053_133073f876d4e4554895.jpg', 'YA', 1, 'Jl. Candi Panggung Indah, No. 49'),
('KST-IDTQQSB2Z7K', 'Dekat dengan UB, UM, Polinema|Kamar mandi dalam|Terdapat shower|AC dalam kamar', 950000, 'PUTRA', 'KOST HAJI SAID', 'KLOJEN', 'BULAN', '16894232351689423235_a0e8fb03c48b956dda86.jpg', 'TIDAK', 3, 'Jl. Surabaya, No. 50, Belakang UM'),
('KST-WF9J3GQA7IW', 'Dekat dengan UB, UM, Polinema|Kamar mandi dalam|Terdapat shower', 350000, 'PUTRI', 'KOST SIDOMORO', 'LOWOKWARU', 'MINGGU', '16894231881689423188_1ffe48efb20a004f2157.jpg', 'YA', 5, 'Jl. Terusan Soekarno Hatta, No. 56'),
('KST-WN97PXYKLF5', 'Dekat dengan UB, UM, Polinema|Kamar mandi dalam|Terdapat shower', 95000, 'PUTRI', 'KOST DAMAI', 'BLIMBING', 'HARI', '16894231431689423143_f3be2dd3e153e259aa72.webp', 'YA', 6, 'Jl. Danau Toba, No.33'),
('KST-WPLGJ9ZOURF', 'Dekat dengan UB, UM, Polinema|Kamar mandi dalam|Terdapat shower', 6500000, 'PUTRI', 'KOST IBU MELANIS', 'KLOJEN', 'TAHUN', '16894207591689420759_fc853d4857e2eb4e0d09.jpg', 'YA', 15, 'Jl. Candi panggung indah, No.32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laundry`
--

CREATE TABLE `laundry` (
  `ID_LAUNDRY` char(15) NOT NULL,
  `NAMA_PAKET` varchar(150) NOT NULL,
  `DESKRIPSI` text NOT NULL,
  `HARGA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `laundry`
--

INSERT INTO `laundry` (`ID_LAUNDRY`, `NAMA_PAKET`, `DESKRIPSI`, `HARGA`) VALUES
('LRY-DRLLERVWYQ3', 'PAKET 2', 'Cuci Kering Saja|Berat dibawah 2Kg', 12000),
('LRY-X5UDSCNOAYT', 'PAKET 3', 'Cuci Kering|Setrika|Berat dibawah 2Kg', 18000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paygatelog`
--

CREATE TABLE `paygatelog` (
  `pglid` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `mode` varchar(10) NOT NULL,
  `ID_TRANSAKSI` char(20) NOT NULL,
  `status` varchar(100) NOT NULL,
  `time` datetime NOT NULL,
  `data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_catering`
--

CREATE TABLE `transaksi_catering` (
  `ID_TRANSAKSI` char(20) NOT NULL,
  `ID_CATERING` char(15) NOT NULL,
  `ID_USER` char(10) NOT NULL,
  `BANK_PEMBAYARAN` enum('BRI','BNI','MANDIRI','BCA','DURIANPAY') NOT NULL,
  `TANGGAL_PENGIRIMAN` date NOT NULL,
  `WAKTU_PENGIRIMAN` time NOT NULL,
  `QUANTITY` int(11) NOT NULL,
  `TOTAL` int(11) NOT NULL,
  `BUKTI_PEMBAYARAN` text DEFAULT NULL,
  `STATUS_PEMBAYARAN` enum('BELUM BAYAR','MENUNGGU KONFIRMASI','DIKONFIRMASI','KONFIRMASI DITOLAK') NOT NULL DEFAULT 'BELUM BAYAR',
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi_catering`
--

INSERT INTO `transaksi_catering` (`ID_TRANSAKSI`, `ID_CATERING`, `ID_USER`, `BANK_PEMBAYARAN`, `TANGGAL_PENGIRIMAN`, `WAKTU_PENGIRIMAN`, `QUANTITY`, `TOTAL`, `BUKTI_PEMBAYARAN`, `STATUS_PEMBAYARAN`, `CREATED_AT`) VALUES
('TRX-QOMCSO9RTXMALXLH', 'CTR-VAP183CD5MA', 'U-YDIBSGOA', 'MANDIRI', '2023-07-18', '08:00:00', 1, 35000, NULL, 'BELUM BAYAR', '2023-07-18 07:24:44'),
('TRX-SXQF4NVCLXRHBQTT', 'CTR-CWX36NRPIKU', 'U-YDIBSGOA', 'BCA', '2023-07-20', '00:00:00', 8, 184000, '16896052321689605232_2661c4672ab22ba6f633.jpg', 'DIKONFIRMASI', '2023-07-17 14:27:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_cs`
--

CREATE TABLE `transaksi_cs` (
  `ID_TRANSAKSI` char(20) NOT NULL,
  `ID_CLEANING_SERVICE` char(15) NOT NULL,
  `ID_USER` char(10) NOT NULL,
  `BANK_PEMBAYARAN` enum('BRI','BNI','MANDIRI','BCA','DURIANPAY') NOT NULL,
  `TANGGAL_BOOKING` date NOT NULL,
  `WAKTU_BOOKING` time NOT NULL,
  `TOTAL` int(11) NOT NULL,
  `BUKTI_PEMBAYARAN` text DEFAULT NULL,
  `STATUS_PEMBAYARAN` enum('BELUM BAYAR','MENUNGGU KONFIRMASI','DIKONFIRMASI','KONFIRMASI DITOLAK') NOT NULL DEFAULT 'BELUM BAYAR',
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi_cs`
--

INSERT INTO `transaksi_cs` (`ID_TRANSAKSI`, `ID_CLEANING_SERVICE`, `ID_USER`, `BANK_PEMBAYARAN`, `TANGGAL_BOOKING`, `WAKTU_BOOKING`, `TOTAL`, `BUKTI_PEMBAYARAN`, `STATUS_PEMBAYARAN`, `CREATED_AT`) VALUES
('TRX-SC0GT3UCIQ7VLNFU', 'CSS-UVQM7GKW2DX', 'U-YDIBSGOA', 'MANDIRI', '2023-07-18', '08:00:00', 45000, '16896671311689667131_6d69b033957f8992f4e5.jpg', 'DIKONFIRMASI', '2023-07-18 07:51:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_kost`
--

CREATE TABLE `transaksi_kost` (
  `ID_TRANSAKSI` char(20) NOT NULL,
  `ID_KOST` char(15) NOT NULL,
  `ID_USER` char(10) NOT NULL,
  `TANGGAL_AWAL_MASUK` date NOT NULL,
  `TOTAL` int(11) NOT NULL,
  `BANK_PEMBAYARAN` enum('BRI','BNI','MANDIRI','BCA','DURIANPAY') NOT NULL,
  `BUKTI_PEMBAYARAN` text DEFAULT NULL,
  `STATUS_PEMBAYARAN` enum('BELUM BAYAR','MENUNGGU KONFIRMASI','DIKONFIRMASI','KONFIRMASI DITOLAK') NOT NULL DEFAULT 'BELUM BAYAR',
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi_kost`
--

INSERT INTO `transaksi_kost` (`ID_TRANSAKSI`, `ID_KOST`, `ID_USER`, `TANGGAL_AWAL_MASUK`, `TOTAL`, `BANK_PEMBAYARAN`, `BUKTI_PEMBAYARAN`, `STATUS_PEMBAYARAN`, `CREATED_AT`) VALUES
('TRX-EH5VRANLJMEJIBB3', 'KST-IAKQGTHP1DV', 'U-YDIBSGOA', '2023-07-17', 900000, 'BRI', '16895831991689583199_10e33d5a7ecd8b23a425.png', 'KONFIRMASI DITOLAK', '2023-07-17 08:16:33'),
('TRX-GHZQ6NTRFJ8SDAYI', 'KST-HBFBZPMIW0S', 'U-YDIBSGOA', '2023-12-20', 700000, 'MANDIRI', NULL, 'BELUM BAYAR', '2023-12-20 12:24:09'),
('TRX-OQNDF5GFEQSZOB2U', 'KST-IAKQGTHP1DV', 'U-YDIBSGOA', '2023-07-17', 900000, 'BRI', '16895933361689593336_7bd7420cb073b96c9bad.jpg', 'DIKONFIRMASI', '2023-07-17 06:59:59'),
('TRX-RAY25UXFYNVUISWS', 'KST-WF9J3GQA7IW', 'U-YDIBSGOA', '2023-12-21', 350000, 'DURIANPAY', '{\"event\":\"payment.completed\",\"data\":{\"amount\":35000000,\"amount_str\":\"350000.00\",\"created_at\":\"2023-12-21T08:59:04.442357Z\",\"currency\":\"IDR\",\"customer_id\":\"cus_CXD8TxA1jt4853\",\"customer_name\":\"Rizky abdillah\",\"failure_reason\":{},\"id\":\"pay_O3OxzwWEBD0619\",\"is_live\":false,\"merchant_id\":\"mer_PiuM9IV5LS7707\",\"metadata\":{},\"order_id\":\"ord_jiEc4RLP435355\",\"order_ref_id\":\"TRX-RAY25UXFYNVUISWS\",\"payment_method\":\"JENIUSPAY\",\"payment_ref_id\":\"\",\"signature\":\"7882eaa77ea3d12b0cc064e1fc3672728b3c415f83c86690e9ea4775216516d6\",\"updated_at\":\"2023-12-21T08:59:13.436674Z\"},\"retry_count\":6}', 'DIKONFIRMASI', '2023-12-21 08:57:04'),
('TRX-SPLBMIR6GVYWX0Q8', 'KST-IDTQQSB2Z7K', 'U-GK3PFD1U', '2024-01-08', 950000, 'DURIANPAY', NULL, 'BELUM BAYAR', '2024-01-08 15:52:41'),
('TRX-TKMLUBIUJXD6Z5NF', 'KST-WF9J3GQA7IW', 'U-YDIBSGOA', '2023-12-21', 350000, 'DURIANPAY', '{\"event\":\"payment.completed\",\"data\":{\"amount\":35000000,\"amount_str\":\"350000.00\",\"created_at\":\"2023-12-21T09:00:02.983159Z\",\"currency\":\"IDR\",\"customer_id\":\"cus_oXUPEVYJeT8054\",\"customer_name\":\"Rizky abdillah\",\"failure_reason\":{},\"id\":\"pay_V6OlwWiE6o6402\",\"is_live\":false,\"merchant_id\":\"mer_PiuM9IV5LS7707\",\"metadata\":{},\"order_id\":\"ord_JYP7o7VU6D9097\",\"order_ref_id\":\"TRX-TKMLUBIUJXD6Z5NF\",\"payment_method\":\"DANA\",\"payment_ref_id\":\"\",\"signature\":\"5acde416687d68ab80795a782cb8a84522198481e11325c209edc544940289a5\",\"updated_at\":\"2023-12-21T09:00:12.771209Z\"},\"retry_count\":6}', 'DIKONFIRMASI', '2023-12-21 08:53:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_laundry`
--

CREATE TABLE `transaksi_laundry` (
  `ID_TRANSAKSI` char(20) NOT NULL,
  `ID_LAUNDRY` char(15) NOT NULL,
  `ID_USER` char(10) NOT NULL,
  `BANK_PEMBAYARAN` enum('BRI','BNI','MANDIRI','BCA','DURIANPAY') NOT NULL,
  `TOTAL` int(11) NOT NULL,
  `BUKTI_PEMBAYARAN` text DEFAULT NULL,
  `STATUS_PEMBAYARAN` enum('BELUM BAYAR','MENUNGGU KONFIRMASI','DIKONFIRMASI','KONFIRMASI DITOLAK') NOT NULL DEFAULT 'BELUM BAYAR',
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi_laundry`
--

INSERT INTO `transaksi_laundry` (`ID_TRANSAKSI`, `ID_LAUNDRY`, `ID_USER`, `BANK_PEMBAYARAN`, `TOTAL`, `BUKTI_PEMBAYARAN`, `STATUS_PEMBAYARAN`, `CREATED_AT`) VALUES
('TRX-B8FOUXA2PMTX1KJD', 'LRY-X5UDSCNOAYT', 'U-YDIBSGOA', 'BRI', 18000, NULL, 'BELUM BAYAR', '2023-12-21 04:59:43'),
('TRX-NDCSRKNXXPUOJ7W9', 'LRY-X5UDSCNOAYT', 'U-YDIBSGOA', 'DURIANPAY', 18000, NULL, 'BELUM BAYAR', '2023-12-21 18:35:44'),
('TRX-QOBFTSMTU4VJCXB7', 'LRY-X5UDSCNOAYT', 'U-YDIBSGOA', 'DURIANPAY', 18000, NULL, 'DIKONFIRMASI', '2023-12-21 06:53:07'),
('TRX-U5XCEOP14LUIYVXK', 'LRY-X5UDSCNOAYT', 'U-YDIBSGOA', 'DURIANPAY', 18000, NULL, 'BELUM BAYAR', '2023-12-21 18:33:08'),
('TRX-WPK3SRQ7QWJBRCOI', 'LRY-DRLLERVWYQ3', 'U-YDIBSGOA', 'MANDIRI', 10000, '17031265051703126505_8959facc20e9a465cab8.png', 'KONFIRMASI DITOLAK', '2023-12-21 02:34:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `ID_USER` char(10) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `LEVEL` enum('USER','ADMIN') NOT NULL,
  `NAMA_LENGKAP` varchar(150) NOT NULL,
  `JENIS_KELAMIN` enum('LAKI-LAKI','PEREMPUAN') NOT NULL,
  `TELEPON` char(13) NOT NULL,
  `ALAMAT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`ID_USER`, `EMAIL`, `USERNAME`, `PASSWORD`, `LEVEL`, `NAMA_LENGKAP`, `JENIS_KELAMIN`, `TELEPON`, `ALAMAT`) VALUES
('U-00001111', '-', 'ADMIN', 'ADMIN', 'ADMIN', 'ADMINISTRATOR', 'LAKI-LAKI', '000', '-'),
('U-CL8NQOHO', 'admin@ngx.my.id', 'DARKWIRELESS', 'asdasdasd', 'USER', 'NGX', 'LAKI-LAKI', '085156858101', 'Jl. Pisang Agung III No.4, Pisang Candi, Sukun'),
('U-EBDW8SR4', '181221010@mhs.stiki.ac.id', 'RONI', 'qwerty', 'USER', 'RHONNY SAPUTRA', 'LAKI-LAKI', '3024329', 'mojokerto'),
('U-GK3PFD1U', '181221010@mhs.stiki.ac.id', 'ADIS', 'qwerty', 'USER', 'ADIS', 'PEREMPUAN', '21343', 'mojokerto'),
('U-YDIBSGOA', 'rizkyaks@gmail.com', 'RIZKY12', 'qwe', 'USER', 'RIZKY ABDILLAH', 'LAKI-LAKI', '089521130005', 'Jl. Terusan Surabaya, Klojen');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `catering`
--
ALTER TABLE `catering`
  ADD PRIMARY KEY (`ID_CATERING`);

--
-- Indeks untuk tabel `cleaning_service`
--
ALTER TABLE `cleaning_service`
  ADD PRIMARY KEY (`ID_CLEANING_SERVICE`);

--
-- Indeks untuk tabel `kost`
--
ALTER TABLE `kost`
  ADD PRIMARY KEY (`ID_KOST`);

--
-- Indeks untuk tabel `laundry`
--
ALTER TABLE `laundry`
  ADD PRIMARY KEY (`ID_LAUNDRY`);

--
-- Indeks untuk tabel `paygatelog`
--
ALTER TABLE `paygatelog`
  ADD PRIMARY KEY (`pglid`);

--
-- Indeks untuk tabel `transaksi_catering`
--
ALTER TABLE `transaksi_catering`
  ADD PRIMARY KEY (`ID_TRANSAKSI`);

--
-- Indeks untuk tabel `transaksi_cs`
--
ALTER TABLE `transaksi_cs`
  ADD PRIMARY KEY (`ID_TRANSAKSI`);

--
-- Indeks untuk tabel `transaksi_kost`
--
ALTER TABLE `transaksi_kost`
  ADD PRIMARY KEY (`ID_TRANSAKSI`);

--
-- Indeks untuk tabel `transaksi_laundry`
--
ALTER TABLE `transaksi_laundry`
  ADD PRIMARY KEY (`ID_TRANSAKSI`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `paygatelog`
--
ALTER TABLE `paygatelog`
  MODIFY `pglid` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
