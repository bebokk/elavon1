<?php /* Smarty version 2.6.18, created on 2014-01-26 09:25:39
         compiled from structure_menu.tpl */ ?>
<div class="structure_menu">
	<?php $_from = $this->_tpl_vars['menu_boczne_tab']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id1'] => $this->_tpl_vars['nic']):
?>						
		<?php $_from = $this->_tpl_vars['menu_boczne_tab'][$this->_tpl_vars['id1']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['poziom'] => $this->_tpl_vars['nic']):
?>							
			<?php $_from = $this->_tpl_vars['menu_boczne_tab'][$this->_tpl_vars['id1']][$this->_tpl_vars['poziom']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['poprzedni_poziom'] => $this->_tpl_vars['nazwa_kat_tlu']):
?>	
				<?php if ($this->_tpl_vars['poprzedni_poziom'] < $this->_tpl_vars['poziom']): ?> <ul> <?php endif; ?>							
				<?php if ($this->_tpl_vars['poprzedni_poziom'] > $this->_tpl_vars['poziom']): ?> </li></ul> <?php endif; ?>								
				<?php if ($this->_tpl_vars['nazwa_kat_tlu'] != 'powrot'): ?>
					<?php if ($this->_tpl_vars['id1_get'] == $this->_tpl_vars['id1']): ?>
						<li><a href="index.php?page=<?php echo $this->_tpl_vars['page']; ?>
&subpage=<?php echo $this->_tpl_vars['subpage']; ?>
&id1=<?php echo $this->_tpl_vars['id1']; ?>
" onfocus="blur()"><span><?php echo $this->_tpl_vars['nazwa_kat_tlu']; ?>
</span></a>	
					<?php else: ?>
						<li><a href="index.php?page=<?php echo $this->_tpl_vars['page']; ?>
&subpage=<?php echo $this->_tpl_vars['subpage']; ?>
&id1=<?php echo $this->_tpl_vars['id1']; ?>
" onfocus="blur()"><span><?php echo $this->_tpl_vars['nazwa_kat_tlu']; ?>
</span></a>								
					<?php endif; ?>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['poprzedni_poziom'] <= $this->_tpl_vars['poziom']): ?> </li> <?php endif; ?>	
			<?php endforeach; endif; unset($_from); ?>	
		<?php endforeach; endif; unset($_from); ?>	
	<?php endforeach; endif; unset($_from); ?>		
	</ul>
</div>