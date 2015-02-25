<?php

include_once('global_all.php');
include_once('config/menu.php');

//page types
$page_types_tab[1]='page';
$page_types_tab[2]='category';
$page_types_tab[3]='news';
$tpl->assign("page_types_tab",$page_types_tab);

//sent standart varchars
$tpl->assign("page",$_GET['page']);
$tpl->assign("subpage",$_GET['subpage']);
$tpl->assign("details",$_GET['details']);

//get user picture
$user_picture=adres_miniatury('images/basic/',$_SESSION['user']['picture'],40,40);
$tpl->assign("user_picture",$user_picture);

//get logo from admin
$query1 = "SELECT * FROM structure_basic_pictures WHERE tableid='1' AND table_name='images'
ORDER BY position ASC, createtime DESC LIMIT 0,1";
$result1 = @mysql_query ($query1);
while ($row1 = mysql_fetch_array ($result1, MYSQL_ASSOC)) {	
	$admin_logo1=adres_miniatury('images/basic/',$row1['structure_basic_pictureid'].'.'.$row1['extension'],80,46);
}
$tpl->assign("admin_logo1",$admin_logo1);

//possible contact actions
$possible_contact_actions_tab[1]='call';
$possible_contact_actions_tab[2]='e-mail';
$possible_contact_actions_tab[3]='face to face';
$possible_contact_actions_tab[4]='viewing';
$possible_contact_actions_tab[5]='event';
$tpl->assign("possible_contact_actions_tab",$possible_contact_actions_tab);

//time required for actions
$timetospend_tab[15]='15 minutes';
$timetospend_tab[30]='30 minutes';
$timetospend_tab[45]='45 minutes';
$timetospend_tab[60]='1 hour';
$timetospend_tab[90]='1,5 hour';
$timetospend_tab[120]='2 hour';
$timetospend_tab[240]='4 hour';
$timetospend_tab[480]='1 day';
//$timetospend_tab[960]='2 days';
//$timetospend_tab[1440]='3 days';
$tpl->assign("timetospend_tab",$timetospend_tab);

//English days of week
$days_od_week_tab[1]='Monday';
$days_od_week_tab[2]='Tuesday';
$days_od_week_tab[3]='Wednesday';
$days_od_week_tab[4]='Thursday';
$days_od_week_tab[5]='Friday';
$days_od_week_tab[6]='Saturday';
$days_od_week_tab[7]='Sunday';
$tpl->assign("days_od_week_tab",$days_od_week_tab);

//English days of week
$vat_tab[20]='20';
$vat_tab[5]='5';
$vat_tab[0]='0';
$tpl->assign("vat_tab",$vat_tab);

$no_yes_tab[0]='no';
$no_yes_tab[1]='yes';
$tpl->assign("no_yes_tab",$no_yes_tab);

$on_main_age_display_tab[0]='no';
$on_main_age_display_tab[1]='yes';
$tpl->assign("on_main_age_display_tab",$on_main_age_display_tab);

$main_page_position_tab[0]='left';
$main_page_position_tab[1]='right';
$tpl->assign("main_page_position_tab",$main_page_position_tab);

$main_page_display_type_tab[0]='picture';
$main_page_display_type_tab[1]='movie';
$tpl->assign("main_page_display_type_tab",$main_page_display_type_tab);

$main_page_display_size_tab[0]='small';
$main_page_display_size_tab[1]='big';
$main_page_display_size_tab[2]='double';
$tpl->assign("main_page_display_size_tab",$main_page_display_size_tab);

//generate_friendly_urls();
$score_tab[1]=1;
$score_tab[2]=2;
$score_tab[3]=3;
$score_tab[4]=4;
$score_tab[5]=5;
$tpl->assign("score_tab",$score_tab);

$type_of_main_page_tab[0]='news box'; 
$type_of_main_page_tab[1]='content box';
$tpl->assign("type_of_main_page_tab",$type_of_main_page_tab);

$type_of_main_page_tab[0]='news box'; 
$type_of_main_page_tab[1]='content box';
$tpl->assign("type_of_main_page_tab",$type_of_main_page_tab);

//rooms types
$rooms_types_tab[1]='Bedroom'; 
$rooms_types_tab[2]='Kitchen'; 
$rooms_types_tab[3]='Bathroom'; 
$rooms_types_tab[4]='Reception room'; 
$rooms_types_tab[5]='Toilet';
$rooms_types_tab[6]='Garden';
$rooms_types_tab[7]='Patio'; 
$rooms_types_tab[8]='Hol'; 
$rooms_types_tab[9]='Balcony'; 
$rooms_types_tab[10]='Gym'; 
$tpl->assign("rooms_types_tab",$rooms_types_tab);































?>