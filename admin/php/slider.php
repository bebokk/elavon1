<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='slider';
$table_key='sliderid';
$view_name1='Slider';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

//elements on list 
$elements_list1_tab['name']['name']='Name';
$elements_list1_tab['name']['link']='Link';

$elements_list1_tab['type']['name']='text';
$elements_list1_tab['type']['link']='text';

//element for width
$elements_list1_tab['width']['name']='55';
$elements_list1_tab['width']['link']='35';

//element for filters
$elements_list1_tab['filter']['name']='text';
$elements_list1_tab['filter']['link']='text';

//element for sort
$elements_list1_tab['sort']['name']=1;
$elements_list1_tab['sort']['link']=1;

$default_sort1='position';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['name']='Name';
$elements_details1_tab['name']['link']='Link';
$elements_details1_tab['name']['description']='Description';

$elements_details1_tab['type']['name']='text';
$elements_details1_tab['type']['link']='text';
$elements_details1_tab['type']['description']='wysywig';

$page_settings_tab['pagination']=0;
$page_settings_tab['filters']=0;
$page_settings_tab['translations']=0;
$page_settings_tab['pictures']=1;
$page_settings_tab['deleting']=0;

include_once('php/elements/structure_basic.php');





































?>