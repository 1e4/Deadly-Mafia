-- phpMyAdmin SQL Dump
-- version 2.6.4-pl2
-- http://www.phpmyadmin.net
-- 
-- Host: mysql3.freehostia.com
-- Generation Time: Mar 29, 2007 at 07:50 PM
-- Server version: 4.1.11
-- PHP Version: 4.3.10-16
-- 
-- Database: `chadun5_bliss`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `airport`
-- 

CREATE TABLE airport (
  id int(11) NOT NULL auto_increment,
  owner varchar(40) NOT NULL default '',
  location enum('London','New York','Beijing','Rome','Moscow','Bogota') NOT NULL default 'London',
  travel_prices varchar(100) NOT NULL default '100-100-100-100-100-100',
  profit varchar(100) NOT NULL default '0-0-0-0-0-0',
  PRIMARY KEY  (id),
  KEY id (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `attempts`
-- 

CREATE TABLE attempts (
  id int(11) NOT NULL auto_increment,
  username char(40) NOT NULL default '',
  target char(40) NOT NULL default '',
  outcome enum('Dead','Survived') NOT NULL default 'Dead',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=380 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `auctions`
-- 

CREATE TABLE auctions (
  id int(11) NOT NULL auto_increment,
  username varchar(40) NOT NULL default '',
  min_starting int(11) NOT NULL default '0',
  current_bid int(11) NOT NULL default '0',
  winning varchar(40) NOT NULL default '',
  winning_bid int(11) NOT NULL default '0',
  item_type varchar(100) NOT NULL default '',
  `time` varchar(100) NOT NULL default '',
  item_id varchar(100) NOT NULL default '',
  an enum('0','1') NOT NULL default '0',
  pvt enum('0','1') NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2072 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `ban`
-- 

CREATE TABLE ban (
  id int(11) NOT NULL auto_increment,
  username varchar(40) NOT NULL default '',
  `by` varchar(40) NOT NULL default '',
  `type` enum('0','1') NOT NULL default '0',
  reason text NOT NULL,
  length varchar(100) NOT NULL default '',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=165 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `bank`
-- 

CREATE TABLE bank (
  id int(11) NOT NULL auto_increment,
  owner char(40) NOT NULL default '',
  send_intrest int(11) NOT NULL default '1',
  location enum('London','New York','Beijing','Rome','Moscow','Bogota') NOT NULL default 'London',
  profit int(100) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=347 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `bank2`
-- 

CREATE TABLE bank2 (
  id int(11) NOT NULL auto_increment,
  owner char(40) NOT NULL default '',
  send_intrest int(11) NOT NULL default '1',
  location enum('London','New York','Beijing','Rome','Moscow','Bogota') NOT NULL default 'London',
  profit int(100) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `bar`
-- 

CREATE TABLE bar (
  id int(11) NOT NULL auto_increment,
  owner char(40) NOT NULL default '',
  location enum('London','New York','Beijing','Rome','Moscow','Bogota') NOT NULL default 'London',
  profit int(50) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `betlogs`
-- 

CREATE TABLE betlogs (
  id int(11) NOT NULL default '0',
  `user` varchar(40) NOT NULL default '',
  owner varchar(50) NOT NULL default '',
  casino enum('Slots','Roulette','RPS','Race','Keno','bj','Dice') NOT NULL default 'Slots',
  bet int(50) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

-- 
-- Table structure for table `bf`
-- 

CREATE TABLE bf (
  id int(11) NOT NULL auto_increment,
  owner varchar(40) NOT NULL default '',
  stock int(100) NOT NULL default '0',
  producing enum('Yes','No') NOT NULL default 'Yes',
  price int(100) NOT NULL default '100',
  location enum('London','New York','Beijing','Rome','Moscow','Bogota') NOT NULL default 'London',
  profit varchar(100) NOT NULL default '',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `bidders`
-- 

CREATE TABLE bidders (
  id int(11) NOT NULL auto_increment,
  bidder char(40) NOT NULL default '',
  amount int(11) NOT NULL default '0',
  auction_id int(11) NOT NULL default '0',
  `time` datetime NOT NULL default '0000-00-00 00:00:00',
  an enum('0','1') NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1379 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `bj`
-- 

CREATE TABLE bj (
  id int(11) NOT NULL auto_increment,
  country enum('London','New York','Beijing','Rome','Moscow','Bogota') NOT NULL default 'London',
  bjowner varchar(100) NOT NULL default '',
  bjmaxbet varchar(100) NOT NULL default '',
  bjminbet varchar(100) NOT NULL default '',
  bjearnings varchar(100) NOT NULL default '',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `blackjack`
-- 

CREATE TABLE blackjack (
  id int(11) NOT NULL auto_increment,
  owner varchar(40) NOT NULL default '',
  casino enum('Slots','Roulette','RPS','Race') NOT NULL default 'Slots',
  profit varchar(100) NOT NULL default '',
  max int(11) NOT NULL default '0',
  location enum('England','Japan','Colombia','Usa','South Africa','Mexico') NOT NULL default 'England',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `buisnesses`
-- 

CREATE TABLE buisnesses (
  id int(11) NOT NULL auto_increment,
  owner varchar(40) NOT NULL default '',
  size varchar(40) NOT NULL default '',
  profit varchar(100) NOT NULL default '',
  slogan varchar(100) NOT NULL default '',
  logo varchar(100) NOT NULL default '',
  color1 varchar(100) NOT NULL default '',
  color2 varchar(100) NOT NULL default '',
  PRIMARY KEY  (id),
  KEY id (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `car_sell`
-- 

CREATE TABLE car_sell (
  id int(11) NOT NULL auto_increment,
  owner char(40) NOT NULL default '',
  car_id int(50) NOT NULL default '0',
  price int(50) NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  car_type char(40) NOT NULL default '',
  location enum('London','New York','Beijing','Rome','Moscow','Bogota') NOT NULL default 'London',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1848 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `casinos`
-- 

CREATE TABLE casinos (
  id int(11) NOT NULL auto_increment,
  owner varchar(40) NOT NULL default '',
  casino enum('Slots','Roulette','RPS','Keno','Dice') NOT NULL default 'Slots',
  profit int(11) NOT NULL default '0',
  max int(11) NOT NULL default '0',
  location enum('London','New York','Beijing','Rome','Moscow','Bogota') NOT NULL default 'London',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=469 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `chat`
-- 

CREATE TABLE chat (
  id int(32) NOT NULL auto_increment,
  `user` varchar(100) NOT NULL default '',
  chat varchar(100) NOT NULL default '',
  timeh varchar(20) NOT NULL default '',
  timem varchar(20) NOT NULL default '',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2036 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `crews`
-- 

CREATE TABLE crews (
  id int(11) NOT NULL auto_increment,
  name varchar(250) NOT NULL default '',
  boss varchar(100) NOT NULL default '0',
  underboss varchar(100) NOT NULL default '0',
  money int(20) NOT NULL default '0',
  recruiting enum('0','1') NOT NULL default '1',
  quote text NOT NULL,
  bank int(50) NOT NULL default '0',
  picture tinytext NOT NULL,
  bullets int(50) NOT NULL default '0',
  points int(40) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `dealership`
-- 

CREATE TABLE dealership (
  id int(11) NOT NULL auto_increment,
  owner char(40) NOT NULL default '',
  location enum('London','New York','Beijing','Rome','Moscow','Bogota') NOT NULL default 'London',
  profit int(50) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `donaters`
-- 

CREATE TABLE donaters (
  donater_id int(11) NOT NULL auto_increment,
  username varchar(40) NOT NULL default '',
  donater_pass varchar(40) NOT NULL default '',
  amount int(50) NOT NULL default '0',
  package enum('None','1','2','3','4') NOT NULL default 'None',
  `on` varchar(100) NOT NULL default '',
  PRIMARY KEY  (donater_id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `enemies`
-- 

CREATE TABLE enemies (
  id int(11) NOT NULL auto_increment,
  username char(40) NOT NULL default '',
  person char(40) NOT NULL default '',
  `type` enum('enemie','Blocked') NOT NULL default 'enemie',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=329 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `friends`
-- 

CREATE TABLE friends (
  id int(11) NOT NULL auto_increment,
  username char(40) NOT NULL default '',
  person char(40) NOT NULL default '',
  `type` enum('Friend','Blocked') NOT NULL default 'Friend',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1278 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `garage`
-- 

CREATE TABLE garage (
  id int(11) NOT NULL auto_increment,
  owner varchar(40) NOT NULL default '',
  car varchar(100) NOT NULL default '',
  damage varchar(100) NOT NULL default '',
  origion varchar(100) NOT NULL default '',
  location varchar(100) NOT NULL default '',
  upgrades varchar(100) NOT NULL default '0-0-0-0-0-0-0-0',
  `status` enum('0','1','2','3','4') NOT NULL default '0',
  worth int(32) NOT NULL default '0',
  shiptime varchar(100) NOT NULL default '',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=17002 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `get_away`
-- 

CREATE TABLE get_away (
  id int(11) NOT NULL auto_increment,
  leader char(40) NOT NULL default '',
  person char(40) NOT NULL default '',
  weapon enum('None','Sig Sauer P229','Jackhammer automatic shotgun','Heckler und Koch MP-5k','Browning M2HB') NOT NULL default 'None',
  car int(50) NOT NULL default '0',
  `share` enum('1','2') NOT NULL default '1',
  person_ready char(40) NOT NULL default '',
  invite_get char(40) NOT NULL default '',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `hitlist`
-- 

CREATE TABLE hitlist (
  id int(32) NOT NULL auto_increment,
  paid varchar(32) NOT NULL default '',
  target varchar(32) NOT NULL default '',
  reason varchar(120) NOT NULL default '',
  amount int(32) NOT NULL default '0',
  anonymous enum('1','2') NOT NULL default '1',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=161 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `inbox`
-- 

CREATE TABLE inbox (
  id int(11) NOT NULL auto_increment,
  `to` varchar(40) NOT NULL default '',
  `from` varchar(40) NOT NULL default '',
  message text NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `read` enum('0','1') NOT NULL default '0',
  saved int(2) NOT NULL default '0',
  event_id int(11) NOT NULL default '0',
  witness enum('0','1') NOT NULL default '0',
  witness_per varchar(40) NOT NULL default '',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=57456 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `jail`
-- 

CREATE TABLE jail (
  id int(11) NOT NULL auto_increment,
  username varchar(40) NOT NULL default '',
  location enum('London','New York','Beijing','Rome','Moscow','Bogota') NOT NULL default 'London',
  time_left varchar(100) NOT NULL default '',
  reason varchar(100) NOT NULL default '',
  bust_able enum('0','1') NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=3476698 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `kill_chart`
-- 

CREATE TABLE kill_chart (
  id int(11) NOT NULL auto_increment,
  target varchar(128) NOT NULL default '',
  username varchar(128) NOT NULL default '',
  bullets int(11) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=209 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `log`
-- 

CREATE TABLE log (
  id int(11) NOT NULL auto_increment,
  `by` varchar(100) NOT NULL default '',
  `action` varchar(100) NOT NULL default '',
  `level` enum('0','1','2') NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2000 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `lotto`
-- 

CREATE TABLE lotto (
  id int(11) NOT NULL auto_increment,
  owner char(40) NOT NULL default '',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `lotto_info`
-- 

CREATE TABLE lotto_info (
  id int(11) NOT NULL auto_increment,
  price int(11) NOT NULL default '10000',
  time_to int(100) NOT NULL default '0',
  jackpot int(100) NOT NULL default '0',
  lotto_num int(50) NOT NULL default '0',
  winning_ticket int(50) NOT NULL default '0',
  winner char(40) NOT NULL default '',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `married`
-- 

CREATE TABLE married (
  id int(32) NOT NULL auto_increment,
  starter varchar(100) NOT NULL default '',
  other varchar(100) NOT NULL default '',
  done enum('0','1') NOT NULL default '0',
  ring varchar(40) NOT NULL default '',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `matches`
-- 

CREATE TABLE matches (
  id int(11) NOT NULL auto_increment,
  username char(40) NOT NULL default '',
  bet int(11) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4947 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `oc`
-- 

CREATE TABLE oc (
  id int(32) NOT NULL auto_increment,
  leader varchar(100) NOT NULL default '',
  `type` enum('1','2','3') NOT NULL default '1',
  wexpert varchar(100) NOT NULL default '',
  eexpert varchar(100) NOT NULL default '',
  driver varchar(100) NOT NULL default '',
  weapons varchar(30) NOT NULL default '0-0-0-0',
  explosives varchar(30) NOT NULL default '0-0-0-0',
  wready enum('Pending Invite','Accepted Invite','Ready') NOT NULL default 'Pending Invite',
  eready enum('Pending Invite','Accepted Invite','Ready') NOT NULL default 'Pending Invite',
  dready enum('Pending Invite','Accepted Invite','Ready') NOT NULL default 'Pending Invite',
  percentages varchar(30) NOT NULL default '0',
  weinvite varchar(100) NOT NULL default '',
  eeinvite varchar(100) NOT NULL default '',
  driverinvite varchar(100) NOT NULL default '',
  location varchar(100) NOT NULL default '',
  car varchar(100) NOT NULL default '',
  cardam varchar(100) NOT NULL default '',
  carid int(32) NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY wready (wready),
  KEY eready (eready),
  KEY dready (dready),
  KEY leader (leader),
  KEY wready_2 (wready),
  KEY driver (driver),
  KEY eexpert (eexpert),
  KEY wexpert (wexpert)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 PACK_KEYS=0 AUTO_INCREMENT=978 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `ocinvites`
-- 

CREATE TABLE ocinvites (
  id int(32) NOT NULL auto_increment,
  username varchar(100) NOT NULL default '',
  ocid int(32) NOT NULL default '0',
  posistion enum('Weapons Expert','Explosives Expert','Driver') NOT NULL default 'Weapons Expert',
  octype enum('1','2','3') NOT NULL default '1',
  leader varchar(100) NOT NULL default '',
  location varchar(100) NOT NULL default '',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=5575 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `paper`
-- 

CREATE TABLE paper (
  id int(11) NOT NULL auto_increment,
  edition int(11) NOT NULL default '0',
  news text NOT NULL,
  title varchar(100) NOT NULL default '',
  `by` varchar(40) NOT NULL default '',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  align enum('Left','Right') NOT NULL default 'Left',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `points`
-- 

CREATE TABLE points (
  id int(11) NOT NULL auto_increment,
  owner char(40) NOT NULL default '',
  send_intrest int(11) NOT NULL default '0',
  location enum('London','New York','Beijing','Rome','Moscow','Bogota') NOT NULL default 'London',
  profit int(100) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `points2`
-- 

CREATE TABLE points2 (
  id int(11) NOT NULL auto_increment,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `pointstransfers`
-- 

CREATE TABLE pointstransfers (
  id int(11) NOT NULL auto_increment,
  `to` char(40) NOT NULL default '',
  `from` char(40) NOT NULL default '',
  amount int(100) NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `polls`
-- 

CREATE TABLE polls (
  id int(11) NOT NULL auto_increment,
  title text NOT NULL,
  op1 varchar(40) NOT NULL default '',
  op2 varchar(40) NOT NULL default '',
  op3 varchar(40) NOT NULL default '',
  op4 varchar(40) NOT NULL default '',
  op5 varchar(40) NOT NULL default '',
  v1 int(6) NOT NULL default '0',
  v2 int(6) NOT NULL default '0',
  v3 int(6) NOT NULL default '0',
  v4 int(6) NOT NULL default '0',
  v5 int(6) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `pts`
-- 

CREATE TABLE pts (
  id int(11) NOT NULL auto_increment,
  owner char(40) NOT NULL default '',
  send_intrest int(11) NOT NULL default '0',
  location enum('England','Japan','Colombia','Usa','South Africa','Mexico') NOT NULL default 'England',
  profit int(100) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `race`
-- 

CREATE TABLE race (
  id int(11) NOT NULL default '0',
  owner varchar(100) NOT NULL default '',
  max int(11) NOT NULL default '0',
  location enum('London','New York','Beijing','Moscow','Rome','Bogota') NOT NULL default 'London',
  profit int(11) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

-- 
-- Table structure for table `replys`
-- 

CREATE TABLE replys (
  id int(11) NOT NULL auto_increment,
  username varchar(100) NOT NULL default '',
  `text` text NOT NULL,
  forum varchar(250) NOT NULL default 'main',
  idto varchar(100) NOT NULL default '',
  made datetime NOT NULL default '0000-00-00 00:00:00',
  crew varchar(100) NOT NULL default '',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2057 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `rest`
-- 

CREATE TABLE rest (
  id int(11) NOT NULL auto_increment,
  owner varchar(40) NOT NULL default '',
  prices varchar(100) NOT NULL default '0-0-0-0-0-0-0-0-0',
  location enum('London','New York','Beijing','Rome','Moscow','Bogota') NOT NULL default 'London',
  profit int(50) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `safe`
-- 

CREATE TABLE safe (
  id int(11) NOT NULL auto_increment,
  username varchar(40) NOT NULL default '',
  `time` varchar(100) NOT NULL default '',
  location varchar(40) NOT NULL default '',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=229 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `search`
-- 

CREATE TABLE search (
  id int(11) NOT NULL auto_increment,
  username varchar(40) NOT NULL default '',
  target varchar(40) NOT NULL default '',
  `time` varchar(100) NOT NULL default '',
  `status` enum('0','1','2') NOT NULL default '0',
  location varchar(100) NOT NULL default '',
  expired datetime NOT NULL default '0000-00-00 00:00:00',
  nextshot varchar(255) NOT NULL default '',
  8hrends varchar(255) NOT NULL default '',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=9962 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `shop`
-- 

CREATE TABLE shop (
  id int(11) NOT NULL auto_increment,
  owner char(40) NOT NULL default '',
  location enum('London','New York','Beijing','Rome','Moscow','Bogota') NOT NULL default 'London',
  profit int(40) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `site_stats`
-- 

CREATE TABLE site_stats (
  id int(11) NOT NULL auto_increment,
  online int(11) NOT NULL default '0',
  CS enum('0','1') NOT NULL default '0',
  bullets varchar(100) NOT NULL default '',
  terr varchar(100) NOT NULL default '',
  stock varchar(40) NOT NULL default '1',
  newstockp varchar(40) NOT NULL default '',
  oldstockp varchar(40) NOT NULL default '',
  stime varchar(40) NOT NULL default '',
  PRIMARY KEY  (id),
  FULLTEXT KEY stock (stock,newstockp,oldstockp)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `street`
-- 

CREATE TABLE street (
  id int(11) NOT NULL auto_increment,
  leader varchar(40) NOT NULL default '',
  leader_car varchar(40) NOT NULL default '',
  prize enum('Car','Money') NOT NULL default 'Car',
  prize_win int(11) NOT NULL default '0',
  op_car int(11) NOT NULL default '0',
  op_ready varchar(10) NOT NULL default '',
  op_username varchar(40) NOT NULL default '',
  op_invite varchar(40) NOT NULL default '',
  location varchar(40) NOT NULL default '',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=801 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `swiss`
-- 

CREATE TABLE swiss (
  id int(32) NOT NULL auto_increment,
  account int(32) NOT NULL default '0',
  pin int(32) NOT NULL default '0',
  money int(32) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1159 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `ticket`
-- 

CREATE TABLE ticket (
  id int(32) NOT NULL auto_increment,
  title varchar(100) NOT NULL default '',
  description varchar(250) NOT NULL default '',
  answer varchar(250) NOT NULL default '',
  `open` int(32) NOT NULL default '0',
  started varchar(100) NOT NULL default '',
  bug enum('0','1') NOT NULL default '0',
  `on` datetime NOT NULL default '0000-00-00 00:00:00',
  answered_by varchar(40) NOT NULL default '0',
  `status` enum('Pending','Fixed') NOT NULL default 'Pending',
  cat enum('Crimes','Casinos','Money','Street Races','OC','Getaway','Other') NOT NULL default 'Crimes',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=910 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `ticket2`
-- 

CREATE TABLE ticket2 (
  id int(32) NOT NULL auto_increment,
  title varchar(100) NOT NULL default '',
  description varchar(250) NOT NULL default '',
  answer varchar(250) NOT NULL default '',
  `open` int(32) NOT NULL default '0',
  started varchar(100) NOT NULL default '',
  bug enum('0','1') NOT NULL default '0',
  `on` datetime NOT NULL default '0000-00-00 00:00:00',
  answered_by varchar(40) NOT NULL default '0',
  `status` enum('Pending','Fixed') NOT NULL default 'Pending',
  cat enum('Crimes','Casinos','Money','Street Races','OC','Getaway','Other') NOT NULL default 'Crimes',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=117 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `to_do`
-- 

CREATE TABLE to_do (
  `by` varchar(100) NOT NULL default '0',
  todo text NOT NULL,
  done enum('0','1') NOT NULL default '0',
  id int(10) NOT NULL auto_increment,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `topics`
-- 

CREATE TABLE topics (
  id int(11) NOT NULL auto_increment,
  username varchar(100) NOT NULL default '',
  title varchar(100) NOT NULL default '',
  topictext text NOT NULL,
  forum varchar(250) NOT NULL default 'main',
  locked enum('0','1') NOT NULL default '0',
  important enum('0','1') NOT NULL default '0',
  sticky enum('0','1') NOT NULL default '0',
  lastreply varchar(100) NOT NULL default '',
  made datetime NOT NULL default '0000-00-00 00:00:00',
  crew varchar(100) NOT NULL default '',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=837 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `transfers`
-- 

CREATE TABLE transfers (
  id int(11) NOT NULL auto_increment,
  `to` char(40) NOT NULL default '',
  `from` char(40) NOT NULL default '',
  amount int(100) NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1933 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `turf`
-- 

CREATE TABLE turf (
  id int(11) NOT NULL auto_increment,
  location char(40) NOT NULL default '',
  owner char(60) NOT NULL default '',
  profit int(11) NOT NULL default '0',
  damage int(3) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=235 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `updates`
-- 

CREATE TABLE updates (
  id int(32) NOT NULL auto_increment,
  username varchar(100) NOT NULL default '',
  `update` text NOT NULL,
  `time` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `user_info`
-- 

CREATE TABLE user_info (
  id int(11) NOT NULL auto_increment,
  username varchar(40) NOT NULL default '',
  crimes int(100) NOT NULL default '0',
  gtas int(100) NOT NULL default '0',
  busts int(100) NOT NULL default '0',
  get_aways int(11) NOT NULL default '0',
  food_crimes int(40) NOT NULL default '0',
  ocs int(11) NOT NULL default '0',
  kill_skill int(11) NOT NULL default '0',
  wl varchar(40) NOT NULL default '0:0',
  exp int(3) NOT NULL default '0',
  `level` int(11) NOT NULL default '0',
  last_train varchar(100) NOT NULL default '',
  jewl varchar(40) NOT NULL default '',
  foot varchar(40) NOT NULL default '',
  jail_able enum('0','1') NOT NULL default '0',
  last_bribe varchar(100) NOT NULL default '',
  jail_untill varchar(100) NOT NULL default '',
  lang enum('English','Dutch') NOT NULL default 'English',
  respect int(11) NOT NULL default '0',
  respect_rec varchar(11) NOT NULL default '0',
  last_respect varchar(100) NOT NULL default '',
  mem_gym enum('0','1') NOT NULL default '0',
  dealing int(11) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=5266 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE users (
  id int(11) NOT NULL auto_increment,
  username varchar(40) NOT NULL default '',
  gender varchar(60) NOT NULL default '<b>Unknown</b>',
  `password` varchar(60) NOT NULL default '',
  activated enum('0','1') NOT NULL default '0',
  money varchar(100) NOT NULL default '1000',
  online varchar(100) NOT NULL default '',
  crimechance varchar(100) NOT NULL default '0-0-0-0-0-0-0',
  lastcrime varchar(100) NOT NULL default '',
  rankpoints int(11) NOT NULL default '0',
  userlevel enum('0','1','2','3','4') NOT NULL default '0',
  lasttop varchar(100) NOT NULL default '',
  `status` enum('Alive','Dead','Banned') NOT NULL default 'Alive',
  regged datetime NOT NULL default '0000-00-00 00:00:00',
  rank enum('Scum','Tramp','Chav','Vandal','Mobster','Hitman','Agent','Boss','Assassin','Godfather','Global Threat','World Dominator','Untouchable Godfather','Legend','Official Bliss Godfather') NOT NULL default 'Scum',
  layout varchar(100) NOT NULL default '17',
  email varchar(100) NOT NULL default '',
  quote text NOT NULL,
  image varchar(100) NOT NULL default 'images/default.jpg',
  location enum('London','New York','Beijing','Rome','Moscow','Bogota') NOT NULL default 'London',
  bullets int(11) NOT NULL default '0',
  gtachance varchar(100) NOT NULL default '0-0-0',
  lastgta varchar(100) NOT NULL default '',
  lasttravel varchar(100) NOT NULL default '',
  bank int(40) NOT NULL default '0',
  banktime varchar(100) NOT NULL default '',
  last_race varchar(100) NOT NULL default '',
  street enum('0','1') NOT NULL default '0',
  music tinytext NOT NULL,
  poll varchar(10) NOT NULL default '0',
  crew varchar(60) NOT NULL default '0',
  get_away_time varchar(100) NOT NULL default '',
  get_away enum('0','1') NOT NULL default '0',
  health int(3) NOT NULL default '100',
  energy int(3) NOT NULL default '2147483647',
  last_ext varchar(100) NOT NULL default '',
  lasttran varchar(100) NOT NULL default '',
  drugprices varchar(100) NOT NULL default '0-0-0-0-0',
  drugs varchar(100) NOT NULL default '0-0-0-0-0',
  l_ip varchar(15) NOT NULL default '127.0.0.1',
  r_ip varchar(15) NOT NULL default '',
  crew_invite int(11) NOT NULL default '0',
  referral int(11) NOT NULL default '0',
  weapon enum('None','FiveSeven','Shotgun','PSG1','M82A1','M16','Liquidx Cannon') NOT NULL default 'None',
  mission int(11) NOT NULL default '1',
  points int(11) NOT NULL default '0',
  lpv varchar(32) NOT NULL default '',
  page varchar(10) NOT NULL default '',
  editor enum('0','1') NOT NULL default '0',
  helper enum('0','1') NOT NULL default '0',
  ghostmode enum('0','1') NOT NULL default '0',
  forumm enum('0','1') NOT NULL default '0',
  food_chance varchar(100) NOT NULL default '0-0-0',
  last_food varchar(100) NOT NULL default '',
  last_order varchar(100) NOT NULL default '',
  freinds varchar(40) NOT NULL default 'None',
  protection enum('None','Knife','Bullet Vest','Armoured Car','Body Double','Bunker') NOT NULL default 'None',
  plane enum('None','Microlight','Small Plane','Boeing 747','Concord','Private Jet') NOT NULL default 'None',
  married varchar(100) NOT NULL default '0',
  last_oc varchar(100) NOT NULL default '',
  atm enum('False','True') NOT NULL default 'False',
  last_bank varchar(100) NOT NULL default '',
  last_attempted varchar(100) NOT NULL default '',
  last_kill varchar(100) NOT NULL default '',
  ver_code varchar(20) NOT NULL default '456',
  last_script_check varchar(100) NOT NULL default '',
  `global` enum('0','1') NOT NULL default '0',
  clicks int(11) NOT NULL default '0',
  click_rate varchar(100) NOT NULL default '',
  tut enum('0','1') NOT NULL default '0',
  drugs_from varchar(40) NOT NULL default '',
  total_drugs_mission int(11) NOT NULL default '0',
  city enum('Cambridgeshire','Hull','Leeds','Leicester','Liverpool','London','Chiba','Fujiyoshida','Kawasaki','Sapporo','Yokohama','Nagoya','New York','Arizona','Texas','Utah','Vermont','Washington DC','Alberton','Benoni','Cape Town','Carltonville','East London','Johannesburg','Acapulco','Aguascalientes','Lake Chapala','San Carlos','Monterrey','Tuxtla') NOT NULL default 'Cambridgeshire',
  notes text NOT NULL,
  last_chase varchar(100) NOT NULL default '',
  choice varchar(40) NOT NULL default '0',
  bar enum('1','2') NOT NULL default '1',
  backfire int(11) NOT NULL default '0',
  stock varchar(200) NOT NULL default '0',
  donate enum('1','2') NOT NULL default '1',
  bj varchar(100) NOT NULL default '0',
  hdo_stat varchar(100) NOT NULL default '',
  flowers varchar(100) NOT NULL default '',
  oc enum('0','1') NOT NULL default '0',
  octime varchar(100) NOT NULL default '0',
  ocleader enum('No','Yes') NOT NULL default 'No',
  ocid int(32) NOT NULL default '0',
  ocpost enum('','Weapons Expert','Explosives Expert','Driver') NOT NULL default '',
  ocstatus enum('Not Ready','Ready') NOT NULL default 'Not Ready',
  apply varchar(250) NOT NULL default '0',
  bullettime varchar(100) NOT NULL default '',
  lastbuy varchar(100) NOT NULL default '0',
  PRIMARY KEY  (id),
  UNIQUE KEY user_idx (username)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=4250 ;
