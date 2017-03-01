/*
Navicat MySQL Data Transfer

Source Server         : root
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-03-01 17:01:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for think_attr
-- ----------------------------
DROP TABLE IF EXISTS `think_attr`;
CREATE TABLE `think_attr` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `attr_name` varchar(30) NOT NULL,
  `attr_type` enum('唯一','单选') DEFAULT '唯一',
  `attr_values` varchar(30) DEFAULT NULL,
  `type_id` int(6) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`),
  CONSTRAINT `type_id` FOREIGN KEY (`type_id`) REFERENCES `think_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='属性表';

-- ----------------------------
-- Records of think_attr
-- ----------------------------

-- ----------------------------
-- Table structure for think_brand
-- ----------------------------
DROP TABLE IF EXISTS `think_brand`;
CREATE TABLE `think_brand` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(30) NOT NULL,
  `brand_logo` varchar(100) NOT NULL,
  `brand_url` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='商品品牌表';

-- ----------------------------
-- Records of think_brand
-- ----------------------------
INSERT INTO `think_brand` VALUES ('21', '杜蕾斯', 'brand/2017-02-21/58abb41f70046.jpg', 'www.dls.com');
INSERT INTO `think_brand` VALUES ('22', '冈本', 'brand/2017-02-21/58abb6a108ea6.jpg', 'www.gb.com');

-- ----------------------------
-- Table structure for think_cate
-- ----------------------------
DROP TABLE IF EXISTS `think_cate`;
CREATE TABLE `think_cate` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `catename` varchar(30) NOT NULL,
  `pid` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='商品分类表';

-- ----------------------------
-- Records of think_cate
-- ----------------------------
INSERT INTO `think_cate` VALUES ('2', '酒类', '0');
INSERT INTO `think_cate` VALUES ('1', '皮具', '0');
INSERT INTO `think_cate` VALUES ('3', '护肤品', '0');
INSERT INTO `think_cate` VALUES ('4', '饮料', '0');
INSERT INTO `think_cate` VALUES ('11', '威士忌', '2');
INSERT INTO `think_cate` VALUES ('10', '白酒', '2');
INSERT INTO `think_cate` VALUES ('9', '五粮液', '5');

-- ----------------------------
-- Table structure for think_goods
-- ----------------------------
DROP TABLE IF EXISTS `think_goods`;
CREATE TABLE `think_goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(30) NOT NULL,
  `goods_sn` char(100) NOT NULL COMMENT '商品编号：8位日期+8位id',
  `original` varchar(100) DEFAULT NULL,
  `sm_thumb` varchar(100) DEFAULT NULL,
  `mid_thumb` varchar(100) DEFAULT NULL,
  `max_thumb` varchar(100) DEFAULT NULL,
  `market_price` decimal(10,2) DEFAULT NULL,
  `shop_price` decimal(10,2) DEFAULT NULL,
  `onsale` enum('是','否') DEFAULT '是' COMMENT '是否上架',
  `cate_id` smallint(5) DEFAULT '0',
  `brand_id` smallint(6) DEFAULT '0',
  `type_id` int(6) DEFAULT '0',
  `goods_desc` varchar(255) DEFAULT NULL,
  `goods_weight` decimal(10,2) DEFAULT NULL COMMENT '重量，用于计算运费',
  `weight_unit` enum('g','kg') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cate_id` (`cate_id`) USING BTREE,
  KEY `brand_id` (`brand_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_goods
-- ----------------------------
INSERT INTO `think_goods` VALUES ('3', 'aaa', '1488261990473260', 'goods/2017-02-28/58b513663135a.jpg', 'goods/2017-02-28/sm_58b513663135a.jpg', 'goods/2017-02-28/mid_58b513663135a.jpg', 'goods/2017-02-28/max_58b513663135a.jpg', '111.00', '1.00', '是', '1', '21', '0', '&lt;p&gt;aaa&lt;/p&gt;', '11.00', 'g');
INSERT INTO `think_goods` VALUES ('4', 'aa', '1488263500601580', 'goods/2017-02-28/58b5194cc9a6d.jpg', 'goods/2017-02-28/sm_58b5194cc9a6d.jpg', 'goods/2017-02-28/mid_58b5194cc9a6d.jpg', 'goods/2017-02-28/max_58b5194cc9a6d.jpg', '11.00', '11.00', '是', '1', '21', '0', '&lt;p&gt;aaa&lt;/p&gt;', '111.00', 'g');

-- ----------------------------
-- Table structure for think_goods_attr
-- ----------------------------
DROP TABLE IF EXISTS `think_goods_attr`;
CREATE TABLE `think_goods_attr` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `good_id` mediumint(8) unsigned DEFAULT NULL,
  `attr_id` mediumint(8) unsigned DEFAULT NULL,
  `attr_value` varchar(50) DEFAULT NULL,
  `attr_price` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品属性表';

-- ----------------------------
-- Records of think_goods_attr
-- ----------------------------

-- ----------------------------
-- Table structure for think_goods_pic
-- ----------------------------
DROP TABLE IF EXISTS `think_goods_pic`;
CREATE TABLE `think_goods_pic` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` mediumint(8) unsigned DEFAULT NULL,
  `original` varchar(100) DEFAULT NULL,
  `max_thumb` varchar(100) DEFAULT NULL,
  `min_thumb` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品预览图片表';

-- ----------------------------
-- Records of think_goods_pic
-- ----------------------------

-- ----------------------------
-- Table structure for think_member_level
-- ----------------------------
DROP TABLE IF EXISTS `think_member_level`;
CREATE TABLE `think_member_level` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `level_name` varchar(30) DEFAULT NULL COMMENT '会员等级',
  `points_min` mediumint(8) DEFAULT NULL COMMENT '积分下限',
  `points_max` mediumint(8) DEFAULT NULL COMMENT '积分上限',
  `rate` tinyint(4) unsigned NOT NULL COMMENT '折扣率0-100',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会员等级表';

-- ----------------------------
-- Records of think_member_level
-- ----------------------------

-- ----------------------------
-- Table structure for think_member_price
-- ----------------------------
DROP TABLE IF EXISTS `think_member_price`;
CREATE TABLE `think_member_price` (
  `id` mediumint(9) unsigned NOT NULL AUTO_INCREMENT,
  `price` decimal(10,2) DEFAULT NULL,
  `level_id` mediumint(9) unsigned DEFAULT NULL,
  `goods_id` mediumint(9) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品会员价格表';

-- ----------------------------
-- Records of think_member_price
-- ----------------------------

-- ----------------------------
-- Table structure for think_product
-- ----------------------------
DROP TABLE IF EXISTS `think_product`;
CREATE TABLE `think_product` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `goods_id` mediumint(8) unsigned DEFAULT NULL,
  `goods_number` mediumint(8) unsigned DEFAULT NULL,
  `goods_attr` varchar(150) DEFAULT NULL COMMENT '产品属性表中的id升序排列',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商品库存';

-- ----------------------------
-- Records of think_product
-- ----------------------------

-- ----------------------------
-- Table structure for think_type
-- ----------------------------
DROP TABLE IF EXISTS `think_type`;
CREATE TABLE `think_type` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `typename` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_type
-- ----------------------------

-- ----------------------------
-- Table structure for think_user
-- ----------------------------
DROP TABLE IF EXISTS `think_user`;
CREATE TABLE `think_user` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_user
-- ----------------------------
INSERT INTO `think_user` VALUES ('46', 'admin', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO `think_user` VALUES ('47', 'root', '63a9f0ea7bb98050796b649e85481845');
INSERT INTO `think_user` VALUES ('48', '单', '3e119ab537d3c4cc0c31b9277bfd785e');
