<?php /* Smarty version 2.6.14, created on 2012-02-11 12:48:38
         compiled from game_ranking.tpl */ ?>
<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<span class="error"/><?php echo $this->_tpl_vars['error']; ?>
</span>
<?php endif; ?>

<h2>Ranking</h2>

<table width="100%">
	<tbody>
		<tr>
			<td valign="top" width="130">
				<table class="vis modemenu">
					<tbody>
						<?php $_from = $this->_tpl_vars['ranking_modes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbmode']):
?>
							<?php if ($this->_tpl_vars['dbmode'] == $this->_tpl_vars['mode']): ?>
								<tr>
									<td class="selected" width="100">
										<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=<?php echo $this->_tpl_vars['dbmode']; ?>
"><?php echo $this->_tpl_vars['name']; ?>
 </a>
									</td>
								</tr>
							<?php else: ?>
								<tr>
									<td width="100">
										<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=<?php echo $this->_tpl_vars['dbmode']; ?>
"><?php echo $this->_tpl_vars['name']; ?>
 </a>
									</td>
								</tr>
							<?php endif; ?>
						<?php endforeach; endif; unset($_from); ?>
					</tbody>
				</table>
			</td>
			<td valign="top">
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_ranking_".($this->_tpl_vars['mode']).".tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</td>
		</tr>
	</tbody>
</table>