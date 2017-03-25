/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : sslc

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-03-25 18:29:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `one_category`
-- ----------------------------
DROP TABLE IF EXISTS `one_category`;
CREATE TABLE `one_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '分类ID',
  `name` varchar(30) NOT NULL COMMENT '标志',
  `title` varchar(50) NOT NULL COMMENT '标题',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序（同级有效）',
  `list_row` tinyint(3) unsigned NOT NULL DEFAULT '10' COMMENT '列表每页行数',
  `meta_title` varchar(50) NOT NULL DEFAULT '' COMMENT 'SEO的网页标题',
  `keywords` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `check` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '发布的文章是否需要审核',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '数据状态',
  `icon` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分类图标',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uk_name` (`name`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=47 DEFAULT CHARSET=utf8 COMMENT='分类表';

-- ----------------------------
-- Records of one_category
-- ----------------------------
INSERT INTO `one_category` VALUES ('1', 'wechat_source', '微信资源类型', '0', '0', '10', '', '', '', '0', '1379474947', '1382701539', '1', '0');
INSERT INTO `one_category` VALUES ('2', 'source_text', '文本', '1', '1', '10', '', '', '', '1', '1379475028', '1386839751', '1', '0');
INSERT INTO `one_category` VALUES ('39', 'source_tw', '图文', '1', '0', '10', '', '', '', '0', '1379475028', '1386839751', '1', '0');
INSERT INTO `one_category` VALUES ('40', 'wechat_event', '微信事件', '0', '0', '10', '', '', '', '0', '1379475028', '1386839751', '1', '0');
INSERT INTO `one_category` VALUES ('41', 'event_subscribe', '关注', '40', '0', '10', '', '', '', '0', '1379475028', '1386839751', '1', '0');
INSERT INTO `one_category` VALUES ('42', 'event_sendwz', '发送位置', '40', '0', '10', '', '', '', '0', '1379475028', '1386839751', '1', '0');
INSERT INTO `one_category` VALUES ('43', 'wechat_keyword', '微信关键词类型', '0', '0', '10', '', '', '', '0', '1379475028', '1386839751', '1', '0');
INSERT INTO `one_category` VALUES ('44', 'keyword_mh', '模糊匹配', '43', '0', '10', '', '', '', '0', '1379475028', '1386839751', '1', '0');
INSERT INTO `one_category` VALUES ('45', 'keyword_jq', '精确匹配', '43', '0', '10', '', '', '', '0', '1379475028', '1386839751', '1', '0');
INSERT INTO `one_category` VALUES ('46', 'music', '音频', '39', '0', '10', '', '', '', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `one_menu`
-- ----------------------------
DROP TABLE IF EXISTS `one_menu`;
CREATE TABLE `one_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '文档ID',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
  `pid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级分类ID',
  `sort` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序（同级有效）',
  `url` char(255) NOT NULL DEFAULT '' COMMENT '链接地址',
  `hide` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否隐藏',
  `tip` varchar(255) NOT NULL DEFAULT '' COMMENT '提示',
  `group` varchar(50) DEFAULT '' COMMENT '分组',
  `is_dev` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否仅开发者模式可见',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`) USING BTREE,
  KEY `status` (`status`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of one_menu
-- ----------------------------
INSERT INTO `one_menu` VALUES ('1', '首页', '0', '0', '/admin/index', '0', '', '', '0', '0');
INSERT INTO `one_menu` VALUES ('2', '项目管理', '0', '0', '/teaching/section', '0', '', '', '0', '0');
INSERT INTO `one_menu` VALUES ('3', '考试管理', '0', '0', '/exam/index', '0', '', '', '0', '0');
INSERT INTO `one_menu` VALUES ('4', '用户', '0', '0', '', '0', '', '', '0', '0');
INSERT INTO `one_menu` VALUES ('5', '资金管理', '0', '0', '', '0', '', '', '0', '0');
INSERT INTO `one_menu` VALUES ('6', '活动应用', '0', '0', '', '0', '', '', '0', '0');
INSERT INTO `one_menu` VALUES ('7', '合作商', '0', '0', '', '0', '', '', '0', '0');
INSERT INTO `one_menu` VALUES ('8', '微信管理', '0', '0', '/wechat/ga', '0', '', '', '0', '0');
INSERT INTO `one_menu` VALUES ('9', '扩展', '0', '0', '', '0', '', '', '0', '0');
INSERT INTO `one_menu` VALUES ('10', '系统', '0', '0', '/system/cat', '0', '', '', '0', '0');
INSERT INTO `one_menu` VALUES ('11', '新闻列表', '2', '0', '/news/index', '0', '', '资讯', '0', '0');
INSERT INTO `one_menu` VALUES ('12', '章节管理', '2', '0', '/teaching/section', '0', '', '教学视频', '0', '0');
INSERT INTO `one_menu` VALUES ('13', '讲师管理', '2', '0', '/teaching/teacher', '0', '', '教学视频', '0', '0');
INSERT INTO `one_menu` VALUES ('14', '视频管理', '2', '0', '/teaching/video', '0', '', '教学视频', '0', '0');
INSERT INTO `one_menu` VALUES ('15', 'App首页视频管理', '2', '0', '', '0', '', '教学视频', '0', '0');
INSERT INTO `one_menu` VALUES ('16', '题库管理', '3', '0', '/exam/index', '0', '', '题库', '0', '0');
INSERT INTO `one_menu` VALUES ('17', '我的公众号', '8', '0', '/wechat/ga', '0', '', '公众号管理', '0', '0');
INSERT INTO `one_menu` VALUES ('18', '运营活动', '8', '0', '/wechat/active', '0', '', '公众号管理', '0', '0');
INSERT INTO `one_menu` VALUES ('19', '网站设置', '10', '0', '/system/webset', '0', '', '系统设置', '0', '0');
INSERT INTO `one_menu` VALUES ('20', '分类管理', '10', '0', '/system/cat', '0', '', '系统设置', '0', '0');
INSERT INTO `one_menu` VALUES ('21', '菜单管理', '10', '0', '/system/menu', '0', '', '系统设置', '0', '0');
INSERT INTO `one_menu` VALUES ('22', '自定义菜单', '8', '0', '/onewechat/menu', '0', '', '公众号平台', '0', '0');
INSERT INTO `one_menu` VALUES ('23', '资源配置', '8', '0', '/wechat/source', '0', '', '公众号管理', '0', '0');
INSERT INTO `one_menu` VALUES ('24', '关键词回复', '8', '0', '/onewechat/keyword', '0', '', '公众号平台', '0', '0');
INSERT INTO `one_menu` VALUES ('25', '事件回复', '8', '0', '/onewechat/event', '0', '', '公众号平台', '0', '0');
INSERT INTO `one_menu` VALUES ('26', '公众号列表', '17', '0', '/ga/index', '0', '', '公众号平台', '0', '0');
INSERT INTO `one_menu` VALUES ('28', '公众号', '17', '0', '/ga/store', '0', '', '公众号平台', '1', '0');
INSERT INTO `one_menu` VALUES ('29', '删除资源', '8', '0', '/wechat/delete', '0', '', '公众号管理', '1', '0');

-- ----------------------------
-- Table structure for `one_news`
-- ----------------------------
DROP TABLE IF EXISTS `one_news`;
CREATE TABLE `one_news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL COMMENT '文章标签',
  `uid` int(10) NOT NULL,
  `contents` text NOT NULL COMMENT '内容',
  `type` tinyint(1) NOT NULL COMMENT '资源类型：1、微信文本；2、微信图文；3、资讯',
  `fid` int(10) NOT NULL COMMENT '分类ID',
  `description` text NOT NULL COMMENT '描述',
  `img` varchar(255) NOT NULL COMMENT '图片',
  `url` varchar(255) NOT NULL COMMENT '外链',
  `sort` int(10) NOT NULL COMMENT '排序',
  `read_num` int(10) NOT NULL COMMENT '阅读量',
  `click_num` int(10) NOT NULL COMMENT '点赞数',
  `create_time` int(11) NOT NULL,
  `update_time` int(11) NOT NULL,
  `state` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of one_news
-- ----------------------------
INSERT INTO `one_news` VALUES ('16', '【雨天行车】如何优雅涉水？', '', '1', '<p>\r\n	<img src=\"/Uploads/Editor/2016-11-14/5829323319558.jpg\" alt=\"\" />\r\n</p>\r\n<p>\r\n	<img src=\"/Uploads/Editor/2016-11-14/5829323b7d5b4.jpg\" alt=\"\" />\r\n</p>\r\n<p>\r\n	<img src=\"/Uploads/Editor/2016-11-14/58293242cfb04.jpg\" alt=\"\" />\r\n</p>\r\n<p>\r\n	<img src=\"/Uploads/Editor/2016-11-14/5829324a46f7c.jpg\" alt=\"\" />\r\n</p>', '1', '104', '', '73', '', '0', '0', '0', '1479094865', '0', '1');
INSERT INTO `one_news` VALUES ('17', '如何快速目测横向车距？', '', '1', '<p>\r\n	<img src=\"/Uploads/Editor/2016-11-14/5829352d250ff.jpg\" alt=\"\" />\r\n</p>\r\n<p>\r\n	<img src=\"/Uploads/Editor/2016-11-14/58293534b71c6.jpg\" alt=\"\" />\r\n</p>\r\n<p>\r\n	<img src=\"/Uploads/Editor/2016-11-14/5829353bd2403.jpg\" alt=\"\" />\r\n</p>', '1', '104', '', '74', '', '0', '0', '0', '1479095648', '0', '1');
INSERT INTO `one_news` VALUES ('18', '10万时尚教练拭目以待：智能硬件要颠覆驾培行业！', '', '1', '<p>\r\n	<img src=\"/Uploads/Editor/2016-11-16/582bd5152b0f6.jpg\" alt=\"\" /> \r\n</p>\r\n<p>\r\n	<img src=\"/Uploads/Editor/2016-11-16/582bd51e30592.jpg\" alt=\"\" />\r\n</p>\r\n<p>\r\n	<img src=\"/Uploads/Editor/2016-11-16/582bd526b1ee5.jpg\" alt=\"\" /> \r\n</p>\r\n<p>\r\n	<img src=\"/Uploads/Editor/2016-11-16/582bd52f9653a.jpg\" alt=\"\" /> \r\n</p>\r\n<p>\r\n	<img src=\"/Uploads/Editor/2016-11-16/582bd5375ff57.jpg\" alt=\"\" /> \r\n</p>\r\n<p>\r\n	<img src=\"/Uploads/Editor/2016-11-16/582bd53ee67a9.jpg\" alt=\"\" /> \r\n</p>\r\n<p>\r\n	<img src=\"/Uploads/Editor/2016-11-16/582bd5464c07d.jpg\" alt=\"\" /> \r\n</p>', '1', '172', '', '80', '', '0', '0', '0', '1479267672', '0', '1');
INSERT INTO `one_news` VALUES ('206', 'aaa', 'bbb', '0', '第一个文本', '1', '0', 'ccc', '', '', '3', '2', '4', '1490432205', '1490433443', '0');
INSERT INTO `one_news` VALUES ('207', '测试新增图文', '图文', '0', '第一个图文内容', '2', '0', '图文', '', '', '3', '5', '2', '1490432317', '1490433453', '0');

-- ----------------------------
-- Table structure for `one_wechat_galist`
-- ----------------------------
DROP TABLE IF EXISTS `one_wechat_galist`;
CREATE TABLE `one_wechat_galist` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '公众号命名',
  `type` tinyint(1) NOT NULL COMMENT '公众号类型',
  `appid` varchar(255) NOT NULL,
  `appsecret` varchar(255) NOT NULL,
  `partnerKey` varchar(255) NOT NULL COMMENT '支付密钥',
  `partnerId` varchar(255) NOT NULL COMMENT '商户号',
  `owner` int(10) NOT NULL COMMENT '拥有者',
  `api_token` varchar(255) NOT NULL COMMENT '接入令牌',
  `api_url` varchar(255) NOT NULL COMMENT '接入地址',
  `create_time` int(10) NOT NULL,
  `update_time` int(10) NOT NULL,
  `state` tinyint(1) NOT NULL COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of one_wechat_galist
-- ----------------------------
INSERT INTO `one_wechat_galist` VALUES ('1', '111aaa', '0', '444', '555', '777', '666', '0', '222', '333', '1489471870', '1490060416', '0');
INSERT INTO `one_wechat_galist` VALUES ('2', 'aaa', '0', 'ddd', 'eee', 'ggg', 'fff', '0', 'bbb', 'ccc', '1489471888', '1489471888', '0');
INSERT INTO `one_wechat_galist` VALUES ('3', 'a', '0', 'd', 'e', 'g', 'f', '0', 'b', 'v', '1489472763', '1489472763', '0');
INSERT INTO `one_wechat_galist` VALUES ('4', '222', '0', '222', '222', '222', '2222', '0', '222', '222', '1490058862', '1490058862', '0');
INSERT INTO `one_wechat_galist` VALUES ('5', '333', '0', '333', '333', '', '333', '0', '333', '333', '1490059619', '1490059619', '0');

-- ----------------------------
-- Table structure for `one_wechat_log`
-- ----------------------------
DROP TABLE IF EXISTS `one_wechat_log`;
CREATE TABLE `one_wechat_log` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `log` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of one_wechat_log
-- ----------------------------
INSERT INTO `one_wechat_log` VALUES ('25', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('26', 'bbb');
INSERT INTO `one_wechat_log` VALUES ('27', 'ddd');
INSERT INTO `one_wechat_log` VALUES ('28', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('29', 'bbb');
INSERT INTO `one_wechat_log` VALUES ('30', 'ddd');
INSERT INTO `one_wechat_log` VALUES ('31', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('32', 'bbb');
INSERT INTO `one_wechat_log` VALUES ('33', 'ddd');
INSERT INTO `one_wechat_log` VALUES ('34', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('35', 'bbb');
INSERT INTO `one_wechat_log` VALUES ('36', 'ddd');
INSERT INTO `one_wechat_log` VALUES ('37', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('38', 'bbb');
INSERT INTO `one_wechat_log` VALUES ('39', 'ddd');
INSERT INTO `one_wechat_log` VALUES ('40', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('41', 'bbb');
INSERT INTO `one_wechat_log` VALUES ('42', 'ddd');
INSERT INTO `one_wechat_log` VALUES ('43', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('44', 'bbb');
INSERT INTO `one_wechat_log` VALUES ('45', 'ddd');
INSERT INTO `one_wechat_log` VALUES ('46', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('47', 'bbb');
INSERT INTO `one_wechat_log` VALUES ('48', 'ddd');
INSERT INTO `one_wechat_log` VALUES ('49', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('50', 'bbb');
INSERT INTO `one_wechat_log` VALUES ('51', 'ddd');
INSERT INTO `one_wechat_log` VALUES ('52', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('53', 'bbb');
INSERT INTO `one_wechat_log` VALUES ('54', 'ddd');
INSERT INTO `one_wechat_log` VALUES ('55', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('56', 'bbb');
INSERT INTO `one_wechat_log` VALUES ('57', 'ddd');
INSERT INTO `one_wechat_log` VALUES ('58', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('59', 'bbb');
INSERT INTO `one_wechat_log` VALUES ('60', 'ddd');
INSERT INTO `one_wechat_log` VALUES ('61', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('62', 'bbb');
INSERT INTO `one_wechat_log` VALUES ('63', 'ddd');
INSERT INTO `one_wechat_log` VALUES ('64', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('65', 'bbb');
INSERT INTO `one_wechat_log` VALUES ('66', 'ddd');
INSERT INTO `one_wechat_log` VALUES ('67', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('68', 'bbb');
INSERT INTO `one_wechat_log` VALUES ('69', 'ddd');
INSERT INTO `one_wechat_log` VALUES ('70', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('71', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('72', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('73', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('74', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('75', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('76', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('77', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('78', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('79', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('80', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('81', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('82', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('83', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('84', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('85', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('86', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('87', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('88', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('89', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('90', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('91', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('92', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('93', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('94', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('95', 'aaa');
INSERT INTO `one_wechat_log` VALUES ('96', 'aaa');

-- ----------------------------
-- Table structure for `prefix_apps`
-- ----------------------------
DROP TABLE IF EXISTS `prefix_apps`;
CREATE TABLE `prefix_apps` (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增长',
  `app_id` varchar(60) NOT NULL COMMENT 'appid',
  `app_secret` varchar(100) NOT NULL COMMENT '密钥',
  `app_name` varchar(200) NOT NULL COMMENT 'app名称',
  `app_desc` text COMMENT '描述',
  `status` tinyint(2) DEFAULT '0' COMMENT '生效状态',
  `created_at` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `app_id` (`app_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='应用表';

-- ----------------------------
-- Records of prefix_apps
-- ----------------------------
