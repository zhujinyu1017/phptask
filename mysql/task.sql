/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-10-08 17:17:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for zjy_article
-- ----------------------------
DROP TABLE IF EXISTS `zjy_article`;
CREATE TABLE `zjy_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '标题',
  `tag` varchar(255) DEFAULT NULL COMMENT '标签',
  `classify` varchar(255) DEFAULT NULL COMMENT '分类',
  `isthumb` varchar(255) DEFAULT NULL COMMENT '是否显示缩略图',
  `thumb` varchar(255) DEFAULT NULL COMMENT '缩略图地址',
  `content` blob COMMENT '文章内容',
  `code` blob COMMENT '代码',
  `isDel` int(2) DEFAULT '0' COMMENT '是否删除',
  `isIndex` int(2) DEFAULT '0' COMMENT '首页是否显示',
  `follow` int(11) NOT NULL DEFAULT '3' COMMENT '关注数',
  `describe` varchar(255) DEFAULT NULL COMMENT '描述',
  `updateTime` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for zjy_classify
-- ----------------------------
DROP TABLE IF EXISTS `zjy_classify`;
CREATE TABLE `zjy_classify` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '分类名',
  `rank` int(11) NOT NULL COMMENT '排序',
  `visible` int(11) DEFAULT NULL COMMENT '是否可见',
  `pid` int(255) DEFAULT NULL COMMENT '父类型的id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for zjy_collection
-- ----------------------------
DROP TABLE IF EXISTS `zjy_collection`;
CREATE TABLE `zjy_collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `articleID` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT '用户id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for zjy_column
-- ----------------------------
DROP TABLE IF EXISTS `zjy_column`;
CREATE TABLE `zjy_column` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '栏目名',
  `rank` int(11) DEFAULT NULL,
  `visible` int(11) DEFAULT NULL COMMENT '是否可见',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for zjy_follow
-- ----------------------------
DROP TABLE IF EXISTS `zjy_follow`;
CREATE TABLE `zjy_follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `articleID` int(11) NOT NULL,
  `uid` int(11) NOT NULL COMMENT '用户id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for zjy_member
-- ----------------------------
DROP TABLE IF EXISTS `zjy_member`;
CREATE TABLE `zjy_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '账户',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `avatar` varchar(255) DEFAULT NULL COMMENT '头像',
  `registertime` datetime DEFAULT NULL COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for zjy_tag
-- ----------------------------
DROP TABLE IF EXISTS `zjy_tag`;
CREATE TABLE `zjy_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '标签',
  `visible` int(11) DEFAULT NULL COMMENT '是否可见',
  `icon` varchar(255) DEFAULT NULL COMMENT '图标',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for zjy_user
-- ----------------------------
DROP TABLE IF EXISTS `zjy_user`;
CREATE TABLE `zjy_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `info` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL COMMENT '头像',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
SET FOREIGN_KEY_CHECKS=1;
