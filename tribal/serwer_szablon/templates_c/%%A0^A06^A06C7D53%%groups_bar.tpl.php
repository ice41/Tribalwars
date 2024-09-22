<?php /* Smarty version 2.6.14, created on 2012-02-10 20:25:25
         compiled from groups_bar.tpl */ ?>
<div class="vis_item" align="center">
	<?php $_from = $this->_tpl_vars['user_groups_all']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group']):
?>
		<?php if ($this->_tpl_vars['user']['aktu_group'] === $this->_tpl_vars['group']): ?>
			<strong class="group_tooltip">&gt;<?php if ($this->_tpl_vars['group'] == 'all'): ?>wszystkie<?php else:  echo $this->_tpl_vars['group'];  endif; ?>&lt; </strong>
		<?php else: ?>
			<a class="group_tooltip" href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=<?php echo $this->_tpl_vars['screen']; ?>
&amp;mode=<?php echo $this->_tpl_vars['mode']; ?>
&amp;action=change_group&amp;group=<?php  echo base64_encode($this->_tpl_vars['group']); ?>&h=<?php echo $this->_tpl_vars['hkey']; ?>
">[<?php if ($this->_tpl_vars['group'] == 'all'): ?>wszystkie<?php else:  echo $this->_tpl_vars['group'];  endif; ?>]</a>
		<?php endif; ?>
	<?php endforeach; endif; unset($_from); ?>
</div>