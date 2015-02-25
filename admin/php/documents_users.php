<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='documents_users';
$table_key='documents_userid';
$view_name1='Documents users';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

//elements on list
if ($_SESSION['user']['usersgroupid'] == 8) {
	$elements_list1_tab['name']['userid']='User';
}
$elements_list1_tab['name']['documentid']='Document';
$elements_list1_tab['name']['confirmed']='Confirmed';

if ($_SESSION['user']['usersgroupid'] == 8) {
	$elements_list1_tab['type']['userid']='select';
}
$elements_list1_tab['type']['documentid']='select';
$elements_list1_tab['type']['confirmed']='select';

//element for width
if ($_SESSION['user']['usersgroupid'] == 8) {
	$elements_list1_tab['width']['userid']='40';
	$elements_list1_tab['width']['documentid']='40';
	$elements_list1_tab['width']['confirmed']='10';
} else {
	$elements_list1_tab['width']['documentid']='80'; 
	$elements_list1_tab['width']['confirmed']='10';
}

//element for filters
if ($_SESSION['user']['usersgroupid'] == 8) {
	$elements_list1_tab['filter']['userid']='select';
}
$elements_list1_tab['filter']['documentid']='select';
$elements_list1_tab['filter']['confirmed']='select';

$query = "SELECT * FROM users WHERE userid>0 ORDER BY name ASC";	
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['userid'][$row['userid']]=$row['name'];
}

$query = "SELECT * FROM documents WHERE documentid>0 ORDER BY name ASC";	
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['documentid'][$row['documentid']]=$row['name'];
}

foreach ($no_yes_tab as $key => $value) {	
	$elements_list1_tab['select']['confirmed'][$key]=$value;
}

//element for sort
if ($_SESSION['user']['usersgroupid'] == 8) {
	$elements_list1_tab['sort']['userid']=1;
}
$elements_list1_tab['sort']['documentid']=1;
$elements_list1_tab['sort']['confirmed']=1;

$default_sort1='position';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
if ($_SESSION['user']['usersgroupid'] == 8) {
	$elements_details1_tab['name']['userid']='User';
}
$elements_details1_tab['name']['confirmed']='Confirmed';
$elements_details1_tab['name']['documentid']='Document';

if ($_SESSION['user']['usersgroupid'] == 8) {
	$elements_details1_tab['type']['userid']='select';
}
$elements_details1_tab['type']['confirmed']='select';
$elements_details1_tab['type']['documentid']='select';

$query = "SELECT * FROM users WHERE userid>0 ORDER BY name ASC";	
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['userid'][$row['userid']]=$row['name'];
}

$query = "SELECT * FROM documents WHERE documentid>0 ORDER BY name ASC";	
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['documentid'][$row['documentid']]=$row['name'];
}

foreach ($no_yes_tab as $key => $value) {	
	$elements_details1_tab['select']['confirmed'][$key]=$value;
}
 
$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
$page_settings_tab['translations']=0;
$page_settings_tab['pictures']=0;
$page_settings_tab['attachments']=2;

if ($_SESSION['user']['usersgroupid'] == 8) { 

	$page_settings_tab['editing']=1;
	$page_settings_tab['deleting']=1;
	$page_settings_tab['adding']=1; 
	
} elseif ($_SESSION['user']['usersgroupid'] == 9) { 

	$page_settings_tab['viewing']=1;
	$page_settings_tab['deleting']=0;
	$page_settings_tab['adding']=0; 
	$_SESSION['filters']['userid']=$_SESSION['user']['userid'];
	
} elseif ($_SESSION['user']['usersgroupid'] == 12) { 

	$page_settings_tab['viewing']=1;
	$page_settings_tab['deleting']=0;
	$page_settings_tab['adding']=0; 
	$_SESSION['filters']['userid']=$_SESSION['user']['userid'];
	
} elseif ($_SESSION['user']['usersgroupid'] == 11) { 

	$page_settings_tab['viewing']=1;
	$page_settings_tab['deleting']=0;
	$page_settings_tab['adding']=0; 
	$_SESSION['filters']['userid']=$_SESSION['user']['userid'];
}

include_once('php/elements/structure_basic.php');





































?>