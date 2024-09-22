<?php /* Smarty version 2.6.14, created on 2014-07-06 22:30:00
         compiled from game_ally_in_ally_properties.tpl */ ?>
<table cellspacing="0">
	<tr>
		<td valign="top">
			<?php if ($this->_tpl_vars['user']['ally_found'] == 1): ?>
				<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=properties&amp;action=change&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
					<table class="vis" width="100%">
						<tr>
							<th colspan="2">W³aœciwoœci</th>
						</tr>
						<tr>
							<td>Nazwa plemienia:</td>
							<td><input type="text" name="name" value="<?php echo $this->_tpl_vars['ally']['name']; ?>
" /></td>
						</tr>
						<tr>
							<td width="140">Skrót (maksymalnie szeœæ znaków):</td>
							<td><input type="text" name="tag" maxlength="6" value="<?php echo $this->_tpl_vars['ally']['short']; ?>
" /></td>
						</tr>
						<tr>
							<td width="140">Strona internetowa:</td>
							<td><input type="text" name="homepage" maxlength="128" size="50"  value="<?php echo $this->_tpl_vars['ally']['homepage']; ?>
" /></td>
						</tr>
						<tr>
							<td width="140">Kana³ IRC:</td>
							<td><input type="text" name="irc-channel" maxlength="128" size="50"  value="<?php echo $this->_tpl_vars['ally']['irc']; ?>
" /></td>
						</tr>
						<tr>
							<td colspan="2"><input type="submit" value="Zapisz" /></td>
						</tr>
					</table>
				</form>

				<table class="vis" width="100%">
					<tr>
						<th>Rozwi¹¿ plemiê</th>
					</tr>
					<tr>
						<td><a href="javascript:ask('Czy chcesz na pewno rozwi¹zaæ w³asne plemiê?', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=properties&amp;action=close_ally&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
')">Rozwi¹¿ plemiê</a></td>
					</tr>
				</table>
			<?php endif; ?>

		</td>
		<td valign="top" width="400">
			<?php if ($this->_tpl_vars['user']['ally_diplomacy'] == 1): ?>
				<?php if (! empty ( $this->_tpl_vars['previews'] )): ?>
					<table class="vis" width="100%">
						<tr><th colspan="2">Podgl¹d</th></tr>
						<tr><td colspan="2" align="center"><?php echo $this->_tpl_vars['previews']; ?>
</td></tr>
					</table>
				<?php endif; ?>

				<script type="text/javascript">
					function bbEdit() {
						gid("show_row").style.display = 'none';
						gid("edit_link").style.display = 'none';
						gid("bb_row").style.display = '';
						gid("edit_row").style.display = '';
						gid("submit_row").style.display = '';
					}
				</script>

				<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=properties&amp;action=change_description&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post" name="edit_profile">
					<table class="vis" width="100%">
						<tr>
							<th colspan="2" width="100%">Opis</th>
						</tr>
						<tr id="show_row" align="center">
							<td colspan="2"><?php echo $this->_tpl_vars['ally_desc']; ?>
</td>
						</tr>
						<tr valign="top" id="bb_row">
							<td colspan="2">													
								<div id="bb_bar" style="overflow: visible; text-align: left;">
									<a id="bb_button_bold" title="Pogrubienie" href="#" onclick="BBCodes.insert('[b]', '[/b]');return false;">
										<img src="/ds_graphic/bb/bb_b.png"/>
									</a>
								
									<a id="bb_button_italic" title="Kursywa" href="#" onclick="BBCodes.insert('[i]', '[/i]');return false;">
										<img src="/ds_graphic/bb/bb_i.png"/>
									</a>
								
									<a id="bb_button_underline" title="Podkreœlenie" href="#" onclick="BBCodes.insert('[u]', '[/u]');return false;">
										<img src="/ds_graphic/bb/bb_u.png"/>
									</a>
								
									<a id="bb_button_strikethrough" title="Przekreœlenie" href="#" onclick="BBCodes.insert('[s]', '[/s]');return false;">
										<img src="/ds_graphic/bb/bb_s.png"/>
									</a>
								
									<a id="bb_button_quote" title="Cytat" href="#" onclick="BBCodes.insert('[quote=Author]', '[/quote]');return false;">
										<img src="/ds_graphic/bb/bb_quote.png"/>
									</a>
								
									<a id="bb_button_url" title="Link" href="#" onclick="BBCodes.insert('[url]', '[/url]');return false;">
										<img src="/ds_graphic/bb/bb_url.png"/>
									</a>
								
									<a id="bb_button_spoiler" title="Spoiler" href="#" onclick="BBCodes.insert('[spoiler]', '[/spoiler]');return false;">
										<img src="/ds_graphic/bb/bb_spoiler.png"/>
									</a>
								
									<a id="bb_button_player" title="Gracz" href="#" onclick="BBCodes.insert('[player]', '[/player]');return false;">
										<img src="/ds_graphic/bb/bb_player.png"/>
									</a>
								
									<a id="bb_button_tribe" title="Plemiê" href="#" onclick="BBCodes.insert('[ally]', '[/ally]');return false;">
										<img src="/ds_graphic/bb/bb_ally.png"/>
									</a>
								
									<a id="bb_button_coord" title="Koordynaty" href="#" onclick="BBCodes.insert('[coord]', '[/coord]');return false;">
										<img src="/ds_graphic/bb/bb_coords.png"/>
									</a>
									
									<a id="bb_button_size" title="Rozmiary czcionek" href="#" onclick="$('#bb_sizes').slideToggle(); BBCodes.placePopups(); return false;">
										<img src="/ds_graphic/bb/bb_size.png"/>
									</a>
								
									<a id="bb_button_report_display" title="Raport" href="#" onclick="BBCodes.insert('[report_display]', '[/report_display]');return false;">
										<img src="/ds_graphic/bb/bb_report_display.png"/>
									</a>
								
									<a id="bb_button_color" title="Kolor" href="#" onclick="BBCodes.colorPickerToggle(); BBCodes.placePopups(); return false">
										<img src="/ds_graphic/bb/bb_color.png"/>
									</a>
								
									<a id="bb_button_table" title="Lista" href="#" onclick="BBCodes.insert('[table][tr][th]head1', '[/th][th]head2[/th][/tr][tr][td]tekst1[/td][td]tekst2[/td][/tr][/table]');return false;">
										<img src="/ds_graphic/bb/bb_table.png"/>
									</a>
								
									<a id="bb_button_units" title="Jednostki" href="#" onclick="BBCodes.insert('[unit]unit_spear', '[/unit]');return false;">
										<img src="/ds_graphic/bb/bb_unit.png"/>
									</a>
								
									<a id="bb_button_building" title="Budynki" href="#" onclick="BBCodes.insert('[building]main', '[/building]');return false;">
										<img src="/ds_graphic/bb/bb_building.png"/>
									</a>
													

									<table id="bb_sizes" style="display: none; clear: both; white-space: nowrap;">
										<tbody><tr>
											<td>
												<a href="#" onclick="BBCodes.insert('[size=6]', '[/size]');$('#bb_sizes').slideToggle(); return false;">» Bardzo ma³y</a><br>

												<a href="#" onclick="BBCodes.insert('[size=7]', '[/size]');$('#bb_sizes').slideToggle(); return false;">» Ma³y</a><br>
												<a href="#" onclick="BBCodes.insert('[size=9]', '[/size]');$('#bb_sizes').slideToggle(); return false;">» Normalny</a><br>
												<a href="#" onclick="BBCodes.insert('[size=12]', '[/size]');$('#bb_sizes').slideToggle(); return false;">» Du¿y</a><br>
												<a href="#" onclick="BBCodes.insert('[size=20]', '[/size]');$('#bb_sizes').slideToggle(); return false;">» Bardzo du¿y</a><br>
											</td>
										</tr>
									</tbody></table>

									<div id="bb_color_picker" style="display: none; clear: both;">
										<div class="popup_menu" style="cursor: default;">
											<a onclick="$('#bb_color_picker').toggle();return false;" href="#">Zamkn¹æ</a>
										</div>
										<div id="bb_color_picker_colors">
											<div id="bb_color_picker_c0" style="background: rgb(255, 0, 0) none repeat scroll 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;"></div>
											<div id="bb_color_picker_c1" style="background: rgb(255, 255, 0) none repeat scroll 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;"></div>
											<div id="bb_color_picker_c2" style="background: rgb(0, 255, 0) none repeat scroll 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;"></div>
											<div id="bb_color_picker_c3" style="background: rgb(0, 255, 255) none repeat scroll 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;"></div>
											<div id="bb_color_picker_c4" style="background: rgb(0, 0, 255) none repeat scroll 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;"></div>
											<div id="bb_color_picker_c5" style="background: rgb(255, 0, 255) none repeat scroll 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;"></div>
											<br>
										</div>
									
										<div id="bb_color_picker_tones">
											<div id="bb_color_picker_10"></div><div id="bb_color_picker_11"></div><div id="bb_color_picker_12"></div><div id="bb_color_picker_13"></div><div id="bb_color_picker_14"></div><div id="bb_color_picker_15"></div><br clear="all">
											<div id="bb_color_picker_20"></div><div id="bb_color_picker_21"></div><div id="bb_color_picker_22"></div><div id="bb_color_picker_23"></div><div id="bb_color_picker_24"></div><div id="bb_color_picker_25"></div><br clear="all">
											<div id="bb_color_picker_30"></div><div id="bb_color_picker_31"></div><div id="bb_color_picker_32"></div><div id="bb_color_picker_33"></div><div id="bb_color_picker_34"></div><div id="bb_color_picker_35"></div><br clear="all">
											<div id="bb_color_picker_40"></div><div id="bb_color_picker_41"></div><div id="bb_color_picker_42"></div><div id="bb_color_picker_43"></div><div id="bb_color_picker_44"></div><div id="bb_color_picker_45"></div><br clear="all">
											<div id="bb_color_picker_50"></div><div id="bb_color_picker_51"></div><div id="bb_color_picker_52"></div><div id="bb_color_picker_53"></div><div id="bb_color_picker_54"></div><div id="bb_color_picker_55"></div><br clear="all">
										</div>
									
										<div id="bb_color_picker_preview">Tekst</div>
										<input id="bb_color_picker_tx" type="text"><input value="OK" id="bb_color_picker_ok" onclick="BBCodes.colorPickerToggle(true);return false;" type="button">
									</div>
								</div>
							</td>
						
							<?php echo '
								<script type="text/javascript">
									$(document).ready(function(){
										BBCodes.init({
											target : \'#message\',
											ajax_unit_url: \'\',
											ajax_building_url: \'\'
										});
									});
								</script>
							'; ?>

						</tr>
						<tr id="edit_row">
							<td colspan="2">
								<textarea name="message" cols="40" rows="15" id="message"><?php echo $this->_tpl_vars['ally_desc_bb']; ?>
</textarea>
							</td>
						</tr>
						<tr id="submit_row">
							<td>
								<input type="submit" name="edit" value="Zapisz" /> 
								<input type="submit" name="preview" value="Podgl¹d" />
							</td>
							<td align="right"></td>
						</tr>
					</table>
				</form>
				
				<a id="edit_link" href="javascript:bbEdit()" style="display:none">Opracuj</a><br />

				<?php if (empty ( $this->_tpl_vars['preview'] )): ?>
					<script type="text/javascript">
					  gid("edit_row").style.display = 'none';
					  gid("bb_row").style.display = 'none';
						gid("submit_row").style.display = 'none';
						gid("edit_link").style.display = '';
					</script>
				<?php else: ?>
					<script type="text/javascript">
						gid("edit_row").style.display = '';
						gid("show_row").style.display = 'none';
						gid("submit_row").style.display = '';
						gid("edit_link").style.display = 'none';
					</script>
				<?php endif; ?>
					
				<br />
				
				<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=properties&amp;action=ally_image&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" enctype="multipart/form-data" method="post">
					<table class="vis" width="100%">
						<tr>
							<th>
								God³o plemienia:
							</th>
						</tr>
						<tr>
							<td>
								<?php if (! empty ( $this->_tpl_vars['ally']['image'] )): ?>
									<img src="graphic/ally/<?php echo $this->_tpl_vars['ally']['image']; ?>
" alt="God³o" />
									<br />
									<input name="del_image" type="checkbox" />
									Usuñ god³o.
									<br />
								<?php endif; ?>
								<input name="image" type="file" size="40" accept="image/*" maxlength="1048576" />
								<br />
								<span style="font-size: xx-small">maks. 300x200, mks. 256kByte, (jpg, jpeg, png, gif)</span>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" value="OK" />
							</td>
						</tr>
					</table>
				</form>
			<?php endif; ?>
		</td>
	</tr>
</table>