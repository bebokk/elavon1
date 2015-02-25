<?php /* Smarty version 2.6.18, created on 2015-02-16 14:56:20
         compiled from elements/sub_menu.tpl */ ?>
<div class="menu2">
	<ul>	
		<?php $_from = $this->_tpl_vars['sub_menu'][$this->_tpl_vars['page']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['val']):
?>				
			<?php if ($this->_tpl_vars['id'] == $this->_tpl_vars['subpage']): ?>
				<li class="menu1_1 menu10_<?php echo $this->_tpl_vars['id']; ?>
 menu2_ul_li_selected"><a href="index.php?page=<?php echo $this->_tpl_vars['page']; ?>
&subpage=<?php echo $this->_tpl_vars['id']; ?>
"><span><?php echo $this->_tpl_vars['val']; ?>
</span></a></li>
			<?php else: ?>
				<li class="menu1_1 menu10_<?php echo $this->_tpl_vars['id']; ?>
"><a href="index.php?page=<?php echo $this->_tpl_vars['page']; ?>
&subpage=<?php echo $this->_tpl_vars['id']; ?>
"><span><?php echo $this->_tpl_vars['val']; ?>
</span></a></li>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		<!--
		<li><a href="index.php?page=home"><span>Home</span></a></li>
		<li><a href="index.php?page=structure"><span>Structure</span></a></li>
		<li><a href="index.php?page=settings"><span>Settings</span></a></li>
		<li><a href="index.php?page=newsletter"><span>Newsletter</span></a></li>
		<li><a href="index.php?page=users"><span>Users</span></a></li>
		<li><a href="index.php?page=logout"><span>Logout</span></a></li>
		-->
		<!--
		<li class="menu2_ul_li_selected"><a href="index.php?page=structure"><span><?php echo $this->_tpl_vars['page_name']; ?>
</span></a></li>
		-->
		<!--
		<li><a href="index.php?page=settings"><span>Settings</span></a></li>
		<li><a href="index.php?page=users"><span>Users</span></a></li>
		<li><a href="index.php?page=emails_templates"><span>Emails templates</span></a></li>
		<li><a href="index.php?page=logout"><span>Logout</span></a></li>
		-->
	</ul>
</div>