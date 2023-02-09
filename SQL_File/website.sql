-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 09, 2023 at 08:07 PM
-- Server version: 10.6.11-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `sub_title` varchar(150) NOT NULL,
  `description` varchar(255) NOT NULL,
  `about_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `long_description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `sub_title`, `description`, `about_image`, `created_at`, `updated_at`, `long_description`) VALUES
(1, 'I have transform your ideas into remarkable digital products', '20+ Years Experience In this game, Means Product Designing', 'I love to work in User Experience & User Interface designing. Because I love to solve the design problem and find easy and better solutions to solve it. I always try my best to make good user interface with the best user experience.', '', '2023-02-07 18:04:50', '2023-02-07 17:47:07', '<p class=\"desc\" style=\"margin-bottom: 32px; line-height: 1.75; color: rgb(104, 102, 108); padding-right: 45px; font-family: Roboto, sans-serif;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of lorem ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the lorem ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated lorem ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p><ul class=\"about__exp__list\" style=\"padding: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgb(104, 102, 108); font-family: Roboto, sans-serif;\"><li style=\"list-style: none; width: 716.297px; margin-bottom: 35px;\"><h5 class=\"title\" style=\"margin-bottom: 15px; font-size: 20px; font-family: Roboto, sans-serif; color: rgb(25, 27, 30); text-transform: unset;\">User experience design - (Product Design)</h5><p style=\"margin-bottom: 0px; line-height: 1.75;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to unseery.</p></li><li style=\"list-style: none; width: 716.297px; margin-bottom: 35px;\"><h5 class=\"title\" style=\"margin-bottom: 15px; font-size: 20px; font-family: Roboto, sans-serif; color: rgb(25, 27, 30); text-transform: unset;\">Web and user interface design - Development</h5><p style=\"margin-bottom: 0px; line-height: 1.75;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of lorem ipsum.</p></li><li style=\"list-style: none; width: 716.297px; margin-bottom: 0px;\"><h5 class=\"title\" style=\"margin-bottom: 15px; font-size: 20px; font-family: Roboto, sans-serif; color: rgb(25, 27, 30); text-transform: unset;\">Interaction design - <span style=\"background-color: rgb(255, 0, 0);\">Animation</span></h5><p style=\"margin-bottom: 0px; line-height: 1.75;\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable.</p></li></ul>');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `image` varchar(225) DEFAULT NULL,
  `post_description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `category_id_fK00` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE IF NOT EXISTS `blog_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `blog_posts_view`
-- (See below for the actual view)
--
CREATE TABLE IF NOT EXISTS `blog_posts_view` (
`post_id` int(11)
,`title` varchar(225)
,`image` varchar(225)
,`post_description` text
,`category_id` int(11)
,`name` varchar(225)
);

-- --------------------------------------------------------

--
-- Table structure for table `contace_message`
--

CREATE TABLE IF NOT EXISTS `contace_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_name` varchar(100) NOT NULL,
  `sender_email` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `address` varchar(250) DEFAULT NULL,
  `subject` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `home_banner`
--

CREATE TABLE IF NOT EXISTS `home_banner` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `bio_description` varchar(255) NOT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `home_banner`
--

INSERT INTO `home_banner` (`id`, `title`, `bio_description`, `banner_image`, `video_url`, `created_at`, `updated_at`) VALUES
(2, 'I will give you Best Product in the shortest time.', 'I\'m a Rasalina based product design & visual designer focused on crafting clean & user‑friendly experiences', NULL, 'https://www.youtube.com/watch?v=XHOmBV4js_E', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_02_05_121917_add_username_attr', 1),
(6, '2023_02_05_190854_add_profile_image_attr', 1),
(7, '2023_02_07_122803_create_home_banner_table', 2),
(8, '2023_02_07_174033_create_about_table', 3),
(9, '2023_02_07_185314_add_attr_to_about', 4),
(13, '2023_02_08_164907_create_portfolio_category_tabl', 5),
(14, '2023_02_08_164606_create_portfolio_table', 6),
(15, '2023_02_08_203042_create_porfolio_view', 7),
(17, '2023_02_09_135239_create_bolg_category_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `portfolio_category_id_foreign` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_category`
--

CREATE TABLE IF NOT EXISTS `portfolio_category` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(150) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `portfolio_category_category_name_unique` (`category_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portfolio_category`
--

INSERT INTO `portfolio_category` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Web Development', NULL, NULL),
(2, 'Web Design', NULL, NULL),
(3, 'App Design', NULL, NULL),
(4, 'Ui/Ux', NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `portfolio_projects_view`
-- (See below for the actual view)
--
CREATE TABLE IF NOT EXISTS `portfolio_projects_view` (
`Portfolio_id` bigint(20) unsigned
,`category_id` bigint(20) unsigned
,`title` varchar(150)
,`image` varchar(255)
,`description` text
,`category_name` varchar(150)
,`categoryId` bigint(20) unsigned
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `image`) VALUES
(1, 'Mustafa Hamzawy', 'mustafa@gmail.com', '2023-02-07 09:50:56', '$2y$10$PuTnwJ/n8bo7UM8HoYgqYuSqnPxAhC2BqWoQi3WVjpMAqcxRHHkua', 'rXrzdzo9lkBCqtew4YMtxAY9SyPkojGTxFxWurmumwsuY9UPTfxzHAt6IK1n', '2023-02-06 16:59:51', '2023-02-07 09:50:56', 'hamzawy', '14746d191fe46d15ebe54a0348cf7860.webp'),
(2, 'mustafa mahmoud', 'mm@yahoo.com', NULL, '$2y$10$50Az32DsQnrWL9zaMBJWxuc6ax/fZ3WpbQdHKrxaV5PzfN3kLMgMq', NULL, '2023-02-09 17:26:58', '2023-02-09 17:27:17', 'hamzawy123', '655bccdb7346e7997f5e492b4e58a9ff.png');

-- --------------------------------------------------------

--
-- Structure for view `blog_posts_view`
--
DROP TABLE IF EXISTS `blog_posts_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`%` SQL SECURITY DEFINER VIEW `blog_posts_view`  AS SELECT `blog`.`id` AS `post_id`, `blog`.`title` AS `title`, `blog`.`image` AS `image`, `blog`.`post_description` AS `post_description`, `blog_category`.`id` AS `category_id`, `blog_category`.`name` AS `name` FROM (`blog` join `blog_category` on(`blog_category`.`id` = `blog`.`category_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `portfolio_projects_view`
--
DROP TABLE IF EXISTS `portfolio_projects_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin`@`%` SQL SECURITY DEFINER VIEW `portfolio_projects_view`  AS SELECT `portfolio`.`id` AS `Portfolio_id`, `portfolio`.`category_id` AS `category_id`, `portfolio`.`title` AS `title`, `portfolio`.`image` AS `image`, `portfolio`.`description` AS `description`, `portfolio_category`.`category_name` AS `category_name`, `portfolio_category`.`id` AS `categoryId` FROM (`portfolio` join `portfolio_category` on(`portfolio_category`.`id` = `portfolio`.`category_id`)) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `category_id_fK00` FOREIGN KEY (`category_id`) REFERENCES `blog_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `portfolio_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `portfolio_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
