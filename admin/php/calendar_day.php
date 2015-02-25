<?php

include('php/contact_logs.php');

//basic list of elements based on one standard table
$table_name='contact_logs';
$table_key='contact_logid';
$view_name1='Contact logs';

if ($_GET['filetr_date'] == '') $_GET['filetr_date']=date("Y-m-d");






































$tpl->assign("page",$_GET['page']);
$tpl->assign("subpage",$_GET['subpage']);
$tpl->assign("filetr_date",$_GET['filetr_date']);

?>