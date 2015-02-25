<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='questionnaries';
$table_key='questionnarieid';
$view_name1='Questionnaries';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

//elements on list 
$elements_list1_tab['name']['user']='User';
$elements_list1_tab['name']['createtime']='Createtime';

$elements_list1_tab['type']['user']='text';
$elements_list1_tab['type']['createtime']='text';

//element for width
$elements_list1_tab['width']['user']='75';
$elements_list1_tab['width']['createtime']='20';

//element for filters
$elements_list1_tab['filter']['user']='text';
$elements_list1_tab['filter']['createtime']='text';

//element for sort
$elements_list1_tab['sort']['user']=1;
$elements_list1_tab['sort']['createtime']=1;

$default_sort1='createtime';
$default_sort2='DESC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['user']='User';

$elements_details1_tab['type']['user']='text';

$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
$page_settings_tab['translations']=0;
$page_settings_tab['pictures']=0;
$page_settings_tab['deleting']=0;
$page_settings_tab['adding']=0;
$page_settings_tab['editing']=0;
$page_settings_tab['position']=0;

include_once('php/elements/structure_basic.php');





































?>