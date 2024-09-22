<?php /* Smarty version 2.6.14, created on 2012-04-27 20:42:14
         compiled from game_map.tpl */ ?>
<script type="text/javascript">
function KAMap (image_url, snob_max_distance) {
    this.options = {
        units: new Array (
			<?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname']):
?>
				'<?php echo $this->_tpl_vars['dbname']; ?>
',
			<?php endforeach; endif; unset($_from); ?>
            'donkey'
			)
		}
        
    this.options.image_url = image_url;
    this.options.snob_max_distance = snob_max_distance;
	}
</script>
<script src="/js/map.js" type="text/javascript"></script>
<script type="text/javascript">
lang = new Array();
</script>

<h2>Kontynent <?php echo $this->_tpl_vars['mapa']['kontynent']; ?>
</h2>

<table class="padding2">
	<tr>
		<td valign="top">
			<table class="map_container padding2">
				<tr>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']-$this->_tpl_vars['mapa']['polowa']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']-$this->_tpl_vars['mapa']['polowa']; ?>
"><img src="/ds_graphic/map/map_nw.png" style="z-index:1; position:relative;" alt=""/></a></td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']-$this->_tpl_vars['mapa']['polowa']; ?>
"><img src="/ds_graphic/map/map_n.png" style="z-index:1; position:relative;" alt="map/map_n.png"/></a></td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']+$this->_tpl_vars['mapa']['polowa']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']-$this->_tpl_vars['mapa']['polowa']; ?>
"><img src="/ds_graphic/map/map_ne.png" style="z-index:1; position:relative;" alt="map/map_ne.png"/></a></td>
				</tr>
				<tr>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']-$this->_tpl_vars['mapa']['polowa']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']; ?>
"><img src="/ds_graphic/map/map_w.png" style="z-index:1; position:relative;" alt="map/map_w.png"/></a></td>
					<td>
						<table style="border: 1px solid rgb(248, 237, 206); background-color: rgb(248, 237, 206); border-spacing: 0px; vertical-align:middle;padding: 0px 0px;" cellpadding="0" cellspacing="0">
							<?php $_from = $this->_tpl_vars['y_coords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['y']):
?>
								<tr>
									<td width="20"><?php echo $this->_tpl_vars['y']; ?>
</td>
									<?php $_from = $this->_tpl_vars['x_coords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['x']):
?>
										<?php $this->_tpl_vars['impl_coord'] = $this->_tpl_vars['x'].'|'.$this->_tpl_vars['y'] ?>
										<?php if (! $this->_tpl_vars['kl_mapa']->is_osada($this->_tpl_vars['impl_coord'])): ?>
											<?php if ($this->_tpl_vars['kl_mapa']->is_krzak($this->_tpl_vars['impl_coord'])): ?>
												<td id="tile_<?php echo $this->_tpl_vars['x']; ?>
_<?php echo $this->_tpl_vars['y']; ?>
" style="<?php echo $this->_tpl_vars['kl_mapa']->get_style($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
"><img src="/ds_graphic/map/<?php echo $this->_tpl_vars['kl_mapa']->get_krzak_typ($this->_tpl_vars['impl_coord']); ?>
" alt="" /></td>
											<?php else: ?>
												<?php if ($this->_tpl_vars['kl_mapa']->is_trawa($this->_tpl_vars['impl_coord'])): ?>
													<td id="tile_<?php echo $this->_tpl_vars['x']; ?>
_<?php echo $this->_tpl_vars['y']; ?>
" style="<?php echo $this->_tpl_vars['kl_mapa']->get_style($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
"><img src="/ds_graphic/map/<?php echo $this->_tpl_vars['kl_mapa']->get_trawa_typ($this->_tpl_vars['impl_coord']); ?>
" alt="" /></td>
												<?php else: ?>
													<td id="tile_<?php echo $this->_tpl_vars['x']; ?>
_<?php echo $this->_tpl_vars['y']; ?>
" style="<?php echo $this->_tpl_vars['kl_mapa']->get_style($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
"><img src="/ds_graphic/map/gras1.png" alt="" /></td>
												<?php endif; ?>
											<?php endif; ?>
										<?php else: ?>
											<td id="tile_<?php echo $this->_tpl_vars['x']; ?>
_<?php echo $this->_tpl_vars['y']; ?>
" style="<?php echo $this->_tpl_vars['kl_mapa']->get_color($this->_tpl_vars['impl_coord'],$this->_tpl_vars['village']['id'],$this->_tpl_vars['user']['id'],$this->_tpl_vars['user']['ally']);  echo $this->_tpl_vars['kl_mapa']->get_style($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
">
												<div style="width: 53px; height: 38px;"/>
													<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['kl_mapa']->get_vid($this->_tpl_vars['impl_coord']); ?>
">
														<img src="/ds_graphic/map/<?php echo $this->_tpl_vars['kl_mapa']->grafika_osady($this->_tpl_vars['impl_coord']); ?>
" 
														onmouseover = "Tip(kaMap.tooltipDetails('<?php echo $this->_tpl_vars['kl_mapa']->get_vid($this->_tpl_vars['impl_coord']); ?>
', '<?php echo $this->_tpl_vars['kl_mapa']->get_osada_name($this->_tpl_vars['impl_coord']); ?>
 (<?php echo $this->_tpl_vars['x']; ?>
|<?php echo $this->_tpl_vars['y']; ?>
) K<?php echo $this->_tpl_vars['kl_mapa']->get_continent($this->_tpl_vars['impl_coord']); ?>
', <?php echo $this->_tpl_vars['kl_mapa']->get_points($this->_tpl_vars['impl_coord']); ?>
, <?php echo $this->_tpl_vars['kl_mapa']->get_player_info($this->_tpl_vars['impl_coord']); ?>
, <?php echo $this->_tpl_vars['kl_mapa']->get_ally_info($this->_tpl_vars['impl_coord']); ?>
, '<?php if ($this->_tpl_vars['map_settings']['map_show_moral']):  echo $this->_tpl_vars['kl_mapa']->get_morals($this->_tpl_vars['impl_coord'],$this->_tpl_vars['user']['points'],$this->_tpl_vars['user']['id']);  endif; ?>', '<?php echo $this->_tpl_vars['kl_mapa']->get_group($this->_tpl_vars['impl_coord'],$this->_tpl_vars['user']['id']); ?>
', '<?php echo $this->_tpl_vars['village']['x']; ?>
.<?php echo $this->_tpl_vars['village']['y']; ?>
.<?php echo $this->_tpl_vars['x']; ?>
.<?php echo $this->_tpl_vars['y']; ?>
', '<?php if ($this->_tpl_vars['map_settings']['map_show_ressis']):  echo $this->_tpl_vars['kl_mapa']->get_res($this->_tpl_vars['impl_coord'],$this->_tpl_vars['user']['id']);  endif; ?>', '<?php if ($this->_tpl_vars['map_settings']['map_show_workers']):  echo $this->_tpl_vars['kl_mapa']->get_bh($this->_tpl_vars['impl_coord'],$this->_tpl_vars['user']['id']);  endif; ?>', '<?php if ($this->_tpl_vars['map_settings']['map_show_traders']):  echo $this->_tpl_vars['kl_mapa']->get_traders($this->_tpl_vars['impl_coord'],$this->_tpl_vars['user']['id']);  endif; ?>','<?php if ($this->_tpl_vars['map_settings']['map_show_troups']):  echo $this->_tpl_vars['kl_mapa']->get_units($this->_tpl_vars['impl_coord'],$this->_tpl_vars['user']['id']);  endif; ?>', <?php echo $this->_tpl_vars['kl_mapa']->is_noob_protection($this->_tpl_vars['impl_coord']); ?>
, false, '<?php echo $this->_tpl_vars['kl_mapa']->get_bonus_text($this->_tpl_vars['impl_coord']); ?>
', '<?php echo $this->_tpl_vars['kl_mapa']->get_bonus_image($this->_tpl_vars['impl_coord']); ?>
'), PADDING, 0, FADEOUT, 125, FADEIN, 150)"
														onmouseout="UnTip()" alt="" />
														
														<?php echo $this->_tpl_vars['kl_mapa']->status_osady($this->_tpl_vars['impl_coord'],$this->_tpl_vars['user']['id'],$this->_tpl_vars['user']['ally']); ?>

														
													</a>
													</div>
											</td>
										<?php endif; ?>
									<?php endforeach; endif; unset($_from); ?>
								</tr>
							<?php endforeach; endif; unset($_from); ?>
			
							<tr>
								<td height="20"></td>
								<?php $_from = $this->_tpl_vars['x_coords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['x']):
?>
									<td><?php echo $this->_tpl_vars['x']; ?>
</td>
								<?php endforeach; endif; unset($_from); ?>
							</tr>
						</table>
					</td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']+$this->_tpl_vars['mapa']['polowa']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']; ?>
"><img src="/ds_graphic/map/map_e.png" style="z-index:1; position:relative;" alt="map/map_e.png"/></a></td>
				</tr>
				<tr>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']-$this->_tpl_vars['mapa']['polowa']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']+$this->_tpl_vars['mapa']['polowa']; ?>
"><img src="/ds_graphic/map/map_sw.png" style="z-index:1; position:relative;" alt="map/map_sw.png"/></a></td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']+$this->_tpl_vars['mapa']['polowa']; ?>
"><img src="/ds_graphic/map/map_s.png" style="z-index:1; position:relative;" alt="map/map_s.png"/></a></td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']+$this->_tpl_vars['mapa']['polowa']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']+$this->_tpl_vars['mapa']['polowa']; ?>
"><img src="/ds_graphic/map/map_se.png" style="z-index:1; position:relative;" alt="map/map_se.png"/></a></td>
				</tr>
			</table>
			
			<BR>

<table style="border: 1px solid rgb(140, 95, 13); background-color: rgb(244, 228, 188); margin-left: 0px; border-collapse: separate; text-align: left;" class="padding2">
<tbody><tr class="nowrap">
<td class="small" valign="top">Standard:</td>
<td style="padding: 0px; width: 15px; min-width: 15px; background-color: rgb(255, 255, 255);"></td><td class="small" style="white-space: normal;">Wybrane</td>

<td style="padding: 0px; width: 15px; min-width: 15px; background-color: rgb(240, 200, 0);"></td><td class="small" style="white-space: normal;">W³asne wioski</td>
<td style="padding: 0px; width: 15px; min-width: 15px; background-color: rgb(0, 0, 244);"></td><td class="small" style="white-space: normal;">W³asne plemiê</td>
<td style="padding: 0px; width: 15px; min-width: 15px; background-color: rgb(150, 150, 150);"></td><td class="small" style="white-space: normal;">Opuszczone wioski</td>
<td style="padding: 0px; width: 15px; min-width: 15px; background-color: rgb(130, 60, 10);"></td><td class="small" style="white-space: normal;">Inne</td>
</tr>

<tr class="nowrap">
<td class="small" valign="top">Plemiê:</td>
<td style="padding: 0px; width: 15px; min-width: 15px; background-color: rgb(0, 160, 244);"></td><td class="small" style="white-space: normal;">Sprzymierzeñcy</td>
<td style="padding: 0px; width: 15px; min-width: 15px; background-color: rgb(128, 0, 128);"></td><td class="small" style="white-space: normal;">Pakty o nieagresji</td>

<td style="padding: 0px; width: 15px; min-width: 15px; background-color: rgb(244, 0, 0);"></td><td class="small" style="white-space: normal;">Wrogowie</td>
<td></td>
<td></td>
</tr>
<?php if (count ( $this->_tpl_vars['odznaczeni'] ) > 0): ?>
	<tr class="nowrap">
		<td class="small" valign="top" colspan="6">W³asne odznaczenia:</td>
	</tr>
	<?php $_from = $this->_tpl_vars['odznaczeni']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['odznaczenie']):
?>
		<tr class="nowrap">
			<td class="small" valign="top" colspan="6">
				<table>
					<tr>
						<td class="small" valign="top">
							<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_player&id=<?php echo $this->_tpl_vars['odznaczenie']['do_gracz_id']; ?>
"/>
								<?php echo $this->_tpl_vars['odznaczenie']['do_gracz_name']; ?>

							</a>
						</td>
						<td class="small" valign="top">
							<div style="background-color: rgb(<?php echo $this->_tpl_vars['odznaczenie']['kolor']; ?>
); background-image: none;">
								 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							</div>
						</td>
						<td class="small" valign="top">
							[<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=map&akcja=usun_gracza&id=<?php echo $this->_tpl_vars['odznaczenie']['id']; ?>
">
								<img src="/ds_graphic/delete_small.png" alt="&raquo; Usun¹æ" title="&raquo; Usun¹æ"/>
							</a>]
						</td>
					</tr>
				</table>
			</td>
		</tr>
	<?php endforeach; endif; unset($_from);  endif; ?>
</tbody></table>
<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=edytuj_kolory_graczy"/>&raquo; Edytowaæ odznaczenia graczy</a>


		</td>
		<td valign="top" style="padding: 0px 10px;">
			<table class="map_container padding2" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']-50; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']-50; ?>
"><img src="/ds_graphic/map/map_nw.png" style="z-index:1; position:relative;" alt=""/></a></td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']-50; ?>
"><img src="/ds_graphic/map/map_n.png" style="z-index:1; position:relative;" alt="map/map_n.png"/></a></td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']+50; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']-50; ?>
"><img src="/ds_graphic/map/map_ne.png" style="z-index:1; position:relative;" alt="map/map_ne.png"/></a></td>
				</tr>
				<tr>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']-50; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']; ?>
"><img src="/ds_graphic/map/map_w.png" style="z-index:1; position:relative;" alt="map/map_w.png"/></a></td>
					
					<td>

						<form method="POST" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=map&action=bigMapOnclick&x=<?php echo $this->_tpl_vars['mapa']['x']; ?>
&y=<?php echo $this->_tpl_vars['mapa']['y']; ?>
">
							<input type="hidden" name="imgwidth" value="<?php echo $this->_tpl_vars['kl_mapa']->minimapy_width; ?>
"/>
							<input type="hidden" name="imgheight" value="<?php echo $this->_tpl_vars['kl_mapa']->minimapy_height; ?>
"/>
							<input type="hidden" name="rozmiar_px_mm" value="<?php echo $this->_tpl_vars['kl_mapa']->minimapy_px; ?>
"/>	
							<div style="position:relative; padding:0px">
								<div style="position:absolute;z-index:100">
									<input type="image" name="minimapa" class="noneStyle" src="/ds_graphic/map/empty.png" style="width:251px;height:250px;margin:0px;padding:0px" />
								</div>
								<img src="graphic/<?php echo $this->_tpl_vars['user']['id']; ?>
.png">
								<div id="bigMapRect" style="z-index:10; position:absolute; top:<?php echo $this->_tpl_vars['bigMapRectTop']; ?>
px; left:<?php echo $this->_tpl_vars['bigMapRectLeft']; ?>
px; width:<?php echo $this->_tpl_vars['mwidth']; ?>
px; height:<?php echo $this->_tpl_vars['mwidth']; ?>
px; border: 1px solid rgb(213, 227, 174);"></div>
							</div>
						</form>
	
					</td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']+50; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']; ?>
"><img src="/ds_graphic/map/map_e.png" style="z-index:1; position:relative;" alt="map/map_e.png"/></a></td>
				</tr>
				<tr>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']-50; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']+50; ?>
"><img src="/ds_graphic/map/map_sw.png" style="z-index:1; position:relative;" alt="map/map_sw.png"/></a></td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']+50; ?>
"><img src="/ds_graphic/map/map_s.png" style="z-index:1; position:relative;" alt="map/map_s.png"/></a></td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']+50; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']+50; ?>
"><img src="/ds_graphic/map/map_se.png" style="z-index:1; position:relative;" alt="map/map_se.png"/></a></td>
				</tr>
			</table>
	
			<br>
			
			<table class="vis padding2" width="100%">
				<tr>
					<th><b>Scentruj mapê:</b></th>
				</tr>
				<tr>
					<td>
						<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map" method="post">
							<table>
								<tr>
									<td>x: <input type="text" name="x" value="<?php echo $this->_tpl_vars['mapa']['x']; ?>
" size="5" /> y: <input type="text" name="y" value="<?php echo $this->_tpl_vars['mapa']['y']; ?>
" size="5" /></td>
									<td><input type="submit" value="> OK <" style="font-size: 10pt;" /></td>
								</tr>
							</table>
						</form>
					</td>
				</tr>
			</table>

			<br>

			<table class="vis padding2" width="100%">
				<tr>
					<th><b>Rozmiar mapy:</b></th>
				</tr>
				<tr>
					<td>
						<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&action=zapisz_rozmiar_mapy" method="post">
							<table class="vis" width="100%">
								<tr>
									<td width="50%">
										<center>
											<select name="map_size" style="width: 80%;">
												<option label="7x7" value="7" <?php if ($this->_tpl_vars['user']['map_size'] == 7): ?>selected="selected"<?php endif; ?>>7x7</option>
												<option label="9x9" value="9" <?php if ($this->_tpl_vars['user']['map_size'] == 9): ?>selected="selected"<?php endif; ?>>9x9</option>
												<option label="11x11" value="11" <?php if ($this->_tpl_vars['user']['map_size'] == 11): ?>selected="selected"<?php endif; ?>>11x11</option>
												<option label="13x13" value="13" <?php if ($this->_tpl_vars['user']['map_size'] == 13): ?>selected="selected"<?php endif; ?>>13x13</option>
												<option label="15x15" value="15" <?php if ($this->_tpl_vars['user']['map_size'] == 15): ?>selected="selected"<?php endif; ?>>15x15</option>
												<option label="19x19" value="19" <?php if ($this->_tpl_vars['user']['map_size'] == 19): ?>selected="selected"<?php endif; ?>>19x19</option>
												<option label="23x23" value="23" <?php if ($this->_tpl_vars['user']['map_size'] == 23): ?>selected="selected"<?php endif; ?>>23x23</option>
												<option label="31x31" value="31" <?php if ($this->_tpl_vars['user']['map_size'] == 31): ?>selected="selected"<?php endif; ?>>31x31</option>
											</select>
										</center>
									</td>
									<td width="50%">
										<center>
											<input type="submit" value="> OK <" style="font-size: 10pt; width: 80%;"/>
										</center>
									</td>
								</tr>
							</table>
						</form>
					</td>
				</tr>
			</table>
			
			<br>
			
			<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=map&action=save_map_options" method="POST">
				<table class="vis padding2" width="100%">
					<tr>
						<th><b>Opcje pop-up mapy:</b></th>
					</tr>
					<?php $_from = $this->_tpl_vars['settings_arr']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['name']):
?>
						<tr>
							<td>
								<input name="<?php echo $this->_tpl_vars['dbname']; ?>
" type="checkbox" <?php if ($this->_tpl_vars['map_settings'][$this->_tpl_vars['dbname']]): ?>checked="checked"<?php endif; ?>>
								&nbsp;<?php echo $this->_tpl_vars['name']; ?>

							</td>
						</tr>
					<?php endforeach; endif; unset($_from); ?>
					<tr>
						<td>
							<input name="sub" type="submit" value="zapisaæ"/>
						</td>
					</tr>
				</table>
			</form>
		</td>
	</tr>
</table>

<script type="text/javascript">
var speed = new Array();

<?php if ($this->_tpl_vars['map_settings']['map_show_runtimes']): ?>	
	<?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname']):
?>
		speed['<?php echo $this->_tpl_vars['dbname']; ?>
'] = <?php echo ($this->_tpl_vars["config"]["movement_speed"] / $this->_tpl_vars["config"]["speed"]) * $this->_tpl_vars["cl_units"]->get_speed($this->_tpl_vars["dbname"]); ?>;
	<?php endforeach; endif; unset($_from);  endif; ?>

<?php if ($this->_tpl_vars['map_settings']['map_show_mule_runtimes']): ?>
	speed['donkey'] = <?php echo ($this->_tpl_vars["config"]["dealer_time"] * 60) / $this->_tpl_vars["config"]["speed"]; ?>;
<?php endif; ?>
lang['POINTS'] = 'Punkty';
lang['OWNER'] = 'W³aœciciel';
lang['LEFT'] = 'Opuszczona osada';
lang['ALLY'] = 'Plemiê';
lang['MORAL'] = 'Morale';
lang['GROUPS'] = 'Grupy';
kaMap = new KAMap('/ds_graphic/', <?php if ($this->_tpl_vars['config']['snob_range'] != "-1"):  echo $this->_tpl_vars['config']['snob_range'];  else: ?>5000<?php endif; ?>);
</script>