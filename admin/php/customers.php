<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='customers';
$table_key='customerid';
$view_name1='Customers';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

//elements on list
$elements_list1_tab['name']['company']='Company';
$elements_list1_tab['name']['city']='City';
$elements_list1_tab['name']['email']='E-mail';
$elements_list1_tab['name']['phone']='Phone';
$elements_list1_tab['name']['products']='Products';

$elements_list1_tab['type']['company']='text';
$elements_list1_tab['type']['city']='text';
$elements_list1_tab['type']['email']='text';
$elements_list1_tab['type']['phone']='text';
$elements_list1_tab['type']['products']='multiselect';

//select values
$query = "SELECT * FROM products ORDER BY name ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['products'][$row['productid']]=$row['name'];
}

//element for width
$elements_list1_tab['width']['company']='17';
$elements_list1_tab['width']['city']='17';
$elements_list1_tab['width']['email']='17';
$elements_list1_tab['width']['phone']='17';
$elements_list1_tab['width']['products']='17';

//element for filters
$elements_list1_tab['filter']['company']='text';
$elements_list1_tab['filter']['city']='text';
$elements_list1_tab['filter']['email']='text';
$elements_list1_tab['filter']['phone']='text';
$elements_list1_tab['filter']['products']='multiselect';

//element for sort
$elements_list1_tab['sort']['company']=1;
$elements_list1_tab['sort']['city']=1;
$elements_list1_tab['sort']['email']=1;
$elements_list1_tab['sort']['phone']=1;
$elements_list1_tab['sort']['products']=1;

$default_sort1='company';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['company']='Company';
$elements_details1_tab['name']['city']='City';
$elements_details1_tab['name']['address']='Address';
$elements_details1_tab['name']['postcode']='Postcode';
$elements_details1_tab['name']['vatin']='Vat in';
$elements_details1_tab['name']['email']='E-mail';
$elements_details1_tab['name']['phone']='Phone';
$elements_details1_tab['name']['products']='Phone';

$elements_details1_tab['type']['company']='text';
$elements_details1_tab['type']['city']='text';
$elements_details1_tab['type']['address']='text';
$elements_details1_tab['type']['postcode']='text';
$elements_details1_tab['type']['vatin']='text';
$elements_details1_tab['type']['email']='text';
$elements_details1_tab['type']['phone']='text';
$elements_details1_tab['type']['products']='multiselect';

//select values
$query = "SELECT * FROM products ORDER BY name ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['products'][$row['productid']]=$row['name'];
}

$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
$page_settings_tab['editing']=1;
$page_settings_tab['translations']=0;
$page_settings_tab['pictures']=1;
$page_settings_tab['attachments']=0;
$page_settings_tab['deleting']=1;
$page_settings_tab['adding']=1;

include_once('php/elements/structure_basic.php');





































?>