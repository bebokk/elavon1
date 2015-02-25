<?php

//get SMTP settings from database
$query = "SELECT * FROM settings";
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$settings_tab[$row['settingid']]=$row['value'];
}
$tpl->assign("settings_tab",$settings_tab);









































?>