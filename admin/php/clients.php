<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='clients';
$table_key='clientid';
$view_name1='Clients';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

//elements on list
$elements_list1_tab['name']['name']='Name';
$elements_list1_tab['name']['phone']='Phone';
$elements_list1_tab['name']['email']='E-mail';

$elements_list1_tab['type']['name']='text';
$elements_list1_tab['type']['phone']='text';
$elements_list1_tab['type']['email']='text';

//element for width
$elements_list1_tab['width']['name']='30';
$elements_list1_tab['width']['phone']='30';
$elements_list1_tab['width']['email']='30';

//element for filters
$elements_list1_tab['filter']['name']='text';
$elements_list1_tab['filter']['phone']='text';
$elements_list1_tab['filter']['email']='text';

//element for sort
$elements_list1_tab['sort']['name']=1;
$elements_list1_tab['sort']['phone']=1;
$elements_list1_tab['sort']['email']=1;

$default_sort1='position';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['name']='Name';
$elements_details1_tab['name']['phone']='Phone';
$elements_details1_tab['name']['email']='E-mail';

$elements_details1_tab['type']['name']='text';
$elements_details1_tab['type']['phone']='text';
$elements_details1_tab['type']['email']='text'; 

$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
$page_settings_tab['translations']=0;
$page_settings_tab['pictures']=1;
$page_settings_tab['attachments']=1;
$page_settings_tab['deleting']=1;
$page_settings_tab['adding']=1;

//extra tables connected

/*
clients_contactid 	int(10) 		UNSIGNED 	No 	None 	AUTO_INCREMENT 	Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
position 	int(11) 			No 	None 		Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
positionname 	varchar(255) 	latin1_swedish_ci 		No 	None 		Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
name 	varchar(255) 	latin1_swedish_ci 		No 	None 		Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
phone 	varchar(255) 	latin1_swedish_ci 		No 	None 		Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
email 	varchar(255) 	latin1_swedish_ci 		No 	None 		Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
createtime 	datetime 			No 	None 		Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
lastactiontime 	datetime 			No 	None 		Browse distinct values 	Change 	Drop 	Primary 	Unique 	Index 	Fulltext
*/

$attachet_tab['clients_contacts']='Contacts';

$attachetid_tab['clients_contacts']='clients_contactid';

$attachetid_default_sort1['clients_contacts']='position';
$attachetid_default_sort2['clients_contacts']='ASC';

$attachet_fields_list_tab['clients_contacts']['name1']['name']='Name';
$attachet_fields_list_tab['clients_contacts']['name1']['positionname']='Position name';
$attachet_fields_list_tab['clients_contacts']['name1']['phone']='Phone';
$attachet_fields_list_tab['clients_contacts']['name1']['email']='E-mail';

$attachet_fields_list_tab['clients_contacts']['type']['name']='text';
$attachet_fields_list_tab['clients_contacts']['type']['positionname']='text';
$attachet_fields_list_tab['clients_contacts']['type']['phone']='text';
$attachet_fields_list_tab['clients_contacts']['type']['email']='text'; 

$attachet_fields_list_tab['clients_contacts']['width']['name']='22';
$attachet_fields_list_tab['clients_contacts']['width']['positionname']='22';
$attachet_fields_list_tab['clients_contacts']['width']['phone']='22';
$attachet_fields_list_tab['clients_contacts']['width']['email']='22'; 

$attachet_fields_list_tab['clients_contacts']['filter']['name']='text';
$attachet_fields_list_tab['clients_contacts']['filter']['positionname']='text';
$attachet_fields_list_tab['clients_contacts']['filter']['phone']='text'; 
$attachet_fields_list_tab['clients_contacts']['filter']['email']='text'; 

$attachet_fields_list_tab['clients_contacts']['sort']['name']='1';
$attachet_fields_list_tab['clients_contacts']['sort']['positionname']='1';
$attachet_fields_list_tab['clients_contacts']['sort']['phone']='1';
$attachet_fields_list_tab['clients_contacts']['sort']['email']='1'; 

$attachet_fields_list_tab['clients_contacts']['default_sort1']='position';
$attachet_fields_list_tab['clients_contacts']['default_sort2']='ASC';

$attachet_page_settings_tab['clients_contacts']['pagination']=1;
$attachet_page_settings_tab['clients_contacts']['filters']=1;
$attachet_page_settings_tab['clients_contacts']['translations']=0;
$attachet_page_settings_tab['clients_contacts']['pictures']=1;
$attachet_page_settings_tab['clients_contacts']['deleting']=1;
$attachet_page_settings_tab['clients_contacts']['adding']=1;

include_once('php/elements/structure_basic.php');





































?>