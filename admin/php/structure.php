<?php

if ($_GET['details'] != '') {

	include_once('php/structure_details.php');
	
} else {

	include_once('php_save/structure.php');

	if ($_GET['id1'] != '') {
		$id11=$_GET['id1'];
	} else {
		$id11=0;
	}

	//get informations from database
	$query = "SELECT * FROM pages,pages_texts WHERE pages.pageid=pages_texts.pageid AND langid=1 AND parentid='".$id11."'
	ORDER BY position ASC, createtime ASC";
	$result = @mysql_query ($query);
	$i=0;
	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

		$i++;
		$pages_tab[$row['pageid']]['name']=$row['name'];
		$pages_tab[$row['pageid']]['i']=$i;
	}
	$tpl->assign("pages_tab",$pages_tab);

	//pobierz podstrony wybranej zakłądki jeśli jest to stona zawierająca podstrony
	if ($_GET['id1'] != '') {
		pobierz_id_kat($_GET['id1'], ','.$_GET['id1'].',');
	}

	//wczytaj menu górne
	unset($drzewo_kategorii);
	unset($drzewo_kategorii_link);
	unset($menu_boczne_typ_tab);
	unset($menu_boczne_linki_zew_tab);

	//jakie drzewko przyjmuje 2 wartości -- cale: uzywane w wersji demo w wyszukiwarce zaawansowanej, wybrane - wukorzystywane w drzewku w wersji demo
	drzewo_kategorii1(0, $id_parent_ciag_wynik, $poziom, 'wybrane');

	$tpl->assign("menu_boczne_tab",$drzewo_kategorii);	
	$tpl->assign("menu_boczne_link_tab",$drzewo_kategorii_link);	
	$tpl->assign("menu_boczne_typ_tab",$menu_boczne_typ_tab1);	
	$tpl->assign("menu_boczne_linki_zew_tab",$menu_boczne_linki_zew_tab1);	

	$tpl->assign("id1",$_GET['id1']);
}

$page_name='Structure';
$tpl->assign("page_name",$page_name);

?>