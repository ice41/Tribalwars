<?php /* Smarty version 2.6.14, created on 2012-03-31 07:59:48
         compiled from forum/forum_new_pool.tpl */ ?>
<?php if ($this->_tpl_vars['pok_tem']): ?>
	<?php if (! empty ( $this->_tpl_vars['preview'] )): ?>
		<div style="border: 1px solid black; padding: 2px; overflow: auto; background-color: white; width: 700px;">
			<?php echo $this->_tpl_vars['preview']; ?>

		</div>
	<?php endif; ?>

	<h2>Utw�rz now� ankiet�</h2>

	<form action="<?php echo $this->_tpl_vars['base_link']; ?>
&sm=new_pool&aktu_fid=<?php echo $this->_tpl_vars['aktu_fid']; ?>
&action=write&h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post" name="new_pool">
		<input name="addnew" value="0" type="hidden"/>
		
		<table class="vis" id="formTable">
			<tbody>
				<tr>
					<td>Temat:</td>
					<td><input name="subject" size="64" value="<?php echo $this->_tpl_vars['subject']; ?>
" tabindex="1" type="text"></td>
				</tr>
				<tr>
					<td valign="top">
						Odpowiedzi:<br>
						<center>
							<span class="link" onclick="insertUnit(document.forms['new_pool'].addnew,'1');document.forms['new_pool'].submit();">
								Dodaj
							</span>
						</center>
					</td>
					<td>
						<div id="poll_options">
							<?php $_from = $this->_tpl_vars['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['value']):
?>
								<input name="poll_options[]" size="64" value="<?php echo $this->_tpl_vars['value']; ?>
" maxlength="50" class="answer" tabindex="3" type="text"><br>
							<?php endforeach; endif; unset($_from); ?>
						</div>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<label><input name="show_result" tabindex="999" type="checkbox" <?php if ($this->_tpl_vars['show_result']): ?>checked="checked"<?php endif; ?>>Poka� wynik tak�e tym graczom, kt�rzy jeszcze nie g�osowali.</label>
					</td>
				</tr>

					

				<tr valign="top">
					<td></td>

					<td>													
						<div id="bb_bar" style="overflow: visible; text-align: left;">
							<a id="bb_button_bold" title="Pogrubienie" href="#" onclick="BBCodes.insert('[b]', '[/b]');return false;">
								<img src="graphic/bb/bb_b.png"/>
							</a>
						
							<a id="bb_button_italic" title="Kursywa" href="#" onclick="BBCodes.insert('[i]', '[/i]');return false;">
								<img src="graphic/bb/bb_i.png"/>
							</a>
						
							<a id="bb_button_underline" title="Podkre�lenie" href="#" onclick="BBCodes.insert('[u]', '[/u]');return false;">
								<img src="graphic/bb/bb_u.png"/>
							</a>
						
							<a id="bb_button_strikethrough" title="Przekre�lenie" href="#" onclick="BBCodes.insert('[s]', '[/s]');return false;">
								<img src="graphic/bb/bb_s.png"/>
							</a>
						
							<a id="bb_button_quote" title="Cytat" href="#" onclick="BBCodes.insert('[quote=Author]', '[/quote]');return false;">
								<img src="graphic/bb/bb_quote.png"/>
							</a>
						
							<a id="bb_button_url" title="Link" href="#" onclick="BBCodes.insert('[url]', '[/url]');return false;">
								<img src="graphic/bb/bb_url.png"/>
							</a>
						
							<a id="bb_button_spoiler" title="Spoiler" href="#" onclick="BBCodes.insert('[spoiler]', '[/spoiler]');return false;">
								<img src="graphic/bb/bb_spoiler.png"/>
							</a>
						
							<a id="bb_button_player" title="Gracz" href="#" onclick="BBCodes.insert('[player]', '[/player]');return false;">
								<img src="graphic/bb/bb_player.png"/>
							</a>
						
							<a id="bb_button_tribe" title="Plemi�" href="#" onclick="BBCodes.insert('[ally]', '[/ally]');return false;">
								<img src="graphic/bb/bb_ally.png"/>
							</a>
						
							<a id="bb_button_coord" title="Koordynaty" href="#" onclick="BBCodes.insert('[coord]', '[/coord]');return false;">
								<img src="graphic/bb/bb_coords.png"/>
							</a>
							
							<a id="bb_button_size" title="Rozmiary czcionek" href="#" onclick="$('#bb_sizes').slideToggle(); BBCodes.placePopups(); return false;">
								<img src="graphic/bb/bb_size.png"/>
							</a>
						
							<a id="bb_button_report_display" title="Raport" href="#" onclick="BBCodes.insert('[report_display]', '[/report_display]');return false;">
								<img src="graphic/bb/bb_report_display.png"/>
							</a>
						
							<a id="bb_button_color" title="Kolor" href="#" onclick="BBCodes.colorPickerToggle(); BBCodes.placePopups(); return false">
								<img src="graphic/bb/bb_color.png"/>
							</a>
						
							<a id="bb_button_table" title="Lista" href="#" onclick="BBCodes.insert('[table][tr][th]head1', '[/th][th]head2[/th][/tr][tr][td]tekst1[/td][td]tekst2[/td][/tr][/table]');return false;">
								<img src="graphic/bb/bb_table.png"/>
							</a>
						
							<a id="bb_button_units" title="Jednostki" href="#" onclick="BBCodes.insert('[unit]unit_spear', '[/unit]');return false;">
								<img src="graphic/bb/bb_unit.png"/>
							</a>
						
							<a id="bb_button_building" title="Budynki" href="#" onclick="BBCodes.insert('[building]main', '[/building]');return false;">
								<img src="graphic/bb/bb_building.png"/>
							</a>
											

							<table id="bb_sizes" style="display: none; clear: both; white-space: nowrap;">
								<tbody><tr>
									<td>
										<a href="#" onclick="BBCodes.insert('[size=6]', '[/size]');$('#bb_sizes').slideToggle(); return false;">� Bardzo ma�y</a><br>

										<a href="#" onclick="BBCodes.insert('[size=7]', '[/size]');$('#bb_sizes').slideToggle(); return false;">� Ma�y</a><br>
										<a href="#" onclick="BBCodes.insert('[size=9]', '[/size]');$('#bb_sizes').slideToggle(); return false;">� Normalny</a><br>
										<a href="#" onclick="BBCodes.insert('[size=12]', '[/size]');$('#bb_sizes').slideToggle(); return false;">� Du�y</a><br>
										<a href="#" onclick="BBCodes.insert('[size=20]', '[/size]');$('#bb_sizes').slideToggle(); return false;">� Bardzo du�y</a><br>
									</td>
								</tr>
							</tbody></table>

							<div id="bb_color_picker" style="display: none; clear: both;">
								<div class="popup_menu" style="cursor: default;">
									<a onclick="$('#bb_color_picker').toggle();return false;" href="#">Zamkn��</a>
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
				<tr>
					<td>Tekst:</td>
					<td><textarea id="message" name="message" cols="80" rows="12" tabindex="2"><?php echo $this->_tpl_vars['preview_bb']; ?>
</textarea></td>
				</tr>
				<tr>
					<td>Opcje:</td>

					<td>
						<label><input name="important" tabindex="3" type="checkbox" <?php if ($this->_tpl_vars['important']): ?>checked="checked"<?php endif; ?>>Wa�ne</label>
					</td>
				</tr>
			</tbody>
		</table>
		<input value="Podgl�d" name="preview" type="submit">
		<input value="Wy�lij" name="send" type="submit">
	</form>
<?php else: ?>
	<span class="error" style="font-size: 18px;">Forum nie istnieje</span>
<?php endif; ?>