<?php

session_start();
include_once('../config/mysql.php');

$query = "DELETE FROM display_main_page WHERE display_main_pageid>0";
$result = @mysql_query ($query);

$i=0;
foreach ($_POST['sortable12_tab'] as $key => $value) {
	
	$i++;
	$query = "INSERT INTO display_main_page 
	(display_main_pageid,elementid,elementtable,position,coll)
	VALUES
	(NULL,'".$value."','".$_POST['sortable11_tab'][$key]."','".$i."','0')";
	$result = @mysql_query ($query);
	echo "query -- $query -- $result <br>";
}

$i=0;
foreach ($_POST['sortable22_tab'] as $key => $value) {
	
	$i++;
	$query = "INSERT INTO display_main_page 
	(display_main_pageid,elementid,elementtable,position,coll)
	VALUES
	(NULL,'".$value."','".$_POST['sortable21_tab'][$key]."','".$i."','1')";
	$result = @mysql_query ($query);
}

$i=0;
foreach ($_POST['sortable32_tab'] as $key => $value) {
	
	$i++;
	$query = "INSERT INTO display_main_page 
	(display_main_pageid,elementid,elementtable,position,coll)
	VALUES
	(NULL,'".$value."','".$_POST['sortable31_tab'][$key]."','".$i."','2')";
	$result = @mysql_query ($query);
}

/*
display_main_pageid 	int(10) 		UNSIGNED 	Nie 	None 	AUTO_INCREMENT 	Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
elementid 	int(11) 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
elementtable 	int(11) 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
position 	int(11) 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
coll 	int(11) 			Nie 	None 		Przeglądaj różne wartości 	Zmień 	Usuń 	Podstawowy 	Jednoznaczny 	Indeks 	Pełny tekst
*/



























?>