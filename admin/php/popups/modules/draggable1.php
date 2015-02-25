<?php

session_start();

include_once('../../../config/mysql.php');

//get info about main table
$query = "SELECT * FROM ".$_SESSION['table_name']." WHERE ".$_SESSION['table_key']."='".$_POST['element_id']."'";
$result = @mysql_query ($query);	
$data3_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	foreach ($row as $key => $value) {		
		$data3_tab[$key]=$value;
	}
}

//get elements
$query = "SELECT * FROM ".$_SESSION['attached_modules_settings_tab']['draggable1']['tabname'];
$result = @mysql_query ($query);	
$data1_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	foreach ($row as $key => $value) {		
		$data1_tab[$row[$_SESSION['attached_modules_settings_tab']['draggable1']['tabid']]][$key]=$value;
	}
}

//get element connection
$query = "SELECT * FROM ".$_SESSION['attached_modules_settings_tab']['draggable1']['tabconname']." 
WHERE ".$_SESSION['attached_modules_settings_tab']['draggable1']['tabconid']."='".$_POST['element_id']."'";
$result = @mysql_query ($query);	
$connected_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {	
	foreach ($row as $key => $value) {		
		$connected_tab[$row['productid']]=$row['productid'];
	}
}

?>
<div class="popup01"></div>
<form id="structure_basic_form">
	<div class="popup">
		<div class="popup1">
			<div class="popup2_right_top_att">
				<div class="popup1_close"><a onclick="$('.popup').css('display','none');$('.popup01').css('display','none');">close</a></div>
			</div>
			<div class="popup1_content">
				<div class="popup1_content1">
					<div class="popup1_content1_1">
						<div class="popup1_content1_1_1">
							<p>
								Edit <? echo $_SESSION['attached_modules_settings_tab']['draggable1']['dispname1']; ?> 
								for group <span><? echo $data3_tab['name']; ?></span>
							</p>
						</div>
						<div class="popup1_content1_1_3">
							<div class="draggable0" id="gallery">
								<div class="draggable01">
									<div class="draggable0111">
										<div class="draggable_header">	
											<span>Products list</span>
										</div>
										<div class="draggable011">
											<div class="draggable1">
												<? foreach ($data1_tab as $key => $value) { ?>		
													<? if ($connected_tab[$key] == '') { ?>											
														<div class="draggable1_1">
															<a class="ico_right" onclick="draggable1_right('<? echo $_POST['element_id']; ?>','<? echo $key; ?>');" href="#"><span><? echo $data1_tab[$key][$_SESSION['attached_modules_settings_tab']['draggable1']['dispname2']]; ?></span></a>
														</div>
													<? } ?>
												<? } ?>
											</div>
										</div>
										<div class="clear"></div>
									</div>
								</div>
								<div class="draggable01">
									<div class="draggable0111">
										<div class="draggable_header">	
											<span>Connected with element</span> 
										</div>
										<div class="draggable011">
											<div class="draggable1">
												<? foreach ($data1_tab as $key => $value) { ?>
													<? if ($connected_tab[$key] != '') { ?>
														<div class="draggable1_1">
															<a class="ico_left" onclick="draggable1_left('<? echo $_POST['element_id']; ?>','<? echo $key; ?>');" href="#"><span><? echo $data1_tab[$key][$_SESSION['attached_modules_settings_tab']['draggable1']['dispname2']]; ?></span></a>
														</div>
													<? } ?>
												<? } ?>
											</div>
										</div>
										<div class="clear"></div>
									</div>
								</div>
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
<script language="javascript"> 
	
</script>
<?











































?>