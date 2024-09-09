-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2024 at 12:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myecommerceproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `customer_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(143, 1, 1, 1, '2024-08-31 21:36:34', '2024-08-31 21:36:34'),
(144, 1, 41, 1, '2024-09-02 01:12:23', '2024-09-02 01:12:23'),
(146, 1, 38, 1, '2024-09-02 04:48:52', '2024-09-02 04:48:52'),
(147, 1, 4, 1, '2024-09-02 06:29:48', '2024-09-02 06:29:48'),
(148, 1, 24, 1, '2024-09-03 08:48:25', '2024-09-03 08:48:25'),
(150, 3, 1, 1, '2024-09-09 04:52:03', '2024-09-09 04:52:03');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'men', NULL, '2024-08-05 02:17:04', '2024-08-05 02:17:04'),
(2, 'women', NULL, '2024-08-05 02:17:15', '2024-08-05 02:17:15'),
(3, 'kids', NULL, '2024-08-05 02:17:20', '2024-08-05 02:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `is_customer` tinyint(1) NOT NULL DEFAULT 1,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `phone`, `address`, `image_path`, `is_customer`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'virat kohli', 'user@gmail.com', '$2y$12$PS8lnQkDpIpgHrOClDjJM.qgmQw4VOlQP2eht1MdHP65ZjuPQnY6G', '7384525877', 'howrah', '1722864173.jfif', 1, NULL, NULL, '2024-08-05 07:52:53', '2024-09-09 02:35:29'),
(2, 'Amantran saha', 'saha@gmail.com', '$2y$12$2gaGlU8PUox.G0mNhPL3JeftWx27Uz3gNWvgtj6.ZebZJbdbxc8c.', '7384525877', 'howrah', '1723187693.jfif', 1, NULL, NULL, '2024-08-08 11:41:06', '2024-09-09 02:33:58'),
(3, 'virat', 'virat@gmail.com', '$2y$12$UcFmJQrUoMdDrn5IEaRAz.7fQ9u8Ib/xRIY03ug8iDJMO0VS0HlhC', '7384525876', 'kolkata', NULL, 1, NULL, NULL, '2024-08-17 00:17:30', '2024-09-09 04:50:10');

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
(31, '2014_10_12_000000_create_users_table', 1),
(32, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(33, '2019_08_19_000000_create_failed_jobs_table', 1),
(34, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(35, '2024_05_07_061557_create_students_table', 1),
(36, '2024_07_22_095331_create_categories_table', 1),
(37, '2024_07_22_170903_create_products_table', 1),
(38, '2024_07_26_183308_create_customers_table', 1),
(39, '2024_07_28_082933_add_column_to_customers_table', 1),
(40, '2024_08_04_144928_create_product_categories_table', 1),
(41, '2024_08_06_141240_add_product_category_id_to_products_table', 2),
(42, '2024_08_06_141359_add_foreign_key_to_products_table', 3),
(43, '2024_08_08_180545_create_carts_table', 4),
(44, '2024_08_11_044102_create_orders_table', 5),
(45, '2024_09_02_044235_create_newsletter_subscribers_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribers`
--

CREATE TABLE `newsletter_subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletter_subscribers`
--

INSERT INTO `newsletter_subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'amantran@gmail.com', '2024-09-02 00:04:24', '2024-09-02 00:04:24'),
(4, 'sahaamantran@gmail.com', '2024-09-02 00:25:16', '2024-09-02 00:25:16'),
(7, 'sahaamantran981@gmail.com', '2024-09-02 01:01:15', '2024-09-02 01:01:15'),
(11, 'amantransaha18@gmail.com', '2024-09-02 01:10:10', '2024-09-02 01:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `razorpay_order_id` varchar(255) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `product_Availability` varchar(255) NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `show_on_page` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `product_Availability`, `image_url`, `created_at`, `updated_at`, `product_category_id`, `show_on_page`) VALUES
(1, 'Urban  Tshirt', 'Energize your wardrobe with the Urban Pulse Graphic Tee. Featuring a bold, eye-catching design, this shirt combines comfort with style. Made from 100% soft cotton, it’s perfect for a day out in the city or a casual weekend. Available in a range of sizes and colors.', 300.00, 'Out of Stock', '1722846630.jpg', '2024-08-05 03:00:30', '2024-08-05 03:00:30', 1, 'N'),
(2, 'Crew Neck tshirt', 'The Timeless Classic Crew Neck is your go-to for effortless style. Crafted from premium, breathable fabric, this t-shirt offers a perfect fit and long-lasting durability. Its simple yet elegant design makes it versatile for layering or wearing alone. Ideal for any occasion, from casual outings to lounging at home.', 450.00, 'In Stock', '1722846720.jpg', '2024-08-05 03:02:00', '2024-08-15 23:56:32', 1, 'N'),
(3, 'Seeker Tshirt', 'Designed for the modern explorer, the Adventure Seeker Performance Tee features moisture-wicking technology and a lightweight, stretchy fabric. Whether you\'re hitting the trails or just running errands, this tee ensures you stay cool and comfortable. Its sleek, modern design is as functional as it is fashionable.', 350.00, 'In Stock', '1722846800.jpg', '2024-08-05 03:03:20', '2024-08-15 23:00:22', 1, 'N'),
(4, 'Vintage Print Tshirt', 'Embrace nostalgia with the Retro Vibes Vintage Print Tee. This shirt showcases a classic retro graphic inspired by iconic designs of the past. Made from a soft, vintage-washed fabric, it offers both style and comfort. Perfect for those who appreciate a touch of old-school flair in their wardrobe.', 400.00, 'Out of Stock', '1722846847.jfif', '2024-08-05 03:04:07', '2024-08-05 03:04:07', 1, 'N'),
(5, 'V-Neck tshirt', 'The Essential Everyday V-Neck is a must-have staple for any wardrobe. With its flattering v-neck cut and soft, premium cotton blend, this tee combines style with comfort. It\'s versatile enough to dress up with a blazer or wear casually with jeans. Available in a variety of colors to suit your personal taste.', 450.00, 'In Stock', '1722846951.jpg', '2024-08-05 03:05:51', '2024-08-05 03:05:51', 1, 'N'),
(6, 'Graphic Tshirt', 'Make a statement without saying a word in the Bold Statement Graphic Tee. Featuring a striking, large-scale graphic on the front, this shirt is made from 100% high-quality cotton for maximum comfort. Ideal for those who want to stand out and showcase their personality through fashion.', 230.00, 'In Stock', '1722847002.jpg', '2024-08-05 03:06:42', '2024-08-05 03:06:42', 1, 'N'),
(8, 'Narrow jeans', 'good quality product\r\n100% pure cotton', 670.00, 'Out of Stock', '1722852870.jpg', '2024-08-05 04:44:30', '2024-08-05 04:44:30', 2, 'N'),
(11, 'Royal Crimson', 'This lehenga set features a deep crimson red fabric adorned with intricate gold embroidery and beadwork. The A-line skirt flows gracefully, complemented by a matching dupatta with delicate scalloped edges. Ideal for weddings or grand celebrations, the Royal Crimson lehenga exudes opulence and traditional elegance.', 1200.00, 'In Stock', '1722964991.jpg', '2024-08-06 11:53:11', '2024-08-06 11:53:11', 13, 'N'),
(12, 'Azure Dream', 'The Azure Dream lehenga combines a serene shade of blue with shimmering silver accents. The skirt is embellished with floral patterns and sequins that catch the light beautifully. Paired with a matching blouse and a soft net dupatta, this lehenga is perfect for daytime festivities and elegant parties.', 1300.00, 'In Stock', '1722965315.jpg', '2024-08-06 11:58:35', '2024-08-06 11:58:35', 13, 'N'),
(13, 'Emerald Enchantment', 'Crafted from lush green silk, the Emerald Enchantment lehenga showcases exquisite zari work and mirror embellishments. The skirt features layers of ruffles, adding volume and grace. The ensemble includes a cropped choli with intricate embroidery and a sheer dupatta with detailed borders.', 1843.00, 'In Stock', '1722965369.jpg', '2024-08-06 11:59:29', '2024-08-06 11:59:29', 13, 'N'),
(14, 'Blush Belle', 'The Blush Belle lehenga is a soft pink creation with delicate floral embroidery and subtle pearl detailing. The lehenga skirt is designed with pleats that enhance its fluidity and movement. This set is completed with a matching blouse and a sheer dupatta with a light, airy feel, making it ideal for a dreamy bridal look.', 2300.00, 'In Stock', '1722965413.jpg', '2024-08-06 12:00:13', '2024-08-06 12:00:13', 13, 'N'),
(15, 'Midnight Noir', 'For those who prefer a dramatic look, the Midnight Noir lehenga is a sophisticated choice. This black lehenga is adorned with silver and gold threadwork that creates a mesmerizing pattern. The lehenga\'s high-waisted design and the dupatta with a contrasting border add to its chic appeal.', 3200.00, 'In Stock', '1722965450.jpg', '2024-08-06 12:00:50', '2024-08-06 12:00:50', 13, 'N'),
(16, 'Sunset Saffr', 'Inspired by the hues of a sunset, the Sunset Saffron lehenga features a gradient of warm orange to deep gold. The lehenga is embellished with embroidered motifs and sequins that mimic the colors of the setting sun. The ensemble is completed with a matching blouse and a flowing dupatta.', 900.00, 'In Stock', '1722965490.jpg', '2024-08-06 12:01:30', '2024-08-06 12:01:30', 13, 'N'),
(17, 'Golden Aura', 'The Golden Aura kurta is a luxurious piece crafted from rich gold brocade fabric. It features intricate zari embroidery and embellishments along the neckline and sleeves. The kurta\'s straight cut and elegant detailing make it perfect for festive occasions and formal events. Pair it with matching trousers or a churidar for a regal look.', 400.00, 'In Stock', '1722965662.jpg', '2024-08-06 12:04:22', '2024-08-06 12:04:22', 14, 'N'),
(18, 'Sapphire Splendor', 'The Sapphire Splendor kurta stands out with its deep blue fabric adorned with subtle silver threadwork. The kurta is designed with a high collar and delicate embroidery on the yoke. Its flowy silhouette and side slits add to its graceful appeal, making it an excellent choice for evening gatherings and celebrations.', 379.00, 'In Stock', '1722965745.jpg', '2024-08-06 12:05:45', '2024-08-06 12:05:45', 14, 'N'),
(19, 'Blush Blossom', 'Embrace a soft, romantic look with the Blush Blossom kurta, crafted from pastel pink fabric with floral embroidery. The kurta features a delicate lace trim along the hem and sleeves, adding a touch of sophistication. This kurta is ideal for daytime events and casual outings, offering both comfort and style.', 800.00, 'In Stock', '1722965834.jpg', '2024-08-06 12:07:14', '2024-08-06 12:07:14', 14, 'N'),
(20, 'Eclipse Elegance', 'The Eclipse Elegance watch features a sleek black dial with silver-toned markers and hands. The minimalist design is complemented by a polished stainless steel bracelet and a date function at 3 o\'clock. Perfect for formal occasions and business settings, this watch exudes sophistication and class.', 400.00, 'In Stock', '1722965899.jpg', '2024-08-06 12:08:19', '2024-08-06 12:08:19', 10, 'N'),
(21, 'Golden Horizon', 'The Golden Horizon watch boasts a luxurious gold-tone case and bracelet with a sunburst dial that catches the light beautifully. The watch includes a date complication and is finished with a textured gold bezel. Ideal for special events and evening wear, it offers a touch of glamour and refinement.', 980.00, 'In Stock', '1722965967.jpg', '2024-08-06 12:09:27', '2024-08-06 12:09:27', 10, 'N'),
(24, 'Royal Juttis', 'The Royal Juttis are handcrafted from rich brocade fabric with intricate embroidery and embellishments. These traditional Indian shoes feature a pointed toe and a flexible sole, making them both elegant and comfortable. Perfect for weddings and festive occasions, they add a regal touch to any outfit.', 700.00, 'In Stock', '1722966323.jpg', '2024-08-06 12:15:23', '2024-08-06 12:15:23', 15, 'N'),
(25, 'Classic Mojaris', 'Classic Mojaris are crafted from high-quality leather with traditional hand-embroidered patterns. These slip-on shoes are designed with a curved toe and a comfortable sole, offering both style and comfort. Ideal for formal events and traditional ceremonies.', 340.00, 'In Stock', '1722966376.jpg', '2024-08-06 12:16:16', '2024-08-06 12:16:16', 15, 'N'),
(26, 'Elegant Jutti Clutch', 'The Elegant Jutti Clutch combines the charm of traditional juttis with modern functionality. Made from rich brocade fabric and featuring elaborate embroidery, this clutch adds a touch of sophistication to any formal attire.', 500.00, 'In Stock', '1722966433.jpg', '2024-08-06 12:17:13', '2024-08-06 12:17:13', 12, 'N'),
(28, 'Festive Banarasi Tote', 'The Festive Banarasi Tote features the opulent Banarasi fabric with elaborate gold threadwork. With its spacious interior and sturdy handles, this tote is perfect for carrying essentials to festive events and gatherings.', 700.00, 'In Stock', '1722966523.jpg', '2024-08-06 12:18:43', '2024-08-06 12:18:43', 12, 'N'),
(29, 'Regal Embroidered Clutch', 'The Regal Embroidered Clutch boasts an ornate design with detailed embroidery and sequins. Its sleek rectangular shape and clasp closure add a touch of glamour, making it ideal for weddings and upscale parties.', 1200.00, 'In Stock', '1722966566.jpg', '2024-08-06 12:19:26', '2024-08-06 12:19:26', 12, 'N'),
(38, 'Spread-Collar Shirt', NULL, 800.00, 'In Stock', '1723793886.jpg', '2024-08-16 02:08:06', '2024-08-16 02:08:06', 4, 'N'),
(39, 'Tropical Print Spread-Collar Shirt', NULL, 1200.00, 'In Stock', '1723793947.jpg', '2024-08-16 02:09:07', '2024-08-16 02:09:07', 4, 'N'),
(41, 'casual shirt', NULL, 700.00, 'In Stock', '1723794327.jpg', '2024-08-16 02:15:27', '2024-08-16 02:15:27', 4, 'N'),
(42, 'casual shirt', NULL, 500.00, 'Out of Stock', '1723794393.jpg', '2024-08-16 02:16:33', '2024-08-16 02:16:33', 4, 'N'),
(43, 'regular fit jeans', NULL, 780.00, 'In Stock', '1723794610.jpg', '2024-08-16 02:20:10', '2024-08-16 02:20:10', 2, 'N'),
(44, 'regular fit', NULL, 760.00, 'In Stock', '1723794665.jpg', '2024-08-16 02:21:05', '2024-08-16 02:21:05', 2, 'N'),
(45, 'casual Shorts', NULL, 450.00, 'Out of Stock', '1723795437.jpg', '2024-08-16 02:33:57', '2024-08-16 02:33:57', 3, 'N'),
(46, 'regular 3/4ths', NULL, 300.00, 'In Stock', '1723795465.jpg', '2024-08-16 02:34:25', '2024-08-16 02:34:25', 3, 'N'),
(47, 'regular Shorts', NULL, 400.00, 'In Stock', '1723795495.jpg', '2024-08-16 02:34:55', '2024-08-16 02:34:55', 3, 'N'),
(48, 'casual 3/4ths', NULL, 320.00, 'In Stock', '1723795521.jpg', '2024-08-16 02:35:21', '2024-08-16 02:35:21', 3, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `startingprice_or_discount` varchar(50) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `name`, `category_image`, `startingprice_or_discount`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Tshirt', '1722845323.jfif', 'STARTING ₹299*', 1, '2024-08-05 02:38:43', '2024-08-05 02:38:43'),
(2, 'Jeans', '1722845423.jpg', 'STARTING ₹299*', 1, '2024-08-05 02:40:23', '2024-08-16 01:18:56'),
(3, 'Shorts & 3/4ths', '1722845468.jfif', 'STARTING ₹199*', 1, '2024-08-05 02:41:08', '2024-08-05 02:41:08'),
(4, 'Shirts', '1722845525.jpg', '40-80% OFF*', 1, '2024-08-05 02:42:05', '2024-08-05 02:42:05'),
(5, 'Trackpants', '1722845566.jpg', 'MIN. 40% OFF*', 1, '2024-08-05 02:42:46', '2024-08-05 02:42:46'),
(6, 'Trousers & Pants', '1722845605.jfif', '30-70% OFF*', 1, '2024-08-05 02:43:25', '2024-08-05 02:43:25'),
(7, 'Flip-Flops & Slippers', '1722845646.jpg', 'STARTING ₹99*', 1, '2024-08-05 02:44:06', '2024-08-05 02:44:06'),
(8, 'Jackets & Coats', '1722845682.jpg', '30-80% OFF*', 1, '2024-08-05 02:44:42', '2024-08-05 02:44:42'),
(9, 'Innerwear', '1722845722.jpg', 'MIN. 50% OFF*', 1, '2024-08-05 02:45:22', '2024-08-05 02:45:22'),
(10, 'Watches', '1722845755.jpg', 'STARTING ₹299*', 1, '2024-08-05 02:45:55', '2024-08-05 02:45:55'),
(11, 'Belts & Wallets', '1722845800.jpg', 'STARTING ₹149*', 1, '2024-08-05 02:46:40', '2024-08-05 02:46:40'),
(12, 'Backpacks', '1722845831.jpg', 'STARTING ₹299*', 1, '2024-08-05 02:47:11', '2024-08-05 02:47:11'),
(13, 'lehenga', '1722952618.jpg', 'STARTING ₹800*', 2, '2024-08-06 08:26:58', '2024-08-06 08:26:58'),
(14, 'kurta', '1722965588.jpg', 'STARTING ₹379*', 2, '2024-08-06 12:03:08', '2024-08-06 12:03:08'),
(15, 'shoes', '1722966260.jpg', '30-70% OFF*', 1, '2024-08-06 12:14:20', '2024-08-06 12:14:20');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_password` varchar(255) NOT NULL,
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
(1, 'Amantran saha', 'admin@gmail.com', NULL, '$2y$12$ez5.rueIyni0aQkj34pXB.zPYOTX0buYh6Wvj.yKCpQiEcTXlpRom', NULL, '2024-08-05 02:15:44', '2024-08-05 02:15:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_customer_id_foreign` (`customer_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

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
-- Indexes for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `newsletter_subscribers_email_unique` (`email`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_product_category_id_foreign` (`product_category_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `newsletter_subscribers`
--
ALTER TABLE `newsletter_subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
