<?php

session_start();
include_once('../../config/mysql.php');
include_once('../../config/structure_basic.php');

$table_name=$_SESSION['table_name'];
$table_key=$_SESSION['table_key'];

//get informations from database
$query = "SELECT * FROM ".$_POST['attachetname']." WHERE ".$table_key."='".$_POST['element_id']."'";
if ($_SESSION['filters'][$_POST['attachetname']] != '') {
	foreach ($_SESSION['filters'][$_POST['attachetname']] as $key => $value) {
		if ($key != '' AND $value != '') {
			if ($_SESSION['attachet_fields_list_tab'][$_POST['attachetname']]['filter'][$key] == 'text') {
				$query .= " AND `".$key."` LIKE '%".$value."%'";
			} elseif ($_SESSION['attachet_fields_list_tab'][$_POST['attachetname']]['filter'][$key] == 'select') {
				$query .= " AND `".$key."`='".$value."'";
			}
		}
	}
}
$query .= " ORDER BY ".$_SESSION[$table_name][$_POST['attachetname']]['sort1']." ".$_SESSION[$table_name][$_POST['attachetname']]['sort2'].", createtime DESC";	
$result = @mysql_query ($query);
$resulti=mysql_num_rows($result);
//echo "query -- $query -- $result";

if ($_SESSION[$_POST['attachetname']]['pagination'] == '') $_SESSION[$_POST['attachetname']]['pagination']=0;
if ($_SESSION[$_POST['attachetname']]['show_entries'] == '') $_SESSION[$_POST['attachetname']]['show_entries']=10;

$query .= " LIMIT ".($_SESSION[$_POST['attachetname']]['pagination']*$_SESSION[$_POST['attachetname']]['show_entries']).",".$_SESSION[$_POST['attachetname']]['show_entries'];	
//echo "query -- $query -- $result <br>";

$i=0;
$data_tab1='';
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$i++;
	foreach ($_SESSION['attachet_fields_list_tab'][$_POST['attachetname']]['type'] as $key => $value) {
		$data_tab1[$row[$_SESSION['attachetid_tab'][$_POST['attachetname']]]][$key]=$row[$key];
	}
	$data_tab1[$row[$_SESSION['attachetid_tab'][$_POST['attachetname']]]]['i']=$i;
}

$pag1=ceil($resulti/$_SESSION[$_POST['attachetname']]['show_entries']);
$pag2=$_SESSION[$_POST['attachetname']]['pagination']*$_SESSION[$_POST['attachetname']]['show_entries'];
$pag3=$pag2+$_SESSION[$_POST['attachetname']]['show_entries'];
if ($pag3 > $resulti) $pag3=$resulti;


?>

<div class="popup01"></div>
<form id="structure_basic_list_att">
	<div class="popup">
		<div class="popup2">			
			<div class="popup2_right_top_att">
				<? if ($_SESSION['attachet_page_settings_tab'][$_POST['attachetname']]['adding'] == 1) { ?>
					<a class="header1_add" onclick="element_add_att(<? echo $_POST['element_id']; ?>,'<? echo $_POST['attachetname']; ?>');">	
						<div class="button2">
							<div class="button2_1">
								<div class="button2_2">
									<div class="button2_3">
										<div class="button1_3_fog"></div>
										<span>add element</span>
									</div>
								</div>
							</div>
						</div>
					</a>
				<? } ?>
				<div class="popup1_close"><a onclick="$('.popup').css('display','none');$('.popup01').css('display','none');">close</a></div>
			</div>
			<div class="popup1_content">
				<div class="popup1_content1">
					<div class="popup1_content1_1">
						<div class="popup1_content1_1_1"><span><? echo $_SESSION['attachet_tab'][$_POST['attachetname']]; ?></span></div>
						<div class="popup1_s1">
							<table class="list1_1" cellspacing="0">	
								<thead>
									<? if ($_SESSION['attachet_page_settings_tab'][$_POST['attachetname']]['filters'] == 1) { ?>
										<tr class="list1_1_filter">
											<td colspan="<? echo $_SESSION['num_of_colls']; ?>">
												<div class="list1_1_search1"><span>Search: &nbsp;</span></div>
												<div class="list1_1_search2">
													<? 	foreach ($_SESSION['attachet_fields_list_tab'][$_POST['attachetname']]['filter'] as $id => $val) { ?>
														<span><? echo $_SESSION['attachet_fields_list_tab'][$_POST['attachetname']]['name1'][$id]; ?></span>							
														<? if ($_SESSION['attachet_fields_list_tab'][$_POST['attachetname']]['filter'][$id] == 'select') { ?>
															<select class="list1_1_search2_1 filter_att_tab select_value" name="filter_<? echo $id ?>" id="filter_<? echo $id ?>">
																<option value=""></option>
																<? foreach ($_SESSION['attachet_fields_list_tab'][$_POST['attachetname']]['select'][$key] as $key1 => $value1) { ?>
																	<? if ($key1 == $_SESSION['filters'][$_POST['attachetname']][$id]) { ?>
																		<option selected value="<? echo $key1; ?>"><? echo $value1; ?></option>
																	<? } else { ?>
																		<option value="<? echo $key1; ?>"><? echo $value1; ?></option>
																	<? } ?>
																<? } ?>	
															</select>					
														<? } else { ?>															
															<input class="list1_1_search2_1 filter_att_tab" type="text" name="filter_<? echo $id ?>" id="filter_<? echo $id ?>" value="<? echo $_SESSION['filters'][$_POST['attachetname']][$id]; ?>" />
														<? } ?>
													<? } ?>			
												</div>		
												<div class="list1_1_search2">
													<a class="list1_1_search2_filter" onclick="filter2('<? echo $_POST['element_id']; ?>','<? echo $_POST['attachetname']; ?>');">	
														<div class="button3">
															<div class="button3_1">
																<div class="button3_2">
																	<div class="button3_3">
																		<div class="button1_3_fog"></div>
																		<span>search</span>
																	</div>
																</div>
															</div>
														</div>
														<div class="clear"></div>
													</a>			
												</div>		
											<? } ?>				
											<? if ($_SESSION['attachet_page_settings_tab'][$_POST['attachetname']]['pagination'] == 1) { ?>
												<div class="list1_1_search3">	
													<div class="list1_1_search3_1">			
														<span>Show entries:</span>
													</div>	
													<div class="list1_1_search3_2">		
														<select name="show_entries_att" id="show_entries_att">
															<? foreach ($amount_tab as $key => $value) { ?>
																<? if ($key == $_SESSION[$_POST['attachetname']]['show_entries']) { ?>
																	<option selected value="<? echo $key; ?>"><? echo $value; ?></option>								
																<? } else { ?>
																	<option value="<? echo $key; ?>"><? echo $value; ?></option>
																<? } ?>
															<? } ?>
														</select>
													</div>		
												</div>		
											</td>
										</tr>
									<? } ?>			
									<tr class="list1_1_sort">
										<td style="width:30px;" class="tcenter">
											<? if ($_SESSION[$table_name][$_POST['attachetname']]['sort1'] == 'position' AND $_SESSION[$table_name][$_POST['attachetname']]['sort2'] == 'DESC') { ?>
												<a class="sort2_1" href="#" onclick="sort1_att('position',1,'<? echo $_POST['element_id']; ?>','<? echo $_POST['attachetname']; ?>');"><span>Pos</span></a>	
											<? } elseif ($_SESSION[$table_name][$_POST['attachetname']]['sort1'] == 'position') { ?>
												<a class="sort2" href="#" onclick="sort1_att('position',2,'<? echo $_POST['element_id']; ?>','<? echo $_POST['attachetname']; ?>');"><span>Pos</span></a>						
											<? } else { ?>
												<a class="sort1" href="#" onclick="sort1_att('position',1,'<? echo $_POST['element_id']; ?>','<? echo $_POST['attachetname']; ?>');"><span>Pos</span></a>
											<? } ?>
										</td>
										<td style="width:30px;" class="tcenter"><a href=""><span>Move</span></a></td>
										<? 	foreach ($_SESSION['attachet_fields_list_tab'][$_POST['attachetname']]['name1'] as $id => $value) { ?>			
											<? if ($_SESSION['attachet_fields_list_tab'][$_POST['attachetname']]['sort'][$id] == 1) { ?>
												<td style="width:<? echo $_SESSION['attachet_fields_list_tab'][$_POST['attachetname']]['width'][$id] ?>%">
													<? if ($_SESSION[$table_name][$_POST['attachetname']]['sort1'] == $id AND $_SESSION[$table_name][$_POST['attachetname']]['sort2'] == 'DESC') { ?>
														<a class="sort2_1" href="#" onfocus="blur();" onclick="sort1_att('<? echo $id; ?>',1,'<? echo $_POST['element_id']; ?>','<? echo $_POST['attachetname']; ?>');"><span><? echo $value; ?></span></a>	
													<? } elseif ($_SESSION[$table_name][$_POST['attachetname']]['sort1'] == $id) { ?>
														<a class="sort2" href="#" onfocus="blur();" onclick="sort1_att('<? echo $id; ?>',2,'<? echo $_POST['element_id']; ?>','<? echo $_POST['attachetname']; ?>');"><span><? echo $value; ?></span></a>						
													<? } else { ?>
														<a class="sort1" href="#" onfocus="blur();" onclick="sort1_att('<? echo $id; ?>',1,'<? echo $_POST['element_id']; ?>','<? echo $_POST['attachetname']; ?>');"><span><? echo $value; ?></span></a>
													<? } ?>	
												</td> 						
											<? } else { ?>
												<td style="width:<? echo $_SESSION['attachet_fields_list_tab'][$_POST['attachetname']]['width'][$id] ?>%"><a href="#"><span><? echo $value; ?></span></a></td>
											<? } ?>
										<? } ?>
										<? if ($_SESSION['attachet_page_settings_tab'][$_POST['attachetname']]['translations'] == 1) { ?>	
											<td style="width:30px;" class="tcenter"><a href="#"><span>Trans</span></a></td>
										<? } ?>
										<? if ($_SESSION['attachet_page_settings_tab'][$_POST['attachetname']]['pictures'] == 1) { ?>	
											<td style="width:30px;" class="tcenter"><a href="#"><span>Pict</span></a></td>
										<? } ?>
										<td style="width:30px;" class="tcenter"><a href="#"><span>Edit</span></a></td>
										<? if ($_SESSION['attachet_page_settings_tab'][$_POST['attachetname']]['deleting'] != 0) { ?>	
											<td style="width:30px;" class="tcenter"><a href="#"><span>Delete</span></a></td>
										<? } ?>
									</tr>
								</thead> 
								<tbody id="sortable_att" class="structure_table1">
									<? if ($data_tab1 != '') { ?>
										<? foreach ($data_tab1 as $id => $val) { ?>
											<?	if (is_int($data_tab1[$id][i]/2)) { ?>
												<tr class="elemstr_att structure_table1_tr1" id="elemstr_<? echo  $id; ?>" class="ui-state-default">
											<? } else { ?>
												<tr class="elemstr_att" id="elemstr_<? echo  $id; ?>" class="ui-state-default">				
											<? } ?>
												<td class="tright list1_1_1"><a><span><? echo ($data_tab1[$id][i]+$pag2); ?>.</span></a></td>
												<td class="tcenter list1_1_1"><a class="arrow_move_iko"><span>&nbsp;</span></a></td>
												<? 	foreach ($_SESSION['attachet_fields_list_tab'][$_POST['attachetname']]['type'] as $id1 => $val1) { ?>
													<? if ($val1 == 'text') { ?>																					
														<td class="list1_1_1">
															<a>
																<span id="<? echo $id1; ?>_<? echo $id; ?>"><? echo $data_tab1[$id][$id1]; ?></span>
															</a>
														</td>
													<? } elseif ($val1 == 'select') { ?>																				
														<td class="list1_1_1">
															<a>
																<span id="<? echo $id1; ?>_<? echo $id; ?>"><? echo $attachet_fields_list_tab[$_POST['attachetname']]['select'][$id1][$data_tab1[$id][$id1]]; ?></span>
															</a>
														</td>
													<? } elseif ($val1 == 'pass') { ?>
														<td><a><span>****</span></a></td>		
													<? } ?>
												<? } ?>			
												<? if ($_SESSION['attachet_page_settings_tab'][$_POST['attachetname']]['translations'] == 1) { ?>					
													<td class="tcenter list1_1_1" style="width:30px;"><a onclick="element_translate_att(<? echo $id; ?>,'<? echo $_POST['element_id']; ?>','<? echo $_POST['attachetname']; ?>');" class="edit_iko"><span>&nbsp;</span></a></td>
												<? } ?> 
												<? if ($_SESSION['attachet_page_settings_tab'][$_POST['attachetname']]['pictures'] == 1) { ?>					
													<td class="tcenter list1_1_1" style="width:30px;"><a onclick="element_pictures_att(<? echo $id; ?>,'<? echo $_POST['element_id']; ?>','<? echo $_POST['attachetname']; ?>');" class="edit_iko"><span>&nbsp;</span></a></td>
												<? } ?> 
												<td class="tcenter list1_1_1" style="width:30px;"><a onclick="element_edit_att(<? echo $id; ?>,'<? echo $_POST['element_id']; ?>','<? echo $_POST['attachetname']; ?>');" class="edit_iko"><span>&nbsp;</span></a></td>
												<? if ($_SESSION['attachet_page_settings_tab'][$_POST['attachetname']]['deleting'] != 0) { ?>	
													<td class="tcenter list1_1_1" style="width:30px;"><a onclick="element_delete_att(<? echo $id; ?>,'<? echo $_POST['element_id']; ?>','<? echo $_POST['attachetname']; ?>');" class="delete_iko"><span>&nbsp;</span></a></td>
												<? } ?> 
											</tr>
										<? } ?> 
									<? } else { ?>
										<tr><td colspan="<? echo $_SESSION['num_of_colls']; ?>"><span class="no_results_found">No results found</span></td></tr>
									<? } ?> 
								</tbody>
								<tr class="list1_1_footer">
									<td colspan="<? echo $_SESSION['num_of_colls']; ?>">
										<? if ($pag3 > 0) { ?>
											<div class="list1_1_footer_1">
												<span>Showing <? echo ($pag2+1); ?> to <? echo $pag3; ?> of <? echo $resulti; ?> entries</span>
											</div>
										<? } ?>
										<? if ($_SESSION['attachet_page_settings_tab'][$_POST['attachetname']]['pagination'] == 1 AND $pag1 > 1) { ?>
											<div class="list1_1_footer_2">
												<ul>
													<? for ($i=1;$i<=$pag1;$i++) { ?>
														<? if ($i == ($_SESSION[$_POST['attachetname']]['pagination']+1)) { ?>
															<li><a class="list1_1_footer_2_ul_li_a_hover" onclick="change_pagination_att(<? echo $i; ?>,'<? echo $_POST['element_id']; ?>','<? echo $_POST['attachetname']; ?>');"><span><? echo $i; ?></span></a></li>
														<? } else { ?>
															<li><a onclick="change_pagination_att(<? echo $i; ?>,'<? echo $_POST['element_id']; ?>','<? echo $_POST['attachetname']; ?>');"><span><? echo $i; ?></span></a></li>
														<? } ?>
													<? } ?>
												</ul>
											</div>
										<? } ?>
									</td>
								</tr>
							</table>
							<script language="javascript">
								$( "#sortable_att" ).sortable({
									update: function(event, ui) {
										save_positions_att('<? echo $_POST['element_id']; ?>','<? echo $_POST['attachetname']; ?>');
									}
								});
								$( "#sortable_att" ).disableSelection();
									
								$("#show_entries_att").change(function() {
									show_entries_att($(this).val(),'<? echo $_POST['element_id']; ?>','<? echo $_POST['attachetname']; ?>');
								});
							</script>
						</div>		
						<? if ($pass1 == 1) { ?>
							<div class="popup1_s1">
								<table>
									<? $i=0; ?>
									<? foreach ($elements_details1_tab['name'] as $key => $value) { ?>
										<? $i++; if ($i == 1) $class1='focus_here'; else $class1=''; ?>
										<? if ($elements_details1_tab['type'][$key] == 'pass') { ?>
											<tr>
												<td style="width:15%;"><? echo $value; ?></td>
												<td style="width:85%;">
													<input id="<? echo $key; ?>" class="popup1_content_input1 save_par <? echo $class1; ?>" type="text" name="<? echo $key; ?>" value="" />
												</td>
											</tr>
										<? } ?>
									<? } ?>
								</table>
							</div>		
						<? } ?>							
						<!--
						<input onclick="save_add_element(<? echo $_POST['element_id']; ?>);" type="submit" name="add_element" value="add element" /></div>
						-->
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>
<script language="javascript"> $("#structure_basic_form").submit(function(e) {	e.preventDefault(); }); </script>

<?















mysql_close($dbc);

?>