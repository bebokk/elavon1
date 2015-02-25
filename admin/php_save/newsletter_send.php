<?php

//add element to database
if (isset($_POST['send_test_email'])) {	
	
	//get settings
	$query = "SELECT * FROM settings WHERE settingid IN (47,46)";
	$result = @mysql_query ($query);
	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
		$settings_tab[$row['settingid']]=$row['value'];
	}
	
	//send email
	require('class/phpmailer/class.phpmailer.php');	
	send_email1($settings_tab[46], $settings_tab[47], 'l.sojka@finecms.eu', $_POST['title'], $_POST['content']);		
	send_email1($settings_tab[46], $settings_tab[47], 'dagi.sokolowska@gmail.com', $_POST['title'], $_POST['content']);		
	
	$confirm='Test email sent!';	
	$tpl->assign("confirm",$confirm);
}

if (isset($_POST['send_emails'])) {	
	
	$query = "SELECT * FROM customers WHERE customerid>0";		
	$query .= " AND products LIKE '%,".$_POST['send_to'].",%'";
	$result = @mysql_query ($query);
	//echo "query -- $query -- $result <br>";
	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	
		foreach ($row as $key => $value) {
			$users_tab[$row['customerid']][$key]=$value;
		}
	}
	
	$query = "SELECT * FROM settings WHERE settingid IN (47,46)";
	$result = @mysql_query ($query);
	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
		$settings_tab[$row['settingid']]=$row['value'];
	}
	
	require('class/phpmailer/class.phpmailer.php');	
	foreach ($users_tab as $key => $value) {		
	
		//echo "email -- ".$users_tab[$key]['email']."<br>";
		send_email1($settings_tab[46], $settings_tab[47], $users_tab[$key]['email'], $_POST['title'], $_POST['content']);
	
		//add to ticekts
		$query = "INSERT INTO tickets (ticketid,userid,state,next_date,
		customerid,title,decription,createtime)
		VALUES (NULL,'".$_SESSION['user']['userid']."','".$_POST['next_action']."','".$_POST['next_action_date']."',
		'".$key."','".$_POST['title']."','".$_POST['content']."','".date("Y-m-d H:i:s")."')";
		$result = @mysql_query ($query); 
		$ticketid = mysql_insert_id();
		
		//add to ticekt logs
		$query = "INSERT INTO tickets_actions (tickets_actionid,ticketid,userid,state,
		decription,createtime)
		VALUES (NULL,'".$ticketid."','".$_SESSION['user']['userid']."','".$_POST['next_action']."',
		'".$_POST['content']."','".date("Y-m-d H:i:s")."')";
		$result = @mysql_query ($query); 
		
		//tickets_actionid 	ticketid 	position 	userid 	state 	decription 	createtime 	lastactiontime
	}	
	$confirm='Newsletter sent!';
	$tpl->assign("confirm",$confirm);
	
	//insert into newsletter_sent 	
	$query = "INSERT INTO newsletter_sent (newsletter_sentid,products,title,content,createtime)
	VALUES (NULL,'".$_POST['send_to']."','".$_POST['title']."','".$_POST['content']."','".date("Y-m-d")."')";
	$result = @mysql_query ($query);
	//echo "query -- $query -- $result";	

	/*
	echo "users_tab -- <pre>";
	print_r($users_tab);
	echo "</pre>";
	*/
}

//pageid 	parentid 	active 	position 	type 	link 	createtime 	lastactiontime
//pages_textid 	pageid 	langid 	name 	description

?> 