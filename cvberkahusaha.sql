-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 16 Jul 2025 pada 05.23
-- Versi server: 8.0.30
-- Versi PHP: 8.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cvberkahusaha`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikels`
--

CREATE TABLE `artikels` (
  `id` bigint UNSIGNED NOT NULL,
  `kategori_artikel_id` bigint UNSIGNED NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preview_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_schedule` datetime NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `artikels`
--

INSERT INTO `artikels` (`id`, `kategori_artikel_id`, `thumbnail`, `title`, `slug`, `preview_description`, `description`, `meta_keyword`, `meta_description`, `post_schedule`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'artikel/Jnr4Y67WuPQnCqu3Pp43Cp16veKNKfh4Qu8FCOlE.png', 'Testing judul Programming', 'testing-judul-programming', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '<h1>Title</h1>\r\n\r\n<p><strong>Lorem Ipsum</strong><em>&nbsp;is simply dummy text of the printin</em>g and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining <strong>essentially unchanged. It was </strong>popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Meta, keyword, adalah, tag, meta, dalam, HTML, yang, digunakan, untuk, mendeskripsikan, kata, kunci', 'Pelajari lima prinsip penting dalam desain grafis untuk menciptakan karya yang estetis dan fungsional.', '2025-07-15 11:32:00', 1, '2025-07-16 04:34:26', '2025-07-16 04:34:26', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner_layanans`
--

CREATE TABLE `banner_layanans` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `banner_layanans`
--

INSERT INTO `banner_layanans` (`id`, `title`, `subtitle`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Layanan Unggulan Kami', 'Subtitle Default', 'Deskripsi default untuk banner layanan.', '2025-07-16 04:27:19', '2025-07-16 04:27:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner_layanan_items`
--

CREATE TABLE `banner_layanan_items` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `banner_layanan_items`
--

INSERT INTO `banner_layanan_items` (`id`, `title`, `description`, `image_icon`, `created_at`, `updated_at`) VALUES
(1, 'Layanan 1', 'Tidak lebih dari 100 kata', 'banner-layanan/onKeM2JB8M60IedUA17ml4TTkOIlvd9JbEwOCFAC.png', '2025-07-16 04:27:47', '2025-07-16 04:27:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `breadcrumbs`
--

CREATE TABLE `breadcrumbs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `breadcrumbs`
--

INSERT INTO `breadcrumbs` (`id`, `title`, `subtitle`, `created_at`, `updated_at`) VALUES
(1, 'Breadcrumb title', 'Breadcrumb sub judul', '2025-07-16 04:42:13', '2025-07-16 04:42:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_admin@gmail.com|127.0.0.1', 'i:2;', 1752639203),
('laravel_cache_admin@gmail.com|127.0.0.1:timer', 'i:1752639203;', 1752639203);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `config_webs`
--

CREATE TABLE `config_webs` (
  `id` bigint UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `config_webs`
--

INSERT INTO `config_webs` (`id`, `logo`, `favicon`, `title`, `subtitle`, `website_url`, `copyright`, `created_at`, `updated_at`) VALUES
(1, 'config-web/IHnXapM7i68Qi6qIIU3p2Ffd4LnGDwRdaMKbO7hU.png', 'config-web/BVikUfwLcdzrKF8nfS8KsDZlzLPwioQYY34i4qVI.png', 'Webtesting Terbaik', 'Subtitle atau slogan website.', 'https://example.com', '© 2025 Nama Perusahaan.', '2025-07-16 04:35:36', '2025-07-16 04:42:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_kontaks`
--

CREATE TABLE `form_kontaks` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri_produks`
--

CREATE TABLE `galeri_produks` (
  `id` bigint UNSIGNED NOT NULL,
  `hero_galeri_produk_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `galeri_produks`
--

INSERT INTO `galeri_produks` (`id`, `hero_galeri_produk_id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Galeri 1', 'galeri-produk/7x0pOSzVZD4JiFRiTMORbQlowCumZajs2b3ZSTyu.png', '2025-07-16 04:32:03', '2025-07-16 04:32:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `heros`
--

CREATE TABLE `heros` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `heros`
--

INSERT INTO `heros` (`id`, `title`, `subtitle`, `created_at`, `updated_at`) VALUES
(1, 'Selamat Datang di PT. Testing', 'Kami adalah perusahaan yang bergerak di bidang industri makanan dan minuman.', '2025-07-16 04:22:56', '2025-07-16 04:22:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hero_galeri_produks`
--

CREATE TABLE `hero_galeri_produks` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hero_galeri_produks`
--

INSERT INTO `hero_galeri_produks` (`id`, `title`, `subtitle`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Galeri Produk Kami', 'Lihat koleksi produk terbaik dari kami', 'Deskripsi default untuk bagian galeri produk.', '2025-07-16 04:31:38', '2025-07-16 04:31:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hero_items`
--

CREATE TABLE `hero_items` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hero_items`
--

INSERT INTO `hero_items` (`id`, `title`, `subtitle`, `created_at`, `updated_at`) VALUES
(1, '100%', 'Keamanan', '2025-07-16 04:23:36', '2025-07-16 04:23:36'),
(2, '99+', 'Client', '2025-07-16 04:47:14', '2025-07-16 04:47:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hubungi_kamis`
--

CREATE TABLE `hubungi_kamis` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hubungi_kamis`
--

INSERT INTO `hubungi_kamis` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'hubungi-kami/57oX2HNtMFCp4sKBQDLSd5QjoS84xsEMAn68IiAV.png', '2025-07-16 04:29:27', '2025-07-16 04:29:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_artikels`
--

CREATE TABLE `kategori_artikels` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_artikels`
--

INSERT INTO `kategori_artikels` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Programming', 'programming', '2025-07-16 04:32:31', '2025-07-16 04:32:31'),
(2, 'Web developer', 'web-developer', '2025-07-16 04:32:38', '2025-07-16 04:32:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keunggulans`
--

CREATE TABLE `keunggulans` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keunggulans`
--

INSERT INTO `keunggulans` (`id`, `title`, `subtitle`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Keunggulan Produk Kami', 'Subtitle Default untuk Keunggulan', 'Deskripsi default untuk bagian keunggulan.', '2025-07-16 04:28:54', '2025-07-16 04:28:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keunggulan_items`
--

CREATE TABLE `keunggulan_items` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keunggulan_items`
--

INSERT INTO `keunggulan_items` (`id`, `image`, `title`, `subtitle`, `created_at`, `updated_at`) VALUES
(1, 'keunggulan/d3KMrSUmdpGsFzrPs81RdlO74IZj3yEe5oEIFmfv.png', 'Item keunggulan 1', 'Deskripsi keunggulan 1', '2025-07-16 04:29:22', '2025-07-16 04:29:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontaks`
--

CREATE TABLE `kontaks` (
  `id` bigint UNSIGNED NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telegram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_kerja` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `embed_map` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kontaks`
--

INSERT INTO `kontaks` (`id`, `no_telepon`, `no_telegram`, `email`, `alamat`, `jam_kerja`, `embed_map`, `created_at`, `updated_at`) VALUES
(1, '081234567890', '081234567890', 'admin@example.com', 'Alamat lengkap perusahaan di sini.', '<p>Senin - Jumat, 09:00 - 17:00</p><p>Senin - Jumat, 09:00 - 17:00</p><p>Senin - Jumat, 09:00 - 17:00</p><p>Senin - Jumat, 09:00 - 17:00</p>', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.292484050212!2d106.8037617!3d-6.6102797!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5e53880a26d%3A0x6b2b168c8a1b948!2sTugu%20Kujang!5e0!3m2!1sen!2sid!4v1721105047464!5m2!1sen!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2025-07-16 04:45:17', '2025-07-16 04:45:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_20_055639_create_cms_tables', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `image`, `title`, `description`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'produk/E9AzEaHRckbEf0yvWev7gWVTGhGBnPyrXlf1jELB.jpg', 'Produk testing 1', '<p>Produk Testing 2</p>', 1, '2025-07-16 04:30:18', '2025-07-16 04:30:18', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('DEDb62UHWJWsqsETOiVtQgjAsNqqOeJ9CnHaAQ9i', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT2hRMktVcUk5MmNHb1hFTUtWZDVPY0s0MmJvU2EzNmZkcUcxdjViMyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1752641254);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sliders`
--

INSERT INTO `sliders` (`id`, `image`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'slider/34diDNb8rVmTSD3LH6tLQkr1oAgj7qjq4BfXDXYm.png', 1, '2025-07-16 04:18:32', '2025-07-16 04:18:32', NULL),
(2, 'slider/Yr9WDMiyM5kDWoenrk3ZAvTdshHAorw1VyK4WuZ6.jpg', 1, '2025-07-16 04:20:36', '2025-07-16 04:46:54', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `social_medias`
--

CREATE TABLE `social_medias` (
  `id` bigint UNSIGNED NOT NULL,
  `platform` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_platform` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `social_medias`
--

INSERT INTO `social_medias` (`id`, `platform`, `link_platform`, `slug`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Facebook', 'https://web.facebook.com/', 'facebook', 1, '2025-07-16 04:42:56', '2025-07-16 04:42:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `social_media_images`
--

CREATE TABLE `social_media_images` (
  `id` bigint UNSIGNED NOT NULL,
  `social_media_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `social_media_images`
--

INSERT INTO `social_media_images` (`id`, `social_media_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'sosial-media/KUn5OR4gKak72UtINP8zYqVcybDbsJfZBRYZaibv.png', '2025-07-16 04:43:43', '2025-07-16 04:43:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang_kamis`
--

CREATE TABLE `tentang_kamis` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `tentang_kamis`
--

INSERT INTO `tentang_kamis` (`id`, `image`, `title`, `subtitle`, `description`, `created_at`, `updated_at`) VALUES
(1, 'tentang-kami/Fs2xLDFitKo5TT9yyyNBUfabjDgU0NiKzlA5XKbo.png', 'Tentang Kami', 'Subtitle Default', '<p>Kami adalah perusahaan yang bergerak di bidang industri makanan dan minuman.</p>', '2025-07-16 04:25:58', '2025-07-16 04:26:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@example.com', NULL, '$2y$12$QoU2EAR9NH0Uwvx3FQSDaur1.9d4VXvPebf778zgUkuAe1WN0HqlW', NULL, '2025-07-16 04:13:46', '2025-07-16 04:13:46');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikels`
--
ALTER TABLE `artikels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `artikels_slug_unique` (`slug`),
  ADD KEY `artikels_kategori_artikel_id_foreign` (`kategori_artikel_id`),
  ADD KEY `artikels_post_schedule_index` (`post_schedule`);

--
-- Indeks untuk tabel `banner_layanans`
--
ALTER TABLE `banner_layanans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `banner_layanan_items`
--
ALTER TABLE `banner_layanan_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `breadcrumbs`
--
ALTER TABLE `breadcrumbs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `config_webs`
--
ALTER TABLE `config_webs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `form_kontaks`
--
ALTER TABLE `form_kontaks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `galeri_produks`
--
ALTER TABLE `galeri_produks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galeri_produks_hero_galeri_produk_id_foreign` (`hero_galeri_produk_id`);

--
-- Indeks untuk tabel `heros`
--
ALTER TABLE `heros`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hero_galeri_produks`
--
ALTER TABLE `hero_galeri_produks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hero_items`
--
ALTER TABLE `hero_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `hubungi_kamis`
--
ALTER TABLE `hubungi_kamis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_artikels`
--
ALTER TABLE `kategori_artikels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategori_artikels_slug_unique` (`slug`);

--
-- Indeks untuk tabel `keunggulans`
--
ALTER TABLE `keunggulans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `keunggulan_items`
--
ALTER TABLE `keunggulan_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kontaks`
--
ALTER TABLE `kontaks`
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
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `social_medias`
--
ALTER TABLE `social_medias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `social_medias_slug_unique` (`slug`);

--
-- Indeks untuk tabel `social_media_images`
--
ALTER TABLE `social_media_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `social_media_images_social_media_id_foreign` (`social_media_id`);

--
-- Indeks untuk tabel `tentang_kamis`
--
ALTER TABLE `tentang_kamis`
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
-- AUTO_INCREMENT untuk tabel `artikels`
--
ALTER TABLE `artikels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `banner_layanans`
--
ALTER TABLE `banner_layanans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `banner_layanan_items`
--
ALTER TABLE `banner_layanan_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `breadcrumbs`
--
ALTER TABLE `breadcrumbs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `config_webs`
--
ALTER TABLE `config_webs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `form_kontaks`
--
ALTER TABLE `form_kontaks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeri_produks`
--
ALTER TABLE `galeri_produks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `heros`
--
ALTER TABLE `heros`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `hero_galeri_produks`
--
ALTER TABLE `hero_galeri_produks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `hero_items`
--
ALTER TABLE `hero_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `hubungi_kamis`
--
ALTER TABLE `hubungi_kamis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_artikels`
--
ALTER TABLE `kategori_artikels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `keunggulans`
--
ALTER TABLE `keunggulans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `keunggulan_items`
--
ALTER TABLE `keunggulan_items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kontaks`
--
ALTER TABLE `kontaks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `social_medias`
--
ALTER TABLE `social_medias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `social_media_images`
--
ALTER TABLE `social_media_images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tentang_kamis`
--
ALTER TABLE `tentang_kamis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artikels`
--
ALTER TABLE `artikels`
  ADD CONSTRAINT `artikels_kategori_artikel_id_foreign` FOREIGN KEY (`kategori_artikel_id`) REFERENCES `kategori_artikels` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `galeri_produks`
--
ALTER TABLE `galeri_produks`
  ADD CONSTRAINT `galeri_produks_hero_galeri_produk_id_foreign` FOREIGN KEY (`hero_galeri_produk_id`) REFERENCES `hero_galeri_produks` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `social_media_images`
--
ALTER TABLE `social_media_images`
  ADD CONSTRAINT `social_media_images_social_media_id_foreign` FOREIGN KEY (`social_media_id`) REFERENCES `social_medias` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
