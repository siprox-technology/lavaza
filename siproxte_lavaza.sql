-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2021 at 08:54 AM
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
(1, 1, 'Sampler', 'سمپلر', 'Beef nachos with tomatos chicken quesadilas and chicken flautas on a bed of lettuce with cheese sauce, sour cream and guacamore', 'ناچو گوشت گوساله به همراه فیله مرغ کاهو و سس پنیر', 33250, 11, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(2, 1, 'Guacamalo Mexicano', 'گواکامالو مکزیکو', 'Avocado, Tomatos, jalapeno, Coriander, Lime', 'اووکادوو گوجه فرنگی هالوپینو کوریاندر لیمو', 21250, 136, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(3, 1, 'Buffalo Wings', 'بوفالو وینگز', 'Chicken wings, Hot sauce, Butter, Vinegar, Paprika, Ground chili', 'بال مرغ سس چیلی سرکه پاپریکا فلفل سیاه', 36500, 78, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(4, 1, 'Chicken Fingers', 'چیکن فینگرز', 'Chicken breast, Cheese, Bread crums, eggs', 'سینه مرغ پنیر تخم مرغ پوره تست', 36500, 51, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(5, 1, 'Stuffed Jalapenos', 'هالوپینو کبابی', 'Jalapeno, Onlion, Cream cheese', 'هالوپینو پیاز پنیر خامه ای', 21000, 127, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(6, 1, 'Texas Dip', 'دیپ تگزاس', 'A rich blend of grilled schrimp, Beef, Chicken, Special salsa', 'مخلوطی از میگو گریل شده گوشت گاو گوشت مرغ سالسای مخصوص', 23000, 142, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(7, 1, 'Chicken Dip', 'دیپ مرغ', 'Original red hot sauce, Sour cream, Cream cheese, Cheddar cheese, Green onion', 'سس قرمز چیلی خامه پنیر خامه ای پنیر چدار پیاز', 19000, 7, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(8, 2, 'Secar Salad', 'سالاد سزار', 'Lettuce, Parmesan cheese, Crisp croutons, Salad dressing', 'کاهو پنیر پارمسان کروتون سس سزار', 35000, 3, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(9, 2, 'Four Seasons Super Salad', 'سوپر سالاد فصل', 'Brown rice, Broccoli, Green shallot(s), Carrot, coarsely grated, Olive oil, Lemon juice, Avocado, Reduced fat feta cheese', 'برنج بروکلی پیازچه هویج روغن زیتون اووکادو پنیر فتا', 28000, 118, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(10, 2, 'Frech Fries', 'سیب زمینی', 'Fresh potatoes, Vinegar, Salt', 'سیب زمینی تازه به هراه سرکه و نمک', 25000, 145, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(11, 3, 'Coca cola can', 'نوشابه کوکا قوطی', '330 ml', '۳۳۰ میلی', 8500, 121, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(12, 3, 'Sprite can', 'نوشابه اسپرایت قوطی', '330 ml', '۳۳۰ میلی', 8500, 141, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(13, 3, 'Fanta can', 'نوشابه فانتا قوطی', '330 ml', '۳۳۰ میلی', 8500, 39, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(14, 4, 'Beef Burger', 'بیف برگر', 'Beef, Onions, Tomatoes, Lettuce, Ketchup, Mayo, Mustard', 'گوشت گوساله گوجه فرنگی کاهو کچاپ مایونز سس خردل', 85000, 83, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(15, 4, 'Spicy Tandoori', 'تاندوری برگر اسپایسی', 'Tandoori Chicken, Chedder Cheese, Grilled Onion, & Tomatoes, Lettuce, Pickles, Garlic Sauce, Mayo', 'مرغ تاندوری پنیر چدار پیاز گریل شده و چوجه فرنگی کاهو خیار شور سس سیر مایونز', 95000, 148, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(16, 4, 'Cheese Burger', 'چیز برگر', 'Beef Patty, Cheddar Cheese, Grilled Onions & Tomatoes, Pickles, Lettuce, Ketchup, Mayo,', 'گوشت گوساله پنیر چدار پیاز و گوجه تنوری خیار شور کاهو کچاپ مایونز خردل', 90000, 99, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(17, 4, 'Spicy Buffalo', 'بوفالو برگر اسپایسی', 'Crispy Chicken, Mozza Cheese, Grilled Onion & Tomatoes, Lettuce, Garlic Sauce, Buffalo Sauce, Mayo', 'مرغ سوخاری برشته پنیر موزا پیاز و گوجه گریل شده کاهو سس سیر سس بوفالو مایونز', 75000, 43, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(18, 4, 'Beef bacon', 'بیف بیکن برگر', 'Beef Patty, Chedder Cheese, Beef Bacon, Grilled Onions & Tomatoes, Pickles, Lettuce, Ketchup, Mayo, Mustard', 'گوشت گوساله پنیر چدار بیکن پیاز و گوجه کریل شده خیار شور کاهو کچاپ مایونز خردل', 105000, 33, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(19, 4, 'BBQ Chicken', 'باربکیو چیکن', 'Grilled chicken, Mozza Cheese, Grilled Onlion, Lettuce, Mayo, BBQ Sauce', 'مرغ گریل شده پنیر موزا کاهو مایونز سس باربکیو', 75000, 131, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(20, 4, 'Creamy Mushroom', 'برگر قارچ خامه ای', 'Beef Patty, Cream of Musgroom, Mozza Cheese, Grilled Onions, Mayo', '‌گوشت گوساله قارچ خامه ای پنیر موزا پیاز گریل شده مایونز', 104000, 138, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(21, 4, 'Crispy Chicken', 'کریسپی چیکن', 'Crispy Chicken, Cheddar Cheese, Grilled Onion & Tomatoes, Lettuce, Pickles, Garlic Sauce, Mayo, Chipotle Sauce', ' مرغ سوخاری برشته پنیر چدار پیاز و گوجه گریل شده کاهو خیارشور سس سیر مایونز سس سس چیپوتل', 90000, 97, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(22, 4, 'Hawaiian Burger', 'برگر هاوایی', 'Beef Patty, Grilled Pineapple Mozza, Cheese, Onions, Tomatoes, Lettuce, Mayo, BBQ Sauce', 'گوشت گوساله اناناس گریل شده پنیر موزا پیاز چوجه فرنگی کاهو مایونز سس باربکیو', 120000, 146, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(23, 4, 'Chicken Paradise', 'چیکن پارادایس', 'Grilled Chicken, Mozza Cheese, Grilled Pineapple, Lettuce, Onions, Jalapenos, Mayo, Garlic Sauce', 'مرغ کریسپی پنیر موزا اناناس گریل شده کاهو پیاز هالوپینو مایونز سس سیر', 135000, 116, '2021-12-11 07:22:14', '2021-12-11 07:22:14');

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
(1, 'Starter', 'استارتر', '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(2, 'Side', 'ساید', '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(3, 'Drinks', 'نوشیدنی ها', '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(4, 'Main', 'غذای اصلی', '2021-12-11 07:22:14', '2021-12-11 07:22:14');

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
(402, '2014_10_12_000000_create_users_table', 1),
(403, '2014_10_12_100000_create_password_resets_table', 1),
(404, '2019_08_19_000000_create_failed_jobs_table', 1),
(405, '2021_08_04_105314_create_menus_table', 1),
(406, '2021_08_04_105419_create_items_table', 1),
(407, '2021_09_14_103810_create_orders_table', 1),
(408, '2021_09_14_103828_create_order_items_table', 1),
(409, '2021_09_14_103842_create_payments_table', 1),
(410, '2021_12_11_102149_create_online_shops_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `online_shops`
--

CREATE TABLE `online_shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `is_open` tinyint(1) NOT NULL,
  `is_setting_manual` tinyint(1) NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `online_shops`
--

INSERT INTO `online_shops` (`id`, `is_open`, `is_setting_manual`, `open_time`, `close_time`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '11:00:00', '23:00:00', '2021-12-11 07:22:14', '2021-12-11 07:22:14');

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

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` char(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` smallint(6) NOT NULL DEFAULT 0,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `role`, `password`, `email_verified_at`, `phone_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ادمین', 'siproxtech@gmail.com', '09999999999', NULL, 1, '$2y$10$46jxgbir2OGuGq3dqwhUmu65b/ZMDIhL568C0SepHj4t.zNb8gmFe', NULL, NULL, NULL, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(2, 'نکیسا رهنورد', 'email@email.com', '10604593663', NULL, 0, '$2y$10$6vOSmNqAtjif2mKTL481JuY9ynl9eRY6Hf09Y9RqMhUXGk.DLQkPe', NULL, NULL, NULL, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(3, 'احمد احمدی', 'ahmad@email.com', '10218474304', NULL, 0, '$2y$10$kPlXCLrqWpKPz1/w6MsaRuGAd4W6EBFn7TmaeiumklDd2cWmjEmXW', NULL, NULL, NULL, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(4, 'مهران زاهدی', 'mshadow73@gmail.com', '10461818370', 'بولوار دانشجو ۴۵ پلاک ۶۷۵', 0, '$2y$10$xSM7lS4tfG7r0HCHVUKYkuC.hSlekqQwaPN3rWU1V6M7eskhMU38i', NULL, NULL, NULL, '2021-12-11 07:22:14', '2021-12-11 07:22:14'),
(5, 'سروش مدرسی', 'integralproject1988@gmail.com', '09371373929', 'بولوار دانشجو ۴۵ پلاک ۶۷۵', 0, '$2y$10$6DqLVoaKlq82/7SQ1tGtJOGBnOu.LuVtogpG2McLwrJ1t7MiKVWpe', '2011-11-17 06:43:18', NULL, NULL, '2021-12-11 07:22:14', '2021-12-11 07:22:14');

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
-- Indexes for table `online_shops`
--
ALTER TABLE `online_shops`
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
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=411;

--
-- AUTO_INCREMENT for table `online_shops`
--
ALTER TABLE `online_shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
