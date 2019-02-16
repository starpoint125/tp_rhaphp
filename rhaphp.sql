/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50714
 Source Host           : localhost:3306
 Source Schema         : rhaphp

 Target Server Type    : MySQL
 Target Server Version : 50714
 File Encoding         : 65001

 Date: 22/12/2018 17:52:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for rh_addon_info
-- ----------------------------
DROP TABLE IF EXISTS `rh_addon_info`;
CREATE TABLE `rh_addon_info`  (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `mpid` int(10) NOT NULL COMMENT '公众号标识',
  `addon` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '插件标识',
  `infos` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '配置信息',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '插件配置参数表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_addons
-- ----------------------------
DROP TABLE IF EXISTS `rh_addons`;
CREATE TABLE `rh_addons`  (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '插件名称',
  `addon` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标识名',
  `desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '描述',
  `version` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '版本号',
  `author` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '作者姓名',
  `logo` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'LOGO',
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '状态',
  `config` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '插件配置',
  `entry_url` varchar(160) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '前端入口',
  `admin_url` varchar(160) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '后台入口',
  `menu_show` tinyint(1) NOT NULL COMMENT '是否在菜单显示1：显示0：隐藏',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `addon`(`addon`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '应用表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rh_addons
-- ----------------------------
INSERT INTO `rh_addons` VALUES (1, '微信红包', 'redPack', '有钱就任性，活动营销-红包爱怎么发就怎么发', '1.0', 'Geeson', 'http://local.rhaphp.com/addons/redPack/logo.jpg', 1, '[{\"name\":\"amount\",\"title\":\"\\u7ea2\\u5305\\u603b\\u989d\",\"type\":\"text\",\"value\":\"0\",\"placeholder\":\"\",\"tip\":\"\\u5355\\u4f4d\\/\\u5143\"},{\"name\":\"money\",\"title\":\"\\u7ea2\\u5305\\u91d1\\u989d\",\"type\":\"text\",\"value\":\"1\",\"placeholder\":\"\",\"tip\":\"\\u9886\\u53d6\\u7ea2\\u5305\\u4efd\\u989d\\uff0c\\u6ce8\\u610f\\u7ea2\\u5305\\u91d1\\u989d\\u5fae\\u4fe1\\u4e0d\\u80fd\\u4f4e\\u4e8e1\\u868a\\u9e21\\uff081\\u5143\\u94b1\\uff09\\u3002\"},{\"name\":\"nick_name\",\"title\":\"\\u63d0\\u4f9b\\u65b9\\u540d\",\"type\":\"text\",\"value\":\"\",\"placeholder\":\"\",\"tip\":\"\\u5217\\u5982\\uff1a\\u7eee\\u68a6\\u79d1\\u6280\\u3001 RhaPHP\\u3001\\u51b0\\u51b0\\u5de5\\u4f5c\\u5ba4\\u7b49\\u7b49\\u3002\"},{\"name\":\"send_name\",\"title\":\"\\u7ea2\\u5305\\u53d1\\u9001\\u8005\\u540d\",\"type\":\"text\",\"value\":\"\",\"placeholder\":\"\",\"tip\":\"\\u4f8b\\u5982\\uff1a\\u51b0\\u51b0\\u3001\\u52aa\\u529b\\u5c31\\u6709\\u5e0c\\u671b\\u3001\\u6709\\u94b1\\u7684\\u4e8c\\u72d7\\u5b50\\u7b49\\u7b49\\uff0c\\u5b57\\u6570\\u5c3d\\u91cf\\u4e0d\\u8981\\u592a\\u591a\\u3002\"},{\"name\":\"wishing\",\"title\":\"\\u7ea2\\u5305\\u795d\\u798f\\u8bed\",\"type\":\"text\",\"value\":\"\",\"placeholder\":\"\",\"tip\":\"\\u4f8b\\u5982\\uff1a\\u606d\\u559c\\u53d1\\u8d22\\u3001\\u65e9\\u751f\\u8d35\\u5b50\\u3001\\u65e9\\u65e5\\u5206\\u624b\\u3001\\u4f60\\u60f3\\u5bf9\\u9886\\u53d6\\u7ea2\\u5305\\u7684\\u4eba\\u8bf4\\u7684\\u8bdd\\u3002\"},{\"name\":\"reply_msg\",\"title\":\"\\u6210\\u529f\\u56de\\u590d\",\"type\":\"text\",\"value\":\"\\u7ea2\\u5305\\u53d1\\u653e\\u6210\\u529f\\uff0c\\u8bf7\\u4f60\\u7ee7\\u7eed\\u5173\\u6ce8\\u6d3b\\u52a8\\uff0c\\u540e\\u9762\\u798f\\u5229\\u591a\\u591a\\uff01\",\"placeholder\":\"\",\"tip\":\"\\u7ea2\\u5305\\u53d1\\u9001\\u6210\\u529f\\uff0c\\u56de\\u590d\\u7684\\u6d88\\u606f\\u5185\\u5bb9\\u3002\"},{\"name\":\"act_name\",\"title\":\"\\u6d3b\\u52a8\\u540d\\u79f0\",\"type\":\"text\",\"value\":\"\",\"placeholder\":\"\",\"tip\":\"\\u4f8b\\u5982\\uff1a\\u4e94\\u4e00\\u5047\\u65e5\\u6d3b\\u52a8\\u3001\\u4e09\\u5468\\u5e74\\u5e86\\u3001\\u7b49\\u7b49\\u3002\"},{\"name\":\"start_time\",\"title\":\"\\u5f00\\u59cb\\u65f6\\u95f4\",\"type\":\"date\",\"value\":\"\",\"placeholder\":\"\",\"tip\":\"\"},{\"name\":\"end_time\",\"title\":\"\\u7ed3\\u675f\\u65f6\\u95f4\",\"type\":\"date\",\"value\":\"\",\"placeholder\":\"\",\"tip\":\"\"},{\"name\":\"number_of_times\",\"title\":\"\\u9886\\u53d6\\u6b21\\u6570\",\"type\":\"text\",\"value\":\"1\",\"placeholder\":\"\",\"tip\":\"\\u6bcf\\u4eba\\u9886\\u53d6\\u7ea2\\u5305\\u6b21\\u6570\\uff0c\\u9ed8\\u8ba41\\u6b21\"}]', '', '', 1);
INSERT INTO `rh_addons` VALUES (2, '投票', 'touPiao', '一款多功能微信在线投票应用，活动推广、营销利器。', '1.0', 'Geeson', 'http://local.rhaphp.com/addons/touPiao/logo.jpg', 1, '[{\"name\":\"login_type\",\"title\":\"\\u767b\\u5f55\\u65b9\\u5f0f\",\"type\":\"radio\",\"value\":[{\"title\":\"\\u6388\\u6743\\u767b\\u5f55\",\"value\":\"1\",\"checked\":\"1\"},{\"title\":\"\\u56de\\u590d|\\u83dc\\u5355\",\"value\":\"2\",\"checked\":\"0\"}],\"placeholder\":\"\",\"tip\":\"\\u8ba4\\u8bc1\\u516c\\u4f17\\u53f7\\u8bf7\\u9009\\u62e9\\u6388\\u6743\\u767b\\u5f55\\uff0c\\u6ca1\\u6709\\u8ba4\\u8bc1\\u7684\\u8bf7\\u9009\\u62e9\\u56de\\u590d\\u5173\\u952e\\u8bcd\\u3002\"},{\"name\":\"vote_title\",\"title\":\"\\u6807\\u9898\",\"type\":\"text\",\"value\":\"\",\"placeholder\":\"\",\"tip\":\"\\u6295\\u7968\\u6d3b\\u52a8\\u6807\\u9898\"},{\"name\":\"vote_logo\",\"title\":\"\\u56fe\\u6807\",\"type\":\"image\",\"value\":\"\",\"placeholder\":\"\",\"tip\":\"\\u5206\\u4eab\\u5230\\u5fae\\u4fe1\\u6216\\u8005\\u670b\\u53cb\\u65f6\\uff0c\\u6807\\u9898\\u524d\\u9762\\u7684\\u5c0f\\u56fe\\u6807\\uff0c\\u62e5\\u6709\\u5206\\u4eab\\u6743\\u9650\\u7684\\u516c\\u4f17\\u53f7\\u6709\\u6548\\u3002\"},{\"name\":\"vote_desc\",\"title\":\"\\u63cf\\u8ff0\",\"type\":\"textarea\",\"value\":\"\",\"placeholder\":\"\",\"tip\":\"\\u5206\\u4eab\\u53d1\\u9001\\u670b\\u53cb\\u65f6\\uff0c\\u53ef\\u4ee5\\u770b\\u5230\\u7684\\u63cf\\u8ff0\\u5185\\u5bb9\\u3002\"},{\"name\":\"banner\",\"title\":\"banner\\u56fe\",\"type\":\"images\",\"value\":\"\",\"placeholder\":\"\",\"tip\":\"\\u4e3b\\u9875\\u9762\\u4e0a\\u7684\\u6eda\\u52a8\\u56fe\\uff0c\\u5efa\\u4f7f\\u75281-3\\u5f20\\uff0c\\u592a\\u591a\\u4f1a\\u5f71\\u54cd\\u9875\\u9762\\u6253\\u5f00\\u901f\\u5ea6\\u3002\"},{\"name\":\"start_time\",\"title\":\"\\u5f00\\u59cb\\u65f6\\u95f4\",\"type\":\"date\",\"value\":\"\",\"placeholder\":\"\",\"tip\":\"\"},{\"name\":\"end_time\",\"title\":\"\\u7ed3\\u675f\\u65f6\\u95f4\",\"type\":\"date\",\"value\":\"\",\"placeholder\":\"\",\"tip\":\"\"},{\"name\":\"number_of_times\",\"title\":\"\\u6295\\u7968\\u9650\\u5236\",\"type\":\"text\",\"value\":\"1\",\"placeholder\":\"\",\"tip\":\"\\u6bcf\\u4eba\\u6bcf\\u5929\\u53ef\\u6295\\u7968\\u6b21\\u6570\\u3002\"},{\"name\":\"text_color\",\"title\":\"\\u98ce\\u683c\\u989c\\u8272\",\"type\":\"text\",\"value\":\"#ffb800\",\"placeholder\":\"\",\"tip\":\"\\u9875\\u9762\\u98ce\\u683c\\u989c\\u8272\\uff0c\\u4f60\\u65b9\\u53ef\\u4f7f\\u7528\\u4f60\\u559c\\u6b22\\u7684\\u989c\\u8272\\u3002\"},{\"name\":\"rule\",\"title\":\"\\u6d3b\\u52a8\\u89c4\\u5219\",\"type\":\"textarea\",\"value\":\"\",\"placeholder\":\"\",\"tip\":\"\\u6d3b\\u52a8\\u7684\\u89c4\\u5219\\uff0c\\u8bf4\\u660e\\u652f\\u6301HTML\\u4ee3\\u7801\\u3002\"}]', 'touPiao/vote/index', '', 1);

-- ----------------------------
-- Table structure for rh_address
-- ----------------------------
DROP TABLE IF EXISTS `rh_address`;
CREATE TABLE `rh_address`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL COMMENT '会员 ID',
  `mpid` int(11) NOT NULL COMMENT '公众标识',
  `name` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '收货人',
  `phone` varchar(18) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '手机号码',
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '详细地址',
  `take_type` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '收货时间类型',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1默认地址',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '会员收货地址' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_admin
-- ----------------------------
DROP TABLE IF EXISTS `rh_admin`;
CREATE TABLE `rh_admin`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增 ID',
  `admin_name` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '管理员登录',
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码',
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1：正常2：禁用',
  `ip` varchar(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '登录 IP',
  `last_time` int(10) NULL DEFAULT NULL COMMENT '最后登录时间',
  `rand_str` varchar(180) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码附加字符',
  `admin_id` int(11) NOT NULL DEFAULT 0 COMMENT '超级管理 ID',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rh_admin
-- ----------------------------
INSERT INTO `rh_admin` VALUES (1, 'admin', 'fe47653c9e909eb021d32b225451f8a8', 1, '127.0.0.1', 1537405320, 'IUrDCm', 1);

-- ----------------------------
-- Table structure for rh_material
-- ----------------------------
DROP TABLE IF EXISTS `rh_material`;
CREATE TABLE `rh_material`  (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `mpid` int(10) NOT NULL COMMENT '公众号标识',
  `type` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '素材类型',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '素材名称|标题',
  `url` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '素材资源地址|图文封面',
  `description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '图文素材描述',
  `content` mediumtext CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '文本素材内容',
  `detail` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '图文素材详情',
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '图文链接',
  `create_time` int(10) NULL DEFAULT NULL COMMENT '创建时间',
  `update_time` int(10) NULL DEFAULT NULL COMMENT '更新时间',
  `media_id` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '媒体 ID',
  `from_type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0:本地1：公众号',
  `path` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '资源路径',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `media_id`(`media_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '公众号素材表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_media_news
-- ----------------------------
DROP TABLE IF EXISTS `rh_media_news`;
CREATE TABLE `rh_media_news`  (
  `news_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增 ID',
  `mid` int(11) NOT NULL COMMENT '公众号标识',
  `media_id` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '媒体 ID',
  `title` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '标题',
  `type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1:文本2:单图文3:多图文',
  `sort` int(11) NOT NULL DEFAULT 0 COMMENT '排序',
  `create_time` int(10) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `update_time` int(10) NOT NULL DEFAULT 0 COMMENT '更新时间',
  `status_type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1已上传，0未上传,3已经群发',
  PRIMARY KEY (`news_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_media_news_list
-- ----------------------------
DROP TABLE IF EXISTS `rh_media_news_list`;
CREATE TABLE `rh_media_news_list`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增 ID',
  `news_id` int(11) NOT NULL COMMENT '主题 ID',
  `cover` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '封面',
  `thumb_media_id` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '媒体 ID',
  `author` varchar(80) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '作者',
  `title` varchar(180) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '标题',
  `content_source_url` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '链接',
  `content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT '内容',
  `digest` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL COMMENT '描述',
  `show_cover_pic` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1为显示，0为不显示',
  `status_type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1已上传，2未上传',
  `sort` int(11) NOT NULL DEFAULT 0 COMMENT '排序',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_media_news_material
-- ----------------------------
DROP TABLE IF EXISTS `rh_media_news_material`;
CREATE TABLE `rh_media_news_material`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增 ID',
  `mid` int(11) NOT NULL COMMENT '公众号标识',
  `url` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '地址',
  `create_time` int(11) NOT NULL DEFAULT 0 COMMENT '创建时间',
  `type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1图片：2视频',
  `path` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '本地路径',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_member_group
-- ----------------------------
DROP TABLE IF EXISTS `rh_member_group`;
CREATE TABLE `rh_member_group`  (
  `gid` int(11) NOT NULL AUTO_INCREMENT COMMENT '组 ID',
  `mpid` int(11) NOT NULL COMMENT '公众号标识',
  `group_name` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '组等级名称',
  `up_score` int(11) NOT NULL DEFAULT 0 COMMENT '升级积分条件',
  `up_money` int(11) NOT NULL DEFAULT 0 COMMENT '升级消费金额条件',
  `up_type` int(11) NOT NULL DEFAULT 0 COMMENT '升级条件类型0为或：1为且',
  `discount` int(11) NOT NULL DEFAULT 0 COMMENT '折扣率',
  `description` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '描述',
  PRIMARY KEY (`gid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_member_wealth_record
-- ----------------------------
DROP TABLE IF EXISTS `rh_member_wealth_record`;
CREATE TABLE `rh_member_wealth_record`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增 ID',
  `member_id` int(11) NOT NULL DEFAULT 0 COMMENT '会员 ID',
  `mpid` int(11) NOT NULL DEFAULT 0 COMMENT '公众号标识',
  `score` int(11) NOT NULL DEFAULT 0 COMMENT '积分',
  `money` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '金额',
  `time` int(10) NULL DEFAULT NULL COMMENT '时间',
  `type` tinyint(1) NOT NULL COMMENT '1为积分，2金额',
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_menu
-- ----------------------------
DROP TABLE IF EXISTS `rh_menu`;
CREATE TABLE `rh_menu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `pid` int(5) NOT NULL COMMENT '上级ID',
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '菜单名称',
  `url` varchar(180) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Url函数地址',
  `sort` int(5) NULL DEFAULT NULL COMMENT '排序',
  `icon` varchar(180) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '图标',
  `child` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `shows` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 78 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rh_menu
-- ----------------------------
INSERT INTO `rh_menu` VALUES (1, 0, '公众号', 'mp/mp/index', 0, '&#xe63a;', '', '');
INSERT INTO `rh_menu` VALUES (2, 0, '系统管理', 'admin/system/index', 3, '&#xe620;', '', '');
INSERT INTO `rh_menu` VALUES (13, 1, '微信功能', 'null', 0, '&#xe60a;', '', '');
INSERT INTO `rh_menu` VALUES (14, 13, '自动回复', 'mp/mp/autoreply', 0, '', '', '');
INSERT INTO `rh_menu` VALUES (15, 13, '自定义菜单', 'mp/mp/menu', 2, '', '', '');
INSERT INTO `rh_menu` VALUES (16, 13, '功能配置', 'mp/mp/mpsetting', 3, '', '', '');
INSERT INTO `rh_menu` VALUES (17, 13, '二维码/转化链接 ', 'mp/mp/qrcode', 4, '', '', '');
INSERT INTO `rh_menu` VALUES (18, 13, '素材管理', 'mp/material/index', 5, '', '', '');
INSERT INTO `rh_menu` VALUES (19, 1, '粉丝会员', 'null', 2, '&#xe654;', '', '');
INSERT INTO `rh_menu` VALUES (20, 19, '粉丝管理', 'mp/friends/index', 0, '', '', '');
INSERT INTO `rh_menu` VALUES (21, 2, '微信平台', 'null', 0, '&#xe60a;', '', '');
INSERT INTO `rh_menu` VALUES (22, 21, '公众号管理', 'mp/index/mplist', 1, '', '', '');
INSERT INTO `rh_menu` VALUES (23, 22, '增加公众号', 'mp/index/addmp', 1, '', '', '');
INSERT INTO `rh_menu` VALUES (24, 22, '公众号列表', 'mp/index/mplist', 2, '', '', '');
INSERT INTO `rh_menu` VALUES (25, 2, '菜单设置', 'NULL', 1, '&#xe670;', '', '');
INSERT INTO `rh_menu` VALUES (26, 25, '菜单列表', 'admin/system/menulist', 1, '', '', '');
INSERT INTO `rh_menu` VALUES (27, 25, '增加菜单', 'admin/system/addmenu', 2, '', '', '');
INSERT INTO `rh_menu` VALUES (28, 22, '公众号列表', 'mp/index/mplist', 0, '', '', '');
INSERT INTO `rh_menu` VALUES (29, 22, '接入信息', 'mp/index/index', 0, '', '', '');
INSERT INTO `rh_menu` VALUES (30, 17, '增加二维码', 'mp/mp/qrcodeadd', 0, '', '', '');
INSERT INTO `rh_menu` VALUES (32, 14, '增加关键词', 'mp/mp/addkeyword', 2, '', '', '');
INSERT INTO `rh_menu` VALUES (41, 14, '特殊消息', 'mp/mp/special', 0, '', '', '');
INSERT INTO `rh_menu` VALUES (43, 0, '应用中心', 'admin/app/index', 4, '&#xe635;', '', '');
INSERT INTO `rh_menu` VALUES (45, 43, '应用管理', 'null', 1, '&#xe617;', '', '');
INSERT INTO `rh_menu` VALUES (46, 19, '授权&注册', 'mp/member/index', 1, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (47, 13, '消息管理', 'mp/message/messagelist', 1, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (48, 47, '回复消息', 'mp/message/replymsg', 0, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (50, 26, '修改菜单', 'admin/system/updatemenu', 0, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (51, 22, '修改公众号', 'mp/index/updatemp', 0, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (52, 2, '后台管理', 'NULL', 2, '&#xe663;', NULL, NULL);
INSERT INTO `rh_menu` VALUES (53, 52, '管理成员', 'admin/system/adminmember', 0, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (54, 53, '更改密码', 'admin/system/updatepwd', 0, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (55, 53, '增加成员', 'admin/system/addadminmember', 0, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (56, 45, '微信公众号', 'admin/app/index', 0, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (57, 52, '系统升级', 'admin/upgrade/index', 1, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (58, 13, '图文群发', 'mp/mp/newslist', 6, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (59, 58, '增加图文', 'mp/mp/addnews', 0, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (60, 58, '修改图文', 'mp/mp/editnews', 0, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (61, 0, '小程序', 'miniapp/miniapp/topnav', 2, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (62, 21, '小程序管理', 'mp/index/miniapplists', 2, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (63, 62, '增加小程序', 'mp/index/addminiapp', 0, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (64, 62, '修改小程序', 'mp/index/upminiapp', 0, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (65, 62, '小程序配置信息', 'mp/index/miniappsetinginfo', 0, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (66, 45, '微信小程序', 'admin/miniapp/index', 1, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (67, 61, 'Mini Program功能', 'NULL', 0, '&#xe670;', NULL, NULL);
INSERT INTO `rh_menu` VALUES (68, 67, '功能配置', 'miniapp/miniapp/setting', 3, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (69, 67, '会员管理', 'miniapp/miniapp/userlist', 0, '&#xe68b;', NULL, NULL);
INSERT INTO `rh_menu` VALUES (70, 67, '消息管理', 'miniapp/miniapp/getmsglist', 1, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (71, 67, '数据分析', 'miniapp/index/index', 2, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (72, 70, '回复消息', 'miniapp/miniapp/replymsg', 0, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (73, 74, '应用商店', 'admin/appstore/index', 2, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (74, 43, 'official Service', 'NULL', 1, '&#xe619;', NULL, NULL);
INSERT INTO `rh_menu` VALUES (75, 73, '应用中心-注册', 'admin/appstore/register', 0, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (76, 73, '用户登录', 'admin/appstore/login', 0, '', NULL, NULL);
INSERT INTO `rh_menu` VALUES (77, 74, '应用升级', 'admin/appstore/upgrade', 3, '', NULL, NULL);

-- ----------------------------
-- Table structure for rh_miniapp
-- ----------------------------
DROP TABLE IF EXISTS `rh_miniapp`;
CREATE TABLE `rh_miniapp`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `user_id` int(10) NOT NULL COMMENT '用户ID',
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '小程序名称',
  `appid` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'AppId',
  `appsecret` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'AppSecret',
  `origin_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '小程序原始ID',
  `type` int(1) NOT NULL DEFAULT 0 COMMENT '1认证2普通',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态（0：禁用，1：正常，2：审核中）',
  `token` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '公众号标识',
  `encodingaeskey` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '消息加解密秘钥',
  `addon` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '应用扩展标识',
  `desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '描述',
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'logo',
  `qrcode` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '二维码',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `is_use` tinyint(1) NOT NULL DEFAULT 0 COMMENT '当前使用',
  `close_msg` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '关闭提示',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '公众号表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_miniapp_addon
-- ----------------------------
DROP TABLE IF EXISTS `rh_miniapp_addon`;
CREATE TABLE `rh_miniapp_addon`  (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '插件名称',
  `addon` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '标识名',
  `desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '描述',
  `version` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '版本号',
  `author` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '作者姓名',
  `logo` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT 'LOGO',
  `status` int(1) NOT NULL DEFAULT 1 COMMENT '状态',
  `config` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '插件配置',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '应用表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_miniapp_addon_info
-- ----------------------------
DROP TABLE IF EXISTS `rh_miniapp_addon_info`;
CREATE TABLE `rh_miniapp_addon_info`  (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `mpid` int(10) NOT NULL COMMENT '小程序标识',
  `addon` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '插件标识',
  `infos` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '配置信息',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '插件配置参数表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_miniapp_msg
-- ----------------------------
DROP TABLE IF EXISTS `rh_miniapp_msg`;
CREATE TABLE `rh_miniapp_msg`  (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增 ID',
  `openid` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'openid',
  `mpid` int(11) NOT NULL DEFAULT 0 COMMENT '公众号标识',
  `type` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '消息类型',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT '消息内容',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0未回复，1已回复',
  `is_reply` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1为回复内容',
  `create_time` int(10) NOT NULL DEFAULT 0 COMMENT '创建时间',
  PRIMARY KEY (`msg_id`) USING BTREE,
  INDEX `openid`(`openid`) USING BTREE,
  INDEX `mpid`(`mpid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_miniapp_user
-- ----------------------------
DROP TABLE IF EXISTS `rh_miniapp_user`;
CREATE TABLE `rh_miniapp_user`  (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `mpid` int(10) NOT NULL COMMENT '公众号标识',
  `openid` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'openid',
  `nickname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '昵称',
  `avatarurl` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '头像',
  `gender` tinyint(1) NULL DEFAULT NULL COMMENT '性别',
  `relname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '真实姓名',
  `signature` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '个性签名',
  `mobile` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '手机号',
  `language` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '使用语言',
  `country` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '国家',
  `province` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '省',
  `city` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '城市',
  `remark` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '备注',
  `score` int(10) NULL DEFAULT 0 COMMENT '积分',
  `money` decimal(10, 2) NULL DEFAULT 0.00 COMMENT '金钱',
  `unionid` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'unionid字段',
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '密码',
  `create_time` int(10) NULL DEFAULT 0 COMMENT '注册时间',
  `last_time` int(10) NULL DEFAULT 586969200 COMMENT '最后交互时间',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `mpid`(`mpid`) USING BTREE,
  INDEX `openid`(`openid`) USING BTREE,
  INDEX `unionid`(`unionid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '小程序会员' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_mp
-- ----------------------------
DROP TABLE IF EXISTS `rh_mp`;
CREATE TABLE `rh_mp`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `user_id` int(10) NOT NULL COMMENT '用户ID',
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '公众号名称',
  `appid` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'AppId',
  `appsecret` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'AppSecret',
  `origin_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '公众号原始ID',
  `type` int(1) NOT NULL DEFAULT 0 COMMENT '公众号类型（1：普通订阅号；2：认证订阅号；3：普通服务号；4：认证服务号',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态（0：禁用，1：正常，2：审核中）',
  `valid_token` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '接口验证Token',
  `valid_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1已接入；0未接入',
  `token` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '公众号标识',
  `encodingaeskey` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '消息加解密秘钥',
  `mp_number` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '微信号',
  `desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '描述',
  `logo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'logo',
  `qrcode` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '二维码',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `login_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '公众号登录名',
  `is_use` tinyint(1) NOT NULL DEFAULT 0 COMMENT '当前使用',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '公众号表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rh_mp
-- ----------------------------
INSERT INTO `rh_mp` VALUES (1, 1, '测试公众号', 'wxb8862c9e7cb27654', 'c280978c74a8749d74b0e504224bdf35', 'gh_d059d8896214f', 1, 1, 'MIL4umO8pWIkfNhvNx01uBDupfUqS7J4', 1, 'gVzaHNIx9RiO40KiXbJScNN2t7SLF2gl', 'ofVvs4t2lbhQBrzZ2JhFWu7P2q07SHTGmeCfIwHu8pL', 'demomp', '系统维护中，请稍后。', '', '', 1505629364, NULL, 0);
INSERT INTO `rh_mp` VALUES (2, 1, 'aaaa', '2332', '32323232', '23', 1, 1, 'nh9FvggVXOCdsgGEdrrNYImLUUo9Mm12', 0, 'MXd1EZqcAkDajkk14Nrlx7seY6mh47AA', '408KF5sQ5exu3LPLMxifZUr4UGbNff2wdqWRyynSsuj', 'dfasdf', '', 'http://local.rhaphp.com/uploads/5e/e97f4c8ec26b1a649d8626a143987b.jpg', 'http://local.rhaphp.com/uploads/5e/e97f4c8ec26b1a649d8626a143987b.jpg', 1537405463, NULL, 1);

-- ----------------------------
-- Table structure for rh_mp_friends
-- ----------------------------
DROP TABLE IF EXISTS `rh_mp_friends`;
CREATE TABLE `rh_mp_friends`  (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `mpid` int(10) NOT NULL COMMENT '公众号标识',
  `openid` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'openid',
  `nickname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '昵称',
  `headimgurl` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '头像',
  `sex` tinyint(1) NULL DEFAULT NULL COMMENT '性别',
  `subscribe` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否关注',
  `subscribe_time` int(10) NULL DEFAULT NULL COMMENT '关注时间',
  `unsubscribe_time` int(10) NULL DEFAULT NULL COMMENT '取消关注时间',
  `relname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '真实姓名',
  `signature` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '个性签名',
  `mobile` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '手机号',
  `is_bind` tinyint(1) NOT NULL DEFAULT 0 COMMENT '是否绑定',
  `language` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '使用语言',
  `country` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '国家',
  `province` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '省',
  `city` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '城市',
  `remark` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '备注',
  `group_id` int(10) NULL DEFAULT 0 COMMENT '分组ID',
  `groupid` int(11) NOT NULL DEFAULT 0 COMMENT '公众号分组标识',
  `tagid_list` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '标签',
  `score` int(10) NULL DEFAULT 0 COMMENT '积分',
  `money` decimal(10, 2) NULL DEFAULT 0.00 COMMENT '金钱',
  `latitude` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '纬度',
  `longitude` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '经度',
  `location_precision` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '精度',
  `type` int(11) NOT NULL DEFAULT 0 COMMENT '0:公众号粉丝1：注册会员',
  `unionid` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'unionid字段',
  `password` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '密码',
  `last_time` int(10) NULL DEFAULT 586969200 COMMENT '最后交互时间',
  `subscribe_scene` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `qr_scene` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `qr_scene_str` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `openid`(`openid`) USING BTREE,
  INDEX `mpid`(`mpid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '公众号粉丝表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_mp_menu
-- ----------------------------
DROP TABLE IF EXISTS `rh_mp_menu`;
CREATE TABLE `rh_mp_menu`  (
  `id` bigint(16) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mp_id` int(11) NULL DEFAULT 0 COMMENT '公众号标识',
  `index` bigint(20) NULL DEFAULT 0,
  `pindex` bigint(20) UNSIGNED NOT NULL DEFAULT 0 COMMENT '父id',
  `type` varchar(24) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '菜单类型 null主菜单 link链接 keys关键字 event事件',
  `name` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '菜单名称',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '文字内容',
  `sort` int(10) UNSIGNED NULL DEFAULT 0 COMMENT '排序',
  `status` tinyint(1) UNSIGNED NULL DEFAULT 1 COMMENT '状态(0禁用1启用)',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `wechat_menu_pid`(`pindex`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '微信自定义菜单表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_mp_msg
-- ----------------------------
DROP TABLE IF EXISTS `rh_mp_msg`;
CREATE TABLE `rh_mp_msg`  (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增 ID',
  `pid` int(11) NOT NULL DEFAULT 0 COMMENT '上一条消息 ID',
  `openid` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'openid',
  `mpid` int(11) NOT NULL DEFAULT 0 COMMENT '公众号标识',
  `type` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '消息类型',
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL COMMENT '消息内容',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0未回复，1已回复',
  `is_reply` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1为公众号回复',
  `create_time` int(10) NOT NULL DEFAULT 0 COMMENT '创建时间',
  PRIMARY KEY (`msg_id`) USING BTREE,
  INDEX `openid`(`openid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_mp_reply
-- ----------------------------
DROP TABLE IF EXISTS `rh_mp_reply`;
CREATE TABLE `rh_mp_reply`  (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `type` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '回复类型：text,images,news,voice,music,video',
  `title` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '标题(适用图文)',
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '文本内容',
  `url` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '资源地址',
  `link` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '连接(图片连接，图文连接等)',
  `status_type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1:永久0：临时',
  `media_id` varchar(120) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '媒体ID',
  PRIMARY KEY (`reply_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_mp_rule
-- ----------------------------
DROP TABLE IF EXISTS `rh_mp_rule`;
CREATE TABLE `rh_mp_rule`  (
  `id` int(10) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `mpid` int(10) NOT NULL COMMENT '公众号ID',
  `addon` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '插件标识',
  `keyword` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '关键词内容',
  `type` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '触发类型：text,addon,images,news,voice,music,video',
  `event` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '特殊事件如:关注、取关等',
  `entry_id` int(10) NULL DEFAULT NULL COMMENT '功能入口ID',
  `reply_id` int(10) NULL DEFAULT NULL COMMENT '自动回复ID',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态(1开户:0关闭)',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `keyword`(`keyword`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '公众号响应规则' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_payment
-- ----------------------------
DROP TABLE IF EXISTS `rh_payment`;
CREATE TABLE `rh_payment`  (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增 ID',
  `member_id` int(11) NOT NULL DEFAULT 0 COMMENT '用户 ID',
  `openid` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'OPENID',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '标题|商品名称',
  `order_number` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0' COMMENT '订单号',
  `money` decimal(10, 2) NOT NULL DEFAULT 0.00 COMMENT '金额',
  `pay_type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '交易类型（1为微信2为支付宝）',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '状态（0：未完成交易1：完成关键交易）',
  `create_time` int(10) NOT NULL COMMENT '交易时间',
  `mpid` int(11) NOT NULL COMMENT '公众号标识',
  `remark` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '备注',
  `attach` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '附加数据',
  `refund` tinyint(1) NULL DEFAULT 0 COMMENT '1：申请退款中2：退款完成',
  PRIMARY KEY (`payment_id`) USING BTREE,
  INDEX `openid`(`openid`) USING BTREE,
  INDEX `member_id`(`member_id`) USING BTREE,
  INDEX `mpid`(`mpid`) USING BTREE,
  INDEX `order_number`(`order_number`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_picture
-- ----------------------------
DROP TABLE IF EXISTS `rh_picture`;
CREATE TABLE `rh_picture`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '文件名称',
  `mpid` int(11) NOT NULL,
  `thumb` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '缩略图',
  `picture` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '原图',
  `type` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:公众号，2:小程序',
  `create_time` int(11) NOT NULL,
  `reduce` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '质量缩小正方图',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `mpid`(`mpid`) USING BTREE,
  INDEX `name`(`name`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rh_picture
-- ----------------------------
INSERT INTO `rh_picture` VALUES (1, 'e97f4c8ec26b1a649d8626a143987b.jpg', 1, 'uploads/thumb/5e/e97f4c8ec26b1a649d8626a143987b.jpg', 'uploads/5e/e97f4c8ec26b1a649d8626a143987b.jpg', 1, 1537405451, 'uploads/reduce/5e/e97f4c8ec26b1a649d8626a143987b.jpg');

-- ----------------------------
-- Table structure for rh_prefix_jobs
-- ----------------------------
DROP TABLE IF EXISTS `rh_prefix_jobs`;
CREATE TABLE `rh_prefix_jobs`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED NULL DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '队列任务表' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_qrcode
-- ----------------------------
DROP TABLE IF EXISTS `rh_qrcode`;
CREATE TABLE `rh_qrcode`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键',
  `mpid` int(10) NULL DEFAULT NULL COMMENT '公众号标识',
  `scene_id` int(32) NULL DEFAULT NULL COMMENT '场景值ID',
  `scene_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '场景名称',
  `keyword` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '关联关键词',
  `qr_type` char(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0' COMMENT '二维码类型',
  `scene_str` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '场景值字符串',
  `expire` int(10) NULL DEFAULT NULL COMMENT '过期时间',
  `ticket` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '二维码Ticket',
  `short_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '二维码短地址',
  `qrcode_url` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '二维码原始地址',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '二维码图片解析后的地址',
  `create_time` int(10) NULL DEFAULT NULL COMMENT '二维码创建时间',
  `scan_count` int(11) NOT NULL DEFAULT 0 COMMENT '扫码次数',
  `gz_count` int(11) NOT NULL DEFAULT 0 COMMENT '关注数量',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `mpid`(`mpid`) USING BTREE,
  INDEX `ticket`(`ticket`) USING BTREE,
  INDEX `keyword`(`keyword`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_qrcode_data
-- ----------------------------
DROP TABLE IF EXISTS `rh_qrcode_data`;
CREATE TABLE `rh_qrcode_data`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `scene_id` int(11) NOT NULL COMMENT '场景 ID',
  `openid` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'openid',
  `create_time` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '扫码时间',
  `mpid` int(11) NOT NULL COMMENT '公众号标识',
  `qrcode_id` int(11) NOT NULL COMMENT '二维码ID',
  `scan_count` int(11) NOT NULL DEFAULT 1 COMMENT '扫码次数',
  `type` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0:默认1:扫码关注',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `openid`(`openid`) USING BTREE,
  INDEX `mpid`(`mpid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_redpack
-- ----------------------------
DROP TABLE IF EXISTS `rh_redpack`;
CREATE TABLE `rh_redpack`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增 ID',
  `openid` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'openid',
  `order_number` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '单号',
  `mpid` int(11) NOT NULL DEFAULT 0 COMMENT '公众号标识',
  `money` decimal(10, 2) NOT NULL COMMENT '红包金额',
  `nick_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '提供方名称',
  `send_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '发送者名称',
  `create_time` int(10) NULL DEFAULT NULL COMMENT '创建时间',
  `addon` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '应用扩展标识',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '状态1：正常0：过期',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_setting
-- ----------------------------
DROP TABLE IF EXISTS `rh_setting`;
CREATE TABLE `rh_setting`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `mpid` int(11) NOT NULL COMMENT '公众号标识',
  `name` varchar(180) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '配置项名称',
  `value` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '配置值',
  `cate` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '分类',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rh_setting
-- ----------------------------
INSERT INTO `rh_setting` VALUES (1, 2, 'register', '{\"register_type\":2,\"verify\":0,\"up_score\":0,\"up_money\":0,\"keyword\":\"\",\"picurl\":\"\\/public\\/static\\/images\\/def.jpg\",\"ispwd\":1,\"redirect_url\":\"\"}', 'mp');

-- ----------------------------
-- Table structure for rh_syn_openid
-- ----------------------------
DROP TABLE IF EXISTS `rh_syn_openid`;
CREATE TABLE `rh_syn_openid`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mpid` int(11) NOT NULL,
  `openid` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `openid`(`openid`) USING BTREE,
  INDEX `mpid`(`mpid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_vote_baoming
-- ----------------------------
DROP TABLE IF EXISTS `rh_vote_baoming`;
CREATE TABLE `rh_vote_baoming`  (
  `bm_id` int(11) NOT NULL AUTO_INCREMENT,
  `mpid` int(11) NOT NULL,
  `username` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `cover` varchar(500) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `create_time` int(10) NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `vote_total` int(11) NOT NULL DEFAULT 0,
  `openid` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1:正常0：隐藏',
  PRIMARY KEY (`bm_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_vote_record
-- ----------------------------
DROP TABLE IF EXISTS `rh_vote_record`;
CREATE TABLE `rh_vote_record`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mpid` int(11) NOT NULL,
  `bm_id` int(11) NOT NULL,
  `openid` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `time` int(10) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rh_vote_view
-- ----------------------------
DROP TABLE IF EXISTS `rh_vote_view`;
CREATE TABLE `rh_vote_view`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mpid` int(11) NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
