<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='tenants';
$table_key='tenantid';
$view_name1='Tenants';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

//elements on list
$elements_list1_tab['name']['name']='Name';
$elements_list1_tab['name']['phone']='Phone';
$elements_list1_tab['name']['email']='E-mail';

$elements_list1_tab['type']['name']='text';
$elements_list1_tab['type']['phone']='text';
$elements_list1_tab['type']['email']='text';

//element for width
$elements_list1_tab['width']['name']='30';
$elements_list1_tab['width']['phone']='30';
$elements_list1_tab['width']['email']='30';

//element for filters
$elements_list1_tab['filter']['name']='text';
$elements_list1_tab['filter']['phone']='text';
$elements_list1_tab['filter']['email']='text';

//element for sort
$elements_list1_tab['sort']['name']=1;
$elements_list1_tab['sort']['phone']=1;
$elements_list1_tab['sort']['email']=1;

$default_sort1='position';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['name']='Name';
$elements_details1_tab['name']['phone']='Phone';
$elements_details1_tab['name']['email']='E-mail';

$elements_details1_tab['type']['name']='text';
$elements_details1_tab['type']['phone']='text';
$elements_details1_tab['type']['email']='text'; 

$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
$page_settings_tab['translations']=0;
$page_settings_tab['pictures']=1;
$page_settings_tab['attachments']=1;
$page_settings_tab['deleting']=1;
$page_settings_tab['adding']=1;

include_once('php/elements/structure_basic.php');





































?>