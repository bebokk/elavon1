<?php

session_start();

include_once('../config/mysql.php');

if ($_POST['action'] == 'save_position1') {
	
	$pic_pos=substr($_POST['pic_pos'],0,-1);
	$pic_pos_tab=explode(',',$pic_pos);
	
	$i=0;
	foreach ($pic_pos_tab as $key => $value) {	
		$i++;		
		$value=str_replace('pic1_','',$value);	
		$value1=explode("_",$value);
		
		$query = "UPDATE structure_basic_pictures SET position='".$i."',`group`='".$value1[1]."' WHERE structure_basic_pictureid='".$value1[0]."'";
		$result = @mysql_query ($query);
		//echo "query -- $query -- $result<br><br>";
	}
} elseif ($_POST['action'] == 'save_position') {
	
	$pic_pos=substr($_POST['pic_pos'],0,-1);
	$pic_pos_tab=explode(',',$pic_pos);
	
	$i=0;
	foreach ($pic_pos_tab as $key => $value) {	
		$i++;		
		$value=str_replace('pic1_','',$value);	
		$query = "UPDATE structure_basic_pictures SET position='".$i."' WHERE structure_basic_pictureid='".$value."'";
		$result = @mysql_query ($query);		
		//echo "query -- $query -- $result";
	}
} elseif ($_POST['action'] == 'delete_picture') {
		
	$query = "SELECT * FROM structure_basic_pictures WHERE structure_basic_pictureid='".$_POST['del_pic']."'";
	$result = @mysql_query ($query);	
	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
		$delete_ext=$row['extension'];
	}
	unlink('../images/basic/'.$_POST['del_pic'].'.'.$delete_ext);
	
	$query = "DELETE FROM structure_basic_pictures WHERE structure_basic_pictureid='".$_POST['del_pic']."'";
	$result = @mysql_query ($query);	
	
}

//structure_basic_pictureid 	tableid 	table_name 	position 	active 	extension 	createtime 	lastactiontime
























mysql_close($dbc);

?>