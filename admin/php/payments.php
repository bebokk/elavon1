<?php

include('php/plugins/structure_details_clear_sessions.php');

//get properties conencted with this user
if ($_SESSION['user']['usersgroupid'] == 12 OR $_SESSION['user']['usersgroupid'] == 11) {

	$query = "SELECT * FROM properties_users WHERE userid='".$_SESSION['user']['userid']."'";	
	$result = @mysql_query ($query);
	$propertiesid1='';
	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
		$propertiesid1.=','.$row['propertieid'];
	}
	$propertiesid1=substr($propertiesid1,1);
	$_SESSION['filters']['propertieid']=$propertiesid1;
}

//basic list of elements based on one standard table
$table_name='tenancies_payments';
$table_key='tenancies_paymentid';
$view_name1='Tenancies payments';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

//elements on list 
$elements_list1_tab['name']['propertieid']='Property';
$elements_list1_tab['name']['userid']='User';
$elements_list1_tab['name']['amount']='Amount';
$elements_list1_tab['name']['date']='Date';
$elements_list1_tab['name']['date_paid']='Date paid';

$elements_list1_tab['type']['propertieid']='select';
$elements_list1_tab['type']['userid']='select';
$elements_list1_tab['type']['amount']='text';
$elements_list1_tab['type']['date']='date';
$elements_list1_tab['type']['date_paid']='date';

//select values
$query = "SELECT * FROM properties WHERE propertieid>0";
if ($_SESSION['user']['usersgroupid'] == 12) {
	$query .= " AND propertieid IN (".$propertiesid1.")";
}
$query .= " ORDER BY position ASC";
$result = @mysql_query ($query); 
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

	//get property name
	if ($row['num_bed'] > 0) {
		$elements_list1_tab['select']['propertieid'][$row['propertieid']]=$row['num_bed'].' Bed ';
	}
	$elements_list1_tab['select']['propertieid'][$row['propertieid']].=$properties_types_tab[$row['properties_typeid']].', '.$row['address'];
}

//select values
$query = "SELECT * FROM users WHERE usersgroupid=11 ORDER BY name ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['userid'][$row['userid']]=$row['name'];
}

//element for width
$elements_list1_tab['width']['propertieid']='34';
$elements_list1_tab['width']['userid']='20';
$elements_list1_tab['width']['amount']='12';
$elements_list1_tab['width']['date']='12';
$elements_list1_tab['width']['date_paid']='12';

//element for filters
$elements_list1_tab['filter']['propertieid']='select';
$elements_list1_tab['filter']['userid']='select';
$elements_list1_tab['filter']['amount']='text';
$elements_list1_tab['filter']['date']='date';
$elements_list1_tab['filter']['date_paid']='date';

//element for sort
$elements_list1_tab['sort']['propertieid']=1;
$elements_list1_tab['sort']['userid']=1;
$elements_list1_tab['sort']['amount']=1;
$elements_list1_tab['sort']['date']=1;
$elements_list1_tab['sort']['date_paid']=1;

$default_sort1='date';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['propertieid']='Property';
$elements_details1_tab['name']['userid']='User';
$elements_details1_tab['name']['amount']='Amount';
$elements_details1_tab['name']['date']='Date';
$elements_details1_tab['name']['date_paid']='Date paid';

$elements_details1_tab['type']['propertieid']='select';
$elements_details1_tab['type']['userid']='select';
$elements_details1_tab['type']['amount']='text';
$elements_details1_tab['type']['date']='date';
$elements_details1_tab['type']['date_paid']='date';

//select values
$query = "SELECT * FROM properties WHERE propertieid>0";
if ($_SESSION['user']['usersgroupid'] == 12) {
	$query .= " AND propertieid IN (".$propertiesid1.")";
}
$query .= " ORDER BY position ASC";
$result = @mysql_query ($query); 
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

	//get property name
	if ($row['num_bed'] > 0) {
		$elements_details1_tab['select']['propertieid'][$row['propertieid']]=$row['num_bed'].' Bed ';
	}
	$elements_details1_tab['select']['propertieid'][$row['propertieid']].=$properties_types_tab[$row['properties_typeid']].', '.$row['address'];
}

//select values
$query = "SELECT * FROM users WHERE usersgroupid=11 ORDER BY name ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['userid'][$row['userid']]=$row['name'];
}

$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
$page_settings_tab['translations']=0;
$page_settings_tab['pictures']=0;

if ($_SESSION['user']['usersgroupid'] == 12 OR $_SESSION['user']['usersgroupid'] == 11) {
	$page_settings_tab['adding']=0;
	$page_settings_tab['editing']=0;
	$page_settings_tab['viewing']=1;
	$page_settings_tab['deleting']=0;
} else {
	$page_settings_tab['adding']=1;
	$page_settings_tab['editing']=1;
	$page_settings_tab['viewing']=0;
	$page_settings_tab['deleting']=1;
}

@include_once('php/elements/structure_basic.php');




































?>