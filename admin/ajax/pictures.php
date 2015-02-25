<?php

session_start();

include_once('../config/mysql.php');

if ($_POST['action'] == 'save_description') {
	
	//check if description exists
	$query = "SELECT * FROM pages_pictures_texts WHERE pages_pictureid='".$_POST['picture_id']."'";
	$result = @mysql_query ($query);	
	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
		$pages_pictures_textid=$row['pages_pictures_textid'];
	}
	
	if ($pages_pictures_textid > 0) {	
	
		$query = "UPDATE pages_pictures_texts SET description='".$_POST['image_desc1']."' WHERE pages_pictures_textid='".$pages_pictures_textid."'";
		$result = @mysql_query ($query);
		
	} else {
	
		$query = "INSERT INTO pages_pictures_texts (pages_pictures_textid,pages_pictureid,langid,description)
		VALUES (NULL,'".$_POST['picture_id']."','1','".$_POST['image_desc1']."')";
		$result = @mysql_query ($query);
	}
	
} elseif ($_POST['action'] == 'save_position') {
	
	$pic_pos=substr($_POST['pic_pos'],0,-1);
	$pic_pos_tab=explode(',',$pic_pos);
	
	$i=0;
	foreach ($pic_pos_tab as $key => $value) {
	
		$i++;		
		$value=str_replace('pic_','',$value);	
		$query = "UPDATE pages_pictures SET position='".$i."' WHERE pages_pictureid='".$value."'";
		$result = @mysql_query ($query);
	}
} elseif ($_POST['action'] == 'delete_picture') {
		
	$query = "SELECT * FROM pages_pictures WHERE pages_pictureid='".$_POST['del_pic']."'";
	$result = @mysql_query ($query);	
	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
		$delete_ext=$row['extension'];
	}
	unlink('../../images/pages/'.$_POST['del_pic'].'.'.$delete_ext);
	
	$query = "DELETE FROM pages_pictures WHERE pages_pictureid='".$_POST['del_pic']."'";
	$result = @mysql_query ($query);	
	
}


























?>