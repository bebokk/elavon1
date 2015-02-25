<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='potentials';
$table_key='potentialid';
$view_name1='Potentials';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

//elements on list 
$elements_list1_tab['name']['name']='Name';
$elements_list1_tab['name']['price']='Price';
$elements_list1_tab['name']['currencyid']='Currency';
$elements_list1_tab['name']['clientid']='Client';
$elements_list1_tab['name']['userid']='User';
$elements_list1_tab['name']['expected_sales_date']='Expected Sales';

$elements_list1_tab['type']['name']='text';
$elements_list1_tab['type']['price']='text';
$elements_list1_tab['type']['currencyid']='select';
$elements_list1_tab['type']['clientid']='select';
$elements_list1_tab['type']['userid']='select';
$elements_list1_tab['type']['expected_sales_date']='text';

$query = "SELECT * FROM currency ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['currencyid'][$row['currencyid']]=$row['code'];
}

$query = "SELECT * FROM clients ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['clientid'][$row['clientid']]=$row['name'];
}

$query = "SELECT * FROM users ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['userid'][$row['userid']]=$row['name'];
}
  
//element for width
$elements_list1_tab['width']['name']='30';
$elements_list1_tab['width']['price']='8';
$elements_list1_tab['width']['currencyid']='8';
$elements_list1_tab['width']['clientid']='20';
$elements_list1_tab['width']['userid']='20';
$elements_list1_tab['width']['expected_sales_date']='10';

//element for filters
$elements_list1_tab['filter']['name']='text';
$elements_list1_tab['filter']['price']='text';
$elements_list1_tab['filter']['currencyid']='select';
$elements_list1_tab['filter']['clientid']='select';
$elements_list1_tab['filter']['userid']='select';

//element for sort
$elements_list1_tab['sort']['name']=1;
$elements_list1_tab['sort']['price']=1;
$elements_list1_tab['sort']['currencyid']=1;
$elements_list1_tab['sort']['clientid']=1;
$elements_list1_tab['sort']['userid']=1;

$default_sort1='position';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details  
$elements_details1_tab['name']['name']='Name';
$elements_details1_tab['name']['price']='Price';
$elements_details1_tab['name']['currencyid']='Currency';
$elements_details1_tab['name']['clientid']='Client';
$elements_details1_tab['name']['userid']='User';
$elements_details1_tab['name']['expected_sales_date']='Expected Sales';
$elements_details1_tab['name']['description']='Description';

$elements_details1_tab['type']['name']='text';
$elements_details1_tab['type']['price']='text';
$elements_details1_tab['type']['currencyid']='select';
$elements_details1_tab['type']['clientid']='select';
$elements_details1_tab['type']['userid']='select';
$elements_details1_tab['type']['expected_sales_date']='date';
$elements_details1_tab['type']['description']='wysywig';

$query = "SELECT * FROM currency ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['currencyid'][$row['currencyid']]=$row['code'];
}

$query = "SELECT * FROM clients ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['clientid'][$row['clientid']]=$row['name'];
}

$query = "SELECT * FROM users ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['userid'][$row['userid']]=$row['name'];
}

$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
$page_settings_tab['translations']=0;
$page_settings_tab['pictures']=0;
$page_settings_tab['deleting']=1;
$page_settings_tab['adding']=1;

include_once('php/elements/structure_basic.php');





































?>