-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Agu 2025 pada 20.35
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alproject`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2023_07_02_135152_create_cars_table', 1),
(18, '2023_07_02_135212_create_loans_table', 1),
(55, '2014_10_12_000000_create_users_table', 2),
(56, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(57, '2019_08_19_000000_create_failed_jobs_table', 2),
(58, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(59, '2023_07_11_145810_create_products_table', 2),
(60, '2023_07_11_145822_create_transaksis_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `nama`, `status`, `stok`, `harga`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Martens 1460 - Blacksmooth', 'Tidak Tersedia', 0, 2400000, 'images/product/Yv2SLhci7CCSfkUF0tGe9V0ln4iHyNqAuMmIl0CN.png', '2023-07-19 07:15:30', '2023-07-19 07:26:54'),
(2, 'Dr. Martens 1460 - Navy Smooth', 'Tersedia', 7, 2400000, 'images/product/DB6MrW2Q4SMQyasInyuyZawpyuQdb6qQiJA691li.png', '2023-07-19 07:18:36', '2024-02-26 22:38:14'),
(3, 'Dr. Martens 1460 - Burgundy Smooth', 'Tersedia', 8, 2500000, 'images/product/yrJyEjwj2owtLJ0tesnbB08h45NQ2Sx6rynkLX7w.png', '2023-07-19 07:19:08', '2023-07-19 14:38:22'),
(4, 'Dr. Martens 1460 - Cherry Red Smooth', 'Tersedia', 8, 2500000, 'images/product/O6ujSa7l3tABe3Y9sITZs02cdoBJyrk9WBBKSX7b.png', '2023-07-19 07:19:48', '2023-07-19 14:38:22'),
(5, 'Dr. Martens Jadon Boots - Cow Print', 'Tersedia', 3, 2900000, 'images/product/k1VeOuQTmK3fdPDwjSAjKssGvhM74lkxVWcOraa3.png', '2023-07-19 07:20:39', '2023-07-19 14:38:51'),
(6, 'Dr. Martens 1460 - Green Smooth', 'Tersedia', 7, 2400000, 'images/product/MZBUc1zKHInN3WRcHBwpFQduZCPJi69yiH9LSobW.png', '2023-07-19 07:21:45', '2023-07-19 14:39:30'),
(7, 'Dr. Martens 1460 - White Smooth', 'Tidak Tersedia', 0, 2600000, 'images/product/RG4O3ckppUA1rMvajFuoTb4Pankfy3AVxjTvwWXp.png', '2023-07-19 07:23:12', '2023-07-19 07:23:12'),
(8, 'Dr. Martens 1460 - Pink Smooth', 'Tidak Tersedia', 0, 2500000, 'images/product/zESzYfXtN9YXQvfM8Vfd0XQROb6rjhJ7FlzSuYJp.png', '2023-07-19 07:25:08', '2023-07-19 07:25:08'),
(9, 'Dr. Martens - Adrian Snaffle Cow Loafers', 'Tersedia', 2, 1600000, 'images/product/gaeRKx7uDVcL578pHvRixGuxSPsaFWqRO5pINT6k.png', '2023-07-19 07:28:45', '2023-07-19 14:39:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `notransaksi` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksis`
--

INSERT INTO `transaksis` (`id`, `notransaksi`, `product_id`, `qty`, `total_harga`, `created_at`, `updated_at`) VALUES
(1, '230719213822', 2, 2, 4800000, '2023-07-19 14:38:22', '2023-07-19 14:38:22'),
(2, '230719213822', 3, 2, 5000000, '2023-07-19 14:38:22', '2023-07-19 14:38:22'),
(3, '230719213822', 4, 2, 5000000, '2023-07-19 14:38:22', '2023-07-19 14:38:22'),
(4, '230719213851', 5, 2, 5800000, '2023-07-19 14:38:51', '2023-07-19 14:38:51'),
(5, '230719213851', 6, 2, 4800000, '2023-07-19 14:38:51', '2023-07-19 14:38:51'),
(6, '230719213851', 9, 2, 3200000, '2023-07-19 14:38:51', '2023-07-19 14:38:51'),
(7, '230719213930', 2, 1, 2400000, '2023-07-19 14:39:30', '2023-07-19 14:39:30'),
(8, '230719213930', 6, 1, 2400000, '2023-07-19 14:39:30', '2023-07-19 14:39:30'),
(9, '230719213930', 9, 1, 1600000, '2023-07-19 14:39:30', '2023-07-19 14:39:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Muhamad Al', 'mhmdal@gmail.com', NULL, '$2y$10$1Ncam1D0f4iE91u7VXEGkOrXb5C4sYShwsAZ14FN5nLu7ZwwIEc9W', 'images/users/XMIBgVhq1RWgZSYzSD2r6A1UvppLSaHRhRSLlYfc.jpg', NULL, '2023-07-18 23:07:11', '2023-07-19 06:50:54'),
(7, 'rindaaa', 'rindatiaraa28@gmail.com', NULL, '$2y$10$iITcf7m4gXO/uYYMUIGgleibX66N5KBvMdv1bE24g2MyZZpaO3cGG', NULL, NULL, '2024-12-18 22:58:21', '2024-12-18 22:58:21');

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
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
