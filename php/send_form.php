<?php

include_once('../admin/config/mysql.php');
include_once('../admin/global_all1.php');

//get questiones
$query = "SELECT * FROM questions ORDER BY name ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$questions_tab[$row['questionid']]=$row['name'];
	$questions1_tab[$row['questionid']]=$row['answers_groupid'];	
}

//get answers for type 4
$query = "SELECT * FROM answers WHERE answers_groupid=4 ORDER BY name ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$answers1_tab[$row['answerid']]=$row['name'];
}
echo "answers1_tab -- <pre>";
print_r($answers1_tab);
echo "</pre>";

//get managment users
$query = "SELECT * FROM users WHERE usersgroupid=11 ORDER BY name ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$managers_tab[$row['userid']]=$row['name'];
}

$query = "INSERT INTO questionnaries (questionnarieid,type,user,createtime) VALUES (NULL,'".trim($_POST['type1'])."',
'".$_POST['name1']."','".date("Y-m-d H:i:s")."')";		
$result = @mysql_query ($query);
$questionnarieid = mysql_insert_id();

//extra elements
if ($_POST['save_parameters1_id_tab'] != '') {
	foreach ($_POST['save_parameters1_id_tab'] as $key => $value) {

		$value1=explode('_',$value);
		$questionid=$value1[1];
		$elementid1=$value1[2];		
		$extra_elements_tab[$questionid][$elementid1]=$_POST['save_parameters1_val_tab'][$key];
		//echo $value1[2].' -- '.$value.' -- '." -- ".$_POST['save_parameters_pic_com_val_tab'][$key].'#sep#'.'<br>';
	}
}

/*
echo "managers_tab -- <pre>";
print_r($managers_tab);
echo "</pre>";
*/

//get elements for 
if ($_POST['save_parameters_pic_com_id_tab'] != '') {
	foreach ($_POST['save_parameters_pic_com_id_tab'] as $key => $value) {

		$value1=explode('_',$value);
		$questionid=$value1[2];
		$elementid1=$value1[3];		
		$pic_com_tab[$questionid][$elementid1]=$_POST['save_parameters_pic_com_val_tab'][$key];
		//echo $value1[2].' -- '.$value.' -- '." -- ".$_POST['save_parameters_pic_com_val_tab'][$key].'#sep#'.'<br>';
	}
}

/*
echo "pic_com_tab -- <pre>";
print_r($pic_com_tab);
echo "</pre>";
*/

//insert answers into table 
foreach ($_POST['save_parameters_id_tab'] as $key => $value) {

	$value1=explode('_',$value);
	$questionid=$value1[1];
	$elementid1=$value1[2];
	
	$answer='';
	$answerid1='';
	if ($questions1_tab[$questionid] == 1) {

		$answer=$questions1_tab[$_POST['save_parameters_val_tab'][$key]];		

	} elseif ($questions1_tab[$questionid] == 2) {

		//echo "test1 -- ".$_POST['save_parameters_val_tab'][$key]."<br>";
		$answer=$_POST['save_parameters_val_tab'][$key];		

	} elseif ($questions1_tab[$questionid] == 3) {

		$par0 = substr($_POST['save_parameters_val_tab'][$key],1,-1);
		$save_parameters_val_tab1=explode(',',$par0);
		if ($save_parameters_val_tab1 != '') {
			foreach ($save_parameters_val_tab1 as $key2 => $value2) {
				$answer .= $managers_tab[$value2].':'.$pic_com_tab[$questionid][$value2].',';
			}
			$answer=substr($answer,0,-1);
		}
	} elseif ($questions1_tab[$questionid] == 4) {
		
		$par0 = substr($_POST['save_parameters_val_tab'][$key],1,-1);
		$save_parameters_val_tab1=explode(',',$par0);
		if ($save_parameters_val_tab1 != '') {
			foreach ($save_parameters_val_tab1 as $key2 => $value2) {
					
				//get extra elements values						
				$answerid1 .= $extra_elements_tab[$questionid][$value2].';';
				$par1 = substr($extra_elements_tab[$questionid][$value2],1,-1);
				$save_parameters_val_tab2=explode(',',$par1);
				if ($save_parameters_val_tab2 != '') {
					$answer1='';
					foreach ($save_parameters_val_tab2 as $key3 => $value3) {
						$answer1.=$answers1_tab[$value3].',';
					}
					$answer1=substr($answer1,0,-1);
				}				
				$answer .= $managers_tab[$value2].': ('.$answer1.')'.$pic_com_tab[$questionid][$value2].',';
			}
			$answer=substr($answer,0,-1);
		}
		$answerid1=substr($answerid1,0,-1);
		
	} elseif ($questions1_tab[$questionid] == 5) {

		//echo "test1 -- ".$_POST['save_parameters_val_tab'][$key]."<br>";
		$answer=$_POST['save_parameters_val_tab'][$key];		

	} elseif ($questions1_tab[$questionid] == 7) {

		$par0 = substr($_POST['save_parameters_val_tab'][$key],1,-1);
		$save_parameters_val_tab1=explode(',',$par0);
		if ($save_parameters_val_tab1 != '') {
			foreach ($save_parameters_val_tab1 as $key2 => $value2) {
				$answer .= $managers_tab[$value2].',';
			}
			$answer=substr($answer,0,-1);
		}
	} elseif ($questions1_tab[$questionid] == 8) {

		foreach ($managers_tab as $key2 => $value2) {
			$answer .= $value2.':'.$pic_com_tab[$questionid][$key2].',';
		}
		$answer=substr($answer,0,-1);		
		
	} elseif ($questions1_tab[$questionid] == 9) {

		//echo "test1 -- ".$_POST['save_parameters_val_tab'][$key]."<br>";
		$answer=$managers_tab[$_POST['save_parameters_val_tab'][$key]];	
		
	}  elseif ($questions1_tab[$questionid] == 10) {

		foreach ($managers_tab as $key2 => $value2) {
			$answer .= $value2.':'.$pic_com_tab[$questionid][$key2].',';
		}
		$answer=substr($answer,0,-1);		
		
	}  elseif ($questions1_tab[$questionid] == 11) {

		foreach ($managers_tab as $key2 => $value2) {
			$answer .= $value2.':'.$pic_com_tab[$questionid][$key2].',';
		}
		$answer=substr($answer,0,-1);		
	} 

	$query = "INSERT INTO questionnaries_answers(questionnaries_answerid,
	questionnarieid,
	answers_groupid,
	answer,
	answerid,
	answerid1,
	pic_com,
	questionid,
	question,
	createtime)
	VALUES (NULL,
	'".$questionnarieid."',
	'".$questions1_tab[$questionid]."',
	'".$answer."',
	'".mysql_real_escape_string($_POST['save_parameters_val_tab'][$key])."',
	'".$answerid1."',
	'".mysql_real_escape_string(substr($pic_com_tab[$questionid],0,-5))."',
	'".$questionid."',
	'".mysql_real_escape_string($questions_tab[$questionid])."',
	'".date("Y-m-d H:i:s")."')";				
	$result = @mysql_query ($query);
	//echo "query -- $query -- $result <br>";
}	

























?> 