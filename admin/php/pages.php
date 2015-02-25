<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='pages';
$table_key='pageid';
$view_name1='Pages';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

//elements on list 
$elements_list1_tab['name']['name']='Name';

$elements_list1_tab['type']['name']='text';

//element for width
$elements_list1_tab['width']['name']='90';

//element for filters
$elements_list1_tab['filter']['name']='text';

//element for sort
$elements_list1_tab['sort']['name']=1;

$default_sort1='position';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['name']='Name';
$elements_details1_tab['name']['description']='Description';

$elements_details1_tab['type']['name']='text';
$elements_details1_tab['type']['description']='wysywig';

$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
$page_settings_tab['translations']=0;
$page_settings_tab['pictures']=1;
$page_settings_tab['deleting']=1;
$page_settings_tab['adding']=1;
$page_settings_tab['editing']=1;

@include_once('php/elements/structure_basic.php');





































?>