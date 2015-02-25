<?php

session_start();
include_once('../config/mysql.php');

/*
$query = "SELECT * FROM users WHERE userid='".$_SESSION['user']['userid']."'";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {	
	foreach ($row as $key => $value) {
		$users_tab[$key]=$value;
	}
}
$tpl->assign("users_tab",$users_tab);
*/

$workstarttime='5:00';
$workendtime='22:00';

//starting hour 
$start_hour=explode(':',$workstarttime);
$start_hour1=str_replace('0','',$start_hour[0]);
if ($start_hour1>0) {
	$start_hour1=$start_hour1;
}

//ending hour 
$end_hour=explode(':',$workendtime);
$end_hour1=str_replace('0','',$end_hour[0]);
if ($end_hour1<24) {
	$end_hour1=$end_hour1+1;
}

$working_hours_tab='';
for ($i=$start_hour1;$i<=$end_hour1;$i++) {	
	$working_hours_tab[$i]=$i;
}

$selected_date_tab='';
$selected_date_tab1='';
$selected_date1='';
for ($i=0;$i<7;$i++) {
	$selected_time1=strtotime($_POST['filetr_date']);
	$selected_time2=$selected_time1+(86400*$i);
	$date1=date("Y-m-d",$selected_time2);
	$date2=date("N",$selected_time2);
	
	$selected_date_tab[$i]=$date1;	
	$selected_date_tab1[$i]=$days_od_week_tab[$date2];	
	$selected_date1.=",'".$date1."'";
}
$selected_date1=substr($selected_date1,1);

//starting work - first hour
$difference1=strtotime($users_tab['workstarttime'])-strtotime($start_hour1.':00:00');

$query = "SELECT * FROM contact_logs WHERE (userid='".$_SESSION['user']['userid']."' OR clientid='".$_SESSION['user']['userid']."') AND nextactiondate IN (".$selected_date1.")";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {	
	foreach ($row as $key => $value) {
		$contact_logs_tab[$row['nextactiondate']][$row['contact_logid']][$key]=$value;
	}
	//count height
	$contact_logs_tab[$row['nextactiondate']][$row['contact_logid']]['height']=(($row['timetospend']/60)*4)*13;		
	//count top posistion
	$topposistion1=(((strtotime($row['nextactiontime'])-strtotime($users_tab['workstarttime'])+$difference1)/60)/60);	
	//echo "topposistion1 -- $topposistion1<br>";
	$contact_logs_tab[$row['nextactiondate']][$row['contact_logid']]['topposistion']=(($topposistion1)*4)*13;	
	
	//get client name
	$query1 = "SELECT name FROM users WHERE userid='".$row['clientid']."'";
	$result1 = @mysql_query ($query1);
	while ($row1 = mysql_fetch_array ($result1, MYSQL_ASSOC)) {	
		$contact_logs_tab[$row['nextactiondate']][$row['contact_logid']]['clientname']=$row1['name'];					
	}	
	
	//get action name
	$contact_logs_tab[$row['nextactiondate']][$row['contact_logid']]['actionname']=$possible_contact_actions_tab[$row['nextaction']];				
}

/*
echo "contact_logs_tab -- <pre>";
print_r($contact_logs_tab);
echo "</pre>";
*/

?>

<div class="callendar_day01">
	<div class="callendar_day01_1">		
		<div class="callendar_day1">	
		</div>
	</div>
	<? foreach ($selected_date_tab as $id => $val) { ?>
		<div class="callendar_day01_2">			
			<a href=""><? echo $selected_date_tab1[$id].'<br>'.$val; ?></a>
		</div>
	<? } ?>
</div>
<div class="callendar_day02">
	<div class="callendar_day1">
		<? foreach ($working_hours_tab as $id => $val) { ?>
			<div class="callendar_day1_1">		
				<a href=""><? echo $val; ?>:00</a>
			</div>
		<? } ?>
	</div>
	<? foreach ($selected_date_tab as $id => $val) { ?>
		<div class="callendar_day2">	
			<? foreach ($working_hours_tab as $id1 => $val1) { ?>
				<div class="callendar_day1_1">		
					<div class="callendar_day1_1_1">		
						<div class="callendar_day1_1_1_1 callendar_day1_1_1_11"><a onclick="element_add('','<? echo $val1; ?>:00','<? echo $val; ?>');"></a></div>
						<div class="callendar_day1_1_1_1"><a onclick="element_add('','<? echo $val1; ?>:15','<? echo $val; ?>');"></a></div>
						<div class="callendar_day1_1_1_1"><a onclick="element_add('','<? echo $val1; ?>:30','<? echo $val; ?>');"></a></div>
						<div class="callendar_day1_1_1_1"><a onclick="element_add('','<? echo $val1; ?>:45','<? echo $val; ?>');"></a></div>
						<div class="clear"></div>
					</div>
					<a href=""></a>
				</div>
			<? } ?>	
			<? if ($contact_logs_tab[$val] != '') foreach ($contact_logs_tab[$val] as $id2 => $val2) { ?>
				<div class="callendar_display_block call1_<? echo $contact_logs_tab[$val][$id2]['timetospend']; ?>" style="height:<? echo $contact_logs_tab[$val][$id2]['height']; ?>px !important;top:<? echo $contact_logs_tab[$val][$id2]['topposistion']; ?>px !important;">		
					<div class="callendar_display_block_1">
						<div class="callendar_display_block_1_1"><? echo $contact_logs_tab[$val][$id2]['clientname']; ?></div>
						<div class="callendar_display_block_1_2">action: <? echo $contact_logs_tab[$val][$id2]['actionname']; ?></div>
						<div class="callendar_display_block_1_2">action: <? echo $contact_logs_tab[$val][$id2]['actionname']; ?></div>
						<div class="callendar_display_block_1_3"><? echo $contact_logs_tab[$val][$id2]['description']; ?></div>	
						<div class="clear"></div>
					</div>
					<a onclick="element_edit(<? echo $id2; ?>);">
						<? echo $contact_logs_tab[$val][$id2]['clientname']; ?><br />
						<? if ($contact_logs_tab[$val][$id2]['timetospend'] > 30) { ?>
							<? echo $contact_logs_tab[$val][$id2]['actionname']; ?>
						<? } ?>	
					</a>
				</div>
			<? } ?>	
		</div>
	<? } ?>	
</div>