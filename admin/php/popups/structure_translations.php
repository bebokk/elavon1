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

//get possbile languages
$query = "SELECT * FROM langs ORDER BY position ASC";
$result = @mysql_query ($query);	
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	foreach ($row as $key => $value) {
		$langs_tab[$row['langid']][$key]=$value;
	}
	
	foreach ($elements_details1_tab['translations'] as $key1 => $value1) {
		
		$query1 = "SELECT * FROM structure_basic_texts WHERE langid='".$row['langid']."'
		AND table_name='".$_SESSION['table_name']."' AND table_col='".$key1."'
		AND tableid='".$_POST['element_id']."'";		
		$result1 = @mysql_query ($query1);		
		while ($row1 = mysql_fetch_array ($result1, MYSQL_ASSOC)) {
			$structure_basic_texts_tab[$key1][$row['langid']]=$row1['value'];
		}
	}
}

?>
<div class="popup01"></div>
<form id="structure_basic_form" method="POST">
	<div class="popup">
		<div class="popup1">
			<div class="popup2_right_top_att">
				<div class="popup1_close"><a onclick="$('.popup').css('display','none');$('.popup01').css('display','none');">close</a></div>
			</div>		
			<div class="popup1_content">
				<div class="popup1_content1">
					<div class="popup1_content1_1">
						<div class="popup1_content1_1_1"><span>Translate element</span></div>
						<div class="popup1_s1">
							<table>
								<? $i=0; ?>
								<? foreach ($elements_details1_tab['translations'] as $key => $value) { ?>
									<? $i++; if ($i == 1) $class1='focus_here'; else $class1=''; ?>
									<? if ($elements_details1_tab['type'][$key] == 'text') { ?>
										<? foreach ($langs_tab as $key1 => $value1) { ?>
											<? if ($langs_tab[$key1]['main'] == 1) { ?>
												<tr>
													<td style="width:25%;">
														<? echo $elements_details1_tab['name'][$key]; ?>
														(<? echo $langs_tab[$key1]['name']; ?>)
													</td>
													<td class="tleft" style="width:75%;"><? echo $data1_tab[$key]; ?></td>
												</tr>
											<? } else { ?>
												<tr>
													<td style="width:25%;">
														<? echo $elements_details1_tab['name'][$key]; ?>
														(<? echo $langs_tab[$key1]['name']; ?>)
													</td>
													<td style="width:75%;">
														<input id="<? echo $key; ?>_<? echo $key1; ?>" class="popup1_content_input1 save_par <? echo $class1; ?>" type="text" name="<? echo $key; ?>_<? echo $key1; ?>" value="<? echo $structure_basic_texts_tab[$key][$key1]; ?>" />
													</td>
												</tr>
											<? } ?>
										<? } ?>
									<? } elseif ($elements_details1_tab['type'][$key] == 'wysywig') { ?>
										<? $i=0; ?>
										<? foreach ($langs_tab as $key1 => $value1) { ?>
											<? $i++; ?>
											<? if ($langs_tab[$key1]['main'] == 1) { ?>
												<tr>
													<td colspan="2">
														<? echo $elements_details1_tab['name'][$key]; ?>
														(<? echo $langs_tab[$key1]['name']; ?>) <br />
														<? echo $data1_tab[$key]; ?>
													</td>
												</tr>
											<? } else { ?>
												<tr>
													<td colspan="2">
														<? echo $elements_details1_tab['name'][$key]; ?> 
														(<? echo $langs_tab[$key1]['name']; ?>) <br />
														<script language="javascript">tiny_mce_on0("tinymce<? echo $key1; ?>")</script>
														<textarea id="<? echo $key; ?>_<? echo $key1; ?>" class="popup1_content_input1 save_par <? echo $class1; ?> tinymce<? echo $key1; ?>" type="text" name="<? echo $key; ?>"><? echo $structure_basic_texts_tab[$key][$key1]; ?></textarea>
													</td>
												</tr>
											<? } ?>
										<? } ?>
									<? } ?>
								<? } ?>
							</table>
						</div>						
						<div class="popup1_content1_1_3">
							<a onclick="save_element_translations(<? echo $_POST['element_id']; ?>);" class="popup1_content1_1_3_1">	
								<div class="popup1_content1_1_3_1_1">	
									<div class="button4">
										<div class="button4_1">
											<div class="button4_2">
												<div class="button4_3">
													<div class="button1_3_fog"></div>
													<span>save translations</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</a>
							<input class="hidden_submit1" onclick="save_element_translations(<? echo $_POST['element_id']; ?>);" type="submit" name="save_changes" value="save changes" />
						</div>	
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