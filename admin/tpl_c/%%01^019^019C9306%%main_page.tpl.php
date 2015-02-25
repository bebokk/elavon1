<?php /* Smarty version 2.6.18, created on 2014-03-25 07:51:33
         compiled from main_page.tpl */ ?>
<div class="project_manager0">
	<div class="project_manager01">
		<a onclick="save_positions();">save changes</a>
	</div>
</div>
<div class="project_manager">
	<div class="project_manager1">
		<div class="project_manager111">
			<div class="project_manager10">
				<div class="project_manager1_1">
					<div class="project_manager1_1_1">
						DISABLED
					</div> 
				</div> 
			</div>
			<div class="project_manager11">
				<div class="project_manager19">
					<div class="project_manager110_1">
						<div class="project_manager11_1">
							<div class="project_manager11_1_100">
								Not in use
							</div> 
						</div> 
					</div> 		
					<div class="project_manager110_2">
						<ul id="sortable1" class="connectedSortable" style="margin-left: 5px;margin-top: 3px;">
							<?php $_from = $this->_tpl_vars['elements0_tab']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['val']):
?>
								<li id="<?php echo $this->_tpl_vars['elements0_tab']['0'][$this->_tpl_vars['id']]['elementtable']; ?>
_<?php echo $this->_tpl_vars['id']; ?>
" class="project_manager11_1_1"><?php echo $this->_tpl_vars['elements0_tab']['0'][$this->_tpl_vars['id']]['name']; ?>
</li>	
							<?php endforeach; endif; unset($_from); ?>	
						</ul>
					</div>
					<div class="clear"></div>
				</div>
			</div>		
			<div class="clear"></div>
		</div>
	</div>
	<div class="project_manager2">
		<div class="project_manager222">
			<div class="project_manager10">
				<div class="project_manager1_1">
					<div class="project_manager1_1_1">
						ENABLED
					</div> 
				</div> 
			</div>
			<div class="project_manager100">
				<div class="project_manager11">
					<div class="project_manager19">
						<div class="project_manager110_1">
							<div class="project_manager11_1">
								<div class="project_manager11_1_100">
									Left
								</div> 
							</div> 
						</div> 
						<div class="project_manager110_2">
							<ul id="sortable2" class="connectedSortable" style="margin-left: 5px;margin-top: 3px;">
								<?php $_from = $this->_tpl_vars['elements0_tab']['1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['val']):
?>
									<li id="<?php echo $this->_tpl_vars['elements0_tab']['1'][$this->_tpl_vars['id']]['elementtable']; ?>
_<?php echo $this->_tpl_vars['id']; ?>
" class="project_manager11_1_1"><?php echo $this->_tpl_vars['elements0_tab']['1'][$this->_tpl_vars['id']]['name']; ?>
</li>	
								<?php endforeach; endif; unset($_from); ?>	
							</ul>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<div class="project_manager11">
					<div class="project_manager19">
						<div class="project_manager110_1">
							<div class="project_manager11_1">
								<div class="project_manager11_1_100">
									Right
								</div> 
							</div> 
						</div> 
						<div class="project_manager110_2">
							<ul id="sortable3" class="connectedSortable" style="margin-left: 5px;margin-top: 3px;">
								<?php $_from = $this->_tpl_vars['elements0_tab']['2']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['val']):
?>
									<li id="<?php echo $this->_tpl_vars['elements0_tab']['2'][$this->_tpl_vars['id']]['elementtable']; ?>
_<?php echo $this->_tpl_vars['id']; ?>
" class="project_manager11_1_1"><?php echo $this->_tpl_vars['elements0_tab']['2'][$this->_tpl_vars['id']]['name']; ?>
</li>
								<?php endforeach; endif; unset($_from); ?>	
							</ul>
						</div> 
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>