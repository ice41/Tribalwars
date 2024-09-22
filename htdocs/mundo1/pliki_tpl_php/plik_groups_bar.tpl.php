<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-27 00:56:32
         Wersja PHP pliku pliki_tpl/groups_bar.tpl */ ?>
<div class="vis_item" align="center">
	<?php $_from = $this->_tpl_vars['user_grocusto_all']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
		<?php if ($this->_tpl_vars['user']['aktu_group'] === $this->_tpl_vars['group']): ?>
			<strong class="group_tooltip">&gt;<?php if ($this->_tpl_vars['group'] == 'all'): ?>Todas<?php else: ?><?php echo $this->_tpl_vars['group']; ?>
<?php endif; ?>&lt; </strong>
		<?php else: ?>
			<a class="group_tooltip" href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=<?php echo $this->_tpl_vars['screen']; ?>
&amp;mode=<?php echo $this->_tpl_vars['mode']; ?>
&amp;action=change_group&amp;group=<?php  echo base64_encode($this->_tpl_vars['group']); ?>&h=<?php echo $this->_tpl_vars['hkey']; ?>
">[<?php if ($this->_tpl_vars['group'] == 'all'): ?>Todas<?php else: ?><?php echo $this->_tpl_vars['group']; ?>
<?php endif; ?>]</a>
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
</div>