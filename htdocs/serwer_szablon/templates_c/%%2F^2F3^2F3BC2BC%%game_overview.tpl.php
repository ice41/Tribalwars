<?php /* Smarty version 2.6.14, created on 2012-01-30 14:37:01
         compiled from game_overview.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_time', 'game_overview.tpl', 160, false),array('modifier', 'number_format', 'game_overview.tpl', 237, false),)), $this); ?>
<br>
<table>
	<tr>
		<td width="600" valign="top" valign="top">
			<table class="vis" width="100%">
				<tr>
				    <th colspan="2">
					Budynki
					</th>
				</tr>
				<?php if ($this->_tpl_vars['style'] == 'new'): ?>
					<tr>
						<td width="60%">
							<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview&akcja=o_labels"><span><?php if ($this->_tpl_vars['labels']): ?>Ukryj poziomy budynków<?php else: ?>Poka¿ poziomy budynków<?php endif; ?></span></a>
						</td>
						<td>
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview&akcja=o_style"><span style="text-align:right;">Do klasycznego przegl¹du wioski</span></a>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<table cellpadding="5">
								<tr>
									<td>
										<div style="position: relative; width: 600px;height: 418px; background-image: url(graphic/visual/back_none.jpg);"/>
											<img class="empty" src="graphic/map/empty.png" alt="" usemap="#mapa" />
											<map name="mapa" id="mapa">
												<?php $_from = $this->_tpl_vars['cl_builds']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dbname']):
?>
													<?php if ($this->_tpl_vars['village'][$this->_tpl_vars['dbname']] > 0): ?>
														<?php if ($this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']) == 1): ?>
															<area shape="poly" coords="<?php echo $this->_tpl_vars['builds_graphic_coords'][$this->_tpl_vars['dbname']]; ?>
" href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
" alt="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
"/>
															<img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="graphic/visual/<?php echo $this->_tpl_vars['dbname']; ?>
1.<?php if ($this->_tpl_vars['anims']): ?>gif<?php else: ?>png<?php endif; ?>" alt=""/>
															<?php if ($this->_tpl_vars['labels']): ?>
																<label class="stagetip label_<?php echo $this->_tpl_vars['dbname']; ?>
"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><?php echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; ?>
</a></label>
															<?php endif; ?>
														<?php else: ?>
															<?php if ($this->_tpl_vars['dbname'] == 'snob' || $this->_tpl_vars['dbname'] == 'hide'): ?>
																<area shape="poly" coords="<?php echo $this->_tpl_vars['builds_graphic_coords'][$this->_tpl_vars['dbname']]; ?>
" href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
" alt="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
"/>
																<img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="graphic/visual/<?php echo $this->_tpl_vars['dbname']; ?>
1.<?php if ($this->_tpl_vars['anims']): ?>gif<?php else: ?>png<?php endif; ?>" alt=""/>
																<?php if ($this->_tpl_vars['labels']): ?>
																	<label class="stagetip label_<?php echo $this->_tpl_vars['dbname']; ?>
"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><?php echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; ?>
</a></label>
																<?php endif; ?>
															<?php else: ?>
																<?php 
																	$this->_tpl_vars['aktu_build_prc'] = $this->_tpl_vars['village'][$this->_tpl_vars['dbname']] / $this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']);
																 ?>
																<?php if ($this->_tpl_vars['aktu_build_prc'] > 0.5): ?>
																	<area shape="poly" coords="<?php echo $this->_tpl_vars['builds_graphic_coords'][$this->_tpl_vars['dbname']]; ?>
" href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
" alt="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
"/>
																	<?php if ($this->_tpl_vars['dbname'] == 'main'): ?>
																		<img class="align_mainflag" src="graphic/visual/mainflag3.gif" alt=""/>
																	<?php endif; ?>
																	<img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="graphic/visual/<?php echo $this->_tpl_vars['dbname']; ?>
3.<?php if ($this->_tpl_vars['anims']): ?>gif<?php else: ?>png<?php endif; ?>" alt=""/>
																	<?php if ($this->_tpl_vars['labels']): ?>
																		<label class="stagetip label_<?php echo $this->_tpl_vars['dbname']; ?>
"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><?php echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; ?>
</a></label>
																<?php endif; ?>
																<?php else: ?>
																	<?php if ($this->_tpl_vars['aktu_build_prc'] > 0.2): ?>
																		<area shape="poly" coords="<?php echo $this->_tpl_vars['builds_graphic_coords'][$this->_tpl_vars['dbname']]; ?>
" href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
" alt="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
"/>
																		<?php if ($this->_tpl_vars['dbname'] == 'main'): ?>
																			<img class="align_mainflag" src="graphic/visual/mainflag2.gif" alt=""/>
																		<?php endif; ?>
																		<img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="graphic/visual/<?php echo $this->_tpl_vars['dbname']; ?>
2.<?php if ($this->_tpl_vars['anims']): ?>gif<?php else: ?>png<?php endif; ?>" alt=""/>
																		<?php if ($this->_tpl_vars['labels']): ?>
																			<label class="stagetip label_<?php echo $this->_tpl_vars['dbname']; ?>
"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><?php echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; ?>
</a></label>
																		<?php endif; ?>
																	<?php else: ?>
																		<area shape="poly" coords="<?php echo $this->_tpl_vars['builds_graphic_coords'][$this->_tpl_vars['dbname']]; ?>
" href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
" alt="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
"/>
																		<?php if ($this->_tpl_vars['dbname'] == 'main'): ?>
																			<img class="align_mainflag" src="graphic/visual/mainflag1.gif" alt=""/>
																		<?php endif; ?>
																		<img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="graphic/visual/<?php echo $this->_tpl_vars['dbname']; ?>
1.<?php if ($this->_tpl_vars['anims']): ?>gif<?php else: ?>png<?php endif; ?>" alt=""/>
																		<?php if ($this->_tpl_vars['labels']): ?>
																			<label class="stagetip label_<?php echo $this->_tpl_vars['dbname']; ?>
"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><?php echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; ?>
</a></label>
																		<?php endif; ?>
																	<?php endif; ?>
																<?php endif; ?>
															<?php endif; ?>
														<?php endif; ?>
													<?php else: ?>
														<?php 
															if (get_counts_on_build($this->_tpl_vars['village']['id'],$this->_tpl_vars['dbname']) > 0):
														 ?>
														<?php if ($this->_tpl_vars['anims']): ?>
															<img class="align_<?php echo $this->_tpl_vars['dbname']; ?>
" src="graphic/visual/<?php echo $this->_tpl_vars['dbname']; ?>
0.gif" alt=""/>
														<?php endif; ?>
														<?php 
															endif;
														 ?>
													<?php endif; ?>
												<?php endforeach; endif; unset($_from); ?>
										
												<?php if ($this->_tpl_vars['anims']): ?>
													<img class="align_conversation" src="graphic/visual/conversation.gif" alt=""/>
													<img class="align_farmer" src="graphic/visual/farmer.gif" alt=""/>
													<img class="align_guard" src="graphic/visual/guard.gif" alt=""/>
													<img class="align_juggler" src="graphic/visual/juggler.gif" alt=""/>
												<?php endif; ?>
											</map>
										</div>
									</td>	
								</tr>
							</table>
						</td>					
					</tr>
					<tr>
						<td colspan="2">
							<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview&akcja=o_anims">
								<span style="text-align:right;">
									<?php if ($this->_tpl_vars['anims']): ?>
										Wy³¹czyæ animacje
									<?php else: ?>
										W³¹czyæ animacje
									<?php endif; ?>
								</span>
							</a>
						</td>
					</tr>
				<?php elseif ($this->_tpl_vars['style'] == 'classic'): ?>
					<tr>
						<td>
							<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview&akcja=o_style">
								<span style="text-align:right;">
									Do graficznego przegl¹du wioski
								</span>
							</a>
						</td>
					</tr>
					<?php $_from = $this->_tpl_vars['built_builds']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dbname']):
?>
						<tr>
							<td>
								<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img src="graphic/buildings/<?php echo $this->_tpl_vars['dbname']; ?>
.png"> <?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
</a>
									(Poziom <?php echo $this->_tpl_vars['village'][$this->_tpl_vars['dbname']]; ?>
)
								</td>
						</tr>
					<?php endforeach; endif; unset($_from); ?>
				<?php endif; ?>
				
				<tr>
										<?php if (count ( $this->_tpl_vars['other_movements'] ) > 0): ?>
						<td colspan="2">
							<table class="vis" width="100%">
								<tr>
									<th>Inne rozkazy (<?php echo count($this->_tpl_vars['other_movements']); ?>)</th>
									<th>Na miejscu</th>
									<th>Na miejscu za</th>
								</tr>
								<?php $_from = $this->_tpl_vars['other_movements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
?>
									<tr>
										<td>
											<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_command&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;type=other">
												<img src="graphic/command/<?php echo $this->_tpl_vars['array']['type']; ?>
.png"> <?php echo $this->_tpl_vars['pl']->pl_text($this->_tpl_vars['array']['message']); ?>

											</a>
										</td>
										<td>
											<?php echo $this->_tpl_vars['pl']->format_date($this->_tpl_vars['array']['end_time']); ?>

										</td>
										<?php if ($this->_tpl_vars['array']['arrival_in'] < 0): ?>
											<td>
												<?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>

											</td>
										<?php else: ?>
											<td>
												<span class="timer">
													<?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>

												</span>
											</td>
										<?php endif; ?>
									</tr>
								<?php endforeach; endif; unset($_from); ?>
							</table>
						</td>
					<?php endif; ?>
				</tr>
				<tr>
										<?php if (count ( $this->_tpl_vars['my_movements'] ) > 0): ?>
						<td colspan="2">
						<br>
							<table class="vis" width="100%">
								<tr>
									<th>W³asne rozkazy (<?php echo count($this->_tpl_vars['my_movements']); ?>)</th>
									<th>Na miejscu</th>
									<th>Na miejscu za</th>
								</tr>
								<?php $_from = $this->_tpl_vars['my_movements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
?>
									<tr>
										<td>
											<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_command&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;type=own">
												<img src="graphic/command/<?php echo $this->_tpl_vars['array']['type']; ?>
.png"> <?php echo $this->_tpl_vars['pl']->pl_text($this->_tpl_vars['array']['message']); ?>

											</a>
										</td>
										<td>
											<?php echo $this->_tpl_vars['pl']->format_date($this->_tpl_vars['array']['end_time']); ?>

										</td>
										<?php if ($this->_tpl_vars['array']['arrival_in'] < 0): ?>
											<td>
												<?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>

											</td>
										<?php else: ?>
											<td>
												<span class="timer">
													<?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>

												</span>
											</td>
										<?php endif; ?>
										<?php if ($this->_tpl_vars['array']['can_cancel']): ?>
											<td>
												<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;action=cancel&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">
													Przerwij
												</a>
											</td>
										<?php endif; ?>
									</tr>
								<?php endforeach; endif; unset($_from); ?>
							</table>
						</td>
					<?php endif; ?>
				</tr>
			</table>
		</td>
		
		<td valign="top" <?php if ($this->_tpl_vars['style'] == 'new'): ?>width="100%<?php endif;  if ($this->_tpl_vars['style'] == 'classic'): ?>width="40%<?php endif; ?>">
			<table class="vis" width="100%">
				<tr>
					<th colspan="2">
						Produkcja
					</th>
				</tr>
				<tr>
					<td width="80">
						<img src="graphic/holz.png" title="Drewno" alt="" />
						Drewno
					</td>
					<td>
						<strong>
							<?php echo ((is_array($_tmp=$this->_tpl_vars['wood_per_hour'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>

						</strong> 
						 na Godzinê
					</td>
				</tr>
				<tr>
					<td width="80">
						<img src="graphic/lehm.png" title="Ceg³y" alt="" />
						 Glina
					</td>
					<td>
						<strong>
							<?php echo ((is_array($_tmp=$this->_tpl_vars['stone_per_hour'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>

						</strong>
						 na Godzinê
					</td>
				</tr>
				<tr>
					<td width="80">
						<img src="graphic/eisen.png" title="¯elazo" alt="" />
						 ¯elazo
					</td>
					<td>
						<strong>
							<?php echo ((is_array($_tmp=$this->_tpl_vars['iron_per_hour'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>

						</strong>
						 na Godzinê
					</td>
				</tr>
			</table>
			<br />
			<table class="vis" width="100%">
				<tr>
					<th>
						Jednostki
					</th>
				</tr>
                <?php $_from = $this->_tpl_vars['in_village_units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['num']):
?>
                	<tr>
						<td>
							<img src="graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png"> 
							<b>
								<?php echo $this->_tpl_vars['num']; ?>

							</b> 
							<?php if ($this->_tpl_vars['dbname'] == 'unit_paladin'): ?>
								<?php echo $this->_tpl_vars['pala_name']; ?>

							<?php else: ?>
								<?php echo $this->_tpl_vars['cl_units']->get_name($this->_tpl_vars['dbname']); ?>

							<?php endif; ?>
						</td>
					</tr>
                <?php endforeach; endif; unset($_from); ?>
			</table>
			<br />
			<?php if ($this->_tpl_vars['village']['agreement'] != '100'): ?>
				<table class="vis" width="100%">
					<tr>
						<th>
							Poparcie:
						</th>
						<th>
							<?php echo $this->_tpl_vars['village']['agreement']; ?>

						</th>
					</tr>
				</table>
				<br />
			<?php endif; ?>
		</td>
	</tr>
</table>