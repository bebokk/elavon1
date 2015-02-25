<?php /* Smarty version 2.6.18, created on 2014-10-26 14:58:20
         compiled from elements/communication.tpl */ ?>
<div class="structure_basic0"> 
	<div class="header1">
		<span><?php echo $this->_tpl_vars['view_name1']; ?>
</span>
		<div class="popup2_right_top">
			<?php if ($this->_tpl_vars['session']['page_settings_tab']['adding'] == 1): ?>
				<a class="header1_add" onclick="element_add(<?php echo $this->_tpl_vars['id']; ?>
);">	
					<div class="button2">
						<div class="button2_1">
							<div class="button2_2">
								<div class="button2_3">
									<div class="button1_3_fog"></div>
									<span>create message</span>
								</div>
							</div>
						</div>
					</div>
				</a>
			<?php endif; ?>
		</div>
	</div>
	<div class="list1" id="communication_list">	
	</div>
</div>
<input type="hidden" name="elements_list1_name" id="elements_list1_name" value="<?php echo $this->_tpl_vars['elements_list1_name']; ?>
" />
<input type="hidden" name="elements_list1_type" id="elements_list1_type" value="<?php echo $this->_tpl_vars['elements_list1_type']; ?>
" />