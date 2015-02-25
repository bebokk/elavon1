<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='communication';
$table_key='communicationid';
$view_name1='Communication';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

//elements on list 
$elements_list1_tab['name']['fromuserid']='From';
$elements_list1_tab['name']['touserid']='To';
$elements_list1_tab['name']['createtime']='Date';
$elements_list1_tab['name']['opened']='Opened';
$elements_list1_tab['name']['openedtime']='Opened time';

$elements_list1_tab['type']['fromuserid']='select';
$elements_list1_tab['type']['touserid']='select';
$elements_list1_tab['type']['createtime']='text';
$elements_list1_tab['type']['opened']='select';
$elements_list1_tab['type']['openedtime']='text';

//select values
$query = "SELECT * FROM users ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['fromuserid'][$row['userid']]=$row['name'];
}

$query = "SELECT * FROM users ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_list1_tab['select']['touserid'][$row['userid']]=$row['name'];
}

foreach ($no_yes_tab as $key => $value) {
	$elements_list1_tab['select']['opened'][$key]=$value;
}

//element for width
$elements_list1_tab['width']['fromuserid']='25';
$elements_list1_tab['width']['touserid']='25';
$elements_list1_tab['width']['createtime']='15';
$elements_list1_tab['width']['opened']='10';
$elements_list1_tab['width']['openedtime']='15';

//element for filters
$elements_list1_tab['filter']['fromuserid']='select';
$elements_list1_tab['filter']['touserid']='select';
$elements_list1_tab['filter']['createtime']='text';
$elements_list1_tab['filter']['opened']='select';
$elements_list1_tab['filter']['openedtime']='text';

//element for sort
$elements_list1_tab['sort']['fromuserid']=1;
$elements_list1_tab['sort']['touserid']=1;
$elements_list1_tab['sort']['createtime']=1;
$elements_list1_tab['sort']['opened']=1;
$elements_list1_tab['sort']['openedtime']=1;

$default_sort1='createtime';
$default_sort2='DESC';

//elements for details
$elements_details1_tab['name']['fromuserid']='From';
$elements_details1_tab['name']['touserid']='To';
$elements_details1_tab['name']['description']='Text';

$elements_details1_tab['type']['fromuserid']='select';
$elements_details1_tab['type']['touserid']='select';
$elements_details1_tab['type']['description']='wysywig';

$elements_details1_tab['edit']['fromuserid']=0;
$elements_details1_tab['edit']['touserid']=1;
$elements_details1_tab['edit']['description']=1;

//select values
$query = "SELECT * FROM users WHERE userid='".$_SESSION['user']['userid']."' ORDER BY position ASC LIMIT 1";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['fromuserid'][$row['userid']]=$row['name'];
}

//check to which properties user is connected
$query = "SELECT propertieid FROM properties_users WHERE userid='".$_SESSION['user']['userid']."'";
$result = @mysql_query ($query);
$propertieid1='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$propertieid1=$row['propertieid'].',';
}
$propertieid1=substr($propertieid1,0,-1);

$query = "SELECT
users.userid,
users.usersgroupid,
usersgroups.name as usersgroup_name,
properties.name as propertie_name,
users.name
FROM properties_users,users,properties,usersgroups
WHERE properties_users.userid=users.userid AND properties_users.propertieid=properties.propertieid AND
users.usersgroupid=usersgroups.usersgroupid";
if ($propertieid1 != '') $query .= " AND properties.propertieid IN (".$propertieid1.")";
$query .= " AND users.userid!='".$_SESSION['user']['userid']."'
ORDER BY properties.name ASC, usersgroups.name ASC, users.name ASC";
$result = @mysql_query ($query);
//echo "query -- $query -- $result <br>";
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements_details1_tab['select']['touserid'][$row['userid']]=$row['usersgroup_name'].' of '.$row['propertie_name'].' '.$row['name'];
}

foreach ($no_yes_tab as $key => $value) {
	$elements_details1_tab['select']['opened'][$key]=$value;
}

$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
$page_settings_tab['editing']=0;
$page_settings_tab['viewing']=1;
$page_settings_tab['answering']=1;
$page_settings_tab['forwarding']=0;
$page_settings_tab['translations']=0;
$page_settings_tab['pictures']=0;
$page_settings_tab['deleting']=0;
$page_settings_tab['adding']=1;

@include_once('php/elements/communication.php');





































?>