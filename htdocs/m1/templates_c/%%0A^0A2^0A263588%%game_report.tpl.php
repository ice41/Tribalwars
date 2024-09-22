<?php /* Smarty version 2.6.14, created on 2016-12-22 21:35:44
         compiled from game_report.tpl */ ?>
<br />
	<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><th>Submenu</th></tr>
		<tr><td<?php if ($this->_tpl_vars['mode'] == 'all'): ?> class="selected"<?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=all"><?php if ($this->_tpl_vars['mode'] == 'all'): ?>&raquo; <?php endif; ?>Todos os relat&oacute;rios</a></td></tr>
		<tr><td<?php if ($this->_tpl_vars['mode'] == 'attack'): ?> class="selected"<?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=attack"><?php if ($this->_tpl_vars['mode'] == 'attack'): ?>&raquo; <?php endif; ?>Ataque</a></td></tr>
		<tr><td<?php if ($this->_tpl_vars['mode'] == 'defense'): ?> class="selected"<?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=defense"><?php if ($this->_tpl_vars['mode'] == 'defense'): ?>&raquo; <?php endif; ?>Defesa</a></td></tr>
		<tr><td<?php if ($this->_tpl_vars['mode'] == 'support'): ?> class="selected"<?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=support"><?php if ($this->_tpl_vars['mode'] == 'support'): ?>&raquo; <?php endif; ?>Apoio</a></td></tr>
		<tr><td<?php if ($this->_tpl_vars['mode'] == 'trade'): ?> class="selected"<?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=trade"><?php if ($this->_tpl_vars['mode'] == 'trade'): ?>&raquo; <?php endif; ?>Mercado</a></td></tr>
		<tr><td<?php if ($this->_tpl_vars['mode'] == 'other'): ?> class="selected"<?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=other"><?php if ($this->_tpl_vars['mode'] == 'other'): ?>&raquo; <?php endif; ?>Outros</a></td></tr>
		<tr><td<?php if ($this->_tpl_vars['mode'] == 'public_reports'): ?> class="selected"<?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=public_reports"><?php if ($this->_tpl_vars['mode'] == 'public_reports'): ?>&raquo; <?php endif; ?>Relat&oacute;rios publicados</a></td></tr>
	</table>
</td>
<td width="80%">
	<h2>Relat&oacute;rios</h2>
	<table width="100%">
		<tr>
			<td valign="top" width="100%">
			<?php if($_GET['mode'] == 'public_reports'){ ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_report_public_reports.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php }else{ ?>
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_report_".($this->_tpl_vars['do']).".tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			<?php } ?>
			</td>
		</tr>
	</table>
</td>