<?php /* Smarty version 2.6.14, created on 2016-12-22 21:35:08
         compiled from game_overview_villages.tpl */ ?>
<?php if ($_GET['mode'] == 'rename'): ?>
	<?php $this->assign('mode', 'rename'); ?>
<?php endif; ?>
<table width="98%" align="center" class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-top:5px;">
	<tr>
		<?php $_from = $this->_tpl_vars['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['f_name'] => $this->_tpl_vars['f_mode']):
?>
			<?php if ($this->_tpl_vars['f_name'] == 'Kombiniert'): ?>
				<?php $this->assign('f_name', 'Combinado'); ?>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['f_name'] == 'Produktion'): ?>
				<?php $this->assign('f_name', 'Produ&ccedil;&atilde;o'); ?>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['f_name'] == 'Truppen'): ?>
				<?php $this->assign('f_name', 'Tropas'); ?>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['f_name'] == 'Befehle'): ?>
				<?php $this->assign('f_name', 'Comandos'); ?>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['f_name'] == 'Eintreffend'): ?>
				<?php $this->assign('f_name', 'Chegando'); ?>
			<?php endif; ?>
			<td <?php if ($this->_tpl_vars['f_mode'] == $this->_tpl_vars['mode']): ?>class="selected"<?php endif; ?> width="100" align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview_villages&mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php if ($this->_tpl_vars['f_mode'] == $this->_tpl_vars['mode']): ?>&raquo; <?php endif;  echo $this->_tpl_vars['f_name']; ?>
</a></td>
		<?php endforeach; endif; unset($_from); ?>
			<td <?php if ($this->_tpl_vars['mode'] == 'rename'): ?>class="selected"<?php endif; ?> width="100" align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview_villages&mode=rename"><?php if ($this->_tpl_vars['mode'] == 'rename'): ?>&raquo; <?php endif; ?>Renoemar aldeias</a></td>
	</tr>
</table><br />
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_overview_villages_".($this->_tpl_vars['mode']).".tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>