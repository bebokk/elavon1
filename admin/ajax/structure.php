<?php

session_start();

include_once('../config/mysql.php');

if ($_POST['action'] == 'save_position') {
	
	$elemstr_pos=substr($_POST['elemstr_pos'],0,-1);
	$elemstr_pos_tab=explode(',',$elemstr_pos);
	
	$i=0;
	foreach ($elemstr_pos_tab as $key => $value) {
	
		$i++;		
		$value=str_replace('elemstr_','',$value);	
		$query = "UPDATE pages SET position='".$i."' WHERE pageid='".$value."'";
		$result = @mysql_query ($query);
	}
}
























mysql_close($dbc);

?>