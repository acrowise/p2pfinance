/*
Navicat MySQL Data Transfer

Source Server         : books
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : p2pfinance

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2018-03-03 12:46:51
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `membership`
-- ----------------------------
DROP TABLE IF EXISTS `membership`;
CREATE TABLE `membership` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `moble` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `region` int(11) DEFAULT NULL,
  `payment_name` varchar(255) DEFAULT NULL,
  `mm_number` varchar(255) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of membership
-- ----------------------------
INSERT INTO `membership` VALUES ('1', 'Jerome', 'Azah', '2018-03-06', 'Male', 'Active', '0209363493', 'kafjer@gmail.com', null, 'Desmond Azah', '02429920', '2018-03-03 12:28:28');

-- ----------------------------
-- Table structure for `usr_cat`
-- ----------------------------
DROP TABLE IF EXISTS `usr_cat`;
CREATE TABLE `usr_cat` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usr_cat
-- ----------------------------
INSERT INTO `usr_cat` VALUES ('1', 'System Administrator', 'Active');
INSERT INTO `usr_cat` VALUES ('2', 'Nurse', 'Active');

-- ----------------------------
-- Table structure for `usr_cat_links`
-- ----------------------------
DROP TABLE IF EXISTS `usr_cat_links`;
CREATE TABLE `usr_cat_links` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `link_id` int(11) NOT NULL,
  PRIMARY KEY (`cat_id`,`link_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usr_cat_links
-- ----------------------------
INSERT INTO `usr_cat_links` VALUES ('1', '14');
INSERT INTO `usr_cat_links` VALUES ('1', '15');
INSERT INTO `usr_cat_links` VALUES ('1', '16');
INSERT INTO `usr_cat_links` VALUES ('1', '17');
INSERT INTO `usr_cat_links` VALUES ('1', '18');
INSERT INTO `usr_cat_links` VALUES ('2', '14');
INSERT INTO `usr_cat_links` VALUES ('2', '15');
INSERT INTO `usr_cat_links` VALUES ('2', '16');
INSERT INTO `usr_cat_links` VALUES ('2', '17');
INSERT INTO `usr_cat_links` VALUES ('2', '18');

-- ----------------------------
-- Table structure for `usr_links`
-- ----------------------------
DROP TABLE IF EXISTS `usr_links`;
CREATE TABLE `usr_links` (
  `link_id` int(11) NOT NULL AUTO_INCREMENT,
  `link_url` varchar(250) DEFAULT NULL,
  `link_name` varchar(200) DEFAULT NULL,
  `link_target` varchar(50) DEFAULT NULL,
  `link_image` varchar(200) DEFAULT NULL,
  `link_parent` int(11) DEFAULT '0',
  `status` varchar(10) NOT NULL DEFAULT 'Active',
  `page_id_sub` varchar(255) DEFAULT NULL,
  `page_id` varchar(50) DEFAULT NULL,
  `disp_order` int(10) DEFAULT '0',
  PRIMARY KEY (`link_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usr_links
-- ----------------------------
INSERT INTO `usr_links` VALUES ('1', '#', 'About the Hospital', null, 'icon-copy', '0', 'Active', null, null, '1');
INSERT INTO `usr_links` VALUES ('2', '#', 'Patient Manager', '', 'icon-footprint', '0', 'Active', null, null, '2');
INSERT INTO `usr_links` VALUES ('3', '#', 'Appointment Manager', null, 'icon-calendar3', '0', 'Active', null, null, '3');
INSERT INTO `usr_links` VALUES ('4', '#', 'Human Resource Manager', null, 'icon-sphere', '0', 'Active', null, null, '4');
INSERT INTO `usr_links` VALUES ('5', '#', 'Clinic Manager', null, 'icon-heart5', '0', 'Active', null, null, '5');
INSERT INTO `usr_links` VALUES ('6', '#', 'Pharmacy Manager', null, 'icon-shield-check', '0', 'Active', null, null, '6');
INSERT INTO `usr_links` VALUES ('7', '#', 'Blood Bank', null, 'icon-folder-heart', '0', 'Active', null, null, '7');
INSERT INTO `usr_links` VALUES ('8', '#', 'Procurement', null, 'icon-folder-plus', '0', 'Active', null, null, '8');
INSERT INTO `usr_links` VALUES ('9', '#', 'Inventory Manager', null, 'icon-file-eye', '0', 'Active', null, null, '9');
INSERT INTO `usr_links` VALUES ('10', '#', 'Birth & Death Registry', null, 'fa fa-heartbeat', '0', 'Active', null, null, '10');
INSERT INTO `usr_links` VALUES ('11', '#', 'Financial Manager', null, 'fa fa-usd', '0', 'Active', null, null, '11');
INSERT INTO `usr_links` VALUES ('12', '#', 'Laboratories', null, 'fa fa-medkit', '0', 'Active', null, null, '12');
INSERT INTO `usr_links` VALUES ('13', '#', 'Statistics & Report', null, 'icon-stats-growth', '0', 'Active', null, null, '13');
INSERT INTO `usr_links` VALUES ('14', '#', 'User Management', null, 'icon-user-check', '0', 'Active', null, null, '14');
INSERT INTO `usr_links` VALUES ('15', '../user/create_user.php ', 'Create User', null, 'fa fa-plus', '14', 'Active', 'create_user', 'user', '1');
INSERT INTO `usr_links` VALUES ('16', '../user/list_user.php', 'List Users', null, 'fa fa-plus', '14', 'Active', 'list_user', 'user', '2');
INSERT INTO `usr_links` VALUES ('17', '../user/user_category.php', 'User Category', null, 'fa fa-plus', '14', 'Active', 'usr_category', 'user', '3');
INSERT INTO `usr_links` VALUES ('18', '../user/assign_privilege.php', 'Assigne Privilege', null, 'fa fa-plus', '14', 'Active', 'assign_privis', 'user', '4');

-- ----------------------------
-- Table structure for `usr_users`
-- ----------------------------
DROP TABLE IF EXISTS `usr_users`;
CREATE TABLE `usr_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `user_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `user_cat` int(11) DEFAULT NULL,
  `user_status` varchar(50) DEFAULT NULL,
  `sid` int(11) NOT NULL DEFAULT '0',
  `user_fullname` varchar(200) DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `update_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` int(11) NOT NULL,
  `token` varchar(200) NOT NULL,
  `first_login` int(11) DEFAULT '0',
  `last_seen` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usr_users
-- ----------------------------
INSERT INTO `usr_users` VALUES ('1', 'kafjer@gmail.com', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', '2018-01-04 23:46:05', '1', '1', '1', 'Kafui Azah', '1', '0000-00-00 00:00:00', '0', '', '1', '2018-01-05 02:45:51');
