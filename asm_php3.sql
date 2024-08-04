-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th8 04, 2024 lúc 06:15 AM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `asm_php3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

CREATE TABLE `banners` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `name`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'banner-01', 'banners/8ILCqzLN30ga5YVIiWQmqL45BAbFc7kCFy9asix3.jpg', 1, '2024-08-03 09:03:56', '2024-08-03 09:43:39'),
(2, 'banner-02', 'banners/a9g6gWdkN5gyUS69131WmpIlbJyUYbzRANfKx5gI.jpg', 1, '2024-08-03 09:04:09', '2024-08-03 09:43:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `total_amount` double(8,2) NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `order_id`, `total_amount`, `transaction_id`, `created_at`, `updated_at`) VALUES
(6, 18, 522000.00, 'F1894D4578AD13D700D72754524AB288', '2024-08-03 08:18:52', '2024-08-03 08:18:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(3, 'Trái cây', 'categories/DoKFtYK5FGP1Ti7m5Flz9x640G0cN4J3yzcbQySy.png', 1, '2024-07-19 01:37:45', '2024-07-30 10:20:02'),
(4, 'Rau củ', 'categories/Ovd5KstxOF5oZJQ05bXKElYZIAxHhum2dkqyuGBZ.png', 1, '2024-07-19 01:38:14', '2024-07-30 10:19:13'),
(5, 'Thịt', 'categories/t232Pg7ipz8ydSxuIH4KgRhvJRJj9XWnanrEYkrK.png', 1, '2024-07-19 01:39:39', '2024-07-30 10:19:06'),
(6, 'Lúa mì', 'categories/0m2plcYtn1Dgqj3dNbNTDxUH6srBObwMNvompPtK.png', 1, '2024-07-19 01:40:07', '2024-07-30 10:18:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_products`
--

CREATE TABLE `category_products` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_products`
--

INSERT INTO `category_products` (`id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 4, 19, NULL, NULL),
(2, 3, 19, NULL, NULL),
(3, 4, 20, NULL, NULL),
(4, 3, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` double(8,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_17_141729_create_categories_table', 1),
(6, '2024_07_17_222843_create_products_table', 2),
(7, '2024_07_17_222907_create_product_galleries_table', 2),
(8, '2024_07_17_230008_create_product_sizes_table', 2),
(9, '2024_07_17_230020_create_product_colors_table', 2),
(10, '2024_07_18_084935_create_product_variants_table', 2),
(11, '2024_07_18_091343_create_category_products_table', 2),
(12, '2024_07_23_144335_add_type_to_users_table', 3),
(13, '2024_08_03_092148_create_orders_table', 4),
(14, '2024_08_03_092511_create_order_details_table', 4),
(15, '2024_08_03_094608_create_bills_table', 5),
(16, '2024_08_03_152509_create_coupons_table', 6),
(17, '2024_08_03_152518_create_banners_table', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `payment_method` int NOT NULL,
  `status` enum('1','2','3','4','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `sku`, `user_name`, `user_email`, `user_city`, `user_address`, `user_phone`, `note`, `payment_method`, `status`, `created_at`, `updated_at`) VALUES
(16, 9, 'KDZ-15TWTI61S', 'Trần Đức Khang', 'tdkhangg2004@gmail.com', 'Hà Nội', 'Kiến Hưng', '0386596511', 'ok', 1, '1', '2024-08-03 08:16:04', '2024-08-03 08:16:04'),
(18, 9, 'KDZ-HLYRVO0LO', 'Trần Đức Khang', 'tdkhangg2004@gmail.com', 'Hà Nội', 'Kiến Hưng, Hà Đông, Hà Nội', '0386596511', 'okkk', 1, '2', '2024-08-03 08:18:52', '2024-08-03 08:19:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint UNSIGNED NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `product_image`, `size`, `color`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(15, 18, 20, 'Ớt chuông xanh', 'products/ABCruNBmYQTdEjobVaOqSkfR8X5ytWaZ9TCeqBHO.webp', NULL, NULL, 1, 250000.00, '2024-08-03 08:18:52', '2024-08-03 08:18:52'),
(16, 18, 10, 'Lựu đỏ Việt Nam', 'products/SRu8sUG3D7BiKJCJZPEgymrIsyV3sw7xGh49to6R.webp', NULL, NULL, 4, 50000.00, '2024-08-03 08:18:52', '2024-08-03 08:18:52'),
(17, 18, 4, 'Black Pepper Grains', 'products/xARtZx85YPfU8Bcgsw6WsAjrkx8DIz4e6feiXBU1.webp', NULL, NULL, 3, 24000.00, '2024-08-03 08:18:52', '2024-08-03 08:18:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_thumb` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `price_sale` decimal(10,2) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `quantity` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `view` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `sku`, `img_thumb`, `price`, `price_sale`, `description`, `quantity`, `is_active`, `view`, `created_at`, `updated_at`) VALUES
(1, 'Chuối ngự', 'chuoi-ngu', '123', 'products/q6CtK2GoCWEuIDYKKdxWz4UYGutt8Q8ubPGFKquE.jpg', 200000.00, 300000.00, 'ngậy tuyệt đối', 123, 0, 32, '2024-07-18 08:04:08', '2024-07-27 10:24:54'),
(3, 'Sữa Vinamilk', 'a-b-c', '321', 'products/rMdwsgi56VGhrKY4ZOoMiisH0hVk9zxUiBcnUCTj.jpg', 123456.00, 654321.00, 'aaa', 199, 0, 2, '2024-07-18 08:05:03', '2024-07-27 10:24:22'),
(4, 'Black Pepper Grains', 'black-pepper-grains', '101', 'products/xARtZx85YPfU8Bcgsw6WsAjrkx8DIz4e6feiXBU1.webp', 24000.00, 39000.00, 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi.', 123, 1, 14, '2024-07-19 02:36:56', '2024-08-03 08:18:17'),
(5, 'Tôm lột', 'tom-lot', '567', 'products/IxP3TpMu5WU4SxYyHdmY9VSSBohlKxvWq3lZ5u15.webp', 20000.00, 30000.00, 'hehehe', 19, 1, 3, '2024-07-19 08:05:44', '2024-08-03 09:55:24'),
(6, 'Black Peppepr Read', 'black-peppepr-read', '453', 'products/1SVsXN6YT9594vi9gnRPSbbkMbxSAlDy52R2X4EU.webp', 80000.00, 100000.00, 'variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', 3, 1, 4, '2024-07-19 16:26:35', '2024-08-01 08:56:11'),
(8, 'Black Pepper Grains', 'black-pepper-grains-123', '562', 'products/WuRzkhmba7b6hgMV8wAK6GbFaIMolbEyD4tGbMfx.webp', 123000.00, 234000.00, 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', 452, 1, 8, '2024-07-19 16:37:27', '2024-08-03 09:47:46'),
(9, 'Coconut', 'coconut', '569', 'products/pNPTsL1UIgQEUmAJ8lC39GeaoAqYAYraAqZVFECp.webp', 145621.00, 551235.00, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia,', 2244, 1, 3, '2024-07-19 16:38:33', '2024-07-30 10:02:58'),
(10, 'Lựu đỏ Việt Nam', 'luu-do-viet-nam', '11613', 'products/SRu8sUG3D7BiKJCJZPEgymrIsyV3sw7xGh49to6R.webp', 50000.00, 60000.00, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia,', 123, 1, 23, '2024-07-19 16:39:37', '2024-08-03 08:18:02'),
(11, 'Mâm xôi Việt Nam', 'mam-xoi-viet-nam', '246', 'products/Gbx0jyRzYLXIwfhnOUct5gXeOH5heG5orkrB3sd4.webp', 23000.00, 37000.00, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution.', 4, 1, 10, '2024-07-19 16:41:59', '2024-08-03 01:47:46'),
(12, '@@', 'at-at', '42', 'products/ZBKNm5bCJc5X74mtlVlc0SXmCWGsZYGae2H9RKVA.webp', 70000.00, 79999.00, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution.', 5, 1, 14, '2024-07-19 16:42:45', '2024-08-03 01:35:23'),
(19, 'Táo Việt Nam', 'tao-viet-nam', '155S4S7', 'products/c5cOnYB5rvmXHBnGJZjQTAWcJiSx7nfPk5NbAUlb.webp', 200000.00, 250000.00, NULL, 555, 1, 67, '2024-08-02 09:42:27', '2024-08-03 08:17:11'),
(20, 'Ớt chuông xanh', 'ot-chuong-xanh', 'HPGKUJI', 'products/ABCruNBmYQTdEjobVaOqSkfR8X5ytWaZ9TCeqBHO.webp', 250000.00, 270000.00, NULL, 37, 1, 13, '2024-08-03 07:56:09', '2024-08-03 09:57:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_colors`
--

INSERT INTO `product_colors` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'black', '2024-08-02 06:52:12', '2024-08-02 06:52:12'),
(2, 'white', '2024-08-02 06:52:12', '2024-08-02 06:52:12'),
(3, 'gray', '2024-08-02 06:52:12', '2024-08-02 06:52:12'),
(4, 'green', '2024-08-02 06:52:12', '2024-08-02 06:52:12'),
(5, 'yellow', '2024-08-02 06:52:12', '2024-08-02 06:52:12'),
(6, 'red', '2024-08-02 06:52:12', '2024-08-02 06:52:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_galleries`
--

CREATE TABLE `product_galleries` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_galleries`
--

INSERT INTO `product_galleries` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(5, 19, 'product_galleries/Ac8SWzAwrADBI4dyU8QsiL2Qyy2jJD6AXvNddYR6.webp', '2024-08-02 13:25:56', '2024-08-02 13:25:56'),
(6, 19, 'product_galleries/yRPi48OcnoDIFHfM1RWIHYxnuJzCTn7IdDecGmei.webp', '2024-08-02 13:25:56', '2024-08-02 13:25:56'),
(7, 19, 'product_galleries/JmxYI4OkezTmthJPhTmPHB3VT2vdw3SgCmmxLHXV.webp', '2024-08-02 13:25:56', '2024-08-02 13:25:56'),
(8, 19, 'product_galleries/IGZNQpVFkdRdPf3FVasUVDBMeNHnh4fiZxt3WSBV.webp', '2024-08-02 13:25:56', '2024-08-02 13:25:56'),
(9, 20, 'product_galleries/a8gZGj7VVQMpCyH0JH4qPtGrRjSgfoEIkUnxAZxh.webp', '2024-08-03 07:56:09', '2024-08-03 07:56:09'),
(10, 20, 'product_galleries/wtZlrTnQrccHfRsdhiJexGcwk4AUOUh6DA680t4i.webp', '2024-08-03 07:56:09', '2024-08-03 07:56:09'),
(11, 20, 'product_galleries/Ai9O6Q2ZFGsVbSCZvolFFOAz6aua3e0qy8OrWWPq.webp', '2024-08-03 07:56:09', '2024-08-03 07:56:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'S', '2024-08-02 06:52:12', '2024-08-02 06:52:12'),
(2, 'M', '2024-08-02 06:52:12', '2024-08-02 06:52:12'),
(3, 'L', '2024-08-02 06:52:12', '2024-08-02 06:52:12'),
(4, 'XL', '2024-08-02 06:52:12', '2024-08-02 06:52:12'),
(5, 'XXL', '2024-08-02 06:52:12', '2024-08-02 06:52:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_variants`
--

CREATE TABLE `product_variants` (
  `id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `product_size_id` bigint UNSIGNED NOT NULL,
  `product_color_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_variants`
--

INSERT INTO `product_variants` (`id`, `product_id`, `product_size_id`, `product_color_id`, `quantity`, `created_at`, `updated_at`) VALUES
(3, 19, 3, 4, 123, '2024-08-02 09:42:27', '2024-08-02 09:42:27'),
(4, 19, 2, 4, 321, '2024-08-02 15:29:50', '2024-08-02 15:29:50'),
(5, 19, 1, 1, 111, '2024-08-02 15:42:25', '2024-08-02 15:42:25'),
(6, 20, 1, 1, 11, '2024-08-03 07:56:09', '2024-08-03 07:56:09'),
(7, 20, 2, 1, 12, '2024-08-03 07:56:09', '2024-08-03 07:56:09'),
(8, 20, 3, 1, 13, '2024-08-03 07:56:09', '2024-08-03 07:56:09'),
(9, 20, 5, 4, 1, '2024-08-03 07:56:09', '2024-08-03 07:56:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `type`) VALUES
(9, 'Trần Đức Khang', 'tdkhangg2004@gmail.com', '2024-08-02 04:27:00', '$2y$12$vxWAkza/sX7xWrxICYjZnO8bQO0tIwKqz7HW167e3AtsqEY3Fnp/6', NULL, '2024-08-02 04:26:45', '2024-08-02 04:27:00', 'admin'),
(10, 'Đức Khang', 'khangisthebest2004@gmail.com', '2024-08-02 04:39:00', '$2y$12$Daz/NQvWWSXrGFqXNC8kBeulaeFNgg9Yg4jlT3G0fwxEzrm21ue2e', NULL, '2024-08-02 04:37:37', '2024-08-02 04:39:00', 'member');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `banners_name_unique` (`name`);

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Chỉ mục cho bảng `category_products`
--
ALTER TABLE `category_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_product_unique` (`category_id`,`product_id`),
  ADD KEY `category_products_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_name_unique` (`name`),
  ADD UNIQUE KEY `coupons_sku_unique` (`sku`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_sku_unique` (`sku`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`);

--
-- Chỉ mục cho bảng `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_galleries_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_variant_unique` (`product_id`,`product_size_id`,`product_color_id`),
  ADD KEY `product_variants_product_size_id_foreign` (`product_size_id`),
  ADD KEY `product_variants_product_color_id_foreign` (`product_color_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `category_products`
--
ALTER TABLE `category_products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `product_galleries`
--
ALTER TABLE `product_galleries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `category_products`
--
ALTER TABLE `category_products`
  ADD CONSTRAINT `category_products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `category_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `product_galleries`
--
ALTER TABLE `product_galleries`
  ADD CONSTRAINT `product_galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `product_variants`
--
ALTER TABLE `product_variants`
  ADD CONSTRAINT `product_variants_product_color_id_foreign` FOREIGN KEY (`product_color_id`) REFERENCES `product_colors` (`id`),
  ADD CONSTRAINT `product_variants_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  ADD CONSTRAINT `product_variants_product_size_id_foreign` FOREIGN KEY (`product_size_id`) REFERENCES `product_sizes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
