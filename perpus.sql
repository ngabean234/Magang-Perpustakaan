-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2024 at 04:00 AM
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
-- Database: `perpus`
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
  `embed` varchar(191) NOT NULL,
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

INSERT INTO `books` (`id`, `user_id`, `category_id`, `judul`, `slug`, `cover`, `embed`, `view_count`, `ringkasan`, `penulis`, `penerbit`, `jml_halaman`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Contoh buku1', 'contoh-buku1', 'cover1.png', 'https://online.anyflip.com/tegcn/ldgs/index.html', 0, 'ini adalah ringkasan', 'nama penulis', 'nama penerbit', '250', '2024-11-03 19:01:50', NULL),
(2, 1, 2, 'Contoh buku2', 'contoh-buku2', 'cover1.png', 'https://online.anyflip.com/tegcn/ldgs/index.html', 0, 'ini adalah ringkasan', 'nama penulis', 'nama penerbit', '250', '2024-11-03 19:01:50', NULL),
(3, 1, 3, 'Contoh buku3', 'contoh-buku3', 'cover1.png', 'https://online.anyflip.com/tegcn/ldgs/index.html', 0, 'ini adalah ringkasan', 'nama penulis', 'nama penerbit', '250', '2024-11-03 19:01:50', NULL),
(4, 1, 4, 'Contoh buku4', 'contoh-buku4', 'cover1.png', 'https://online.anyflip.com/tegcn/ldgs/index.html', 0, 'ini adalah ringkasan', 'nama penulis', 'nama penerbit', '250', '2024-11-03 19:01:50', NULL),
(5, 1, 5, 'Contoh buku5', 'contoh-buku5', 'cover1.png', 'https://online.anyflip.com/tegcn/ldgs/index.html', 0, 'ini adalah ringkasan', 'nama penulis', 'nama penerbit', '250', '2024-11-03 19:01:50', NULL),
(6, 1, 6, 'Contoh buku6', 'contoh-buku6', 'cover1.png', 'https://online.anyflip.com/tegcn/ldgs/index.html', 0, 'ini adalah ringkasan', 'nama penulis', 'nama penerbit', '250', '2024-11-03 19:01:50', NULL),
(7, 1, 1, 'Contoh buku7', 'contoh-buku7', 'cover1.png', 'https://online.anyflip.com/tegcn/ldgs/index.html', 0, 'ini adalah ringkasan', 'nama penulis', 'nama penerbit', '250', '2024-11-03 19:01:50', NULL),
(8, 1, 1, 'Contoh buku8', 'contoh-buku8', 'cover1.png', 'https://online.anyflip.com/tegcn/ldgs/index.html', 0, 'ini adalah ringkasan', 'nama penulis', 'nama penerbit', '250', '2024-11-03 19:01:50', NULL);

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
(1, 'E-book', 'ebook', 'c1.png', NULL, NULL),
(2, 'Novel', 'novel', 'c2.jpg', NULL, NULL),
(3, 'Komputer', 'komputer', 'c3.jpg', NULL, NULL),
(4, 'Kamus', 'kamus', 'c4.png', NULL, NULL),
(5, 'Cooking', 'cooking', 'c5.jpg', NULL, NULL),
(6, 'Jurnal', 'jurnal', 'c6.png', NULL, NULL);

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

INSERT INTO `galleries` (`id`, `title`, `description`, `image_path`, `author`, `date_taken`, `location`, `created_at`, `updated_at`) VALUES
(19, 'dada', '<p><strong>Judul: \"Bayang di Balik Kabut\"</strong></p><p><strong>Halaman 1-2:</strong><br><em>Prolog</em><br>Pada malam yang gelap, seorang pemuda bernama Raka tersesat di sebuah desa terpencil. Kabut tebal menyelimuti jalan, membuat pandangannya kabur. Raka merasa ada sesuatu yang aneh di tempat ini, seolah-olah desa tersebut menyimpan rahasia yang gelap. Rumah-rumah tua berderet dengan jendela-jendela yang tertutup rapat, dan hanya ada satu warung kecil dengan lampu yang redup. Seorang kakek tua di sana memandangi Raka dengan tatapan penuh misteri dan memperingatkannya untuk tidak keluar saat tengah malam.</p><p><strong>Halaman 3-4:</strong><br><em>Misteri Rumah Tua</em><br>Raka menginap di penginapan kecil yang terlihat kumuh. Saat tengah malam, ia mendengar suara langkah kaki dari rumah di seberang jalan yang terlihat kosong. Penasaran, Raka keluar dan mendekati rumah itu. Ia melihat bayangan samar di balik tirai. Meski merasa takut, ia memberanikan diri untuk mengetuk pintu, namun tidak ada yang menjawab. Begitu ia akan kembali, suara berbisik memanggil namanya dari dalam rumah itu.</p><p><strong>Halaman 5-6:</strong><br><em>Penemuan Surat Kuno</em><br>Keesokan paginya, Raka menemukan secarik surat tua yang tertinggal di dekat pintu penginapannya. Surat itu berisi peringatan agar tidak mendekati rumah tersebut dan menyinggung tentang “kutukan yang menimpa keluarga di desa itu.” Dalam surat itu, disebutkan nama seseorang yang pernah tinggal di rumah itu bernama Sulastri, yang hilang secara misterius puluhan tahun lalu.</p><p><strong>Halaman 7-8:</strong><br><em>Desa yang Terkutuk</em><br>Raka mulai bertanya-tanya kepada penduduk desa tentang Sulastri, tetapi mereka semua tampak menghindari topik tersebut. Ia akhirnya bertemu dengan nenek tua yang memberitahunya tentang legenda desa itu. Katanya, Sulastri adalah seorang wanita yang sangat cantik, namun suatu malam ia menghilang begitu saja. Sejak itu, siapa pun yang tinggal di rumahnya akan mendengar bisikan aneh dan melihat bayangan yang bergerak di tengah malam.</p><p><strong>Halaman 9-10:</strong><br><em>Teror Malam Terakhir</em><br>Di malam terakhirnya di desa, Raka kembali mendengar bisikan namanya, namun kali ini lebih jelas. Ia melihat bayangan wanita di jendela rumah tua itu. Dengan ketakutan namun tak mampu menghindar, ia memasuki rumah tersebut sekali lagi. Di dalam rumah, ia menemukan sebuah cermin besar dengan pesan tertulis: “Jangan mencariku. Kutukan ini tidak boleh terulang.” Di saat ia berbalik, bayangan seorang wanita berdiri di belakangnya. Lampu padam, dan terdengar suara jeritan mengerikan.</p>', 'gallery/1730772637.png', 'dadad', '2024-11-08', 'Magelang', '2024-11-04 19:10:37', '2024-11-04 19:10:37'),
(20, 'hallo', '<p style=\"margin: 0.5em 0px 1em; color: rgb(32, 33, 34); font-family: sans-serif;\"><i>Valorant</i>&nbsp;is a team-based&nbsp;<a href=\"https://en.wikipedia.org/wiki/First-person_shooter\" title=\"First-person shooter\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">first-person</a>&nbsp;<a href=\"https://en.wikipedia.org/wiki/Tactical_shooter\" title=\"Tactical shooter\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">tactical</a>&nbsp;<a href=\"https://en.wikipedia.org/wiki/Hero_shooter\" title=\"Hero shooter\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">hero shooter</a>&nbsp;set in the near future.<sup id=\"cite_ref-Goslin_2020a_4-0\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-Goslin_2020a-4\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>4<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup><sup id=\"cite_ref-Goslin_2020b_5-0\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-Goslin_2020b-5\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>5<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup><sup id=\"cite_ref-Goslin_2020c_6-0\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-Goslin_2020c-6\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>6<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup><sup id=\"cite_ref-First_Announced_1_7-0\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-First_Announced_1-7\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>7<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup>&nbsp;Players play as one of a set of Agents, characters based on several countries and cultures around the world.<sup id=\"cite_ref-First_Announced_1_7-1\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-First_Announced_1-7\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>7<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup>&nbsp;In the main game mode, players are assigned to either the attacking or defending team with each team having five players on it. Agents have unique abilities, each requiring charges, as well as a unique ultimate ability that requires charging through kills, deaths, orbs, or objectives. Every player starts each round with a \"classic\" pistol and one or more \"signature ability\" charges.<sup id=\"cite_ref-Goslin_2020b_5-1\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-Goslin_2020b-5\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>5<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup>&nbsp;Other weapons and ability charges can be purchased using an in-game economic system that awards money based on the outcome of the previous round, any kills the player is responsible for, and any objectives completed. The game has an assortment of weapons including secondary guns like&nbsp;<a href=\"https://en.wikipedia.org/wiki/Sidearm_(weapon)\" title=\"Sidearm (weapon)\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">sidearms</a>&nbsp;and primary guns like&nbsp;<a href=\"https://en.wikipedia.org/wiki/Submachine_guns\" class=\"mw-redirect\" title=\"Submachine guns\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">submachine guns</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Shotguns\" class=\"mw-redirect\" title=\"Shotguns\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">shotguns</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Machine_guns\" class=\"mw-redirect\" title=\"Machine guns\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">machine guns</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Assault_rifles\" class=\"mw-redirect\" title=\"Assault rifles\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">assault rifles</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Sniper_rifles\" class=\"mw-redirect\" title=\"Sniper rifles\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">sniper rifles</a>.<sup id=\"cite_ref-Geddes_2020_8-0\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-Geddes_2020-8\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>8<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup><sup id=\"cite_ref-Toms_2020_9-0\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-Toms_2020-9\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>9<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup>&nbsp;There are&nbsp;<a href=\"https://en.wikipedia.org/wiki/Automatic_firearm\" title=\"Automatic firearm\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">automatic</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Semi-automatic_firearm\" title=\"Semi-automatic firearm\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">semi-automatic</a>&nbsp;weapons that each have a unique shooting pattern that has to be controlled by the player to be able to shoot accurately.<sup id=\"cite_ref-Toms_2020_9-1\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-Toms_2020-9\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>9<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup>&nbsp;It currently offers 24 agents to choose from.<sup id=\"cite_ref-playvalorant.com_3-1\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-playvalorant.com-3\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>3<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup><sup id=\"cite_ref-10\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-10\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>10<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup><sup id=\"cite_ref-:3_11-0\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-:3-11\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>11<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup>&nbsp;The player will get 5 unlocked agents when they create their account, and will have to unlock the rest of the agents by collecting an in-game currency called Kingdom Credits. Kingdom Credits can be acquired by playing games or completing daily and weekly tasks, and can be spent on unlocking new agents or cosmetic items. However, within the first 28 days of release, new Agents can only be unlocked with Valorant Points (VP), Agent Recruitment Events, or by having a linked and active&nbsp;<a href=\"https://en.wikipedia.org/wiki/Xbox\" title=\"Xbox\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Xbox</a>&nbsp;<a href=\"https://en.wikipedia.org/wiki/Xbox_Game_Pass\" title=\"Xbox Game Pass\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Game Pass</a>&nbsp;subscription. VP is an in-game currency that can only obtained by purchasing it with real money,<sup id=\"cite_ref-:1_12-0\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-:1-12\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>12<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup><sup class=\"noprint Inline-Template noprint noexcerpt Template-Fact\" style=\"line-height: 1; font-size: 12.8px; text-wrap-mode: nowrap;\">[<i><a href=\"https://en.wikipedia.org/wiki/Wikipedia:NOTRS\" class=\"mw-redirect\" title=\"Wikipedia:NOTRS\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span title=\"This claim needs references to better sources. (June 2023)\">better&nbsp;source&nbsp;needed</span></a></i>]</sup>&nbsp;and it can be spent on cosmetic items or new agents.</p><div class=\"mw-heading mw-heading3\" style=\"color: var(--color-emphasized,#101418); font-weight: bold; margin: 0.25em 0px; padding-top: 0.5em; padding-bottom: 0px; display: flow-root; word-break: break-word; font-size: 1.2em; line-height: 1.6; font-family: sans-serif;\"><h3 id=\"Unrated\" style=\"font-weight: bold; margin-right: 0px; margin-bottom: 0.25em; margin-left: 0px; padding: 0px; display: inline; word-break: break-word; font-size: inherit; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: 1.6; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Unrated</h3></div><p style=\"margin: 0.5em 0px 1em; color: rgb(32, 33, 34); font-family: sans-serif;\">In the standard non-ranked mode, the match is played as best of 25 - the first team to win 13 rounds wins the match. The attacking team has a bomb-type device called the Spike. They must deliver and activate the Spike on one of the multiple specified locations (bomb sites). If the attacking team successfully protects the activated Spike for 45 seconds it detonates, destroying everything in a specific area, and they receive a point.<sup id=\"cite_ref-Goslin_2020b_5-2\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-Goslin_2020b-5\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>5<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup>&nbsp;If the defending team can deactivate the spike, or the 100-second round timer expires without the attacking team activating the spike, the defending team receives a point.<sup id=\"cite_ref-Shea_2020_13-0\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-Shea_2020-13\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>13<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup>&nbsp;If all the members of a team are eliminated before the spike is activated, or if all members of the defending team are eliminated after the spike is activated, the opposing team earns a point.<sup id=\"cite_ref-Goslin_2020b_5-3\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-Goslin_2020b-5\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>5<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup>&nbsp;If both teams win 12 rounds, sudden death occurs, in which the winning team of that round wins the match, differing from overtime for competitive matches. Additionally, if after 4 rounds, a team wishes to forfeit that match, they may request a vote to surrender. If the vote reaches 4 (in contrast to 5 for competitive), the winning team gets all the victory credit for every round needed to bring them to 13, with the forfeiting team receiving losing credit.<sup id=\"cite_ref-14\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-14\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>14<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup>&nbsp;A team gets only three chances to surrender: once in the first half, once in the pistol round of the second half, and once more in the second half.</p><div class=\"mw-heading mw-heading3\" style=\"color: var(--color-emphasized,#101418); font-weight: bold; margin: 0.25em 0px; padding-top: 0.5em; padding-bottom: 0px; display: flow-root; word-break: break-word; font-size: 1.2em; line-height: 1.6; font-family: sans-serif;\"><h3 id=\"Spike_Rush\" style=\"font-weight: bold; margin-right: 0px; margin-bottom: 0.25em; margin-left: 0px; padding: 0px; display: inline; word-break: break-word; font-size: inherit; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: 1.6; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Spike Rush</h3></div><p style=\"margin: 0.5em 0px 1em; color: rgb(32, 33, 34); font-family: sans-serif;\">In the Spike Rush mode, the match is played as best of 7 rounds - the first team to win 4 rounds wins the match. Players begin the round with all abilities fully charged except their ultimate, which charges twice as fast as in standard games. All players on the attacking team carry a spike, but only one spike may be activated per round. Guns are randomized in every round and every player begins with the same gun. Ultimate point orbs in the standard game are present, as well as multiple different power-up orbs.<sup id=\"cite_ref-WaPo0721_15-0\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-WaPo0721-15\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>15<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup></p>', 'gallery/1730773102.png', 'dada', '2024-11-11', 'Magelang', '2024-11-04 19:18:22', '2024-11-04 19:18:22');
INSERT INTO `galleries` (`id`, `title`, `description`, `image_path`, `author`, `date_taken`, `location`, `created_at`, `updated_at`) VALUES
(21, 'dasa', '<p style=\"margin: 0.5em 0px 1em; color: rgb(32, 33, 34); font-family: sans-serif;\"><i>Valorant</i>&nbsp;is a team-based&nbsp;<a href=\"https://en.wikipedia.org/wiki/First-person_shooter\" title=\"First-person shooter\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">first-person</a>&nbsp;<a href=\"https://en.wikipedia.org/wiki/Tactical_shooter\" title=\"Tactical shooter\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">tactical</a>&nbsp;<a href=\"https://en.wikipedia.org/wiki/Hero_shooter\" title=\"Hero shooter\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">hero shooter</a>&nbsp;set in the near future.<sup id=\"cite_ref-Goslin_2020a_4-0\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-Goslin_2020a-4\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>4<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup><sup id=\"cite_ref-Goslin_2020b_5-0\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-Goslin_2020b-5\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>5<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup><sup id=\"cite_ref-Goslin_2020c_6-0\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-Goslin_2020c-6\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>6<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup><sup id=\"cite_ref-First_Announced_1_7-0\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-First_Announced_1-7\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>7<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup>&nbsp;Players play as one of a set of Agents, characters based on several countries and cultures around the world.<sup id=\"cite_ref-First_Announced_1_7-1\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-First_Announced_1-7\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>7<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup>&nbsp;In the main game mode, players are assigned to either the attacking or defending team with each team having five players on it. Agents have unique abilities, each requiring charges, as well as a unique ultimate ability that requires charging through kills, deaths, orbs, or objectives. Every player starts each round with a \"classic\" pistol and one or more \"signature ability\" charges.<sup id=\"cite_ref-Goslin_2020b_5-1\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-Goslin_2020b-5\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>5<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup>&nbsp;Other weapons and ability charges can be purchased using an in-game economic system that awards money based on the outcome of the previous round, any kills the player is responsible for, and any objectives completed. The game has an assortment of weapons including secondary guns like&nbsp;<a href=\"https://en.wikipedia.org/wiki/Sidearm_(weapon)\" title=\"Sidearm (weapon)\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">sidearms</a>&nbsp;and primary guns like&nbsp;<a href=\"https://en.wikipedia.org/wiki/Submachine_guns\" class=\"mw-redirect\" title=\"Submachine guns\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">submachine guns</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Shotguns\" class=\"mw-redirect\" title=\"Shotguns\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">shotguns</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Machine_guns\" class=\"mw-redirect\" title=\"Machine guns\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">machine guns</a>,&nbsp;<a href=\"https://en.wikipedia.org/wiki/Assault_rifles\" class=\"mw-redirect\" title=\"Assault rifles\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">assault rifles</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Sniper_rifles\" class=\"mw-redirect\" title=\"Sniper rifles\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">sniper rifles</a>.<sup id=\"cite_ref-Geddes_2020_8-0\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-Geddes_2020-8\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>8<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup><sup id=\"cite_ref-Toms_2020_9-0\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-Toms_2020-9\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>9<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup>&nbsp;There are&nbsp;<a href=\"https://en.wikipedia.org/wiki/Automatic_firearm\" title=\"Automatic firearm\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">automatic</a>&nbsp;and&nbsp;<a href=\"https://en.wikipedia.org/wiki/Semi-automatic_firearm\" title=\"Semi-automatic firearm\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">semi-automatic</a>&nbsp;weapons that each have a unique shooting pattern that has to be controlled by the player to be able to shoot accurately.<sup id=\"cite_ref-Toms_2020_9-1\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-Toms_2020-9\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>9<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup>&nbsp;It currently offers 24 agents to choose from.<sup id=\"cite_ref-playvalorant.com_3-1\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-playvalorant.com-3\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>3<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup><sup id=\"cite_ref-10\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-10\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>10<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup><sup id=\"cite_ref-:3_11-0\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-:3-11\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>11<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup>&nbsp;The player will get 5 unlocked agents when they create their account, and will have to unlock the rest of the agents by collecting an in-game currency called Kingdom Credits. Kingdom Credits can be acquired by playing games or completing daily and weekly tasks, and can be spent on unlocking new agents or cosmetic items. However, within the first 28 days of release, new Agents can only be unlocked with Valorant Points (VP), Agent Recruitment Events, or by having a linked and active&nbsp;<a href=\"https://en.wikipedia.org/wiki/Xbox\" title=\"Xbox\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Xbox</a>&nbsp;<a href=\"https://en.wikipedia.org/wiki/Xbox_Game_Pass\" title=\"Xbox Game Pass\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">Game Pass</a>&nbsp;subscription. VP is an in-game currency that can only obtained by purchasing it with real money,<sup id=\"cite_ref-:1_12-0\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-:1-12\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>12<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup><sup class=\"noprint Inline-Template noprint noexcerpt Template-Fact\" style=\"line-height: 1; font-size: 12.8px; text-wrap-mode: nowrap;\">[<i><a href=\"https://en.wikipedia.org/wiki/Wikipedia:NOTRS\" class=\"mw-redirect\" title=\"Wikipedia:NOTRS\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span title=\"This claim needs references to better sources. (June 2023)\">better&nbsp;source&nbsp;needed</span></a></i>]</sup>&nbsp;and it can be spent on cosmetic items or new agents.</p><div class=\"mw-heading mw-heading3\" style=\"color: var(--color-emphasized,#101418); font-weight: bold; margin: 0.25em 0px; padding-top: 0.5em; padding-bottom: 0px; display: flow-root; word-break: break-word; font-size: 1.2em; line-height: 1.6; font-family: sans-serif;\"><h3 id=\"Unrated\" style=\"font-weight: bold; margin-right: 0px; margin-bottom: 0.25em; margin-left: 0px; padding: 0px; display: inline; word-break: break-word; font-size: inherit; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: 1.6; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Unrated</h3></div><p style=\"margin: 0.5em 0px 1em; color: rgb(32, 33, 34); font-family: sans-serif;\">In the standard non-ranked mode, the match is played as best of 25 - the first team to win 13 rounds wins the match. The attacking team has a bomb-type device called the Spike. They must deliver and activate the Spike on one of the multiple specified locations (bomb sites). If the attacking team successfully protects the activated Spike for 45 seconds it detonates, destroying everything in a specific area, and they receive a point.<sup id=\"cite_ref-Goslin_2020b_5-2\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-Goslin_2020b-5\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>5<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup>&nbsp;If the defending team can deactivate the spike, or the 100-second round timer expires without the attacking team activating the spike, the defending team receives a point.<sup id=\"cite_ref-Shea_2020_13-0\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-Shea_2020-13\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>13<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup>&nbsp;If all the members of a team are eliminated before the spike is activated, or if all members of the defending team are eliminated after the spike is activated, the opposing team earns a point.<sup id=\"cite_ref-Goslin_2020b_5-3\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-Goslin_2020b-5\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>5<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup>&nbsp;If both teams win 12 rounds, sudden death occurs, in which the winning team of that round wins the match, differing from overtime for competitive matches. Additionally, if after 4 rounds, a team wishes to forfeit that match, they may request a vote to surrender. If the vote reaches 4 (in contrast to 5 for competitive), the winning team gets all the victory credit for every round needed to bring them to 13, with the forfeiting team receiving losing credit.<sup id=\"cite_ref-14\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-14\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>14<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup>&nbsp;A team gets only three chances to surrender: once in the first half, once in the pistol round of the second half, and once more in the second half.</p><div class=\"mw-heading mw-heading3\" style=\"color: var(--color-emphasized,#101418); font-weight: bold; margin: 0.25em 0px; padding-top: 0.5em; padding-bottom: 0px; display: flow-root; word-break: break-word; font-size: 1.2em; line-height: 1.6; font-family: sans-serif;\"><h3 id=\"Spike_Rush\" style=\"font-weight: bold; margin-right: 0px; margin-bottom: 0.25em; margin-left: 0px; padding: 0px; display: inline; word-break: break-word; font-size: inherit; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: 1.6; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Spike Rush</h3></div><p style=\"margin: 0.5em 0px 1em; color: rgb(32, 33, 34); font-family: sans-serif;\">In the Spike Rush mode, the match is played as best of 7 rounds - the first team to win 4 rounds wins the match. Players begin the round with all abilities fully charged except their ultimate, which charges twice as fast as in standard games. All players on the attacking team carry a spike, but only one spike may be activated per round. Guns are randomized in every round and every player begins with the same gun. Ultimate point orbs in the standard game are present, as well as multiple different power-up orbs.<sup id=\"cite_ref-WaPo0721_15-0\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-WaPo0721-15\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>15<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup></p><div class=\"mw-heading mw-heading3\" style=\"color: var(--color-emphasized,#101418); font-weight: bold; margin: 0.25em 0px; padding-top: 0.5em; padding-bottom: 0px; display: flow-root; word-break: break-word; font-size: 1.2em; line-height: 1.6; font-family: sans-serif;\"><h3 id=\"Swiftplay\" style=\"font-weight: bold; margin-right: 0px; margin-bottom: 0.25em; margin-left: 0px; padding: 0px; display: inline; word-break: break-word; font-size: inherit; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: 1.6; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Swiftplay</h3></div><p style=\"margin: 0.5em 0px 1em; color: rgb(32, 33, 34); font-family: sans-serif;\">Swiftplay matches are simply a shortened version of the Unrated game mode. 10 players are split into 2 teams, attackers and defenders. Attackers must plant the spike while the Defenders must stop them. What differs Swiftplay to Unrated is that it is best to 9 rounds - the first team to win 5 rounds wins the match. On round 4, the team\'s players switch, as they would do in round 7 in the Unrated game mode. The game\'s currency system has no changes from Unrated. Swiftplay is meant as a quick game mode, averaging around 15 minutes per game, as opposed to around 40 minutes for Unrated.<sup id=\"cite_ref-16\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-16\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>16<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup></p><div class=\"mw-heading mw-heading3\" style=\"color: var(--color-emphasized,#101418); font-weight: bold; margin: 0.25em 0px; padding-top: 0.5em; padding-bottom: 0px; display: flow-root; word-break: break-word; font-size: 1.2em; line-height: 1.6; font-family: sans-serif;\"><h3 id=\"Competitive\" style=\"font-weight: bold; margin-right: 0px; margin-bottom: 0.25em; margin-left: 0px; padding: 0px; display: inline; word-break: break-word; font-size: inherit; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: 1.6; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Competitive</h3></div><p style=\"margin: 0.5em 0px 1em; color: rgb(32, 33, 34); font-family: sans-serif;\">Competitive matches are the same as unranked matches with the addition of a win-based ranking system that assigns a rank to each player after 5 games are played. Players are required to reach level 20 before playing this mode.<sup id=\"cite_ref-17\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-17\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>17<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup><sup class=\"noprint Inline-Template noprint noexcerpt Template-Fact\" style=\"line-height: 1; font-size: 12.8px; text-wrap-mode: nowrap;\">[<i><a href=\"https://en.wikipedia.org/wiki/Wikipedia:NOTRS\" class=\"mw-redirect\" title=\"Wikipedia:NOTRS\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span title=\"This claim needs references to better sources. (June 2023)\">better&nbsp;source&nbsp;needed</span></a></i>]</sup>&nbsp;In July 2020, Riot introduced a \"win by two\" condition for competitive matches, where instead of playing a single sudden death round at 12-12, teams will alternate playing rounds on attack and defense in overtime until a team claims victory by securing a two-match lead. Each overtime round gives players the same amount of money to purchase guns and abilities, as well as approximately half of their ultimate ability charge. After each group of two rounds, players may vote to end the game in a draw, requiring 6 players after the first set, 3 after the second, and thereafter only 1 player to agree to a draw. The competitive ranking system ranges from Iron to Radiant. Every rank except for Radiant has 3 tiers.<sup id=\"cite_ref-18\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-18\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>18<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup><sup class=\"noprint Inline-Template noprint noexcerpt Template-Fact\" style=\"line-height: 1; font-size: 12.8px; text-wrap-mode: nowrap;\">[<i><a href=\"https://en.wikipedia.org/wiki/Wikipedia:NOTRS\" class=\"mw-redirect\" title=\"Wikipedia:NOTRS\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span title=\"This claim needs references to better sources. (June 2023)\">better&nbsp;source&nbsp;needed</span></a></i>]</sup>&nbsp;Radiant is reserved for the top 500 players of a region, and both Immortal and Radiant have a number associated to their rank allowing players to have a metric in which they can compare how they rank up to others at their level.<sup id=\"cite_ref-19\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-19\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>19<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup></p><div class=\"mw-heading mw-heading3\" style=\"color: var(--color-emphasized,#101418); font-weight: bold; margin: 0.25em 0px; padding-top: 0.5em; padding-bottom: 0px; display: flow-root; word-break: break-word; font-size: 1.2em; line-height: 1.6; font-family: sans-serif;\"><h3 id=\"Premier\" style=\"font-weight: bold; margin-right: 0px; margin-bottom: 0.25em; margin-left: 0px; padding: 0px; display: inline; word-break: break-word; font-size: inherit; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: 1.6; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Premier</h3></div><p style=\"margin: 0.5em 0px 1em; color: rgb(32, 33, 34); font-family: sans-serif;\">Premier is a 5v5 gamemode that allows players a path-to-pro competitive game mode that is aimed towards players that wish to be a professional player. Premier was first introduced in alpha testing in Brazil before being rolled out worldwide by 2024. Players will need to create a team of five to compete against other teams in divisions. Each season will last a few weeks and the top teams will be invited to compete in the Division Championship, with winning teams able to be promoted to their region\'s Challengers league and therefore be part of the VCT ecosystem. This gamemode includes a pick-and-ban system for maps unlike all the other gamemodes where the players have to play the map selected by the system.<sup id=\"cite_ref-20\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-20\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>20<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup></p><div class=\"mw-heading mw-heading3\" style=\"color: var(--color-emphasized,#101418); font-weight: bold; margin: 0.25em 0px; padding-top: 0.5em; padding-bottom: 0px; display: flow-root; word-break: break-word; font-size: 1.2em; line-height: 1.6; font-family: sans-serif;\"><h3 id=\"Deathmatch\" style=\"font-weight: bold; margin-right: 0px; margin-bottom: 0.25em; margin-left: 0px; padding: 0px; display: inline; word-break: break-word; font-size: inherit; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: 1.6; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Deathmatch</h3></div><p style=\"margin: 0.5em 0px 1em; color: rgb(32, 33, 34); font-family: sans-serif;\">The Deathmatch mode was introduced on August 5, 2020.<sup id=\"cite_ref-21\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-21\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>21<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup><sup class=\"noprint Inline-Template noprint noexcerpt Template-Fact\" style=\"line-height: 1; font-size: 12.8px; text-wrap-mode: nowrap;\">[<i><a href=\"https://en.wikipedia.org/wiki/Wikipedia:NOTRS\" class=\"mw-redirect\" title=\"Wikipedia:NOTRS\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span title=\"This claim needs references to better sources. (June 2023)\">better&nbsp;source&nbsp;needed</span></a></i>]</sup>&nbsp;14 players enter a 9-minute&nbsp;<a href=\"https://en.wikipedia.org/wiki/Deathmatch_(video_games)\" title=\"Deathmatch (video games)\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\">free-for-all</a>&nbsp;match and the first person to reach 40 kills or the player who has the most kills when time is up wins the match. Players spawn in with a random agent as well as full shields, and all abilities are disabled during the match which indulges pure gunplay. Green health packs drop on every kill, which reset the player to maximum health, armor, and give an additional 30 bullets to each of their guns.<sup id=\"cite_ref-22\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-22\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>22<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup></p><div class=\"mw-heading mw-heading3\" style=\"color: var(--color-emphasized,#101418); font-weight: bold; margin: 0.25em 0px; padding-top: 0.5em; padding-bottom: 0px; display: flow-root; word-break: break-word; font-size: 1.2em; line-height: 1.6; font-family: sans-serif;\"><h3 id=\"Team_Deathmatch\" style=\"font-weight: bold; margin-right: 0px; margin-bottom: 0.25em; margin-left: 0px; padding: 0px; display: inline; word-break: break-word; font-size: inherit; border: 0px; font-style: inherit; font-variant: inherit; font-stretch: inherit; line-height: 1.6; font-optical-sizing: inherit; font-size-adjust: inherit; font-kerning: inherit; font-feature-settings: inherit; font-variation-settings: inherit;\">Team Deathmatch</h3></div><p style=\"margin: 0.5em 0px 1em; color: rgb(32, 33, 34); font-family: sans-serif;\">The Team Deathmatch gamemode was announced on June 15, 2023, and went live on June 27 with patch 7.0. This gamemode combines and borrows elements from the standard unrated mode as well as the regular deathmatch mode. It is a free-for-all gamemode where players are split into two teams with five players each. Each match lasts for 9 minutes and 30 seconds, and the first team that reaches 100 kills win. If neither team has reached 100 kills at the end of the 9.5 minutes, then the team with the most kills wins. Each match is split into four stages, with the weapon selection becoming progressively more powerful as players advance through the stages. Players are respawned in a spawn room after being killed. where they will be able to select and adjust their weapons loadout if needed. Unlike the regular deathmatch mode, players need to select their agents before the match begins, as agent abilities are allowed in this gamemode. Players can charge their agents\' ultimate abilities either by acquiring Ultimate Orbs spawned randomly throughout the map, or by getting kills. Their ultimate abilities will be available for use after their ult percentages reach 100%. Unlike all other gamemodes, this mode is not played on the standard maps, but rather on its own set of three maps that are specifically designed for team deathmatch: Piazza, District, and Kasbah.<sup id=\"cite_ref-23\" class=\"reference\" style=\"line-height: 1; unicode-bidi: isolate; text-wrap-mode: nowrap; font-size: 12.8px;\"><a href=\"https://en.wikipedia.org/wiki/Valorant#cite_note-23\" style=\"color: var(--color-progressive,#36c); background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; border-radius: 2px; overflow-wrap: break-word;\"><span class=\"cite-bracket\" style=\"pointer-events: none;\">[</span>23<span class=\"cite-bracket\" style=\"pointer-events: none;\">]</span></a></sup></p>', 'gallery/1730774533.png', 'saya sendiri', '0001-12-21', 'Magelang', '2024-11-04 19:42:13', '2024-11-04 19:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(12, '2011_12_11_085136_create_roles_table', 3),
(13, '2014_10_12_000000_create_users_table', 3),
(14, '2014_10_12_100000_create_password_resets_table', 3),
(15, '2019_08_19_000000_create_failed_jobs_table', 3),
(16, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(17, '2020_12_12_014618_create_categories_table', 3),
(18, '2020_12_12_113157_create_books_table', 3),
(10, '2024_10_31_140825_create_galleries_table', 2),
(19, '2020_12_17_104305_create_comments_table', 3),
(20, '2020_12_19_095249_create_visitors_table', 3),
(21, '2024_10_31_040456_create_galleries_table', 3);

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
(1, 1, 'Admin', 'admin@gmail.com', 'L', 24, NULL, '$2y$10$xl5PzAslBwYukPqD/omZuOgc15hwBWC4jN8RE3frFrR.eSrK88/s6', NULL, 0, NULL, NULL, NULL),
(2, 2, 'user1', 'user1@gmail.com', 'L', 20, NULL, '$2y$10$7LfyUm2G10yFT0drxnIDuuUb4EAJG6a5j.CgoM.EvJOEy/IRPBQa2', NULL, 0, NULL, NULL, NULL);

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
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `ip_visitor`, `created_at`, `updated_at`) VALUES
(1, '127.0.0.1', '2024-11-03 19:18:27', NULL),
(2, '127.0.0.1', '2024-11-04 18:56:10', NULL);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
