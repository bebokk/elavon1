<?php /* Smarty version 2.6.18, created on 2014-04-25 08:16:52
         compiled from structure.tpl */ ?>
<?php if ($this->_tpl_vars['details'] != ''): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "structure_details.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
<?php else: ?>
	<div class="structure0">
		<div class="structure0_1">
			<div class="header1"><a href="index.php?page=<?php echo $this->_tpl_vars['page']; ?>
&subpage=<?php echo $this->_tpl_vars['subpage']; ?>
&id1=<?php echo $this->_tpl_vars['id1']; ?>
"><span><?php echo $this->_tpl_vars['trans_tab']['1']['1']; ?>
</span></a></div>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "structure_menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
		</div>
		<div class="structure0_2">
			<div class="structure0_2_1">
				<div class="header1"><span><?php echo $this->_tpl_vars['trans_tab']['1']['2']; ?>
</span></div>
				<div class="details1 structure_table1">			
					<form action="index.php?page=<?php echo $this->_tpl_vars['page']; ?>
&subpage=<?php echo $this->_tpl_vars['subpage']; ?>
&id1=<?php echo $this->_tpl_vars['id1']; ?>
" method="POST">
						<span class="text10_1">&nbsp;<?php echo $this->_tpl_vars['trans_tab']['1']['3']; ?>
</span>
						<input class="input10_1" type="text" name="name" value="" />
						<input class="submit10_1" type="submit" name="add_element1" value="<?php echo $this->_tpl_vars['trans_tab']['1']['4']; ?>
" />
					</form>
				</div> 
			</div>
			<div class="structure0_2_2">
				<div class="header1"><span><?php echo $this->_tpl_vars['trans_tab']['1']['14']; ?>
</span></div>
				<div class="list1">
					<table class="list1_1" cellspacing="0">
						<thead>
							<tr class="list1_1_sort">
								<td style="width:30px;" class="tcenter"><a href=""><span>&nbsp;</span></a></td>
								<td style="width:30px;" class="tcenter"><a href=""><span><?php echo $this->_tpl_vars['trans_tab']['1']['5']; ?>
</span></a></td>
								<td class="tcenter"><a href=""><span><?php echo $this->_tpl_vars['trans_tab']['1']['6']; ?>
</span></a></td>
								<td style="width:30px;" class="tcenter"><a href=""><span><?php echo $this->_tpl_vars['trans_tab']['1']['7']; ?>
</span></a></td>
								<td style="width:30px;" class="tcenter"><a href=""><span><?php echo $this->_tpl_vars['trans_tab']['1']['8']; ?>
</span></a></td>
							</tr>
						</thead>						
						<input type="hidden" id="parent_id" name="parent_id" value="<?php echo $this->_tpl_vars['id1']; ?>
" />
						<tbody id="sortable" class="structure_table1">
							<?php  $i=0;  ?>
							<?php $_from = $this->_tpl_vars['pages_tab']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['val']):
?>		
								<?php  $i++;  ?>
								<tr class="elemstr" id="elemstr_<?php echo $this->_tpl_vars['id']; ?>
" class="ui-state-default">
									<td class="tright list1_1_1 list1_1_10"><a href="index.php?page=<?php echo $this->_tpl_vars['page']; ?>
&id1=<?php echo $this->_tpl_vars['id1']; ?>
&details=<?php echo $this->_tpl_vars['id']; ?>
"><?php  echo $i;  ?>.</a></td>
									<td class="tcenter list1_1_1"><a href="index.php?page=<?php echo $this->_tpl_vars['page']; ?>
&id1=<?php echo $this->_tpl_vars['id1']; ?>
&details=<?php echo $this->_tpl_vars['id']; ?>
"><img src="images/ico/arrow-move.png" /></a></td>
									<td class="tleft list1_1_1"><a href="index.php?page=<?php echo $this->_tpl_vars['page']; ?>
&id1=<?php echo $this->_tpl_vars['id1']; ?>
&details=<?php echo $this->_tpl_vars['id']; ?>
"><span><?php echo $this->_tpl_vars['pages_tab'][$this->_tpl_vars['id']]['name']; ?>
</span></a></td>
									<td class="tcenter list1_1_1"><a href="index.php?page=<?php echo $this->_tpl_vars['page']; ?>
&id1=<?php echo $this->_tpl_vars['id1']; ?>
&details=<?php echo $this->_tpl_vars['id']; ?>
"><img src="images/ico/pencil.png" /></a></td>
									<td class="tcenter list1_1_1"><a href="index.php?page=<?php echo $this->_tpl_vars['page']; ?>
&id1=<?php echo $this->_tpl_vars['id1']; ?>
&delete=<?php echo $this->_tpl_vars['id']; ?>
"><img src="images/ico/cross.png" /></a></td>
								</tr>
							<?php endforeach; endif; unset($_from); ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>