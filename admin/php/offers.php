<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='offers';
$table_key='offerid';
$view_name1='Offers';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

//elements on list 
$elements_list1_tab['name']['propertieid']='Property';
$elements_list1_tab['name']['type']='Type';
$elements_list1_tab['name']['price']='Price';
$elements_list1_tab['name']['active']='Active';
$elements_list1_tab['name']['sl_main']='Slider';

$elements_list1_tab['type']['propertieid']='select';
$elements_list1_tab['type']['type']='select';
$elements_list1_tab['type']['price']='text';
$elements_list1_tab['type']['active']='select';
$elements_list1_tab['type']['sl_main']='select';

//select values
$query = "SELECT * FROM properties ORDER BY position ASC";
$result = @mysql_query ($query); 
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

	//get property name
	if ($row['num_bed'] > 0) {
		$elements_list1_tab['select']['propertieid'][$row['propertieid']]=$row['num_bed'].' Bed ';
	}
	$elements_list1_tab['select']['propertieid'][$row['propertieid']].=$properties_types_tab[$row['properties_typeid']].', '.$row['address'];
}

foreach ($no_yes_tab as $key => $value) {	
	$elements_list1_tab['select']['active'][$key]=$value;
}

foreach ($no_yes_tab as $key => $value) {	
	$elements_list1_tab['select']['sl_main'][$key]=$value;
}

foreach ($offer_types_tab as $key => $value) {	
	$elements_list1_tab['select']['type'][$key]=$value;
}

//element for width
$elements_list1_tab['width']['propertieid']='40';
$elements_list1_tab['width']['type']='10';
$elements_list1_tab['width']['price']='20';
$elements_list1_tab['width']['active']='10';
$elements_list1_tab['width']['sl_main']='10';

//element for filters
$elements_list1_tab['filter']['propertieid']='select';
$elements_list1_tab['filter']['type']='select';
$elements_list1_tab['filter']['price']='text';
$elements_list1_tab['filter']['active']='select';
$elements_list1_tab['filter']['sl_main']='select';

//element for sort
$elements_list1_tab['sort']['propertieid']=1;
$elements_list1_tab['sort']['type']=1;
$elements_list1_tab['sort']['price']=1;
$elements_list1_tab['sort']['active']=1;
$elements_list1_tab['sort']['sl_main']=1;

$default_sort1='position';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['propertieid']='Property';
$elements_details1_tab['name']['type']='Type';
$elements_details1_tab['name']['price']='Price';
$elements_details1_tab['name']['active']='Active';
$elements_details1_tab['name']['sl_main']='Slider';

$elements_details1_tab['type']['propertieid']='select';
$elements_details1_tab['type']['type']='select';
$elements_details1_tab['type']['price']='text';
$elements_details1_tab['type']['active']='select';
$elements_details1_tab['type']['sl_main']='select';

//select values
$query = "SELECT * FROM properties ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	//$elements_details1_tab['select']['propertieid'][$row['propertieid']]=$row['name'];
	if ($row['num_bed'] > 0) {
		$elements_details1_tab['select']['propertieid'][$row['propertieid']]=$row['num_bed'].' Bed ';
	}
	$elements_details1_tab['select']['propertieid'][$row['propertieid']].=$properties_types_tab[$row['properties_typeid']].', '.$row['address'];
}

foreach ($no_yes_tab as $key => $value) {	
	$elements_details1_tab['select']['sl_main'][$key]=$value;
}

foreach ($no_yes_tab as $key => $value) {	
	$elements_details1_tab['select']['active'][$key]=$value;
}

foreach ($offer_types_tab as $key => $value) {	
	$elements_details1_tab['select']['type'][$key]=$value;
}

$page_settings_tab['pagination']=1;
$page_settings_tab['position']=1;
$page_settings_tab['filters']=1;
//$page_settings_tab['translations']=1;
$page_settings_tab['pictures']=1;
$page_settings_tab['deleting']=1;
$page_settings_tab['adding']=1;
$page_settings_tab['geolocation']=0;

//translations settings
//$elements_details1_tab['translations']['name']=1;
//$elements_details1_tab['translations']['description']=1;

include_once('php/elements/structure_basic.php');





































?>