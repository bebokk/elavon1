<?php

//deltete element from database
if ($_GET['delete'] != '') {
	
	$query = "DELETE FROM pages WHERE pageid='".$_GET['delete']."'";
	$result = @mysql_query ($query);	
	$query = "DELETE FROM pages_texts WHERE pageid='".$_GET['delete']."'";
	$result = @mysql_query ($query);
}

//add element to database
if (isset($_POST['add_element1'])) {
	
	if (strstr($_POST['name'], ';')) {
		
		$name_tab1=explode(';',$_POST['name']);
		foreach ($name_tab1 as $key => $value) {
			
			$query = "INSERT INTO pages (pageid,parentid,active,position,type,createtime)
			VALUES (NULL,'".$id11."','0','999999','1','".date("Y-m-d H:i:s")."')";
			$result = @mysql_query ($query);
			$pageid=mysql_insert_id();
			
			$query = "INSERT INTO pages_texts (pages_textid,pageid,langid,name)
			VALUES (NULL,'".$pageid."','1','".$value."')";
			$result = @mysql_query ($query);			
		}
	} else {
	
		$query = "INSERT INTO pages (pageid,parentid,active,position,type,createtime)
		VALUES (NULL,'".$id11."','0','999999','1','".date("Y-m-d H:i:s")."')";
		$result = @mysql_query ($query);
		$pageid=mysql_insert_id();
		
		$query = "INSERT INTO pages_texts (pages_textid,pageid,langid,name)
		VALUES (NULL,'".$pageid."','1','".$_POST['name']."')";
		$result = @mysql_query ($query);		
	}
}

//pageid 	parentid 	active 	position 	type 	link 	createtime 	lastactiontime
//pages_textid 	pageid 	langid 	name 	description

?>