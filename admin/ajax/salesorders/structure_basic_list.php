<?php

session_start();
include_once('../../config/mysql.php');
include_once('../../config/structure_basic.php');

$table_name=$_SESSION['table_name'];
$table_key=$_SESSION['table_key'];

//get informations from database
$query = "SELECT * FROM ".$table_name." WHERE ".$table_key.">0";
if ($_SESSION['filters'] != '') {
	foreach ($_SESSION['filters'] as $key => $value) {
		if ($key != '' AND $value != '') {
			if ($_SESSION['elements_list1_tab']['filter'][$key] == 'text') {
				$query .= " AND `".$key."` LIKE '%".$value."%'";
			} elseif ($_SESSION['elements_list1_tab']['filter'][$key] == 'select') {
				$query .= " AND `".$key."`='".$value."'";
			}
		}
	}
}
$query .= " ORDER BY ".$_SESSION[$table_name]['sort1']." ".$_SESSION[$table_name]['sort2'].", createtime DESC";	
$result = @mysql_query ($query);
$resulti=mysql_num_rows($result);
//echo "query -- $query";

if ($_SESSION['pagination'] == '') $_SESSION['pagination']=0;
if ($_SESSION['show_entries'] == '') $_SESSION['show_entries']=10;

$query .= " LIMIT ".($_SESSION['pagination']*$_SESSION['show_entries']).",".$_SESSION['show_entries'];	
//echo "query -- $query -- $result <br>";

$i=0;
$data_tab1='';
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$i++;
	foreach ($_SESSION['elements_list1_tab']['type'] as $key => $value) {
		$data_tab1[$row[$table_key]][$key]=$row[$key];
	}
	$data_tab1[$row[$table_key]]['i']=$i;
	
	//count potential price
	//salesorder_productid 	salesorderid 	position 	productid 	price 	quantity 	vat 	createtime 	lastactiontime	
	$query1 = "SELECT * FROM salesorder_products WHERE salesorderid='".$row['salesorderid']."'"; 
	$result1 = @mysql_query ($query1);
	while ($row1 = mysql_fetch_array ($result1, MYSQL_ASSOC)) {
		$data_tab1[$row[$table_key]]['price']+=$row1['price']*$row1['quantity'];	
	}
}

$pag1=ceil($resulti/$_SESSION['show_entries']);
$pag2=$_SESSION['pagination']*$_SESSION['show_entries'];
$pag3=$pag2+$_SESSION['show_entries'];
if ($pag3 > $resulti) $pag3=$resulti;

?>

<table class="list1_1" cellspacing="0">	
	<thead>
		<? if ($_SESSION['page_settings_tab']['filters'] == 1) { ?>
			<tr class="list1_1_filter">
				<td colspan="<? echo $_SESSION['num_of_colls']; ?>">
					<div class="list1_1_search1"><span>Search: &nbsp;</span></div>
					<div class="list1_1_search2">
						<? 	foreach ($_SESSION['elements_list1_tab']['filter'] as $id => $val) { ?>
							<span><? echo $elements_list1_tab['name'][$id]; ?></span>							
							<? if ($_SESSION['elements_list1_tab']['filter'][$id] == 'select') { ?>
								<select class="list1_1_search2_1 filter_tab select_value" name="filter_<? echo $id ?>" id="filter_<? echo $id ?>">
									<option value=""></option>
									<? foreach ($_SESSION['elements_list1_tab']['select'][$key] as $key1 => $value1) { ?>
										<? if ($key1 == $_SESSION['filters'][$id]) { ?>
											<option selected value="<? echo $key1; ?>"><? echo $value1; ?></option>
										<? } else { ?>
											<option value="<? echo $key1; ?>"><? echo $value1; ?></option>
										<? } ?>
									<? } ?>	
								</select>					
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
			<td style="width:100px;" class="tcenter"><a href="#"><span>Price</span></a></td>
			<? if ($_SESSION['attachet_tab'] != '')	foreach ($_SESSION['attachet_tab'] as $key => $value) { ?>
				<td style="width:30px;" class="tcenter"><a href="#"><span><? echo $value; ?></span></a></td>
			<? } ?>
			<? if ($_SESSION['page_settings_tab']['translations'] == 1) { ?>	
				<td style="width:30px;" class="tcenter"><a href="#"><span>Trans</span></a></td>
			<? } ?>
			<? if ($_SESSION['page_settings_tab']['pictures'] == 1) { ?>	
				<td style="width:30px;" class="tcenter"><a href="#"><span>Pict</span></a></td>
			<? } ?>
			<td style="width:30px;" class="tcenter"><a href="#"><span>Edit</span></a></td>
			<? if ($_SESSION['page_settings_tab']['deleting'] != 0) { ?>	
				<td style="width:30px;" class="tcenter"><a href="#"><span>Delete</span></a></td>
			<? } ?>
		</tr>
	</thead> 
	<tbody id="sortable" class="structure_table1">
		<? if ($data_tab1 != '') { ?>
			<? foreach ($data_tab1 as $id => $val) { ?>
				<?	if (is_int($data_tab1[$id][i]/2)) { ?>
					<tr class="elemstr structure_table1_tr1" id="elemstr_<? echo  $id; ?>" class="ui-state-default">
				<? } else { ?>
					<tr class="elemstr" id="elemstr_<? echo  $id; ?>" class="ui-state-default">				
				<? } ?>
					<td class="tright list1_1_1"><a><span><? echo ($data_tab1[$id][i]+$pag2); ?>.</span></a></td>
					<td class="tcenter list1_1_1"><a class="arrow_move_iko"><span>&nbsp;</span></a></td>
					<? 	foreach ($_SESSION['elements_list1_tab']['type'] as $id1 => $val1) { ?>
						<? if ($val1 == 'text') { ?>																					
							<td class="list1_1_1">
								<a>
									<span id="<? echo $id1; ?>_<? echo $id; ?>"><? echo $data_tab1[$id][$id1]; ?></span>
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
					<td class="tcenter list1_1_1" style="width:30px;"><a><span>
						<? echo number_format($data_tab1[$id]['price']); ?>
					</span></a></td>
					<? if ($_SESSION['attachet_tab'] != '')	foreach ($_SESSION['attachet_tab'] as $key => $value) { ?>
						<td class="tcenter list1_1_1" style="width:30px;"><a onclick="attachet_tab(<? echo $id; ?>,'<? echo $key; ?>');" class="edit_iko"><span>&nbsp;</span></a></td>
					<? } ?>
					<? if ($_SESSION['page_settings_tab']['translations'] == 1) { ?>					
						<td class="tcenter list1_1_1" style="width:30px;"><a onclick="element_translate(<? echo $id; ?>);" class="edit_iko"><span>&nbsp;</span></a></td>
					<? } ?> 
					<? if ($_SESSION['page_settings_tab']['pictures'] == 1) { ?>					
						<td class="tcenter list1_1_1" style="width:30px;"><a onclick="element_pictures(<? echo $id; ?>);" class="edit_iko"><span>&nbsp;</span></a></td>
					<? } ?> 
					<td class="tcenter list1_1_1" style="width:30px;"><a onclick="element_edit(<? echo $id; ?>);" class="edit_iko"><span>&nbsp;</span></a></td>
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
			<div class="list1_1_footer_1">
				<span>Showing <? echo ($pag2+1); ?> to <? echo $pag3; ?> of <? echo $resulti; ?> entries</span>
			</div>
			<? if ($_SESSION['page_settings_tab']['pagination'] == 1) { ?>
				<div class="list1_1_footer_2">
					<ul>
						<? for ($i=1;$i<=$pag1;$i++) { ?>
							<? if ($i == ($_SESSION['pagination']+1)) { ?>
								<li><a class="list1_1_footer_2_ul_li_a_hover" onclick="change_pagination(<? echo $i; ?>);"><span><? echo $i; ?></span></a></li>
							<? } else { ?>
								<li><a onclick="change_pagination(<? echo $i; ?>);"><span><? echo $i; ?></span></a></li>
							<? } ?>
						<? } ?>
					</ul>
				</div>
			<? } ?>
		</td>
	</tr>
</table>

<script language="javascript">
	$( "#sortable" ).sortable({
		update: function(event, ui) {
			save_positions();
		}
	});
	$( "#sortable" ).disableSelection();
		
	$("#show_entries").change(function() {
		show_entries($(this).val());
	});
</script>
