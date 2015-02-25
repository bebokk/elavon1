<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='langs';
$table_key='langid';
$view_name1='Languages';

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

$elements_details1_tab['type']['name']='text';

$page_settings_tab['pagination']=0;
$page_settings_tab['filters']=0;
$page_settings_tab['translations']=0;
$page_settings_tab['deleting']=0;


include_once('php/elements/structure_basic.php');





































?>