<?php /* Smarty version 2.6.18, created on 2014-02-05 08:33:17
         compiled from structure_details.tpl */ ?>
<?php if ($this->_tpl_vars['ok_info1'] != ''): ?>
	<div class="ok_info1"><div class="ok_info11"><span><?php echo $this->_tpl_vars['ok_info1']; ?>
</span></div></div>
<?php endif; ?>
<div class="back">
	<a href="index.php?page=<?php echo $this->_tpl_vars['page']; ?>
&subpage=<?php echo $this->_tpl_vars['subpage']; ?>
&id1=<?php echo $this->_tpl_vars['id1']; ?>
">
		<input type="button" class="button_look1" value="<?php echo $this->_tpl_vars['trans_tab']['1']['9']; ?>
" />
	</a>
</div>
<div class="structure1">
	<form action="index.php?page=<?php echo $this->_tpl_vars['page']; ?>
&subpage=<?php echo $this->_tpl_vars['subpage']; ?>
&id1=<?php echo $this->_tpl_vars['id1']; ?>
&details=<?php echo $this->_tpl_vars['details']; ?>
" method="POST">
		<div class="header1"><span><?php echo $this->_tpl_vars['trans_tab']['1']['10']; ?>
 <?php echo $this->_tpl_vars['page_tab']['name']; ?>
</span></div>
		<div class="details1">
			<table class="list1_1" cellspacing="0">
				<tbody>
					<?php $_from = $this->_tpl_vars['fields_in_use_tab1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['val']):
?>		
						<?php if ($this->_tpl_vars['val'] == 'text'): ?> 
							<tr>
								<td>
									<div class="details1_header"><?php echo $this->_tpl_vars['fields_in_use_tab2'][$this->_tpl_vars['id']]; ?>
</div>
									<input class="input_look1" type="text" name="<?php echo $this->_tpl_vars['id']; ?>
" value="<?php echo $this->_tpl_vars['page_tab'][$this->_tpl_vars['id']]; ?>
" />
								</td>
							</tr>
						<?php elseif ($this->_tpl_vars['val'] == 'textarea'): ?> 
							<tr>
								<td>
									<div class="details1_header"><?php echo $this->_tpl_vars['fields_in_use_tab2'][$this->_tpl_vars['id']]; ?>
</div>
									<textarea class="input_look1 tinymce" name="<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['page_tab'][$this->_tpl_vars['id']]; ?>
</textarea>
								</td>
							</tr>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
				</tbody>  
			</table>
		</div>
		<div class="save">
			<input class="button_look1" type="submit" name="save_details" value="<?php echo $this->_tpl_vars['trans_tab']['1']['15']; ?>
" />
		</div>
	</form>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "elements/pictures.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
</div>
 