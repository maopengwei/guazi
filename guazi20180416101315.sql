-- MySQL dump 10.13  Distrib 5.5.53, for Win32 (AMD64)
--
-- Host: localhost    Database: guazi
-- ------------------------------------------------------
-- Server version	5.5.53

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `attribute`
--

DROP TABLE IF EXISTS `attribute`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attribute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pd_id` int(11) DEFAULT NULL,
  `key` varchar(255) DEFAULT NULL COMMENT '属性名',
  `value` text COMMENT '属性值 中间用,号隔开】',
  `delete_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='属性表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attribute`
--

LOCK TABLES `attribute` WRITE;
/*!40000 ALTER TABLE `attribute` DISABLE KEYS */;
INSERT INTO `attribute` VALUES (2,1,'颜色','红色,绿色',NULL),(3,1,'尺寸','5厘米,10厘米',NULL),(4,12,'大小','10厘米,11厘米',NULL),(5,12,'颜色','红色,绿色',NULL);
/*!40000 ALTER TABLE `attribute` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carouse`
--

DROP TABLE IF EXISTS `carouse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carouse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` text COMMENT '轮播图地址',
  `sort` int(11) DEFAULT '1' COMMENT '排序',
  `url` varchar(255) DEFAULT '#' COMMENT '链接',
  `name` varchar(255) DEFAULT NULL COMMENT '图片名称',
  `status` int(11) DEFAULT '1' COMMENT '是否显示 1 显示',
  `add_time` datetime DEFAULT NULL COMMENT '添加时间',
  `delete_time` int(11) DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='轮播图';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carouse`
--

LOCK TABLES `carouse` WRITE;
/*!40000 ALTER TABLE `carouse` DISABLE KEYS */;
INSERT INTO `carouse` VALUES (1,'/uploads/20180404/4561522809037.png\0',5,'123','555',1,'2018-03-29 00:00:00',NULL),(2,'/uploads/20180404/4561522809037.png\0',1,'','',1,'2018-04-04 00:00:00',NULL),(3,'/uploads/20180404/4561522809037.png\0',1,'','',1,'2018-04-04 00:00:00',NULL),(4,'/uploads/20180404/4561522809037.png\0',1,'','',1,'2018-04-04 00:00:00',NULL),(5,'/uploads/20180404/4561522809037.png\0',1,'','',1,'2018-04-04 00:00:00',NULL),(6,'/uploads/20180404/4561522809037.png\0',1,'','',1,'2018-04-04 00:00:00',NULL),(7,'/uploads/20180404/4561522809037.png\0',1,'','',1,'2018-04-04 00:00:00',NULL);
/*!40000 ALTER TABLE `carouse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `center`
--

DROP TABLE IF EXISTS `center`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `center` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '用户id',
  `add_time` datetime DEFAULT NULL COMMENT '申请时间',
  `status` int(11) DEFAULT '0' COMMENT '状态0 1通过2驳回',
  `deal_time` datetime DEFAULT NULL COMMENT '处理时间',
  `delete_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COMMENT='报单中心申请表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `center`
--

LOCK TABLES `center` WRITE;
/*!40000 ALTER TABLE `center` DISABLE KEYS */;
INSERT INTO `center` VALUES (1,15,'2018-03-29 16:00:18',0,'2018-03-29 16:05:46',1522310806),(2,15,'2018-03-29 16:00:50',0,'2018-04-12 14:47:33',NULL),(3,15,'2018-03-29 16:00:54',0,'2018-04-12 14:46:22',NULL),(4,15,'2018-04-11 15:53:25',0,'2018-04-12 14:45:54',NULL),(5,1,'2018-04-11 16:10:06',0,'2018-04-12 14:45:22',NULL),(6,1,'2018-04-11 16:12:05',1,'2018-04-12 14:53:59',NULL),(7,1,'2018-04-11 16:12:10',2,'2018-04-12 14:53:22',NULL),(8,1,'2018-04-11 16:12:33',1,'2018-04-12 14:53:11',NULL),(9,1,'2018-04-11 16:12:33',0,'2018-04-12 14:40:47',NULL),(10,1,'2018-04-11 16:12:33',0,'2018-04-12 14:40:47',NULL),(11,1,'2018-04-11 16:12:33',0,'2018-04-12 14:40:47',NULL),(12,1,'2018-04-11 16:12:33',0,'2018-04-12 14:40:47',NULL),(13,1,'2018-04-11 16:12:33',0,'2018-04-12 14:40:47',NULL),(14,1,'2018-04-11 16:12:33',0,'2018-04-12 14:40:47',NULL),(15,1,'2018-04-11 16:12:33',0,'2018-04-12 14:40:47',NULL),(17,1,'2018-04-11 16:12:33',0,'2018-04-12 14:40:47',NULL),(19,1,'2018-04-11 16:12:33',0,'2018-04-12 14:40:47',NULL),(20,1,'2018-04-11 16:12:33',0,'2018-04-12 14:40:47',NULL),(21,1,'2018-04-11 16:12:33',0,'2018-04-12 14:40:47',NULL),(22,1,'2018-04-11 16:12:33',0,'2018-04-12 14:40:47',NULL),(24,1,'2018-04-11 16:12:33',0,'2018-04-12 14:40:47',NULL),(26,1,'2018-04-11 16:12:33',0,'2018-04-12 14:40:47',NULL),(27,1,'2018-04-11 16:12:33',0,'2018-04-12 14:40:47',NULL),(29,1,'2018-04-11 16:12:33',0,'2018-04-12 14:40:47',NULL),(30,1,'2018-04-11 16:12:33',0,'2018-04-12 14:40:47',NULL),(31,1,'2018-04-11 16:12:33',0,'2018-04-12 14:40:47',NULL),(32,1,'2018-04-11 16:12:33',0,'2018-04-12 14:40:47',NULL),(33,1,'2018-04-11 16:12:33',0,'2018-04-12 14:40:47',NULL),(34,1,'2018-04-11 16:12:33',0,'2018-04-12 14:40:47',NULL),(35,1,'2018-04-11 16:12:33',0,'2018-04-12 14:40:47',NULL),(36,1,'2018-04-11 16:12:33',0,'2018-04-12 14:40:47',NULL),(37,1,'2018-04-11 16:12:33',1,'2018-04-12 14:55:57',NULL);
/*!40000 ALTER TABLE `center` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `code`
--

DROP TABLE IF EXISTS `code`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tel` varchar(11) DEFAULT NULL COMMENT '电话',
  `code` int(11) DEFAULT NULL COMMENT '验证码',
  `add_time` int(10) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='验证码';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `code`
--

LOCK TABLES `code` WRITE;
/*!40000 ALTER TABLE `code` DISABLE KEYS */;
INSERT INTO `code` VALUES (14,'',123456,1522677933),(16,'18739912539',123456,1522681161);
/*!40000 ALTER TABLE `code` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config`
--

DROP TABLE IF EXISTS `config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL,
  `value` text,
  `note` varchar(255) DEFAULT NULL COMMENT '说明',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COMMENT='系统表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config`
--

LOCK TABLES `config` WRITE;
/*!40000 ALTER TABLE `config` DISABLE KEYS */;
INSERT INTO `config` VALUES (1,'status','1','网站状态'),(2,'recharge','100','提现手续费%'),(3,'p_profit','20','静态收益父账号%'),(4,'b_profit','30','静态收益自己%'),(5,'direct_profit','10','动态直推奖励%'),(6,'price','4','1个瓜子币多少人民币'),(7,'about',' 用途：匹配、查找、替换、分割 \n    2. php提供了两套正则表达式函数库 \n        *1. Perl 兼容正则表达式函数（推荐使用） \n        2. POSIX 扩展正则表达式函数\n\n ','网站介绍'),(8,'account_name','盼盼公司1','银行名称'),(9,'account_bank','55551','银行卡号'),(10,'account_person','毛毛1','法人'),(11,'present','0-9] 表示任意一位数字 \n9] 表示任意一位大小字母或数字 \n\n\n\n\n\n这是第二条!','新手礼包'),(12,'rights',' 正则表达式的组成部分： \n  1. 原子是组成正则表达式的基本单位,在分析正则表达式时，应作为一个整体。 \n  2. 这是第二条\n','权益保证'),(13,'cash_switch','0','现金投资开关'),(14,'carouse','/uploads/20180414/8561523703702.png,/uploads/20180414/4071523708690.png','轮播图');
/*!40000 ALTER TABLE `config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `config_static`
--

DROP TABLE IF EXISTS `config_static`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `config_static` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(11) DEFAULT NULL COMMENT '等级',
  `msc` int(11) DEFAULT NULL COMMENT '量',
  `profit` int(11) DEFAULT NULL COMMENT '千分之',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='静态配置表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `config_static`
--

LOCK TABLES `config_static` WRITE;
/*!40000 ALTER TABLE `config_static` DISABLE KEYS */;
INSERT INTO `config_static` VALUES (1,1,500,10),(2,2,2000,15),(3,3,5000,20),(4,4,10000,50),(5,5,50000,100);
/*!40000 ALTER TABLE `config_static` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '标题',
  `content` text COMMENT '内容',
  `add_time` datetime DEFAULT NULL COMMENT '添加时间',
  `delete_time` int(11) DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COMMENT='信息表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (1,'maomao','5asd4f54adf545as4f','2018-03-29 00:00:00',1522324408),(2,'这是一条公告','公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容','2018-03-31 00:00:00',NULL),(3,'这是一条公告','公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容','2018-03-31 00:00:00',NULL),(4,'这是一条公告','公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容','2018-03-31 00:00:00',NULL),(5,'这是N条公告','公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容','2018-03-31 00:00:00',NULL),(6,'这是N条公告','公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容','2018-03-31 00:00:00',1523263050),(7,'这是N条公告','公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容','2018-03-31 00:00:00',NULL),(8,'这是N条公告','公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容','2018-03-31 00:00:00',NULL),(9,'这是N条公告','公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容','2018-03-31 00:00:00',NULL),(10,'这是N条公告','公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容','2018-03-31 00:00:00',NULL),(11,'这是N条公告','公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容','2018-03-31 00:00:00',NULL),(12,'这是N条公告','公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容','2018-03-31 00:00:00',NULL),(13,'这是N条公告','公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容','2018-03-31 00:00:00',NULL),(14,'这是N条公告','公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容','2018-03-31 00:00:00',NULL),(15,'这是N条公告','公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容公告内容','2018-03-31 00:00:00',1523322396),(16,'名字','12312313','2018-04-09 00:00:00',1523263072);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `msc`
--

DROP TABLE IF EXISTS `msc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `msc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `jine` decimal(10,2) DEFAULT NULL,
  `type` int(11) DEFAULT NULL COMMENT '类型',
  `add_time` datetime DEFAULT NULL COMMENT '添加时间',
  `note` varchar(255) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `msc`
--

LOCK TABLES `msc` WRITE;
/*!40000 ALTER TABLE `msc` DISABLE KEYS */;
INSERT INTO `msc` VALUES (1,1,50.00,6,'2018-04-12 10:10:34','后台赠送',NULL),(2,1,500.00,7,'2018-04-12 10:11:21','后台扣除',NULL),(3,1,50.00,5,'2018-04-12 10:44:36','后台赠送',NULL),(4,1,500.00,5,'2018-04-12 10:45:23','后台赠送',NULL),(5,1,500.00,5,'2018-04-12 10:46:12','后台赠送',NULL),(6,1,50.00,5,'2018-04-12 10:46:28','后台赠送',NULL),(7,1,100.00,5,'2018-04-12 10:47:59','后台赠送',NULL),(8,1,100.00,5,'2018-04-12 10:48:41','后台赠送',NULL),(9,1,100.00,5,'2018-04-12 10:49:33','后台赠送',NULL),(10,1,100.00,5,'2018-04-12 10:50:45','后台赠送',NULL),(11,1,500.00,6,'2018-04-12 10:51:01','后台扣除',NULL),(12,1,100.00,5,'2018-04-12 10:51:17','后台赠送',NULL),(13,1,100.00,6,'2018-04-12 10:51:33','后台扣除',NULL),(14,1,500.00,6,'2018-04-12 10:51:49','后台扣除',NULL),(15,1,500.00,6,'2018-04-12 10:52:07','后台扣除',NULL),(16,1,100.00,6,'2018-04-12 10:52:25','后台扣除',NULL),(17,1,100.00,6,'2018-04-12 10:52:41','后台扣除',NULL),(18,13,100.00,1,'2018-04-13 11:31:25','动态直推奖',NULL),(19,51,0.76,3,'2018-04-13 17:22:44','动态绩效奖',NULL);
/*!40000 ALTER TABLE `msc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_number` varchar(255) DEFAULT NULL COMMENT '订单号',
  `uid` int(11) DEFAULT NULL COMMENT '用户id',
  `pd_id` int(11) DEFAULT NULL,
  `pd_name` varchar(255) DEFAULT NULL,
  `pd_price` varchar(255) DEFAULT NULL,
  `pd_num` int(11) DEFAULT NULL,
  `pd_attribute` varchar(11) DEFAULT NULL COMMENT '属性',
  `note` int(11) DEFAULT NULL COMMENT '备注',
  `add_time` datetime DEFAULT NULL COMMENT '购买时间',
  `status` int(11) DEFAULT '1' COMMENT '状态',
  `deliver_time` datetime DEFAULT NULL COMMENT '发货时间',
  `deliver_number` int(11) DEFAULT NULL COMMENT '物流单号',
  `deliver_company` varchar(255) DEFAULT NULL COMMENT '物流公司',
  `finish_time` datetime DEFAULT NULL COMMENT '完成时间',
  `delete_time` int(11) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL COMMENT '手机号',
  `address` varchar(225) DEFAULT NULL COMMENT '地址',
  `uname` varchar(255) DEFAULT NULL COMMENT '收货人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='订单';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
INSERT INTO `order` VALUES (1,'gz2018032914090410000001',15,1,NULL,'150.00',5,'0',123,'2018-03-29 14:09:04',2,'2018-03-29 14:35:42',213123,'中通','2018-03-29 14:23:42',NULL,NULL,NULL,NULL),(2,'gz2018032914103710000002',15,1,'maoma555','150.00',5,'',123,'2018-03-29 14:10:37',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'gz2018032914132510000003',15,1,'maoma555','150.00',5,'',123,'2018-03-29 14:13:25',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'gz2018040419093610000004',15,12,'maoma555','150.00',1,'',NULL,'2018-04-04 19:09:36',0,NULL,NULL,NULL,NULL,NULL,'18739912507','郑州光华村','maomao'),(5,'gz2018040420170610000005',1,12,'maoma555','150.00',1,'',NULL,'2018-04-04 20:17:06',1,NULL,NULL,NULL,NULL,NULL,'13071099897','123','杜鞥年'),(6,'gz2018040420173310000006',1,12,'maoma555','150.00',1,'',NULL,'2018-04-04 20:17:33',1,NULL,NULL,NULL,NULL,NULL,'13071099897','123','杜鞥年'),(7,'gz2018040420194110000007',1,12,'maoma555','150.00',1,'',NULL,'2018-04-04 20:19:41',1,NULL,NULL,NULL,NULL,NULL,'12345678912','123456','杜梦'),(8,'gz2018040420195910000008',1,12,'maoma555','150.00',1,'',NULL,'2018-04-04 20:19:59',1,NULL,NULL,NULL,NULL,NULL,'12345678912','123456','杜梦'),(9,'gz2018040420212010000009',1,12,'maoma555','150.00',1,'',NULL,'2018-04-04 20:21:20',1,NULL,NULL,NULL,NULL,NULL,'12345646464','123456','杜梦'),(10,'gz2018040420214210000010',1,12,'maoma555','150.00',1,'',NULL,'2018-04-04 20:21:42',1,NULL,NULL,NULL,NULL,NULL,'12345646464','123456','杜梦'),(11,'gz2018040420251310000011',1,12,'maoma555','150.00',1,'',NULL,'2018-04-04 20:25:13',1,NULL,NULL,NULL,NULL,NULL,'13123133543','1132131','杜鞥年'),(12,'gz2018040420214210000010',1,12,'maoma555','150.00',1,'',NULL,'2018-04-04 20:21:42',1,'1899-12-29 00:00:00',NULL,'','1899-12-29 00:00:00',NULL,'12345646464','123456','杜梦'),(13,'gz2018040420214210000010',1,12,'maoma555','150.00',1,'',NULL,'2018-04-04 20:21:42',1,'1899-12-29 00:00:00',NULL,'','1899-12-29 00:00:00',NULL,'12345646464','123456','杜梦'),(14,'gz2018040420214210000010',1,12,'maoma555','150.00',1,'',NULL,'2018-04-04 20:21:42',1,'1899-12-29 00:00:00',NULL,'','1899-12-29 00:00:00',NULL,'12345646464','123456','杜梦'),(15,'gz2018040420214210000010',1,12,'maoma555','150.00',1,'',NULL,'2018-04-04 20:21:42',1,'1899-12-29 00:00:00',NULL,'','1899-12-29 00:00:00',NULL,'12345646464','123456','杜梦'),(16,'gz2018040420214210000010',1,12,'maoma555','150.00',1,'',NULL,'2018-04-04 20:21:42',1,'1899-12-29 00:00:00',NULL,'','1899-12-29 00:00:00',NULL,'12345646464','123456','杜梦'),(17,'gz2018040420214210000010',1,12,'maoma555','150.00',1,'',NULL,'2018-04-04 20:21:42',1,'1899-12-29 00:00:00',NULL,'','1899-12-29 00:00:00',NULL,'12345646464','123456','杜梦'),(18,'gz2018040420214210000010',1,12,'maoma555','150.00',1,'',NULL,'2018-04-04 20:21:42',1,'1899-12-29 00:00:00',NULL,'','1899-12-29 00:00:00',NULL,'12345646464','123456','杜梦');
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT '产品名字',
  `price` decimal(10,2) DEFAULT NULL COMMENT '价格',
  `pic` varchar(255) DEFAULT NULL COMMENT '主图',
  `content` text COMMENT '详情',
  `inventory` int(11) DEFAULT NULL COMMENT '库存',
  `sales` int(11) DEFAULT '0' COMMENT '销量',
  `delete_time` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0' COMMENT '状态',
  `sort` int(11) DEFAULT '1' COMMENT '排序',
  `type_id` int(11) DEFAULT NULL COMMENT '分类id',
  `is_hot` int(11) DEFAULT '0' COMMENT '1为热销',
  `yuan` decimal(10,2) DEFAULT NULL COMMENT '原价',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COMMENT='产品';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'maoma555',150.00,'/uploads/20180404/4851522816092.png','321123',85,15,NULL,1,1,1,1,0.00),(2,'dddd',0.00,'/uploads/20180404/4851522816092.png','',0,0,NULL,1,1,1,1,0.00),(3,'maoma555',150.00,'/uploads/20180404/4851522816092.png','321123',85,15,NULL,1,1,1,1,0.00),(4,'maoma555',150.00,'/uploads/20180404/4851522816092.png','321123',85,15,NULL,1,1,11,1,0.00),(5,'maoma555',150.00,'/uploads/20180404/4851522816092.png','321123',85,15,NULL,1,1,1,1,0.00),(6,'maoma555',150.00,'/uploads/20180404/4851522816092.png','321123',85,15,NULL,1,1,1,1,0.00),(7,'maoma555',150.00,'/uploads/20180404/4851522816092.png','321123',85,15,NULL,1,1,1,1,0.00),(8,'maoma555',150.00,'/uploads/20180404/4851522816092.png','321123',85,15,NULL,1,1,1,1,0.00),(9,'maoma555',150.00,'/uploads/20180404/4851522816092.png','321123',85,15,NULL,1,1,1,1,0.00),(10,'maoma555',150.00,'/uploads/20180404/4851522816092.png','321123',85,15,NULL,1,1,1,1,0.00),(11,'maoma555',150.00,'/uploads/20180404/4851522816092.png','321123',85,15,NULL,1,1,1,1,0.00),(12,'maoma555',150.00,'/uploads/20180404/4851522816092.png','/uploads/20180404/4851522816092.png,/uploads/20180404/4851522816092.png,/uploads/20180404/4851522816092.png,/uploads/20180404/4851522816092.png,/uploads/20180404/4851522816092.png,/uploads/20180404/4851522816092.png,/uploads/20180404/4851522816092.png,/uploads/20180404/4851522816092.png,/uploads/20180404/4851522816092.png',77,23,NULL,1,1,1,1,0.00),(13,'maoma555',150.00,'/uploads/20180404/4851522816092.png','321123',85,15,NULL,1,1,1,1,0.00),(14,'maoma555',150.00,'/uploads/20180404/4851522816092.png','321123',85,15,NULL,1,1,11,0,0.00),(15,'maoma555',150.00,'/uploads/20180404/4851522816092.png','321123',85,15,NULL,1,1,1,0,0.00),(16,'maoma555',150.00,'/uploads/20180404/4851522816092.png','321123',85,15,1523361179,1,1,1,0,0.00),(17,'maoma555',150.00,'/uploads/20180404/4851522816092.png','321123',85,15,NULL,1,1,1,0,0.00),(18,'maoma555',150.00,'/uploads/20180404/4851522816092.png','321123',85,15,1523361169,1,1,1,0,0.00),(19,'maoma555',150.00,'/uploads/20180404/4851522816092.png','321123',85,15,NULL,1,1,1,0,0.00),(20,'maoma555',150.00,'/uploads/20180404/4851522816092.png','321123',85,15,1523361155,1,1,1,0,0.00),(21,'maoma555',150.00,'/uploads/20180404/4851522816092.png','321123',85,15,1523519446,1,1,1,0,0.00),(22,'1',1.00,'/uploads/20180413/5191523604602.png','/uploads/20180413/7111523604604.png,/uploads/20180413/8221523604606.png',1,0,NULL,0,1,11,0,NULL),(23,'1',2.00,'/uploads/20180413/7611523605100.png','/uploads/20180413/4731523605104.png,/uploads/20180413/1661523605106.png',3,0,NULL,0,1,1,0,NULL),(24,'1',2.00,'/uploads/20180413/1241523605203.png','/uploads/20180413/6341523605201.png,/uploads/20180413/3221523605203.png',3,0,NULL,0,1,1,0,NULL),(25,'测试',123.00,'/uploads/20180413/9191523606348.png','/uploads/20180413/6901523606351.png,/uploads/20180413/5311523606353.png,/uploads/20180413/2581523606355.png,/uploads/20180413/3731523606642.png',1234,0,NULL,1,1,1,0,NULL),(26,'测试',123.00,'/uploads/20180413/9191523606348.png','/uploads/20180413/6901523606351.png,/uploads/20180413/5311523606353.png,/uploads/20180413/2581523606355.png,/uploads/20180413/3731523606642.png',1234,0,NULL,2,1,18,0,NULL),(27,'ddd',10.00,'/uploads/20180414/6531523689049.png','/uploads/20180414/7501523689052.png,/uploads/20180414/2261523689053.png,/uploads/20180414/4851523689139.png',2,0,NULL,1,1,17,0,NULL);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profit`
--

DROP TABLE IF EXISTS `profit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profit` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '收益表',
  `uid` int(11) DEFAULT NULL COMMENT '用户id',
  `add_time` datetime DEFAULT NULL,
  `jine` decimal(10,2) DEFAULT NULL COMMENT '金额',
  `type` int(11) DEFAULT NULL COMMENT '奖励类型',
  `note` varchar(11) DEFAULT NULL COMMENT '说明',
  `from_id` int(11) DEFAULT NULL COMMENT '来自哪个人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='静态收益表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profit`
--

LOCK TABLES `profit` WRITE;
/*!40000 ALTER TABLE `profit` DISABLE KEYS */;
/*!40000 ALTER TABLE `profit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '用户id',
  `add_time` datetime DEFAULT NULL COMMENT '购买时间',
  `jine` decimal(10,2) DEFAULT NULL COMMENT '金额',
  `deal_time` datetime DEFAULT NULL COMMENT '处理时间',
  `type` int(11) DEFAULT NULL COMMENT '购买类型0瓜子币1现金',
  `check_id` int(11) DEFAULT NULL COMMENT '审核人id',
  `level` int(11) DEFAULT NULL COMMENT '等级',
  `status` int(11) DEFAULT '0' COMMENT '状态  1审核通过 2驳回',
  `delete_time` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COMMENT='购买记录';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
INSERT INTO `purchase` VALUES (1,1,'2018-03-26 10:34:04',500.00,'2018-03-26 10:46:19',1,1,1,1,1522288642,1),(2,1,'2018-03-26 10:34:32',500.00,'2018-03-26 10:50:53',1,1,1,1,1522032728,1),(3,15,'2018-03-28 17:28:11',500.00,NULL,1,NULL,1,0,NULL,1),(4,15,'2018-03-28 17:28:51',500.00,'2018-03-28 17:44:35',1,15,1,2,1522230388,1),(5,15,'2018-04-02 11:48:49',0.00,NULL,1,NULL,1,0,NULL,11),(6,15,'2018-04-02 11:48:55',0.00,NULL,0,NULL,1,1,NULL,1),(7,15,'2018-04-02 11:49:13',0.00,NULL,0,NULL,1,1,NULL,1),(8,15,'2018-04-02 11:51:07',0.00,NULL,0,NULL,1,1,NULL,1),(9,1,'2018-04-02 14:16:35',0.00,NULL,0,NULL,2,1,NULL,1),(10,1,'2018-04-02 14:16:57',3000.00,NULL,1,NULL,3,0,NULL,1),(11,1,'2018-04-02 14:18:03',3000.00,'2018-04-10 17:34:30',1,1,3,1,NULL,1),(12,1,'2018-04-02 14:19:07',8000.00,'2018-04-10 17:34:19',1,1,4,2,NULL,1),(13,15,'2018-04-03 17:45:38',0.00,NULL,0,NULL,1,1,NULL,1),(14,15,'2018-04-03 17:47:06',0.00,NULL,0,NULL,1,1,NULL,1),(15,15,'2018-04-03 17:47:10',0.00,NULL,0,NULL,1,1,NULL,1),(16,15,'2018-04-03 17:47:14',0.00,NULL,0,NULL,1,1,NULL,1),(17,15,'2018-04-03 17:47:17',0.00,NULL,0,NULL,1,1,NULL,1),(18,15,'2018-04-03 17:47:22',0.00,NULL,0,NULL,1,1,NULL,1),(19,15,'2018-04-03 17:47:26',0.00,NULL,0,NULL,1,1,NULL,1),(20,15,'2018-04-03 17:47:36',0.00,NULL,0,NULL,1,1,NULL,11),(21,15,'2018-04-03 17:47:42',0.00,NULL,0,NULL,1,1,NULL,1),(22,15,'2018-04-03 17:48:31',0.00,NULL,0,NULL,1,1,NULL,1),(23,15,'2018-04-13 11:31:25',1000.00,NULL,NULL,NULL,2,1,NULL,1),(24,15,'2018-04-13 11:33:05',250.00,NULL,1,NULL,2,0,NULL,1),(25,1,'2018-04-13 11:33:34',125.00,NULL,1,NULL,1,0,NULL,1),(26,1,'2018-04-13 11:34:57',125.00,NULL,1,NULL,1,0,NULL,1),(27,15,'2018-04-13 13:29:04',250.00,NULL,1,NULL,2,0,NULL,4),(28,15,'2018-04-13 13:33:02',250.00,NULL,1,NULL,2,0,NULL,4);
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sell`
--

DROP TABLE IF EXISTS `sell`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sell` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '用户id',
  `jine` decimal(10,2) DEFAULT NULL COMMENT '金额',
  `add_time` datetime DEFAULT NULL COMMENT '添加时间',
  `status` int(11) DEFAULT '0',
  `xiadan_time` datetime DEFAULT NULL COMMENT '下单时间',
  `pic` text COMMENT '打款凭证',
  `finish_time` datetime DEFAULT NULL COMMENT '完成时间',
  `dakuan_time` datetime DEFAULT NULL COMMENT '打款时间',
  `delete_time` int(11) DEFAULT NULL,
  `xiadan_id` int(11) DEFAULT NULL COMMENT '购买人id',
  `cold` int(11) DEFAULT '0' COMMENT '冻结 1未收到款投诉',
  `cold_time` datetime DEFAULT NULL COMMENT '冻结时间',
  `price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COMMENT='售卖表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sell`
--

LOCK TABLES `sell` WRITE;
/*!40000 ALTER TABLE `sell` DISABLE KEYS */;
INSERT INTO `sell` VALUES (32,1,500.00,'2018-04-03 14:45:28',0,'2018-04-03 15:29:09','/uploads/20180403/2481522740626.png','2018-04-03 15:36:35','2018-04-03 15:30:39',NULL,15,0,NULL,3.00),(34,1,500.00,'2018-04-03 14:47:16',0,'2018-04-03 14:54:56','',NULL,NULL,NULL,15,0,NULL,3.00),(35,1,500.00,'2018-04-03 14:47:16',0,'2018-04-03 14:54:56','',NULL,NULL,NULL,15,0,NULL,3.00),(36,1,500.00,'2018-04-03 14:47:16',0,'2018-04-03 14:54:56','',NULL,NULL,NULL,15,0,NULL,3.00),(37,1,500.00,'2018-04-03 14:47:16',0,'2018-04-03 14:54:56','',NULL,NULL,NULL,15,3,'2018-04-03 16:05:17',3.00),(38,1,500.00,'2018-04-03 14:47:16',0,'2018-04-03 14:54:56','',NULL,NULL,NULL,15,3,'2018-04-03 16:04:41',3.00),(39,15,500.00,'2018-04-03 14:47:16',0,'2018-04-03 14:54:56','/uploads/20180403/9451522742503.png',NULL,'2018-04-03 16:01:50',NULL,1,0,NULL,3.00),(40,15,500.00,'2018-04-03 14:47:16',1,'2018-04-12 17:12:38','/uploads/20180403/7501522742440.png',NULL,'2018-04-03 16:00:52',NULL,1,0,NULL,3.00),(41,15,500.00,'2018-04-03 14:47:16',0,'2018-04-03 14:54:56','',NULL,NULL,NULL,1,0,NULL,3.00),(42,15,500.00,'2018-04-03 14:47:16',0,'2018-04-03 14:54:56','',NULL,NULL,NULL,1,0,NULL,3.00),(43,15,500.00,'2018-04-03 14:47:16',2,'2018-04-03 14:54:56','/uploads/20180403/4491522741162.png',NULL,'2018-04-03 15:39:31',NULL,1,0,NULL,3.00),(44,15,500.00,'2018-04-03 14:47:16',2,'2018-04-03 14:54:56','/uploads/20180403/3071522742369.png',NULL,'2018-04-03 15:59:40',NULL,1,0,NULL,3.00),(45,15,500.00,'2018-04-03 14:47:16',2,'2018-04-03 14:54:56','/uploads/20180403/3761522740316.png',NULL,'2018-04-03 15:25:21',NULL,1,0,NULL,3.00),(46,15,500.00,'2018-04-03 14:47:16',2,'2018-04-03 14:54:56','/uploads/20180403/1261522740193.png',NULL,'2018-04-03 15:24:20',NULL,1,0,NULL,3.00),(47,15,500.00,'2018-04-03 14:47:16',2,'2018-04-03 14:54:56','/uploads/20180403/1261522740193.png',NULL,'2018-04-03 15:23:39',NULL,1,0,NULL,3.00),(48,15,500.00,'2018-04-03 14:47:16',2,'2018-04-03 14:54:56','/uploads/20180403/8481522740114.png',NULL,'2018-04-03 15:22:05',NULL,1,0,NULL,3.00),(49,15,500.00,'2018-04-03 17:44:07',0,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,3.00),(50,15,100.00,'2018-04-03 17:55:24',1,'2018-04-12 17:11:34',NULL,NULL,NULL,NULL,1,0,NULL,3.00);
/*!40000 ALTER TABLE `sell` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tixian`
--

DROP TABLE IF EXISTS `tixian`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tixian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '用户id',
  `jine` decimal(10,2) DEFAULT '0.00' COMMENT '金额',
  `shidao` decimal(10,2) DEFAULT NULL,
  `recharge` decimal(10,2) DEFAULT NULL COMMENT '手续费',
  `add_time` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '0' COMMENT '状态',
  `deal_time` datetime DEFAULT NULL,
  `check_id` int(11) DEFAULT NULL COMMENT '审核人id',
  `delete_time` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT '0' COMMENT '0 支付宝 1微信 2银行卡',
  `account` varchar(255) DEFAULT NULL COMMENT '账户',
  `price` decimal(10,2) DEFAULT '0.00' COMMENT '单价',
  `real_name` varchar(255) DEFAULT NULL COMMENT '真实姓名',
  `bank_addr` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COMMENT='提现表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tixian`
--

LOCK TABLES `tixian` WRITE;
/*!40000 ALTER TABLE `tixian` DISABLE KEYS */;
INSERT INTO `tixian` VALUES (9,1,500.00,450.00,50.00,'2018-03-29 10:31:18',0,'2018-03-29 10:35:12',15,NULL,0,NULL,0.00,NULL,NULL),(10,1,500.00,450.00,50.00,'2018-03-29 10:31:18',0,'2018-03-29 10:35:12',15,NULL,0,NULL,0.00,NULL,NULL),(12,1,500.00,450.00,50.00,'2018-03-29 10:31:18',1,'2018-04-10 17:33:23',1,NULL,0,NULL,0.00,NULL,NULL),(13,1,500.00,450.00,50.00,'2018-03-29 10:31:18',2,'2018-04-10 16:20:43',1,NULL,0,NULL,0.00,NULL,NULL),(14,1,500.00,450.00,50.00,'2018-03-29 10:31:18',0,'2018-03-29 10:35:12',15,NULL,0,NULL,0.00,NULL,NULL),(15,1,500.00,450.00,50.00,'2018-03-29 10:31:18',1,'2018-04-10 16:20:41',1,NULL,0,NULL,0.00,NULL,NULL),(16,1,500.00,450.00,50.00,'2018-03-29 10:31:18',0,'2018-03-29 10:35:12',15,NULL,0,NULL,0.00,NULL,NULL),(17,1,500.00,450.00,50.00,'2018-03-29 10:31:18',0,'2018-03-29 10:35:12',15,NULL,0,NULL,0.00,NULL,NULL),(18,1,500.00,450.00,50.00,'2018-03-29 10:31:18',0,'2018-03-29 10:35:12',15,NULL,0,NULL,0.00,NULL,NULL),(19,1,500.00,450.00,50.00,'2018-03-29 10:31:18',0,'2018-03-29 10:35:12',15,NULL,0,NULL,0.00,NULL,NULL),(20,1,500.00,450.00,50.00,'2018-03-29 10:31:18',0,'2018-03-29 10:35:12',15,NULL,0,NULL,0.00,NULL,NULL),(21,1,500.00,450.00,50.00,'2018-03-29 10:31:18',0,'2018-03-29 10:35:12',15,NULL,0,NULL,0.00,NULL,NULL),(22,1,500.00,450.00,50.00,'2018-03-29 10:31:18',0,'2018-03-29 10:35:12',15,NULL,0,NULL,0.00,NULL,NULL),(23,15,0.00,0.00,0.00,'2018-04-03 09:43:21',0,NULL,NULL,NULL,0,'555',0.00,NULL,NULL),(24,15,0.00,0.00,0.00,'2018-04-03 09:44:19',0,NULL,NULL,NULL,0,'555',0.00,NULL,NULL),(25,15,1.00,0.90,0.10,'2018-04-03 09:45:30',1,'2018-04-10 16:10:44',1,NULL,0,'555',0.00,NULL,NULL),(26,1,100.00,90.00,10.00,'2018-04-03 09:52:45',0,'2018-04-10 16:09:15',1,NULL,0,'12345',0.00,NULL,NULL),(27,1,100.00,90.00,10.00,'2018-04-03 09:53:03',2,'2018-04-10 16:10:42',1,NULL,0,'12345',0.00,NULL,NULL),(28,1,100.00,90.00,10.00,'2018-04-03 09:58:25',2,'2018-04-10 16:21:04',1,NULL,1,'12345',0.00,NULL,NULL),(29,1,100.00,90.00,10.00,'2018-04-03 09:59:24',1,'2018-04-10 16:10:38',1,NULL,1,'12345',0.00,NULL,NULL),(30,1,100.00,90.00,10.00,'2018-04-03 10:00:06',0,'2018-04-10 16:06:39',1,NULL,1,'12345',0.00,NULL,NULL),(31,1,200.00,180.00,20.00,'2018-04-03 10:00:18',1,'2018-04-10 16:10:35',1,NULL,1,'12345',0.00,NULL,NULL),(32,1,100.00,90.00,10.00,'2018-04-04 21:12:33',2,'2018-04-10 16:10:32',1,NULL,0,'12345',0.00,NULL,NULL),(33,1,1000.00,0.00,1000.00,'2018-04-11 14:21:50',0,NULL,NULL,NULL,2,'4146464464644644444',4.00,'2','郑州市陇海路桐柏路支行');
/*!40000 ALTER TABLE `tixian` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transfer`
--

DROP TABLE IF EXISTS `transfer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cuid` int(11) DEFAULT NULL COMMENT '转出方',
  `ruid` int(11) DEFAULT NULL COMMENT '转入方',
  `jine` decimal(10,2) DEFAULT NULL COMMENT '金额',
  `add_time` datetime DEFAULT NULL COMMENT '转入时间',
  `delete_time` int(11) DEFAULT NULL COMMENT '删除时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COMMENT='转账表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transfer`
--

LOCK TABLES `transfer` WRITE;
/*!40000 ALTER TABLE `transfer` DISABLE KEYS */;
INSERT INTO `transfer` VALUES (1,15,1,200.00,'2018-03-29 11:03:35',NULL),(2,15,1,500.00,'2018-03-29 11:35:04',NULL),(4,15,1,100.00,'2018-04-02 11:33:45',NULL),(5,15,1,100.00,'2018-04-02 11:33:45',NULL),(6,15,1,100.00,'2018-04-02 11:33:45',NULL),(7,15,1,100.00,'2018-04-02 11:33:45',NULL),(8,15,1,100.00,'2018-04-02 11:33:45',NULL),(9,15,1,100.00,'2018-04-02 11:33:45',NULL),(10,15,1,100.00,'2018-04-02 11:33:45',NULL),(11,15,1,100.00,'2018-04-02 11:33:45',NULL),(12,15,1,100.00,'2018-04-02 11:33:45',NULL),(13,15,1,100.00,'2018-04-02 11:33:45',NULL),(14,15,1,100.00,'2018-04-02 11:33:45',NULL),(15,15,1,100.00,'2018-04-02 11:33:45',NULL),(16,15,1,100.00,'2018-04-02 11:33:45',NULL),(17,15,1,100.00,'2018-04-02 11:33:45',NULL),(18,15,1,100.00,'2018-04-02 11:33:45',NULL),(19,15,1,100.00,'2018-04-02 11:33:45',NULL),(20,15,1,100.00,'2018-04-02 11:33:45',NULL),(21,15,1,100.00,'2018-04-02 11:33:45',NULL),(23,1,15,100.00,'2018-04-02 11:33:45',NULL),(24,1,15,100.00,'2018-04-02 11:33:45',NULL),(25,1,15,100.00,'2018-04-02 11:33:45',NULL),(26,1,15,100.00,'2018-04-02 11:33:45',NULL),(27,1,15,100.00,'2018-04-02 11:33:45',NULL),(28,1,15,100.00,'2018-04-02 11:33:45',NULL),(29,1,15,100.00,'2018-04-02 11:33:45',NULL),(30,1,15,100.00,'2018-04-02 11:33:45',NULL),(31,1,15,100.00,'2018-04-02 11:33:45',NULL),(32,1,15,100.00,'2018-04-02 11:33:45',NULL),(33,1,15,100.00,'2018-04-02 11:33:45',NULL),(34,1,15,100.00,'2018-04-02 11:33:45',NULL),(35,1,15,100.00,'2018-04-02 11:33:45',NULL),(36,1,15,100.00,'2018-04-02 11:33:45',NULL),(37,1,15,100.00,'2018-04-02 11:33:45',NULL),(38,1,15,100.00,'2018-04-02 11:33:45',NULL),(39,1,15,100.00,'2018-04-02 11:33:45',NULL),(40,1,15,100.00,'2018-04-02 11:33:45',NULL),(41,1,15,100.00,'2018-04-02 11:33:45',NULL),(42,1,15,100.00,'2018-04-02 11:33:45',NULL),(43,1,15,100.00,'2018-04-02 11:33:45',NULL),(44,1,15,100.00,'2018-04-02 11:33:45',NULL),(45,1,15,100.00,'2018-04-02 11:33:45',NULL),(46,1,15,100.00,'2018-04-02 11:33:45',NULL),(47,1,15,100.00,'2018-04-02 11:33:45',NULL),(48,1,15,100.00,'2018-04-02 11:33:45',NULL),(49,1,15,100.00,'2018-04-02 11:33:45',NULL),(50,1,15,100.00,'2018-04-02 11:33:45',NULL);
/*!40000 ALTER TABLE `transfer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类id',
  `name` varchar(255) DEFAULT NULL COMMENT '分类名',
  `add_time` datetime DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL,
  `icon` text COMMENT '图标',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='分类';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
INSERT INTO `type` VALUES (12,'全部分类','2018-04-04 10:46:21',NULL,'/uploads/20180404/9301522810887.png\0'),(13,'地方特产','2018-04-04 10:46:21',NULL,'/uploads/20180404/1451522810867.png\0'),(14,'数码产品','2018-04-04 10:46:21',NULL,'/uploads/20180404/8531522810846.png\0'),(15,'日常百货','2018-04-04 10:46:21',NULL,'/uploads/20180404/8481522810834.png\0'),(16,'服装箱包','2018-04-04 10:46:21',NULL,'/uploads/20180404/1161522810819.png\0'),(17,'家纺家居','2018-04-04 10:46:21',NULL,'/uploads/20180404/5601522810807.png\0'),(18,'美妆护肤','2018-04-04 10:46:21',NULL,'/uploads/20180404/1961522810792.png\0'),(19,'加油卡','2018-04-04 10:46:21',NULL,'/uploads/20180404/9921522810770.png\0');
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(100) DEFAULT NULL COMMENT '账户名',
  `real_name` varchar(255) DEFAULT NULL COMMENT '真实姓名',
  `password` varchar(255) DEFAULT NULL COMMENT '登录密码',
  `safe_password` varchar(255) DEFAULT NULL COMMENT '安全密码',
  `status` int(11) DEFAULT '2' COMMENT '0冻结 1正常 2未提交3待审核4驳回',
  `wallet` decimal(10,2) DEFAULT '0.00' COMMENT '钱包',
  `level` int(11) DEFAULT '0' COMMENT '等级',
  `msc` int(10) DEFAULT '0' COMMENT '持有资产',
  `add_time` datetime DEFAULT NULL,
  `whether` int(11) DEFAULT '0' COMMENT '管理员 会员',
  `mobile` varchar(11) DEFAULT NULL COMMENT '手机号',
  `pid` int(11) DEFAULT '0' COMMENT '父id',
  `path` text COMMENT '全路径',
  `alipay` varchar(255) DEFAULT NULL COMMENT '支付宝',
  `wechat` varchar(255) DEFAULT NULL COMMENT '微信号',
  `delete_time` int(11) DEFAULT NULL,
  `now` int(11) DEFAULT '0' COMMENT '当前登录模块',
  `direct` int(11) DEFAULT '0' COMMENT '直推有效个数',
  `team_yeji` int(11) DEFAULT '0' COMMENT '团队业绩',
  `length` int(11) DEFAULT '0' COMMENT 'path长度',
  `is_center` int(11) DEFAULT '0' COMMENT '0不是 1是',
  `id_card` text,
  `id_card_fan` text,
  `bank_addr` varchar(255) DEFAULT NULL COMMENT '开户行地址',
  `bank_name` varchar(255) DEFAULT NULL COMMENT '银行名称、',
  `id_card_number` varchar(255) DEFAULT NULL COMMENT '身份证号',
  `bank_person` varchar(255) DEFAULT NULL COMMENT '开户人',
  `bank_number` varchar(255) DEFAULT NULL COMMENT '银行卡号',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`account`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COMMENT='用户';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'gz100001','杜梦','WTjVcHJSLw5bZeHPyyEN6g==','9bKhruGd881c4dOcIKdbtw==',1,860.00,3,5000,'2018-03-24 11:38:13',1,'18739912501',0,'0,12,13','13000000000','123',NULL,0,0,0,0,0,'/uploads/20180411/8961523427865.png','/uploads/20180411/8131523427870.png','背景2','建设1','411481199404124111','杜梦3','41144445'),(13,'gz100002','','9bKhruGd881c4dOcIKdbtw==','9bKhruGd881c4dOcIKdbtw==',1,18.55,2,2100,'2018-03-24 11:38:13',1,'18739912502',1,'0,1','55','44',NULL,0,0,4000,0,0,'/uploads/20180404/4851522816092.png','/uploads/20180404/4851522816092.png',NULL,NULL,NULL,NULL,NULL),(15,'gz100004','mao','9bKhruGd881c4dOcIKdbtw==','i5D4R48c3pT+wMIGRmNBlg==',1,16707.91,2,2000,'2018-03-28 14:50:29',1,'18739912537',13,'0,12,13','123','123',NULL,0,0,0,1,0,'/uploads/20180404/4851522816092.png','/uploads/20180404/4851522816092.png',NULL,NULL,NULL,NULL,NULL),(17,'gz100006','123456','9bKhruGd881c4dOcIKdbtw==','9bKhruGd881c4dOcIKdbtw==',3,0.00,0,0,'2018-03-29 17:23:23',0,'18739912535',0,'0','123456','q123456',NULL,0,0,0,0,0,'/uploads/20180404/4851522816092.png','/uploads/20180404/4851522816092.png',NULL,NULL,NULL,NULL,NULL),(18,'gz100007','123456','9bKhruGd881c4dOcIKdbtw==','9bKhruGd881c4dOcIKdbtw==',3,0.00,0,0,'2018-03-29 17:24:18',0,'18739912536',0,'0','123456','q123456',NULL,0,0,0,0,0,'/uploads/20180404/4851522816092.png','1',NULL,NULL,NULL,NULL,NULL),(20,'gz100008','1','9bKhruGd881c4dOcIKdbtw==','9bKhruGd881c4dOcIKdbtw==',3,0.00,0,0,'2018-04-02 22:05:38',0,'13071099897',0,'','1321','123',NULL,0,0,0,0,0,'1','1',NULL,NULL,NULL,NULL,NULL),(23,'gz100009','1','9bKhruGd881c4dOcIKdbtw==','9bKhruGd881c4dOcIKdbtw==',3,0.00,0,0,'2018-04-02 22:05:38',0,'13071099897',0,'','1321','123',NULL,0,0,0,0,0,'1','1',NULL,NULL,NULL,NULL,NULL),(24,'gz100010','1','9bKhruGd881c4dOcIKdbtw==','9bKhruGd881c4dOcIKdbtw==',3,0.00,0,0,'2018-04-02 22:05:38',0,'13071099897',0,'','1321','123',NULL,0,0,0,0,0,'1','1',NULL,NULL,NULL,NULL,NULL),(25,'gz100011','1','9bKhruGd881c4dOcIKdbtw==','9bKhruGd881c4dOcIKdbtw==',3,0.00,0,0,'2018-04-02 22:05:38',0,'13071099897',0,'','1321','123',NULL,0,0,0,0,0,'1','1',NULL,NULL,NULL,NULL,NULL),(26,'gz100012','1','9bKhruGd881c4dOcIKdbtw==','9bKhruGd881c4dOcIKdbtw==',3,0.00,0,0,'2018-04-02 22:05:38',0,'13071099897',0,'','1321','123',NULL,0,0,0,0,0,'1','1',NULL,NULL,NULL,NULL,NULL),(27,'gz100013','1','9bKhruGd881c4dOcIKdbtw==','9bKhruGd881c4dOcIKdbtw==',3,0.00,0,0,'2018-04-02 22:05:38',0,'13071099897',0,'','1321','123',NULL,0,0,0,0,0,'1','1',NULL,NULL,NULL,NULL,NULL),(28,'gz100014','1','9bKhruGd881c4dOcIKdbtw==','9bKhruGd881c4dOcIKdbtw==',3,0.00,0,0,'2018-04-02 22:05:38',0,'13071099897',0,'','1321','123',NULL,0,0,0,0,0,'1','1',NULL,NULL,NULL,NULL,NULL),(29,'gz100015','1','9bKhruGd881c4dOcIKdbtw==','9bKhruGd881c4dOcIKdbtw==',1,0.00,0,0,'2018-04-02 22:05:38',0,'13071099897',0,'','1321','123',NULL,0,0,0,0,0,'1','1',NULL,NULL,NULL,NULL,NULL),(30,'gz100016','1','9bKhruGd881c4dOcIKdbtw==','9bKhruGd881c4dOcIKdbtw==',3,0.00,0,0,'2018-04-02 22:05:38',0,'13071099897',0,'','1321','123',NULL,0,0,0,0,0,'1','1',NULL,NULL,NULL,NULL,NULL),(31,'gz100017','1','9bKhruGd881c4dOcIKdbtw==','9bKhruGd881c4dOcIKdbtw==',3,0.00,0,0,'2018-04-02 22:05:38',0,'13071099897',0,'','1321','123',NULL,0,0,0,0,0,'1','1',NULL,NULL,NULL,NULL,NULL),(32,'gz100018','1','9bKhruGd881c4dOcIKdbtw==','9bKhruGd881c4dOcIKdbtw==',4,0.00,0,0,'2018-04-02 22:05:38',0,'13071099897',0,'','1321','123',NULL,0,0,0,0,0,'1','1',NULL,NULL,NULL,NULL,NULL),(33,'gz100019','1','9bKhruGd881c4dOcIKdbtw==','9bKhruGd881c4dOcIKdbtw==',4,0.00,0,0,'2018-04-02 22:05:38',0,'13071099897',0,'','1321','123',NULL,0,0,0,0,0,'1','1',NULL,NULL,NULL,NULL,NULL),(34,'gz100020','1','9bKhruGd881c4dOcIKdbtw==','9bKhruGd881c4dOcIKdbtw==',4,0.00,0,0,'2018-04-02 22:05:38',0,'13071099897',0,'','1321','123',NULL,0,0,0,0,0,'1','1',NULL,NULL,NULL,NULL,NULL),(35,'gz100021','1','9bKhruGd881c4dOcIKdbtw==','9bKhruGd881c4dOcIKdbtw==',4,0.00,0,0,'2018-04-02 22:05:38',0,'13071099897',0,'','1321','123',NULL,0,0,0,0,0,'1','1',NULL,NULL,NULL,NULL,NULL),(36,'gz100022','1','9bKhruGd881c4dOcIKdbtw==','9bKhruGd881c4dOcIKdbtw==',4,0.00,0,0,'2018-04-02 22:05:38',0,'13071099897',0,'','1321','123',NULL,0,0,0,0,0,'1','1',NULL,NULL,NULL,NULL,NULL),(37,'gz100023','1','9bKhruGd881c4dOcIKdbtw==','9bKhruGd881c4dOcIKdbtw==',4,0.00,0,0,'2018-04-02 22:05:38',0,'13071099897',0,'','1321','123',NULL,0,0,0,0,0,'1','1',NULL,NULL,NULL,NULL,NULL),(38,'gz100024','mao','i5D4R48c3pT+wMIGRmNBlg==','9bKhruGd881c4dOcIKdbtw==',1,0.00,0,0,'2018-04-02 22:05:38',0,'13071099897',0,'','1321','123',NULL,0,0,0,0,0,'1','1',NULL,NULL,NULL,NULL,NULL),(39,'gz100025','SDFAS','XNHajanOz0A=','XNHajanOz0A=',1,400.00,0,0,'2018-04-09 11:38:19',0,'',0,'0','','',NULL,0,0,0,0,0,'','SDFAS',NULL,NULL,NULL,NULL,NULL),(40,'gz100026','杜梦','WTjVcHJSLw5bZeHPyyEN6g==','WTjVcHJSLw5bZeHPyyEN6g==',1,300.00,0,0,'2018-04-09 11:45:50',0,'13071099898',1,'0,12,13,1','1','12',NULL,0,0,0,1,0,'','杜梦',NULL,NULL,NULL,NULL,NULL),(41,'gz100027','123456','WTjVcHJSLw5bZeHPyyEN6g==','WTjVcHJSLw5bZeHPyyEN6g==',1,0.00,0,0,'2018-04-09 14:22:32',0,'12345675676',40,'0,12,13,1,40','123','13',NULL,0,0,0,2,0,'','123456',NULL,NULL,NULL,NULL,NULL),(42,'gz100028','456','WTjVcHJSLw5bZeHPyyEN6g==','wRBj0O3rGqhbZeHPyyEN6g==',1,0.00,0,0,'2018-04-09 14:27:35',0,'213',40,'0,12,13,1,40','312','123',NULL,0,0,0,2,0,'','456',NULL,NULL,NULL,NULL,NULL),(43,'gz100029','费大幅','WTjVcHJSLw5bZeHPyyEN6g==','WTjVcHJSLw5bZeHPyyEN6g==',1,0.00,0,0,'2018-04-09 14:28:13',0,'13071099800',41,'0,12,13,1,40,41','123','123',NULL,0,0,0,3,0,'','费大幅',NULL,NULL,NULL,NULL,NULL),(44,'gz100030','admin','WTjVcHJSLw5bZeHPyyEN6g==','XNHajanOz0A=',4,0.00,0,0,'2018-04-10 09:19:27',1,'123',39,'0,39','','',NULL,0,0,0,1,0,'','admin',NULL,NULL,NULL,NULL,NULL),(45,'gz100031','admin1','WTjVcHJSLw5bZeHPyyEN6g==','XNHajanOz0A=',4,0.00,0,0,'2018-04-10 09:21:59',1,'123456',39,'0,39','','',NULL,1,0,0,1,0,'','admin1',NULL,NULL,NULL,NULL,NULL),(46,'gz100032','admin2','H/MmQyJ84G9bZeHPyyEN6g==','XNHajanOz0A=',3,0.00,0,0,'2018-04-10 09:25:27',1,'000',39,'0,39','','',1523325464,0,0,0,1,0,'','admin2',NULL,NULL,NULL,NULL,NULL),(47,'gz100033','admin','+AN2PRTN9Ds=','XNHajanOz0A=',3,0.00,0,0,'2018-04-10 09:26:17',1,'111',39,'0,39','','',1523325455,0,0,0,1,0,'','admin',NULL,NULL,NULL,NULL,NULL),(48,'gz100034','admin7','hvZsXRgD0eJbZeHPyyEN6g==','XNHajanOz0A=',3,0.00,0,0,'2018-04-10 09:26:40',1,'77777',39,'0,39','','',1523325446,0,0,0,1,0,'','admin',NULL,NULL,NULL,NULL,NULL),(49,'gz100035','admin','XNHajanOz0A=','XNHajanOz0A=',3,0.00,0,0,'2018-04-10 09:46:42',1,'1111',39,'0,39','','',1523325439,0,0,0,1,0,'','admin',NULL,NULL,NULL,NULL,NULL),(51,'gz100036','杜梦','XNHajanOz0A=','XNHajanOz0A=',1,0.00,0,1,'2018-04-11 10:09:23',0,'13077777777',1,'0,12,13,1','123','123',NULL,0,0,0,1,0,'/uploads/20180411/5681523418299.png','/uploads/20180411/2631523418303.png','北京天安门','1113','41148119940412421X','1112',NULL),(52,'gz100037',NULL,'WTjVcHJSLw5bZeHPyyEN6g==','WTjVcHJSLw5bZeHPyyEN6g==',1,0.00,0,1000,'2018-04-11 10:21:56',0,'13088888888',51,'0,12,13,1,51',NULL,NULL,1523609087,0,0,0,2,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(53,'1',NULL,'WTjVcHJSLw5bZeHPyyEN6g==','WTjVcHJSLw5bZeHPyyEN6g==',2,0.00,0,0,'2018-04-13 17:35:45',0,'13054656465',1,'0,12,13,1',NULL,NULL,NULL,0,0,0,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(54,'2',NULL,'WTjVcHJSLw5bZeHPyyEN6g==','WTjVcHJSLw5bZeHPyyEN6g==',2,0.00,0,0,'2018-04-13 17:40:48',0,'13045646456',1,'0,12,13,1',NULL,NULL,NULL,0,0,0,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(55,'3',NULL,'WTjVcHJSLw5bZeHPyyEN6g==','WTjVcHJSLw5bZeHPyyEN6g==',2,0.00,0,0,'2018-04-13 17:41:27',0,'13058945945',1,'0,12,13,1',NULL,NULL,NULL,0,0,0,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wallet`
--

DROP TABLE IF EXISTS `wallet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wallet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '用户id',
  `jine` decimal(10,2) DEFAULT NULL COMMENT '金额',
  `add_time` datetime DEFAULT NULL COMMENT '添加时间',
  `type` int(11) DEFAULT NULL COMMENT '类型',
  `note` varchar(255) DEFAULT NULL COMMENT '说明',
  `delete_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8 COMMENT='钱包记录';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wallet`
--

LOCK TABLES `wallet` WRITE;
/*!40000 ALTER TABLE `wallet` DISABLE KEYS */;
INSERT INTO `wallet` VALUES (1,13,0.15,'2018-03-26 14:23:32',2,'静态收益',NULL),(2,13,0.60,'2018-03-26 14:25:30',2,'静态收益',NULL),(3,13,0.60,'2018-03-26 14:27:49',2,'静态收益',NULL),(4,13,0.60,'2018-03-26 14:28:02',2,'静态收益',NULL),(5,13,0.60,'2018-03-26 14:28:51',2,'静态收益',NULL),(6,13,0.60,'2018-03-26 14:29:27',2,'静态收益',NULL),(7,13,0.60,'2018-03-26 14:30:42',2,'静态收益',NULL),(8,1,0.90,'2018-03-26 14:31:16',2,'静态收益',NULL),(9,1,0.90,'2018-03-26 20:07:06',2,'静态收益',NULL),(10,1,0.90,'2018-03-26 20:07:25',2,'静态收益',NULL),(11,11,1500.00,'2018-03-28 17:44:26',3,'动态直推奖',NULL),(12,1,100.00,'2018-03-29 09:30:48',10,'寄售卖出',NULL),(13,1,100.00,'2018-03-29 09:55:06',11,'寄售买入',NULL),(14,1,0.00,'2018-03-29 10:15:02',8,'提现申请',NULL),(15,1,0.00,'2018-03-29 10:15:07',8,'提现申请',NULL),(16,1,0.00,'2018-03-29 10:15:09',8,'提现申请',NULL),(17,1,0.00,'2018-03-29 10:15:46',8,'提现申请',NULL),(18,1,0.00,'2018-03-29 10:15:50',8,'提现申请',NULL),(19,1,500.00,'2018-03-29 10:18:08',8,'提现申请',NULL),(20,1,500.00,'2018-03-29 10:18:23',8,'提现申请',NULL),(21,1,400.00,'2018-03-29 10:20:17',8,'提现申请',NULL),(22,1,500.00,'2018-03-29 10:31:18',8,'提现申请',NULL),(23,1,500.00,'2018-03-29 10:35:12',9,'提现申请驳回',NULL),(24,1,200.00,'2018-03-29 11:03:35',6,'好友转出',NULL),(25,1,200.00,'2018-03-29 11:03:35',7,'好友转入',NULL),(26,1,500.00,'2018-03-29 11:35:04',6,'好友转出',NULL),(27,1,500.00,'2018-03-29 11:35:04',7,'好友转入',NULL),(28,1,750.00,'2018-03-29 14:09:04',12,'购买产品',NULL),(29,1,750.00,'2018-03-29 14:10:37',12,'购买产品',NULL),(30,1,750.00,'2018-03-29 14:13:25',12,'购买产品',NULL),(31,1,750.00,'2018-03-29 14:14:26',13,'订单取消',NULL),(32,1,750.00,'2018-03-29 14:14:29',13,'订单取消',NULL),(33,1,750.00,'2018-03-29 14:15:31',13,'订单取消',NULL),(34,1,500.00,'2018-04-02 09:33:11',10,'寄售卖出',NULL),(35,1,500.00,'2018-04-02 09:33:14',10,'寄售卖出',NULL),(36,1,500.00,'2018-04-02 09:44:13',10,'寄售卖出',NULL),(37,1,100.00,'2018-04-02 10:04:04',10,'寄售卖出',NULL),(38,1,1000.00,'2018-04-02 11:16:00',10,'寄售卖出',NULL),(39,1,500.00,'2018-04-02 11:16:56',10,'寄售卖出',NULL),(40,1,100.00,'2018-04-02 11:33:45',6,'好友转出',NULL),(41,1,100.00,'2018-04-02 11:33:45',7,'好友转入',NULL),(42,1,0.00,'2018-04-02 11:48:55',1,'投资消耗',NULL),(43,15,0.00,'2018-04-02 11:49:13',1,'投资消耗',NULL),(44,15,0.00,'2018-04-02 11:51:07',1,'投资消耗',NULL),(45,13,0.00,'2018-04-02 11:51:07',3,'动态直推奖',NULL),(46,1,0.00,'2018-04-02 14:16:35',1,'投资消耗',NULL),(47,15,100.00,'2018-04-02 15:00:46',15,'寄售取消',NULL),(48,15,50.00,'2018-04-02 15:16:11',10,'寄售卖出',NULL),(49,15,50.00,'2018-04-02 15:16:51',10,'寄售卖出',NULL),(50,15,50.00,'2018-04-02 15:17:12',15,'寄售取消',NULL),(51,15,0.00,'2018-04-03 09:43:21',8,'提现申请',NULL),(52,15,0.00,'2018-04-03 09:44:19',8,'提现申请',NULL),(53,15,1.00,'2018-04-03 09:45:30',8,'提现申请',NULL),(54,1,100.00,'2018-04-03 09:52:45',8,'提现申请',NULL),(55,1,100.00,'2018-04-03 09:53:03',8,'提现申请',NULL),(56,1,100.00,'2018-04-03 09:58:25',8,'提现申请',NULL),(57,1,100.00,'2018-04-03 09:59:24',8,'提现申请',NULL),(58,1,100.00,'2018-04-03 10:00:06',8,'提现申请',NULL),(59,1,200.00,'2018-04-03 10:00:18',8,'提现申请',NULL),(60,1,1000.00,'2018-04-03 14:15:08',10,'寄售卖出',NULL),(61,1,500.00,'2018-04-03 14:45:28',10,'寄售卖出',NULL),(62,15,500.00,'2018-04-03 14:47:16',10,'寄售卖出',NULL),(63,1,500.00,'2018-04-03 15:36:35',11,'寄售买入',NULL),(64,15,500.00,'2018-04-03 17:44:07',10,'寄售卖出',NULL),(65,15,0.00,'2018-04-03 17:45:38',1,'投资消耗',NULL),(66,13,0.00,'2018-04-03 17:45:38',3,'动态直推奖',NULL),(67,15,0.00,'2018-04-03 17:47:06',1,'投资消耗',NULL),(68,13,0.00,'2018-04-03 17:47:06',3,'动态直推奖',NULL),(69,15,0.00,'2018-04-03 17:47:10',1,'投资消耗',NULL),(70,13,0.00,'2018-04-03 17:47:10',3,'动态直推奖',NULL),(71,15,0.00,'2018-04-03 17:47:14',1,'投资消耗',NULL),(72,13,0.00,'2018-04-03 17:47:14',3,'动态直推奖',NULL),(73,15,0.00,'2018-04-03 17:47:17',1,'投资消耗',NULL),(74,13,0.00,'2018-04-03 17:47:17',3,'动态直推奖',NULL),(75,15,0.00,'2018-04-03 17:47:22',1,'投资消耗',NULL),(76,13,0.00,'2018-04-03 17:47:22',3,'动态直推奖',NULL),(77,15,0.00,'2018-04-03 17:47:26',1,'投资消耗',NULL),(78,13,0.00,'2018-04-03 17:47:26',3,'动态直推奖',NULL),(79,15,0.00,'2018-04-03 17:47:36',1,'投资消耗',NULL),(80,13,0.00,'2018-04-03 17:47:36',3,'动态直推奖',NULL),(81,15,0.00,'2018-04-03 17:47:42',1,'投资消耗',NULL),(82,13,0.00,'2018-04-03 17:47:42',3,'动态直推奖',NULL),(83,15,0.00,'2018-04-03 17:48:31',1,'投资消耗',NULL),(84,13,0.00,'2018-04-03 17:48:31',3,'动态直推奖',NULL),(85,1,100.00,'2018-04-03 17:55:24',10,'寄售卖出',NULL),(86,15,150.00,'2018-04-04 19:09:36',12,'购买产品',NULL),(87,15,150.00,'2018-04-04 19:11:43',13,'订单取消',NULL),(88,15,150.00,'2018-04-04 19:12:01',13,'订单取消',NULL),(89,1,150.00,'2018-04-04 20:17:06',12,'购买产品',NULL),(90,1,150.00,'2018-04-04 20:17:33',12,'购买产品',NULL),(91,1,150.00,'2018-04-04 20:19:42',12,'购买产品',NULL),(92,1,150.00,'2018-04-04 20:19:59',12,'购买产品',NULL),(93,1,150.00,'2018-04-04 20:21:20',12,'购买产品',NULL),(94,1,150.00,'2018-04-04 20:21:42',12,'购买产品',NULL),(95,1,150.00,'2018-04-04 20:25:13',12,'购买产品',NULL),(96,1,100.00,'2018-04-04 21:12:33',8,'提现申请',NULL),(97,15,1.00,'2018-04-09 10:32:49',16,'后台赠送',NULL),(98,15,1.00,'2018-04-09 10:32:59',17,'后台扣除',NULL),(99,NULL,5000.00,'2018-04-09 13:42:42',16,'后台赠送',NULL),(100,NULL,500.00,'2018-04-09 13:42:58',16,'后台赠送',NULL),(101,NULL,100.00,'2018-04-09 13:44:24',16,'后台赠送',NULL),(102,NULL,100.00,'2018-04-09 13:45:56',16,'后台赠送',NULL),(103,NULL,100.00,'2018-04-09 13:47:24',16,'后台赠送',NULL),(104,NULL,100.00,'2018-04-09 13:48:06',16,'后台赠送',NULL),(105,NULL,100.00,'2018-04-09 13:52:11',16,'后台赠送',NULL),(106,NULL,100.00,'2018-04-09 13:53:21',16,'后台赠送',NULL),(107,15,5.00,'2018-04-09 13:53:41',17,'后台扣除',NULL),(108,15,15.00,'2018-04-09 13:54:10',17,'后台扣除',NULL),(109,15,16.00,'2018-04-09 13:54:24',16,'后台赠送',NULL),(110,15,5.00,'2018-04-09 13:54:35',16,'后台赠送',NULL),(111,NULL,100.00,'2018-04-09 13:55:36',16,'后台赠送',NULL),(112,NULL,100.00,'2018-04-09 13:55:54',16,'后台赠送',NULL),(113,NULL,100.00,'2018-04-09 13:58:07',16,'后台赠送',NULL),(114,NULL,100.00,'2018-04-09 13:59:10',16,'后台赠送',NULL),(115,NULL,1100.00,'2018-04-09 13:59:43',16,'后台赠送',NULL),(116,NULL,100.00,'2018-04-09 14:00:20',16,'后台赠送',NULL),(117,40,100.00,'2018-04-09 14:01:00',16,'后台赠送',NULL),(118,NULL,5.00,'2018-04-09 14:01:45',16,'后台赠送',NULL),(119,NULL,5.00,'2018-04-09 14:01:48',16,'后台赠送',NULL),(120,40,100.00,'2018-04-09 14:02:14',16,'后台赠送',NULL),(121,NULL,5.00,'2018-04-09 14:02:17',16,'后台赠送',NULL),(122,NULL,5.00,'2018-04-09 14:02:39',16,'后台赠送',NULL),(123,NULL,5.00,'2018-04-09 14:02:52',16,'后台赠送',NULL),(124,39,100.00,'2018-04-09 14:03:12',16,'后台赠送',NULL),(125,39,100.00,'2018-04-09 14:03:41',16,'后台赠送',NULL),(126,40,100.00,'2018-04-09 14:05:23',16,'后台赠送',NULL),(127,39,100.00,'2018-04-09 14:05:29',16,'后台赠送',NULL),(128,39,100.00,'2018-04-09 14:05:34',16,'后台赠送',NULL),(129,1,200.00,'2018-04-10 16:06:35',9,'提现申请驳回',NULL),(130,1,100.00,'2018-04-10 16:09:03',9,'提现申请驳回',NULL),(131,1,100.00,'2018-04-10 16:10:32',9,'提现申请驳回',NULL),(132,1,100.00,'2018-04-10 16:10:42',9,'提现申请驳回',NULL),(133,1,500.00,'2018-04-10 16:20:43',9,'提现申请驳回',NULL),(134,1,100.00,'2018-04-10 16:21:05',9,'提现申请驳回',NULL),(135,1,300.00,'2018-04-10 17:34:30',3,'动态直推奖',NULL),(136,1,1000.00,'2018-04-11 14:21:50',8,'提现申请',NULL),(137,13,3.90,'2018-04-11 18:01:40',2,'静态收益',NULL),(138,15,0.65,'2018-04-11 18:01:40',2,'静态收益',NULL),(139,15,1000.00,'2018-04-13 11:31:25',1,'投资消耗',NULL),(140,13,4.10,'2018-04-13 17:14:15',2,'静态收益',NULL),(141,15,3.63,'2018-04-13 17:14:16',2,'静态收益',NULL),(142,13,4.10,'2018-04-13 17:15:33',2,'静态收益',NULL),(143,15,3.63,'2018-04-13 17:15:33',2,'静态收益',NULL),(144,1,10.00,'2018-04-13 17:18:45',2,'静态收益',NULL);
/*!40000 ALTER TABLE `wallet` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-16 10:13:17
