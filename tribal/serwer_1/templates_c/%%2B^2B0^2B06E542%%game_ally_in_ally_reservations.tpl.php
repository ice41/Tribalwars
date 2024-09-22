<?php /* Smarty version 2.6.14, created on 2014-07-06 22:36:51
         compiled from game_ally_in_ally_reservations.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'number_format', 'game_ally_in_ally_reservations.tpl', 220, false),)), $this); ?>
<?php if ($this->_tpl_vars['show_res_log']): ?>
	<div id="noblelog_filter">
		<p>Kliknij jeden z linków, aby wyœwietliæ jedynie te pozycje, które ciê interesuj¹.</p>
		<p>Wpisy w dzienniku dotycz¹ jedynie ostatnich 5 dni.</p>
	</div>

	<table class="vis" style="width: 100%;">
		<tbody>
			<tr>
				<th width="150">Data</th>
				<th width="200">Nazwa wioski</th>
				<th width="200">Gracz</th>
				<th width="200">Akcja</th>
			</tr>
			<?php $_from = $this->_tpl_vars['game_rezerwacje_log']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['rezerwacja']):
?>
				<tr>
					<td><?php echo $this->_tpl_vars['pl']->pl_date($this->_tpl_vars['rezerwacja']['last_edit']); ?>
</td>
					<td><?php echo $this->_tpl_vars['rezerwacja']['link']; ?>
</td>
					<td>
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['rezerwacja']['od_gracza']; ?>
"><?php echo $this->_tpl_vars['rezerwacja']['od_gname']; ?>
</a> [<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=<?php echo $this->_tpl_vars['rezerwacja']['plemie']; ?>
"><?php echo $this->_tpl_vars['rezerwacja']['od_allyname']; ?>
</a>]
					</td>
					<td>
					<?php if ($this->_tpl_vars['rezerwacja']['proces'] == 0): ?>
						Zarezerwowane
					<?php endif; ?>
					<?php if ($this->_tpl_vars['rezerwacja']['proces'] == 1): ?>
						Wygas³o
					<?php endif; ?>
					<?php if ($this->_tpl_vars['rezerwacja']['proces'] == 2): ?>
					 	Usuniêto
					<?php endif; ?>
					<?php if ($this->_tpl_vars['rezerwacja']['proces'] == 3): ?>
						Zrealizowane
					<?php endif; ?>
					</td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
		</tbody>
	</table>
	<br>
	<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=reservations&rlog=0">» Wróæ do planera podbojów</a>
<?php else: ?>
	<script type="text/javascript" src="ScriptAPI.js?1321542728"></script>

	<div style="width: 98%; position: relative; left: 10px;">
		<div id="reservation_info">
			<table>
				<tr>
					<td valign="top" width="200">
						<div id="settings">
							<h4>Ustawienia</h4>
							<div id="limit_info">
								<p>
									Limit rezerwacji: <?php echo $this->_tpl_vars['reservations_maxcount']; ?>
 wiosek<br>Limit czasu: <?php echo $this->_tpl_vars['reservations_maxday']; ?>
 dni
								</p>
								<?php if ($this->_tpl_vars['is_user_admin']): ?>
									<p id="edit_reservation">
										<span style="font-weight:bold; color: #804000; cursor: pointer;" onclick="switchDisplay('limit_info');switchDisplay('limit_edit')">» Edytuj ustawienia</span>
									</p>
								<?php endif; ?>
							</div>
						
							<?php if ($this->_tpl_vars['is_user_admin']): ?>
								<div id="limit_edit" style="display:none;">
									<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=reservations&amp;action=save_reservation_settings&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
&page=<?php echo $this->_tpl_vars['aktupage']; ?>
&sort=<?php echo $this->_tpl_vars['sort']; ?>
&order=<?php echo $this->_tpl_vars['order']; ?>
&filter=<?php echo $this->_tpl_vars['filter']; ?>
" method="post">
										<p>
											<label for="reservation_limit">Limit rezerwacji:</label>
											<input id="reservation_limit" name="reservation_limit" value="<?php echo $this->_tpl_vars['reservations_maxcount']; ?>
" size="3" type="text"><br>
											<label for="reservation_time">Limit czasu:</label>
											<input id="reservation_time" name="reservation_time" value="<?php echo $this->_tpl_vars['reservations_maxday']; ?>
" size="3" type="text"><br>
										</p>
										<p>

											<input value="Zmieñ" type="submit">
											<input value="Anuluj" onclick="switchDisplay('limit_info');switchDisplay('limit_edit')" type="button">
										</p>
									</form>
								</div>
							<?php endif; ?>
						</div>
					</td>
					<td valign="top" width="300">
						<div id="partners">
							<h4>Dzielisz planer podbojów z:</h4>
							<?php if (count ( $this->_tpl_vars['partners'] ) > 0): ?>
								<table>
									<?php $_from = $this->_tpl_vars['partners']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['partner']):
?>
										<tr>
											<td>
												<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_ally&id=<?php echo $this->_tpl_vars['partner']['do_plemienia']; ?>
"/>
													<?php echo $this->_tpl_vars['partner']['nazwa']; ?>
&nbsp;[<?php echo $this->_tpl_vars['partner']['skrot']; ?>
]&nbsp;&nbsp;&nbsp;&nbsp;
												</a>
											</td>
											<td>
												<?php if ($this->_tpl_vars['is_user_admin']): ?>
													<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=ally&mode=reservations&action=del_partner&h=<?php echo $this->_tpl_vars['hkey']; ?>
&id=<?php echo $this->_tpl_vars['partner']['id']; ?>
&page=<?php echo $this->_tpl_vars['aktupage']; ?>
&sort=<?php echo $this->_tpl_vars['sort']; ?>
&order=<?php echo $this->_tpl_vars['order']; ?>
&filter=<?php echo $this->_tpl_vars['filter']; ?>
"/>
														Zakoñcz
													</a>
												<?php endif; ?>
											</td>
										</tr>
									<?php endforeach; endif; unset($_from); ?>
								</table>
							<?php endif; ?>
							<?php if ($this->_tpl_vars['is_user_admin']): ?>
								<p id="edit_partners">
									<span style="font-weight:bold; color: #804000; cursor: pointer;" onclick="switchDisplay('event_zpr_disp')">» Edytuj partnerów</a>
								</p>
								<div id="event_zpr_disp" style="display:none;position:absolute;">
									<div style="width: 300px;">
										<table collspacing="0" collpadding="0" class="<?php if ($this->_tpl_vars['graphic'] == '1'): ?>content-border<?php else: ?>main<?php endif; ?>" id="partners_open">
											<tr>
												<th>
													<span style="font-weight:bold; color: #804000; cursor: pointer;" onclick="switchDisplay('event_zpr_disp')">Zamkn¹æ</a>
												</th>
											</tr>
											<tr>
												<td>
													<h4 style="margin-top: 2px;">Zaproœ nowe plemiê do planera podbojów</h4>
													<p>Wpisz skrótow¹ nazwê plemienia, z którym ma byæ wspó³dzielony planer podbojów:</p>
													<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=reservations&amp;action=add_partner&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
&page=<?php echo $this->_tpl_vars['aktupage']; ?>
&sort=<?php echo $this->_tpl_vars['sort']; ?>
&order=<?php echo $this->_tpl_vars['order']; ?>
&filter=<?php echo $this->_tpl_vars['filter']; ?>
" method="POST">
														<input maxlength="6" name="partner_ally" type="text">
														<input value="Dodaj" type="submit">
													</form>
													<br><br>
												</td>
											</tr>
										</table>
									</div>
								</div>
							<?php endif; ?>
						</div>
					</td>
				</tr>
			</table>
		</div>
	
		<?php if (! empty ( $this->_tpl_vars['err'] )): ?>
			<font class="error"/><?php echo $this->_tpl_vars['err']; ?>
</font>
		<?php endif; ?>
				
		<div id="reservations">
			<div style="padding-bottom: 3px;" align="center">
				<div class="groups">
					Filtruj rezerwacje: 
					<?php if ($this->_tpl_vars['filter'] == 'own'): ?>
							<b>&gt;Twoje&lt;</b>
					<?php else: ?>
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=reservations&sort=<?php echo $this->_tpl_vars['sort']; ?>
&order=<?php echo $this->_tpl_vars['order']; ?>
&filter=own">
							[Twoje]
						</a>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['filter'] == 'own_ally'): ?>
						<b>&gt;Plemiê&lt;</b>
					<?php else: ?>
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=reservations&sort=<?php echo $this->_tpl_vars['sort']; ?>
&order=<?php echo $this->_tpl_vars['order']; ?>
&filter=own_ally">
							[Plemiê]
						</a>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['filter'] == 'other_ally'): ?>
						<b>&gt;Sprzymierzeñcy&lt;</b>
					<?php else: ?>
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=reservations&sort=<?php echo $this->_tpl_vars['sort']; ?>
&order=<?php echo $this->_tpl_vars['order']; ?>
&filter=other_ally">
							[Sprzymierzeñcy]
						</a>
					<?php endif; ?>
					<?php if ($this->_tpl_vars['filter'] == 'all'): ?>
						<b>&gt;Wszystkie&lt;</b>
					<?php else: ?>
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=reservations&sort=<?php echo $this->_tpl_vars['sort']; ?>
&order=<?php echo $this->_tpl_vars['order']; ?>
&filter=all">
							[Wszystkie]
						</a>
					<?php endif; ?>
				</div>								
			</div>
						
			<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=reservations&amp;action=submit&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
&page=<?php echo $this->_tpl_vars['aktupage']; ?>
&sort=<?php echo $this->_tpl_vars['sort']; ?>
&order=<?php echo $this->_tpl_vars['order']; ?>
&filter=<?php echo $this->_tpl_vars['filter']; ?>
" method="post">
				<table class="vis" style="width: 100%;">
					<?php if ($this->_tpl_vars['sekcja_rezerwacje']): ?>
						<thead>
							<tr>
								<td colspan="9"/><?php echo $this->_tpl_vars['sekcja_rezerwacje_content']; ?>
</td>
							</tr>
						</thead>
					<?php endif; ?>
					<thead>
						<tr class="nowrap">
							<th><img src="/ds_graphic/delete.png" title="Usuñ kilka naraz" alt="Usuñ kilka naraz"></th>
							<th>Nazwa wioski</th>
							<th>Punkty</th>
							<th>W³aœciciel</th>
							<th>Rezerwacja dokonana przez 
								<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=reservations&amp;page=<?php echo $this->_tpl_vars['aktupage']; ?>
&amp;sort=od_gname&amp;order=ASC&filter=<?php echo $this->_tpl_vars['filter']; ?>
">
									<img src="/ds_graphic/oben.png" alt="Sortuj rosn¹co" title="Sortuj rosn¹co">
								</a> 
								<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=reservations&amp;page=<?php echo $this->_tpl_vars['aktupage']; ?>
&amp;sort=od_gname&amp;order=DESC&filter=<?php echo $this->_tpl_vars['filter']; ?>
">
									<img src="/ds_graphic/unten.png" alt="Sortuj malej¹co" title="Sortuj malej¹co">
								</a>
							</th>
							<th>Data wygaœniêcia 
								<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=reservations&amp;page=<?php echo $this->_tpl_vars['aktupage']; ?>
&amp;sort=koniec&amp;order=ASC&filter=<?php echo $this->_tpl_vars['filter']; ?>
">
									<img src="/ds_graphic/oben.png" alt="Sortuj rosn¹co" title="Sortuj rosn¹co">
								</a> 
								<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=reservations&amp;page=<?php echo $this->_tpl_vars['aktupage']; ?>
&amp;sort=koniec&amp;order=DESC&filter=<?php echo $this->_tpl_vars['filter']; ?>
">
									<img src="/ds_graphic/unten.png" alt="Sortuj malej¹co" title="Sortuj malej¹co">
								</a>
							</th>
							<th></th>
						</tr>
					</thead>
					<tfoot>
						<?php $_from = $this->_tpl_vars['rezerwacje']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['info']):
?>
								<tr id="reservation_<?php echo $this->_tpl_vars['info']['id']; ?>
">
								<td>
									<?php if ($this->_tpl_vars['is_user_admin'] && $this->_tpl_vars['info']['od_plemienia'] == $this->_tpl_vars['user']['ally']): ?>
										<input name="ids[]" value="<?php echo $this->_tpl_vars['info']['id']; ?>
" type="checkbox">
									<?php endif; ?>
								</td>
								<td><?php echo $this->_tpl_vars['info']['link']; ?>
</td>
								<td><?php echo ((is_array($_tmp=$this->_tpl_vars['info']['village']['points'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</td>
								<td>
									<?php if (! empty ( $this->_tpl_vars['info']['owner_name'] )): ?>
										<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['info']['village']['userid']; ?>
"/><?php echo $this->_tpl_vars['info']['owner_name']; ?>
</a>
									<?php endif; ?>
								</td>
								<td>
									<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['info']['od_gracza']; ?>
"><?php echo $this->_tpl_vars['info']['od_gname']; ?>
</a> [<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=<?php echo $this->_tpl_vars['info']['od_plemienia']; ?>
"><?php echo $this->_tpl_vars['info']['od_allyname']; ?>
</a>]
								</td>

								<td><?php echo $this->_tpl_vars['pl']->pl_date($this->_tpl_vars['info']['koniec']); ?>
</td>
								<td style="white-space: nowrap;">
									<img src="/ds_graphic/show_comment_disabled.png" alt="Brak komentarzy" title="Brak komentarzy">
									<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['info']['village']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['info']['village']['y']; ?>
">
										<img src="/ds_graphic/map_center.png" alt="Scentruj mapê" title="Scentruj mapê">
									</a>
									<?php if ($this->_tpl_vars['is_user_admin']): ?>
										<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=reservations&amp;action=delete_reservations&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
&amp;id=<?php echo $this->_tpl_vars['info']['id']; ?>
&page=<?php echo $this->_tpl_vars['aktupage']; ?>
&sort=<?php echo $this->_tpl_vars['sort']; ?>
&order=<?php echo $this->_tpl_vars['order']; ?>
&filter=<?php echo $this->_tpl_vars['filter']; ?>
">
											<img src="/ds_graphic/delete.png" alt="Skasuj" title="Skasuj">
										</a>
									<?php endif; ?>
								</td>
							</tr>
						<?php endforeach; endif; unset($_from); ?>
						<?php if ($this->_tpl_vars['is_user_admin']): ?>
							<tr>
								<td>
									<?php if ($this->_tpl_vars['is_user_admin']): ?>
										<input name="all" onclick="selectAll(this.form, this.checked)" type="checkbox">
									<?php endif; ?>
								</td>
								<td>
									<?php if ($this->_tpl_vars['is_user_admin']): ?>
										<input name="delete_claims" value="Usuñ zaznaczone" onclick="return confirm('Czy na pewno chcesz anulowaæ wybrane rezerwacje?')" type="submit">
									<?php endif; ?>
								</td>
								<td colspan="3" align="center">
								</td>
								<td colspan="2"></td>
							</tr>
						<?php endif; ?>
					</tfoot>
				</table>
			</form>
		
			<div>
			
				<div style="float: left;">
					<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=reservations&rlog=1">» Poka¿ dziennik</a>
				</div>
				
				<div style="float: right;">
					<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=reservations&amp;action=save_page_size&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
&page=<?php echo $this->_tpl_vars['aktupage']; ?>
&sort=<?php echo $this->_tpl_vars['sort']; ?>
&order=<?php echo $this->_tpl_vars['order']; ?>
&filter=<?php echo $this->_tpl_vars['filter']; ?>
" method="post">
						<label for="reservation_page_size">Liczba rezerwacji na stronê:</label>
						<input name="reservation_page_size" value="<?php echo $this->_tpl_vars['user']['rezerwacje_nstr']; ?>
" size="3" type="text">
						<input value="OK" type="submit">
					</form>
				</div>
			
			</div>
		
			<br style="clear: both;">
		
			<div id="add_reservations" style="float: left;">
				<h4>Dodaj now¹ rezerwacjê</h4>

				<form name="rezerwacje" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=reservations&amp;action=new_reservations&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
					<input type="hidden" value="none" name="typ_akcji"/>
					<p class="add_village_reservation">
						<?php if ($this->_tpl_vars['double_reservations']): ?>
							<?php $_from = $this->_tpl_vars['reservations_vals']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
?>
								<p class="add_village_reservation">
									x:<input size="5" name="x[]" type="text" value="<?php echo $this->_tpl_vars['array']['x']; ?>
" maxlength="3">
									y:<input size="5" name="y[]" type="text" value="<?php echo $this->_tpl_vars['array']['y']; ?>
" maxlength="3">
								</p>
							<?php endforeach; endif; unset($_from); ?>
							<?php if ($this->_tpl_vars['add_new']): ?>
								<p class="add_village_reservation">
									x:<input size="5" name="x[]" type="text" maxlength="3">
									y:<input size="5" name="y[]" type="text" maxlength="3">
								</p>
							<?php endif; ?>
						<?php else: ?>
							<p class="add_village_reservation">
								x:<input size="5" name="x[]" type="text" maxlength="3" value="<?php echo $this->_tpl_vars['xval']; ?>
">
								y:<input size="5" name="y[]" type="text" maxlength="3" value="<?php echo $this->_tpl_vars['yval']; ?>
">
							</p>
						<?php endif; ?>
					</p>
					
					<span style="font-weight:bold; color: #804000; cursor: pointer;" onclick="insertUnit(document.forms['rezerwacje'].typ_akcji,'add_new');document.forms['rezerwacje'].submit();">
						<img src="/ds_graphic/plus.png" alt="Dodaj nastêpn¹ rezerwacjê" title="Dodaj nastêpn¹ rezerwacjê">
						Dodaj nastêpn¹ rezerwacjê
					</span>
					
					<p>
						<input id="save_reservations" value="Zarezerwuj wioskê" onclick="insertUnit(document.forms['rezerwacje'].typ_akcji,'add_reserv');" type="submit">
					</p>
				</form>
			</div>
			
			<div id="reservation_search" style="float: left; padding-left: 49px;">
				<h4>Szukaj rezerwacji</h4>
				<form name="szukaj_rezerwacji" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=reservations" method="post">
					<input value="false" name="reservation_search_coords" type="hidden">
				
					<span id="search_village_else">
						<input id="search_village_text" size="20" name="filter" type="text">
					</span>
				
					<span id="search_village_coords" style="display: none;">
						x:<input id="input_search_coords_x" size="5" name="x" maxlength="3" type="text">
						y:<input id="input_search_coords_y" size="5" name="y" maxlength="3" type="text">
					</span>
				
					<select id="group_id" name="group_id">
						<optgroup label="Wioska">
							<option value="village_name" onclick="insertUnit(document.forms['szukaj_rezerwacji'].reservation_search_coords,'false');switchon('search_village_else');switchoff('search_village_coords');">Nazwa</option>
							<option value="village_coords" onclick="insertUnit(document.forms['szukaj_rezerwacji'].reservation_search_coords,'true');switchoff('search_village_else');switchon('search_village_coords');">Wspó³rzêdne</option>
						</optgroup>
						<optgroup label="Gracz">
							<option value="creator_name" onclick="insertUnit(document.forms['szukaj_rezerwacji'].reservation_search_coords,'false');switchon('search_village_else');switchoff('search_village_coords');">Rezerwacja dokonana przez</option>
							<option value="owner_name" onclick="insertUnit(document.forms['szukaj_rezerwacji'].reservation_search_coords,'false');switchon('search_village_else');switchoff('search_village_coords');">W³aœciciel</option>
						</optgroup>
						<optgroup label="Skrót nazwy plemienia">

							<option value="creator_ally_tag" onclick="insertUnit(document.forms['szukaj_rezerwacji'].reservation_search_coords,'false');switchon('search_village_else');switchoff('search_village_coords');">Rezerwacja dokonana przez</option>
							<option value="owner_ally_tag" onclick="insertUnit(document.forms['szukaj_rezerwacji'].reservation_search_coords,'false');switchon('search_village_else');switchoff('search_village_coords');">W³aœciciel</option>
						</optgroup>
					</select>
					<br>
					<input name="search_reservations_is" value="Szukaj" style="margin-top: 4px;" type="submit">
				</form>
			</div>
			<br style="clear: both;">
		</div>
	</div>
<?php endif; ?>