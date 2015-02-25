<?php

session_start();

include_once('../../../config/mysql.php');

//check date availability
// contact_logid 	position 	clientid 	userid 	thisaction 	nextaction 	nextactiondate 	
// nextactiontime 	timetospend 	description 	createtime 	lastactiontime
$time01=strtotime($_POST['nextactiontime']);
$time02=strtotime($_POST['nextactiontime'])+($_POST['timetospend']*60);

$query = "SELECT * FROM contact_logs WHERE nextactiondate='".$_POST['nextactiondate']."' AND contact_logid!='".$_POST['element_id']."'
ORDER BY nextactiontime ASC";
$result = @mysql_query ($query);
$count_res=0;
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

	$time1=strtotime($row['nextactiontime']);
	$time2=strtotime($row['nextactiontime'])+($row['timetospend']*60);	
		
	if (($time01 <= $time1 AND $time02 <= $time2) OR ($time01 >= $time2 AND $time02 >= $time2)) {
		//nothing for now
	} else { 
		$count_res=1;		
	}
}
//echo "query -- $query -- $result <br>";
echo $count_res;









































?>