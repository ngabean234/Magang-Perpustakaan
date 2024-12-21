-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2024 at 05:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `cover` varchar(191) NOT NULL,
  `file_path` varchar(191) NOT NULL,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `ringkasan` text NOT NULL,
  `penulis` varchar(191) NOT NULL,
  `penerbit` varchar(191) NOT NULL,
  `jml_halaman` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `user_id`, `category_id`, `judul`, `slug`, `cover`, `file_path`, `view_count`, `ringkasan`, `penulis`, `penerbit`, `jml_halaman`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Buku Sejarah Perjuangan MASYARAKAT KOTA MAGELANG', 'Buku Sejarah Perjuangan MASYARAKAT KOTA MAGELANG', '2.jpg', 'Buku Sejarah Perjuangan MASYARAKAT KOTA MAGELANG Dimasa Perjuangan Phisik Tahun 1945 - 1950 Penerbit DHC Angakatan 45 Kota Magelang Tahun 1998.pdf', 0, 'Dengan mengucap syukur kepada Tuhan Yang Maha Pengasih lagi Maha Penyayang yang telah memberikan kekuatan dan kemampuan kepada kami Generasi 45, untuk\n                            menulis dan menerbitkan buku Sejarah Pejungan Masyarakat Kota Magelang dan sekitarnya pada masa-masa pejuangan physik melawan penjajah tahun 1945 - 1950.', 'nama penulis', 'nama penerbit', '52', '2024-12-15 21:01:53', NULL),
(2, 1, 2, 'Buku Pembangunan Magelang Kota Inda', 'Buku Pembangunan Magelang Kota Inda', '2.jpg', 'Buku Pembangunan Magelang Kota Inda ( The Central of Java ) Dulu dan Sekarang oleh Drs. Sukimin Adi Wiratmoko.pdf', 0, 'Kutulis Magelang Indah ini untuk anak-anakku juga para Generasi Muda Magelang umumnya, agar apabila mau membaca, akan\n                            mengetahui sedikit-sedikit tentang Kotanya pada masa yang lampau maupun masa sekarang, dan dapat menggambarkan akar\n                            bagaimana kelayak kemudian harinya.', 'nama penulis', 'nama penerbit', '40', '2024-12-15 21:01:53', NULL),
(3, 1, 3, 'September 24', 'September 24', 'September 24.jpg', 'September 24.pdf', 0, 'Pemkot Magelang dinobatkan sebagai Pemerintah Daerah dengan Kinerja dan Governasi baiik Tingkat Kota unruk Kategori umum pada Anugerah Pandu Negeri(APN)\n                            tahun 2024.', 'JAWA POS Hal 4rm', 'Radar Magelang', '42', '2024-12-15 21:01:53', NULL),
(4, 1, 4, 'BACA YUK 10 oke', 'BACA YUK 10 oke', 'baca 10.jpg', 'BACA YUK 10 oke.pdf', 0, 'Pertama-tama yang tidak boleh terlupakan yaitu kita penjatkan puji syukur ke Hadirat Tuhan Yang Maha Esa, karena atas rahmat-Nya Buletin Baca Yuk...!! Perpustakaan\n                            Kota Magelang edisi 10 Tahun 2023 dapat diterbitkan.', 'Perpus Kota Magelang', 'Liputan Utama', '20', '2024-12-15 21:01:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `photo` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'E-Book Kota Magelang Massa Dulu', 'ebook-kota-magelang-massa-dulu', '2.png', '2024-12-15 21:01:53', '2024-12-15 21:01:53'),
(2, 'E-Book Kota Magelang Massa Kini', 'ebook-kota-magelang-massa-kini', '2.png', '2024-12-15 21:01:53', '2024-12-15 21:01:53'),
(3, 'Kliping Kota Magelang', 'kliping-kota-magelang', '3.png', '2024-12-15 21:01:53', '2024-12-15 21:01:53'),
(4, 'Majalah Kota Magelang', 'majalah-kota-magelang', '1.png', '2024-12-15 21:01:53', '2024-12-15 21:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `category_galleries`
--

CREATE TABLE `category_galleries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `photo` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_galleries`
--

INSERT INTO `category_galleries` (`id`, `name`, `slug`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Foto Masa Dulu', 'foto-masa-dulu', '1.png', '2024-12-15 21:01:53', '2024-12-15 21:01:53'),
(2, 'Foto Masa Kini', 'foto-masa-kini', '3.png', '2024-12-15 21:01:53', '2024-12-15 21:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_gallery_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(191) NOT NULL,
  `author` varchar(191) NOT NULL,
  `date_taken` date NOT NULL,
  `location` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `category_gallery_id`, `title`, `description`, `image_path`, `author`, `date_taken`, `location`, `created_at`, `updated_at`) VALUES
(1, 1, 'Menara Air Minum', 'Dibangun pada masa Pemerintahan Kolonial Hindia Belanda', 'gallery/1.jpg', 'Thomas Kartsen', '1920-11-01', 'Jl. Alun-alun Kota Magelang', '2024-12-15 21:01:53', '2024-12-15 21:01:53'),
(2, 2, 'Komplek Rumah Sakit Umum Tidar', 'RSU TIdar dulu milik Zeding yang dikepalai oleh dr Drick Meyr (Belanda) dibukak oleh Zeding pada\n                                tanggal 25 Mei 1932.', 'gallery/RSU tidar.jpg', 'Dr Drick Meyr', '1932-11-02', 'Jl Tidar Magelang', '2024-12-15 21:01:53', '2024-12-15 21:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2011_12_11_085136_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_12_12_014618_create_categories_table', 1),
(7, '2020_12_12_113157_create_books_table', 1),
(8, '2020_12_17_104305_create_comments_table', 1),
(9, '2020_12_19_095249_create_visitors_table', 1),
(10, '2023_12_08_010330_create_category_galleries_table', 1),
(11, '2024_10_31_040456_create_galleries_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Anggota', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `umur` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) NOT NULL,
  `photo` varchar(191) DEFAULT NULL,
  `is_block` int(11) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `jk`, `umur`, `email_verified_at`, `password`, `photo`, `is_block`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@gmail.com', 'L', 24, NULL, '$2y$10$.Y/zqhLvD4WEF2.GX9gjheBU8hQaBHWzr3xHnop5sDQT/OPqOMXCK', NULL, 0, NULL, NULL, NULL),
(2, 2, 'Perpustakaan', 'perpus@gmail.com', 'L', 20, NULL, '$2y$10$gSKxLnINGiVRcGx361/pyOLFcYrpWI/hg7e3LJch7t5WYUJIWR5RW', NULL, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(10) UNSIGNED NOT NULL,
  `ip_visitor` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_user_id_foreign` (`user_id`),
  ADD KEY `books_category_id_foreign` (`category_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_galleries`
--
ALTER TABLE `category_galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_book_id_foreign` (`book_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_category_gallery_id_foreign` (`category_gallery_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category_galleries`
--
ALTER TABLE `category_galleries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `books_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_category_gallery_id_foreign` FOREIGN KEY (`category_gallery_id`) REFERENCES `category_galleries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
