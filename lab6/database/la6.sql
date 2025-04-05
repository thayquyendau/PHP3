-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 05, 2025 lúc 04:50 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `la6`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '0001_01_01_000000_create_users_table', 1),
(5, '0001_01_01_000001_create_cache_table', 1),
(6, '0001_01_01_000002_create_jobs_table', 1),
(7, '2025_04_05_104003_create_users_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('vvwsOwQkrCblVtORu1lBBUFO2DYYn3Z0TyB1rsFg', 11, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUXJPSEpmdHFXZFlGTzRhUko3cjFGNmIwMmZpT0NlTEVkd1FQVXMwQSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9iYXNpYy1hdXRoIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTE7fQ==', 1743853754);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `idgroup` int(11) NOT NULL,
  `nghenghiep` varchar(255) DEFAULT NULL,
  `phai` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `diachi`, `idgroup`, `nghenghiep`, `phai`) VALUES
(1, 'Delores Gulgowski', 'hbernhard@example.net', '2025-04-05 04:48:20', '$2y$12$0I.Wv35G0MQe8AAKguuQDu/5qlBTTaXLvi6wMGxGs/vdjNrPSJSvG', 'HemzBEdj9f', '2025-04-05 04:48:21', '2025-04-05 04:48:21', NULL, 0, NULL, NULL),
(2, 'Mrs. Asia Cormier', 'eric.dibbert@example.org', '2025-04-05 04:48:21', '$2y$12$0I.Wv35G0MQe8AAKguuQDu/5qlBTTaXLvi6wMGxGs/vdjNrPSJSvG', 'kQwoMSomEe', '2025-04-05 04:48:21', '2025-04-05 04:48:21', NULL, 0, NULL, NULL),
(3, 'Torrance Denesik', 'casper.kip@example.org', '2025-04-05 04:48:21', '$2y$12$0I.Wv35G0MQe8AAKguuQDu/5qlBTTaXLvi6wMGxGs/vdjNrPSJSvG', 'uEYn1vsLOz', '2025-04-05 04:48:21', '2025-04-05 04:48:21', NULL, 0, NULL, NULL),
(4, 'Rico DuBuque', 'jorge51@example.org', '2025-04-05 04:48:21', '$2y$12$0I.Wv35G0MQe8AAKguuQDu/5qlBTTaXLvi6wMGxGs/vdjNrPSJSvG', 'mtr9ls65QC', '2025-04-05 04:48:21', '2025-04-05 04:48:21', NULL, 0, NULL, NULL),
(5, 'Orlo Fay', 'renner.rylee@example.net', '2025-04-05 04:48:21', '$2y$12$0I.Wv35G0MQe8AAKguuQDu/5qlBTTaXLvi6wMGxGs/vdjNrPSJSvG', '2zITrYA7fo', '2025-04-05 04:48:21', '2025-04-05 04:48:21', NULL, 1, NULL, NULL),
(6, 'Claire Deckow', 'qdavis@example.net', '2025-04-05 04:48:21', '$2y$12$0I.Wv35G0MQe8AAKguuQDu/5qlBTTaXLvi6wMGxGs/vdjNrPSJSvG', 'R0Pb7MD2CJ', '2025-04-05 04:48:21', '2025-04-05 04:48:21', NULL, 0, NULL, NULL),
(7, 'Lilian Weissnat', 'donnell94@example.org', '2025-04-05 04:48:21', '$2y$12$0I.Wv35G0MQe8AAKguuQDu/5qlBTTaXLvi6wMGxGs/vdjNrPSJSvG', 'K1EZaq0pWc', '2025-04-05 04:48:21', '2025-04-05 04:48:21', NULL, 0, NULL, NULL),
(8, 'Noemie Hill', 'crystel21@example.org', '2025-04-05 04:48:21', '$2y$12$0I.Wv35G0MQe8AAKguuQDu/5qlBTTaXLvi6wMGxGs/vdjNrPSJSvG', 'HeU8iwQJAE', '2025-04-05 04:48:21', '2025-04-05 04:48:21', NULL, 0, NULL, NULL),
(9, 'Prof. Fatima Cormier', 'frederick13@example.org', '2025-04-05 04:48:21', '$2y$12$0I.Wv35G0MQe8AAKguuQDu/5qlBTTaXLvi6wMGxGs/vdjNrPSJSvG', 'frhr298cb9', '2025-04-05 04:48:21', '2025-04-05 04:48:21', NULL, 0, NULL, NULL),
(10, 'Alda Marquardt', 'cremin.alessandra@example.org', '2025-04-05 04:48:21', '$2y$12$0I.Wv35G0MQe8AAKguuQDu/5qlBTTaXLvi6wMGxGs/vdjNrPSJSvG', 'dfMZ2Xac0o', '2025-04-05 04:48:21', '2025-04-05 04:48:21', NULL, 1, NULL, NULL),
(11, 'Vui Từng Phút Giây', 'vuiqua@gmail.com', NULL, '$2y$12$EP.V3rK4FOSJpujIhCUGiuvvGTHctc5IqvZ3qXijEcewbzegNWE8.', NULL, NULL, NULL, 'TPHCM', 1, NULL, NULL),
(12, 'Buồn Từng Phút Giây', 'buonqua@gmail.com', NULL, '$2y$12$UlnCgfqv4GxMY8J.7.6Ti.awG9J0ToQ9y/eM.GW1NAuUjMkBBhlVm', NULL, NULL, NULL, 'TPHCM', 1, NULL, NULL),
(13, 'Nguyen Thi Gia Hu', 'giahu@gmail.com', NULL, '$2y$12$NY2.Dco2TbQedT.HM9AMLO3K7RS0AETqmwQVkDY.gTNPArA/tmKOO', NULL, NULL, NULL, 'HN', 0, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
