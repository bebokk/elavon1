<?php

session_start();
include_once('../config/mysql.php');

//save picture in gallery
if ($_POST['action'] == 'upload_picture') {

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
	
} elseif ($_POST['action'] == 'save_translations') {

	foreach ($_POST['save_parameters_id_tab'] as $key => $value) {
	
		$parameters=explode('_',$value);
		
		$query1 = "SELECT structure_basic_textid FROM structure_basic_texts WHERE langid='".$parameters[1]."'
		AND table_name='".$_SESSION['table_name']."' AND table_col='".$parameters[0]."'
		AND tableid='".$_POST['element_id']."'";		
		$result1 = @mysql_query ($query1);	
		$count_res=mysql_num_rows($result1);
		
		if ($count_res == 0) {
		
			$query = "INSERT INTO structure_basic_texts (`structure_basic_textid`,`langid`,`table_name`,`table_key`,`table_col`,`tableid`,`value`) 
			VALUES 
			(NULL,'".$parameters[1]."','".$_SESSION['table_name']."','".$_SESSION['table_key']."','".$parameters[0]."','".$_POST['element_id']."',
			'".$_POST['save_parameters_val_tab'][$key]."')";
			$result = @mysql_query ($query);
			
		} else {
					 
			while ($row1 = mysql_fetch_array ($result1, MYSQL_ASSOC)) {			
				$query2 = "UPDATE structure_basic_texts SET value='".$_POST['save_parameters_val_tab'][$key]."' WHERE structure_basic_textid='".$row1['structure_basic_textid']."'";
				$result2 = @mysql_query ($query2);	
			}	
		}
	}
	
} elseif ($_POST['action'] == 'change_pagination') {
	
	$_SESSION[$_POST['attachetname']]['pagination']=($_POST['amount']-1);
	
} elseif ($_POST['action'] == 'show_entries') {
	
	$_SESSION[$_POST['attachetname']]['show_entries']=$_POST['amount'];
	
	//set to dafault setting when you hangin amount of entries
	$_SESSION[$_POST['attachetname']]['pagination']=$_SESSION['pagination_def'];	
	
} elseif ($_POST['action'] == 'filter1') {
	
	foreach ($_POST['save_parameters_id_tab'] as $key => $value) {		
		$value=str_replace('filter_','',$value);
		$_SESSION['filters'][$_POST['attachetname']][$value]=$_POST['save_parameters_val_tab'][$key];
	}
	
} elseif ($_POST['action'] == 'sort1') {
	
	if ($_POST['sort2'] == 1) $sort2='ASC';
	if ($_POST['sort2'] == 2) $sort2='DESC';
	
	$_SESSION[$_SESSION['table_name']][$_POST['attachetname']]['sort1']=$_POST['sort1'];
	$_SESSION[$_SESSION['table_name']][$_POST['attachetname']]['sort2']=$sort2;
	
} elseif ($_POST['action'] == 'delete_element') {
	
	$query = "DELETE FROM ".$_POST['attachetname']." WHERE ".$_SESSION['attachetid_tab'][$_POST['attachetname']]."='".$_POST['element_id1']."'";	
	$result = @mysql_query ($query);
	
} elseif ($_POST['action'] == 'add_element') {
	
	$query = "INSERT INTO ".$_POST['attachetname']." (";	
	$query1='';
	foreach ($_POST['save_parameters_id_tab'] as $key => $value) {
		if ($elements_details1_tab['type'][$value] != 'pass' OR $_POST['save_parameters_val_tab'][$key] != '') {
			$query1 .= ",".$value;		
		} 
	}		
	$query.=substr($query1,1);	
	$query .= ",createtime,".$_SESSION['table_key'].") VALUES (";
	$query1='';
	foreach ($_POST['save_parameters_id_tab'] as $key => $value) {
		if ($elements_details1_tab['type'][$value] != 'pass' OR $_POST['save_parameters_val_tab'][$key] != '') {
			if ($elements_details1_tab['type'][$value] == 'pass') {
				$query1 .= ",'".md5($_POST['save_parameters_val_tab'][$key])."'";		
			} else {
				$query1 .= ",'".$_POST['save_parameters_val_tab'][$key]."'";		
			}
		} 
	}
	$query.=substr($query1,1);		
	$query .= ",'".date("Y-m-d H:i:s")."','".$_POST['element_id']."')";					
	$result = @mysql_query ($query);
	
} elseif ($_POST['action'] == 'save_details') {
				
	$query = "UPDATE ".$_POST['attachetname']." SET ";
	$query1='';
	foreach ($_POST['save_parameters_id_tab'] as $key => $value) {
		if ($elements_details1_tab['type'][$value] != 'pass' OR $_POST['save_parameters_val_tab'][$key] != '') {
			if ($elements_details1_tab['type'][$value] == 'pass') {
				$query1 .= ",".$value."='".md5($_POST['save_parameters_val_tab'][$key])."'";		
			} else {
				$query1 .= ",".$value."='".$_POST['save_parameters_val_tab'][$key]."'";		
			}
		} 
	}
	$query1=substr($query1,1);
	$query1 .= ",lastactiontime='".date("Y-m-d H:i:s")."'";		
	$query .= $query1;
	$query .= " WHERE ".$_SESSION['attachetid_tab'][$_POST['attachetname']]."='".$_POST['element_id']."'";
	$result = @mysql_query ($query);
	
} elseif ($_POST['action'] == 'save_position') {
	
	$elemstr_pos=substr($_POST['elemstr_pos'],0,-1);
	$elemstr_pos_tab=explode(',',$elemstr_pos);
	
	$i=0;
	foreach ($elemstr_pos_tab as $key => $value) {
	
		$i++;		
		$value=str_replace('elemstr_','',$value);	
		$query = "UPDATE ".$_POST['attachetname']." SET position='".$i."' WHERE ".$_SESSION['attachetid_tab'][$_POST['attachetname']]."='".$value."'";
		$result = @mysql_query ($query);
	}
}


























mysql_close($dbc);

?>