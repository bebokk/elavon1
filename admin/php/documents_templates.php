<?php

include('php/plugins/structure_details_clear_sessions.php');

//basic list of elements based on one standard table
$table_name='documents_templates';
$table_key='documents_templateid';
$view_name1='Documents templates';

$page_name=$view_name1;
$tpl->assign("page_name",$page_name);

//elements on list
$elements_list1_tab['name']['name']='Name';

$elements_list1_tab['type']['name']='text';

//element for width
$elements_list1_tab['width']['name']='90';

//element for filters
$elements_list1_tab['filter']['name']='text';

//element for sort
$elements_list1_tab['sort']['name']=1;

$default_sort1='position';
$default_sort2='ASC';

//set basic page settings for tpl
$_SESSION['elements_details1_tab']='';

//elements for details
$elements_details1_tab['name']['name']='Name';
$elements_details1_tab['name']['description']='Description';

$elements_details1_tab['type']['name']='text';
$elements_details1_tab['type']['description']='wysywig';

$page_settings_tab['pagination']=1;
$page_settings_tab['filters']=1;
$page_settings_tab['translations']=0;
$page_settings_tab['pictures']=0;
$page_settings_tab['attachments']=0;
$page_settings_tab['deleting']=1;
$page_settings_tab['adding']=1;
$page_settings_tab['editing']=1;

//extra tables connected 
$attachet_tab['documents_templates_documents']='Documents';
$attachetid_tab['documents_templates_documents']='documents_templates_documentid';

$attachetid_default_sort1['documents_templates_documents']='position';
$attachetid_default_sort2['documents_templates_documents']='ASC';

$attachet_fields_list_tab['documents_templates_documents']['name1']['documentid']='Document';

$attachet_fields_list_tab['documents_templates_documents']['type']['documentid']='select';

$query = "SELECT * FROM documents WHERE documentid>0 ORDER BY name ASC";	
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$attachet_fields_list_tab['documents_templates_documents']['select']['documentid'][$row['documentid']]=$row['name'];
}

$attachet_fields_list_tab['documents_templates_documents']['width']['documentid']='90';

$attachet_fields_list_tab['documents_templates_documents']['filter']['documentid']='select';

$attachet_fields_list_tab['documents_templates_documents']['sort']['documentid']='1';

$attachet_fields_list_tab['documents_templates_documents']['default_sort1']='position';
$attachet_fields_list_tab['documents_templates_documents']['default_sort2']='ASC';

$attachet_page_settings_tab['documents_templates_documents']['pagination']=1;
$attachet_page_settings_tab['documents_templates_documents']['filters']=1;
$attachet_page_settings_tab['documents_templates_documents']['translations']=0;
$attachet_page_settings_tab['documents_templates_documents']['pictures']=1;
$attachet_page_settings_tab['documents_templates_documents']['deleting']=1;
$attachet_page_settings_tab['documents_templates_documents']['adding']=1;

include_once('php/elements/structure_basic.php');





































?>