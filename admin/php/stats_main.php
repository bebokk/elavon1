<?php

if ($_POST['date1'] == '') $_POST['date1']=date('Y-m-d', mktime(0, 0, 0, date("m"), date("d")-14, date("Y")));
if ($_POST['date2'] == '') $_POST['date2']=date("Y-m-d");

$query="SELECT * FROM stats_days WHERE date>='".$_POST['date1']."' AND date<='".$_POST['date2']."' ORDER BY date ASC LIMIT 0,14";
$result=@mysql_query ($query);
//entries 	unique
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	foreach ($row as $key => $value) {	
		$stats_days_tab[$row['date']][$key]=$value;
	}
}
$tpl->assign("date1",$_POST['date1']);
$tpl->assign("date2",$_POST['date2']);

/*
echo "stats_days_tab -- <pre>";
print_r($stats_days_tab);
echo "</pre>";
*/

$categories='';
$trafic='';
$unique='';
if ($stats_days_tab != '') foreach ($stats_days_tab as $key => $value) {
	$categories.="'".$key."',";
	$trafic.=$stats_days_tab[$key]['entries'].",";
	$unique.=$stats_days_tab[$key]['unique'].",";
}
$categories=substr($categories,0,-1);
$trafic=substr($trafic,0,-1);
$unique=substr($unique,0,-1);

/*
echo "categories -- $categories<br>";
echo "trafic -- $trafic<br>";
echo "unique -- $unique<br>";
*/

?>

<script language="javascript">
	$(function() {
		$( "#date1" ).datepicker({
		showWeek: true,
		firstDay: 1
		});
		$( "#date1" ).datepicker( "option", "dateFormat", "yy-mm-dd");
		$( "#date1" ).datepicker( "option", "defaultDate", "");
		$( "#date1" ).datepicker( "setDate", "<? echo $_POST['date1']; ?>" );
	});
	$(function() {
		$( "#date2" ).datepicker({
		showWeek: true,
		firstDay: 1
		});
		$( "#date2" ).datepicker( "option", "dateFormat", "yy-mm-dd");
		$( "#date2" ).datepicker( "option", "defaultDate", "");
		$( "#date2" ).datepicker( "setDate", "<? echo $_POST['date2']; ?>" );
	});
</script>

<script src="js/highcharts/highcharts.js"></script>

<script type="text/javascript">
$(function () {
	$('#container').highcharts({
		title: {
			text: 'Traffic on website',
			x: -20 //center
		},
		/*
		subtitle: {
			text: 'Source: WorldClimate.com',
			x: -20
		},
		*/
		xAxis: {
			/*
			categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun','Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
			*/
			type: 'datetime',
			categories: [<? echo $categories;?>]
		},
		yAxis: {
			title: {
				text: 'Trafic,Entries'
			},
			plotLines: [{
				value: 0,
				width: 1,
				color: '#808080'
			}]
		},
		tooltip: {
			valueSuffix: ' points'
		},
		legend: {
			layout: 'vertical',
			align: 'right',
			verticalAlign: 'middle',
			borderWidth: 0
		},
		series: [{
			name: 'Trafic',
			data: [<? echo $trafic;?>]
		}, {
			name: 'Entries',
			data: [<? echo $unique;?>]
		}]
	});
});
</script>

