<?php

session_start();

include_once('../../config/mysql.php');
include_once('../../functions.php');

$_SESSION['element_id']=$_POST['element_id1'];

//get picture details
$query = "SELECT * FROM ".$_POST['attachetname']." WHERE ".$_SESSION['table_key']."='".$_POST['element_id']."'";
$result = @mysql_query ($query);	
$data1_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	foreach ($row as $key => $value) {		
		$data1_tab[$key]=$value;
	}
}
$elements_details1_tab=$_SESSION['elements_details1_tab'];

$query = "SELECT * FROM structure_basic_pictures WHERE table_name='".$_POST['attachetname']."' AND tableid='".$_POST['element_id']."'";		
$result = @mysql_query ($query);		
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	foreach ($row as $key => $value) {
		$structure_basic_pictures_tab[$row['structure_basic_pictureid']][$key]=$value;
	}
}

//include gallery
$query = "SELECT * FROM structure_basic_pictures WHERE table_name='".$_POST['attachetname']."' AND
tableid='".$_POST['element_id']."' ORDER BY position ASC, createtime DESC";
$result = @mysql_query ($query);
//echo "query -- $query -- $result <br>";

$i=0;
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {

	$i++;
	foreach ($row as $key => $value) {
		$pictures_tab[$row['group']][$row['structure_basic_pictureid']][$key]=$value;
	}
	$im1=adres_miniatury('../../images/basic/',$row['structure_basic_pictureid'].'.'.$row['extension'],126,126);
	$pictures_tab[$row['group']][$row['structure_basic_pictureid']]['min1']=str_replace('../../','',$im1);
	$pictures_tab[$row['group']][$row['structure_basic_pictureid']]['big1']='images/basic/'.$row['structure_basic_pictureid'].'.'.$row['extension'];
	$pictures_tab[$row['group']][$row['structure_basic_pictureid']]['i']=$i;	
}

$pictures_details_tab=$_SESSION['attachet_page_pictures_details_tab'][$_POST['attachetname']];
$structure_basic_pictures_i=0;
foreach ($pictures_details_tab as $key => $value) {
	$structure_basic_pictures_i++;
}

//put att table detilas to session for img operations
$_SESSION['attachetname1']=$_POST['attachetname'];
$_SESSION['element_id1']=$_POST['element_id1'];
$_SESSION['element_id']=$_POST['element_id'];

?>
<input type="hidden" name="structure_basic_pictures_i" value="<? echo $structure_basic_pictures_i; ?>" id="structure_basic_pictures_i" />
<div class="popup001"></div>
<form id="structure_basic_form" name="structure_basic_form" method="POST" enctype="multipart/form-data">
	<input type="hidden" value="10100100" name="MAX_FILE_SIZE">
	<div class="popup000">
		<div class="popup1">
			<div class="popup2_right_top_att">
				<div class="popup1_close"><a onclick="$('.popup000').css('display','none');$('.popup001').css('display','none');">close</a></div>
			</div>			
			<div class="popup1_content">
				<div class="popup1_content1">
					<div class="popup1_content1_1">
						<div class="popup1_content1_1_1"><span>Images</span></div>
						<div class="popup1_s1">
							<div class="details1">
								<div class="pictures_add">
									<div class="pictures_add1">
										Upload new pictures <input type="file" min="1" max="20" multiple name="new_pictures_tab[]" onchange="upload_picture_att(<? echo $_POST['element_id']; ?>,<? echo $_POST['element_id1']; ?>,'<? echo $_POST['attachetname']; ?>');">
									</div>
								</div>
								<div class="pictures">
									<div class="pictures01">
										<? if ($pictures_details_tab != '') foreach ($pictures_details_tab as $id0 => $val0) { ?>	
											<div class="pictures01_header">
												<span><? echo $val0; ?></span>
											</div>
											<div class="pictures02 connectedSortable" id="structure_basic_sortable_<? echo $id0; ?>">
												<? if ($pictures_tab[$id0] != '') foreach ($pictures_tab[$id0] as $id => $val) { ?> 
													<div class="picture" id="pic1_<? echo $id; ?>" class="ui-state-default">
														<div class="picture0">
															<div class="picture_img" style="background:#FFFFFF url('<? echo $pictures_tab[$id0][$id]['min1']; ?>') no-repeat center center;"></div>
															<div class="picture_move">
																<div class="text_cloud1"><span>Drag&nbsp;and&nbsp;drop&nbsp;to&nbsp;change&nbsp;position</span></div>
															</div>
															<div class="picture_show">
																<a title="picture" href="<? echo $pictures_tab[$id0][$id]['big1']; ?>"><span></span></a>
															</div>
															<div class="picture_delete"><a onclick="delete_picture(<? echo $id; ?>);"></a></div>
														</div>
													</div>
												<? } ?>
												<div class="clear"></div>
											</div>
										<? } else { ?>
											<div class="pictures02" id="structure_basic_sortable_<? echo $id0; ?>">
												<? if ($pictures_tab[$id0] != '') foreach ($pictures_tab[$id0] as $id => $val) { ?> 
													<div class="picture" id="pic1_<? echo $id; ?>" class="ui-state-default">
														<div class="picture0">
															<div class="picture_img" style="background:#FFFFFF url('<? echo $pictures_tab[$id0][$id]['min1']; ?>') no-repeat center center;"></div>
															<div class="picture_move">
																<div class="text_cloud1"><span>Drag&nbsp;and&nbsp;drop&nbsp;to&nbsp;change&nbsp;position</span></div>
															</div>
															<div class="picture_show">
																<a title="picture" href="<? echo $pictures_tab[$id0][$id]['big1']; ?>"><span></span></a>
															</div>
															<div class="picture_delete"><a onclick="delete_picture(<? echo $id; ?>);"></a></div>
														</div>
													</div>
												<? } ?>
												<div class="clear"></div>
											</div>										
										<? } ?>
									</div>
								</div>
								<div class="pictures_space"></div>	
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
<script type="text/javascript" src="js/structure_basic_pictures.js"></script>	
<style type="text/css" media="screen">
	@import url("css/lightbox.css");
</style>

<script language="javascript"> 		
	
	$("#structure_basic_form").submit(function(e) {	e.preventDefault(); }); 
	
	<? if ($pictures_details_tab != '') { ?>	
		
		$( " <? foreach ($pictures_details_tab as $id0 => $val0) { if ($id0 > 1) { ?> , <? } ?> #structure_basic_sortable_<? echo $id0; ?> <? } ?> " ).sortable({
			connectWith: ".connectedSortable",
			update: function(event, ui) {
				save_positions1(event, ui);
			}
		}).disableSelection();
		
	<? } else { ?>	
		$( "#structure_basic_sortable" ).sortable({
			update: function(event, ui) {
				save_positions();
			}
		});
		$( "#structure_basic_sortable" ).disableSelection();
	<? } ?>
	
	$('.picture_show a').lightBox({fixedNavigation:true});
</script>

<?












































mysql_close($dbc);

?>