<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='newsletter_sent';
$table_key='newsletter_sentid';
$view_name1='Newsletter sent';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

//elements on list
$elements_list1_tab['name']['title']='Title';
$elements_list1_tab['name']['usersgroupid']='Group';
$elements_list1_tab['name']['createtime']='Date';

$elements_list1_tab['type']['title']='text';
$elements_list1_tab['type']['usersgroupid']='select';
$elements_list1_tab['type']['createtime']='date';

//element for width
$elements_list1_tab['width']['title']='30';
$elements_list1_tab['width']['usersgroupid']='30';
$elements_list1_tab['width']['createtime']='30';

//element for filters
$elements_list1_tab['filter']['title']='text';
$elements_list1_tab['filter']['usersgroupid']='select';
$elements_list1_tab['filter']['createtime']='date';

$query = "SELECT * FROM usersgroups WHERE usersgroupid>0 ORDER BY name ASC";	
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['usersgroupid'][$row['usersgroupid']]=$row['name'];
}

//element for sort
$elements_list1_tab['sort']['title']=1;
$elements_list1_tab['sort']['createtime']=1;

$default_sort1='position';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['title']='Title';
$elements_details1_tab['name']['createtime']='Date';
$elements_details1_tab['name']['usersgroupid']='Group';
$elements_details1_tab['name']['content']='Content';

$elements_details1_tab['type']['title']='text';
$elements_details1_tab['type']['createtime']='date';
$elements_details1_tab['type']['usersgroupid']='select';
$elements_details1_tab['type']['content']='wysywig';

$query = "SELECT * FROM usersgroups WHERE usersgroupid>0 ORDER BY name ASC";	
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['usersgroupid'][$row['usersgroupid']]=$row['name'];
}

$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
$page_settings_tab['translations']=0;
$page_settings_tab['pictures']=0;
$page_settings_tab['attachments']=0;
$page_settings_tab['deleting']=0;
$page_settings_tab['adding']=0;
$page_settings_tab['viewing']=1;

include_once('php/elements/structure_basic.php');





































?>