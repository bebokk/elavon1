<?php

session_start();

include_once('../../config/mysql.php');

$elements_list1_tab['bigselect']['clientid']['tabname']='clients';
$elements_list1_tab['bigselect']['clientid']['disname']='name';

//get picture details
$query = "SELECT ".$_POST['key1'].",".$elements_list1_tab['bigselect'][$_POST['key1']]['disname']."
FROM ".$_SESSION['elements_list1_tab']['bigselect'][$_POST['key1']]['tabname']." WHERE ".$_POST['key1'].">0";

if ($_SESSION['filter_bigselect'][$_POST['key1']] != '') {
	$query .= " AND name LIKE '%".$_SESSION['filter_bigselect'][$_POST['key1']]."%'";
}

$query .= " ORDER BY ".$_SESSION['elements_list1_tab']['bigselect'][$_POST['key1']]['disname'];

$result = @mysql_query ($query);
$resulti=mysql_num_rows($result);
$data1_tab='';

if ($_SESSION['pagination_bigselect'] == '') $_SESSION['pagination_bigselect']=0;
if ($_SESSION['show_entries'] == '') $_SESSION['show_entries']=10;

$query .= " LIMIT ".($_SESSION['pagination_bigselect']*$_SESSION['show_entries']).",".$_SESSION['show_entries'];	
$result = @mysql_query ($query);
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$data1_tab[$row[$_POST['key1']]]=$row[$elements_list1_tab['bigselect'][$_POST['key1']]['disname']];
}

$pag1=ceil($resulti/$_SESSION['show_entries']);
$pag2=$_SESSION['pagination_bigselect']*$_SESSION['show_entries'];
$pag3=$pag2+$_SESSION['show_entries'];
if ($pag3 > $resulti) $pag3=$resulti;

/*
echo "data1_tab -- <pre>";
print_r($data1_tab);
echo "</pre>";
*/

?>
<div class="popup001"></div>
<form id="structure_basic_form" method="POST">
	<div class="popup000">
		<div class="popup1">
			<div class="popup2_right_top_att">
				<div class="popup1_close"><a onclick="$('.popup000').css('display','none');$('.popup001').css('display','none');">close</a></div>
			</div>
			<div class="popup1_content">
				<div class="popup1_content1">
					<div class="popup1_content1_1">
						<div class="popup1_content1_1_1"><span>Select element</span></div>
						<div class="popup1_s1">
							<table class="list1_1" cellspacing="0">	
								<thead>
									<tr class="list1_1_filter">
										<td colspan="<? echo $_SESSION['num_of_colls']; ?>">
											<div class="list1_1_search1"><span>Search: &nbsp;</span></div>
											<div class="list1_1_search2">
												<span>Name</span>		
												<input class="list1_1_search2_1 filter_tab" type="text" name="filter_bigselect_<? echo $_POST['key1']; ?>" id="filter_bigselect_<? echo $_POST['key1']; ?>" value="<? echo $_SESSION['filter_bigselect'][$_POST['key1']] ?>" />
											</div>	
											<div class="list1_1_search2">
												<a class="list1_1_search2_filter" onclick="filter1_bigselect('<? echo $_POST['key1']; ?>');">	
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
										</td>
									</tr>	
									<tr class="list1_1_sort">
										<td><a href="#"><span>Name</span></a></td>
									</tr>
								</thead> 
								<tbody id="sortable" class="structure_table1">
									<? if ($data1_tab != '') { ?>
										<? foreach ($data1_tab as $id => $val) { ?>
											<?	if (is_int($data1_tab[$id][i]/2)) { ?>
												<tr class="elemstr structure_table1_tr1" id="elemstr_<? echo  $id; ?>" class="ui-state-default">
											<? } else { ?>
												<tr class="elemstr" id="elemstr_<? echo  $id; ?>" class="ui-state-default">				
											<? } ?>
												<td class="bigselect">
													<a onclick="search_for_bigselect_element_select('<? echo $id; ?>','<? echo $_POST['key1']; ?>','<? echo $val; ?>','<? echo $_POST['type1']; ?>');">
														<span><? echo $val; ?></span>
													</a>
												</td>
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
										<? if ($pag1 > 1) { ?>
											<div class="list1_1_footer_2">
												<ul>
													<? for ($i=1;$i<=$pag1;$i++) { ?>
														<?
														$page_selected=$_SESSION['pagination_bigselect']+1;
														?>						
														<? if ($page_selected >= ($i-5) AND $page_selected <= ($i+5)) { ?>							
															<? if ($i == ($_SESSION['pagination_bigselect']+1)) { ?>
																<li><a class="list1_1_footer_2_ul_li_a_hover" onclick="change_pagination_bigselect('<? echo $i; ?>','<? echo $_POST['key1']; ?>');"><span><? echo $i; ?></span></a></li>
															<? } else { ?>
																<li><a onclick="change_pagination_bigselect('<? echo $i; ?>','<? echo $_POST['key1']; ?>');"><span><? echo $i; ?></span></a></li>
															<? } ?>
														<? } ?>
													<? } ?>
												</ul>
											</div>
										<? } ?>
									</td>
								</tr>
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