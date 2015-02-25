<?php

session_start();
include_once('../config/mysql.php');
include_once('../config/structure_basic.php');

$table_name=$_SESSION['table_name'];
$table_key=$_SESSION['table_key'];

//get informations from database
$query = "SELECT * FROM ".$table_name." WHERE ".$table_key.">0";
if ($_SESSION['filters'] != '') {
	foreach ($_SESSION['filters'] as $key => $value) {
		if ($key != '' AND $value != '') {
			if ($_SESSION['elements_list1_tab']['filter'][$key] == 'text' OR $_SESSION['elements_list1_tab']['filter'][$key] == 'date') {
				$query .= " AND `".$key."` LIKE '%".$value."%'";
			} elseif ($_SESSION['elements_list1_tab']['filter'][$key] == 'select' OR $_SESSION['elements_list1_tab']['filter'][$key] == 'bigselect') {
				$query .= " AND `".$key."`='".$value."'";
			} elseif ($_SESSION['elements_list1_tab']['filter'][$key] == 'multiselect') {
				$query .= " AND `".$key."` LIKE '%,".$value.",%'";
			} else {
				$query .= " AND `".$key."` IN (".$value.")";				
			}
		}
	}
}
$query .= " ORDER BY ".$_SESSION[$table_name]['sort1']." ".$_SESSION[$table_name]['sort2'].", createtime DESC";	
$result = @mysql_query ($query);
$resulti=mysql_num_rows($result);

if ($_SESSION['pagination'] == '') $_SESSION['pagination']=0;
if ($_SESSION['show_entries'] == '') $_SESSION['show_entries']=10;

$query .= " LIMIT ".($_SESSION['pagination']*$_SESSION['show_entries']).",".$_SESSION['show_entries'];	
//echo "query -- $query -- $result <br>";

$i=0;
$data_tab1='';
$result = @mysql_query ($query);
$allid='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

	$i++;
	foreach ($_SESSION['elements_list1_tab']['type'] as $key => $value) {
		$data_tab1[$row[$table_key]][$key]=$row[$key];
	}
	$data_tab1[$row[$table_key]]['i']=$i;	
	
	if ($_SESSION['elements_list1_tab']['bigselect'] != '' ) foreach ($_SESSION['elements_list1_tab']['bigselect'] as $key => $value) {
		$key='userid';
		$allid[$key].=','.$row[$key];
	}
	
	//count attachment for this element
	if ($_SESSION['page_settings_tab']['attachments'] == 2) {
				
		$query1 = "SELECT * FROM structure_basic_attachments WHERE table_name='".$_SESSION['table_name']."' AND tableid='".$row[$table_key]."'";	
		$result1 = @mysql_query ($query1);
		$data_tab1[$row[$table_key]]['attach_i']=mysql_num_rows($result1);	
	}
	
	//get base file	
	$query1 = "SELECT * FROM structure_basic_attachments WHERE table_name='documents_users' AND tableid='".$row['documents_userid']."'
	ORDER BY name LIMIT 1";
	$result1 = @mysql_query ($query1);
	while ($row1 = mysql_fetch_array ($result1, MYSQL_ASSOC)) {
		$data_tab1[$row[$table_key]]['base_file']=$row1['name'].'.'.$row1['extension'];	
	}
}

/*
echo "data_tab1 -- <pre>";
print_r($data_tab1);
echo "</pre>";
*/

if ($_SESSION['elements_list1_tab']['bigselect'] != '' ) foreach ($_SESSION['elements_list1_tab']['bigselect'] as $key => $value) {
	$allid[$key]=substr($allid[$key],1);
}

$pag1=ceil($resulti/$_SESSION['show_entries']);
$pag2=$_SESSION['pagination']*$_SESSION['show_entries'];
$pag3=$pag2+$_SESSION['show_entries'];
if ($pag3 > $resulti) $pag3=$resulti;

//get big select tabs
$bigselect_tab='';
if ($_SESSION['elements_list1_tab']['bigselect'] != '' ) foreach ($_SESSION['elements_list1_tab']['bigselect'] as $key => $value) {

	if ($allid[$key] != '') {
		$query = "SELECT * FROM ".$_SESSION['elements_list1_tab']['bigselect'][$key]['tabname']." WHERE ".$key." IN (".$allid[$key].")";
		$result = @mysql_query ($query);	
		//echo "query -- $query -- $result";
		while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
			$bigselect_tab[$key][$row[$key]]=$row[$_SESSION['elements_list1_tab']['bigselect'][$key]['disname']];
		}
	}
}

/*
echo "bigselect_tab -- <pre>";
print_r($bigselect_tab);
echo "</pre>";
*/

?>

<table class="list1_1" cellspacing="0">	
	<thead>
		<? if ($_SESSION['page_settings_tab']['filters'] == 1) { ?>
			<tr class="list1_1_filter">
				<td colspan="<? echo $_SESSION['num_of_colls']; ?>">
					<div class="list1_1_search1"><span>Search: &nbsp;</span></div>
					<div class="list1_1_search2">
						<? 	foreach ($_SESSION['elements_list1_tab']['filter'] as $id => $val) { ?>
							<span><? echo $_SESSION['elements_list1_tab']['name'][$id]; ?></span>							
							<? if ($_SESSION['elements_list1_tab']['filter'][$id] == 'date') { ?>			
								<input class="list1_1_search2_1 filter_tab filter_tab_date" type="text" name="filter_<? echo $id ?>" id="filter_<? echo $id ?>" value="<? echo $_SESSION['filters'][$id] ?>" />
							<? } elseif ($_SESSION['elements_list1_tab']['filter'][$id] == 'select') { ?>
								<select class="list1_1_search2_1 filter_tab select_value" name="filter_<? echo $id ?>" id="filter_<? echo $id ?>">
									<option value=""></option>
									<? foreach ($_SESSION['elements_list1_tab']['select'][$id] as $key1 => $value1) { ?>
										<? if ($key1 == $_SESSION['filters'][$id] AND $_SESSION['filters'][$id] != '') { ?>
											<option selected value="<? echo $key1; ?>"><? echo $value1; ?></option>
										<? } else { ?>
											<option value="<? echo $key1; ?>"><? echo $value1; ?></option>
										<? } ?>
									<? } ?>	
								</select>					
							<? } elseif ($_SESSION['elements_list1_tab']['filter'][$id] == 'multiselect') { ?>
								<select class="list1_1_search2_1 filter_tab select_value" name="filter_<? echo $id ?>" id="filter_<? echo $id ?>">
									<option value=""></option>
									<? foreach ($_SESSION['elements_list1_tab']['multiselect1'][$id] as $key1 => $value1) { ?>
										<? if ($key1 == $_SESSION['filters'][$id] AND $_SESSION['filters'][$id] != '') { ?>
											<option selected value="<? echo $key1; ?>"><? echo $value1; ?></option>
										<? } else { ?>
											<option value="<? echo $key1; ?>"><? echo $value1; ?></option>
										<? } ?>
									<? } ?>	
								</select>					
							<? } elseif ($_SESSION['elements_list1_tab']['filter'][$id] == 'bigselect') { ?>										
								<?
								if ($_SESSION['filters'][$id] != '') {
									$query = "SELECT ".$_SESSION['elements_list1_tab']['bigselect'][$id]['disname']." FROM
									".$_SESSION['elements_list1_tab']['bigselect'][$id]['tabname']." WHERE ".$id."='".$_SESSION['filters'][$id]."'";
									$result = @mysql_query ($query);	
									while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
										$name=$row[$_SESSION['elements_list1_tab']['bigselect'][$id]['disname']];
									}		
								}
								?>							
								<div class="search_for_bigselect_element">
									<select onclick="search_for_bigselect_element('<? echo $id ?>','filter')" class="list1_1_search2_1 filter_tab select_value" name="filter_<? echo $id ?>" id="filter_<? echo $id ?>">
										<? if ($_SESSION['filters'][$id] != '') { ?>
											<option value="<? echo $_SESSION['filters'][$id]; ?>"><? echo $name; ?></option>
										<? } ?>
									</select>	
									&nbsp;&nbsp;&nbsp;&nbsp;
									<a class="search_for_bigselect_element_a" onclick="search_for_bigselect_element('<? echo $id ?>','filter')"></a>
									<? if ($_SESSION['filters'][$id] != '') { ?>
										<a class="search_for_bigselect_element_a_clear" onclick="clear_bigselect_element('<? echo $id ?>','filter')"></a>	
									<? } ?>									
								</div>
							<? } else { ?>
								<input class="list1_1_search2_1 filter_tab" type="text" name="filter_<? echo $id ?>" id="filter_<? echo $id ?>" value="<? echo $_SESSION['filters'][$id] ?>" />
							<? } ?>
						<? } ?>			
					</div>		
					<div class="list1_1_search2">
						<a class="list1_1_search2_filter" onclick="filter1();">	
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
				<? if ($_SESSION['page_settings_tab']['pagination'] == 1) { ?>
					<div class="list1_1_search3">	
						<div class="list1_1_search3_1">			
							<span>Show entries:</span>
						</div>	
						<div class="list1_1_search3_2">		
							<select name="show_entries" id="show_entries">
								<? foreach ($amount_tab as $key => $value) { ?>
									<? if ($key == $_SESSION['show_entries']) { ?>
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
			<? if ($_SESSION['page_settings_tab']['position'] == 1) { ?>
				<td style="width:30px;" class="tcenter">
					<? if ($_SESSION[$table_name]['sort1'] == 'position' AND $_SESSION[$table_name]['sort2'] == 'DESC') { ?>
						<a class="sort2_1" href="#" onclick="sort1('position',1);"><span>Pos</span></a>	
					<? } elseif ($_SESSION[$table_name]['sort1'] == 'position') { ?>
						<a class="sort2" href="#" onclick="sort1('position',2);"><span>Pos</span></a>						
					<? } else { ?>
						<a class="sort1" href="#" onclick="sort1('position',1);"><span>Pos</span></a>
					<? } ?>
				</td>
				<td style="width:30px;" class="tcenter"><a href=""><span>Move</span></a></td>
			<? } else { ?>
				<td style="width:30px;" class="tcenter"><a href="#"><span>Pos</span></a></td>
			<? } ?>
			<? 	foreach ($_SESSION['elements_list1_tab']['name'] as $id => $value) { ?>			
				<? if ($_SESSION['elements_list1_tab']['sort'][$id] == 1) { ?>
					<td style="width:<? echo $_SESSION['elements_list1_tab']['width'][$id] ?>%">
						<? if ($_SESSION[$table_name]['sort1'] == $id AND $_SESSION[$table_name]['sort2'] == 'DESC') { ?>
							<a class="sort2_1" href="#" onfocus="blur();" onclick="sort1('<? echo $id; ?>',1);"><span><? echo $value; ?></span></a>	
						<? } elseif ($_SESSION[$table_name]['sort1'] == $id) { ?>
							<a class="sort2" href="#" onfocus="blur();" onclick="sort1('<? echo $id; ?>',2);"><span><? echo $value; ?></span></a>						
						<? } else { ?>
							<a class="sort1" href="#" onfocus="blur();" onclick="sort1('<? echo $id; ?>',1);"><span><? echo $value; ?></span></a>
						<? } ?>	
					</td> 						
				<? } else { ?>
					<td style="width:<? echo $_SESSION['elements_list1_tab']['width'][$id] ?>%"><a href="#"><span><? echo $value; ?></span></a></td>
				<? } ?>
			<? } ?>
			<? if ($_SESSION['attachet_tab'] != '')	foreach ($_SESSION['attachet_tab'] as $key => $value) { ?>
				<td style="width:30px;" class="tcenter"><a href="#"><span><? echo $value; ?></span></a></td>
			<? } ?>
			<? if ($_SESSION['attached_modules_tab'] != '')	foreach ($_SESSION['attached_modules_tab'] as $key => $value) { ?>
				<td style="width:30px;" class="tcenter"><a href="#"><span><? echo $_SESSION['attached_modules_settings_tab'][$key]['dispname1']; ?></span></a></td>
			<? } ?>			
			<? if ($_SESSION['page_settings_tab']['translations'] == 1) { ?>	
				<td style="width:30px;" class="tcenter"><a href="#"><span>Trans</span></a></td>
			<? } ?>
			<? if ($_SESSION['page_settings_tab']['pictures'] == 1) { ?>	
				<td style="width:30px;" class="tcenter"><a href="#"><span>Pict</span></a></td>
			<? } ?>
			<td style="width:30px;" class="tcenter"><a href="#"><span>Base&nbsp;file</span></a></td>
			<? if ($_SESSION['page_settings_tab']['attachments'] == 2) { ?>	
				<td style="width:100px;" class="tcenter" colspan="2"><a href="#"><span>Att</span></a></td>
			<? } ?>
			<? if ($_SESSION['page_settings_tab']['attachments'] == 1) { ?>	
				<td style="width:30px;" class="tcenter"><a href="#"><span>Att</span></a></td>
			<? } ?>
			<? if ($_SESSION['page_settings_tab']['editing'] == 1) { ?>	
				<td style="width:30px;" class="tcenter"><a href="#"><span>Edit</span></a></td>
			<? } ?>
			<? if ($_SESSION['page_settings_tab']['viewing'] == 1) { ?>	
				<td style="width:30px;" class="tcenter"><a href="#"><span>View</span></a></td>
			<? } ?>
			<? if ($_SESSION['page_settings_tab']['deleting'] != 0) { ?>	
				<td style="width:30px;" class="tcenter"><a href="#"><span>Delete</span></a></td>
			<? } ?>
		</tr>
	</thead> 
	<tbody id="sortable" class="structure_table1">
		<? if ($data_tab1 != '') { ?>
			<? foreach ($data_tab1 as $id => $val) { ?>
				<? if ($_SESSION['page_settings_tab']['attachments'] == 2 AND $data_tab1[$id]['attach_i'] == 0) { ?>	
					<tr class="elemstr structure_table1_tr1 td_red" id="elemstr_<? echo  $id; ?>" class="ui-state-default">					
				<?	} elseif (is_int($data_tab1[$id][i]/2)) { ?>
					<tr class="elemstr structure_table1_tr1" id="elemstr_<? echo  $id; ?>" class="ui-state-default">
				<? } else { ?>
					<tr class="elemstr" id="elemstr_<? echo  $id; ?>" class="ui-state-default">				
				<? } ?>
					<td class="tright list1_1_1"><a><span><? echo ($data_tab1[$id][i]+$pag2); ?>.</span></a></td>
					<? if ($_SESSION['page_settings_tab']['position'] == 1) { ?>
						<td class="tcenter list1_1_1"><a class="arrow_move_iko"><span>&nbsp;</span></a></td>			
					<? } ?>
					<? 	foreach ($_SESSION['elements_list1_tab']['type'] as $id1 => $val1) { ?>
					
						<? if ($val1 == 'bigselect') { ?>																			
							<td class="list1_1_1">
								<a>
									<span id="<? echo $id1; ?>_<? echo $id; ?>">
										<? if (isset($bigselect_tab[$id1][$data_tab1[$id][$id1]])) echo @$bigselect_tab[$id1][$data_tab1[$id][$id1]]; ?>
									</span>
								</a>
							</td>						
						<? } elseif ($val1 == 'text' OR $val1 == 'date' OR $val1 == 'time' OR $val1 == 'datetime') { ?>																					
							<td class="list1_1_1">
								<? if ($id1 == 'website' OR strstr($id1, 'url')) { ?>
									<? 
									if (!strstr($data_tab1[$id][$id1],'http:') AND $data_tab1[$id][$id1] != '') {
										$data_tab1[$id][$id1]='http://'.$data_tab1[$id][$id1];
									}
									?>
									
									<a target="_blank" onfocus="blur();" href="<? echo $data_tab1[$id][$id1]; ?>" class="outsite_link"><span id="<? echo $id1; ?>_<? echo $id; ?>"><? echo $data_tab1[$id][$id1]; ?></span></a>
								<? } else { ?>
									<a><span id="<? echo $id1; ?>_<? echo $id; ?>"><? echo $data_tab1[$id][$id1]; ?></span></a>
								<? } ?>	
							</td>
						<? } elseif ($val1 == 'multiselect') { ?>
							<td class="list1_1_1">
								<a>
									<span id="<? echo $id1; ?>_<? echo $id; ?>">
										<?
										$val001=explode(',',$data_tab1[$id][$id1]);
										$i1=0;
										foreach ($val001 as $key0001 => $value0001) {
											if ($value0001 != '') {
												$i1++;
												if ($i1 > 1) {
													echo ' ; ';
												}
												?><? echo $elements_list1_tab['multiselect'][$id1][$value0001]; ?>
												<? 
											} 
										} ?>
									</span>
								</a>
							</td> 
						<? } elseif ($val1 == 'select') { ?>																				
							<td class="list1_1_1">
								<a>
									<span id="<? echo $id1; ?>_<? echo $id; ?>"><? echo $elements_list1_tab['select'][$id1][$data_tab1[$id][$id1]]; ?></span>
								</a>
							</td>
						<? } elseif ($val1 == 'pass') { ?>
							<td><a><span>****</span></a></td>		
						<? } ?>
					<? } ?>
					<? if ($_SESSION['attachet_tab'] != '')	foreach ($_SESSION['attachet_tab'] as $key => $value) { ?>
						<td class="tcenter list1_1_1" style="width:30px;"><a onclick="attachet_tab(<? echo $id; ?>,'<? echo $key; ?>');" class="edit_iko"><span>&nbsp;</span></a></td>
					<? } ?>
					<? if ($_SESSION['attached_modules_tab'] != '')	foreach ($_SESSION['attached_modules_tab'] as $key => $value) { ?>
						<td class="tcenter list1_1_1" style="width:30px;"><a onclick="popup_<? echo $key; ?>(<? echo $id; ?>);" class="edit_iko"><span>&nbsp;</span></a></td>
					<? } ?>			
					<? if ($_SESSION['page_settings_tab']['translations'] == 1) { ?>					
						<td class="tcenter list1_1_1" style="width:30px;"><a onclick="element_translate(<? echo $id; ?>);" class="edit_iko"><span>&nbsp;</span></a></td>
					<? } ?> 
					<? if ($_SESSION['page_settings_tab']['pictures'] == 1) { ?>					
						<td class="tcenter list1_1_1" style="width:30px;"><a onclick="element_pictures(<? echo $id; ?>);" class="edit_iko"><span>&nbsp;</span></a></td>
					<? } ?> 
					<td class="tcenter list1_1_1" style="width:30px;"><a target="_blank" href="files/attachments/basic/<? echo $data_tab1[$id]['base_file']; ?>"><span><? echo $data_tab1[$id]['base_file']; ?></span></a></td>
					<? if ($_SESSION['page_settings_tab']['attachments'] == 2) { ?>					
						<td class="tcenter list1_1_1" style="width:70px;"><a onclick="element_attachments(<? echo $id; ?>);"><span id="<? echo $id1; ?>_<? echo $id; ?>"><? echo $data_tab1[$id]['attach_i']; ?>&nbsp;attachments</span></a></td>
						<td class="tcenter list1_1_1" style="width:30px;"><a onclick="element_attachments(<? echo $id; ?>);" class="edit_iko"><span>&nbsp;</span></a></td>
					<? } ?> 
					<? if ($_SESSION['page_settings_tab']['attachments'] == 1) { ?>					
						<td class="tcenter list1_1_1" style="width:30px;"><a onclick="element_attachments(<? echo $id; ?>);" class="edit_iko"><span>&nbsp;</span></a></td>
					<? } ?> 
					<? if ($_SESSION['page_settings_tab']['editing'] == 1) { ?>		
						<td class="tcenter list1_1_1" style="width:30px;"><a onclick="element_edit(<? echo $id; ?>);" class="edit_iko"><span>&nbsp;</span></a></td>
					<? } ?> 
					<? if ($_SESSION['page_settings_tab']['viewing'] == 1) { ?>		
						<td class="tcenter list1_1_1" style="width:30px;"><a onclick="element_view(<? echo $id; ?>);" class="edit_iko"><span>&nbsp;</span></a></td>
					<? } ?> 
					<? if ($_SESSION['page_settings_tab']['deleting'] != 0) { ?>	
						<td class="tcenter list1_1_1" style="width:30px;"><a onclick="element_delete(<? echo $id; ?>);" class="delete_iko"><span>&nbsp;</span></a></td>
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
			<? if ($_SESSION['page_settings_tab']['pagination'] == 1 AND $pag1 > 1) { ?>
				<div class="list1_1_footer_2">
					<ul>
						<? for ($i=1;$i<=$pag1;$i++) { ?>
							<?
							$page_selected=$_SESSION['pagination']+1;
							?>						
							<? if ($page_selected >= ($i-5) AND $page_selected <= ($i+5)) { ?>							
								<? if ($i == ($_SESSION['pagination']+1)) { ?>
									<li><a class="list1_1_footer_2_ul_li_a_hover" onclick="change_pagination(<? echo $i; ?>);"><span><? echo $i; ?></span></a></li>
								<? } else { ?>
									<li><a onclick="change_pagination(<? echo $i; ?>);"><span><? echo $i; ?></span></a></li>
								<? } ?>
							<? } ?>
						<? } ?>
					</ul>
				</div>
			<? } ?>
		</td>
	</tr>
</table>

<script language="javascript">

	<? if ($_SESSION['page_settings_tab']['position'] == 1) { ?>
		$( "#sortable" ).sortable({
			update: function(event, ui) {
				save_positions();
			}
		});
		$( "#sortable" ).disableSelection();
	<? } ?>
		
	$("#show_entries").change(function() {
		show_entries($(this).val());
	});
	
	<? 	foreach ($_SESSION['elements_list1_tab']['filter'] as $key => $value) { ?>
		<? if ($_SESSION['elements_list1_tab']['type'][$key] == 'date') { ?>
			$( "#filter_<? echo $key; ?>" ).datepicker({			
				showWeek: true,
				firstDay: 1		
			});			
			$( "#filter_<? echo $key; ?>" ).datepicker( "option", "dateFormat", "yy-mm-dd");
			$( "#filter_<? echo $key; ?>" ).datepicker( "option", "defaultDate", "<? echo $_SESSION['filters'][$key] ?>");
			$( "#filter_<? echo $key; ?>" ).datepicker( "option", "minDate", new Date(<? echo date("Y") ?>, <? echo date("m")-1 ?>, <? echo date("d") ?>) );
			$( "#filter_<? echo $key; ?>" ).datepicker( "setDate", "<? echo $_SESSION['filters'][$key] ?>" );
		<? } elseif ($_SESSION['elements_list1_tab']['type'][$key] == 'time') { ?>
			$('#filter_<? echo $key; ?>').timepicker({ 'scrollDefaultNow': true ,'timeFormat': 'H:i:s'});
		<? } ?>
	<? } ?>
</script>

<?




mysql_close($dbc);

?>
