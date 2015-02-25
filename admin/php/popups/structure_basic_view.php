<?php

header('Content-Type: text/html; charset=utf-8');

session_start();

include_once('../../config/mysql.php');

//get picture details
$query = "SELECT * FROM ".$_SESSION['table_name']." WHERE ".$_SESSION['table_key']."='".$_POST['element_id']."'";
$result = @mysql_query ($query);	
$data1_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	foreach ($row as $key => $value) {		
		$data1_tab[$key]=$value;
	}
}

$elements_details1_tab=$_SESSION['elements_details1_tab'];

//check if there is any pass element 
$pass1='';
foreach ($elements_details1_tab['name'] as $key => $value)	{	
	if ($elements_details1_tab['type'][$key] == 'pass') {
		$pass1=1;
	}
}

///update message to opened
$query = "UPDATE communication SET opened='1',openedtime='".date("Y-m-d h:i:s")."' WHERE
 communicationid='".$_POST['element_id']."' AND touserid='".$_SESSION['user']['userid']."'";
$result = @mysql_query ($query);	
//echo "query -- $query -- $result <br>";

?>
<div class="popup01"></div>
<form id="structure_basic_form" method="POST">
	<input type="hidden" id="geolocation" name="geolocation" value="<? echo $_SESSION['page_settings_tab']['geolocation']; ?>" />
	<div class="popup">
		<div class="popup1">
			<div class="popup2_right_top_att">
				<div class="popup1_close"><a onclick="$('.popup').css('display','none');$('.popup01').css('display','none');">close</a></div>
			</div>
			<div class="popup1_content">
				<div class="popup1_content1">
					<div class="popup1_content1_1">
						<div class="popup1_content1_1_1"><span>Message</span></div>
						<div class="popup1_s1">
							<table>
								<? $i=0; ?>
								<? foreach ($elements_details1_tab['name'] as $key => $value) { ?>
									<? $i++; if ($i == 1) $class1='focus_here'; else $class1=''; ?>
									<? if ($elements_details1_tab['type'][$key] == 'text') { ?>
										<tr>
											<td style="width:25%;"><? echo $value; ?></td>
											<td style="width:75%;" class="tleft"><? echo $data1_tab[$key]; ?></td>
										</tr>
									<? } elseif ($elements_details1_tab['type'][$key] == 'time') { ?>
										<tr>
											<td style="width:15%;"><? echo $value; ?></td>
											<td style="width:85%;" class="tleft">
												<? echo $data1_tab[$key]; ?>
											</td>
										</tr>
									<? } elseif ($elements_details1_tab['type'][$key] == 'date') { ?>
										<tr>
											<td style="width:15%;"><? echo $value; ?></td>
											<td style="width:85%;" class="tleft">
												<? echo $data1_tab[$key]; ?>
											</td>
										</tr>
									<? } elseif ($elements_details1_tab['type'][$key] == 'multiselect') { ?>
										<tr>
											<td style="width:25%;"><? echo $value; ?></td>
											<td style="width:75%;" class="tleft">
												<? foreach ($elements_details1_tab['select'][$key] as $key1 => $value1) { ?>
													<? if (strstr($data1_tab[$key], ','.$key1.',')) { ?>
														<? echo $value1; ?>
													<? } ?>
												<? } ?>				
											</td>
										</tr>
									<? } elseif ($elements_details1_tab['type'][$key] == 'select') { ?>
										<tr>
											<td style="width:25%;"><? echo $value; ?></td>
											<td style="width:75%;" class="tleft">
												<? foreach ($elements_details1_tab['select'][$key] as $key1 => $value1) { ?>
													<? if ($key1 == $data1_tab[$key]) { ?>
														<? echo $value1; ?>
													<? } ?>
												<? } ?>					
											</td>
										</tr>
									<? } elseif ($elements_details1_tab['type'][$key] == 'bigselect') { ?>
										<tr>
											<td style="width:25%;"><? echo $value; ?></td>
											<td style="width:75%;" class="tleft">								
												<?
												$query = "SELECT ".$_SESSION['elements_list1_tab']['bigselect'][$key]['disname']." FROM ".$_SESSION['elements_list1_tab']['bigselect'][$key]['tabname']." WHERE ".$key."='".$data1_tab[$key]."'";
												$result = @mysql_query ($query);		
												while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
													$name=$row[$_SESSION['elements_list1_tab']['bigselect'][$key]['disname']];
												}		
												?>							
												<div class="search_for_bigselect_element1">
													<? echo $name; ?>
												</div>			
											</td>
										</tr>
									<? } elseif ($elements_details1_tab['type'][$key] == 'wysywig') { ?>
										<tr>
											<td colspan="2" class="tleft">
												<? echo $value; ?> <br />
												<? echo $data1_tab[$key]; ?>
											</td>
										</tr>
									<? } ?>
								<? } ?>
							</table>
						</div>	
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>
<?











































?>