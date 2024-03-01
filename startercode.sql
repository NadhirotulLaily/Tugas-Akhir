-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 01:27 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `startercode`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_12_02_151940_add_role_column_to_users_table', 1),
(7, '2023_12_03_014839_add_bio_and_phone_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `role` enum('superadmin','admin','user') NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `bio`, `phone`, `role`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Eloisa Lind', 'awiza@example.org', 'Autem sunt reiciendis sint qui error qui. Architecto ut fugit ullam deserunt ad et atque necessitatibus. Animi culpa culpa doloremque dicta autem eveniet quia. Deleniti laboriosam quidem laudantium reprehenderit temporibus debitis.', '332.317.1053', 'user', '2023-12-04 05:26:46', '$2y$10$uoHHFBAF8MhFMmkggNh7K.1Q0zJ51DQmZbUqhWAgnUOnMdwcqm3Mq', NULL, NULL, NULL, 'NQuqf0JtJL', '2023-12-04 05:26:47', '2023-12-04 05:26:47'),
(2, 'Demarcus Roberts', 'tmiller@example.org', 'Adipisci eos est magni magnam. Ipsa assumenda illo quasi vel.', '+1.651.936.6206', 'user', '2023-12-04 05:26:46', '$2y$10$Sp28xBKG9Q9i4y/SfdxF5OiaNdjjJ3mIEAQI6lya0fIvCppdwl6QO', NULL, NULL, NULL, 'kWFeLeuz8X', '2023-12-04 05:26:47', '2023-12-04 05:26:47'),
(3, 'Eleonore Crona', 'angelita13@example.org', 'Aut repudiandae tempora cumque nulla corporis quo recusandae nisi. Odio commodi quia dolores et quis. Laborum non est nisi nihil voluptas. Repudiandae illo laboriosam qui earum. Ad quisquam enim illum tempore est sit.', '(478) 251-9439', 'user', '2023-12-04 05:26:46', '$2y$10$58K0.3ZYBcAoENQGY6UjeegemGrJAtAoI8tJ9oIZvAiHZnXgySMpa', NULL, NULL, NULL, 'W1I6cs02TN', '2023-12-04 05:26:47', '2023-12-04 05:26:47'),
(4, 'Loma Schmidt PhD', 'demetris94@example.org', 'Temporibus vero sequi consequatur debitis ipsam. Sit consequatur est aut autem dolorem fugit libero et. Velit repellat sequi neque ut excepturi pariatur. Voluptatem amet sed excepturi et.', '+1-630-572-8596', 'user', '2023-12-04 05:26:46', '$2y$10$4r7X3NL8vtUQA4CejiCDiOhN8llraeh75PSE1ADjnWnBG0AqEeVeG', NULL, NULL, NULL, 'Z8IxMfBlVd', '2023-12-04 05:26:47', '2023-12-04 05:26:47'),
(5, 'Angeline Kuvalis', 'klangosh@example.com', 'Doloremque consequatur ut eligendi dolores cumque omnis. Pariatur maxime veniam pariatur fugiat. Est in nobis omnis reprehenderit consequatur.', '+13512156425', 'user', '2023-12-04 05:26:47', '$2y$10$ZsN9T2OZk6Rb94ic/L19c.1EC2xO7jpNOE0JpdPDLCKAFiTW34.ee', NULL, NULL, NULL, 'FD3dkWsPYa', '2023-12-04 05:26:47', '2023-12-04 05:26:47'),
(6, 'Guadalupe Spinka', 'laverne.steuber@example.org', 'Praesentium ut a cum ut soluta. Provident maiores rerum aut ipsam optio adipisci. Harum debitis id sequi harum sit exercitationem similique.', '+1 (989) 702-9774', 'user', '2023-12-04 05:26:47', '$2y$10$08dX2cGImeN7pMBwwnrXL.62V6lAkQWGZlbfLCNPY3IHIcNLcvDTO', NULL, NULL, NULL, 'bndCZixJEX', '2023-12-04 05:26:47', '2023-12-04 05:26:47'),
(7, 'Dr. Afton Cummings II', 'zmertz@example.com', 'Et qui deserunt et necessitatibus quibusdam necessitatibus inventore. Sed unde qui cupiditate. Qui voluptas eum laborum maxime architecto. Sint consequatur aliquam id veniam qui in. Quo impedit in quisquam facere.', '(732) 795-0479', 'user', '2023-12-04 05:26:47', '$2y$10$hdFvq4YOfflJeD8G41jFqeFRxulsEabpdv/RfXv2K9pyUU8lSsUvC', NULL, NULL, NULL, '1dsKCXDnKb', '2023-12-04 05:26:47', '2023-12-04 05:26:47'),
(8, 'Giovanni Sauer', 'omedhurst@example.net', 'Et magni rerum id temporibus quos harum est culpa. Modi autem ut non iusto magnam.', '+1 (862) 922-6199', 'user', '2023-12-04 05:26:47', '$2y$10$NKDu4plhBX/h79TuqIrsPOUS3sY97CKb0.un9wmucY80GAeOVkXey', NULL, NULL, NULL, 'A2mClmKqsu', '2023-12-04 05:26:47', '2023-12-04 05:26:47'),
(9, 'Broderick Jakubowski Sr.', 'langworth.americo@example.com', 'Aut voluptatum ullam est cumque alias quia qui. Consequatur quod excepturi reprehenderit iure voluptas minus omnis aut. Sapiente et perspiciatis et veritatis et at et. Maiores doloribus iusto nostrum sed voluptatem eaque dignissimos dolorem.', '+1-689-342-3364', 'user', '2023-12-04 05:26:47', '$2y$10$V3y9pJ7rHrLdD0TLFh96RO91X4I8liFaDQuOEV6dmgThTHZsfY7gS', NULL, NULL, NULL, 'XaI6fcKXdu', '2023-12-04 05:26:47', '2023-12-04 05:26:47'),
(10, 'Kyle Gaylord', 'simonis.misael@example.net', 'Eum exercitationem libero officiis odit quidem autem et ut. Voluptas minima nam optio commodi ea qui atque. Voluptatum provident sed quam voluptate reiciendis in. Dolorem minus dolorem saepe alias libero sint alias.', '(908) 933-7702', 'user', '2023-12-04 05:26:47', '$2y$10$vS7Qtw0O0NlXQshCFcuiFOF6i7BZNQpFebezMHd9cWRLmO0RuTZSK', NULL, NULL, NULL, 'SmC4x4RmLc', '2023-12-04 05:26:47', '2023-12-04 05:26:47'),
(11, 'Test User', 'superadmin@gmail.com', NULL, NULL, 'superadmin', '2023-12-04 05:26:47', '$2y$10$.r1F/4Nx367GDUOv8pxaQuOVqwmBEqasGChe.igMSINxeZGfLgyRG', NULL, NULL, NULL, NULL, '2023-12-04 05:26:47', '2023-12-04 05:26:47'),
(12, 'Admin', 'admin@gmail.com', NULL, NULL, 'admin', '2023-12-04 05:26:47', '$2y$10$b4euKpRop0xX/n1gApFmNuyDpOKxiwTHuh47nI3njBvgFU2qUZE8.', NULL, NULL, NULL, NULL, '2023-12-04 05:26:47', '2023-12-04 05:26:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
