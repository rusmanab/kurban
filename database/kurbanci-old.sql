-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 02:33 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kurbanci`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `general`
--

CREATE TABLE `general` (
  `id` int(11) NOT NULL,
  `perusahaan` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner_promo`
--

CREATE TABLE `tbl_banner_promo` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `banner` text DEFAULT NULL,
  `banner_mobile` text DEFAULT NULL,
  `thumbs` text DEFAULT NULL,
  `link_target` text DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `main_display` enum('0','1') DEFAULT '0',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_banner_promo`
--

INSERT INTO `tbl_banner_promo` (`id`, `title`, `desc`, `banner`, `banner_mobile`, `thumbs`, `link_target`, `status`, `main_display`, `created_at`) VALUES
(1, 'Banner 1', '', NULL, NULL, NULL, '', '1', '0', '2020-04-20 15:25:36'),
(2, 'banner 2', '', NULL, NULL, NULL, '', '1', '0', '2020-04-20 15:25:53'),
(3, 'Ramadhan Gede', '', 'assets\\images\\banner\\08b2dc8e951a2ea09528613e9ab40311.jpg', 'assets\\images\\banner\\24abeddf9aa25abad4c351bceb20f285.jpg', 'assets\\images\\banner\\thumbs\\thumb_08b2dc8e951a2ea09528613e9ab40311.jpg', '', '1', '0', '2020-04-28 14:26:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner_promo_category`
--

CREATE TABLE `tbl_banner_promo_category` (
  `id` int(11) NOT NULL,
  `banner_promo_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_banner_promo_category`
--

INSERT INTO `tbl_banner_promo_category` (`id`, `banner_promo_id`, `category_id`) VALUES
(1, 1, 31),
(2, 1, 32),
(3, 2, 33),
(4, 2, 34),
(5, 2, 35);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) DEFAULT NULL,
  `brand_desc` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `image_big` text DEFAULT NULL,
  `create_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`id`, `brand_name`, `brand_desc`, `slug`, `image`, `image_big`, `create_at`) VALUES
(1, 'T.CARE', NULL, NULL, 'assets\\images\\brand\\thumbs\\thumb_d675e8b278d37476f38cf60015f1f091.jpg', 'assets\\images\\brand\\thumbs\\thumb_d675e8b278d37476f38cf60015f1f091.jpg', '2020-06-16 19:36:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `diskon_price` decimal(10,2) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `option` varchar(255) DEFAULT NULL,
  `order_type` int(11) DEFAULT 2 COMMENT '1. produk jadi\r\n2. produk custom'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `user_id`, `product_id`, `product_name`, `qty`, `price`, `diskon_price`, `image`, `weight`, `option`, `order_type`) VALUES
(17, 66, 3, 'ACS - H1 LED', 1, '2500000.00', '0.00', NULL, 2000, NULL, 2),
(18, 69, 25, 'Kambing', 3, '2700000.00', '0.00', 'assetsimagesproduct	humbs	humb_65fd49675877388620f71c6b0f47b1ae.jpg', 50, NULL, 2),
(19, 70, 27, 'KURBANdiPelosok Kambing', 1, '2480000.00', '0.00', 'assets\\images\\product\\thumbs\\thumb_f02dc1c309833be35c3fbcfc322b3cce.jpg', 500, NULL, 2),
(20, 70, 29, 'KURBANdiPelosok Sapi 1-7', 0, '2480000.00', '0.00', 'assets\\images\\product\\thumbs\\thumb_1d7f0403562ae9cc71482608b1a9a643.jpg', 500, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `isparent` int(11) DEFAULT 0,
  `parent_position` int(11) DEFAULT NULL,
  `category_type` int(11) DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `category_desc` text DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `image_big` text DEFAULT NULL,
  `image_mobile` text DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `parent_id`, `isparent`, `parent_position`, `category_type`, `category_name`, `category_desc`, `slug`, `image`, `image_big`, `image_mobile`, `create_at`, `user_id`) VALUES
(1, NULL, 0, NULL, 1, 'KURBANdiPelosok', '<h1 class=\"mb-3\">#KURBANdiPelosok</h1>\r\n<em><blockquote>“Ada yang setiap saat bisa makan daging, ada yang Idul Adhanya selalu makan daging, ada pula yang seumur-umur belum pernah mencicipi daging.”</blockquote></em>\r\n<h2>Kenapa harus #KURBANdiPelosok?</h2>\r\n<h4>Kurban Prioritas, Nusa Tenggara Timur</h4>\r\n<ol>\r\n	<li>Di wilayah pelosok Nusa Tenggara Timur, Islam adalah agama minoritas (hanya 8.8% dari total penduduk menurut BPS 2021), menjadikan jarang/sedikit yang mengadakan Kurban di wilayah tersebut.</li>\r\n	<li>Banyak penduduk pelosok yang jarang bahkan tidak merasakan daging kurban karena keterbatasan dan sulitnya akses ke daerah tersebut.</li>\r\n	<li>Daging kurban-mu akan didistribusikan kepada yatim dan prasejahtera di pelosok wilayah Nusa Tenggara Timur.</li>\r\n	<li>Memberdayakan peternak lokal di wilayah Nusa Tenggara Timur.</li>\r\n</ol>	', 'kurbandipelosok-2', 'assets\\images\\category\\thumbs\\thumb_a2f20028fcecff74f70a1717cfe8a8cd.png', 'assets\\images\\category\\a2f20028fcecff74f70a1717cfe8a8cd.png', NULL, '2022-05-30 15:58:08', 28),
(2, NULL, 0, NULL, 1, 'KURBANdiRendang', '<h1 class=\"mb-3\">#KURBANdiRendang</h1>\r\n<em><blockquote>“Ada yang setiap saat bisa makan daging, ada yang Idul Adhanya selalu makan daging, ada pula yang seumur-umur belum pernah mencicipi daging.”</blockquote></em>\r\n<h2>Kenapa harus #KURBANdiRendang?</h2>\r\n<h4></h4>\r\n<ol>\r\n	<li>Daging kurban yang diolah menjadi Rendang dalam bentuk kaleng (200gr) tahan lama hingga 2 tahun.</li>\r\n	<li>Pemotongan kurbang dilakukan di Rumah Potong Hewan (RPH) yang sesuai prosedur syariah Islam.</li>\r\n	<li>Rendang kaleng kurban-mu akan didistribusikan kepada mustahik yatim dan prasejahtera binaan T.CARE      dan stok ketahanan pangan apabila ada bencana alam di Indonesia.</li>\r\n</ol>', 'kurbandirendang-2', 'assets\\images\\category\\thumbs\\thumb_a6aa8f6dfb32e5288b235022d2015f7b.png', 'assets\\images\\category\\a6aa8f6dfb32e5288b235022d2015f7b.png', NULL, '2022-05-30 15:58:30', 28),
(3, NULL, 0, NULL, 1, 'KURBANdiKota', '<h1 class=\"mb-3\">#KURBANdiKota</h1><em><blockquote>“Ada yang setiap saat bisa makan daging, ada yang Idul Adhanya selalu makan daging, ada pula yang seumur-umur belum pernah mencicipi daging.”</blockquote></em>\r\n<h2>Kenapa harus #KURBANdiKota?</h2>\r\n<h4></h4>\r\n<ol>\r\n	<li>Daging kurban dibungkus besek bambu yang\r\n	mendukung program Go Green.</li>\r\n	<li>Daging kurban didistribusikan untuk mustahik yatim dan\r\n	prasejahtera di wilayah DKI Jakarta dan sekitarnya.</li>\r\n	<li>Hak daging pengurban langsung diantar ke rumah saat\r\n	hari pemotongan.</li>\r\n</ol>\r\n\r\n<div>\r\n	<p>Ket : </p>\r\n	<p>Harga sudah termasuk hewan, pemotongan, RPH, dan tim penyembelihan bersertifikat halal.</p>\r\n</div>	', 'kurbandikota-2', 'assets\\images\\category\\thumbs\\thumb_a910227074a2b6e09b77d9d20d6e3713.png', 'assets\\images\\category\\a910227074a2b6e09b77d9d20d6e3713.png', NULL, '2022-05-30 15:58:43', 28);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments`
--

CREATE TABLE `tbl_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `url` text NOT NULL,
  `created_date` datetime NOT NULL,
  `isread` enum('0','1') NOT NULL DEFAULT '0',
  `isreply` enum('0','1') NOT NULL DEFAULT '0',
  `status` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0 new 1 accepted 2 block',
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_comments`
--

INSERT INTO `tbl_comments` (`id`, `user_id`, `post_id`, `parent_id`, `message`, `url`, `created_date`, `isread`, `isreply`, `status`, `reason`) VALUES
(1, 0, 24, 0, 'stok ada ga gan..?', '', '2020-04-15 10:20:01', '0', '0', '0', ''),
(2, 0, 24, 1, 'testst', '', '2020-04-15 10:20:18', '0', '0', '0', ''),
(3, 0, 24, 1, 'koment', '', '2020-04-15 10:22:04', '0', '0', '0', ''),
(4, 0, 24, 0, 'Mantab', '', '0000-00-00 00:00:00', '0', '0', '0', ''),
(5, 0, 24, 4, 'OK sih', '', '0000-00-00 00:00:00', '0', '0', '0', ''),
(6, 0, 0, 4, 'Terima Kasih', '', '0000-00-00 00:00:00', '0', '0', '0', ''),
(7, 0, 24, 0, 'test', '', '2020-06-16 16:53:00', '0', '0', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comments_order`
--

CREATE TABLE `tbl_comments_order` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `no_order` varchar(255) DEFAULT NULL,
  `image_att` text DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `isread` int(11) DEFAULT 0 COMMENT '0 Unread\r\n1 Read'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coupon`
--

CREATE TABLE `tbl_coupon` (
  `id` int(11) NOT NULL,
  `coupon_name` varchar(255) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `coupon_type` varchar(1) DEFAULT NULL,
  `shipping` int(11) DEFAULT NULL,
  `value` double DEFAULT NULL,
  `star_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `isactive` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `create_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_coupon`
--

INSERT INTO `tbl_coupon` (`id`, `coupon_name`, `code`, `coupon_type`, `shipping`, `value`, `star_date`, `end_date`, `isactive`, `image`, `create_at`, `user_id`) VALUES
(2, 'Voucher Kurban', 'KURBAN01', '2', 1, 400000, '2022-06-01', '2022-06-15', 1, NULL, '2022-06-06 01:07:35', 28),
(3, 'Voucher Kurban', 'KURBAN02', '2', 1, 600000, '2022-06-01', '2022-06-15', 1, NULL, '2022-06-06 01:07:27', 28);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coupon_history`
--

CREATE TABLE `tbl_coupon_history` (
  `coupon_history_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `no_order` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(15,4) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=FIXED;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guarantee`
--

CREATE TABLE `tbl_guarantee` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address1` varchar(255) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kode_pos` varchar(255) DEFAULT NULL,
  `notelp` varchar(255) DEFAULT NULL,
  `tipe_unit` varchar(255) DEFAULT NULL,
  `date_buying` date DEFAULT NULL,
  `serial_number` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `outlet` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_guarantee`
--

INSERT INTO `tbl_guarantee` (`id`, `name`, `email`, `address1`, `address2`, `provinsi`, `kode_pos`, `notelp`, `tipe_unit`, `date_buying`, `serial_number`, `model`, `outlet`, `created_date`) VALUES
(1, 'Rusmana Basyar', 'rusmanab@gmail.com', 'kp. kabasiran 002/002', 'kp. kabasiran 002/002', 'Jawa Barat', '16360', '087851979669', 'PCL001', '0000-00-00', 123123, '123123', '123123', '2020-04-20 06:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konfrmasi_pembayaran`
--

CREATE TABLE `tbl_konfrmasi_pembayaran` (
  `id` int(11) NOT NULL,
  `no_order` varchar(225) DEFAULT NULL,
  `nama_pengirim` varchar(255) DEFAULT NULL,
  `nominal` double DEFAULT NULL,
  `bank_pengirim` varchar(255) DEFAULT NULL,
  `status_id` int(11) NOT NULL DEFAULT 2,
  `verify_note` text NOT NULL,
  `verify_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `verify_by` int(11) NOT NULL,
  `created_date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `bukti_bayar` text NOT NULL,
  `bukti_thumbs` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_konfrmasi_pembayaran`
--

INSERT INTO `tbl_konfrmasi_pembayaran` (`id`, `no_order`, `nama_pengirim`, `nominal`, `bank_pengirim`, `status_id`, `verify_note`, `verify_date`, `verify_by`, `created_date`, `bukti_bayar`, `bukti_thumbs`) VALUES
(5, '65202004161537', 'Rusmana', 8647000, 'BCA', 3, '', '2020-04-16 22:50:02', 28, '2020-04-16 22:50:02', 'assets\\images\\bukti_transfer\\bff590c87955b095a7c882c666f0dcb6.PNG', 'assets\\images\\bukti_transfer\\thumbs\\thumb_bff590c87955b095a7c882c666f0dcb6.PNG'),
(6, '65202004161537', 'Rusmana', 8647000, 'BCA', 2, '', NULL, 0, '2020-04-16 17:49:21', 'assets\\images\\bukti_transfer\\da062b1658190ded6c87bc312c233dcf.PNG', 'assets\\images\\bukti_transfer\\thumbs\\thumb_da062b1658190ded6c87bc312c233dcf.PNG'),
(7, '66202004221438Status ', 'Rusmana', 3021000, 'BCA', 2, '', NULL, 0, '2020-04-22 09:44:08', 'assets/images/bukti_transfer/c8e29bca3da91018b886b0117e0be137.PNG', 'assets/images/bukti_transfer/thumbs/thumb_c8e29bca3da91018b886b0117e0be137.PNG'),
(8, '66202009241516', 'rusmana', 2736000, 'TEMPO', 3, 'test', '2020-09-25 11:23:59', 28, '2020-09-25 11:23:59', 'assets\\images\\bukti_transfer\\c1e78a759962d94cb009341fb53a6547.jpg', 'assets\\images\\bukti_transfer\\thumbs\\thumb_c1e78a759962d94cb009341fb53a6547.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kota_`
--

CREATE TABLE `tbl_kota_` (
  `id` int(11) NOT NULL,
  `provinsi_id` int(11) DEFAULT NULL,
  `nama_kota` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_kota_`
--

INSERT INTO `tbl_kota_` (`id`, `provinsi_id`, `nama_kota`, `created_date`) VALUES
(1, 2, 'Kab. Bekasi', '2017-04-12 16:06:45'),
(3, 2, 'Kota Depok', '2017-04-12 16:04:12'),
(4, 1, 'Jakarta Barat', '2017-03-30 04:39:40'),
(5, 1, 'Jakarta Utara', '2017-03-30 04:40:01'),
(6, 1, 'Jakarta Timur', '2017-03-30 04:40:02'),
(7, 1, 'Jakarta Selatan', '2017-03-30 04:40:02'),
(8, 1, 'Jakarta Pusat', '2017-04-12 16:03:36'),
(10, 3, 'Kab. Tangerang', '2017-04-17 11:28:29'),
(11, 3, 'Kota Tangerang', '2017-04-17 11:28:29'),
(12, 3, 'Kota Tangerang Selatan', '2017-04-17 11:28:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kurir`
--

CREATE TABLE `tbl_kurir` (
  `id` int(11) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_kurir`
--

INSERT INTO `tbl_kurir` (`id`, `value`, `label`) VALUES
(1, 'jne', 'JNE'),
(2, 'pos', 'POS Indonesia'),
(3, 'tiki', 'TIKI');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lates_login`
--

CREATE TABLE `tbl_lates_login` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `login_date` datetime DEFAULT NULL,
  `logout_date` datetime DEFAULT NULL,
  `ip` varchar(30) DEFAULT NULL,
  `session_id` varchar(32) DEFAULT NULL,
  `token` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_level`
--

CREATE TABLE `tbl_level` (
  `id` int(11) NOT NULL,
  `level_name` varchar(30) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_level`
--

INSERT INTO `tbl_level` (`id`, `level_name`, `create_at`, `created_by`) VALUES
(0, 'User level1', '2020-06-16 20:05:44', NULL),
(1, 'Administrator', NULL, NULL),
(2, 'User', NULL, NULL),
(3, 'Outlet', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_list_payment`
--

CREATE TABLE `tbl_list_payment` (
  `id` int(11) NOT NULL,
  `methode_bayar_id` int(11) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `kcp` varchar(100) DEFAULT NULL,
  `norek` varchar(20) DEFAULT NULL,
  `nama_rekening` varchar(100) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `create_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `desc` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_list_payment`
--

INSERT INTO `tbl_list_payment` (`id`, `methode_bayar_id`, `bank_name`, `kcp`, `norek`, `nama_rekening`, `image`, `create_at`, `desc`) VALUES
(1, 2, 'BCA', 'Jakarta', NULL, 'PT.Execelent', 'assets/images/bank/bca.jpg', '2020-04-16 21:25:50', NULL),
(2, 2, 'BNI', 'Jakarta', NULL, 'PT.Execelent', 'assets/images/bank/bni.jpg', '2020-04-16 21:25:50', NULL),
(3, 2, 'MANDIRI', 'Jakarta', NULL, 'PT.Execelent', 'assets/images/bank/mandiri.jpg', '2020-04-16 21:25:51', NULL),
(4, 4, 'TEMPO', NULL, NULL, NULL, 'assets/images/bank/rsz_hutang.jpg', '2020-09-24 15:19:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `order` int(11) DEFAULT NULL,
  `type` enum('1','2') DEFAULT NULL COMMENT '1. header\r\n2. footer',
  `menu_id` int(11) DEFAULT NULL,
  `slug` text DEFAULT NULL,
  `menu_label` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `order`, `type`, `menu_id`, `slug`, `menu_label`, `created_at`, `user_id`) VALUES
(11, 2, '1', 1, 'about-us', 'About Us', '2019-08-20 09:06:54', NULL),
(12, 1, '1', 2, 'home', 'Home', '2019-08-20 10:13:04', NULL),
(21, 3, '1', 0, 'product/category', 'Categories', '2020-04-08 12:58:01', NULL),
(22, 7, '1', 0, 'contact', 'Contact Us', '2020-04-08 13:00:06', NULL),
(23, 6, '1', 0, 'guarantee', 'Guarantee', '2020-04-19 23:19:58', NULL),
(24, 4, '1', 0, 'news', 'News & Artikle', '2020-05-19 11:04:13', NULL),
(25, 5, '1', 0, 'video', 'Video', '2020-05-19 11:05:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meta_website`
--

CREATE TABLE `tbl_meta_website` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `meta_deskripsi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_methode_bayar`
--

CREATE TABLE `tbl_methode_bayar` (
  `id` int(11) NOT NULL,
  `nama_pembayaran` varchar(255) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `tipe` int(11) DEFAULT NULL,
  `api` int(11) NOT NULL DEFAULT 0,
  `isactive` enum('0','1') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_methode_bayar`
--

INSERT INTO `tbl_methode_bayar` (`id`, `nama_pembayaran`, `deskripsi`, `image`, `tipe`, `api`, `isactive`) VALUES
(1, 'Cash On Delivery ( COD )', 'Mohon menunggu kurir dan tukang ukur kami maksimal 2 hari kerja di tempat sesuai alamat  yang kamu pilih. Dan mohon menggunakan uang pas. Selain menggunakan uang cash, kamu bisa menggunakan kartu debt dan kartu kredit (Visa dan Mastercard) dengan menggunakan mesin edisi dari Bank Mandiri. Cash on delivery hanya bisa di proses untuk pembelian jahit online saja. Kamu bisa berikan uangnya ke kurir saat kurir datang bersama dengan tukang ukur kami.', NULL, 1, 0, '0'),
(2, 'Bank Transfer ', 'Kamu dapat melakukan pembayaran melalui bank transfer ke rekening Modelines.id dalam waktu 2x24 jam setelah pembelian. Jika kamu tidak melakukan pembayaran dalam 2x24 jam, pembelian akan dibatalkan. Lakukan pembayaran denganTransfer ke Rekening Modelines.id, berikut daftar nomor Rekening yang tersedia :  <br> Nama Bank : Bank Mandiri <br> Nomor Rekening : 1290011072325 <br> Nama Pemilik Rekening : PT RUMAH JAHIT KHANSA', NULL, 1, 0, '1'),
(3, 'Kartu Kredit', '', NULL, 1, 1, '0'),
(4, 'Tempo', '', NULL, NULL, 0, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_oauth`
--

CREATE TABLE `tbl_oauth` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `ismobile` enum('1','2') DEFAULT '1' COMMENT '1 Browser',
  `ip` varchar(30) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `fcm_key` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_oauth`
--

INSERT INTO `tbl_oauth` (`id`, `user_id`, `token`, `ismobile`, `ip`, `created_date`, `update_date`, `fcm_key`) VALUES
(2, 65, '135a86505379e0a6d75cb4a592a1829b', '1', '::1', '2020-02-25 04:13:46', NULL, NULL),
(3, 68, 'df61cc8ac4e3c1bac81d9181413d1c7f', '1', '180.251.209.13', '2020-04-21 09:57:29', NULL, NULL),
(13, 69, '5153a54f0f2c5533fd81452dd62c3f0c', '1', '110.137.156.21', '2020-04-23 09:25:56', NULL, NULL),
(15, 66, '7c32158b9568410d638b13a3edb1f08e', '1', '180.214.232.1', '2020-04-24 06:29:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_option`
--

CREATE TABLE `tbl_option` (
  `option_id` int(11) NOT NULL,
  `type` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_option`
--

INSERT INTO `tbl_option` (`option_id`, `type`) VALUES
(1, 'select'),
(2, 'select');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_option_choose`
--

CREATE TABLE `tbl_option_choose` (
  `id` int(11) NOT NULL,
  `option_type` varchar(255) DEFAULT NULL,
  `option_label` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_option_choose`
--

INSERT INTO `tbl_option_choose` (`id`, `option_type`, `option_label`) VALUES
(1, 'select', 'Select'),
(2, 'option', 'Option');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_option_description`
--

CREATE TABLE `tbl_option_description` (
  `option_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `option_name` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_option_description`
--

INSERT INTO `tbl_option_description` (`option_id`, `language_id`, `option_name`) VALUES
(1, 1, 'Ukuran'),
(2, 1, 'Warna');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_option_value`
--

CREATE TABLE `tbl_option_value` (
  `option_value_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_option_value`
--

INSERT INTO `tbl_option_value` (`option_value_id`, `option_id`, `image`, `sort_order`) VALUES
(1, 1, '', 1),
(2, 1, '', 2),
(3, 1, '', 3),
(4, 2, '', 0),
(5, 2, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_option_value_description`
--

CREATE TABLE `tbl_option_value_description` (
  `option_value_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_option_value_description`
--

INSERT INTO `tbl_option_value_description` (`option_value_id`, `language_id`, `option_id`, `name`) VALUES
(1, 1, 1, 'XL'),
(2, 1, 1, 'L'),
(3, 1, 1, 'M'),
(4, 1, 2, 'Merah'),
(5, 1, 2, 'Biru');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `id` int(11) NOT NULL,
  `no_order` varchar(255) NOT NULL,
  `order_name` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `total_diskon` decimal(10,0) DEFAULT 0,
  `ipnumber` varchar(20) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `status_id` int(11) DEFAULT 1,
  `catatan` text DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `methode_bayar_id` int(11) NOT NULL,
  `list_payment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`id`, `no_order`, `order_name`, `user_id`, `total_price`, `total_diskon`, `ipnumber`, `order_date`, `status_id`, `catatan`, `address_id`, `methode_bayar_id`, `list_payment_id`) VALUES
(1, '66202009241388', '', 66, '3014000.00', '300000', '', '2020-09-24 09:29:44', 1, NULL, 4, 2, 4),
(2, '66202009241516', '', 66, '3036000.00', '300000', '', '2020-09-24 09:33:09', 2, NULL, 4, 4, 4),
(3, '66202009255033', '', 66, '3014000.00', '300000', '', '2020-09-25 09:49:16', 1, NULL, 4, 0, NULL),
(4, '66202009251977', '', 66, '12672000.00', '0', '', '2020-09-25 09:56:41', 1, NULL, 4, 2, 3),
(5, '66202009281384', '', 66, '3014000.00', '300000', '', '2020-09-28 11:26:28', 1, NULL, 4, 2, 2),
(6, '66202009281819', '', 66, '3018000.00', '300000', '', '2020-09-28 12:06:56', 1, NULL, 4, 0, NULL),
(7, '66202009296491', '', 66, '2417000.00', '0', '', '2020-09-29 10:04:00', 1, NULL, 7, 2, 3),
(8, '66202011025599', '', 66, '3000000.00', '300000', '', '2020-11-02 02:34:28', 1, NULL, 7, 0, NULL),
(9, '66202011021658', '', 66, '3034000.00', '300000', '', '2020-11-02 02:44:50', 1, NULL, 7, 4, 4),
(10, '66202011024272', '', 66, '3034000.00', '300000', '', '2020-11-02 12:05:49', 1, NULL, 7, 0, NULL),
(11, '66202011041059', '', 66, '3034000.00', '300000', '', '2020-11-04 05:37:00', 11, NULL, 7, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `pruduct_name` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `diskon_price` decimal(10,2) DEFAULT NULL,
  `weight` int(11) DEFAULT 0,
  `total_price` decimal(10,2) DEFAULT NULL,
  `options` text NOT NULL,
  `order_type` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`id`, `order_id`, `product_id`, `image`, `pruduct_name`, `qty`, `price`, `diskon_price`, `weight`, `total_price`, `options`, `order_type`) VALUES
(1, 1, 1, 'assets\\images\\product\\thumbs\\thumb_2f3b4163800494c46760a7aceaf66473.jpg', 'JCS-B LED DOUBLE DISPLAY', 1, '3000000.00', '300000.00', 2000, '2700000.00', '', 1),
(2, 2, 1, 'assets\\images\\product\\thumbs\\thumb_2f3b4163800494c46760a7aceaf66473.jpg', 'JCS-B LED DOUBLE DISPLAY', 1, '3000000.00', '300000.00', 2000, '2700000.00', '', 1),
(3, 3, 1, 'assets\\images\\product\\thumbs\\thumb_2f3b4163800494c46760a7aceaf66473.jpg', 'JCS-B LED DOUBLE DISPLAY', 1, '3000000.00', '300000.00', 2000, '2700000.00', '', 1),
(4, 4, 5, 'assets/images/product/thumbs/thumb_6f1cee7b87dce1096423e7e6f1592d71.jpg', 'SUPER SS', 2, '6300000.00', '0.00', 4000, '12600000.00', '', 1),
(5, 5, 1, 'assets\\images\\product\\thumbs\\thumb_2f3b4163800494c46760a7aceaf66473.jpg', 'JCS-B LED DOUBLE DISPLAY', 1, '3000000.00', '300000.00', 2000, '2700000.00', '', 1),
(6, 6, 1, 'assets\\images\\product\\thumbs\\thumb_2f3b4163800494c46760a7aceaf66473.jpg', 'JCS-B LED DOUBLE DISPLAY', 1, '3000000.00', '300000.00', 2000, '2700000.00', '', 1),
(7, 7, 6, 'assets/images/product/thumbs/thumb_84893c1c4ae26098db4b2c1e42ac5dfb.jpg', 'ACS-A', 1, '2400000.00', '0.00', 1000, '2400000.00', '', 1),
(8, 8, 1, 'assets\\images\\product\\thumbs\\thumb_2f3b4163800494c46760a7aceaf66473.jpg', 'JCS-B LED DOUBLE DISPLAY', 1, '3000000.00', '300000.00', 2000, '2700000.00', '', 1),
(9, 9, 1, 'assets\\images\\product\\thumbs\\thumb_2f3b4163800494c46760a7aceaf66473.jpg', 'JCS-B LED DOUBLE DISPLAY', 1, '3000000.00', '300000.00', 2000, '2700000.00', '', 1),
(10, 10, 1, 'assets\\images\\product\\thumbs\\thumb_2f3b4163800494c46760a7aceaf66473.jpg', 'JCS-B LED DOUBLE DISPLAY', 1, '3000000.00', '300000.00', 2000, '2700000.00', '', 1),
(11, 11, 1, 'assets\\images\\product\\thumbs\\thumb_2f3b4163800494c46760a7aceaf66473.jpg', 'JCS-B LED DOUBLE DISPLAY', 1, '3000000.00', '300000.00', 2000, '2700000.00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detail2`
--

CREATE TABLE `tbl_order_detail2` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `alias_name` varchar(255) DEFAULT 'Ongkir',
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_order_detail2`
--

INSERT INTO `tbl_order_detail2` (`id`, `order_id`, `keterangan`, `alias_name`, `price`) VALUES
(1, 1, 'pos Paket Kilat Khusus / 2 Kg', 'Ongkir', '14000.00'),
(2, 2, 'pos Express Next Day Barang / 2 Kg', 'Ongkir', '36000.00'),
(3, 3, 'pos Paket Kilat Khusus / 2 Kg', 'Ongkir', '14000.00'),
(4, 4, 'tiki ONS / 4 Kg', 'Ongkir', '72000.00'),
(5, 5, 'pos Paket Kilat Khusus / 2 Kg', 'Ongkir', '14000.00'),
(6, 6, 'tiki REG / 2 Kg', 'Ongkir', '18000.00'),
(7, 7, 'pos Q9 Barang / 1 Kg', 'Ongkir', '17000.00'),
(8, 8, 'tiki  / 2 Kg', 'Ongkir', NULL),
(9, 9, 'pos Q9 Barang / 2 Kg', 'Ongkir', '34000.00'),
(10, 10, 'pos Q9 Barang / 2 Kg', 'Ongkir', '34000.00'),
(11, 11, 'pos Q9 Barang / 2 Kg', 'Ongkir', '34000.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_history`
--

CREATE TABLE `tbl_order_history` (
  `id` int(11) NOT NULL,
  `no_order` varchar(30) DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `customer_notif` int(11) DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_order_history`
--

INSERT INTO `tbl_order_history` (`id`, `no_order`, `order_id`, `comment`, `status_id`, `customer_notif`, `created_date`, `created_by`) VALUES
(1, NULL, 1, 'Menunggu Pembayaran #66202009241388', 1, 0, '2020-09-24 02:29:48', NULL),
(2, NULL, 2, 'Menunggu Pembayaran #66202009241516', 1, 0, '2020-09-24 03:34:56', NULL),
(3, NULL, 2, '', 3, NULL, '2020-09-25 04:15:34', 28),
(4, NULL, 2, '', 4, NULL, '2020-09-25 04:17:24', 28),
(5, '66202009241516', NULL, 'pembayaran sudah di verifikasi', 3, 1, '2020-09-25 04:23:59', 0),
(6, NULL, 4, 'Menunggu Pembayaran #66202009251977', 1, 0, '2020-09-25 03:54:30', NULL),
(7, NULL, 5, 'Menunggu Pembayaran #66202009281384', 1, 0, '2020-09-28 04:26:30', NULL),
(8, NULL, 7, 'Menunggu Pembayaran #66202009296491', 1, 0, '2020-09-29 03:04:06', NULL),
(9, NULL, 9, 'Menunggu Pembayaran #66202011021658', 1, 0, '2020-11-01 19:44:56', NULL),
(10, NULL, 11, 'Menunggu Verifikasi Pembayaran Tempo no order #66202011041059', 11, 0, '2020-11-03 22:37:04', NULL);

--
-- Triggers `tbl_order_history`
--
DELIMITER $$
CREATE TRIGGER `updateOrderStatus` AFTER INSERT ON `tbl_order_history` FOR EACH ROW UPDATE tbl_orders o SET o.status_id = NEW.status_id WHERE o.id = NEW.order_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_option`
--

CREATE TABLE `tbl_order_option` (
  `id` int(11) NOT NULL,
  `order_detail_id` int(11) NOT NULL,
  `product_option_id` int(11) NOT NULL,
  `product_option_value_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  `type` varchar(32) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_payment_tempo`
--

CREATE TABLE `tbl_order_payment_tempo` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `jumlah_tempo` int(11) DEFAULT NULL,
  `tanggal_jatuh_tempo` date DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `status_bayar` enum('1','2') DEFAULT '1' COMMENT '1. belum lunas\r\n2. sudah lunas',
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_order_payment_tempo`
--

INSERT INTO `tbl_order_payment_tempo` (`id`, `order_id`, `jumlah_tempo`, `tanggal_jatuh_tempo`, `notes`, `status_bayar`, `created_date`, `created_by`) VALUES
(1, 9, 30, NULL, 'testing bos', '1', '2020-11-02 17:55:40', 28),
(2, 11, 90, NULL, 'ok', '1', '2020-11-04 11:37:45', 103),
(3, 11, 90, NULL, 'ok', '1', '2020-11-04 11:38:39', 103);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_our_clients`
--

CREATE TABLE `tbl_our_clients` (
  `id` int(11) NOT NULL,
  `client_name` varchar(50) DEFAULT NULL,
  `client_description` text DEFAULT NULL,
  `client_image` text DEFAULT NULL,
  `client_url` varchar(255) DEFAULT NULL,
  `contact_name` varchar(255) DEFAULT NULL,
  `personal_image` text DEFAULT NULL,
  `foreword` text DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `update_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_our_clients`
--

INSERT INTO `tbl_our_clients` (`id`, `client_name`, `client_description`, `client_image`, `client_url`, `contact_name`, `personal_image`, `foreword`, `position`, `created_at`, `update_at`, `status`) VALUES
(1, 'PT. ABCD', '<p>https://www.google.co.id/?gws_rd=ssl</p>', 'assets/images/ourclients/926b77ed375548c302ff9c50321c89f8.png', 'https://www.google.co.id/?gws_rd=ssl', 'John Doe', 'assets/images/ourclients/thumbs/thumb_11bda99f74b472edc34dd474ee33ce2c.png', '<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</p>', 'Ceo PT. ABCD', '2017-03-09 01:28:11', '2017-03-08 18:28:11', 1),
(2, 'PT. Hayam Wuruk', '<p>https://www.google.co.id/?gws_rd=ssl</p>', 'assets/images/ourclients/cc6082f660e13a5daf5652d02f8e9e53.png', 'https://www.google.co.id/?gws_rd=ssl', 'Bambang Prokoso', 'assets/images/ourclients/thumbs/thumb_7cba0970b35422725626d16fb30c3e68.png', '<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</p>', 'Manager ', '2017-03-09 01:21:44', '2017-03-08 18:21:44', 1),
(3, 'PT. Gogogo', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit</p>', 'assets/images/ourclients/db3206862f75d4f6aafa80b35b209f07.png', '', 'Loremp Ipsum', 'assets/images/ourclients/thumbs/thumb_49a9261e90cf021c0a5b1c15d8d5979d.jpg', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat</p>', 'Supervisor', '2017-03-09 01:20:25', '2017-03-08 18:20:25', 1),
(4, 'Haribima', '', 'assets/images/ourclients/258d9fbbb3a27af0d9a3f87b4b82af2b.png', '', 'Loremp Ipsum', 'assets/images/ourclients/thumbs/thumb_7c146dc6265364d2f637bd1bcec5f01d.jpg', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam</p>', 'Supervisor', '2017-03-09 01:20:01', '2017-03-08 18:20:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_description` text DEFAULT NULL,
  `post_type` varchar(15) DEFAULT NULL,
  `post_status` enum('0','1') DEFAULT NULL,
  `post_order` int(11) DEFAULT NULL,
  `post_image` text DEFAULT NULL,
  `post_image_thumbs` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `url_slug` varchar(100) DEFAULT NULL,
  `viewed` int(11) DEFAULT 0,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `post_modify_date` datetime DEFAULT NULL,
  `post_created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `category_id`, `post_title`, `post_description`, `post_type`, `post_status`, `post_order`, `post_image`, `post_image_thumbs`, `user_id`, `url_slug`, `viewed`, `meta_title`, `meta_description`, `meta_keywords`, `post_modify_date`, `post_created_date`) VALUES
(1, 0, 'About Us', '<div class=\"row no-padding\">\r\n<div class=\"col-md-12\">\r\n<h1 class=\"title-product\">About Us</h1>\r\n<hr class=\"dashed\"></div>\r\n<div class=\"col-md-12 mt-20\"><img src=\"http://localhost/excellentscales/assets/img/compro-visi-misi.jpg\"></div>\r\n<hr>\r\n<div class=\"topabout\">\r\n<div class=\"aboutcomprolittle\">Company Profile</div>\r\n<h2>Excellent <strong>Scale</strong></h2>\r\n<p>Excellent scale adalah sebuah merk produk timbangan digital yang bergaransi pasti selama 1 tahun termasuk service dan sparepart. Memberi Jaminan Bebas Biaya selama masa garansi. Serta sebuah produk yang handal dengan harga yang cukup terjangkau dan kompetitif.</p>\r\n</div>\r\n<div class=\"aboutvisimisi\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<div class=\"card\">\r\n<div class=\"card-body\">\r\n<h5 class=\"card-title\">Visi</h5>\r\n<p class=\"card-text\">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"col-md-6 posrel\">\r\n<div class=\"posabs\">\r\n<h2>Misi</h2>\r\n<ul class=\"aboutmisi\">\r\n<li>Lorem ipsum dolor</li>\r\n<li>Lorem ipsum dolor</li>\r\n<li>Lorem ipsum dolor</li>\r\n<li>Lorem ipsum dolor</li>\r\n<li>Lorem ipsum dolor</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"contentabout\">\r\n<div class=\"row no-padding mb-30\">\r\n<div class=\"col-md-6\"><img src=\"http://localhost/excellentscales/assets/img/about-5.png\"></div>\r\n<div class=\"col-md-6\">\r\n<h2>Timbangan Industri / Produksi</h2>\r\n<span class=\"highlight-title-part\">Timbangan yang termasuk Industri / produksi diantaranya adalah Platform bench scale - Counting scale - Simple weighing.</span></div>\r\n</div>\r\n<div class=\"row no-padding mb-30\">\r\n<div class=\"col-md-6\">\r\n<h2>Timbangan Laboratorium</h2>\r\n<span class=\"highlight-title-part\">Timbangan yang termasuk timbangan laboratorium diantaranya adalah Analytical balance - Balance scale - Precision scale.</span></div>\r\n<div class=\"col-md-6\"><img src=\"http://localhost/excellentscales/assets/img/vision-2.png\"></div>\r\n</div>\r\n<div class=\"row no-padding mb-30\">\r\n<div class=\"col-md-6\"><img src=\"http://localhost/excellentscales/assets/img/vision3.png\"></div>\r\n<div class=\"col-md-6\">\r\n<h2>Timbangan Penyimpanan / gudang</h2>\r\n<span class=\"highlight-title-part\">Timbangan yang termasuk timbangan jembatan / truk diantaranya adalah Hybrid scale - Floor scale - Crane scale - Pallet scale. </span></div>\r\n</div>\r\n</div>\r\n</div>', 'pages', '1', NULL, '', '', 28, 'about-us', 0, NULL, NULL, NULL, '2020-07-16 13:06:16', '2019-08-19 23:13:10'),
(2, 0, 'Home', '<main>\r\n		<section>\r\n			<div class=\"container text-center homepart-1\">\r\n				<h3>WELCOME TO HARIBIMA CREATIVE THEME</h3>\r\n				<div class=\"hr-theme-slash-2\">\r\n					<div class=\"hr-line\"></div>\r\n					<div class=\"hr-icon\"><i class=\"fas fa-crown\"></i></div>\r\n					<div class=\"hr-line\"></div>\r\n				</div>\r\n				<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>\r\n			</div>\r\n\r\n			<div class=\"container text-center homepart-2\">\r\n				<div class=\"row no-margin\">\r\n					<div class=\"col-md-4 homepart-2-content\">\r\n						<img src=\"http://localhost/bikinweb/themes/compro1/assets/img/banner-info-1.png\" class=\"img100\">\r\n						<img src=\"http://localhost/bikinweb/themes/compro1/assets/img/cells.svg\" class=\"changeicon\">\r\n						<h6>EXPERIENCE</h6>\r\n						<hr class=\"black\">\r\n						<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\r\n					</div>\r\n					<div class=\"col-md-4 homepart-2-content\">\r\n						<img src=\"http://localhost/bikinweb/themes/compro1/assets/img/banner-info-2.png\" class=\"img100\">\r\n						<img src=\"http://localhost/bikinweb/themes/compro1/assets/img/icon-low.svg\" class=\"changeicon\">\r\n						<h6>LOW COST</h6>\r\n						<hr class=\"black\">\r\n						<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\r\n					</div>\r\n					<div class=\"col-md-4 homepart-2-content\">\r\n						<img src=\"http://localhost/bikinweb/themes/compro1/assets/img/banner-info-3.png\" class=\"img100\">\r\n						<img src=\"http://localhost/bikinweb/themes/compro1/assets/img/share-all.svg\" class=\"changeicon\">\r\n						<h6>LOGISTICS SERVICES</h6>\r\n						<hr class=\"black\">\r\n						<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\r\n					</div>\r\n				</div>\r\n			</div>\r\n\r\n			<div class=\"homepart-3\">\r\n				<div class=\"\">\r\n					<div class=\"row no-margin\">\r\n						<div class=\"col-md-6 no-padding\">\r\n							<img src=\"assets/img/banner-middle-1.png\" class=\"img100\">\r\n						</div>\r\n						<div class=\"col-md-6 pad1rem fill-onmobile\">\r\n							<div class=\"homepart-3-content-right\">\r\n								<h4 class=\"text-white font-normal letter-space-2 margin-bottom-20\">AWESOME CREATIVE THEME</h4>\r\n								<p class=\"font-16px line-height-24\">Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>\r\n							</div>\r\n						</div>\r\n					</div>\r\n				</div>\r\n			</div>\r\n		</section>\r\n	</main>\r\n\r\n	<section class=\"list-style-featured\">\r\n		<div class=\"container text-center homepart-4\">\r\n			<h3>AWESOME INTERFACE</h3>\r\n			<div class=\"hr-theme-slash-2\">\r\n				<div class=\"hr-line\"></div>\r\n				<div class=\"hr-icon\"><i class=\"fas fa-crown\"></i></div>\r\n				<div class=\"hr-line\"></div>\r\n			</div>\r\n			<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>\r\n		</div>\r\n		<div class=\"container homepart-5\">\r\n			<div class=\"row no-margin\">\r\n				<div class=\"col-md-4 no-padding\">\r\n					<ul class=\"margin-top-30\">\r\n						<li>\r\n							<div class=\"media\">\r\n							<div class=\"media-left\">\r\n							<div class=\"icon\"> <i class=\"fa fa-life-ring\"></i> </div>\r\n							</div>\r\n							<div class=\"media-body\">\r\n							<p>SUPPORT 24/7</p>\r\n							<span>We have created the new macbook psd version with scalable vector shapes. </span> </div>\r\n							</div>\r\n						</li>\r\n						<li>\r\n							<div class=\"media\">\r\n							<div class=\"media-left\">\r\n							<div class=\"icon\"> <i class=\"fa fa-star\"></i> </div>\r\n							</div>\r\n							<div class=\"media-body\">\r\n							<p>POWERFUL SHORTCODE</p>\r\n							<span>Paetos dignissim at cursus elefeind norma arcu.velim pellentesque uter justo magna gravida. </span> </div>\r\n							</div>\r\n						</li>\r\n						<li>\r\n							<div class=\"media\">\r\n							<div class=\"media-left\">\r\n							<div class=\"icon\"> <i class=\"fa fa-umbrella\"></i> </div>\r\n							</div>\r\n							<div class=\"media-body\">\r\n							<p>USER FRIENDLY</p>\r\n							<span>We have created the new macbook psd version with scalable vector shapes. </span> </div>\r\n							</div>\r\n						</li>\r\n						<li>\r\n							<div class=\"media\">\r\n							<div class=\"media-left\">\r\n							<div class=\"icon\"> <i class=\"fa fa-trophy\"></i> </div>\r\n							</div>\r\n							<div class=\"media-body\">\r\n							<p>15+ DEMOS LAYOUT</p>\r\n							<span>Paetos dignissim at cursus elefeind norma arcu.velim pellentesque uter justo magna gravida. </span> </div>\r\n							</div>\r\n						</li>\r\n					</ul>\r\n				</div>\r\n				<div class=\"col-md-4\"><div class=\"absolute-middle-iphone\"><img src=\"http://localhost/bikinweb/themes/compro1/assets/img/ico-iphone.png\" class=\"img100\"></div></div>\r\n				<div class=\"col-md-4 no-padding\">\r\n					<ul class=\"margin-top-30 text-right\">\r\n						<li>\r\n							<div class=\"media\">\r\n							<div class=\"media-body\">\r\n							<p>UNIQUE DESIGN</p>\r\n							<span>We have created the new macbook psd version with scalable vector shapes. </span> </div>\r\n							<div class=\"media-right\">\r\n							<div class=\"icon\"> <i class=\"far fa-gem\"></i> </div>\r\n							</div>\r\n							</div>\r\n						</li>\r\n						<li>\r\n							<div class=\"media\">\r\n							<div class=\"media-body\">\r\n							<p>145 psd includes</p>\r\n							<span>Paetos dignissim at cursus elefeind norma arcu.velim pellentesque uter justo magna gravida. </span> </div>\r\n							<div class=\"media-right\">\r\n							<div class=\"icon\"> <i class=\"fa fa-coffee\"></i> </div>\r\n							</div>\r\n							</div>\r\n						</li>\r\n						<li>\r\n							<div class=\"media\">\r\n							<div class=\"media-body\">\r\n							<p>well document</p>\r\n							<span>We have created the new macbook psd version with scalable vector shapes. </span> </div>\r\n							<div class=\"media-right\">\r\n							<div class=\"icon\"> <i class=\"fas fa-cut\"></i> </div>\r\n							</div>\r\n							</div>\r\n						</li>\r\n						<li>\r\n							<div class=\"media\">\r\n							<div class=\"media-body\">\r\n							<p>woocommerce ready</p>\r\n							<span>Paetos dignissim at cursus elefeind norma arcu.velim pellentesque uter justo magna gravida. </span> </div>\r\n							<div class=\"media-right\">\r\n							<div class=\"icon\"> <i class=\"fa fa-shopping-cart\"></i> </div>\r\n							</div>\r\n							</div>\r\n						</li>\r\n					</ul>\r\n				</div>\r\n			</div>\r\n		</div>\r\n		<div class=\"container text-center homepart-6\">\r\n			<h3>OUR PORTFOLIO</h3>\r\n			<div class=\"hr-theme-slash-2\">\r\n				<div class=\"hr-line\"></div>\r\n				<div class=\"hr-icon\"><i class=\"fas fa-crown\"></i></div>\r\n				<div class=\"hr-line\"></div>\r\n			</div>\r\n			<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>\r\n		</div>\r\n		<div class=\"bg-grey pad-10\">\r\n			<div class=\"row no-margin\">\r\n				<div class=\"col-md-3 no-padding\">\r\n					<div class=\"content\">\r\n						<a href=\"portfolio_detail.php\">\r\n							<div class=\"content-overlay\"></div>\r\n							<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-1.png\" class=\"img100\">\r\n							<div class=\"content-details fadeIn-bottom\">\r\n								<h3 class=\"content-title\">This is a title</h3>\r\n								<p class=\"content-text\">This is a short description</p>\r\n							</div>\r\n						</a>\r\n					</div>\r\n				</div>\r\n				<div class=\"col-md-3 no-padding\">\r\n					<div class=\"content\">\r\n						<a href=\"portfolio_detail.php\">\r\n							<div class=\"content-overlay\"></div>\r\n							<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-2.png\" class=\"img100\">\r\n							<div class=\"content-details fadeIn-bottom\">\r\n								<h3 class=\"content-title\">This is a title</h3>\r\n								<p class=\"content-text\">This is a short description</p>\r\n							</div>\r\n						</a>\r\n					</div>\r\n				</div>\r\n				<div class=\"col-md-3 no-padding\">\r\n					<div class=\"content\">\r\n						<a href=\"portfolio_detail.php\">\r\n							<div class=\"content-overlay\"></div>\r\n							<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-3.png\" class=\"img100\">\r\n							<div class=\"content-details fadeIn-bottom\">\r\n								<h3 class=\"content-title\">This is a title</h3>\r\n								<p class=\"content-text\">This is a short description</p>\r\n							</div>\r\n						</a>\r\n					</div>\r\n				</div>\r\n				<div class=\"col-md-3 no-padding\">\r\n					<div class=\"content\">\r\n						<a href=\"portfolio_detail.php\">\r\n							<div class=\"content-overlay\"></div>\r\n							<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-4.png\" class=\"img100\">\r\n							<div class=\"content-details fadeIn-bottom\">\r\n								<h3 class=\"content-title\">This is a title</h3>\r\n								<p class=\"content-text\">This is a short description</p>\r\n							</div>\r\n						</a>\r\n					</div>\r\n				</div>\r\n			</div>\r\n		</div>\r\n\r\n		\r\n		<section class=\"process padding-bottom-80\">\r\n			<div class=\"container text-center homepart-7\">\r\n				<h3>WORK PROCESS</h3>\r\n				<div class=\"hr-theme-slash-2\">\r\n					<div class=\"hr-line\"></div>\r\n					<div class=\"hr-icon\"><i class=\"fas fa-crown\"></i></div>\r\n					<div class=\"hr-line\"></div>\r\n				</div>\r\n				<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>\r\n			</div>\r\n		\r\n			<div class=\"container\">\r\n				<div class=\"process-style-3 margin-top-30 margin-bottom-60\">\r\n					<ul>\r\n\r\n					<li>\r\n					  <div class=\"media\">\r\n					    <div class=\"media-left media-middle\">\r\n					      <div class=\"icon\"> <i class=\"fa fa-anchor\"></i> </div>\r\n					    </div>\r\n					    <div class=\"media-body\">\r\n					      <h3>01</h3>\r\n					      <p>GET PLAN</p>\r\n					    </div>\r\n					  </div>\r\n					</li>\r\n\r\n					<li>\r\n					  <div class=\"media\">\r\n					    <div class=\"media-left media-middle\">\r\n					      <div class=\"icon\"> <i class=\"fas fa-cube\"></i> </div>\r\n					    </div>\r\n					    <div class=\"media-body\">\r\n					      <h3>02</h3>\r\n					      <p>DEVELOPMENT</p>\r\n					    </div>\r\n					  </div>\r\n					</li>\r\n\r\n					\r\n					<li>\r\n					  <div class=\"media\">\r\n					    <div class=\"media-left media-middle\">\r\n					      <div class=\"icon\"> <i class=\"fa fa-search\"></i> </div>\r\n					    </div>\r\n					    <div class=\"media-body\">\r\n					      <h3>03</h3>\r\n					      <p>TESTING</p>\r\n					    </div>\r\n					  </div>\r\n					</li>\r\n\r\n					\r\n					<li>\r\n					  <div class=\"media\">\r\n					    <div class=\"media-left media-middle\">\r\n					      <div class=\"icon\"> <i class=\"fa fa-paper-plane\"></i> </div>\r\n					    </div>\r\n					    <div class=\"media-body\">\r\n					      <h3>04</h3>\r\n					      <p>LAUNCHING</p>\r\n					    </div>\r\n					  </div>\r\n					</li>\r\n					</ul>\r\n				</div>\r\n			</div>\r\n		</section>\r\n	</section>\r\n\r\n	<section class=\"bg-parallax padding-top-100 padding-bottom-100\" style=\"background:url(http://localhost/bikinweb/themes/compro1/assets/img/bg-parallax-3.png) fixed no-repeat;\">\r\n      <div class=\"heading-border text-center margin-top-50 margin-bottom-50\">\r\n        <h3 class=\"text-uppercase white-text font-bold padding-left-40 padding-right-40 padding-top-20 padding-bottom-20 letter-space-1\">Template Creative</h3>\r\n      </div>\r\n    </section>', 'pages', '1', NULL, NULL, NULL, 28, 'home', 0, NULL, NULL, NULL, '2019-08-20 10:46:37', '2019-08-20 05:53:21'),
(3, 0, 'Portofolio', '<main>\r\n		<section class=\"list-style-featured\">\r\n			<div class=\"container text-center homepart-6\">\r\n				<h3>OUR PORTFOLIO</h3>\r\n				<div class=\"hr-theme-slash-2\">\r\n					<div class=\"hr-line\"></div>\r\n					<div class=\"hr-icon\"><i class=\"fas fa-crown\"></i></div>\r\n					<div class=\"hr-line\"></div>\r\n				</div>\r\n				<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>\r\n			</div>\r\n			<div class=\"bg-grey pad-10\">\r\n				<div class=\"row no-margin\">\r\n					<div class=\"col-md-3 no-padding\">\r\n						<div class=\"content\">\r\n							<a href=\"portfolio_detail.php\">\r\n								<div class=\"content-overlay\"></div>\r\n								<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-1.png\" class=\"img100\">\r\n								<div class=\"content-details fadeIn-bottom\">\r\n									<h3 class=\"content-title\">This is a title</h3>\r\n									<p class=\"content-text\">This is a short description</p>\r\n								</div>\r\n							</a>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-3 no-padding\">\r\n						<div class=\"content\">\r\n							<a href=\"portfolio_detail.php\">\r\n								<div class=\"content-overlay\"></div>\r\n								<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-2.png\" class=\"img100\">\r\n								<div class=\"content-details fadeIn-bottom\">\r\n									<h3 class=\"content-title\">This is a title</h3>\r\n									<p class=\"content-text\">This is a short description</p>\r\n								</div>\r\n							</a>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-3 no-padding\">\r\n						<div class=\"content\">\r\n							<a href=\"portfolio_detail.php\">\r\n								<div class=\"content-overlay\"></div>\r\n								<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-3.png\" class=\"img100\">\r\n								<div class=\"content-details fadeIn-bottom\">\r\n									<h3 class=\"content-title\">This is a title</h3>\r\n									<p class=\"content-text\">This is a short description</p>\r\n								</div>\r\n							</a>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-3 no-padding\">\r\n						<div class=\"content\">\r\n							<a href=\"portfolio_detail.php\">\r\n								<div class=\"content-overlay\"></div>\r\n								<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-4.png\" class=\"img100\">\r\n								<div class=\"content-details fadeIn-bottom\">\r\n									<h3 class=\"content-title\">This is a title</h3>\r\n									<p class=\"content-text\">This is a short description</p>\r\n								</div>\r\n							</a>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-3 no-padding\">\r\n						<div class=\"content\">\r\n							<a href=\"portfolio_detail.php\">\r\n								<div class=\"content-overlay\"></div>\r\n								<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-4.png\" class=\"img100\">\r\n								<div class=\"content-details fadeIn-bottom\">\r\n									<h3 class=\"content-title\">This is a title</h3>\r\n									<p class=\"content-text\">This is a short description</p>\r\n								</div>\r\n							</a>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-3 no-padding\">\r\n						<div class=\"content\">\r\n							<a href=\"portfolio_detail.php\">\r\n								<div class=\"content-overlay\"></div>\r\n								<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-3.png\" class=\"img100\">\r\n								<div class=\"content-details fadeIn-bottom\">\r\n									<h3 class=\"content-title\">This is a title</h3>\r\n									<p class=\"content-text\">This is a short description</p>\r\n								</div>\r\n							</a>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-3 no-padding\">\r\n						<div class=\"content\">\r\n							<a href=\"portfolio_detail.php\">\r\n								<div class=\"content-overlay\"></div>\r\n								<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-2.png\" class=\"img100\">\r\n								<div class=\"content-details fadeIn-bottom\">\r\n									<h3 class=\"content-title\">This is a title</h3>\r\n									<p class=\"content-text\">This is a short description</p>\r\n								</div>\r\n							</a>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-3 no-padding\">\r\n						<div class=\"content\">\r\n							<a href=\"portfolio_detail.php\">\r\n								<div class=\"content-overlay\"></div>\r\n								<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-1.png\" class=\"img100\">\r\n								<div class=\"content-details fadeIn-bottom\">\r\n									<h3 class=\"content-title\">This is a title</h3>\r\n									<p class=\"content-text\">This is a short description</p>\r\n								</div>\r\n							</a>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-3 no-padding\">\r\n						<div class=\"content\">\r\n							<a href=\"portfolio_detail.php\">\r\n								<div class=\"content-overlay\"></div>\r\n								<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-1.png\" class=\"img100\">\r\n								<div class=\"content-details fadeIn-bottom\">\r\n									<h3 class=\"content-title\">This is a title</h3>\r\n									<p class=\"content-text\">This is a short description</p>\r\n								</div>\r\n							</a>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-3 no-padding\">\r\n						<div class=\"content\">\r\n							<a href=\"portfolio_detail.php\">\r\n								<div class=\"content-overlay\"></div>\r\n								<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-2.png\" class=\"img100\">\r\n								<div class=\"content-details fadeIn-bottom\">\r\n									<h3 class=\"content-title\">This is a title</h3>\r\n									<p class=\"content-text\">This is a short description</p>\r\n								</div>\r\n							</a>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-3 no-padding\">\r\n						<div class=\"content\">\r\n							<a href=\"portfolio_detail.php\">\r\n								<div class=\"content-overlay\"></div>\r\n								<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-3.png\" class=\"img100\">\r\n								<div class=\"content-details fadeIn-bottom\">\r\n									<h3 class=\"content-title\">This is a title</h3>\r\n									<p class=\"content-text\">This is a short description</p>\r\n								</div>\r\n							</a>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-3 no-padding\">\r\n						<div class=\"content\">\r\n							<a href=\"portfolio_detail.php\">\r\n								<div class=\"content-overlay\"></div>\r\n								<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-4.png\" class=\"img100\">\r\n								<div class=\"content-details fadeIn-bottom\">\r\n									<h3 class=\"content-title\">This is a title</h3>\r\n									<p class=\"content-text\">This is a short description</p>\r\n								</div>\r\n							</a>\r\n						</div>\r\n					</div>\r\n				</div>\r\n			</div>\r\n		</section>\r\n	</main>\r\n\r\n	<section class=\"bg-parallax padding-top-100 padding-bottom-100\" style=\"background:url(http://localhost/bikinweb/themes/compro1/assets/img/bg-parallax-3.png) fixed no-repeat;\">\r\n      <div class=\"heading-border text-center margin-top-50 margin-bottom-50\">\r\n        <h3 class=\"text-uppercase white-text font-bold padding-left-40 padding-right-40 padding-top-20 padding-bottom-20 letter-space-1\">Template Creative</h3>\r\n      </div>\r\n    </section>\r\n\r\n	<section>\r\n		<div class=\"container aboutpart-5\">\r\n			<div class=\"row margin-bottom-80\">\r\n					<div class=\"col-md-8\">\r\n						<h4 class=\"text-uppercase margin-bottom-25\">Are you Looking for Something New ?</h4>\r\n						<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure</p>\r\n					</div>\r\n					<div class=\"col-md-4 padding-top-40 large-text-right\"> <a href=\"#.\" class=\"btn btn-x-large dark-border right\">Contact Us</a> </div>\r\n				</div>\r\n		</div>\r\n	</section>', 'pages', '1', NULL, NULL, NULL, 28, 'portofolio', 0, NULL, NULL, NULL, '2019-08-20 09:57:28', '2019-08-20 05:56:51'),
(26, 0, 'Puasa ramadhan beda', '<p>Timbangan Water proof model Super SS memiliki kemampuan timbang untuk kondisi lingkungan basah dan lembab, Dan tahan di ruangan suhu dingin -5<sup>o</sup>C, cocok untuk menimbang hasil laut dan di ruangan Cold storage.</p>\r\n<p>Timbangan ini di desain memakai housing dan platter stainless steel untuk mencapai harga yang terjangkau dengan fungsi maksimal.</p>\r\n<p>Sumber daya listrik baterai yang di isi ulang memakai adaptor yang dilengkapi pengaman karet pada konektor untuk menghindari masuknya air yang bisa mengakibatkan korsleting. Tetap bisa dioperasikan pada saat pengisian ulang baterai.</p>', 'post', '1', NULL, '', '', 28, 'puasa-ramadhan-beda', 9, NULL, NULL, NULL, '2020-05-05 14:49:19', '2020-05-05 14:40:33'),
(27, NULL, 'Privacy Policy', '', 'post', NULL, NULL, NULL, NULL, 28, 'privacy-policy', 0, NULL, NULL, NULL, NULL, '2020-05-27 16:05:57'),
(28, NULL, 'Privacy Policy', '', 'pages', NULL, NULL, NULL, NULL, 28, 'privacy-policy-2', 0, NULL, NULL, NULL, NULL, '2020-05-27 16:06:43'),
(32, NULL, 'KURBANdiKota Sapi', '<p>Kurban Sapi</p>', 'product', '1', NULL, 'assets\\images\\product\\c835dd5bab321d994472981b75dcf0c1.jpg', 'assets\\images\\product\\thumbs\\thumb_c835dd5bab321d994472981b75dcf0c1.jpg', 28, 'kurbandikota-sapi', 0, '#KURBANdiKota #KURBANdiRendang #KURBANdiPelosok', '#KURBANdiKota #KURBANdiRendang #KURBANdiPelosok #T.CARE', '#KURBANdiKota #KURBANdiRendang #KURBANdiPelosok #T.CARE', '2022-06-06 00:58:27', '2022-06-06 00:58:11'),
(33, NULL, 'KURBANdiPelosok Kambing', '<p>Kurban Kambing</p>', 'product', '1', NULL, 'assets\\images\\product\\f02dc1c309833be35c3fbcfc322b3cce.jpg', 'assets\\images\\product\\thumbs\\thumb_f02dc1c309833be35c3fbcfc322b3cce.jpg', 28, 'kurbandipelosok-kambing', 0, '#KURBANdiKota #KURBANdiRendang #KURBANdiPelosok', '#KURBANdiKota #KURBANdiRendang #KURBANdiPelosok #T.CARE', '#KURBANdiKota #KURBANdiRendang #KURBANdiPelosok #T.CARE', NULL, '2022-06-06 00:59:47'),
(34, NULL, 'KURBANdiPelosok Sapi', '<p>Kurban Sapi</p>', 'product', '1', NULL, 'assets\\images\\product\\e91becfc0832d97047db3b759d049d2a.jpg', 'assets\\images\\product\\thumbs\\thumb_e91becfc0832d97047db3b759d049d2a.jpg', 28, 'kurbandipelosok-sapi', 0, '#KURBANdiKota #KURBANdiRendang #KURBANdiPelosok', '#KURBANdiKota #KURBANdiRendang #KURBANdiPelosok #T.CARE', '#KURBANdiKota #KURBANdiRendang #KURBANdiPelosok #T.CARE', NULL, '2022-06-06 01:00:44'),
(35, NULL, 'KURBANdiPelosok Sapi 1-7', '<p>Kurban Sapi</p>', 'product', '1', NULL, 'assets\\images\\product\\1d7f0403562ae9cc71482608b1a9a643.jpg', 'assets\\images\\product\\thumbs\\thumb_1d7f0403562ae9cc71482608b1a9a643.jpg', 28, 'kurbandipelosok-sapi-1-7', 0, '#KURBANdiKota #KURBANdiRendang #KURBANdiPelosok', '#KURBANdiKota #KURBANdiRendang #KURBANdiPelosok #T.CARE', '#KURBANdiKota #KURBANdiRendang #KURBANdiPelosok #T.CARE', NULL, '2022-06-06 01:02:03'),
(36, NULL, 'KURBANdiRendang Kambing', '<p>Kurban Kambing</p>', 'product', '1', NULL, 'assets\\images\\product\\99d6aca94d0cb43fdcac996f80edfbcd.jpg', 'assets\\images\\product\\thumbs\\thumb_99d6aca94d0cb43fdcac996f80edfbcd.jpg', 28, 'kurbandirendang-kambing', 0, '#KURBANdiKota #KURBANdiRendang #KURBANdiPelosok', '#KURBANdiKota #KURBANdiRendang #KURBANdiPelosok #T.CARE', '#KURBANdiKota #KURBANdiRendang #KURBANdiPelosok #T.CARE', NULL, '2022-06-06 01:03:22'),
(37, NULL, 'KURBANdiRendang Sapi', '<p>Kurban Sapi</p>', 'product', '1', NULL, 'assets\\images\\product\\25262fba4229055eeb65472d3a565d5d.jpg', 'assets\\images\\product\\thumbs\\thumb_25262fba4229055eeb65472d3a565d5d.jpg', 28, 'kurbandirendang-sapi', 0, '#KURBANdiKota #KURBANdiRendang #KURBANdiPelosok', '#KURBANdiKota #KURBANdiRendang #KURBANdiPelosok #T.CARE', '#KURBANdiKota #KURBANdiRendang #KURBANdiPelosok #T.CARE', NULL, '2022-06-06 01:04:18'),
(38, NULL, 'KURBANdiRendang Sapi 1-7', '<p>Kurban Sapi</p>', 'product', '1', NULL, 'assets\\images\\product\\70bf7211d7aa76ce80bad5d3504ff003.jpg', 'assets\\images\\product\\thumbs\\thumb_70bf7211d7aa76ce80bad5d3504ff003.jpg', 28, 'kurbandirendang-sapi-1-7', 0, '#KURBANdiKota #KURBANdiRendang #KURBANdiPelosok', '#KURBANdiKota #KURBANdiRendang #KURBANdiPelosok #T.CARE', '#KURBANdiKota #KURBANdiRendang #KURBANdiPelosok #T.CARE', NULL, '2022-06-06 01:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `weight_in` varchar(10) DEFAULT NULL,
  `kapasitas_timbang` varchar(255) DEFAULT NULL,
  `range_timbang` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `meta_title` varchar(100) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `post_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT 0,
  `rater` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `sku`, `category_id`, `brand_id`, `price`, `weight`, `weight_in`, `kapasitas_timbang`, `range_timbang`, `qty`, `meta_title`, `meta_description`, `meta_keywords`, `post_id`, `rating`, `rater`) VALUES
(26, '1', NULL, 1, 28000000, 500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 32, 0, 0),
(27, '2', NULL, 1, 2480000, 500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 33, 0, 0),
(28, '3', NULL, 1, 15880000, 500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 34, 0, 0),
(29, '4', NULL, 1, 2480000, 500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 35, 0, 0),
(30, '5', NULL, 1, 2880000, 500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 36, 0, 0),
(31, '6', NULL, 1, 17880000, 500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 37, 0, 0),
(32, '7', NULL, 1, 2880000, 500, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 38, 0, 0);

--
-- Triggers `tbl_product`
--
DELIMITER $$
CREATE TRIGGER `deleteProduk` AFTER DELETE ON `tbl_product` FOR EACH ROW BEGIN
DELETE FROM tbl_product_category WHERE product_id = OLD.id;
DELETE FROM tbl_post WHERE id = OLD.post_id;
DELETE FROM tbl_product_image WHERE product_id = OLD.id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_bestseller`
--

CREATE TABLE `tbl_product_bestseller` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_product_bestseller`
--

INSERT INTO `tbl_product_bestseller` (`id`, `product_id`, `created_at`, `created_by`) VALUES
(1, 1, NULL, NULL),
(8, 3, NULL, NULL),
(9, 5, NULL, NULL),
(10, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_category`
--

CREATE TABLE `tbl_product_category` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_product_category`
--

INSERT INTO `tbl_product_category` (`id`, `product_id`, `category_id`) VALUES
(139, 26, 3),
(140, 27, 1),
(141, 28, 1),
(142, 29, 1),
(143, 30, 2),
(144, 31, 2),
(145, 32, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_discount`
--

CREATE TABLE `tbl_product_discount` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `discount_persen` int(11) DEFAULT NULL,
  `discount_persen2` int(11) DEFAULT NULL,
  `discount_price` decimal(10,2) DEFAULT NULL,
  `star_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `level_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_product_discount`
--

INSERT INTO `tbl_product_discount` (`id`, `product_id`, `qty`, `discount_persen`, `discount_persen2`, `discount_price`, `star_date`, `end_date`, `level_id`) VALUES
(1, 5, 1, 20, NULL, '1260000.00', '2020-04-22', '2020-04-30', NULL),
(2, 1, 1, 10, 0, '300000.00', NULL, NULL, 2),
(3, 1, 1, 40, 0, '1200000.00', NULL, NULL, 3),
(4, 20, 1, 15, NULL, '600000.00', NULL, NULL, 2),
(5, 20, 1, 35, NULL, '1400000.00', NULL, NULL, 3),
(6, 21, 1, 12, 0, '960000.00', NULL, NULL, 2),
(7, 11, 1, 10, 3, '9000.00', NULL, NULL, 1),
(8, 23, 1, 5, 10, '870000.00', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_featured`
--

CREATE TABLE `tbl_product_featured` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_product_featured`
--

INSERT INTO `tbl_product_featured` (`id`, `product_id`, `created_at`, `created_by`) VALUES
(1, 1, NULL, NULL),
(8, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_image`
--

CREATE TABLE `tbl_product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `short` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `image_thumbs` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_media`
--

CREATE TABLE `tbl_product_media` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `path_document` text DEFAULT NULL,
  `file_ext` varchar(30) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `tipe` enum('1','2','3') DEFAULT NULL COMMENT '1. document\r\n2. video\r\n3. iframe\r\n',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_product_media`
--

INSERT INTO `tbl_product_media` (`id`, `title`, `product_id`, `path_document`, `file_ext`, `user_id`, `tipe`, `created_at`) VALUES
(1, 'Catalog', 19, 'assets/images/media/e690ad97af19261ebd46ae2d880ab845.jpg', NULL, 28, '1', '2020-04-20 16:05:22'),
(2, 'title', 1, 'assets\\images\\media\\cf1da0ef277b2f24b45226a0ebfdbce4.PNG', 'PNG', 28, '1', '2022-01-29 11:39:43'),
(3, 'title', 1, 'assets\\images\\media\\042c9c78212c48dd4176dddd00c65aeb.xlsx', 'xlsx', 28, '1', '2022-01-29 11:39:43'),
(4, 'title', 1, 'assets\\images\\media\\fa37670e01f732477ea1f37f3c5fca51.pdf', 'pdf', 28, '1', '2022-01-29 11:39:43'),
(5, 'title', 1, 'assets\\images\\media\\86dd6b55fcb5d7a7ea0a2cd9f42debb0.docx', 'docx', 28, '1', '2022-01-29 11:39:43'),
(6, 'title', 23, 'assets\\images\\media\\b07c51ba8180714ff28ef5482e32b8e9.pdf', 'pdf', 28, '1', '2022-01-29 11:33:09'),
(7, 'title', 21, 'assets\\images\\media\\937fc4bc833838acdcd16b9d4cec8265.pdf', 'pdf', 1, '1', '2020-06-29 20:35:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_newarrival`
--

CREATE TABLE `tbl_product_newarrival` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_product_newarrival`
--

INSERT INTO `tbl_product_newarrival` (`id`, `product_id`, `created_at`, `created_by`) VALUES
(8, 1, NULL, NULL),
(9, 2, NULL, NULL),
(10, 3, NULL, NULL),
(11, 4, NULL, NULL),
(12, 5, NULL, NULL),
(13, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_option`
--

CREATE TABLE `tbl_product_option` (
  `product_option_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `value` text NOT NULL,
  `required` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Triggers `tbl_product_option`
--
DELIMITER $$
CREATE TRIGGER `delpro_opt_val` AFTER DELETE ON `tbl_product_option` FOR EACH ROW BEGIN
DELETE FROM tbl_product_option_value WHERE product_option_id = OLD.product_option_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_option_value`
--

CREATE TABLE `tbl_product_option_value` (
  `product_option_value_id` int(11) NOT NULL,
  `product_option_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `option_value_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtract` tinyint(1) NOT NULL,
  `price` decimal(15,4) NOT NULL,
  `price_prefix` varchar(1) NOT NULL,
  `points` int(11) NOT NULL,
  `points_prefix` varchar(1) NOT NULL,
  `weight` decimal(15,8) NOT NULL,
  `weight_prefix` varchar(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_rating`
--

CREATE TABLE `tbl_product_rating` (
  `id` int(11) NOT NULL,
  `user_id` varchar(250) NOT NULL,
  `product_id` varchar(250) NOT NULL,
  `rating` varchar(250) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_product_rating`
--

INSERT INTO `tbl_product_rating` (`id`, `user_id`, `product_id`, `rating`, `created_at`) VALUES
(1, '', '20', '4', '2020-05-05 18:49:07'),
(2, '69', '20 ', ' 1 ', '0000-00-00 00:00:00');

--
-- Triggers `tbl_product_rating`
--
DELIMITER $$
CREATE TRIGGER `insertRating` AFTER INSERT ON `tbl_product_rating` FOR EACH ROW BEGIN
UPDATE tbl_product SET rating = rating + NEW.rating, rater = rater + 1 WHERE id = NEW.product_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_specials`
--

CREATE TABLE `tbl_product_specials` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_video`
--

CREATE TABLE `tbl_product_video` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image_thumbs` text DEFAULT NULL,
  `iframe` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_product_video`
--

INSERT INTO `tbl_product_video` (`id`, `product_id`, `title`, `slug`, `image_thumbs`, `iframe`, `created_at`) VALUES
(2, 12, 'Super SS', 'super-ss', 'assets\\images\\video\\thumbs\\thumb_0123d0fae35e040b49057d61a69256f8.PNG', '&lt;iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/CXfeT-PU5yc\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen&gt;&lt;/iframe&gt;', '2020-05-19 13:58:22'),
(3, 4, 'Super H20', 'super-h20', 'assets\\images\\video\\thumbs\\thumb_7c346fd1d9525c3e29d17f84d79042df.PNG', '&lt;iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/CXfeT-PU5yc\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen&gt;&lt;/iframe&gt;', '2020-05-19 14:43:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_provinsi_`
--

CREATE TABLE `tbl_provinsi_` (
  `id` int(11) NOT NULL,
  `nama_provinsi` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int(11) NOT NULL,
  `title` varchar(30) DEFAULT NULL,
  `logo` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `value` text DEFAULT NULL,
  `sosmed` text DEFAULT NULL,
  `wiget` text DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `uid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `title`, `logo`, `deskripsi`, `value`, `sosmed`, `wiget`, `created_date`, `uid`) VALUES
(1, 'Excelentscale', NULL, 'Jualan macam-macam alat timbangan', 'a:6:{s:7:\"address\";s:89:\"Jl. Sunter Jaya I No. 3 Komplek Ruko Danau Sunter Mas Blok E No.8A  Jakarta utara - 14350\";s:5:\"email\";s:25:\"sales@excellent-scale.com\";s:7:\"email_r\";s:25:\"sales@excellent-scale.com\";s:2:\"ym\";s:0:\"\";s:5:\"phone\";s:26:\"(021) 6530-1662, 6530-1484\";s:3:\"fax\";s:15:\"(021) 6530-1484\";}', 'a:6:{s:9:\"instagram\";s:9:\"excellent\";s:8:\"facebook\";s:9:\"excellent\";s:7:\"twitter\";s:9:\"excellent\";s:11:\"google-plus\";s:9:\"excellent\";s:7:\"youtube\";s:57:\"https://www.youtube.com/channel/UCPbp4lInONudZz6xb4SOehw/\";s:5:\"skype\";s:0:\"\";}', 'a:2:{s:6:\"fbcode\";s:0:\"\";s:6:\"twcode\";s:0:\"\";}', '2020-06-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `thumbs` text DEFAULT NULL,
  `image_mobile` text DEFAULT NULL,
  `link_target` text DEFAULT NULL,
  `desc` text DEFAULT NULL,
  `status` enum('0','1') DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `title`, `slug`, `image`, `thumbs`, `image_mobile`, `link_target`, `desc`, `status`, `created_at`, `user_id`) VALUES
(1, 'New Year', 'new-year-2', 'assets/images/slider/38bad2ebbfb799f707d7878d3bd114c7.png', 'assets/images/slider/thumbs/thumb_38bad2ebbfb799f707d7878d3bd114c7.png', 'assets\\images\\slider\\6c91faab1f13789040120273d887446d.jpg', '', '', '1', '2020-05-05 12:02:00', 28),
(2, '50 all item', '50-all-item', 'assets/images/slider/af97e8efc743d6a4693aabba965f6c8b.png', 'assets/images/slider/thumbs/thumb_af97e8efc743d6a4693aabba965f6c8b.png', NULL, '', '', '1', '2020-04-24 14:32:10', 28),
(3, 'cashback', 'cashback-2', 'assets\\images\\slider\\f1bd4de52266cc6f5388d8a483004d0f.jpg', 'assets\\images\\slider\\thumbs\\thumb_f1bd4de52266cc6f5388d8a483004d0f.jpg', 'assets\\images\\slider\\b258cb9f9a5abec5224ab51b5d56a7d8.jpg', '', '<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-xs-12 n1ed--fake-container\" data-bootstrap-contains=\"rows\">\r\n<div class=\"row\">\r\n<div class=\"col-md-12\"><img src=\"http://localhost/excellent/assets/images/slider/11959673492397adc3756c6053ec9138.jpg\" alt=\"\" width=\"1080\" height=\"340\"></div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-md-4\"><img src=\"http://localhost/excellent/assets/images/slider/1.jpg\"></div>\r\n<div class=\"col-md-4\"><img src=\"http://localhost/excellent/assets/images/slider/2.jpg\"></div>\r\n<div class=\"col-md-4\"><img src=\"http://localhost/excellent/assets/images/slider/3.jpg\"></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"container\">\r\n<div class=\"row\" data-n1ed-block-category=\"headers\" data-n1ed-block-id=\"1\">\r\n<div class=\"col-xs-12 text-center py-3\" xss=removed>\r\n<h1>Lorem ipsum dolor</h1>\r\n<p>Donec fermentum magna at ex pulvinar, sit amet viverra ex suscipit. Integer fringilla mauris vitae eleifend dictum.</p>\r\n<a class=\"btn btn-primary\" href=\"#\">Start now</a> <a class=\"btn btn-link\" href=\"#\">Read more</a></div>\r\n</div>\r\n</div>', '1', '2020-05-08 16:48:15', 28),
(4, NULL, '-4', NULL, NULL, NULL, NULL, NULL, '0', '2020-05-05 11:54:49', 28);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider_category`
--

CREATE TABLE `tbl_slider_category` (
  `id` int(11) NOT NULL,
  `slider_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_slider_category`
--

INSERT INTO `tbl_slider_category` (`id`, `slider_id`, `category_id`) VALUES
(6, 1, 33);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_statistik`
--

CREATE TABLE `tbl_statistik` (
  `id` int(11) NOT NULL,
  `ip` varchar(30) DEFAULT NULL,
  `cdate` datetime DEFAULT NULL,
  `hits` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_status`
--

CREATE TABLE `tbl_status` (
  `id` int(11) NOT NULL,
  `nama_status` varchar(255) DEFAULT NULL,
  `nama_status_en` varchar(255) DEFAULT NULL,
  `status_type` int(11) NOT NULL,
  `tpl_email` varchar(255) DEFAULT NULL,
  `label_color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_status`
--

INSERT INTO `tbl_status` (`id`, `nama_status`, `nama_status_en`, `status_type`, `tpl_email`, `label_color`) VALUES
(1, 'Belum Bayar (Menunggu Pembayaran)', 'Not yet paid', 1, NULL, 'label label-danger'),
(2, 'Verifikasi Pembayaran', 'Payment verification', 1, NULL, 'label label-warning'),
(3, 'Pembayaran Diterima', 'Payment Received', 1, 'mail/status_3', 'label label-primary'),
(4, 'Produk Sedang dikemas', 'Process Measurements', 1, 'mail/status_4', 'label label-info'),
(6, 'Proses Pengiriman', 'Delivery process', 1, 'mail/status_6', 'label bg-purple-seance bg-font-purple-seance'),
(7, 'Proses Selesai', 'Delivery process', 1, 'mail/status_7', 'label label-success'),
(9, 'Order di Batalkan', NULL, 1, NULL, NULL),
(10, 'Pembayaran Tempo di setujui', 'Payment verification', 1, 'mail/status_tempo', 'label label-success'),
(11, 'Belum di verifikasi (Menunggu Verifikasi Tempo)', 'Menunggu Verifikasi Pembayaran Tempo', 1, NULL, 'label label-warning');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(150) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `provinsi_id` int(11) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kota_id` int(11) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `postal_code` varchar(10) NOT NULL,
  `address` text DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `status` enum('0','1','2') DEFAULT '2' COMMENT '0 blok\r\n1 aktif\r\n2 tidak aktif',
  `level_id` int(11) DEFAULT 0,
  `avatar` text DEFAULT NULL,
  `avatar_thumbs` text DEFAULT NULL,
  `activated_key` varchar(255) NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `modified_date` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `jobdesc_status` int(11) NOT NULL DEFAULT 0,
  `is_address_up` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `full_name`, `phone_number`, `email`, `provinsi_id`, `provinsi`, `kota_id`, `kota`, `postal_code`, `address`, `website`, `about`, `username`, `password`, `status`, `level_id`, `avatar`, `avatar_thumbs`, `activated_key`, `date_created`, `modified_date`, `created_by`, `jobdesc_status`, `is_address_up`) VALUES
(28, 'Administrator', '0213456', 'admin@modelines.id', 2, NULL, 2, NULL, '16360', 'Parungpanjang Bogor AS', NULL, NULL, 'admin', '202cb962ac59075b964b07152d234b70', '1', 1, NULL, NULL, 'e660556b99f376f04ca8cff979e3d77a', '2016-05-06 14:30:19', '2022-05-30 07:59:23', NULL, 0, 1),
(65, 'Rusmana Basyar', '234234', 'admin@website.com', 9, 'Jawa Barat', 78, 'Kota Bogor', '234234', 'Parungpanjang Bogor AS', NULL, NULL, 'test123@gmail.com', '30b0575130ba0c6980d6df339ed1af1a', '1', 1, NULL, NULL, '', '2020-02-19 04:33:49', '2020-09-28 09:43:18', NULL, 0, 0),
(66, 'Rusmana Basyar', '0878123123', 'rusmanab@gmail.com', 0, '', 0, '', '16360', 'kp. kabasiran 002/002', NULL, NULL, 'rusmanab@gmail.com', '4297f44b13955235245b2497399d7a93', '1', 2, NULL, NULL, '63ee451939ed580ef3c4b6f0109d1fd0', '2020-04-20 08:42:20', '2020-11-17 11:22:18', NULL, 0, 0),
(67, 'erina', '087872285060', 'ngoprex.ekagmail.com', NULL, NULL, NULL, NULL, '', 'test', 'tes', 'estse', 'ngoprex.ekagmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '1', 2, 'http://localhost/excellent/assets/themes/metronic/pages/media/profile/profile_user.jpg', NULL, '', '2020-04-21 09:51:25', '2020-05-14 08:21:01', NULL, 0, 0),
(68, 'Rusmana Basyar', '345345', 'rusmanab2@gmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 'rusmanab2@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '2', 0, NULL, NULL, '312fd2f3cabafc9417c35fd00efdaa5d', '2020-09-25 09:55:38', '2020-12-02 04:31:12', NULL, 0, 0),
(69, 'Ahmad Amul', '0878123123123', 'amoel@bulakrantai.com', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 'amoel@bulakrantai.com', 'e10adc3949ba59abbe56e057f20f883e', '1', 0, NULL, NULL, 'c56d0e9a7ccec67b4ea131655038d604', '2022-05-30 10:52:04', '2022-05-30 08:53:04', NULL, 0, 0),
(70, 'Amul', '082122605514', 'ahmadmulyana0807@gmail.com', NULL, NULL, NULL, NULL, '', 'Jl. Bulak Rantai No. 46', NULL, NULL, 'ahmadmulyana0807@gmail.com', '0b1a4d9c96056f11f934c1aab0785ab7', '1', 0, NULL, NULL, '', '2022-06-05 20:29:23', '2022-06-05 18:30:41', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_address`
--

CREATE TABLE `tbl_user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `nama_alamat` varchar(255) DEFAULT NULL,
  `recipient` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `postal_code` varchar(10) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `tipe` int(11) DEFAULT NULL COMMENT '1. Billing Address\r\n2. Shipping Address',
  `is_default` enum('0','1') DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_user_address`
--

INSERT INTO `tbl_user_address` (`id`, `user_id`, `nama_alamat`, `recipient`, `phone_number`, `address`, `postal_code`, `province_id`, `province`, `city_id`, `city`, `district_id`, `email`, `tipe`, `is_default`) VALUES
(3, 65, 'Rusmana', 'Rusmana Basyar', '087851979669', 'kp. kabasiran 002/002', '16360', 9, 'Jawa Barat', 78, 'Kota Bogor', NULL, NULL, NULL, '1'),
(4, 66, 'Alamat Rumah', 'Rusmana Basyar', '087851979669', 'kp. kabasiran 002/002', '16360', 9, 'Jawa Barat', 78, 'Kota Bogor', NULL, NULL, NULL, '0'),
(5, 68, 'Haribima', 'eka', '087872285060', 'antasari', '16360', 9, 'Jawa Barat', 78, 'Kabupaten Bogor', NULL, NULL, NULL, '1'),
(6, 67, 'Rusmana', 'Rusmana Basyar', '087851979669', 'kp. kabasiran 002/002', '16360', 9, 'Jawa Barat', 78, 'Kota Bogor', NULL, NULL, NULL, '0'),
(7, 66, 'alamat kantor', 'Rusmana', '087851979669', 'Jln. Pangeran antasari no 13. tiang flyover no 18', '16360', 6, 'DKI Jakarta', 153, 'Kota Jakarta Selatan', NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_product`
--

CREATE TABLE `tbl_user_product` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_user_product`
--

INSERT INTO `tbl_user_product` (`id`, `user_id`, `product_id`, `created_date`) VALUES
(1, 65, 4, '2020-04-19 17:02:24'),
(2, 65, 3, '2020-04-20 05:58:25'),
(3, 66, 19, '2020-04-20 08:52:13'),
(4, -1, 21, '2020-04-20 10:09:17'),
(5, -1, 22, '2020-04-21 09:47:43'),
(6, -1, 15, '2020-04-21 09:49:43'),
(7, -1, 16, '2020-04-21 09:49:52'),
(8, -1, 19, '2020-04-21 09:50:01'),
(9, 68, 21, '2020-04-21 09:57:37'),
(10, 68, 22, '2020-04-21 09:59:41'),
(11, 68, 17, '2020-04-21 10:26:26'),
(12, 69, 21, '2020-04-21 11:17:58'),
(13, 69, 20, '2020-04-21 17:03:11'),
(14, -1, 20, '2020-04-21 17:04:38'),
(15, 69, 15, '2020-04-21 17:35:59'),
(16, 66, 22, '2020-04-23 08:05:07'),
(17, 66, 21, '2020-04-24 07:05:36'),
(18, 66, 1, '2020-05-11 03:32:42'),
(19, 66, 20, '2020-05-11 05:17:33'),
(20, 67, 20, '2020-05-14 07:33:43'),
(21, 66, 6, '2020-09-23 19:08:19'),
(22, 66, 5, '2020-09-25 09:54:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `add_date` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`id`, `user_id`, `product_id`, `add_date`) VALUES
(1, 65, 5, '2020-02-20 16:16:01'),
(2, 65, 4, '2020-02-25 16:49:59'),
(3, 65, NULL, '2020-04-16 17:54:39'),
(4, 65, NULL, '2020-04-17 05:59:08'),
(5, 65, NULL, '2020-04-17 05:59:36'),
(6, 65, NULL, '2020-04-17 06:00:26'),
(7, 65, 2, '2020-04-17 06:02:02'),
(8, 65, 1, '2020-04-17 06:04:05'),
(10, 65, NULL, '2020-04-20 05:58:39'),
(11, 68, 17, '2020-04-21 10:26:33'),
(12, 66, NULL, '2020-09-23 18:50:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`) USING BTREE;

--
-- Indexes for table `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_banner_promo`
--
ALTER TABLE `tbl_banner_promo`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_banner_promo_category`
--
ALTER TABLE `tbl_banner_promo_category`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_comments_order`
--
ALTER TABLE `tbl_comments_order`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_coupon_history`
--
ALTER TABLE `tbl_coupon_history`
  ADD PRIMARY KEY (`coupon_history_id`) USING BTREE;

--
-- Indexes for table `tbl_guarantee`
--
ALTER TABLE `tbl_guarantee`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_konfrmasi_pembayaran`
--
ALTER TABLE `tbl_konfrmasi_pembayaran`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_kota_`
--
ALTER TABLE `tbl_kota_`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_kurir`
--
ALTER TABLE `tbl_kurir`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_lates_login`
--
ALTER TABLE `tbl_lates_login`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_level`
--
ALTER TABLE `tbl_level`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_list_payment`
--
ALTER TABLE `tbl_list_payment`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_meta_website`
--
ALTER TABLE `tbl_meta_website`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_methode_bayar`
--
ALTER TABLE `tbl_methode_bayar`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_oauth`
--
ALTER TABLE `tbl_oauth`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_option`
--
ALTER TABLE `tbl_option`
  ADD PRIMARY KEY (`option_id`) USING BTREE;

--
-- Indexes for table `tbl_option_choose`
--
ALTER TABLE `tbl_option_choose`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_option_description`
--
ALTER TABLE `tbl_option_description`
  ADD PRIMARY KEY (`option_id`,`language_id`) USING BTREE;

--
-- Indexes for table `tbl_option_value`
--
ALTER TABLE `tbl_option_value`
  ADD PRIMARY KEY (`option_value_id`) USING BTREE;

--
-- Indexes for table `tbl_option_value_description`
--
ALTER TABLE `tbl_option_value_description`
  ADD PRIMARY KEY (`option_value_id`,`language_id`) USING BTREE;

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`id`,`no_order`) USING BTREE,
  ADD UNIQUE KEY `noorder` (`no_order`) USING BTREE;

--
-- Indexes for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `no_order` (`order_id`) USING BTREE;

--
-- Indexes for table `tbl_order_detail2`
--
ALTER TABLE `tbl_order_detail2`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `no_order` (`order_id`) USING BTREE;

--
-- Indexes for table `tbl_order_history`
--
ALTER TABLE `tbl_order_history`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `no_order_ohistory` (`order_id`) USING BTREE;

--
-- Indexes for table `tbl_order_option`
--
ALTER TABLE `tbl_order_option`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_order_payment_tempo`
--
ALTER TABLE `tbl_order_payment_tempo`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_our_clients`
--
ALTER TABLE `tbl_our_clients`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `url_slug` (`url_slug`) USING BTREE;

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `post_id` (`post_id`) USING BTREE;

--
-- Indexes for table `tbl_product_bestseller`
--
ALTER TABLE `tbl_product_bestseller`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_product_discount`
--
ALTER TABLE `tbl_product_discount`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_product_featured`
--
ALTER TABLE `tbl_product_featured`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_product_image`
--
ALTER TABLE `tbl_product_image`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_product_media`
--
ALTER TABLE `tbl_product_media`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_product_newarrival`
--
ALTER TABLE `tbl_product_newarrival`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_product_option`
--
ALTER TABLE `tbl_product_option`
  ADD PRIMARY KEY (`product_option_id`) USING BTREE;

--
-- Indexes for table `tbl_product_option_value`
--
ALTER TABLE `tbl_product_option_value`
  ADD PRIMARY KEY (`product_option_value_id`) USING BTREE;

--
-- Indexes for table `tbl_product_rating`
--
ALTER TABLE `tbl_product_rating`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_product_specials`
--
ALTER TABLE `tbl_product_specials`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_product_video`
--
ALTER TABLE `tbl_product_video`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_provinsi_`
--
ALTER TABLE `tbl_provinsi_`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_slider_category`
--
ALTER TABLE `tbl_slider_category`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_statistik`
--
ALTER TABLE `tbl_statistik`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_status`
--
ALTER TABLE `tbl_status`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`,`email`) USING BTREE;

--
-- Indexes for table `tbl_user_address`
--
ALTER TABLE `tbl_user_address`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_user_product`
--
ALTER TABLE `tbl_user_product`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `general`
--
ALTER TABLE `general`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_banner_promo`
--
ALTER TABLE `tbl_banner_promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_banner_promo_category`
--
ALTER TABLE `tbl_banner_promo_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_comments`
--
ALTER TABLE `tbl_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_comments_order`
--
ALTER TABLE `tbl_comments_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_coupon`
--
ALTER TABLE `tbl_coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_coupon_history`
--
ALTER TABLE `tbl_coupon_history`
  MODIFY `coupon_history_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_guarantee`
--
ALTER TABLE `tbl_guarantee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_konfrmasi_pembayaran`
--
ALTER TABLE `tbl_konfrmasi_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_kota_`
--
ALTER TABLE `tbl_kota_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_kurir`
--
ALTER TABLE `tbl_kurir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_lates_login`
--
ALTER TABLE `tbl_lates_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_list_payment`
--
ALTER TABLE `tbl_list_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_methode_bayar`
--
ALTER TABLE `tbl_methode_bayar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_oauth`
--
ALTER TABLE `tbl_oauth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_option`
--
ALTER TABLE `tbl_option`
  MODIFY `option_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_option_choose`
--
ALTER TABLE `tbl_option_choose`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_option_value`
--
ALTER TABLE `tbl_option_value`
  MODIFY `option_value_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_order_detail2`
--
ALTER TABLE `tbl_order_detail2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_order_history`
--
ALTER TABLE `tbl_order_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_order_option`
--
ALTER TABLE `tbl_order_option`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order_payment_tempo`
--
ALTER TABLE `tbl_order_payment_tempo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_our_clients`
--
ALTER TABLE `tbl_our_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_product_bestseller`
--
ALTER TABLE `tbl_product_bestseller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_product_category`
--
ALTER TABLE `tbl_product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `tbl_product_discount`
--
ALTER TABLE `tbl_product_discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_product_featured`
--
ALTER TABLE `tbl_product_featured`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_product_image`
--
ALTER TABLE `tbl_product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_product_media`
--
ALTER TABLE `tbl_product_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_product_newarrival`
--
ALTER TABLE `tbl_product_newarrival`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_product_option`
--
ALTER TABLE `tbl_product_option`
  MODIFY `product_option_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product_option_value`
--
ALTER TABLE `tbl_product_option_value`
  MODIFY `product_option_value_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product_rating`
--
ALTER TABLE `tbl_product_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_product_specials`
--
ALTER TABLE `tbl_product_specials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product_video`
--
ALTER TABLE `tbl_product_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_provinsi_`
--
ALTER TABLE `tbl_provinsi_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_slider_category`
--
ALTER TABLE `tbl_slider_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_statistik`
--
ALTER TABLE `tbl_statistik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_status`
--
ALTER TABLE `tbl_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_user_address`
--
ALTER TABLE `tbl_user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_user_product`
--
ALTER TABLE `tbl_user_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
