<?php

header("Content-type: text/plain");
session_start();

include_once('../config/mysql.php');				

/*
$fp = fopen('test.inc', 'w+');
fwrite($fp, 'query -- '.$query.' -- '.$result);
fclose($fp);
*/

//save picture in gallery
if ($_FILES['new_pictures_tab'] != '') { 

	foreach ($_FILES['new_pictures_tab']['name'] as $key => $value) {
	
		$error1=0;		
		$ext=pathinfo($_FILES['new_pictures_tab']['name'][$key],PATHINFO_EXTENSION);			
		
		if ($ext != 'jpg' AND $ext != 'jpeg' AND $ext != 'JPEG' AND $ext != 'JPG' AND $ext != 'PNG' AND $ext != 'png' 
		AND $ext != 'GIF' AND $ext != 'gif') {
			$error_tab['new_pictures_tab'][$key] = 'Wrong extension!';
			$error1=1;	
		}
			
		if ($error1 == 0) {	
	
			$query = "INSERT INTO structure_basic_pictures (structure_basic_pictureid,tableid,table_name,position,active,extension,createtime) 
			VALUES (NULL,".$_SESSION['element_id'].",'".$_SESSION['attachetname1']."','0',1,'".$ext."','".date("Y-m-d H:i:s")."')";
			$result = @mysql_query($query);		
			$structure_basic_pictureid=mysql_insert_id();		

			move_uploaded_file($_FILES['new_pictures_tab']['tmp_name'][$key], '../images/basic/'.$structure_basic_pictureid.'.'.$ext);
			chmod('../images/basic/'.$structure_basic_pictureid.'.'.$ext, 0777);			
		}	
	}
}














mysql_close($dbc);

?>