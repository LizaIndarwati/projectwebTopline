/*
 Navicat Premium Data Transfer

 Source Server         : DB Local
 Source Server Type    : MySQL
 Source Server Version : 80030
 Source Host           : localhost:3306
 Source Schema         : db_topline

 Target Server Type    : MySQL
 Target Server Version : 80030
 File Encoding         : 65001

 Date: 19/12/2022 19:47:20
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_games
-- ----------------------------
DROP TABLE IF EXISTS `tbl_games`;
CREATE TABLE `tbl_games`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `gambar` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `harga` int NOT NULL,
  `jumlah` int NOT NULL,
  `satuan` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_games
-- ----------------------------
INSERT INTO `tbl_games` VALUES (2, 'covers_1670500100.jpg', 'PUBG', 11000, 100000, 'UC');

-- ----------------------------
-- Table structure for tbl_riwayat
-- ----------------------------
DROP TABLE IF EXISTS `tbl_riwayat`;
CREATE TABLE `tbl_riwayat`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `id_game` int NOT NULL,
  `game` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `jumlah_uang` int NOT NULL,
  `satuan` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `terkirim` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_riwayat
-- ----------------------------
INSERT INTO `tbl_riwayat` VALUES (1, 'reyhan', 0, 'Mobile Legend', '2022-11-12', 35, 'Diamond', 0);
INSERT INTO `tbl_riwayat` VALUES (2, 'reyhan', 2, 'PUBG', '2022-11-12', 35, 'UC', 1);

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL DEFAULT NULL,
  `tanggal_lahir` date NULL DEFAULT NULL,
  `foto` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb3 COLLATE = utf8mb3_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 'reyhan', '$2y$10$P/9Vr8iOHHEPuLptUPL7N.dZhy9ta3Gc7ljjmQRbdcta85KZcb2Vq', 'reyhan bin', 'Jakarta', '1900-01-01', 'd7d19ff875e1aba83b54931d91ffac46.jpg');

SET FOREIGN_KEY_CHECKS = 1;
