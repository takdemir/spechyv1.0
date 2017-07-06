/*
Navicat MySQL Data Transfer

Source Server         : spechy-dedicated
Source Server Version : 50552
Source Host           : 85.95.241.15:3306
Source Database       : admin_spechy

Target Server Type    : MYSQL
Target Server Version : 50552
File Encoding         : 65001

Date: 2017-07-07 01:14:44
*/

SET FOREIGN_KEY_CHECKS=0;

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
