<?php /* Smarty version 2.6.18, created on 2014-03-06 10:55:39
         compiled from elements/pictures.tpl */ ?>
<form action="index.php?page=<?php echo $this->_tpl_vars['page']; ?>
&subpage=<?php echo $this->_tpl_vars['subpage']; ?>
&id1=<?php echo $this->_tpl_vars['id1']; ?>
&details=<?php echo $this->_tpl_vars['details']; ?>
" method="post" enctype="multipart/form-data">
	<input type="hidden" name="MAX_FILE_SIZE" value="10100100">
	<div class="header1"><span><?php echo $this->_tpl_vars['trans_tab']['1']['13']; ?>
</span></div>
	<div class="details1">
		<div class="pictures_add">
			<div class="pictures_add1">
				<?php echo $this->_tpl_vars['trans_tab']['1']['16']; ?>
 <input type="file" min="1" max="20" multiple name="new_pictures_tab[]" onchange="this.form.submit();">
			</div>
		</div>
		<div class="pictures">
			<div class="pictures01">
				<div class="pictures02" id="sortable">
					<input type="hidden" id="sortable111" name="" value="" />
					<input type="hidden" id="details_id" name="details" value="<?php echo $this->_tpl_vars['details']; ?>
" />
					<?php $_from = $this->_tpl_vars['pictures_tab']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['val']):
?>		
						<div class="picture" id="pic_<?php echo $this->_tpl_vars['id']; ?>
" class="ui-state-default">
							<div class="picture0">
								<div class="picture_img" style="background:#FFFFFF url('<?php echo $this->_tpl_vars['pictures_tab'][$this->_tpl_vars['id']]['min1']; ?>
') no-repeat center center;"></div>
								<div class="picture_move">
									<div class="text_cloud1"><span><?php echo $this->_tpl_vars['trans_tab']['1']['17']; ?>
</span></div>
								</div>
								<div class="picture_edit"><a onclick="picture_edit(<?php echo $this->_tpl_vars['id']; ?>
);"></a></div>
								<div class="picture_show">
									<a title="<?php echo $this->_tpl_vars['pictures_tab'][$this->_tpl_vars['id']]['img_description']; ?>
" href="<?php echo $this->_tpl_vars['pictures_tab'][$this->_tpl_vars['id']]['big1']; ?>
"><span></span></a>
								</div>
								<div class="picture_delete"><a onclick="delete_picture(<?php echo $this->_tpl_vars['id']; ?>
);"></a></div>
							</div>
						</div>
					<?php endforeach; endif; unset($_from); ?>		
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>		
</form>