<form action="index.php?page={$page}&subpage={$subpage}&id1={$id1}&details={$details}" method="post" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="10100100">
	<div class="header1"><span>{$trans_tab.1.13}</span></div>
	<div class="details1">
		<div class="pictures_add">
			<div class="pictures_add1">
				{$trans_tab.1.16} <input type="file" min="1" max="20" multiple name="new_pictures_tab[]" onchange="this.form.submit();">
			</div>
		</div>
		<div class="pictures">
			<div class="pictures01">
				<div class="pictures02" id="sortable">
					<input type="hidden" id="sortable111" name="" value="" />
					<input type="hidden" id="details_id" name="details" value="{$details}" />
					{foreach from=$pictures_tab key=id item=val}		
						<div class="picture" id="pic_{$id}" class="ui-state-default">
							<div class="picture0">
								<div class="picture_img" style="background:#FFFFFF url('{$pictures_tab.$id.min1}') no-repeat center center;"></div>
								<div class="picture_move">
									<div class="text_cloud1"><span>{$trans_tab.1.17}</span></div>
								</div>
								<div class="picture_edit"><a onclick="picture_edit({$id});"></a></div>
								<div class="picture_show">
									<a title="{$pictures_tab.$id.img_description}" href="{$pictures_tab.$id.big1}"><span></span></a>
								</div>
								<div class="picture_delete"><a onclick="delete_picture({$id});"></a></div>
							</div>
						</div>
					{/foreach}		
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>		
</form>