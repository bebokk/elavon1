
<html>
<head>


<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>

</head>

<body>

<?

require_once('config/mysql.php');

$query = "CREATE TABLE `communication` (
 `communicationid` int(10) unsigned NOT NULL auto_increment,
 `position` int(11) NOT NULL ,
 `opened` int(11) NOT NULL ,
 `openedtime` datetime NOT NULL ,
 `fromuserid` int(11) NOT NULL ,
 `touserid` int(11) NOT NULL ,
 `description` longtext NOT NULL ,
 `createtime` datetime NOT NULL ,
 `lastactiontime` datetime NOT NULL ,
PRIMARY KEY (`communicationid`)
)";
$result = @mysql_query ($query);

$query = "CREATE TABLE `currency` (
 `currencyid` int(10) unsigned NOT NULL auto_increment,
 `position` int(11) NOT NULL ,
 `name` varchar(255) NOT NULL ,
 `code` varchar(255) NOT NULL ,
 `value` decimal(20,10) NOT NULL ,
 `createtime` datetime NOT NULL ,
 `lastactiontime` datetime NOT NULL ,
PRIMARY KEY (`currencyid`)
)";
$result = @mysql_query ($query);

$query = "CREATE TABLE `customers` (
 `customerid` int(10) unsigned NOT NULL auto_increment,
 `position` int(11) NOT NULL ,
 `company` varchar(255) NOT NULL ,
 `city` varchar(255) NOT NULL ,
 `address` varchar(255) NOT NULL ,
 `postcode` varchar(255) NOT NULL ,
 `vatin` varchar(255) NOT NULL ,
 `email` varchar(255) NOT NULL ,
 `phone` varchar(255) NOT NULL ,
 `products` varchar(255) NOT NULL ,
 `createtime` datetime NOT NULL ,
 `lastactiontime` datetime NOT NULL ,
PRIMARY KEY (`customerid`)
)";
$result = @mysql_query ($query);

$query = "CREATE TABLE `emails_templates` (
 `emails_templateid` int(10) unsigned NOT NULL auto_increment,
 `position` int(11) NOT NULL ,
 `name` varchar(255) NOT NULL ,
 `subject` varchar(255) NOT NULL ,
 `description` longtext NOT NULL ,
 `createtime` datetime NOT NULL ,
 `lastactiontime` datetime NOT NULL ,
PRIMARY KEY (`emails_templateid`)
)";
$result = @mysql_query ($query);

$query = "CREATE TABLE `invoices` (
 `invoiceid` int(10) unsigned NOT NULL auto_increment,
 `position` int(11) NOT NULL ,
 `customerid` int(11) NOT NULL ,
 `vat` int(11) NOT NULL ,
 `number` int(11) NOT NULL ,
 `date` date NOT NULL ,
 `duedate` date NOT NULL ,
 `createtime` datetime NOT NULL ,
 `lastactiontime` datetime NOT NULL ,
PRIMARY KEY (`invoiceid`)
)";
$result = @mysql_query ($query);

$query = "CREATE TABLE `invoices_products` (
 `invoices_productid` int(10) unsigned NOT NULL auto_increment,
 `position` int(11) NOT NULL ,
 `invoiceid` int(11) NOT NULL ,
 `name` varchar(255) NOT NULL ,
 `quantity` int(11) NOT NULL ,
 `price` decimal(20,10) NOT NULL ,
 `createtime` datetime NOT NULL ,
 `lastactiontime` datetime NOT NULL ,
PRIMARY KEY (`invoices_productid`)
)";
$result = @mysql_query ($query);

$query = "CREATE TABLE `newsletter_sent` (
 `newsletter_sentid` int(10) unsigned NOT NULL auto_increment,
 `position` int(11) NOT NULL ,
 `product` int(11) NOT NULL ,
 `title` varchar(255) NOT NULL ,
 `content` text NOT NULL ,
 `createtime` datetime NOT NULL ,
 `lastactiontime` datetime NOT NULL ,
PRIMARY KEY (`newsletter_sentid`)
)";
$result = @mysql_query ($query);

$query = "CREATE TABLE `products` (
 `productid` int(10) unsigned NOT NULL auto_increment,
 `position` int(11) NOT NULL ,
 `name` varchar(255) NOT NULL ,
 `createtime` datetime NOT NULL ,
 `lastactiontime` datetime NOT NULL ,
PRIMARY KEY (`productid`)
)";
$result = @mysql_query ($query);

$query = "CREATE TABLE `settings` (
 `settingid` int(10) unsigned NOT NULL auto_increment,
 `position` int(11) NOT NULL ,
 `name` varchar(255) NOT NULL ,
 `value` varchar(255) NOT NULL ,
 `createtime` datetime NOT NULL ,
 `lastactiontime` datetime NOT NULL ,
PRIMARY KEY (`settingid`)
)";
$result = @mysql_query ($query);

$query = "CREATE TABLE `settings_invoices` (
 `settings_invoiceid` int(10) unsigned NOT NULL auto_increment,
 `position` int(11) NOT NULL ,
 `name` varchar(255) NOT NULL ,
 `value` varchar(255) NOT NULL ,
 `description` text NOT NULL ,
 `createtime` datetime NOT NULL ,
 `lastactiontime` datetime NOT NULL ,
PRIMARY KEY (`settings_invoiceid`)
)";
$result = @mysql_query ($query);

$query = "CREATE TABLE `structure_basic_pictures` (
 `structure_basic_pictureid` int(10) unsigned NOT NULL auto_increment,
 `tableid` int(11) NOT NULL ,
 `table_name` varchar(255) NOT NULL ,
 `position` int(11) NOT NULL ,
 `active` int(11) NOT NULL ,
 `extension` varchar(20) NOT NULL ,
 `signature` text NOT NULL ,
 `createtime` datetime NOT NULL ,
 `lastactiontime` datetime NOT NULL ,
PRIMARY KEY (`structure_basic_pictureid`)
)";
$result = @mysql_query ($query);

$query = "CREATE TABLE `tickets` (
 `ticketid` int(10) unsigned NOT NULL auto_increment,
 `position` int(11) NOT NULL ,
 `userid` int(11) NOT NULL ,
 `state` int(11) NOT NULL ,
 `next_date` date NOT NULL ,
 `customerid` int(11) NOT NULL ,
 `title` varchar(255) NOT NULL ,
 `decription` longtext NOT NULL ,
 `createtime` datetime NOT NULL ,
 `lastactiontime` datetime NOT NULL ,
PRIMARY KEY (`ticketid`)
)";
$result = @mysql_query ($query);

$query = "CREATE TABLE `tickets_actions` (
 `tickets_actionid` int(10) unsigned NOT NULL auto_increment,
 `ticketid` int(11) NOT NULL ,
 `position` int(11) NOT NULL ,
 `userid` int(11) NOT NULL ,
 `state` int(11) NOT NULL ,
 `decription` longtext NOT NULL ,
 `createtime` datetime NOT NULL ,
 `lastactiontime` datetime NOT NULL ,
PRIMARY KEY (`tickets_actionid`)
)";
$result = @mysql_query ($query);

$query = "CREATE TABLE `tickets_states` (
 `tickets_stateid` int(10) unsigned NOT NULL auto_increment,
 `position` int(11) NOT NULL ,
 `name` varchar(255) NOT NULL ,
 `createtime` datetime NOT NULL ,
 `lastactiontime` datetime NOT NULL ,
PRIMARY KEY (`tickets_stateid`)
)";
$result = @mysql_query ($query);

$query = "CREATE TABLE `users` (
 `userid` int(10) unsigned NOT NULL auto_increment,
 `agencieid` int(11) NOT NULL ,
 `position` int(11) NOT NULL ,
 `usersgroupid` int(11) NOT NULL ,
 `name` varchar(255) NOT NULL ,
 `company` varchar(255) NOT NULL ,
 `address` varchar(255) NOT NULL ,
 `phone` varchar(255) NOT NULL ,
 `login` varchar(255) NOT NULL ,
 `email` varchar(255) NOT NULL ,
 `color` varchar(255) NOT NULL ,
 `pass` varchar(255) NOT NULL ,
 `createtime` datetime NOT NULL ,
 `lastactiontime` datetime NOT NULL ,
PRIMARY KEY (`userid`)
)";
$result = @mysql_query ($query);

$query = "CREATE TABLE `usersgroups` (
 `usersgroupid` int(10) unsigned NOT NULL auto_increment,
 `position` int(11) NOT NULL ,
 `name` varchar(255) NOT NULL ,
 `description` text NOT NULL ,
 `createtime` datetime NOT NULL ,
 `lastactiontime` datetime NOT NULL ,
PRIMARY KEY (`usersgroupid`)
)";
$result = @mysql_query ($query);



$query = "INSERT INTO `communication` VALUES (12,'0','1','2014-10-27 12:39:38','10','7','0','2014-10-27 07:38:19','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `communication` VALUES (9,'0','1','2014-10-27 12:41:42','7','8','0','2014-10-27 07:34:57','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `communication` VALUES (10,'0','1','2014-10-27 12:41:40','7','8','0','2014-10-27 07:35:07','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `communication` VALUES (11,'0','1','2014-10-27 12:24:22','7','10','0','2014-10-27 07:36:26','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `communication` VALUES (13,'0','1','2014-11-03 08:43:34','10','7','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Hi, I have get info thaht you are vbery noisy!!!</p>
<p>Let me know what is going on in there please.</p>
</body>
</html>','2014-10-27 09:16:44','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `communication` VALUES (14,'0','1','2014-10-27 01:13:12','10','7','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>test123</p>
</body>
</html>','2014-10-27 11:50:44','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `communication` VALUES (15,'0','1','2014-10-27 01:13:06','10','7','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Its really rude thaht you said thaht in thaht case i liek to terminate my tenancy!!!</p>
</body>
</html>','2014-10-27 12:03:43','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `communication` VALUES (16,'0','1','2014-10-27 01:13:01','10','7','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>What do you think about this then ?!</p>
</body>
</html>','2014-10-27 12:06:27','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `communication` VALUES (17,'0','1','2014-10-27 01:12:46','10','7','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Thank you for your question, but i am not gonna answer.</p>
</body>
</html>','2014-10-27 12:37:48','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `communication` VALUES (18,'0','1','2014-10-28 01:17:49','7','10','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Nice emails</p>
</body>
</html>','2014-10-27 13:14:40','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `currency` VALUES (1,'1','British Pound','GBP','1.0000000000','2014-01-03 15:23:56','2014-01-03 15:24:10');";
$result = @mysql_query ($query);

$query = "INSERT INTO `currency` VALUES (2,'2','US Dollar','USD','0.6096614430','2014-01-03 15:24:36','2014-01-03 15:25:09');";
$result = @mysql_query ($query);

$query = "INSERT INTO `currency` VALUES (3,'3','Euro','EUR','0.8299922773','2014-01-03 15:25:32','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `currency` VALUES (4,'4','Indian Rupee','INR','0.0097953318','2014-01-03 15:25:53','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `currency` VALUES (5,'5','Australian Dollar','AUD','0.5482119188','2014-01-03 15:26:19','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `currency` VALUES (6,'6','Canadian Dollar','CAD','0.5739612830','2014-01-03 15:26:36','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (1,'0','BigChoice Group Ltd','London','127-129 Great Suffolk Street','SE1 1PP','GB 971692974','alex.sweetman@bigchoicegroup.com','',',2,','2014-12-27 06:32:40','2015-01-05 12:06:35');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (2,'0','JUNIPER BRIDGE LIMITED','Eastleigh','Suite 5,  Crescent House, Yonge Close','SO50 9SX','','','','','2014-12-27 07:09:33','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (3,'0','some portal','','','','','l.sojka@finecms.eu','',',1,','2015-01-03 09:33:29','2015-01-04 12:16:29');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (4,'0','some cust2','','','','','lukasz@finecms.pl','',',1,','2015-01-04 12:22:35','2015-01-05 07:25:30');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (5,'0','SW 19','London','','','','sales@sw19.com','',',1,','2015-01-05 10:33:29','2015-01-05 10:39:53');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (6,'0','Ted Hoskins','London','','','','tedhoskins@aol.com','',',1,','2015-01-05 10:39:42','2015-01-05 10:40:05');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (7,'0','Tango Estates','London','','','','info@tangoestates.com','',',1,','2015-01-05 10:41:52','2015-01-05 10:41:58');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (8,'0','Trading Places','London','','','','info@tradingplacesproperty.com','',',1,','2015-01-05 10:42:48','2015-01-05 10:42:55');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (12,'0','Utopia Sales','London','','','','sales@urtopia.com','',',1,','2015-01-05 10:46:43','2015-01-05 10:46:59');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (10,'0','True Associates','London','','','','info@trueassociates.co.uk','',',1,','2015-01-05 10:44:45','2015-01-05 10:44:53');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (11,'0','United Estates','London','','','','unitedestates@aol.com','',',1,','2015-01-05 10:45:34','2015-01-05 10:46:03');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (13,'0','Utopia Lettings','London','','','','lettings@urtopia.com','',',1,','2015-01-05 10:47:22','2015-01-05 10:47:30');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (14,'0','View Properties','London','','','','info@viewpropertiesuk.com','',',1,','2015-01-05 10:47:55','2015-01-05 10:48:11');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (15,'0','Watts Lifestyle','London','','','','info@watts-lifestyle.com','',',1,','2015-01-05 10:48:46','2015-01-05 10:48:52');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (16,'0','Wenlock & Taylor','London','','','','info@wenlocktaylor.co.uk','',',1,','2015-01-05 10:49:46','2015-01-05 10:49:52');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (17,'0','Regent Estate Agents','London','','','','info@regentestateagent.co.uk','',',1,','2015-01-05 10:50:26','2015-01-05 10:50:41');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (18,'0','Robert Anthony','London','','','','robertanthonyproperty@btinternet.com','',',1,','2015-01-05 10:51:21','2015-01-05 10:51:29');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (19,'0','Robert Holmes Rent','London','','','','rentalenquiries@robertholmes.co.uk','',',1,','2015-01-05 10:52:18','2015-01-05 10:52:27');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (20,'0','Robert Holmes Enquiries','London','','','','enquiries@robertholmes.co.uk','',',1,','2015-01-05 10:53:07','2015-01-05 10:53:21');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (21,'0','Rochford Stokes','London','','','','info@rochfordstokes.com','',',1,','2015-01-05 10:54:11','2015-01-05 10:54:17');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (22,'0','Saxton','London','','','','saxtonest@aol.com','',',1,','2015-01-05 10:54:44','2015-01-05 10:56:15');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (23,'0','Shaws Lettings','London','','','','lettings@shawsestateagents.com','',',1,','2015-01-05 10:55:10','2015-01-05 10:56:07');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (24,'0','Shaws Sales','London','','','','sales@shawsestateagents.com','',',1,','2015-01-05 10:55:37','2015-01-05 10:55:44');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (25,'0','Spencer Kennedy','London','','','','info@spencerkennedy.co.uk','',',1,','2015-01-05 10:57:36','2015-01-05 10:57:42');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (26,'0','Spencer Thomas Sales','London','','','','sales@spencerthomas.co.uk','',',1,','2015-01-05 10:58:23','2015-01-05 11:00:13');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (27,'0','Spencer Thomas Lettings','London','','','','lettings@spencerthomas.co.uk','',',1,','2015-01-05 10:58:45','2015-01-05 11:00:08');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (28,'0','Springpark','London','','','','yinka@springpark.co.uk','',',1,','2015-01-05 10:59:05','2015-01-05 11:00:17');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (29,'0','Statons Lettings','London','','','','lettings@statons.com','',',1,','2015-01-05 10:59:26','2015-01-05 11:00:22');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (30,'0','Stephen James','London','','','','e3@stephenjamesestates.com','',',1,','2015-01-05 11:00:00','2015-01-05 11:00:26');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (31,'0','Stone House','London','','','','info@stonehouse-estates.co.uk','',',1,','2015-01-05 11:01:10','2015-01-05 11:01:43');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (32,'0','Philip Alexander','London','','','','info@philipalexander.net','',',1,','2015-01-05 11:01:36','2015-01-05 11:01:54');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (33,'0','Peter James','London','','','','management@peterjamesestates.co.uk','',',1,','2015-01-05 11:02:39','2015-01-05 11:04:55');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (34,'0','Palace Gate','Balham','','','','Balham@PalaceGateLettings.com','',',1,','2015-01-05 11:03:23','2015-01-05 11:04:49');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (35,'0','Palace Gate','Battersea','','','','Battersea@PalaceGateLettings.com','',',1,','2015-01-05 11:03:44','2015-01-05 11:04:44');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (36,'0','Palace Gate','Earlsfield','','','','Earlsfield@PalaceGateLettings.com','',',1,','2015-01-05 11:04:05','2015-01-05 11:04:39');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (37,'0','Palace Gate','Clapham','','','','Clapham@PalaceGateLettings.com','',',1,','2015-01-05 11:04:25','2015-01-05 11:04:33');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (38,'0','Petty Son & Prestwich Enquiries','London','','','','enquiries@pettyson.co.uk','',',1,','2015-01-05 11:06:11','2015-01-05 11:06:47');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (39,'0','Petty Son & Prestwich Info','London','','','','info@pettyson.co.uk.','',',1,','2015-01-05 11:06:39','2015-01-05 11:07:17');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (40,'0','Philips Estates','London','','','','phillipsestates@btconnect.com','',',1,','2015-01-05 11:10:10','2015-01-05 11:10:23');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (41,'0','Marylebone High','London','','','','info@marylebonehigh.com','',',1,','2015-01-05 11:11:49','2015-01-05 11:14:14');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (42,'0','Milestone Info','London','','','','info@msea.co.uk','',',1,','2015-01-05 11:12:22','2015-01-05 11:14:19');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (43,'0','Milestone Lettings','London','','','','lettings@msea.co.uk','',',1,','2015-01-05 11:12:37','2015-01-05 11:14:25');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (44,'0','Milestone Sales','London','','','','sales@msea.co.uk','',',1,','2015-01-05 11:13:03','2015-01-05 11:14:31');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (45,'0','Moretons','London','','','','info@moretons.co.uk','',',1,','2015-01-05 11:13:22','2015-01-05 11:14:36');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (46,'0','MP','London','','','','agent@mountainpartnership.co.uk','',',1,','2015-01-05 11:13:38','2015-01-05 11:14:41');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (47,'0','JHK','London','','','','info@jhk.co.uk','',',1,','2015-01-05 11:13:56','2015-01-05 11:14:07');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (48,'0','Home Connect','London','','','','info@homeconnectestates.com','',',1,','2015-01-05 11:15:29','2015-01-05 11:19:17');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (49,'0','JDM Lettings','London','','','','lettingsbromley@jdmonline.com','',',1,','2015-01-05 11:16:06','2015-01-05 11:19:30');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (50,'0','JDM','London','','','','bh@jdmonline.com','',',1,','2015-01-05 11:16:41','2015-01-05 11:19:23');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (51,'0','Elliott Davis','London','','','','info@elliottdavis.co.uk','',',1,','2015-01-05 11:17:07','2015-01-05 11:18:58');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (52,'0','Elpaya','London','','','','info@elpaya.com','',',1,','2015-01-05 11:17:24','2015-01-05 11:19:06');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (53,'0','First Estates','London','','','','info@firstestates.co.uk','',',1,','2015-01-05 11:17:44','2015-01-05 11:19:11');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (54,'0','Douglas, Lyons & Lyons','London','','','','enquiries@dll.uk.com','',',1,','2015-01-05 11:18:06','2015-01-05 11:18:53');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (55,'0','CMC Estates','London','','','','info@cmcestates.co.uk','',',1,','2015-01-05 11:18:24','2015-01-05 11:18:47');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (56,'0','Central Estate Agents','London','','','','enquiries@central-estates.co.uk','',',1,','2015-01-05 11:20:17','2015-01-05 11:20:24');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (57,'0','Campbell Residential','London','','','','john@campbellresidential.co.uk','',',1,','2015-01-05 11:20:55','2015-01-05 11:23:07');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (58,'0','Avrasons Lettings','London','','','','lettings@avrasons.co.uk','',',1,','2015-01-05 11:21:19','2015-01-05 11:23:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (59,'0','Avrasons Admin','London','','','','admin@avrasons.co.uk','',',1,','2015-01-05 11:21:34','2015-01-05 11:22:55');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (60,'0','Arnold & Goodall Sales','London','','','','sales@arnoldandgoodall.co.uk','',',1,','2015-01-05 11:22:06','2015-01-05 11:22:42');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (61,'0','Arnold & Goodall Lettings','London','','','','lettings@arnoldandgoodall.co.uk','',',1,','2015-01-05 11:22:32','2015-01-05 11:22:49');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (63,'0','Harlesden Heights','London','','','','admin@harlesdenheights.com','',',1,','2015-01-05 11:25:07','2015-01-05 11:25:23');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (64,'0','Tatlers 1','London','','','','n2@tatlers.co.uk','',',1,','2015-01-05 11:25:49','2015-01-05 11:26:39');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (65,'0','Tatlers 2','London','','','','n8@tatlers.co.uk','',',1,','2015-01-05 11:26:16','2015-01-05 11:26:46');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (66,'0','Tatlers 3','London','','','','n10@tatlers.co.uk','',',1,','2015-01-05 11:26:30','2015-01-05 11:26:51');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (67,'0','Matthew James','London','','','','mjs@matthewjames.co.uk','',',1,','2015-01-05 11:28:15','2015-01-05 11:28:23');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (68,'0','Lourdes','London','','','','docklands@lourdes-estates.com','',',1,','2015-01-05 11:35:49','2015-01-05 11:35:59');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (69,'0','Breteuil','London','','','','chelsea@breteuil.co.uk','',',1,','2015-01-05 11:36:38','2015-01-05 11:36:46');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (70,'0','Marcus Kemp','London','','','','marcuskemp@marcuskemp.co.uk','',',1,','2015-01-05 11:37:46','2015-01-05 11:37:55');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (71,'0','Coppermills','London','','','','info@coppermills.co.uk','',',1,','2015-01-05 11:43:16','2015-01-05 11:43:24');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (72,'0','Arlington Estates','London','','','','info@arlingtonestates.co.uk','',',1,','2015-01-05 11:46:25','2015-01-05 11:46:31');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (73,'0','BGN - Plumbing & Heating','London','','','','info@bgnplumbingandheating.co.uk','',',2,','2015-01-05 12:02:28','2015-01-05 12:02:36');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (75,'0','Bolier Breakdowns','London','Guilford St, London Borough of Camden, Central London, London','WC1N 1DP','','enquiries@boilerbreakdowns.com','020 8560 3658',',2,','2015-01-05 12:05:49','2015-01-05 13:00:28');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (76,'0','Chilli Pepper Plumbing','London','Unit 25, Worcester Road, Uxbridge','UB8 3TH','','sales@cpfm.com','01895 230175',',2,','2015-01-05 12:06:30','2015-01-05 13:02:05');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (77,'0','Able Group Plumbing','London','','','','sales@able-group.co.uk','0800 046 6890',',2,','2015-01-05 12:07:07','2015-01-05 12:46:15');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (78,'0','Add Detail Plumbing','London',' 10A, HOLLY PARK ROAD, LONDON','N11 3HD','','enquiries@adddetail.com','020 3837 9660',',2,','2015-01-05 12:07:59','2015-01-05 12:45:14');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (79,'0','Ascot Plumbing and Heating','London',' Porchester Rd, London',' W2 6ET','','info@ascotplumbingandheating.com','0203 285 8849 & 0800 1522650',',2,','2015-01-05 12:09:28','2015-01-05 12:48:04');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (80,'0','Ability 1st Plumbing','London, Bromley','','BR2','','info@ability1st.co.uk','020 8462 3113 & 0800 027 6886',',2,','2015-01-05 12:09:58','2015-01-05 12:45:31');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (81,'0','JML Plumbing','London','','','','jmlbuildingservices@hotmail.co.uk','',',2,','2015-01-05 12:10:30','2015-01-05 12:10:39');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (82,'0','Blueman Plumbing','London','Ridge Road, North Cheam, Sutton, Surrey','SM3 9LS','','ali@bluemanplumbing.com','020 8644 4414',',2,','2015-01-05 12:56:46','2015-01-05 12:57:07');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (83,'0','Empire Heating','London','19 Pearce House, Montaigne Close, Victoria, London','SW1P 4AY','','info@empireheating.co.uk','020 7624 4000',',2,','2015-01-05 13:04:22','2015-01-05 13:04:28');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (84,'0','GBS Plumbers','London','A07 Atlas Business Centre Oxgate Lane','NW2 7HJ','','info@gbsservice.co.uk','02084 506 268 & 07870 976 301',',2,','2015-01-05 13:23:15','2015-01-05 13:23:23');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (85,'0','HDM Services Plumbing','London','HDM Services Ltd, 21 Page Heath Villas, Bromley, London','BR1 2QN','','info@hdmservices.co.uk','020 8460 6474',',2,','2015-01-05 13:27:40','2015-01-05 13:27:48');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (86,'0','Hackney Plumbing & Heating','London','','','','service@hackneyplumbingandheating.co.uk','0800 311 8051',',2,','2015-01-05 13:31:08','2015-01-05 13:31:23');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (87,'0','T & M Plumbing Services','London',' Norwood Road, London','SE27 9DL','','info@cannonplumbingservices.co.uk','0203 780 8670 & 020 3780 3561',',2,','2015-01-05 13:38:28','2015-01-05 13:39:33');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (88,'0','PHGAS LTD','London','','','','phgasltd@gmail.com','0208 360 0801',',2,','2015-01-05 13:43:43','2015-01-05 13:43:56');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (89,'0','Plumbingwerx','London','','','','plumbingwerx@hotmail.com','08000 43 23 93 & 07523 289248',',2,','2015-01-05 13:49:19','2015-01-05 13:49:34');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (90,'0','Bentley Plumbing','London','','','','info@bentleyplumbing.co.uk','0208 914 8331',',1,','2015-01-05 14:04:11','2015-01-05 14:04:31');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (91,'0','TLS Plumbing','London','','','','sales@tlsplumbingandheating.co.uk','0800 043 3035',',2,','2015-01-05 14:06:14','2015-01-05 14:06:24');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (92,'0','Partners 247 Plumbers','Manchester','83 Ducie Street Manchester','M1 2JQ','','info@pm247.co.uk','0800 014 7509 & 0300 303 0110',',2,','2015-01-05 14:16:20','2015-01-05 14:16:39');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (93,'0','West London Gas Ltd','London',' Boundary House, Boston Rd, London ','W7 2QE','','admin@westlondongas.com','020 8434 3644',',2,','2015-01-05 14:23:37','2015-01-05 14:24:04');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (94,'0','A 10 Boiler spares','London','7-8 Cheapside, Palmers Green, London','N13 5ED','','a10boilerspares@yahoo.co.uk','0208 887 0577',',2,','2015-01-05 14:28:39','2015-01-05 14:28:53');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (95,'0','Alliance Heating Services','London','7-11 Minerva Road, London ','NW10 6HJ','','info@allianceheatingservices.co.uk','07745730667 & 08000 12 13 66',',2,','2015-01-05 14:37:30','2015-01-05 14:37:37');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (96,'0','Davis Industrial Plastics - Pipes ','Crawley','','RH10','','ns@davis-plastics.co.uk','01293 552836',',2,','2015-01-05 14:47:07','2015-01-05 14:47:20');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (97,'0','Fraser & Ellis - Pipes and Fittings','London','80 – 100 Gwynne Road, Battersea,  London','SW11 3UW','','sales@fraserellis.co.uk','020 7228 9999',',2,','2015-01-05 14:48:56','2015-01-05 14:49:03');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (98,'0','Tap N Bath - Plumbers Merchants','London','','SE24 9AA','','info@tapnbath.com','',',2,','2015-01-05 14:51:39','2015-01-05 14:52:04');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (99,'0','BMS - Plumbers Merchants','London','76 Berwick Street, London','W1F 8TQ','','sales@bmsw1.com','020 7437 1999',',2,','2015-01-05 14:53:26','2015-01-05 14:53:46');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (100,'0','Kee Systems - Gates and Relings','London','Thornsett Road, Wandsworth, London','SW18 4EW','','ordering@keesystems.com','0208 874 6566',',2,','2015-01-05 15:01:55','2015-01-05 15:02:07');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (101,'0','Navton Shirland Ltd - Pipes & Fittings','London','180 Shirland Road, London','W9 3JE','','navton@btconnect.com','020 7289 5639',',2,','2015-01-05 15:11:27','2015-01-05 15:11:41');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (102,'0','Bansal - Plumbing','London',' 313-319, High Road Leytonstone, London','E11 4JT','','sales@bansal.co.uk','020 8556 0223',',2,','2015-01-05 15:13:37','2015-01-05 15:13:53');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (103,'0',' T.H.L Ltd - Plumber\"s Merchant','London','58-60 High Street Hornsey, London','N8 7NX','','info@thlplumbingbathrooms.co.uk','020 8348 3020',',2,','2015-01-05 15:17:45','2015-01-05 15:17:53');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (104,'0','Tower DYI - Plumber\"s Merchant','London','539 Commercial Road, London','E1 0HA','','info@towerdiy.co.uk','020 7790 6461',',2,','2015-01-05 15:19:28','2015-01-05 15:19:42');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (105,'0','Wellworth - Plumber\"s Merchants','London','2 Tudor Road Hackney, London','E9 7SN','','info@wellworthlondonltd.co.uk','020 8510 0116',',2,','2015-01-05 15:21:23','2015-01-05 15:21:31');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (106,'0','A C Kemp - Heating','London','60 Lister Court, London','N16 0BE','','info@ackempheating.co.uk','07813 963 965',',2,','2015-01-05 15:23:05','2015-01-05 15:23:31');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (107,'0','RHS Services Ltd - Boilers','London','44 Forest Court, London','E11 1PL','','rsfct@btinternet.com','020 8530 5996',',2,','2015-01-05 15:26:06','2015-01-05 15:26:17');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (108,'0','Hackney Boiler Spares','London','30c King Edwards Road, London','E9 7SF','','info@hackneyboilerspares.com','02089855562 & 07436793714',',2,','2015-01-05 15:28:40','2015-01-05 15:28:49');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (109,'0','Astral - Plumner\"s Merchant','London','Unit 5-6 Cygnus Business Centre, Dalmeyer Road, Brent, London','NW10 2XA','','info@astralagencies.co.uk','020 8459 1687',',2,','2015-01-05 15:30:13','2015-01-05 15:30:26');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (110,'0','LIVING SOCIAL - DEAL PORTAL','London','','','','www.livingsocial.com/gb/cities/1569-national-uk','+44 0203-356-0899',',1,2,','2015-01-05 15:48:50','2015-01-05 15:52:13');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (111,'0','N CROWD - DEAL PORTAL','London','','','','www.ncrowd.co.uk/get-featured','0888-647-2830',',1,2,','2015-01-05 15:51:12','2015-01-05 15:51:46');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (112,'0','BE SPOKE - DEAL PORTAL','London','','','','servicing@bespokeoffers.co.uk','0800 161 5349',',1,2,','2015-01-05 15:55:12','2015-01-05 15:55:26');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (113,'0','WOWCHER - DEAL PORTAL','London','','','','nationaldeals@wowcher.co.uk','0203 615 4482',',1,2,','2015-01-05 15:58:36','2015-01-05 15:58:47');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (114,'0','TANGA - DEAL PORTAL','National','','','','www.tanga.com/sell-with-us','',',1,2,','2015-01-05 16:06:00','2015-01-05 16:06:12');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (115,'0','Stacey Zuckerman','London','','','','stacey14zuckerman@gmail.com','',',2,','2015-01-06 11:09:20','2015-01-06 11:09:38');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (116,'0','H Hirst & Sons - Bakery','London','350 Lewisham High Street, London','SE13 6LE','','info@hirstbakery.co.uk','020 8690 2297','','2015-01-06 14:43:00','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (117,'0','BB Bakery - Bakery','London','6-7 Chandos Place Covent Garden London','WC2N 4HU','','info@bbbakery.co.uk','020 3026 1188','','2015-01-06 14:55:23','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (118,'0','BETTER HEALTH BAKERY - Bakery','London','13 Stean street, London','E8 4ED','','bakery@centreforbetterhealth.org.uk','020 7254 9103','','2015-01-06 14:56:53','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (119,'0','Home Connexions 2','East Kilbride ','21 Saint James Avenue, Saint James Retail Park, Hairmyres, East Kilbride ','G74 5QD','','sales@homeconnexions.co.uk','01355 244155',',','2015-01-06 15:00:17','2015-01-06 16:06:22');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (120,'0','Home Connexions 1','East Kilbride','21 Saint James Avenue, Saint James Retail Park, Hairmyres, East Kilbride','G74 5QD','','letting@homeconnexions.co.uk','01355 244155',',','2015-01-06 15:01:27','2015-01-06 16:06:07');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (121,'0','Aberdeen Property Leasing','Aberdeen','Rosemount House, 138-140 Rosemount Place, Aberdeen ','AB25 2YU','','info@a-p-l.co.uk','01224 635355','','2015-01-06 15:03:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (122,'0','AB + S Estate Agents','Moray','24 Batchen Street, Elgin Moray','IV30 1BH','','enquiries@abands.uk.com','01343 564123','','2015-01-06 15:06:25','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (123,'0','Alfred Pallas 1','Fulwell','64 Sea Road, Sunderland, Tyne And Wear ','SR6 9DB','','fulwell@alfredpallas.com','0191 5482166','','2015-01-06 15:08:54','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (124,'0','Alfred Pallas 2','Boldon','11 Struan Terrace East Boldon Tyne And Wear ','NE36 0EE','','boldon@alfredpallas.com','0191 5193333','','2015-01-06 15:09:43','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (125,'0','Alfred Pallas 3','Sunderland','7 Holmeside Sunderland Tyne And Wear ','SR1 3JG','','city@alfredpallas.com','0191 5654433','','2015-01-06 15:10:45','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (126,'0','Alfred Pallas 4','Sunderland','64 Sea Road Sunderland ','SR6 9DB','','sales@pallasjones.co.uk','0191 5483622','','2015-01-06 15:11:43','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (127,'0','Alistair Bone Estate Agents','Gloucester ','10 Old Cheltenham Rd Longlevens Gloucester ','GL2 0AW','','info@alistairbone.co.uk','01452 550123','','2015-01-06 15:13:28','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (128,'0','Andrew Lawson Estate Agents','Newcastle','54 St. Georges Terrace, Jesmond Newcastle Upon Tyne ','NE22SY','','andrew_lawson@btconnect.com','(0191) 212 0066','','2015-01-06 15:15:00','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (129,'0','Barker & Bass Estate Agents','Northamptonshire','14 High Street Rushden Northamptonshire ','NN10 0PR','','sales@barkerandbass.co.uk','01933 417 317','','2015-01-06 15:17:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (130,'0','Bensons Estate Agents 1','East Kilbride ','4 Stuart Street East Kilbride ','G74 4NG','','lettings@bensonsestateagents.com','01355 586420',',','2015-01-06 15:20:21','2015-01-06 15:20:36');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (131,'0','Bensons Estate Agents 2','Glasgow','Baillieston Branch 211 Glasgow Road Glasgow ','G69 3EZ','',' sales@bensonsestateagents.com','0141 773 4000','','2015-01-06 15:21:48','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (132,'0','Bomford & Coffey Estate Agents 1','Worcestershire ','14 Broad Street Pershore Worcestershire ','WR10 1AY','','lettings@bomfordandcoffey.co.uk','01386 555368','','2015-01-06 15:23:24','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (133,'0','Bomford & Coffey Estate Agents 2','Worcestershire ','14 Broad Street Pershore Worcestershire ','WR10 1AY','','residential@bomfordandcoffey.co.uk','01386 555368','','2015-01-06 15:24:14','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (134,'0','Bomford & Coffey Estate Agents 3','Worcestershire ','14 Broad Street Pershore Worcestershire ','WR10 1AY','','lettings@bomfordandcoffey.co.uk','01386 555368','','2015-01-06 15:25:01','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (135,'0','Bomford & Coffey Estate Agents 4','Worcestershire','14 Broad Street Pershore Worcestershire ','WR10 1AY','','residential@bomfordandcoffey.co.uk','01386 555368','','2015-01-06 15:25:52','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (136,'0','Dunn\"s Bakery','London','6 The Broadway Crouch End','N8 9SN','','info@dunns-bakery.co.uk','020 8340 1614','','2015-01-06 15:28:34','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (137,'0','Fleet River Bakery','London','71 Lincolns Inn Fields, London','WC2A 3JF','','info@fleetriverbakery.com','020 7691 1457','','2015-01-06 16:20:37','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (138,'0','Fornetti - Bakery','London','Apex House, Fulton Road, London','HA9 0TF ','','info@fornettilondon.com','02087950646','','2015-01-06 16:28:20','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (139,'0','Giffords - Bakers','London','20/22 Station Road, Chingford, London   ','E47BE ','','nicholas@giffordsbakers.co.uk','02085291056 & 07704977607','','2015-01-06 16:31:36','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (140,'0','Karaway - Bakery','Essex','Unit 22 Rippleside Commercial Estate, Ripple Road  Barking  Essex ','IG11 0RJ','','info@karawaybakery.com','+44 (0)2085175533','','2015-01-06 16:33:55','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (141,'0','Kindred Bakery','London','23 Half Moon Lane Herne Hill London','SE24 9JU','','info@kindredbakery.co.uk','020 7642 0799','','2015-01-06 16:35:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (142,'0','Kindred Bakery','London','23 Half Moon Lane Herne Hill London','SE24 9JU','','info@kindredbakery.co.uk','020 7642 0799','','2015-01-06 16:35:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (143,'0','Nafees Bakers','London','','','','info@Nafees-Bakers.com','','','2015-01-06 16:37:39','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (144,'0','Paprika Stores - HU Store','London','50 Grand Parade, Green Lanes, London','N4 1AG ','','info@paprikastore.co.uk','0203-645-9092','','2015-01-06 16:44:29','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (145,'0','Percy Ingle Bakeries Ltd Bakers & Confectioners','London','210 Church Road, Leyton, London','E10 7JQ','','info@percy-ingle.co.uk','020 8556 9431','','2015-01-06 16:47:06','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (146,'0','Roni\"s - Bakery','London','WEST HAMPSTEAD  250 WESTEND LANE','NW6 1LG','',' info@ronisonline.com ','0207 794 6663','','2015-01-06 16:48:42','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (147,'0','Savera Bakery','London','155 Cannon Street Road, Aldgate, London ','E1 2LX','','enquiries@savera.co.uk','020 74807333','','2015-01-06 16:50:48','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (148,'0','Bowden Partners - Estate Agency','Devon','66 Fore Street, St Marychurch, Torquay, Devon','TQ1 4LX','','Office@BowdenPartners.co.uk','01803 313228','','2015-01-07 08:42:52','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (149,'0','PJ Bradley Properties','Warrenpoint ',' 25 Duke Street,  Warrenpoint ','BT34 3JY','','info@pjbradleyonline.com','028 4177 3777','','2015-01-07 08:44:32','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (150,'0','Brentwood Estates','Birmingham','484-486 Bearwood Road Bearwood West Midlands','B66 4HA','','info@brentwoodestates.co.uk','0121-429 4442','','2015-01-07 08:46:37','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (151,'0','Brown and Kay - Estate Agency','Poole','30 Hill Street, Poole','BH15 1NR','','info@brownandkay.co.uk','01202 676292','','2015-01-07 08:50:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (152,'0','Buchanan Burton Solicitors','Glasgow','Strathmore House East Kilbride Glasgow ','G74 1LQ','','mailbox@buchananburton.co.uk','01355 249228','','2015-01-07 08:51:16','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (153,'0','Bullock & Lees Estate Agency','Bournemouth','192 Seabourne Road Bournemouth ','BH5 2JB','','bullockandleesltd@btconnect.com','01202 423 434','','2015-01-07 08:54:11','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (154,'0','Bush Lettings','Cambridge','8 The Broadway, Mill Road Cambridge ','CB1 3AH','','info@bushlettings.co.uk','01223 508085','','2015-01-07 08:55:25','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (155,'0','Nick Champion - Estate Agency','','','','','enquiries@nickchampion.co.uk','01584 810555','','2015-01-07 08:59:32','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `customers` VALUES (156,'0','Churchill\"s Estate Agents','Devon','25 Fore Street, Brixham, Devon','TQ5 8AA','','property@churchillsbrixham.co.uk','01803 882671','','2015-01-07 09:04:52','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `emails_templates` VALUES (1,'0','Webiste - contact form','Webiste - contact form','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Hi #name#,<br /><br />Your details to login to your admin:<br />login: <strong>#login#</strong><br />password: <strong>#password#</strong><br /><br />Brgds,<br />#site_name#</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>','0000-00-00 00:00:00','2013-11-24 15:02:13');";
$result = @mysql_query ($query);

$query = "INSERT INTO `emails_templates` VALUES (2,'0','Admin - forgot password','Admin - forgot password','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Hi #name#,<br /><br />Your details to login to your admin:<br />login: <strong>#login#</strong><br />password: <strong>#password#</strong><br /><br />Brgds,<br />#site_name#</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>','0000-00-00 00:00:00','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `emails_templates` VALUES (3,'0','Registration','Registration confirmation','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Hi #name#,<br /><br />Thank you for your registration, we hope thaht you will be very happy about using dadhed.<br /><br />Click link below to confirm you registration:<br /><strong>#link_confirm#</strong><br /><br />Brgds,<br />#site_name#</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>','2014-01-13 07:33:43','2014-04-09 17:10:34');";
$result = @mysql_query ($query);

$query = "INSERT INTO `emails_templates` VALUES (4,'0','User - forgot password','User - forgot password','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Hi #name#,<br /><br />New password: <strong>#password#</strong><br /><br />Brgds,<br />#site_name#</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</body>
</html>','2014-01-13 07:34:00','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `invoices` VALUES (1,'0','1','0','2','2014-07-15','2014-07-29','2014-12-27 07:07:29','2014-12-27 07:34:51');";
$result = @mysql_query ($query);

$query = "INSERT INTO `invoices` VALUES (2,'0','2','0','1','2014-01-08','2014-01-22','2014-12-27 07:10:06','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `invoices` VALUES (3,'0','1','0','3','2014-10-01','2014-10-31','2014-12-27 07:38:08','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `invoices_products` VALUES (1,'0','2','Development time','20','25.0000000000','2014-12-27 07:32:11','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `invoices_products` VALUES (2,'0','1','Development work on portal thenationalstudent.com','1','4500.0000000000','2014-12-27 07:35:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `invoices_products` VALUES (3,'0','3','Development work on athena2 CRM','1','1000.0000000000','2014-12-27 07:38:46','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `newsletter_sent` VALUES (1,'0','11','test1','test11','2014-10-30 00:00:00','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `newsletter_sent` VALUES (2,'0','12','Test 2','Testing the newsletter functionality :)','2014-10-30 00:00:00','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `newsletter_sent` VALUES (3,'0','9','Test Agent','Test email to all agents','2014-10-30 00:00:00','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `products` VALUES (1,'0','Estate agency','2015-01-04 12:05:06','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `products` VALUES (2,'0','Website package 1','2015-01-04 12:05:20','2015-01-08 18:07:51');";
$result = @mysql_query ($query);

$query = "INSERT INTO `settings` VALUES (3,'5','E-mail server','finecms.eu','0000-00-00 00:00:00','2014-06-21 08:22:26');";
$result = @mysql_query ($query);

$query = "INSERT INTO `settings` VALUES (5,'6','E-mail password:','zbawiciel83','0000-00-00 00:00:00','2014-06-21 08:22:18');";
$result = @mysql_query ($query);

$query = "INSERT INTO `settings` VALUES (6,'4','E-mail server port','25','0000-00-00 00:00:00','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `settings` VALUES (10,'1','Site url','http://innovative.02.looknet.pl/website1/','0000-00-00 00:00:00','2014-06-04 07:48:31');";
$result = @mysql_query ($query);

$query = "INSERT INTO `settings` VALUES (47,'3','E-mail','l.sojka@finecms.eu','2013-12-05 07:19:13','2014-05-15 08:35:55');";
$result = @mysql_query ($query);

$query = "INSERT INTO `settings` VALUES (46,'2','Site name','Demo','2013-12-05 07:18:34','2014-02-06 10:25:43');";
$result = @mysql_query ($query);

$query = "INSERT INTO `settings_invoices` VALUES (1,'0','Invoice Number','1','<!DOCTYPE html>
<html>
<head>
</head>
<body>

</body>
</html>','2015-01-02 08:43:16','2015-01-02 09:28:06');";
$result = @mysql_query ($query);

$query = "INSERT INTO `settings_invoices` VALUES (2,'0','Issued by','Dagmara Sokolowska','','2015-01-02 08:43:42','2015-01-02 08:44:10');";
$result = @mysql_query ($query);

$query = "INSERT INTO `settings_invoices` VALUES (3,'0','Account Manager','Dagmara Sokolowska','','2015-01-02 08:44:06','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `settings_invoices` VALUES (4,'0','Please send payment to','','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>12a Delamare Road<br /> SW20 8PS <br />Wimbledon London<br /><br />Account Number: 20-79-29 70773840</p>
</body>
</html>','2015-01-02 08:47:57','2015-01-02 08:49:03');";
$result = @mysql_query ($query);

$query = "INSERT INTO `settings_invoices` VALUES (5,'0','Logo','','<!DOCTYPE html>
<html>
<head>
</head>
<body>

</body>
</html>','2015-01-02 08:50:35','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (1,'0','12','1','2015-01-12','3','Website package - promotion','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Dzisiaj gadałem z gościem, był zachwycony, trzeba zadzwonić jeszce raz</p>
</body>
</html>','2015-01-03 09:33:50','2015-01-05 07:23:31');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (132,'0','1','3','2015-01-13','143','Nafees Bakers - Website under construction','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Email sent from <a href=\"mailto:info@innovative\">info@innovative</a> - website under construction</p>
</body>
</html>','2015-01-06 16:41:06','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (11,'0','12','3','2015-01-16','112','BE SPOKE','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Offer submitted - have to wait for Be SPoke to get back to us</p>
</body>
</html>','2015-01-06 10:00:35','2015-01-09 09:36:17');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (12,'0','12','3','2015-01-13','110','LIVING SOCIAL','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Registered again - they should get in touch within a week</p>
</body>
</html>','2015-01-06 10:20:20','2015-01-06 10:28:59');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (13,'0','12','3','2015-01-13','111','N CROWD','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Registered again, awaiting reply</p>
</body>
</html>','2015-01-06 10:26:58','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (14,'0','12','3','2015-01-13','113','WOWCHER','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Registered on the portal</p>
<p>Sent email notification to WOWcher team asking for updates</p>
<p>Sent another query to Wowcher team after their email:</p>
<pre>Hi,

Please could send us a link to your website and we will review. It would also be great if you could provide a brief trading history.

Thanks!

Wowcher<br /><br /><br />Will email team again in a week if no resp.call</pre>
</body>
</html>','2015-01-06 10:33:32','2015-01-06 10:36:08');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (15,'0','12','3','2015-01-12','115','Stacey Zuckerman','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Stacey was suppose to coma back to us to discuss the website, will wait and email her again:</p>
<p>Her last email:</p>
<div dir=\"ltr\">Hi Dagmara
<div>&nbsp;</div>
<div>I left you a message on Lucas\"s phone.&nbsp; I would very much like to sit down and speak with you guys about a website.&nbsp; Perhaps in January since we are all very busy at present.</div>
<div>Thank you so much for getting in touch. &nbsp;</div>
<div>&nbsp;</div>
<div>Have a wonderful Christmas, and a Happy New Year.</div>
<div>&nbsp;</div>
<div>Regards,</div>
<div>Stacey</div>
</div>
</body>
</html>','2015-01-06 11:11:01','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (16,'0','12','3','0000-00-00','3','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:03','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (17,'0','12','3','0000-00-00','4','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:03','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (18,'0','12','3','0000-00-00','5','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:03','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (19,'0','12','3','0000-00-00','6','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (20,'0','12','3','0000-00-00','7','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (21,'0','12','3','0000-00-00','8','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (22,'0','12','3','0000-00-00','12','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (23,'0','12','3','0000-00-00','10','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (24,'0','12','3','0000-00-00','11','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (25,'0','12','3','0000-00-00','13','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (26,'0','12','3','0000-00-00','14','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (27,'0','12','3','0000-00-00','15','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (28,'0','12','3','0000-00-00','16','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (29,'0','12','3','0000-00-00','17','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (30,'0','12','3','0000-00-00','18','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (31,'0','12','3','0000-00-00','19','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (32,'0','12','3','0000-00-00','20','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (33,'0','12','3','0000-00-00','21','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (34,'0','12','3','0000-00-00','22','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (35,'0','12','3','0000-00-00','23','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (36,'0','12','3','0000-00-00','24','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (37,'0','12','3','0000-00-00','25','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (38,'0','12','3','0000-00-00','26','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (39,'0','12','3','0000-00-00','27','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (40,'0','12','3','0000-00-00','28','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (41,'0','12','3','0000-00-00','29','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (42,'0','12','3','0000-00-00','30','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (43,'0','12','3','0000-00-00','31','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (44,'0','12','3','0000-00-00','32','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (45,'0','12','3','0000-00-00','33','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (46,'0','12','3','0000-00-00','34','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (47,'0','12','3','0000-00-00','35','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (48,'0','12','3','0000-00-00','36','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (49,'0','12','3','0000-00-00','37','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (50,'0','12','3','0000-00-00','38','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (51,'0','12','3','0000-00-00','39','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (52,'0','12','3','0000-00-00','40','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (53,'0','12','3','0000-00-00','41','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (54,'0','12','3','0000-00-00','42','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (55,'0','12','3','0000-00-00','43','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (56,'0','12','3','0000-00-00','44','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (57,'0','12','3','0000-00-00','45','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (58,'0','12','3','0000-00-00','46','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (59,'0','12','3','0000-00-00','47','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (60,'0','12','3','0000-00-00','48','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (61,'0','12','3','0000-00-00','49','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (62,'0','12','3','0000-00-00','50','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (63,'0','12','3','0000-00-00','51','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (64,'0','12','3','0000-00-00','52','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (65,'0','12','3','0000-00-00','53','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (66,'0','12','3','0000-00-00','54','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (67,'0','12','3','0000-00-00','55','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (68,'0','12','3','0000-00-00','56','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (69,'0','12','3','0000-00-00','57','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (70,'0','12','3','0000-00-00','58','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (71,'0','12','3','0000-00-00','59','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (72,'0','12','3','0000-00-00','60','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (73,'0','12','3','0000-00-00','61','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (74,'0','12','3','0000-00-00','63','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (75,'0','12','3','0000-00-00','64','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (76,'0','12','3','0000-00-00','65','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (77,'0','12','3','0000-00-00','66','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (78,'0','12','3','0000-00-00','67','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (79,'0','12','3','0000-00-00','68','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (80,'0','12','3','0000-00-00','69','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (81,'0','12','3','0000-00-00','70','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (82,'0','12','3','0000-00-00','71','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (83,'0','12','3','0000-00-00','72','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (84,'0','12','3','0000-00-00','90','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (85,'0','12','3','0000-00-00','110','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (86,'0','12','3','0000-00-00','111','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (87,'0','12','3','0000-00-00','112','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (88,'0','12','3','0000-00-00','113','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (89,'0','12','3','0000-00-00','114','Manage your Real Estate Business with advanced tools to make the most of the market opportunities','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (90,'0','12','3','0000-00-00','1','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:11','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (91,'0','12','3','0000-00-00','73','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:11','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (92,'0','12','3','2015-01-13','75','Your Commercial objectives are our priority - with this email you get 30% off!','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Send email reminder</p>
</body>
</html>','2015-01-06 11:43:12','2015-01-06 14:30:14');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (93,'0','12','3','2015-01-13','76','Your Commercial objectives are our priority - with this email you get 30% off!','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Sent email reminder</p>
</body>
</html>','2015-01-06 11:43:12','2015-01-06 14:31:39');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (94,'0','12','3','2015-01-13','77','Your Commercial objectives are our priority - with this email you get 30% off!','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Sent email reminder</p>
</body>
</html>','2015-01-06 11:43:12','2015-01-06 14:40:17');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (95,'0','12','3','0000-00-00','78','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (96,'0','12','3','0000-00-00','79','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (97,'0','12','3','0000-00-00','80','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (98,'0','12','3','0000-00-00','81','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (99,'0','12','3','0000-00-00','82','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (100,'0','12','3','0000-00-00','83','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (101,'0','12','3','0000-00-00','84','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (102,'0','12','3','0000-00-00','85','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (103,'0','12','3','0000-00-00','86','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (104,'0','12','3','0000-00-00','87','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (105,'0','12','3','0000-00-00','88','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (106,'0','12','3','0000-00-00','89','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (107,'0','12','3','0000-00-00','91','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (108,'0','12','3','0000-00-00','92','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (109,'0','12','3','0000-00-00','93','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (110,'0','12','3','0000-00-00','94','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (111,'0','12','3','0000-00-00','95','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (112,'0','12','3','0000-00-00','96','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (113,'0','12','3','0000-00-00','97','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (114,'0','12','3','0000-00-00','98','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (115,'0','12','3','0000-00-00','99','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (116,'0','12','3','0000-00-00','100','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (117,'0','12','3','0000-00-00','101','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (118,'0','12','3','0000-00-00','102','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (119,'0','12','3','0000-00-00','103','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (120,'0','12','3','0000-00-00','104','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (121,'0','12','3','0000-00-00','105','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (122,'0','12','3','0000-00-00','106','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (123,'0','12','3','0000-00-00','107','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (124,'0','12','3','0000-00-00','108','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (125,'0','12','3','0000-00-00','109','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (126,'0','12','3','0000-00-00','110','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (127,'0','12','3','0000-00-00','111','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (128,'0','12','3','0000-00-00','112','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (129,'0','12','3','0000-00-00','113','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (130,'0','12','3','0000-00-00','114','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets` VALUES (131,'0','12','3','0000-00-00','115','Your Commercial objectives are our priority - with this email you get 30% off!','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (1,'1','0','12','1','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>asdsadasadsdawasdd as dsad asd aasd a</p>
</body>
</html>','2015-01-03 15:16:32','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (2,'1','0','12','1','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>asdsadasadsdawasdd as dsad asd aasd aasda sasd asdasd asdas </p>
</body>
</html>','2015-01-03 15:16:47','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (3,'1','0','12','1','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>asdsadasadsdawasdd as dsad asd aasd aasda sasdasdasd asdasd asdas</p>
</body>
</html>','2015-01-03 15:20:10','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (4,'5','0','1','1','test2','2015-01-04 00:00:00','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (5,'6','0','1','1','test2','2015-01-04 00:00:00','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (6,'7','0','1','1','test2','2015-01-04 12:41:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (7,'8','0','1','1','test2','2015-01-04 12:41:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (8,'1','0','12','1','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Dzisiaj gadałem z gościem, był zachwycony, trzeba zadzwonić jeszce raz</p>
</body>
</html>','2015-01-05 07:23:31','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (9,'9','0','1','1','E-mail z promocja. Bla bla... ','2015-01-05 07:26:40','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (10,'10','0','1','1','E-mail z promocja. Bla bla... ','2015-01-05 07:26:40','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (11,'11','0','12','3','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Portal has got 5 working days to come back with an answer</p>
<p>Finish registration - Bank address required</p>
</body>
</html>','2015-01-06 10:06:24','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (12,'12','0','12','3','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Registered again - they should get in touch within a week</p>
</body>
</html>','2015-01-06 10:28:59','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (13,'14','0','12','3','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Registered on the portal</p>
<p>Sent email notification to WOWcher team asking for updates</p>
</body>
</html>','2015-01-06 10:34:13','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (14,'14','0','12','3','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Registered on the portal</p>
<p>Sent email notification to WOWcher team asking for updates</p>
<p>Sent another query to Wowcher team after their email:</p>
<pre>Hi,

Please could send us a link to your website and we will review. It would also be great if you could provide a brief trading history.

Thanks!

Wowcher
</pre>
</body>
</html>','2015-01-06 10:35:16','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (15,'14','0','12','3','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Registered on the portal</p>
<p>Sent email notification to WOWcher team asking for updates</p>
<p>Sent another query to Wowcher team after their email:</p>
<pre>Hi,

Please could send us a link to your website and we will review. It would also be great if you could provide a brief trading history.

Thanks!

Wowcher<br /><br /><br />Will email team again in a week if no resp.call</pre>
</body>
</html>','2015-01-06 10:36:08','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (16,'16','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:03','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (17,'17','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:03','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (18,'18','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:03','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (19,'19','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (20,'20','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (21,'21','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (22,'22','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (23,'23','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (24,'24','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (25,'25','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (26,'26','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (27,'27','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (28,'28','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (29,'29','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (30,'30','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (31,'31','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (32,'32','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (33,'33','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (34,'34','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (35,'35','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (36,'36','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (37,'37','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (38,'38','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (39,'39','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (40,'40','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (41,'41','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (42,'42','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (43,'43','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (44,'44','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (45,'45','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (46,'46','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (47,'47','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (48,'48','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (49,'49','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (50,'50','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (51,'51','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (52,'52','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (53,'53','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (54,'54','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (55,'55','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (56,'56','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (57,'57','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (58,'58','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (59,'59','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (60,'60','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (61,'61','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (62,'62','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:04','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (63,'63','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (64,'64','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (65,'65','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (66,'66','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (67,'67','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (68,'68','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (69,'69','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (70,'70','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (71,'71','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (72,'72','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (73,'73','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (74,'74','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (75,'75','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (76,'76','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (77,'77','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (78,'78','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (79,'79','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (80,'80','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (81,'81','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (82,'82','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (83,'83','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (84,'84','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (85,'85','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (86,'86','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (87,'87','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (88,'88','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (89,'89','0','12','3','Good Morning,

Our company Innovative Technologies Development would like to offer you a free 30 days trial of complex solution for residential and commercial property/client management system http://innovative-technologies.co.uk/estate_agency/

Our offer goes far beyond standard functionality of property management, ITD Software was designed for Real Estate sector, to meet all aspects of your rental business allowing you to focus your time on your current and future clients. It allows you to manage your properties effectively and effortlessly.

Multiple modules available within ITD Software are integrating all your property information and linking it to tenants, landlords, and agents enabling quick and straightforward communication between all parties.
ITD Software is offering integrated Customer Relationship Management system, which can be adjusted according to your requirements.

If this interests you and you would like to see more detailed description of what we do for our clients, please visit our website, where you will find full specifications (http://innovative-technologies.co.uk/estate_agency/offer/) our software does not require any installations, you do not have to worry about server maintenance/fix - with us everything is covered.


Kind Regards,
Innovative Technologies Development
ITD','2015-01-06 11:40:05','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (90,'90','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:11','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (91,'91','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:11','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (92,'92','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (93,'93','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (94,'94','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (95,'95','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (96,'96','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (97,'97','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (98,'98','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (99,'99','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (100,'100','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (101,'101','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (102,'102','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (103,'103','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (104,'104','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (105,'105','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (106,'106','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (107,'107','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (108,'108','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (109,'109','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (110,'110','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (111,'111','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (112,'112','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (113,'113','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (114,'114','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (115,'115','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (116,'116','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (117,'117','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (118,'118','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (119,'119','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (120,'120','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (121,'121','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (122,'122','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (123,'123','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (124,'124','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (125,'125','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (126,'126','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (127,'127','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (128,'128','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (129,'129','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (130,'130','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (131,'131','0','12','3','Good Morning,

Let me give you a quick introduction to ITD - we are a company specialized in advanced Web Services like Web Design, Web Development as well as Web Applications.

Years of experience allowed us to develop our own, unique CMS and CRM solutions, we have comprehensive knowledge and extensive experience not only with managing and creating Websites but also Search Engine Optimization, E-Commerce, Branding & Copy-writing.

Website package offered by ITD contains everything you need, based on your Business description our designers will prepare individual offer for you. We have created multiple websites for customers coming from different Business areas, so based on that experience we will provide complete product focused on your commercial objectives. You do not need to follow changing trends in website design, you do not have to research the market to find appropriate option for you - all you need to do is trust us!

Our package includes:

    Website (everything from simple to semi complicated ones)
    Design - created individually by group of our designers
    CMS - allowing you to upload everything to your website quick and easy
    RWD - Responsive Designed Website - website resolution- is adjust in a way so it is compatible with: mobile phones, ipads, ipdods, tablets, laptops, and you pc
    Social Media Integration (Facebook, Instagram, Twitter)
    Website Hosting for 12 months free of charge
    Domain (providing new one or configuring your existing one) - we will provide domain and grant you all required accesses
    Professional Support for 12 months (via email or phone) free of charge
    Data Entry - up to 20 hours of uploading data to your website
    Site Optimization (SEO) campaign for 12 months free of charge

For full offer description please go to: http://innovative-technologies.co.uk/website-package/

Please use the following code to claim your 30% off the price: JANUARY 2015
Kind regards,
Innovative Technologies Development','2015-01-06 11:43:12','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (132,'92','0','12','3','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Send email reminder</p>
</body>
</html>','2015-01-06 14:30:14','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (133,'93','0','12','3','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Sent email reminder</p>
</body>
</html>','2015-01-06 14:31:39','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (134,'94','0','12','3','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Sent email reminder</p>
</body>
</html>','2015-01-06 14:40:17','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_actions` VALUES (135,'11','0','12','3','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>Offer submitted - have to wait for Be SPoke to get back to us</p>
</body>
</html>','2015-01-09 09:36:17','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_states` VALUES (1,'2','Phone call','2015-01-03 14:28:46','2015-01-03 14:34:31');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_states` VALUES (2,'4','Closed','2015-01-03 14:28:51','2015-01-03 14:34:19');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_states` VALUES (3,'1','E-mail','2015-01-03 14:34:35','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `tickets_states` VALUES (4,'3','Face to face','2015-01-03 14:35:09','0000-00-00 00:00:00');";
$result = @mysql_query ($query);

$query = "INSERT INTO `users` VALUES (1,'1','0','8','Lukasz Sojka','','','','admin','info@innovative-technologies.co.uk','blue','3590caf0bf8fd4d7684bb96fff7c4660','0000-00-00 00:00:00','2015-01-03 15:18:16');";
$result = @mysql_query ($query);

$query = "INSERT INTO `users` VALUES (12,'0','0','8','Dagmara Sokolowska','','','','admin1','dagi.sokolowska@gmail.com','#38CD68 ','3590caf0bf8fd4d7684bb96fff7c4660','2015-01-03 09:30:21','2015-01-03 15:18:12');";
$result = @mysql_query ($query);

$query = "INSERT INTO `usersgroups` VALUES (8,'0','Admin','<!DOCTYPE html>
<html>
<head>
</head>
<body>
<p>3333</p>
</body>
</html>','2014-01-12 15:05:15','2014-11-10 17:42:51');";
$result = @mysql_query ($query);




?>

</body>
</html>

