-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2021 pada 02.47
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_baju`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'pria'),
(2, 'wanita'),
(3, 'anak-anak'),
(4, 'couple'),
(5, 'aksesoris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `id_user` int(11) NOT NULL,
  `id_produk` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`id_user`, `id_produk`, `nama_produk`, `total`, `jumlah`, `created_at`, `updated_at`) VALUES
(6, 'cp001', 'Kaos Couple Valentine', 370000, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` bigint(20) UNSIGNED NOT NULL,
  `kurir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(100, '2014_10_12_000000_create_users_table', 1),
(101, '2014_10_12_100000_create_password_resets_table', 1),
(102, '2019_08_19_000000_create_failed_jobs_table', 1),
(103, '2021_05_29_114131_create_kategori', 1),
(104, '2021_05_29_114143_create_keranjang', 1),
(105, '2021_05_29_114159_create_produk', 1),
(106, '2021_05_29_114240_create_transaksi', 1),
(107, '2021_05_29_114259_create_kurir', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ukuran` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama`, `file`, `keterangan`, `ukuran`, `kategori`, `harga`, `stok`, `created_at`, `updated_at`) VALUES
('acc001', 'Kalung Pedang Kiritod', '951428_bf11030d-b0ff-4096-8e64-77421f119d7a_581_581.jpg', 'Bahan Aluminium', 'none', 'aksesoris', 25000, 52, NULL, NULL),
('an001', 'Baju kaos Anak Seri Wibu Limited Edition', '9331994_204d7c1b-771e-499b-9859-38c2c04f881f.jpg', 'Bahan kain katun', 'S', 'anak-anak', 200000, 9, NULL, NULL),
('cp001', 'Kaos Couple Valentine', '3135408_d498253b-9814-41c2-a727-71135b5b25ff_1024_768.jpg', 'Bahan kain katun', 'L', 'couple', 74000, 176, NULL, NULL),
('pr001', 'Erigo T-Shirt Japan Mask Navy ', '7cd1a3be-bf15-4be3-9738-1cf570fe7d14.jpg', 'Bahan kain katun', 'L', 'pria', 50000, 256, NULL, NULL),
('pr002', 'Baju Kaos T-Shirt Distro Saves World Edition', '1622450874_30ac9951-9dbf-47ff-b6f0-258292e8d440.jpg', 'BIRU t- shirt terbuat dari bahan Premium combed kualitas terbaik yang sejuk dan lembut. nyaman dipakai pria dan wanita, design Exclusive, Inspiring & Fashionable.', 'M', 'pria', 80000, 50, '2021-05-31 01:47:54', '2021-05-31 01:47:54'),
('wn001', 'Chamele - Kemeja Kantor Polos Basic Lengan Panjang', '7095752_9a588c55-6fc2-4ffa-8b5f-478cd62ad6c4_2048_2048.jpg', 'Bahan Kain Denim', 'M', 'wanita', 100000, 200, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` bigint(20) UNSIGNED NOT NULL,
  `id_keranjang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_produk` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `bukti_bayar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_keranjang`, `id_produk`, `id_user`, `nama`, `jumlah`, `harga`, `tanggal`, `tanggal_selesai`, `bukti_bayar`, `status`, `created_at`, `updated_at`) VALUES
(3, 'INV-7008', 'cp001', 2, 'Kaos Couple Valentine', 1, 74000, '2021-06-06', '2021-06-06', NULL, 'Selesai', NULL, NULL),
(4, 'INV-7008', 'wn001', 2, 'Chamele - Kemeja Kantor P', 2, 200000, '2021-06-06', '2021-06-06', NULL, 'Selesai', NULL, NULL),
(5, 'INV-4796', 'acc001', 2, 'Kalung Pedang Kiritod', 1, 25000, '2021-06-06', '2021-06-06', NULL, 'Selesai', NULL, NULL),
(6, 'INV-5580', 'acc001', 2, 'Kalung Pedang Kiritod', 2, 50000, '2021-06-06', '2021-06-06', NULL, 'Selesai', NULL, NULL),
(7, 'INV-8333', 'acc001', 2, 'Kalung Pedang Kiritod', 2, 50000, '2021-06-06', '2021-06-06', NULL, 'Selesai', NULL, NULL),
(8, 'INV-8071', 'acc001', 2, 'Kalung Pedang Kiritod', 2, 50000, '2021-06-06', '2021-06-06', NULL, 'Selesai', NULL, NULL),
(9, 'INV-0784', 'pr002', 2, 'Baju Kaos T-Shirt Distro ', 2, 160000, '2021-06-07', '2021-06-07', NULL, 'Selesai', NULL, NULL),
(10, 'INV-7814', 'an001', 2, 'Baju kaos Anak Seri Wibu ', 3, 600000, '2021-06-07', '2021-06-07', NULL, 'Selesai', NULL, NULL),
(11, 'INV-8216', 'acc001', 2, 'Kalung Pedang Kiritod', 1, 25000, '2021-06-12', '2021-06-12', '1623478508_screenshot_20190703-084649719_15669775598255812370-492x1024.jpg', 'Selesai', NULL, NULL),
(13, 'INV-3139', 'cp001', 2, 'Kaos Couple Valentine', 2, 148000, '2021-06-21', NULL, '1624246765_screenshot_20190703-084649719_15669775598255812370-492x1024.jpg', 'Diproses', NULL, NULL),
(14, 'INV-5481', 'acc001', 2, 'Kalung Pedang Kiritod', 1, 25000, '2021-06-21', NULL, '1624251166_screenshot_20190703-084649719_15669775598255812370-492x1024.jpg', 'Diproses', NULL, NULL),
(15, 'INV-2029', 'acc001', 6, 'Kalung Pedang Kiritod', 1, 25000, '2021-06-25', '2021-06-25', '1624627823_Untitled-1.png', 'Selesai', NULL, NULL),
(16, 'INV-2850', 'pr002', 6, 'Baju Kaos T-Shirt Distro ', 1, 80000, '2021-06-26', NULL, '1624719436_Baju___Kaos_Distro_Murah_Kata___Kata_Lucu_dan_Keren__Bejo__K.jpg', 'Dikirim', NULL, NULL),
(17, 'INV-2850', 'acc001', 6, 'Kalung Pedang Kiritod', 1, 25000, '2021-06-26', NULL, '1624719436_Baju___Kaos_Distro_Murah_Kata___Kata_Lucu_dan_Keren__Bejo__K.jpg', 'Dikirim', NULL, NULL),
(18, 'INV-5728', 'an001', 6, 'Baju kaos Anak Seri Wibu ', 1, 200000, '2021-06-26', NULL, '1624719922_WhatsApp Image 2021-06-24 at 20.52.41.jpeg', 'Diproses', NULL, NULL),
(19, 'INV-8707', 'acc001', 6, 'Kalung Pedang Kiritod', 1, 25000, '2021-06-26', NULL, '1624720125_download (4).jpg', 'Diproses', NULL, NULL),
(20, 'INV-6386', 'pr001', 7, 'Erigo T-Shirt Japan Mask ', 1, 50000, '2021-06-27', NULL, '1624799292_screenshot_20190703-084649719_15669775598255812370-492x1024.jpg', 'Diproses', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `username`, `email`, `alamat`, `no_telp`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin', 'admin@admin.com', 'Surabaya', '08672134123', NULL, '$2y$10$OGNGNINMbiSyPQPKVrQ0quptMz8Y0ciwKdYgueL5zdHpR8Y.bdkYS', NULL, NULL, NULL),
(2, 'Febriansyah Dwi kurnia Wicaksono', 'user', 'febriansyah', 'febrian@gmail.com', 'surabaya', '0895631834618', NULL, '$2y$10$0pQSFT9KTmbVKKD3M4anVu1UrZm1FFh3GuNVpeJC1dX0ahUcioyWe', NULL, NULL, '2021-06-06 01:59:18'),
(6, 'ququh', 'user', 'ququh', 'ququh@gmail.com', 'lamongan', NULL, NULL, '$2y$10$Pa7Zn0QCul0E22g9JFGf0eqMltV2DZtZTjOMr3.K0k05bIN.P/nzS', NULL, '2021-05-31 21:47:01', '2021-05-31 21:47:01'),
(7, 'user', 'user', 'user', 'user@user.com', 'Sidoarjo', NULL, NULL, '$2y$10$vbA3QoFDNmj/ryoqIek/P.DSh1yDzaca4yBs3e.CKUPgAMGtI4.Fq', NULL, '2021-06-27 05:50:45', '2021-06-27 05:50:45');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD UNIQUE KEY `produk_id_produk_unique` (`id_produk`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id_kurir` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
