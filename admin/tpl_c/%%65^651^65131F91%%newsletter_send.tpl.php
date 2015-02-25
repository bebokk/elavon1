<?php /* Smarty version 2.6.18, created on 2015-01-04 12:31:33
         compiled from newsletter_send.tpl */ ?>
<?php if ($this->_tpl_vars['confirm'] != ''): ?>
	<div class="ok_info1"><div class="ok_info11"><span><?php echo $this->_tpl_vars['confirm']; ?>
</span></div></div>
<?php endif; ?>
<div class="stats_main"> 
	<div class="stats_main1"> 
		<div class="structure_basic0"> 
			<div class="header1">
				<span>Send email by newsletter</span>
			</div>
			<div class="list1">	
				<form action="index.php?page=<?php echo $this->_tpl_vars['page']; ?>
&subpage=<?php echo $this->_tpl_vars['subpage']; ?>
&id1=<?php echo $this->_tpl_vars['id1']; ?>
&details=<?php echo $this->_tpl_vars['details']; ?>
" method="POST">
					<table class="list1_1" cellspacing="0">	
						<tbody class="structure_table1">
							<tr>
								<td>		
									<span>Send to</span>
									<select name="send_to">
										<?php $_from = $this->_tpl_vars['products_tab']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['val']):
?>									
											<option value="<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['val']; ?>
</option>
										<?php endforeach; endif; unset($_from); ?>
									</select>
									<br>
									<span>Next action</span>
									<select name="next_action">
										<?php $_from = $this->_tpl_vars['tickets_states_tab']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['val']):
?>									
											<option value="<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['val']; ?>
</option>
										<?php endforeach; endif; unset($_from); ?>
									</select>
									<br>
									<span>Next action date</span>
									<input type="text" name="next_action_date" value="" />
									<br>
									<span>Title</span>
									<input type="text" class="input_look1" name="title" value="<?php echo $this->_tpl_vars['title']; ?>
" />				
									<br>
									<span>Content</span><br>
									<textarea class="input_look1 tinymce" name="content"><?php echo $this->_tpl_vars['content']; ?>
</textarea>
									<input class="button_look1" type="submit" name="send_test_email" value="Send test email" />
									<input class="button_look1" type="submit" name="send_emails" value="send emails" />
								</td>
							</tr>
						</tbody>
					</table>	
				</form>	
			</div>
		</div>
	</div> 
</div> 