<?php

//error_reporting(0);

$zabronione_tab1[1]='select';
$zabronione_tab1[2]='insert';
$zabronione_tab1[3]='delete';
$zabronione_tab1[4]='update';
$zabronione_tab1[5]='drop';
$zabronione_tab1[6]='create';
$zabronione_tab1[7]='rename';
$zabronione_tab1[8]='select';
$zabronione_tab1[9]='truncate';	

foreach ($_GET as $key => $value) {
	foreach ($zabronione_tab1 as $key1 => $value1) {
		$value12=strtolower($value);			
		if (strstr($value12,$value1)) {
			die();
		}
	}
}

$forbidden_tab2[1]='select';
$forbidden_tab2[2]='insert';
$forbidden_tab2[3]='delete';
$forbidden_tab2[4]='update';
$forbidden_tab2[5]='drop';
$forbidden_tab2[6]='create';
$forbidden_tab2[7]='rename';
$forbidden_tab2[8]='select';
$forbidden_tab2[9]='truncate';		

foreach ($_POST as $key => $value) {
	foreach ($forbidden_tab2 as $key1 => $value1) {
		$value12=strtolower($value);
		if (strstr($value12,$value1)) {
			die();
		}
	}
}

?>