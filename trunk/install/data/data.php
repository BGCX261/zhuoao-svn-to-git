<?php
$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."admin`;","");
$data[]=array("CREATE TABLE `".DB_PRE."admin` (
  		`id` mediumint(8) NOT NULL auto_increment,
 		`admin_name` varchar(60) NOT NULL,
  		`admin_password` varchar(60) NOT NULL,
  		`admin_nich` varchar(60) NOT NULL,
 		`admin_purview` mediumint(8) NOT NULL,
 		`admin_admin` varchar(60) default NULL,
 		`admin_mail` varchar(60) default NULL,
 		`admin_tel` varchar(60) default NULL,
 		`is_disable` mediumint(8) NOT NULL default '0',
  		`admin_ip` varchar(60) default NULL,
  		`admin_time` varchar(60) default NULL,
 		PRIMARY KEY  (`id`)
		) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;",
		"admin");
$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."admin_group`;","");
$data[]=array("CREATE TABLE `".DB_PRE."admin_group` (
  `id` mediumint(8) NOT NULL auto_increment,
  `admin_group_name` varchar(60) NOT NULL,
  `admin_group_info` varchar(255) default NULL,
  `admin_group_purview` text COMMENT '分组权限-字符串以,分割',
  `is_disable` mediumint(8) NOT NULL default '0' COMMENT '是否禁用',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;","admin_group");
$data[]=array("INSERT INTO `".DB_PRE."admin_group` (`id`, `admin_group_name`, `admin_group_info`, `admin_group_purview`, `is_disable`) VALUES
(1, '超级管理员', '可以管理后台所有功能，没有任何限制', 'all_purview', 0),
(2, '信息发布员 ', '发布信息内容的管理员', 'content_create,content_edit', 0);
","");
$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."alone`;","");
$data[]=array("CREATE TABLE `".DB_PRE."alone` (
  `id` mediumint(8) NOT NULL,
  `content` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;","alone");
$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."article`;","");
$data[]=array("CREATE TABLE `".DB_PRE."article` (
  `id` mediumint(8) NOT NULL,
  `content` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;","article");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."auto_fields`;","");
$data[]=array("CREATE TABLE `".DB_PRE."auto_fields` (
  `id` mediumint(8) NOT NULL auto_increment,
  `field_name` varchar(60) NOT NULL,
  `use_name` varchar(60) NOT NULL COMMENT '表单提示文字',
  `field_type` varchar(60) NOT NULL,
  `field_value` varchar(255) default NULL COMMENT '字段默认值',
  `field_length` mediumint(8) default NULL,
  `channel_id` mediumint(8) NOT NULL COMMENT '所属频道id',
  `field_info` varchar(255) default NULL COMMENT '字段提示信息',
  `is_disable` mediumint(8) NOT NULL,
  `check_value` varchar(60) default NULL,
  `field_order` mediumint(8) NOT NULL default '10',
  `is_del` mediumint(8) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;","auto_fields");
$data[]=array("INSERT INTO `".DB_PRE."auto_fields` (`id`, `field_name`, `use_name`, `field_type`, `field_value`, `field_length`, `channel_id`, `field_info`, `is_disable`, `check_value`, `field_order`, `is_del`) VALUES
(1, 'content', '内容', 'html', '', 255, 2, '', 0, NULL, 1, 1),
(2, 'model', '型号', 'text', '', 255, 3, '', 0, NULL, 1, 1),
(4, 'marketprice', '市场价格', 'text', '', 255, 3, '', 0, NULL, 3, 0),
(28, 'content', '详细内容', 'html', '', 255, 5, '', 0, NULL, 16, 1),
(6, 'down', '下载地址', 'upload_file', '', 255, 4, '', 0, NULL, 1, 1),
(27, 'content', '详细内容', 'html', '', 255, 4, '', 0, NULL, 4, 1),
(10, 'jobnum', '招聘人数', 'text', '', 255, 5, '', 0, NULL, 2, 0),
(12, 'jopaddress', '工作地点', 'text', '', 255, 5, '', 0, NULL, 5, 0),
(16, 'joblasttime', '截止日期', 'text', '2011-1-2', 255, 5, '', 0, NULL, 9, 0),
(26, 'content', '详细介绍', 'html', '', 255, 3, '', 0, NULL, 4, 1),
(24, 'content', '详细内容', 'html', '', 255, 1, '', 0, NULL, 1, 1),
(25, 'pics', '产品图片', 'upload_pic_more', '', 255, 3, '', 0, NULL, 10, 0),
(29, 'filesize', '文件大小', 'text', '', 255, 4, '单位为K', 0, NULL, 3, 1),
(30, 'filetype', '文件类型', 'select', '.exe,.rar,其他', 255, 4, '', 0, NULL, 2, 1),
(32, 'wholesale', '批发说明', 'textarea', '我处产品种类齐全，买家可根据自己销量的需要，多款产品选择批发', 255, 3, '', 0, NULL, 6, 0),
(33, 'shipping', '运费说明', 'textarea', '申通快递：江浙沪首重3公斤--5元，续重超过的，加收10元，除新疆，西藏，甘肃，宁夏，内蒙古，青海等地运费首重1公斤18元，续重加收18元，其他省份均为首重1公斤10元，续重加收10元。', 255, 3, '', 0, NULL, 7, 0),
(34, 'trading', '交易方式', 'textarea', '', 255, 3, '', 0, NULL, 8, 0),
(35, 'contact', '联系方式', 'textarea', '<br>电话：\r\n<br>移动电话：\r\n<br>传真：\r\n<br>地址：\r\n<br>邮编：\r\n<br>公司网站：', 255, 3, '', 0, NULL, 9, 0);","");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."block`;","");
$data[]=array("CREATE TABLE `".DB_PRE."block` (
   `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `tag` varchar(60) NOT NULL,
  `content` text,
  `tag_name` varchar(255) DEFAULT NULL,
  `lang` varchar(255) DEFAULT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;","block");
$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."category`;","");
$data[]=array("CREATE TABLE `".DB_PRE."category` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `custom_url` varchar(255) DEFAULT NULL,
  `cate_name` varchar(60) NOT NULL,
  `cate_mb_is` mediumint(8) NOT NULL,
  `cate_hide` mediumint(8) NOT NULL,
  `cate_channel` mediumint(8) NOT NULL,
  `cate_fold_name` varchar(60) NOT NULL,
  `cate_order` mediumint(8) NOT NULL,
  `cate_rank` mediumint(8) DEFAULT '0',
  `cate_tpl` mediumint(8) NOT NULL,
  `cate_tpl_index` varchar(60) DEFAULT NULL,
  `cate_tpl_list` varchar(60) DEFAULT NULL,
  `cate_tpl_content` varchar(60) DEFAULT NULL,
  `cate_title_seo` varchar(60) DEFAULT NULL,
  `cate_key_seo` varchar(60) DEFAULT NULL,
  `cate_info_seo` varchar(350) DEFAULT NULL,
  `lang` varchar(60) NOT NULL,
  `cate_parent` mediumint(8) NOT NULL,
  `cate_html` mediumint(8) NOT NULL DEFAULT '0',
  `cate_nav` varchar(60) NOT NULL DEFAULT '0',
  `is_content` mediumint(8) DEFAULT '0',
  `cate_url` varchar(60) DEFAULT NULL,
  `cate_is_open` mediumint(8) NOT NULL DEFAULT '0',
  `form_id` mediumint(8) DEFAULT NULL,
  `cate_pic1` varchar(255) DEFAULT NULL,
  `cate_pic2` varchar(255) DEFAULT NULL,
  `cate_pic3` varchar(255) DEFAULT NULL,
  `cate_content` text,
  `temp_id` mediumint(8) DEFAULT NULL,
  `list_num` MEDIUMINT( 8 ) NOT NULL DEFAULT '20',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;","category");
$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."channel`;","");
$data[]=array("CREATE TABLE `".DB_PRE."channel` (
  `id` mediumint(8) NOT NULL auto_increment,
  `channel_name` varchar(60) NOT NULL,
  `channel_mark` varchar(60) NOT NULL,
  `channel_table` varchar(60) NOT NULL,
  `is_disable` mediumint(8) NOT NULL,
  `is_member` mediumint(8) DEFAULT NULL,
  `channel_mb_grade` mediumint(8) default '0',
  `is_verify` mediumint(8) NOT NULL COMMENT '发布内容是否审核',
  `is_del` mediumint(8) NOT NULL default '0',
  `channel_order` mediumint(8) NOT NULL default '10',
  `is_alone` mediumint(8) NOT NULL default '0',
  `list_php` VARCHAR( 150 ) NULL,
  `content_php` VARCHAR( 150 ) NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;","channel");

$data[]=array("INSERT INTO `".DB_PRE."channel` (`id`, `channel_name`, `channel_mark`, `channel_table`, `is_disable`, `is_member`, `channel_mb_grade`, `is_verify`, `is_del`, `channel_order`, `is_alone`, `list_php`, `content_php`) VALUES
(1, '单页模型', 'alone', 'alone', 0, 0, 2, 0, 1, 5, 1, 'alone/alone.php', 'alone/show_alone.php'),
(2, '文章模块', 'article', 'article', 0, 0, 2, 0, 0, 1, 0, 'article/article.php', 'article/show_article.php'),
(3, '产品模块', 'product', 'product', 0, 0, 2, 0, 0, 2, 0, 'product/product.php', 'product/show_product.php'),
(4, '下载模块', 'down', 'down', 0, 0, 2, 0, 0, 3, 0, 'down/down.php', 'down/show_down.php'),
(5, '招聘模块', 'job', 'job', 0, 0, 2, 0, 0, 4, 0, 'job/job.php', 'job/show_job.php');
","");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."cmsinfo`;","");
$data[]=array("CREATE TABLE `".DB_PRE."cmsinfo` (
  `id` mediumint(8) NOT NULL auto_increment,
  `info_tag` varchar(60) default NULL COMMENT '配置信息标识',
  `info_array` text COMMENT '配置信息内容',
  `info_name` varchar(60) default NULL COMMENT '配置信息名',
  `lang_tag` varchar(60) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;","cmsinfo");

$data[]=array("INSERT INTO `".DB_PRE."cmsinfo` (`id`, `info_tag`, `info_array`, `info_name`, `lang_tag`) VALUES
(1, 'sys', 'array (\n  ''web_upload_file'' => ''zip|gz|rar|iso|doc|xsl|ppt|wps|swf|mpg|mp3|rm|rmvb|wmv|wma|wav|mid|mov'',\n  ''thump_width'' => ''300'',\n  ''thump_height'' => ''200'',\n  ''upload_size'' => ''2024000'',\n  ''web_member'' => \n  array (\n    0 => ''1'',\n  ),\n  ''is_member'' => \n  array (\n    0 => ''1'',\n  ),\n  ''member_mail'' => \n  array (\n    0 => ''1'',\n  ),\n  ''member_no_name'' => ''admin|administrator|user|users'',\n  ''image_is'' => \n  array (\n    0 => ''1'',\n  ),\n  ''image_url_is'' => \n  array (\n    0 => ''1'',\n  ),\n  ''image_type'' => \n  array (\n    0 => ''1'',\n  ),\n  ''image_text'' => ''www.beescms.com'',\n  ''image_text_color'' => ''0,0,0'',\n  ''image_text_size'' => ''12'',\n  ''pic'' => ''mark_logo.gif'',\n  ''image_position'' => \n  array (\n    0 => ''9'',\n  ),\n  ''mail_type'' => \n  array (\n    0 => ''1'',\n  ),\n  ''mail_host'' => ''smtp.163.com'',\n  ''mail_pot'' => ''25'',\n  ''mail_mail'' => '''',\n  ''mail_user'' => ''admin'',\n  ''mail_pw'' => ''admin'',\n  ''mail_js'' => '''',\n  ''mail_jw'' => ''BEESCMS企业网站管理系统 http://www.beescms.com'',\n  ''safe_open'' => \n  array (\n    0 => ''1'',\n    1 => ''2'',\n    2 => ''3'',\n  ),\n  ''web_content_title'' => ''180'',\n  ''web_content_info'' => ''200'',\n  ''is_hits'' => ''1'',\n  ''fialt_words'' => ''她妈|它妈|他妈|你妈|去死|贱人|非典|艾滋病|阳痿'',\n  ''arc_html'' => \n  array (\n    0 => ''1'',\n  ),\n)', '系统配置', ''),
(2, 'index_info', 'array (\n  ''flash_is'' => ''0'',\n  ''index_lang'' => ''9'',\n)', '首页配置', '');
","");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."down`;","");
$data[]=array("CREATE TABLE `".DB_PRE."down` (
  `id` mediumint(8) NOT NULL,
  `down` varchar(255) default NULL,
  `body` text,
  `content` text,
  `filesize` varchar(255) default NULL,
  `filetype` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;","down");
$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."form`;","");
$data[]=array("CREATE TABLE `".DB_PRE."form` (
  `id` mediumint(8) NOT NULL auto_increment,
  `form_name` varchar(60) NOT NULL,
  `form_mark` varchar(60) NOT NULL,
  `is_disable` mediumint(8) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;","form");

$data[]=array("INSERT INTO `".DB_PRE."form` (`id`, `form_name`, `form_mark`, `is_disable`) VALUES
(5, '产品购买', 'prinfo', 0),
(8, '在线应聘', 'webjob', 0);;","form");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."formfield`;","");
$data[]=array("CREATE TABLE `".DB_PRE."formfield` (
  `id` mediumint(8) NOT NULL auto_increment,
  `field_name` varchar(60) NOT NULL,
  `use_name` varchar(60) NOT NULL,
  `field_type` varchar(60) NOT NULL,
  `field_value` varchar(255) NOT NULL,
  `field_length` mediumint(8) NOT NULL,
  `form_id` mediumint(8) NOT NULL,
  `field_info` varchar(60) character set utf8 collate utf8_estonian_ci NOT NULL,
  `is_disable` mediumint(8) NOT NULL,
  `form_order` mediumint(8) NOT NULL default '0',
  `is_empty` mediumint(8) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;","formfield");

$data[]=array("INSERT INTO `".DB_PRE."formfield` (`id`, `field_name`, `use_name`, `field_type`, `field_value`, `field_length`, `form_id`, `field_info`, `is_disable`, `form_order`, `is_empty`) VALUES
(8, 'title', '主题', 'text', '', 255, 5, '', 0, 1, 0),
(9, 'user_name', '姓名', 'text', '', 255, 5, '', 0, 3, 0),
(10, 'sex', '性别', 'select', '男士,女士', 255, 5, '', 0, 5, 1),
(17, 'address', '详细地址', 'text', '', 255, 5, '', 0, 7, 0),
(12, 'mail', '邮箱', 'text', '', 255, 5, '', 0, 6, 1),
(13, 'tel', '联系电话', 'text', '', 255, 5, '', 0, 4, 0),
(14, 'content', '其它内容', 'textarea', '', 255, 5, '', 0, 9, 0),
(18, 'addcode', '邮政编码', 'text', '', 255, 5, '', 0, 8, 0),
(19, 'jobname', '姓名', 'text', '', 255, 8, '', 0, 1, 0),
(20, 'jobsex', '性别', 'select', '男,女', 255, 8, '', 0, 2, 0),
(21, 'jobmoth', '出生年月', 'text', '', 255, 8, '', 0, 3, 0),
(22, 'jobjg', '籍贯', 'text', '', 255, 8, '', 0, 4, 0),
(23, 'jobxl', '学历', 'text', '', 255, 8, '', 0, 5, 0),
(24, 'jobzy', '专业', 'text', '', 255, 8, '', 0, 6, 0),
(25, 'jobbyyx', '毕业院校', 'text', '', 255, 8, '', 0, 7, 0),
(26, 'jobphone', '联系电话', 'text', '', 255, 8, '', 0, 8, 0),
(27, 'jobmail', 'E–mail', 'text', '', 255, 8, '', 0, 9, 0),
(28, 'jobhj', '所获奖项', 'textarea', '', 255, 8, '', 0, 10, 0),
(29, 'jobgzjl', '工作经历', 'textarea', '', 255, 8, '', 0, 11, 0),
(30, 'jobzyjn', '专业技能', 'textarea', '', 255, 8, '', 0, 12, 0),
(31, 'jobyyah', '业余爱好', 'textarea', '', 255, 8, '', 0, 13, 0);","formfield");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."formlist`;","");
$data[]=array("CREATE TABLE `".DB_PRE."formlist` (
  `id` mediumint(8) NOT NULL auto_increment,
  `form_id` mediumint(8) default NULL,
  `form_time` varchar(60) default NULL,
  `form_ip` varchar(60) default NULL,
  `is_read` mediumint(8) NOT NULL default '0',
  `member_id` mediumint(8) default '0',
  `arc_id` mediumint(8) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","formlist");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."job`;","");
$data[]=array("CREATE TABLE `".DB_PRE."job` (
  `id` mediumint(8) NOT NULL,
  `jobnum` varchar(255) default NULL,
  `jopaddress` varchar(255) default NULL,
  `joblasttime` varchar(255) default NULL,
  `content` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;","job");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."lang`;","");
$data[]=array("CREATE TABLE `".DB_PRE."lang` (
  `id` mediumint(8) NOT NULL auto_increment,
  `lang_name` varchar(60) NOT NULL,
  `lang_order` mediumint(8) NOT NULL,
  `lang_tag` varchar(60) NOT NULL,
  `lang_is_use` mediumint(8) NOT NULL default '1',
  `lang_is_open` mediumint(8) NOT NULL,
  `lang_is_url` mediumint(8) NOT NULL,
  `lang_url` varchar(60) default NULL,
  `lang_is_fix` mediumint(8) NOT NULL default '0',
  `lang_main` mediumint(8) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;","lang");

$data[]=array("INSERT INTO `".DB_PRE."lang` (`id`, `lang_name`, `lang_order`, `lang_tag`, `lang_is_use`, `lang_is_open`, `lang_is_url`, `lang_url`, `lang_is_fix`, `lang_main`) VALUES
(10, 'English', 9, 'en', 1, 0, 0, 'http://', 0, 0),
(9, '简体中文', 10, 'cn', 1, 0, 0, 'http://', 1, 1);","");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."maintb`;","");
$data[]=array("CREATE TABLE `".DB_PRE."maintb` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `filter` varchar(60) DEFAULT NULL,
  `tbpic` varchar(60) DEFAULT NULL,
  `keywords` varchar(60) DEFAULT NULL,
  `info` text,
  `author` varchar(60) DEFAULT NULL,
  `source` varchar(60) DEFAULT NULL,
  `hits` mediumint(8) NOT NULL DEFAULT '0',
  `category` mediumint(8) NOT NULL,
  `channel` mediumint(9) NOT NULL,
  `addtime` varchar(60) NOT NULL,
  `updatetime` varchar(60) DEFAULT NULL,
  `top` mediumint(8) NOT NULL,
  `purview` mediumint(8) NOT NULL COMMENT '浏览权限',
  `is_html` mediumint(8) NOT NULL COMMENT '1为动态浏览,0为静态',
  `verify` mediumint(8) NOT NULL DEFAULT '0',
  `url` varchar(255) DEFAULT NULL,
  `lang` varchar(60) DEFAULT NULL,
  `is_url` mediumint(8) NOT NULL DEFAULT '0',
  `url_add` varchar(60) DEFAULT NULL,
  `title_color` varchar(60) DEFAULT NULL,
  `title_style` mediumint(8) NOT NULL DEFAULT '0',
  `is_open` mediumint(8) NOT NULL DEFAULT '0',
  `cache_time` varchar(60) DEFAULT NULL,
  `custom_url` varchar(255) DEFAULT NULL,
  `c_order` mediumint(8) DEFAULT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","maintb");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."member`;","");
$data[]=array("CREATE TABLE `".DB_PRE."member` (
  `id` mediumint(8) NOT NULL auto_increment,
  `member_name` varchar(60) default NULL,
  `member_password` varchar(60) NOT NULL,
  `member_nich` varchar(60) NOT NULL,
  `member_purview` mediumint(8) NOT NULL default '0',
  `member_user` varchar(60) NOT NULL,
  `member_mail` varchar(60) NOT NULL,
  `member_tel` varchar(60) default NULL,
  `is_disable` mediumint(8) NOT NULL default '0',
  `member_ip` varchar(60) default NULL,
  `member_time` varchar(60) default NULL,
  `member_count` mediumint(8) NOT NULL default '0',
  `member_qq` varchar(60) default NULL,
  `member_phone` varchar(60) default NULL,
  `member_sex` mediumint(8) default '0',
  `member_addtime` varchar(60) default NULL,
  `member_birth` varchar(60) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;","member");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."member_group`;","");
$data[]=array("CREATE TABLE `".DB_PRE."member_group` (
  `id` mediumint(8) NOT NULL auto_increment,
  `member_group_name` varchar(60) NOT NULL,
  `member_group_info` varchar(255) NOT NULL,
  `is_disable` mediumint(8) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;","member_group");

$data[]=array("INSERT INTO `".DB_PRE."member_group` (`id`, `member_group_name`, `member_group_info`, `is_disable`) VALUES
(1, '注册会员', '注册完成的所有会员都是这个级别', 0),
(2, 'VIP会员', '注册会员通过管理后台升级的级别', 0);","");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."product`;","");
$data[]=array("CREATE TABLE `".DB_PRE."product` (
  `id` mediumint(8) NOT NULL,
  `model` varchar(255) default NULL,
  `marketprice` varchar(255) default NULL,
  `pics` varchar(255) default NULL,
  `content` text,
  `wholesale` text,
  `shipping` text,
  `trading` text,
  `contact` varchar(255) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;","product");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."ask`;","");
$data[]=array("CREATE TABLE `".DB_PRE."ask` (
  `id` mediumint(8) NOT NULL auto_increment,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `addtime` varchar(60) NOT NULL,
  `reply` text,
  `member` mediumint(8) NOT NULL,
  `replytime` varchar(60) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","ask");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."link`;","");
$data[]=array("CREATE TABLE `".DB_PRE."link` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `link_url` varchar(60) NOT NULL,
  `link_name` varchar(60) NOT NULL,
  `link_logo` varchar(60) DEFAULT NULL,
  `link_order` mediumint(8) NOT NULL DEFAULT '1',
  `link_info` varchar(255) DEFAULT NULL,
  `link_mail` varchar(60) DEFAULT NULL,
  `lang` varchar(60) NOT NULL,
  `addtime` varchar(60) DEFAULT NULL,
  `link_type` mediumint(8) NOT NULL DEFAULT '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","link");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."collect`;","");
$data[]=array("CREATE TABLE `".DB_PRE."collect` (
  `id` mediumint(8) NOT NULL auto_increment,
  `member_id` mediumint(8) NOT NULL,
  `arc_id` mediumint(8) NOT NULL,
  `addtime` varchar(60) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","collect");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."prinfo`;","");
$data[]=array("CREATE TABLE `".DB_PRE."prinfo` (
  `id` mediumint(8) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `content` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `addcode` varchar(255) DEFAULT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;","prinfo");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."market`;","");
$data[]=array("CREATE TABLE `".DB_PRE."market` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `market_name` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `market_type` mediumint(8) NOT NULL DEFAULT '0',
  `market_num` varchar(60) CHARACTER SET utf8 NOT NULL,
  `market_order` varchar(60) CHARACTER SET utf8 NOT NULL DEFAULT '10',
  `market_is` mediumint(8) NOT NULL DEFAULT '1',
  `lang` varchar(60) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","market");


$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."lang_lang`;","");
$data[]=array("CREATE TABLE `".DB_PRE."lang_lang` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `lang_tag` varchar(60) NOT NULL,
  `lang_value` varchar(240) DEFAULT NULL,
  `lang` varchar(60) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=266 ;","lang_lang");

$data[]=array("INSERT INTO `".DB_PRE."lang_lang` (`id`, `lang_tag`, `lang_value`, `lang`) VALUES
(5, 'pages', '共', 'cn'),
(6, 'pagesize', '条记录', 'cn'),
(7, 'page', '当前第', 'cn'),
(8, 'pagehome', '首页', 'cn'),
(9, 'pageend', '尾页', 'cn'),
(10, 'pagapre', '上一页', 'cn'),
(11, 'pagenext', '下一页', 'cn'),
(12, 'pagego', '转到', 'cn'),
(13, 'previous', '上一条', 'cn'),
(14, 'next', '下一条', 'cn'),
(15, 'nonestr', '没有了', 'cn'),
(16, 'index', '首页', 'cn'),
(17, 'sitemap', '网站地图', 'cn'),
(19, 'index_news', '新闻中心', 'cn'),
(20, 'index_company', '公司简介', 'cn'),
(21, 'contact', '联系方式', 'cn'),
(22, 'products', '产品展示', 'cn'),
(23, 'products_nav', '产品导航', 'cn'),
(24, 'links', '友情链接', 'cn'),
(25, 'location', '当前位置', 'cn'),
(26, 'rec_content', '推荐产品', 'cn'),
(27, 'hot_content', '热门内容', 'cn'),
(28, 'rec_products', '推荐产品', 'cn'),
(29, 'like_content', '相关内容', 'cn'),
(30, 'content_hits', '点击次数', 'cn'),
(31, 'content_pubdate', '更新时间', 'cn'),
(32, 'close', '关闭', 'cn'),
(33, 'print', '打印', 'cn'),
(34, 'add_favorites', '加入收藏', 'cn'),
(35, 'current_time', '当前时间', 'cn'),
(36, 'member_home', '中心首页', 'cn'),
(37, 'member_info', '用户信息', 'cn'),
(38, 'member_ask', '会员咨询', 'cn'),
(39, 'member_fav', '我的收藏', 'cn'),
(40, 'member_wel', '欢迎你回来!', 'cn'),
(41, 'member_grade', '用户级别', 'cn'),
(42, 'member_last_login', '上次登陆时间', 'cn'),
(43, 'member_last_login_ip', '上次登陆IP', 'cn'),
(44, 'member_login_num', '登录次数', 'cn'),
(45, 'member_home_title', '用户中心统计', 'cn'),
(46, 'member_birth', '出生日期', 'cn'),
(47, 'member_sex', '性别', 'cn'),
(48, 'member_sex_none', '保密', 'cn'),
(49, 'member_sex_man', '男', 'cn'),
(50, 'member_sex_woman', '女', 'cn'),
(51, 'member_mail', '电子邮件', 'cn'),
(52, 'member_js', '联系QQ', 'cn'),
(53, 'member_tel', '固定电话', 'cn'),
(54, 'member_phone', '手机', 'cn'),
(55, 'sys_dec', '参数说明', 'cn'),
(56, 'sys_value', '参数值', 'cn'),
(57, 'sys_name', '变量名', 'cn'),
(58, 'sys_submit', '确定', 'cn'),
(59, 'sys_reset', '取消', 'cn'),
(60, 'member_ask_manage', '咨询管理', 'cn'),
(61, 'member_ask_add', '添加咨询', 'cn'),
(62, 'member_ask_title', '咨询标题', 'cn'),
(63, 'member_ask_content', '咨询内容', 'cn'),
(64, 'sys_title', '标题', 'cn'),
(65, 'sys_time', '添加时间', 'cn'),
(66, 'sys_stas', '状态', 'cn'),
(67, 'sys_caozuo', '操作', 'cn'),
(68, 'member_password_old', '旧密码', 'cn'),
(69, 'member_password_new', '新密码', 'cn'),
(70, 'member_password_newt', '确认新密码', 'cn'),
(71, 'member_index', '网站首页', 'cn'),
(72, 'member_out', '退出登陆', 'cn'),
(73, 'member_login_user', '用户名', 'cn'),
(74, 'member_login_pass', '登陆密码', 'cn'),
(75, 'member_login_code', '验证码', 'cn'),
(76, 'member_login', '登陆', 'cn'),
(77, 'member_regist', '注册会员', 'cn'),
(78, 'member_reg_nich', '昵称', 'cn'),
(79, 'member_reg_pass', '登陆密码', 'cn'),
(80, 'member_reg_passt', '确认密码', 'cn'),
(81, 'member_reg_mail', '电子邮箱', 'cn'),
(82, 'member_reg_mail_info', '每个电子邮邮箱只能注册一个帐号', 'cn'),
(83, 'member_login_info', '账号登陆', 'cn'),
(84, 'member_msg', '请先登录', 'cn'),
(85, 'member_msg2', '验证码不正确', 'cn'),
(86, 'member_smg3', '用户名或密码不能为空', 'cn'),
(87, 'member_msg3', '用户名名或密码不正确', 'cn'),
(88, 'member_msg4', '登录失败,该账号已被锁定', 'cn'),
(89, 'member_msg5', '会员注册已经暂停', 'cn'),
(90, 'member_msg6', '用户名只能是字母数字，4以上长度', 'cn'),
(91, 'member_msg7', '昵称只能是字母数字，4以上长度', 'cn'),
(92, 'member_msg8', '密码不能为空', 'cn'),
(93, 'member_msg9', '两次密码不一样', 'cn'),
(94, 'member_msg10', '邮箱不正确', 'cn'),
(95, 'member_msg11', '该用户名不能注册', 'cn'),
(96, 'member_msg12', '已经存在相同的用户名，请更换用户名', 'cn'),
(97, 'member_msg13', '该邮箱已经被使用,请更换', 'cn'),
(98, 'member_msg14', '用户注册成功', 'cn'),
(99, 'msg_info', '不存在flash引导页模板', 'cn'),
(100, 'msg_info2', '不存在【@】语言首页模板', 'cn'),
(101, 'msg_info3', '找不到【@】语言模板文件', 'cn'),
(102, 'msg_info4', '请先生成【@】语言首页', 'cn'),
(103, 'msg_info5', '请先更新栏目缓存', 'cn'),
(104, 'msg_info6', '请先更新频道缓存', 'cn'),
(105, 'msg_info7', '你当前的会员权限不能浏览', 'cn'),
(106, 'msg_info8', '该内容未审核,还不能浏览', 'cn'),
(107, 'msg_info9', '还没有添加内容', 'cn'),
(108, 'tpl_look', '详细查看', 'cn'),
(109, 'tpl_file_type', '文件类型', 'cn'),
(110, 'tpl_file_size', '文件大小', 'cn'),
(111, 'tpl_content', '详细内容', 'cn'),
(112, 'tpl_dwon_add', '下载地址', 'cn'),
(113, 'tpl_down', '点击下载', 'cn'),
(114, 'tpl_jobtype', '工作性质', 'cn'),
(115, 'tpl_jobnum', '招聘人数', 'cn'),
(116, 'tpl_jobexp', '工作经验', 'cn'),
(117, 'tpl_jobaddress', '工作地点', 'cn'),
(118, 'tpl_jobage', '年龄', 'cn'),
(119, 'tpl_joblanguage', '语言及水平要求', 'cn'),
(120, 'tpl_joblasttime', '截止日期', 'cn'),
(121, 'tpl_jobsalary', '待遇', 'cn'),
(122, 'tpl_jobheight', '身高', 'cn'),
(123, 'tpl_jobedu', '学历', 'cn'),
(124, 'tpl_jobsex', '性别', 'cn'),
(125, 'tpl_jobtel', '联系电话', 'cn'),
(126, 'tpl_jobmail', 'EMail', 'cn'),
(127, 'tpl_jobweb', '网址', 'cn'),
(128, 'tpl_list', '列表页', 'cn'),
(129, 'tpl_spec', '产品规格', 'cn'),
(130, 'tpl_marketprice', '产品价格', 'cn'),
(131, 'tpl_model', '产品型号', 'cn'),
(132, 'tpl_pfsm', '批发说明', 'cn'),
(133, 'tpl_yfsm', '运费说明', 'cn'),
(134, 'tpl_jyfs', '交易方式', 'cn'),
(135, 'tpl_fkxx', '反馈信息', 'cn'),
(136, 'sitemap', 'Site Map', 'en'),
(137, 'index_news', 'News', 'en'),
(138, 'index_company', 'Company Profile', 'en'),
(139, 'contact', 'Contact', 'en'),
(140, 'products', 'Products', 'en'),
(141, 'products_nav', 'Navigation', 'en'),
(142, 'links', 'Links', 'en'),
(143, 'location', 'Location', 'en'),
(144, 'rec_content', 'Recommended Content', 'en'),
(145, 'hot_content', 'Popular content', 'en'),
(146, 'rec_products', 'Recommended Products', 'en'),
(147, 'like_content', 'Related Content', 'en'),
(148, 'content_hits', 'Clicks', 'en'),
(149, 'content_pubdate', 'Updated', 'en'),
(150, 'close', 'Close', 'en'),
(151, 'print', 'Print', 'en'),
(152, 'add_favorites', 'Add to Favorites', 'en'),
(153, 'tpl_look', 'Detailed View', 'en'),
(154, 'tpl_file_type', 'File Type', 'en'),
(155, 'tpl_file_size', 'File Size', 'en'),
(156, 'tpl_content', 'Details', 'en'),
(157, 'tpl_dwon_add', 'Download', 'en'),
(158, 'tpl_down', 'Click to download', 'en'),
(159, 'tpl_jobtype', 'Nature of work', 'en'),
(160, 'tpl_jobnum', 'Number', 'en'),
(161, 'tpl_jobexp', 'Work experience', 'en'),
(162, 'tpl_jobaddress', 'Location', 'en'),
(163, 'tpl_jobage', 'Age', 'en'),
(164, 'tpl_joblanguage', 'Language and level requirements', 'en'),
(165, 'tpl_joblasttime', 'Deadline', 'en'),
(166, 'tpl_jobsalary', 'Treatment', 'en'),
(167, 'tpl_jobheight', 'Height', 'en'),
(168, 'tpl_jobedu', 'Education', 'en'),
(169, 'tpl_jobsex', 'sex', 'en'),
(170, 'tpl_jobtel', 'Contact', 'en'),
(171, 'tpl_jobmail', 'EMail', 'en'),
(172, 'tpl_jobweb', 'Website', 'en'),
(173, 'tpl_list', 'List', 'en'),
(174, 'tpl_spec', 'Product Specifications', 'en'),
(175, 'tpl_marketprice', 'Product Price', 'en'),
(176, 'tpl_model', 'Product Type', 'en'),
(177, 'tpl_pfsm', 'Wholesale Help', 'en'),
(178, 'tpl_yfsm', 'Shipping instructions', 'en'),
(179, 'tpl_jyfs', 'Trading', 'en'),
(180, 'tpl_fkxx', 'Feedback', 'en'),
(181, 'pages', 'total', 'en'),
(182, 'pagesize', 'Records', 'en'),
(183, 'page', 'Current', 'en'),
(184, 'pagehome', 'Home', 'en'),
(185, 'pageend', 'Last', 'en'),
(186, 'pagapre', 'Previous', 'en'),
(187, 'pagenext', 'Next', 'en'),
(188, 'pagego', 'Go', 'en'),
(189, 'previous', 'Previous', 'en'),
(190, 'next', 'Next', 'en'),
(191, 'nonestr', 'None', 'en'),
(192, 'index', 'Home', 'en'),
(193, 'sys_dec', 'Parameter Description', 'en'),
(194, 'sys_value', 'Parameter values', 'en'),
(195, 'sys_name', 'Variable name', 'en'),
(196, 'sys_submit', 'OK', 'en'),
(197, 'sys_reset', 'Reset', 'en'),
(198, 'sys_title', 'Title', 'en'),
(199, 'sys_time', 'Add Time', 'en'),
(200, 'sys_stas', 'Status', 'en'),
(201, 'sys_caozuo', 'Operation', 'en'),
(202, 'msg_info', 'There is no template to guide page', 'en'),
(203, 'msg_info2', 'There is no language page templates 【@】', 'en'),
(204, 'msg_info3', '【@】 Language can not find the template file', 'en'),
(205, 'msg_info4', 'Please generate 【@】 Language Home', 'en'),
(206, 'msg_info5', 'Please update column cache', 'en'),
(207, 'msg_info6', '请先更新频道缓存', 'en'),
(208, 'msg_info7', 'You can not view the current membership privilege', 'en'),
(209, 'msg_info8', 'The content is not reviewed, and can not browse', 'en'),
(210, 'msg_info9', 'No Contents', 'en'),
(211, 'current_time', 'Current time', 'en'),
(212, 'member_home', 'Home', 'en'),
(213, 'member_info', 'User Information', 'en'),
(214, 'member_ask', 'Member Advisory', 'en'),
(215, 'member_fav', 'Favorites', 'en'),
(216, 'member_wel', 'Welcome back!', 'en'),
(217, 'member_grade', 'User level', 'en'),
(218, 'member_last_login', 'Last login time', 'en'),
(219, 'member_last_login_ip', 'Last Login IP', 'en'),
(220, 'member_login_num', 'Login times', 'en'),
(221, 'member_home_title', 'Users statistics', 'en'),
(222, 'member_birth', 'Date of birth', 'en'),
(223, 'member_sex', 'sex', 'en'),
(224, 'member_sex_none', 'secrecy', 'en'),
(225, 'member_sex_man', 'man', 'en'),
(226, 'member_sex_woman', 'woman', 'en'),
(227, 'member_mail', 'E-mail', 'en'),
(228, 'member_js', 'Contact MSN', 'en'),
(229, 'member_tel', 'Telephone', 'en'),
(230, 'member_phone', 'Mobile', 'en'),
(231, 'member_ask_manage', 'Consulting', 'en'),
(232, 'member_ask_add', 'Add contact', 'en'),
(233, 'member_ask_title', 'Consultation Title', 'en'),
(234, 'member_ask_content', 'Advisory Content', 'en'),
(235, 'member_password_old', 'Old Password', 'en'),
(236, 'member_password_new', 'New Password', 'en'),
(237, 'member_password_newt', 'Confirm New Password', 'en'),
(238, 'member_index', 'Home', 'en'),
(239, 'member_out', 'Logout', 'en'),
(240, 'member_login_user', 'Username', 'en'),
(241, 'member_login_pass', 'Password', 'en'),
(242, 'member_login_code', 'Code', 'en'),
(243, 'member_login', 'Login', 'en'),
(244, 'member_regist', 'Register', 'en'),
(245, 'member_reg_nich', 'Nickname', 'en'),
(246, 'member_reg_pass', 'Password', 'en'),
(247, 'member_reg_passt', 'Confirm Password', 'en'),
(248, 'member_reg_mail', 'E-mail', 'en'),
(249, 'member_reg_mail_info', 'Each e-mail mailbox can only register an account', 'en'),
(250, 'member_login_info', 'Account Login', 'en'),
(251, 'member_msg', 'Please login', 'en'),
(252, 'member_msg2', 'Incorrect verification code', 'en'),
(253, 'member_smg3', 'User name or password can not be empty', 'en'),
(254, 'member_msg3', 'User name or password is incorrect', 'en'),
(255, 'member_msg4', 'Login fails, the account is locked', 'en'),
(256, 'member_msg5', 'Member registration has been suspended', 'en'),
(257, 'member_msg6', 'User name can only be alphanumeric, length of 4 or more', 'en'),
(258, 'member_msg7', 'Nickname only alphanumeric, length of 4 or more', 'en'),
(259, 'member_msg8', 'Password can not be empty', 'en'),
(260, 'member_msg9', 'Not the same password twice', 'en'),
(261, 'member_msg10', 'E-mail is not correct', 'en'),
(262, 'member_msg11', 'The user name can not be registered', 'en'),
(263, 'member_msg12', 'The same user name already exists, replace the user name', 'en'),
(264, 'member_msg13', 'The mailbox is already in use, replace', 'en'),
(265, 'member_msg14', 'User registration is successful', 'en'),
(266, 'member_msg15', 'QQ号码不正确', 'cn'),
(267, 'member_msg16', '手机必须为数字', 'cn'),
(268, 'member_msg17', '请从表单提交', 'cn'),
(269, 'member_msg18', '修改成功', 'cn'),
(270, 'member_msg15', 'QQ number is not correct', 'en'),
(271, 'member_msg16', 'Phone number must be', 'en'),
(272, 'member_msg17', 'From the form submission', 'en'),
(273, 'member_msg18', 'Successfully modified', 'en'),
(274, 'msg_info10', '参数传递错误,请重新操作', 'cn'),
(275, 'msg_info10', 'Parameter error, please try again', 'en'),
(276, 'member_msg19', '标题或内容不能为空', 'cn'),
(277, 'member_msg20', '咨询添加成功', 'cn'),
(278, 'member_msg21', '不存在该咨询', 'cn'),
(279, 'member_msg22', '咨询已经处理,请重新添加', 'cn'),
(280, 'member_msg23', '内容不能为空', 'cn'),
(281, 'member_msg24', '咨询修改成功', 'cn'),
(282, 'member_msg25', '删除成功', 'cn'),
(283, 'member_msg26', '原始密码不正确', 'cn'),
(284, 'member_msg27', '已经退出', 'cn'),
(285, 'member_msg28', '用户中心', 'cn'),
(286, 'member_msg29', '用户登录', 'cn'),
(287, 'member_msg30', '用户注册', 'cn'),
(288, 'member_msg31', '注册会员', 'cn'),
(289, 'member_msg19', 'The title or content can not be empty', 'en'),
(290, 'member_msg20', 'Consulting added successfully', 'en'),
(291, 'member_msg21', 'The consultation does not exist', 'en'),
(292, 'member_msg22', 'Consultation has been processed, please re-add', 'en'),
(293, 'member_msg23', 'Content can not be empty', 'en'),
(294, 'member_msg24', 'Consulting successfully modified', 'en'),
(295, 'member_msg25', 'Deleted successfully', 'en'),
(296, 'member_msg26', 'The original password is incorrect', 'en'),
(297, 'member_msg27', 'Has withdrawn', 'en'),
(298, 'member_msg28', 'User Center', 'en'),
(299, 'member_msg29', 'User Login', 'en'),
(300, 'member_msg30', 'Register', 'en'),
(301, 'member_msg31', 'Register', 'en'),
(302, 'member_msg32', '咨询总数', 'cn'),
(303, 'member_msg33', '参数说明', 'cn'),
(304, 'member_msg34', '内容', 'cn'),
(305, 'member_msg35', '说明', 'cn'),
(306, 'member_msg36', '标题', 'cn'),
(307, 'member_msg37', '添加时间', 'cn'),
(308, 'member_msg38', '状态', 'cn'),
(309, 'member_msg39', '操作', 'cn'),
(310, 'member_msg40', '未回复', 'cn'),
(311, 'member_msg41', '已回复', 'cn'),
(312, 'member_msg42', '咨询时间', 'cn'),
(313, 'member_msg43', '回复', 'cn'),
(314, 'member_msg44', '修改', 'cn'),
(315, 'member_msg45', '查看', 'cn'),
(316, 'member_msg46', '删除', 'cn'),
(317, 'member_msg47', '确定', 'cn'),
(318, 'member_msg48', '重置', 'cn'),
(319, 'member_msg49', '已经注册！立即登录', 'cn'),
(320, 'member_msg50', '注册会员您可以：', 'cn'),
(321, 'member_msg51', '1. 保存您的个人资料', 'cn'),
(322, 'member_msg52', '2. 收藏您关注的商品', 'cn'),
(323, 'member_msg53', '3. 及时跟踪反馈信息', 'cn'),
(324, 'member_msg32', 'Advisory number', 'en'),
(325, 'member_msg33', 'Parameter Description', 'en'),
(326, 'member_msg34', 'Content', 'en'),
(327, 'member_msg35', 'Help', 'en'),
(328, 'member_msg36', 'Title', 'en'),
(329, 'member_msg37', 'Added Time', 'en'),
(330, 'member_msg38', 'Status', 'en'),
(331, 'member_msg39', 'Operation', 'en'),
(332, 'member_msg40', 'Did not respond', 'en'),
(333, 'member_msg41', 'Has returned', 'en'),
(334, 'member_msg42', 'Ask Time', 'en'),
(335, 'member_msg43', 'Reply', 'en'),
(336, 'member_msg44', 'Modify', 'en'),
(337, 'member_msg45', 'View', 'en'),
(338, 'member_msg46', 'Delete', 'en'),
(339, 'member_msg47', 'OK', 'en'),
(340, 'member_msg48', 'Reset', 'en'),
(341, 'member_msg49', 'Has been registered! Sign in now', 'en'),
(342, 'member_msg50', 'Registered member you can:', 'en'),
(343, 'member_msg51', '1. to save your personal data', 'en'),
(344, 'member_msg52', '2. collection for your interest in the goods', 'en'),
(345, 'member_msg53', '3. timely feedback tracking', 'en'),
(346, 'member_msg54', '修改密码', 'cn'),
(347, 'member_msg54', 'Change Password', 'en'),
(348, 'book', '留言本', 'cn'),
(349, 'book', 'Guestbook', 'en'),
(350, 'book_msg1', '留言本不能使用', 'cn'),
(351, 'book_msg2', '留言标题不能为空', 'cn'),
(352, 'book_msg3', '留言内容不能为空', 'cn'),
(353, 'book_msg4', '添加成功', 'cn'),
(354, 'book_msg1', 'Message this can not be used', 'en'),
(355, 'book_msg2', 'Message title can not be empty', 'en'),
(356, 'book_msg3', 'Content can not be empty', 'en'),
(357, 'book_msg4', 'Successfully added', 'en'),
(358, 'book_msg5', 'Message name', 'en'),
(359, 'book_msg6', 'Message Title', 'en'),
(360, 'book_msg7', 'Message', 'en'),
(361, 'book_msg5', '留言名', 'cn'),
(362, 'book_msg6', '留言标题', 'cn'),
(363, 'book_msg7', '留言内容', 'cn');","lang_lang_data");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."keywords`;","");
$data[]=array("CREATE TABLE `".DB_PRE."keywords` (
  `id` mediumint(8) NOT NULL auto_increment,
  `keywords` varchar(60) character set utf8 NOT NULL,
  `wordsurl` varchar(60) character set utf8 NOT NULL,
  `lang` varchar(60) character set ucs2 NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","keywords");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."flash_ad`;","");
$data[]=array("CREATE TABLE `".DB_PRE."flash_ad` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `pic` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `pic_url` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `pic_text` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `pic_order` mediumint(8) NOT NULL DEFAULT '10',
  `lang` varchar(60) NOT NULL,
  `cate_id` mediumint(8) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","flash_ad");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."flash_info`;","");
$data[]=array("CREATE TABLE `".DB_PRE."flash_info` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `flash_width` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `flash_height` varchar(60) CHARACTER SET utf8 DEFAULT NULL,
  `flash_style` mediumint(8) NOT NULL,
  `lang` varchar(60) CHARACTER SET utf8 NOT NULL,
  `cate_id` mediumint(8) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","flash_info");


$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."book`;","");
$data[]=array("CREATE TABLE `".DB_PRE."book` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `book_name` varchar(60) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `book_type` mediumint(8) NOT NULL DEFAULT '0' COMMENT '0-留言,1-投诉,2-询问,3-售后',
  `pr_id` mediumint(8) DEFAULT NULL COMMENT '产品',
  `book_title` varchar(60) NOT NULL,
  `book_content` text NOT NULL,
  `addtime` varchar(60) NOT NULL,
  `reply` text,
  `verify` mediumint(8) NOT NULL DEFAULT '0',
  `lang` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","book");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."book_info`;","");
$data[]=array("CREATE TABLE `".DB_PRE."book_info` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `is_book` varchar(60) DEFAULT NULL,
  `book_pos` varchar(60) DEFAULT NULL,
  `book_verify` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","book_info");
$data[]=array("INSERT INTO `".DB_PRE."book_info` (`id`, `is_book`, `book_pos`, `book_verify`) VALUES
(1, '1', '2', '0');","book_info_data");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."uppics`;","");
$data[]=array("CREATE TABLE `".DB_PRE."uppics` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `pic_name` varchar(60) NOT NULL COMMENT '图片名称',
  `pic_url` varchar(255) DEFAULT NULL COMMENT '外部链接',
  `pic_ext` varchar(60) NOT NULL COMMENT '图片后缀',
  `pic_alt` varchar(255) DEFAULT NULL COMMENT '图片alt',
  `pic_size` varchar(60) DEFAULT NULL,
  `pic_path` varchar(60) DEFAULT NULL COMMENT '图片路径',
  `pic_time` varchar(60) DEFAULT NULL COMMENT '图片上传修改时间',
  `pic_thumb` varchar(60) DEFAULT NULL COMMENT '缩略图',
  `pic_cate` mediumint(8) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","uppics");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."webjob`;","");
$data[]=array("CREATE TABLE `".DB_PRE."webjob` (
  `id` mediumint(8) NOT NULL,
  `jobname` varchar(255) DEFAULT NULL,
  `jobsex` varchar(255) DEFAULT NULL,
  `jobmoth` varchar(255) DEFAULT NULL,
  `jobjg` varchar(255) DEFAULT NULL,
  `jobxl` varchar(255) DEFAULT NULL,
  `jobzy` varchar(255) DEFAULT NULL,
  `jobbyyx` varchar(255) DEFAULT NULL,
  `jobphone` varchar(255) DEFAULT NULL,
  `jobmail` varchar(255) DEFAULT NULL,
  `jobhj` varchar(255) DEFAULT NULL,
  `jobgzjl` varchar(255) DEFAULT NULL,
  `jobzyjn` varchar(255) DEFAULT NULL,
  `jobyyah` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;","webjob");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."upfiles`;","");
$data[]=array("CREATE TABLE `".DB_PRE."upfiles` (
`id` MEDIUMINT( 8 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`file_info` VARCHAR( 255 ) NULL ,
`file_ext` VARCHAR( 255 ) NULL ,
`file_size` MEDIUMINT( 8 ) NULL DEFAULT '0',
`file_path` VARCHAR( 255 ) NULL ,
`file_time` VARCHAR( 255 ) NULL ,
`hits` MEDIUMINT( 8 ) NOT NULL DEFAULT '0'
) ENGINE = MYISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;","upfiles");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."uppic_cate`;","");
$data[]=array("CREATE TABLE `".DB_PRE."uppic_cate` (
`id` MEDIUMINT( 8 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`cate_name` VARCHAR( 255 ) NOT NULL
) ENGINE = MYISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;","uppic_cate");
$data[]=array("INSERT INTO `".DB_PRE."uppic_cate` (`id`, `cate_name`) VALUES
(1, '产品图片'),
(2, '下载图片'),
(3, '其它图片');
","");

$data[]=array("DROP TABLE IF EXISTS `".DB_PRE."flash_ad_cate`;","");
$data[]=array("CREATE TABLE `".DB_PRE."flash_ad_cate` (
`id` MEDIUMINT( 8 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`cate_name` VARCHAR( 60 ) NOT NULL ,
`cate_tpl_id` MEDIUMINT( 8 ) NULL DEFAULT '0',
`is_disable` MEDIUMINT( 8 ) NULL DEFAULT '0'
) ENGINE = MYISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;","flash_ad_cate");
$data[]=array("INSERT INTO `".DB_PRE."flash_ad_cate` (`id` ,`cate_name` ,`cate_tpl_id` ,`is_disable`)VALUES (NULL , '默认', '0', '1');","");
?>
