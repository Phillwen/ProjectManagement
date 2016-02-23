-- phpMyAdmin SQL Dump
-- version 4.2.8.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2014-12-23 14:59:25
-- 服务器版本： 5.5.39-MariaDB
-- PHP Version: 5.5.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `em_project`
--

-- --------------------------------------------------------

--
-- 表的结构 `em_item_class`
--

CREATE TABLE IF NOT EXISTS `em_item_class` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` int(4) NOT NULL DEFAULT '1',
  `flag` int(11) NOT NULL COMMENT '1-外事，2-制作'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `em_item_class`
--

INSERT INTO `em_item_class` (`id`, `name`, `status`, `flag`) VALUES
(1, '程序', 1, 2),
(2, '非程序', 1, 2);

-- --------------------------------------------------------

--
-- 表的结构 `em_item_flag`
--

CREATE TABLE IF NOT EXISTS `em_item_flag` (
`id` int(4) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `em_item_flag`
--

INSERT INTO `em_item_flag` (`id`, `name`) VALUES
(1, '公司使用'),
(2, '出租'),
(3, '私人使用');

-- --------------------------------------------------------

--
-- 表的结构 `em_item_outwork`
--

CREATE TABLE IF NOT EXISTS `em_item_outwork` (
`id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contents` varchar(100) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `item_flag` varchar(20) NOT NULL,
  `starttime` date NOT NULL,
  `expiretime` date NOT NULL,
  `adminremark` varchar(100) NOT NULL,
  `status` int(20) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `em_item_outwork`
--

INSERT INTO `em_item_outwork` (`id`, `name`, `contents`, `remark`, `item_flag`, `starttime`, `expiretime`, `adminremark`, `status`) VALUES
(1, 'sz6302', '', '', '出租', '0000-00-00', '2015-05-26', '', 1),
(2, 'sz4711', '', '新合同到期日：2015-05-31', '出租', '0000-00-00', '2015-06-07', '', 1),
(3, 'sz11004', '', '', '出租', '0000-00-00', '2015-04-17', '', 1),
(4, 'sz11006', '', '', '出租', '0000-00-00', '2015-06-20', '', 1),
(5, 'sz1601', '', '', '出租', '0000-00-00', '2015-07-09', '', 1),
(6, 'dg122b', '', '', '出租', '0000-00-00', '2015-09-26', '', 1),
(7, '已结束项目1', '', '', '公司使用', '0000-00-00', '0000-00-00', '', 0),
(8, '蒋亚莉社保', '', '结余 113.67', '出租', '0000-00-00', '2014-12-31', '', 1),
(9, 'hk6d', '', '一生一死', '出租', '0000-00-00', '2015-03-18', '', 1),
(10, 'hk23', '', '一生一死', '出租', '0000-00-00', '2016-05-24', '', 1),
(11, 'hk16', '', '', '出租', '0000-00-00', '2016-05-15', '', 1),
(12, 'ameis-shop.com', '', '', '出租', '0000-00-00', '2014-12-31', '', 1),
(13, 'atechsupports.com', '', '', '出租', '0000-00-00', '2014-12-31', '', 1),
(14, 'metronet.com.hk', '', 'JB4014', '出租', '0000-00-00', '2014-12-31', '', 1),
(15, 'mgfs-cn.com', '', '', '出租', '0000-00-00', '2014-12-31', '', 1),
(16, 'artcolldesign.com', '', '', '出租', '0000-00-00', '2014-12-31', '', 1),
(17, '已结束项目2', '', '', '出租', '0000-00-00', '2014-12-31', '已开单，未收款', 0),
(18, '郑生VPN', '', '', '出租', '0000-00-00', '2014-12-31', '', 1),
(19, '海川泰网站维护及输入资料', '', '', '出租', '0000-00-00', '2014-12-31', '', 1),
(20, '玛丽医院营养程式维护', '', '', '出租', '0000-00-00', '2015-06-15', '', 1),
(21, 'EMSD维护', '', '', '出租', '0000-00-00', '2013-12-31', '', 1),
(22, 'Amy代理', '', '暂停', '出租', '0000-00-00', '0000-00-00', '', 1),
(23, 'metropolegroup.com.hk', '', '', '出租', '0000-00-00', '2014-12-31', '', 1),
(24, 'dg203', '租用', '下次交租时间：2015.02.01', '公司使用', '0000-00-00', '0000-00-00', '', 1),
(25, 'sz1007', '', '合同3年，租金每年递增8%', '公司使用', '0000-00-00', '2015-07-09', '', 1),
(26, 'sz92', '', '', '公司使用', '0000-00-00', '2014-11-08', '', 1),
(27, '租用打印机AF3245C', '', '下次交费时间：2014年12月1日', '公司使用', '0000-00-00', '2015-03-01', '', 1),
(28, '彩悦车位', '', '', '公司使用', '0000-00-00', '0000-00-00', '', 1),
(29, '(0755)83647709', '', '', '公司使用', '0000-00-00', '0000-00-00', '', 1),
(30, '(0755)83647705', '', '', '公司使用', '0000-00-00', '0000-00-00', '', 1),
(31, '13925223245', '', '', '公司使用', '0000-00-00', '2015-12-31', '', 1),
(32, '13823609145', '', '', '公司使用', '0000-00-00', '2015-11-30', '', 1),
(33, '13823604542', '', '', '公司使用', '0000-00-00', '2015-11-30', '', 1),
(34, '13823323945', '', '', '公司使用', '0000-00-00', '2015-11-30', '', 1),
(35, '13823604224', '', '', '公司使用', '0000-00-00', '2015-11-30', '', 1),
(36, '13632685892', '', '停机，保号', '公司使用', '0000-00-00', '0000-00-00', '', 1),
(37, '13823607705', '', '', '公司使用', '0000-00-00', '2015-11-30', '', 1),
(38, '14529267497（3G）', '', '', '公司使用', '0000-00-00', '0000-00-00', '', 0),
(39, '粤通卡5280', '', '', '公司使用', '0000-00-00', '0000-00-00', '旧项目名称：粤通卡6918；旧项目名称：粤通卡9155', 1),
(40, 'BU30J0_保险及车船税', '', '', '私人使用', '0000-00-00', '2015-04-25', '', 1),
(41, 'BU30J0_年审', '', '', '私人使用', '0000-00-00', '2016-04-30', '', 1),
(42, 'BU30J0_保养维修', '', '', '私人使用', '0000-00-00', '0000-00-00', '', 1),
(43, 'e-media.3322.org', '', '', '公司使用', '0000-00-00', '2015-11-14', '', 1),
(44, '公司达通', '', '', '公司使用', '0000-00-00', '0000-00-00', '', 0),
(45, '(852) 61003494', '', '', '公司使用', '0000-00-00', '2014-11-16', '', 0),
(46, '(852) 28336400', '', '', '公司使用', '0000-00-00', '2015-09-04', '', 1),
(47, '(852) 25773887', '', '', '公司使用', '0000-00-00', '2015-06-05', '', 1),
(48, '(852) 25779723', '', '', '公司使用', '0000-00-00', '0000-00-00', '', 1),
(49, '(852) 54084464', '', '', '公司使用', '0000-00-00', '2014-11-21', '', 1),
(50, '(852) 28336379', '', '', '公司使用', '0000-00-00', '2015-09-04', '', 1),
(51, 'C108', '', '', '公司使用', '0000-00-00', '2014-09-26', '', 0),
(52, 'S260', '', '', '公司使用', '0000-00-00', '2014-11-06', '', 0),
(53, 'C188', '', '', '公司使用', '0000-00-00', '2014-11-08', '', 0),
(54, '香港宽频', '', '', '公司使用', '0000-00-00', '2016-06-30', '', 1),
(55, '公司招聘', '', '', '公司使用', '0000-00-00', '2015-07-31', '', 1),
(56, '劳保', '', '一年一次', '公司使用', '0000-00-00', '2015-08-06', '', 1),
(57, '盈捷（公司）', '', '下次交费时间2014年11月6日', '公司使用', '0000-00-00', '0000-00-00', '', 1),
(58, 'dg42', '自住', '', '私人使用', '0000-00-00', '0000-00-00', '', 1),
(59, '汽车租赁', '', '', '私人使用', '0000-00-00', '0000-00-00', '', 1),
(60, '13823602381', '', '', '私人使用', '0000-00-00', '2015-11-30', '', 1),
(61, '13825275769', '', '', '私人使用', '0000-00-00', '2015-08-31', '', 1),
(62, '18318811072', '', '', '私人使用', '0000-00-00', '2015-10-31', '', 1),
(63, '(0769)83029023', '', '', '私人使用', '0000-00-00', '2015-02-14', '', 1),
(64, '(0769)83029952', '', '', '私人使用', '0000-00-00', '0000-00-00', '', 1),
(65, '14529800445', '', '', '私人使用', '0000-00-00', '0000-00-00', '', 0),
(66, '970V_保养维修', '147364', '下次保养里数为：146249', '私人使用', '0000-00-00', '0000-00-00', '', 0),
(67, '粤通卡5256', '', '', '私人使用', '0000-00-00', '0000-00-00', '旧项目名称：粤通卡1687', 1),
(68, 'hk12a', '自住', '设计', '私人使用', '0000-00-00', '0000-00-00', '', 1),
(69, '(852)92716245', '', '', '私人使用', '0000-00-00', '2015-03-14', '', 1),
(70, '(852)25745485', '', '', '私人使用', '0000-00-00', '2015-10-16', '', 1),
(71, '(852)93595332', '', '', '私人使用', '0000-00-00', '2014-11-07', '', 1),
(72, '(852)92716245达通', '', '', '私人使用', '0000-00-00', '0000-00-00', '', 0),
(73, '(852)97292519', '', '', '私人使用', '0000-00-00', '0000-00-00', '', 1),
(74, '颐康医院', '', '', '私人使用', '0000-00-00', '0000-00-00', '', 1),
(75, '盈捷（私人）', '', '下次缴费时间2015年02月6日', '私人使用', '0000-00-00', '0000-00-00', '', 1),
(76, 'dg101装修', '', '', '私人使用', '0000-00-00', '0000-00-00', '', 1),
(77, 'dg20M装修', '', '', '私人使用', '0000-00-00', '0000-00-00', '', 1),
(78, 'dg101', '', '', '私人使用', '0000-00-00', '2015-12-31', '', 1),
(79, '驾驶违章', '', '', '公司使用', '0000-00-00', '0000-00-00', '', 1),
(80, '梁太私人', '', '', '私人使用', '0000-00-00', '0000-00-00', '', 1),
(81, '公司系统', '', '', '公司使用', '0000-00-00', '0000-00-00', '', 1),
(82, '13612835484', '', 'dg20M门锁', '私人使用', '0000-00-00', '0000-00-00', '', 1),
(83, '13728854595', '', 'DG101门锁', '私人使用', '0000-00-00', '0000-00-00', '', 1),
(84, '林玉琼转递服务', '', '', '私人使用', '0000-00-00', '2015-04-16', '', 1),
(85, 'DG42装修', '', '', '私人使用', '0000-00-00', '0000-00-00', '', 1),
(86, 'HK12A装修', '', '', '私人使用', '0000-00-00', '0000-00-00', '', 1),
(87, '恒生银行保险箱', '', '', '私人使用', '0000-00-00', '2014-08-04', '', 0),
(88, '毅美达年审', '', '', '公司使用', '0000-00-00', '2015-03-31', '', 1),
(89, '陈燕玲社保', '', '结余1676.3', '出租', '2014-04-04', '2015-03-31', '', 1),
(90, '小练记账', '', '', '公司使用', '0000-00-00', '0000-00-00', '', 1),
(91, '全职工资（顾问）', '', '', '公司使用', '0000-00-00', '0000-00-00', '', 1),
(92, '(852)81320225', '', '客服：81388888   密碼：1243', '公司使用', '0000-00-00', '2016-08-22', '', 1),
(93, '住房公积金（顾问）', '', '', '公司使用', '0000-00-00', '0000-00-00', '', 1),
(94, '永隆保险箱', '', '', '私人使用', '0000-00-00', '2014-09-20', '', 0),
(95, '林丽篱社保', '', '结余774.71', '出租', '0000-00-00', '2014-12-31', '', 1),
(96, '(852)81353735', '', '飞13925223245', '公司使用', '0000-00-00', '2016-08-22', '', 1),
(97, '(852)81354421', '', '飞13823602381', '私人使用', '0000-00-00', '2015-11-15', '', 1),
(98, '(852)81354848', '', '飞13825275769', '私人使用', '0000-00-00', '2015-11-15', '', 1),
(99, 'hk6D客厅冷气保养', '', '', '公司使用', '0000-00-00', '2018-05-12', '', 1),
(100, 'sz4711房屋保险', '', '', '公司使用', '0000-00-00', '2015-08-31', '', 1),
(101, 'P280', '', '', '公司使用', '0000-00-00', '2015-09-18', '', 1),
(102, 'P180', '', '', '公司使用', '0000-00-00', '2015-09-18', '', 1),
(103, '平安银行保险箱1', '', '箱号：B05005  箱型：135*300*500 ', '私人使用', '0000-00-00', '2015-09-19', '', 1),
(104, '平安银行保险箱2', '', '箱号：03205  箱型：135*300*500', '私人使用', '0000-00-00', '2015-09-24', '', 1),
(105, '14529883180', '', '', '私人使用', '0000-00-00', '0000-00-00', '', 1);

-- --------------------------------------------------------

--
-- 表的结构 `em_item_prefix`
--

CREATE TABLE IF NOT EXISTS `em_item_prefix` (
`id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `prefix` varchar(40) NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `em_item_prefix`
--

INSERT INTO `em_item_prefix` (`id`, `name`, `prefix`, `status`) VALUES
(1, 'OEM', '1', 1),
(2, 'EM旧项目', '0', 1),
(3, '内部', '2', 1);

-- --------------------------------------------------------

--
-- 表的结构 `em_item_production`
--

CREATE TABLE IF NOT EXISTS `em_item_production` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `class_name` varchar(50) NOT NULL,
  `client` varchar(50) NOT NULL,
  `contacts` varchar(50) NOT NULL,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  `quote` double(10,2) NOT NULL,
  `appreciation` double(10,2) DEFAULT NULL,
  `gathering_time` date NOT NULL,
  `third_party` double(10,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `costing_time` date NOT NULL,
  `flag` int(11) NOT NULL DEFAULT '0',
  `prefix_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `em_item_production`
--

INSERT INTO `em_item_production` (`id`, `name`, `class_name`, `client`, `contacts`, `start_time`, `end_time`, `quote`, `appreciation`, `gathering_time`, `third_party`, `status`, `costing_time`, `flag`, `prefix_id`) VALUES
('1', 'Gen Code 20140820', '1', '', '', '2014-08-20', '0000-00-00', 500.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB0000', '公司', '程序', '', '', '0000-00-00', '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 2),
('JB0257 ', '報價', '', '', '', '0000-00-00', '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 0),
('JB0273', ' 軟硬件維修', '程序', '', '', '2008-01-01', '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 2),
('JB0318', '追數報告', '', '', '', '0000-00-00', '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 2),
('JB0325', 'R/D研发', '', '', '', '0000-00-00', '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 0),
('JB0338', '完結工作', '', '', '', '0000-00-00', '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 2),
('JB0355', '公司IM', '', '', '', '0000-00-00', '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 2),
('JB1053', '(瑪麗醫院)飲食分析系統開發 ', '程序', '香港瑪麗醫院營養部', 'Vivien Yu', '2011-06-10', '0000-00-00', 47800.00, 30205.51, '0000-00-00', 17594.49, 1, '0000-00-00', 0, 1),
('JB1073', '啟德環保連接網站製作2012', '程序', 'ADSFAX', 'Joyce Lee', '2012-02-16', '2013-04-12', 17000.00, 17000.00, '2012-08-13', 0.00, 1, '0000-00-00', 0, 1),
('JB1079', '機電工程署能源消耗指標及基準工具2013 （EMSD)', '程序', 'A–Tech', 'Amy Choi', '2012-06-11', '2013-05-13', 40000.00, 0.00, '2013-05-08', 0.00, 1, '0000-00-00', 0, 1),
('JB1080', 'Green Building', '程序', 'A-tech Supports', 'Amy Choi', '2012-06-15', '0000-00-00', 79000.00, 0.00, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1096', '運輸資料年報2013', '程序', 'ADSFAX', 'Joyce Lee', '2013-03-07', '2013-08-09', 8000.00, 8000.00, '2013-09-05', 0.00, 1, '0000-00-00', 0, 1),
('JB1097', 'Showcase 2013', '程序', '', '', '2013-04-11', '2013-11-19', 0.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1098', '啟德環保連接網站製作2012第二階段', '程序', '', '', '2013-04-12', '2013-11-01', 0.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1099', 'Schools Speech Choir 2012/13', '非程序', '香港教育局', '馮生', '2013-04-24', '2013-07-17', 19200.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1100', '香港房委会网站图片更新', '程序', '', '', '2013-11-01', '2013-11-01', 11000.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1101', '法援署2012年報網站製作 ', '程序', '', '', '2013-05-07', '2013-12-30', 6500.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1102', 'HKMA2012', '非程序', '', '', '2013-05-08', '2013-06-03', 17000.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1103', '太極氣功十八式2000張CD和長幼齊防高血壓200張CD', '程序', '', '', '2013-06-03', '2013-07-31', 6600.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1104', 'JECT CODE 6萬個+另外11个', '程序', '', '', '2013-06-06', '2013-07-05', 1500.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1105', 'Jectcode 60,000set(2013.07)', '程序', '', '', '2013-07-05', '2013-07-15', 500.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1106', 'OFCA TFR 2012/13', '程序', '', '', '2013-08-05', '2013-12-12', 18000.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1107', '公司註冊處2013年報Autorun程式製作', '程序', '', '', '2013-08-20', '2013-09-13', 2000.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1108', 'Doctors'' Guide 2013/14 CD 2000張', '程序', '', '', '2013-08-21', '2013-09-13', 4200.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1109', 'Vastly網站製作', '程序', '', '', '2013-10-11', '2013-12-12', 5000.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1110', '（運輸署）多媒體CD複製55000張（2013） ', '非程序', '', '', '2013-11-01', '2013-12-10', 66550.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1111', 'Billards網站更新', '程序', '', '', '2013-11-06', '2013-11-26', 1000.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1112', 'Jectcode 41,333', '程序', '', '', '2013-11-07', '2013-11-07', 500.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1113', '譚聖卓師生書畫DVD9複製1000張', '非程序', '', '', '2013-11-27', '2013-12-12', 7500.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1114', '法援署2012年報網站CD光碟複製 ', '非程序', '', '', '2013-12-23', '2014-01-17', 1155.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1115', '法律援助服務局網站製作', '程序', '', '', '2013-12-23', '2014-01-17', 2000.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1116', 'Ject code 20140108', '程序', '', '', '2014-01-08', '2014-01-13', 500.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1117', 'Ject Code 20140228', '程序', '', '', '2014-02-28', '2014-03-01', 500.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1118', 'HKAI_EDM郵件網頁2014', '程序', '', '', '2014-03-03', '2014-03-19', 1000.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1119', 'Ject Code 20140312', '程序', '', '', '2014-03-13', '2014-03-19', 500.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1120', ' Ject Code 20140325(Taiwan) ', '程序', 'A-tech Supports', 'Amy Choi', '2014-03-25', '2014-03-28', 500.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1121', ' 衛生署光碟DVD5（500張）', '非程序', '香港衛生防護中心', 'Alice Cheng', '2014-03-25', '2014-04-09', 7500.00, 3950.00, '0000-00-00', 3550.00, 1, '0000-00-00', 0, 1),
('JB1122', 'Ject Code 20140424(HK)', '程序', 'A-tech Supports', 'Amy Choi', '2014-04-24', '2014-04-24', 500.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1123', 'HKMA 2013', '程序', 'UPOPIA', 'Connie', '2014-05-15', '0000-00-00', 20100.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1124', '教育局数学教育组DVD', '非程序', '香港教育局数学教育组', 'Vincent CHAN', '2014-05-20', '0000-00-00', 15000.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1125', 'Gen Code 20140603', '程序', 'A-tech Supports', 'Amy Choi', '2014-05-30', '0000-00-00', 500.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1126', '小一入學統籌辦法', 'JB1126', '', '', '2014-07-31', '0000-00-00', 118500.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1127', 'Gen Code 20140820', 'JB1127', '', '', '2014-08-20', '0000-00-00', 500.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1128', 'Vastly網站更新', 'JB1128', '', '', '2014-08-28', '0000-00-00', 1000.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1129', '公司註冊處2013-14年報Flash製作', 'JB1129', '', '', '2014-09-19', '0000-00-00', 1000.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1130', 'OFCA TFR 2013/14', 'JB1130', '', '', '2014-10-03', '0000-00-00', 18000.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB1131', 'Flash動畫製作', 'JB1131', '', '', '2014-11-01', '0000-00-00', 1000.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 1),
('JB2001', '期權計算機', '程序', '', '', '2010-04-01', '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 3),
('JB2002', '文件上傳系統', '程序', '', '', '2010-04-01', '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 3),
('JB2003', '按揭計算機', '程序', '', '', '2010-04-01', '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 3),
('JB2004', '資產價格波動計算器', '程序', '', '', '2010-04-01', '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 3),
('JB2005', ' 公司網站_Aspx', '程序', '', '', '2010-04-01', '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 3),
('JB2006', '公司新指紋系統', '程序', '', '', '2010-04-01', '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 3),
('JB2007', ' 項目管理系統_公司', '程序', '', '', '2010-04-01', '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 3),
('JB2008', 'VPN測試', '程序', '', '', '2010-04-01', '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 3),
('JB2009', ' 淘寶（鄭生）', '程序', '', '', '2010-04-01', '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 3),
('JB2010', ' Amy代理 ', '程序', '', '', '2013-04-01', '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 3),
('JB2011', '公司內部系統2014', '程序', '', '', '2014-04-01', '0000-00-00', 0.00, NULL, '0000-00-00', 0.00, 1, '0000-00-00', 0, 3);

-- --------------------------------------------------------

--
-- 表的结构 `em_item_remark`
--

CREATE TABLE IF NOT EXISTS `em_item_remark` (
  `item_id` int(4) NOT NULL,
`id` int(4) NOT NULL,
  `time` datetime NOT NULL,
  `remark` varchar(40) NOT NULL,
  `name` varchar(20) NOT NULL,
  `item_flag` varchar(40) NOT NULL,
  `status` int(11) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `em_item_remark`
--

INSERT INTO `em_item_remark` (`item_id`, `id`, `time`, `remark`, `name`, `item_flag`, `status`) VALUES
(0, 2, '2014-03-14 15:01:42', '', 'sz4711', '出租', 1),
(1, 3, '2014-03-14 15:02:15', '', 'sz6302', '出租', 1),
(1, 4, '2014-03-14 15:02:37', '', 'sz6302', '出租', 1),
(42, 5, '2014-03-21 15:01:31', '下次保养里数为：213134', '650EM_保养维修', '私人使用', 1),
(80, 6, '2014-03-21 15:06:14', '', '梁太私人', '私人使用', 1),
(85, 7, '2014-03-21 15:06:57', '', 'DG42装修', '私人使用', 1),
(76, 8, '2014-03-21 15:07:46', '', 'dg101装修', '私人使用', 1),
(85, 9, '2014-03-21 15:09:16', '', 'DG42装修', '私人使用', 1),
(77, 10, '2014-03-21 15:10:32', '', 'dg20M装修', '私人使用', 1),
(80, 11, '2014-03-21 15:12:00', '', '梁太私人', '私人使用', 1),
(24, 12, '2014-03-24 16:08:42', '下次交租时间：2014-05-01', 'dg203', '公司使用', 1),
(74, 13, '2014-03-24 16:09:13', '', '颐康医院', '私人使用', 1),
(80, 14, '2014-03-28 11:47:59', '', '梁太私人', '私人使用', 1),
(42, 15, '2014-03-28 11:56:17', '下次保养里数为：213134', '650EM_保养维修', '私人使用', 1),
(42, 16, '2014-03-28 15:27:03', '下次保养里数为：223767', '650EM_保养维修', '私人使用', 1),
(86, 17, '2014-03-28 15:27:44', '', 'HK12A装修', '私人使用', 1),
(77, 18, '2014-03-28 16:56:54', '', 'dg20M装修', '私人使用', 1),
(85, 19, '2014-03-28 16:57:23', '', 'DG42装修', '私人使用', 1),
(74, 20, '2014-03-29 11:51:28', '预￥7,300.00', '颐康医院', '私人使用', 1),
(89, 21, '2014-04-07 18:34:33', '合同到期日为2015-03-31', '陈燕玲社保', '出租', 1),
(66, 22, '2014-04-11 16:42:57', '下次保养里数为：146249', '970V_保养维修', '私人使用', 1),
(76, 23, '2014-04-11 16:43:50', '', 'dg101装修', '私人使用', 1),
(77, 24, '2014-04-11 16:44:03', '', 'dg20M装修', '私人使用', 1),
(85, 25, '2014-04-11 16:44:57', '', 'DG42装修', '私人使用', 1),
(85, 26, '2014-04-11 16:45:17', '', 'DG42装修', '私人使用', 1),
(42, 27, '2014-04-11 16:45:34', '下次保养里数为：223767', '650EM_保养维修', '私人使用', 1),
(89, 28, '2014-04-15 10:28:44', '合同到期日为2015-03-31', '陈燕玲社保', '出租', 1),
(89, 29, '2014-04-16 11:25:20', '社保7051，手续费600（每月金额为6', '陈燕玲社保', '出租', 1),
(42, 30, '2014-04-17 15:38:41', '下次保养里数为：223767', '650EM_保养维修', '私人使用', 1),
(80, 31, '2014-04-17 15:42:26', '', '梁太私人', '私人使用', 1),
(85, 32, '2014-04-17 15:56:14', '', 'DG42装修', '私人使用', 1),
(76, 33, '2014-04-17 15:57:44', '', 'dg101装修', '私人使用', 1),
(66, 34, '2014-04-18 14:10:45', '下次保养里数为：146249', '970V_保养维修', '私人使用', 1),
(79, 35, '2014-04-21 17:41:53', '', '驾驶违章', '公司使用', 1),
(76, 36, '2014-04-24 17:03:10', '', 'dg101装修', '私人使用', 1),
(80, 37, '2014-04-24 17:04:05', '', '梁太私人', '私人使用', 1),
(85, 38, '2014-04-24 17:04:53', '', 'DG42装修', '私人使用', 1),
(76, 39, '2014-04-24 17:05:00', '', 'dg101装修', '私人使用', 1),
(80, 40, '2014-04-24 17:05:05', '', '梁太私人', '私人使用', 1),
(42, 41, '2014-04-25 11:41:00', '下次保养里数为：223767', '650EM_保养维修', '私人使用', 1),
(66, 42, '2014-04-25 11:41:14', '下次保养里数为：146249', '970V_保养维修', '私人使用', 1),
(42, 43, '2014-05-05 10:59:41', '下次保养里数为：223767', '650EM_保养维修', '私人使用', 1),
(80, 44, '2014-05-05 11:03:41', '', '梁太私人', '私人使用', 1),
(76, 45, '2014-05-05 11:20:30', '', 'dg101装修', '私人使用', 1),
(85, 46, '2014-05-05 11:21:35', '', 'DG42装修', '私人使用', 1),
(92, 47, '2014-05-06 11:08:35', '客服：81388888，密碼：1243', '81320225', '公司使用', 1),
(92, 48, '2014-05-06 11:08:53', '客服：81388888   密碼：124', '81320225', '公司使用', 1),
(76, 49, '2014-05-08 16:33:50', '', 'dg101装修', '私人使用', 1),
(85, 50, '2014-05-08 16:39:04', '', 'DG42装修', '私人使用', 1),
(77, 51, '2014-05-08 16:47:00', '', 'dg20M装修', '私人使用', 1),
(80, 52, '2014-05-08 17:09:46', '', '梁太私人', '私人使用', 1),
(75, 53, '2014-05-08 17:11:55', '下次缴费时间2014年8月6日', '盈捷（私人）', '私人使用', 1),
(85, 54, '2014-05-13 11:20:29', '', 'DG42装修', '私人使用', 1),
(80, 55, '2014-05-13 11:40:04', '', '梁太私人', '私人使用', 1),
(42, 56, '2014-05-14 09:14:45', '下次保养里数为：223767', '650EM_保养维修', '私人使用', 1),
(89, 57, '2014-05-14 10:14:54', '', '陈燕玲社保', '出租', 1),
(89, 58, '2014-05-14 10:15:00', '', '陈燕玲社保', '出租', 1),
(77, 59, '2014-05-22 14:26:26', '', 'dg20M装修', '私人使用', 1),
(86, 60, '2014-05-22 14:27:24', '', 'HK12A装修', '私人使用', 1),
(85, 61, '2014-05-22 14:28:00', '', 'DG42装修', '私人使用', 1),
(85, 62, '2014-05-22 14:28:08', '', 'DG42装修', '私人使用', 1),
(80, 63, '2014-05-22 14:43:45', '', '梁太私人', '私人使用', 1),
(24, 64, '2014-05-22 15:24:32', '下次交租时间：2014-08-01', 'dg203', '公司使用', 1),
(42, 65, '2014-05-23 11:01:25', '下次保养里数为：223767', '650EM_保养维修', '私人使用', 1),
(80, 66, '2014-05-29 09:38:36', '', '梁太私人', '私人使用', 1),
(42, 67, '2014-05-29 09:41:40', '下次保养里数为：223767', '650EM_保养维修', '私人使用', 1),
(57, 68, '2014-05-29 11:03:12', '下次交费时间2014年8月6日', '盈捷（公司）', '公司使用', 1),
(77, 69, '2014-05-29 11:08:33', '', 'dg20M装修', '私人使用', 1),
(85, 70, '2014-05-29 11:08:52', '', 'DG42装修', '私人使用', 1),
(86, 71, '2014-05-29 11:09:06', '', 'HK12A装修', '私人使用', 1),
(80, 72, '2014-06-04 16:39:14', '', '梁太私人', '私人使用', 1),
(42, 73, '2014-06-05 11:06:41', '下次保养里数为：223767', '650EM_保养维修', '私人使用', 1),
(85, 74, '2014-06-05 11:15:56', '', 'DG42装修', '私人使用', 1),
(85, 75, '2014-06-05 14:49:26', '', 'DG42装修', '私人使用', 1),
(80, 76, '2014-06-12 15:20:23', '', '梁太私人', '私人使用', 1),
(76, 77, '2014-06-12 15:22:11', '', 'dg101装修', '私人使用', 1),
(80, 78, '2014-06-12 15:22:23', '', '梁太私人', '私人使用', 1),
(85, 79, '2014-06-12 15:22:35', '', 'DG42装修', '私人使用', 1),
(42, 80, '2014-06-12 15:26:48', '下次保养里数为：223767', '650EM_保养维修', '私人使用', 1),
(8, 81, '2014-06-17 14:52:30', '结余 2766.19', '蒋亚莉社保', '出租', 1),
(89, 82, '2014-06-17 14:53:10', '结余 5489.85', '陈燕玲社保', '出租', 1),
(80, 83, '2014-06-19 14:59:47', '', '梁太私人', '私人使用', 1),
(76, 84, '2014-06-19 16:34:50', '', 'dg101装修', '私人使用', 1),
(77, 85, '2014-06-19 16:35:23', '', 'dg20M装修', '私人使用', 1),
(85, 86, '2014-06-19 16:36:00', '', 'DG42装修', '私人使用', 1),
(42, 87, '2014-06-20 09:37:21', '下次保养里数为：223431', '650EM_保养维修', '私人使用', 1),
(42, 88, '2014-06-20 09:38:28', '下次保养里数为：223767', '650EM_保养维修', '私人使用', 1),
(42, 89, '2014-07-03 15:45:41', '下次保养里数为：223767', '650EM_保养维修', '私人使用', 1),
(42, 90, '2014-07-03 15:58:28', '', '650EM_保养维修', '私人使用', 1),
(74, 91, '2014-07-03 16:00:01', '', '颐康医院', '私人使用', 1),
(80, 92, '2014-07-03 16:27:19', '', '梁太私人', '私人使用', 1),
(77, 93, '2014-07-03 16:27:28', '', 'dg20M装修', '私人使用', 1),
(76, 94, '2014-07-03 16:27:33', '', 'dg101装修', '私人使用', 1),
(85, 95, '2014-07-03 16:27:42', '', 'DG42装修', '私人使用', 1),
(86, 96, '2014-07-03 16:27:49', '', 'HK12A装修', '私人使用', 1),
(27, 97, '2014-07-07 10:24:32', '下次交费时间：2014年9月1日', '租用打印机AF3245C', '公司使用', 1),
(8, 98, '2014-07-29 11:44:59', '结余 2206.61', '蒋亚莉社保', '出租', 1),
(89, 99, '2014-07-29 11:45:28', '结余 4702.80', '陈燕玲社保', '出租', 1),
(24, 100, '2014-08-08 11:25:47', '下次交租时间：2014-11-01', 'dg203', '公司使用', 1),
(75, 101, '2014-08-11 15:46:05', '下次缴费时间2014年11月6日', '盈捷（私人）', '私人使用', 1),
(8, 102, '2014-08-13 11:58:25', '结余 1681.12', '蒋亚莉社保', '出租', 1),
(57, 103, '2014-08-13 12:00:43', '下次交费时间2014年11月6日', '盈捷（公司）', '公司使用', 1),
(89, 104, '2014-08-13 12:01:13', '结余 3934.43', '陈燕玲社保', '出租', 1),
(95, 105, '2014-08-13 12:01:30', '结余 2810.84', '林丽篱社保', '私人使用', 1),
(96, 106, '2014-08-15 11:57:22', '飞13925223245', '81353735', '私人使用', 1),
(96, 107, '2014-08-15 11:57:26', '飞13925223245', '81353735', '私人使用', 1),
(97, 108, '2014-08-15 11:58:15', '飞13823602381', '81354421', '私人使用', 1),
(98, 109, '2014-08-15 11:58:26', '飞13825275769', '81354848', '私人使用', 1),
(36, 110, '2014-08-29 15:56:50', '', '13632685892', '公司使用', 1),
(48, 111, '2014-08-29 15:56:59', '', '(852) 25779723', '公司使用', 1),
(1, 120, '2014-09-10 17:18:22', '', 'sz6302', '出租', 1),
(27, 121, '2014-09-11 16:47:43', '下次交费时间：2014年12月1日', '租用打印机AF3245C', '公司使用', 1),
(8, 122, '2014-09-18 16:16:20', '结余 1158.63', '蒋亚莉社保', '出租', 1),
(23, 123, '2014-09-18 16:16:49', '', 'metropolegroup.com.h', '出租', 1),
(89, 124, '2014-09-18 16:17:07', '结余 3181.72', '陈燕玲社保', '出租', 1),
(95, 125, '2014-09-18 16:17:17', '结余2108.13', '林丽篱社保', '出租', 1),
(104, 126, '2014-09-26 17:01:09', '箱号：03205  箱型：135*300*500', '平安银行保险箱2', '私人使用', 1),
(103, 127, '2014-09-26 17:01:33', '箱号：B05005  箱型：135*300*500 ', '平安银行保险箱1', '私人使用', 1),
(82, 128, '2014-10-13 11:02:15', 'dg20M门锁', '13612835484', '私人使用', 1),
(36, 129, '2014-10-25 02:10:34', '停机，保号', '13632685892', '公司使用', 1),
(2, 130, '2014-10-25 02:41:54', '新合同到期日：2015-05-31', 'sz4711', '出租', 1),
(75, 131, '2014-11-17 15:35:06', '下次缴费时间2015年02月6日', '盈捷（私人）', '私人使用', 1),
(24, 132, '2014-11-17 15:35:28', '下次交租时间：2015.02.01', 'dg203', '公司使用', 1),
(58, 133, '2014-11-17 15:36:12', '', 'dg42', '私人使用', 1),
(75, 134, '2014-11-17 15:37:35', '下次缴费时间2015年02月6日', '盈捷（私人）', '私人使用', 1),
(8, 135, '2014-11-17 16:04:18', '结余 113.67', '蒋亚莉社保', '出租', 1),
(89, 136, '2014-11-17 16:04:52', '结余1676.3', '陈燕玲社保', '出租', 1),
(95, 137, '2014-11-17 16:05:07', '结余774.71', '林丽篱社保', '出租', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `em_item_class`
--
ALTER TABLE `em_item_class`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_item_flag`
--
ALTER TABLE `em_item_flag`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_item_outwork`
--
ALTER TABLE `em_item_outwork`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_item_prefix`
--
ALTER TABLE `em_item_prefix`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_item_production`
--
ALTER TABLE `em_item_production`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `em_item_remark`
--
ALTER TABLE `em_item_remark`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `em_item_class`
--
ALTER TABLE `em_item_class`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `em_item_flag`
--
ALTER TABLE `em_item_flag`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `em_item_outwork`
--
ALTER TABLE `em_item_outwork`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=106;
--
-- AUTO_INCREMENT for table `em_item_prefix`
--
ALTER TABLE `em_item_prefix`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `em_item_remark`
--
ALTER TABLE `em_item_remark`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=138;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;