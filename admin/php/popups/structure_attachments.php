<?php

session_start();

include_once('../../config/mysql.php');
include_once('../../functions.php');

//get translation
require_once('../../config/trans/'.$_SESSION['lang1'].'.php');

$_SESSION['element_id']=$_POST['element_id'];

//get attachment details
$query = "SELECT * FROM ".$_SESSION['table_name']." WHERE ".$_SESSION['table_key']."='".$_POST['element_id']."'";
$result = @mysql_query ($query);	
$data1_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	foreach ($row as $key => $value) {		
		$data1_tab[$key]=$value;
	}
}
$elements_details1_tab=$_SESSION['elements_details1_tab'];

$query = "SELECT * FROM structure_basic_attachments WHERE table_name='".$_SESSION['table_name']."' AND tableid='".$_POST['element_id']."'";		
$result = @mysql_query ($query);		
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	foreach ($row as $key => $value) {
		$structure_basic_attachments_tab[$row['structure_basic_attachmentid']][$key]=$value;
	}
}

//include gallery
$query = "SELECT * FROM structure_basic_attachments WHERE table_name='".$_SESSION['table_name']."' AND
tableid='".$_SESSION['element_id']."' ORDER BY position ASC, createtime DESC";
$result = @mysql_query ($query);
//echo "query -- $query -- $result <br>";

$i=0;
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

	$i++;
	foreach ($row as $key => $value) {
		$attachments_tab[$row['structure_basic_attachmentid']][$key]=$value;
	}
	$attachments_tab[$row['structure_basic_attachmentid']]['i']=$i;	
	$filesize1=filesize('../../files/attachments/basic/'.$row['name'].'.'.$row['extension']);
	//set in KB
	$filesize1=number_format(($filesize1/1024), 2, ',', ' ').'&nbsp;KB';
	$attachments_tab[$row['structure_basic_attachmentid']]['filesize']=$filesize1;
}

/*
echo "attachments_tab -- <pre>";
print_r($attachments_tab);
echo "</pre>";
*/

?>

<div class="popup01"></div>
<form id="structure_basic_form" name="structure_basic_form" method="POST" enctype="multipart/form-data">
	<input type="hidden" value="10100100" name="MAX_FILE_SIZE">
	<div class="popup">
		<div class="popup1">
			<div class="popup2_right_top_att">
				<div class="popup1_close"><a onclick="$('.popup').css('display','none');$('.popup01').css('display','none');"><? echo $trans_tab[2][16]; ?></a></div>
			</div>			
			<div class="popup1_content">
				<div class="popup1_content1">
					<div class="popup1_content1_1">
						<div class="popup1_content1_1_1"><span><? echo $trans_tab[2][20]; ?></span></div>
						<div class="popup1_s1">
							<div class="details1">
								<div class="attachments_add">
									<div class="attachments_add1">
										<? echo $trans_tab[2][21]; ?> <input type="file" min="1" max="20" multiple name="new_attachments_tab[]" onchange="upload_attachment(<? echo $_POST['element_id']; ?>);">
									</div>
								</div>
								<div class="attachments">
									<table class="list1_1" cellspacing="0">	
										<tbody class="structure_table1">
											<tr class="list1_1_sort">
												<td style="width:200px"><a href="#"><span><? echo $trans_tab[2][22]; ?></span></a></td>
												<td><a href="#"><span><? echo $trans_tab[2][23]; ?></span></a></td>
												<td style="width:50px"><a href="#"><span><? echo $trans_tab[2][24]; ?></span></a></td>
												<td style="width:30px;" class="tcenter"><a href="#"><span><? echo $trans_tab[2][9]; ?></span></a></td>
												<td style="width:30px;" class="tcenter"><a href="#"><span><? echo $trans_tab[2][10]; ?></span></a></td>
											</tr>
										</tbody>
										<tbody id="structure_basic_sortable" class="structure_table1">
											<? if ($attachments_tab != '') {
												foreach ($attachments_tab as $id => $val) { ?> 
													<tr class="elemstr"id="pic1_<? echo $id; ?>">	
														<td><a target="_blank" href="./files/attachments/basic/<? echo $attachments_tab[$id]['name']; ?>.<? echo $attachments_tab[$id]['extension']; ?>"><span><? echo $attachments_tab[$id]['name']; ?>.<? echo $attachments_tab[$id]['extension']; ?></span></a></td>	
														<td><a target="_blank" href="./files/attachments/basic/<? echo $attachments_tab[$id]['name']; ?>.<? echo $attachments_tab[$id]['extension']; ?>"><span><? echo $attachments_tab[$id]['description']; ?></span></a></td>	
														<td><a target="_blank" href="./files/attachments/basic/<? echo $attachments_tab[$id]['name']; ?>.<? echo $attachments_tab[$id]['extension']; ?>"><span><? echo $attachments_tab[$id]['filesize']; ?></span></a></td>	
														<td class="tcenter list1_1_1" style="width:30px;"><a onclick="edit_attachment(<? echo $id; ?>,<? echo $_POST['element_id']; ?>);" class="edit_iko"><span>&nbsp;</span></a></td>
														<? if ($_SESSION['page_settings_tab']['deleting'] != 0) { ?>	
															<td class="tcenter list1_1_1" style="width:30px;"><a onclick="delete_attachment(<? echo $id; ?>);" class="delete_iko"><span>&nbsp;</span></a></td>
														<? } ?> 
													</tr>
												<? } ?> 
											<? } else { ?>
												<tr><td colspan="<? echo $_SESSION['num_of_colls']; ?>"><span class="no_results_found"><? echo $trans_tab[2][11]; ?></span></td></tr>
											<? } ?>
										</tbody>
									</table>			
								</div>
								<div class="attachments_space"></div>	
							</div>				
						</div>	
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>

<script type="text/javascript" src="js/jquery.lightbox-0.5.pack.js"></script>	
<script type="text/javascript" src="js/structure_basic_attachments.js"></script>	
<style type="text/css" media="screen">
	@import url("css/lightbox.css");
</style>

<script language="javascript"> 		
	
	$("#structure_basic_form").submit(function(e) {	e.preventDefault(); }); 
	
	$( "#structure_basic_sortable" ).sortable({
		update: function(event, ui) {
			save_positions();
		}
	});
	$( "#structure_basic_sortable" ).disableSelection();
	
	$('.attachment_show a').lightBox({fixedNavigation:true});
</script>

<?












































mysql_close($dbc);

?>