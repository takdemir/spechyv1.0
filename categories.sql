/*
Navicat MySQL Data Transfer

Source Server         : spechy-dedicated
Source Server Version : 50552
Source Host           : 85.95.241.15:3306
Source Database       : admin_spechy

Target Server Type    : MYSQL
Target Server Version : 50552
File Encoding         : 65001

Date: 2017-07-07 01:14:24
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

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `visible` int(11) NOT NULL DEFAULT '1',
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `products_service` (`service_id`),
  CONSTRAINT `products_service` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', '4', 'Bireysel Linux Hosting-small', '1', '/product');
INSERT INTO `products` VALUES ('2', '4', 'Bireysel Linux Hosting-medium', '1', '/product');
INSERT INTO `products` VALUES ('3', '4', 'Bireysel Linux Hosting-large', '1', '/product');
INSERT INTO `products` VALUES ('4', '5', 'Bireysel Windows Hosting-small', '1', '/product');
INSERT INTO `products` VALUES ('5', '5', 'Bireysel Windows Hosting-medium', '1', '/product');
INSERT INTO `products` VALUES ('6', '5', 'Bireysel Windows Hosting-large', '1', '/product');
INSERT INTO `products` VALUES ('7', '6', 'Ded-pro-17-4c8r', '1', '/product');
INSERT INTO `products` VALUES ('8', '6', 'Ded-pro-17-8c8r', '1', '/product');
INSERT INTO `products` VALUES ('9', '7', 'Ded-pro-17-4c8r', '1', '/product');
INSERT INTO `products` VALUES ('10', '7', 'Ded-pro-17-8c8r', '1', '/product');
INSERT INTO `products` VALUES ('11', '8', 'Cloud-pro-17-4c8r', '1', '/product');
INSERT INTO `products` VALUES ('12', '8', 'Cloud-pro-17-8c8r', '1', '/product');
INSERT INTO `products` VALUES ('13', '9', 'Cloud-pro-17-4c8r', '1', '/product');
INSERT INTO `products` VALUES ('14', '9', 'Cloud-pro-17-8c8r', '1', '/product');
INSERT INTO `products` VALUES ('15', '10', 'Rapid SSL-EV', '1', '/product');
INSERT INTO `products` VALUES ('16', '11', 'Comodo SSL-EV', '1', '/product');
INSERT INTO `products` VALUES ('17', '12', 'Geotrust SSL-EV', '1', '/product');
INSERT INTO `products` VALUES ('18', '10', 'Rapid SSL-PRO', '1', '/product');
INSERT INTO `products` VALUES ('19', '11', 'Comodo SSL-PRO', '1', '/product');
INSERT INTO `products` VALUES ('20', '12', 'Geotrust SSL-PRO', '1', '/product');
INSERT INTO `products` VALUES ('21', '1', '.com', '1', '/product');
INSERT INTO `products` VALUES ('22', '1', '.net', '1', '/product');
INSERT INTO `products` VALUES ('23', '1', '.org', '1', '/product');
INSERT INTO `products` VALUES ('24', '2', '.com.tr', '1', '/product');
INSERT INTO `products` VALUES ('25', '2', '.net.tr', '1', '/product');
INSERT INTO `products` VALUES ('26', '2', '.org.tr', '1', '/product');

-- ----------------------------
-- Table structure for services
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `visible` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `service_category` (`category_id`),
  CONSTRAINT `service_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of services
-- ----------------------------
INSERT INTO `services` VALUES ('1', '1', 'Normal Tld', '1');
INSERT INTO `services` VALUES ('2', '1', '.tr Tld', '1');
INSERT INTO `services` VALUES ('4', '2', 'Linux Hosting', '1');
INSERT INTO `services` VALUES ('5', '2', 'Windows Hosting', '1');
INSERT INTO `services` VALUES ('6', '3', 'Linux Dedicated', '1');
INSERT INTO `services` VALUES ('7', '3', 'Windows Dedicated', '1');
INSERT INTO `services` VALUES ('8', '4', 'Linux Cloud', '1');
INSERT INTO `services` VALUES ('9', '4', 'Windows Cloud', '1');
INSERT INTO `services` VALUES ('10', '5', 'Rapid SSL', '1');
INSERT INTO `services` VALUES ('11', '5', 'Comodo SSL', '1');
INSERT INTO `services` VALUES ('12', '5', 'Geotrust SSL', '1');
SET FOREIGN_KEY_CHECKS=1;
