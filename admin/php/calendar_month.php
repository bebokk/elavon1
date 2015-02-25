<?php

if ($_GET['filetr_date'] == '') $_GET['filetr_date']=date("Y-m-d");

/*
echo "months_tab -- <pre>";
print_r($months_tab);
echo "</pre>";
*/




































$tpl->assign("page",$_GET['page']);
$tpl->assign("subpage",$_GET['subpage']);
$tpl->assign("filetr_date",$_GET['filetr_date']);

?>