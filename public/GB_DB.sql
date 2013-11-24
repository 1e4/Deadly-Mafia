-- 
-- Table structure for table `airport`
-- 

CREATE TABLE airport (
  id int(11) NOT NULL auto_increment,
  ownerid int(11) NOT NULL default 1,
  ownerusername varchar(50) NOT NULL default 'ASCII',
  location tinyint(1) NOT NULL default 1,
  travel_prices varchar(50) NOT NULL default '100-100-100-100-100-100',
  profit varchar(100) NOT NULL default '0-0-0-0-0-0',
  PRIMARY KEY  (id),
  KEY id (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO airport(`location`) VALUES (1);
INSERT INTO airport(`location`) VALUES (2);
INSERT INTO airport(`location`) VALUES (3);
INSERT INTO airport(`location`) VALUES (4);
INSERT INTO airport(`location`) VALUES (5);
INSERT INTO airport(`location`) VALUES (6);
-- --------------------------------------------------------

-- 
-- Table structure for table `attempts`
-- 

CREATE TABLE attempts (
  id int(11) NOT NULL auto_increment,
  userid int(11) NOT NULL default 1,
  username varchar(50) NOT NULL,
  targetid int(11) NOT NULL,
  targetusername varchar(50) NOT NULL,
  outcome enum('Dead','Survived') NOT NULL default 'Dead',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `auctions`
-- 

CREATE TABLE auctions (
  id int(11) NOT NULL auto_increment,
  userid int(11) NOT NULL,
  username varchar(50) NOT NULL,
  min_starting int(11) NOT NULL default '0',
  current_bid int(11) NOT NULL default '0',
  winning varchar(40) NOT NULL,
  winning_bid int(11) NOT NULL default '0',
  item_type varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  item_id varchar(100) NOT NULL,
  an enum('0','1') NOT NULL default '0',
  pvt enum('0','1') NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `ban`
-- 

CREATE TABLE ban (
  id int(11) NOT NULL auto_increment,
  userid int(11) NOT NULL,
  username varchar(11) NOT NULL,
  `by` int(11) NOT NULL,
  byusername varchar(50) NOT NULL,
  `type` enum('0','1') NOT NULL default '0',
  reason text NOT NULL,
  length varchar(100) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `bank`
-- 

CREATE TABLE bank (
  id int(11) NOT NULL auto_increment,
  ownerid int(11) NOT NULL default 1,
  ownerusername varchar(50) NOT NULL default 'ASCII',
  send_interest int(11) NOT NULL default 1,
  location tinyint(1) NOT NULL default 1,
  profit int(11) NOT NULL default 0,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO bank(`location`) VALUES (1);
INSERT INTO bank(`location`) VALUES (2);
INSERT INTO bank(`location`) VALUES (3);
INSERT INTO bank(`location`) VALUES (4);
INSERT INTO bank(`location`) VALUES (5);
INSERT INTO bank(`location`) VALUES (6);

-- --------------------------------------------------------

-- 
-- Table structure for table `bar`
-- 

CREATE TABLE bar (
  id int(11) NOT NULL auto_increment,
  ownerid int(11) NOT NULL default 1,
  ownerusername varchar(50) NOT NULL default 'ASCII',
  location tinyint(1) NOT NULL default 1,
  profit int(11) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO bar(`location`) VALUES (1);
INSERT INTO bar(`location`) VALUES (2);
INSERT INTO bar(`location`) VALUES (3);
INSERT INTO bar(`location`) VALUES (4);
INSERT INTO bar(`location`) VALUES (5);
INSERT INTO bar(`location`) VALUES (6);

-- --------------------------------------------------------

-- 
-- Table structure for table `betlogs`
-- 

CREATE TABLE betlogs (
  id int(11) NOT NULL default '0',
  userid int(11) NOT NULL,
  username varchar(50) NOT NULL,
  ownerid int(11) NOT NULL,
  ownerusername varchar(50) NOT NULL default 'ASCII',
  casino enum('Slots','Roulette','RPS','Race','Keno','bj','Dice') NOT NULL default 'Slots',
  bet int(11) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

-- 
-- Table structure for table `bf`
-- 

CREATE TABLE bf (
  id int(11) NOT NULL auto_increment,
  ownerid int(11) NOT NULL default 1,
  ownerusername varchar(50) NOT NULL default 'ASCII',
  stock int(11) NOT NULL default '0',
  producing enum('Yes','No') NOT NULL default 'Yes',
  price int(4) NOT NULL default '1000',
  location tinyint(1) NOT NULL default 1,
  profit int(11) NOT NULL default 0,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO bf(`location`) VALUES (1);
INSERT INTO bf(`location`) VALUES (2);
INSERT INTO bf(`location`) VALUES (3);
INSERT INTO bf(`location`) VALUES (4);
INSERT INTO bf(`location`) VALUES (5);
INSERT INTO bf(`location`) VALUES (6);

-- --------------------------------------------------------

-- 
-- Table structure for table `bidders`
-- 

CREATE TABLE bidders (
  id int(11) NOT NULL auto_increment,
  bidderid int(11) NOT NULL,
  bidderusername varchar(50) NOT NULL,
  amount int(11) NOT NULL default '0',
  auction_id int(11) NOT NULL default '0',
  `time` datetime NOT NULL default '0000-00-00 00:00:00',
  an enum('0','1') NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `blackjack`
-- 

CREATE TABLE blackjack (
  id int(11) NOT NULL auto_increment,
  ownerid int(11) NOT NULL default 1,
  ownerusername varchar(50) NOT NULL default 'ASCII',
  profit int(11) NOT NULL,
  `max` int(11) NOT NULL default '0',
  location tinyint(1) NOT NULL default 1,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO blackjack(`location`) VALUES (1);
INSERT INTO blackjack(`location`) VALUES (2);
INSERT INTO blackjack(`location`) VALUES (3);
INSERT INTO blackjack(`location`) VALUES (4);
INSERT INTO blackjack(`location`) VALUES (5);
INSERT INTO blackjack(`location`) VALUES (6);

-- --------------------------------------------------------

-- 
-- Table structure for table `buisnesses`
-- 

CREATE TABLE buisnesses (
  id int(11) NOT NULL auto_increment,
  ownerid int(11) NOT NULL,
  ownerusername varchar(50) NOT NULL default 'ASCII',
  `size` varchar(40) NOT NULL,
  profit varchar(100) NOT NULL,
  slogan varchar(100) NOT NULL,
  logo varchar(100) NOT NULL,
  color1 varchar(100) NOT NULL,
  color2 varchar(100) NOT NULL,
  PRIMARY KEY  (id),
  KEY id (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `car_sell`
-- 

CREATE TABLE car_sell (
  id int(11) NOT NULL auto_increment,
  ownerid int(11) NOT NULL default 1,
  ownerusername varchar(50) NOT NULL default 'ASCII',
  car_id int(11) NOT NULL default 0,
  price int(11) NOT NULL default 0,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  car_type char(40) NOT NULL,
  location tinyint(1) NOT NULL default 1,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO `car_sell` (`location`) VALUES (1);
INSERT INTO `car_sell` (`location`) VALUES (2);
INSERT INTO `car_sell` (`location`) VALUES (3);
INSERT INTO `car_sell` (`location`) VALUES (4);
INSERT INTO `car_sell` (`location`) VALUES (5);
INSERT INTO `car_sell` (`location`) VALUES (6);
-- --------------------------------------------------------

-- 
-- Table structure for table `casinos`
-- 

CREATE TABLE casinos (
  id int(11) NOT NULL auto_increment,
  ownerid int(11) NOT NULL default 1,
  ownerusername varchar(50) NOT NULL default 'ASCII',
  casino enum('Slots','Roulette','RPS','Keno','Dice') NOT NULL default 'Slots',
  profit int(11) NOT NULL default '0',
  `max` int(11) NOT NULL default '0',
  location tinyint (1)NOT NULL default 1,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO `casinos` (`casino`, `location`) VALUES ('Slots', 1);
INSERT INTO `casinos` (`casino`, `location`) VALUES ('Slots', 2);
INSERT INTO `casinos` (`casino`, `location`) VALUES ('Slots', 3);
INSERT INTO `casinos` (`casino`, `location`) VALUES ('Slots', 4);
INSERT INTO `casinos` (`casino`, `location`) VALUES ('Slots', 5);
INSERT INTO `casinos` (`casino`, `location`) VALUES ('Slots', 6);

INSERT INTO `casinos` (`casino`, `location`) VALUES ('Roulette', 1);
INSERT INTO `casinos` (`casino`, `location`) VALUES ('Roulette', 2);
INSERT INTO `casinos` (`casino`, `location`) VALUES ('Roulette', 3);
INSERT INTO `casinos` (`casino`, `location`) VALUES ('Roulette', 4);
INSERT INTO `casinos` (`casino`, `location`) VALUES ('Roulette', 5);
INSERT INTO `casinos` (`casino`, `location`) VALUES ('Roulette', 6);

INSERT INTO `casinos` (`casino`, `location`) VALUES ('RPS', 1);
INSERT INTO `casinos` (`casino`, `location`) VALUES ('RPS', 2);
INSERT INTO `casinos` (`casino`, `location`) VALUES ('RPS', 3);
INSERT INTO `casinos` (`casino`, `location`) VALUES ('RPS', 4);
INSERT INTO `casinos` (`casino`, `location`) VALUES ('RPS', 5);
INSERT INTO `casinos` (`casino`, `location`) VALUES ('RPS', 6);

INSERT INTO `casinos` (`casino`, `location`) VALUES ('Keno', 1);
INSERT INTO `casinos` (`casino`, `location`) VALUES ('Keno', 2);
INSERT INTO `casinos` (`casino`, `location`) VALUES ('Keno', 3);
INSERT INTO `casinos` (`casino`, `location`) VALUES ('Keno', 4);
INSERT INTO `casinos` (`casino`, `location`) VALUES ('Keno', 5);
INSERT INTO `casinos` (`casino`, `location`) VALUES ('Keno', 6);

INSERT INTO `casinos` (`casino`, `location`) VALUES ('Dice', 1);
INSERT INTO `casinos` (`casino`, `location`) VALUES ('Dice', 2);
INSERT INTO `casinos` (`casino`, `location`) VALUES ('Dice', 3);
INSERT INTO `casinos` (`casino`, `location`) VALUES ('Dice', 4);
INSERT INTO `casinos` (`casino`, `location`) VALUES ('Dice', 5);
INSERT INTO `casinos` (`casino`, `location`) VALUES ('Dice', 6);
-- --------------------------------------------------------

-- 
-- Table structure for table `crews`
-- 

CREATE TABLE crews (
  id int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL,
  bossid int(11) NOT NULL default 0,
  bossusername varchar(50) NOT NULL,
  underbossid int(11) NOT NULL default 0,
  underbossusername varchar(50) NOT NULL,
  money int(11) NOT NULL default 0,
  recruiting enum('0','1') NOT NULL default '1',
  quote text NOT NULL,
  bank int(11) NOT NULL default 0,
  picture tinytext NOT NULL,
  bullets int(11) NOT NULL default 0,
  points int(11) NOT NULL default 0,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `dealership`
-- 

CREATE TABLE dealership (
  id int(11) NOT NULL auto_increment,
  ownerid int(11) NOT NULL default 1,
  ownerusername varchar(50) NOT NULL default 'ASCII',
  location tinyint(1) NOT NULL default 1,
  profit int(11) NOT NULL default 0,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO `dealership` (`location`) VALUES (1);
INSERT INTO `dealership` (`location`) VALUES (2);
INSERT INTO `dealership` (`location`) VALUES (3);
INSERT INTO `dealership` (`location`) VALUES (4);
INSERT INTO `dealership` (`location`) VALUES (5);
INSERT INTO `dealership` (`location`) VALUES (6);
-- --------------------------------------------------------

-- 
-- Table structure for table `friends`
-- 

CREATE TABLE friends (
  id int(11) NOT NULL auto_increment,
  userid int(11) NOT NULL,
  username varchar(50) NOT NULL,
  otheruserid int(11) NOT NULL,
  otherusername varchar(50) NOT NULL,
  `type` enum('Friend','Blocked') NOT NULL default 'Friend',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `garage`
-- 

CREATE TABLE garage (
  id int(11) NOT NULL auto_increment,
  userid int(11) NOT NULL,
  carid int(11) NOT NULL,
  damage int(3) NOT NULL,
  origin tinyint(1) NOT NULL,
  location tinyint(1) NOT NULL default 1,
  upgrades varchar(100) NOT NULL default '0-0-0-0-0-0-0-0',
  `status` enum('0','1','2','3','4') NOT NULL default '0',
  worth int(11) NOT NULL default '0',
  `shiptime` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `get_away`
-- 

CREATE TABLE get_away (
  id int(11) NOT NULL auto_increment,
  leaderid int(11) NOT NULL,
  leaderusername varchar(50) NOT NULL,
  partnerid int(11) NOT NULL,
  partnerusername varchar(50) NOT NULL,
  weapon enum('None','Sig Sauer P229','Jackhammer automatic shotgun','Heckler und Koch MP-5k','Browning M2HB') NOT NULL default 'None',
  carid int(11) NOT NULL default 0,
  `share` enum('1','2') NOT NULL default '1',
  person_ready char(40) NOT NULL,
  invite_get char(40) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `hitlist`
-- 

CREATE TABLE hitlist (
  id int(11) NOT NULL auto_increment,
  userid int(11) NOT NULL,
  username varchar(50) NOT NULL,
  targetid int(11) NOT NULL,
  targetusername varchar(50) NOT NULL,
  reason varchar(140) NOT NULL,
  amount int(11) NOT NULL default '0',
  anonymous enum('1','2') NOT NULL default '1',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
-- Table structure for table `inbox`
-- 

CREATE TABLE inbox (
  id int(11) NOT NULL auto_increment,
  `to` int(11) NOT NULL,
  tousername varchar(50) NOT NULL,
  `from` varchar(11) NOT NULL,
  fromusername varchar(50) NOT NULL,
  message text NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `read` enum('0','1') NOT NULL default '0',
  saved tinyint(1) NOT NULL default '0',
  event_id int(11) NOT NULL default '0',
  witness enum('0','1') NOT NULL default '0',
  witness_per varchar(40) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
-- Table structure for table `jail`
-- 

CREATE TABLE jail (
  id int(11) NOT NULL auto_increment,
  userid int(11) NOT NULL,
  username varchar(50) NOT NULL,
  location tinyint(1) NOT NULL,
  time_left int(3) NOT NULL,
  reason varchar(140) NOT NULL,
  bust_able enum('0','1') NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `log`
-- 

CREATE TABLE log (
  id int(11) NOT NULL auto_increment,
  userid int(11) NOT NULL,
  username varchar(50) NOT NULL,
  `action` varchar(140) NOT NULL,
  `level` enum('0','1','2') NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `lotto`
-- 

CREATE TABLE lotto (
  id int(11) NOT NULL auto_increment,
  userid int(11) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `lotto_info`
-- 

CREATE TABLE lotto_info (
  id int(11) NOT NULL auto_increment,
  price int(11) NOT NULL default '10000',
  time_to datetime NOT NULL default '0000:00:00 00:00:00',
  jackpot int(11) NOT NULL default '0',
  lotto_num int(11) NOT NULL default '0',
  winning_ticket int(11) NOT NULL default '0',
  winner varchar(50) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `married`
-- 

CREATE TABLE married (
  id int(11) NOT NULL auto_increment,
  starter int(11) NOT NULL,
  starterusername varchar(50) NOT NULL,
  other int(11) NOT NULL,
  otherusername varchar(50) NOT NULL,
  done enum('0','1') NOT NULL default '0',
  ring int(1) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `oc`
-- 

CREATE TABLE oc (
  id int(32) NOT NULL auto_increment,
  leaderid int(11) NOT NULL,
  leaderusername varchar(50) NOT NULL,
  `type` enum('1','2','3') NOT NULL default '1',
  wexpertid int(11) NOT NULL,
  wexpertusername varchar(50) NOT NULL,
  eexpertid int(11) NOT NULL,
  eexpertusername varchar(50) NOT NULL,
  driverid int(11) NOT NULL,
  driverusername varchar(50) NOT NULL,
  weapons varchar(30) NOT NULL default '0-0-0-0',
  explosives varchar(30) NOT NULL default '0-0-0-0',
  wready enum('Pending Invite','Accepted Invite','Ready') NOT NULL default 'Pending Invite',
  eready enum('Pending Invite','Accepted Invite','Ready') NOT NULL default 'Pending Invite',
  dready enum('Pending Invite','Accepted Invite','Ready') NOT NULL default 'Pending Invite',
  percentages varchar(30) NOT NULL default '0',
  weinvite varchar(100) NOT NULL,
  eeinvite varchar(100) NOT NULL,
  driverinvite varchar(100) NOT NULL,
  location varchar(100) NOT NULL,
  car varchar(100) NOT NULL,
  cardam varchar(100) NOT NULL,
  carid int(32) NOT NULL default '0',
  PRIMARY KEY  (id),
  KEY wready (wready),
  KEY eready (eready),
  KEY dready (dready),
  KEY leader (leaderid),
  KEY wready_2 (wready),
  KEY driver (driverid),
  KEY eexpert (eexpertid),
  KEY wexpert (wexpertid)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 PACK_KEYS=0 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `ocinvites`
-- 

CREATE TABLE ocinvites (
  id int(32) NOT NULL auto_increment,
  userid int(11) NOT NULL,
  username varchar(50) NOT NULL,
  ocid int(11) NOT NULL default '0',
  `position` enum('Weapons Expert','Explosives Expert','Driver') NOT NULL default 'Weapons Expert',
  octype enum('1','2','3') NOT NULL default '1',
  leaderusername varchar(50) NOT NULL,
  location tinyint(1) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
-- Table structure for table `paper`
-- 

CREATE TABLE paper (
  id int(11) NOT NULL auto_increment,
  edition int(11) NOT NULL default '0',
  news text NOT NULL,
  title varchar(100) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  align enum('Left','Right') NOT NULL default 'Left',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `pointstransfers`
-- 

CREATE TABLE pointstransfers (
  id int(11) NOT NULL auto_increment,
  userid int(11) NOT NULL,
  username varchar(50) NOT NULL,
  fromid int(11) NOT NULL,
  fromusername varchar(50) NOT NULL,
  amount int(11) NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
-- --------------------------------------------------------

-- 
-- Table structure for table `race`
-- 

CREATE TABLE race (
  id int(11) NOT NULL auto_increment,
  ownerid int(11) NOT NULL default 1,
  ownerusername varchar(50) NOT NULL default 'ASCII',
  `max` int(11) NOT NULL default 0,
  location tinyint(1) NOT NULL default 1,
  profit int(11) NOT NULL default 1,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
-- Table structure for table `replys`
-- 

CREATE TABLE replys (
  id int(11) NOT NULL auto_increment,
  userid int(11) NOT NULL,
  username varchar(50) NOT NULL,
  `text` text NOT NULL,
  forum varchar(250) NOT NULL default 'main',
  idto varchar(100) NOT NULL,
  made datetime NOT NULL default '0000-00-00 00:00:00',
  crew varchar(100) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `rest`
-- 

CREATE TABLE rest (
  id int(11) NOT NULL auto_increment,
  ownerid int(11) NOT NULL default 1,
  ownerusername varchar(50) NOT NULL default 'ASCII',
  prices varchar(100) NOT NULL default '0-0-0-0-0-0-0-0-0',
  location tinyint(1) NOT NULL default 1,
  profit int(11) NOT NULL default 1,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

INSERT INTO `rest` (`location`) VALUES (1);
INSERT INTO `rest` (`location`) VALUES (2);
INSERT INTO `rest` (`location`) VALUES (3);
INSERT INTO `rest` (`location`) VALUES (4);
INSERT INTO `rest` (`location`) VALUES (5);
INSERT INTO `rest` (`location`) VALUES (6);
-- --------------------------------------------------------

-- 
-- Table structure for table `safe`
-- 

CREATE TABLE safe (
  id int(11) NOT NULL auto_increment,
  userid int(11) NOT NULL,
  username varchar(50) NOT NULL,
  `time` varchar(100) NOT NULL,
  location varchar(40) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `search`
-- 

CREATE TABLE search (
  id int(11) NOT NULL auto_increment,
  userid int(11) NOT NULL,
  username varchar(50) NOT NULL,
  targetid varchar(11) NOT NULL,
  targetusername varchar(50) NOT NULL,
  `time` datetime NOT NULL default '0000:00:00 00:00:00',
  `status` enum('0','1','2') NOT NULL default '0',
  location tinyint(1) NOT NULL,
  expired datetime NOT NULL default '0000-00-00 00:00:00',
  nextshot varchar(255) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

-- --------------------------------------------------------

-- 
-- Table structure for table `shop`
-- 

CREATE TABLE shop (
  id int(11) NOT NULL auto_increment,
  ownerid int(11) NOT NULL default 1,
  ownerusername varchar(50) NOT NULL default 'ASCII',
  location tinyint(1) NOT NULL default 1,
  profit int(11) NOT NULL default 1,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

INSERT INTO `shop` (`location`) VALUES (1);
INSERT INTO `shop` (`location`) VALUES (2);
INSERT INTO `shop` (`location`) VALUES (3);
INSERT INTO `shop` (`location`) VALUES (4);
INSERT INTO `shop` (`location`) VALUES (5);
INSERT INTO `shop` (`location`) VALUES (6);
-- --------------------------------------------------------

-- 
-- Table structure for table `site_stats`
-- 

CREATE TABLE site_stats (
  id int(11) NOT NULL auto_increment,
  online int(11) NOT NULL default 0,
  CS enum('0','1') NOT NULL default '0',
  bullets varchar(100) NOT NULL,
  terr varchar(100) NOT NULL,
  stock varchar(40) NOT NULL default 0,
  newstockp varchar(40) NOT NULL,
  oldstockp varchar(40) NOT NULL,
  stime varchar(40) NOT NULL,
  PRIMARY KEY  (id),
  FULLTEXT KEY stock (stock,newstockp,oldstockp)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `street`
-- 

CREATE TABLE street (
  id int(11) NOT NULL auto_increment,
  leaderid int(11) NOT NULL,
  leaderusername varchar(50) NOT NULL,
  leader_car int(11) NOT NULL,
  prize enum('Car','Money') NOT NULL default 'Car',
  prize_win int(11) NOT NULL default 0,
  op_car int(11) NOT NULL default 0,
  op_ready varchar(10) NOT NULL,
  op_userid int(11) NOT NULL,
  op_username varchar(50) NOT NULL,
  op_invite varchar(40) NOT NULL,
  location varchar(40) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `ticket`
-- 

CREATE TABLE ticket (
  id int(11) NOT NULL auto_increment,
  title varchar(40) NOT NULL,
  description longtext NOT NULL,
  answer longtext NOT NULL,
  `open` int(32) NOT NULL default '0',
  started varchar(100) NOT NULL,
  bug enum('0','1') NOT NULL default '0',
  `on` datetime NOT NULL default '0000-00-00 00:00:00',
  answered_by varchar(40) NOT NULL default '0',
  `status` enum('Pending','Fixed') NOT NULL default 'Pending',
  cat enum('Crimes','Casinos','Money','Street Races','OC','Getaway','Other') NOT NULL default 'Crimes',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `topics`
-- 

CREATE TABLE topics (
  id int(11) NOT NULL auto_increment,
  userid int(11) NOT NULL,
  username varchar(50) NOT NULL,
  title varchar(100) NOT NULL,
  topictext longtext NOT NULL,
  forum varchar(250) NOT NULL default 'main',
  locked enum('0','1') NOT NULL default '0',
  important enum('0','1') NOT NULL default '0',
  sticky enum('0','1') NOT NULL default '0',
  lastreply varchar(100) NOT NULL,
  made datetime NOT NULL default '0000-00-00 00:00:00',
  crew varchar(100) NOT NULL,
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `transfers`
-- 

CREATE TABLE transfers (
  id int(11) NOT NULL auto_increment,
  toid int(11) NOT NULL,
  tousername varchar(50) NOT NULL,
  fromid int(11) NOT NULL,
  fromusername varchar(50) NOT NULL,
  amount int(11) NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `updates`
-- 

CREATE TABLE updates (
  id int(32) NOT NULL auto_increment,
  userid int(11) NOT NULL,
  username varchar(50) NOT NULL,
  `update` text NOT NULL,
  `time` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `user_info`
-- 

CREATE TABLE user_info (
  id int(11) NOT NULL auto_increment,
  userid int(11) NOT NULL,
  username varchar(50) NOT NULL,
  crimes int(11) NOT NULL default '0',
  gtas int(11) NOT NULL default '0',
  busts int(11) NOT NULL default '0',
  get_aways int(11) NOT NULL default '0',
  food_crimes int(11) NOT NULL default '0',
  ocs int(11) NOT NULL default '0',
  kill_skill int(11) NOT NULL default '0',
  wl varchar(40) NOT NULL default '0:0',
  exp int(5) NOT NULL default '0',
  `level` int(11) NOT NULL default '0',
  last_train datetime NOT NULL default '0000:00:00 00:00:00',
  jewl varchar(40) NOT NULL,
  foot varchar(40) NOT NULL,
  jail_able enum('0','1') NOT NULL default '0',
  last_bribe datetime NOT NULL default '0000:00:00 00:00:00',
  jail_untill datetime NOT NULL default '0000:00:00 00:00:00',
  respect int(11) NOT NULL default '0',
  respect_rec varchar(11) NOT NULL default '0',
  last_respect datetime NOT NULL default '0000:00:00 00:00:00',
  mem_gym enum('0','1') NOT NULL default '0',
  dealing int(11) NOT NULL default '0',
  PRIMARY KEY  (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE users (
  id int(11) NOT NULL,
  username varchar(50) NOT NULL,
  gender varchar(60) NOT NULL default '<b>Unknown</b>',
  money int(11) NOT NULL default '1000',
  online datetime NOT NULL default '0000:00:00 00:00:00',
  crimechance varchar(100) NOT NULL default '0-0-0-0-0-0-0',
  lastcrime datetime NOT NULL default '0000:00:00 00:00:00',
  rankpoints int(11) NOT NULL default '0',
  userlevel int(6) NOT NULL default '0',
  lasttop varchar(100) NOT NULL,
  `status` enum('Alive','Dead','Banned') NOT NULL default 'Alive',
  regged datetime NOT NULL default '0000:00:00 00:00:00',
  rank int(2) NOT NULL default 1,
  quote longtext NOT NULL,
  image varchar(100) NOT NULL default 'images/default.jpg',
  location tinyint(1) NOT NULL default 1,
  bullets int(11) NOT NULL default '0',
  gtachance varchar(100) NOT NULL default '0-0-0',
  lastgta datetime NOT NULL default '0000:00:00 00:00:00',
  lasttravel datetime NOT NULL default '0000:00:00 00:00:00',
  bank int(11) NOT NULL default '0',
  banktime varchar(100) NOT NULL,
  last_race datetime NOT NULL default '0000:00:00 00:00:00',
  street enum('0','1') NOT NULL default '0',
  music tinytext NOT NULL,
  crewid int(11) NOT NULL default '0',
  crewname varchar(50) NOT NULL default '0',
  get_away_time datetime NOT NULL default '0000:00:00 00:00:00',
  get_away enum('0','1') NOT NULL default '0',
  health int(3) NOT NULL default '100',
  last_ext datetime NOT NULL default '0000:00:00 00:00:00',
  lasttran datetime NOT NULL default '0000:00:00 00:00:00',
  drugprices varchar(100) NOT NULL default '0-0-0-0-0',
  drugs varchar(100) NOT NULL default '0-0-0-0-0',
  l_ip varchar(255) NOT NULL default '127.0.0.1',
  r_ip varchar(255) NOT NULL,
  crew_invite int(11) NOT NULL default '0',
  referral int(11) NOT NULL default '0',
  weapon enum('None','FiveSeven','Shotgun','PSG1','M82A1','M16','Liquidx Cannon') NOT NULL default 'None',
  mission int(2) NOT NULL default '1',
  points int(11) NOT NULL default '0',
  editor enum('0','1') NOT NULL default '0',
  helper enum('0','1') NOT NULL default '0',
  ghostmode enum('0','1') NOT NULL default '0',
  forumm enum('0','1') NOT NULL default '0',
  food_chance varchar(100) NOT NULL default '0-0-0',
  last_food datetime NOT NULL default '0000:00:00 00:00:00',
  last_order datetime NOT NULL default '0000:00:00 00:00:00',
  friends varchar(40) NOT NULL default 'None',
  protection enum('None','Knife','Bullet Vest','Armoured Car','Body Double','Bunker') NOT NULL default 'None',
  plane enum('None','Microlight','Small Plane','Boeing 747','Concord','Private Jet') NOT NULL default 'None',
  married varchar(100) NOT NULL default '0',
  last_oc datetime NOT NULL default '0000:00:00 00:00:00',
  atm enum('False','True') NOT NULL default 'False',
  last_bank datetime NOT NULL default '0000:00:00 00:00:00',
  last_attempted datetime NOT NULL default '0000:00:00 00:00:00',
  last_kill datetime NOT NULL default '0000:00:00 00:00:00',
  ver_code varchar(20) NOT NULL default '456',
  last_script_check datetime NOT NULL default '0000:00:00 00:00:00',
  `global` enum('0','1') NOT NULL default '0',
  clicks int(11) NOT NULL default '0',
  click_rate varchar(100) NOT NULL,
  tut enum('0','1') NOT NULL default '0',
  drugs_from varchar(40) NOT NULL,
  total_drugs_mission int(11) NOT NULL default '0',
  city enum('Cambridgeshire','Hull','Leeds','Leicester','Liverpool','London','Chiba','Fujiyoshida','Kawasaki','Sapporo','Yokohama','Nagoya','New York','Arizona','Texas','Utah','Vermont','Washington DC','Alberton','Benoni','Cape Town','Carltonville','East London','Johannesburg','Acapulco','Aguascalientes','Lake Chapala','San Carlos','Monterrey','Tuxtla') NOT NULL default 'Cambridgeshire',
  notes text NOT NULL,
  last_chase datetime NOT NULL default '0000:00:00 00:00:00',
  choice varchar(40) NOT NULL default '0',
  bar enum('1','2') NOT NULL default '1',
  backfire int(11) NOT NULL default '0',
  stock varchar(200) NOT NULL default '0',
  donate enum('1','2') NOT NULL default '1',
  bj varchar(100) NOT NULL default '0',
  hdo_stat varchar(100) NOT NULL,
  flowers varchar(100) NOT NULL,
  oc enum('0','1') NOT NULL default '0',
  octime varchar(100) NOT NULL default '0',
  ocleader enum('No','Yes') NOT NULL default 'No',
  ocid int(32) NOT NULL default '0',
  ocpost enum('','Weapons Expert','Explosives Expert','Driver') NOT NULL,
  ocstatus enum('Not Ready','Ready') NOT NULL default 'Not Ready',
  apply varchar(250) NOT NULL default '0',
  bullettime varchar(100) NOT NULL,
  lastbuy datetime NOT NULL default '0000:00:00 00:00:00',
  PRIMARY KEY  (id),
  UNIQUE KEY user_idx (username)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE users_master (
  id int(11) NOT NULL auto_increment,
  email varchar(255) NOT NULL,
  password varchar(32) NOT NULL,
  userlevel int(5) NOT NULL default 0,
  activated enum('0','1') NOT NULL default '0',
  r_ip varchar(255) NOT NULL default '127.0.0.1',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;