<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='salesorders';
$table_key='salesorderid';
$view_name1='Sales orders';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

//elements on list 
$elements_list1_tab['name']['subject']='Subject';
$elements_list1_tab['name']['clientid']='Client';
$elements_list1_tab['name']['userid']='User';
$elements_list1_tab['name']['currencyid']='Currency';

$elements_list1_tab['type']['subject']='text';
$elements_list1_tab['type']['clientid']='select';
$elements_list1_tab['type']['userid']='select';
$elements_list1_tab['type']['currencyid']='select';

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
$elements_list1_tab['width']['subject']='21';
$elements_list1_tab['width']['clientid']='21';
$elements_list1_tab['width']['userid']='21';
$elements_list1_tab['width']['currencyid']='8';

//element for filters
$elements_list1_tab['filter']['subject']='text';
$elements_list1_tab['filter']['currencyid']='select';
$elements_list1_tab['filter']['clientid']='select';
$elements_list1_tab['filter']['userid']='select';

//element for sort
$elements_list1_tab['sort']['subject']=1;
$elements_list1_tab['sort']['currencyid']=1;
$elements_list1_tab['sort']['clientid']=1;
$elements_list1_tab['sort']['userid']=1;

$default_sort1='position';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['subject']='Subject';
$elements_details1_tab['name']['currencyid']='Currency';
$elements_details1_tab['name']['clientid']='Client';
$elements_details1_tab['name']['userid']='User';
$elements_details1_tab['name']['description']='Description';

$elements_details1_tab['type']['subject']='text';
$elements_details1_tab['type']['currencyid']='select';
$elements_details1_tab['type']['clientid']='select';
$elements_details1_tab['type']['userid']='select';
$elements_details1_tab['type']['description']='wysywig';

$query = "SELECT * FROM currency ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['currencyid'][$row['currencyid']]=$row['code'];
}

//select values
$query = "SELECT * FROM clients ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['clientid'][$row['clientid']]=$row['name'];
}

//select values
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

/*
salesorder_productid 	int(10) 		UNSIGNED 	No 	None 	AUTO_INCREMENT 	Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
position 	int(11) 			No 	None 		Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
name 	varchar(255) 	latin1_swedish_ci 		No 	None 		Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
price 	decimal(20,2) 			No 	None 		Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
quantity 	int(11) 			No 	None 		Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
vat 	int(11) 			No 	None 		Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
createtime 	datetime 			No 	None 		Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
lastactiontime 	datetime 			No 	None 		Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
*/

$attachet_tab['salesorder_products']='Products';

$attachetid_tab['salesorder_products']='salesorder_productid';

$attachetid_default_sort1['salesorder_products']='position';
$attachetid_default_sort2['salesorder_products']='ASC';

$attachet_fields_list_tab['salesorder_products']['name1']['productid']='Name';
$attachet_fields_list_tab['salesorder_products']['name1']['price']='Price';
$attachet_fields_list_tab['salesorder_products']['name1']['quantity']='Quantity';
$attachet_fields_list_tab['salesorder_products']['name1']['vat']='VAT';

$attachet_fields_list_tab['salesorder_products']['type']['productid']='select';
$attachet_fields_list_tab['salesorder_products']['type']['price']='text';
$attachet_fields_list_tab['salesorder_products']['type']['quantity']='text';
$attachet_fields_list_tab['salesorder_products']['type']['vat']='select'; 

//select values
$query = "SELECT * FROM products ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$attachet_fields_list_tab['salesorder_products']['select']['productid'][$row['productid']]=$row['name'];
}

foreach ($vat_tab as $key => $value) {	
	$attachet_fields_list_tab['salesorder_products']['select']['vat'][$key]=$value;
}

$attachet_fields_list_tab['salesorder_products']['width']['productid']='22';
$attachet_fields_list_tab['salesorder_products']['width']['price']='22';
$attachet_fields_list_tab['salesorder_products']['width']['quantity']='22';
$attachet_fields_list_tab['salesorder_products']['width']['vat']='22'; 

//$attachet_fields_list_tab['salesorder_products']['filter']['productid']='select';
$attachet_fields_list_tab['salesorder_products']['filter']['price']='text';
//$attachet_fields_list_tab['salesorder_products']['filter']['quantity']='text'; 
//$attachet_fields_list_tab['salesorder_products']['filter']['vat']='select'; 

$attachet_fields_list_tab['salesorder_products']['sort']['productid']='1';
$attachet_fields_list_tab['salesorder_products']['sort']['price']='1';
$attachet_fields_list_tab['salesorder_products']['sort']['quantity']='1';
$attachet_fields_list_tab['salesorder_products']['sort']['vat']='1'; 

$attachet_fields_list_tab['salesorder_products']['default_sort1']='position';
$attachet_fields_list_tab['salesorder_products']['default_sort2']='ASC';

$attachet_page_settings_tab['salesorder_products']['pagination']=1;
$attachet_page_settings_tab['salesorder_products']['filters']=1;
$attachet_page_settings_tab['salesorder_products']['translations']=0;
$attachet_page_settings_tab['salesorder_products']['pictures']=0;
$attachet_page_settings_tab['salesorder_products']['deleting']=1;
$attachet_page_settings_tab['salesorder_products']['adding']=1;

include_once('php/elements/salesorders/structure_basic.php');





































?>