<?php

session_start();
include_once('../config/mysql.php');

//get all of the answers for this questionnaries
$query = "SELECT * FROM questionnaries WHERE questionnarieid='".$_GET['id']."' LIMIT 1";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {			
	foreach ($row as $key => $value) {
		$questionnaries_tab[$key]=$value;
	}
}

$query = "SELECT * FROM questionnaries_answers WHERE questionnarieid='".$_GET['id']."'";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {			
	foreach ($row as $key => $value) {
		$questionnaries_answers_tab[$row['questionnaries_answerid']][$key]=$value;
	}
}

$query = "SELECT * FROM usersgroups WHERE usersgroupid!=8";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {			
	foreach ($row as $key => $value) {
		$usersgroups_tab[$row['usersgroupid']]=$row['name'];
	}
}

header("Content-type: text/csv");
header("Content-Disposition: attachment; filename=questionnaire_".str_replace(' ','',$questionnaries_tab['user']).".csv");
header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies

echo 'Name,'.$questionnaries_tab['user'].'
'; 
echo 'Type,'.$usersgroups_tab[$questionnaries_tab['type']].'

';
echo 'Questions
';

foreach ($questionnaries_answers_tab as $key => $value) {

	echo '"'.$questionnaries_answers_tab[$key]['question'].'","'.$questionnaries_answers_tab[$key]['answer'].'"
';
}





















?>