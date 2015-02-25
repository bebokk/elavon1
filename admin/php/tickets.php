<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='tickets';
$table_key='ticketid';
$view_name1='Tickets';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

$elements_list1_tab['name']['title']='Title';
$elements_list1_tab['name']['userid']='User';
$elements_list1_tab['name']['customerid']='Customer';
$elements_list1_tab['name']['state']='Next step';
$elements_list1_tab['name']['next_date']='Next step date';
 
$elements_list1_tab['type']['title']='text';
$elements_list1_tab['type']['userid']='select';
$elements_list1_tab['type']['customerid']='bigselect';
$elements_list1_tab['type']['state']='select';
$elements_list1_tab['type']['next_date']='text';

$elements_list1_tab['bigselect']['customerid']['tabname']='customers';
$elements_list1_tab['bigselect']['customerid']['disname']='company';

//select values
$query = "SELECT * FROM users ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['userid'][$row['userid']]=$row['name'];
}

//select values
$query = "SELECT * FROM tickets_states ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['state'][$row['tickets_stateid']]=$row['name'];
}

//element for width
$elements_list1_tab['width']['title']='30';
$elements_list1_tab['width']['userid']='25';
$elements_list1_tab['width']['customerid']='25';
$elements_list1_tab['width']['state']='10';
$elements_list1_tab['width']['next_date']='10';

//element for filters
$elements_list1_tab['filter']['title']='text';
$elements_list1_tab['filter']['userid']='select';
$elements_list1_tab['filter']['customerid']='bigselect';
$elements_list1_tab['filter']['state']='select';
$elements_list1_tab['filter']['next_date']='text';

//element for sort
$elements_list1_tab['sort']['title']=1;
$elements_list1_tab['sort']['userid']=1;
$elements_list1_tab['sort']['customerid']=1;
$elements_list1_tab['sort']['state']=1;

$default_sort1='next_date';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['title']='Title';
$elements_details1_tab['name']['userid']='Userid';
$elements_details1_tab['name']['customerid']='Customer';
$elements_details1_tab['name']['state']='Next step';
$elements_details1_tab['name']['next_date']='Next step date';
$elements_details1_tab['name']['decription']='Decription';

$elements_details1_tab['type']['title']='text';
$elements_details1_tab['type']['userid']='select';
$elements_details1_tab['type']['customerid']='bigselect';
$elements_details1_tab['type']['state']='select';
$elements_details1_tab['type']['next_date']='date';
$elements_details1_tab['type']['decription']='wysywig';

//select values
$query = "SELECT * FROM users ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['userid'][$row['userid']]=$row['name'];
}

//select values
$query = "SELECT * FROM tickets_states ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['state'][$row['tickets_stateid']]=$row['name'];
}

$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
$page_settings_tab['translations']=0;
$page_settings_tab['pictures']=1;
$page_settings_tab['deleting']=1;
$page_settings_tab['adding']=1;
$page_settings_tab['editing']=1;

@include_once('php/elements/tickets/structure_basic.php');





































?>