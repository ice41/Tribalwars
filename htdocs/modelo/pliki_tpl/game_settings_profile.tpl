<form action="game.php?village={$village.id}&amp;screen=settings&amp;action=change_Perfile&amp;h={$hkey}" enctype="multipart/form-data" method="post">
	<table class="vis" style="width: 100%; font-size: 12px !important;">
		<tr>
			<th colspan="2">Propriedades</th>
		</tr>

		<tr>
			<td>Data de nascimento:</td>
			<td>
				<input name="day" type="text" size="2" maxlength="2" value="{$settings.b_day}" />
                <select name="month">
					<option label="Stycze�" value="1" {if $settings.b_month==1}selected{/if}>Janeiro</option>
					<option label="Luty" value="2" {if $settings.b_month==2}selected{/if}>Fevereiro</option>
					<option label="Marzec" value="3" {if $settings.b_month==3}selected{/if}>Marco</option>
					<option label="Kwiecie�" value="4" {if $settings.b_month==4}selected{/if}>Abril</option>
					<option label="Maj" value="5" {if $settings.b_month==5}selected{/if}>Maio</option>
					<option label="Czerwiec" value="6" {if $settings.b_month==6}selected{/if}>Junho</option>
					<option label="Lipiec" value="7" {if $settings.b_month==7}selected{/if}>Julho</option>
					<option label="Sierpie�" value="8" {if $settings.b_month==8}selected{/if}>Agosto</option>
					<option label="Wrzesie�" value="9" {if $settings.b_month==9}selected{/if}>Setembro</option>
					<option label="Pa�dziernik" value="10" {if $settings.b_month==10}selected{/if}>Outubro</option>
					<option label="Listopad" value="11" {if $settings.b_month==11}selected{/if}>Novembro</option>
					<option label="Grudzie�" value="12" {if $settings.b_month==12}selected{/if}>Dezembro</option>
				</select>
				<input name="year" type="text" size="4" maxlength="4" value="{$settings.b_year}" />
			</td>
		</tr>
		<tr>
			<td>Sexo:</td>
			<td>
			    <label>
					<input type="radio" name="sex" value="f" {if $settings.sex=='f'}checked="checked"{/if} />
						Feminino
				</label>
				<label>
					<input type="radio" name="sex" value="m" {if $settings.sex=='m'}checked="checked"{/if} />
						Masculino
				</label>
				<label>
					<input type="radio" name="sex" value="x" {if $settings.sex=='x'}checked="checked"{/if} />
						N/S
				</label>
			</td>
		</tr>
		<tr>
			<td>Localizacao:</td>
			<td>
				<input name="home" type="text" size="24" maxlength="32" value="{$settings.home}" />
			</td>
		</tr>
		<tr>
			<td>
				Emblema:
			</td>
			<td>
			    {if !empty($user.image)}
					<img src="graphic/player/{$user.image}" alt="Wappen" />
					<br />
					<input name="del_image" type="checkbox" />
						Excluir
					<br />
				{/if}
	           	<input name="image" type="file" size="40" accept="image/*" maxlength="1048576" />
				<br />
				<span style="font-size: xx-small">Max. 240x180, Max. 120kByte, (jpg, jpeg, png, gif)</span>
			</td>
		</tr>

		<tr>
			<td colspan="2" style="background: none;"><input type="submit" value="OK" /></td>
		</tr>
	</table>
	<br />
</form>

		
<form action="game.php?village={$village.id}&screen=settings&mode=Perfile&action=change_text&h={$hkey}" method="POST"/>
	<table class="vis"/>
		<tr>
			<th colspan="2">Texto pessoal:</th>
		</tr>
		{if !empty($settings.personal_text)}
			<tr>
				<td>
					{$settings.personal_text}
				</td>
			</tr>
		{/if}

		<tr>
			<td>													
				<div id="bb_bar" style="overflow: visible; text-align: left;">
					<a id="bb_button_bold" title="Pogrubienie" href="#" onclick="BBCodes.insert('[b]', '[/b]');return false;">
						<img src="/ds_graphic/bb/bb_b.png"/>
					</a>
				
					<a id="bb_button_italic" title="Kursywa" href="#" onclick="BBCodes.insert('[i]', '[/i]');return false;">
						<img src="/ds_graphic/bb/bb_i.png"/>
					</a>
				
					<a id="bb_button_underline" title="Podkre�lenie" href="#" onclick="BBCodes.insert('[u]', '[/u]');return false;">
						<img src="/ds_graphic/bb/bb_u.png"/>
					</a>
				
					<a id="bb_button_strikethrough" title="Przekre�lenie" href="#" onclick="BBCodes.insert('[s]', '[/s]');return false;">
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
				
					<a id="bb_button_tribe" title="Plemi�" href="#" onclick="BBCodes.insert('[ally]', '[/ally]');return false;">
						<img src="/ds_graphic/bb/bb_ally.png"/>
					</a>
				
					<a id="bb_button_coord" title="Koordynaty" href="#" onclick="BBCodes.insert('[coord]', '[/coord]');return false;">
						<img src="/ds_graphic/bb/bb_coords.png"/>
					</a>
					
					<a id="bb_button_size" title="Rozmiary czcionek" href="#" onclick="$('#bb_sizes').slideToggle(); BBCodes.placePopcusto(); return false;">
						<img src="/ds_graphic/bb/bb_size.png"/>
					</a>
				
					<a id="bb_button_report_display" title="Raport" href="#" onclick="BBCodes.insert('[report_display]', '[/report_display]');return false;">
						<img src="/ds_graphic/bb/bb_report_display.png"/>
					</a>
				
					<a id="bb_button_color" title="Kolor" href="#" onclick="BBCodes.colorPickerToggle(); BBCodes.placePopcusto(); return false">
						<img src="/ds_graphic/bb/bb_color.png"/>
					</a>
				
					<a id="bb_button_table" title="Lista" href="#" onclick="BBCodes.insert('[table][tr][th]head1', '[/th][th]head2[/th][/tr][tr][td]tekst1[/td][td]tekst2[/td][/tr][/table]');return false;">
						<img src="/ds_graphic/bb/bb_table.png"/>
					</a>
				
					<a id="bb_button_units" title="Jednostki" href="#" onclick="BBCodes.insert('[unit]unit_spear', '[/unit]');return false;">
						<img src="/ds_graphic/bb/bb_unit.png"/>
					</a>
				
					<a id="bb_button_building" title="Edifícios" href="#" onclick="BBCodes.insert('[building]main', '[/building]');return false;">
						<img src="/ds_graphic/bb/bb_building.png"/>
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
		</tr>
		{literal}
			<script type="text/javascript">
				$(document).ready(function(){
					BBCodes.init({
						target : '#message',
						ajax_unit_url: '',
						ajax_building_url: ''
					});
				});
			</script>
		{/literal}
		<tr>
			<td>
				<textarea id="message" name="text" tabindex="3" cols="50" rows="10">{$settings.personal_text_bb}</textarea>
			</td>
		</tr>
		<tr>
			<td>
				<input type="submit" name="zatwierdz" value="Guardar"/>
			</td>
		</tr>
	</table>
</form>

