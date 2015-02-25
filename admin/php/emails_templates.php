<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='emails_templates';
$table_key='emails_templateid';
$view_name1='Emails templates';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

//elements on list 
$elements_list1_tab['name']['name']='Name';
$elements_list1_tab['name']['subject']='Subject';

$elements_list1_tab['type']['name']='text';
$elements_list1_tab['type']['subject']='text';

//element for width
$elements_list1_tab['width']['name']='45';
$elements_list1_tab['width']['subject']='45';

//element for filters
$elements_list1_tab['filter']['name']='text';
$elements_list1_tab['filter']['subject']='text';

//element for sort
$elements_list1_tab['sort']['name']=1;
$elements_list1_tab['sort']['subject']=1;

$default_sort1='position';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['name']='Name';
$elements_details1_tab['name']['subject']='Subject';
$elements_details1_tab['name']['description']='Content';

$elements_details1_tab['type']['name']='text';
$elements_details1_tab['type']['subject']='text';
$elements_details1_tab['type']['description']='wysywig';

$page_settings_tab['pagination']=0;
$page_settings_tab['filters']=0;
$page_settings_tab['translations']=1;
$page_settings_tab['deleting']=0;

//translations settings
$elements_details1_tab['translations']['subject']=1;
$elements_details1_tab['translations']['description']=1;

include_once('php/elements/structure_basic.php');





































?>