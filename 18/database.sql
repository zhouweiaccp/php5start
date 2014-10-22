/**************************/ 
/*    表名：guestbook     */
/*    说明：留言记录表    */
/**************************/
CREATE TABLE `guestbook` (
  `id` bigint(20) unsigned NOT NULL auto_increment,
  `hide` tinyint(1) NOT NULL default '0',
  `name` varchar(16) NOT NULL default '',
  `gender` tinyint(1) NOT NULL default '1',
  `email` varchar(64) NOT NULL default '',
  `homepage` varchar(64) NOT NULL default '',
  `oicq` varchar(16) NOT NULL default '',
  `face` tinyint(2) NOT NULL default '0',
  `ip` varchar(12) NOT NULL default '',
  `time` datetime NOT NULL default '0000-00-00 00:00:00',
  `content` text NOT NULL,
  `revort` text NOT NULL,
  `retime` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
);


/******************************/ 
/*    表名：styles            */
/*    说明：页面风格样式表    */
/******************************/
CREATE TABLE `styles` (
  `id` tinyint(4) NOT NULL auto_increment,
  `css` varchar(32) NOT NULL default '',
  `name` varchar(20) NOT NULL default '',
  `author` varchar(32) NOT NULL default '',
  `description` tinytext NOT NULL,
  PRIMARY KEY  (`id`)
) ;

/****************************/ 
/*    表styles的默认数据    */
/****************************/
INSERT INTO `styles` (`id`, `css`, `name`, `author`, `description`) VALUES 
(1, 'Skin/XPower/Pink/style.css', 'XPower 系列 粉色', '', ''),
(2, 'Skin/XPower/Green/style.css', 'XPower 系列 绿色', '', ''),
(3, 'Skin/iJun/Dream/style.css', 'Dream', '', ''),
(4, 'Skin/iJun/Vein/style.css', 'Vein', '', ''),
(5, 'Skin/iJun/Grille/style.css', 'Grille', '', ''),
(6, 'Skin/iJun/Concise/style.css', 'Concise', '', ''),
(7, 'Skin/Orange/style.css', '橘子熟了', '', ''),
(8, 'Skin/XPower/Blue/style.css', 'XPower 系列 蓝色', '', ''),
(9, 'Skin/Dragon/style.css', '飞龙在天', '', ''),
(10, 'Skin/RealPlayer/style.css', 'Real Player', '', ''),
(11, 'Skin/iJun/Lattice/style.css', 'Lattice', '', ''),
(12, 'Skin/iJun/Violet/style.css', 'Violet', '', ''),
(13, 'Skin/Sky/style.css', '碧海云天', '', ''),
(14, 'Skin/iJun/Fashion/style.css', 'Fashion', '', ''),
(15, 'Skin/Silver/style.css', '银白世界', '', ''),
(16, 'Skin/XPower/Orange/style.css', 'XPower 系列 橘色', '', ''),
(17, 'Skin/iJun/Fleck/style.css', 'Fleck', '', ''),
(18, 'Skin/iJun/Ambiance/style.css', 'Ambiance', '', ''),
(19, 'Skin/Gery/style.css', '黑色金属', '', ''),
(20, 'Skin/SilverXP/style.css', 'Windows XP 银色', '', ''),
(21, 'Skin/iJun/Colorful/style.css', 'Colorful', '', '');

