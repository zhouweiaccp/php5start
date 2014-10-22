/******************************/ 
/*    表名：chatter_users     */
/*    说明：用户信息表        */
/******************************/
CREATE TABLE `chatter_users`
(
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `username` VARCHAR(50) NOT NULL,
  `ip` VARCHAR(50) NOT NULL,
  `password` VARCHAR(20) NOT NULL,
  `isadmin` TINYINT(1) NOT NULL default 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) TYPE=MyISAM;

/* 导出表chatter_users中的数据 */
INSERT INTO chatter_users (id, time, username, ip, password, isadmin) 
	VALUES (1, '2006-12-03 00:00:00', 'admin', '0.0.0.0', 'admin', 1);

/*********************************/ 
/*    表名：chatter_chatboard	 */
/*    说明：公共聊天记录表	     */
/*********************************/
CREATE TABLE `chatter_chatboard`
(
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `username` VARCHAR(50) NOT NULL,
  `message` TEXT NOT NULL,
  PRIMARY KEY (`id`)
) TYPE=MyISAM;

/*********************************/ 
/*    表名：chatter_privboard    */
/*    说明：公共聊天记录表       */
/*********************************/
CREATE TABLE `chatter_privboard` 
(
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `time` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fromname` VARCHAR(50) NOT NULL,
  `toname` VARCHAR(50) NOT NULL,
  `message` TEXT NOT NULL,
  `delfrom` INT(10) NOT NULL DEFAULT 0,
  `delto` INT(10) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) TYPE=MyISAM;
