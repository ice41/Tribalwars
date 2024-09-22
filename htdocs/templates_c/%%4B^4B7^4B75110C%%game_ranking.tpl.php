<?php /* Smarty version 2.6.14, created on 2011-06-18 10:34:01
         compiled from game_ranking.tpl */ ?>
<table width="100%" align="center">
	<tr>
		<td>
			<h2>Clasament</h2>
				<table>
					<tr>
						<td valign="top" width="120">
							<table class="vis">
									<?php if (ally == $this->_tpl_vars['mode']): ?>

								<tr>
                        			<td class="selected" width="120">
										<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=ally">Triburi</a>
									</td>
                    			</tr>

									<?php else: ?>
                    			<tr>
                        		<td width="120">
									<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=ally">Triburi</a>
								</td>
							</tr>
									<?php endif; ?>
									<?php if (player == $this->_tpl_vars['mode']): ?>

								<tr>
                        			<td class="selected" width="120">
										<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=player">Juc&#259;tori</a>
									</td>
                    			</tr>

									<?php else: ?>
                    			<tr>
                        		<td width="120">
									<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=player">Juc&#259;tori</a>
								</td>
							</tr>
									<?php endif; ?>
									<?php if (kill_player == $this->_tpl_vars['mode']): ?>

								<tr>
                        			<td class="selected" width="120">

										<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=kill_player">Inamici &#238;nvin&#351;i</a>
									</td>
                    			</tr>

									<?php else: ?>
                    			<tr>
                        		<td width="120">
									<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=kill_player">Inamici &#238;nvin&#351;i</a>
								</td>
							</tr>
									<?php endif; ?>
                		</table>
            		</td>
					<td valign="top" align="left">

						<?php if (in_array ( $this->_tpl_vars['mode'] , $this->_tpl_vars['allow_mods'] )): ?>

							<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_ranking_".($this->_tpl_vars['mode']).".tpl", 'smarty_include_vars' => array('title' => 'foo')));
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

