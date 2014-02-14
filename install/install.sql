-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.huilingsh.com
-- 
-- 主机: localhost
-- 生成日期: 2009 年 04 月 21 日 02:53
-- 服务器版本: 5.0.45
-- PHP 版本: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 数据库: `phpaa`
-- 

-- --------------------------------------------------------

-- 
-- 表的结构 `cms_article`
-- 

CREATE TABLE `cms_article` (
  `id` int(11) NOT NULL auto_increment COMMENT '文章ID',
  `cid` int(11) NOT NULL COMMENT '所属栏目ID',
  `title` varchar(200) collate utf8_unicode_ci NOT NULL default '' COMMENT '标题',
  `subtitle` varchar(200) collate utf8_unicode_ci default '',
  `att` set('a','b','c','d','e','f','g') collate utf8_unicode_ci default '' COMMENT '属性',
  `pic` varchar(200) collate utf8_unicode_ci default NULL COMMENT '缩略图',
  `source` varchar(200) collate utf8_unicode_ci default NULL COMMENT '来源',
  `author` varchar(20) collate utf8_unicode_ci default NULL COMMENT '作者',
  `resume` varchar(500) collate utf8_unicode_ci default NULL COMMENT '摘要',
  `pubdate` varchar(40) collate utf8_unicode_ci NOT NULL default '' COMMENT '发表日期',
  `content` text collate utf8_unicode_ci COMMENT '文章内容',
  `hits` int(11) NOT NULL default '0' COMMENT '点击次数',
  `created_by` int(11) NOT NULL COMMENT '创建者',
  `created_date` datetime NOT NULL COMMENT '创建时间',
  `delete_session_id` int(11) default NULL COMMENT '删除人ID',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=31 ;

-- 
-- 导出表中的数据 `cms_article`
-- 

INSERT INTO `cms_article` (`id`, `cid`, `title`, `subtitle`, `att`, `pic`, `source`, `author`, `resume`, `pubdate`, `content`, `hits`, `created_by`, `created_date`, `delete_session_id`) VALUES 
(1, 1, 'huiling V0.1发布', '', '', NULL, 'http://www.huilingsh.COM', 'huiling', '汇菱CMS 	\r\n', '2013-04-02 10:32:31', '<p>huilingCMS是一个非常简单易用的内容管理系统，适合做一些功能简单的站点！</p>\r\n<p>现在发布的是第一个版本，可能有些很多地方不是很稳定，欢迎大家提出修改意见。</p>', 0, 1, '2009-04-02 10:32:31', NULL),
(2, 1, 'huilingCMS V0.1.1发布', '', '', 'data/attachment/image/200904/2009040900582897.jpg', 'http://www.huilingsh.com', '汇菱', '系统更新 ', '2013-04-09 00:58:28', '<p>系统更新</p>\r\n<p>将系统中的短标记全部改成php5中默认的php标准标记</p>\r\n<p>修正点击用户名，不能修改的bug</p>\r\n<p>系统增加一个简单的说明文件,根目录 《说明.txt》</p>\r\n<p>调整部分页面</p>\r\n<p>&nbsp;</p>', 0, 1, '2013-04-09 00:58:28', NULL),
(12, 16, '测试数据2', '', '', NULL, '', '', ' ', '2009-04-09 01:01:25', '<p>afsafa</p>', 0, 1, '2009-04-09 01:01:25', NULL),
(9, 16, '测试数据1', '', '', NULL, '', '', ' ', '2009-04-04 00:45:00', '', 0, 1, '2009-04-04 00:45:00', NULL),
(13, 16, '测试数据3', '', '', NULL, '', '', ' ', '2009-04-09 01:12:43', '<p>afdsfdsa</p>', 0, 1, '2009-04-09 01:12:43', NULL),
(14, 16, '测试数据4', '', '', 'data/attachment/image/thumbnails/200904/2009040911140798.jpg', '', '', ' ', '2009-04-09 11:14:12', '<p><img height="421" alt="" width="337" src="/liuenyi/AACMS/data/attachment/image/0904090232343125039jnid20ffnmi.jpg" /></p>', 0, 1, '2009-04-09 11:14:12', NULL),
(15, 16, '测试数据5', '', '', NULL, '', '', ' ', '2009-04-09 11:15:09', '', 0, 1, '2009-04-09 11:15:09', NULL),
(16, 16, '测试数据6', '', 'a,b,d', 'data/attachment/image/thumbnails/200904/2009040911202864.jpg', '', '', ' ', '2009-04-15 09:37:26', '<p>sss</p>', 0, 1, '2009-04-15 09:37:26', NULL),
(17, 16, '测试数据7', '', 'b,d,f', NULL, '', '', ' ', '2009-04-15 09:38:02', '<p>fsd</p>', 0, 1, '2009-04-15 09:38:02', NULL),
(18, 16, '测试数据8', 'sddsafds', 'b', 'data/attachment/image/thumbnails/200904/2009041509383862.jpg', 'dss', 'ffff', 'sfddsaffsad', '2009-04-15 10:06:27', '<p>sadfdsadsaf<img height="421" alt="" width="337" src="/liuenyi/phpaaCMS/data/attachment/image/0904090232343125039jnid20ffnmi.jpg" /></p>', 0, 1, '2009-04-15 10:06:27', NULL),
(19, 16, '测试数据9', '副标题发生的的', 'a,d', 'data/attachment/image/thumbnails/200904/2009042022273733.gif', '出处', '作者', '摘要', '2009-04-20 22:27:54', '<p>阿方索高盛公司</p>', 0, 1, '2009-04-20 22:27:54', NULL),
(20, 16, '测试数据10', '', '', NULL, '', '', '', '2009-04-20 22:28:19', '<p>我热惹我</p>', 0, 1, '2009-04-20 22:28:19', NULL),
(21, 16, '测试数据11', '', '', NULL, '', '', '', '2009-04-20 22:28:32', '', 0, 1, '2009-04-20 22:28:32', NULL),

(22, 16, '测试数据12', '', '', NULL, '', '', '', '2009-04-20 22:28:39', '', 0, 1, '2009-04-20 22:28:39', NULL),
(23, 16, '测试数据13', '', '', NULL, '', '', '', '2009-04-20 22:28:49', '', 0, 1, '2009-04-20 22:28:49', NULL),
(24, 16, '测试数据14', '', '', NULL, '', '', '', '2009-04-20 22:29:34', '', 0, 1, '2009-04-20 22:29:34', NULL),
(25, 16, '测试数据15', '', '', NULL, '', '', '', '2009-04-20 22:29:51', '', 0, 1, '2009-04-20 22:29:51', NULL),
(26, 16, '测试数据16', '', '', NULL, '', '', '', '2009-04-20 22:29:54', '', 0, 1, '2009-04-20 22:29:54', NULL),
(27, 16, '测试数据17', '', '', NULL, '', '', '', '2009-04-20 22:29:58', '', 0, 1, '2009-04-20 22:29:58', NULL),
(28, 16, '测试数据18', '', '', NULL, '', '', '', '2009-04-20 22:30:03', '', 0, 1, '2009-04-20 22:30:03', NULL),
(29, 16, '测试数据19', '', '', NULL, '', '', '', '2009-04-20 22:30:07', '', 0, 1, '2009-04-20 22:30:07', NULL),
(30, 16, '测试数据20', '', '', NULL, '', '', '', '2009-04-20 22:30:10', '', 0, 1, '2009-04-20 22:30:10', NULL);

-- --------------------------------------------------------
--  Table structure for `cms_case`
-- ----------------------------

CREATE TABLE `cms_case` (
  `id` int(11) NOT NULL auto_increment COMMENT '案例ID',
  `cid` int(11) NOT NULL COMMENT '所属栏目ID',
  `title` varchar(200) collate utf8_unicode_ci NOT NULL default '' COMMENT '标题',
  `subtitle` varchar(200) collate utf8_unicode_ci default '',
  `pic` varchar(200) collate utf8_unicode_ci default NULL COMMENT '缩略图',
  `resume` varchar(500) collate utf8_unicode_ci default NULL COMMENT '摘要',
  `pubdate` varchar(40) collate utf8_unicode_ci NOT NULL default '' COMMENT '发表日期',
  `content` text collate utf8_unicode_ci COMMENT '案例内容',
  `hits` int(11) NOT NULL default '0' COMMENT '点击次数',
  `created_by` int(11) NOT NULL COMMENT '创建者',
  `created_date` datetime NOT NULL COMMENT '创建时间',
  `delete_session_id` int(11) default NULL COMMENT '删除人ID',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `cms_casecategory`
-- ----------------------------

CREATE TABLE `cms_casecategory` (
  `id` int(11) NOT NULL auto_increment COMMENT '栏目ID',
  `pid` int(11) NOT NULL default '0' COMMENT '父栏目ID',
  `name` varchar(50) collate utf8_unicode_ci NOT NULL default '' COMMENT '栏目名称',
  `description` text collate utf8_unicode_ci,
  `seq` int(11) NOT NULL default '0' COMMENT '栏目排序',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- 
-- 表的结构 `cms_category`
-- 

CREATE TABLE `cms_category` (
  `id` int(11) NOT NULL auto_increment COMMENT '栏目ID',
  `pid` int(11) NOT NULL default '0' COMMENT '父栏目ID',
  `name` varchar(50) collate utf8_unicode_ci NOT NULL default '' COMMENT '栏目名称',
  `description` text collate utf8_unicode_ci,
  `seq` int(11) NOT NULL default '0' COMMENT '栏目排序',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

-- 
-- 导出表中的数据 `cms_category`
-- 

INSERT INTO `cms_category` (`id`, `pid`, `name`, `description`, `seq`) VALUES 
(1, 0, '最新动态', NULL, 0),
(16, 0, '新闻推荐', NULL, 0);

-- --------------------------------------------------------

-- 
-- 表的结构 `cms_friendlink`
-- 

CREATE TABLE `cms_friendlink` (
  `id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `name` varchar(200) NOT NULL COMMENT '网站名称',
  `url` varchar(200) NOT NULL COMMENT '网址',
  `description` varchar(400) NOT NULL COMMENT '站点简介',
  `logo` varchar(200) NOT NULL COMMENT '网站LOGO',
  `seq` int(11) NOT NULL default '0' COMMENT '排列顺序',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- 导出表中的数据 `cms_friendlink`
-- 

INSERT INTO `cms_friendlink` (`id`, `name`, `url`, `description`, `logo`, `seq`) VALUES 
(1, '上海网站建设', 'http://www.huilingsh.com', '上海网站建设', '', 0),
(2, '上海网站制作', 'http://www.huilingsh.com', '', '上海网站制作', 0),
(3, '上海企业邮箱', 'http://web.huilingsh.com', '', '上海企业邮箱', 0),
(4, '上海虚拟主机', 'http://web.huilingsh.com', '', '上海虚拟主机', 0),
(5, '便宜域名注册', 'http://web.huilingsh.com', '', '便宜域名注册', 0);
-- --------------------------------------------------------

-- 
-- 表的结构 `cms_message`
-- 

CREATE TABLE `cms_message` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) collate utf8_unicode_ci default NULL COMMENT '称呼',
  `qq` varchar(15) collate utf8_unicode_ci default NULL COMMENT 'QQ',
  `email` varchar(50) collate utf8_unicode_ci default NULL COMMENT 'Email or MSN',
  `content` text collate utf8_unicode_ci COMMENT '内容',
  `reply` text collate utf8_unicode_ci COMMENT '回复',
  `ip` varchar(20) collate utf8_unicode_ci default NULL COMMENT '留言人IP',
  `validate` int(11) default '0' COMMENT '0为验证 1已验证',
  `created_date` datetime default NULL COMMENT '留言日期',
  `reply_date` datetime default NULL COMMENT '回复日期',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=14 ;

-- 
-- 导出表中的数据 `cms_message`
-- 

INSERT INTO `cms_message` (`id`, `name`, `qq`, `email`, `content`, `reply`, `ip`, `validate`, `created_date`, `reply_date`) VALUES 
(7, '匿名', '10000', '10000@qq.com', '系统很简单啊', '是的，谢谢你的关注(*^__^*) ', '127.0.0.1', 1, '2009-03-28 21:22:12', '2009-03-28 22:02:17');

-- --------------------------------------------------------

-- 
-- 表的结构 `cms_notice`
-- 

CREATE TABLE `cms_notice` (
  `id` int(11) NOT NULL auto_increment COMMENT 'ID',
  `title` varchar(200) NOT NULL COMMENT '公告标题',
  `content` text NOT NULL COMMENT '公告内容',
  `state` int(11) NOT NULL default '0' COMMENT '状态（0 发布 1 禁用）',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

-- 
-- 导出表中的数据 `cms_notice`
-- 

INSERT INTO `cms_notice` (`id`, `title`, `content`, `state`) VALUES 
(6, 'huiling 0.1版本发布', '非常简易的文章管理系统，适合建立一些功能要求不高的公司、企业、政府网站', 0),
(9, 'huiling 0.2 版本发布', '更换了网站后台皮肤，修改部分bug', 0);

-- --------------------------------------------------------
-- ----------------------------
--  Table structure for `cms_problems`
-- ----------------------------
DROP TABLE IF EXISTS `cms_problems`;
CREATE TABLE `cms_problems` (
  `ID` int(11) NOT NULL auto_increment,
  `company` varchar(50) character set utf8 collate utf8_unicode_ci NOT NULL,
  `department` varchar(50) NOT NULL,
  `division` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `Zipcode` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `validate` int(11) NOT NULL default '0',
  `centent` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- 
-- 表的结构 `cms_users`
-- 

CREATE TABLE `cms_users` (
  `userid` int(11) NOT NULL auto_increment COMMENT 'ID',
  `username` varchar(20) character set utf8 collate utf8_unicode_ci NOT NULL default '' COMMENT '用户名',
  `password` varchar(32) character set utf8 collate utf8_unicode_ci NOT NULL default '' COMMENT '密码',
  PRIMARY KEY  (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

-- 
-- 导出表中的数据 `cms_users`
-- 

INSERT INTO `cms_users` (`userid`, `username`, `password`) VALUES (1, 'admin', '21232f297a57a5a743894a0e4a801fc3')
