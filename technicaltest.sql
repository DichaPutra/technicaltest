-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Nov 2021 pada 13.34
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `technicaltest`
--

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2021_11_13_003044_create_orderlist_table', 1),
(4, '2021_11_13_003111_create_product_table', 1),
(5, '2021_11_13_003112_create_orderentry_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderentry`
--

CREATE TABLE `orderentry` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_orderlist` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `orderid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitprice` decimal(12,0) NOT NULL,
  `qty` decimal(12,0) NOT NULL,
  `subtotal` decimal(12,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orderentry`
--

INSERT INTO `orderentry` (`id`, `id_orderlist`, `id_product`, `orderid`, `productname`, `unitprice`, `qty`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '2021110001', 'Roma Biscuit Kelapa', '6500', '3', '19500', '2021-11-13 05:14:39', '2021-11-13 05:14:39'),
(2, 1, 8, '2021110001', 'Monde Butter Cookies', '120000', '2', '240000', '2021-11-13 05:14:43', '2021-11-13 05:14:43'),
(3, 1, 7, '2021110001', 'Monde Favourite', '60000', '3', '180000', '2021-11-13 05:14:47', '2021-11-13 05:14:47'),
(4, 2, 7, '2021110002', 'Monde Favourite', '60000', '3', '180000', '2021-11-13 05:15:19', '2021-11-13 05:15:19'),
(5, 2, 8, '2021110002', 'Monde Butter Cookies', '120000', '2', '240000', '2021-11-13 05:15:26', '2021-11-13 05:15:26'),
(6, 3, 1, '2021110003', 'Leo Kripik Kentang', '1000', '10', '10000', '2021-11-13 05:15:58', '2021-11-13 05:15:58'),
(7, 3, 2, '2021110003', 'Piattoz Sapi Panggang', '1000', '3', '3000', '2021-11-13 05:16:04', '2021-11-13 05:16:04'),
(8, 3, 3, '2021110003', 'Twistiko Balado', '1000', '4', '4000', '2021-11-13 05:16:10', '2021-11-13 05:16:10'),
(9, 3, 6, '2021110003', 'Malkist Crackers', '5000', '3', '15000', '2021-11-13 05:16:15', '2021-11-13 05:16:15'),
(10, 4, 5, '2021110004', 'Malkist Abon Sapi', '5000', '3', '15000', '2021-11-13 05:16:45', '2021-11-13 05:16:45'),
(11, 4, 6, '2021110004', 'Malkist Crackers', '5000', '4', '20000', '2021-11-13 05:16:50', '2021-11-13 05:16:50'),
(12, 4, 7, '2021110004', 'Monde Favourite', '60000', '5', '300000', '2021-11-13 05:16:55', '2021-11-13 05:16:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orderlist`
--

CREATE TABLE `orderlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `orderid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderdate` date DEFAULT NULL,
  `customername` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `totalprice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orderlist`
--

INSERT INTO `orderlist` (`id`, `id_user`, `orderid`, `orderdate`, `customername`, `totalprice`, `created_at`, `updated_at`) VALUES
(1, 2, '2021110001', '2021-11-14', 'Dicha', '439500', '2021-11-13 05:14:34', '2021-11-13 05:14:54'),
(2, 2, '2021110002', '2021-11-14', 'Dicha', '420000', '2021-11-13 05:14:59', '2021-11-13 05:15:38'),
(3, 2, '2021110003', '2021-11-14', 'Angga', '32000', '2021-11-13 05:15:48', '2021-11-13 05:16:24'),
(4, 2, '2021110004', '2021-11-14', 'Angga', '335000', '2021-11-13 05:16:34', '2021-11-13 05:17:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `productname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unitprice` decimal(12,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `productname`, `unitprice`) VALUES
(1, 'Leo Kripik Kentang', '1000'),
(2, 'Piattoz Sapi Panggang', '1000'),
(3, 'Twistiko Balado', '1000'),
(4, 'Roma Biscuit Kelapa', '6500'),
(5, 'Malkist Abon Sapi', '5000'),
(6, 'Malkist Crackers', '5000'),
(7, 'Monde Favourite', '60000'),
(8, 'Monde Butter Cookies', '120000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Akun User', 'user', '$2y$10$6U/Vo/LNi7rLvUKh8s.2rOCg.9pOJtSoZxSc8BgFNnBvjeN06fJi6', 'user', NULL, NULL, NULL),
(2, 'Akun Admin', 'admin', '$2y$10$sBA0zw5.B1rLHKWOQCwgnuQFGslOsH9RZnn9N8myfJ1sUEtohS8d.', 'admin', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orderentry`
--
ALTER TABLE `orderentry`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderentry_id_orderlist_foreign` (`id_orderlist`),
  ADD KEY `orderentry_id_product_foreign` (`id_product`);

--
-- Indeks untuk tabel `orderlist`
--
ALTER TABLE `orderlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderlist_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `orderentry`
--
ALTER TABLE `orderentry`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `orderlist`
--
ALTER TABLE `orderlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orderentry`
--
ALTER TABLE `orderentry`
  ADD CONSTRAINT `orderentry_id_orderlist_foreign` FOREIGN KEY (`id_orderlist`) REFERENCES `orderlist` (`id`),
  ADD CONSTRAINT `orderentry_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`);

--
-- Ketidakleluasaan untuk tabel `orderlist`
--
ALTER TABLE `orderlist`
  ADD CONSTRAINT `orderlist_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
