<?php

include_once('php_save/newsletter_send.php');

$query="SELECT * FROM products ORDER BY name ASC";
$result=@mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

	$products_tab[$row['productid']]=$row['name'];
}
$tpl->assign("products_tab",$products_tab);

$query="SELECT * FROM tickets_states ORDER BY name ASC";
$result=@mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

	$tickets_states_tab[$row['tickets_stateid']]=$row['name'];
}
$tpl->assign("tickets_states_tab",$tickets_states_tab);




























$tpl->assign("send_to",$_POST['send_to']);
$tpl->assign("title",$_POST['title']);
$tpl->assign("content",$_POST['content']);

?>