<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='questions';
$table_key='questionid';
$view_name1='Questions';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

//elements on list 
$elements_list1_tab['name']['name']='Name';
$elements_list1_tab['name']['answers_groupid']='Type';
$elements_list1_tab['name']['usersgroupid']='Users group';
$elements_list1_tab['name']['questions_groupid']='Questions group';

$elements_list1_tab['type']['name']='text';
$elements_list1_tab['type']['answers_groupid']='select';
$elements_list1_tab['type']['usersgroupid']='select';
$elements_list1_tab['type']['questions_groupid']='select';

//select values
$query = "SELECT * FROM answers_groups ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['answers_groupid'][$row['answers_groupid']]=$row['name'];
}

//select values
$query = "SELECT * FROM usersgroups WHERE usersgroupid!=8 ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['usersgroupid'][$row['usersgroupid']]=$row['name'];
}

//select values
$query = "SELECT * FROM questions_groups ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['questions_groupid'][$row['questions_groupid']]=$row['name'].'('.$elements_list1_tab['select']['usersgroupid'][$row['usersgroupid']].')';
}

//element for width
$elements_list1_tab['width']['name']='46';
$elements_list1_tab['width']['answers_groupid']='12';
$elements_list1_tab['width']['usersgroupid']='12';
$elements_list1_tab['width']['questions_groupid']='20';

//element for filters
$elements_list1_tab['filter']['name']='text';
$elements_list1_tab['filter']['answers_groupid']='select';
$elements_list1_tab['filter']['usersgroupid']='select';
$elements_list1_tab['filter']['questions_groupid']='select';

//element for sort
$elements_list1_tab['sort']['name']=1;
$elements_list1_tab['sort']['answers_groupid']=1;
$elements_list1_tab['sort']['usersgroupid']=1;
$elements_list1_tab['sort']['questions_groupid']=1;

$default_sort1='position';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['name']='Name';
$elements_details1_tab['name']['answers_groupid']='Type';
$elements_details1_tab['name']['usersgroupid']='Group';
$elements_details1_tab['name']['questions_groupid']='Questions group';
$elements_details1_tab['name']['charter']='Charter';
$elements_details1_tab['name']['pre_page']='Pre page';
$elements_details1_tab['name']['extent_header']='Extent header';


$elements_details1_tab['type']['name']='text';
$elements_details1_tab['type']['answers_groupid']='select';
$elements_details1_tab['type']['usersgroupid']='select';
$elements_details1_tab['type']['questions_groupid']='select';
$elements_details1_tab['type']['charter']='text';
$elements_details1_tab['type']['pre_page']='text';
$elements_details1_tab['type']['extent_header']='text';

//select values
$query = "SELECT * FROM answers_groups ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['answers_groupid'][$row['answers_groupid']]=$row['name'];
}

//select values
$query = "SELECT * FROM usersgroups WHERE usersgroupid!=8 ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['usersgroupid'][$row['usersgroupid']]=$row['name'];
}

//select values
$query = "SELECT * FROM questions_groups ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['questions_groupid'][$row['questions_groupid']]=$row['name'].'('.$elements_list1_tab['select']['usersgroupid'][$row['usersgroupid']].')';
}

$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
$page_settings_tab['translations']=0;
$page_settings_tab['pictures']=0;
$page_settings_tab['deleting']=1;
$page_settings_tab['adding']=1;
$page_settings_tab['editing']=1;
$page_settings_tab['position']=1;

include_once('php/elements/structure_basic.php');





































?>