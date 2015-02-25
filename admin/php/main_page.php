<?php

include('php_save/main_page.php');

//Pełny tekst 	newsid 	position 	visits 	news_categoryid 	
//userid 	ban_main 	ban_cat 	main_page 	title 	description 	createtime 	lastactiontime
$query = "SELECT * FROM news WHERE main_page>0 ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements01_tab[$row['newsid']]=$row['title'];
	$elements011_tab[$row['newsid']]=0;
}

$query = "SELECT * FROM banners WHERE main_page>0 ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$elements02_tab[$row['bannerid']]=$row['name'];
	$elements021_tab[$row['bannerid']]=0;
}

/*
Pole 	Typ 	Metoda porównywania napisów 	Atrybuty 	Null 	Domyślnie 	Dodatkowo 	Działanie
display_main_pageid 	int(10) 		UNSIGNED 	Nie 	None 	AUTO_INCREMENT 	Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
elementid 	int(11) 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
elementtable 	int(11) 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
position 	int(11) 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
coll 	int(11) 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
*/
$query = "SELECT * FROM display_main_page ORDER BY position ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	
	foreach ($row as $key => $value) {	
		$elements0_tab[$row['coll']][$row['elementid']][$key]=$value;
	}
	if ($row['elementtable'] == 'news') {	
		$query1 = "SELECT title FROM news WHERE newsid='".$row['elementid']."'";
		$result1 = @mysql_query ($query1);
		while ($row1 = mysql_fetch_array ($result1, MYSQL_ASSOC)) {
			$elements0_tab[$row['coll']][$row['elementid']]['name']=$row1['title'];
		}
		$elements011_tab[$row['elementid']]=1;
		$elements021_tab[$row['elementid']]=1;
	}
	if ($row['elementtable'] == 'banners') {	
	
		$query1 = "SELECT name FROM banners WHERE bannerid='".$row['elementid']."'";
		$result1 = @mysql_query ($query1);
		while ($row1 = mysql_fetch_array ($result1, MYSQL_ASSOC)) {
			$elements0_tab[$row['coll']][$row['elementid']]['name']=$row1['name'];
		}
		$elements011_tab[$row['elementid']]=1;
		$elements021_tab[$row['elementid']]=1;
	}
}

/*
echo "elements011_tab -- <pre>";
print_r($elements011_tab);
echo "</pre>";
*/
foreach ($elements01_tab as $key => $value) {	
	if ($elements011_tab[$key] == 0) {
		$elements0_tab[0][$key]['name']=$value;		
		$elements0_tab[0][$key]['elementtable']='news';		
	}
}
foreach ($elements02_tab as $key => $value) {	
	if ($elements021_tab[$key] == 0) {
		$elements0_tab[0][$key]['name']=$value;		
		$elements0_tab[0][$key]['elementtable']='banners';		
	}
}
$tpl->assign("elements0_tab",$elements0_tab);
































?>