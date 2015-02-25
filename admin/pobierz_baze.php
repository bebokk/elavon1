<?

require_once('config/mysql.php');

$dbname = DB_NAME;

$query = "SHOW TABLES FROM $dbname";
$result = mysql_query($query);

$i=0;

$gotowe_all="
<html>
<head>


<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>

</head>

<body>

<?

require_once('config/mysql.php');

";


$gotowe_all1='

';

while ($row = mysql_fetch_row($result)) {

	$i++;
	
	$gotowe='';
	$primary_key='';
	
	/*$gotowe.='$query = "DROP TABLE `'.$row[0].'`";
$result = @mysql_query ($query);

';*/

	
	$gotowe.='$query = "CREATE TABLE `';

	

	$gotowe.=$row[0];
	$gotowe.='` (
';

	
	$query1 = "SHOW COLUMNS FROM $row[0]";
	$result1 = mysql_query($query1);
	
	while ($row1 = mysql_fetch_row($result1)) {
		
		$gotowe.=' `';
		$gotowe.="$row1[0]";
		$gotowe.="` $row1[1] NOT NULL ";
		
		$row1[1]=trim($row1[1]);
		
		//echo "$row1[4] -- $row1[5] -- $row1[6]<br>";

		
		if ($row1[5] != 'auto_increment') {
			//$gotowe.="default '',";
			$gotowe.=",";
		} else {
			$gotowe.='auto_increment,';		
		}
		
		$gotowe.='
';

		if ($row1[3]) $primary_key=$row1[0];
		
	}
	
	
	if ($primary_key != '') {
		$gotowe.="PRIMARY KEY (`$primary_key`)
)";
	}

$gotowe.='";
$result = @mysql_query ($query);

';

	$gotowe_all.=$gotowe;
	
	
	
	$gotowe1='';

	$query1 = "SELECT * FROM $row[0]";
	$result1 = mysql_query($query1);
	while ($row1 = mysql_fetch_row($result1)) {


		$gotowe1='$query = "INSERT INTO `';	
		$gotowe1.=$row[0];	
		$gotowe1.="` VALUES ($row1[0]";	

		foreach ($row1 as $key => $value){
		
			if ($key >0) {
				
				$row1[$key]=str_replace("'", '\\"', $row1[$key]);
				$row1[$key]=str_replace('"', '\"', $row1[$key]);
				$row1[$key]=str_replace('\\\\"', '\\"', $row1[$key]);
				/*$row1[$key]=str_replace('  ', " ", $row1[$key]);*/
			
				$gotowe1.=",'$row1[$key]'";
			}
		}
		$gotowe1.=');";
$result = @mysql_query ($query);

';		
		$gotowe_all1.=$gotowe1;
	}


}


$gotowe_all.=$gotowe_all1;

$gotowe_all.='


?>

</body>
</html>

';



$filename = 'instal_nowy.php';

$handle = fopen($filename, 'w');
fwrite($handle, $gotowe_all);
fclose($handle);

echo "Wygenerowano tabele!<br>";


?>