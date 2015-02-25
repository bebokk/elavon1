<?php

session_start();

include_once('../config/mysql.php');

if ($_POST['action'] == 'save_changes') {
	
	$pic_pos=substr($_POST['pic_pos'],0,-1);
	$pic_pos_tab=explode(',',$pic_pos);
	
	$i=0;
	foreach ($pic_pos_tab as $key => $value) {	
		$i++;		
		$value=str_replace('pic1_','',$value);	
		$query = "UPDATE structure_basic_attachments SET description='".$_POST['description']."' 
		WHERE structure_basic_attachmentid='".$_POST['element_id']."'";
		$result = @mysql_query ($query);	
		//echo "query -- $query -- $result";
	}
} elseif ($_POST['action'] == 'save_position') {
	
	$pic_pos=substr($_POST['pic_pos'],0,-1);
	$pic_pos_tab=explode(',',$pic_pos);
	
	$i=0;
	foreach ($pic_pos_tab as $key => $value) {	
		$i++;		
		$value=str_replace('pic1_','',$value);	
		$query = "UPDATE structure_basic_attachments SET position='".$i."' WHERE structure_basic_attachmentid='".$value."'";
		$result = @mysql_query ($query);		
		//echo "query -- $query -- $result";
	}
} elseif ($_POST['action'] == 'delete_attachment') {
		
	$query = "SELECT * FROM structure_basic_attachments WHERE structure_basic_attachmentid='".$_POST['del_pic']."'";
	$result = @mysql_query ($query);	
	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
		$delete_ext=$row['extension'];
		$delete_name=$row['name'];
	}
	unlink('../files/attachments/basic/'.$delete_name.'.'.$delete_ext);
	
	$query = "DELETE FROM structure_basic_attachments WHERE structure_basic_attachmentid='".$_POST['del_pic']."'";
	$result = @mysql_query ($query);	
	
}

//structure_basic_attachmentid 	tableid 	table_name 	position 	active 	extension 	createtime 	lastactiontime
























mysql_close($dbc);

?>