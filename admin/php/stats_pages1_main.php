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

$query="SELECT * FROM cesh_pages ORDER BY name ASC";
$result=@mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$cesh_pages_tab[$row['cesh_pageid']]=$row['cesh_pageid'].' - '.$row['name'];
	$cesh_pages1_tab[$row['cesh_pageid']]=$row['name'];
}
ksort($cesh_pages_tab);
$tpl->assign("cesh_pages_tab",$cesh_pages_tab);

$tpl->assign("cesh_pages1_name",$cesh_pages1_tab[$_POST['pageid2']]);

$query="SELECT * FROM stats_page_days WHERE date>='".$_POST['date1']."' AND date<='".$_POST['date2']."'";
//echo "pageid1 -- ".$_POST['pageid2']."<br>";
if ($_POST['pageid2'] != '') {
	$query.=" AND cesh_pageid='".$_POST['pageid2']."'";
}
$query.=" ORDER BY date ASC,`unique` DESC,entries DESC"; 
$result=@mysql_query ($query);
//AND cesh_pageid IN (12,13,2,3)
//echo "query -- $query -- $result <br>";
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

	$stats_page_days0_tab[$row['date']]=$row['name'];
	$stats_page_days_tab[$row['cesh_pageid']][$row['date']]+=$row['name'];
	$stats_page_days1_tab[$row['cesh_pageid']][$row['date']]+=$row['unique'];
	$stats_page_days2_tab[$row['cesh_pageid']][$row['date']]=$row['entries'];
}
$tpl->assign("stats_page_days0_tab",$stats_page_days0_tab);
$tpl->assign("stats_page_days_tab",$stats_page_days_tab);
$tpl->assign("stats_page_days1_tab",$stats_page_days1_tab);
$tpl->assign("stats_page_days2_tab",$stats_page_days2_tab);
$tpl->assign("pageid2",$_POST['pageid2']);

/*
echo "stats_page_days1_tab -- <pre>";
print_r($stats_page_days1_tab);
echo "</pre>";
*/

$categories='';
if ($stats_page_days0_tab != '') foreach ($stats_page_days0_tab as $key => $value) {
	$categories.="'".$key."',";	
}
$categories=substr($categories,0,-1);
//echo "categories -- $categories";
/*
$categories='';
if ($stats_days_tab != '') foreach ($stats_page_days1_tab as $key => $value) {
	$categories.="'".$key."',";	
	foreach ($stats_page_days1_tab[$key] as $key1 => $value1) {
		$trafic_tab[$key1].=$stats_page_days1_tab[$key][$key1].",";
		$unique_tab[$key1].=$stats_page_days1_tab[$key][$key1].",";
	}
}
*/

/*
echo "stats_page_days1_tab -- <pre>";
print_r($stats_page_days1_tab);
echo "</pre>";
*/

/*
foreach ($trafic_tab as $key => $value) {
	$trafic1_tab[$key]=substr($value,0,-1);
	$unique1_tab[$key]=substr($value,0,-1);
}
*/

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
		series: [
			<?
				$i=0;
				foreach ($stats_page_days_tab as $key => $value) {
					$i++;				
					
					if ($i > 1) {
						echo ",";
					}
					echo "
						{
							name: '".$key."',
							data: [";
							$j=0;
							foreach ($stats_page_days_tab[$key] as $key1 => $value1) {
								$j++;													
								if ($j > 1) {
									echo ",";
								}
								echo $stats_page_days1_tab[$key][$key1];
							}
							echo "]
						}
					";		
				}			
				/*
				$i=0;
				foreach ($trafic1_tab as $key => $value) {
					$i++;
					if ($i > 0) {
						echo ",";
					}
					echo "
						{
							name: '".$key."',
							data: [".$value."]
						}
					";		
				}
				*/
			?>
		]
	});
});
</script>

