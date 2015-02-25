<?php

session_start();

include_once('../../config/mysql.php');

//get picture details
$query = "SELECT * FROM pages_pictures_texts WHERE pages_pictureid='".$_POST['picture_id']."' AND langid=1";
$result = @mysql_query ($query);	
while ($row = mysql_fetch_array ($result, MYSQL_ASSOC)) {
	$description=$row['description'];
}
	
?>
<div class="popup01"></div>
<div class="popup">
	<div class="popup1">
		<div class="popup2_right_top_att">
			<div class="popup1_close"><a onclick="$('.popup').css('display','none');$('.popup01').css('display','none');">close</a></div>
		</div>
		<div class="popup1_content">
			<div class="popup1_content1">
				<div class="popup1_content1_1">
					<div class="popup1_content1_1_1"><span>Image description:</span></div>
					<div class="popup1_content1_1_2">
						<textarea id="image_desc1" class="popup1_content_input1" name="description"><? echo $description; ?></textarea>
					</div>
					<div class="popup1_content1_1_3"><input onclick="save_image_changes(<? echo $_POST['picture_id']; ?>);" type="button" name="save_changes" value="save changes" /></div>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>