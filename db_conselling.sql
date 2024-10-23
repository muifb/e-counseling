-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Agu 2024 pada 07.43
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_conselling`
--
CREATE DATABASE IF NOT EXISTS `db_conselling` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_conselling`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detailreport`
--

CREATE TABLE `detailreport` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `report_id` bigint(20) UNSIGNED DEFAULT NULL,
  `file_fotovideo` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detailreport`
--

INSERT INTO `detailreport` (`id`, `report_id`, `file_fotovideo`, `created_at`, `updated_at`) VALUES
(10, 23, 'files-reports/image/nilai-motorik/fQasYUxby0S6slKPlSnwGKfr4ijEI1t49iTK9KOu.jpg', '2023-09-07 13:04:22', '2023-09-07 13:04:22'),
(11, 23, 'files-reports/image/nilai-motorik/Y8KKgoT2ZSe9fzvUoIthpEPbHa863nRq35iiX8H0.jpg', '2023-09-07 13:23:36', '2023-09-07 13:23:36'),
(12, 24, 'files-reports/image/nilai-motorik/dT6tbgNBiHzBRvepcmLhN7rLaIFETeW4uhKmVP12.jpg', '2023-09-07 15:25:00', '2023-09-07 15:25:00'),
(13, 26, 'files-reports/image/nilai-seni/wzzo9rgew5IrTDtPPmObiikfmRoiwW2HEdoifDwf.jpg', '2023-09-07 15:35:06', '2023-09-07 15:35:06'),
(14, 29, 'files-reports/image/nilai-agama/U1UjipN0Nrw8oF3RWcVH9zxfHy08Rz3z7ZtqFeaJ.jpg', '2023-09-07 15:47:35', '2023-09-07 15:47:35'),
(15, 23, 'files-reports/image/nilai-motorik/lasZoAL4YrlyV39SDQrH5rhd2bhH9cHrntTmjTUY.jpg', '2023-11-24 17:23:46', '2023-11-24 17:23:46'),
(16, 30, 'files-reports/image/nilai-motorik/rkcJLftXiEEzI8Vy4F9dUngUJNLxcDyB2kiP24K3.jpg', '2023-11-24 17:28:00', '2023-11-24 17:28:00'),
(17, 30, 'files-reports/image/nilai-kognitif/7NfuyuhobtJ59wlfaBCp0TdVV0OiEY447z3NvURN.jpg', '2023-11-24 17:28:00', '2023-11-24 17:28:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `evaluasi`
--

CREATE TABLE `evaluasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perkembangan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `siswa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tema_id` bigint(20) UNSIGNED DEFAULT NULL,
  `star_rated` varchar(191) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `evaluasi`
--

INSERT INTO `evaluasi` (`id`, `perkembangan_id`, `siswa_id`, `tema_id`, `star_rated`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 1, '3', '2023-09-05 17:51:01', '2023-09-05 17:51:01'),
(2, 2, 5, 1, '4', '2023-09-05 17:57:45', '2023-09-05 17:57:45'),
(3, 3, 5, 1, '4', '2023-09-05 18:00:03', '2023-09-05 18:00:03'),
(4, 4, 5, 3, '5', '2023-09-05 18:11:19', '2023-09-05 18:11:19'),
(5, 5, 2, 1, '4', '2023-09-05 18:21:04', '2023-09-05 18:21:04'),
(6, 6, 5, 1, '4', '2023-09-05 18:29:50', '2023-09-05 18:29:50'),
(7, 7, 4, 1, '4', '2023-09-05 21:01:22', '2023-09-05 21:01:22'),
(8, 8, 4, 1, '3', '2023-09-05 21:07:38', '2023-09-05 21:07:38'),
(9, 9, 4, 1, '5', '2023-09-05 21:10:11', '2023-09-05 21:10:11'),
(10, 10, 4, 3, '3', '2023-09-05 21:13:07', '2023-09-05 21:13:07'),
(11, 11, 8, 1, '3', '2023-09-05 22:17:35', '2023-09-05 22:17:35'),
(12, 12, 8, 2, '4', '2023-09-05 22:19:04', '2023-09-05 22:19:04'),
(13, 13, 8, 1, '3', '2023-09-05 22:20:13', '2023-09-05 22:20:13'),
(14, 14, 8, 1, '4', '2023-09-05 22:21:26', '2023-09-05 22:21:26'),
(15, 15, 8, 2, '5', '2023-09-05 22:22:36', '2023-09-05 22:22:36'),
(16, 16, 8, 2, '4', '2023-09-05 22:23:56', '2023-09-05 22:23:56'),
(17, 17, 8, 3, '3', '2023-09-05 22:25:03', '2023-09-05 22:25:03'),
(18, 18, 6, 1, '3', '2023-09-06 00:38:13', '2023-09-06 00:38:13'),
(19, 19, 9, 1, '4', '2023-09-06 00:39:04', '2023-09-06 00:39:04'),
(20, 20, 10, 1, '5', '2023-09-06 00:40:18', '2023-09-06 00:40:18'),
(21, 21, 10, 2, '4', '2023-09-06 00:41:41', '2023-09-06 00:41:41'),
(22, 22, 6, 2, '2', '2023-09-06 00:42:34', '2023-09-06 00:42:34'),
(23, 23, 7, 2, '3', '2023-09-06 00:43:49', '2023-09-06 00:43:49'),
(24, 24, 8, 2, '3', '2023-09-06 00:44:40', '2023-09-06 00:44:40'),
(25, 25, 9, 2, '3', '2023-09-06 00:45:27', '2023-09-06 00:45:27'),
(26, 26, 4, 2, '3', '2023-09-06 00:51:11', '2023-09-06 00:51:11'),
(27, 27, 17, 2, '3', '2023-09-06 00:52:09', '2023-09-06 00:52:09'),
(28, 28, 4, 2, '4', '2023-09-06 00:53:39', '2023-09-06 00:53:39'),
(29, 29, 4, 2, '3', '2023-09-06 00:54:40', '2023-09-06 00:54:40'),
(30, 30, 4, 2, '5', '2023-09-06 00:55:56', '2023-09-06 00:55:56'),
(31, 31, 4, 4, '4', '2023-09-06 00:57:48', '2023-09-06 00:57:48'),
(32, 32, 4, 4, '2', '2023-09-06 00:59:06', '2023-09-06 00:59:06'),
(33, 33, 19, 1, '3', '2023-09-07 04:29:45', '2023-09-07 04:29:45'),
(34, 34, 5, 3, '4', '2023-09-07 15:04:54', '2023-09-07 15:04:54'),
(35, 35, 5, 3, '5', '2023-09-07 18:53:59', '2023-09-07 18:53:59'),
(36, 36, 16, 2, '4', '2023-09-08 18:39:24', '2023-09-08 18:39:24'),
(37, 37, 33, 5, '5', '2023-10-16 04:22:38', '2023-10-16 04:22:38'),
(38, 38, 33, 4, '3', '2023-10-16 04:25:21', '2023-10-16 04:25:21'),
(39, 39, 33, 4, '4', '2023-10-16 04:26:42', '2023-10-16 04:26:42'),
(40, 40, 33, 4, '5', '2023-10-16 04:28:49', '2023-10-16 04:28:49'),
(41, 41, 33, 5, '4', '2023-10-16 04:30:44', '2023-10-16 04:30:44'),
(42, 42, 33, 5, '4', '2023-10-16 04:32:18', '2023-10-16 04:32:18'),
(43, 43, 33, 5, '5', '2023-10-16 04:42:54', '2023-10-16 04:42:54'),
(44, 44, 33, 1, '4', '2023-10-16 05:01:32', '2023-10-16 05:01:32'),
(45, 45, 33, 1, '5', '2023-10-16 05:03:23', '2023-10-16 05:03:23'),
(46, 46, 33, 1, '5', '2023-10-16 05:10:47', '2023-10-16 05:10:47'),
(47, 47, 33, 2, '3', '2023-10-16 05:13:43', '2023-10-16 05:13:43'),
(48, 48, 33, 2, '5', '2023-10-16 05:16:08', '2023-10-16 05:16:08'),
(49, 49, 33, 2, '5', '2023-10-16 05:18:28', '2023-10-16 05:18:28'),
(50, 50, 33, 2, '3', '2023-10-16 05:25:27', '2023-10-16 05:25:27'),
(51, 51, 33, 3, '3', '2023-10-16 05:30:18', '2023-10-16 05:30:18'),
(52, 52, 33, 3, '5', '2023-10-16 05:32:53', '2023-10-16 05:32:53'),
(53, 53, 33, 3, '4', '2023-10-16 05:34:49', '2023-10-16 05:34:49'),
(54, 54, 78, 4, '3', '2023-10-18 13:04:48', '2023-10-18 13:04:48'),
(55, 55, 33, 4, '4', '2023-10-18 13:07:13', '2023-10-18 13:07:13'),
(56, 56, 33, 2, '5', '2023-10-18 13:08:44', '2023-10-18 13:08:44'),
(57, 57, 33, 5, '4', '2023-10-18 13:12:29', '2023-10-18 13:12:29'),
(58, 58, 33, 3, '5', '2023-10-18 13:13:28', '2023-10-18 13:13:28'),
(59, 59, 110, 1, '4', '2023-11-24 20:25:11', '2023-11-24 20:25:11'),
(60, 60, 71, 1, '4', '2023-11-25 01:33:44', '2023-11-25 01:33:44'),
(72, 72, 19, 1, '4', '2023-11-29 16:12:02', '2023-11-29 16:12:02'),
(73, 73, 19, 1, '3', '2023-11-29 16:12:30', '2023-11-29 16:12:30'),
(74, 74, 19, 1, '5', '2023-11-29 16:12:38', '2023-11-29 16:12:38'),
(75, 75, 19, 1, '4', '2023-11-29 16:12:47', '2023-11-29 16:12:47'),
(76, 76, 19, 1, '4', '2023-11-29 16:12:56', '2023-11-29 16:12:56'),
(77, 77, 19, 1, '4', '2023-11-29 16:13:09', '2023-11-29 16:13:09'),
(78, 78, 19, 1, '3', '2023-11-29 16:13:29', '2023-11-29 16:13:29'),
(79, 79, 19, 1, '3', '2023-11-29 16:13:38', '2023-11-29 16:13:38'),
(80, 80, 19, 2, '4', '2023-11-29 16:14:37', '2023-11-29 16:14:37'),
(81, 81, 19, 2, '5', '2023-11-29 16:14:49', '2023-11-29 16:14:49'),
(82, 82, 19, 2, '5', '2023-11-29 16:14:59', '2023-11-29 16:14:59'),
(83, 83, 19, 2, '5', '2023-11-29 16:15:14', '2023-11-29 16:15:14'),
(84, 84, 19, 3, '4', '2023-11-29 16:15:25', '2023-11-29 16:15:25'),
(85, 85, 19, 2, '5', '2023-11-29 16:15:37', '2023-11-29 16:15:37'),
(86, 86, 19, 2, '2', '2023-11-29 16:15:50', '2023-11-29 16:15:50'),
(87, 87, 19, 2, '4', '2023-11-29 16:16:00', '2023-11-29 16:16:00'),
(88, 88, 19, 3, '5', '2023-11-29 16:16:16', '2023-11-29 16:16:16'),
(89, 89, 19, 3, '3', '2023-11-29 16:16:27', '2023-11-29 16:16:27'),
(90, 90, 19, 4, '3', '2023-11-29 16:16:43', '2023-11-29 16:16:43'),
(91, 91, 19, 4, '5', '2023-11-29 16:16:58', '2023-11-29 16:16:58'),
(92, 92, 19, 4, '5', '2023-11-29 16:17:09', '2023-11-29 16:17:09'),
(93, 93, 19, 5, '2', '2023-11-29 16:17:20', '2023-11-29 16:17:20'),
(94, 94, 19, 5, '4', '2023-11-29 16:17:32', '2023-11-29 16:17:32'),
(95, 95, 19, 5, '5', '2023-11-29 16:17:47', '2023-11-29 16:17:47'),
(96, 96, 71, 1, '5', '2023-11-29 16:18:15', '2023-11-29 16:18:15'),
(98, 98, 19, 2, '3', '2023-11-30 14:22:43', '2023-11-30 14:22:43'),
(99, 99, 2, 1, '4', '2023-11-30 17:35:10', '2023-11-30 17:35:10'),
(100, 100, 2, 1, '5', '2023-11-30 17:35:18', '2023-11-30 17:35:18'),
(101, 101, 2, 2, '5', '2023-11-30 17:35:31', '2023-11-30 17:35:31'),
(102, 102, 2, 2, '3', '2023-11-30 17:35:41', '2023-11-30 17:35:41'),
(103, 103, 2, 2, '4', '2023-11-30 17:35:56', '2023-11-30 17:35:56'),
(104, 104, 2, 3, '4', '2023-11-30 17:36:08', '2023-11-30 17:36:08'),
(105, 105, 2, 3, '5', '2023-11-30 17:36:18', '2023-11-30 17:36:18'),
(106, 106, 2, 3, '3', '2023-11-30 17:36:28', '2023-11-30 17:36:28'),
(107, 107, 2, 4, '4', '2023-11-30 17:36:39', '2023-11-30 17:36:39'),
(108, 108, 2, 4, '3', '2023-11-30 17:36:56', '2023-11-30 17:36:56'),
(109, 109, 2, 4, '5', '2023-11-30 17:37:06', '2023-11-30 17:37:06'),
(110, 110, 2, 5, '5', '2023-11-30 17:37:19', '2023-11-30 17:37:19'),
(111, 111, 2, 5, '2', '2023-11-30 17:37:30', '2023-11-30 17:37:30'),
(112, 112, 2, 5, '5', '2023-11-30 17:37:40', '2023-11-30 17:37:40'),
(113, 113, 2, 1, '5', '2023-11-30 17:38:04', '2023-11-30 17:38:04'),
(114, 114, 78, 1, '5', '2023-11-30 17:55:43', '2023-11-30 17:55:43'),
(115, 115, 78, 1, '5', '2023-11-30 17:55:52', '2023-11-30 17:55:52'),
(116, 116, 78, 1, '3', '2023-11-30 17:56:00', '2023-11-30 17:56:00'),
(117, 117, 78, 2, '3', '2023-11-30 17:56:11', '2023-11-30 17:56:11'),
(118, 118, 78, 2, '4', '2023-11-30 17:56:22', '2023-11-30 17:56:22'),
(119, 119, 78, 2, '3', '2023-11-30 17:56:34', '2023-11-30 17:56:34'),
(120, 120, 78, 3, '5', '2023-11-30 17:56:43', '2023-11-30 17:56:43'),
(121, 121, 78, 3, '5', '2023-11-30 17:56:58', '2023-11-30 17:56:58'),
(122, 122, 78, 3, '2', '2023-11-30 17:57:11', '2023-11-30 17:57:11'),
(123, 123, 78, 4, '2', '2023-11-30 17:57:21', '2023-11-30 17:57:21'),
(124, 124, 78, 4, '4', '2023-11-30 17:57:35', '2023-11-30 17:57:35'),
(125, 125, 78, 4, '5', '2023-11-30 17:57:44', '2023-11-30 17:57:44'),
(126, 126, 78, 5, '4', '2023-11-30 17:57:55', '2023-11-30 17:57:55'),
(127, 127, 78, 5, '4', '2023-11-30 17:58:04', '2023-11-30 17:58:04'),
(128, 128, 78, 5, '3', '2023-11-30 17:58:24', '2023-11-30 17:58:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fotoperkembangan`
--

CREATE TABLE `fotoperkembangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perkembangan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` text DEFAULT NULL,
  `video` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `fotoperkembangan`
--

INSERT INTO `fotoperkembangan` (`id`, `perkembangan_id`, `image`, `video`, `created_at`, `updated_at`) VALUES
(1, 8, 'files-perkembangan/image/CsJjQqfkmMGzdqFHTzou7FfBBAYLAqs7tZS6j7rW.jpg', NULL, '2023-09-05 21:07:38', '2023-09-05 21:07:38'),
(2, 9, 'files-perkembangan/image/ntWqS3QuJbEABwKqBoPBTEjkqkruRjOsD0MPDfxf.jpg', NULL, '2023-09-05 21:10:11', '2023-09-05 21:10:11'),
(3, 10, 'files-perkembangan/image/szDgCLUD0KYOPjBW9BdKD9pqwqnUdCovQzCiDHxa.jpg', NULL, '2023-09-05 21:13:07', '2023-09-05 21:13:07'),
(4, 31, 'files-perkembangan/image/JWTXShz42eNnKBehmAYqSeZleZGyql5nR7D1cuu5.png', NULL, '2023-09-06 00:57:48', '2023-09-06 00:57:48'),
(5, 34, 'files-perkembangan/image/btPY3NEDjgNqJ9PW8mQkmu22Yebo3G4CcdBRTh6P.jpg', NULL, '2023-09-07 15:04:54', '2023-09-07 15:04:54'),
(6, 35, 'files-perkembangan/image/0Jo1aGKM8IuVxu6gw3LOsvy4owqvWnkeRTq3tDi8.jpg', NULL, '2023-09-07 18:53:59', '2023-09-07 18:53:59'),
(7, 36, 'files-perkembangan/image/f8Z6fl0dwDbDFxMN6C9ircpcenuORg6migcJRFdM.jpg', NULL, '2023-09-08 18:39:24', '2023-09-08 18:39:24'),
(8, 37, 'files-perkembangan/image/z2W2uVq0wtOWxd9MPdBog0zenBz6Uik7qWfz9F3E.jpg', NULL, '2023-10-16 04:22:38', '2023-10-16 04:22:38'),
(9, 38, 'files-perkembangan/image/kQqv0QhnBQ0magSFnyYusXmXnLDCnz3JFP6SVdxi.jpg', NULL, '2023-10-16 04:25:21', '2023-10-16 04:25:21'),
(10, 39, 'files-perkembangan/image/7LZi4z8pJhyqUre9znj3hnGZSZzgjtXg2PNOuY3T.jpg', NULL, '2023-10-16 04:26:42', '2023-10-16 04:26:42'),
(11, 40, 'files-perkembangan/image/ZX5EBrizAW3DmZKYAb7cnjFqtTpAEqHlkxpOhB7P.jpg', NULL, '2023-10-16 04:28:49', '2023-10-16 04:28:49'),
(12, 41, 'files-perkembangan/image/ktStOMnqGzzYdjZ1zf3KO7bjKGNpcd3xnmUWcGQB.jpg', NULL, '2023-10-16 04:30:44', '2023-10-16 04:30:44'),
(13, 42, 'files-perkembangan/image/nB13y3EkuwqTLjHEqLb41hyR0cw6gIaTMBcMRQSn.jpg', NULL, '2023-10-16 04:32:18', '2023-10-16 04:32:18'),
(14, 43, 'files-perkembangan/image/REOfAxcaLADfaTMyT5iKyXmXXhUqdu4cIHprEp7n.jpg', NULL, '2023-10-16 04:42:54', '2023-10-16 04:42:54'),
(15, 44, 'files-perkembangan/image/5dpMPrO6qA20BMVd4DjidMSubmt7fhiWqJUpWWpw.jpg', NULL, '2023-10-16 05:01:32', '2023-10-16 05:01:32'),
(16, 45, 'files-perkembangan/image/LG4JuZlqFShFokxV5ZPdowVWJ4BQBmvRn1hhp5J6.jpg', NULL, '2023-10-16 05:03:23', '2023-10-16 05:03:23'),
(17, 46, 'files-perkembangan/image/fg6KMlcuY0LTLyVVm1LCeC7dflszoM2m5C51Q107.jpg', NULL, '2023-10-16 05:10:47', '2023-10-16 05:10:47'),
(18, 47, 'files-perkembangan/image/aQ5wtZaO3GmiI5ryGbR3gkbKXBYlzXCTQKjKMGlg.jpg', NULL, '2023-10-16 05:13:43', '2023-10-16 05:13:43'),
(19, 48, 'files-perkembangan/image/4RUlIST2au373fUa9e8znc3qJbZINJ1VybXuSQsf.jpg', NULL, '2023-10-16 05:16:08', '2023-10-16 05:16:08'),
(20, 49, 'files-perkembangan/image/2QgMuBhTF1bSSRI2slsE4zLpXSbBIRPYIjyqIwOI.jpg', NULL, '2023-10-16 05:18:28', '2023-10-16 05:18:28'),
(21, 50, 'files-perkembangan/image/vFWIyNKzAGr2NPcfGLK60fjxPFstJXtqIBrDfrKN.jpg', NULL, '2023-10-16 05:25:26', '2023-10-16 05:25:26'),
(22, 50, 'files-perkembangan/image/CUXOKGS5GZEWnYuWyZCzh0Vj7FetY89oJbIi3l29.jpg', NULL, '2023-10-16 05:25:26', '2023-10-16 05:25:26'),
(23, 50, 'files-perkembangan/image/s8AeGL8tb8eH0EK5jOqsafD3vxO56cCVIQcHNbOm.jpg', NULL, '2023-10-16 05:25:27', '2023-10-16 05:25:27'),
(24, 51, 'files-perkembangan/image/yqet1gySylV8qzJ3MtsSxQUgfcfgnBIvHPzafCqJ.jpg', NULL, '2023-10-16 05:30:18', '2023-10-16 05:30:18'),
(25, 52, 'files-perkembangan/image/fjESSS9871h3faZIrvipqxfBbNScXVn45XWvbT4w.jpg', NULL, '2023-10-16 05:32:53', '2023-10-16 05:32:53'),
(26, 53, 'files-perkembangan/image/rtwcuemV8rJGMMZKNORScU2xZWoLjlD5v1rSSIQU.png', NULL, '2023-10-16 05:34:48', '2023-10-16 05:34:48'),
(27, 54, 'files-perkembangan/image/xmTw9SbThOZsBHojw0Uoa7vs5rfrvECBqesS3h9i.jpg', NULL, '2023-10-18 13:04:48', '2023-10-18 13:04:48'),
(28, 55, 'files-perkembangan/image/Ve7hIZDGa9ireuwCYoBffltqg9M9i6UwK7weIvv6.jpg', NULL, '2023-10-18 13:07:13', '2023-10-18 13:07:13'),
(29, 56, 'files-perkembangan/image/gJZbbcKH7aK8Q6DTzarAC7Xod2MQ4PYHrE2hN7X2.jpg', NULL, '2023-10-18 13:08:44', '2023-10-18 13:08:44'),
(30, 56, 'files-perkembangan/image/KSKdPdQhofZH2ycK6z2Q49jkOZ3NxuWBe3N4u9Vi.jpg', NULL, '2023-10-18 13:08:44', '2023-10-18 13:08:44'),
(31, 57, 'files-perkembangan/image/6KkEOlfPrGHvOtSjXsM0g0id8KJkyDk4hDOuwOmw.jpg', NULL, '2023-10-18 13:12:29', '2023-10-18 13:12:29'),
(32, 58, 'files-perkembangan/image/zCxpFAgAlfz4CUhESY3444uc0HLELceGiR69nr9n.png', NULL, '2023-10-18 13:13:28', '2023-10-18 13:13:28'),
(33, 60, 'files-perkembangan/image/17nekIx6dPMYYWXaWRGj2FFP3BiY0SSFG056OL5H.jpg', NULL, '2023-11-25 01:33:44', '2023-11-25 01:33:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nuptk` varchar(191) DEFAULT NULL,
  `nama_guru` varchar(191) NOT NULL,
  `photo` text DEFAULT NULL,
  `jk_guru` varchar(191) NOT NULL,
  `no_telp` varchar(191) NOT NULL,
  `devisi` varchar(191) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(191) NOT NULL,
  `pendidikan` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `user_id`, `nuptk`, `nama_guru`, `photo`, `jk_guru`, `no_telp`, `devisi`, `tgl_lahir`, `alamat`, `pendidikan`, `created_at`, `updated_at`) VALUES
(1, 2, 'guru', 'UMI CHAMIDAH', 'photo-guru/5cJ2tKbRDQ4m35kCSkphnL8tFh9URomkVhHRFazl.jpg', 'Perempuan', '081215686626', 'Guru', '1968-02-01', 'PATI', 'SMA', '2023-09-05 12:53:21', '2023-09-08 18:05:01'),
(2, 3, 'tatausaha', 'EKA ANDRIYANI S.Sos', 'photo-guru/aTWPldDc18ePxoGMZgHNAZ3iEKWnPbbpalysBlkp.jpg', 'Perempuan', '088948388888', 'Tatausaha', '1996-01-21', 'Demak Jawa Tengah', 'S1', '2023-09-05 12:55:53', '2024-01-29 10:04:39'),
(3, 4, 'kepsek', 'RISNA NURUL FADLILAH S.PSI', 'photo-guru/WTEgLthKSdK2o4JLtQZ2KrHsW143AQseX8jPUtS1.jpg', 'Perempuan', '081215686626', 'Kepala Sekolah', '1986-02-27', 'SEMARANG', 'S1', '2023-09-05 12:57:48', '2023-09-08 18:24:33'),
(4, 5, 'himmatul', 'HIMMATUL ALIYAH', NULL, 'Perempuan', '087832612643', 'Guru', '1991-07-26', 'PATI', 'SMA', '2023-09-05 13:08:18', '2023-09-06 05:20:47'),
(5, 6, 'ika', 'IKA ANISATUN NURIYAH', NULL, 'Perempuan', '088948388888', 'Guru', '1999-11-28', 'PATI', 'SMA', '2023-09-05 13:09:28', '2023-09-05 22:11:39'),
(6, 7, '3318025008940001', 'MIRATUN NISA\'', NULL, 'Perempuan', '087832612643', 'Guru', '1994-08-10', 'PATI', 'SMA', '2023-09-05 13:10:36', '2023-09-05 13:10:36'),
(7, 28, '3318025410890002', 'DWI KARTINIATI', NULL, 'Perempuan', '088948388888', 'Guru', '1989-10-14', 'PATI', 'SMA', '2023-09-05 22:01:54', '2023-09-05 22:01:54'),
(8, 29, '3318024111950002', 'SITI FARIDA HASANAH S.Pd', NULL, 'Perempuan', '088948388888', 'Guru', '1995-11-01', 'PATI', 'S1', '2023-09-05 22:03:03', '2023-09-05 22:03:03'),
(9, 30, '3318014305830004', 'SRI MAHMUDAH S.Pd.I', NULL, 'Perempuan', '088948388888', 'Guru', '1983-05-03', 'PATI', 'S1', '2023-09-05 22:04:04', '2023-09-05 22:04:04'),
(10, 31, '3315155301950002', 'ARA LIANI SE', NULL, 'Perempuan', '088948388888', 'Guru', '1996-01-13', 'GROBOGAN', 'S1', '2023-09-05 22:05:19', '2023-09-05 22:05:19'),
(11, 32, '3318026806960003', 'IFA KARNIAWATI S.Sos', NULL, 'Perempuan', '088948388888', 'Guru', '1996-06-28', 'PATI', 'S1', '2023-09-05 22:06:34', '2023-09-05 22:06:34'),
(12, 45, '3318114510980002', 'AYU SULISTIANI S.Sos', NULL, 'Perempuan', '088948388888', 'Guru', '1998-10-05', 'PATI', 'S1', '2023-09-06 05:56:31', '2023-09-06 05:56:31'),
(13, 46, '3318025303040003', 'USWATUN KHASANAH', NULL, 'Perempuan', '088948388888', 'Guru', '2004-03-13', 'PATI', 'SMA', '2023-09-06 05:57:37', '2023-09-06 05:57:37'),
(14, 47, '3318027005000001', 'SITI KHALIFAH', NULL, 'Perempuan', '088948388888', 'Guru', '2000-05-30', 'PATI', 'SMA', '2023-09-06 05:58:32', '2023-09-06 05:58:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guru_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kelompok_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sabtu` varchar(191) NOT NULL,
  `sub_sabtu` varchar(191) DEFAULT NULL,
  `ket_sabtu` varchar(191) DEFAULT NULL,
  `minggu` varchar(191) NOT NULL,
  `sub_minggu` varchar(191) DEFAULT NULL,
  `ket_minggu` varchar(191) DEFAULT NULL,
  `senin` varchar(191) NOT NULL,
  `sub_senin` varchar(191) DEFAULT NULL,
  `ket_senin` varchar(191) DEFAULT NULL,
  `selasa` varchar(191) NOT NULL,
  `sub_selasa` varchar(191) DEFAULT NULL,
  `ket_selasa` varchar(191) DEFAULT NULL,
  `rabu` varchar(191) NOT NULL,
  `sub_rabu` varchar(191) DEFAULT NULL,
  `ket_rabu` varchar(191) DEFAULT NULL,
  `kamis` varchar(191) NOT NULL,
  `sub_kamis` varchar(191) DEFAULT NULL,
  `ket_kamis` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `guru_id`, `kelompok_id`, `sabtu`, `sub_sabtu`, `ket_sabtu`, `minggu`, `sub_minggu`, `ket_minggu`, `senin`, `sub_senin`, `ket_senin`, `selasa`, `sub_selasa`, `ket_selasa`, `rabu`, `sub_rabu`, `ket_rabu`, `kamis`, `sub_kamis`, `ket_kamis`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 'lingkunganku', 'membuang sampah pada tempatnya', NULL, 'lingkunganku', 'mendeskripsikan gunung', NULL, 'Alam semesta', 'bercerita akibat dari bencana alam', NULL, 'lingkunganku', 'membedakan sampah organik dan anorganik', NULL, 'kesenian', 'membuat kerajinan sulam', 'membawa benang dan jarum sulam', 'kebangsaan', 'menyanyikan lagu kebangsaan indonesia raya', NULL, '2023-09-05 15:23:00', '2023-09-05 15:23:00'),
(3, 6, 2, 'lingkunganku', 'membersihkan lingkungan sekolah', 'membawa alat kebersihan', 'kesenian', 'menggambar batik', 'membawa pensil warna dan buku gambar', 'kebangsaan', 'menyanyikan lagu garuda pancasila', '-', 'agama', 'memahami arti rukun iman', '-', 'kesenian', 'latihan menari tradisional', 'membawa sampur/selendang tari', 'Alam semesta', 'bercerita tentang gunung', '-', '2023-09-05 21:58:44', '2023-10-24 04:31:51'),
(4, 4, 1, 'lingkunganku', 'membersihkan lingkungan sekolah', 'membawa sapu lidi', 'kesenian', 'menggambar pemandangan pantai', 'membawa pensil, penghapus dan buku gambar', 'kesenian', 'mewarnai pemandangan pantai', 'membawa pensil warna dan buku gambar', 'kebangsaan', 'menyanyikan lagu indonesia raya', '-', 'agama', 'menyebutkan rukun iman', '-', 'lingkunganku', 'membuat vas bunga dari botol bekas', 'membawa gunting, lem kertas, dan kertas warna', '2023-09-06 04:59:48', '2023-10-18 13:21:39'),
(5, 10, 3, 'Alam semesta', 'menceritakan suasana pantai', '-', 'kesenian', 'membuat kerajinan dari kertas', 'membawa kertas warna, gunting, dan lem kertas', 'lingkunganku', 'menjaga kebersihan lingkungan', '-', 'kebangsaan', 'menyebutkan pancasila', '-', 'lingkunganku', 'membedakan sampah organik dan anorganik', '-', 'kesenian', 'belajar kesenian merajut', 'membawa alat untuk merajut', '2023-09-08 03:27:48', '2023-09-08 03:27:48'),
(6, 14, 4, 'lingkunganku', 'mengumpulkan botol bekas untuk didaur ulang', '-', 'kesenian', 'membuat kerajinan pot dari botol bekas', 'membawa gunting, lem, dan kertas krep', 'kebangsaan', 'menyanyikan lagu garuda pancasila', '-', 'Alam semesta', 'menggambar gunung meletus', 'membawa buku gambar, pensil dan penghapus', 'agama', 'belajar memahami arti rukun iman', '-', 'Alam semesta', 'mewarnai gambar gunung meletus', 'membawa pensil warna', '2023-10-16 03:49:45', '2023-10-18 13:20:29'),
(8, 7, 5, 'Alam semesta', 'menceritakan keindahan alam', NULL, 'lingkunganku', 'membuat kerajinan pot dari botol bekas', 'membawa botol bekas, lem, kertas hias dan gunting', 'lingkunganku', 'menjaga kebersihan lingkungan', '-', 'kesenian', 'menyanyikan lagu indonesia raya', '-', 'kebangsaan', 'menyebutkan pancasila', '-', 'agama', 'memahami rukun iman', '-', '2023-11-24 17:12:07', '2023-11-24 17:12:07'),
(9, 9, 8, 'kesenian', 'membersihkan lingkungan sekolah', NULL, 'lingkunganku', 'membuat kerajinan pot dari botol bekas', NULL, 'Alam semesta', 'menjaga kebersihan lingkungan', NULL, 'agama', 'menggambar gunung meletus', NULL, 'kebangsaan', 'menyebutkan nama binatang pemakan daging', NULL, 'agama', 'mewarnai gambar gunung meletus', NULL, '2023-11-24 19:11:22', '2023-11-24 19:11:22'),
(10, 5, 6, 'Alam semesta', 'membersihkan lingkungan sekolah', NULL, 'lingkunganku', 'Siswa membersihkan lingkungan kelas', NULL, 'agama', 'memahami rukun iman', NULL, 'agama', 'menghafalkan rukun iman', NULL, 'lingkunganku', 'membuat kerajinan dari limbah', 'limbah plastik', 'kesenian', 'menari tarian tradisional', NULL, '2023-11-25 01:29:02', '2023-11-25 01:29:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelompok`
--

CREATE TABLE `kelompok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_id` bigint(20) UNSIGNED DEFAULT NULL,
  `guru_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nama_kelompok` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kelompok`
--

INSERT INTO `kelompok` (`id`, `tahun_id`, `guru_id`, `nama_kelompok`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'A-01', '2023-09-05 13:51:05', '2023-09-05 13:51:05'),
(2, 2, 5, 'A-02', '2023-09-05 13:51:23', '2023-09-05 13:51:23'),
(3, 2, 4, 'A-03', '2023-09-05 13:51:43', '2023-09-05 13:51:43'),
(4, 2, 8, 'B-01', '2023-09-06 05:36:23', '2023-09-06 05:36:23'),
(5, 2, 12, 'B-02', '2023-09-08 03:17:20', '2023-09-08 03:17:20'),
(6, 2, 10, 'B-03', '2023-10-15 14:00:32', '2023-10-15 14:00:32'),
(8, 2, 6, 'A-Satu', '2023-11-24 19:08:47', '2023-11-24 19:08:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `likes`
--

CREATE TABLE `likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pesan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_07_02_161111_create_siswas_table', 1),
(4, '2023_07_02_161217_create_gurus_table', 1),
(5, '2023_07_02_161424_create_kelompoks_table', 1),
(6, '2023_07_07_085231_create_perkembangans_table', 1),
(7, '2023_07_07_090012_create_temas_table', 1),
(8, '2023_07_08_122519_create_pesans_table', 1),
(9, '2023_07_11_164430_create_reports_table', 1),
(10, '2023_07_14_135010_detail_perkembangan', 1),
(11, '2023_07_16_055000_create_ratings_table', 1),
(12, '2023_07_18_150308_create_jadwal_table', 1),
(13, '2023_08_05_123910_create_tahun', 1),
(14, '2023_09_05_110529_create_detail_report', 1),
(15, '2023_09_05_111251_add_field_to_table_reports', 1),
(16, '2023_11_29_003821_create_semesters_table', 2),
(17, '2023_11_29_192703_add_semester_to_perkembangan', 3),
(18, '2023_11_30_204549_add_pertemuan_to_tema', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perkembangan`
--

CREATE TABLE `perkembangan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `guru_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tema_id` bigint(20) UNSIGNED DEFAULT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `semester` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perkembangan`
--

INSERT INTO `perkembangan` (`id`, `siswa_id`, `guru_id`, `tema_id`, `keterangan`, `tanggal`, `created_at`, `updated_at`, `semester`) VALUES
(1, 5, 1, 1, '<div>jsdkdhudh dbwwgd dbk</div>', '2023-09-06', '2023-09-05 17:51:00', '2023-09-05 17:51:00', 'Gasal 2022/2023'),
(2, 5, 1, 1, '<div>&nbsp;bjafk bkgfa</div>', '2023-09-06', '2023-09-05 17:57:45', '2023-09-05 17:57:45', 'Gasal 2022/2023'),
(3, 5, 1, 1, '<div>ndshda bdak</div>', '2023-09-06', '2023-09-05 18:00:03', '2023-09-05 18:00:03', 'Gasal 2022/2023'),
(4, 5, 1, 3, '<div>vxjashd vhadh</div>', '2023-09-06', '2023-09-05 18:11:19', '2023-09-05 18:11:19', 'Gasal 2022/2023'),
(5, 2, 1, 1, '<div>ndajhd bdasgsdu</div>', '2023-09-06', '2023-09-05 18:21:03', '2023-09-05 18:21:03', 'Gasal 2022/2023'),
(6, 5, 1, 1, '<div>nsdfs basasdka</div>', '2023-09-06', '2023-09-05 18:29:50', '2023-09-05 18:29:50', 'Gasal 2022/2023'),
(7, 4, 1, 1, '<div>selamat siang bapak/ibu, melly hari ini menjadi anak pemberani. melly bercerita didepan kelas bersama teman-teman terjadinya banjir</div>', '2023-08-30', '2023-09-05 21:01:22', '2023-09-05 21:01:22', 'Gasal 2022/2023'),
(8, 4, 1, 1, '<div>Selamat siang ibu/bapak, hari ini melly mendengarkan ceritanya ibu guru tentang tebentunya ombak di laut</div>', '2023-08-23', '2023-09-05 21:07:37', '2023-09-05 21:07:37', 'Gasal 2022/2023'),
(9, 4, 1, 1, '<div>Selamat Siang ibu/bapak, meli menggambar pegunungan dan pohon hijau bersama teman-teman</div>', '2023-09-06', '2023-09-05 21:10:10', '2023-09-05 21:10:10', 'Gasal 2022/2023'),
(10, 4, 1, 3, '<div>selamat siang ibu/bapak, melly belajar menari dengan menggerakkan tangan dan kaki mengikuti ketukan nadanya ibu guru</div>', '2023-09-06', '2023-09-05 21:13:07', '2023-09-05 21:13:07', 'Gasal 2022/2023'),
(11, 8, 5, 1, '<div>Selamat siang ibu/bapak, alya hari ini menceritakan kesannya selama jalan-jalan digunung muria</div>', '2023-09-06', '2023-09-05 22:17:35', '2023-09-05 22:17:35', 'Gasal 2022/2023'),
(12, 8, 5, 2, '<div>selamat siang ibu/bapak, hari ini alya dan teman-teman membersikan ruang kelas</div>', '2023-09-07', '2023-09-05 22:19:04', '2023-09-05 22:19:04', 'Gasal 2022/2023'),
(13, 8, 5, 1, '<div>Selamat siang ibu/bapak, alya belajar diluar ruang kelas sambil menikmati udara segar</div>', '2023-08-30', '2023-09-05 22:20:13', '2023-09-05 22:20:13', 'Gasal 2022/2023'),
(14, 8, 5, 1, '<div>Selamat siang ibu/bapak,, har ini alya belajar tentang air laut</div>', '0000-00-00', '2023-09-05 22:21:26', '2023-09-05 22:21:26', 'Gasal 2022/2023'),
(15, 8, 5, 2, '<div>Selamat siang ibu / bapak,, aliya sudah bisa membedakan sampah organik dan anorganik</div>', '2023-08-31', '2023-09-05 22:22:36', '2023-09-05 22:22:36', 'Gasal 2022/2023'),
(16, 8, 5, 2, '<div>Alya tadi disekolah menggambar pemandangan gunung yang berwarna hijau</div>', '2023-08-24', '2023-09-05 22:23:55', '2023-09-05 22:23:55', 'Gasal 2022/2023'),
(17, 8, 5, 3, '<div>aliya tadi disekolah menari sambil memainkan sampurnya</div>', '2023-09-05', '2023-09-05 22:25:03', '2023-09-05 22:25:03', 'Gasal 2022/2023'),
(18, 6, 5, 1, '<div>selamat pagi bapak/ibu hari ini nisa bercerita didepan kelas bersama teman-temannya mengenai kesannya ketika berlirur di gunung rahtawu</div>', '2023-09-05', '2023-09-06 00:38:13', '2023-09-06 00:38:13', 'Gasal 2022/2023'),
(19, 9, 5, 1, '<div>selamat pagi bapak/ibu hari ini nisa bercerita didepan kelas bersama teman-temannya mengenai kesannya ketika berlirur di gunung bromo</div>', '2023-09-05', '2023-09-06 00:39:03', '2023-09-06 00:39:03', 'Gasal 2022/2023'),
(20, 10, 5, 1, '<div>selamat pagi bapak/ibu hari ini nisa bercerita didepan kelas bersama teman-temannya mengenai kesannya ketika berlibur di rumah nenek</div>', '2023-09-05', '2023-09-06 00:40:18', '2023-09-06 00:40:18', 'Gasal 2022/2023'),
(21, 10, 5, 2, '<div>selamat siang ibu/bapak tadi disekolah maulana membersihkan lingkuhan kelas bersama teman-teman</div>', '2023-09-04', '2023-09-06 00:41:41', '2023-09-06 00:41:41', 'Gasal 2022/2023'),
(22, 6, 5, 2, '<div>selamat siang ibu/bapak tadi disekolah nisa membersihkan lingkuhan kelas bersama teman-teman</div>', '2023-09-04', '2023-09-06 00:42:34', '2023-09-06 00:42:34', 'Gasal 2022/2023'),
(23, 7, 5, 2, '<div>selamat siang ibu/bapak tadi disekolah aulia membersihkan lingkuhan kelas bersama teman-teman</div>', '2023-09-04', '2023-09-06 00:43:49', '2023-09-06 00:43:49', 'Gasal 2022/2023'),
(24, 8, 5, 2, '<div>selamat siang ibu/bapak tadi disekolah alya membersihkan lingkuhan kelas bersama teman-teman</div>', '2023-09-04', '2023-09-06 00:44:40', '2023-09-06 00:44:40', 'Gasal 2022/2023'),
(25, 9, 5, 2, '<div>selamat siang ibu/bapak tadi disekolah maulana membersihkan lingkuhan kelas bersama teman-teman</div>', '2023-09-04', '2023-09-06 00:45:27', '2023-09-06 00:45:27', 'Gasal 2022/2023'),
(26, 4, 1, 2, '<div>selamat siang ibu/bapak tadi disekolah melly membersihkan lingkuhan kelas bersama teman-teman</div>', '2023-09-05', '2023-09-06 00:51:11', '2023-09-06 00:51:11', 'Gasal 2022/2023'),
(27, 17, 1, 2, '<div>selamat siang ibu/bapak tadi disekolah akhthar membersihkan lingkuhan kelas bersama teman-teman</div>', '2023-09-05', '0000-00-00 00:00:00', '2023-09-06 00:52:09', 'Gasal 2022/2023'),
(28, 4, 1, 2, '<div>selamat siang ibu/bapak tadi disekolah melly membuat pot bunga berwarna dari botol aqua bekas</div>', '2023-08-29', '2023-09-06 00:53:39', '2023-09-06 00:53:39', 'Gasal 2022/2023'),
(29, 4, 1, 2, '<div>selamat siang ibu/bapak tadi disekolah melly menggambar gunung yang bersih tanpa sampah</div>', '2023-08-22', '2023-09-06 00:54:40', '2023-09-06 00:54:40', 'Gasal 2022/2023'),
(30, 4, 1, 2, '<div>selamat siang ibu/bapak tadi disekolah melly menggambar banjir akibat buang sampah sembarangan. Ada yang yang mengungsi diatas genteng</div>', '2023-08-15', '2023-09-06 00:55:56', '2023-09-06 00:55:56', 'Gasal 2022/2023'),
(31, 4, 1, 4, '<div>tadi disekolah melly membuat kolase ikan bersisik menggunakan daun mangga</div>', '2023-09-03', '2023-09-06 00:57:47', '2023-09-06 00:57:47', 'Gasal 2022/2023'),
(32, 4, 1, 4, '<div>melly disekolah melihat bentuk sisik ikan nila. sisiknya banyak sekali</div>', '2023-08-27', '2023-09-06 00:59:06', '2023-09-06 00:59:06', 'Gasal 2022/2023'),
(33, 19, 1, 1, '<div>smws,qsgsq</div>', '2023-09-06', '2023-09-07 04:29:45', '2023-09-07 04:29:45', 'Gasal 2022/2023'),
(34, 5, 1, 3, '<div>Hari ini disekolah zakki dan teman-teman belajar menggambar. Zakki lebih aktif dari pertemuan sebelumnya</div>', '2023-09-07', '2023-09-07 15:04:53', '2023-09-07 15:04:53', 'Gasal 2022/2023'),
(35, 5, 1, 3, '<div>hari ini disekolah zakki sangat aktif ayah/bunda. zaki sudah tidak malu bertanya</div>', '2023-09-07', '2023-09-07 18:53:58', '2023-09-07 18:53:58', 'Gasal 2022/2023'),
(36, 16, 1, 2, '<div>hallo ayah/bunda, talita dan teman-teman hari ini belajar membuat kolase pohon. Talita juga membantu temannya menyelesaikan karyanya</div>', '2023-09-08', '2023-09-08 18:39:24', '2023-09-08 18:39:24', 'Gasal 2022/2023'),
(37, 33, 1, 5, '<div>hari ini abhi menyanyikan lagu pancasila dengan semangat</div>', '2023-10-08', '2023-10-16 04:22:37', '2023-10-16 04:22:37', 'Gasal 2022/2023'),
(38, 33, 1, 4, '<div>hari ini abhi belajar mengenal macam-macam rukun iman</div>', '2023-10-09', '2023-10-16 04:25:21', '2023-10-16 04:25:21', 'Gasal 2022/2023'),
(39, 33, 1, 4, '<div>abhi sudah bisa memahami rukun iman dengan baik bund</div>', '2023-10-02', '2023-10-16 04:26:42', '2023-10-16 04:26:42', 'Gasal 2022/2023'),
(40, 33, 1, 4, '<div>abhi hari ini belajar bertoleransi bersama teman-teman dikelas</div>', '2023-10-16', '2023-10-16 04:28:49', '2023-10-16 04:28:49', 'Gasal 2022/2023'),
(41, 33, 1, 5, '<div>selamat siang ibu/bapak,, hari ini abhi bernyanyi lagu kebangsaan indonesia raya dengan penuh semangat</div>', '2023-10-01', '2023-10-16 04:30:44', '2023-10-16 04:30:44', 'Gasal 2022/2023'),
(42, 33, 1, 5, '<div>selamat siang ibu bapak,. hari ini abhi dan teman-teman belajar menyebutkan 5 pancasila</div>', '2023-09-24', '2023-10-16 04:32:17', '2023-10-16 04:32:17', 'Gasal 2022/2023'),
(43, 33, 1, 5, '<div>selamat siang ibu,, hari ini ibu guru menceritakan tentang pancasila dan abhi mendengarkan dengan baik</div>', '2023-09-17', '2023-10-16 04:42:54', '2023-10-16 04:42:54', 'Gasal 2022/2023'),
(44, 33, 1, 1, '<div>selamat siang ibu/bapak,, hari ini abhi belajar membuat kolase pohon menggunakan kertas hias</div>', '2023-09-12', '2023-10-16 05:01:32', '2023-10-16 05:01:32', 'Gasal 2022/2023'),
(45, 33, 1, 1, '<div>selamat siang ibu/bapak,, hari ini abhi memahami dan mendengarkan cerita dari ibu guru</div>', '2023-09-19', '2023-10-16 05:03:23', '2023-10-16 05:03:23', 'Gasal 2022/2023'),
(46, 33, 1, 1, '<div>selamat siang ibu/bapak,, hari ini abhi sangat aktif. abhi membantu teman untuk menyelesaikan kreasinya</div>', '2023-09-26', '2023-10-16 05:10:47', '2023-10-16 05:10:47', 'Gasal 2022/2023'),
(47, 33, 1, 2, '<div>selamat siang ibu/bapak.. hari ini abhi belajar manfaat udara segar dengan bermain balon</div>', '2023-09-13', '2023-10-16 05:13:43', '2023-10-16 05:13:43', 'Gasal 2022/2023'),
(48, 33, 1, 2, '<div>selamar siang ibu/bapak,, pagi tadi disekolah abhi dan teman-teman memasukkan udara kedalam balon kuning dengan cara meniupnya</div>', '2023-09-20', '2023-10-16 05:16:08', '2023-10-16 05:16:08', 'Gasal 2022/2023'),
(49, 33, 1, 2, '<div>selamat siang ibu/bapak,, tadi pagi abhi mendengarkan cerita dari ibu guru. abhi berani mengajukan satu pertanyaan tentang cara menjaga kebersihan lingkungan</div>', '2023-09-27', '2023-10-16 05:18:28', '2023-10-16 05:18:28', 'Gasal 2022/2023'),
(50, 33, 1, 2, '<div>selamat siang ibu/bapak,, hari ini abhi dan teman-teman bersih-bersih lingkungan sekolah</div>', '2023-10-04', '2023-10-16 05:25:26', '2023-10-16 05:25:26', 'Gasal 2022/2023'),
(51, 33, 1, 3, '<div>selamat seang ibu/bapak,, abhi tadi bercerita bersama teman dikelas tentang kegiatan liburan. tapi abhi masih malu-malu</div>', '2023-09-14', '2023-10-16 05:30:18', '2023-10-16 05:30:18', 'Gasal 2022/2023'),
(52, 33, 1, 3, '<div>selamat siang ibu/bapak.. tadi pagi ibu guru mengajari cara mewarnai dengan baik. dan abhi sangat aktif bertanya kepada ibu guru</div>', '2023-09-21', '2023-10-16 05:32:53', '2023-10-16 05:32:53', 'Gasal 2022/2023'),
(53, 33, 1, 3, '<div>selamat siang ibu/bapak,, tadi pagi ketika disekolah abhi dan teman-teman belajar menulis huruf hijaiyah</div>', '2023-09-28', '2023-10-16 05:34:48', '2023-10-16 05:34:48', 'Gasal 2022/2023'),
(54, 78, 1, 4, '<div>Selamat siang ibu/bapak, Ananda hari ini mendengarkan ibu guru bercerita tentang rukun iman dan ananda mendengarkan dengan baik.<br><br></div>', '2023-09-10', '2023-10-18 13:04:48', '2023-10-18 13:04:48', 'Gasal 2022/2023'),
(55, 33, 1, 4, '<div>Selamat siang ibu/bapak, Ananda hari ini mendengarkan ibu guru bercerita tentang rukun iman dan ananda mendengarkan dengan baik.<br><br></div>', '2023-10-08', '2023-10-18 13:07:13', '2023-10-18 13:07:13', 'Gasal 2022/2023'),
(56, 33, 1, 2, '<div>Selamat siang ibu/bapak, tadi pagi ada kegiatan kebersihan disekolah. Ananda dan teman-teman membersihkan lingkungan sekolah. Ananda mengambil daun-daun yang berserakan dan membuangnya ditempat sampah.<br><br></div>', '2023-10-16', '2023-10-18 13:08:44', '2023-10-18 13:08:44', 'Gasal 2022/2023'),
(57, 33, 1, 5, '<div>selamat siang ibu,, hari ini ibu guru menceritakan tentang pancasila dan abhi mendengarkan dengan baik<br><br></div>', '2023-10-03', '2023-10-18 13:12:29', '2023-10-18 13:12:29', 'Gasal 2022/2023'),
(58, 33, 1, 3, '<div>&nbsp;Selamat siang ibu/bapak,.. tadi ananda membuat kolase dari daun-daun kering<br><br></div>', '2023-10-03', '2023-10-18 13:13:28', '2023-10-18 13:13:28', 'Gasal 2022/2023'),
(59, 110, 6, 1, '<div>ndhahroi</div>', '2023-11-30', '2023-11-24 20:25:10', '2023-11-24 20:25:10', 'Gasal 2022/2023'),
(60, 71, 1, 1, '<div>adzkiya belajar menceritakan tentang alam</div>', '2023-11-25', '2023-11-25 01:33:43', '2023-11-25 01:33:43', 'Gasal 2022/2023'),
(72, 19, 1, 1, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-29', '2023-11-29 16:12:02', '2023-11-29 16:12:02', 'Gasal 2022/2023'),
(73, 19, 1, 1, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-01', '2023-11-29 16:12:30', '2023-11-29 16:12:30', 'Gasal 2022/2023'),
(74, 19, 1, 1, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-08', '2023-11-29 16:12:38', '2023-11-29 16:12:38', 'Gasal 2022/2023'),
(75, 19, 1, 1, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-15', '2023-11-29 16:12:47', '2023-11-29 16:12:47', 'Gasal 2022/2023'),
(76, 19, 1, 1, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-22', '2023-11-29 16:12:56', '2023-11-29 16:12:56', 'Gasal 2022/2023'),
(77, 19, 1, 1, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-03', '2023-11-29 16:13:09', '2023-11-29 16:13:09', 'Gasal 2022/2023'),
(78, 19, 1, 1, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-10', '2023-11-29 16:13:29', '2023-11-29 16:13:29', 'Gasal 2022/2023'),
(79, 19, 1, 1, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-17', '2023-11-29 16:13:38', '2023-11-29 16:13:38', 'Gasal 2022/2023'),
(80, 19, 1, 2, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-06', '2023-11-29 16:14:37', '2023-11-29 16:14:37', 'Gasal 2022/2023'),
(81, 19, 1, 2, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-13', '2023-11-29 16:14:49', '2023-11-29 16:14:49', 'Gasal 2022/2023'),
(82, 19, 1, 2, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-20', '2023-11-29 16:14:59', '2023-11-29 16:14:59', 'Gasal 2022/2023'),
(83, 19, 1, 2, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-27', '2023-11-29 16:15:14', '2023-11-29 16:15:14', 'Gasal 2022/2023'),
(84, 19, 1, 3, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-07', '2023-11-29 16:15:25', '2023-11-29 16:15:25', 'Gasal 2022/2023'),
(85, 19, 1, 2, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-14', '2023-11-29 16:15:37', '2023-11-29 16:15:37', 'Gasal 2022/2023'),
(86, 19, 1, 2, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-21', '2023-11-29 16:15:50', '2023-11-29 16:15:50', 'Gasal 2022/2023'),
(87, 19, 1, 2, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-28', '2023-11-29 16:16:00', '2023-11-29 16:16:00', 'Gasal 2022/2023'),
(88, 19, 1, 3, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-09', '2023-11-29 16:16:16', '2023-11-29 16:16:16', 'Gasal 2022/2023'),
(89, 19, 1, 3, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-23', '2023-11-29 16:16:27', '2023-11-29 16:16:27', 'Gasal 2022/2023'),
(90, 19, 1, 4, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-11', '2023-11-29 16:16:43', '2023-11-29 16:16:43', 'Gasal 2022/2023'),
(91, 19, 1, 4, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-18', '2023-11-29 16:16:58', '2023-11-29 16:16:58', 'Gasal 2022/2023'),
(92, 19, 1, 4, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-25', '2023-11-29 16:17:09', '2023-11-29 16:17:09', 'Gasal 2022/2023'),
(93, 19, 1, 5, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-05', '2023-11-29 16:17:20', '2023-11-29 16:17:20', 'Gasal 2022/2023'),
(94, 19, 1, 5, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-19', '2023-11-29 16:17:32', '2023-11-29 16:17:32', 'Gasal 2022/2023'),
(95, 19, 1, 5, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-26', '2023-11-29 16:17:47', '2023-11-29 16:17:47', 'Gasal 2022/2023'),
(96, 71, 1, 1, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-08', '2023-11-29 16:18:15', '2023-11-29 16:18:15', 'Gasal 2022/2023'),
(98, 19, 1, 2, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-30', '2023-11-30 14:22:43', '2023-11-30 14:22:43', 'Gasal 2022/2023'),
(99, 2, 1, 1, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-12-01', '2023-11-30 17:35:10', '2023-11-30 17:35:10', 'Gasal 2022/2023'),
(100, 2, 1, 1, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-12-01', '2023-11-30 17:35:18', '2023-11-30 17:35:18', 'Gasal 2022/2023'),
(101, 2, 1, 2, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-30', '2023-11-30 17:35:31', '2023-11-30 17:35:31', 'Gasal 2022/2023'),
(102, 2, 1, 2, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-30', '2023-11-30 17:35:41', '2023-11-30 17:35:41', 'Gasal 2022/2023'),
(103, 2, 1, 2, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-12-01', '2023-11-30 17:35:56', '2023-11-30 17:35:56', 'Gasal 2022/2023'),
(104, 2, 1, 3, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-26', '2023-11-30 17:36:08', '2023-11-30 17:36:08', 'Gasal 2022/2023'),
(105, 2, 1, 3, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-27', '2023-11-30 17:36:18', '2023-11-30 17:36:18', 'Gasal 2022/2023'),
(106, 2, 1, 3, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-28', '2023-11-30 17:36:27', '2023-11-30 17:36:27', 'Gasal 2022/2023'),
(107, 2, 1, 4, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-29', '2023-11-30 17:36:39', '2023-11-30 17:36:39', 'Gasal 2022/2023'),
(108, 2, 1, 4, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-30', '2023-11-30 17:36:56', '2023-11-30 17:36:56', 'Gasal 2022/2023'),
(109, 2, 1, 4, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-12-01', '2023-11-30 17:37:06', '2023-11-30 17:37:06', 'Gasal 2022/2023'),
(110, 2, 1, 5, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-26', '2023-11-30 17:37:18', '2023-11-30 17:37:18', 'Gasal 2022/2023'),
(111, 2, 1, 5, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-27', '2023-11-30 17:37:29', '2023-11-30 17:37:29', 'Gasal 2022/2023'),
(112, 2, 1, 5, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-11-28', '2023-11-30 17:37:40', '2023-11-30 17:37:40', 'Gasal 2022/2023'),
(113, 2, 1, 1, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div>', '2023-12-01', '2023-11-30 17:38:04', '2023-11-30 17:38:04', 'Gasal 2022/2023'),
(114, 78, 1, 1, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div><div><br></div>', '2023-11-26', '2023-11-30 17:55:43', '2023-11-30 17:55:43', 'Gasal 2022/2023'),
(115, 78, 1, 1, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div><div><br></div>', '2023-11-27', '2023-11-30 17:55:52', '2023-11-30 17:55:52', 'Gasal 2022/2023'),
(116, 78, 1, 1, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div><div><br></div>', '2023-11-28', '2023-11-30 17:55:59', '2023-11-30 17:55:59', 'Gasal 2022/2023'),
(117, 78, 1, 2, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div><div><br></div>', '2023-11-29', '2023-11-30 17:56:11', '2023-11-30 17:56:11', 'Gasal 2022/2023'),
(118, 78, 1, 2, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div><div><br></div>', '2023-11-30', '2023-11-30 17:56:22', '2023-11-30 17:56:22', 'Gasal 2022/2023'),
(119, 78, 1, 2, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div><div><br></div>', '2023-12-01', '2023-11-30 17:56:34', '2023-11-30 17:56:34', 'Gasal 2022/2023'),
(120, 78, 1, 3, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div><div><br></div>', '2023-11-26', '2023-11-30 17:56:42', '2023-11-30 17:56:42', 'Gasal 2022/2023'),
(121, 78, 1, 3, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div><div><br></div>', '2023-11-27', '2023-11-30 17:56:58', '2023-11-30 17:56:58', 'Gasal 2022/2023'),
(122, 78, 1, 3, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div><div><br></div>', '2023-11-28', '2023-11-30 17:57:11', '2023-11-30 17:57:11', 'Gasal 2022/2023'),
(123, 78, 1, 4, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div><div><br></div>', '2023-11-29', '2023-11-30 17:57:21', '2023-11-30 17:57:21', 'Gasal 2022/2023'),
(124, 78, 1, 4, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div><div><br></div>', '2023-11-27', '2023-11-30 17:57:35', '2023-11-30 17:57:35', 'Gasal 2022/2023'),
(125, 78, 1, 4, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div><div><br></div>', '2023-11-28', '2023-11-30 17:57:44', '2023-11-30 17:57:44', 'Gasal 2022/2023'),
(126, 78, 1, 5, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div><div><br></div>', '2023-11-29', '2023-11-30 17:57:55', '2023-11-30 17:57:55', 'Gasal 2022/2023'),
(127, 78, 1, 5, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div><div><br></div>', '2023-11-27', '2023-11-30 17:58:04', '2023-11-30 17:58:04', 'Gasal 2022/2023'),
(128, 78, 1, 5, '<div><strong><em>Lorem ipsum dolor</em></strong><strong> sit amet consectetur adipisicing elit.</strong><br><br>Molestiae consequatur numquam quia quibusdam <em>excepturi temporibus obcaecati illo?</em></div><div><br></div>', '2023-11-28', '2023-11-30 17:58:24', '2023-11-30 17:58:24', 'Gasal 2022/2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isi_pesan` text NOT NULL,
  `pesan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `perkembangan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id`, `isi_pesan`, `pesan_id`, `user_id`, `perkembangan_id`, `created_at`, `updated_at`) VALUES
(1, 'bagus sekali bu guru', NULL, 11, 10, '2023-09-05 21:15:22', '2023-09-05 21:15:22'),
(2, 'melly menggambarnya bagus bu guru, terimakasih sudah diajari menggambar', NULL, 11, 9, '2023-09-05 21:17:35', '2023-09-05 21:17:35'),
(4, 'wahh semangat belajar hal baru melly ', NULL, 4, 32, '2023-09-06 14:24:01', '2023-09-06 14:24:01'),
(5, 'hjj', NULL, 2, 33, '2023-09-07 13:05:18', '2023-09-07 13:05:18'),
(6, 'Terimakasih bu guru. Zaki sekarang tidak pemurung lagi', NULL, 12, 34, '2023-09-07 15:08:08', '2023-09-07 15:08:08'),
(7, 'terimakasih bu guru dirumah juga sekarang zaki sudah tidak murung lagi', NULL, 12, 35, '2023-09-07 19:02:51', '2023-09-07 19:02:51'),
(8, 'jdb', NULL, 4, 35, '2023-09-08 09:13:07', '2023-09-08 09:13:07'),
(9, 'Terimakasih bu guru sudah mengajari talita membuat kolase', NULL, 23, 36, '2023-09-08 18:42:29', '2023-09-08 18:42:29'),
(10, 'Iyaa sama-sama. Mohon bantuannya juga untuk perkembangan talita selama dirumah', NULL, 2, 36, '2023-09-08 18:45:01', '2023-09-08 18:45:01'),
(11, 'Iya bu guru pasti. Dipantau terus untuk perkembangannya talita', NULL, 23, 36, '2023-09-08 18:47:22', '2023-09-08 18:47:22'),
(12, 'Terimakasih ibu guru. Abhi sekarang makin kreatif', NULL, 48, 58, '2023-11-24 18:05:59', '2023-11-24 18:05:59'),
(13, 'Abhi disekolah sudah mulai aktif atau masih murung bu guru?', NULL, 48, 57, '2023-11-24 18:07:20', '2023-11-24 18:07:20'),
(14, 'wahh iya, pantas saja tadi pagi abhi mencari sapu lidi sebelum berangkat kesekolah  hehehe', NULL, 48, 56, '2023-11-24 18:08:36', '2023-11-24 18:08:36'),
(15, 'anak saya tadi aktif bertanya ya bu?', NULL, 48, 55, '2023-11-24 18:09:40', '2023-11-24 18:09:40'),
(16, 'iyaa. abhi sekarang sudah semakin aktif', NULL, 2, 58, '2023-11-24 19:02:33', '2023-11-24 19:02:33'),
(17, 'wokeee', NULL, 2, 54, '2023-11-30 17:07:09', '2023-11-30 17:07:09'),
(18, 'Selamat siang ibu/bapak', NULL, 2, 54, '2023-11-30 17:24:11', '2023-11-30 17:24:11'),
(19, 'yess', NULL, 2, 35, '2024-01-29 09:42:30', '2024-01-29 09:42:30'),
(20, 'Woke bu guru', NULL, 4, 35, '2024-01-29 10:05:35', '2024-01-29 10:05:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `siswa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `guru_id` bigint(20) UNSIGNED DEFAULT NULL,
  `semester` varchar(191) DEFAULT NULL,
  `nilai_agama` text NOT NULL,
  `motorik` text NOT NULL,
  `kognitif` text NOT NULL,
  `sosial` text NOT NULL,
  `bahasa` text NOT NULL,
  `seni` text NOT NULL,
  `status` enum('diterima','ditolak','menunggu') NOT NULL DEFAULT 'menunggu',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `saran` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `reports`
--

INSERT INTO `reports` (`id`, `siswa_id`, `guru_id`, `semester`, `nilai_agama`, `motorik`, `kognitif`, `sosial`, `bahasa`, `seni`, `status`, `created_at`, `updated_at`, `saran`) VALUES
(23, 19, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>AISHILA ROMEESA FARZANA </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai AISHILA ROMEESA FARZANA yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>AISHILA ROMEESA FARZANA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>AISHILA ROMEESA FARZANA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>AISHILA ROMEESA FARZANA </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>AISHILA ROMEESA FARZANA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>AISHILA ROMEESA FARZANA </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div>&nbsp;</div>', 'diterima', '2023-09-07 13:04:22', '2023-11-24 17:23:45', 'tambahkan foto pada perkembangan seni'),
(24, 2, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>MAULIDINA AYSILA HUSNA </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai MAULIDINA AYSILA HUSNA yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>MAULIDINA AYSILA HUSNA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>MAULIDINA AYSILA HUSNA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>MAULIDINA AYSILA HUSNA </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li></ol><div>&nbsp;</div>', 'menunggu', '2023-09-07 15:25:00', '2023-11-30 18:04:40', 'tambahkan foto lagi'),
(25, 4, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>MELLY HIKMATUL AMAH </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai MELLY HIKMATUL AMAH yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>MELLY HIKMATUL AMAH </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>MELLY HIKMATUL AMAH </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>MELLY HIKMATUL AMAH </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>MELLY HIKMATUL AMAH </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol>', 'ditolak', '2023-09-07 15:34:01', '2023-11-24 20:55:10', 'tambahkan foto pada perkembangan seni'),
(26, 17, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>MUHAMAD AKHTHAR FAUZAN AL GHIFARI </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai MUHAMAD AKHTHAR FAUZAN AL GHIFARI yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>MUHAMAD AKHTHAR FAUZAN AL GHIFARI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>MUHAMAD AKHTHAR FAUZAN AL GHIFARI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>MUHAMAD AKHTHAR FAUZAN AL GHIFARI </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>MUHAMAD AKHTHAR FAUZAN AL GHIFARI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>MUHAMAD AKHTHAR FAUZAN AL GHIFARI </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'menunggu', '2023-09-07 15:35:06', '2023-09-07 15:35:06', NULL),
(27, 1, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>MUHAMMAD FATHIAN SHARIQ </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai MUHAMMAD FATHIAN SHARIQ yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>MUHAMMAD FATHIAN SHARIQ </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>MUHAMMAD FATHIAN SHARIQ </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>MUHAMMAD FATHIAN SHARIQ </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>MUHAMMAD FATHIAN SHARIQ </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>MUHAMMAD FATHIAN SHARIQ </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'menunggu', '2023-09-07 15:35:35', '2023-09-07 15:35:35', NULL),
(28, 20, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>MUHAMMAD VARUN ABRAHAM </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai MUHAMMAD VARUN ABRAHAM yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>MUHAMMAD VARUN ABRAHAM </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>MUHAMMAD VARUN ABRAHAM </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>MUHAMMAD VARUN ABRAHAM </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>MUHAMMAD VARUN ABRAHAM </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>MUHAMMAD VARUN ABRAHAM </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'menunggu', '2023-09-07 15:36:08', '2023-09-07 15:36:08', NULL),
(29, 5, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>AHMAD ZAKKI FUADY </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai AHMAD ZAKKI FUADY yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>AHMAD ZAKKI FUADY </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>AHMAD ZAKKI FUADY </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>AHMAD ZAKKI FUADY </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>AHMAD ZAKKI FUADY </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>AHMAD ZAKKI FUADY </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'menunggu', '2023-09-07 15:47:35', '2023-09-07 15:47:35', NULL),
(30, 33, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>ABHI CANDRA AFFAN AZRAQI </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai ABHI CANDRA AFFAN AZRAQI yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>ABHI CANDRA AFFAN AZRAQI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>ABHI CANDRA AFFAN AZRAQI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>ABHI CANDRA AFFAN AZRAQI </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>ABHI CANDRA AFFAN AZRAQI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>ABHI CANDRA AFFAN AZRAQI </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'menunggu', '2023-11-24 17:28:00', '2023-11-24 17:28:00', NULL),
(31, 62, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>UMAR YAZID AL AFGHONI </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai UMAR YAZID AL AFGHONI yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>UMAR YAZID AL AFGHONI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>UMAR YAZID AL AFGHONI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>UMAR YAZID AL AFGHONI </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>UMAR YAZID AL AFGHONI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>UMAR YAZID AL AFGHONI </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'menunggu', '2023-11-24 17:32:33', '2023-11-24 17:32:33', NULL),
(32, 77, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>RIZKI FATHAN SAPUTRA </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai RIZKI FATHAN SAPUTRA yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>RIZKI FATHAN SAPUTRA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>RIZKI FATHAN SAPUTRA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>RIZKI FATHAN SAPUTRA </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>RIZKI FATHAN SAPUTRA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>RIZKI FATHAN SAPUTRA </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'ditolak', '2023-11-24 17:34:24', '2023-11-24 18:59:58', 'tambahkan foto pada aktivits kognitif'),
(33, 21, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>RIANI MUTIA AZZAHRA </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai RIANI MUTIA AZZAHRA yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>RIANI MUTIA AZZAHRA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>RIANI MUTIA AZZAHRA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>RIANI MUTIA AZZAHRA </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>RIANI MUTIA AZZAHRA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>RIANI MUTIA AZZAHRA </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'menunggu', '2023-11-24 17:36:32', '2023-11-24 17:36:32', NULL),
(34, 68, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>SHANUM ANDARA PUTRI </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai SHANUM ANDARA PUTRI yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>SHANUM ANDARA PUTRI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>SHANUM ANDARA PUTRI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>SHANUM ANDARA PUTRI </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>SHANUM ANDARA PUTRI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>SHANUM ANDARA PUTRI </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'menunggu', '2023-11-24 17:37:02', '2023-11-24 17:37:02', NULL),
(35, 63, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>RATNA ALISYA SAPUTRI </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai RATNA ALISYA SAPUTRI yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>RATNA ALISYA SAPUTRI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>RATNA ALISYA SAPUTRI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>RATNA ALISYA SAPUTRI </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>RATNA ALISYA SAPUTRI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>RATNA ALISYA SAPUTRI </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'menunggu', '2023-11-24 17:40:02', '2023-11-24 17:40:02', NULL);
INSERT INTO `reports` (`id`, `siswa_id`, `guru_id`, `semester`, `nilai_agama`, `motorik`, `kognitif`, `sosial`, `bahasa`, `seni`, `status`, `created_at`, `updated_at`, `saran`) VALUES
(36, 71, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>ADZKIYA NAYYARA SYAQUILA </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai ADZKIYA NAYYARA SYAQUILA yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>ADZKIYA NAYYARA SYAQUILA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>ADZKIYA NAYYARA SYAQUILA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>ADZKIYA NAYYARA SYAQUILA </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>ADZKIYA NAYYARA SYAQUILA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>ADZKIYA NAYYARA SYAQUILA </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'menunggu', '2023-11-24 18:32:15', '2023-11-24 18:32:15', NULL),
(37, 64, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>ALIYYA NABILA ZAHRO </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai ALIYYA NABILA ZAHRO yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>ALIYYA NABILA ZAHRO </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>ALIYYA NABILA ZAHRO </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>ALIYYA NABILA ZAHRO </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>ALIYYA NABILA ZAHRO </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>ALIYYA NABILA ZAHRO </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'menunggu', '2023-11-24 18:33:06', '2023-11-24 18:33:06', NULL),
(38, 72, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>ALMAHYRA MISHALL QIRANI </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai ALMAHYRA MISHALL QIRANI yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>ALMAHYRA MISHALL QIRANI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>ALMAHYRA MISHALL QIRANI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>ALMAHYRA MISHALL QIRANI </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>ALMAHYRA MISHALL QIRANI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>ALMAHYRA MISHALL QIRANI </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'menunggu', '2023-11-24 18:34:23', '2023-11-24 18:34:23', NULL),
(39, 65, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>ATIKA NURIL MAULIDA </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai ATIKA NURIL MAULIDA yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>ATIKA NURIL MAULIDA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>ATIKA NURIL MAULIDA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>ATIKA NURIL MAULIDA </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>ATIKA NURIL MAULIDA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>ATIKA NURIL MAULIDA </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'menunggu', '2023-11-24 18:35:00', '2023-11-24 18:35:00', NULL),
(40, 70, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>CEISYA ALMAHIRA PUTRI </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai CEISYA ALMAHIRA PUTRI yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>CEISYA ALMAHIRA PUTRI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>CEISYA ALMAHIRA PUTRI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>CEISYA ALMAHIRA PUTRI </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>CEISYA ALMAHIRA PUTRI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>CEISYA ALMAHIRA PUTRI </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'menunggu', '2023-11-24 18:35:42', '2023-11-24 18:35:42', NULL),
(41, 67, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>GENNARO FAHLEFI AL FARIZQI </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai GENNARO FAHLEFI AL FARIZQI yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>GENNARO FAHLEFI AL FARIZQI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>GENNARO FAHLEFI AL FARIZQI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>GENNARO FAHLEFI AL FARIZQI </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>GENNARO FAHLEFI AL FARIZQI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>GENNARO FAHLEFI AL FARIZQI </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'menunggu', '2023-11-24 18:36:49', '2023-11-24 18:36:49', NULL),
(42, 69, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>IMAM AHMAD AZKA AL ABBAS </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai IMAM AHMAD AZKA AL ABBAS yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>IMAM AHMAD AZKA AL ABBAS </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>IMAM AHMAD AZKA AL ABBAS </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>IMAM AHMAD AZKA AL ABBAS </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>IMAM AHMAD AZKA AL ABBAS </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>IMAM AHMAD AZKA AL ABBAS </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'menunggu', '2023-11-24 18:37:30', '2023-11-24 18:37:30', NULL),
(43, 73, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>MUHAMMAD MALIK ALFARIS </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai MUHAMMAD MALIK ALFARIS yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>MUHAMMAD MALIK ALFARIS </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>MUHAMMAD MALIK ALFARIS </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>MUHAMMAD MALIK ALFARIS </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>MUHAMMAD MALIK ALFARIS </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>MUHAMMAD MALIK ALFARIS </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'menunggu', '2023-11-24 18:38:24', '2023-11-24 18:38:24', NULL),
(44, 18, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>MUTIA AZKIA AFIFAH </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai MUTIA AZKIA AFIFAH yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>MUTIA AZKIA AFIFAH </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>MUTIA AZKIA AFIFAH </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>MUTIA AZKIA AFIFAH </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>MUTIA AZKIA AFIFAH </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>MUTIA AZKIA AFIFAH </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'menunggu', '2023-11-24 18:39:26', '2023-11-24 18:39:26', NULL),
(45, 61, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>LUBNA HAYFA ALROJI </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai LUBNA HAYFA ALROJI yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>LUBNA HAYFA ALROJI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>LUBNA HAYFA ALROJI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>LUBNA HAYFA ALROJI </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>LUBNA HAYFA ALROJI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>LUBNA HAYFA ALROJI </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'menunggu', '2023-11-24 18:40:04', '2023-11-24 18:40:04', NULL),
(46, 16, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>TALITA HUSNA HUMAIRA </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai TALITA HUSNA HUMAIRA yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>TALITA HUSNA HUMAIRA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>TALITA HUSNA HUMAIRA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>TALITA HUSNA HUMAIRA </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>TALITA HUSNA HUMAIRA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>TALITA HUSNA HUMAIRA </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'menunggu', '2023-11-24 18:41:32', '2023-11-24 18:41:32', NULL),
(47, 66, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>NAELA PUTRI RAHAYU </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai NAELA PUTRI RAHAYU yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>NAELA PUTRI RAHAYU </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>NAELA PUTRI RAHAYU </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>NAELA PUTRI RAHAYU </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>NAELA PUTRI RAHAYU </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>NAELA PUTRI RAHAYU </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'menunggu', '2023-11-24 18:42:04', '2023-11-24 18:42:04', NULL),
(48, 3, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>SITI KHALISA NATHIFA </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai SITI KHALISA NATHIFA yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>SITI KHALISA NATHIFA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>SITI KHALISA NATHIFA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>SITI KHALISA NATHIFA </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>SITI KHALISA NATHIFA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>SITI KHALISA NATHIFA </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li></ol><div>&nbsp;</div>', 'menunggu', '2023-11-24 18:42:47', '2023-11-24 18:42:47', NULL);
INSERT INTO `reports` (`id`, `siswa_id`, `guru_id`, `semester`, `nilai_agama`, `motorik`, `kognitif`, `sosial`, `bahasa`, `seni`, `status`, `created_at`, `updated_at`, `saran`) VALUES
(49, 81, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>YESI ADINDA KRISTIANA PUTRI </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai YESI ADINDA KRISTIANA PUTRI yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>YESI ADINDA KRISTIANA PUTRI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>YESI ADINDA KRISTIANA PUTRI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>YESI ADINDA KRISTIANA PUTRI </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>YESI ADINDA KRISTIANA PUTRI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>YESI ADINDA KRISTIANA PUTRI </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'menunggu', '2023-11-24 18:52:13', '2023-11-24 18:52:13', NULL),
(50, 76, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>NAFISHA AZZALIA WIJAYANTI </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai NAFISHA AZZALIA WIJAYANTI yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>NAFISHA AZZALIA WIJAYANTI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>NAFISHA AZZALIA WIJAYANTI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>NAFISHA AZZALIA WIJAYANTI </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>NAFISHA AZZALIA WIJAYANTI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>NAFISHA AZZALIA WIJAYANTI </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'menunggu', '2023-11-24 18:52:51', '2023-11-24 18:52:51', NULL),
(51, 110, 6, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>ADILA TSAQIF KHOIRUNNISA </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai&nbsp;</div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>ADILA TSAQIF KHOIRUNNISA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>ADILA TSAQIF KHOIRUNNISA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>ADILA TSAQIF KHOIRUNNISA </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>ADILA TSAQIF KHOIRUNNISA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>ADILA TSAQIF KHOIRUNNISA </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol>', 'diterima', '2023-11-24 20:23:52', '2023-11-24 20:53:00', NULL),
(52, 111, 6, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>FEBRIANA SHILVI </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai FEBRIANA SHILVI yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>FEBRIANA SHILVI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>FEBRIANA SHILVI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>FEBRIANA SHILVI </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>FEBRIANA SHILVI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>FEBRIANA SHILVI </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'diterima', '2023-11-24 20:34:08', '2023-11-24 20:53:01', NULL),
(53, 109, 6, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>IMA FITRI PURNAMA SARI </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai IMA FITRI PURNAMA SARI yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>IMA FITRI PURNAMA SARI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>IMA FITRI PURNAMA SARI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>IMA FITRI PURNAMA SARI </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>IMA FITRI PURNAMA SARI </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>IMA FITRI PURNAMA SARI </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'diterima', '2023-11-24 20:35:32', '2023-11-24 20:53:02', NULL),
(55, 78, 1, 'Gasal 2022/2023', '<div>Alhamdulillah, ananda <strong>ACELIN AYUDIA MAHARDHIKA </strong>anak yang membanggakan, terlihat dari banyaknya capaian perkembangan pada semester ini tercapai <strong>sesuai harapan dan baik</strong>. Beberapa perkembangan yang dicapai ACELIN AYUDIA MAHARDHIKA yang cukup baik antara :<br><br></div><ol><li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya, keluarga, lingkungan dan binatang adalah ciptaan Allah.</li><li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab salam dengan baik.</li><li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li><li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li><li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.&nbsp;</li><li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua, cinta tanah air, kebersihan.</li></ol>', '<div>Dalam capaian perkembangan motorik ananda <strong>ACELIN AYUDIA MAHARDHIKA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan halus.</li><li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti, merangkak, melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan ditempat.</li><li>Mampu menirukan gerakan binatang.</li><li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti, menempel, mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li></ol>', '<div>Capaian perkembangan kognitif <strong>ACELIN AYUDIA MAHARDHIKA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Mengenal nama-nama hari dan bulan dengan runtut.</li><li>Mengenal bilangan angka 1- 50.</li><li>Mengenal konsep besar-kecil dan macam-macam geometri.</li><li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung kiri, miring kanan, miring kiri.</li><li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi, dan berbagai ciri-ciri yang ada di benda itu.</li><li>Mampu menghubungkan gambar dengan lambang bilangannya.</li></ol>', '<div>Ananda <strong>ACELIN AYUDIA MAHARDHIKA </strong>mampu mengenal emosi diri sendiri.<br><br></div><ol><li>Mampu membedakan barang diri sendiri dan milik orang lain.</li><li>Mampu mengerjakan tugas yang diberikan.</li><li>Membereskan peralatan sekolah sendiri.</li><li>Mampu mengungkapkan perasaan sedih atau bahagia.</li></ol>', '<div>Capaian perkembangan bahasa ananda <strong>ACELIN AYUDIA MAHARDHIKA </strong>pada semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br><br></div><ol><li>Dapat menirukan kalimat sederhana.</li><li>Mengenal huruf A-Z.</li><li>Dapat menyebutkan warna dan angka.</li><li>Menyayikan beberapa lagu anak dengan baik.</li><li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li><li>Mengenal tulisan huruf hijaiyyah.</li><li>Membaca gambar sederhana dengan bahasa sederhana.</li></ol>', '<div>Ananda <strong>ACELIN AYUDIA MAHARDHIKA </strong>cukup mampu menunjukkan karya dan aktivitas seni dengan menggunakan berbagai media. Dalam perkembangan seni yang <strong>sesuai harapan dan cukup baik</strong> adalah :<br><br></div><ol><li>Ia senang menggambar berbagai bentuk dengan sempurna.</li><li>Senang mewarnai gambar tanpa keluar garis.</li><li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li><li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li><li>Mampu menghias dinding rumah dengan daun pisang kering.</li><li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk membentuk sisik ikan.</li></ol><div><br></div>', 'menunggu', '2023-11-30 18:02:58', '2023-11-30 18:02:58', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `semesters`
--

CREATE TABLE `semesters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `semester` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `semesters`
--

INSERT INTO `semesters` (`id`, `semester`, `created_at`, `updated_at`) VALUES
(1, 'Gasal 2021/2022', '2023-11-29 12:06:08', '2023-11-29 12:06:08'),
(2, 'Genap 2021/2022', '2023-11-29 12:06:25', '2023-11-29 12:06:25'),
(3, 'Gasal 2022/2023', '2023-11-29 12:06:31', '2023-11-29 12:06:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `kelompok_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tahun_id` bigint(20) UNSIGNED DEFAULT NULL,
  `no_induk` varchar(191) DEFAULT NULL,
  `nama` varchar(191) NOT NULL,
  `tempat_lahir` varchar(191) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk_siswa` varchar(191) NOT NULL,
  `alamat` varchar(191) NOT NULL,
  `photo` text DEFAULT NULL,
  `nama_ortu` varchar(191) NOT NULL,
  `no_telp` varchar(191) NOT NULL,
  `status` enum('aktif','pindah','keluar','lulus') NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `user_id`, `kelompok_id`, `tahun_id`, `no_induk`, `nama`, `tempat_lahir`, `tgl_lahir`, `jk_siswa`, `alamat`, `photo`, `nama_ortu`, `no_telp`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 2, '3188573828', 'MUHAMMAD FATHIAN SHARIQ', 'PATI', '2018-01-26', 'Laki-Laki', 'KAYEN RT 002 RW 003 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'MUHAMAD ARIF SETIAWAN', '087832612643', 'aktif', '2023-09-05 13:12:44', '2023-09-05 13:52:41'),
(2, 9, 1, 2, '3176668805', 'MAULIDINA AYSILA HUSNA', 'PATI', '2017-12-05', 'Perempuan', 'JIMBARAN RT 003 RW 001 JIMBARAN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SUYUDI', '087832612643', 'aktif', '2023-09-05 13:15:00', '2023-09-05 13:52:41'),
(3, 10, 1, 2, '3189135854', 'SITI KHALISA NATHIFA', 'PATI', '2018-03-05', 'Perempuan', 'KAYEN RT 003 RW 002 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', 'photo-siswa/zoUeO2NnIPj2ReLreOojLB9cmTNWfaQk1nxWtIlS.jpg', 'ROFIQ', '088948388888', 'aktif', '2023-09-05 13:16:32', '2023-09-05 20:40:43'),
(4, 11, 1, 2, 'melly', 'MELLY HIKMATUL AMAH', 'PATI', '2018-05-11', 'Perempuan', 'KAYEN RT 003 RW 002 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', 'photo-siswa/BV2MN3SVWLGvqUyE2qCxYvPeBYor3jkVqKdQMPqU.jpg', 'SUHARTADI', '088948388888', 'aktif', '2023-09-05 13:18:05', '2023-10-16 07:03:56'),
(5, 12, 1, 2, '3186750976', 'AHMAD ZAKKI FUADY', 'PATI', '2018-03-11', 'Laki-Laki', 'JIMBARAN RT 002 RW 003 JIMBARAN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', 'photo-siswa/JzrniHYVfl8B8BWKBkZrvSUEzmdEKEis2eTIiALv.jpg', 'MUHAMMADUN', '088948388888', 'aktif', '2023-09-05 13:19:22', '2023-09-08 17:57:33'),
(6, 13, 2, 2, '3171967496', 'CHAIRUNNISA DWI PRAMUDIA', 'PATI', '2017-09-23', 'Perempuan', 'KAYEN RT 03 RW 03 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'MOHAMMAD HABIB', '088948388888', 'aktif', '2023-09-05 13:21:11', '2023-09-05 13:53:32'),
(7, 14, 2, 2, '3179586609', 'AULIA RAHMA IZZATUN NISA', 'PATI', '2017-10-12', 'Perempuan', 'JATIROTO RT 001 RW 003 JATIROTO, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'PARIMAN', '088948388888', 'aktif', '2023-09-05 13:22:21', '2023-09-05 13:53:32'),
(8, 15, 2, 2, '3174966532', 'ALYA AZIZAH RAFANDA EFFENDY', 'PATI', '2017-12-20', 'Perempuan', 'SUMBERSARI RT 001 RW 001 SUMBERSARI, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'HENRY EFFENDY', '088948388888', 'aktif', '2023-09-05 13:23:28', '2023-09-05 13:53:32'),
(9, 16, 2, 2, '3181606734', 'FAUZIA AKIFA RAFID', 'PATI', '2018-01-02', 'Perempuan', 'ROGOMULYO RT 005 RW 002 ROGOMULYO, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SUWAJI', '088948388888', 'aktif', '2023-09-05 13:25:17', '2023-09-05 13:53:32'),
(10, 17, 2, 2, '3170562057', 'MUHAMAD MAULANA IBRAHIM', 'PATI', '2017-08-28', 'Laki-Laki', 'KAYEN RT 007 RW 002 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'JUMADI', '088948388888', 'aktif', '2023-09-05 13:26:40', '2023-09-05 13:53:32'),
(11, 18, 3, 2, '3182719696', 'MUHAMMAD FATTAH SYAUQI AR RAHMAN', 'PATI', '2018-10-22', 'Laki-Laki', 'ROGOMULYO RT 005 RW 001 ROGOMULYO, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'WAHYU BUDIYOKO', '088948388888', 'aktif', '2023-09-05 13:28:05', '2023-09-05 13:54:18'),
(12, 19, 3, 2, '3183724058', 'MAULIDYA NURUSSYIFA', 'PATI', '2018-11-30', 'Perempuan', 'SUMBERSARI RT 007 RW 001 SUMBERSARI, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'MUSLIM', '088948388888', 'aktif', '2023-09-05 13:30:13', '2023-09-05 13:54:18'),
(13, 20, 3, 2, '3181677262', 'MUHAMAD ALFATHAN AKBAR', 'PATI', '2018-12-23', 'Laki-Laki', 'SRIKATON RT 002 RW 005 SRIKATON, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'MUHAMAD ABDUL KHALIM', '088948388888', 'aktif', '2023-09-05 13:31:26', '2023-09-05 13:54:18'),
(14, 21, 3, 2, '3195440275', 'AINAYA NAFI\'A ROHMAH', 'PATI', '2019-03-12', 'Perempuan', 'PESAGI RT 001 RW 003 PESAGI, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'HANAFI', '088948388888', 'aktif', '2023-09-05 13:47:12', '2023-09-05 13:54:18'),
(15, 22, 3, 2, '3188982576', 'KENZHI FUSENA HAIDAR', 'PATI', '2018-10-10', 'Laki-Laki', 'JIMBARAN RT 005 RW 001 JIMBARAN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'ALI WAHYUDI', '085878238278', 'aktif', '2023-09-05 13:50:26', '2023-09-05 18:25:23'),
(16, 23, 1, 2, '3174180241', 'TALITA HUSNA HUMAIRA', 'PATI', '2017-11-17', 'Perempuan', 'CENGKALSEWU RT 001 RW 006 CENGKALSEWU, SUKOLILO, PATI, JAWA TENGAH, 59172, 59172', 'photo-siswa/v7y4FQRaYWEVTXM2b8hwbrnjY5tR8oOmyDzillUd.jpg', 'MUHAMMAD NUR KHOLIS', '088948388888', 'aktif', '2023-09-05 20:45:10', '2023-09-08 18:17:14'),
(17, 24, 1, 2, '3185698439', 'MUHAMAD AKHTHAR FAUZAN AL GHIFARI', 'PATI', '2018-07-29', 'Laki-Laki', 'CENGKALSEWU RT 004 RW 005 CENGKALSEWU, SUKOLILO, PATI, JAWA TENGAH, 59172, 59172', NULL, 'M. ZAENAL HABIB', '088948388888', 'aktif', '2023-09-05 20:46:32', '2023-09-05 20:55:00'),
(18, 25, 1, 2, '3185210912', 'MUTIA AZKIA AFIFAH', 'PATI', '2018-03-28', 'Perempuan', 'TAMBAHAGUNG RT 006 RW 004 TAMBAHAGUNG, TAMBAKROMO, PATI, JAWA TENGAH, 59174, 59174', NULL, 'AFIF SYAIFUDDIN', '088948388888', 'aktif', '2023-09-05 20:47:56', '2023-09-05 20:55:00'),
(19, 26, 1, 2, '3189803868', 'AISHILA ROMEESA FARZANA', 'PATI', '2018-02-21', 'Perempuan', 'KEDU RT 002 RW 004 KEDUMULYO, SUKOLILO, PATI, JAWA TENGAH, 59172, 59172', NULL, 'SALIMAN', '088948388888', 'aktif', '2023-09-05 20:49:03', '2023-09-05 20:55:00'),
(20, 27, 1, 2, '3193313123', 'MUHAMMAD VARUN ABRAHAM', 'PATI', '2019-04-11', 'Laki-Laki', 'KAYEN RT 001 RW 007 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'KUKUH SATRIO UTOMO', '088948388888', 'aktif', '2023-09-05 20:50:22', '2023-09-05 20:55:00'),
(21, 33, 2, 2, '3187849527', 'RIANI MUTIA AZZAHRA', 'PATI', '2018-08-06', 'Perempuan', 'ROGOMULYO RT 006 RW 004 ROGOMULYO, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'ACHSIN SUYUTI', '085878238278', 'aktif', '2023-09-06 02:32:58', '2023-09-08 02:47:48'),
(22, 34, 3, 2, '3197370339', 'MOHAMMAD NIZAM MALIK', 'PATI', '2019-01-26', 'Laki-Laki', 'TRIMULYO RT 001 RW 001 TRIMULYO, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'JUPRI', '081215686626', 'aktif', '2023-09-06 04:51:36', '2023-09-08 02:58:17'),
(23, 35, 4, 2, '3168082156', 'RAYHANA LYAIS SHOLEHAH', 'PATI', '2016-09-28', 'Perempuan', 'Cengkalsewu RT 02 RW 05 CENGKALSEWU, SUKOLILO, PATI, JAWA TENGAH, 59172, 59172', NULL, 'MOH AZIZ MAULANA', '088948388888', 'aktif', '2023-09-06 05:24:46', '2023-09-06 05:38:18'),
(24, 36, 4, 2, '3168925264', 'NAUFAL AFKAR BAHARUDDIN', 'PATI', '2016-10-19', 'Laki-Laki', 'CENGKALSEWU RT 002 RW 004 CENGKALSEWU, SUKOLILO, PATI, JAWA TENGAH, 59172, 59172', NULL, 'MOH SOLEH', '088948388888', 'aktif', '2023-09-06 05:25:57', '2023-09-06 05:38:18'),
(25, 37, 4, 2, '3174768821', 'NAYLAL FITHRIZ ZAKIYYAH', 'PATI', '2017-07-01', 'Perempuan', 'KAYEN RT 004 RW 005 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'MISBAHUS SURUR', '088948388888', 'aktif', '2023-09-06 05:27:10', '2023-09-06 05:38:18'),
(26, 38, 4, 2, '3167745486', 'NAILA MAULIDIA', 'PATI', '2016-12-08', 'Perempuan', 'SUMBERSARI RT 002 RW 003 SUMBERSARI, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'PURNOMO', '088948388888', 'aktif', '2023-09-06 05:28:23', '2023-09-06 05:38:18'),
(27, 39, 4, 2, '3174530841', 'GHAVIN RASYA RAFARDHAN', 'PATI', '2017-06-10', 'Laki-Laki', 'SUMBERSARI RT 002 RW 003 SUMBERSARI, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'MUHAMMAD FATHUL ULUM', '088948388888', 'aktif', '2023-09-06 05:31:19', '2023-09-06 05:38:18'),
(28, 40, 4, 2, '3179686438', 'HIDAYATUN NAFISAH', 'PATI', '2017-06-04', 'Perempuan', 'DK SURODADI RT 002 RW 003 SUMBERSARI, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'MOHAMAD HARTONO', '088948388888', 'aktif', '2023-09-06 05:32:22', '2023-09-06 05:38:18'),
(29, 41, 4, 2, '3168793199', 'HILYA HAMALATUN NAHYA', 'PATI', '2016-12-19', 'Perempuan', 'KAYEN RT 002 RW 002 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SUNARTO', '088948388888', 'aktif', '2023-09-06 05:33:31', '2023-09-06 05:38:18'),
(30, 42, 4, 2, '3160083622', 'MUHAMMAD KENZIE MAULANA PRATAMA', 'PATI', '2016-11-02', 'Laki-Laki', 'SUMBERSARI RT 002 RW 003 SUMBERSARI, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SUPAAT', '088948388888', 'aktif', '2023-09-06 05:34:39', '2023-09-06 05:38:18'),
(31, 43, 4, 2, '3171676930', 'KIRANA SYAKIRA PUTRI SUGIHARTO', 'PATI', '2017-01-28', 'Perempuan', 'DUSUN BIROTO RT 004 RW 002 SAMBIREJO, GABUS, PATI, JAWA TENGAH, 59173, 59173', NULL, 'SUGIHARTO', '088948388888', 'aktif', '2023-09-06 05:35:39', '2023-09-06 05:38:18'),
(32, 44, 4, 2, '3161321120', 'KALYANI SYFA FAUZIYAH', 'LAMONGAN', '2016-10-26', 'Perempuan', 'Lohgung RT 15 RW 04 LOHGUNG, BRONDONG, LAMONGAN, JAWA TIMUR, 62263, 62263', NULL, 'ADI SYAHRONI', '088948388888', 'aktif', '2023-09-06 05:40:15', '2023-09-06 05:48:43'),
(33, 48, 2, 2, 'abhi', 'ABHI CANDRA AFFAN AZRAQI', 'PATI', '2018-04-06', 'Laki-Laki', 'BEKETEL RT 003 RW 003 BEKETEL, KAYEN, PATI, JAWA TENGAH, 59171, 59171', 'photo-siswa/Yb89IvzI87OIurlI4H7uckyILB31bc8mWrY5FIB0.jpg', 'AAN SETIADI', '081215686626', 'aktif', '2023-09-06 07:17:04', '2023-11-24 18:56:05'),
(34, 49, 2, 2, '3174588602', 'GHAISAN NANDHU MUJIANTO', 'PATI', '2017-12-10', 'Laki-Laki', 'KAYEN RT 002 RW 004 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'TRI MUJIANTO', '088948388888', 'aktif', '2023-09-06 07:18:18', '2023-09-08 02:47:48'),
(35, 50, 2, 2, '3181528488', 'AQILLA NAJWA AGUSTINA', 'PATI', '2018-07-28', 'Perempuan', 'KAYEN RT 002 RW 004 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'MOHAMAD ZAENURI', '088948388888', 'aktif', '2023-09-06 07:19:19', '2023-09-08 02:47:48'),
(36, 51, 2, 2, '3186903862', 'MIKHAYLA VANIA EVARISTA', 'PATI', '2018-03-30', 'Perempuan', 'KAYEN RT 002 RW 003 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'ANDI SETYO RINI', '088948388888', 'aktif', '2023-09-06 07:20:22', '2023-09-08 02:47:49'),
(37, 52, NULL, 1, '3165460694', 'Abdul Wahid', 'PATI', '2016-06-20', 'Laki-Laki', 'Slungkep RT 02 RW 02 Slungkep, Kayen Pati', NULL, '-', '088948388888', 'lulus', '2023-09-08 02:35:16', '2023-09-08 02:35:16'),
(38, 53, NULL, 1, '3164105996', 'Afkar Alkhalifi Zikri', 'Pati', '2016-01-31', 'Laki-Laki', 'Dk. Kedu RT 02 RW 04 Ds. Kedumulyo, Sukolilo Pati', NULL, '-', '088948388888', 'lulus', '2023-09-08 02:36:59', '2023-09-08 02:41:17'),
(39, 54, NULL, 1, '3155307698', 'Ahmad Evan Effendy Izwan', 'Kudus', '2015-08-20', 'Laki-Laki', 'Kedu RT 06 RW 05 Kedumulyo, Sukolilo Pati', NULL, '-', '088948388888', 'lulus', '2023-09-08 02:38:45', '2023-09-08 02:40:40'),
(40, 55, NULL, 1, '3163948613', 'Ahmad Nabil Hauza Anwar', 'Pati', '2016-03-09', 'Laki-Laki', 'Kayen RT 10 RW 04 Kayen Pati', NULL, '-', '088948388888', 'lulus', '2023-09-08 02:40:04', '2023-09-08 02:40:04'),
(41, 56, 3, 2, '3184864136', 'MUHAMMAD SAID IBRAHIM', 'PATI', '2018-10-22', 'Laki-Laki', 'DK JABUNG RT 002 RW 002 JATIROTO, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'NURKHOLIS', '088948388888', 'aktif', '2023-09-08 02:52:52', '2023-09-08 02:58:17'),
(42, 57, 3, 2, '3193465891', 'ATAYA DZUL HAZIQ', 'PATI', '2019-03-14', 'Laki-Laki', 'PASURUHAN RT 002 RW 001 PASURUHAN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'MOH MUHLAS', '088948388888', 'aktif', '2023-09-08 02:54:04', '2023-09-08 02:58:17'),
(43, 58, 3, 2, '3182513012', 'NOUREEN FALISHA NAUFALIN', 'PATI', '2018-03-15', 'Perempuan', 'KAYEN RT 001 RW 004 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'MOHAMAD DAWAM', '088948388888', 'aktif', '2023-09-08 02:55:10', '2023-09-08 02:58:17'),
(44, 59, 3, 2, '3184071313', 'YORDAN NOFA ELZIO', 'PATI', '2018-07-18', 'Laki-Laki', 'SUMBERSARI RT 005 RW 001 SUMBERSARI, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'HARTONO', '088948388888', 'aktif', '2023-09-08 02:56:31', '2023-09-08 02:58:17'),
(45, 60, 5, 2, '3165242007', 'AJENG ALLAYYA GAVAPUTRI', 'KAB SEMARANG', '2016-10-03', 'Perempuan', 'Mendongan RT 18 RW 05 TEGALWATON, TENGARAN, SEMARANG, JAWA TENGAH, 50775, 50775', NULL, 'FAUZI KRISTIANTO', '088948388888', 'aktif', '2023-09-08 03:02:12', '2023-09-08 03:18:09'),
(46, 61, 5, 2, '3165490155', 'AFIF AHWAL SAID', 'Pati', '2016-12-26', 'Laki-Laki', 'Desa Kayen RT 04 RW 05 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'Eko Mulyadi', '088948388888', 'aktif', '2023-09-08 03:03:31', '2023-09-08 03:18:09'),
(47, 62, 5, 2, '3171545472', 'ARKA HAFIZ SAPUTRA', 'Pati', '2017-02-26', 'Laki-Laki', 'SUMBERSARI RT 006 RW 002 SUMBERSARI, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'ARIS SAPUTRO', '088948388888', 'aktif', '2023-09-08 03:04:30', '2023-09-08 03:18:09'),
(48, 63, 5, 2, '3175034517', 'AISYAH AYUDIA INARA', 'Pati', '2017-04-02', 'Perempuan', 'SUMBERSARI RT 003 RW 002 SUMBERSARI, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SABAR', '088948388888', 'aktif', '2023-09-08 03:05:46', '2023-09-08 03:18:09'),
(49, 64, 5, 2, '0159017059', 'FADHEELA AULIA SAFIRA', 'PATI', '2017-09-24', 'Perempuan', 'ROGOMULYO RT 005 RW 002 ROGOMULYO, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'BENI PAMUNGKAS', '088948388888', 'aktif', '2023-09-08 03:07:24', '2023-09-08 03:18:09'),
(50, 65, 5, 2, '0176266353', 'ALMAIRA ZALFADISHA NUR MEDINA', 'PATI', '2017-03-12', 'Perempuan', 'SUMBERSARI RT 005 RW 001 SUMBERSARI, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'ARIF PAMUJIONO', '088948388888', 'aktif', '2023-09-08 03:08:38', '2023-09-08 03:18:09'),
(51, 66, 5, 2, '3171751443', 'M FAWA\'ID AL - FARUQ', 'PATI', '2017-03-31', 'Laki-Laki', 'TALUN RT 007 RW 001 TALUN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'M SHOHIBUL ASLAM', '088948388888', 'aktif', '2023-09-08 03:11:34', '2023-09-08 03:18:09'),
(52, 67, 5, 2, '3174516404', 'HAFIZ LUTHFI FADHILA', 'PATI', '2017-01-22', 'Laki-Laki', 'DESA SUMBERSARI RT 07 RW 01 SUMBERSARI, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'WAHYU SUDARTO', '088948388888', 'aktif', '2023-09-08 03:13:20', '2023-09-08 03:18:09'),
(53, 68, 5, 2, '3179363186', 'TOSHIKOZUKI SETYAWAN', 'PATI', '2017-04-17', 'Perempuan', 'KAYEN RT 004 RW 002 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'DAMAS CANDRA SETYAWAN', '088948388888', 'aktif', '2023-09-08 03:14:27', '2023-09-08 03:18:09'),
(54, 69, 5, 2, '3169558054', 'MOH . AKBAR YUSUF PRATAMA', 'PATI', '2016-09-13', 'Laki-Laki', 'TRIMULYO TRIMULYO, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'ROY FAHRUDDIN', '088948388888', 'aktif', '2023-09-08 03:16:43', '2023-09-08 03:18:09'),
(55, 70, NULL, 1, '3166466355', 'Ahmad Raifal Arsyada', 'PATI', '2016-04-07', 'Laki-Laki', 'Sumbersari RT 03 RW 02 Kayen Pati', NULL, '-', '088948388888', 'lulus', '2023-09-08 03:31:29', '2023-09-08 03:31:29'),
(56, 71, NULL, 1, '3167414660', 'Akifa Putri Kaerani', 'PATI', '2016-05-15', 'Perempuan', 'Boloagung RT 17 RW 03 Kayen Pati', NULL, '-', '088948388888', 'lulus', '2023-09-08 03:32:42', '2023-09-08 03:36:32'),
(57, 72, NULL, 1, '3169104769', 'Alfath Arridhoha Amirun Fahrudhin', 'PATI', '2016-06-23', 'Laki-Laki', 'Kayen RT 08 RW 01 Kayen Pati', NULL, '-', '088948388888', 'lulus', '2023-09-08 03:33:42', '2023-09-08 03:33:42'),
(58, 73, NULL, 1, '3163494472', 'Arfan Indrayana', 'PATI', '2016-02-06', 'Laki-Laki', 'Slungkep RT 02 RW 03 Kayen Pati', NULL, '-', '088948388888', 'lulus', '2023-09-08 03:34:52', '2023-09-08 03:34:52'),
(59, 74, NULL, 1, '3154115847', 'Aurel Pramitha Dewi', 'PATI', '2015-04-03', 'Perempuan', 'Kayen RT 05 RW 06 Kayen Pati', NULL, '-', '088948388888', 'lulus', '2023-09-08 03:35:57', '2023-09-08 03:35:57'),
(60, 75, NULL, 1, '3160104496', 'Byan Satya Atmajaya', 'PATI', '2016-01-12', 'Laki-Laki', 'Slungkep RT 02 RW 01, Kayen Pati', NULL, '-', '088948388888', 'lulus', '2023-09-08 03:42:41', '2023-09-08 03:42:41'),
(61, 76, 1, 2, '3187819576', 'LUBNA HAYFA ALROJI', 'PATI', '2018-02-08', 'Perempuan', 'SLUNGKEP RT 001 RW 003 SLUNGKEP, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'MUHAMMAD SAEROJI', '088224617628', 'aktif', '2023-10-15 12:30:25', '2023-10-15 12:52:25'),
(62, 77, 1, 2, '3178871060', 'UMAR YAZID AL AFGHONI', 'PATI', '2017-10-07', 'Laki-Laki', 'DK. KORIPAN RT 001 RW 002 MOJOMULYO, TAMBAKROMO, PATI, JAWA TENGAH, 59174, 59174', NULL, 'ALI MUHTADI', '087635535533', 'aktif', '2023-10-15 12:32:41', '2023-10-15 12:52:25'),
(63, 78, 1, 2, '3191438257', 'RATNA ALISYA SAPUTRI', 'PATI', '2019-03-01', 'Perempuan', 'KAYEN RT 002 RW 003 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'IMAM PRAYITNO', '088948388888', 'aktif', '2023-10-15 12:34:41', '2023-10-15 12:52:26'),
(64, 79, 1, 2, '3176344731', 'ALIYYA NABILA ZAHRO', 'PATI', '2017-10-07', 'Perempuan', 'SLUNGKEP RT 004 RW 004 SLUNGKEP, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'ABDUL SYUKUR', '088948388888', 'aktif', '2023-10-15 12:36:37', '2023-10-15 12:52:26'),
(65, 80, 1, 2, '3175910350', 'ATIKA NURIL MAULIDA', 'PATI', '2017-12-11', 'Laki-Laki', 'KAYEN RT 003 RW 004 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'EKO MARYADI', '088948388888', 'aktif', '2023-10-15 12:38:20', '2023-10-15 12:52:26'),
(66, 81, 1, 2, '3174004662', 'NAELA PUTRI RAHAYU', 'PATI', '2017-08-13', 'Perempuan', 'CENGKALSEWU RT 003 RW 004 CENGKALSEWU, SUKOLILO, PATI, JAWA TENGAH, 59172, 59172', NULL, 'JAMJURI', '088948388888', 'aktif', '2023-10-15 12:39:46', '2023-10-15 12:52:26'),
(67, 82, 1, 2, '3184043158', 'GENNARO FAHLEFI AL FARIZQI', 'PATI', '2018-01-13', 'Laki-Laki', 'KAYEN RT 002 RW 003 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'BAMBANG SETIAWAN', '088948388888', 'aktif', '2023-10-15 12:41:02', '2023-10-15 12:52:26'),
(68, 83, 1, 2, '3185526037', 'SHANUM ANDARA PUTRI', 'PATI', '2018-08-05', 'Perempuan', 'DK GASONG RT 003 RW 001 JIMBARAN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'TEJO SUYANTO', '088948388888', 'aktif', '2023-10-15 12:42:09', '2023-10-15 12:52:26'),
(69, 84, 1, 2, '3177001720', 'IMAM AHMAD AZKA AL ABBAS', 'PATI', '2017-08-03', 'Laki-Laki', 'JIMBARAN RT 003 RW 001 JIMBARAN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'ARDY SUSANTO', '088948388888', 'aktif', '2023-10-15 12:43:29', '2023-10-15 12:52:26'),
(70, 85, 1, 2, '3175019690', 'CEISYA ALMAHIRA PUTRI', 'PATI', '2017-11-19', 'Perempuan', 'DK BAGANG RT 004 RW 002 PESAGI, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SURO SAPON', '088948388888', 'aktif', '2023-10-15 12:44:55', '2023-10-15 12:52:26'),
(71, 86, 1, 2, '3178687786', 'ADZKIYA NAYYARA SYAQUILA', 'PATI', '2017-08-28', 'Perempuan', 'JIMBARAN RT 005 RW 001 JIMBARAN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'ANGGUN SETYADI SAPUTRA', '088948388888', 'aktif', '2023-10-15 12:47:13', '2023-10-15 12:52:26'),
(72, 87, 1, 2, '3188155906', 'ALMAHYRA MISHALL QIRANI', 'BOGOR', '2018-05-06', 'Perempuan', 'KAYEN RT 002 RW 002 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'BAMBANG', '088948388888', 'aktif', '2023-10-15 12:48:46', '2023-10-15 12:52:26'),
(73, 88, 1, 2, '3186272220', 'MUHAMMAD MALIK ALFARIS', 'PATI', '2018-09-14', 'Laki-Laki', 'KAYEN RT 003 RW 003 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'MIFTAHUR ROZAK', '088948388888', 'aktif', '2023-10-15 12:49:58', '2023-10-15 12:52:26'),
(74, 89, 2, 2, '3176198177', 'MUHAMMAD OKTAFIANDI ABIZAR ADELIO', 'PATI', '2017-10-19', 'Laki-Laki', 'SUMBERSARI RT 001 RW 001 SUMBERSARI, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'ANDI ALFIAN', '088948388888', 'aktif', '2023-10-15 12:55:52', '2023-10-15 13:34:13'),
(76, 91, 2, 2, '3180835319', 'NAFISHA AZZALIA WIJAYANTI', 'PATI', '2018-04-07', 'Laki-Laki', 'KAYEN RT 006 RW 004 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SAFARIYANTO', '088948388888', 'aktif', '2023-10-15 13:05:53', '2023-10-15 13:34:14'),
(77, 92, 2, 2, '3175025759', 'RIZKI FATHAN SAPUTRA', 'PATI', '2017-10-25', 'Laki-Laki', 'SUMBERSARI RT 003 RW 003 SUMBERSARI, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'TUFLIHUN', '088948388888', 'aktif', '2023-10-15 13:07:05', '2023-10-15 13:34:14'),
(78, 93, 2, 2, '3172797891', 'ACELIN AYUDIA MAHARDHIKA', 'PATI', '2017-08-15', 'Perempuan', 'DK KRAJAN RT 005 RW 002 SINOMWIDODO, TAMBAKROMO, PATI, JAWA TENGAH, 59174, 59174', NULL, 'ROHMAT PARGIYANI', '081215686626', 'aktif', '2023-10-15 13:09:02', '2023-10-15 13:34:14'),
(79, 94, 2, 2, '3185502133', 'KANEZKA ZAFEER SYAZANI.M', 'PATI', '2018-06-09', 'Laki-Laki', 'KAYEN RT 002 RW 001 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'MHD.CHOIRUL MUTTAQIN', '088948388888', 'aktif', '2023-10-15 13:10:31', '2023-10-15 13:34:14'),
(80, 95, 2, 2, '3186138435', 'ALVINO FALAH AL RISQI', 'PATI', '2018-08-04', 'Laki-Laki', 'KAYEN RT 008 RW 003 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'MOH KOMARUDIN', '088948388888', 'aktif', '2023-10-15 13:17:23', '2023-10-15 13:34:14'),
(81, 96, 2, 2, '3184929906', 'YESI ADINDA KRISTIANA PUTRI', 'PATI', '2018-06-27', 'Perempuan', 'KAYEN RT 005 RW 005 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'ADI SUPRIYANTO', '088948388888', 'aktif', '2023-10-15 13:24:50', '2023-10-15 13:34:14'),
(82, 97, 2, 2, '3181594334', 'GANJAR PUTRA HERIYANTO', 'PATI', '2018-06-21', 'Laki-Laki', 'SLUNGKEP RT 001 RW 004 SLUNGKEP, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SUGIANTO', '088948388888', 'aktif', '2023-10-15 13:26:16', '2023-10-15 13:34:14'),
(83, 98, 2, 2, '3186439833', 'MUHAMMAD DZAKI AL KAHFI', 'PATI', '2018-11-10', 'Laki-Laki', 'KAYEN RT 005 RW 009 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'MOH WULAJI', '088948388888', 'aktif', '2023-10-15 13:27:50', '2023-10-15 13:34:14'),
(84, 99, 2, 2, '3175346531', 'ARUMI NASHA RAZITA', 'PATI', '2017-09-06', 'Perempuan', 'KAYEN RT 002 RW 004 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SRI WAHYUNI', '088948388888', 'aktif', '2023-10-15 13:29:19', '2023-10-15 13:34:14'),
(85, 100, 2, 2, '3192358051', 'MUHAMMAD RAYYAN ZIAULHAQ', 'PATI', '2019-02-23', 'Laki-Laki', 'KARABAN RT 004 RW 006 KARABAN, GABUS, PATI, JAWA TENGAH, 59173, 59173', NULL, 'BINTANG BIMA PAMUNGKAS', '088948388888', 'aktif', '2023-10-15 13:30:35', '2023-10-15 13:34:14'),
(86, 101, 2, 2, '3175971804', 'CYINTIA RIZQI AZZALIA', 'BEKASI', '2017-11-02', 'Perempuan', 'KP. SELANG RT 003 RW 003 BANTARSARI, PEBAYURAN, KABUPATEN BEKASI, JAWA BARAT, 17710, 17710', NULL, 'EKO PRIBADI', '088948388888', 'aktif', '2023-10-15 13:31:50', '2023-10-15 13:34:14'),
(87, 102, 3, 2, '3174064395', 'FATIYA AZZAHRA MAHARANI', 'PATI', '2017-11-30', 'Perempuan', 'KAYEN RT 004 RW 007 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SAERI', '088948388888', 'aktif', '2023-10-15 13:38:44', '2023-10-15 13:55:19'),
(88, 103, 3, 2, '3186460022', 'SYADDAD DANISH G IBRAHIM', 'KUDUS', '2018-08-21', 'Laki-Laki', 'TERGO RT 005 RW 001 TERGO, DAWE, KUDUS, JAWA TENGAH, 59353, 59353', NULL, 'NOOR ROKHIM', '088948388888', 'aktif', '2023-10-15 13:39:50', '2023-10-15 13:55:19'),
(89, 104, 3, 2, '3183678093', 'EN HAKAM PASAENO ABIDZAR BISMOKO', 'PATI', '2018-07-03', 'Laki-Laki', 'DK JABUNG RT 002 RW 003 JATIROTO, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SAKTI HARYO BISMOKO', '088948388888', 'aktif', '2023-10-15 13:40:56', '2023-10-15 13:55:19'),
(90, 105, 3, 2, '3186316395', 'AKMAL ATHARRAYHAN', 'PATI', '2018-11-26', 'Laki-Laki', 'KAYEN RT 001 RW 002 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SUTIYONO', '088948388888', 'aktif', '2023-10-15 13:41:55', '2023-10-15 13:55:19'),
(91, 106, 3, 2, '3187650749', 'MOH. ABYAN ABDILLAH', 'PATI', '2018-05-22', 'Laki-Laki', 'DUKUH KALI TENGAH RT 006 RW 001 PESAGI, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SYAMSUDDIN', '088948388888', 'aktif', '2023-10-15 13:45:48', '2023-10-15 13:55:19'),
(92, 107, 3, 2, '3171200659', 'SHAFIYYAH ARSYILA ROMEESA FARZANA', 'JEPARA', '2017-11-30', 'Perempuan', 'KAYEN RT 004 RW 002 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'MUHAMMAD AMIN ROKHIS SUPRIYANTONO', '088948388888', 'aktif', '2023-10-15 13:47:12', '2023-10-15 13:55:19'),
(93, 108, 3, 2, '3177344390', 'AYRA ADREENA SHAZFA', 'PATI', '2017-10-10', 'Perempuan', 'KAYEN RT 003 RW 003 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'ALI MUHTAROM', '088948388888', 'aktif', '2023-10-15 13:48:20', '2023-10-15 13:55:19'),
(94, 109, 3, 2, '3183936778', 'JORDY DZIKROUL DANISWARA', 'PATI', '2018-02-18', 'Laki-Laki', 'GADUDERO RT 004 RW 001 GADUDERO, SUKOLILO, PATI, JAWA TENGAH, 59172, 59172', NULL, 'PRASETYO WIDODO', '088948388888', 'aktif', '2023-10-15 13:49:22', '2023-10-15 13:55:19'),
(95, 110, 3, 2, '3181815874', 'ZASKIA ARSYANA PUTRI', 'KUDUS', '2018-02-10', 'Perempuan', 'JL MEJOBO MEGA BARU RT 006 RW 002 MEGAWON, JATI, KUDUS, JAWA TENGAH, 59342, 59342', NULL, 'MERIO PRATAMA', '088948388888', 'aktif', '2023-10-15 13:50:31', '2023-10-15 13:55:19'),
(96, 111, 3, 2, '3183477021', 'ALTEZZA ATTHAR SEPTIANTO', 'PATI', '2018-09-19', 'Laki-Laki', 'DK GASONG RT 004 RW 001 JIMBARAN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'TRI HARYANTO', '088948388888', 'aktif', '2023-10-15 13:51:32', '2023-10-15 13:55:19'),
(97, 112, 3, 2, '3180366631', 'NAWLAA NAZATUL SHIMA', 'PATI', '2018-10-22', 'Perempuan', 'JIMBARAN RT 003 RW 001 JIMBARAN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'AHMAD SHOFI\'I', '088948388888', 'aktif', '2023-10-15 13:52:32', '2023-10-15 13:55:19'),
(98, 113, 3, 2, '3187620093', 'AZRIL RAFISQY ARFADHIA', 'PATI', '2018-12-01', 'Laki-Laki', 'PESAGI RT 005 RW 001 PESAGI, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'ALI MUHAIMIN ABDUL MUJIB', '088948388888', 'aktif', '2023-10-15 13:53:34', '2023-10-15 13:55:19'),
(99, 114, 6, 2, '3168251528', 'MUHAMMAD WAFI MUNADHIL', 'PATI', '2016-05-08', 'Laki-Laki', 'Kayen RT 02 RW 03 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'WAWAN ARIYANTO', '088948388888', 'aktif', '2023-10-15 14:03:03', '2023-10-15 14:14:41'),
(100, 115, 6, 2, '3166287049', 'ALIFA  NAUFALYN ZAHIDA', 'PATI', '2016-03-08', 'Perempuan', 'Boloagung RT 03 RW 01 BOLOAGUNG, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'ARIS SUSANTO', '088948388888', 'aktif', '2023-10-15 14:04:18', '2023-10-15 14:14:41'),
(101, 116, 6, 2, '3168331731', 'MUHAMMAD DANIYAL KARIM', 'PATI', '2016-04-21', 'Laki-Laki', 'Slungkep RT 05 RW 03 SLUNGKEP, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'ROFIQ SYAFI\'I', '088948388888', 'aktif', '2023-10-15 14:05:16', '2023-10-15 14:14:41'),
(102, 117, 6, 2, '3167595577', 'SUROYYA IZZUL ABIDAH', 'PATI', '2016-06-20', 'Perempuan', 'Kayen RT 07 RW 01 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'AHMAD MUHLIS', '088948388888', 'aktif', '2023-10-15 14:06:22', '2023-10-15 14:14:41'),
(103, 118, 6, 2, '3161933772', 'ASYIELA CALISTA ZAHRA', 'PATI', '2016-11-11', 'Perempuan', 'Cengkalsewu RT 01 RW 05 CENGKALSEWU, SUKOLILO, PATI, JAWA TENGAH, 59172, 59172', NULL, 'M ANIP MULYONO', '088948388888', 'aktif', '2023-10-15 14:07:43', '2023-10-15 14:14:41'),
(104, 119, 6, 2, '3164583570', 'M . MIZANUL HAKIM', 'PATI', '2016-05-14', 'Laki-Laki', 'Sumbersari RT 03 RW 02 SUMBERSARI, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'M ANSHORI', '088948388888', 'aktif', '2023-10-15 14:08:43', '2023-10-15 14:14:41'),
(105, 120, 6, 2, '3165556796', 'MOHAMMAD AUFAL MAROM', 'PATI', '2016-05-30', 'Laki-Laki', 'Rogomulyo RT 05 RW 03 ROGOMULYO, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'AHMAD SHOLEH', '088948388888', 'aktif', '2023-10-15 14:09:53', '2023-10-15 14:14:41'),
(106, 121, 6, 2, '3164607300', 'YUMNA SYAKILA NAURA ARIF', 'PATI', '2016-02-14', 'Perempuan', 'Kayen RT 01 RW 05 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'ARIF KHOIRUL JIHAD', '088948388888', 'aktif', '2023-10-15 14:11:01', '2023-10-15 14:14:41'),
(107, 122, 6, 2, '3160240204', 'ADEN ABIZARD SURYATAMA', 'PATI', '2016-06-23', 'Laki-Laki', 'KAYEN RT 004 RW 005 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SUHIRNO', '088948388888', 'aktif', '2023-10-15 14:12:05', '2023-10-15 14:14:41'),
(108, 123, 6, 2, '3161979817', 'SITI AISYAH MAULIDA', 'PATI', '2016-12-21', 'Perempuan', 'KAYEN RT 007 RW 002 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'EKO WAHYUDI', '088948388888', 'aktif', '2023-10-15 14:13:07', '2023-10-15 14:14:41'),
(109, 124, 8, 2, '31435654', 'IMA FITRI PURNAMA SARI', 'PATI', '2016-07-08', 'Perempuan', 'DK CARIKAN RT 002 RW 004 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'DESI MUNIF ARDIANTO', '088948388888', 'aktif', '2023-10-15 14:35:37', '2023-11-24 19:09:39'),
(110, 125, 8, 2, '3168139047', 'ADILA TSAQIF KHOIRUNNISA', 'PATI', '2016-08-09', 'Perempuan', 'Desa KAYEN, RT 005 RW 008 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'WAHYU SETIADJI', '081215686626', 'aktif', '2023-10-15 14:36:48', '2023-11-24 20:16:32'),
(111, 126, 8, 2, '3179234095', 'FEBRIANA SHILVI', 'PATI', '2017-02-27', 'Perempuan', 'Desa KAYEN, RT 005 RW 008 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'WAHYU SETIADJI', '085342627888', 'aktif', '2023-10-15 14:37:59', '2023-11-24 19:09:39'),
(112, 127, NULL, 2, '3166204107', 'NUSYAYLA CHADEEJA PUTRI RIFAIN', 'PATI', '2016-07-03', 'Perempuan', 'KAYEN RT 007 RW 001 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'RIFAIN', '088948388888', 'aktif', '2023-10-15 14:39:28', '2023-10-16 06:00:07'),
(113, 128, NULL, 2, '3165216346', 'MUHAMMAD ARINDRA JEHAN PUTRA PRATAMA', 'PATI', '2016-09-17', 'Laki-Laki', 'SLUNGKEP  RT 003 RW 003 SLUNGKEP, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'EKO ARI SUSANTO', '088948388888', 'aktif', '2023-10-15 14:40:27', '2023-10-16 06:00:07'),
(114, 129, NULL, 2, '3177038109', 'ARO AZ ZAHEER', 'PATI', '2017-01-31', 'Laki-Laki', 'BUMIREJO RT 004 RW 001 BUMIREJO, JUWANA, PATI, JAWA TENGAH, 59185, 59185', NULL, 'EKO YULIANTO', '088948388888', 'aktif', '2023-10-15 14:41:27', '2023-10-16 06:00:07'),
(115, 130, NULL, 2, '3175494636', 'ARGA DEWANTARA', 'PATI', '2017-04-22', 'Laki-Laki', 'KAYEN RT 005 RW 004 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'MOHAMAD AFIF MUSTOFA', '088948388888', 'aktif', '2023-10-15 14:42:45', '2023-10-16 06:00:07'),
(116, 131, NULL, 2, '3164125865', 'KAILA ALMIRA PUTRI', 'PATI', '2016-10-28', 'Perempuan', 'CENGKALSEWU RT 003 RW 001 CENGKALSEWU, SUKOLILO, PATI, JAWA TENGAH, 59172, 59172', NULL, 'ZAENAL ARIFIN', '088948388888', 'aktif', '2023-10-15 14:43:48', '2023-10-16 06:00:07'),
(117, 132, NULL, 2, '3171862111', 'MUTIARA AZZAHRA', 'PATI', '2017-10-05', 'Perempuan', 'DSN CARIKAN RT 003 RW 004 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'MUH SUBEKAN', '088948388888', 'aktif', '2023-10-15 14:45:35', '2023-10-16 06:00:07'),
(118, 133, NULL, 2, '3177755009', 'AURA ZAKIA PUTRI ASSIFA', 'PATI', '2017-05-16', 'Perempuan', 'KAYEN RT 003 RW 004 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SUPRIYANTO', '088948388888', 'aktif', '2023-10-15 14:46:44', '2023-10-16 06:00:07'),
(119, 134, NULL, 2, '3176352340', 'BRAYEN SINATAT PUTRA', 'PATI', '2017-05-18', 'Laki-Laki', 'SUMBERSARI RT 007 RW 001 SUMBERSARI, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'MUHAMMAD MUCHLISIN', '088948388888', 'aktif', '2023-10-15 14:47:44', '2023-10-16 06:00:07'),
(120, 135, NULL, 2, '3170150892', 'ARIENDRA KEVRAL IRAWAN', 'PATI', '2017-03-30', 'Laki-Laki', 'KAYEN RT 004 RW 002 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'TRIA AGUS IRAWAN', '088948388888', 'aktif', '2023-10-15 14:48:56', '2023-10-16 06:00:07'),
(121, 136, NULL, 2, '3174448086', 'ARKANANTA ALFANSYA', 'PATI', '2017-03-18', 'Laki-Laki', 'KAYEN RT 004 RW 002 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'ISMOYO', '088948388888', 'aktif', '2023-10-15 14:49:57', '2023-10-16 06:00:07'),
(122, 137, NULL, 2, '3176153600', 'RAYSA AQILA ADIFA', 'PATI', '2017-07-23', 'Perempuan', 'DESA SUMBERSARI RT 002 RW 002 SUMBERSARI, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SYAIFUDIN ZUHRI', '088948388888', 'aktif', '2023-10-15 14:51:05', '2023-10-16 06:00:07'),
(123, 138, NULL, 2, '3179842854', 'KHAYRA ADZKIYA RAHMAN', 'KUNINGAN', '2017-07-26', 'Perempuan', 'SLUNGKEP RT 002 RW 002 SLUNGKEP, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'RAHMAN WIDODO', '088948388888', 'aktif', '2023-10-15 14:52:12', '2023-10-16 06:00:07'),
(124, 139, NULL, 2, '3176741243', 'ALYCIA PUTRI SUSILO', 'PATI', '2017-07-11', 'Perempuan', 'KAYEN RT 004 RW 005 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SANDI AGUS SUSILO', '088948388888', 'aktif', '2023-10-15 14:53:41', '2023-10-16 06:00:07'),
(125, 140, NULL, 2, '3172682040', 'SEKAR AYU FATIMATUZ ZAHRO\' ASROFI', 'PATI', '2017-02-21', 'Perempuan', 'KAYEN RT 004 RW 005 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'AGUS RIYANTO', '088948388888', 'aktif', '2023-10-15 14:54:51', '2023-10-16 06:00:07'),
(126, 141, NULL, 2, '3170629929', 'M. ARFA HASANAIN ATHARIZ', 'PATI', '2017-04-20', 'Laki-Laki', 'DS. SUMBERSARI RT 001 RW 002 SUMBERSARI, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'GHUFRON KURNIAWAN', '088948388888', 'aktif', '2023-10-15 14:55:55', '2023-10-16 06:00:07'),
(127, 142, NULL, 2, '3170146692', 'GILANG PRATAMA WIRAYUDHA', 'PATI', '2017-06-11', 'Laki-Laki', 'DK BUNONGKO RT 001 RW 002 PURWOKERTO, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'WAHYU LIS SUGIANTO', '088948388888', 'aktif', '2023-10-15 14:56:48', '2023-10-16 06:00:07'),
(128, 143, NULL, 2, '3178610212', 'MAULANA IBRAHIM MUFIQ', 'SEMARANG', '2017-11-19', 'Laki-Laki', 'KAYEN RT 001 RW 005 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'BAYU MARSONO', '088948388888', 'aktif', '2023-10-15 14:57:56', '2023-10-16 06:00:07'),
(129, 144, NULL, 2, '3162204368', 'ARSYLA KAHIYANG KEVIASWARA HENING', 'KENDAL', '2017-09-06', 'Perempuan', 'KAYEN RT 003 RW 007 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'PIKO BAYU AJI', '088948388888', 'aktif', '2023-10-15 14:59:06', '2023-10-16 06:00:07'),
(130, 145, 4, 2, '3176600178', 'AULIA SAFANA RAMANDANI', 'PATI', '2017-06-16', 'Perempuan', 'KAYEN RT 002 RW 003 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SUTRISNO', '088948388888', 'aktif', '2023-10-15 15:00:32', '2023-10-15 15:16:20'),
(131, 146, 4, 2, '3172852961', 'MUHAMMAD AZZAM AL ASYROF', 'PATI', '2017-07-23', 'Laki-Laki', 'MOJOMULYO RT 003 RW 003 MOJOMULYO, TAMBAKROMO, PATI, JAWA TENGAH, 59174, 59174', NULL, 'WAGIMAN', '088948388888', 'aktif', '2023-10-15 15:01:59', '2023-10-15 15:16:20'),
(132, 147, 4, 2, '3177786721', 'NADZIFA NAFIATUS SIDQIA', 'PATI', '2017-03-06', 'Perempuan', 'ROGOMULYO RT 004 RW 003 ROGOMULYO, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SYAFIQIN', '088948388888', 'aktif', '2023-10-15 15:04:12', '2023-10-15 15:16:20'),
(133, 148, 4, 2, '3176519255', 'ARDHAN NAIDHITO AVRI', 'PATI', '2017-04-06', 'Laki-Laki', 'Ds. Durensawit, rt 004 rw 004 DURENSAWIT, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SUNAIDI', '088948388888', 'aktif', '2023-10-15 15:05:14', '2023-10-15 15:16:20'),
(134, 149, 4, 2, '3178623289', 'MUHAMMAD ALDO FIRMANSYAH', 'PATI', '2017-03-20', 'Laki-Laki', 'Desa Jatiroto, RT 005 RW 006 JATIROTO, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'MASUDI', '088948388888', 'aktif', '2023-10-15 15:06:08', '2023-10-15 15:16:20'),
(135, 150, 4, 2, '3172283796', 'SANIATU NUR RAHMADIANTI', 'PATI', '2017-07-04', 'Perempuan', 'Desa KAYEN, RT 003 RW 008 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'JASIM', '088948388888', 'aktif', '2023-10-15 15:07:16', '2023-10-15 15:16:20'),
(136, 151, 4, 2, '3171525435', 'ARLETHA PRISKA AYUNINDYA', 'PATI', '2017-05-23', 'Perempuan', 'KAYEN RT 007 RW 004 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'MOH RIJEKAN', '088948388888', 'aktif', '2023-10-15 15:08:22', '2023-10-15 15:16:21'),
(137, 152, 4, 2, '3179133724', 'NUR HALISA PUTRI', 'PATI', '2017-01-09', 'Perempuan', 'KAYEN RT 002 RW 002 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'JOKO SUSILO', '088948388888', 'aktif', '2023-10-15 15:09:30', '2023-10-15 15:16:21'),
(138, 153, 4, 2, '3177870794', 'GENDHIS SILVIA MAHARANI', 'PATI', '2017-03-04', 'Perempuan', 'SUMBERSARI RT 007 RW 001 SUMBERSARI, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SUSILO', '088948388888', 'aktif', '2023-10-15 15:10:34', '2023-10-15 15:16:21'),
(139, 154, 4, 2, '3178459415', 'MUHAMMAD ARKA ALIFIAN', 'PATI', '2017-03-10', 'Laki-Laki', 'KAYEN RT 003 RW 006 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'MOHAMAD SOFYAN', '088948388888', 'aktif', '2023-10-15 15:11:37', '2023-10-15 15:16:21'),
(140, 155, 4, 2, '3163202452', 'AHMAD RIYAN ALY FADILAH ALGHONI', 'PATI', '2016-08-07', 'Laki-Laki', 'DS. KAYEN PATI RT 006 RW 009 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'DEKY PRASTYO HARIJANTO', '088948388888', 'aktif', '2023-10-15 15:12:39', '2023-10-15 15:16:21'),
(141, 156, 4, 2, '3167022861', 'IFTINA ASSABIYA RAFIFA', 'PATI', '2016-12-25', 'Perempuan', 'KAYEN RT 002 RW 002 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'IMAM FAJAR SHODIQ', '088948388888', 'aktif', '2023-10-15 15:13:47', '2023-10-15 15:16:21'),
(142, 157, 5, 2, '3160952719', 'NAZHIRUL ASROFI AL HAFIDZI', 'PATI', '2016-10-20', 'Laki-Laki', 'PLUMBUNGAN RT 006 RW 002 PLUMBUNGAN, GABUS, PATI, JAWA TENGAH, 59173, 59173', NULL, 'ALIM WARDOYO', '088948388888', 'aktif', '2023-10-16 03:12:58', '2023-10-16 03:37:49'),
(143, 158, 5, 2, '3170421076', 'AULIA ZAHRA', 'PATI', '2017-04-27', 'Perempuan', 'KAYEN RT 002 RW 003 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'AGUS SUHARTONO', '088948388888', 'aktif', '2023-10-16 03:13:56', '2023-10-16 03:37:49'),
(144, 159, 5, 2, '3177826453', 'AZRIL RAHANDIKA ALFARIQ', 'PATI', '2017-07-13', 'Laki-Laki', 'KAYEN RT 002 RW 002 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SULISTIYONO', '088948388888', 'aktif', '2023-10-16 03:14:53', '2023-10-16 03:37:49'),
(145, 160, 5, 2, '3175888181', 'AILSA BARATUTTAQIYAH', 'KAB SEMARANG', '2017-01-10', 'Perempuan', 'JAMBON UNGARAN RT 004 RW 009 UNGARAN, UNGARAN BARAT, SEMARANG, JAWA TENGAH, 50511, 50511', NULL, 'RIZA ABDUL MUNIF', '088948388888', 'aktif', '2023-10-16 03:15:58', '2023-10-16 03:37:49'),
(146, 161, 5, 2, '3177760717', 'ARIF ABDIL HAQ', 'PATI', '2017-02-20', 'Laki-Laki', 'DK JABUNG RT 004 RW 002 JATIROTO, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'AHMAD SYAEKUL ARIFIN', '088948388888', 'aktif', '2023-10-16 03:16:53', '2023-10-16 03:37:49'),
(147, 162, 5, 2, '3174627526', 'LUTFIANA DEVI ANJANI', 'PATI', '2017-04-22', 'Perempuan', 'DESA KAYEN, RT 004 RW 005 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SUGIHARTO', '088948388888', 'aktif', '2023-10-16 03:17:55', '2023-10-16 03:37:49'),
(148, 163, 5, 2, '3167233563', 'ANNASYA ADREENA SAILA', 'PATI', '2016-08-27', 'Perempuan', 'ROGOMULYO RT 005 RW 003 ROGOMULYO, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'JASMO', '088948388888', 'aktif', '2023-10-16 03:19:45', '2023-10-16 03:37:49'),
(149, 164, 5, 2, '3175609783', 'MUHAMMAD RICHIE SETIAWAN', 'PATI', '2017-01-11', 'Laki-Laki', 'DESA SUMBERSARI, RT 004 RW 001 SUMBERSARI, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SUMARTONO', '088948388888', 'aktif', '2023-10-16 03:20:39', '2023-10-16 03:37:49'),
(150, 165, 5, 2, '3170663059', 'MUHAMMAD RIZQI BAGUS SYARIFUDDIN', 'PATI', '2017-07-11', 'Laki-Laki', 'KAYEN RT 002 RW 002 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'ABDUL LATIF', '088948388888', 'aktif', '2023-10-16 03:21:46', '2023-10-16 03:37:49'),
(151, 166, 5, 2, '3171697244', 'KANIA NAFISA WULANDARI', 'PATI', '2017-09-18', 'Perempuan', 'KAYEN RT 001 RW 003 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'ARIF HABIBI', '088948388888', 'aktif', '2023-10-16 03:22:51', '2023-10-16 03:37:49'),
(152, 167, 5, 2, '3166858082', 'VIOLA RENATA PUTRI', 'PATI', '2016-06-22', 'Perempuan', 'DK SIMO RT 001 RW 003 JATIROTO, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'AGUNG SUGIARTO', '088948388888', 'aktif', '2023-10-16 03:23:52', '2023-10-16 03:37:49'),
(153, 168, 6, 2, '3166963992', 'ALENA PUTRI RAMADHANI', 'PATI', '2016-06-28', 'Perempuan', 'SUMBERSARI RT 002 RW 002 SUMBERSARI, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'AHMAD FAOZI', '088948388888', 'aktif', '2023-10-16 03:24:59', '2023-10-16 03:39:01'),
(154, 169, 6, 2, '3163133750', 'MOHAMMAD HANIF HIDAYATULLAH', 'PATI', '2016-05-14', 'Laki-Laki', 'KAYEN RT 005 RW 006 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SUTIKNO', '088948388888', 'aktif', '2023-10-16 03:26:06', '2023-10-16 03:39:02'),
(155, 170, 6, 2, '3168965332', 'PRABU MUHAMMAD AL FATIH', 'PATI', '2016-04-08', 'Laki-Laki', 'ROGOMULYO RT 005 RW 002 ROGOMULYO, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SUWITO', '088948388888', 'aktif', '2023-10-16 03:27:23', '2023-10-16 03:39:02'),
(156, 171, 6, 2, '0163642064', 'NAUFAL VIDYA ARDANA PUJIANOTO', 'PATI', '2016-07-26', 'Laki-Laki', 'DK SIMO RT 001 RW 003 JATIROTO, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SUNOTO', '088948388888', 'aktif', '2023-10-16 03:28:21', '2023-10-16 03:39:02'),
(157, 172, 6, 2, '3168398238', 'REZA AJI SAPUTRA', 'PATI', '2016-12-15', 'Laki-Laki', 'SUMBERSARI RT 002 RW 002 SUMBERSARI, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'MUHAMMAD SYAIFUDIN', '088948388888', 'aktif', '2023-10-16 03:29:14', '2023-10-16 03:39:02'),
(158, 173, 6, 2, '3175785565', 'VANESSA HARDIYAN PUTRI', 'PATI', '2017-06-15', 'Perempuan', 'Desa Kayen rt 06 rw 06 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SUHARDI', '088948388888', 'aktif', '2023-10-16 03:30:11', '2023-10-16 03:39:02'),
(159, 174, 6, 2, '3167436562', 'JUAN HARUN ALFHA RAMADHAN', 'PATI', '2016-06-23', 'Laki-Laki', 'SLUNGKEP RT 004 RW 003 SLUNGKEP, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'JONI PRASTIYO', '088948388888', 'aktif', '2023-10-16 03:31:19', '2023-10-16 03:39:02'),
(160, 175, 6, 2, '3161734020', 'SITI AISYAH', 'PATI', '2016-11-10', 'Perempuan', 'KAYEN RT 004 RW 006 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'SAEROJI', '088948388888', 'aktif', '2023-10-16 03:32:30', '2023-10-16 03:39:02'),
(161, 176, 6, 2, '3162343698', 'DEN BAGUS CAHYO DAMAR JATI', 'PATI', '2016-05-09', 'Laki-Laki', 'SLUNGKEP RT 001 RW 001 SLUNGKEP, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'FAISAL DARIS FAHRONI', '088948388888', 'aktif', '2023-10-16 03:33:28', '2023-10-16 03:39:02'),
(162, 177, 6, 2, '3172093843', 'VALENCY KEYSHA AZKAYRA', 'PATI', '2017-02-14', 'Perempuan', 'KAYEN RT 005 RW 004 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'FAJAR HAFIZ', '088948388888', 'aktif', '2023-10-16 03:34:35', '2023-10-16 03:39:02'),
(163, 178, 6, 2, '3174953127', 'ADIRA PRASAJA', 'PATI', '2017-04-06', 'Laki-Laki', 'DESA KAYEN, RT 004 RW 005 KAYEN, KAYEN, PATI, JAWA TENGAH, 59171, 59171', NULL, 'JOKO SANTOSO', '088948388888', 'aktif', '2023-10-16 03:35:44', '2023-10-16 03:39:02'),
(164, 179, NULL, 1, '3159292388', 'Chika Nala Nishifa', 'PATI', '2015-10-20', 'Perempuan', 'Kayen RT 04 RW 07 Kayen Pati', NULL, '-', '088948388888', 'lulus', '2023-10-16 06:04:34', '2023-10-16 06:11:19'),
(165, 180, NULL, 1, '3167701511', 'Delisa Azalia Raynele', 'PATI', '2016-02-08', 'Perempuan', 'Socan RT 04 RW 03 Jimbaran, Kayen Pati', NULL, '-', '088948388888', 'lulus', '2023-10-16 06:05:45', '2023-10-16 06:10:32'),
(166, 181, NULL, 1, '3159876844', 'Destiani Kassya Vina Fadilla', 'PATI', '2015-12-12', 'Perempuan', 'Maitan RT 01 RW 05 Tambakromo Pati', NULL, '-', '088948388888', 'lulus', '2023-10-16 06:06:50', '2023-10-16 06:09:46'),
(167, 182, NULL, 1, '3152323666', 'Dzakira Thalita Zahra', 'PATI', '2015-11-18', 'Perempuan', 'Dermoyo RT 04 RW 02 Cengkalsewu, Sukolilo Pati', NULL, '-', '088948388888', 'lulus', '2023-10-16 06:08:05', '2023-10-16 06:08:05'),
(168, 183, NULL, 1, '3152326368', 'Ely Farera', 'PATI', '2015-09-18', 'Laki-Laki', 'Jimbaran RT 05 RW 01 Jimbaran, kayen Pati', NULL, '-', '088948388888', 'lulus', '2023-10-16 06:09:12', '2023-10-16 06:09:12'),
(169, 184, NULL, 1, '3164463093', 'Farel Adysta Ardytian', 'PATI', '2016-03-12', 'Laki-Laki', 'Jimbaran RT 02 RW 03 Jimbaran, kayen Pati', NULL, '-', '088948388888', 'lulus', '2023-10-16 06:13:24', '2023-10-16 06:13:24'),
(170, 185, NULL, 1, '3159260514', 'Gibran Alkhalifi Haidar Arif', 'PATI', '2015-12-23', 'Laki-Laki', 'Kayen RT 02 RW 02 Kayen Pati', NULL, '-', '088948388888', 'lulus', '2023-10-16 06:14:32', '2023-10-16 06:14:32'),
(171, 186, NULL, 1, '3169072444', 'Gusti Kinanti Anandayu Khairinniswa', 'PATI', '2016-03-21', 'Laki-Laki', 'Slungkep RT 04 RW 02 Slungkep, Kayen Pati', NULL, '-', '088948388888', 'lulus', '2023-10-16 06:15:37', '2023-10-16 06:15:37'),
(172, 187, NULL, 1, '3155788976', 'Hammim Rifqi Diyaulhaq', 'PATI', '2015-05-28', 'Laki-Laki', 'Kayen RT 02 RW 02 Kayen Pati', NULL, '-', '088948388888', 'lulus', '2023-10-16 06:16:43', '2023-10-16 06:16:43'),
(173, 188, NULL, 1, '3152515127', 'Kahfi Nathan Maulana', 'PATI', '2015-12-24', 'Laki-Laki', 'Rogomulyo RT 05 RW 03 Kayen Pati', NULL, '-', '088948388888', 'lulus', '2023-10-16 06:18:02', '2023-10-16 06:18:02'),
(174, 189, NULL, 1, '0154921226', 'Kayla Rahmania Habibi', 'PATI', '2015-11-22', 'Perempuan', 'Kayen RT 05 RW 05 Kayen pati', NULL, '-', '088948388888', 'lulus', '2023-10-16 06:20:21', '2023-10-16 06:20:21'),
(175, 190, NULL, 1, '3167448102', 'Kayra Citra Listiani', 'PATI', '2016-06-07', 'Perempuan', 'Sumbersari RT 05 RW 04 Kayen Pati', NULL, '-', '088948388888', 'lulus', '2023-10-16 06:21:24', '2023-10-16 06:21:24'),
(176, 191, NULL, 1, '3166722073', 'Khalila Fatma Aprilia', 'PATI', '2016-04-12', 'Perempuan', 'Kayen RT 02 RW 02 Kayen Pati', NULL, '-', '088948388888', 'lulus', '2023-10-16 06:22:26', '2023-10-16 06:22:26'),
(177, 192, NULL, 1, '0165858473', 'Khanaya Chintiya Dewi', 'PATI', '2016-04-07', 'Perempuan', 'Kayen RT 03 RW 06 Kayen Pati', NULL, '-', '088948388888', 'lulus', '2023-10-16 06:23:25', '2023-10-16 06:23:25'),
(178, 193, NULL, 1, '3160391558', 'Mahardika Zidan Rajendra', 'PATI', '2016-03-07', 'Laki-Laki', 'Kayen RT 05 RW 08 Kayen Pati', NULL, '-', '088948388888', 'lulus', '2023-10-16 06:24:22', '2023-10-16 06:24:22'),
(179, 194, NULL, 1, '3164051197', 'Malika Khanza Azkadina', 'PATI', '2016-04-05', 'Perempuan', 'Sumbersari RT 07 RW 01 Sumbersari, Kayen Pati', NULL, '-', '088948388888', 'lulus', '2023-10-16 06:25:24', '2023-10-16 06:25:24'),
(180, 195, NULL, 1, '3150239966', 'Maulida Syifa Nuraisya', 'PATI', '2015-12-23', 'Perempuan', 'Kayen RT 05 RW 02 Kayen Pati', NULL, '-', '088948388888', 'lulus', '2023-10-16 06:26:29', '2023-10-16 06:26:29'),
(181, 196, NULL, 1, '3155789993', 'Maya Maulida', 'PATI', '2017-12-29', 'Perempuan', 'Talun RT 03 RW  01 Kayen Pati', NULL, '-', '088948388888', 'lulus', '2023-10-16 06:27:42', '2023-10-16 06:27:42'),
(182, 197, NULL, 1, '3160775690', 'Meydita Deviana Putri', 'PATI', '2016-05-23', 'Perempuan', 'Sumbersari RT 02 RW 03 Kayen Pati', NULL, '-', '088948388888', 'lulus', '2023-10-16 06:28:59', '2023-10-16 06:28:59'),
(183, 198, NULL, 1, '3153406427', 'Misbahul Daffa', 'PATI', '2015-07-23', 'Laki-Laki', 'Jimbaran RT 02 RW 03 Kayen Pati', NULL, '-', '088948388888', 'lulus', '2023-10-16 06:30:03', '2023-10-16 06:30:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahun`
--

CREATE TABLE `tahun` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tahun`
--

INSERT INTO `tahun` (`id`, `tahun_ajaran`, `created_at`, `updated_at`) VALUES
(1, '2021/2022', '2023-09-05 13:06:24', '2023-09-05 13:06:24'),
(2, '2022/2023', '2023-09-05 13:06:42', '2023-09-05 13:06:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tema`
--

CREATE TABLE `tema` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_tema` varchar(191) NOT NULL,
  `sentra` text DEFAULT NULL,
  `semester` varchar(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pertemuan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tema`
--

INSERT INTO `tema` (`id`, `nama_tema`, `sentra`, `semester`, `created_at`, `updated_at`, `pertemuan`) VALUES
(1, 'Alam semesta', 'bencana alam', 'Gasal 2022/2023', '2023-09-05 14:26:48', '2023-11-30 14:18:17', 9),
(2, 'lingkunganku', 'menjaga kebersihan lingkungan', 'Gasal 2022/2023', '2023-09-05 14:27:21', '2023-11-30 14:14:34', 8),
(3, 'kesenian', 'cinta kesenian budaya', 'Gasal 2022/2023', '2023-09-05 14:28:23', '2023-11-30 14:14:39', 9),
(4, 'agama', 'agama islam', 'Gasal 2022/2023', '2023-09-05 14:32:45', '2023-11-30 14:14:44', 7),
(5, 'kebangsaan', 'cinta tanah air', 'Gasal 2022/2023', '2023-09-05 14:35:14', '2023-11-30 14:14:49', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `photo` text DEFAULT NULL,
  `role` enum('administrator','tu','guru','wali','kepsek') NOT NULL DEFAULT 'wali',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `photo`, `role`, `created_at`, `updated_at`) VALUES
(1, 'niken.putri', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Niken Anggita Putri', NULL, 'administrator', '2023-09-05 12:46:32', '2023-09-05 12:46:32'),
(2, 'guru', '$2y$10$gVj8fygEGTpvMP.lgI14OuazsILjpO82j6CcmWzOxfR8gNlKSlRxS', 'UMI CHAMIDAH', 'photo-user/ls9cJF4vWgdAY5eMCM74Ictag5XjVrzicPJAql9L.jpg', 'guru', '2023-09-05 12:53:21', '2023-09-08 18:05:01'),
(3, 'tatausaha', '$2y$10$1s2Lc6OdFexq18SwD/.Mqu3HHsvaskbWJtmn2ZY5k9pFmz3EZjMqy', 'EKA ANDRIYANI S.Sos', 'photo-user/G2bBrRl9qiRtidBBt2RX4HAxWYrtS7L5RfBEFrQb.jpg', 'tu', '2023-09-05 12:55:53', '2024-01-29 10:04:39'),
(4, 'kepsek', '$2y$10$9Lqm0FIEUtwFlAlXwPqzx.WpvF.2TKQgCLyTfP01TOisF5aa3MAQm', 'RISNA NURUL FADLILAH S.PSI', 'photo-user/yipLsgX9Z1sQwfDelIgBuB1KJxLJxHjTSpmE6pFs.jpg', 'kepsek', '2023-09-05 12:57:48', '2023-09-08 18:24:33'),
(5, 'himmatul', '$2y$10$.wuXzlo.Fu3uJBUM424KmejgMKRrDZ0f9OyjdW6/ynJvwFQYhjXiK', 'HIMMATUL ALIYAH', NULL, 'guru', '2023-09-05 13:08:18', '2023-09-06 05:20:47'),
(6, 'ika', '$2y$10$1ZxwiFUDFyn2M39wZxqpJOMIa4Wke1lATQaq4Sg/wRoeqCSaY96BC', 'IKA ANISATUN NURIYAH', NULL, 'guru', '2023-09-05 13:09:28', '2023-09-05 22:11:39'),
(7, '3318025008940001', '$2y$10$eB5TwCf9nOCoZy1ba0Uf4umlFmTFR8COVkjQkDn3SOovbZKp8elKm', 'MIRATUN NISA\'', NULL, 'guru', '2023-09-05 13:10:36', '2023-09-05 13:10:36'),
(8, '3188573828', '$2y$10$hbspFr2nrvrfo8B1a7cUROkEZvAe8DXIGW5nMAX5MGntgLJNIhNd2', 'MUHAMAD ARIF SETIAWAN', NULL, 'wali', '2023-09-05 13:12:44', '2023-09-05 13:12:44'),
(9, '3176668805', '$2y$10$UHXhVR2jwcBgbT7eFmciQuy8zJdyhdkrbjuC1g5if/J3aDRfsE1DS', 'SUYUDI', NULL, 'wali', '2023-09-05 13:14:59', '2023-09-05 13:14:59'),
(10, '3189135854', '$2y$10$YVEtRVr4upT2k.wXszgaNeKOQdqGbsj1s/SkWnev0ZFZaAPem/zFi', 'ROFIQ', NULL, 'wali', '2023-09-05 13:16:32', '2023-09-05 20:40:43'),
(11, 'melly', '$2y$10$fJ6gBWYEda0iOm6QsTGpLuVQMwm8PzrsiqMZWsY/PoO0dzcgDHMZq', 'SUHARTADI', 'photo-user/eLQS1zMdeZfDfsE71njWk8rA2V3iYQNIXZab8LUU.jpg', 'wali', '2023-09-05 13:18:05', '2023-10-16 07:03:57'),
(12, '3186750976', '$2y$10$F0uChkyzMGmb.jsz5W8By.Zb.niveODGlRKxEnEOtwMllCGEOCBeC', 'MUHAMMADUN', NULL, 'wali', '2023-09-05 13:19:22', '2023-09-08 17:57:33'),
(13, '3171967496', '$2y$10$1D2iPr7.vi/MvIw6pquuEul9JcQBQf3biWHBdodKajXPak0wyLuca', 'MOHAMMAD HABIB', NULL, 'wali', '2023-09-05 13:21:11', '2023-09-05 13:21:11'),
(14, '3179586609', '$2y$10$T7BucPyrNTFYv.Y/ovgdFeXTd.RCSL/Ws3y81beXkzMcrCAHViMV.', 'PARIMAN', NULL, 'wali', '2023-09-05 13:22:21', '2023-09-05 13:22:21'),
(15, '3174966532', '$2y$10$PwbK7lsvCZdgx/GoicgwhuJaK2rYzspQc4LtRsEXCfS3J/1iJTM0W', 'HENRY EFFENDY', NULL, 'wali', '2023-09-05 13:23:28', '2023-09-05 13:23:28'),
(16, '3181606734', '$2y$10$9Fjy0cAVw9OgdXuvMn6PhuGvpXRxvmxaUI8zo2yXJVhTHOL/WUNSi', 'SUWAJI', NULL, 'wali', '2023-09-05 13:25:17', '2023-09-05 13:25:17'),
(17, '3170562057', '$2y$10$BpNe0tVRr.40HD3snq0bzeVHCCkG4NysBvGZGIfozxBHdAHzLaMKq', 'JUMADI', NULL, 'wali', '2023-09-05 13:26:40', '2023-09-05 13:26:40'),
(18, '3182719696', '$2y$10$067FJsROpqgcxJrv4jx2w.ZAGj4dxo.Sq145nb3IZys8rJ6SKBG8y', 'WAHYU BUDIYOKO', NULL, 'wali', '2023-09-05 13:28:04', '2023-09-05 13:28:04'),
(19, '3183724058', '$2y$10$xuE6sqLqbt3vmrRLAVAudemnUBRZZxkqldc7TB4KZeaqCho.xOjFO', 'MUSLIM', NULL, 'wali', '2023-09-05 13:30:13', '2023-09-05 13:30:13'),
(20, '3181677262', '$2y$10$Z4OFb6/XzjYreyEtgxE8I.jEzNq.FKV556petalHdHPnaJc5Se86K', 'MUHAMAD ABDUL KHALIM', NULL, 'wali', '2023-09-05 13:31:25', '2023-09-05 13:33:55'),
(21, '3195440275', '$2y$10$ii1pCaqPWUJyrEcAxQ4JO.Ie9ZNAILQEKMsr7uTCVII.K1OHVGVoi', 'HANAFI', NULL, 'wali', '2023-09-05 13:47:12', '2023-09-05 13:47:12'),
(22, '3188982576', '$2y$10$fIt1yQWf1xerSsY07/xG7ORobvmxuX6wYXygpg4VIS6uwXx8Lp8ky', 'ALI WAHYUDI', NULL, 'wali', '2023-09-05 13:50:26', '2023-09-05 18:25:23'),
(23, '3174180241', '$2y$10$hZOXxlSr1c651RSiUFqYWedOF2uS8WgHGQwae6Y1NFyQnRBs/ulz.', 'MUHAMMAD NUR KHOLIS', 'photo-user/9tVDrykW0OFiDlKCAtp7t5vVIYHt5eSdMb8NyZlU.jpg', 'wali', '2023-09-05 20:45:09', '2023-09-08 18:17:14'),
(24, '3185698439', '$2y$10$yL01FMoVwY4k3tT/N8L4juk4EuwS8B7cFH4mrzNk4udTy5.q4jfIq', 'M. ZAENAL HABIB', NULL, 'wali', '2023-09-05 20:46:32', '2023-09-05 20:46:32'),
(25, '3185210912', '$2y$10$fnWHSVgMcLnb.iPC.9ZQQO9OkajfzlXKeb99LxOgsjjRE7kMp90rm', 'AFIF SYAIFUDDIN', NULL, 'wali', '2023-09-05 20:47:56', '2023-09-05 20:47:56'),
(26, '3189803868', '$2y$10$/nYh2kt1YLqjtsdEaPOhYu71eNdEcvCfK9OWpwIwL7yH5Aq7hYz12', 'SALIMAN', NULL, 'wali', '2023-09-05 20:49:03', '2023-09-05 20:49:03'),
(27, '3193313123', '$2y$10$OQHfFYqJYG4nPB7snMv1YOLcQUbX6euIgHELu9vHLKVfvG9PUFSby', 'KUKUH SATRIO UTOMO', NULL, 'wali', '2023-09-05 20:50:22', '2023-09-05 20:50:22'),
(28, '3318025410890002', '$2y$10$hNbEUg9lA2kqr3bkUuUjTO7Efz9duZQWUZLWryrUYw3cHMOnIyBZS', 'DWI KARTINIATI', NULL, 'guru', '2023-09-05 22:01:54', '2023-09-05 22:01:54'),
(29, '3318024111950002', '$2y$10$7Q0oAuAOitGfpIh43Yxir.Z5eZ28CRmZPc/6N7VTXhYWtN.cMdtOe', 'SITI FARIDA HASANAH S.Pd', NULL, 'guru', '2023-09-05 22:03:03', '2023-09-05 22:03:03'),
(30, '3318014305830004', '$2y$10$.b5T2FAIML5a2PJjkTtZueU5fMuY5NMHUG6Cg4uIOxCsJPRg7hOqS', 'SRI MAHMUDAH S.Pd.I', NULL, 'guru', '2023-09-05 22:04:04', '2023-09-05 22:04:04'),
(31, '3315155301950002', '$2y$10$w3jvf61CH2tFRSJFQK066.Ya.iVarm.bfnferxGbZPLdbYeQlOKHy', 'ARA LIANI SE', NULL, 'guru', '2023-09-05 22:05:18', '2023-09-05 22:05:18'),
(32, '3318026806960003', '$2y$10$T1NcTLk9Kw8ZoSnWfrCk8OtIZZ0Y4JFgZ4wpjaE3tcNeJdiCp9K6e', 'IFA KARNIAWATI S.Sos', NULL, 'guru', '2023-09-05 22:06:34', '2023-09-05 22:06:34'),
(33, '3187849527', '$2y$10$o3GB2AVDSzsvUltn.avR1.6fQrHOwU6toLwDoNJJZVptmyAHqIRYe', 'ACHSIN SUYUTI', NULL, 'wali', '2023-09-06 02:32:58', '2023-09-06 02:32:58'),
(34, '3197370339', '$2y$10$4KzVuYXmPDJeNcSba/zwUu8xsM1gfQahesKSVNWUc8GaH1ouuXbg6', 'JUPRI', NULL, 'wali', '2023-09-06 04:51:36', '2023-09-06 04:51:36'),
(35, '3168082156', '$2y$10$d1zqFqKqHuqZ/N8nt3cBEulCedj2Tq3rEhwFsHEOeYi3zES.YaA2K', 'MOH AZIZ MAULANA', NULL, 'wali', '2023-09-06 05:24:46', '2023-09-06 05:29:42'),
(36, '3168925264', '$2y$10$4irQpSXjx8yQRcA7BLZjE.GKrQw0JU1qkxbtbmemeNOec/.kFcOTS', 'MOH SOLEH', NULL, 'wali', '2023-09-06 05:25:57', '2023-09-06 05:25:57'),
(37, '3174768821', '$2y$10$KYLJKTMjaYtUiH7xRJlvruijlFDO17jKZYU4UzcW.lRi10qlKjSHu', 'MISBAHUS SURUR', NULL, 'wali', '2023-09-06 05:27:10', '2023-09-06 05:28:50'),
(38, '3167745486', '$2y$10$w6BosUh6bNv7Y95AEZqeC.1rvZ7KTl7bPs6eS0ow5X.ZBmzQPa5kC', 'PURNOMO', NULL, 'wali', '2023-09-06 05:28:23', '2023-09-06 05:28:23'),
(39, '3174530841', '$2y$10$Mue1cvQCx2ZMooZDjIIvduo6CBdHCfReIZocsBUHmScmDxhUeXYN2', 'MUHAMMAD FATHUL ULUM', NULL, 'wali', '2023-09-06 05:31:19', '2023-09-06 05:31:19'),
(40, '3179686438', '$2y$10$yQFaMFWUURxYvVCjU9ADnuMwHTEAmyAma770o4OO8D1NqD2Vo88WW', 'MOHAMAD HARTONO', NULL, 'wali', '2023-09-06 05:32:21', '2023-09-06 05:32:21'),
(41, '3168793199', '$2y$10$4R8APZ2PVcyJ2ZwRCdivs.77QkTA7eNNEicJNoiryq1bErpnKtroe', 'SUNARTO', NULL, 'wali', '2023-09-06 05:33:31', '2023-09-06 05:33:31'),
(42, '3160083622', '$2y$10$ui/4Yqrg0QNoD8lPFYMsc.M3LsRnayYYPkjmbMgROFfDHy9vKWptC', 'SUPAAT', NULL, 'wali', '2023-09-06 05:34:39', '2023-09-06 05:34:39'),
(43, '3171676930', '$2y$10$bQLqyeJqKfJ2zIJS6oayo.9QZE9LbwCpjP87S02k8VObww5qowfYK', 'SUGIHARTO', NULL, 'wali', '2023-09-06 05:35:39', '2023-09-06 05:35:39'),
(44, '3161321120', '$2y$10$NimPCJV63iyXvUqAaduOy.vqBUWpCqk//E1OGjH5hP4Q4CMPeKWci', 'ADI SYAHRONI', NULL, 'wali', '2023-09-06 05:40:15', '2023-09-06 05:40:15'),
(45, '3318114510980002', '$2y$10$ghPK6fZABzUykJORBeVHNu7JYO1pQUnpFAnWTh4tpRlua.GrNLr9u', 'AYU SULISTIANI S.Sos', NULL, 'guru', '2023-09-06 05:56:31', '2023-09-06 05:56:31'),
(46, '3318025303040003', '$2y$10$VR3E4jt1l1FnDkSxOubs7eYfMGq3t6VhZZivasEsueSx/wSOBdTvi', 'USWATUN KHASANAH', NULL, 'guru', '2023-09-06 05:57:37', '2023-09-06 05:57:37'),
(47, '3318027005000001', '$2y$10$obPJhgSRAyy540m4H8iK7.6mUdYY.lTuTktQPtzY7HIUaT/6UN/OO', 'SITI KHALIFAH', NULL, 'guru', '2023-09-06 05:58:32', '2023-09-06 05:58:32'),
(48, 'abhi', '$2y$10$DzpO6k2bdyq6crSQHZjDw.Bz6Wj.30y773mhwKS06I3tbGCRYWSrG', 'AAN SETIADI', NULL, 'wali', '2023-09-06 07:17:04', '2023-11-24 18:56:05'),
(49, '3174588602', '$2y$10$NAtyqiVAK10ZgyR2ifp8SuMxAtZXIPaE/PFQSUEu.TvfSOx1WgmXm', 'TRI MUJIANTO', NULL, 'wali', '2023-09-06 07:18:17', '2023-09-06 07:18:17'),
(50, '3181528488', '$2y$10$44J76MmM7AqwtRh/X8.dEuI41heVq95MdYbc/.pe.A5xFT5Vpy/cK', 'MOHAMAD ZAENURI', NULL, 'wali', '2023-09-06 07:19:18', '2023-09-06 07:19:18'),
(51, '3186903862', '$2y$10$rn7uGaK5gHV.CB5NJ5izc.aMumpdK7HLQzK0epZsf6Us/RrlLJ.ri', 'ANDI SETYO RINI', NULL, 'wali', '2023-09-06 07:20:22', '2023-09-06 07:20:22'),
(52, '3165460694', '$2y$10$GODQj1uG0MnmKoUF0Jp70./NQmyq6UX48tYkuLnv0QIK8kNDMkhi2', '-', NULL, 'wali', '2023-09-08 02:35:16', '2023-09-08 02:35:16'),
(53, '3164105996', '$2y$10$vSyMBusSkc/3o/HPfjxMZOAiEf/6/WlOyduCaTiDcfwU9dxpQEXaq', '-', NULL, 'wali', '2023-09-08 02:36:59', '2023-09-08 02:41:17'),
(54, '3155307698', '$2y$10$ylSiL2KBw9t95P4LgL2xb.e0DNAvF4R5MGOtHQ2ONpSctwSRGrzUS', '-', NULL, 'wali', '2023-09-08 02:38:45', '2023-09-08 02:40:40'),
(55, '3163948613', '$2y$10$Z36/zu.yOONDSuXfIMoUTuDrB3fCN72MnB/g5RuACyIU/4KNFRtWy', '-', NULL, 'wali', '2023-09-08 02:40:04', '2023-09-08 02:40:04'),
(56, '3184864136', '$2y$10$Q4hL3zsTCYhAKZdo38/Z/ODLZTTBJAyus9OiobSqCMWM5ijoVIC5q', 'NURKHOLIS', NULL, 'wali', '2023-09-08 02:52:52', '2023-09-08 02:52:52'),
(57, '3193465891', '$2y$10$IOKMgg9dYK/IAfn14ImeTejP2QyPiwcxaCLMn9TLY8ks49zNQDHgG', 'MOH MUHLAS', NULL, 'wali', '2023-09-08 02:54:04', '2023-09-08 02:54:04'),
(58, '3182513012', '$2y$10$PPFkC9BcnX3DgSHTZjV4pe/isvwT58YHnyjy5r0jaz3UmxLcXHh4S', 'MOHAMAD DAWAM', NULL, 'wali', '2023-09-08 02:55:10', '2023-09-08 02:55:10'),
(59, '3184071313', '$2y$10$f13kBVSKmlN7Pea0X7zSL.B47o6Tk.5GKe7aATVmlCefsgxskyFwO', 'HARTONO', NULL, 'wali', '2023-09-08 02:56:30', '2023-09-08 02:56:30'),
(60, '3165242007', '$2y$10$dDi2ZBDRSlQgTxqTUmsV/e5mT/J24VfNDKljwCmWwFxIqFnuR8X8S', 'FAUZI KRISTIANTO', NULL, 'wali', '2023-09-08 03:02:11', '2023-09-08 03:02:11'),
(61, '3165490155', '$2y$10$iWNzQJqK.Myc2khVQzvsO.ikdLGAqLfBjjzy8aIydgCbpgZrwNKxO', 'Eko Mulyadi', NULL, 'wali', '2023-09-08 03:03:31', '2023-09-08 03:03:31'),
(62, '3171545472', '$2y$10$GDKJhonv6ACWIMAV.3E1cOK2rtKHgbJQbWYipZYdz44v7v3akME.G', 'ARIS SAPUTRO', NULL, 'wali', '2023-09-08 03:04:30', '2023-09-08 03:04:30'),
(63, '3175034517', '$2y$10$ZbMZWdmQ.FarDxWBhczUXeMO0M0sbl.Ygtw.ORS1XR/Ry5NORU5XW', 'SABAR', NULL, 'wali', '2023-09-08 03:05:46', '2023-09-08 03:05:46'),
(64, '0159017059', '$2y$10$sgCZrvbAfD7F69xCo6JAQujzAf7Gqc954R0FOl8MuceMlrSDl1tmm', 'BENI PAMUNGKAS', NULL, 'wali', '2023-09-08 03:07:24', '2023-09-08 03:07:24'),
(65, '0176266353', '$2y$10$Msnn4nZ48RKhOBVgESaMluBvS8suOWxD6dDRyeTyb0mBkof5oihh6', 'ARIF PAMUJIONO', NULL, 'wali', '2023-09-08 03:08:38', '2023-09-08 03:08:38'),
(66, '3171751443', '$2y$10$DwOZFsltfOXro7J.eD2feO48V3dj22ZnFqxd30SA8NFkrM7lZ7mvK', 'M SHOHIBUL ASLAM', NULL, 'wali', '2023-09-08 03:11:34', '2023-09-08 03:11:34'),
(67, '3174516404', '$2y$10$xlu5iZkCgXxcMPHyhrKJpuhdD3WkABPhF/x.zhYEBr1hgDzIg28uC', 'WAHYU SUDARTO', NULL, 'wali', '2023-09-08 03:13:20', '2023-09-08 03:13:20'),
(68, '3179363186', '$2y$10$8c.IxcWol5/rCo39Hi9jiuvCoh10M/Gddb/Pn2PZHrafyIBqkNDvC', 'DAMAS CANDRA SETYAWAN', NULL, 'wali', '2023-09-08 03:14:27', '2023-09-08 03:14:27'),
(69, '3169558054', '$2y$10$MWiMdra7rvxpsFW5uxeeIORjJgH1biRuEaJp.IeX1LExAU7zSKjWC', 'ROY FAHRUDDIN', NULL, 'wali', '2023-09-08 03:16:43', '2023-09-08 03:16:43'),
(70, '3166466355', '$2y$10$zArNYaKuXlbNTQZx75uHrOybjX47loRCwqU4V9Lt2U34WIMN2Bn9S', '-', NULL, 'wali', '2023-09-08 03:31:28', '2023-09-08 03:31:28'),
(71, '3167414660', '$2y$10$GqRcBhCCHf9YBe1pzKsBtuX8e5f4bZeu89a4qZkc06mcGAj5NK4Za', '-', NULL, 'wali', '2023-09-08 03:32:42', '2023-09-08 03:36:32'),
(72, '3169104769', '$2y$10$vnEs7orEDJ6z7lbNFI19o.2./yI2h3eQGLyVpXjSH/rIRLyg/Q6WW', '-', NULL, 'wali', '2023-09-08 03:33:42', '2023-09-08 03:33:42'),
(73, '3163494472', '$2y$10$j2Xntfympt0K2.CRoLEn6e2izZZKdmiV8fPEx9.4c5CWbOjLnEm1a', '-', NULL, 'wali', '2023-09-08 03:34:52', '2023-09-08 03:34:52'),
(74, '3154115847', '$2y$10$bG4kEcHzLgRbWxj9.eJa/ODqX0LxSrCtcHkcDK1jbcihrTO9HVnmq', '-', NULL, 'wali', '2023-09-08 03:35:56', '2023-09-08 03:35:56'),
(75, '3160104496', '$2y$10$Jg2qOaP4sHIJp/wHtjqoOOI7RR968/xjtdyrNwTik0MP2Pn20t/qO', '-', NULL, 'wali', '2023-09-08 03:42:41', '2023-09-08 03:42:41'),
(76, '3187819576', '$2y$10$s1d3k8iSRISx0GLP52xyF.WaIXYt3i50hwLzPJBfsMQ/dSmayStvC', 'MUHAMMAD SAEROJI', NULL, 'wali', '2023-10-15 12:30:25', '2023-10-15 12:30:25'),
(77, '3178871060', '$2y$10$lHNy8k3qkV6Ed4G9mRPR4OXCz/hWeue8dP3DgAMKSd.x6vfdytWai', 'ALI MUHTADI', NULL, 'wali', '2023-10-15 12:32:41', '2023-10-15 12:32:41'),
(78, '3191438257', '$2y$10$chCcuZplDU7FI/Hzbd6iW.JuBrS3X6ODADNDMGxABHrJOUTPUy9aC', 'IMAM PRAYITNO', NULL, 'wali', '2023-10-15 12:34:41', '2023-10-15 12:34:41'),
(79, '3176344731', '$2y$10$t5gKcdPds0dJwXo422gr7.RdmvCS0d2fIcejDiVtf2wB4TNG5.vda', 'ABDUL SYUKUR', NULL, 'wali', '2023-10-15 12:36:37', '2023-10-15 12:36:37'),
(80, '3175910350', '$2y$10$5GngK2ftM4dEw.2ZNkceje2St4YoxMmWxYdEr.zdymfZfIZHWBY.6', 'EKO MARYADI', NULL, 'wali', '2023-10-15 12:38:20', '2023-10-15 12:38:20'),
(81, '3174004662', '$2y$10$0ZdfrDqMlI3ErKsI2Vt6JO2JyBRXEO2yKO0WvEBprNyMq5OfDm7L.', 'JAMJURI', NULL, 'wali', '2023-10-15 12:39:46', '2023-10-15 12:39:46'),
(82, '3184043158', '$2y$10$6vzaHT9WhP7PAGFwFe9w3OBWMvkiAJfSHDM1Zc39lJEwksr9tqQF.', 'BAMBANG SETIAWAN', NULL, 'wali', '2023-10-15 12:41:02', '2023-10-15 12:41:02'),
(83, '3185526037', '$2y$10$pSVEAg3xA3N1ZHBH0vXyhenTx07nnydm3rhdRoknyGwMonLCcdo7G', 'TEJO SUYANTO', NULL, 'wali', '2023-10-15 12:42:09', '2023-10-15 12:42:09'),
(84, '3177001720', '$2y$10$wsBQOsG8gvh1mVtaP/NcyexUrRW6V23VrXAZU8TutcUK8vkmy9IV6', 'ARDY SUSANTO', NULL, 'wali', '2023-10-15 12:43:29', '2023-10-15 12:43:29'),
(85, '3175019690', '$2y$10$WYz4VedJyKMRGH/cZozBYekJrU51FCxO6VcbqsMQtJu86DQ9q/EGO', 'SURO SAPON', NULL, 'wali', '2023-10-15 12:44:55', '2023-10-15 12:44:55'),
(86, '3178687786', '$2y$10$opJoxR830Y6Uvo0hZBUryu.FY93LaIC12YXFNhHCEYKtXa0lzliIK', 'ANGGUN SETYADI SAPUTRA', NULL, 'wali', '2023-10-15 12:47:13', '2023-10-15 12:47:13'),
(87, '3188155906', '$2y$10$zS5XWET8yH.woIV5fzIFPOR7i2FwiF5VaIPtTf0QDgPZTaP8jco.u', 'BAMBANG', NULL, 'wali', '2023-10-15 12:48:46', '2023-10-15 12:48:46'),
(88, '3186272220', '$2y$10$ZkP8NaBczRuQjCMv7XSy/ujotBT7pLWjbUdi/qQGxXoek5egGTFbW', 'MIFTAHUR ROZAK', NULL, 'wali', '2023-10-15 12:49:58', '2023-10-15 12:49:58'),
(89, '3176198177', '$2y$10$NLVI27ewFwg9Diia4EIFTuLEqx3nUk1Ki/Y6kHuz/6.NkdESY/6LO', 'ANDI ALFIAN', NULL, 'wali', '2023-10-15 12:55:52', '2023-10-15 12:55:52'),
(91, '3180835319', '$2y$10$HuH5ElL4XNPORAXgSeTPleh86vm/QmQTHLO92l1LoVr/wzIU.cm9y', 'SAFARIYANTO', NULL, 'wali', '2023-10-15 13:05:52', '2023-10-15 13:05:52'),
(92, '3175025759', '$2y$10$T.QMyJ/TvQyU4O7IIcTghe52mBe3ZZlacO/qxZkinVWeD0GFcJcSq', 'TUFLIHUN', NULL, 'wali', '2023-10-15 13:07:05', '2023-10-15 13:07:05'),
(93, '3172797891', '$2y$10$kv5wy.ICldDzPxNt.oHMbO6.iXwVSr2AksWt.7Boivcg.3bV6Bf0G', 'ROHMAT PARGIYANI', NULL, 'wali', '2023-10-15 13:09:02', '2023-10-15 13:09:02'),
(94, '3185502133', '$2y$10$eB.CdCJ/EczI4/s6RTdUTO2URCPrAVOiyi3/oc2AOSw2wHhQs3Lpu', 'MHD.CHOIRUL MUTTAQIN', NULL, 'wali', '2023-10-15 13:10:31', '2023-10-15 13:10:31'),
(95, '3186138435', '$2y$10$dGJdDdlm3ojgrYXCeHdPT.8jCLWdll/RtK8tG94N1uMAGuu7VtLVW', 'MOH KOMARUDIN', NULL, 'wali', '2023-10-15 13:17:23', '2023-10-15 13:17:23'),
(96, '3184929906', '$2y$10$l1lw2MVovNr1i9Z6NEIFZunWcRXYxUR/adK1G9qCzZUMHOjSH4Apy', 'ADI SUPRIYANTO', NULL, 'wali', '2023-10-15 13:24:50', '2023-10-15 13:24:50'),
(97, '3181594334', '$2y$10$CxgnafKv2hPnFNRMgukRUebwvtRlJPI1Cew88EXcdQBSvMfSDZp7a', 'SUGIANTO', NULL, 'wali', '2023-10-15 13:26:16', '2023-10-15 13:26:16'),
(98, '3186439833', '$2y$10$fN4asNKfqiHz5rE/WfiJreBbClnPh0VycS4X4LiHWJaLLbt1dH49q', 'MOH WULAJI', NULL, 'wali', '2023-10-15 13:27:50', '2023-10-15 13:27:50'),
(99, '3175346531', '$2y$10$DeXabzj9LTy1uVmSJrAAVO4YnWXxY9zTNwUatwKauDAB4LU/xTszm', 'SRI WAHYUNI', NULL, 'wali', '2023-10-15 13:29:19', '2023-10-15 13:29:19'),
(100, '3192358051', '$2y$10$xuQNS9Wp5Nejc9tiWVerSuQoZyfbjMpo95qXyIwMi0Gmuvtwj0Vb.', 'BINTANG BIMA PAMUNGKAS', NULL, 'wali', '2023-10-15 13:30:35', '2023-10-15 13:30:35'),
(101, '3175971804', '$2y$10$yVL02pFcLfKlQPKZ75.X7.rvNJHX3gzbfNysZaQkWQJ9vp/fcvLBS', 'EKO PRIBADI', NULL, 'wali', '2023-10-15 13:31:49', '2023-10-15 13:31:49'),
(102, '3174064395', '$2y$10$tpmqby6/3ru4p2IUsQlrnucUbG2DLLSLvQhAEHyra6GzKI8ddBJJO', 'SAERI', NULL, 'wali', '2023-10-15 13:38:44', '2023-10-15 13:38:44'),
(103, '3186460022', '$2y$10$IsAv9aw/JnIZYcdoizchM.RTCbsvX8qDUToQdYFvQ8oQv89ttb4gq', 'NOOR ROKHIM', NULL, 'wali', '2023-10-15 13:39:50', '2023-10-15 13:39:50'),
(104, '3183678093', '$2y$10$Tcbp3UCsqi1KR5IfMsngveBIK5.E/skyJfkbG/EgctzJx1WAZA9KG', 'SAKTI HARYO BISMOKO', NULL, 'wali', '2023-10-15 13:40:56', '2023-10-15 13:40:56'),
(105, '3186316395', '$2y$10$WsM1KvBgVIfiqmHX1a4hCe8Q3ImupqcL.fwbNzzWlrYs9vXGw/6da', 'SUTIYONO', NULL, 'wali', '2023-10-15 13:41:55', '2023-10-15 13:41:55'),
(106, '3187650749', '$2y$10$iJ4YEdc1ZdZ/FAW74Axct.BzsTCs6LI8Pek9.aMQo5A6eXNl44qle', 'SYAMSUDDIN', NULL, 'wali', '2023-10-15 13:45:48', '2023-10-15 13:45:48'),
(107, '3171200659', '$2y$10$tSE0pT2sf.BWMIfZXmM0.uBG5VKJ3LtibXbdxoShjxn7Na.sqqiUm', 'MUHAMMAD AMIN ROKHIS SUPRIYANTONO', NULL, 'wali', '2023-10-15 13:47:12', '2023-10-15 13:47:12'),
(108, '3177344390', '$2y$10$UiBOTC7.RMmiI/KfBq7dgOTtt0wCxBMGH0frcTIg6l7JDXs2ZhQjq', 'ALI MUHTAROM', NULL, 'wali', '2023-10-15 13:48:20', '2023-10-15 13:48:20'),
(109, '3183936778', '$2y$10$hyvjG2Jv6WcDTiOJmWe/We7i.pUQL29U04fDZYbLN5rAP6qRo57VS', 'PRASETYO WIDODO', NULL, 'wali', '2023-10-15 13:49:22', '2023-10-15 13:49:22'),
(110, '3181815874', '$2y$10$RolYVEHJEfwzz/Dy7uSyB.f/SroHkbzTGcYzYo4uQxC.9cnF5UQdO', 'MERIO PRATAMA', NULL, 'wali', '2023-10-15 13:50:31', '2023-10-15 13:50:31'),
(111, '3183477021', '$2y$10$Rh9QqgVPtpdtmYK/losuuOa5mDVhfJG99zLu6ucEOtkKJEkfAbhIm', 'TRI HARYANTO', NULL, 'wali', '2023-10-15 13:51:32', '2023-10-15 13:51:32'),
(112, '3180366631', '$2y$10$QPZ9iTUbg9VlXWaphN.iR..5roEj3QiRVvDaZ1lTRcwJhv5vglsga', 'AHMAD SHOFI\'I', NULL, 'wali', '2023-10-15 13:52:32', '2023-10-15 13:52:32'),
(113, '3187620093', '$2y$10$6cWuzKtZcN9C7tZjS1vJI.nI0kHpyvf9up2df3irDKXe1v7j.j.sC', 'ALI MUHAIMIN ABDUL MUJIB', NULL, 'wali', '2023-10-15 13:53:34', '2023-10-15 13:53:34'),
(114, '3168251528', '$2y$10$SzXy/UnOZw1FWnwqDF.okuEzj9/ZKajtTOe0hvGqyrRJd40Uclmti', 'WAWAN ARIYANTO', NULL, 'wali', '2023-10-15 14:03:03', '2023-10-15 14:03:03'),
(115, '3166287049', '$2y$10$Aa097Mk5BnDUwYfqIz6fCOoYiPH2lgzuOGxmaxTQVf9E0S9rs3kLG', 'ARIS SUSANTO', NULL, 'wali', '2023-10-15 14:04:18', '2023-10-15 14:04:18'),
(116, '3168331731', '$2y$10$WnOXP6kA5WtVOPE4ufX7Veoz12B0DvjwfAT6o0RNzE8mY0FiOc2Q.', 'ROFIQ SYAFI\'I', NULL, 'wali', '2023-10-15 14:05:16', '2023-10-15 14:05:16'),
(117, '3167595577', '$2y$10$g7n0.GqeZgPgFX1oNngut.rfCc9dC/LErblER9zCcLZOoDK55uJ/6', 'AHMAD MUHLIS', NULL, 'wali', '2023-10-15 14:06:22', '2023-10-15 14:06:22'),
(118, '3161933772', '$2y$10$fUD.IfpPPIGdnAZcLQ2Gn.sfXxa7DSvIPImqgCndV70rzUVxTQEde', 'M ANIP MULYONO', NULL, 'wali', '2023-10-15 14:07:43', '2023-10-15 14:07:43'),
(119, '3164583570', '$2y$10$dqTMMJSk18ai3MdtOky7ReVaw71RAH7cRMuSdmzEqE3eau0Z8VNvC', 'M ANSHORI', NULL, 'wali', '2023-10-15 14:08:43', '2023-10-15 14:08:43'),
(120, '3165556796', '$2y$10$d7x8xTLYGypZapN4uoGQHOELHyUaI6mNxC/5XKmQCyZcwAgolIFyS', 'AHMAD SHOLEH', NULL, 'wali', '2023-10-15 14:09:53', '2023-10-15 14:09:53'),
(121, '3164607300', '$2y$10$HQizEeQ1IwABuyY2zmxjauZ0AaWMbUNZeZNU/nhZwqgVBl6bFb.mC', 'ARIF KHOIRUL JIHAD', NULL, 'wali', '2023-10-15 14:11:01', '2023-10-15 14:11:01'),
(122, '3160240204', '$2y$10$7tfywtIjpxcLXASfk6Z2u.fxp/Z90vd8vC4Po5S668OiTPcFNF4VK', 'SUHIRNO', NULL, 'wali', '2023-10-15 14:12:05', '2023-10-15 14:12:05'),
(123, '3161979817', '$2y$10$RLEZ3.lIXnppXpo53PGTg.NRUdKgyYETC7X2GDxKn5CWev.a8B0RW', 'EKO WAHYUDI', NULL, 'wali', '2023-10-15 14:13:07', '2023-10-15 14:13:07'),
(124, '31435654', '$2y$10$MYQQprNQ1vxfdcR5tJ1rUejNyWMFreD/9qDtONmrom0feTXlPoqPW', 'DESI MUNIF ARDIANTO', NULL, 'wali', '2023-10-15 14:35:37', '2023-10-15 14:35:37'),
(125, '3168139047', '$2y$10$/Hr9.5iHPcbJVpSgvVsR9emCWE0hYYqWdwztC7fPbeZl2gQrY8epG', 'WAHYU SETIADJI', NULL, 'wali', '2023-10-15 14:36:48', '2023-11-24 20:16:32'),
(126, '3179234095', '$2y$10$OCdqsLqrl6q28fJdSAm9IulRWeCgGqUMlwC8tmJTd8I6ioLMewqjS', 'WAHYU SETIADJI', NULL, 'wali', '2023-10-15 14:37:59', '2023-10-15 14:37:59'),
(127, '3166204107', '$2y$10$MYjZcaFLnm8L6iwvg.LlTuyKA68J9XjXRU0CNflskkIpdnxfL4LZu', 'RIFAIN', NULL, 'wali', '2023-10-15 14:39:28', '2023-10-15 14:39:28'),
(128, '3165216346', '$2y$10$gTyR5bMLcWofV63OA0V91uFR0xlzUTH0U4qaKDZDBOYac5xv/GpU6', 'EKO ARI SUSANTO', NULL, 'wali', '2023-10-15 14:40:27', '2023-10-15 14:40:27'),
(129, '3177038109', '$2y$10$RUWP48t76geioWaUyTBAeOIu4bzZPlbij2LoOX7hHf0jAQPLcmFMS', 'EKO YULIANTO', NULL, 'wali', '2023-10-15 14:41:27', '2023-10-15 14:41:27'),
(130, '3175494636', '$2y$10$3DBpGvc6m5j0n9pY25tWUuBgbWByd180/0xXPqBButQWFUcZO7S9y', 'MOHAMAD AFIF MUSTOFA', NULL, 'wali', '2023-10-15 14:42:45', '2023-10-15 14:42:45'),
(131, '3164125865', '$2y$10$ruTDaxNyFzgaPxf9xkPWv.SX3WAO1SlBaZkxKSVLjk9S9ov8.pKOK', 'ZAENAL ARIFIN', NULL, 'wali', '2023-10-15 14:43:48', '2023-10-15 14:43:48'),
(132, '3171862111', '$2y$10$lmWlNRKcWmeKy7TootpU5u6N/dHxoHpTu/gHAQHIYdFkxRECtcviS', 'MUH SUBEKAN', NULL, 'wali', '2023-10-15 14:45:35', '2023-10-15 14:45:35'),
(133, '3177755009', '$2y$10$yokv8/KJtcEsskmH.SB.Weo8Dzk42qGgbejAzl91jZka2ybqQDg4C', 'SUPRIYANTO', NULL, 'wali', '2023-10-15 14:46:44', '2023-10-15 14:46:44'),
(134, '3176352340', '$2y$10$IL8xshXVY4NI1hvInnaY1.qkOKyycMKL4tYtbw0v1R8ITv.BzuQUO', 'MUHAMMAD MUCHLISIN', NULL, 'wali', '2023-10-15 14:47:44', '2023-10-15 14:47:44'),
(135, '3170150892', '$2y$10$o1OK0pipNst5TX9guY9WFeXsbfERay.gmrDjHAxjf49q6uFaXJ9ha', 'TRIA AGUS IRAWAN', NULL, 'wali', '2023-10-15 14:48:56', '2023-10-15 14:48:56'),
(136, '3174448086', '$2y$10$2IOAD4nXuSqLl2chyy0L0uiCoiMDsRad3O6Blxve0ttFt7BaMfia.', 'ISMOYO', NULL, 'wali', '2023-10-15 14:49:57', '2023-10-15 14:49:57'),
(137, '3176153600', '$2y$10$K/eCg6PsOeq/0HENyp2mYO6CSBRttlmNQeGpo7R4LiP4ISVlPrfv.', 'SYAIFUDIN ZUHRI', NULL, 'wali', '2023-10-15 14:51:05', '2023-10-15 14:51:05'),
(138, '3179842854', '$2y$10$DopGF/bYFlI9pQ8wHjq9Ju6bYxNSoZ0WJuSQntO0E1.3OGV8iliMG', 'RAHMAN WIDODO', NULL, 'wali', '2023-10-15 14:52:12', '2023-10-15 14:52:12'),
(139, '3176741243', '$2y$10$X8ozbjX/GYwoOf7ciSWx4./Tyg6r6/tlHC4XmvCWhs7UkAFZjxymm', 'SANDI AGUS SUSILO', NULL, 'wali', '2023-10-15 14:53:40', '2023-10-15 14:53:40'),
(140, '3172682040', '$2y$10$fIzeoiXIp6LXHzbnX/pAYOVGbA6a2hy0I193XnJsFeX0MKk1XHZ9.', 'AGUS RIYANTO', NULL, 'wali', '2023-10-15 14:54:51', '2023-10-15 14:54:51'),
(141, '3170629929', '$2y$10$/fglUjAT2SRcKkpxr55wcuyjjHd1zLngWsxKt.G2PEYVhAxpLB/KK', 'GHUFRON KURNIAWAN', NULL, 'wali', '2023-10-15 14:55:55', '2023-10-15 14:55:55'),
(142, '3170146692', '$2y$10$Ue46Q6uCekH52x9KPs88aOqiFU3P0MbA.Ms6ZgypBG1K/SY0YndSa', 'WAHYU LIS SUGIANTO', NULL, 'wali', '2023-10-15 14:56:48', '2023-10-15 14:56:48'),
(143, '3178610212', '$2y$10$BgrK.py/jjuuhd9uakMFlOjmq1IA0QqM9K895UJUl.wpboX/r2m9O', 'BAYU MARSONO', NULL, 'wali', '2023-10-15 14:57:56', '2023-10-15 14:57:56'),
(144, '3162204368', '$2y$10$xpyQh.lXz1awRuYVX71L3.uFePRid4/Z74jLAinjeF4XschfPySEq', 'PIKO BAYU AJI', NULL, 'wali', '2023-10-15 14:59:06', '2023-10-15 14:59:06'),
(145, '3176600178', '$2y$10$kAy1Ye8yLnul8hDK65jVc.CvR0XXfiF9rVK7ASC1pM6P9QFx2wuAy', 'SUTRISNO', NULL, 'wali', '2023-10-15 15:00:32', '2023-10-15 15:00:32'),
(146, '3172852961', '$2y$10$7We6/KFROJFjnmZhsriUrO2C0rzQHhYzKbql5e7JsaIuANwQj1O2a', 'WAGIMAN', NULL, 'wali', '2023-10-15 15:01:59', '2023-10-15 15:01:59'),
(147, '3177786721', '$2y$10$0vQytKxAWtZXCFl1J0fngeoxgB5YJI9/d/C9UCPJYiprn7fPghR9y', 'SYAFIQIN', NULL, 'wali', '2023-10-15 15:04:12', '2023-10-15 15:04:12'),
(148, '3176519255', '$2y$10$u4oJ583jUm4UXO4a0fkU.uHN1afdF3ufgMtIad5rY49ta9MkPem.u', 'SUNAIDI', NULL, 'wali', '2023-10-15 15:05:14', '2023-10-15 15:05:14'),
(149, '3178623289', '$2y$10$H8YNgLx1xJSLbRydF0N91.GyBgvnUpp9WsbRPmckCBhKWBT/RUqqC', 'MASUDI', NULL, 'wali', '2023-10-15 15:06:08', '2023-10-15 15:06:08'),
(150, '3172283796', '$2y$10$J4.LJ3lv4PUcoJCzPxU/xuhwNGcgKwMYYNlS0ypDoEqWhI8nYLY0C', 'JASIM', NULL, 'wali', '2023-10-15 15:07:16', '2023-10-15 15:07:16'),
(151, '3171525435', '$2y$10$4tJw4JB9WaKn43K4R5pGA.IpV8ezawrvbxAJuRNnEhtEfCdO3h1ju', 'MOH RIJEKAN', NULL, 'wali', '2023-10-15 15:08:22', '2023-10-15 15:08:22'),
(152, '3179133724', '$2y$10$xeBeespe8DGBMvKv8/lPkuivpaVJ/5E5ROPHEfjGKVj4/lOon7Vne', 'JOKO SUSILO', NULL, 'wali', '2023-10-15 15:09:30', '2023-10-15 15:09:30'),
(153, '3177870794', '$2y$10$gWgNh9R/SK0hOr7nhYvKTulcTvsrpQ8c.K7CGJ52zpYL1Bj5FEgR6', 'SUSILO', NULL, 'wali', '2023-10-15 15:10:34', '2023-10-15 15:10:34'),
(154, '3178459415', '$2y$10$jivD8iljG/0HAaIlRIGOF..yhNuU6dDuA79Y.xZaqltc/Ty/vOWWO', 'MOHAMAD SOFYAN', NULL, 'wali', '2023-10-15 15:11:37', '2023-10-15 15:11:37'),
(155, '3163202452', '$2y$10$U4zx4WqznhoA0nRcTUwZvecPGaArirk2gYKSymo0MVePxlvCH4M.S', 'DEKY PRASTYO HARIJANTO', NULL, 'wali', '2023-10-15 15:12:38', '2023-10-15 15:12:38'),
(156, '3167022861', '$2y$10$x4IIXYsPTXqaE2R2NmOaSOtzVnZEzbIYToCuXD7FzurR5j7uUW66S', 'IMAM FAJAR SHODIQ', NULL, 'wali', '2023-10-15 15:13:47', '2023-10-15 15:13:47'),
(157, '3160952719', '$2y$10$rmGDvAlrQQAlid/JNKdwp.a4b9M5mw/TmRVyPa4OSJg.2FlFy8lJu', 'ALIM WARDOYO', NULL, 'wali', '2023-10-16 03:12:58', '2023-10-16 03:12:58'),
(158, '3170421076', '$2y$10$g6LvvT4BkUFeWk7VaZ1uGOIoRCs.y8JiM1nBGDOSTIE2d9gNGlnzu', 'AGUS SUHARTONO', NULL, 'wali', '2023-10-16 03:13:56', '2023-10-16 03:13:56'),
(159, '3177826453', '$2y$10$8yf1WHS24M0gsmthyCV/JerPsbmN1Irms0CeZD1IxhcZq0R8kcqby', 'SULISTIYONO', NULL, 'wali', '2023-10-16 03:14:53', '2023-10-16 03:14:53'),
(160, '3175888181', '$2y$10$46.Mc4lHnAh19TQxNvWRY.02K4gRAAlhGDCdi1QjojDLWh9MGarPi', 'RIZA ABDUL MUNIF', NULL, 'wali', '2023-10-16 03:15:58', '2023-10-16 03:15:58'),
(161, '3177760717', '$2y$10$DKgOrnjDe2L40DeMKoqMCON5z1tx.H2HAGmAKZycB.wkMNO5dKy/m', 'AHMAD SYAEKUL ARIFIN', NULL, 'wali', '2023-10-16 03:16:53', '2023-10-16 03:16:53'),
(162, '3174627526', '$2y$10$2YmwJDaPqt5bPPEKr4ABy.Hf83/c1r/kCOPQWakmO1tkDLVNgCEkO', 'SUGIHARTO', NULL, 'wali', '2023-10-16 03:17:55', '2023-10-16 03:17:55'),
(163, '3167233563', '$2y$10$C1oTo4tBXeQtS5fBznkV1Or94dW.NHpwOzp8IywiEhXPevq3WL5m.', 'JASMO', NULL, 'wali', '2023-10-16 03:19:45', '2023-10-16 03:19:45'),
(164, '3175609783', '$2y$10$7nxb2MdOMI3nOQZuGvrRX.fV0Sk5Vw/qigFdEqoOvsJ4e5bWZJqWC', 'SUMARTONO', NULL, 'wali', '2023-10-16 03:20:39', '2023-10-16 03:20:39'),
(165, '3170663059', '$2y$10$4yp/XXL7EIaPTz616WruPeYX0khnpwaIZRt/7ZCo9VBbhS7Z3p.dq', 'ABDUL LATIF', NULL, 'wali', '2023-10-16 03:21:46', '2023-10-16 03:21:46'),
(166, '3171697244', '$2y$10$U/8tDvVMX4Vh/fIhLumOxu8bRPwPnCdfgLpdlKd5wEEBe6AqDCxz6', 'ARIF HABIBI', NULL, 'wali', '2023-10-16 03:22:51', '2023-10-16 03:22:51'),
(167, '3166858082', '$2y$10$rT6gryxZBOy2ooApaEdCGuulW/5Z0LDQsBvfXIfvdNQPq8bkJKVNS', 'AGUNG SUGIARTO', NULL, 'wali', '2023-10-16 03:23:52', '2023-10-16 03:23:52'),
(168, '3166963992', '$2y$10$2tekj837Wk2NeO2HfUJV/e57ovf0/K/4ZfKukRW8z7mQ86AQ9GQSq', 'AHMAD FAOZI', NULL, 'wali', '2023-10-16 03:24:59', '2023-10-16 03:24:59'),
(169, '3163133750', '$2y$10$1hmi/yDyvucwDBQgdFDRU.L/.ySQvgTJVSgujLU70nBRuMuSj5V9q', 'SUTIKNO', NULL, 'wali', '2023-10-16 03:26:06', '2023-10-16 03:26:06'),
(170, '3168965332', '$2y$10$Wwnofo0Rcm4ArlZiq0lSJeFLgnynpOGMv7F6KRjVOg9BLfZm.uQ8a', 'SUWITO', NULL, 'wali', '2023-10-16 03:27:23', '2023-10-16 03:27:23'),
(171, '0163642064', '$2y$10$mpmoDypmiO9/a20W7XKP2.fIpjCoxnD0GWyDXNRUmbdjpUpDyCzGq', 'SUNOTO', NULL, 'wali', '2023-10-16 03:28:20', '2023-10-16 03:28:20'),
(172, '3168398238', '$2y$10$gOj2QQKmsCoEb4RGbkxR9eDymXZXF8w8ICiwjCt14hRAHKoGN3q7C', 'MUHAMMAD SYAIFUDIN', NULL, 'wali', '2023-10-16 03:29:14', '2023-10-16 03:29:14'),
(173, '3175785565', '$2y$10$fSfTjBKTQyTxME9GCNZmi.gVN8UirHSZPPrE6xuVHROXwD35t/isW', 'SUHARDI', NULL, 'wali', '2023-10-16 03:30:11', '2023-10-16 03:30:11'),
(174, '3167436562', '$2y$10$uaqTYSTuU7MP0d9ayID3v.MvfijMBTGJREbtJKLvbs19Wx4ynD9L2', 'JONI PRASTIYO', NULL, 'wali', '2023-10-16 03:31:19', '2023-10-16 03:31:19'),
(175, '3161734020', '$2y$10$UL5uTI/clu/ZUMzYLWmZiuPttSA8B9Nk1wusO4MVrk0JONbwpIoGC', 'SAEROJI', NULL, 'wali', '2023-10-16 03:32:30', '2023-10-16 03:32:30'),
(176, '3162343698', '$2y$10$JmUxuhO1kwXka/5SsDeeFukFIMh1Apq5au3INoUN.fsntHMYh0VOS', 'FAISAL DARIS FAHRONI', NULL, 'wali', '2023-10-16 03:33:28', '2023-10-16 03:33:28'),
(177, '3172093843', '$2y$10$9nW3DaawWiTbVW4wtbsNX.jL3B.M9zWrBdTRLg.Bu/Z5D0gr0B9my', 'FAJAR HAFIZ', NULL, 'wali', '2023-10-16 03:34:35', '2023-10-16 03:34:35'),
(178, '3174953127', '$2y$10$hkegyTcP0oWrdRsP7ZxWhOudMfgncl1ytiLNdrUnOeEuCo179LcU2', 'JOKO SANTOSO', NULL, 'wali', '2023-10-16 03:35:44', '2023-10-16 03:35:44'),
(179, '3159292388', '$2y$10$4B3Vmjl7vZodhC6zO4NRYu/3U6a1gZJomiNecT6GFTBv7Wl/d62fi', '-', NULL, 'wali', '2023-10-16 06:04:34', '2023-10-16 06:11:19'),
(180, '3167701511', '$2y$10$uJghE0DPYskHcK61sDv7LuzL9BTdNKrMpTmKJ3CfXhPlXbFtcUGnW', '-', NULL, 'wali', '2023-10-16 06:05:45', '2023-10-16 06:10:32'),
(181, '3159876844', '$2y$10$Uc5bbVDad1lCxBfYqOC4HuUyBDI84HHLYasIsIjdXXeheuoUljIkG', '-', NULL, 'wali', '2023-10-16 06:06:50', '2023-10-16 06:09:46'),
(182, '3152323666', '$2y$10$dNYpWqusm.UJULHkDYH5mOuxwhfKZSObcUsvHA2XayK77YnmhRBFa', '-', NULL, 'wali', '2023-10-16 06:08:04', '2023-10-16 06:08:04'),
(183, '3152326368', '$2y$10$H1QClRB6LSGgVjtD4.55s.lgIuhjas3GSpFBpSiJgO3rZr2YXkywW', '-', NULL, 'wali', '2023-10-16 06:09:12', '2023-10-16 06:09:12'),
(184, '3164463093', '$2y$10$QdE7vCNl/dXhNj4n4isKyOiMA2FaDnl/Azbj0/rJy0PsCpOvox./y', '-', NULL, 'wali', '2023-10-16 06:13:24', '2023-10-16 06:13:24'),
(185, '3159260514', '$2y$10$P0WPVNzZo/0Ie4tQdTGoIepg5PzmuxKPOaYiCNiHFkgrb3dLvsMZS', '-', NULL, 'wali', '2023-10-16 06:14:32', '2023-10-16 06:14:32'),
(186, '3169072444', '$2y$10$flMkD4RR8XeIHP1szBVawex6.mrQU14mShfgi45FWZbxAWPVBMtKi', '-', NULL, 'wali', '2023-10-16 06:15:37', '2023-10-16 06:15:37'),
(187, '3155788976', '$2y$10$x92OuY0Zi8iIaEPSkX17vONNA4VwMypiy7/TXq43rkEBV/Ttgj9K2', '-', NULL, 'wali', '2023-10-16 06:16:43', '2023-10-16 06:16:43'),
(188, '3152515127', '$2y$10$GZqNRwQto6TZu.l2Oj6WoOVgDOKs6u7IWHALONK9uVBi0QNFf.uxy', '-', NULL, 'wali', '2023-10-16 06:18:02', '2023-10-16 06:18:02'),
(189, '0154921226', '$2y$10$tYtV7POAXJpvovDTST342uDFz9VmVHgPXf9DpitfvZMxKXNQjx6aq', '-', NULL, 'wali', '2023-10-16 06:20:21', '2023-10-16 06:20:21'),
(190, '3167448102', '$2y$10$MnlvI/SSv.q5DqHs8VzJXuIikRU7xcTotlb7fI8BAbOm5khnQsT12', '-', NULL, 'wali', '2023-10-16 06:21:24', '2023-10-16 06:21:24'),
(191, '3166722073', '$2y$10$Yi8LYiHPwzHxF/RRYOfct.AHqv773VN.sGxWAeIVZZFN5BHE5.JOO', '-', NULL, 'wali', '2023-10-16 06:22:26', '2023-10-16 06:22:26'),
(192, '0165858473', '$2y$10$a0hiFWksFCQt9dGs/sbbp.Jygkh175S.aGgT0IzzlpEV9sZgFk6I6', '-', NULL, 'wali', '2023-10-16 06:23:25', '2023-10-16 06:23:25'),
(193, '3160391558', '$2y$10$p6wZv9vhC2kMubCAw1gCq.EBeWQn1nvJs5ZiLk61/hEMRjXKQ.OTa', '-', NULL, 'wali', '2023-10-16 06:24:22', '2023-10-16 06:24:22'),
(194, '3164051197', '$2y$10$Bs3DAxfPJctJ4LhxsbbeCuJpEkZMhRIovAIU3T0450zKBZexojefa', '-', NULL, 'wali', '2023-10-16 06:25:24', '2023-10-16 06:25:24'),
(195, '3150239966', '$2y$10$RcuJz302KOy2j9yAgJncveMjzmhkEJwDNVHXbErOIUOiG.fByGyfO', '-', NULL, 'wali', '2023-10-16 06:26:29', '2023-10-16 06:26:29'),
(196, '3155789993', '$2y$10$/9WkuDYvNFD5DfVLI6uB/.h/Q8ufpXAEfoJTz7kg7btWK1TRDCm2C', '-', NULL, 'wali', '2023-10-16 06:27:42', '2023-10-16 06:27:42'),
(197, '3160775690', '$2y$10$.Y33/tBihwxY1fd1kinvGeaZkvfxGVQxEvn98xZWztWYxVLUNNmlq', '-', NULL, 'wali', '2023-10-16 06:28:59', '2023-10-16 06:28:59'),
(198, '3153406427', '$2y$10$AXgW3ye8/j0jROV.LO9u1O0KD3E7oomZXciWssbRIx6qM00gvuehy', '-', NULL, 'wali', '2023-10-16 06:30:02', '2023-10-16 06:30:02');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detailreport`
--
ALTER TABLE `detailreport`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `evaluasi`
--
ALTER TABLE `evaluasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `fotoperkembangan`
--
ALTER TABLE `fotoperkembangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guru_nuptk_unique` (`nuptk`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `perkembangan`
--
ALTER TABLE `perkembangan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `siswa_no_induk_unique` (`no_induk`);

--
-- Indeks untuk tabel `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tema`
--
ALTER TABLE `tema`
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
-- AUTO_INCREMENT untuk tabel `detailreport`
--
ALTER TABLE `detailreport`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `evaluasi`
--
ALTER TABLE `evaluasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT untuk tabel `fotoperkembangan`
--
ALTER TABLE `fotoperkembangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kelompok`
--
ALTER TABLE `kelompok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `perkembangan`
--
ALTER TABLE `perkembangan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT untuk tabel `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;

--
-- AUTO_INCREMENT untuk tabel `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tema`
--
ALTER TABLE `tema`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
