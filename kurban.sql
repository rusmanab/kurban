/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : kurban

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 31/05/2022 10:06:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ci_sessions
-- ----------------------------
DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE `ci_sessions`  (
  `id` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ip_address` varchar(45) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `timestamp` int UNSIGNED NOT NULL DEFAULT 0,
  `data` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  INDEX `ci_sessions_timestamp`(`timestamp`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of ci_sessions
-- ----------------------------

-- ----------------------------
-- Table structure for general
-- ----------------------------
DROP TABLE IF EXISTS `general`;
CREATE TABLE `general`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `perusahaan` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of general
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_banner_promo
-- ----------------------------
DROP TABLE IF EXISTS `tbl_banner_promo`;
CREATE TABLE `tbl_banner_promo`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `desc` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `banner` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `banner_mobile` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `thumbs` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `link_target` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `main_display` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `created_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_banner_promo
-- ----------------------------
INSERT INTO `tbl_banner_promo` VALUES (1, 'Banner 1', '', NULL, NULL, NULL, '', '1', '0', '2020-04-20 15:25:36');
INSERT INTO `tbl_banner_promo` VALUES (2, 'banner 2', '', NULL, NULL, NULL, '', '1', '0', '2020-04-20 15:25:53');
INSERT INTO `tbl_banner_promo` VALUES (3, 'Ramadhan Gede', '', 'assets\\images\\banner\\08b2dc8e951a2ea09528613e9ab40311.jpg', 'assets\\images\\banner\\24abeddf9aa25abad4c351bceb20f285.jpg', 'assets\\images\\banner\\thumbs\\thumb_08b2dc8e951a2ea09528613e9ab40311.jpg', '', '1', '0', '2020-04-28 14:26:20');

-- ----------------------------
-- Table structure for tbl_banner_promo_category
-- ----------------------------
DROP TABLE IF EXISTS `tbl_banner_promo_category`;
CREATE TABLE `tbl_banner_promo_category`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `banner_promo_id` int NULL DEFAULT NULL,
  `category_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_banner_promo_category
-- ----------------------------
INSERT INTO `tbl_banner_promo_category` VALUES (1, 1, 31);
INSERT INTO `tbl_banner_promo_category` VALUES (2, 1, 32);
INSERT INTO `tbl_banner_promo_category` VALUES (3, 2, 33);
INSERT INTO `tbl_banner_promo_category` VALUES (4, 2, 34);
INSERT INTO `tbl_banner_promo_category` VALUES (5, 2, 35);

-- ----------------------------
-- Table structure for tbl_brand
-- ----------------------------
DROP TABLE IF EXISTS `tbl_brand`;
CREATE TABLE `tbl_brand`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `brand_desc` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `slug` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `image_big` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `create_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_brand
-- ----------------------------
INSERT INTO `tbl_brand` VALUES (1, 'Excellent Scale', NULL, NULL, 'assets\\images\\brand\\thumbs\\thumb_d675e8b278d37476f38cf60015f1f091.jpg', 'assets\\images\\brand\\thumbs\\thumb_d675e8b278d37476f38cf60015f1f091.jpg', '2020-06-16 19:36:27');

-- ----------------------------
-- Table structure for tbl_cart
-- ----------------------------
DROP TABLE IF EXISTS `tbl_cart`;
CREATE TABLE `tbl_cart`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `product_id` int NULL DEFAULT NULL,
  `product_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `price` decimal(10, 2) NULL DEFAULT NULL,
  `diskon_price` decimal(10, 2) NULL DEFAULT NULL,
  `image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `weight` double NULL DEFAULT NULL,
  `option` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `order_type` int NULL DEFAULT 2 COMMENT '1. produk jadi\r\n2. produk custom',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_cart
-- ----------------------------
INSERT INTO `tbl_cart` VALUES (17, 66, 3, 'ACS - H1 LED', 1, 2500000.00, 0.00, NULL, 2000, NULL, 2);
INSERT INTO `tbl_cart` VALUES (18, 69, 25, 'Kambing', 3, 2700000.00, 0.00, 'assetsimagesproduct	humbs	humb_65fd49675877388620f71c6b0f47b1ae.jpg', 50, NULL, 2);

-- ----------------------------
-- Table structure for tbl_category
-- ----------------------------
DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE `tbl_category`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `parent_id` int NULL DEFAULT NULL,
  `isparent` int NULL DEFAULT 0,
  `parent_position` int NULL DEFAULT NULL,
  `category_type` int NULL DEFAULT NULL,
  `category_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `category_desc` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `slug` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `image_big` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `image_mobile` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `create_at` datetime(0) NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_category
-- ----------------------------
INSERT INTO `tbl_category` VALUES (1, NULL, 0, NULL, 1, 'KURBANdiPelosok', NULL, 'kurbandipelosok-2', 'assets\\images\\category\\thumbs\\thumb_47be69567dead12ee83361f9e4bba33c.jpg', 'assets\\images\\category\\47be69567dead12ee83361f9e4bba33c.jpg', NULL, '2022-05-30 15:58:08', 28);
INSERT INTO `tbl_category` VALUES (2, NULL, 0, NULL, 1, 'KURBANdiRendang', NULL, 'kurbandirendang-2', 'assets\\images\\category\\thumbs\\thumb_01c62f72d29f5cc4f8b7d6589e8fdc7d.jpg', 'assets\\images\\category\\01c62f72d29f5cc4f8b7d6589e8fdc7d.jpg', NULL, '2022-05-30 15:58:30', 28);
INSERT INTO `tbl_category` VALUES (3, NULL, 0, NULL, 1, 'KURBANdiKota', NULL, 'kurbandikota-2', 'assets\\images\\category\\thumbs\\thumb_4eaf8efb68d02b4ca8f2e75e3118b674.jpg', 'assets\\images\\category\\4eaf8efb68d02b4ca8f2e75e3118b674.jpg', NULL, '2022-05-30 15:58:43', 28);

-- ----------------------------
-- Table structure for tbl_comments
-- ----------------------------
DROP TABLE IF EXISTS `tbl_comments`;
CREATE TABLE `tbl_comments`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `post_id` int NOT NULL,
  `parent_id` int NOT NULL,
  `message` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `url` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_date` datetime(0) NOT NULL,
  `isread` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  `isreply` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0',
  `status` enum('0','1','2') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '0' COMMENT '0 new 1 accepted 2 block',
  `reason` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_comments
-- ----------------------------
INSERT INTO `tbl_comments` VALUES (1, 0, 24, 0, 'stok ada ga gan..?', '', '2020-04-15 10:20:01', '0', '0', '0', '');
INSERT INTO `tbl_comments` VALUES (2, 0, 24, 1, 'testst', '', '2020-04-15 10:20:18', '0', '0', '0', '');
INSERT INTO `tbl_comments` VALUES (3, 0, 24, 1, 'koment', '', '2020-04-15 10:22:04', '0', '0', '0', '');
INSERT INTO `tbl_comments` VALUES (4, 0, 24, 0, 'Mantab', '', '0000-00-00 00:00:00', '0', '0', '0', '');
INSERT INTO `tbl_comments` VALUES (5, 0, 24, 4, 'OK sih', '', '0000-00-00 00:00:00', '0', '0', '0', '');
INSERT INTO `tbl_comments` VALUES (6, 0, 0, 4, 'Terima Kasih', '', '0000-00-00 00:00:00', '0', '0', '0', '');
INSERT INTO `tbl_comments` VALUES (7, 0, 24, 0, 'test', '', '2020-06-16 16:53:00', '0', '0', '1', '');

-- ----------------------------
-- Table structure for tbl_comments_order
-- ----------------------------
DROP TABLE IF EXISTS `tbl_comments_order`;
CREATE TABLE `tbl_comments_order`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `parent_id` int NULL DEFAULT NULL,
  `product_id` int NULL DEFAULT NULL,
  `no_order` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `image_att` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `comment` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `user_id` int NULL DEFAULT NULL,
  `created_date` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `isread` int NULL DEFAULT 0 COMMENT '0 Unread\r\n1 Read',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_comments_order
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_coupon
-- ----------------------------
DROP TABLE IF EXISTS `tbl_coupon`;
CREATE TABLE `tbl_coupon`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `coupon_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `code` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `coupon_type` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `shipping` int NULL DEFAULT NULL,
  `value` double NULL DEFAULT NULL,
  `star_date` date NULL DEFAULT NULL,
  `end_date` date NULL DEFAULT NULL,
  `isactive` int NULL DEFAULT NULL,
  `image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `create_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `user_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_coupon
-- ----------------------------
INSERT INTO `tbl_coupon` VALUES (1, 'KUPON SPECIAL RAMADHAN', 'FL123', '2', 0, 100000, '2020-05-02', '2020-05-31', 1, NULL, '2020-05-04 15:15:20', 28);

-- ----------------------------
-- Table structure for tbl_coupon_history
-- ----------------------------
DROP TABLE IF EXISTS `tbl_coupon_history`;
CREATE TABLE `tbl_coupon_history`  (
  `coupon_history_id` int NOT NULL AUTO_INCREMENT,
  `coupon_id` int NOT NULL,
  `no_order` int NOT NULL,
  `user_id` int NOT NULL,
  `amount` decimal(15, 4) NOT NULL,
  `date_added` datetime(0) NOT NULL,
  PRIMARY KEY (`coupon_history_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = FIXED;

-- ----------------------------
-- Records of tbl_coupon_history
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_guarantee
-- ----------------------------
DROP TABLE IF EXISTS `tbl_guarantee`;
CREATE TABLE `tbl_guarantee`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address1` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `provinsi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_pos` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `notelp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tipe_unit` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `date_buying` date NULL DEFAULT NULL,
  `serial_number` int NULL DEFAULT NULL,
  `model` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `outlet` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_guarantee
-- ----------------------------
INSERT INTO `tbl_guarantee` VALUES (1, 'Rusmana Basyar', 'rusmanab@gmail.com', 'kp. kabasiran 002/002', 'kp. kabasiran 002/002', 'Jawa Barat', '16360', '087851979669', 'PCL001', '0000-00-00', 123123, '123123', '123123', '2020-04-20 06:52:15');

-- ----------------------------
-- Table structure for tbl_konfrmasi_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `tbl_konfrmasi_pembayaran`;
CREATE TABLE `tbl_konfrmasi_pembayaran`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_order` varchar(225) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_pengirim` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nominal` double NULL DEFAULT NULL,
  `bank_pengirim` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_id` int NOT NULL DEFAULT 2,
  `verify_note` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `verify_date` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `verify_by` int NOT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `bukti_bayar` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bukti_thumbs` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_konfrmasi_pembayaran
-- ----------------------------
INSERT INTO `tbl_konfrmasi_pembayaran` VALUES (5, '65202004161537', 'Rusmana', 8647000, 'BCA', 3, '', '2020-04-16 22:50:02', 28, '2020-04-16 22:50:02', 'assets\\images\\bukti_transfer\\bff590c87955b095a7c882c666f0dcb6.PNG', 'assets\\images\\bukti_transfer\\thumbs\\thumb_bff590c87955b095a7c882c666f0dcb6.PNG');
INSERT INTO `tbl_konfrmasi_pembayaran` VALUES (6, '65202004161537', 'Rusmana', 8647000, 'BCA', 2, '', NULL, 0, '2020-04-16 17:49:21', 'assets\\images\\bukti_transfer\\da062b1658190ded6c87bc312c233dcf.PNG', 'assets\\images\\bukti_transfer\\thumbs\\thumb_da062b1658190ded6c87bc312c233dcf.PNG');
INSERT INTO `tbl_konfrmasi_pembayaran` VALUES (7, '66202004221438Status ', 'Rusmana', 3021000, 'BCA', 2, '', NULL, 0, '2020-04-22 09:44:08', 'assets/images/bukti_transfer/c8e29bca3da91018b886b0117e0be137.PNG', 'assets/images/bukti_transfer/thumbs/thumb_c8e29bca3da91018b886b0117e0be137.PNG');
INSERT INTO `tbl_konfrmasi_pembayaran` VALUES (8, '66202009241516', 'rusmana', 2736000, 'TEMPO', 3, 'test', '2020-09-25 11:23:59', 28, '2020-09-25 11:23:59', 'assets\\images\\bukti_transfer\\c1e78a759962d94cb009341fb53a6547.jpg', 'assets\\images\\bukti_transfer\\thumbs\\thumb_c1e78a759962d94cb009341fb53a6547.jpg');

-- ----------------------------
-- Table structure for tbl_kota_
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kota_`;
CREATE TABLE `tbl_kota_`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `provinsi_id` int NULL DEFAULT NULL,
  `nama_kota` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_kota_
-- ----------------------------
INSERT INTO `tbl_kota_` VALUES (1, 2, 'Kab. Bekasi', '2017-04-12 16:06:45');
INSERT INTO `tbl_kota_` VALUES (3, 2, 'Kota Depok', '2017-04-12 16:04:12');
INSERT INTO `tbl_kota_` VALUES (4, 1, 'Jakarta Barat', '2017-03-30 04:39:40');
INSERT INTO `tbl_kota_` VALUES (5, 1, 'Jakarta Utara', '2017-03-30 04:40:01');
INSERT INTO `tbl_kota_` VALUES (6, 1, 'Jakarta Timur', '2017-03-30 04:40:02');
INSERT INTO `tbl_kota_` VALUES (7, 1, 'Jakarta Selatan', '2017-03-30 04:40:02');
INSERT INTO `tbl_kota_` VALUES (8, 1, 'Jakarta Pusat', '2017-04-12 16:03:36');
INSERT INTO `tbl_kota_` VALUES (10, 3, 'Kab. Tangerang', '2017-04-17 11:28:29');
INSERT INTO `tbl_kota_` VALUES (11, 3, 'Kota Tangerang', '2017-04-17 11:28:29');
INSERT INTO `tbl_kota_` VALUES (12, 3, 'Kota Tangerang Selatan', '2017-04-17 11:28:54');

-- ----------------------------
-- Table structure for tbl_kurir
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kurir`;
CREATE TABLE `tbl_kurir`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `value` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `label` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_kurir
-- ----------------------------
INSERT INTO `tbl_kurir` VALUES (1, 'jne', 'JNE');
INSERT INTO `tbl_kurir` VALUES (2, 'pos', 'POS Indonesia');
INSERT INTO `tbl_kurir` VALUES (3, 'tiki', 'TIKI');

-- ----------------------------
-- Table structure for tbl_lates_login
-- ----------------------------
DROP TABLE IF EXISTS `tbl_lates_login`;
CREATE TABLE `tbl_lates_login`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `login_date` datetime(0) NULL DEFAULT NULL,
  `logout_date` datetime(0) NULL DEFAULT NULL,
  `ip` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `session_id` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `token` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_lates_login
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_level
-- ----------------------------
DROP TABLE IF EXISTS `tbl_level`;
CREATE TABLE `tbl_level`  (
  `id` int NOT NULL,
  `level_name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `create_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_level
-- ----------------------------
INSERT INTO `tbl_level` VALUES (0, 'User level1', '2020-06-16 20:05:44', NULL);
INSERT INTO `tbl_level` VALUES (1, 'Administrator', NULL, NULL);
INSERT INTO `tbl_level` VALUES (2, 'User', NULL, NULL);
INSERT INTO `tbl_level` VALUES (3, 'Outlet', NULL, NULL);

-- ----------------------------
-- Table structure for tbl_list_payment
-- ----------------------------
DROP TABLE IF EXISTS `tbl_list_payment`;
CREATE TABLE `tbl_list_payment`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `methode_bayar_id` int NULL DEFAULT NULL,
  `bank_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kcp` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `norek` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_rekening` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `create_at` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `desc` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_list_payment
-- ----------------------------
INSERT INTO `tbl_list_payment` VALUES (1, 2, 'BCA', 'Jakarta', NULL, 'PT.Execelent', 'assets/images/bank/bca.jpg', '2020-04-16 21:25:50', NULL);
INSERT INTO `tbl_list_payment` VALUES (2, 2, 'BNI', 'Jakarta', NULL, 'PT.Execelent', 'assets/images/bank/bni.jpg', '2020-04-16 21:25:50', NULL);
INSERT INTO `tbl_list_payment` VALUES (3, 2, 'MANDIRI', 'Jakarta', NULL, 'PT.Execelent', 'assets/images/bank/mandiri.jpg', '2020-04-16 21:25:51', NULL);
INSERT INTO `tbl_list_payment` VALUES (4, 4, 'TEMPO', NULL, NULL, NULL, 'assets/images/bank/rsz_hutang.jpg', '2020-09-24 15:19:20', NULL);

-- ----------------------------
-- Table structure for tbl_menu
-- ----------------------------
DROP TABLE IF EXISTS `tbl_menu`;
CREATE TABLE `tbl_menu`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `order` int NULL DEFAULT NULL,
  `type` enum('1','2') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT '1. header\r\n2. footer',
  `menu_id` int NULL DEFAULT NULL,
  `slug` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `menu_label` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_menu
-- ----------------------------
INSERT INTO `tbl_menu` VALUES (11, 2, '1', 1, 'about-us', 'About Us', '2019-08-20 09:06:54', NULL);
INSERT INTO `tbl_menu` VALUES (12, 1, '1', 2, 'home', 'Home', '2019-08-20 10:13:04', NULL);
INSERT INTO `tbl_menu` VALUES (21, 3, '1', 0, 'product/category', 'Categories', '2020-04-08 12:58:01', NULL);
INSERT INTO `tbl_menu` VALUES (22, 7, '1', 0, 'contact', 'Contact Us', '2020-04-08 13:00:06', NULL);
INSERT INTO `tbl_menu` VALUES (23, 6, '1', 0, 'guarantee', 'Guarantee', '2020-04-19 23:19:58', NULL);
INSERT INTO `tbl_menu` VALUES (24, 4, '1', 0, 'news', 'News & Artikle', '2020-05-19 11:04:13', NULL);
INSERT INTO `tbl_menu` VALUES (25, 5, '1', 0, 'video', 'Video', '2020-05-19 11:05:41', NULL);

-- ----------------------------
-- Table structure for tbl_meta_website
-- ----------------------------
DROP TABLE IF EXISTS `tbl_meta_website`;
CREATE TABLE `tbl_meta_website`  (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `meta_deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_meta_website
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_methode_bayar
-- ----------------------------
DROP TABLE IF EXISTS `tbl_methode_bayar`;
CREATE TABLE `tbl_methode_bayar`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_pembayaran` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tipe` int NULL DEFAULT NULL,
  `api` int NOT NULL DEFAULT 0,
  `isactive` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_methode_bayar
-- ----------------------------
INSERT INTO `tbl_methode_bayar` VALUES (1, 'Cash On Delivery ( COD )', 'Mohon menunggu kurir dan tukang ukur kami maksimal 2 hari kerja di tempat sesuai alamat  yang kamu pilih. Dan mohon menggunakan uang pas. Selain menggunakan uang cash, kamu bisa menggunakan kartu debt dan kartu kredit (Visa dan Mastercard) dengan menggunakan mesin edisi dari Bank Mandiri. Cash on delivery hanya bisa di proses untuk pembelian jahit online saja. Kamu bisa berikan uangnya ke kurir saat kurir datang bersama dengan tukang ukur kami.', NULL, 1, 0, '0');
INSERT INTO `tbl_methode_bayar` VALUES (2, 'Bank Transfer ', 'Kamu dapat melakukan pembayaran melalui bank transfer ke rekening Modelines.id dalam waktu 2x24 jam setelah pembelian. Jika kamu tidak melakukan pembayaran dalam 2x24 jam, pembelian akan dibatalkan. Lakukan pembayaran denganTransfer ke Rekening Modelines.id, berikut daftar nomor Rekening yang tersedia :  <br> Nama Bank : Bank Mandiri <br> Nomor Rekening : 1290011072325 <br> Nama Pemilik Rekening : PT RUMAH JAHIT KHANSA', NULL, 1, 0, '1');
INSERT INTO `tbl_methode_bayar` VALUES (3, 'Kartu Kredit', '', NULL, 1, 1, '0');
INSERT INTO `tbl_methode_bayar` VALUES (4, 'Tempo', '', NULL, NULL, 0, '1');

-- ----------------------------
-- Table structure for tbl_oauth
-- ----------------------------
DROP TABLE IF EXISTS `tbl_oauth`;
CREATE TABLE `tbl_oauth`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ismobile` enum('1','2') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1' COMMENT '1 Browser',
  `ip` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL,
  `update_date` datetime(0) NULL DEFAULT NULL,
  `fcm_key` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_oauth
-- ----------------------------
INSERT INTO `tbl_oauth` VALUES (2, 65, '135a86505379e0a6d75cb4a592a1829b', '1', '::1', '2020-02-25 04:13:46', NULL, NULL);
INSERT INTO `tbl_oauth` VALUES (3, 68, 'df61cc8ac4e3c1bac81d9181413d1c7f', '1', '180.251.209.13', '2020-04-21 09:57:29', NULL, NULL);
INSERT INTO `tbl_oauth` VALUES (13, 69, '5153a54f0f2c5533fd81452dd62c3f0c', '1', '110.137.156.21', '2020-04-23 09:25:56', NULL, NULL);
INSERT INTO `tbl_oauth` VALUES (15, 66, '7c32158b9568410d638b13a3edb1f08e', '1', '180.214.232.1', '2020-04-24 06:29:56', NULL, NULL);

-- ----------------------------
-- Table structure for tbl_option
-- ----------------------------
DROP TABLE IF EXISTS `tbl_option`;
CREATE TABLE `tbl_option`  (
  `option_id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`option_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_option
-- ----------------------------
INSERT INTO `tbl_option` VALUES (1, 'select');
INSERT INTO `tbl_option` VALUES (2, 'select');

-- ----------------------------
-- Table structure for tbl_option_choose
-- ----------------------------
DROP TABLE IF EXISTS `tbl_option_choose`;
CREATE TABLE `tbl_option_choose`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `option_type` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `option_label` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_option_choose
-- ----------------------------
INSERT INTO `tbl_option_choose` VALUES (1, 'select', 'Select');
INSERT INTO `tbl_option_choose` VALUES (2, 'option', 'Option');

-- ----------------------------
-- Table structure for tbl_option_description
-- ----------------------------
DROP TABLE IF EXISTS `tbl_option_description`;
CREATE TABLE `tbl_option_description`  (
  `option_id` int NOT NULL,
  `language_id` int NOT NULL,
  `option_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`option_id`, `language_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_option_description
-- ----------------------------
INSERT INTO `tbl_option_description` VALUES (1, 1, 'Ukuran');
INSERT INTO `tbl_option_description` VALUES (2, 1, 'Warna');

-- ----------------------------
-- Table structure for tbl_option_value
-- ----------------------------
DROP TABLE IF EXISTS `tbl_option_value`;
CREATE TABLE `tbl_option_value`  (
  `option_value_id` int NOT NULL AUTO_INCREMENT,
  `option_id` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sort_order` int NOT NULL,
  PRIMARY KEY (`option_value_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_option_value
-- ----------------------------
INSERT INTO `tbl_option_value` VALUES (1, 1, '', 1);
INSERT INTO `tbl_option_value` VALUES (2, 1, '', 2);
INSERT INTO `tbl_option_value` VALUES (3, 1, '', 3);
INSERT INTO `tbl_option_value` VALUES (4, 2, '', 0);
INSERT INTO `tbl_option_value` VALUES (5, 2, '', 0);

-- ----------------------------
-- Table structure for tbl_option_value_description
-- ----------------------------
DROP TABLE IF EXISTS `tbl_option_value_description`;
CREATE TABLE `tbl_option_value_description`  (
  `option_value_id` int NOT NULL,
  `language_id` int NOT NULL,
  `option_id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`option_value_id`, `language_id`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_option_value_description
-- ----------------------------
INSERT INTO `tbl_option_value_description` VALUES (1, 1, 1, 'XL');
INSERT INTO `tbl_option_value_description` VALUES (2, 1, 1, 'L');
INSERT INTO `tbl_option_value_description` VALUES (3, 1, 1, 'M');
INSERT INTO `tbl_option_value_description` VALUES (4, 1, 2, 'Merah');
INSERT INTO `tbl_option_value_description` VALUES (5, 1, 2, 'Biru');

-- ----------------------------
-- Table structure for tbl_order_detail
-- ----------------------------
DROP TABLE IF EXISTS `tbl_order_detail`;
CREATE TABLE `tbl_order_detail`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NULL DEFAULT NULL,
  `product_id` int NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `pruduct_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `price` decimal(10, 2) NULL DEFAULT NULL,
  `diskon_price` decimal(10, 2) NULL DEFAULT NULL,
  `weight` int NULL DEFAULT 0,
  `total_price` decimal(10, 2) NULL DEFAULT NULL,
  `options` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `order_type` int NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `no_order`(`order_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_order_detail
-- ----------------------------
INSERT INTO `tbl_order_detail` VALUES (1, 1, 1, 'assets\\images\\product\\thumbs\\thumb_2f3b4163800494c46760a7aceaf66473.jpg', 'JCS-B LED DOUBLE DISPLAY', 1, 3000000.00, 300000.00, 2000, 2700000.00, '', 1);
INSERT INTO `tbl_order_detail` VALUES (2, 2, 1, 'assets\\images\\product\\thumbs\\thumb_2f3b4163800494c46760a7aceaf66473.jpg', 'JCS-B LED DOUBLE DISPLAY', 1, 3000000.00, 300000.00, 2000, 2700000.00, '', 1);
INSERT INTO `tbl_order_detail` VALUES (3, 3, 1, 'assets\\images\\product\\thumbs\\thumb_2f3b4163800494c46760a7aceaf66473.jpg', 'JCS-B LED DOUBLE DISPLAY', 1, 3000000.00, 300000.00, 2000, 2700000.00, '', 1);
INSERT INTO `tbl_order_detail` VALUES (4, 4, 5, 'assets/images/product/thumbs/thumb_6f1cee7b87dce1096423e7e6f1592d71.jpg', 'SUPER SS', 2, 6300000.00, 0.00, 4000, 12600000.00, '', 1);
INSERT INTO `tbl_order_detail` VALUES (5, 5, 1, 'assets\\images\\product\\thumbs\\thumb_2f3b4163800494c46760a7aceaf66473.jpg', 'JCS-B LED DOUBLE DISPLAY', 1, 3000000.00, 300000.00, 2000, 2700000.00, '', 1);
INSERT INTO `tbl_order_detail` VALUES (6, 6, 1, 'assets\\images\\product\\thumbs\\thumb_2f3b4163800494c46760a7aceaf66473.jpg', 'JCS-B LED DOUBLE DISPLAY', 1, 3000000.00, 300000.00, 2000, 2700000.00, '', 1);
INSERT INTO `tbl_order_detail` VALUES (7, 7, 6, 'assets/images/product/thumbs/thumb_84893c1c4ae26098db4b2c1e42ac5dfb.jpg', 'ACS-A', 1, 2400000.00, 0.00, 1000, 2400000.00, '', 1);
INSERT INTO `tbl_order_detail` VALUES (8, 8, 1, 'assets\\images\\product\\thumbs\\thumb_2f3b4163800494c46760a7aceaf66473.jpg', 'JCS-B LED DOUBLE DISPLAY', 1, 3000000.00, 300000.00, 2000, 2700000.00, '', 1);
INSERT INTO `tbl_order_detail` VALUES (9, 9, 1, 'assets\\images\\product\\thumbs\\thumb_2f3b4163800494c46760a7aceaf66473.jpg', 'JCS-B LED DOUBLE DISPLAY', 1, 3000000.00, 300000.00, 2000, 2700000.00, '', 1);
INSERT INTO `tbl_order_detail` VALUES (10, 10, 1, 'assets\\images\\product\\thumbs\\thumb_2f3b4163800494c46760a7aceaf66473.jpg', 'JCS-B LED DOUBLE DISPLAY', 1, 3000000.00, 300000.00, 2000, 2700000.00, '', 1);
INSERT INTO `tbl_order_detail` VALUES (11, 11, 1, 'assets\\images\\product\\thumbs\\thumb_2f3b4163800494c46760a7aceaf66473.jpg', 'JCS-B LED DOUBLE DISPLAY', 1, 3000000.00, 300000.00, 2000, 2700000.00, '', 1);

-- ----------------------------
-- Table structure for tbl_order_detail2
-- ----------------------------
DROP TABLE IF EXISTS `tbl_order_detail2`;
CREATE TABLE `tbl_order_detail2`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alias_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Ongkir',
  `price` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `no_order`(`order_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_order_detail2
-- ----------------------------
INSERT INTO `tbl_order_detail2` VALUES (1, 1, 'pos Paket Kilat Khusus / 2 Kg', 'Ongkir', 14000.00);
INSERT INTO `tbl_order_detail2` VALUES (2, 2, 'pos Express Next Day Barang / 2 Kg', 'Ongkir', 36000.00);
INSERT INTO `tbl_order_detail2` VALUES (3, 3, 'pos Paket Kilat Khusus / 2 Kg', 'Ongkir', 14000.00);
INSERT INTO `tbl_order_detail2` VALUES (4, 4, 'tiki ONS / 4 Kg', 'Ongkir', 72000.00);
INSERT INTO `tbl_order_detail2` VALUES (5, 5, 'pos Paket Kilat Khusus / 2 Kg', 'Ongkir', 14000.00);
INSERT INTO `tbl_order_detail2` VALUES (6, 6, 'tiki REG / 2 Kg', 'Ongkir', 18000.00);
INSERT INTO `tbl_order_detail2` VALUES (7, 7, 'pos Q9 Barang / 1 Kg', 'Ongkir', 17000.00);
INSERT INTO `tbl_order_detail2` VALUES (8, 8, 'tiki  / 2 Kg', 'Ongkir', NULL);
INSERT INTO `tbl_order_detail2` VALUES (9, 9, 'pos Q9 Barang / 2 Kg', 'Ongkir', 34000.00);
INSERT INTO `tbl_order_detail2` VALUES (10, 10, 'pos Q9 Barang / 2 Kg', 'Ongkir', 34000.00);
INSERT INTO `tbl_order_detail2` VALUES (11, 11, 'pos Q9 Barang / 2 Kg', 'Ongkir', 34000.00);

-- ----------------------------
-- Table structure for tbl_order_history
-- ----------------------------
DROP TABLE IF EXISTS `tbl_order_history`;
CREATE TABLE `tbl_order_history`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_order` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `order_id` int NULL DEFAULT NULL,
  `comment` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `status_id` int NULL DEFAULT NULL,
  `customer_notif` int NULL DEFAULT NULL,
  `created_date` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `no_order_ohistory`(`order_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_order_history
-- ----------------------------
INSERT INTO `tbl_order_history` VALUES (1, NULL, 1, 'Menunggu Pembayaran #66202009241388', 1, 0, '2020-09-24 09:29:48', NULL);
INSERT INTO `tbl_order_history` VALUES (2, NULL, 2, 'Menunggu Pembayaran #66202009241516', 1, 0, '2020-09-24 10:34:56', NULL);
INSERT INTO `tbl_order_history` VALUES (3, NULL, 2, '', 3, NULL, '2020-09-25 11:15:34', 28);
INSERT INTO `tbl_order_history` VALUES (4, NULL, 2, '', 4, NULL, '2020-09-25 11:17:24', 28);
INSERT INTO `tbl_order_history` VALUES (5, '66202009241516', NULL, 'pembayaran sudah di verifikasi', 3, 1, '2020-09-25 11:23:59', 0);
INSERT INTO `tbl_order_history` VALUES (6, NULL, 4, 'Menunggu Pembayaran #66202009251977', 1, 0, '2020-09-25 10:54:30', NULL);
INSERT INTO `tbl_order_history` VALUES (7, NULL, 5, 'Menunggu Pembayaran #66202009281384', 1, 0, '2020-09-28 11:26:30', NULL);
INSERT INTO `tbl_order_history` VALUES (8, NULL, 7, 'Menunggu Pembayaran #66202009296491', 1, 0, '2020-09-29 10:04:06', NULL);
INSERT INTO `tbl_order_history` VALUES (9, NULL, 9, 'Menunggu Pembayaran #66202011021658', 1, 0, '2020-11-02 02:44:56', NULL);
INSERT INTO `tbl_order_history` VALUES (10, NULL, 11, 'Menunggu Verifikasi Pembayaran Tempo no order #66202011041059', 11, 0, '2020-11-04 05:37:04', NULL);

-- ----------------------------
-- Table structure for tbl_order_option
-- ----------------------------
DROP TABLE IF EXISTS `tbl_order_option`;
CREATE TABLE `tbl_order_option`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_detail_id` int NOT NULL,
  `product_option_id` int NOT NULL,
  `product_option_value_id` int NOT NULL DEFAULT 0,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `type` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_order_option
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_order_payment_tempo
-- ----------------------------
DROP TABLE IF EXISTS `tbl_order_payment_tempo`;
CREATE TABLE `tbl_order_payment_tempo`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NULL DEFAULT NULL,
  `jumlah_tempo` int NULL DEFAULT NULL,
  `tanggal_jatuh_tempo` date NULL DEFAULT NULL,
  `notes` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `status_bayar` enum('1','2') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1' COMMENT '1. belum lunas\r\n2. sudah lunas',
  `created_date` datetime(0) NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_order_payment_tempo
-- ----------------------------
INSERT INTO `tbl_order_payment_tempo` VALUES (1, 9, 30, NULL, 'testing bos', '1', '2020-11-02 17:55:40', 28);
INSERT INTO `tbl_order_payment_tempo` VALUES (2, 11, 90, NULL, 'ok', '1', '2020-11-04 11:37:45', 103);
INSERT INTO `tbl_order_payment_tempo` VALUES (3, 11, 90, NULL, 'ok', '1', '2020-11-04 11:38:39', 103);

-- ----------------------------
-- Table structure for tbl_orders
-- ----------------------------
DROP TABLE IF EXISTS `tbl_orders`;
CREATE TABLE `tbl_orders`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_order` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `order_name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_id` int NULL DEFAULT NULL,
  `total_price` decimal(10, 2) NULL DEFAULT NULL,
  `total_diskon` decimal(10, 0) NULL DEFAULT 0,
  `ipnumber` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `order_date` datetime(0) NULL DEFAULT NULL,
  `status_id` int NULL DEFAULT 1,
  `catatan` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `address_id` int NULL DEFAULT NULL,
  `methode_bayar_id` int NOT NULL,
  `list_payment_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `no_order`) USING BTREE,
  UNIQUE INDEX `noorder`(`no_order`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_orders
-- ----------------------------
INSERT INTO `tbl_orders` VALUES (1, '66202009241388', '', 66, 3014000.00, 300000, '', '2020-09-24 09:29:44', 1, NULL, 4, 2, 4);
INSERT INTO `tbl_orders` VALUES (2, '66202009241516', '', 66, 3036000.00, 300000, '', '2020-09-24 09:33:09', 2, NULL, 4, 4, 4);
INSERT INTO `tbl_orders` VALUES (3, '66202009255033', '', 66, 3014000.00, 300000, '', '2020-09-25 09:49:16', 1, NULL, 4, 0, NULL);
INSERT INTO `tbl_orders` VALUES (4, '66202009251977', '', 66, 12672000.00, 0, '', '2020-09-25 09:56:41', 1, NULL, 4, 2, 3);
INSERT INTO `tbl_orders` VALUES (5, '66202009281384', '', 66, 3014000.00, 300000, '', '2020-09-28 11:26:28', 1, NULL, 4, 2, 2);
INSERT INTO `tbl_orders` VALUES (6, '66202009281819', '', 66, 3018000.00, 300000, '', '2020-09-28 12:06:56', 1, NULL, 4, 0, NULL);
INSERT INTO `tbl_orders` VALUES (7, '66202009296491', '', 66, 2417000.00, 0, '', '2020-09-29 10:04:00', 1, NULL, 7, 2, 3);
INSERT INTO `tbl_orders` VALUES (8, '66202011025599', '', 66, 3000000.00, 300000, '', '2020-11-02 02:34:28', 1, NULL, 7, 0, NULL);
INSERT INTO `tbl_orders` VALUES (9, '66202011021658', '', 66, 3034000.00, 300000, '', '2020-11-02 02:44:50', 1, NULL, 7, 4, 4);
INSERT INTO `tbl_orders` VALUES (10, '66202011024272', '', 66, 3034000.00, 300000, '', '2020-11-02 12:05:49', 1, NULL, 7, 0, NULL);
INSERT INTO `tbl_orders` VALUES (11, '66202011041059', '', 66, 3034000.00, 300000, '', '2020-11-04 05:37:00', 11, NULL, 7, 4, 4);

-- ----------------------------
-- Table structure for tbl_our_clients
-- ----------------------------
DROP TABLE IF EXISTS `tbl_our_clients`;
CREATE TABLE `tbl_our_clients`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `client_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `client_description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `client_image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `client_url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `contact_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `personal_image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `foreword` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `position` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `update_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `status` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_our_clients
-- ----------------------------
INSERT INTO `tbl_our_clients` VALUES (1, 'PT. ABCD', '<p>https://www.google.co.id/?gws_rd=ssl</p>', 'assets/images/ourclients/926b77ed375548c302ff9c50321c89f8.png', 'https://www.google.co.id/?gws_rd=ssl', 'John Doe', 'assets/images/ourclients/thumbs/thumb_11bda99f74b472edc34dd474ee33ce2c.png', '<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</p>', 'Ceo PT. ABCD', '2017-03-09 08:28:11', '2017-03-09 01:28:11', 1);
INSERT INTO `tbl_our_clients` VALUES (2, 'PT. Hayam Wuruk', '<p>https://www.google.co.id/?gws_rd=ssl</p>', 'assets/images/ourclients/cc6082f660e13a5daf5652d02f8e9e53.png', 'https://www.google.co.id/?gws_rd=ssl', 'Bambang Prokoso', 'assets/images/ourclients/thumbs/thumb_7cba0970b35422725626d16fb30c3e68.png', '<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</p>', 'Manager ', '2017-03-09 08:21:44', '2017-03-09 01:21:44', 1);
INSERT INTO `tbl_our_clients` VALUES (3, 'PT. Gogogo', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetuer adipiscing elit</p>', 'assets/images/ourclients/db3206862f75d4f6aafa80b35b209f07.png', '', 'Loremp Ipsum', 'assets/images/ourclients/thumbs/thumb_49a9261e90cf021c0a5b1c15d8d5979d.jpg', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat</p>', 'Supervisor', '2017-03-09 08:20:25', '2017-03-09 01:20:25', 1);
INSERT INTO `tbl_our_clients` VALUES (4, 'Haribima', '', 'assets/images/ourclients/258d9fbbb3a27af0d9a3f87b4b82af2b.png', '', 'Loremp Ipsum', 'assets/images/ourclients/thumbs/thumb_7c146dc6265364d2f637bd1bcec5f01d.jpg', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam</p>', 'Supervisor', '2017-03-09 08:20:01', '2017-03-09 01:20:01', 1);

-- ----------------------------
-- Table structure for tbl_post
-- ----------------------------
DROP TABLE IF EXISTS `tbl_post`;
CREATE TABLE `tbl_post`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `category_id` int NULL DEFAULT NULL,
  `post_title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `post_description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `post_type` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `post_status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `post_order` int NULL DEFAULT NULL,
  `post_image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `post_image_thumbs` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `user_id` int NULL DEFAULT NULL,
  `url_slug` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `viewed` int NULL DEFAULT 0,
  `meta_title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `meta_description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `meta_keywords` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `post_modify_date` datetime(0) NULL DEFAULT NULL,
  `post_created_date` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `url_slug`(`url_slug`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 32 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_post
-- ----------------------------
INSERT INTO `tbl_post` VALUES (1, 0, 'About Us', '<div class=\"row no-padding\">\r\n<div class=\"col-md-12\">\r\n<h1 class=\"title-product\">About Us</h1>\r\n<hr class=\"dashed\"></div>\r\n<div class=\"col-md-12 mt-20\"><img src=\"http://localhost/excellentscales/assets/img/compro-visi-misi.jpg\"></div>\r\n<hr>\r\n<div class=\"topabout\">\r\n<div class=\"aboutcomprolittle\">Company Profile</div>\r\n<h2>Excellent <strong>Scale</strong></h2>\r\n<p>Excellent scale adalah sebuah merk produk timbangan digital yang bergaransi pasti selama 1 tahun termasuk service dan sparepart. Memberi Jaminan Bebas Biaya selama masa garansi. Serta sebuah produk yang handal dengan harga yang cukup terjangkau dan kompetitif.</p>\r\n</div>\r\n<div class=\"aboutvisimisi\">\r\n<div class=\"row\">\r\n<div class=\"col-md-6\">\r\n<div class=\"card\">\r\n<div class=\"card-body\">\r\n<h5 class=\"card-title\">Visi</h5>\r\n<p class=\"card-text\">Some quick example text to build on the card title and make up the bulk of the card\'s content.</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"col-md-6 posrel\">\r\n<div class=\"posabs\">\r\n<h2>Misi</h2>\r\n<ul class=\"aboutmisi\">\r\n<li>Lorem ipsum dolor</li>\r\n<li>Lorem ipsum dolor</li>\r\n<li>Lorem ipsum dolor</li>\r\n<li>Lorem ipsum dolor</li>\r\n<li>Lorem ipsum dolor</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"contentabout\">\r\n<div class=\"row no-padding mb-30\">\r\n<div class=\"col-md-6\"><img src=\"http://localhost/excellentscales/assets/img/about-5.png\"></div>\r\n<div class=\"col-md-6\">\r\n<h2>Timbangan Industri / Produksi</h2>\r\n<span class=\"highlight-title-part\">Timbangan yang termasuk Industri / produksi diantaranya adalah Platform bench scale - Counting scale - Simple weighing.</span></div>\r\n</div>\r\n<div class=\"row no-padding mb-30\">\r\n<div class=\"col-md-6\">\r\n<h2>Timbangan Laboratorium</h2>\r\n<span class=\"highlight-title-part\">Timbangan yang termasuk timbangan laboratorium diantaranya adalah Analytical balance - Balance scale - Precision scale.</span></div>\r\n<div class=\"col-md-6\"><img src=\"http://localhost/excellentscales/assets/img/vision-2.png\"></div>\r\n</div>\r\n<div class=\"row no-padding mb-30\">\r\n<div class=\"col-md-6\"><img src=\"http://localhost/excellentscales/assets/img/vision3.png\"></div>\r\n<div class=\"col-md-6\">\r\n<h2>Timbangan Penyimpanan / gudang</h2>\r\n<span class=\"highlight-title-part\">Timbangan yang termasuk timbangan jembatan / truk diantaranya adalah Hybrid scale - Floor scale - Crane scale - Pallet scale. </span></div>\r\n</div>\r\n</div>\r\n</div>', 'pages', '1', NULL, '', '', 28, 'about-us', 0, NULL, NULL, NULL, '2020-07-16 13:06:16', '2019-08-19 23:13:10');
INSERT INTO `tbl_post` VALUES (2, 0, 'Home', '<main>\r\n		<section>\r\n			<div class=\"container text-center homepart-1\">\r\n				<h3>WELCOME TO HARIBIMA CREATIVE THEME</h3>\r\n				<div class=\"hr-theme-slash-2\">\r\n					<div class=\"hr-line\"></div>\r\n					<div class=\"hr-icon\"><i class=\"fas fa-crown\"></i></div>\r\n					<div class=\"hr-line\"></div>\r\n				</div>\r\n				<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>\r\n			</div>\r\n\r\n			<div class=\"container text-center homepart-2\">\r\n				<div class=\"row no-margin\">\r\n					<div class=\"col-md-4 homepart-2-content\">\r\n						<img src=\"http://localhost/bikinweb/themes/compro1/assets/img/banner-info-1.png\" class=\"img100\">\r\n						<img src=\"http://localhost/bikinweb/themes/compro1/assets/img/cells.svg\" class=\"changeicon\">\r\n						<h6>EXPERIENCE</h6>\r\n						<hr class=\"black\">\r\n						<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\r\n					</div>\r\n					<div class=\"col-md-4 homepart-2-content\">\r\n						<img src=\"http://localhost/bikinweb/themes/compro1/assets/img/banner-info-2.png\" class=\"img100\">\r\n						<img src=\"http://localhost/bikinweb/themes/compro1/assets/img/icon-low.svg\" class=\"changeicon\">\r\n						<h6>LOW COST</h6>\r\n						<hr class=\"black\">\r\n						<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\r\n					</div>\r\n					<div class=\"col-md-4 homepart-2-content\">\r\n						<img src=\"http://localhost/bikinweb/themes/compro1/assets/img/banner-info-3.png\" class=\"img100\">\r\n						<img src=\"http://localhost/bikinweb/themes/compro1/assets/img/share-all.svg\" class=\"changeicon\">\r\n						<h6>LOGISTICS SERVICES</h6>\r\n						<hr class=\"black\">\r\n						<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>\r\n					</div>\r\n				</div>\r\n			</div>\r\n\r\n			<div class=\"homepart-3\">\r\n				<div class=\"\">\r\n					<div class=\"row no-margin\">\r\n						<div class=\"col-md-6 no-padding\">\r\n							<img src=\"assets/img/banner-middle-1.png\" class=\"img100\">\r\n						</div>\r\n						<div class=\"col-md-6 pad1rem fill-onmobile\">\r\n							<div class=\"homepart-3-content-right\">\r\n								<h4 class=\"text-white font-normal letter-space-2 margin-bottom-20\">AWESOME CREATIVE THEME</h4>\r\n								<p class=\"font-16px line-height-24\">Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>\r\n							</div>\r\n						</div>\r\n					</div>\r\n				</div>\r\n			</div>\r\n		</section>\r\n	</main>\r\n\r\n	<section class=\"list-style-featured\">\r\n		<div class=\"container text-center homepart-4\">\r\n			<h3>AWESOME INTERFACE</h3>\r\n			<div class=\"hr-theme-slash-2\">\r\n				<div class=\"hr-line\"></div>\r\n				<div class=\"hr-icon\"><i class=\"fas fa-crown\"></i></div>\r\n				<div class=\"hr-line\"></div>\r\n			</div>\r\n			<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>\r\n		</div>\r\n		<div class=\"container homepart-5\">\r\n			<div class=\"row no-margin\">\r\n				<div class=\"col-md-4 no-padding\">\r\n					<ul class=\"margin-top-30\">\r\n						<li>\r\n							<div class=\"media\">\r\n							<div class=\"media-left\">\r\n							<div class=\"icon\"> <i class=\"fa fa-life-ring\"></i> </div>\r\n							</div>\r\n							<div class=\"media-body\">\r\n							<p>SUPPORT 24/7</p>\r\n							<span>We have created the new macbook psd version with scalable vector shapes. </span> </div>\r\n							</div>\r\n						</li>\r\n						<li>\r\n							<div class=\"media\">\r\n							<div class=\"media-left\">\r\n							<div class=\"icon\"> <i class=\"fa fa-star\"></i> </div>\r\n							</div>\r\n							<div class=\"media-body\">\r\n							<p>POWERFUL SHORTCODE</p>\r\n							<span>Paetos dignissim at cursus elefeind norma arcu.velim pellentesque uter justo magna gravida. </span> </div>\r\n							</div>\r\n						</li>\r\n						<li>\r\n							<div class=\"media\">\r\n							<div class=\"media-left\">\r\n							<div class=\"icon\"> <i class=\"fa fa-umbrella\"></i> </div>\r\n							</div>\r\n							<div class=\"media-body\">\r\n							<p>USER FRIENDLY</p>\r\n							<span>We have created the new macbook psd version with scalable vector shapes. </span> </div>\r\n							</div>\r\n						</li>\r\n						<li>\r\n							<div class=\"media\">\r\n							<div class=\"media-left\">\r\n							<div class=\"icon\"> <i class=\"fa fa-trophy\"></i> </div>\r\n							</div>\r\n							<div class=\"media-body\">\r\n							<p>15+ DEMOS LAYOUT</p>\r\n							<span>Paetos dignissim at cursus elefeind norma arcu.velim pellentesque uter justo magna gravida. </span> </div>\r\n							</div>\r\n						</li>\r\n					</ul>\r\n				</div>\r\n				<div class=\"col-md-4\"><div class=\"absolute-middle-iphone\"><img src=\"http://localhost/bikinweb/themes/compro1/assets/img/ico-iphone.png\" class=\"img100\"></div></div>\r\n				<div class=\"col-md-4 no-padding\">\r\n					<ul class=\"margin-top-30 text-right\">\r\n						<li>\r\n							<div class=\"media\">\r\n							<div class=\"media-body\">\r\n							<p>UNIQUE DESIGN</p>\r\n							<span>We have created the new macbook psd version with scalable vector shapes. </span> </div>\r\n							<div class=\"media-right\">\r\n							<div class=\"icon\"> <i class=\"far fa-gem\"></i> </div>\r\n							</div>\r\n							</div>\r\n						</li>\r\n						<li>\r\n							<div class=\"media\">\r\n							<div class=\"media-body\">\r\n							<p>145 psd includes</p>\r\n							<span>Paetos dignissim at cursus elefeind norma arcu.velim pellentesque uter justo magna gravida. </span> </div>\r\n							<div class=\"media-right\">\r\n							<div class=\"icon\"> <i class=\"fa fa-coffee\"></i> </div>\r\n							</div>\r\n							</div>\r\n						</li>\r\n						<li>\r\n							<div class=\"media\">\r\n							<div class=\"media-body\">\r\n							<p>well document</p>\r\n							<span>We have created the new macbook psd version with scalable vector shapes. </span> </div>\r\n							<div class=\"media-right\">\r\n							<div class=\"icon\"> <i class=\"fas fa-cut\"></i> </div>\r\n							</div>\r\n							</div>\r\n						</li>\r\n						<li>\r\n							<div class=\"media\">\r\n							<div class=\"media-body\">\r\n							<p>woocommerce ready</p>\r\n							<span>Paetos dignissim at cursus elefeind norma arcu.velim pellentesque uter justo magna gravida. </span> </div>\r\n							<div class=\"media-right\">\r\n							<div class=\"icon\"> <i class=\"fa fa-shopping-cart\"></i> </div>\r\n							</div>\r\n							</div>\r\n						</li>\r\n					</ul>\r\n				</div>\r\n			</div>\r\n		</div>\r\n		<div class=\"container text-center homepart-6\">\r\n			<h3>OUR PORTFOLIO</h3>\r\n			<div class=\"hr-theme-slash-2\">\r\n				<div class=\"hr-line\"></div>\r\n				<div class=\"hr-icon\"><i class=\"fas fa-crown\"></i></div>\r\n				<div class=\"hr-line\"></div>\r\n			</div>\r\n			<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>\r\n		</div>\r\n		<div class=\"bg-grey pad-10\">\r\n			<div class=\"row no-margin\">\r\n				<div class=\"col-md-3 no-padding\">\r\n					<div class=\"content\">\r\n						<a href=\"portfolio_detail.php\">\r\n							<div class=\"content-overlay\"></div>\r\n							<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-1.png\" class=\"img100\">\r\n							<div class=\"content-details fadeIn-bottom\">\r\n								<h3 class=\"content-title\">This is a title</h3>\r\n								<p class=\"content-text\">This is a short description</p>\r\n							</div>\r\n						</a>\r\n					</div>\r\n				</div>\r\n				<div class=\"col-md-3 no-padding\">\r\n					<div class=\"content\">\r\n						<a href=\"portfolio_detail.php\">\r\n							<div class=\"content-overlay\"></div>\r\n							<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-2.png\" class=\"img100\">\r\n							<div class=\"content-details fadeIn-bottom\">\r\n								<h3 class=\"content-title\">This is a title</h3>\r\n								<p class=\"content-text\">This is a short description</p>\r\n							</div>\r\n						</a>\r\n					</div>\r\n				</div>\r\n				<div class=\"col-md-3 no-padding\">\r\n					<div class=\"content\">\r\n						<a href=\"portfolio_detail.php\">\r\n							<div class=\"content-overlay\"></div>\r\n							<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-3.png\" class=\"img100\">\r\n							<div class=\"content-details fadeIn-bottom\">\r\n								<h3 class=\"content-title\">This is a title</h3>\r\n								<p class=\"content-text\">This is a short description</p>\r\n							</div>\r\n						</a>\r\n					</div>\r\n				</div>\r\n				<div class=\"col-md-3 no-padding\">\r\n					<div class=\"content\">\r\n						<a href=\"portfolio_detail.php\">\r\n							<div class=\"content-overlay\"></div>\r\n							<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-4.png\" class=\"img100\">\r\n							<div class=\"content-details fadeIn-bottom\">\r\n								<h3 class=\"content-title\">This is a title</h3>\r\n								<p class=\"content-text\">This is a short description</p>\r\n							</div>\r\n						</a>\r\n					</div>\r\n				</div>\r\n			</div>\r\n		</div>\r\n\r\n		\r\n		<section class=\"process padding-bottom-80\">\r\n			<div class=\"container text-center homepart-7\">\r\n				<h3>WORK PROCESS</h3>\r\n				<div class=\"hr-theme-slash-2\">\r\n					<div class=\"hr-line\"></div>\r\n					<div class=\"hr-icon\"><i class=\"fas fa-crown\"></i></div>\r\n					<div class=\"hr-line\"></div>\r\n				</div>\r\n				<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>\r\n			</div>\r\n		\r\n			<div class=\"container\">\r\n				<div class=\"process-style-3 margin-top-30 margin-bottom-60\">\r\n					<ul>\r\n\r\n					<li>\r\n					  <div class=\"media\">\r\n					    <div class=\"media-left media-middle\">\r\n					      <div class=\"icon\"> <i class=\"fa fa-anchor\"></i> </div>\r\n					    </div>\r\n					    <div class=\"media-body\">\r\n					      <h3>01</h3>\r\n					      <p>GET PLAN</p>\r\n					    </div>\r\n					  </div>\r\n					</li>\r\n\r\n					<li>\r\n					  <div class=\"media\">\r\n					    <div class=\"media-left media-middle\">\r\n					      <div class=\"icon\"> <i class=\"fas fa-cube\"></i> </div>\r\n					    </div>\r\n					    <div class=\"media-body\">\r\n					      <h3>02</h3>\r\n					      <p>DEVELOPMENT</p>\r\n					    </div>\r\n					  </div>\r\n					</li>\r\n\r\n					\r\n					<li>\r\n					  <div class=\"media\">\r\n					    <div class=\"media-left media-middle\">\r\n					      <div class=\"icon\"> <i class=\"fa fa-search\"></i> </div>\r\n					    </div>\r\n					    <div class=\"media-body\">\r\n					      <h3>03</h3>\r\n					      <p>TESTING</p>\r\n					    </div>\r\n					  </div>\r\n					</li>\r\n\r\n					\r\n					<li>\r\n					  <div class=\"media\">\r\n					    <div class=\"media-left media-middle\">\r\n					      <div class=\"icon\"> <i class=\"fa fa-paper-plane\"></i> </div>\r\n					    </div>\r\n					    <div class=\"media-body\">\r\n					      <h3>04</h3>\r\n					      <p>LAUNCHING</p>\r\n					    </div>\r\n					  </div>\r\n					</li>\r\n					</ul>\r\n				</div>\r\n			</div>\r\n		</section>\r\n	</section>\r\n\r\n	<section class=\"bg-parallax padding-top-100 padding-bottom-100\" style=\"background:url(http://localhost/bikinweb/themes/compro1/assets/img/bg-parallax-3.png) fixed no-repeat;\">\r\n      <div class=\"heading-border text-center margin-top-50 margin-bottom-50\">\r\n        <h3 class=\"text-uppercase white-text font-bold padding-left-40 padding-right-40 padding-top-20 padding-bottom-20 letter-space-1\">Template Creative</h3>\r\n      </div>\r\n    </section>', 'pages', '1', NULL, NULL, NULL, 28, 'home', 0, NULL, NULL, NULL, '2019-08-20 10:46:37', '2019-08-20 05:53:21');
INSERT INTO `tbl_post` VALUES (3, 0, 'Portofolio', '<main>\r\n		<section class=\"list-style-featured\">\r\n			<div class=\"container text-center homepart-6\">\r\n				<h3>OUR PORTFOLIO</h3>\r\n				<div class=\"hr-theme-slash-2\">\r\n					<div class=\"hr-line\"></div>\r\n					<div class=\"hr-icon\"><i class=\"fas fa-crown\"></i></div>\r\n					<div class=\"hr-line\"></div>\r\n				</div>\r\n				<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>\r\n			</div>\r\n			<div class=\"bg-grey pad-10\">\r\n				<div class=\"row no-margin\">\r\n					<div class=\"col-md-3 no-padding\">\r\n						<div class=\"content\">\r\n							<a href=\"portfolio_detail.php\">\r\n								<div class=\"content-overlay\"></div>\r\n								<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-1.png\" class=\"img100\">\r\n								<div class=\"content-details fadeIn-bottom\">\r\n									<h3 class=\"content-title\">This is a title</h3>\r\n									<p class=\"content-text\">This is a short description</p>\r\n								</div>\r\n							</a>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-3 no-padding\">\r\n						<div class=\"content\">\r\n							<a href=\"portfolio_detail.php\">\r\n								<div class=\"content-overlay\"></div>\r\n								<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-2.png\" class=\"img100\">\r\n								<div class=\"content-details fadeIn-bottom\">\r\n									<h3 class=\"content-title\">This is a title</h3>\r\n									<p class=\"content-text\">This is a short description</p>\r\n								</div>\r\n							</a>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-3 no-padding\">\r\n						<div class=\"content\">\r\n							<a href=\"portfolio_detail.php\">\r\n								<div class=\"content-overlay\"></div>\r\n								<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-3.png\" class=\"img100\">\r\n								<div class=\"content-details fadeIn-bottom\">\r\n									<h3 class=\"content-title\">This is a title</h3>\r\n									<p class=\"content-text\">This is a short description</p>\r\n								</div>\r\n							</a>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-3 no-padding\">\r\n						<div class=\"content\">\r\n							<a href=\"portfolio_detail.php\">\r\n								<div class=\"content-overlay\"></div>\r\n								<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-4.png\" class=\"img100\">\r\n								<div class=\"content-details fadeIn-bottom\">\r\n									<h3 class=\"content-title\">This is a title</h3>\r\n									<p class=\"content-text\">This is a short description</p>\r\n								</div>\r\n							</a>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-3 no-padding\">\r\n						<div class=\"content\">\r\n							<a href=\"portfolio_detail.php\">\r\n								<div class=\"content-overlay\"></div>\r\n								<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-4.png\" class=\"img100\">\r\n								<div class=\"content-details fadeIn-bottom\">\r\n									<h3 class=\"content-title\">This is a title</h3>\r\n									<p class=\"content-text\">This is a short description</p>\r\n								</div>\r\n							</a>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-3 no-padding\">\r\n						<div class=\"content\">\r\n							<a href=\"portfolio_detail.php\">\r\n								<div class=\"content-overlay\"></div>\r\n								<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-3.png\" class=\"img100\">\r\n								<div class=\"content-details fadeIn-bottom\">\r\n									<h3 class=\"content-title\">This is a title</h3>\r\n									<p class=\"content-text\">This is a short description</p>\r\n								</div>\r\n							</a>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-3 no-padding\">\r\n						<div class=\"content\">\r\n							<a href=\"portfolio_detail.php\">\r\n								<div class=\"content-overlay\"></div>\r\n								<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-2.png\" class=\"img100\">\r\n								<div class=\"content-details fadeIn-bottom\">\r\n									<h3 class=\"content-title\">This is a title</h3>\r\n									<p class=\"content-text\">This is a short description</p>\r\n								</div>\r\n							</a>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-3 no-padding\">\r\n						<div class=\"content\">\r\n							<a href=\"portfolio_detail.php\">\r\n								<div class=\"content-overlay\"></div>\r\n								<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-1.png\" class=\"img100\">\r\n								<div class=\"content-details fadeIn-bottom\">\r\n									<h3 class=\"content-title\">This is a title</h3>\r\n									<p class=\"content-text\">This is a short description</p>\r\n								</div>\r\n							</a>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-3 no-padding\">\r\n						<div class=\"content\">\r\n							<a href=\"portfolio_detail.php\">\r\n								<div class=\"content-overlay\"></div>\r\n								<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-1.png\" class=\"img100\">\r\n								<div class=\"content-details fadeIn-bottom\">\r\n									<h3 class=\"content-title\">This is a title</h3>\r\n									<p class=\"content-text\">This is a short description</p>\r\n								</div>\r\n							</a>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-3 no-padding\">\r\n						<div class=\"content\">\r\n							<a href=\"portfolio_detail.php\">\r\n								<div class=\"content-overlay\"></div>\r\n								<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-2.png\" class=\"img100\">\r\n								<div class=\"content-details fadeIn-bottom\">\r\n									<h3 class=\"content-title\">This is a title</h3>\r\n									<p class=\"content-text\">This is a short description</p>\r\n								</div>\r\n							</a>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-3 no-padding\">\r\n						<div class=\"content\">\r\n							<a href=\"portfolio_detail.php\">\r\n								<div class=\"content-overlay\"></div>\r\n								<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-3.png\" class=\"img100\">\r\n								<div class=\"content-details fadeIn-bottom\">\r\n									<h3 class=\"content-title\">This is a title</h3>\r\n									<p class=\"content-text\">This is a short description</p>\r\n								</div>\r\n							</a>\r\n						</div>\r\n					</div>\r\n					<div class=\"col-md-3 no-padding\">\r\n						<div class=\"content\">\r\n							<a href=\"portfolio_detail.php\">\r\n								<div class=\"content-overlay\"></div>\r\n								<img class=\"content-image\" src=\"http://localhost/bikinweb/themes/compro1/assets/img/artikel-4.png\" class=\"img100\">\r\n								<div class=\"content-details fadeIn-bottom\">\r\n									<h3 class=\"content-title\">This is a title</h3>\r\n									<p class=\"content-text\">This is a short description</p>\r\n								</div>\r\n							</a>\r\n						</div>\r\n					</div>\r\n				</div>\r\n			</div>\r\n		</section>\r\n	</main>\r\n\r\n	<section class=\"bg-parallax padding-top-100 padding-bottom-100\" style=\"background:url(http://localhost/bikinweb/themes/compro1/assets/img/bg-parallax-3.png) fixed no-repeat;\">\r\n      <div class=\"heading-border text-center margin-top-50 margin-bottom-50\">\r\n        <h3 class=\"text-uppercase white-text font-bold padding-left-40 padding-right-40 padding-top-20 padding-bottom-20 letter-space-1\">Template Creative</h3>\r\n      </div>\r\n    </section>\r\n\r\n	<section>\r\n		<div class=\"container aboutpart-5\">\r\n			<div class=\"row margin-bottom-80\">\r\n					<div class=\"col-md-8\">\r\n						<h4 class=\"text-uppercase margin-bottom-25\">Are you Looking for Something New ?</h4>\r\n						<p>Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure</p>\r\n					</div>\r\n					<div class=\"col-md-4 padding-top-40 large-text-right\"> <a href=\"#.\" class=\"btn btn-x-large dark-border right\">Contact Us</a> </div>\r\n				</div>\r\n		</div>\r\n	</section>', 'pages', '1', NULL, NULL, NULL, 28, 'portofolio', 0, NULL, NULL, NULL, '2019-08-20 09:57:28', '2019-08-20 05:56:51');
INSERT INTO `tbl_post` VALUES (26, 0, 'Puasa ramadhan beda', '<p>Timbangan Water proof model Super SS memiliki kemampuan timbang untuk kondisi lingkungan basah dan lembab, Dan tahan di ruangan suhu dingin -5<sup>o</sup>C, cocok untuk menimbang hasil laut dan di ruangan Cold storage.</p>\r\n<p>Timbangan ini di desain memakai housing dan platter stainless steel untuk mencapai harga yang terjangkau dengan fungsi maksimal.</p>\r\n<p>Sumber daya listrik baterai yang di isi ulang memakai adaptor yang dilengkapi pengaman karet pada konektor untuk menghindari masuknya air yang bisa mengakibatkan korsleting. Tetap bisa dioperasikan pada saat pengisian ulang baterai.</p>', 'post', '1', NULL, '', '', 28, 'puasa-ramadhan-beda', 9, NULL, NULL, NULL, '2020-05-05 14:49:19', '2020-05-05 14:40:33');
INSERT INTO `tbl_post` VALUES (27, NULL, 'Privacy Policy', '', 'post', NULL, NULL, NULL, NULL, 28, 'privacy-policy', 0, NULL, NULL, NULL, NULL, '2020-05-27 16:05:57');
INSERT INTO `tbl_post` VALUES (28, NULL, 'Privacy Policy', '', 'pages', NULL, NULL, NULL, NULL, 28, 'privacy-policy-2', 0, NULL, NULL, NULL, NULL, '2020-05-27 16:06:43');
INSERT INTO `tbl_post` VALUES (31, NULL, 'Kambing', '<p>zxczxczxczxc</p>', 'product', '1', NULL, 'assets\\images\\product\\65fd49675877388620f71c6b0f47b1ae.jpg', 'assets\\images\\product\\thumbs\\thumb_65fd49675877388620f71c6b0f47b1ae.jpg', 28, 'kambing', 0, '', '', '', '2022-05-30 16:48:04', '2022-05-30 16:31:47');

-- ----------------------------
-- Table structure for tbl_product
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE `tbl_product`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `sku` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `category_id` int NULL DEFAULT NULL,
  `brand_id` int NULL DEFAULT NULL,
  `price` double NULL DEFAULT NULL,
  `weight` double NULL DEFAULT NULL,
  `weight_in` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kapasitas_timbang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `range_timbang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `meta_title` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `meta_description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `meta_keywords` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `post_id` int NULL DEFAULT NULL,
  `rating` int NULL DEFAULT 0,
  `rater` int NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `post_id`(`post_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_product
-- ----------------------------
INSERT INTO `tbl_product` VALUES (25, 'sk009', NULL, 1, 2700000, 50, NULL, '1', '1', NULL, NULL, NULL, NULL, 31, 0, 0);

-- ----------------------------
-- Table structure for tbl_product_bestseller
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product_bestseller`;
CREATE TABLE `tbl_product_bestseller`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_product_bestseller
-- ----------------------------
INSERT INTO `tbl_product_bestseller` VALUES (1, 1, NULL, NULL);
INSERT INTO `tbl_product_bestseller` VALUES (8, 3, NULL, NULL);
INSERT INTO `tbl_product_bestseller` VALUES (9, 5, NULL, NULL);
INSERT INTO `tbl_product_bestseller` VALUES (10, 6, NULL, NULL);

-- ----------------------------
-- Table structure for tbl_product_category
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product_category`;
CREATE TABLE `tbl_product_category`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NULL DEFAULT NULL,
  `category_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 138 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_product_category
-- ----------------------------
INSERT INTO `tbl_product_category` VALUES (137, 25, 2);

-- ----------------------------
-- Table structure for tbl_product_discount
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product_discount`;
CREATE TABLE `tbl_product_discount`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `discount_persen` int NULL DEFAULT NULL,
  `discount_persen2` int NULL DEFAULT NULL,
  `discount_price` decimal(10, 2) NULL DEFAULT NULL,
  `star_date` date NULL DEFAULT NULL,
  `end_date` date NULL DEFAULT NULL,
  `level_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_product_discount
-- ----------------------------
INSERT INTO `tbl_product_discount` VALUES (1, 5, 1, 20, NULL, 1260000.00, '2020-04-22', '2020-04-30', NULL);
INSERT INTO `tbl_product_discount` VALUES (2, 1, 1, 10, 0, 300000.00, NULL, NULL, 2);
INSERT INTO `tbl_product_discount` VALUES (3, 1, 1, 40, 0, 1200000.00, NULL, NULL, 3);
INSERT INTO `tbl_product_discount` VALUES (4, 20, 1, 15, NULL, 600000.00, NULL, NULL, 2);
INSERT INTO `tbl_product_discount` VALUES (5, 20, 1, 35, NULL, 1400000.00, NULL, NULL, 3);
INSERT INTO `tbl_product_discount` VALUES (6, 21, 1, 12, 0, 960000.00, NULL, NULL, 2);
INSERT INTO `tbl_product_discount` VALUES (7, 11, 1, 10, 3, 9000.00, NULL, NULL, 1);
INSERT INTO `tbl_product_discount` VALUES (8, 23, 1, 5, 10, 870000.00, NULL, NULL, 0);

-- ----------------------------
-- Table structure for tbl_product_featured
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product_featured`;
CREATE TABLE `tbl_product_featured`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_product_featured
-- ----------------------------
INSERT INTO `tbl_product_featured` VALUES (1, 1, NULL, NULL);
INSERT INTO `tbl_product_featured` VALUES (8, 3, NULL, NULL);

-- ----------------------------
-- Table structure for tbl_product_image
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product_image`;
CREATE TABLE `tbl_product_image`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NULL DEFAULT NULL,
  `label` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `short` int NULL DEFAULT NULL,
  `image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `image_thumbs` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `user_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_product_image
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_product_media
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product_media`;
CREATE TABLE `tbl_product_media`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `product_id` int NULL DEFAULT NULL,
  `path_document` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `file_ext` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  `tipe` enum('1','2','3') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT '1. document\r\n2. video\r\n3. iframe\r\n',
  `created_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_product_media
-- ----------------------------
INSERT INTO `tbl_product_media` VALUES (1, 'Catalog', 19, 'assets/images/media/e690ad97af19261ebd46ae2d880ab845.jpg', NULL, 28, '1', '2020-04-20 16:05:22');
INSERT INTO `tbl_product_media` VALUES (2, 'title', 1, 'assets\\images\\media\\cf1da0ef277b2f24b45226a0ebfdbce4.PNG', 'PNG', 28, '1', '2022-01-29 11:39:43');
INSERT INTO `tbl_product_media` VALUES (3, 'title', 1, 'assets\\images\\media\\042c9c78212c48dd4176dddd00c65aeb.xlsx', 'xlsx', 28, '1', '2022-01-29 11:39:43');
INSERT INTO `tbl_product_media` VALUES (4, 'title', 1, 'assets\\images\\media\\fa37670e01f732477ea1f37f3c5fca51.pdf', 'pdf', 28, '1', '2022-01-29 11:39:43');
INSERT INTO `tbl_product_media` VALUES (5, 'title', 1, 'assets\\images\\media\\86dd6b55fcb5d7a7ea0a2cd9f42debb0.docx', 'docx', 28, '1', '2022-01-29 11:39:43');
INSERT INTO `tbl_product_media` VALUES (6, 'title', 23, 'assets\\images\\media\\b07c51ba8180714ff28ef5482e32b8e9.pdf', 'pdf', 28, '1', '2022-01-29 11:33:09');
INSERT INTO `tbl_product_media` VALUES (7, 'title', 21, 'assets\\images\\media\\937fc4bc833838acdcd16b9d4cec8265.pdf', 'pdf', 1, '1', '2020-06-29 20:35:48');

-- ----------------------------
-- Table structure for tbl_product_newarrival
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product_newarrival`;
CREATE TABLE `tbl_product_newarrival`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_product_newarrival
-- ----------------------------
INSERT INTO `tbl_product_newarrival` VALUES (8, 1, NULL, NULL);
INSERT INTO `tbl_product_newarrival` VALUES (9, 2, NULL, NULL);
INSERT INTO `tbl_product_newarrival` VALUES (10, 3, NULL, NULL);
INSERT INTO `tbl_product_newarrival` VALUES (11, 4, NULL, NULL);
INSERT INTO `tbl_product_newarrival` VALUES (12, 5, NULL, NULL);
INSERT INTO `tbl_product_newarrival` VALUES (13, 6, NULL, NULL);

-- ----------------------------
-- Table structure for tbl_product_option
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product_option`;
CREATE TABLE `tbl_product_option`  (
  `product_option_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `option_id` int NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `required` tinyint(1) NOT NULL,
  PRIMARY KEY (`product_option_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_product_option
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_product_option_value
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product_option_value`;
CREATE TABLE `tbl_product_option_value`  (
  `product_option_value_id` int NOT NULL AUTO_INCREMENT,
  `product_option_id` int NOT NULL,
  `product_id` int NOT NULL,
  `option_id` int NOT NULL,
  `option_value_id` int NOT NULL,
  `quantity` int NOT NULL,
  `subtract` tinyint(1) NOT NULL,
  `price` decimal(15, 4) NOT NULL,
  `price_prefix` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `points` int NOT NULL,
  `points_prefix` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `weight` decimal(15, 8) NOT NULL,
  `weight_prefix` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`product_option_value_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_product_option_value
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_product_rating
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product_rating`;
CREATE TABLE `tbl_product_rating`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `product_id` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rating` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_product_rating
-- ----------------------------
INSERT INTO `tbl_product_rating` VALUES (1, '', '20', '4', '2020-05-05 18:49:07');
INSERT INTO `tbl_product_rating` VALUES (2, '69', '20 ', ' 1 ', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for tbl_product_specials
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product_specials`;
CREATE TABLE `tbl_product_specials`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `created_by` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_product_specials
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_product_video
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product_video`;
CREATE TABLE `tbl_product_video`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `image_thumbs` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `iframe` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_product_video
-- ----------------------------
INSERT INTO `tbl_product_video` VALUES (2, 12, 'Super SS', 'super-ss', 'assets\\images\\video\\thumbs\\thumb_0123d0fae35e040b49057d61a69256f8.PNG', '&lt;iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/CXfeT-PU5yc\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen&gt;&lt;/iframe&gt;', '2020-05-19 13:58:22');
INSERT INTO `tbl_product_video` VALUES (3, 4, 'Super H20', 'super-h20', 'assets\\images\\video\\thumbs\\thumb_7c346fd1d9525c3e29d17f84d79042df.PNG', '&lt;iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/CXfeT-PU5yc\" frameborder=\"0\" allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen&gt;&lt;/iframe&gt;', '2020-05-19 14:43:17');

-- ----------------------------
-- Table structure for tbl_provinsi_
-- ----------------------------
DROP TABLE IF EXISTS `tbl_provinsi_`;
CREATE TABLE `tbl_provinsi_`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_provinsi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_provinsi_
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_setting
-- ----------------------------
DROP TABLE IF EXISTS `tbl_setting`;
CREATE TABLE `tbl_setting`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `logo` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `value` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `sosmed` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `wiget` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `created_date` date NULL DEFAULT NULL,
  `uid` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_setting
-- ----------------------------
INSERT INTO `tbl_setting` VALUES (1, 'Excelentscale', NULL, 'Jualan macam-macam alat timbangan', 'a:6:{s:7:\"address\";s:89:\"Jl. Sunter Jaya I No. 3 Komplek Ruko Danau Sunter Mas Blok E No.8A  Jakarta utara - 14350\";s:5:\"email\";s:25:\"sales@excellent-scale.com\";s:7:\"email_r\";s:25:\"sales@excellent-scale.com\";s:2:\"ym\";s:0:\"\";s:5:\"phone\";s:26:\"(021) 6530-1662, 6530-1484\";s:3:\"fax\";s:15:\"(021) 6530-1484\";}', 'a:6:{s:9:\"instagram\";s:9:\"excellent\";s:8:\"facebook\";s:9:\"excellent\";s:7:\"twitter\";s:9:\"excellent\";s:11:\"google-plus\";s:9:\"excellent\";s:7:\"youtube\";s:57:\"https://www.youtube.com/channel/UCPbp4lInONudZz6xb4SOehw/\";s:5:\"skype\";s:0:\"\";}', 'a:2:{s:6:\"fbcode\";s:0:\"\";s:6:\"twcode\";s:0:\"\";}', '2020-06-09', 1);

-- ----------------------------
-- Table structure for tbl_slider
-- ----------------------------
DROP TABLE IF EXISTS `tbl_slider`;
CREATE TABLE `tbl_slider`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `thumbs` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `image_mobile` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `link_target` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `desc` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `status` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  `created_at` datetime(0) NULL DEFAULT NULL,
  `user_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_slider
-- ----------------------------
INSERT INTO `tbl_slider` VALUES (1, 'New Year', 'new-year-2', 'assets/images/slider/38bad2ebbfb799f707d7878d3bd114c7.png', 'assets/images/slider/thumbs/thumb_38bad2ebbfb799f707d7878d3bd114c7.png', 'assets\\images\\slider\\6c91faab1f13789040120273d887446d.jpg', '', '', '1', '2020-05-05 12:02:00', 28);
INSERT INTO `tbl_slider` VALUES (2, '50 all item', '50-all-item', 'assets/images/slider/af97e8efc743d6a4693aabba965f6c8b.png', 'assets/images/slider/thumbs/thumb_af97e8efc743d6a4693aabba965f6c8b.png', NULL, '', '', '1', '2020-04-24 14:32:10', 28);
INSERT INTO `tbl_slider` VALUES (3, 'cashback', 'cashback-2', 'assets\\images\\slider\\f1bd4de52266cc6f5388d8a483004d0f.jpg', 'assets\\images\\slider\\thumbs\\thumb_f1bd4de52266cc6f5388d8a483004d0f.jpg', 'assets\\images\\slider\\b258cb9f9a5abec5224ab51b5d56a7d8.jpg', '', '<div class=\"container\">\r\n<div class=\"row\">\r\n<div class=\"col-xs-12 n1ed--fake-container\" data-bootstrap-contains=\"rows\">\r\n<div class=\"row\">\r\n<div class=\"col-md-12\"><img src=\"http://localhost/excellent/assets/images/slider/11959673492397adc3756c6053ec9138.jpg\" alt=\"\" width=\"1080\" height=\"340\"></div>\r\n</div>\r\n<div class=\"row\">\r\n<div class=\"col-md-4\"><img src=\"http://localhost/excellent/assets/images/slider/1.jpg\"></div>\r\n<div class=\"col-md-4\"><img src=\"http://localhost/excellent/assets/images/slider/2.jpg\"></div>\r\n<div class=\"col-md-4\"><img src=\"http://localhost/excellent/assets/images/slider/3.jpg\"></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"container\">\r\n<div class=\"row\" data-n1ed-block-category=\"headers\" data-n1ed-block-id=\"1\">\r\n<div class=\"col-xs-12 text-center py-3\" xss=removed>\r\n<h1>Lorem ipsum dolor</h1>\r\n<p>Donec fermentum magna at ex pulvinar, sit amet viverra ex suscipit. Integer fringilla mauris vitae eleifend dictum.</p>\r\n<a class=\"btn btn-primary\" href=\"#\">Start now</a> <a class=\"btn btn-link\" href=\"#\">Read more</a></div>\r\n</div>\r\n</div>', '1', '2020-05-08 16:48:15', 28);
INSERT INTO `tbl_slider` VALUES (4, NULL, '-4', NULL, NULL, NULL, NULL, NULL, '0', '2020-05-05 11:54:49', 28);

-- ----------------------------
-- Table structure for tbl_slider_category
-- ----------------------------
DROP TABLE IF EXISTS `tbl_slider_category`;
CREATE TABLE `tbl_slider_category`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `slider_id` int NULL DEFAULT NULL,
  `category_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_slider_category
-- ----------------------------
INSERT INTO `tbl_slider_category` VALUES (6, 1, 33);

-- ----------------------------
-- Table structure for tbl_statistik
-- ----------------------------
DROP TABLE IF EXISTS `tbl_statistik`;
CREATE TABLE `tbl_statistik`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `ip` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `cdate` datetime(0) NULL DEFAULT NULL,
  `hits` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_statistik
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_status
-- ----------------------------
DROP TABLE IF EXISTS `tbl_status`;
CREATE TABLE `tbl_status`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_status_en` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status_type` int NOT NULL,
  `tpl_email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `label_color` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_status
-- ----------------------------
INSERT INTO `tbl_status` VALUES (1, 'Belum Bayar (Menunggu Pembayaran)', 'Not yet paid', 1, NULL, 'label label-danger');
INSERT INTO `tbl_status` VALUES (2, 'Verifikasi Pembayaran', 'Payment verification', 1, NULL, 'label label-warning');
INSERT INTO `tbl_status` VALUES (3, 'Pembayaran Diterima', 'Payment Received', 1, 'mail/status_3', 'label label-primary');
INSERT INTO `tbl_status` VALUES (4, 'Produk Sedang dikemas', 'Process Measurements', 1, 'mail/status_4', 'label label-info');
INSERT INTO `tbl_status` VALUES (6, 'Proses Pengiriman', 'Delivery process', 1, 'mail/status_6', 'label bg-purple-seance bg-font-purple-seance');
INSERT INTO `tbl_status` VALUES (7, 'Proses Selesai', 'Delivery process', 1, 'mail/status_7', 'label label-success');
INSERT INTO `tbl_status` VALUES (9, 'Order di Batalkan', NULL, 1, NULL, NULL);
INSERT INTO `tbl_status` VALUES (10, 'Pembayaran Tempo di setujui', 'Payment verification', 1, 'mail/status_tempo', 'label label-success');
INSERT INTO `tbl_status` VALUES (11, 'Belum di verifikasi (Menunggu Verifikasi Tempo)', 'Menunggu Verifikasi Pembayaran Tempo', 1, NULL, 'label label-warning');

-- ----------------------------
-- Table structure for tbl_user_address
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user_address`;
CREATE TABLE `tbl_user_address`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `nama_alamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `recipient` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `phone_number` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `postal_code` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `province_id` int NULL DEFAULT NULL,
  `province` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `city_id` int NULL DEFAULT NULL,
  `city` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `district_id` int NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tipe` int NULL DEFAULT NULL COMMENT '1. Billing Address\r\n2. Shipping Address',
  `is_default` enum('0','1') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '0',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_user_address
-- ----------------------------
INSERT INTO `tbl_user_address` VALUES (3, 65, 'Rusmana', 'Rusmana Basyar', '087851979669', 'kp. kabasiran 002/002', '16360', 9, 'Jawa Barat', 78, 'Kota Bogor', NULL, NULL, NULL, '1');
INSERT INTO `tbl_user_address` VALUES (4, 66, 'Alamat Rumah', 'Rusmana Basyar', '087851979669', 'kp. kabasiran 002/002', '16360', 9, 'Jawa Barat', 78, 'Kota Bogor', NULL, NULL, NULL, '0');
INSERT INTO `tbl_user_address` VALUES (5, 68, 'Haribima', 'eka', '087872285060', 'antasari', '16360', 9, 'Jawa Barat', 78, 'Kabupaten Bogor', NULL, NULL, NULL, '1');
INSERT INTO `tbl_user_address` VALUES (6, 67, 'Rusmana', 'Rusmana Basyar', '087851979669', 'kp. kabasiran 002/002', '16360', 9, 'Jawa Barat', 78, 'Kota Bogor', NULL, NULL, NULL, '0');
INSERT INTO `tbl_user_address` VALUES (7, 66, 'alamat kantor', 'Rusmana', '087851979669', 'Jln. Pangeran antasari no 13. tiang flyover no 18', '16360', 6, 'DKI Jakarta', 153, 'Kota Jakarta Selatan', NULL, NULL, NULL, '1');

-- ----------------------------
-- Table structure for tbl_user_product
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user_product`;
CREATE TABLE `tbl_user_product`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `product_id` int NULL DEFAULT NULL,
  `created_date` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_user_product
-- ----------------------------
INSERT INTO `tbl_user_product` VALUES (1, 65, 4, '2020-04-19 17:02:24');
INSERT INTO `tbl_user_product` VALUES (2, 65, 3, '2020-04-20 05:58:25');
INSERT INTO `tbl_user_product` VALUES (3, 66, 19, '2020-04-20 08:52:13');
INSERT INTO `tbl_user_product` VALUES (4, -1, 21, '2020-04-20 10:09:17');
INSERT INTO `tbl_user_product` VALUES (5, -1, 22, '2020-04-21 09:47:43');
INSERT INTO `tbl_user_product` VALUES (6, -1, 15, '2020-04-21 09:49:43');
INSERT INTO `tbl_user_product` VALUES (7, -1, 16, '2020-04-21 09:49:52');
INSERT INTO `tbl_user_product` VALUES (8, -1, 19, '2020-04-21 09:50:01');
INSERT INTO `tbl_user_product` VALUES (9, 68, 21, '2020-04-21 09:57:37');
INSERT INTO `tbl_user_product` VALUES (10, 68, 22, '2020-04-21 09:59:41');
INSERT INTO `tbl_user_product` VALUES (11, 68, 17, '2020-04-21 10:26:26');
INSERT INTO `tbl_user_product` VALUES (12, 69, 21, '2020-04-21 11:17:58');
INSERT INTO `tbl_user_product` VALUES (13, 69, 20, '2020-04-21 17:03:11');
INSERT INTO `tbl_user_product` VALUES (14, -1, 20, '2020-04-21 17:04:38');
INSERT INTO `tbl_user_product` VALUES (15, 69, 15, '2020-04-21 17:35:59');
INSERT INTO `tbl_user_product` VALUES (16, 66, 22, '2020-04-23 08:05:07');
INSERT INTO `tbl_user_product` VALUES (17, 66, 21, '2020-04-24 07:05:36');
INSERT INTO `tbl_user_product` VALUES (18, 66, 1, '2020-05-11 03:32:42');
INSERT INTO `tbl_user_product` VALUES (19, 66, 20, '2020-05-11 05:17:33');
INSERT INTO `tbl_user_product` VALUES (20, 67, 20, '2020-05-14 07:33:43');
INSERT INTO `tbl_user_product` VALUES (21, 66, 6, '2020-09-23 19:08:19');
INSERT INTO `tbl_user_product` VALUES (22, 66, 5, '2020-09-25 09:54:19');

-- ----------------------------
-- Table structure for tbl_users
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `phone_number` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT '',
  `provinsi_id` int NULL DEFAULT NULL,
  `provinsi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kota_id` int NULL DEFAULT NULL,
  `kota` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `postal_code` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `website` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `about` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` enum('0','1','2') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '2' COMMENT '0 blok\r\n1 aktif\r\n2 tidak aktif',
  `level_id` int NULL DEFAULT 0,
  `avatar` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `avatar_thumbs` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `activated_key` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date_created` datetime(0) NULL DEFAULT NULL,
  `modified_date` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `created_by` int NULL DEFAULT NULL,
  `jobdesc_status` int NOT NULL DEFAULT 0,
  `is_address_up` int NULL DEFAULT 0,
  PRIMARY KEY (`id`, `email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 70 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_users
-- ----------------------------
INSERT INTO `tbl_users` VALUES (28, 'Administrator', '0213456', 'admin@modelines.id', 2, NULL, 2, NULL, '16360', 'Parungpanjang Bogor AS', NULL, NULL, 'admin', '202cb962ac59075b964b07152d234b70', '1', 1, NULL, NULL, 'e660556b99f376f04ca8cff979e3d77a', '2016-05-06 14:30:19', '2022-05-30 14:59:23', NULL, 0, 1);
INSERT INTO `tbl_users` VALUES (65, 'Rusmana Basyar', '234234', 'admin@website.com', 9, 'Jawa Barat', 78, 'Kota Bogor', '234234', 'Parungpanjang Bogor AS', NULL, NULL, 'test123@gmail.com', '30b0575130ba0c6980d6df339ed1af1a', '1', 1, NULL, NULL, '', '2020-02-19 04:33:49', '2020-09-28 16:43:18', NULL, 0, 0);
INSERT INTO `tbl_users` VALUES (66, 'Rusmana Basyar', '0878123123', 'rusmanab@gmail.com', 0, '', 0, '', '16360', 'kp. kabasiran 002/002', NULL, NULL, 'rusmanab@gmail.com', '4297f44b13955235245b2497399d7a93', '1', 2, NULL, NULL, '63ee451939ed580ef3c4b6f0109d1fd0', '2020-04-20 08:42:20', '2020-11-17 18:22:18', NULL, 0, 0);
INSERT INTO `tbl_users` VALUES (67, 'erina', '087872285060', 'ngoprex.ekagmail.com', NULL, NULL, NULL, NULL, '', 'test', 'tes', 'estse', 'ngoprex.ekagmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '1', 2, 'http://localhost/excellent/assets/themes/metronic/pages/media/profile/profile_user.jpg', NULL, '', '2020-04-21 09:51:25', '2020-05-14 15:21:01', NULL, 0, 0);
INSERT INTO `tbl_users` VALUES (68, 'Rusmana Basyar', '345345', 'rusmanab2@gmail.com', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 'rusmanab2@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '2', 0, NULL, NULL, '312fd2f3cabafc9417c35fd00efdaa5d', '2020-09-25 09:55:38', '2020-12-02 11:31:12', NULL, 0, 0);
INSERT INTO `tbl_users` VALUES (69, 'Ahmad Amul', '0878123123123', 'amoel@bulakrantai.com', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, 'amoel@bulakrantai.com', 'e10adc3949ba59abbe56e057f20f883e', '1', 0, NULL, NULL, 'c56d0e9a7ccec67b4ea131655038d604', '2022-05-30 10:52:04', '2022-05-30 15:53:04', NULL, 0, 0);

-- ----------------------------
-- Table structure for tbl_wishlist
-- ----------------------------
DROP TABLE IF EXISTS `tbl_wishlist`;
CREATE TABLE `tbl_wishlist`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NULL DEFAULT NULL,
  `product_id` int NULL DEFAULT NULL,
  `add_date` datetime(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = COMPACT;

-- ----------------------------
-- Records of tbl_wishlist
-- ----------------------------
INSERT INTO `tbl_wishlist` VALUES (1, 65, 5, '2020-02-20 16:16:01');
INSERT INTO `tbl_wishlist` VALUES (2, 65, 4, '2020-02-25 16:49:59');
INSERT INTO `tbl_wishlist` VALUES (3, 65, NULL, '2020-04-16 17:54:39');
INSERT INTO `tbl_wishlist` VALUES (4, 65, NULL, '2020-04-17 05:59:08');
INSERT INTO `tbl_wishlist` VALUES (5, 65, NULL, '2020-04-17 05:59:36');
INSERT INTO `tbl_wishlist` VALUES (6, 65, NULL, '2020-04-17 06:00:26');
INSERT INTO `tbl_wishlist` VALUES (7, 65, 2, '2020-04-17 06:02:02');
INSERT INTO `tbl_wishlist` VALUES (8, 65, 1, '2020-04-17 06:04:05');
INSERT INTO `tbl_wishlist` VALUES (10, 65, NULL, '2020-04-20 05:58:39');
INSERT INTO `tbl_wishlist` VALUES (11, 68, 17, '2020-04-21 10:26:33');
INSERT INTO `tbl_wishlist` VALUES (12, 66, NULL, '2020-09-23 18:50:31');

-- ----------------------------
-- Triggers structure for table tbl_order_history
-- ----------------------------
DROP TRIGGER IF EXISTS `updateOrderStatus`;
delimiter ;;
CREATE TRIGGER `updateOrderStatus` AFTER INSERT ON `tbl_order_history` FOR EACH ROW UPDATE tbl_orders o SET o.status_id = NEW.status_id WHERE o.id = NEW.order_id
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table tbl_product
-- ----------------------------
DROP TRIGGER IF EXISTS `deleteProduk`;
delimiter ;;
CREATE TRIGGER `deleteProduk` AFTER DELETE ON `tbl_product` FOR EACH ROW BEGIN
DELETE FROM tbl_product_category WHERE product_id = OLD.id;
DELETE FROM tbl_post WHERE id = OLD.post_id;
DELETE FROM tbl_product_image WHERE product_id = OLD.id;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table tbl_product_option
-- ----------------------------
DROP TRIGGER IF EXISTS `delpro_opt_val`;
delimiter ;;
CREATE TRIGGER `delpro_opt_val` AFTER DELETE ON `tbl_product_option` FOR EACH ROW BEGIN
DELETE FROM tbl_product_option_value WHERE product_option_id = OLD.product_option_id;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table tbl_product_rating
-- ----------------------------
DROP TRIGGER IF EXISTS `insertRating`;
delimiter ;;
CREATE TRIGGER `insertRating` AFTER INSERT ON `tbl_product_rating` FOR EACH ROW BEGIN
UPDATE tbl_product SET rating = rating + NEW.rating, rater = rater + 1 WHERE id = NEW.product_id;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
