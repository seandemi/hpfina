#
# TABLE STRUCTURE FOR: ci_sessions
#

DROP TABLE IF EXISTS ci_sessions;

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL default '0',
  `ip_address` varchar(16) NOT NULL default '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL default '0',
  `user_data` text NOT NULL,
  PRIMARY KEY  (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

INSERT INTO ci_sessions (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES ('9c6500d67c4e5e029d95f091a2704282', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.2 (KHTML, like Gecko) Chrome/15.0.874.121 Safari/535.2', 1333606303, 'a:4:{s:9:\"user_data\";s:0:\"\";s:4:\"name\";s:6:\"王燕军\";s:15:\"yuangongbianhao\";s:6:\"105231\";s:5:\"jibie\";s:8:\"财务总监\";}');


#
# TABLE STRUCTURE FOR: tb_baoxiaodan
#

DROP TABLE IF EXISTS tb_baoxiaodan;

CREATE TABLE `tb_baoxiaodan` (
  `baoxiaobianhao` int(11) NOT NULL auto_increment,
  `tijiaoshijian` datetime NOT NULL,
  `feiyongbianhao` varchar(20) default NULL,
  `baoxiaoleixing` char(1) NOT NULL,
  `leibie` char(1) NOT NULL,
  `yuangongbianhao` varchar(20) NOT NULL,
  `yuangongleibie` varchar(20) NOT NULL,
  `fukuanfangshi` varchar(10) NOT NULL,
  `fudanbumen` varchar(20) NOT NULL,
  `zongjine` varchar(20) default NULL,
  `kehubianhao` varchar(20) default NULL,
  `xiangmubianhao` varchar(20) default NULL,
  `danjushumu` tinyint(4) default NULL,
  `lujingbianhao` int(11) NOT NULL,
  `beizhu` text,
  PRIMARY KEY  (`baoxiaobianhao`),
  KEY `feiyongbianhao` (`feiyongbianhao`),
  KEY `yuangongbianhao` (`yuangongbianhao`),
  KEY `kehubianhao` (`kehubianhao`),
  KEY `xiangmubianhao` (`xiangmubianhao`),
  KEY `lujingbianhao` (`lujingbianhao`)
) ENGINE=MyISAM AUTO_INCREMENT=121 DEFAULT CHARSET=gbk;

INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (82, '2012-03-20 18:15:51', '无预算科目', '2', '1', '105232', '普通员工', '现金', '', '58.41', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (81, '2012-03-20 18:14:26', '无预算科目', '2', '1', '105232', '普通员工', '现金', '', '12.56', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (80, '2012-03-20 18:11:29', '无预算科目', '2', '1', '105232', '普通员工', '现金', '', '226.82', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (79, '2012-03-20 18:08:22', '无预算科目', '2', '1', '105232', '普通员工', '现金', '', '182.86', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (77, '2012-03-19 18:23:38', '无预算科目', '0', '1', '105232', '普通员工', '现金', '', '', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (78, '2012-03-19 18:23:43', '无预算科目', '0', '1', '105232', '普通员工', '现金', '', '', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (76, '2012-03-19 18:22:26', '无预算科目', '0', '1', '105232', '普通员工', '现金', '', '', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (75, '2012-03-19 18:09:04', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '12', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (74, '2012-03-19 18:07:40', '无预算科目', '0', '1', '105232', '普通员工', '现金', '', '', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (73, '2012-03-19 16:10:45', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '13', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (71, '2012-03-19 16:00:13', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '3', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (72, '2012-03-19 16:06:19', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '15', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (70, '2012-03-19 15:19:30', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '24', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (69, '2012-03-19 15:03:18', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (68, '2012-03-19 15:01:02', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '18', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (67, '2012-03-19 15:00:22', '无预算科目', '0', '1', '105232', '普通员工', '现金', '', '17', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (66, '2012-03-19 14:44:48', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '1', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (65, '2012-03-19 14:36:56', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '1', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (64, '2012-03-19 14:34:29', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '1', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (63, '2012-03-19 14:30:19', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '1', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (62, '2012-03-19 14:00:44', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '1', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (61, '2012-03-19 13:58:43', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '1', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (60, '2012-03-19 13:58:22', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '1', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (59, '2012-03-19 13:38:42', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '15', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (58, '2012-03-19 13:36:03', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '15', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (57, '2012-03-19 13:35:33', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '15', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (56, '2012-03-19 13:34:28', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '15', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (83, '2012-03-20 18:17:17', '无预算科目', '2', '1', '105232', '普通员工', '现金', '', '25.12', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (84, '2012-03-20 18:19:38', '无预算科目', '2', '1', '105232', '普通员工', '现金', '', '31.40', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (85, '2012-03-20 18:21:31', '无预算科目', '2', '1', '105232', '普通员工', '现金', '', '26.20', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (86, '2012-03-20 18:22:35', '无预算科目', '2', '1', '105232', '普通员工', '现金', '', '25.12', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (87, '2012-03-20 20:34:16', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '25.12', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (88, '2012-03-20 20:35:05', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '50.24', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (89, '2012-03-20 21:39:30', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '6.28', NULL, NULL, NULL, 11, '今日提交报销单');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (90, '2012-03-20 21:41:23', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '12.56', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (91, '2012-03-20 21:43:59', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '213.52', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (92, '2012-03-20 21:44:38', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '6.28', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (93, '2012-03-20 21:56:56', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '87.92', NULL, NULL, NULL, 11, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (94, '2012-03-21 13:38:48', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '75.36', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (95, '2012-03-21 13:40:21', '无预算科目', '2', '1', '105232', '普通员工', '现金', '', '12.56', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (96, '2012-03-21 13:43:07', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '1526.04', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (97, '2012-03-21 13:44:32', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '26.20', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (98, '2012-03-21 15:11:45', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '64.06', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (99, '2012-03-22 17:12:42', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '25.12', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (100, '2012-03-22 17:16:57', '无预算科目', '2', '1', '105232', '普通员工', '现金', '', '75.36', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (101, '2012-03-22 18:18:13', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '18.84', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (102, '2012-03-23 13:58:36', '无预算科目', '3', '1', '105232', '普通员工', '现金', '', 'NaN', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (103, '2012-03-23 13:59:59', '无预算科目', '3', '1', '105232', '普通员工', '现金', '', '94.20', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (104, '2012-03-23 14:00:53', '无预算科目', '3', '1', '105232', '普通员工', '现金', '', '52.40', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (105, '2012-03-23 14:21:39', '无预算科目', '3', '1', '105232', '普通员工', '现金', '', '58.68', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (106, '2012-03-23 14:24:16', '无预算科目', '3', '1', '105232', '普通员工', '现金', '', '28046.48', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (107, '2012-03-23 15:20:13', '无预算科目', '4', '1', '105232', '普通员工', '现金', '', '50.24', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (108, '2012-03-23 15:21:08', '无预算科目', '4', '1', '105232', '普通员工', '现金', '', '157.20', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (109, '2012-03-23 15:54:40', '无预算科目', '5', '1', '105232', '普通员工', '现金', '', '104.80', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (110, '2012-03-23 15:55:21', '无预算科目', '5', '1', '105232', '普通员工', '现金', '', '25.12', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (111, '2012-03-23 16:31:35', '无预算科目', '6', '1', '105232', '普通员工', '现金', '', '26.20', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (112, '2012-03-23 16:32:26', '无预算科目', '6', '1', '105232', '普通员工', '现金', '', '12.56', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (113, '2012-03-28 19:32:48', '无预算科目', '2', '1', '105232', '普通员工', '现金', '', '288.88', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (114, '2012-03-28 19:37:15', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '12.56', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (115, '2012-03-28 19:38:22', '无预算科目', '2', '1', '105232', '普通员工', '现金', '', '6.28', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (116, '2012-03-28 21:08:15', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '12.56', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (117, '2012-03-28 21:54:35', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '12.56', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (118, '2012-04-02 14:13:37', '无预算科目', '1', '1', '105232', '普通员工', '现金', '', '144.44', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (119, '2012-04-05 12:41:26', '无预算科目', '1', '1', '105231', '财务总监', '现金', '', '37.68', NULL, NULL, NULL, 1, '');
INSERT INTO tb_baoxiaodan (`baoxiaobianhao`, `tijiaoshijian`, `feiyongbianhao`, `baoxiaoleixing`, `leibie`, `yuangongbianhao`, `yuangongleibie`, `fukuanfangshi`, `fudanbumen`, `zongjine`, `kehubianhao`, `xiangmubianhao`, `danjushumu`, `lujingbianhao`, `beizhu`) VALUES (120, '2012-04-05 12:45:47', '无预算科目', '1', '1', '105231', '财务总监', '现金', '', '3.00', NULL, NULL, NULL, 1, '');


#
# TABLE STRUCTURE FOR: tb_baoxiaolujing
#

DROP TABLE IF EXISTS tb_baoxiaolujing;

CREATE TABLE `tb_baoxiaolujing` (
  `lujingbianhao` int(11) NOT NULL auto_increment,
  `yuangongbianhao` varchar(20) NOT NULL,
  `jinexiaxian` varchar(50) default NULL,
  `shenpiren1` varchar(50) default NULL,
  `shenpiren2` varchar(20) default NULL,
  `shenpiren3` varchar(20) default NULL,
  `shenpiren4` varchar(20) default NULL,
  `shenpiren5` varchar(20) default NULL,
  `shenpiren6` varchar(20) default NULL,
  `jineshangxian` varchar(20) default NULL,
  PRIMARY KEY  (`lujingbianhao`),
  KEY `yuangongbianhao` (`yuangongbianhao`),
  KEY `shenpiren2` (`shenpiren2`),
  KEY `shenpiren3` (`shenpiren3`),
  KEY `shenpiren4` (`shenpiren4`),
  KEY `shenpiren5` (`shenpiren5`),
  KEY `shenpiren6` (`shenpiren6`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

INSERT INTO tb_baoxiaolujing (`lujingbianhao`, `yuangongbianhao`, `jinexiaxian`, `shenpiren1`, `shenpiren2`, `shenpiren3`, `shenpiren4`, `shenpiren5`, `shenpiren6`, `jineshangxian`) VALUES (1, '105232', '1', '105231', '105233', NULL, NULL, NULL, NULL, '1000');


#
# TABLE STRUCTURE FOR: tb_baoxiaozhuangtai
#

DROP TABLE IF EXISTS tb_baoxiaozhuangtai;

CREATE TABLE `tb_baoxiaozhuangtai` (
  `id` int(11) NOT NULL auto_increment,
  `baoxiaobianhao` int(11) NOT NULL,
  `tijiaoshijian` datetime NOT NULL,
  `lujingbianhao` int(11) NOT NULL,
  `shenpiren` varchar(10) NOT NULL,
  `passdate` datetime default NULL,
  `yijian` char(1) default NULL,
  `pinglun` text,
  `bohuicishu` smallint(6) default NULL,
  `shenpizhuangtai` char(1) default NULL,
  `tijiaoren` varchar(20) NOT NULL,
  `yishenpi` char(1) NOT NULL,
  `weishenpi` char(1) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `baoxiaobianhao` (`baoxiaobianhao`),
  KEY `lujingbianhao` (`lujingbianhao`),
  KEY `yishenpi` (`yishenpi`,`weishenpi`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=gbk;

INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (2, 93, '2012-03-20 21:56:56', 11, '105231', NULL, NULL, NULL, NULL, '0', '105232', '', '');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (3, 94, '2012-03-21 13:38:48', 94, '105231', NULL, NULL, NULL, 0, '0', '105232', '', '');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (4, 95, '2012-03-21 13:40:21', 95, '1', NULL, NULL, NULL, 0, '0', '105232', '', '');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (5, 97, '2012-03-21 13:44:32', 1, '105231', NULL, NULL, NULL, 0, '0', '105232', '', '');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (6, 98, '2012-03-21 15:11:45', 1, '105231', NULL, NULL, NULL, 0, '0', '105232', '', '');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (7, 99, '2012-03-22 17:12:42', 1, '105231', NULL, NULL, NULL, 0, '0', '105232', '', '');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (8, 100, '2012-03-22 17:16:57', 1, '105231', NULL, NULL, NULL, 0, '0', '105232', '', '');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (9, 101, '2012-03-22 18:18:13', 1, '105231', NULL, NULL, NULL, 0, '0', '105232', '', '');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (10, 102, '2012-03-23 13:58:36', 1, '105231', NULL, NULL, NULL, 0, '0', '105232', '', '');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (11, 103, '2012-03-23 13:59:59', 1, '105231', NULL, NULL, NULL, 0, '0', '105232', '', '');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (12, 104, '2012-03-23 14:00:53', 1, '105231', NULL, NULL, NULL, 0, '0', '105232', '', '');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (13, 105, '2012-03-23 14:21:39', 1, '105231', NULL, NULL, NULL, 0, '0', '105232', '', '');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (14, 106, '2012-03-23 14:24:16', 1, '105231', NULL, NULL, NULL, 0, '0', '105232', '', '');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (15, 107, '2012-03-23 15:20:13', 1, '105231', NULL, NULL, NULL, 0, '0', '105232', '', '');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (16, 108, '2012-03-23 15:21:08', 1, '105231', NULL, NULL, NULL, 0, '0', '105232', '', '');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (17, 109, '2012-03-23 15:54:40', 1, '105231', NULL, NULL, NULL, 0, '0', '105232', '', '');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (18, 110, '2012-03-23 15:55:21', 1, '105231', NULL, NULL, NULL, 0, '0', '105232', '', '');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (19, 111, '2012-03-23 16:31:35', 1, '105231', NULL, NULL, NULL, 0, '0', '105232', '', '');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (20, 112, '2012-03-23 16:32:26', 1, '105231', NULL, NULL, NULL, 0, '0', '105232', '', '');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (21, 113, '2012-03-28 19:32:48', 1, '105231', NULL, NULL, NULL, 0, '0', '105232', '', '');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (22, 115, '2012-03-28 19:38:22', 1, '105231', NULL, NULL, NULL, 0, '0', '105232', '0', '2');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (23, 116, '2012-03-28 21:08:15', 1, '105231', NULL, NULL, NULL, 0, '0', '105232', '0', '2');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (24, 117, '2012-03-28 21:54:35', 1, '105231', '2012-03-31 14:28:04', '1', '不错', 0, '1', '105232', '1', '1');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (25, 117, '2012-03-28 21:54:35', 1, '105233', '2012-04-17 00:00:00', '1', '', 0, '1', '105232', '2', '0');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (26, 118, '2012-04-02 14:13:37', 1, '105231', NULL, NULL, NULL, 0, '0', '105232', '0', '2');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (27, 119, '2012-04-05 12:41:26', 1, '105231', NULL, NULL, NULL, 0, '0', '105231', '0', '2');
INSERT INTO tb_baoxiaozhuangtai (`id`, `baoxiaobianhao`, `tijiaoshijian`, `lujingbianhao`, `shenpiren`, `passdate`, `yijian`, `pinglun`, `bohuicishu`, `shenpizhuangtai`, `tijiaoren`, `yishenpi`, `weishenpi`) VALUES (28, 120, '2012-04-05 12:45:47', 1, '105231', NULL, NULL, NULL, 0, '0', '105231', '0', '2');


#
# TABLE STRUCTURE FOR: tb_bizhong
#

DROP TABLE IF EXISTS tb_bizhong;

CREATE TABLE `tb_bizhong` (
  `id` int(11) NOT NULL auto_increment,
  `Name` varchar(10) NOT NULL,
  `huilv` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gbk;

INSERT INTO tb_bizhong (`id`, `Name`, `huilv`) VALUES (1, '美元', '6.28');
INSERT INTO tb_bizhong (`id`, `Name`, `huilv`) VALUES (2, '欧元', '13.1');


#
# TABLE STRUCTURE FOR: tb_bumen
#

DROP TABLE IF EXISTS tb_bumen;

CREATE TABLE `tb_bumen` (
  `bumenbianhao` varchar(20) NOT NULL,
  `bumenming` varchar(50) NOT NULL,
  `leibie` varchar(20) NOT NULL,
  `feiyongshuxing` varchar(20) NOT NULL,
  `zhuangtai` char(1) NOT NULL,
  PRIMARY KEY  (`bumenbianhao`),
  FULLTEXT KEY `bumenbianhao` (`bumenbianhao`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

INSERT INTO tb_bumen (`bumenbianhao`, `bumenming`, `leibie`, `feiyongshuxing`, `zhuangtai`) VALUES ('001', '财务部', '财务', '财务', '1');
INSERT INTO tb_bumen (`bumenbianhao`, `bumenming`, `leibie`, `feiyongshuxing`, `zhuangtai`) VALUES ('004', '研发部', '研发', '研发', '1');
INSERT INTO tb_bumen (`bumenbianhao`, `bumenming`, `leibie`, `feiyongshuxing`, `zhuangtai`) VALUES ('000003', '人力资源部', '人力', '人力', '1');


#
# TABLE STRUCTURE FOR: tb_bumenlujing
#

DROP TABLE IF EXISTS tb_bumenlujing;

CREATE TABLE `tb_bumenlujing` (
  `lujingbianhao` int(11) NOT NULL auto_increment,
  `bumenbianhao` varchar(20) NOT NULL,
  `jinexiaxian` varchar(50) default NULL,
  `shenpiren1` varchar(50) default NULL,
  `shenpiren2` varchar(20) default NULL,
  `shenpiren3` varchar(20) default NULL,
  `shenpiren4` varchar(20) default NULL,
  `shenpiren5` varchar(20) default NULL,
  `shenpiren6` varchar(20) default NULL,
  `jineshangxian` varchar(20) default NULL,
  PRIMARY KEY  (`lujingbianhao`),
  KEY `bumenbianhao` (`bumenbianhao`),
  KEY `shenpiren2` (`shenpiren2`),
  KEY `shenpiren3` (`shenpiren3`),
  KEY `shenpiren4` (`shenpiren4`),
  KEY `shenpiren5` (`shenpiren5`),
  KEY `shenpiren6` (`shenpiren6`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=gbk;

INSERT INTO tb_bumenlujing (`lujingbianhao`, `bumenbianhao`, `jinexiaxian`, `shenpiren1`, `shenpiren2`, `shenpiren3`, `shenpiren4`, `shenpiren5`, `shenpiren6`, `jineshangxian`) VALUES (4, '001', '0.00', '13415256', '', '', '0', '0', '0', '11111');


#
# TABLE STRUCTURE FOR: tb_chailcbutie
#

DROP TABLE IF EXISTS tb_chailcbutie;

CREATE TABLE `tb_chailcbutie` (
  `id` int(11) NOT NULL auto_increment,
  `jibie` varchar(20) NOT NULL,
  `jine1` varchar(20) NOT NULL,
  `jine2` varchar(20) NOT NULL,
  `jine3` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `jine1` (`jine1`,`jine2`,`jine3`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

INSERT INTO tb_chailcbutie (`id`, `jibie`, `jine1`, `jine2`, `jine3`) VALUES (1, '普通员工', '100', '200', '300');


#
# TABLE STRUCTURE FOR: tb_chailv
#

DROP TABLE IF EXISTS tb_chailv;

CREATE TABLE `tb_chailv` (
  `id` int(11) NOT NULL auto_increment,
  `baoxiaobianhao` int(11) NOT NULL,
  `bizhong` varchar(10) NOT NULL,
  `huilv` varchar(10) NOT NULL,
  `jine` varchar(20) NOT NULL,
  `didian` tinyint(4) NOT NULL,
  `qishishijian` datetime NOT NULL,
  `jieshushijian` datetime NOT NULL,
  `tianshu` decimal(3,1) NOT NULL,
  `feiyongleixing` varchar(30) NOT NULL,
  `danjushumu` tinyint(4) default NULL,
  `kehubianhao` decimal(18,0) default NULL,
  `receipt` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `baoxiaobianhao` (`baoxiaobianhao`),
  KEY `kehubianhao` (`kehubianhao`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=gbk;

INSERT INTO tb_chailv (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `didian`, `qishishijian`, `jieshushijian`, `tianshu`, `feiyongleixing`, `danjushumu`, `kehubianhao`, `receipt`) VALUES (1, 84, '美元', '6.28', '31.40', 1, '2012-03-06 18:19:00', '2012-03-08 18:19:00', '3.5', '长途交通费', 3, '1', '5');
INSERT INTO tb_chailv (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `didian`, `qishishijian`, `jieshushijian`, `tianshu`, `feiyongleixing`, `danjushumu`, `kehubianhao`, `receipt`) VALUES (2, 85, '欧元', '13.1', '26.20', 2, '2012-02-26 18:21:00', '2012-03-28 18:21:00', '3.5', '长途交通费', 2, '1', '2');
INSERT INTO tb_chailv (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `didian`, `qishishijian`, `jieshushijian`, `tianshu`, `feiyongleixing`, `danjushumu`, `kehubianhao`, `receipt`) VALUES (3, 86, '美元', '6.28', '6.28', 2, '2012-02-27 18:22:00', '2012-03-21 18:22:00', '3.5', '长途交通费', 2, '1', '1');
INSERT INTO tb_chailv (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `didian`, `qishishijian`, `jieshushijian`, `tianshu`, `feiyongleixing`, `danjushumu`, `kehubianhao`, `receipt`) VALUES (4, 86, '美元', '6.28', '6.28', 2, '2012-02-27 18:22:00', '2012-03-21 18:22:00', '3.5', '长途交通费', 2, '1', '1');
INSERT INTO tb_chailv (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `didian`, `qishishijian`, `jieshushijian`, `tianshu`, `feiyongleixing`, `danjushumu`, `kehubianhao`, `receipt`) VALUES (5, 86, '美元', '6.28', '6.28', 2, '2012-02-27 18:22:00', '2012-03-21 18:22:00', '3.5', '长途交通费', 2, '1', '1');
INSERT INTO tb_chailv (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `didian`, `qishishijian`, `jieshushijian`, `tianshu`, `feiyongleixing`, `danjushumu`, `kehubianhao`, `receipt`) VALUES (6, 86, '美元', '6.28', '6.28', 2, '2012-02-27 18:22:00', '2012-03-21 18:22:00', '3.5', '长途交通费', 2, '1', '1');
INSERT INTO tb_chailv (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `didian`, `qishishijian`, `jieshushijian`, `tianshu`, `feiyongleixing`, `danjushumu`, `kehubianhao`, `receipt`) VALUES (7, 95, '美元', '6.28', '12.56', 127, '2012-02-26 13:40:00', '2012-04-05 13:40:00', '3.5', '长途交通费', 45, '0', '2');
INSERT INTO tb_chailv (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `didian`, `qishishijian`, `jieshushijian`, `tianshu`, `feiyongleixing`, `danjushumu`, `kehubianhao`, `receipt`) VALUES (8, 100, '美元', '6.28', '75.36', 14, '2012-03-01 00:00:00', '2012-03-18 00:00:00', '3.5', '长途交通费', 3, '0', '12');
INSERT INTO tb_chailv (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `didian`, `qishishijian`, `jieshushijian`, `tianshu`, `feiyongleixing`, `danjushumu`, `kehubianhao`, `receipt`) VALUES (9, 113, '美元', '6.28', '144.44', 2, '2012-03-13 08:00:00', '2012-03-30 08:00:00', '17.0', '差旅补贴', 3, '10193', '23');
INSERT INTO tb_chailv (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `didian`, `qishishijian`, `jieshushijian`, `tianshu`, `feiyongleixing`, `danjushumu`, `kehubianhao`, `receipt`) VALUES (10, 113, '美元', '6.28', '144.44', 2, '2012-03-13 08:00:00', '2012-03-30 08:00:00', '17.0', '差旅补贴', 3, '10193', '23');
INSERT INTO tb_chailv (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `didian`, `qishishijian`, `jieshushijian`, `tianshu`, `feiyongleixing`, `danjushumu`, `kehubianhao`, `receipt`) VALUES (11, 115, '美元', '6.28', '6.28', 1, '2012-03-13 10:00:00', '2012-03-30 08:00:00', '17.0', '差旅补贴', 1, '10193', '1');


#
# TABLE STRUCTURE FOR: tb_jiaoji
#

DROP TABLE IF EXISTS tb_jiaoji;

CREATE TABLE `tb_jiaoji` (
  `id` int(11) NOT NULL auto_increment,
  `baoxiaobianhao` int(11) NOT NULL,
  `receipt` varchar(20) NOT NULL,
  `bizhong` varchar(10) NOT NULL,
  `huilv` varchar(10) NOT NULL,
  `jine` varchar(20) NOT NULL,
  `shijian` datetime NOT NULL,
  `didian` varchar(200) NOT NULL,
  `danwei` varchar(200) NOT NULL,
  `name` varchar(50) NOT NULL,
  `danjushumu` tinyint(4) default NULL,
  `kehubianhao` decimal(18,0) default NULL,
  PRIMARY KEY  (`id`),
  KEY `baoxiaobianhao` (`baoxiaobianhao`),
  KEY `kehubianhao` (`kehubianhao`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gbk;

INSERT INTO tb_jiaoji (`id`, `baoxiaobianhao`, `receipt`, `bizhong`, `huilv`, `jine`, `shijian`, `didian`, `danwei`, `name`, `danjushumu`, `kehubianhao`) VALUES (1, 106, '2233', '美元', '6.28', 'undefined', '2012-03-16 00:00:00', '3', '3', '3', 3, '0');
INSERT INTO tb_jiaoji (`id`, `baoxiaobianhao`, `receipt`, `bizhong`, `huilv`, `jine`, `shijian`, `didian`, `danwei`, `name`, `danjushumu`, `kehubianhao`) VALUES (2, 106, '2233', '美元', '6.28', 'undefined', '2012-03-17 00:00:00', '3', '3', '3', 3, '0');


#
# TABLE STRUCTURE FOR: tb_jiaotong
#

DROP TABLE IF EXISTS tb_jiaotong;

CREATE TABLE `tb_jiaotong` (
  `id` int(11) NOT NULL auto_increment,
  `baoxiaobianhao` int(11) NOT NULL,
  `bizhong` varchar(10) NOT NULL,
  `huilv` varchar(10) NOT NULL,
  `jine` varchar(20) NOT NULL,
  `feiyongleixing` varchar(20) NOT NULL,
  `shangchedidian` varchar(200) NOT NULL,
  `xiacheshijian` varchar(20) NOT NULL,
  `xiachedidian` varchar(200) NOT NULL,
  `danjushumu` tinyint(4) default NULL,
  `kehubianhao` decimal(18,0) default NULL,
  `receipt` varchar(20) character set gb2312 NOT NULL,
  `shangcheshijian` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `baoxiaobianhao` (`baoxiaobianhao`),
  KEY `kehubianhao` (`kehubianhao`),
  KEY `shangcheshijian` (`shangcheshijian`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=gbk;

INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (18, 62, '美元', '6.28', '12.56', '交通费', '2', '2012-03-29 13:58', '2', 6, '1', '2', '2012-02-26 13:58');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (17, 61, '美元', '6.28', '12.56', '交通费', '2', '2012-03-29 13:58', '2', 6, '1', '2', '2012-02-26 13:58');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (15, 19, '美元', '6.28', '6.28', '交通费', '1', '2012-03-29 10:05', '1', 5, '2', '1', '2012-03-19 10:05');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (16, 20, '美元', '6.28', '6.28', '交通费', '1', '2012-03-29 10:05', '1', 5, '2', '1', '2012-03-19 10:05');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (14, 17, '美元', '6.28', '6.28', '交通费', '1', '2012-03-29 10:05', '1', 5, '2', '1', '2012-03-19 10:05');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (19, 66, '美元', '6.28', '12.56', '交通费', '2', '2012-03-29 13:58', '2', 6, '1', '2', '2012-02-26 13:58');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (20, 68, '美元', '6.28', '50.24', '交通费', '12', '2012-03-21 15:00', '2', 23, '2', '8', '2012-03-13 15:00');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (21, 69, '美元', '6.28', '6.28', '交通费', '1', '2012-03-07 15:03', '1', 6, '2', '1', '2012-03-06 15:03');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (22, 70, '美元', '6.28', '31.40', '交通费', '5', '2012-03-22 15:19', '5', 5, '2', '5', '2012-03-12 15:19');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (23, 71, '美元', '6.28', '18.84', '交通费', '3', '2012-03-08 15:59', '3', 5, '2', '3', '2012-02-27 15:59');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (24, 72, '欧元', '13.1', '26.20', '交通费', '3', '2012-03-29 16:06', '3', 1, '2', '2', '2012-02-27 16:06');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (25, 73, '美元', '6.28', '18.84', '交通费', '3', '2012-03-31 16:10', '3', 3, '1', '3', '2012-03-14 16:10');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (26, 75, '美元', '6.28', '12.56', '交通费', '2', '2012-03-14 18:00', '2', 2, '2', '2', '2012-03-13 18:00');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (27, 87, '美元', '6.28', '25.12', '交通费', '4', '2012-03-29 20:33', '4', 4, '1', '4', '2012-03-04 20:33');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (28, 88, '美元', '6.28', '25.12', '交通费', '4', '2012-03-29 20:33', '4', 4, '1', '4', '2012-03-04 20:33');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (29, 89, '美元', '6.28', '6.28', '交通费', '1', '2012-03-28 21:39', '1', 1, '1', '1', '2012-03-12 21:39');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (30, 92, '美元', '6.28', '6.28', '加班交通费', '1', '2012-04-03 21:44', '1', 1, '1', '1', '2012-03-12 21:44');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (31, 93, '美元', '6.28', '87.92', '交通费', 'l', '2012-03-27 21:56', '17', 9, '1', '14', '2012-02-26 21:56');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (32, 94, '美元', '6.28', '75.36', '交通费', '234', '2012-03-29 13:38', '3', 5, '0', '12', '2012-02-26 13:38');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (33, 97, '欧元', '13.1', '26.20', '交通费', '3', '2012-03-27 13:44', '3', 3, '10193', '2', '2012-02-27 13:44');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (34, 98, '美元', '6.28', '32.03', '交通费', '王庄路', '2012-03-29 15:00', '王庄路', 5, '10193', '5.1', '2012-03-04 15:00');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (35, 98, '美元', '6.28', '32.03', '交通费', '王庄路', '2012-03-29 15:00', '王庄路', 5, '10193', '5.1', '2012-03-04 15:00');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (36, 99, '美元', '6.28', '25.12', '交通费', '224', '2012-03-20 07:45', '3435', 4, '10193', '4', '2012-03-27 00:00');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (37, 101, '美元', '6.28', '18.84', '交通费', '324', '2012-03-20 00:00', '让她', 43, '10193', '3', '2012-03-30 00:00');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (38, 116, '美元', '6.28', '6.28', '交通费', '13', '2012-03-16 00:00', '3', 3, '0', '1', '2012-03-16 00:00');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (39, 116, '美元', '6.28', '6.28', '交通费', '13', '2012-03-16 00:00', '3', 3, '0', '1', '2012-03-16 00:00');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (40, 117, '美元', '6.28', '6.28', '交通费', '1', '2012-03-22 00:00', '1', 1, '0', '1', '2012-03-31 00:00');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (41, 117, '美元', '6.28', '6.28', '交通费', '1', '2012-03-22 00:00', '1', 1, '0', '1', '2012-03-31 00:00');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (42, 118, '美元', '6.28', '144.44', '交通费', '=', '2012-04-19 09:46', 'rr', 3, '0', '23', '2012-04-12 18:14');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (43, 119, '美元', '6.28', '18.84', '加班交通费', '3', '2012-04-11 13:15', '344', 3, '10193', '3', '2012-04-13 11:05');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (44, 119, '美元', '6.28', '18.84', '加班交通费', '3', '2012-04-11 13:15', '344', 3, '10193', '3', '2012-04-13 11:05');
INSERT INTO tb_jiaotong (`id`, `baoxiaobianhao`, `bizhong`, `huilv`, `jine`, `feiyongleixing`, `shangchedidian`, `xiacheshijian`, `xiachedidian`, `danjushumu`, `kehubianhao`, `receipt`, `shangcheshijian`) VALUES (45, 120, '美元', '2012-04-11', '3', '加班交通费', '344', '2012-04-13 11:05', 'iio', 3, '10193', '3', '3');


#
# TABLE STRUCTURE FOR: tb_kehu
#

DROP TABLE IF EXISTS tb_kehu;

CREATE TABLE `tb_kehu` (
  `kehubianhao` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `kaihuyinhang` varchar(200) NOT NULL,
  `zhanghuming` varchar(200) NOT NULL,
  `yinhangzhanghao` varchar(30) default NULL,
  `shuihao` varchar(30) default NULL,
  `dizhi` varchar(200) NOT NULL,
  `dianhua` varchar(100) NOT NULL,
  `chuanzhen` varchar(100) default NULL,
  `lianxiren` varchar(100) NOT NULL,
  PRIMARY KEY  (`kehubianhao`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

INSERT INTO tb_kehu (`kehubianhao`, `name`, `kaihuyinhang`, `zhanghuming`, `yinhangzhanghao`, `shuihao`, `dizhi`, `dianhua`, `chuanzhen`, `lianxiren`) VALUES ('010193', '孙华锐', '北京工商银行', '孙华锐', NULL, NULL, '北京市海淀区北四环西路9号', '01010093894', NULL, '孙华锐');
INSERT INTO tb_kehu (`kehubianhao`, `name`, `kaihuyinhang`, `zhanghuming`, `yinhangzhanghao`, `shuihao`, `dizhi`, `dianhua`, `chuanzhen`, `lianxiren`) VALUES ('0012', '陈肖楠', '工行', '2-=33嚄', '434', '', '', '', '', '');


#
# TABLE STRUCTURE FOR: tb_lipin
#

DROP TABLE IF EXISTS tb_lipin;

CREATE TABLE `tb_lipin` (
  `id` int(11) NOT NULL auto_increment,
  `baoxiaobianhao` int(11) NOT NULL,
  `receipt` varchar(20) NOT NULL,
  `bizhong` varchar(10) NOT NULL,
  `huilv` varchar(10) NOT NULL,
  `jine` varchar(20) NOT NULL,
  `shijian` datetime NOT NULL,
  `lipinming` varchar(200) NOT NULL,
  `danwei` varchar(200) NOT NULL,
  `name` varchar(50) NOT NULL,
  `danjushumu` tinyint(4) default NULL,
  `kehubianhao` decimal(18,0) default NULL,
  PRIMARY KEY  (`id`),
  KEY `baoxiaobianhao` (`baoxiaobianhao`),
  KEY `kehubianhao` (`kehubianhao`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=gbk;

INSERT INTO tb_lipin (`id`, `baoxiaobianhao`, `receipt`, `bizhong`, `huilv`, `jine`, `shijian`, `lipinming`, `danwei`, `name`, `danjushumu`, `kehubianhao`) VALUES (1, 107, '4', '美元', '6.28', '25.12', '2012-03-22 00:00:00', '4', '4', '4', NULL, NULL);
INSERT INTO tb_lipin (`id`, `baoxiaobianhao`, `receipt`, `bizhong`, `huilv`, `jine`, `shijian`, `lipinming`, `danwei`, `name`, `danjushumu`, `kehubianhao`) VALUES (2, 107, '4', '美元', '6.28', '25.12', '2012-03-22 00:00:00', '4', '4', '4', NULL, NULL);
INSERT INTO tb_lipin (`id`, `baoxiaobianhao`, `receipt`, `bizhong`, `huilv`, `jine`, `shijian`, `lipinming`, `danwei`, `name`, `danjushumu`, `kehubianhao`) VALUES (3, 108, '3', '欧元', '13.1', '39.30', '2012-03-23 00:00:00', '3', '3', '3', 3, '0');
INSERT INTO tb_lipin (`id`, `baoxiaobianhao`, `receipt`, `bizhong`, `huilv`, `jine`, `shijian`, `lipinming`, `danwei`, `name`, `danjushumu`, `kehubianhao`) VALUES (4, 108, '3', '欧元', '13.1', '39.30', '2012-03-23 00:00:00', '3', '3', '3', 3, '0');
INSERT INTO tb_lipin (`id`, `baoxiaobianhao`, `receipt`, `bizhong`, `huilv`, `jine`, `shijian`, `lipinming`, `danwei`, `name`, `danjushumu`, `kehubianhao`) VALUES (5, 108, '3', '欧元', '13.1', '39.30', '2012-03-23 00:00:00', '3', '3', '3', 3, '0');
INSERT INTO tb_lipin (`id`, `baoxiaobianhao`, `receipt`, `bizhong`, `huilv`, `jine`, `shijian`, `lipinming`, `danwei`, `name`, `danjushumu`, `kehubianhao`) VALUES (6, 108, '3', '欧元', '13.1', '39.30', '2012-03-23 00:00:00', '3', '3', '3', 3, '0');


#
# TABLE STRUCTURE FOR: tb_shenpishixian
#

DROP TABLE IF EXISTS tb_shenpishixian;

CREATE TABLE `tb_shenpishixian` (
  `jinggaoshixian` tinyint(4) NOT NULL,
  `tiaoguoshixian` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

INSERT INTO tb_shenpishixian (`jinggaoshixian`, `tiaoguoshixian`) VALUES (3, 8);


#
# TABLE STRUCTURE FOR: tb_tongyong
#

DROP TABLE IF EXISTS tb_tongyong;

CREATE TABLE `tb_tongyong` (
  `id` int(11) NOT NULL auto_increment,
  `baoxiaobianhao` int(11) NOT NULL,
  `receipt` varchar(20) NOT NULL,
  `bizhong` varchar(10) NOT NULL,
  `huilv` varchar(10) NOT NULL,
  `jine` varchar(20) NOT NULL,
  `shijian` datetime NOT NULL,
  `mudi` tinyint(4) NOT NULL,
  `Feiyongmingxi` text NOT NULL,
  `danjushumu` tinyint(4) default NULL,
  `kehubianhao` decimal(18,0) default NULL,
  PRIMARY KEY  (`id`),
  KEY `baoxiaobianhao` (`baoxiaobianhao`),
  KEY `kehubianhao` (`kehubianhao`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gbk;

INSERT INTO tb_tongyong (`id`, `baoxiaobianhao`, `receipt`, `bizhong`, `huilv`, `jine`, `shijian`, `mudi`, `Feiyongmingxi`, `danjushumu`, `kehubianhao`) VALUES (1, 112, '1', '美元', '6.28', '6.28', '2012-03-06 00:00:00', 0, '1', 1, '0');
INSERT INTO tb_tongyong (`id`, `baoxiaobianhao`, `receipt`, `bizhong`, `huilv`, `jine`, `shijian`, `mudi`, `Feiyongmingxi`, `danjushumu`, `kehubianhao`) VALUES (2, 112, '1', '美元', '6.28', '6.28', '2012-03-06 00:00:00', 0, '1', 1, '0');


#
# TABLE STRUCTURE FOR: tb_xiangmu
#

DROP TABLE IF EXISTS tb_xiangmu;

CREATE TABLE `tb_xiangmu` (
  `xiangmubianhao` varchar(30) NOT NULL,
  `xiangmuming` varchar(100) NOT NULL,
  `Jine` varchar(20) NOT NULL,
  PRIMARY KEY  (`xiangmubianhao`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

INSERT INTO tb_xiangmu (`xiangmubianhao`, `xiangmuming`, `Jine`) VALUES ('1980', '电信项目', '4445613');
INSERT INTO tb_xiangmu (`xiangmubianhao`, `xiangmuming`, `Jine`) VALUES ('1001', '高铁项目', '4445637');


#
# TABLE STRUCTURE FOR: tb_yuangong
#

DROP TABLE IF EXISTS tb_yuangong;

CREATE TABLE `tb_yuangong` (
  `yuangongbianhao` varchar(10) NOT NULL,
  `bumenbianhao` varchar(20) NOT NULL,
  `xingming` varchar(50) NOT NULL,
  `zhiwei` varchar(50) NOT NULL,
  `mima` varchar(300) NOT NULL,
  `zhuceshijian` datetime NOT NULL,
  `zhuce_ip` varchar(100) NOT NULL,
  `denglushijian` datetime NOT NULL,
  `denglu_ip` varchar(100) NOT NULL,
  `zhuangtai` char(1) NOT NULL,
  PRIMARY KEY  (`yuangongbianhao`),
  KEY `bumenbianhao` (`bumenbianhao`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

INSERT INTO tb_yuangong (`yuangongbianhao`, `bumenbianhao`, `xingming`, `zhiwei`, `mima`, `zhuceshijian`, `zhuce_ip`, `denglushijian`, `denglu_ip`, `zhuangtai`) VALUES ('105232', '004', '唐亮', '普通员工', '21232f297a57a5a743894a0e4a801fc3', '2012-03-04 12:03:31', '127.0.0.1', '2012-03-14 12:03:54', '127.0.0.1', '0');
INSERT INTO tb_yuangong (`yuangongbianhao`, `bumenbianhao`, `xingming`, `zhiwei`, `mima`, `zhuceshijian`, `zhuce_ip`, `denglushijian`, `denglu_ip`, `zhuangtai`) VALUES ('105231', '001', '王燕军', '财务总监', '21232f297a57a5a743894a0e4a801fc3', '2012-03-05 12:04:04', '127.0.0.1', '2012-03-14 12:04:01', '127.0.0.1', '0');
INSERT INTO tb_yuangong (`yuangongbianhao`, `bumenbianhao`, `xingming`, `zhiwei`, `mima`, `zhuceshijian`, `zhuce_ip`, `denglushijian`, `denglu_ip`, `zhuangtai`) VALUES ('105233', '001', '李浩', '部门经理', '21232f297a57a5a743894a0e4a801fc3', '2012-03-05 13:14:30', '127.0.0.1', '2012-03-21 13:14:35', '127.0.0.1', '0');
INSERT INTO tb_yuangong (`yuangongbianhao`, `bumenbianhao`, `xingming`, `zhiwei`, `mima`, `zhuceshijian`, `zhuce_ip`, `denglushijian`, `denglu_ip`, `zhuangtai`) VALUES ('13415252', '004', '陈肖楠', '部长', '111111', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0');
INSERT INTO tb_yuangong (`yuangongbianhao`, `bumenbianhao`, `xingming`, `zhiwei`, `mima`, `zhuceshijian`, `zhuce_ip`, `denglushijian`, `denglu_ip`, `zhuangtai`) VALUES ('13415256', '004', '罗意', '副部长', '111111', '0000-00-00 00:00:00', '', '0000-00-00 00:00:00', '', '0');


#
# TABLE STRUCTURE FOR: tb_yuangongxiangqing
#

DROP TABLE IF EXISTS tb_yuangongxiangqing;

CREATE TABLE `tb_yuangongxiangqing` (
  `yuangongbianhao` varchar(20) NOT NULL,
  `xingming` varchar(50) NOT NULL,
  `xingbie` char(1) default NULL,
  `chushengriqi` timestamp NULL default NULL,
  `wenhuachengdu` varchar(30) default NULL,
  `gudingdianhua` varchar(30) default NULL,
  `shoujihaoma` varchar(30) default NULL,
  `shenfenzheng` varchar(30) default NULL,
  `ruzhiriqi` timestamp NULL default NULL,
  `lizhiriqi` timestamp NULL default NULL,
  `huming` varchar(30) default NULL,
  `kaihuyinhang` varchar(200) default NULL,
  `zhuzhi` varchar(200) default NULL,
  `photo_path` varchar(200) default NULL,
  `yinhangzhanghao` varchar(50) default NULL,
  `thumb` varchar(50) default NULL,
  `email` varchar(50) default NULL,
  PRIMARY KEY  (`yuangongbianhao`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

INSERT INTO tb_yuangongxiangqing (`yuangongbianhao`, `xingming`, `xingbie`, `chushengriqi`, `wenhuachengdu`, `gudingdianhua`, `shoujihaoma`, `shenfenzheng`, `ruzhiriqi`, `lizhiriqi`, `huming`, `kaihuyinhang`, `zhuzhi`, `photo_path`, `yinhangzhanghao`, `thumb`, `email`) VALUES ('105232', '唐亮', '1', '2012-03-12 00:00:00', '高中', '', '15117935933', '42232619870403103X', '0000-00-00 00:00:00', NULL, '唐亮', '北京', '西安', './uploads/唐亮.jpg', '433322324235', './uploads/唐亮_thumb.jpg', '365206801@qq.com');
INSERT INTO tb_yuangongxiangqing (`yuangongbianhao`, `xingming`, `xingbie`, `chushengriqi`, `wenhuachengdu`, `gudingdianhua`, `shoujihaoma`, `shenfenzheng`, `ruzhiriqi`, `lizhiriqi`, `huming`, `kaihuyinhang`, `zhuzhi`, `photo_path`, `yinhangzhanghao`, `thumb`, `email`) VALUES ('105231', '王燕军', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bupt2010fly@gmail.com');
INSERT INTO tb_yuangongxiangqing (`yuangongbianhao`, `xingming`, `xingbie`, `chushengriqi`, `wenhuachengdu`, `gudingdianhua`, `shoujihaoma`, `shenfenzheng`, `ruzhiriqi`, `lizhiriqi`, `huming`, `kaihuyinhang`, `zhuzhi`, `photo_path`, `yinhangzhanghao`, `thumb`, `email`) VALUES ('105233', '李浩', NULL, '2012-03-19 13:15:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'tangliang198704@126.com');
INSERT INTO tb_yuangongxiangqing (`yuangongbianhao`, `xingming`, `xingbie`, `chushengriqi`, `wenhuachengdu`, `gudingdianhua`, `shoujihaoma`, `shenfenzheng`, `ruzhiriqi`, `lizhiriqi`, `huming`, `kaihuyinhang`, `zhuzhi`, `photo_path`, `yinhangzhanghao`, `thumb`, `email`) VALUES ('13415252', '陈肖楠', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO tb_yuangongxiangqing (`yuangongbianhao`, `xingming`, `xingbie`, `chushengriqi`, `wenhuachengdu`, `gudingdianhua`, `shoujihaoma`, `shenfenzheng`, `ruzhiriqi`, `lizhiriqi`, `huming`, `kaihuyinhang`, `zhuzhi`, `photo_path`, `yinhangzhanghao`, `thumb`, `email`) VALUES ('13415256', '罗意', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);


#
# TABLE STRUCTURE FOR: tb_zichann
#

DROP TABLE IF EXISTS tb_zichann;

CREATE TABLE `tb_zichann` (
  `id` int(11) NOT NULL auto_increment,
  `baoxiaobianhao` int(11) NOT NULL,
  `receipt` varchar(20) NOT NULL,
  `bizhong` varchar(10) NOT NULL,
  `huilv` varchar(10) NOT NULL,
  `jine` varchar(20) NOT NULL,
  `shijian` datetime NOT NULL,
  `zichanming` varchar(200) NOT NULL,
  `yongtu` text NOT NULL,
  `danjushumu` tinyint(4) default NULL,
  PRIMARY KEY  (`id`),
  KEY `baoxiaobianhao` (`baoxiaobianhao`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=gbk;

INSERT INTO tb_zichann (`id`, `baoxiaobianhao`, `receipt`, `bizhong`, `huilv`, `jine`, `shijian`, `zichanming`, `yongtu`, `danjushumu`) VALUES (1, 110, '2', '美元', '6.28', '12.56', '2012-03-14 00:00:00', '2', '2', 2);
INSERT INTO tb_zichann (`id`, `baoxiaobianhao`, `receipt`, `bizhong`, `huilv`, `jine`, `shijian`, `zichanming`, `yongtu`, `danjushumu`) VALUES (2, 110, '2', '美元', '6.28', '12.56', '2012-03-14 00:00:00', '2', '2', 2);


