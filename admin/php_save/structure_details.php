<?php

//add element to database
if (isset($_POST['save_details'])) {
	
	$query = "UPDATE pages_texts SET 
	name='".$_POST['name']."',
	description='".$_POST['description']."'
	WHERE pageid='".$_GET['details']."' AND langid=1";
	$result = @mysql_query ($query);
	
	$ok_info1='Data was correctly saved';
}

$tpl->assign("ok_info1",$ok_info1);

//save picture in gallery
if ($_FILES['new_pictures_tab'] != '') { 

	foreach ($_FILES['new_pictures_tab']['name'] as $key => $value) {

		//czy sa wprowadzane poprawne paramery
		$error1=0;		

		//pobierz rozszerzenie pliku
		$ext=pathinfo($_FILES['new_pictures_tab']['name'][$key],PATHINFO_EXTENSION);		
		
		//echo "<pre>";
		//print_r($_FILES['new_pictures_tab']);
		//echo "</pre>";
		
		if ($ext != 'jpg' AND $ext != 'jpeg' AND $ext != 'JPEG' AND $ext != 'JPG' AND $ext != 'PNG' AND $ext != 'png' 
		AND $ext != 'GIF' AND $ext != 'gif') {
			$error_tab['zdjecie_produktu'][$key] = 'Wrong extension!';
			$error1=1;	
		}
		//koniec czy sa wprowadzane poprawne paramery
			
		if ($error1 == 0) {	
		
			$query = "INSERT INTO pages_pictures (pages_pictureid,pageid,extension,active,createtime) 
			VALUES (NULL,".$_GET['details'].",'".$ext."',1,'".date("Y-m-d H:i:s")."')";
			$result = @mysql_query($query);		
			$pageid1=mysql_insert_id();
			
			move_uploaded_file($_FILES['new_pictures_tab']['tmp_name'][$key], 'images/pages/'.$pageid1.'.'.$ext);
			chmod('images/pages/'.$pageid1.'.'.$ext, 0777);			
		}	
	}
}

if ($_GET['delete_pic'] != '') {
		
	$query = "SELECT * FROM pages_pictures WHERE pages_pictureid='".$_GET['delete_pic']."'";
	$result = @mysql_query ($query);
	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
		$delete_ext=$row['ext'];
	}
	unlink('images/pages/'.$_GET['delete_pic'].'.'.$delete_ext);
	
	$query = "DELETE FROM pages_pictures WHERE pages_pictureid='".$_GET['delete_pic']."'";
	$result = @mysql_query ($query);	
}






























?>