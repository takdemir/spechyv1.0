/*
Navicat MySQL Data Transfer

Source Server         : symfonyTester
Source Server Version : 50555
Source Host           : localhost:3306
Source Database       : symfonytester

Target Server Type    : MYSQL
Target Server Version : 50555
File Encoding         : 65001

Date: 2017-07-05 16:51:30
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `visible` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `products_service` (`service_id`),
  CONSTRAINT `products_service` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', '4', 'Bireysel Linux Hosting-small', '1');
INSERT INTO `products` VALUES ('2', '4', 'Bireysel Linux Hosting-medium', '1');
INSERT INTO `products` VALUES ('3', '4', 'Bireysel Linux Hosting-large', '1');
INSERT INTO `products` VALUES ('4', '5', 'Bireysel Windows Hosting-small', '1');
INSERT INTO `products` VALUES ('5', '5', 'Bireysel Windows Hosting-medium', '1');
INSERT INTO `products` VALUES ('6', '5', 'Bireysel Windows Hosting-large', '1');
INSERT INTO `products` VALUES ('7', '6', 'Ded-pro-16-4x8y', '1');
INSERT INTO `products` VALUES ('8', '6', 'Ded-pro-16-8x8y', '1');
INSERT INTO `products` VALUES ('9', '7', 'Ded-pro-17-4x8y', '1');
INSERT INTO `products` VALUES ('10', '7', 'Ded-pro-17-8x8y', '1');
INSERT INTO `products` VALUES ('11', '8', 'Cloud-pro-16-4x8y', '1');
INSERT INTO `products` VALUES ('12', '8', 'Cloud-pro-16-8x8y', '1');
INSERT INTO `products` VALUES ('13', '9', 'Cloud-pro-17-4x8y', '1');
INSERT INTO `products` VALUES ('14', '9', 'Cloud-pro-17-8x8y', '1');
INSERT INTO `products` VALUES ('15', '10', 'Rapid SSL-EV', '1');
INSERT INTO `products` VALUES ('16', '11', 'Comodo SSL-EV', '1');
INSERT INTO `products` VALUES ('17', '12', 'Geotrust SSL-EV', '1');
INSERT INTO `products` VALUES ('18', '10', 'Rapid SSL-PRO', '1');
INSERT INTO `products` VALUES ('19', '11', 'Comodo SSL-PRO', '1');
INSERT INTO `products` VALUES ('20', '12', 'Geotrust SSL-PRO', '1');
SET FOREIGN_KEY_CHECKS=1;
