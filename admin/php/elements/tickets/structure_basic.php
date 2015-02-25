<?php

$tpl->assign("table_name",$table_name);
$tpl->assign("table_key",$table_key);
$tpl->assign("elements_list1_tab",$elements_list1_tab);
$tpl->assign("id1",$_GET['id1']);
$tpl->assign("elements_details1_tab",$elements_details1_tab);
$tpl->assign("attachet_tab",$attachet_tab);
$tpl->assign("attachetid_tab",$attachetid_tab);
$tpl->assign("attachet_fields_tab",$attachet_fields_tab);
$tpl->assign("attachet_fields_list_tab",$attachet_fields_list_tab);
$tpl->assign("attachet_fields_list_details_tab",$attachet_fields_list_details_tab);
$tpl->assign("attachet_page_settings_tab",$attachet_page_settings_tab);
$tpl->assign("attached_modules_tab",$attached_modules_tab);
$tpl->assign("attached_modules_settings_tab",$attached_modules_settings_tab);
$tpl->assign("pictures_details_tab",$pictures_details_tab);
$tpl->assign("attachet_page_pictures_details_tab",$attachet_page_pictures_details_tab);
$tpl->assign("page_settings_tab",$page_settings_tab);

$_SESSION['elements_list1_tab']=$elements_list1_tab;
$_SESSION['elements_details1_tab']=$elements_details1_tab;
$_SESSION['attachet_tab']=$attachet_tab;
$_SESSION['attachetid_tab']=$attachetid_tab;
$_SESSION['attachet_fields_tab']=$attachet_fields_tab;
$_SESSION['attachet_fields_list_tab']=$attachet_fields_list_tab;
$_SESSION['attachet_fields_list_details_tab']=$attachet_fields_list_details_tab;
$_SESSION['attachet_page_settings_tab']=$attachet_page_settings_tab;
$_SESSION['attached_modules_tab']=$attached_modules_tab;
$_SESSION['attached_modules_settings_tab']=$attached_modules_settings_tab;
$_SESSION['pictures_details_tab']=$pictures_details_tab;
$_SESSION['attachet_page_pictures_details_tab']=$attachet_page_pictures_details_tab;

$_SESSION[$table_name]['sort1']=$default_sort1;
$_SESSION[$table_name]['sort2']=$default_sort2;

if ($attachetid_tab != '') {
	foreach ($attachetid_tab as $key => $value) {
		if ($_SESSION[$table_name][$key]['sort1'] == '') $_SESSION[$table_name][$key]['sort1']=$attachetid_default_sort1[$key];
		if ($_SESSION[$table_name][$key]['sort2'] == '') $_SESSION[$table_name][$key]['sort2']=$attachetid_default_sort2[$key];
	}
}	

//count colls
$num_of_colls=3;
if ($page_settings_tab['translations'] == 1) $num_of_colls++;
if ($page_settings_tab['pictures'] == 1) $num_of_colls++;
if ($page_settings_tab['deleting'] == 1) $num_of_colls++;
if ($page_settings_tab['attachments'] == 2) $num_of_colls++;
foreach ($elements_list1_tab['name'] as $key => $value) {
	$num_of_colls++;
}
if ($attachet_tab != '') foreach ($attachet_tab as $key => $value) {
	$num_of_colls++;
}
$_SESSION['num_of_colls']=$num_of_colls;
$tpl->assign("num_of_colls",$num_of_colls);

$_SESSION['table_name']=$table_name;
$_SESSION['table_key']=$table_key;

$_SESSION['pagination_def']=0;
$_SESSION['show_entries_def']=10;

//default value when you changing page
$_SESSION['pagination']=$_SESSION['pagination_def'];
$_SESSION['show_entries']=$_SESSION['show_entries_def'];

if ($attachetid_tab != '') {
	foreach ($attachetid_tab as $key => $value) {
		$_SESSION[$key]['pagination']=$_SESSION['pagination_def'];
		$_SESSION[$key]['show_entries']=$_SESSION['show_entries_def'];
	}
}	

foreach ($page_settings_tab as $key => $value) {
	$_SESSION['page_settings_tab'][$key]=$value;
}




























?>