<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='invoices';
$table_key='invoiceid';
$view_name1='Invoices';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

//elements on list
$elements_list1_tab['name']['customerid']='Customer';
$elements_list1_tab['name']['number']='Number';
$elements_list1_tab['name']['date']='date';
$elements_list1_tab['name']['duedate']='Duedate';

$elements_list1_tab['type']['customerid']='bigselect';
$elements_list1_tab['type']['number']='text';
$elements_list1_tab['type']['date']='text';
$elements_list1_tab['type']['duedate']='text';

$elements_list1_tab['bigselect']['customerid']['tabname']='customers';
$elements_list1_tab['bigselect']['customerid']['disname']='company';

//element for width
$elements_list1_tab['width']['customerid']='23';
$elements_list1_tab['width']['number']='23';
$elements_list1_tab['width']['date']='23';
$elements_list1_tab['width']['duedate']='23';

//element for filters
$elements_list1_tab['filter']['customerid']='bigselect';
$elements_list1_tab['filter']['number']='text';
$elements_list1_tab['filter']['date']='date';
$elements_list1_tab['filter']['duedate']='date';

//element for sort
$elements_list1_tab['sort']['customerid']=1;
$elements_list1_tab['sort']['number']=1;
$elements_list1_tab['sort']['date']=1;
$elements_list1_tab['sort']['duedate']=1;

$default_sort1='date';
$default_sort2='DESC';

$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
$page_settings_tab['editing']=1;
$page_settings_tab['translations']=0;
$page_settings_tab['pictures']=1;
$page_settings_tab['attachments']=0;
$page_settings_tab['deleting']=1;
$page_settings_tab['adding']=1;

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['customerid']='Customer';
$elements_details1_tab['name']['number']='Number';
$elements_details1_tab['name']['vat']='VAT';
$elements_details1_tab['name']['date']='date';
$elements_details1_tab['name']['duedate']='Duedate';

$elements_details1_tab['type']['customerid']='bigselect';
$elements_details1_tab['type']['number']='text';
$elements_details1_tab['type']['vat']='text';
$elements_details1_tab['type']['date']='date';
$elements_details1_tab['type']['duedate']='date';

//extra tables connected 
$attachet_tab['invoices_products']='Products';
$attachetid_tab['invoices_products']='invoices_productid';

$attachetid_default_sort1['invoices_products']='position';
$attachetid_default_sort2['invoices_products']='ASC';

$attachet_fields_list_tab['invoices_products']['name1']['name']='Name';
$attachet_fields_list_tab['invoices_products']['name1']['quantity']='Quantity';
$attachet_fields_list_tab['invoices_products']['name1']['price']='Price';

$attachet_fields_list_tab['invoices_products']['type']['name']='text';
$attachet_fields_list_tab['invoices_products']['type']['quantity']='text';
$attachet_fields_list_tab['invoices_products']['type']['price']='text';

$attachet_fields_list_tab['invoices_products']['width']['name']='30';
$attachet_fields_list_tab['invoices_products']['width']['quantity']='30';
$attachet_fields_list_tab['invoices_products']['width']['price']='30';

$attachet_fields_list_tab['invoices_products']['filter']['name']='text';
$attachet_fields_list_tab['invoices_products']['filter']['quantity']='text';
$attachet_fields_list_tab['invoices_products']['filter']['price']='text';

$attachet_fields_list_tab['invoices_products']['sort']['name']='1';
$attachet_fields_list_tab['invoices_products']['sort']['quantity']='1';
$attachet_fields_list_tab['invoices_products']['sort']['price']='1';

$attachet_fields_list_tab['invoices_products']['default_sort1']='position';
$attachet_fields_list_tab['invoices_products']['default_sort2']='ASC';

$attachet_page_settings_tab['invoices_products']['pagination']=1;
$attachet_page_settings_tab['invoices_products']['filters']=1;
$attachet_page_settings_tab['invoices_products']['translations']=0;
$attachet_page_settings_tab['invoices_products']['pictures']=0;
$attachet_page_settings_tab['invoices_products']['deleting']=1;
$attachet_page_settings_tab['invoices_products']['adding']=1;

include_once('php/elements/structure_basic.php');



































?>