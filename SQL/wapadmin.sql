-- MySQL dump 8.21
--
-- Host: localhost    Database: wapadmin
---------------------------------------------------------
-- Server version	3.23.48-log

--
-- Table structure for table 'user'
--

CREATE TABLE user (
  userid tinyint(4) NOT NULL auto_increment,
  user varchar(12) default NULL,
  pass varchar(50) default NULL,
  PRIMARY KEY  (userid)
) TYPE=MyISAM;

--
-- Dumping data for table 'user'
--


INSERT INTO user VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3');

