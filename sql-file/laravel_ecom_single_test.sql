-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2023 at 07:20 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_ecom_single_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pro_qty` int(11) NOT NULL DEFAULT 1,
  `total_price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `sub_category_count` int(11) NOT NULL DEFAULT 0,
  `product_count` int(11) NOT NULL DEFAULT 0,
  `category_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `sub_category_count`, `product_count`, `category_status`, `created_at`, `updated_at`) VALUES
(2, 'Cloths', 'cloths', 1, 0, 1, NULL, '2023-03-12 03:33:57'),
(3, 'Foods And Vegitables', 'foods-and-vegitables', 1, 0, 1, NULL, '2023-03-10 09:27:50'),
(4, 'Electronics', 'electronics', 2, 5, 1, NULL, '2023-03-11 05:51:30'),
(5, 'Shoe', 'shoe', 4, 2, 1, NULL, '2023-03-12 03:38:31');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_08_115755_laratrust_setup_tables', 2),
(6, '2023_03_09_151235_create_categories_table', 3),
(7, '2023_03_09_152024_create_subcategories_table', 4),
(8, '2023_03_09_152428_create_products_table', 5),
(9, '2023_03_14_100421_create_carts_table', 6),
(10, '2023_03_15_182928_create_shipping_infos_table', 7),
(11, '2023_03_15_190750_create_orders_table', 8),
(12, '2023_03_16_153146_create_order_details_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `shipping_phone` varchar(255) NOT NULL,
  `shipping_city` varchar(255) NOT NULL,
  `shipping_postal_code` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `order_date` date DEFAULT current_timestamp(),
  `order_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `shipping_phone`, `shipping_city`, `shipping_postal_code`, `shipping_address`, `total_price`, `order_date`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 2, '3232323', 'Dhaka', '1234', 'Jatrabari', '18900', '2023-03-16', 'Pending', NULL, NULL),
(2, 3, '23232323', 'Rajshahee', '23232', 'Rajshahee', '409000', '2023-03-16', 'Pending', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_qty` int(11) NOT NULL,
  `pro_price` bigint(20) NOT NULL,
  `pro_total` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `user_id`, `order_id`, `cart_id`, `pro_id`, `pro_qty`, `pro_price`, `pro_total`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 7, 3, 1300, 3900, NULL, NULL),
(2, 2, 1, 2, 8, 5, 3000, 15000, NULL, NULL),
(3, 3, 2, 3, 2, 4, 100000, 400000, NULL, NULL),
(4, 3, 2, 4, 8, 3, 3000, 9000, NULL, NULL);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'users-create', 'Create Users', 'Create Users', '2023-03-08 06:03:27', '2023-03-08 06:03:27'),
(2, 'users-read', 'Read Users', 'Read Users', '2023-03-08 06:03:27', '2023-03-08 06:03:27'),
(3, 'users-update', 'Update Users', 'Update Users', '2023-03-08 06:03:27', '2023-03-08 06:03:27'),
(4, 'users-delete', 'Delete Users', 'Delete Users', '2023-03-08 06:03:27', '2023-03-08 06:03:27'),
(5, 'payments-create', 'Create Payments', 'Create Payments', '2023-03-08 06:03:27', '2023-03-08 06:03:27'),
(6, 'payments-read', 'Read Payments', 'Read Payments', '2023-03-08 06:03:27', '2023-03-08 06:03:27'),
(7, 'payments-update', 'Update Payments', 'Update Payments', '2023-03-08 06:03:27', '2023-03-08 06:03:27'),
(8, 'payments-delete', 'Delete Payments', 'Delete Payments', '2023-03-08 06:03:27', '2023-03-08 06:03:27'),
(9, 'profile-read', 'Read Profile', 'Read Profile', '2023-03-08 06:03:27', '2023-03-08 06:03:27'),
(10, 'profile-update', 'Update Profile', 'Update Profile', '2023-03-08 06:03:27', '2023-03-08 06:03:27');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(2, 2),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(10, 1),
(10, 2);

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `sub_category_id` bigint(20) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_short_desc` text NOT NULL,
  `product_long_desc` text NOT NULL,
  `product_category_name` varchar(255) NOT NULL,
  `product_sub_category_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_qty` int(11) DEFAULT NULL,
  `product_slug` varchar(255) NOT NULL DEFAULT '0',
  `product_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `product_name`, `product_price`, `product_short_desc`, `product_long_desc`, `product_category_name`, `product_sub_category_name`, `product_image`, `product_qty`, `product_slug`, `product_status`, `created_at`, `updated_at`) VALUES
(2, 4, 2, 'iPhone 12', '100000', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.', 'Electronics', 'Mobile', 'upload/1760072618946155.jpg', 100, 'iphone-12', 1, NULL, '2023-03-12 02:26:28'),
(3, 4, 3, 'Chat Tv', '1121212', 'Chat Tv', 'Chat TvChat TvChat TvChat TvChat TvChat Tv', 'Electronics', 'TV', 'upload/1760072030671894.jpg', 32, 'chat-tv', 1, NULL, NULL),
(4, 4, 2, 'iPhone 11', '90000', 'iPhoneiPhoneiPhoneiPhone', 'iPhoneiPhoneiPhoneiPhone', 'Electronics', 'Mobile', 'upload/1760072618946155.jpg', 200, 'iphone-11', 1, NULL, '2023-03-12 02:26:46'),
(5, 4, 2, 'iPhone', '133000', 'iPhoneiPhoneiPhoneiPhone', 'iPhoneiPhoneiPhoneiPhone', 'Electronics', 'Mobile', 'upload/1760072618946155.jpg', 233, 'iphone', 1, NULL, '2023-03-11 06:00:51'),
(6, 4, 2, 'iPhone 14', '150000', 'iPhoneiPhoneiPhoneiPhone', 'iPhoneiPhoneiPhoneiPhone', 'Electronics', 'Mobile', 'upload/1760072618946155.jpg', 100, 'iphone-14', 1, NULL, '2023-03-12 02:27:03'),
(7, 5, 7, 'Man x Shoe', '1300', 'Man x Shoe', 'Man x ShoeMan x ShoeMan x ShoeMan x ShoeMan x ShoeMan x ShoeMan x Shoe', 'Shoe', 'Man', 'upload/1760154196644513.jpg', 200, 'man-x-shoe', 1, NULL, NULL),
(8, 5, 8, 'female shoe', '3000', 'female shoe', 'female shoefemale shoefemale shoefemale shoe', 'Shoe', 'Female', 'upload/1760154260753793.png', 100, 'female-shoe', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `display_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', 'Admin', '2023-03-08 06:03:27', '2023-03-08 06:03:27'),
(2, 'user', 'User', 'User', '2023-03-08 06:03:28', '2023-03-08 06:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(1, 1, 'App\\Models\\User'),
(2, 2, 'App\\Models\\User'),
(2, 3, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_infos`
--

CREATE TABLE `shipping_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city_name` varchar(255) NOT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `sub_category_name` varchar(255) NOT NULL,
  `sub_category_slug` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `product_count` int(11) NOT NULL DEFAULT 0,
  `sub_category_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `category_id`, `sub_category_name`, `sub_category_slug`, `category_name`, `product_count`, `sub_category_status`, `created_at`, `updated_at`) VALUES
(2, 4, 'Mobile', 'mobile', 'Electronics', 4, 1, NULL, '2023-03-11 03:50:42'),
(3, 4, 'TV', 'tv', 'Electronics', 1, 1, NULL, '2023-03-11 05:51:30'),
(4, 3, 'Soft Drinks', 'soft-drinks', 'Foods And Vegitables', 0, 1, NULL, '2023-03-10 09:27:50'),
(5, 5, 'Sports Shoe', 'sports-shoe', 'Shoe', 0, 1, NULL, NULL),
(6, 5, 'Formal Shoe', 'formal-shoe', 'Shoe', 0, 1, NULL, NULL),
(7, 5, 'Man', 'man', 'Shoe', 1, 1, NULL, '2023-03-12 03:37:30'),
(8, 5, 'Female', 'female', 'Shoe', 1, 1, NULL, '2023-03-12 03:38:31'),
(9, 2, 'Baby', 'baby', 'Cloths', 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Shah Jalal', 'jalal.kalenga@gmail.com', NULL, '$2y$10$7hxq91j32A5PnlLFlRAL7en3uUDDlePSdKuWsqnq8zQwk37TC2a3.', 'rr0k0xKjBuhpcmblpUR0y97qNO1yBTDUq2RuGyYBWIhU8a2Y2ALk4AXnjcxj', '2023-03-09 03:17:34', '2023-03-09 03:17:34'),
(2, 'Temp User', 'temp@user.com', NULL, '$2y$10$2Xe5CBNUg5OVBmzgTtUN1ON..1ueYJ4Rl61qiNsXaDcyM2bdu2bzi', 'tiznimsU9eGWVVImuPWCFZuOhfLojvZBlAUsCNlvZR3v1rhKyTE3E99dHj3J', '2023-03-12 05:56:25', '2023-03-12 05:56:25'),
(3, 'Fahim', 'fahim@user.com', NULL, '$2y$10$kGglxKwicEkTvT8z7fSx5eaNeLPgKIb3ys3/SIQArnvQD/jGSXB.W', NULL, '2023-03-16 11:08:13', '2023-03-16 11:08:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `shipping_infos`
--
ALTER TABLE `shipping_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_infos`
--
ALTER TABLE `shipping_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
