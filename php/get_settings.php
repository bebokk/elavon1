<?php


include_once('../admin/config/mysql.php');
include_once('../admin/functions.php');

/*
echo "<pre>";
print_r($_SERVER);
echo "</pre>";
*/
//[HTTP_REFERER] => http://innovative.02.looknet.pl/_pebble/elavon/slt.html
$query = "SELECT * FROM pages WHERE pageid>0";
if (strstr($_SERVER['HTTP_REFERER'], 'slt')) {	
	$query .= " AND pageid=2";		
} elseif (strstr($_SERVER['HTTP_REFERER'], 'top100')) {
	$query .= " AND pageid=1";	
}
$query .= " ORDER BY position ASC";	
$result = @mysql_query ($query);

//$outp = "[";
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

	$row['description']=str_replace('<html>','',$row['description']);
	$row['description']=str_replace('<body>','',$row['description']);
	$row['description']=str_replace('</html>','',$row['description']);
	$row['description']=str_replace('</body>','',$row['description']);
	$row['description']=str_replace('<head>','',$row['description']);
	$row['description']=str_replace('</head>','',$row['description']);
	$row['description']=str_replace('<p>','',$row['description']);
	$row['description']=str_replace('</p>','',$row['description']);
	$row['description']=str_replace('<!DOCTYPE html>','',$row['description']);
	$row['description']=trim($row['description']);
    $outp = $row['description'];

}

//$outp .="]";

echo($outp);

?> 