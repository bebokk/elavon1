<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='packages';
$table_key='packageid';
$view_name1='Packages';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

//elements on list
$elements_list1_tab['name']['packageid']='Id';
$elements_list1_tab['name']['name']='Name';
$elements_list1_tab['name']['price']='Price';
//$elements_list1_tab['name']['code']='Code';

$elements_list1_tab['type']['packageid']='text';
$elements_list1_tab['type']['name']='text';
$elements_list1_tab['type']['price']='text';
//$elements_list1_tab['type']['code']='text';

//element for width
$elements_list1_tab['width']['packageid']='10';
$elements_list1_tab['width']['name']='60';
$elements_list1_tab['width']['price']='20';
//$elements_list1_tab['width']['code']='20';

//element for filters
$elements_list1_tab['filter']['packageid']='text';
$elements_list1_tab['filter']['name']='text';
$elements_list1_tab['filter']['price']='text';
//$elements_list1_tab['filter']['code']='text';

//element for sort
$elements_list1_tab['sort']['name']=1;
$elements_list1_tab['sort']['price']=1;
//$elements_list1_tab['sort']['code']=1;

$default_sort1='position';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['name']='Name';
$elements_details1_tab['name']['price']='Price';
//$elements_details1_tab['name']['code']='Code';
$elements_details1_tab['name']['description']='Description';

$elements_details1_tab['type']['name']='text';
$elements_details1_tab['type']['price']='text';
//$elements_details1_tab['type']['code']='text';
$elements_details1_tab['type']['description']='wysywig';

$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
$page_settings_tab['translations']=0;
$page_settings_tab['pictures']=1;
$page_settings_tab['deleting']=1;
$page_settings_tab['adding']=1;
$page_settings_tab['attachments']=1;


$attachet_tab['packages_subpages']='Podstrony';

$attachetid_tab['packages_subpages']='packages_subpageid';

$attachetid_default_sort1['packages_subpages']='position';
$attachetid_default_sort2['packages_subpages']='ASC';

$attachet_fields_list_tab['packages_subpages']['name1']['name']='Name';
$attachet_fields_list_tab['packages_subpages']['name1']['description']='Description';

$attachet_fields_list_tab['packages_subpages']['type']['name']='text';
$attachet_fields_list_tab['packages_subpages']['type']['description']='wysywig';

$attachet_fields_list_tab['packages_subpages']['width']['name']='90';
$attachet_fields_list_tab['packages_subpages']['width']['description']='45';

$attachet_fields_list_tab['packages_subpages']['filter']['name']='text';
//$attachet_fields_list_tab['packages_subpages']['filter']['description']='wysywig';

$attachet_fields_list_tab['packages_subpages']['sort']['name']='1';
$attachet_fields_list_tab['packages_subpages']['sort']['description']='0';

$attachet_fields_list_tab['packages_subpages']['default_sort1']='position';
$attachet_fields_list_tab['packages_subpages']['default_sort2']='ASC';

$attachet_page_settings_tab['packages_subpages']['pagination']=1;
$attachet_page_settings_tab['packages_subpages']['filters']=1;
$attachet_page_settings_tab['packages_subpages']['translations']=0;
$attachet_page_settings_tab['packages_subpages']['pictures']=0;
$attachet_page_settings_tab['packages_subpages']['deleting']=1;
$attachet_page_settings_tab['packages_subpages']['adding']=1;


include_once('php/elements/structure_basic.php');





































?>