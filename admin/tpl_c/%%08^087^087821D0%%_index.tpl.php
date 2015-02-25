<?php /* Smarty version 2.6.18, created on 2014-04-24 07:16:58
         compiled from _index.tpl */ ?>
<div class="wrapper">
	<div class="loading0"><input type="hidden" name="loading0" id="loading0" value="" /></div>
	<div class="popup0"></div>
	<div class="popup00"></div>
	<div class="body0">
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "popups/save_changes.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
		<div class="layout">
			<div class="header01">
				<div class="header01_2"></div>
				<div class="header01_1" style="background:transparent url('<?php echo $this->_tpl_vars['admin_logo1']; ?>
') no-repeat center center;"><a href="index.php?page=structure&subpage=structure"></a></div>
				<div class="header01_2"></div>
				<div class="header01_3"><a href="index.php?page=structure&subpage=structure"><?php echo $this->_tpl_vars['settings_tab']['46']; ?>
 Admin</a></div>
				<!--
				<div class="header01_2"></div>
				<div class="header01_4"><a href="./"></a></div>
				-->
				<div class="header01_2"></div>
				<div class="header01_right">
					<a class="header01_right0_1">
						<div class="header01_right0_1_1">
							<div class="header01_right0_1_1_1">
								<div class="header01_right0_1_1_1_1" style="background:transparent url('<?php echo $this->_tpl_vars['user_picture']; ?>
') no-repeat center center;">
								</div>	
							</div>	
						</div>	
						<div class="header01_right0_1_2">
							<span class="header01_right0_1_2_1">Hi,&nbsp;<span class="header01_right0_1_2_name"><?php echo $this->_tpl_vars['session']['user']['name']; ?>
</span></span>
						</div>	
						<div class="clear"></div>	
					</a>		
				</div>			
				<!--
				<div class="header01_1">Hi <?php echo $this->_tpl_vars['session']['user']['name']; ?>
 :)</div>	
				-->
			</div>
			<div class="content0">
				<div class="content0_1">
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "elements/top_menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
				</div>
				<div class="content0_2">
					<div class="content0_2_1">
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "elements/sub_menu.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					</div>
					<div class="content0_2_2">
						<div class="content0_2_2_1">
							<?php if ($this->_tpl_vars['subpage'] != ''): ?>	
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['subpage']).".tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
							<?php elseif ($this->_tpl_vars['page'] != ''): ?>	
								<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => ($this->_tpl_vars['page']).".tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
							<?php endif; ?>
							<div class="clear"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>