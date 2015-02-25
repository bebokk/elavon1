<?php /* Smarty version 2.6.18, created on 2015-02-16 14:56:20
         compiled from elements/top_menu.tpl */ ?>
<div class="menu1">
	<ul>
		<!--
		<li><a href="index.php?page=home"><span>Home</span></a></li>
		<li><a href="index.php?page=structure"><span>Structure</span></a></li>
		<li><a href="index.php?page=settings"><span>Settings</span></a></li>
		<li><a href="index.php?page=newsletter"><span>Newsletter</span></a></li>
		<li><a href="index.php?page=users"><span>Users</span></a></li>
		<li><a href="index.php?page=logout"><span>Logout</span></a></li>
		-->
		<?php $_from = $this->_tpl_vars['main_menu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['val']):
?>			
			<?php if ($this->_tpl_vars['page'] == $this->_tpl_vars['id']): ?>
				<li class="menu1_1 menu1_ul_li_hover menu10_<?php echo $this->_tpl_vars['id']; ?>
">
			<?php else: ?>
				<li class="menu1_1 menu10_<?php echo $this->_tpl_vars['id']; ?>
">			
			<?php endif; ?>
				<a href="index.php?page=<?php echo $this->_tpl_vars['id']; ?>
&subpage=<?php echo $this->_tpl_vars['main_menu1'][$this->_tpl_vars['id']]; ?>
">
					<div class="ico_menu" style="background:transparent url('<?php echo $this->_tpl_vars['main_menu2'][$this->_tpl_vars['id']]; ?>
') no-repeat center center;"></div>
					<span><?php echo $this->_tpl_vars['val']; ?>
</span>
				</a>
			</li>
		<?php endforeach; endif; unset($_from); ?>
		<li class="menu1_1">
			<a href="index.php?page=logout">
				<div class="ico_menu" style="background:transparent url('css/menu/logout.png') no-repeat center center;"></div>
				<span>Logout</span>
			</a>
		</li>
	</ul>
</div>