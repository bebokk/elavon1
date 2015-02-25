<?php

session_start();
include_once('../config/mysql.php');

$filetr_date1=explode('-',$_POST['filetr_date']);

//get 12 months calendar
$months0_tab='';
for ($i=0;$i<12;$i++) {
	$months0_tab[$i]=date("F Y", mktime(0, 0, 0, $filetr_date1[1]+$i, 1, $filetr_date1[0]));	
}

$months_tab='';
$months1_tab='';
foreach ($months0_tab as $key => $value) { 

	//get amount of day for this month
	$days_amount=date("t", mktime(0, 0, 0, $filetr_date1[1]+$key, 1, $filetr_date1[0]));		
	$first_day_of_the_week=date("N", mktime(0, 0, 0, $filetr_date1[1]+$key, 1, $filetr_date1[0]));		
	
	$week=1;
	for ($i=0;$i<$days_amount;$i++) {
	
		$day_of_week=$first_day_of_the_week+($i-1);
		$day_of_week1=floor($day_of_week/7);	
		$day_of_week2=$day_of_week-($day_of_week1*7);
		
		$months_tab[$key][($day_of_week1+1)][$day_of_week2]=date("Y-m-d", mktime(0, 0, 0, $filetr_date1[1]+$key, ($i+1), $filetr_date1[0]));
		$months1_tab[$key][($day_of_week1+1)][$day_of_week2]=$i+1;
	}
}

//get contact logs
$query = "SELECT * FROM contact_logs WHERE (userid='".$_SESSION['user']['userid']."' OR clientid='".$_SESSION['user']['userid']."')
AND nextactiondate>='".date("Y-m-d", mktime(0, 0, 0, $filetr_date1[1], 1, $filetr_date1[0]))."'
ORDER BY nextactiondate ASC";
$result = @mysql_query ($query);
//echo "query -- $query -- $result <br>";
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
<div class="callendar1">
	<? foreach ($months_tab as $key => $value) { ?>
		<div class="callendar1_month0">
			<div class="callendar1_month">
				<table>
					<thead>
						<tr>
							<td colspan="7"><a href=""><? echo $months0_tab[$key]; ?></a></td>
						</tr>
						<tr>
							<td><a>Mo</a></td>
							<td><a>Tu</a></td>
							<td><a>We</a></td>
							<td><a>Th</a></td>
							<td><a>Fr</a></td>
							<td><a>Sa</a></td>
							<td><a>Su</a></td>
						</tr>
					</thead>
					<tbody>
						<? foreach ($months_tab[$key] as $key1 => $value1) { ?>
							<tr>
								<? for ($i=0;$i<=6;$i++) { ?>
									<? if ($months_tab[$key][$key1][$i] == '') { ?>
										<td><a href="">&nbsp;</a></td>		
									<? } elseif ($contact_logs_tab[$months_tab[$key][$key1][$i]] != '') { ?>
										<td class="callendar1_month_td1"><a href="index.php?page=calendar&subpage=calendar_day&filetr_date=<? echo $months_tab[$key][$key1][$i]; ?>"><? echo $months1_tab[$key][$key1][$i]; ?></a></td>		
									<? } else { ?>		
										<td class="callendar1_month_td"><a href="index.php?page=calendar&subpage=calendar_day&filetr_date=<? echo $months_tab[$key][$key1][$i]; ?>"><? echo $months1_tab[$key][$key1][$i]; ?></a></td>		
									<? } ?>
								<? } ?>
							</tr>
						<? } ?>
					</tbody>
				</table>
			</div> 
		</div> 
	<? } ?>
</div> 