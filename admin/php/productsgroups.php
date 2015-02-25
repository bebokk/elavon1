<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='productsgroups';
$table_key='productsgroupid';
$view_name1='Products groups';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

//elements on list 
$elements_list1_tab['name']['productsgroupid']='Id';
$elements_list1_tab['name']['name']='Name';
$elements_list1_tab['name']['price']='Price';
//$elements_list1_tab['name']['groupproduct_code']='Kod zestawu';

$elements_list1_tab['type']['productsgroupid']='text';
$elements_list1_tab['type']['name']='text';
$elements_list1_tab['type']['price']='text';
//$elements_list1_tab['type']['groupproduct_code']='text';

//element for width
$elements_list1_tab['width']['productsgroupid']='10';
$elements_list1_tab['width']['name']='60';
$elements_list1_tab['width']['price']='20';
//$elements_list1_tab['width']['groupproduct_code']='20';

//element for filters
$elements_list1_tab['filter']['name']='text';
$elements_list1_tab['filter']['price']='text';
//$elements_list1_tab['filter']['groupproduct_code']='text';

//element for sort
$elements_list1_tab['sort']['name']=1;
$elements_list1_tab['sort']['price']=1;
//$elements_list1_tab['sort']['groupproduct_code']=1;

$default_sort1='position';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['name']='Name';
$elements_details1_tab['name']['price']='Price';
//$elements_details1_tab['name']['groupproduct_code']='Kod zestawu';

$elements_details1_tab['type']['name']='text';
$elements_details1_tab['type']['price']='text';
//$elements_details1_tab['type']['groupproduct_code']='text';

$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
$page_settings_tab['translations']=0;
$page_settings_tab['pictures']=0;
$page_settings_tab['deleting']=1;
$page_settings_tab['adding']=1;


$attachet_tab='';

$attached_modules_tab['draggable1']=1;

$attached_modules_settings_tab['draggable1']['tabname']='products';
$attached_modules_settings_tab['draggable1']['tabid']='productid';
$attached_modules_settings_tab['draggable1']['dispname1']='Products';
$attached_modules_settings_tab['draggable1']['dispname2']='name';
$attached_modules_settings_tab['draggable1']['tabconname']='products2productsgroups';
$attached_modules_settings_tab['draggable1']['tabconid']='productsgroupid';
$attached_modules_settings_tab['draggable1']['tabconid1']='products2productsgroupid';

include_once('php/elements/structure_basic.php');





































?>