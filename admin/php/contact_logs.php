<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='contact_logs';
$table_key='contact_logid';
$view_name1='Contact logs';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

//elements on list 
$elements_list1_tab['name']['clientid']='Client';
$elements_list1_tab['name']['userid']='User';
//$elements_list1_tab['name']['thisaction']='Action';
$elements_list1_tab['name']['nextaction']='Action';
$elements_list1_tab['name']['nextactiondate']='Action&nbsp;date';
$elements_list1_tab['name']['nextactiontime']='Action&nbsp;time';
$elements_list1_tab['name']['timetospend']='Required time';
$elements_list1_tab['name']['createtime']='Created';

$elements_list1_tab['type']['clientid']='select';
$elements_list1_tab['type']['userid']='select';
//$elements_list1_tab['type']['thisaction']='select';
$elements_list1_tab['type']['nextaction']='select';
$elements_list1_tab['type']['nextactiondate']='date';
$elements_list1_tab['type']['nextactiontime']='time';
$elements_list1_tab['type']['timetospend']='select';
$elements_list1_tab['type']['createtime']='datetime';

//select values
$query = "SELECT * FROM users WHERE usersgroupid IN (11,12,10) ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['clientid'][$row['userid']]=$row['name'];
}

$query = "SELECT * FROM users WHERE usersgroupid IN (8,9) ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['userid'][$row['userid']]=$row['name'];
}

//select values
$query = "SELECT * FROM users ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['userid'][$row['userid']]=$row['name'];
}

foreach ($possible_contact_actions_tab as $key => $value) {
	$elements_list1_tab['select']['thisaction'][$key]=$value;	
}

foreach ($possible_contact_actions_tab as $key => $value) {
	$elements_list1_tab['select']['nextaction'][$key]=$value;	
}

foreach ($timetospend_tab as $key => $value) {
	$elements_list1_tab['select']['timetospend'][$key]=$value;	
}
  
//element for width
$elements_list1_tab['width']['clientid']='15';
$elements_list1_tab['width']['userid']='15';
$elements_list1_tab['width']['nextaction']='15';
$elements_list1_tab['width']['nextactiondate']='15';
$elements_list1_tab['width']['nextactiontime']='10';
$elements_list1_tab['width']['timetospend']='10';
$elements_list1_tab['width']['createtime']='12';

//element for filters
$elements_list1_tab['filter']['clientid']='select';
$elements_list1_tab['filter']['userid']='select';
//$elements_list1_tab['filter']['thisaction']='select';
$elements_list1_tab['filter']['nextaction']='select';
$elements_list1_tab['filter']['nextactiondate']='date';

//element for sort
$elements_list1_tab['sort']['clientid']=1;
$elements_list1_tab['sort']['userid']=1;
//$elements_list1_tab['sort']['thisaction']=1;
$elements_list1_tab['sort']['nextaction']=1;
$elements_list1_tab['sort']['nextactiondate']=1;
$elements_list1_tab['sort']['nextactiontime']=1;
$elements_list1_tab['sort']['createtime']=1;

$default_sort1='nextactiondate';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['clientid']='Client';
$elements_details1_tab['name']['userid']='User';
//$elements_details1_tab['name']['thisaction']='Action';
$elements_details1_tab['name']['nextaction']='Action';
$elements_details1_tab['name']['nextactiondate']='Action date';
$elements_details1_tab['name']['nextactiontime']='Action time';
$elements_details1_tab['name']['timetospend']='Required time';
$elements_details1_tab['name']['description']='Description';

$elements_details1_tab['type']['clientid']='select';
$elements_details1_tab['type']['userid']='select';
//$elements_details1_tab['type']['thisaction']='select';
$elements_details1_tab['type']['nextaction']='select';
$elements_details1_tab['type']['nextactiondate']='date';
$elements_details1_tab['type']['nextactiontime']='time';
$elements_details1_tab['type']['timetospend']='select';
$elements_details1_tab['type']['description']='wysywig';

//select values
$query = "SELECT * FROM users WHERE usersgroupid IN (11,12,10) ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['clientid'][$row['userid']]=$row['name'];
}

$query = "SELECT * FROM users WHERE usersgroupid IN (8,9) ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['userid'][$row['userid']]=$row['name'];
}

foreach ($possible_contact_actions_tab as $key => $value) {
	$elements_details1_tab['select']['nextaction'][$key]=$value;	
}

foreach ($timetospend_tab as $key => $value) {
	$elements_details1_tab['select']['timetospend'][$key]=$value;	
}

$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
$page_settings_tab['translations']=0;
$page_settings_tab['pictures']=0;
$page_settings_tab['deleting']=1;
$page_settings_tab['adding']=1;
$page_settings_tab['position']=0;
$page_settings_tab['editing']=1;

include_once('php/elements/contact_logs.php');





































?>