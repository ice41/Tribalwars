<?php /* Smarty version 2.6.14, created on 2012-04-29 09:15:21
         compiled from game_settings.tpl */ ?>
<table width="100%" align="center">
	<tr>
		<td>
                        
			<h2>Set&#259;ri</h2>
			<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
         <?php if ($this->_tpl_vars['error'] == 'Aceasta parola este falsa'): ?>
            <?php $this->assign('error', 'Parola veche introdus&#259; de tine este incorecta! Te rugam s&#259; introduci parola din nou, dar de aceast&#259; dat&#259; cu mai mult&#259; aten&#355;ie.'); ?>
         <?php endif; ?>
         <?php if ($this->_tpl_vars['error'] == 'Passwörter stimmen nicht überein'): ?>
            <?php $this->assign('error', 'Noua parol&#259; introdusa de tine nu corespunde cu parola nou&#259; ce a fost repetata! Te rugam s&#259; introduci din nou cele dou&#259; parole, dar de aceast&#259; dat&#259; cu mai mult&#259; aten&#355;ie.'); ?>
         <?php endif; ?>
         <?php if ($this->_tpl_vars['error'] == 'Marimea maxima este 120kByte ,incearca din nou!'): ?>
            <?php $this->assign('error', 'Emblema proprie nu poate depasi 120kb! Te rug&#259;m s&#259; introduci o alt&#259; emblem&#259;.'); ?>
         <?php endif; ?>
         <?php if ($this->_tpl_vars['error'] == 'Acest fisier pe care lai uploadat nu este unul dintre JPEG, JPG, PNG und GIF!'): ?>
            <?php $this->assign('error', 'Ebmlema con&#355;ine un format invalid/nepermis! Formaturile sunt: JPEG, PNG, GIF.'); ?>
         <?php endif; ?>
         <?php if ($this->_tpl_vars['error'] == 'Das Wappen darf maximal 240x180px groÃŸ sein!'): ?>
            <?php $this->assign('error', 'Emblema este prea mare! Dimensiunile maxime sunt de 240x180!'); ?>
         <?php endif; ?>


				<h2 class="error"><?php echo $this->_tpl_vars['error']; ?>
</h2>
			<?php endif; ?>
<table width="100%">
					<tr>
						<td valign="top" width="130">
							<table class="vis">
							<?php if ($this->_tpl_vars['mode'] == 'profile'): ?>
									<tr>
                        			<td class="selected" width="200">
										<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=profile">Profil</a>
									</td>
                    			</tr>

									<?php else: ?>
                    			<tr>
                        		<td width="120">
									<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=profile">Profil</a>
								</td>
							</tr>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['mode'] == 'settings'): ?>
									<tr>
                        			<td class="selected" width="120">
										<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=settings">Set&#259;ri</a>
									</td>
                    			</tr>

									<?php else: ?>
                    			<tr>
                        		<td width="120">
									<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=settings">Set&#259;ri</a>
								</td>
							</tr>
									<?php endif; ?>	
									<?php if ($this->_tpl_vars['mode'] == 'vacation'): ?>
									<tr>
                        			<td class="selected" width="120">
										<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=settings&mode=vacation">Mod de vacan&#355;&#259;</a>
									</td>
                    			</tr>

									<?php else: ?>
                    			<tr>
                        		<td width="120">
									<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=settings&mode=vacation">Mod de vacan&#355;&#259;</a>
								</td>
							</tr>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['mode'] == 'quickbar'): ?>
									<tr>
                        			<td class="selected" width="120">
										<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=quickbar">Bar&#259; link-uri rapide</a>
									</td>
                    			</tr>

									<?php else: ?>
                    			<tr>
                        		<td width="120">
									<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=quickbar">Bar&#259; link-uri rapide</a>
								</td>
							</tr>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['mode'] == 'logins'): ?>
									<tr>
                        			<td class="selected" width="120">
										<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=logins">Login</a>
									</td>
                    			</tr>

									<?php else: ?>
                    			<tr>
                        		<td width="120">
									<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=logins">Login</a>
								</td>
							</tr>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['mode'] == 'change_passwd'): ?>
									<tr>
                        			<td class="selected" width="120">
										<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=change_passwd">Modificarea parolei</a>
									</td>
                    			</tr>

									<?php else: ?>
                    			<tr>
                        		<td width="120">
									<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=change_passwd">Modificarea parolei</a>
								</td>
							</tr>
									<?php endif; ?>
									
                                
								
					
								
								<?php if ($this->_tpl_vars['mode'] == 'userdelete'): ?>
								<tr>
                        			<td class="selected" width="120">
										<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=userdelete">&#350;terge contul</a>
									</td>
                    			</tr>

									<?php else: ?>
                    			<tr>
                        		<td width="120">
									<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=userdelete">&#350;terge contul</a>
								</td>
							</tr>
									<?php endif; ?>
									<?php if ($this->_tpl_vars['mode'] == 'start'): ?>
									<tr>
                        			<td class="selected" width="120">
										<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=settings&mode=start">&#206;nceput nou</a>
									</td>
                    			</tr>

									<?php else: ?>
                    			<tr>
                        		<td width="120">
									<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=settings&mode=start">&#206;nceput nou</a>
								</td>
							</tr>
									<?php endif; ?>
									<tr>
								<td>
								<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=support">&#206;ntrebare suport</a>
								</td>
								</tr>
                		</table>
            		</td>
					<td valign="top" align="left">

							<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_settings_".($this->_tpl_vars['mode']).".tpl", 'smarty_include_vars' => array('title' => 'foo')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
                            
       
       
            		</td>
				</tr>
			</table>
		</td>
	</tr>
</table>