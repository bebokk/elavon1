<?php

include_once('php_save/structure_details.php');

//get informations from database
$query = "SELECT * FROM pages,pages_texts WHERE pages.pageid=pages_texts.pageid AND langid=1 AND pages.pageid='".$_GET['details']."' LIMIT 1";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	foreach ($row as $key => $value) {
		$page_tab[$key]=$value;
	}
}
$tpl->assign("page_tab",$page_tab);

//include gallery
$query = "SELECT * FROM pages,pages_pictures WHERE pages.pageid=pages_pictures.pageid
AND pages.pageid='".$_GET['details']."' ORDER BY pages_pictures.position ASC";
$result = @mysql_query ($query);
$i=0;
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

	$i++;
	foreach ($row as $key => $value) {
		$pictures_tab[$row['pages_pictureid']][$key]=$value;
	}
	$pictures_tab[$row['pages_pictureid']]['min1']=adres_miniatury('images/pages/',$row['pages_pictureid'].'.'.$row['extension'],126,126);
	$pictures_tab[$row['pages_pictureid']]['big1']='images/pages/'.$row['pages_pictureid'].'.'.$row['extension'];
	$pictures_tab[$row['pages_pictureid']]['i']=$i;
	
	//get picture descriptions 
	$query1 = "SELECT * FROM pages_pictures_texts WHERE pages_pictureid='".$row['pages_pictureid']."' AND langid=1";
	$result1 = @mysql_query ($query1);
	while ($row1 = mysql_fetch_array ($result1, MYSQL_ASSOC)) {
		
		foreach ($row1 as $key => $value) {
			$pictures_tab[$row['pages_pictureid']]['img_'.$key]=$value;
		}
	}
	//pages_pictures_textid 	pages_pictureid 	langid 	description
}
$tpl->assign("pictures_tab",$pictures_tab);

//selected elements
//database name
//field type
$fields_in_use_tab1['name']='text';
$fields_in_use_tab1['description']='textarea';
//$fields_in_use_tab1['pictures']='pictures';

/*
$possible_elements_tab[1]='text';
$possible_elements_tab[2]='textarea';
$possible_elements_tab[3]='textarea_editor';
$possible_elements_tab[4]='pictures';
$possible_elements_tab[5]='attachments';
$possible_elements_tab[6]='date';
*/

//field visible name
$fields_in_use_tab2['name']=$trans_tab[1][18];
$fields_in_use_tab2['description']=$trans_tab[1][19];
$fields_in_use_tab2['pictures']=$trans_tab[1][20];


$tpl->assign("fields_in_use_tab1",$fields_in_use_tab1);
$tpl->assign("fields_in_use_tab2",$fields_in_use_tab2);

$tpl->assign("id1",$id1);















?>
<script language="javascript">
	tiny_mce_on();
</script >