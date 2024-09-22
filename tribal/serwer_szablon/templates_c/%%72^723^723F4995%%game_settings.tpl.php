<?php /* Smarty version 2.6.14, created on 2012-02-17 20:41:35
         compiled from game_settings.tpl */ ?>
<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<span class="error"/><?php echo $this->_tpl_vars['error']; ?>
</span>
<?php endif; ?>

<h2>Ustawienia</h2>
	
<table>
	<tbody>
		<tr>
			<td valign="top">
				<table class="vis modemenu" style="width: 125px;">
					<tbody>	
						<?php $_from = $this->_tpl_vars['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link'] => $this->_tpl_vars['f_mode']):
?>
							<tr>
								<?php if ($this->_tpl_vars['f_mode'] == $this->_tpl_vars['mode']): ?>
									<td width="100" class="selected">
										<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['link']; ?>
 </a>
									</td>
								<?php else: ?>
									<td width="100">
										<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['link']; ?>
 </a>
									</td>
								<?php endif; ?>
							</tr>
						<?php endforeach; endif; unset($_from); ?>
					</tbody>
				</table>
			</td>
			<td valign="top">
				<?php if (in_array ( $this->_tpl_vars['mode'] , $this->_tpl_vars['links'] )): ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_settings_".($this->_tpl_vars['mode']).".tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php endif; ?>
			</td>
		</tr>
	</tbody>
</table>