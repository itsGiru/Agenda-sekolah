-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Okt 2023 pada 16.02
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
-- Database: `agenda_sekolah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_gurus`
--

CREATE TABLE `absen_gurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_jadwal` bigint(20) UNSIGNED NOT NULL,
  `keterangan` enum('Hadir','Penugasan','Tidak Hadir') NOT NULL,
  `tugasmateri` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_siswas`
--

CREATE TABLE `absen_siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `id_siswa` bigint(20) UNSIGNED NOT NULL,
  `absensi` enum('Sakit','Izin','Alpa','Dispensasi') NOT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Struktur dari tabel `gurus`
--

CREATE TABLE `gurus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gurus`
--

INSERT INTO `gurus` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Dra. Deni Yanthi', '2023-10-26 13:27:58', '2023-10-26 13:27:58'),
(2, 'Febi Nurafiah, S.Kom', '2023-10-26 13:28:25', '2023-10-26 13:28:25'),
(3, 'Cep Kusaeri, S.T', '2023-10-26 13:29:33', '2023-10-26 13:29:33'),
(4, 'Anisa Nurjanah, S.Pd', '2023-10-26 13:30:02', '2023-10-26 13:30:02'),
(5, 'Irma Nuraini, M.Pd', '2023-10-26 13:30:51', '2023-10-26 13:30:51'),
(6, 'Asep Said, S.Pd', '2023-10-26 13:31:14', '2023-10-26 13:31:14'),
(7, 'Dina Amelia, S.Hum', '2023-10-26 13:31:33', '2023-10-26 13:31:33'),
(8, 'Iklil Dzakiyah, S.Pd', '2023-10-26 13:31:57', '2023-10-26 13:31:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru_mapels`
--

CREATE TABLE `guru_mapels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_guru` bigint(20) UNSIGNED DEFAULT NULL,
  `id_mapel` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `guru_mapels`
--

INSERT INTO `guru_mapels` (`id`, `id_guru`, `id_mapel`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-10-26 13:27:58', '2023-10-26 13:27:58'),
(2, 2, 2, '2023-10-26 13:28:25', '2023-10-26 13:28:25'),
(3, 3, 3, '2023-10-26 13:29:33', '2023-10-26 13:29:33'),
(4, 4, 4, '2023-10-26 13:30:02', '2023-10-26 13:30:02'),
(5, 5, 6, '2023-10-26 13:30:51', '2023-10-26 13:30:51'),
(6, 6, 7, '2023-10-26 13:31:14', '2023-10-26 13:31:14'),
(7, 7, 8, '2023-10-26 13:31:33', '2023-10-26 13:31:33'),
(8, 8, 9, '2023-10-26 13:31:57', '2023-10-26 13:31:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwals`
--

CREATE TABLE `jadwals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kelas` bigint(20) UNSIGNED DEFAULT NULL,
  `hari` varchar(3) NOT NULL,
  `id_guru_mapels` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwals`
--

INSERT INTO `jadwals` (`id`, `id_kelas`, `hari`, `id_guru_mapels`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mon', 1, '2023-10-26 13:41:38', '2023-10-26 13:41:38'),
(2, 1, 'Mon', 2, '2023-10-26 13:41:46', '2023-10-26 13:41:46'),
(3, 1, 'Mon', 3, '2023-10-26 13:41:56', '2023-10-26 13:41:56'),
(4, 1, 'Tue', 3, '2023-10-26 13:42:06', '2023-10-26 13:42:06'),
(5, 1, 'Tue', 4, '2023-10-26 13:42:14', '2023-10-26 13:42:14'),
(6, 1, 'Wed', 5, '2023-10-26 13:42:24', '2023-10-26 13:42:24'),
(7, 1, 'Thu', 6, '2023-10-26 13:42:36', '2023-10-26 13:42:36'),
(8, 1, 'Thu', 7, '2023-10-26 13:42:47', '2023-10-26 13:42:47'),
(9, 1, 'Fri', 8, '2023-10-26 13:42:57', '2023-10-26 13:42:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurusans`
--

CREATE TABLE `jurusans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jurusans`
--

INSERT INTO `jurusans` (`id`, `jurusan`, `created_at`, `updated_at`) VALUES
(1, 'Rekayasa Perangkat Lunak', NULL, NULL),
(2, 'Teknik Komputer dan Jaringan', NULL, NULL),
(3, 'Otomatisasi Tata Kelola Perkantoran', NULL, NULL),
(4, 'Bisnis Daring dan Pemasaran', NULL, NULL),
(5, 'Akuntansi Keuangan Lembaga', NULL, NULL),
(6, 'Tata Busana', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tingkat` enum('10','11','12') NOT NULL DEFAULT '10',
  `kelas` varchar(255) NOT NULL,
  `id_jurusan` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `tingkat`, `kelas`, `id_jurusan`, `created_at`, `updated_at`) VALUES
(1, '12', 'RPL 1', 1, NULL, NULL),
(2, '12', 'RPL 2', 1, NULL, NULL),
(3, '12', 'RPL 3', 1, NULL, NULL),
(4, '12', 'RPL 4', 1, NULL, NULL),
(5, '12', 'RPL 5', 1, NULL, NULL),
(6, '11', 'RPL 1', 1, NULL, NULL),
(7, '11', 'RPL 2', 1, NULL, NULL),
(8, '11', 'RPL 3', 1, NULL, NULL),
(9, '11', 'RPL 4', 1, NULL, NULL),
(10, '11', 'RPL 5', 1, NULL, NULL),
(11, '10', 'RPL 1', 1, NULL, NULL),
(12, '10', 'RPL 2', 1, NULL, NULL),
(13, '10', 'RPL 3', 1, NULL, NULL),
(14, '10', 'RPL 4', 1, NULL, NULL),
(15, '10', 'RPL 5', 1, NULL, NULL),
(16, '12', 'TKJ 1', 2, NULL, NULL),
(17, '12', 'TKJ 2', 2, NULL, NULL),
(18, '12', 'TKJ 3', 2, NULL, NULL),
(19, '12', 'TKJ 4', 2, NULL, NULL),
(20, '12', 'TKJ 5', 2, NULL, NULL),
(21, '11', 'TKJ 1', 2, NULL, NULL),
(22, '11', 'TKJ 2', 2, NULL, NULL),
(23, '11', 'TKJ 3', 2, NULL, NULL),
(24, '11', 'TKJ 4', 2, NULL, NULL),
(25, '11', 'TKJ 5', 2, NULL, NULL),
(26, '10', 'TKJ 1', 2, NULL, NULL),
(27, '10', 'TKJ 2', 2, NULL, NULL),
(28, '10', 'TKJ 3', 2, NULL, NULL),
(29, '10', 'TKJ 4', 2, NULL, NULL),
(30, '10', 'TKJ 5', 2, NULL, NULL),
(31, '12', 'OTKP 1', 3, NULL, NULL),
(32, '12', 'OTKP 2', 3, NULL, NULL),
(33, '12', 'OTKP 3', 3, NULL, NULL),
(34, '12', 'OTKP 4', 3, NULL, NULL),
(35, '12', 'OTKP 5', 3, NULL, NULL),
(36, '11', 'OTKP 1', 3, NULL, NULL),
(37, '11', 'OTKP 2', 3, NULL, NULL),
(38, '11', 'OTKP 3', 3, NULL, NULL),
(39, '11', 'OTKP 4', 3, NULL, NULL),
(40, '11', 'OTKP 5', 3, NULL, NULL),
(41, '10', 'OTKP 1', 3, NULL, NULL),
(42, '10', 'OTKP 2', 3, NULL, NULL),
(43, '10', 'OTKP 3', 3, NULL, NULL),
(44, '10', 'OTKP 4', 3, NULL, NULL),
(45, '10', 'OTKP 5', 3, NULL, NULL),
(46, '12', 'BDP 1', 4, NULL, NULL),
(47, '12', 'BDP 2', 4, NULL, NULL),
(48, '12', 'BDP 3', 4, NULL, NULL),
(49, '12', 'BDP 4', 4, NULL, NULL),
(50, '12', 'BDP 5', 4, NULL, NULL),
(51, '11', 'BDP 1', 4, NULL, NULL),
(52, '11', 'BDP 2', 4, NULL, NULL),
(53, '11', 'BDP 3', 4, NULL, NULL),
(54, '11', 'BDP 4', 4, NULL, NULL),
(55, '11', 'BDP 5', 4, NULL, NULL),
(56, '10', 'BDP 1', 4, NULL, NULL),
(57, '10', 'BDP 2', 4, NULL, NULL),
(58, '10', 'BDP 3', 4, NULL, NULL),
(59, '10', 'BDP 4', 4, NULL, NULL),
(60, '10', 'BDP 5', 4, NULL, NULL),
(61, '12', 'AKL 1', 5, NULL, NULL),
(62, '12', 'AKL 2', 5, NULL, NULL),
(63, '12', 'AKL 3', 5, NULL, NULL),
(64, '12', 'AKL 4', 5, NULL, NULL),
(65, '12', 'AKL 5', 5, NULL, NULL),
(66, '11', 'AKL 1', 5, NULL, NULL),
(67, '11', 'AKL 2', 5, NULL, NULL),
(68, '11', 'AKL 3', 5, NULL, NULL),
(69, '11', 'AKL 4', 5, NULL, NULL),
(70, '11', 'AKL 5', 5, NULL, NULL),
(71, '10', 'AKL 1', 5, NULL, NULL),
(72, '10', 'AKL 2', 5, NULL, NULL),
(73, '10', 'AKL 3', 5, NULL, NULL),
(74, '10', 'AKL 4', 5, NULL, NULL),
(75, '10', 'AKL 5', 5, NULL, NULL),
(76, '12', 'TB 1', 6, NULL, NULL),
(77, '12', 'TB 2', 6, NULL, NULL),
(78, '12', 'TB 3', 6, NULL, NULL),
(79, '12', 'TB 4', 6, NULL, NULL),
(80, '12', 'TB 5', 6, NULL, NULL),
(81, '11', 'TB 1', 6, NULL, NULL),
(82, '11', 'TB 2', 6, NULL, NULL),
(83, '11', 'TB 3', 6, NULL, NULL),
(84, '11', 'TB 4', 6, NULL, NULL),
(85, '11', 'TB 5', 6, NULL, NULL),
(86, '10', 'TB 1', 6, NULL, NULL),
(87, '10', 'TB 2', 6, NULL, NULL),
(88, '10', 'TB 3', 6, NULL, NULL),
(89, '10', 'TB 4', 6, NULL, NULL),
(90, '10', 'TB 5', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapels`
--

CREATE TABLE `mapels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_mapel` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mapels`
--

INSERT INTO `mapels` (`id`, `nama_mapel`, `created_at`, `updated_at`) VALUES
(1, 'Bahasa Indonesia', '2023-10-26 13:20:27', '2023-10-26 13:20:27'),
(2, 'Basis Data', '2023-10-26 13:20:50', '2023-10-26 13:20:50'),
(3, 'Pemrograman Web', '2023-10-26 13:21:21', '2023-10-26 13:21:21'),
(4, 'Kewirausahaan', '2023-10-26 13:21:54', '2023-10-26 13:21:54'),
(6, 'Bahasa Inggris', '2023-10-26 13:24:41', '2023-10-26 13:24:41'),
(7, 'Pendidikan Jasmani', '2023-10-26 13:25:06', '2023-10-26 13:25:06'),
(8, 'Bahasa Sunda', '2023-10-26 13:25:18', '2023-10-26 13:25:18'),
(9, 'Matematika', '2023-10-26 13:25:32', '2023-10-26 13:25:32');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_22_053644_create_jurusans_table', 1),
(6, '2023_09_22_055259_create_kelas_table', 1),
(7, '2023_09_22_055708_create_siswa_table', 1),
(8, '2023_09_22_064418_add_fk_to_userstable', 1),
(9, '2023_09_22_065257_create_gurus_table', 1),
(10, '2023_09_22_070135_create_mapels_table', 1),
(11, '2023_10_03_023704_create_guru_mapels_table', 1),
(12, '2023_10_10_091229_create_jadwals_table', 1),
(13, '2023_10_13_020739_create_riwayat_kenaikan_kelas_table', 1),
(14, '2023_10_17_021744_create_absen_gurus_table', 1),
(15, '2023_10_17_025544_create_absen_siswas_table', 1);

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
-- Struktur dari tabel `riwayat_kenaikan_kelas`
--

CREATE TABLE `riwayat_kenaikan_kelas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_jurusan` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_absen` int(11) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','Undefined') NOT NULL DEFAULT 'Undefined',
  `lulus` bigint(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `id_kelas`, `nama`, `no_absen`, `jenis_kelamin`, `lulus`, `created_at`, `updated_at`) VALUES
(1, 1, 'Alya', 1, 'Perempuan', 0, '2023-10-26 13:35:07', '2023-10-26 13:35:07'),
(2, 1, 'Dhea', 2, 'Perempuan', 0, '2023-10-26 13:35:23', '2023-10-26 13:35:23'),
(3, 1, 'Gilang', 3, 'Laki-laki', 0, '2023-10-26 13:35:37', '2023-10-26 13:35:37'),
(4, 1, 'Irma', 4, 'Perempuan', 0, '2023-10-26 13:35:47', '2023-10-26 13:35:47'),
(5, 1, 'Nicholas', 5, 'Laki-laki', 0, '2023-10-26 13:35:58', '2023-10-26 13:35:58'),
(6, 1, 'Zahwa', 6, 'Perempuan', 0, '2023-10-26 13:36:12', '2023-10-26 13:36:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT '6',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_jurusan` bigint(20) UNSIGNED DEFAULT NULL,
  `id_kelas` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `profile_image`, `role`, `remember_token`, `created_at`, `updated_at`, `id_jurusan`, `id_kelas`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$vtynxAZ479.V3yMIpnxZFeiYRFuyIKX4DEL0p.RjQyNDnXy87y3qS', NULL, '1', NULL, NULL, NULL, NULL, NULL),
(3, 'Cep Kusaeri, S.T', 'cep@gmail.com', NULL, '$2y$10$Krmk/rt/9pF45zMv3I1rwOGkp1nthanK69xuZ4wCT9C/7.akvViLG', NULL, '4', NULL, '2023-10-26 10:14:35', '2023-10-26 11:36:14', 1, NULL),
(4, 'Sustiningtyas, S.Pd', 'susti@gmail.com', NULL, '$2y$10$x.1Sij.2l9OitxCDFMQmzOW4.VLPEl/CLHK10MUNVZpipffq1yuCe', NULL, '4', NULL, '2023-10-26 11:29:21', '2023-10-26 11:36:32', 5, NULL),
(5, 'Santi Sriwahyuning Thiat, S.Pd', 'santi@gmail.com', NULL, '$2y$10$bztgM7EXG8YE52I4xONE0OG2k4aXYcuoNXLdYSXEYH3avuj/WsQEC', NULL, '4', NULL, '2023-10-26 11:30:30', '2023-10-26 11:36:52', 4, NULL),
(6, 'Ade Mustahidin, S.Kom', 'ade@gmail.com', NULL, '$2y$10$t.5dr84LW.CVghvYJhcFYea24yvlEd1X4OQurjeCPMDwnd8Zfikp.', NULL, '4', NULL, '2023-10-26 11:31:29', '2023-10-26 11:37:14', 2, NULL),
(7, 'Tubagus Hidayat, M.Hum', 'tubagus@gmail.com', NULL, '$2y$10$dt67dzk6edvz8CjoLpxP6uhjjgPash0bpIoywzwhrwNaPe61fEheu', NULL, '4', NULL, '2023-10-26 11:33:14', '2023-10-26 11:37:53', 3, NULL),
(8, 'Fauzia Andini A.K, S.Pd', 'fauzia@gmail.com', NULL, '$2y$10$ucpMlpAhDOfNSggwk.SKMuA3oJQGzMxJHkcFPciowk8Rv4a79MmjO', NULL, '4', NULL, '2023-10-26 11:35:14', '2023-10-26 11:38:11', 6, NULL),
(9, 'Dra. Eva Latifah', 'eva@gmail.com', NULL, '$2y$10$IUc.Fkvk7ih6JRudmB3J/uQB5yNwIVdJXdZuQCyZqJ0oveXnG7sNO', NULL, '3', NULL, '2023-10-26 11:39:09', '2023-10-26 11:39:09', 4, 47),
(10, 'Dra. Heni Heryani', 'heni@gmail.com', NULL, '$2y$10$pIQcqanXCOjhEy5qP1u/Qe45P22sIKHN2uK8jSWiVGwgaNJyeFJpG', NULL, '3', NULL, '2023-10-26 11:40:06', '2023-10-26 11:40:06', 4, 48),
(11, 'Desi Suherlina, S.E', 'desi@gmail.com', NULL, '$2y$10$ZupSP/p.g6wX1uETX9UbMO2AY6PHz5qHoZL5p4kA9IUxEQ9LzkexS', NULL, '3', NULL, '2023-10-26 11:41:14', '2023-10-26 11:41:14', 4, 46),
(12, 'Haryati Nopiantie, S.Ag', 'haryati@gmail.com', NULL, '$2y$10$L/l0ltz0Nq.kVzwjZHJEZOgnobGcg0G4KL3c.hr.SSuO/Y4vpH4IC', NULL, '3', NULL, '2023-10-26 11:42:54', '2023-10-26 11:42:54', 4, 51),
(13, 'Sulistyaningsih, S.Pd', 'sulistyaningsih@gmail.com', NULL, '$2y$10$jnD/UtK27E9x8ANP/M2ymuBatfAJWzZr91AqH43mIbLVbsDkouV0e', NULL, '3', NULL, '2023-10-26 11:47:52', '2023-10-26 11:47:52', 4, 52),
(14, 'Nina Marliana Purwantini, S.Pd', 'nina@gmail.com', NULL, '$2y$10$U/bCpEwOjfbzMsfbMLrJV.0in2gi.6n2eQfE.FcYGWA80ZK8B8ccS', NULL, '3', NULL, '2023-10-26 11:49:02', '2023-10-26 11:49:02', 4, 53),
(15, 'Indah Sulistyowati, S.Pd', 'indah@gmail.com', NULL, '$2y$10$om2/GCEFiYYix2R5uMwn.eB3MP7Iy/EyLqbioNTgtmg16bGyUNrH.', NULL, '3', NULL, '2023-10-26 11:51:10', '2023-10-26 11:51:10', 4, 56),
(16, 'Adzan Setiabudi, S.Hum', 'adzan@gmail.com', NULL, '$2y$10$pjJ0Ybl3QccFJTl7uTpFf.hwInHs/ScvM2O7EFE7IAkF.ngLM7SNy', NULL, '3', NULL, '2023-10-26 11:52:05', '2023-10-26 11:52:05', 4, 57),
(17, 'Rd. Nurainiyah Hawa, S.E, M.M', 'nurainiyah@gmail.com', NULL, '$2y$10$lTy33n6qPeLJMBseAK9FIetHSiRYCymCJsNnE8SkhS7Z1AnwTblN6', NULL, '3', NULL, '2023-10-26 11:54:22', '2023-10-26 11:54:22', 4, 58),
(18, 'Salli Niati, S.E', 'salli@gmail.com', NULL, '$2y$10$qyJeaKRU1ywSJ/EIPF2eSeGmOEv.8WT0vBX9BE2FrZUsXkgRxdzbi', NULL, '3', NULL, '2023-10-26 11:55:06', '2023-10-26 11:55:06', 4, 59),
(19, 'Tyna Ridha Dhaniaty, S.Pd', 'tyna@gmail.com', NULL, '$2y$10$VEsvOWZNkkr4ceY9qybcEehHRG7s4H5PPDmFWx9DqkS3t/HZRSOhO', NULL, '3', NULL, '2023-10-26 11:56:32', '2023-10-26 11:56:32', 1, 2),
(20, 'Imar Kusdinar, S.Pd.I', 'imar@gmail.com', NULL, '$2y$10$fyaN0WaQJQiG5Ytj2XWnkeYQDhk2kapSsgIQXVhBVNrumHpmkfNCy', NULL, '3', NULL, '2023-10-26 11:58:50', '2023-10-26 11:58:50', 1, 6),
(21, 'Lilis Aisah Yuniarti, S.Pd', 'lilis@gmail.com', NULL, '$2y$10$7raTS8WSithfEX8L34lOA.ycyAHPqw3YrrWaqSiqCdesWfoiuRzWa', NULL, '3', NULL, '2023-10-26 11:59:41', '2023-10-26 11:59:41', 1, 7),
(22, 'Febi Nurafiah, S.Kom', 'febi@gmail.com', NULL, '$2y$10$F927Or/szUoSdBXwzBi0lu54hWNsUdgOp4tzq5qC0hUj.Ojcg5BXq', NULL, '3', NULL, '2023-10-26 12:01:37', '2023-10-26 12:01:37', 1, 11),
(23, 'Shinta Mariza, S.Pd', 'shinta@gmail.com', NULL, '$2y$10$.HNrDrkQTUM9IHBQ5ih0OeLMHzlhoWCxcZHW0yK9EutMhfj6C/5VK', NULL, '3', NULL, '2023-10-26 12:02:19', '2023-10-26 12:02:19', 1, 12),
(24, 'Andi Anto, S.T', 'andi@gmail.com', NULL, '$2y$10$i1S7FWu2.V2x6D/tsXel/.z1mzb1PyQnrg74K7gB/Q6Bw/eKoLcta', NULL, '3', NULL, '2023-10-26 12:03:22', '2023-10-26 12:03:22', 2, 16),
(25, 'Iklil Dzakiyah, S.Pd', 'iklil@gmail.com', NULL, '$2y$10$XPW.mF2IyPdc/pDEU/r3EezXsdH35B4YDo7B4/nPjOg4/svvGi4xW', NULL, '3', NULL, '2023-10-26 12:04:07', '2023-10-26 12:04:07', 2, 17),
(26, 'Karti, S.Kom', 'karti@gmail.com', NULL, '$2y$10$NPlo4H1EYMy2DOFtsRh6.uH/yo61JQvDeUwfrvwHlOg2DEI2ARysG', NULL, '3', NULL, '2023-10-26 12:07:23', '2023-10-26 12:07:23', 2, 21),
(27, 'Mamay Rosmayati, S.Pd', 'mamay@gmail.com', NULL, '$2y$10$Wts92WYHRs2K.FnnvAU8xOVrwbdlQnabj8Dkyc3QdbfYrCjQpPS6W', NULL, '3', NULL, '2023-10-26 12:08:06', '2023-10-26 12:08:06', 2, 22),
(28, 'Ade Mulyani, M.Pd', 'adem@gmail.com', NULL, '$2y$10$gs/Izcr5/Lk5wwZiNBv/D.CT73kFIfMWNf84L7btxMmYc.anIDZva', NULL, '3', NULL, '2023-10-26 12:09:18', '2023-10-26 12:09:18', 2, 26),
(29, 'Geta Septiadi, S.Pd', 'geta@gmail.com', NULL, '$2y$10$aO8ZZ62qqbkOM9Yjtj5arO0oRCVP1/uRaXYpFB7Ps99Cy4ialQ6zy', NULL, '3', NULL, '2023-10-26 12:10:14', '2023-10-26 12:10:14', 2, 27),
(30, 'Siti Badriyah, S.E', 'siti@gmail.com', NULL, '$2y$10$nyVWAztkw/dZ9doIDDS1feIvyFS5IypxGJU/aYz7yQw5Twe4ikJJ6', NULL, '3', NULL, '2023-10-26 12:11:44', '2023-10-26 12:11:44', 3, 31),
(31, 'Dra. Santhi Risjani', 'santhi@gmail.com', NULL, '$2y$10$khcy5Wm1F29Zup1LWLcJjOLRv63V0r9TgKUIZpJtG1c7PMFl/7H7K', NULL, '3', NULL, '2023-10-26 12:12:47', '2023-10-26 12:12:47', 3, 32),
(32, 'Tati Hajati, S.Pd, M.M.Pd', 'tati@gmail.com', NULL, '$2y$10$PHfyhsYTRhQpiWDrThdQ7.zDlBRWJxmJavpOf2tAFFxjXPizaDT9O', NULL, '3', NULL, '2023-10-26 12:13:50', '2023-10-26 12:13:50', 3, 33),
(33, 'Drs. Hengki Ardasarta', 'hengki@gmail.com', NULL, '$2y$10$8f0Kmix7kJjlU/CXxs7jS.iMVCoGjvASISmQ2XcRdToKo/1hys5FC', NULL, '3', NULL, '2023-10-26 12:15:13', '2023-10-26 12:15:13', 3, 36),
(34, 'Triwahyuningsih, S.Pd', 'tri@gmail.com', NULL, '$2y$10$KKjackqn0ozuiK4OffMil.3n4s3IXvKacEOXgu0ldtlX0Q/WZm8HG', NULL, '3', NULL, '2023-10-26 12:16:22', '2023-10-26 12:16:22', 3, 37),
(35, 'Tirwan, S.Ag', 'tirwan@gmail.com', NULL, '$2y$10$8yWUWC3x/LIeyAip..o.TOyh5TAjM1/qW1NX4mMG4zioTwpaAS5A6', NULL, '3', NULL, '2023-10-26 12:17:56', '2023-10-26 12:17:56', 3, 41),
(36, 'Rhena Supriyatin, S.Pd', 'rhena@gmail.com', NULL, '$2y$10$x06667Ui/0nC1Q9Tc5e4ou0fl.75He6cEoj.47ccduGUKM6VWGHQ6', NULL, '3', NULL, '2023-10-26 12:19:23', '2023-10-26 12:19:23', 3, 42),
(37, 'Rosidah, S.Pd', 'rosidah@gmail.com', NULL, '$2y$10$W6exNa7f1FHkfcSoBYlaHecQpPQLsaB36gRnXq9i/raI9dHsxgnUe', NULL, '3', NULL, '2023-10-26 12:20:23', '2023-10-26 12:20:23', 5, 61),
(38, 'Khosyati Ismatu Arini, S.Pd', 'khosyati@gmail.com', NULL, '$2y$10$RbETk0eR60.PKbNQTz5fOOGV7AKrJZ73L1eKCiq./cg4D.xFvdVGO', NULL, '3', NULL, '2023-10-26 12:21:39', '2023-10-26 12:21:39', 5, 62),
(39, 'Santi Listiawati, S.Pd', 'santil@gmail.com', NULL, '$2y$10$CcwxwqTgA1nOOSUZ4jcNZulJqN7PFVAI.TnYK2d/ULNV153kC6hGy', NULL, '3', NULL, '2023-10-26 12:22:45', '2023-10-26 12:22:45', 5, 63),
(40, 'Lukman Nugraha, S.Sn', 'lukman@gmail.com', NULL, '$2y$10$RwUVTeQ8dvB3XMkRLI9Xq.zkkWF/oSk8b8iU6CXldN3DSnUPRDiVe', NULL, '3', NULL, '2023-10-26 12:23:36', '2023-10-26 12:23:36', 5, 66),
(41, 'Tati Rohayati, S.Ag', 'tatir@gmail.com', NULL, '$2y$10$RXZvUCQCXW.aGpevR8uPYuPZKOV6pLUJsUIOO3hh2p3tJgVbe3m4O', NULL, '3', NULL, '2023-10-26 12:24:48', '2023-10-26 12:24:48', 5, 67),
(42, 'Dini Rosmawati, S.E', 'dini@gmail.com', NULL, '$2y$10$UdohqHIZ0rj9A9XcV4hjZ.YRKf6g3iOKD5/64k6x//53nBVGnD7/u', NULL, '3', NULL, '2023-10-26 12:25:37', '2023-10-26 12:25:37', 5, 68),
(43, 'Anisa Nurjanah, S.Pd', 'anisa@gmail.com', NULL, '$2y$10$t5yBoyGXIOxNNKaJ/Y35k.USZLiifn5UeivDn7l9FtD5//FP3b9fu', NULL, '3', NULL, '2023-10-26 12:26:36', '2023-10-26 12:26:36', 5, 71),
(44, 'Ida Ismaulani, S.Pd', 'ida@gmail.com', NULL, '$2y$10$tSTcTpUk2DgMgLG6rgmXNuoQgW795bbosFt.06/1I4xhiVBmXmhZu', NULL, '3', NULL, '2023-10-26 12:27:28', '2023-10-26 12:27:28', 5, 72),
(45, 'Sulistiaty Mardiany Rahayu, S.Pd', 'sulis@gmail.com', NULL, '$2y$10$IkU/qzzvzWjbbS3Ft24CP.phZ0scF.x2ZjxNnjAtJdiAgDEHsqS1q', NULL, '3', NULL, '2023-10-26 12:29:25', '2023-10-26 12:29:25', 5, 73),
(46, 'Nina Kartina, S.Pd', 'ninak@gmail.com', NULL, '$2y$10$KcrIKMKdYTJ04HofhO3DU.IMyvu6SIGikdrbUSJAzM5n60xBhEvXS', NULL, '3', NULL, '2023-10-26 12:30:08', '2023-10-26 12:30:08', 6, 76),
(47, 'Indri Kusumastuti, S.Pd', 'indri@gmail.com', NULL, '$2y$10$C1Tqx8svSP4OL6s8O3qgg.AWT/4KFkPT1r/uL7tJBje5i6uXmGh1a', NULL, '3', NULL, '2023-10-26 12:31:10', '2023-10-26 12:31:10', 6, 77),
(48, 'Dina Amelia, S.Hum', 'dina@gmail.com', NULL, '$2y$10$mwBwAVnm6MCuKuqAPziCB.sI/Prks7F9NBbZHr6T3NR6Hn6CcgJkC', NULL, '3', NULL, '2023-10-26 12:33:07', '2023-10-26 12:33:07', 6, 81),
(49, 'Sellvi Octavia, S.Pd', 'sellvi@gmail.com', NULL, '$2y$10$SggYCwHb7iv5COvNvKHBQOMQaHSA7SRA51cHo6ag0.KkZjRPceETC', NULL, '3', NULL, '2023-10-26 12:33:41', '2023-10-26 12:33:41', 6, 82),
(50, 'Yulistiati Wirdaninghsih, S.E', 'yulis@gmail.com', NULL, '$2y$10$kL/Dk3x2Rg2pAvnzEOr.bu5ucD6vCVgliox59w7EHUZeknpUj3Ldq', NULL, '3', NULL, '2023-10-26 12:34:43', '2023-10-26 12:34:43', 6, 83),
(51, 'Rio Rizki Pratama, S.Par. Gr', 'rio@gmail.com', NULL, '$2y$10$b8dK7UM47XciLIqI3XQkCuciQCic5IUKRIz3rOrfWooZ7zstLb1OC', NULL, '3', NULL, '2023-10-26 12:35:40', '2023-10-26 12:35:40', 6, 86),
(52, 'Hani Haviyani, S.Pd', 'hani@gmail.com', NULL, '$2y$10$otwBBQmb4kc8sYANCyDfdOFI2fAlUY/56RE0Zq5uq0EuaWrtTvr1C', NULL, '3', NULL, '2023-10-26 12:36:15', '2023-10-26 12:36:15', 6, 87),
(53, 'Asep Said, S.Pd', 'asep@gmail.com', NULL, '$2y$10$BTFFYahizH0EE3eeSBhVvuXWF84jZakR5SAzppHAPU3DWW0HFoyn2', NULL, '3', NULL, '2023-10-26 12:37:30', '2023-10-26 12:37:30', 6, 88),
(54, 'KM 12 BDP 1', 'km12bdp1@gmail.com', NULL, '$2y$10$L7bfynz5OJ3R4H6nMSMq..kNuGWMefjFaE050qBnmJihdc4f9dFdu', NULL, '2', NULL, '2023-10-26 12:40:49', '2023-10-26 12:40:49', 4, 46),
(55, 'KM 12 BDP 2', 'km12bdp2@gmail.com', NULL, '$2y$10$WLejBW5THHN0aGsNtq1BzuDJlyF.UqQZr31/WZT57n7ku5YHp5w5u', NULL, '2', NULL, '2023-10-26 12:41:18', '2023-10-26 12:41:18', 4, 47),
(56, 'KM 12 BDP 3', 'km12bdp3@gmail.com', NULL, '$2y$10$3khusBqG4HyLbpETb3dZYeBsrq.Xutw2h17mpmPiAIGWChG7/rR8i', NULL, '2', NULL, '2023-10-26 12:41:49', '2023-10-26 12:41:49', 4, 48),
(57, 'KM 11 BDP 1', 'km11bdp1@gmail.com', NULL, '$2y$10$YDHjy0F4r80RUXRQjZbvGOiV5q4Vm2eTrC1M1b8PHSm1xQbBPA5mS', NULL, '2', NULL, '2023-10-26 12:42:55', '2023-10-26 12:42:55', 4, 51),
(58, 'KM 11 BDP 2', 'km11bdp2@gmail.com', NULL, '$2y$10$I0R5y8ROYhOcTLEmh23vCuTk.dyYE/LvLIubobSKJUNemVr856NPu', NULL, '2', NULL, '2023-10-26 12:43:25', '2023-10-26 12:43:25', 4, 52),
(59, 'KM 11 BDP 3', 'km11bdp3@gmail.com', NULL, '$2y$10$c0cKtIlHSCe1a6iP/NWDuuhII.lrciN94OYj4JjhSAzUHmx.kYMpe', NULL, '2', NULL, '2023-10-26 12:43:52', '2023-10-26 12:43:52', 4, 53),
(60, 'KM 10 BDP 1', 'km10bdp1@gmail.com', NULL, '$2y$10$kqbc80UcxRsPxMcgLDlWeOMY9t//PF8eMM4yJj7IjfeLYiSHKJz6a', NULL, '2', NULL, '2023-10-26 12:44:40', '2023-10-26 12:44:40', 4, 56),
(61, 'KM 10 BDP 2', 'km10bdp2@gmail.com', NULL, '$2y$10$BHRk7rHr2WwJEiDIJiaP8u/r8.cg34QncPVzo3HI1pQSaKfr/Pkta', NULL, '2', NULL, '2023-10-26 12:45:06', '2023-10-26 12:45:06', 4, 57),
(62, 'KM 10 BDP 3', 'km10bdp3@gmail.com', NULL, '$2y$10$PH4PBZsbn.P3rA0IDpvDNuPdF54xKT5x0XBAVBLIlLmUsythLl5gS', NULL, '2', NULL, '2023-10-26 12:45:31', '2023-10-26 12:45:31', 4, 58),
(63, 'KM 10 BDP 4', 'km10bdp4@gmail.com', NULL, '$2y$10$VVstMBaqPKSbDqZyl4zIrugvwhvxh0engfvWqM7DOoQzKFxL4YQ0K', NULL, '2', NULL, '2023-10-26 12:46:01', '2023-10-26 12:46:01', 4, 59),
(64, 'KM 12 RPL 1', 'km12rpl1@gmail.com', NULL, '$2y$10$9AVwUt0pbHktNrIiKmRnG.u8ELnnmqsvptGi0KZsS9ke3eojfYIJC', NULL, '2', NULL, '2023-10-26 12:47:40', '2023-10-26 12:47:40', 1, 1),
(65, 'Euis Ningsih, S.Pd', 'euis@gmail.com', NULL, '$2y$10$V8.ivdiDhUCKqHYDRU6bR.6HZSsAmw6JmIhqN7S2OKd4vClmNoIgS', NULL, '3', NULL, '2023-10-26 12:49:46', '2023-10-26 12:49:46', 1, 1),
(66, 'KM 12 RPL 2', 'km12rpl2@gmail.com', NULL, '$2y$10$DfuDrrdzdin0XnkClgYEnutbIF3VVgN1BqZEUu6yYbCqmF.g1T85S', NULL, '2', NULL, '2023-10-26 12:50:43', '2023-10-26 12:50:43', 1, 2),
(67, 'KM 11 RPL 1', 'km11rpl1@gmail.com', NULL, '$2y$10$tkAjpo1bZ46yxYGLqicoAe5xiwd3UpuYIVrm6I4oxajhTvTgFd0.e', NULL, '2', NULL, '2023-10-26 12:51:33', '2023-10-26 12:51:33', 1, 6),
(68, 'KM 11 RPL 2', 'km11rpl2@gmail.com', NULL, '$2y$10$g6R/wSVnG9xOADoxbiRfvOK.cusG6sQmQX4h8QO1fAcGF1wCUvQh2', NULL, '2', NULL, '2023-10-26 12:52:08', '2023-10-26 12:52:08', 1, 7),
(69, 'KM 10 RPL 1', 'km10rpl1@gmail.com', NULL, '$2y$10$H00DesdD3jWdX96fSl7XhuTDxbahKB./D.OB7t3rb5FIdzduoFKcu', NULL, '2', NULL, '2023-10-26 12:52:36', '2023-10-26 12:52:36', 1, 11),
(70, 'KM 10 RPL 2', 'km10rpl2@gmail.com', NULL, '$2y$10$Jg6/pzJsbV498kOikPTfjefd0d6XA8pqgF4P9ZfT1Ff.zU0HHdRba', NULL, '2', NULL, '2023-10-26 12:57:49', '2023-10-26 12:57:49', 1, 12),
(71, 'KM 12 TKJ 1', 'km12tkj1@gmail.com', NULL, '$2y$10$u/cVTGz8TGz1OKULYCL55.ij24z7GWvCdQ4EZs0I.OYpjcKpEav32', NULL, '2', NULL, '2023-10-26 12:58:27', '2023-10-26 12:58:27', 2, 16),
(72, 'KM 12 TKJ 2', 'km12tkj2@gmail.com', NULL, '$2y$10$vxdz.7ovxJe/ymfOehtO.uqqLwE7DXfCame0fb6WshI9ADJbAHYDW', NULL, '2', NULL, '2023-10-26 12:59:15', '2023-10-26 12:59:15', 2, 17),
(73, 'KM 11 TKJ 1', 'km11tkj1@gmail.com', NULL, '$2y$10$XS9fIZgvGmhkFZqwn29K8eEdfYdcT.Vi/UPK9LdKnEVjOr6JHi6ZG', NULL, '2', NULL, '2023-10-26 12:59:43', '2023-10-26 12:59:43', 2, 21),
(74, 'KM 11 TKJ 2', 'km11tkj2@gmail.com', NULL, '$2y$10$Mf4zNd./jpOpeEO9eZRWdeSH.DdNMu2BUqdF2OR.XjxHl38a4UYnu', NULL, '2', NULL, '2023-10-26 13:00:24', '2023-10-26 13:00:24', 2, 22),
(75, 'KM 10 TKJ 1', 'km10tkj1@gmail.com', NULL, '$2y$10$voCRNMjacmdu82.gj3oQUu0F4wdoNBUfDzE3vqMTKUjFhrwDUuxk6', NULL, '2', NULL, '2023-10-26 13:01:05', '2023-10-26 13:01:05', 2, 26),
(76, 'KM 10 TKJ 2', 'km10tkj2@gmail.com', NULL, '$2y$10$7tzhdrM40QZHOy6UQtcNu.TxmVK8xv5no5R39aLYelS7GnnFx.Gia', NULL, '2', NULL, '2023-10-26 13:01:49', '2023-10-26 13:01:49', 2, 27),
(77, 'KM 12 OTKP 1', 'km12otkp1@gmail.com', NULL, '$2y$10$LGsDESxzsmvSxU.Nem/bmuETWUJxEh3nb7fewn7ratXBLp3S/t/Ue', NULL, '2', NULL, '2023-10-26 13:02:24', '2023-10-26 13:02:24', 3, 31),
(78, 'KM 12 OTKP 2', 'km12otkp2@gmail.com', NULL, '$2y$10$j5TyutavlrW4rhWOepQA4O0XebeEYGAcSNlyiI.nwjXy3ZFzQWkvO', NULL, '2', NULL, '2023-10-26 13:02:54', '2023-10-26 13:02:54', 3, 32),
(79, 'KM 12 OTKP 3', 'km12otkp3@gmail.com', NULL, '$2y$10$PHYk8MsXdiEIkUBbX3FBc.XHwCw8gi/P6U0lPKV2v0bvnludCrK.y', NULL, '2', NULL, '2023-10-26 13:03:27', '2023-10-26 13:03:27', 3, 33),
(80, 'KM 11 OTKP 1', 'km11otkp1@gmail.com', NULL, '$2y$10$0DLbU/fD18FbBiuf/HA1bOH2LIlnDGk3SLY6mxDEWimE33dAMBcOC', NULL, '2', NULL, '2023-10-26 13:03:55', '2023-10-26 13:03:55', 3, 36),
(81, 'KM 11 OTKP 2', 'km11otkp2@gmail.com', NULL, '$2y$10$k.DPMTGbUqswt3XAAyfvOOokwmVwOrQt9yfxHIxbXFC6lT1BQMhwq', NULL, '2', NULL, '2023-10-26 13:04:22', '2023-10-26 13:04:22', 3, 37),
(82, 'KM 10 OTKP 1', 'km10otkp1@gmail.com', NULL, '$2y$10$YvrQvhbIw18idb9L0QNwc.Tfcq8hdVxvOGSgrCBJha6rZ5pcN1A1m', NULL, '2', NULL, '2023-10-26 13:04:58', '2023-10-26 13:04:58', 3, 41),
(83, 'KM 10 OTKP 2', 'km10otkp2@gmail.com', NULL, '$2y$10$EeDWmLKqUkLBKi37QntH0uYn8Djl3E/5Cd7x.hO41FUp1hy.hZO16', NULL, '2', NULL, '2023-10-26 13:05:30', '2023-10-26 13:05:30', 3, 42),
(84, 'KM 12 AKL 1', 'km12akl1@gmail.com', NULL, '$2y$10$XTUmpRgL1YjnaMR5BVl9ROx1OdURh9Tvj9XK4SuTN8Bh9qoJJCSu.', NULL, '2', NULL, '2023-10-26 13:06:04', '2023-10-26 13:06:04', 5, 61),
(85, 'KM 12 AKL 2', 'km12akl2@gmail.com', NULL, '$2y$10$7wM6aVdKYZ4qV5Ovk7ile.h3verKiHwpLWjyC3OMNBQmk0QBxXLAq', NULL, '2', NULL, '2023-10-26 13:06:59', '2023-10-26 13:06:59', 5, 62),
(86, 'KM 12 AKL 3', 'km12akl3@gmail.com', NULL, '$2y$10$rDPGgDfNYfITC9CkVXm0iOudQjjjehJbv6HdBLpt86KYz6NHcUfwy', NULL, '2', NULL, '2023-10-26 13:07:57', '2023-10-26 13:07:57', 5, 63),
(87, 'KM 11 AKL 1', 'km11akl1@gmail.com', NULL, '$2y$10$jjPzTYYPFizLnLoTkWk7euXtYyGzyjdslGe4ACuirzjpn2R6/wwrS', NULL, '2', NULL, '2023-10-26 13:08:55', '2023-10-26 13:08:55', 5, 66),
(88, 'KM 11 AKL 2', 'km11akl2@gmail.com', NULL, '$2y$10$Vhwpu2GLw44a.nHDlnB/SO.BPYZLuMxH7UE7NTrYho9PnPfeARS.2', NULL, '2', NULL, '2023-10-26 13:09:39', '2023-10-26 13:09:39', 5, 67),
(89, 'KM 11 AKL 3', 'km11akl3@gmail.com', NULL, '$2y$10$c4XoCXUV7QoVqrWDCdo0F.ZO7c.gZQ0V8Uuk13M2L6kcxk8hpFY4W', NULL, '2', NULL, '2023-10-26 13:10:53', '2023-10-26 13:10:53', 5, 68),
(90, 'KM 10 AKL 1', 'km10akl1@gmail.com', NULL, '$2y$10$X1e4Szn/lLcPWnKP7QbaSefzaMOCcDCKy84M/m/bbm2TjV3mAGRLq', NULL, '2', NULL, '2023-10-26 13:11:22', '2023-10-26 13:11:22', 5, 71),
(91, 'KM 10 AKL 2', 'km10akl2@gmail.com', NULL, '$2y$10$D4eDf0nmJawWF0LdQz0GK.yr9aOvjd7suWpcw0/Zob/kdcrHmPfu6', NULL, '2', NULL, '2023-10-26 13:11:53', '2023-10-26 13:11:53', 5, 72),
(92, 'KM 10 AKL 3', 'km10akl3@gmail.com', NULL, '$2y$10$AEsKEAjSiSuuXezl0wsIS.h4qNnvYBCZ04T7vIcEb6hfXVQTbg.yi', NULL, '2', NULL, '2023-10-26 13:12:28', '2023-10-26 13:12:28', 5, 73),
(93, 'KM 12 TB 1', 'km12tb1@gmail.com', NULL, '$2y$10$F/E1WnkfHOf85T3D2BYWfevod4GTot4Bgykm5rKEQZpYB5AGNRJKi', NULL, '2', NULL, '2023-10-26 13:13:11', '2023-10-26 13:13:11', 6, 76),
(94, 'KM 12 TB 2', 'km12tb2@gmail.com', NULL, '$2y$10$qvHzgpHefVC93bPZujQ/mubEG8xo9hvgCnDBgahOGNob8RVXYMc3u', NULL, '2', NULL, '2023-10-26 13:13:37', '2023-10-26 13:13:37', 6, 77),
(95, 'KM 11 TB 1', 'km11tb1@gmail.com', NULL, '$2y$10$SdATTQu1aSAPIWymloNP7u6J8rVmu6ZjcotEnoYQRLEt5vGKYLLKS', NULL, '2', NULL, '2023-10-26 13:14:22', '2023-10-26 13:14:22', 6, 81),
(96, 'KM 11 TB 2', 'km11tb2@gmail.com', NULL, '$2y$10$8ieAcyOjmHH87ffHxlG4k.TAHZDgWdYKHju5TruBmyXpvmYBmxSya', NULL, '2', NULL, '2023-10-26 13:15:12', '2023-10-26 13:15:12', 6, 82),
(97, 'KM 11 TB 3', 'km11tb3@gmail.com', NULL, '$2y$10$yWhipSH.nC6jF6erwAXA.ePsVE.Ig03WOclXQgQnj5g3g/zQnkR8q', NULL, '2', NULL, '2023-10-26 13:15:56', '2023-10-26 13:15:56', 6, 83),
(98, 'KM 10 TB 1', 'km10tb1@gmail.com', NULL, '$2y$10$fuir9mTtAnKEKf9fqHP1yeQXUC6OYPbgz23CvAg0BgD9bg7x0XGl.', NULL, '2', NULL, '2023-10-26 13:17:03', '2023-10-26 13:17:03', 6, 86),
(99, 'KM 10 TB 2', 'km10tb2@gmail.com', NULL, '$2y$10$UbS.zMmGFj/EiC5P5frChuVyNFVLHxNyDla0w0q3VDs0Qst3Aia5y', NULL, '2', NULL, '2023-10-26 13:17:47', '2023-10-26 13:17:47', 6, 87),
(100, 'KM 10 TB 3', 'km10tb3@gmail.com', NULL, '$2y$10$kScHErAjIRruxUreSdEhEezC2zx3.4iHuofreWH69PGeI0rXE1mU6', NULL, '2', NULL, '2023-10-26 13:18:20', '2023-10-26 13:18:20', 6, 88);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen_gurus`
--
ALTER TABLE `absen_gurus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absen_gurus_id_jadwal_foreign` (`id_jadwal`);

--
-- Indeks untuk tabel `absen_siswas`
--
ALTER TABLE `absen_siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absen_siswas_id_kelas_foreign` (`id_kelas`),
  ADD KEY `absen_siswas_id_siswa_foreign` (`id_siswa`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `gurus`
--
ALTER TABLE `gurus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guru_mapels`
--
ALTER TABLE `guru_mapels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guru_mapels_id_guru_index` (`id_guru`),
  ADD KEY `guru_mapels_id_mapel_index` (`id_mapel`);

--
-- Indeks untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwals_id_kelas_index` (`id_kelas`),
  ADD KEY `jadwals_id_guru_mapels_index` (`id_guru_mapels`);

--
-- Indeks untuk tabel `jurusans`
--
ALTER TABLE `jurusans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_id_jurusan_index` (`id_jurusan`);

--
-- Indeks untuk tabel `mapels`
--
ALTER TABLE `mapels`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `riwayat_kenaikan_kelas`
--
ALTER TABLE `riwayat_kenaikan_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_kenaikan_kelas_id_jurusan_index` (`id_jurusan`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_id_kelas_index` (`id_kelas`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_jurusan_index` (`id_jurusan`),
  ADD KEY `users_id_kelas_index` (`id_kelas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen_gurus`
--
ALTER TABLE `absen_gurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `absen_siswas`
--
ALTER TABLE `absen_siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gurus`
--
ALTER TABLE `gurus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `guru_mapels`
--
ALTER TABLE `guru_mapels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `jurusans`
--
ALTER TABLE `jurusans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT untuk tabel `mapels`
--
ALTER TABLE `mapels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayat_kenaikan_kelas`
--
ALTER TABLE `riwayat_kenaikan_kelas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absen_gurus`
--
ALTER TABLE `absen_gurus`
  ADD CONSTRAINT `absen_gurus_id_jadwal_foreign` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwals` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `absen_siswas`
--
ALTER TABLE `absen_siswas`
  ADD CONSTRAINT `absen_siswas_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `absen_siswas_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `guru_mapels`
--
ALTER TABLE `guru_mapels`
  ADD CONSTRAINT `guru_mapels_id_guru_foreign` FOREIGN KEY (`id_guru`) REFERENCES `gurus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `guru_mapels_id_mapel_foreign` FOREIGN KEY (`id_mapel`) REFERENCES `mapels` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwals`
--
ALTER TABLE `jadwals`
  ADD CONSTRAINT `jadwals_id_guru_mapels_foreign` FOREIGN KEY (`id_guru_mapels`) REFERENCES `guru_mapels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwals_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_id_jurusan_foreign` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusans` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `riwayat_kenaikan_kelas`
--
ALTER TABLE `riwayat_kenaikan_kelas`
  ADD CONSTRAINT `riwayat_kenaikan_kelas_id_jurusan_foreign` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_jurusan_foreign` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
