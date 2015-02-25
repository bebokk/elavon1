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
$table_name='properties';
$table_key='propertieid';
$view_name1='Properties';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

//elements on list 
if ($_SESSION['admin']['name'] != '') { 
	$elements_list1_tab['name']['agencieid']='Agency';
}
$elements_list1_tab['name']['address']='Address';
$elements_list1_tab['name']['city']='City';
$elements_list1_tab['name']['postcode']='Postcode';
$elements_list1_tab['name']['properties_typeid']='Type';
 
if ($_SESSION['admin']['name'] != '') { 
	$elements_list1_tab['type']['agencieid']='select';
}
$elements_list1_tab['type']['address']='text';
$elements_list1_tab['type']['city']='text';
$elements_list1_tab['type']['postcode']='text';
$elements_list1_tab['type']['properties_typeid']='select';

//select values
$query = "SELECT * FROM properties_types ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['properties_typeid'][$row['properties_typeid']]=$row['name'];
}

//select values
$query = "SELECT * FROM agencies ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['agencieid'][$row['agencieid']]=$row['name'];
}

//element for width
if ($_SESSION['admin']['name'] != '') { 
	$elements_list1_tab['width']['agencieid']='15';
	$elements_list1_tab['width']['address']='30';
	$elements_list1_tab['width']['city']='15';
	$elements_list1_tab['width']['postcode']='15';
	$elements_list1_tab['width']['properties_typeid']='15';
} else {
	$elements_list1_tab['width']['address']='40';
	$elements_list1_tab['width']['city']='20';
	$elements_list1_tab['width']['postcode']='15';
	$elements_list1_tab['width']['properties_typeid']='15';
}

//element for filters
$elements_list1_tab['filter']['agencieid']='select';
$elements_list1_tab['filter']['address']='text';
$elements_list1_tab['filter']['city']='text';
$elements_list1_tab['filter']['postcode']='text';
$elements_list1_tab['filter']['properties_typeid']='select';

//element for sort
$elements_list1_tab['sort']['agencieid']=1;
$elements_list1_tab['sort']['address']=1;
$elements_list1_tab['sort']['city']=1;
$elements_list1_tab['sort']['postcode']=1;
$elements_list1_tab['sort']['properties_typeid']=1;

$default_sort1='position';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['agencieid']='Agency';
$elements_details1_tab['name']['address']='Address';
$elements_details1_tab['name']['city']='City';
$elements_details1_tab['name']['address']='Address';
$elements_details1_tab['name']['postcode']='Postcode';
$elements_details1_tab['name']['num_bed']='Number of bedrooms';
$elements_details1_tab['name']['floors']='Floors';
$elements_details1_tab['name']['properties_typeid']='Type';
$elements_details1_tab['name']['description']='Description';

$elements_details1_tab['type']['agencieid']='select';
$elements_details1_tab['type']['address']='text';
$elements_details1_tab['type']['city']='text';
$elements_details1_tab['type']['address']='text';
$elements_details1_tab['type']['postcode']='text';
$elements_details1_tab['type']['num_bed']='text';
$elements_details1_tab['type']['floors']='text';
$elements_details1_tab['type']['properties_typeid']='select';
$elements_details1_tab['type']['description']='wysywig';

//select values
$query = "SELECT * FROM properties_types ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['properties_typeid'][$row['properties_typeid']]=$row['name'];
}

$query = "SELECT * FROM agencies ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['agencieid'][$row['agencieid']]=$row['name'];
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

//pictures config 
$pictures_details_tab[1]='All';
$pictures_details_tab[2]='Floorplan';

//extra tables connected 
$attachet_tab['properties_rooms']='Rooms';
$attachetid_tab['properties_rooms']='properties_roomid';

$attachetid_default_sort1['properties_rooms']='position';
$attachetid_default_sort2['properties_rooms']='ASC';

$attachet_fields_list_tab['properties_rooms']['name1']['name']='Name';
$attachet_fields_list_tab['properties_rooms']['name1']['type']='Type';
$attachet_fields_list_tab['properties_rooms']['name1']['size']='Size(m2)';
$attachet_fields_list_tab['properties_rooms']['name1']['floor']='Floor';
//$attachet_fields_list_tab['properties_rooms']['name1']['description']='Description';

$attachet_fields_list_tab['properties_rooms']['type']['name']='text';
$attachet_fields_list_tab['properties_rooms']['type']['type']='select';
$attachet_fields_list_tab['properties_rooms']['type']['size']='text';
$attachet_fields_list_tab['properties_rooms']['type']['floor']='text';
//$attachet_fields_list_tab['properties_rooms']['type']['description']='text';

//select values
foreach ($rooms_types_tab as $key => $value) {
	$attachet_fields_list_tab['properties_rooms']['select']['type'][$key]=$value;
}

$attachet_fields_list_tab['properties_rooms']['width']['name']='50';
$attachet_fields_list_tab['properties_rooms']['width']['type']='20';
$attachet_fields_list_tab['properties_rooms']['width']['size']='10';
$attachet_fields_list_tab['properties_rooms']['width']['floor']='10';
//$attachet_fields_list_tab['properties_rooms']['width']['description']='10';

$attachet_fields_list_tab['properties_rooms']['filter']['name']='text';
$attachet_fields_list_tab['properties_rooms']['filter']['type']='select';
$attachet_fields_list_tab['properties_rooms']['filter']['size']='text';
$attachet_fields_list_tab['properties_rooms']['filter']['floor']='text';
//$attachet_fields_list_tab['properties_rooms']['filter']['description']='text';

$attachet_fields_list_tab['properties_rooms']['sort']['name']='1';
$attachet_fields_list_tab['properties_rooms']['sort']['type']='1';
$attachet_fields_list_tab['properties_rooms']['sort']['size']='1';
$attachet_fields_list_tab['properties_rooms']['sort']['floor']='1';
//$attachet_fields_list_tab['properties_rooms']['sort']['description']='1';

$attachet_fields_list_tab['properties_rooms']['default_sort1']='position';
$attachet_fields_list_tab['properties_rooms']['default_sort2']='ASC';

$attachet_fields_list_details_tab['properties_rooms']['name1']['name']='Name';
$attachet_fields_list_details_tab['properties_rooms']['name1']['type']='Type';
$attachet_fields_list_details_tab['properties_rooms']['name1']['size']='Size(m2)';
$attachet_fields_list_details_tab['properties_rooms']['name1']['floor']='Floor';
$attachet_fields_list_details_tab['properties_rooms']['name1']['description']='Description';

$attachet_fields_list_details_tab['properties_rooms']['type']['name']='text';
$attachet_fields_list_details_tab['properties_rooms']['type']['type']='select';
$attachet_fields_list_details_tab['properties_rooms']['type']['size']='text';
$attachet_fields_list_details_tab['properties_rooms']['type']['floor']='text';
$attachet_fields_list_details_tab['properties_rooms']['type']['description']='wysywig';

//select values
foreach ($rooms_types_tab as $key => $value) {
	$attachet_fields_list_details_tab['properties_rooms']['select']['type'][$key]=$value;
}

$attachet_page_settings_tab['properties_rooms']['pagination']=1;
$attachet_page_settings_tab['properties_rooms']['filters']=1;
$attachet_page_settings_tab['properties_rooms']['translations']=0;
$attachet_page_settings_tab['properties_rooms']['pictures']=1;
$attachet_page_settings_tab['properties_rooms']['deleting']=1;
$attachet_page_settings_tab['properties_rooms']['adding']=1;

//pictures config 
$attachet_page_pictures_details_tab['properties_rooms'][1]='Pictures';

//get properties conencted with this user
if ($_SESSION['user']['usersgroupid'] == 12) {
	$query = "SELECT * FROM properties_users WHERE userid='".$_SESSION['user']['userid']."'";	
	$result = @mysql_query ($query);
	$propertiesid1='';
	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
		$propertiesid1.=','.$row['propertieid'];
	}
	$propertiesid1=substr($propertiesid1,1);
	$_SESSION['filters']['propertieid']=$propertiesid1;
}

/*
echo "_SESSION -- <pre>";
print_r($_SESSION);
echo "</pre>";
*/

@include_once('php/elements/structure_basic.php');




































?>