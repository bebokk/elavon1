<?php

session_start();

include_once('../../config/mysql.php');

//get translation
require_once('../../config/trans/'.$_SESSION['lang1'].'.php');

//get picture details
$query = "SELECT * FROM structure_basic_attachments WHERE structure_basic_attachmentid 	='".$_POST['element_id']."'";
$result = @mysql_query ($query);
$data1_tab='';
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	foreach ($row as $key => $value) {		
		$data1_tab[$key]=$value;
	}
}
	
?>

<div class="popup001"></div>
<form id="structure_basic_form" method="POST">
	<div class="popup000">
		<div class="popup1">
			<div class="popup2_right_top_att">
				<div class="popup1_close"><a onclick="$('.popup000').css('display','none');$('.popup001').css('display','none');"><? echo $trans_tab[2][16]; ?></a></div>
			</div>
			<div class="popup1_content">
				<div class="popup1_content1">
					<div class="popup1_content1_1">
						<div class="popup1_content1_1_1"><span><? echo $trans_tab[2][25]; ?></span></div>
						<div class="popup1_s1">
							<table>
								<tr>
									<td colspan="2">
										<? echo $trans_tab[2][23]; ?>: <br />
										<textarea id="description" class="popup1_content_input1 save_par" style="height:400px !important;" type="text" name="description"><? echo $data1_tab['description']; ?></textarea>
									</td>
								</tr>
							</table>
						</div>						
						<div class="popup1_content1_1_3">
							<a onclick="save_attachment_changes(<? echo $_POST['element_id']; ?>,<? echo $_POST['element_id1']; ?>);" class="popup1_content1_1_3_1">	
								<div class="popup1_content1_1_3_1_1">	
									<div class="button4">
										<div class="button4_1">
											<div class="button4_2">
												<div class="button4_3">
													<div class="button1_3_fog"></div>
													<span><? echo $trans_tab[2][18]; ?></span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</a>
							<input class="hidden_submit1" onclick="save_attachment_changes(<? echo $_POST['element_id']; ?>,<? echo $_POST['element_id1']; ?>);" type="submit" name="save_changes" value="<? echo $trans_tab[2][18]; ?>" />
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