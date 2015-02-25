<?php

$main_menu['questions']='Questions';
$main_menu['answers']='Answers';
$main_menu['questionnaries']='Questionnaries';
//$main_menu['customers']='Customers';
//$main_menu['invoices']='Invoices';
//$main_menu['tickets']='Tickets';
$main_menu['users']='Users';
//$main_menu['products']='Products';
$main_menu['settings']='Settings';
//$main_menu['newsletter']='Newsletter';

//default page
$main_menu1['questions']='questions';
$main_menu1['answers']='answers_groups';
$main_menu1['questionnaries']='questionnaries';
$main_menu1['properties']='properties';
$main_menu1['calendar']='calendar_day';
$main_menu1['offers']='offers';
$main_menu1['tenancies']='tenancies';
$main_menu1['documents']='documents_users';
$main_menu1['invoices']='invoices';
$main_menu1['tickets']='tickets';
$main_menu1['customers']='customers';
$main_menu1['users']='users';
$main_menu1['products']='products';
$main_menu1['admin']='admin';
$main_menu1['agencies']='agencies';
$main_menu1['settings']='pages';
$main_menu1['top_menu']='top_menu';
$main_menu1['newsletter']='newsletter_send';
$main_menu1['communication']='communication'; 

//default ico
$main_menu2['questions']='css/menu/settings.png';
$main_menu2['answers']='css/menu/settings.png';
$main_menu2['questionnaries']='css/menu/settings.png';
$main_menu2['properties']='css/menu/Apartment House_48.png';
$main_menu2['calendar']='css/menu/Sale_48.png';
$main_menu2['offers']='css/menu/Sale_48.png';
$main_menu2['tenancies']='css/menu/tenant.png';
$main_menu2['documents']='css/menu/settings.png';
$main_menu2['invoices']='css/menu/settings.png';
$main_menu2['tickets']='css/menu/settings.png';
$main_menu2['customers']='css/menu/Users.png';
$main_menu2['users']='css/menu/Users.png';
$main_menu2['products']='css/menu/Users.png';
$main_menu2['admin']='css/menu/Users.png';
$main_menu2['agencies']='css/menu/Users.png';
$main_menu2['settings']='css/menu/settings.png';
$main_menu2['top_menu']='css/menu/settings.png';
$main_menu2['newsletter']='css/menu/Mail_48.png';
$main_menu2['communication']='css/menu/Mail_48.png';

$sub_menu['questions']['questions']='Questions';
$sub_menu['questions']['questions_groups']='Questions groups';
$sub_menu['answers']['answers_groups']='Answers groups';
$sub_menu['answers']['answers']='Answers';
$sub_menu['questionnaries']['questionnaries']='Questionnaries';
$sub_menu['properties']['properties']='Properties';
$sub_menu['properties']['properties_types']='Types';
$sub_menu['properties']['properties_offer_types']='Properties types';
$sub_menu['properties']['properties_users']='Properties users';
$sub_menu['calendar']['calendar_day']='Calendar';
$sub_menu['calendar']['calendar_month']='Calendar monthly';
$sub_menu['calendar']['contact_logs']='Meetings';
$sub_menu['offers']['offers']='Offers';
$sub_menu['tenancies']['tenancies']='Tenancies';
$sub_menu['tenancies']['payments']='Payments';
$sub_menu['documents']['documents']='Documents';	
$sub_menu['documents']['documents_templates']='Documents templates';	
$sub_menu['documents']['documents_users']='Documents users';
$sub_menu['invoices']['invoices']='Invoices';	
$sub_menu['tickets']['tickets']='Tickets';	
$sub_menu['tickets']['tickets_states']='Tickets states';	
$sub_menu['customers']['customers']='Customers';
$sub_menu['users']['users']='Users';
$sub_menu['users']['usersgroups']='Groups';
$sub_menu['products']['products']='Products';
$sub_menu['settings']['pages']='Pages';
//$sub_menu['settings']['settings']='Settings';
//$sub_menu['settings']['settings_invoices']='Invoices';
//$sub_menu['settings']['emails_templates']='Emails templates';
$sub_menu['top_menu']['top_menu']='Top menu';
$sub_menu['newsletter']['newsletter_send']='Send newsletter';
$sub_menu['newsletter']['newsletter_sent']='Newsletter sent';
$sub_menu['communication']['communication']='My box';

//get elements translations
if ($_SESSION['lang1'] != 1) {
	foreach ($main_menu as $key => $value) {	
		if ($trans2_tab[$value] != '') {
			$main_menu[$key]=$trans2_tab[$value];	
		}
	}
	foreach ($sub_menu as $key => $value) {	
		foreach ($sub_menu[$key] as $key1 => $value1) {	
			if ($trans2_tab[$value1] != '') {
				$sub_menu[$key][$key1]=$trans2_tab[$value1];	
			}
		}
	}
}

$tpl->assign("main_menu",$main_menu);
$tpl->assign("main_menu1",$main_menu1);
$tpl->assign("main_menu2",$main_menu2);
$tpl->assign("sub_menu",$sub_menu);

?>