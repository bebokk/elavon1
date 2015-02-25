<?php

header("Content-type: text/plain");
session_start();

include_once('../config/mysql.php');				

/*
$fp = fopen('test.inc', 'w+');
fwrite($fp, 'query -- '.$query.' -- '.$result);
fclose($fp);
*/

//save attachment in gallery
if ($_FILES['new_attachments_tab'] != '') { 

	foreach ($_FILES['new_attachments_tab']['name'] as $key => $value) {
	
		$error1=0;		
		$ext=pathinfo($_FILES['new_attachments_tab']['name'][$key],PATHINFO_EXTENSION);			
		$attached_name=pathinfo($_FILES['new_attachments_tab']['name'][$key],PATHINFO_FILENAME);			
		
		if ($ext == 'exe') {
			$error_tab['new_attachments_tab'][$key] = 'Wrong extension!';
			$error1=1;	
		}
		
		//change attached name
		$attached_name=strtolower($attached_name);
		$attached_name=str_replace(' ','_',$attached_name);		
			
		if ($error1 == 0) {
		
			$query = "INSERT INTO structure_basic_attachments (structure_basic_attachmentid,tableid,table_name,position,active,name,extension,createtime) 
			VALUES (NULL,".$_SESSION['element_id'].",'".$_SESSION['table_name']."','0',1,'".$attached_name."','".$ext."','".date("Y-m-d H:i:s")."')";
			$result = @mysql_query($query);		
			$structure_basic_attachmentid=mysql_insert_id();		

			move_uploaded_file($_FILES['new_attachments_tab']['tmp_name'][$key], '../files/attachments/basic/'.$attached_name.'.'.$ext);
			chmod('../files/attachments/basic/'.$attached_name.'.'.$ext, 0777);			
		}	
	}
}














mysql_close($dbc);

?>