-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2021 at 08:30 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siproxte_lavaza`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_fa` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredients` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ingredients_fa` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `menu_id`, `name`, `name_fa`, `ingredients`, `ingredients_fa`, `price`, `stock`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sampler', 'سمپلر', 'Beef nachos with tomatos chicken quesadilas and chicken flautas on a bed of lettuce with cheese sauce, sour cream and guacamore', 'ناچو گوشت گوساله به همراه فیله مرغ کاهو و سس پنیر', 33250, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(2, 1, 'Guacamalo Mexicano', 'گواکامالو مکزیکو', 'Avocado, Tomatos, jalapeno, Coriander, Lime', 'اووکادوو گوجه فرنگی هالوپینو کوریاندر لیمو', 21250, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(3, 1, 'Buffalo Wings', 'بوفالو وینگز', 'Chicken wings, Hot sauce, Butter, Vinegar, Paprika, Ground chili', 'بال مرغ سس چیلی سرکه پاپریکا فلفل سیاه', 36500, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(4, 1, 'Chicken Fingers', 'چیکن فینگرز', 'Chicken breast, Cheese, Bread crums, eggs', 'سینه مرغ پنیر تخم مرغ پوره تست', 36500, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(5, 1, 'Stuffed Jalapenos', 'هالوپینو کبابی', 'Jalapeno, Onlion, Cream cheese', 'هالوپینو پیاز پنیر خامه ای', 21000, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(6, 1, 'Texas Dip', 'دیپ تگزاس', 'A rich blend of grilled schrimp, Beef, Chicken, Special salsa', 'مخلوطی از میگو گریل شده گوشت گاو گوشت مرغ سالسای مخصوص', 23000, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(7, 1, 'Chicken Dip', 'دیپ مرغ', 'Original red hot sauce, Sour cream, Cream cheese, Cheddar cheese, Green onion', 'سس قرمز چیلی خامه پنیر خامه ای پنیر چدار پیاز', 19000, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(8, 2, 'Secar Salad', 'سالاد سزار', 'Lettuce, Parmesan cheese, Crisp croutons, Salad dressing', 'کاهو پنیر پارمسان کروتون سس سزار', 35000, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(9, 2, 'Four Seasons Super Salad', 'سوپر سالاد فصل', 'Brown rice, Broccoli, Green shallot(s), Carrot, coarsely grated, Olive oil, Lemon juice, Avocado, Reduced fat feta cheese', 'برنج بروکلی پیازچه هویج روغن زیتون اووکادو پنیر فتا', 28000, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(10, 2, 'Frech Fries', 'سیب زمینی', 'Fresh potatoes, Vinegar, Salt', 'سیب زمینی تازه به هراه سرکه و نمک', 25000, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(11, 3, 'Coca cola can', 'نوشابه کوکا قوطی', '330 ml', '۳۳۰ میلی', 8500, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(12, 3, 'Sprite can', 'نوشابه اسپرایت قوطی', '330 ml', '۳۳۰ میلی', 8500, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(13, 3, 'Fanta can', 'نوشابه فانتا قوطی', '330 ml', '۳۳۰ میلی', 8500, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(14, 4, 'Beef Burger', 'بیف برگر', 'Beef, Onions, Tomatoes, Lettuce, Ketchup, Mayo, Mustard', 'گوشت گوساله گوجه فرنگی کاهو کچاپ مایونز سس خردل', 85000, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(15, 4, 'Spicy Tandoori', 'تاندوری برگر اسپایسی', 'Tandoori Chicken, Chedder Cheese, Grilled Onion, & Tomatoes, Lettuce, Pickles, Garlic Sauce, Mayo', 'مرغ تاندوری پنیر چدار پیاز گریل شده و چوجه فرنگی کاهو خیار شور سس سیر مایونز', 95000, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(16, 4, 'Cheese Burger', 'چیز برگر', 'Beef Patty, Cheddar Cheese, Grilled Onions & Tomatoes, Pickles, Lettuce, Ketchup, Mayo,', 'گوشت گوساله پنیر چدار پیاز و گوجه تنوری خیار شور کاهو کچاپ مایونز خردل', 90000, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(17, 4, 'Spicy Buffalo', 'بوفالو برگر اسپایسی', 'Crispy Chicken, Mozza Cheese, Grilled Onion & Tomatoes, Lettuce, Garlic Sauce, Buffalo Sauce, Mayo', 'مرغ سوخاری برشته پنیر موزا پیاز و گوجه گریل شده کاهو سس سیر سس بوفالو مایونز', 75000, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(18, 4, 'Beef bacon', 'بیف بیکن برگر', 'Beef Patty, Chedder Cheese, Beef Bacon, Grilled Onions & Tomatoes, Pickles, Lettuce, Ketchup, Mayo, Mustard', 'گوشت گوساله پنیر چدار بیکن پیاز و گوجه کریل شده خیار شور کاهو کچاپ مایونز خردل', 105000, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(19, 4, 'BBQ Chicken', 'باربکیو چیکن', 'Grilled chicken, Mozza Cheese, Grilled Onlion, Lettuce, Mayo, BBQ Sauce', 'مرغ گریل شده پنیر موزا کاهو مایونز سس باربکیو', 75000, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(20, 4, 'Creamy Mushroom', 'برگر قارچ خامه ای', 'Beef Patty, Cream of Musgroom, Mozza Cheese, Grilled Onions, Mayo', '‌گوشت گوساله قارچ خامه ای پنیر موزا پیاز گریل شده مایونز', 104000, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(21, 4, 'Crispy Chicken', 'کریسپی چیکن', 'Crispy Chicken, Cheddar Cheese, Grilled Onion & Tomatoes, Lettuce, Pickles, Garlic Sauce, Mayo, Chipotle Sauce', ' مرغ سوخاری برشته پنیر چدار پیاز و گوجه گریل شده کاهو خیارشور سس سیر مایونز سس سس چیپوتل', 90000, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(22, 4, 'Hawaiian Burger', 'برگر هاوایی', 'Beef Patty, Grilled Pineapple Mozza, Cheese, Onions, Tomatoes, Lettuce, Mayo, BBQ Sauce', 'گوشت گوساله اناناس گریل شده پنیر موزا پیاز چوجه فرنگی کاهو مایونز سس باربکیو', 120000, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(23, 4, 'Chicken Paradise', 'چیکن پارادایس', 'Grilled Chicken, Mozza Cheese, Grilled Pineapple, Lettuce, Onions, Jalapenos, Mayo, Garlic Sauce', 'مرغ کریسپی پنیر موزا اناناس گریل شده کاهو پیاز هالوپینو مایونز سس سیر', 135000, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_fa` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `name_fa`, `created_at`, `updated_at`) VALUES
(1, 'Starter', 'استارتر', '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(2, 'Side', 'ساید', '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(3, 'Drinks', 'نوشیدنی ها', '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(4, 'Main', 'غذای اصلی', '2021-11-04 08:58:35', '2021-11-04 08:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(216, '2014_10_12_000000_create_users_table', 1),
(217, '2014_10_12_100000_create_password_resets_table', 1),
(218, '2019_08_19_000000_create_failed_jobs_table', 1),
(219, '2021_08_04_105314_create_menus_table', 1),
(220, '2021_08_04_105419_create_items_table', 1),
(221, '2021_09_14_103810_create_orders_table', 1),
(222, '2021_09_14_103828_create_order_items_table', 1),
(223, '2021_09_14_103842_create_payments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_address` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `delivery_price` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `notes` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `email`, `phone`, `delivery_address`, `delivery_price`, `total_price`, `notes`, `created_at`, `updated_at`) VALUES
(1, NULL, 'mshadow73@gmail.com', NULL, 'دانشجو 13 پلاک 134 واحد 3', 25000, 250000, NULL, '2021-11-04 09:00:56', '2021-11-04 09:00:56'),
(2, 4, 'mshadow73@gmail.com', NULL, 'بولوار دانشجو ۴۵ پلاک ۶۷۵', 25000, 205000, NULL, '2021-11-04 09:17:37', '2021-11-04 09:17:37'),
(3, 4, 'mshadow73@gmail.com', NULL, 'بولوار دانشجو ۴۵ پلاک ۶۷۵', 25000, 205000, NULL, '2021-11-04 09:18:32', '2021-11-04 09:18:32');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_fa` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `name`, `name_fa`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'Beef bacon', 'بیف بیکن برگر', 1, 105000, '2021-11-04 09:00:56', '2021-11-04 09:00:56'),
(2, 1, 'Hawaiian Burger', 'برگر هاوایی', 1, 120000, '2021-11-04 09:00:56', '2021-11-04 09:00:56'),
(3, 2, 'Beef Burger', 'بیف برگر', 1, 85000, '2021-11-04 09:17:37', '2021-11-04 09:17:37'),
(4, 2, 'Spicy Tandoori', 'تاندوری برگر اسپایسی', 1, 95000, '2021-11-04 09:17:37', '2021-11-04 09:17:37'),
(5, 3, 'Beef Burger', 'بیف برگر', 1, 85000, '2021-11-04 09:18:32', '2021-11-04 09:18:32'),
(6, 3, 'Spicy Tandoori', 'تاندوری برگر اسپایسی', 1, 95000, '2021-11-04 09:18:32', '2021-11-04 09:18:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('test@gmail.com', '$2y$10$gI9/a02sIr9.VHep1qg/Be/Yy8B2xZRc5agbnelu41nAM9VXlZr46', '2021-11-04 09:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_method` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_four_digit` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_ref` varchar(512) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `amount`, `payment_method`, `last_four_digit`, `payment_ref`, `created_at`, `updated_at`) VALUES
(1, 1, 250000, 'Saman Bank', '1234', '545asdsda2s12121asds2', '2021-11-04 09:00:56', '2021-11-04 09:00:56'),
(2, 2, 205000, 'Saman Bank', '1234', '545asdsda2s12121asds2', '2021-11-04 09:17:37', '2021-11-04 09:17:37'),
(3, 3, 205000, 'Saman Bank', '1234', '545asdsda2s12121asds2', '2021-11-04 09:18:32', '2021-11-04 09:18:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` smallint(6) NOT NULL DEFAULT 0,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `role`, `password`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'سروش مدرسی', 'siproxtech@gmail.com', 630662158, NULL, 1, '$2y$10$rwgsUcxyOAFx4F0wpFTc/.5uuhq6O8EM15Wtn7nf1IVNEv0BKIZ1e', NULL, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(2, 'نکیسا رهنورد', 'email@email.com', 5488507826, NULL, 0, '$2y$10$y/nQNCd4mjRxwFdYBv7ZjuZzwsX07zDzvRKc7ioB1eG9DWaC8IBAS', NULL, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(3, 'احمد احمدی', 'ahmad@email.com', 7943946474, NULL, 0, '$2y$10$RFdr5MybUBMXFUmI4Ub9keDEl9Rgr2VCS9meC7goP/lgcHNET2fAW', NULL, NULL, '2021-11-04 08:58:35', '2021-11-04 08:58:35'),
(4, 'مهران زاهدی', 'mshadow73@gmail.com', 9943860630, 'بولوار دانشجو ۴۵ پلاک ۶۷۵', 0, '$2y$10$xOOHFyletmL9XrPJYiQbLe5dxA6S7uwbNu8cclSlRLHeWG3fjoAvO', '2021-11-04 09:11:36', NULL, '2021-11-04 08:58:35', '2021-11-04 09:11:36');

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
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

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
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
