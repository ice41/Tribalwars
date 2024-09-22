<?php /* Smarty version 2.6.14, created on 2012-01-25 18:07:56
         compiled from game_ranking_kill_player.tpl */ ?>
<?php 
$this->_tpl_vars['pl_trans'] = array("att" => "Jako napastnik","def" => "Jako obroñca","all" => "Razem");
 ?>
<h3>Pokonani przeciwnicy</h3>

<table class="vis">
	<tr>
		<?php $_from = $this->_tpl_vars['links_kill']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['f_name'] => $this->_tpl_vars['f_mode']):
?>
			<?php if ($this->_tpl_vars['f_mode'] == $this->_tpl_vars['type']): ?>
				<td class="selected" width="100">
					<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=kill_player&amp;type=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['pl_trans'][$this->_tpl_vars['f_mode']]; ?>
</a>
				</td>
			<?php else: ?>
				<td width="100">
					<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=kill_player&amp;type=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['pl_trans'][$this->_tpl_vars['f_mode']]; ?>
</a>
				</td>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
	</tr>
</table>

<?php if (in_array ( $this->_tpl_vars['type'] , $this->_tpl_vars['allow_mods_kill'] )): ?>
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_ranking_kill_player_".($this->_tpl_vars['type']).".tpl", 'smarty_include_vars' => array('title' => 'foo')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
  endif; ?>

<table>
	<tr>
		<td>
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_ranking_page_act.tpl", 'smarty_include_vars' => array('title' => 'foo')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		</td>
	</tr>
</table>