<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once('../admin/config/mysql.php');
include_once('../admin/functions.php');

/*
echo "<pre>";
print_r($_SERVER);
echo "</pre>";
*/
//[HTTP_REFERER] => http://innovative.02.looknet.pl/_pebble/elavon/slt.html
$query = "SELECT * FROM questions_groups WHERE questions_groupid>0";
if (strstr($_SERVER['HTTP_REFERER'], 'slt')) {	
	$query .= " AND usersgroupid=10";		
	$ref='slt';
} elseif (strstr($_SERVER['HTTP_REFERER'], 'top100')) {
	$query .= " AND usersgroupid=9";	
	$ref='top100';	
}
$query .= " ORDER BY position ASC";	
$result = @mysql_query ($query);
$questions_groups_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

	foreach ($row as $key => $value) {
		$questions_groups_tab[$row['questions_groupid']][$key]=$value;
	}
}

$query = "SELECT * FROM users WHERE usersgroupid=11 ORDER BY name ASC";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$managers_tab[$row['userid']]=$row['name'];
}


$query = "SELECT 
questionid,
name,
charter,
extent_header,
usersgroupid,
questions_groupid,
pre_page,
answers_groupid
FROM 
questions WHERE questionid>0";
if (strstr($_SERVER['HTTP_REFERER'], 'slt')) {	
	$query .= " AND usersgroupid=10";		
} elseif (strstr($_SERVER['HTTP_REFERER'], 'top100')) {
	$query .= " AND usersgroupid=9";		
}
$query .= " ORDER BY position ASC";		
$query1 = $query;
$result1 = @mysql_query ($query1);
$test_tab1='';
while ($row1 = mysql_fetch_array ($result1, MYSQL_ASSOC)) {
	$test_tab1[$questionid1]=$row1["questions_groupid"];
	$questionid1=$row1["questionid"];
}
$result = @mysql_query ($query);
$num_rows = mysql_num_rows($result);

$i=0;
$i2=0;
$i3=0;
$outp = "[";
$usersgroupid=0;
if (strstr($_SERVER['HTTP_REFERER'], 'slt') OR strstr($_SERVER['HTTP_REFERER'], 'top100')) {

	while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

		$progress=(($i+1)*100)/$num_rows;		

		if ($questions_groupid != $row['questions_groupid']) {

			if ($i2 > 0) {

				/*
				if ($outp != "[") {$outp .= ",";}
			    $outp .= '{"name":"'  . $questions_groups_tab[$row["questions_groupid"]]['name'] . '",';
			    $outp .= '"color1":"'  . $questions_groups_tab[$row["questions_groupid"]]['color1'] . '",';
			    $outp .= '"color2":"'  . $questions_groups_tab[$row["questions_groupid"]]['color2'] . '",';
			    $outp .= '"color3":"'  . $questions_groups_tab[$row["questions_groupid"]]['color3'] . '",';
			    $outp .= '"i":"'  . $row["questionid"] . '",';
			    $outp .= '"i1":"'  . $i . '",';
			    $outp .= '"i2":"'  . $i2 . '",';
			    $outp .= '"ref":"'  . $ref . '",';
			    $outp .= '"num_rows":"'  . $num_rows . '",';
			    $outp .= '"progress":"'  . $progress . '%",';
			    $outp .= '"charter":"'  . $row["charter"] . '",';
			    $outp .= '"answers_groupid":"separetor"}';
			    */
			}

			$i2++;
			if ($outp != "[") {$outp .= ",";}
		    $outp .= '{"name":"'  . $questions_groups_tab[$row["questions_groupid"]]['name'] . '",';
		    $outp .= '"color1":"'  . $questions_groups_tab[$row["questions_groupid"]]['color1'] . '",';
		    $outp .= '"color2":"'  . $questions_groups_tab[$row["questions_groupid"]]['color2'] . '",';
		    $outp .= '"color3":"'  . $questions_groups_tab[$row["questions_groupid"]]['color3'] . '",';
		    $outp .= '"i":"'  . $row["questionid"] . '",';
		    $outp .= '"i1":"'  . $i . '",';
		    $outp .= '"i2":"'  . $i2 . '",';
			$outp .= '"ref":"'  . $ref . '",';
		    $outp .= '"num_rows":"'  . $num_rows . '",';
			$outp .= '"progress":"'  . $progress . '%",';
			$outp .= '"charter":"'  . $row["charter"] . '",';
		    $outp .= '"answers_groupid":"title_page"}';
			$i3=0;
		}

		$i++;
		$i3++;
	    $i_test=(round($i3/2))*2;

		if ($row['pre_page'] != '') {

			if ($outp != "[") {$outp .= ",";}
		    $outp .= '{"name":"'  . $row['pre_page'] . '",';

		    if ($i_test == $i3) {
			    $outp .= '"color1":"rgb(208,238,252)",';
			    $outp .= '"color2":"'  . $questions_groups_tab[$row["questions_groupid"]]['color2'] . '",';
			} else {
		 	    $outp .= '"color1":"'  . $questions_groups_tab[$row["questions_groupid"]]['color2'] . '",';
			    $outp .= '"color2":"'  . $questions_groups_tab[$row["questions_groupid"]]['color1'] . '",';		
			}
		    $outp .= '"color3":"'  . $questions_groups_tab[$row["questions_groupid"]]['color3'] . '",';
		    $outp .= '"i":"'  . $row["questionid"] . '",';
		    $outp .= '"i1":"'  . $i . '",';
		    $outp .= '"i2":"'  . $i2 . '",';
			$outp .= '"ref":"'  . $ref . '",';
		    $outp .= '"num_rows":"'  . $num_rows . '",';
			$outp .= '"progress":"'  . $progress . '%",';
			$outp .= '"charter":"'  . $row["charter"] . '",';
		    $outp .= '"answers_groupid":"charter"}';
		}



	    if ($row["answers_groupid"] == 4) {

		    if ($outp != "[") {$outp .= ",";}
		    $outp .= '{"name":"'  . $row["name"] . '",';

		    if ($i_test == $i3) {
			    $outp .= '"color1":"'  . $questions_groups_tab[$row["questions_groupid"]]['color1'] . '",';
			    $outp .= '"color2":"'  . $questions_groups_tab[$row["questions_groupid"]]['color2'] . '",';
			} else {
		 	    $outp .= '"color1":"'  . $questions_groups_tab[$row["questions_groupid"]]['color2'] . '",';
			    $outp .= '"color2":"'  . $questions_groups_tab[$row["questions_groupid"]]['color1'] . '",';		
			}
			$outp .= '"color3":"'  . $questions_groups_tab[$row["questions_groupid"]]['color3'] . '",';
		    $outp .= '"i":"'  . $row["questionid"] . '",';
		    $outp .= '"extent_header":"'  . $row["extent_header"] . '",';
		    $outp .= '"i1":"'  . $i . '",';
			$outp .= '"i2":"'  . $i2 . '",';
			$outp .= '"ref":"'  . $ref . '",';

			if ($test_tab1[$row["questionid"]] != $row["questions_groupid"]) {
				$outp .= '"slide":"gbl-arrow-nav-right",';			
			} else {
				$outp .= '"slide":"gbl-arrow-nav-right",';			
			}

		    $outp .= '"num_rows":"'  . $num_rows . '",';
			$outp .= '"progress":"'  . $progress . '%",';
			$outp .= '"charter":"'  . $row["charter"] . '",';

		    $outp .= '"answers": [ ';	 
		    //get all of the maching answers 
			$query1 = "SELECT * FROM answers WHERE answers_groupid='3' ORDER BY position ASC";		
			$result1 = @mysql_query ($query1);
			while ($row1 = mysql_fetch_array ($result1, MYSQL_ASSOC)) {

				//get picture
				$query2 = "SELECT * FROM structure_basic_pictures WHERE tableid='".$row1['answerid']."' AND table_name='answers'
				ORDER BY position ASC, createtime DESC LIMIT 0,1";
				$result2 = @mysql_query ($query2);
				$pic1='';
				while ($row2 = mysql_fetch_array ($result2, MYSQL_ASSOC)) {	

					$pic1=adres_miniatury('../admin/images/basic/',$row2['structure_basic_pictureid'].'.'.$row2['extension'],85,85);
					$pic1=str_replace('../','',$pic1);
					$pic2=adres_miniatury('../admin/images/basic/',$row2['structure_basic_pictureid'].'.'.$row2['extension'],40,45);
					$pic2=str_replace('../','',$pic2);
				}
				$outp .= '{ 
					"picture": "'.$pic1.'",
					"picture2": "'.$pic2.'",
					"id": "'.$row1['answerid'].'",
					"name": "'.$row1['name'].'"
				},';
			}
			$outp=substr($outp,0,-1);

		    $outp .= ' ],';
		    $outp .= '"answers_groupid":"faces"}';
	    }



	    if ($row["answers_groupid"] == 10) {


		    if ($outp != "[") {$outp .= ",";}
		    $outp .= '{"name":"'  . $row["name"] . '",';

		    if ($i_test == $i3) {
			    $outp .= '"color1":"'  . $questions_groups_tab[$row["questions_groupid"]]['color1'] . '",';
			    $outp .= '"color2":"'  . $questions_groups_tab[$row["questions_groupid"]]['color2'] . '",';
			} else {
		 	    $outp .= '"color1":"'  . $questions_groups_tab[$row["questions_groupid"]]['color2'] . '",';
			    $outp .= '"color2":"'  . $questions_groups_tab[$row["questions_groupid"]]['color1'] . '",';		
			}
			$outp .= '"color3":"'  . $questions_groups_tab[$row["questions_groupid"]]['color3'] . '",';
		    $outp .= '"i":"'  . $row["questionid"] . '",';
		    $outp .= '"extent_header":"'  . $row["extent_header"] . '",';
		    $outp .= '"i1":"'  . $i . '",';
			$outp .= '"i2":"'  . $i2 . '",';
			$outp .= '"ref":"'  . $ref . '",';

			if ($test_tab1[$row["questionid"]] != $row["questions_groupid"]) {
				$outp .= '"slide":"gbl-arrow-nav-right",';			
			} else {
				$outp .= '"slide":"gbl-arrow-nav-right",';			
			}

		    $outp .= '"num_rows":"'  . $num_rows . '",';
			$outp .= '"progress":"'  . $progress . '%",';
			$outp .= '"charter":"'  . $row["charter"] . '",';

		    $outp .= '"answers": [ ';	 
		    //get all of the maching answers 
			$query1 = "SELECT * FROM answers WHERE answers_groupid='".$row["answers_groupid"]."' ORDER BY position ASC";		
			$result1 = @mysql_query ($query1);
			while ($row1 = mysql_fetch_array ($result1, MYSQL_ASSOC)) {

				//get picture
				$query2 = "SELECT * FROM structure_basic_pictures WHERE tableid='".$row1['answerid']."' AND table_name='answers'
				ORDER BY position ASC, createtime DESC LIMIT 0,1";
				$result2 = @mysql_query ($query2);
				$pic1='';
				while ($row2 = mysql_fetch_array ($result2, MYSQL_ASSOC)) {	

					$pic1=adres_miniatury('../admin/images/basic/',$row2['structure_basic_pictureid'].'.'.$row2['extension'],85,85);
					$pic1=str_replace('../','',$pic1);
					$pic2=adres_miniatury('../admin/images/basic/',$row2['structure_basic_pictureid'].'.'.$row2['extension'],40,45);
					$pic2=str_replace('../','',$pic2);
				}
				$outp .= '{ 
					"picture": "'.$pic1.'",
					"picture2": "'.$pic2.'",
					"id": "'.$row1['answerid'].'",
					"name": "'.$row1['name'].'"
				},';
			}
			$outp=substr($outp,0,-1);
		    $outp .= ' ],';

		    $outp .= '"people": [ ';	
		    //get all of the maching answers 
		    $query1 = "SELECT * FROM users WHERE usersgroupid=11 ORDER BY name ASC";
			$result1 = @mysql_query ($query1);
			while ($row1 = mysql_fetch_array ($result1, MYSQL_ASSOC)) {

				//get picture
				$query2 = "SELECT * FROM structure_basic_pictures WHERE tableid='".$row1['userid']."' AND table_name='users'
				ORDER BY position ASC, createtime DESC LIMIT 0,1";
				$result2 = @mysql_query ($query2);
				$pic1='';
				while ($row2 = mysql_fetch_array ($result2, MYSQL_ASSOC)) {	

					$pic1=adres_miniatury('../admin/images/basic/',$row2['structure_basic_pictureid'].'.'.$row2['extension'],85,85);
					$pic1=str_replace('../','',$pic1);
					$pic2=adres_miniatury('../admin/images/basic/',$row2['structure_basic_pictureid'].'.'.$row2['extension'],40,45);
					$pic2=str_replace('../','',$pic2);
				}
				$outp .= '{ 
					"picture": "'.$pic1.'",
					"picture2": "'.$pic2.'",
					"id": "'.$row1['userid'].'",
					"name": "'.$row1['name'].'"
				},';
			}
			$outp=substr($outp,0,-1);
		    $outp .= ' ],';

		    $outp .= '"answers_groupid":"11",';
		    $outp .= '"extra_class":"hidden_for_big"}';
	    }  


	    if ($outp != "[") {$outp .= ",";}
	    $outp .= '{"name":"'  . $row["name"] . '",';

	    if ($i_test == $i3) {
		    $outp .= '"color1":"'  . $questions_groups_tab[$row["questions_groupid"]]['color1'] . '",';
		    $outp .= '"color2":"'  . $questions_groups_tab[$row["questions_groupid"]]['color2'] . '",';
		} else {
	 	    $outp .= '"color1":"'  . $questions_groups_tab[$row["questions_groupid"]]['color2'] . '",';
		    $outp .= '"color2":"'  . $questions_groups_tab[$row["questions_groupid"]]['color1'] . '",';		
		}
		$outp .= '"color3":"'  . $questions_groups_tab[$row["questions_groupid"]]['color3'] . '",';
	    $outp .= '"i":"'  . $row["questionid"] . '",';
	    $outp .= '"extent_header":"'  . $row["extent_header"] . '",';
	    $outp .= '"i1":"'  . $i . '",';
		$outp .= '"i2":"'  . $i2 . '",';
		$outp .= '"ref":"'  . $ref . '",';

		if ($test_tab1[$row["questionid"]] != $row["questions_groupid"]) {
			$outp .= '"slide":"gbl-arrow-nav-right",';			
		} else {
			$outp .= '"slide":"gbl-arrow-nav-right",';			
		}

	    $outp .= '"num_rows":"'  . $num_rows . '",';
		$outp .= '"progress":"'  . $progress . '%",';
		$outp .= '"charter":"'  . $row["charter"] . '",';

	    $outp .= '"answers": [ ';	 

	    if ($row["answers_groupid"] == 3 OR $row["answers_groupid"] == 7 OR $row["answers_groupid"] == 8 OR $row["answers_groupid"] == 9 OR $row["answers_groupid"] == 10 OR $row["answers_groupid"] == 11) {

		    //get all of the maching answers 
		    $query1 = "SELECT * FROM users WHERE usersgroupid=11 ORDER BY name ASC";
			$result1 = @mysql_query ($query1);
			while ($row1 = mysql_fetch_array ($result1, MYSQL_ASSOC)) {

				//get picture
				$query2 = "SELECT * FROM structure_basic_pictures WHERE tableid='".$row1['userid']."' AND table_name='users'
				ORDER BY position ASC, createtime DESC LIMIT 0,1";
				$result2 = @mysql_query ($query2);
				$pic1='';
				while ($row2 = mysql_fetch_array ($result2, MYSQL_ASSOC)) {	

					$pic1=adres_miniatury('../admin/images/basic/',$row2['structure_basic_pictureid'].'.'.$row2['extension'],85,85);
					$pic1=str_replace('../','',$pic1);
					$pic2=adres_miniatury('../admin/images/basic/',$row2['structure_basic_pictureid'].'.'.$row2['extension'],40,45);
					$pic2=str_replace('../','',$pic2);
				}
				$outp .= '{ 
					"picture": "'.$pic1.'",
					"picture2": "'.$pic2.'",
					"id": "'.$row1['userid'].'",
					"name": "'.$row1['name'].'"
				},';
			}
			
		} else {
			
			//get all of the maching answers 
			$query1 = "SELECT * FROM answers WHERE answers_groupid='".$row["answers_groupid"]."' ORDER BY position ASC";		
			$result1 = @mysql_query ($query1);
			while ($row1 = mysql_fetch_array ($result1, MYSQL_ASSOC)) {

				//get picture
				$query2 = "SELECT * FROM structure_basic_pictures WHERE tableid='".$row1['answerid']."' AND table_name='answers'
				ORDER BY position ASC, createtime DESC LIMIT 0,1";
				$result2 = @mysql_query ($query2);
				$pic1='';
				while ($row2 = mysql_fetch_array ($result2, MYSQL_ASSOC)) {	

					$pic1=adres_miniatury('../admin/images/basic/',$row2['structure_basic_pictureid'].'.'.$row2['extension'],85,85);
					$pic1=str_replace('../','',$pic1);
					$pic2=adres_miniatury('../admin/images/basic/',$row2['structure_basic_pictureid'].'.'.$row2['extension'],40,45);
					$pic2=str_replace('../','',$pic2);
				}
				$outp .= '{ 
					"picture": "'.$pic1.'",
					"picture2": "'.$pic2.'",
					"id": "'.$row1['answerid'].'",
					"name": "'.$row1['name'].'"
				},';
			}
			
		}

		$outp=substr($outp,0,-1);
	    $outp .= ' ],';

	    $outp .= '"people": [ ';	 
		//get all of the maching answers 
		$query1 = "SELECT * FROM users WHERE usersgroupid=11 ORDER BY name ASC";
		$result1 = @mysql_query ($query1);
		while ($row1 = mysql_fetch_array ($result1, MYSQL_ASSOC)) {

			//get picture
			$query2 = "SELECT * FROM structure_basic_pictures WHERE tableid='".$row1['userid']."' AND table_name='users'
			ORDER BY position ASC, createtime DESC LIMIT 0,1";
			$result2 = @mysql_query ($query2);
			$pic1='';
			while ($row2 = mysql_fetch_array ($result2, MYSQL_ASSOC)) {	

				$pic1=adres_miniatury('../admin/images/basic/',$row2['structure_basic_pictureid'].'.'.$row2['extension'],85,85);
				$pic1=str_replace('../','',$pic1);
				$pic2=adres_miniatury('../admin/images/basic/',$row2['structure_basic_pictureid'].'.'.$row2['extension'],40,45);
				$pic2=str_replace('../','',$pic2);
			}
			$outp .= '{ 
				"picture": "'.$pic1.'",
				"picture2": "'.$pic2.'",
				"id": "'.$row1['userid'].'",
				"name": "'.$row1['name'].'"
			},';
		}
		$outp=substr($outp,0,-1);
	    $outp .= ' ],';


	    if ($row["answers_groupid"] == 10) {

		    $outp .= '"answers_groupid":"10",';
		    $outp .= '"extra_class":"hidden_for_small"}';

	    } else {
	    	$outp .= '"answers_groupid":"'   . $row["answers_groupid"] . '"}';
	    }







	    $questions_groupid=$row['questions_groupid'];

	    /* load extra page for text after pictures type */
	    if ($row["answers_groupid"] == 3) {

			//$i++;
			$i3++;
		    if ($outp != "[") {$outp .= ",";}
		    $outp .= '{"name":"'  . $row["name"] . '",';

		    $i_test=(round($i3/2))*2;
		    if ($i_test == $i3) {
			    $outp .= '"color1":"'  . $questions_groups_tab[$row["questions_groupid"]]['color1'] . '",';
			    $outp .= '"color2":"'  . $questions_groups_tab[$row["questions_groupid"]]['color2'] . '",';
			} else {
		 	    $outp .= '"color1":"'  . $questions_groups_tab[$row["questions_groupid"]]['color2'] . '",';
			    $outp .= '"color2":"'  . $questions_groups_tab[$row["questions_groupid"]]['color1'] . '",';		
			}
			$outp .= '"color3":"'  . $questions_groups_tab[$row["questions_groupid"]]['color3'] . '",';
		    $outp .= '"i":"'  . $row["questionid"] . '",';
		    $outp .= '"i1":"'  . $i . '",';
			$outp .= '"i2":"'  . $i2 . '",';
			$outp .= '"ref":"'  . $ref . '",';

			if ($test_tab1[$row["questionid"]] != $row["questions_groupid"]) {
				$outp .= '"slide":"gbl-arrow-nav-right",';			
			} else {
				$outp .= '"slide":"gbl-arrow-nav-right",';			
			}
		
		    $outp .= '"num_rows":"'  . $num_rows . '",';
			$outp .= '"progress":"'  . $progress . '",';
			$outp .= '"charter":"'  . $row["charter"] . '",';
		    $outp .= '"answers_groupid":"text_page"}';   	
	    }
	}
}
$outp .="]";

echo($outp);

?> 