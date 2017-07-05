/*
Navicat MySQL Data Transfer

Source Server         : symfonyTester
Source Server Version : 50555
Source Host           : localhost:3306
Source Database       : symfonytester

Target Server Type    : MYSQL
Target Server Version : 50555
File Encoding         : 65001

Date: 2017-07-05 16:51:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  `visible` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES ('1', 'DOMAIN', '1');
INSERT INTO `categories` VALUES ('2', 'HOSTING', '1');
INSERT INTO `categories` VALUES ('3', 'SERVER', '1');
INSERT INTO `categories` VALUES ('4', 'CLOUD', '1');
INSERT INTO `categories` VALUES ('5', 'SSL', '1');
SET FOREIGN_KEY_CHECKS=1;
