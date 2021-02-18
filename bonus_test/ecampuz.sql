/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : ecampuz

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 18/02/2021 15:15:11
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for msinstansi
-- ----------------------------
DROP TABLE IF EXISTS `msinstansi`;
CREATE TABLE `msinstansi`  (
  `inskd` int NOT NULL AUTO_INCREMENT COMMENT 'Kode Instansi',
  `insnm` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Nama Instansi',
  `insalamat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Alamat',
  `instelp` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL COMMENT 'Telp',
  PRIMARY KEY (`inskd`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of msinstansi
-- ----------------------------
INSERT INTO `msinstansi` VALUES (1, 'Ecampuz', 'Jalan', '09877383933');
INSERT INTO `msinstansi` VALUES (2, 'Ecampuz', 'Jalan', '09877383933');

-- ----------------------------
-- Table structure for mssetprog
-- ----------------------------
DROP TABLE IF EXISTS `mssetprog`;
CREATE TABLE `mssetprog`  (
  `setano` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `setchar` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `setket` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`setano`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of mssetprog
-- ----------------------------
INSERT INTO `mssetprog` VALUES ('nmpt', 'E Campuz', 'INFORMASI|Nama Instansi / PT');
INSERT INTO `mssetprog` VALUES ('pre', 'ec', 'INFORMASI|Prefix Untuk Kode Otomatis');
INSERT INTO `mssetprog` VALUES ('versi', '1.0', 'Versi');

-- ----------------------------
-- Table structure for msuserid
-- ----------------------------
DROP TABLE IF EXISTS `msuserid`;
CREATE TABLE `msuserid`  (
  `UsrANo` char(6) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `UsrKd` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `UsrNm` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `UsrPswd` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `UsrLock` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `UsrLsUpd` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `UsrLsUsr` char(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto` longblob NULL,
  PRIMARY KEY (`UsrANo`) USING BTREE,
  INDEX `UsrANo`(`UsrANo`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of msuserid
-- ----------------------------
INSERT INTO `msuserid` VALUES ('00001', 'admin', 'Admin', '123', 'N', '', '', NULL);

-- ----------------------------
-- Table structure for trlog
-- ----------------------------
DROP TABLE IF EXISTS `trlog`;
CREATE TABLE `trlog`  (
  `LogSeq` int NOT NULL AUTO_INCREMENT,
  `LogLsUpd` char(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `LogLsUsr` char(6) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `LogKet` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`LogSeq`) USING BTREE,
  INDEX `LogLsUsr`(`LogLsUsr`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3439534 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of trlog
-- ----------------------------
INSERT INTO `trlog` VALUES (3439533, '2102181459', '0', 'CREATE Instansi No. ec001 ');

SET FOREIGN_KEY_CHECKS = 1;
