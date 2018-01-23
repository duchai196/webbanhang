-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 23, 2018 lúc 08:43 AM
-- Phiên bản máy phục vụ: 10.1.26-MariaDB
-- Phiên bản PHP: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `giaodienadmin`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Nike', '/photos/1/brand/adidas-logo-9AA835C1C2-seeklogo.com.png', '2018-01-19 03:31:39', '2018-01-19 03:31:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `category_type`, `created_at`, `updated_at`) VALUES
(10, NULL, 'Khuyến mại', 'khuyen-mai', 'post', '2018-01-17 07:49:26', '2018-01-17 07:49:26'),
(11, NULL, 'Cầu lông', 'cau-long', 'product', '2018-01-17 07:49:40', '2018-01-17 07:49:40'),
(12, NULL, 'Bóng đá', 'bong-da', 'product', '2018-01-19 04:04:57', '2018-01-19 04:04:57'),
(13, 11, 'Vợt cầu lông', 'vot-cau-long', 'product', '2018-01-19 04:05:11', '2018-01-19 04:05:11'),
(14, 11, 'Áo cầu lông', 'ao-cau-long', 'product', '2018-01-19 04:05:30', '2018-01-19 04:05:30'),
(15, 13, 'Vợt yonex', 'vot-yonex', 'product', '2018-01-19 04:05:54', '2018-01-19 04:05:54'),
(16, 12, 'Quần áo bóng đá', 'quan-ao-bong-da', 'product', '2018-01-22 04:10:44', '2018-01-22 04:10:44'),
(17, 12, 'Giày đá bóng', 'giay-da-bong', 'product', '2018-01-22 04:10:57', '2018-01-22 04:10:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `img_products`
--

CREATE TABLE `img_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `img_products`
--

INSERT INTO `img_products` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(1, '11', '/photos/1/product/2-3-233x275.jpg', '2018-01-20 11:36:30', '2018-01-20 11:36:30'),
(2, '11', '/photos/1/product/2-3-2.jpg', '2018-01-20 11:36:30', '2018-01-20 11:36:30'),
(3, '11', '/photos/1/product/2-3-233x275.jpg', '2018-01-20 11:36:30', '2018-01-20 11:36:30'),
(4, '11', '/photos/1/product/2-3-233x275.jpg', '2018-01-20 11:36:30', '2018-01-20 11:36:30'),
(5, '16', '/photos/1/product/ao-bong-da-real-madrid-2014-15.gif', '2018-01-22 04:15:26', '2018-01-22 04:15:26'),
(6, '16', '/photos/1/product/chelsea_15_16_authentic_home_jersey_2.jpeg', '2018-01-22 04:15:26', '2018-01-22 04:15:26'),
(7, '16', '/photos/1/product/product_1339857486.jpg', '2018-01-22 04:15:26', '2018-01-22 04:15:26'),
(8, '16', '/photos/1/product/ao-bong-da-real-madrid-2014-15.gif', '2018-01-22 04:17:33', '2018-01-22 04:17:33'),
(9, '16', '/photos/1/product/chelsea_15_16_authentic_home_jersey_2.jpeg', '2018-01-22 04:17:33', '2018-01-22 04:17:33'),
(10, '16', '/photos/1/product/product_1339857486.jpg', '2018-01-22 04:17:33', '2018-01-22 04:17:33'),
(11, '16', '/photos/1/product/ao-bong-da-real-madrid-2014-15.gif', '2018-01-22 04:22:12', '2018-01-22 04:22:12'),
(12, '16', '/photos/1/product/chelsea_15_16_authentic_home_jersey_2.jpeg', '2018-01-22 04:22:12', '2018-01-22 04:22:12'),
(13, '16', '/photos/1/product/product_1339857486.jpg', '2018-01-22 04:22:12', '2018-01-22 04:22:12'),
(14, '16', '/photos/1/product/ao-bong-da-real-madrid-2014-15.gif', '2018-01-22 04:22:12', '2018-01-22 04:22:12'),
(15, '16', '/photos/1/product/chelsea_15_16_authentic_home_jersey_2.jpeg', '2018-01-22 04:22:12', '2018-01-22 04:22:12'),
(16, '16', '/photos/1/product/product_1339857486.jpg', '2018-01-22 04:22:12', '2018-01-22 04:22:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_01_17_041146_create_categories_table', 1),
(4, '2018_01_17_041213_create_posts_table', 1),
(5, '2018_01_17_041245_create_slides_table', 1),
(6, '2018_01_17_043306_create_settings_table', 1),
(7, '2018_01_17_053502_create_products_table', 1),
(9, '2014_10_12_000000_create_users_table', 3),
(10, '2018_01_17_062735_create_brands_table', 4),
(12, '2018_01_20_164844_create_img_products_table', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `author_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `featured` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `category_id`, `title`, `excerpt`, `body`, `image`, `slug`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(2, 1, 10, 'Bệnh ngộ độc do mặn, hoá chất, nhấm mốc aflatoxin', 'Bệnh ngộ độc do mặn, hoá chất, nhấm mốc aflatoxinxxxxxx', '<pre>@if(count($errors)&gt;0)<br />    @foreach($errors-&gt;all() as $err)</pre>\r\n<div class=\"alert alert-danger\">{{$err}}</div>\r\n<pre><br />    @endforeach<br />@endif</pre>', NULL, 'benh-ngo-doc-do-man-hoa-chat-nham-moc-aflatoxin', '<pre>@if(count($errors)&gt;0)<br />    @foreach($errors-&gt;all() as $err)</pre>\r\n<div class=\"alert alert-danger\">{{$err}}</div>\r\n<pre><br />    @endforeach<br />@endif</pre>', '<pre>@if(count($errors)&gt;0)<br />    @foreach($errors-&gt;all() as $err)</pre>\r\n<div class=\"alert alert-danger\">{{$err}}</div>\r\n<pre><br />    @endforeach<br />@endif</pre>', 1, 1, '2018-01-17 09:23:43', '2018-01-17 23:37:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `sale_price` int(11) DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) DEFAULT '1',
  `featured` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `name`, `price`, `sale_price`, `short_description`, `description`, `image`, `slug`, `seo_title`, `meta_description`, `meta_keywords`, `status`, `featured`, `created_at`, `updated_at`) VALUES
(1, 11, 1, 'Vợt cầu lông yonex', 150000, NULL, '<p>M&ocirc; tả ngắn</p>', NULL, '/photos/1/product/home_img1.jpg', 'vot-cau-long-yonex', NULL, NULL, NULL, 1, NULL, '2018-01-17 21:14:56', '2018-01-19 04:04:16'),
(2, 17, 1, 'Pastel Bodycon Bags', 150000, NULL, '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.</p>', '<p>Lorem ipsum dolor sit amet, an munere tibique consequat mel, congue albucius no qui, at everti meliore erroribus sea. Vero graeco cotidieque ea duo, in eirmod insolens interpretaris nam. Pro at nostrud percipit definitiones, eu tale porro cum. Sea ne accusata voluptatibus. Ne cum falli dolor voluptua, duo ei sonet choro facilisis, labores officiis torquatos cum ei.</p>\r\n<p>Cum altera mandamus in, mea verear disputationi et. Vel regione discere ut, legere expetenda ut eos. In nam nibh invenire similique. Atqui mollis ea his, ius graecis accommodare te. No eam tota nostrum cotidieque. Est cu nibh clita. Sed an nominavi maiestatis, et duo corrumpit constituto, duo id rebum lucilius. Te eam iisque deseruisse, ipsum euismod his at. Eu putent habemus voluptua sit, sit cu rationibus scripserit, modus voluptaria ex per. Aeque dicam consulatu eu his, probatus neglegentur disputationi sit et. Ei nec ludus epicuri petentium, vis appetere maluisset ad. Et hinc exerci utinam cum. Sonet saperet nominavi est at, vel eu sumo tritani. Cum ex minim legere.</p>\r\n<p>Eos cu utroque inermis invenire, eu pri alterum antiopam. Nisl erroribus definitiones nec an, ne mutat scripserit est. Eros veri ad pri. An soleat maluisset per. Has eu idque similique, et blandit scriptorem necessitatibus mea. Vis quaeque ocurreret ea.</p>', '/photos/1/product/1-3-233x275.jpg', 'pastel-bodycon-bags', NULL, NULL, NULL, 1, 1, '2018-01-19 03:57:54', '2018-01-22 04:18:37'),
(3, 11, 1, 'Beauty Shoes', 150000, NULL, NULL, NULL, '/photos/1/product/2-3-233x275.jpg', 'beauty-shoes', NULL, NULL, NULL, 1, 1, '2018-01-19 04:03:05', '2018-01-20 11:38:06'),
(4, 14, 1, 'Sporty Shirts', 150000, 20000, '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.</p>', '<p>Lorem ipsum dolor sit amet, an munere tibique consequat mel, congue albucius no qui, at everti meliore erroribus sea. Vero graeco cotidieque ea duo, in eirmod insolens interpretaris nam. Pro at nostrud percipit definitiones, eu tale porro cum. Sea ne accusata voluptatibus. Ne cum falli dolor voluptua, duo ei sonet choro facilisis, labores officiis torquatos cum ei.</p>\r\n<p>Cum altera mandamus in, mea verear disputationi et. Vel regione discere ut, legere expetenda ut eos. In nam nibh invenire similique. Atqui mollis ea his, ius graecis accommodare te. No eam tota nostrum cotidieque. Est cu nibh clita. Sed an nominavi maiestatis, et duo corrumpit constituto, duo id rebum lucilius. Te eam iisque deseruisse, ipsum euismod his at. Eu putent habemus voluptua sit, sit cu rationibus scripserit, modus voluptaria ex per. Aeque dicam consulatu eu his, probatus neglegentur disputationi sit et. Ei nec ludus epicuri petentium, vis appetere maluisset ad. Et hinc exerci utinam cum. Sonet saperet nominavi est at, vel eu sumo tritani. Cum ex minim legere.</p>\r\n<p>Eos cu utroque inermis invenire, eu pri alterum antiopam. Nisl erroribus definitiones nec an, ne mutat scripserit est. Eros veri ad pri. An soleat maluisset per. Has eu idque similique, et blandit scriptorem necessitatibus mea</p>', '/photos/1/product/29-233x275.png', 'sporty-shirts', NULL, NULL, NULL, 1, 1, '2018-01-19 04:12:10', '2018-01-19 04:12:10'),
(5, 13, 1, 'Yellow Shoe', 150000, NULL, '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.</p>', '<p>Lorem ipsum dolor sit amet, an munere tibique consequat mel, congue albucius no qui, at everti meliore erroribus sea. Vero graeco cotidieque ea duo, in eirmod insolens interpretaris nam. Pro at nostrud percipit definitiones, eu tale porro cum. Sea ne accusata voluptatibus. Ne cum falli dolor voluptua, duo ei sonet choro facilisis, labores officiis torquatos cum ei.</p>\r\n<p>Cum altera mandamus in, mea verear disputationi et. Vel regione discere ut, legere expetenda ut eos. In nam nibh invenire similique. Atqui mollis ea his, ius graecis accommodare te. No eam tota nostrum cotidieque. Est cu nibh clita. Sed an nominavi maiestatis, et duo corrumpit constituto, duo id rebum lucilius. Te eam iisque deseruisse, ipsum euismod his at. Eu putent habemus voluptua sit, sit cu rationibus scripserit, modus voluptaria ex per. Aeque dicam consulatu eu his, probatus neglegentur disputationi sit et. Ei nec ludus epicuri petentium, vis appetere maluisset ad. Et hinc exerci utinam cum. Sonet saperet nominavi est at, vel eu sumo tritani. Cum ex minim legere.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/photos/1/product/i-9-233x275.jpg\" alt=\"\" width=\"233\" height=\"275\" /></p>', '/photos/1/product/311-233x275.jpg', 'yellow-shoe', NULL, NULL, NULL, 1, 1, '2018-01-19 04:15:10', '2018-01-19 04:15:37'),
(6, 12, 1, 'Áo Tây Ban Nha', 150000, NULL, '<p>Donec rutrum congue leo eget malesuada. Donec sollicitudin molestie malesuada. Nulla quis lorem ut libero malesuada feugiat. Donec rutrum congue leo eget malesuada.&nbsp;</p>', '<p>Sed porttitor lectus nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Nulla porttitor accumsan tincidunt. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sollicitudin molestie malesuada. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus suscipit tortor eget felis porttitor volutpat. Cras ultricies ligula sed magna dictum porta.</p>', '/photos/1/product/ao-bong-da-tay-ban-nha-xanh.jpg', 'ao-tay-ban-nha', NULL, NULL, NULL, 0, 1, '2018-01-20 11:18:03', '2018-01-22 04:21:29'),
(7, 16, 1, 'Bộ quần áo Việt Nam', 150000, NULL, '<p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sollicitudin molestie malesuada.</p>', '<p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Cras ultricies ligula sed magna dictum porta. Pellentesque in ipsum id orci porta dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur aliquet quam id dui posuere blandit. Nulla porttitor accumsan tincidunt. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi.</p>', '/photos/1/product/ao-bong-da-viet-nam-vai-cao-cao-mau-xanh.png', 'bo-quan-ao-viet-nam', NULL, NULL, NULL, 0, 1, '2018-01-20 11:24:19', '2018-01-22 04:18:20'),
(8, 16, 1, 'Bộ quần áo real madrid', 150000, NULL, '<p>M&ocirc; tả ngắn</p>', '<p>Cras ultricies ligula sed magna dictum porta. Cras ultricies ligula sed magna dictum porta. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Donec sollicitudin molestie malesuada. Donec sollicitudin molestie malesuada. Curabitur aliquet quam id dui posuere blandit. Cras ultricies ligula sed magna dictum porta. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vivamus suscipit tortor eget felis porttitor volutpat.</p>', '/photos/1/product/ao-bong-da-real-madrid-2014-15.gif', 'bo-quan-ao-real-madrid', NULL, NULL, NULL, 0, 1, '2018-01-20 11:27:43', '2018-01-22 04:18:07'),
(9, 17, 1, 'Giày nike', 150000, NULL, '<p>1</p>', '<p>2</p>', '/photos/1/product/311-233x275.jpg', 'giay-nike', NULL, NULL, NULL, 0, 1, '2018-01-20 11:29:43', '2018-01-22 04:19:08'),
(11, 12, 1, 'Máy chạy bộ điện HQ', 150000, NULL, NULL, NULL, '/photos/1/product/1-3-233x275.jpg', 'may-chay-bo-dien-hq', NULL, NULL, NULL, 1, NULL, '2018-01-20 11:36:30', '2018-01-20 11:36:30'),
(14, 14, 1, 'Vợt cầu lông yonex astro 7', 150000, 20000, '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.</p>', '<p>Lorem ipsum dolor sit amet, an munere tibique consequat mel, congue albucius no qui, at everti meliore erroribus sea. Vero graeco cotidieque ea duo, in eirmod insolens interpretaris nam. Pro at nostrud percipit definitiones, eu tale porro cum. Sea ne accusata voluptatibus. Ne cum falli dolor voluptua, duo ei sonet choro facilisis, labores officiis torquatos cum ei.</p>\r\n<p>Cum altera mandamus in, mea verear disputationi et. Vel regione discere ut, legere expetenda ut eos. In nam nibh invenire similique. Atqui mollis ea his, ius graecis accommodare te. No eam tota nostrum cotidieque. Est cu nibh clita. Sed an nominavi maiestatis, et duo corrumpit constituto, duo id rebum lucilius. Te eam iisque deseruisse, ipsum euismod his at. Eu putent habemus voluptua sit, sit cu rationibus scripserit, modus voluptaria ex per. Aeque dicam consulatu eu his, probatus neglegentur disputationi sit et. Ei nec ludus epicuri petentium, vis appetere maluisset ad. Et hinc exerci utinam cum. Sonet saperet nominavi est at, vel eu sumo tritani. Cum ex minim legere.</p>\r\n<p>Eos cu utroque inermis invenire, eu pri alterum antiopam. Nisl erroribus definitiones nec an, ne mutat scripserit est. Eros veri ad pri. An soleat maluisset per. Has eu idque similique, et blandit scriptorem necessitatibus mea</p>', '/photos/1/product/29-233x275.png', 'yonex-astro-7', NULL, NULL, NULL, 1, 1, '2018-01-19 04:12:10', '2018-01-19 04:12:10'),
(15, 13, 1, 'Quần áo mới', 150000, NULL, '<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante.</p>', '<p>Lorem ipsum dolor sit amet, an munere tibique consequat mel, congue albucius no qui, at everti meliore erroribus sea. Vero graeco cotidieque ea duo, in eirmod insolens interpretaris nam. Pro at nostrud percipit definitiones, eu tale porro cum. Sea ne accusata voluptatibus. Ne cum falli dolor voluptua, duo ei sonet choro facilisis, labores officiis torquatos cum ei.</p>\r\n<p>Cum altera mandamus in, mea verear disputationi et. Vel regione discere ut, legere expetenda ut eos. In nam nibh invenire similique. Atqui mollis ea his, ius graecis accommodare te. No eam tota nostrum cotidieque. Est cu nibh clita. Sed an nominavi maiestatis, et duo corrumpit constituto, duo id rebum lucilius. Te eam iisque deseruisse, ipsum euismod his at. Eu putent habemus voluptua sit, sit cu rationibus scripserit, modus voluptaria ex per. Aeque dicam consulatu eu his, probatus neglegentur disputationi sit et. Ei nec ludus epicuri petentium, vis appetere maluisset ad. Et hinc exerci utinam cum. Sonet saperet nominavi est at, vel eu sumo tritani. Cum ex minim legere.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/photos/1/product/i-9-233x275.jpg\" alt=\"\" width=\"233\" height=\"275\" /></p>', '/photos/1/product/311-233x275.jpg', 'yonex-astro-78', NULL, NULL, NULL, 1, 1, '2018-01-19 04:15:10', '2018-01-19 04:15:37'),
(16, 16, 1, 'Áo chelsea', 200000, NULL, '<p>Donec sollicitudin molestie malesuada. Vivamus suscipit tortor eget felis porttitor volutpat. Praesent sapien massa, convallis a pellentesque nec, egestas non nis</p>', '<p style=\"text-align: left;\">Donec rutrum congue leo eget malesuada. Pellentesque in ipsum id orci porta dapibus. Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor eget felis porttitor volutpat. Donec sollicitudin molestie malesuada. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Nulla porttitor accumsan tincidunt. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim.</p>', '/photos/1/product/chelsea_15_16_authentic_home_jersey_2.jpeg', 'ao-chelsea', NULL, NULL, NULL, 1, 1, '2018-01-22 04:15:26', '2018-01-22 04:22:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions` text COLLATE utf8mb4_unicode_ci,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `order` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `title`, `sub_title`, `descriptions`, `link`, `title_link`, `image`, `type`, `status`, `order`, `created_at`, `updated_at`) VALUES
(8, 'SALE 20% OFF', 'Mừng Tết Nguyên Đán', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', '#', 'Mua sắm ngay', '/photos/1/banner/Simple.jpg', 1, 1, 2, '2018-01-18 13:52:50', '2018-01-21 11:19:32'),
(9, 'CHECK IN LIỀN TAY', 'NHẬN NGAY KHUYẾN MẠI', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', '#', 'Buy now', '/photos/1/banner/4150290-battlefield-4-premium.jpg', 1, 1, 1, '2018-01-18 13:53:57', '2018-01-21 11:18:00'),
(12, 'VIỆT NAM VÔ ĐỊCH', 'Giảm giá giày thể thao 50%', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>', '#', 'Buy now', '/photos/1/banner/barca-front-three_0.jpg', 1, 1, 3, '2018-01-18 13:53:57', '2018-01-21 11:11:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `avartar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `phone`, `avartar`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hai Duc Nguyen', '18 An Đào E- Trâu Quỳ- Gia Lâm- Hà Nội', '01685062308', '/photos/1/user/12009578_549339391885652_822152170988897199_n.jpg', 'duchai196@gmail.com', '$2y$10$W8LG71EpP0dxc2UeM7FbBe7wVBHGNxUlIgKOc.1b/4V0EZftNTgWK', 1, NULL, '2018-01-18 00:20:32', '2018-01-18 12:03:23');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Chỉ mục cho bảng `img_products`
--
ALTER TABLE `img_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT cho bảng `img_products`
--
ALTER TABLE `img_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
