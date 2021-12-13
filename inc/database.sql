/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : blog

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 13/12/2021 13:43:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `description` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Softwares', 'news', 1, '2019-12-06 08:04:56');
INSERT INTO `categories` VALUES (4, 'tutorials', 'desc', 1, '2019-11-20 09:28:22');
INSERT INTO `categories` VALUES (25, 'Tech', 'desc', 1, '2019-11-20 09:28:22');
INSERT INTO `categories` VALUES (29, 'Fahad', 'from json decode', 1, '2019-11-20 09:28:22');

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `title` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `body` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `user_id` int(11) NULL DEFAULT NULL,
  `image` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 58 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO `posts` VALUES (11, 1, 'Microsoft Office 365 Is Now Available On Apple\'s Mac Store.', 'Last year at WWDC Apple promised to launch Microsoft Office 365. Apple has finally announced on Thursday that Microsoft Office 365 is now available on Mac App Store. Users can now directly download the signature Microsoft apps such as Outlook, Word, PowerPoint, OneNote, and Excel on their MacOS computers.', 0, 7, 'image2.jpg', '2019-11-01 07:05:41');
INSERT INTO `posts` VALUES (33, 25, '5 Best Artificial Intelligence Books', 'Recently Apple has been granted a patent for small-sized sensors that could detect the presence of harmful gases like carbon monoxide. These sensors could be installed on future Apple products like iPhone, iPad, and Apple Watch.\r\n                    This small-sized sensor can detect major harmful gases like Carbon Monoxide (CO), Ozone (O3), Nitrogen Dioxide (NO2), Nitrogen Monoxide (NO), Sulphur Dioxide (SO2), Methane (CH4) and volatile organic compounds (VOCs).', 1, NULL, 'image1.jpg', '2019-11-01 07:07:11');
INSERT INTO `posts` VALUES (44, 1, 'Best IOS System Repaire Tool To Get You Out Of All Kinds Of IPhone ', 'Tenorshare ReiBoot is a wonderful iOS devices boot repair tool which enables you to fix various issues such as recovery mode, white Apple logo, black screen, frozen screen, disabled screen, headphone mode etc., without losing even a single byte of data.', 1, 1, 'image3.jpg', '2019-11-01 07:16:16');
INSERT INTO `posts` VALUES (57, 29, 'Welcome to somcodersblog Dashaboard', 'Welcome to somcodersblog Dashaboard', 1, 7, '1336524717.jpg', '2021-12-13 13:28:28');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (4, 'Awil', 'AbdiAwil', 'arday2@somcoders.com', '$2y$10$vAMxn2kPo0/EFMfJU8wUzuqHbffbTIWtR5zxfc2BfdrMnpkM9HJoS', 1, '2020-01-17 15:00:19');
INSERT INTO `users` VALUES (5, 'Qof Cusub', 'qofcusub', 'cusub@som.so', '$2y$10$Gr3Xtc6JQqX0kYGTQZ7Hxe0PaMFAxYBcC7h4I2/POyoIp5ggZtZgy', 0, '2020-01-17 15:13:09');
INSERT INTO `users` VALUES (7, 'Fahad Awil', 'fahadsom', 'fahadsom@gmail.com', '$2y$12$slkcm1HvfbyaaGzTPKXe/eHDIhBmJDI5qoIrNEVlwNrdjVyPdLlQC', 1, '2020-03-27 07:36:41');
INSERT INTO `users` VALUES (8, 'jamac', 'jj', 'jj@somcoders.com', '$2y$10$KC0.B5y9G9PqYds5nlc5XOXdwCaEKfk3hZ9i/Cb7SaqraGBav/y5e', 0, '2020-06-27 09:55:00');

SET FOREIGN_KEY_CHECKS = 1;
