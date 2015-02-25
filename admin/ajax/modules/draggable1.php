<?php

session_start();
include_once('../../config/mysql.php');

if ($_POST['action'] == 'draggable1_right') {
	
	//get info about this sales order
	$query = "INSERT INTO ".$_SESSION['attached_modules_settings_tab']['draggable1']['tabconname']."
	(".$_SESSION['attached_modules_settings_tab']['draggable1']['tabconid1'].",
	".$_SESSION['attached_modules_settings_tab']['draggable1']['tabid'].",
	".$_SESSION['attached_modules_settings_tab']['draggable1']['tabconid'].")
	VALUES (NULL,'".$_POST['id']."','".$_POST['element_id']."')"; 
	$result = @mysql_query ($query);
	//echo "query -- $query -- $result <br>"; 
}
 
if ($_POST['action'] == 'draggable1_left') {
	
	//get info about this sales order
	$query = "DELETE FROM ".$_SESSION['attached_modules_settings_tab']['draggable1']['tabconname']." 
	WHERE ".$_SESSION['attached_modules_settings_tab']['draggable1']['tabid']."='".$_POST['id']."' AND 
	".$_SESSION['attached_modules_settings_tab']['draggable1']['tabconid']."='".$_POST['element_id']."'"; 
	$result = @mysql_query ($query);
	//echo "query -- $query -- $result <br>"; 
}























mysql_close($dbc);

?>