/*
Navicat MySQL Data Transfer

Source Server         : spechy-dedicated
Source Server Version : 50552
Source Host           : 85.95.241.15:3306
Source Database       : admin_spechy

Target Server Type    : MYSQL
Target Server Version : 50552
File Encoding         : 65001

Date: 2017-07-07 11:36:26
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for serviceProductRelation
-- ----------------------------
DROP TABLE IF EXISTS `serviceProductRelation`;
CREATE TABLE `serviceProductRelation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serviceId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  PRIMARY KEY (`id`,`serviceId`,`productId`),
  KEY `spr-service` (`serviceId`),
  KEY `spr-product` (`productId`),
  CONSTRAINT `spr-product` FOREIGN KEY (`productId`) REFERENCES `products` (`id`),
  CONSTRAINT `spr-service` FOREIGN KEY (`serviceId`) REFERENCES `services` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of serviceProductRelation
-- ----------------------------
INSERT INTO `serviceProductRelation` VALUES ('1', '4', '1');
INSERT INTO `serviceProductRelation` VALUES ('2', '4', '2');
INSERT INTO `serviceProductRelation` VALUES ('3', '4', '3');
INSERT INTO `serviceProductRelation` VALUES ('4', '5', '4');
INSERT INTO `serviceProductRelation` VALUES ('5', '5', '5');
INSERT INTO `serviceProductRelation` VALUES ('6', '5', '6');
INSERT INTO `serviceProductRelation` VALUES ('7', '6', '7');
INSERT INTO `serviceProductRelation` VALUES ('8', '6', '8');
INSERT INTO `serviceProductRelation` VALUES ('9', '7', '9');
SET FOREIGN_KEY_CHECKS=1;
