<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='users';
$table_key='userid';
$view_name1='Users';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

$elements_list1_tab['name']['name']='Name';
$elements_list1_tab['name']['email']='E-mail';
$elements_list1_tab['name']['usersgroupid']='Group';
 
$elements_list1_tab['type']['name']='text';
$elements_list1_tab['type']['email']='text';
$elements_list1_tab['type']['usersgroupid']='select';

//select values
$query = "SELECT * FROM usersgroups ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['usersgroupid'][$row['usersgroupid']]=$row['name'];
}

//element for width
$elements_list1_tab['width']['name']='30';
$elements_list1_tab['width']['email']='30';
$elements_list1_tab['width']['usersgroupid']='30';

//element for filters
$elements_list1_tab['filter']['name']='text';
$elements_list1_tab['filter']['email']='text';
$elements_list1_tab['filter']['usersgroupid']='select';

//element for sort
$elements_list1_tab['sort']['agencieid']=1;
$elements_list1_tab['sort']['name']=1;
$elements_list1_tab['sort']['email']=1;
$elements_list1_tab['sort']['usersgroupid']=1;

$default_sort1='name';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['name']='Name';
$elements_details1_tab['name']['email']='E-mail';
$elements_details1_tab['name']['login']='Login';
$elements_details1_tab['name']['color']='Color';
$elements_details1_tab['name']['pass']='Pass';
$elements_details1_tab['name']['usersgroupid']='Group';

$elements_details1_tab['type']['name']='text';
$elements_details1_tab['type']['email']='text';
$elements_details1_tab['type']['login']='text';
$elements_details1_tab['type']['color']='text';
$elements_details1_tab['type']['pass']='pass';
$elements_details1_tab['type']['usersgroupid']='select';

//select values
$query = "SELECT * FROM usersgroups ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['usersgroupid'][$row['usersgroupid']]=$row['name'];
}

$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
$page_settings_tab['translations']=0;
$page_settings_tab['pictures']=1;
$page_settings_tab['deleting']=1;
$page_settings_tab['adding']=1;
$page_settings_tab['editing']=1;

@include_once('php/elements/structure_basic.php');





































?>