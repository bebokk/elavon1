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
						<div class="popup1_content1_1_1"><span>Edit element</span></div>
						<div class="popup1_s1">
							<table>
								<? $i=0; ?>
								<? foreach ($elements_details1_tab['name'] as $key => $value) { ?>
									<? $i++; if ($i == 1) $class1='focus_here'; else $class1=''; ?>
									<? if ($elements_details1_tab['type'][$key] == 'text') { ?>
										<tr>
											<td style="width:25%;"><? echo $value; ?></td>
											<td style="width:75%;"><input id="<? echo $key; ?>" class="popup1_content_input1 save_par <? echo $class1; ?>" type="text" name="<? echo $key; ?>" value="<? echo $data1_tab[$key]; ?>" /></td>
										</tr>
									<? } elseif ($elements_details1_tab['type'][$key] == 'time') { ?>
										<tr>
											<td style="width:15%;"><? echo $value; ?></td>
											<td style="width:85%;">
												<input id="<? echo $key; ?>" class="timepicker popup1_content_input1_date popup1_content_input1 save_par <? echo $class1; ?>" type="text" name="<? echo $key; ?>" value="<? echo $data1_tab[$key]; ?>" />
											</td>
										</tr>
									<? } elseif ($elements_details1_tab['type'][$key] == 'date') { ?>
										<tr>
											<td style="width:15%;"><? echo $value; ?></td>
											<td style="width:85%;">
												<input id="<? echo $key; ?>" class="datepicker popup1_content_input1_date popup1_content_input1 save_par <? echo $class1; ?>" type="text" name="<? echo $key; ?>" value="<? echo $data1_tab[$key]; ?>" />
											</td>
										</tr>
									<? } elseif ($elements_details1_tab['type'][$key] == 'multiselect') { ?>
										<tr>
											<td style="width:25%;"><? echo $value; ?></td>
											<td style="width:75%;" class="tleft">
												<select id="<? echo $key; ?>" multiple="multiple" class="popup1_content_input1 multiselect save_par <? echo $class1; ?> multiselect_value" name="<? echo $key; ?>">
													<option value=""></option>
													<? foreach ($elements_details1_tab['select'][$key] as $key1 => $value1) { ?>
														<? if (strstr($data1_tab[$key], ','.$key1.',')) { ?>
															<option selected value="<? echo $key1; ?>"><? echo $value1; ?></option>
														<? } else { ?>
															<option value="<? echo $key1; ?>"><? echo $value1; ?></option>
														<? } ?>
													<? } ?>	
												</select>						
											</td>
										</tr>
									<? } elseif ($elements_details1_tab['type'][$key] == 'select') { ?>
										<tr>
											<td style="width:25%;"><? echo $value; ?></td>
											<td style="width:75%;" class="tleft">
												<select id="<? echo $key; ?>" class="popup1_content_input1 save_par <? echo $class1; ?> select_value" name="<? echo $key; ?>">
													<option value=""></option>
													<? foreach ($elements_details1_tab['select'][$key] as $key1 => $value1) { ?>
														<? if ($key1 == $data1_tab[$key]) { ?>
															<option selected value="<? echo $key1; ?>"><? echo $value1; ?></option>
														<? } else { ?>
															<option value="<? echo $key1; ?>"><? echo $value1; ?></option>
														<? } ?>
													<? } ?>	
												</select>						
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
													<select onclick="search_for_bigselect_element('<? echo $key ?>','addedit')" class="popup1_content_input1 save_par <? echo $class1; ?> select_value" name="<? echo $key; ?>" id="<? echo $key; ?>">
														<? if ($data1_tab[$key] != '') { ?>
															<option value="<? echo $data1_tab[$key]; ?>"><? echo $name; ?></option>
														<? } ?>
													</select>	
													&nbsp;&nbsp;&nbsp;&nbsp;
													<a class="search_for_bigselect_element_a" onclick="search_for_bigselect_element('<? echo $key ?>')"></a>
												</div>			
											</td>
										</tr>
									<? } elseif ($elements_details1_tab['type'][$key] == 'wysywig') { ?>
										<tr>
											<td colspan="2">
												<? echo $value; ?> <br />
												<!--
												<div  id="<? echo $key; ?>">
													<textarea class="popup1_content_input1 save_par <? echo $class1; ?> tinymce" type="text" name="<? echo $key; ?>"><? echo $data1_tab[$key]; ?></textarea>
												</div>
												-->
												<textarea id="<? echo $key; ?>" class="popup1_content_input1 save_par <? echo $class1; ?> tinymce" type="text" name="<? echo $key; ?>"><? echo $data1_tab[$key]; ?></textarea>
											</td>
										</tr>
									<? } ?>
								<? } ?>
							</table>
						</div>						
						<div class="popup1_content1_1_3">
							<a onclick="save_element_changes(<? echo $_POST['element_id']; ?>);" class="popup1_content1_1_3_1">	
								<div class="popup1_content1_1_3_1_1">	
									<div class="button4">
										<div class="button4_1">
											<div class="button4_2">
												<div class="button4_3">
													<div class="button1_3_fog"></div>
													<span>save changes</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</a>
							<input class="hidden_submit1" onclick="save_element_changes(<? echo $_POST['element_id']; ?>);" type="submit" name="save_changes" value="save changes" />
						</div>	
						<!--
						<div class="popup1_content1_1_3"><input onclick="save_element_changes(<? echo $_POST['element_id']; ?>);" type="submit" name="save_changes" value="save changes" /></div>
						-->
						<? if ($pass1 == 1) { ?>
							<div class="popup1_s1">
								<table>
									<? $i=0; ?>
									<? foreach ($elements_details1_tab['name'] as $key => $value) { ?>
										<? $i++; if ($i == 1) $class1='focus_here'; else $class1=''; ?>
										<? if ($elements_details1_tab['type'][$key] == 'pass') { ?>
											<tr>
												<td style="width:25%;"><? echo $value; ?></td>
												<td style="width:75%;">
													<input id="<? echo $key; ?>" class="popup1_content_input1 save_par <? echo $class1; ?>" type="text" name="<? echo $key; ?>" value="" />
												</td>
											</tr>
										<? } ?>
									<? } ?>
								</table>
							</div>		
							<div class="popup1_content1_1_3">
								<a onclick="save_element_changes(<? echo $_POST['element_id']; ?>);" class="popup1_content1_1_3_1">	
									<div class="popup1_content1_1_3_1_1">	
										<div class="button4">
											<div class="button4_1">
												<div class="button4_2">
													<div class="button4_3">
														<div class="button1_3_fog"></div>
														<span>save changes</span>
													</div>
												</div>
											</div>
										</div>
									</div>
								</a>
								<input class="hidden_submit1" onclick="save_element_changes(<? echo $_POST['element_id']; ?>);" type="submit" name="save_changes" value="save changes" />
							</div>	
						<? } ?>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>
<script language="javascript">

$("#structure_basic_form").submit(function(e) {	e.preventDefault(); }); 

$(function() {	
	<? foreach ($elements_details1_tab['name'] as $key => $value) { ?>
		<? if ($elements_details1_tab['type'][$key] == 'date') { ?>
			$( "#<? echo $key; ?>" ).datepicker({			
				showWeek: true,
				firstDay: 1		
			});			
			$( "#<? echo $key; ?>" ).datepicker( "option", "dateFormat", "yy-mm-dd");
			$( "#<? echo $key; ?>" ).datepicker( "option", "defaultDate", "<? $data1_tab[$key] ?>");
			$( "#<? echo $key; ?>" ).datepicker( "setDate", "<? echo $data1_tab[$key]; ?>" );
		<? } elseif ($elements_details1_tab['type'][$key] == 'time') { ?>
			$('#<? echo $key; ?>').timepicker({ 'scrollDefaultNow': true ,'timeFormat': 'H:i:s', 'step': 15});
		<? } ?>
	<? } ?>
});

</script>
<?











































?>