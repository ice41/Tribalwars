<?php /* Smarty version 2.6.14, created on 2012-01-30 13:41:36
         compiled from game_map.tpl */ ?>
<div id="info" style="position:absolute; width:400px; height:1px; visibility: hidden; z-index:10;">
<table class="vis padding3" style="background-color: #F0E6C8">
<tr id="info_bonus_image_row" ><td rowspan="7"><img id="image" src="" alt=""/></td></tr>
<tr><th id="info_title" colspan="2">title</th></tr>
<tr id="info_bonus_row" style="display: none;"><td colspan="2" id="text_bonus" style="font-weight:bold;">text_bonus</td></tr>
<tr><td>Punkty:</td><td id="info_points">points</td></tr>
<tr id="info_owner_row"><td>W³aœciciel:</td><td id="info_owner">owner</td></tr>
<tr id="info_left_row"><td colspan="2">Opuszczona</td></tr>
<tr id="info_ally_row"><td>Plemiê:</td><td id="info_ally">ally</td></tr>
<tr id="info_village_groups_row"><td>Grupa:</td><td id="info_village_groups">village_groups</td></tr>
</table>
</div>

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
"><img src="graphic/map/map_nw.png" style="z-index:1; position:relative;" alt=""/></a></td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']-$this->_tpl_vars['mapa']['polowa']; ?>
"><img src="graphic/map/map_n.png" style="z-index:1; position:relative;" alt="map/map_n.png"/></a></td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']+$this->_tpl_vars['mapa']['polowa']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']-$this->_tpl_vars['mapa']['polowa']; ?>
"><img src="graphic/map/map_ne.png" style="z-index:1; position:relative;" alt="map/map_ne.png"/></a></td>
				</tr>
				<tr>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']-$this->_tpl_vars['mapa']['polowa']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']; ?>
"><img src="graphic/map/map_w.png" style="z-index:1; position:relative;" alt="map/map_w.png"/></a></td>
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
"><img src="graphic/map/<?php echo $this->_tpl_vars['kl_mapa']->get_krzak_typ($this->_tpl_vars['impl_coord']); ?>
" alt="" /></td>
											<?php else: ?>
												<?php if ($this->_tpl_vars['kl_mapa']->is_trawa($this->_tpl_vars['impl_coord'])): ?>
													<td id="tile_<?php echo $this->_tpl_vars['x']; ?>
_<?php echo $this->_tpl_vars['y']; ?>
" style="<?php echo $this->_tpl_vars['kl_mapa']->get_style($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
"><img src="graphic/map/<?php echo $this->_tpl_vars['kl_mapa']->get_trawa_typ($this->_tpl_vars['impl_coord']); ?>
" alt="" /></td>
												<?php else: ?>
													<td id="tile_<?php echo $this->_tpl_vars['x']; ?>
_<?php echo $this->_tpl_vars['y']; ?>
" style="<?php echo $this->_tpl_vars['kl_mapa']->get_style($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
"><img src="graphic/map/gras1.png" alt="" /></td>
												<?php endif; ?>
											<?php endif; ?>
										<?php else: ?>
											<td id="tile_<?php echo $this->_tpl_vars['x']; ?>
_<?php echo $this->_tpl_vars['y']; ?>
" style="<?php echo $this->_tpl_vars['kl_mapa']->get_color($this->_tpl_vars['impl_coord'],$this->_tpl_vars['village']['id'],$this->_tpl_vars['user']['id'],$this->_tpl_vars['user']['ally']);  echo $this->_tpl_vars['kl_mapa']->get_style($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['kl_mapa']->get_vid($this->_tpl_vars['impl_coord']); ?>
"><img src="graphic/map/<?php echo $this->_tpl_vars['kl_mapa']->grafika_osady($this->_tpl_vars['impl_coord']); ?>
" onmouseover="map_popup('<?php echo $this->_tpl_vars['kl_mapa']->get_osada_name($this->_tpl_vars['impl_coord']); ?>
 (<?php echo $this->_tpl_vars['x']; ?>
|<?php echo $this->_tpl_vars['y']; ?>
) K<?php echo $this->_tpl_vars['kl_mapa']->get_continent($this->_tpl_vars['impl_coord']); ?>
', <?php echo $this->_tpl_vars['kl_mapa']->get_points($this->_tpl_vars['impl_coord']); ?>
, <?php echo $this->_tpl_vars['kl_mapa']->get_player_info($this->_tpl_vars['impl_coord']); ?>
, <?php echo $this->_tpl_vars['kl_mapa']->get_ally_info($this->_tpl_vars['impl_coord']); ?>
, false, '<?php echo $this->_tpl_vars['kl_mapa']->get_bonus_image($this->_tpl_vars['impl_coord']); ?>
', '<?php echo $this->_tpl_vars['kl_mapa']->get_bonus_text($this->_tpl_vars['impl_coord']); ?>
', '<?php echo $this->_tpl_vars['graphic']; ?>
')" onmouseout="map_kill()" alt="" /></a></td>
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
"><img src="graphic/map/map_e.png" style="z-index:1; position:relative;" alt="map/map_e.png"/></a></td>
				</tr>
				<tr>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']-$this->_tpl_vars['mapa']['polowa']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']+$this->_tpl_vars['mapa']['polowa']; ?>
"><img src="graphic/map/map_sw.png" style="z-index:1; position:relative;" alt="map/map_sw.png"/></a></td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']+$this->_tpl_vars['mapa']['polowa']; ?>
"><img src="graphic/map/map_s.png" style="z-index:1; position:relative;" alt="map/map_s.png"/></a></td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']+$this->_tpl_vars['mapa']['polowa']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']+$this->_tpl_vars['mapa']['polowa']; ?>
"><img src="graphic/map/map_se.png" style="z-index:1; position:relative;" alt="map/map_se.png"/></a></td>
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

</tbody></table>
<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=edytuj_kolory_graczy"/>&raquo; Edytowaæ odznaczenia graczy</a>

<?php if (count ( $this->_tpl_vars['odznaczeni'] ) > 0): ?>
	<br>
	<br>
	<table class="vis" width="540">
		<tr>
		    <th>Zaznaczony gracz</th>
			<th>Kolor</th>
		</tr>
		<?php $_from = $this->_tpl_vars['odznaczeni']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['odznaczenie']):
?>
		    <tr>
		        <td>
					<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_player&id=<?php echo $this->_tpl_vars['odznaczenie']['do_gracz_id']; ?>
"/><?php echo $this->_tpl_vars['odznaczenie']['do_gracz_name']; ?>
</a>
				</td>
				<td>
					<center><div style="height:15px;width:200px;margin-top:1px;margin-left:6px; background: rgb(<?php echo $this->_tpl_vars['odznaczenie']['kolor']; ?>
);"/></center>
				</td>
		    </tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>
<?php endif; ?>
		</td>
		<td valign="top" style="padding: 0px 10px;">
			<table class="map_container padding2" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']-50; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']-50; ?>
"><img src="graphic/map/map_nw.png" style="z-index:1; position:relative;" alt=""/></a></td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']-50; ?>
"><img src="graphic/map/map_n.png" style="z-index:1; position:relative;" alt="map/map_n.png"/></a></td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']+50; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']-50; ?>
"><img src="graphic/map/map_ne.png" style="z-index:1; position:relative;" alt="map/map_ne.png"/></a></td>
				</tr>
				<tr>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']-50; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']; ?>
"><img src="graphic/map/map_w.png" style="z-index:1; position:relative;" alt="map/map_w.png"/></a></td>
					
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
									<input type="image" name="minimapa" class="noneStyle" src="graphic/map/empty.png" style="width:251px;height:250px;margin:0px;padding:0px" />
								</div>
								<img src="graphic/continent/<?php echo $this->_tpl_vars['user']['id']; ?>
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
"><img src="graphic/map/map_e.png" style="z-index:1; position:relative;" alt="map/map_e.png"/></a></td>
				</tr>
				<tr>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']-50; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']+50; ?>
"><img src="graphic/map/map_sw.png" style="z-index:1; position:relative;" alt="map/map_sw.png"/></a></td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']+50; ?>
"><img src="graphic/map/map_s.png" style="z-index:1; position:relative;" alt="map/map_s.png"/></a></td>
					<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['mapa']['x']+50; ?>
&amp;y=<?php echo $this->_tpl_vars['mapa']['y']+50; ?>
"><img src="graphic/map/map_se.png" style="z-index:1; position:relative;" alt="map/map_se.png"/></a></td>
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
		</td>
	</tr>
</table>
