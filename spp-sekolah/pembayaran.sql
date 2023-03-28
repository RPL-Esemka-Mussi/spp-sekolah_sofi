-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Mar 2023 pada 07.53
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pembayaran`
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
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kelas` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kompetensi_keahlian` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `kelas`, `kompetensi_keahlian`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'XII RPL', 'Rekayasa Perangkat Lunak', '2023-03-20 06:50:28', '2023-03-20 06:50:28', NULL),
(2, 'XII TKR', 'Teknik Kendaraan Ringan', '2023-03-20 20:34:06', '2023-03-25 00:16:52', NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_19_083537_create-spp-table', 1),
(6, '2023_03_19_083604_create-kelas-table', 1),
(7, '2023_03_19_083627_create-siswa-table', 1),
(8, '2023_03_19_083655_create-pembayaran-table', 1);

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
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bln_bayar` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun_bayar` varchar(4) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spp_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nis` char(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_id` bigint(20) UNSIGNED NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` char(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spp_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `user_id`, `nis`, `kelas_id`, `alamat`, `no_telp`, `spp_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 1, '20020', 1, 'sragi', '083987654321', 3, '2023-03-25 00:15:31', '2023-03-25 00:15:31', NULL),
(8, 2, '20098', 2, 'pekalongan', '083876547898', 4, '2023-03-25 00:16:05', '2023-03-25 00:16:05', NULL),
(9, 4, '20098', 1, 'pekalongan', '086543456789', 5, '2023-03-27 00:52:55', '2023-03-27 00:52:55', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `spp`
--

CREATE TABLE `spp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `spp`
--

INSERT INTO `spp` (`id`, `tahun`, `nominal`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2023, 180000, '2023-03-20 06:49:40', '2023-03-25 00:06:11', '2023-03-25 00:06:11'),
(2, 2023, 320000, '2023-03-22 20:51:38', '2023-03-25 00:06:18', '2023-03-25 00:06:18'),
(3, 2023, 180000, '2023-03-25 00:14:29', '2023-03-25 00:14:29', NULL),
(4, 2023, 320000, '2023-03-25 00:14:44', '2023-03-25 00:14:44', NULL),
(5, 2023, 1000000, '2023-03-27 00:51:45', '2023-03-27 00:51:45', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('admin','petugas','siswa') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'cimol', 'cimol@gmail.com', '2023-03-25 07:01:31', '$2a$12$kAw25ZPC851EtReWFSsUWeC/9/CP0tED0s7PLBGtOQjPAFXOPc4Sy', 'admin', '0998', '2023-03-25 07:01:31', '2023-03-25 07:01:31'),
(2, 'sasa', 'sasa@gmail.com', '2023-03-25 07:12:02', 'sasa123', 'petugas', '0987', '2023-03-25 07:12:02', '2023-03-25 07:12:02'),
(4, 'sofi', 'sofi@gmail.com', '2023-03-27 07:48:55', 'sofi123', 'siswa', '09876', '2023-03-27 07:48:55', '2023-03-27 07:48:55');

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
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_user_id_foreign` (`user_id`),
  ADD KEY `pembayaran_siswa_id_foreign` (`siswa_id`),
  ADD KEY `pembayaran_spp_id_foreign` (`spp_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_user_id_foreign` (`user_id`),
  ADD KEY `siswa_kelas_id_foreign` (`kelas_id`),
  ADD KEY `siswa_spp_id_foreign` (`spp_id`);

--
-- Indeks untuk tabel `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `spp`
--
ALTER TABLE `spp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembayaran_spp_id_foreign` FOREIGN KEY (`spp_id`) REFERENCES `spp` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pembayaran_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_spp_id_foreign` FOREIGN KEY (`spp_id`) REFERENCES `spp` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
