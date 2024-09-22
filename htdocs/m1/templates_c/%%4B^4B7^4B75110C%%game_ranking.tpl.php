<?php /* Smarty version 2.6.14, created on 2016-12-22 21:33:29
         compiled from game_ranking.tpl */ ?>
<br />
		<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
			<tr><th>Submenu</th></tr>
			<?php $_from = $this->_tpl_vars['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['f_name'] => $this->_tpl_vars['f_mode']):
?>
				<?php if ($this->_tpl_vars['f_name'] == 'Stämme'): ?>
					<?php $this->assign('f_name', 'Tribos'); ?>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['f_name'] == 'Spieler'): ?>
					<?php $this->assign('f_name', 'Jogadores'); ?>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['f_name'] == 'Besiegte Gegner'): ?>
					<?php $this->assign('f_name', 'Oponentes derrotados'); ?>
				<?php endif; ?>
			<tr><td <?php if ($this->_tpl_vars['f_mode'] == $this->_tpl_vars['mode']): ?>class="selected"<?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php if ($this->_tpl_vars['f_mode'] == $this->_tpl_vars['mode']): ?>&raquo; <?php endif;  echo $this->_tpl_vars['f_name']; ?>
</a></td></tr>
			<?php endforeach; endif; unset($_from); ?>
			<tr><td <?php if ($this->_tpl_vars['mode'] == 'hives'): ?>class="selected"<?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=hives"><?php if ($this->_tpl_vars['mode'] == 'hives'): ?>&raquo; <?php endif; ?>Saqueadores</a></td></tr>
		</table>
	</td>
	<td width="80%">
		<table width="100%" align="center">
			<tr>
				<td>
					<h2><?php if ($this->_tpl_vars['mode'] == 'ally'): ?>Ranking de tribos<?php elseif ($this->_tpl_vars['mode'] == 'player'): ?>Ranking de jogadores<?php elseif ($this->_tpl_vars['mode'] == 'kill_player'): ?>Ranking de O.D.<?php elseif ($this->_tpl_vars['mode'] == 'hives'): ?>Top Saqueadores<?php endif; ?></h2>
					<?php if (in_array ( $this->_tpl_vars['mode'] , $this->_tpl_vars['allow_mods'] )): ?>
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_ranking_".($this->_tpl_vars['mode']).".tpl", 'smarty_include_vars' => array('title' => 'foo')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['mode'] == 'hives'): ?>
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_ranking_hives.tpl", 'smarty_include_vars' => array('title' => 'foo')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					<?php endif; ?>
				</td>
			</tr>
		</table>
	</td>