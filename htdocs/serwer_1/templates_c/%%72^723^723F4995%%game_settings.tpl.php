<?php /* Smarty version 2.6.14, created on 2011-12-17 22:05:06
         compiled from game_settings.tpl */ ?>
<?php 
$this->_tpl_vars['pl_trans'] = array("profile" => "Profil","settings" => "Ustawienia","vacation" => "Zastêpstwo","logins" => "Logowania","change_passwd" => "Zmiana has³a");
 ?>
<table width="100%" align="center">
	<tr>
		<td>
			<h2>Ustaweienia</h2>
			<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
				<h2 class="error"><?php echo $this->_tpl_vars['error']; ?>
</h2>
			<?php endif; ?>
				<table width="100%">
					<tr>
						<td valign="top" width="120">
							<table class="vis">
                                <?php $_from = $this->_tpl_vars['links']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['f_name'] => $this->_tpl_vars['f_mode']):
?>
									<?php if ($this->_tpl_vars['f_mode'] == $this->_tpl_vars['mode']): ?>

								<tr>
                        			<td class="selected" width="120">
										<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['pl_trans'][$this->_tpl_vars['f_mode']]; ?>
</a>
									</td>
                    			</tr>

									<?php else: ?>
                    			<tr>
                        		<td width="120">
									<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=<?php echo $this->_tpl_vars['f_mode']; ?>
"><?php echo $this->_tpl_vars['pl_trans'][$this->_tpl_vars['f_mode']]; ?>
</a>
								</td>
							</tr>
									<?php endif; ?>
								<?php endforeach; endif; unset($_from); ?>
                		</table>
            		</td>
					<td valign="top" align="left">

						<?php if (in_array ( $this->_tpl_vars['mode'] , $this->_tpl_vars['links'] )): ?>

							<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_settings_".($this->_tpl_vars['mode']).".tpl", 'smarty_include_vars' => array('title' => 'foo')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

						<?php endif; ?>
            		</td>
				</tr>
			</table>
		</td>
	</tr>
</table>