/*
Navicat MySQL Data Transfer

Source Server         : spechy-dedicated
Source Server Version : 50552
Source Host           : 85.95.241.15:3306
Source Database       : admin_spechy

Target Server Type    : MYSQL
Target Server Version : 50552
File Encoding         : 65001

Date: 2017-07-07 08:29:52
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
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `products_service` (`service_id`),
  CONSTRAINT `products_service` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', '4', 'Bireysel Linux Hosting-small', '1', 'bireysel-linux-hosting-small');
INSERT INTO `products` VALUES ('2', '4', 'Bireysel Linux Hosting-medium', '1', 'bireysel-linux-hosting-medium');
INSERT INTO `products` VALUES ('3', '4', 'Bireysel Linux Hosting-large', '1', 'bireysel-linux-hosting-large');
INSERT INTO `products` VALUES ('4', '5', 'Bireysel Windows Hosting-small', '1', 'bireysel-windows-hosting-small');
INSERT INTO `products` VALUES ('5', '5', 'Bireysel Windows Hosting-medium', '1', 'bireysel-windows-hosting-medium');
INSERT INTO `products` VALUES ('6', '5', 'Bireysel Windows Hosting-large', '1', 'bireysel-windows-hosting-large');
INSERT INTO `products` VALUES ('7', '6', 'Ded-pro-17-4c8r', '1', 'l-ded-pro-17-4c8r');
INSERT INTO `products` VALUES ('8', '6', 'Ded-pro-17-8c8r', '1', 'l-ded-pro-17-8c8r');
INSERT INTO `products` VALUES ('9', '7', 'Ded-pro-17-4c8r', '1', 'w-ded-pro-17-4c8r');
INSERT INTO `products` VALUES ('10', '7', 'Ded-pro-17-8c8r', '1', 'w-ded-pro-17-8c8r');
INSERT INTO `products` VALUES ('11', '8', 'Cloud-pro-17-4c8r', '1', 'l-cloud-pro-17-4c8r');
INSERT INTO `products` VALUES ('12', '8', 'Cloud-pro-17-8c8r', '1', 'l-cloud-pro-17-8c8r');
INSERT INTO `products` VALUES ('13', '9', 'Cloud-pro-17-4c8r', '1', 'w-cloud-pro-17-4c8r');
INSERT INTO `products` VALUES ('14', '9', 'Cloud-pro-17-8c8r', '1', 'w-cloud-pro-17-8c8r');
INSERT INTO `products` VALUES ('15', '10', 'Rapid SSL-EV', '1', 'rapid-ssl-ev');
INSERT INTO `products` VALUES ('16', '11', 'Comodo SSL-EV', '1', 'comodo-ssl-ev');
INSERT INTO `products` VALUES ('17', '12', 'Geotrust SSL-EV', '1', 'geotrust-ssl-ev');
INSERT INTO `products` VALUES ('18', '10', 'Rapid SSL-PRO', '1', 'rapid-ssl-pro');
INSERT INTO `products` VALUES ('19', '11', 'Comodo SSL-PRO', '1', 'comodo-ssl-pro');
INSERT INTO `products` VALUES ('20', '12', 'Geotrust SSL-PRO', '1', 'geotrust-ssl-pro');
INSERT INTO `products` VALUES ('21', '1', '.com', '1', '.com');
INSERT INTO `products` VALUES ('22', '1', '.net', '1', '.net');
INSERT INTO `products` VALUES ('23', '1', '.org', '1', '.org');
INSERT INTO `products` VALUES ('24', '2', '.com.tr', '1', '.com-tr');
INSERT INTO `products` VALUES ('25', '2', '.net.tr', '1', '.net-tr');
INSERT INTO `products` VALUES ('26', '2', '.org.tr', '1', '.org-tr');
INSERT INTO `products` VALUES ('27', '1', '.info', '1', '.info');
INSERT INTO `products` VALUES ('28', '2', '.info.tr', '1', '.info-tr');
SET FOREIGN_KEY_CHECKS=1;
