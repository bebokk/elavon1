<?php

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

//get infrom about from and to
$query = "SELECT userid,name FROM users WHERE userid='".$data1_tab['fromuserid']."'";
$result = @mysql_query ($query);	
$fromuser_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	foreach ($row as $key => $value) {		
		$fromuser_tab[$key]=$value;
	}
}
$query = "SELECT userid,name FROM users WHERE userid='".$data1_tab['touserid']."'";
$result = @mysql_query ($query);	
$touser_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	foreach ($row as $key => $value) {		
		$touser_tab[$key]=$value;
	}
}
	
?>
<div class="popup01"></div>
<form id="structure_basic_form">
	<input type="hidden" id="geolocation" name="geolocation" value="<? echo $_SESSION['page_settings_tab']['geolocation']; ?>" />
	<div class="popup">
		<div class="popup1">
			<div class="popup2_right_top_att">
				<div class="popup1_close"><a onclick="$('.popup').css('display','none');$('.popup01').css('display','none');">close</a></div>
			</div>
			<div class="popup1_content">
				<div class="popup1_content1">
					<div class="popup1_content1_1">
						<div class="popup1_content1_1_1"><span>New message</span></div>
						<div class="popup1_s1">
							<table>												
								<? $i=0; ?>
								<? foreach ($elements_details1_tab['name'] as $key => $value) { ?>
									<? $i++; if ($i == 1) $class1='focus_here'; else $class1=''; ?>
									<? if ($key == 'fromuserid') { ?>
										<tr>
											<td style="width:15%;">From</td>
											<td style="width:85%;" class="tleft">													
												<input id="<? echo $key; ?>" class="popup1_content_input1 save_par <? echo $class1; ?>" type="hidden" name="<? echo $key; ?>" value="<? echo $touser_tab['userid']; ?>" />
												<? echo $touser_tab['name']; ?>
											</td>
										</tr>
									<? } elseif ($key == 'touserid') { ?>
										<tr>
											<td style="width:15%;">To</td>
											<td style="width:85%;" class="tleft">													
												<input id="<? echo $key; ?>" class="popup1_content_input1 save_par <? echo $class1; ?>" type="hidden" name="<? echo $key; ?>" value="<? echo $fromuser_tab['userid']; ?>" />
												<? echo $fromuser_tab['name']; ?>
											</td>
										</tr>
									<? } elseif ($key == 'description') { ?>
										<tr>
											<td style="width:15%;">Text</td>
											<td style="width:85%;" class="tleft">
												<textarea id="<? echo $key; ?>" class="popup1_content_input1 save_par <? echo $class1; ?> tinymce" type="text" name="<? echo $key; ?>"></textarea>
											</td>
										</tr>
									<? } ?>
								<? } ?>
							</table>
						</div>				
						<div class="popup1_content1_1_3">
							<a onclick="save_add_element(<? echo $_POST['element_id']; ?>);" class="popup1_content1_1_3_1">	
								<div class="popup1_content1_1_3_1_1">	
									<div class="button2">
										<div class="button2_1">
											<div class="button2_2">
												<div class="button2_3">
													<div class="button1_3_fog"></div>
													<span>send answer</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</a>			
							<input class="hidden_submit1" onclick="save_add_element(<? echo $_POST['element_id']; ?>);" type="submit" name="add_element" value="send message" /></div>
						</div>								
						<div class="popup1_s1">
							<div class="popup1_s1_header1">
								Message
							</div>		
							<table>												
								<? $i=0; ?>
								<? foreach ($elements_details1_tab['name'] as $key => $value) { ?>
									<? $i++; if ($i == 1) $class1='focus_here'; else $class1=''; ?>
									<? if ($key == 'fromuserid') { ?>
										<tr>
											<td style="width:15%;">From</td>
											<td style="width:85%;" class="tleft">													
												<? echo $fromuser_tab['name']; ?>
											</td>
										</tr>
									<? } elseif ($key == 'touserid') { ?>
										<tr>
											<td style="width:15%;">To</td>
											<td style="width:85%;" class="tleft">													
												<? echo $touser_tab['name']; ?>
											</td>
										</tr>
									<? } elseif ($key == 'description') { ?>
										<tr>
											<td style="width:15%;">Text</td>
											<td style="width:85%;" class="tleft">
												<? echo $data1_tab['description']; ?>
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