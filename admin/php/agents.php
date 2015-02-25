<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='agents';
$table_key='agentid';
$view_name1='Agents';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

//elements on list 
$elements_list1_tab['name']['name']='Name';
$elements_list1_tab['name']['email']='E-mail';

$elements_list1_tab['type']['name']='text';
$elements_list1_tab['type']['email']='text';

//element for width
$elements_list1_tab['width']['name']='45';
$elements_list1_tab['width']['email']='45';

//element for filters
$elements_list1_tab['filter']['name']='text';
$elements_list1_tab['filter']['email']='text';

//element for sort
$elements_list1_tab['sort']['name']=1;
$elements_list1_tab['sort']['email']=1;

$default_sort1='name';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['name']='Name';
$elements_details1_tab['name']['email']='E-mail';
$elements_details1_tab['name']['login']='Login';
$elements_details1_tab['name']['pass']='Pass';

$elements_details1_tab['type']['name']='text';
$elements_details1_tab['type']['email']='text';
$elements_details1_tab['type']['login']='text';
$elements_details1_tab['type']['pass']='pass';

$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
$page_settings_tab['translations']=0;
$page_settings_tab['pictures']=1;
$page_settings_tab['deleting']=1;
$page_settings_tab['adding']=1;

@include_once('php/elements/structure_basic.php');





































?>