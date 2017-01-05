CREATE DATABASE IF NOT EXISTS `shopimooc`;
USE `shopImooc`;
--管理员表
DROP TABLE IF `imooc_admin`;
CREATE TABLE `imooc_admin`(
`id` tinyint unsigned auto_increment key,
`username` varchar(20) not null unique,
`password` char(30) not null,
`email` char(50) not null
);
--分类表
DROP TABLE IF EXISTS `imooc_cate`;
CREATE TABLE `imooc_cate`(
`id` smallint unsigned auto_increment key,
`cName` varchar(50) not NULL unique
)
--商品表
DROP TABLE IF EXISTS `imooc_pro`;
CREATE TABLE `imooc_pro`(
`id` INT unsigned auto_increment key,
`pName` VARCHAR(50) not NULL UNIQUE,
`pSn` VARCHAR (50) NOT NULL,
`pNum` INT  unsigned DEFAULT 1,
`mPrice` DECIMAL(10,2) not NULL ,
`iPrice` DECIMAL(10,2) not NULL ,
`pDesc` text,
`pImg` VARCHAR (50) NOT NULL,
`pubTime` INT unsigned NOT  NULL,
`isShow` tinyint(1) DEFAULT 1,
`isHot` tinyint(1) DEFAULT 0,
`cId` SMALLINT unsigned NOT  NULL
)
--用户表
DROP TABLE IF EXISTS `imooc_user`;
CREATE TABLE `imooc_user`(
`id` INT unsigned auto_increment key,
`username` VARCHAR(20) NOT NULL unique,
`password` char(32) not NULL,
--`sex` enum(0,1,2) NOT NULL DEFAULT 2,
`face` VARCHAR (50) NOT NULL ,
`regTime` INT unsigned NOT NULL
 )
--相册表
DROP TABLE IF EXISTS `imooc_album`;
CREATE TABLE `imooc_album`(
`id` INT unsigned auto_increment key,
`pId` INT unsigned NOT NULL,
`albumPath` VARCHAR (50) not NULL
)

























