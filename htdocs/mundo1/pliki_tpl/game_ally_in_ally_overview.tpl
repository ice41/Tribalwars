<table width="100%">
	<tr>
		<td valign="top">
		
			<table class="vis" width="100%">
				{if $num_pages>1}
					<tr>
						<td align="center" colspan="3">
							{section name=countpage start=1 loop=$num_pages+1 step=1}
								{if $site==$smarty.section.countpage.index}
									<strong> &gt;{$smarty.section.countpage.index}&lt; </strong>
								{else}
									<a href="game.php?village={$village.id}&amp;screen=ally&amp;site={$smarty.section.countpage.index}"> [{$smarty.section.countpage.index}] </a>
								{/if}
							{/section}
						</td>
					</tr>
				{/if}
				<tr>
					<th>Data</th>
					<th>Evento</th>
				</tr>

				{foreach from=$events item=arr key=id}
					<tr>
						<td>{$arr.time}</td>
						<td>{$pl->compile_ally_events($arr.message)}</td>
					</tr>
				{/foreach}

			</table>
		
		</td>
		<td valign="top" width="400">
			<table class="vis" width="100%">
				<tr>
					<td>
						<a href="game.php?village={$village.id}&amp;screen=ally&amp;action=exit&amp;h={$kkey}" onclick="javascript:ask('Realmente quer deixar a tribo', 'game.php?village={$village.id}&amp;screen=ally&amp;action=exit&amp;h={$hkey}'); return false;">
							Deixar a tribo
						</a>
					</td>
				</tr>
			</table>
	
			

			{if !empty($previews)}
				<table class="vis" width="100%">
					<tr><th colspan="2">Visualização</th></tr>
					<tr><td colspan="2" align="center">{$previews}</td></tr>
				</table>
			{/if}
	
			<script type="text/javascript">
							
//<![CDATA[
	function bbEdit() {ldelim}
		$('#tribe_announcement_edit').toggle();
		$('#tribe_announcement_edit_link').toggle();
		$('#tribe_announcement_show').toggle();

		BBCodes.placePopcusto();	
	{rdelim}
//]]>

			function bbEdit() {ldelim}
				gid("show_row").style.display = 'none';
				gid("edit_link").style.display = 'none';
				gid("edit_row").style.display = '';
				gid("bb_row").style.display = '';
				gid("submit_row").style.display = '';
			{rdelim}
			</script>

			<form action="game.php?village={$village.id}&amp;screen=ally&amp;action=edit_intern_text&amp;h={$hkey}" method="post" name="edit_Perfile">
			
				<table class="vis" width="100%">
					<tr>
						<th colspan="2" width="100%">Texto interno</th>
					</tr>
					<tr id="show_row" align="center">
						<td colspan="2">{$tekst_wew}</td>
					</tr>
					{if $user.ally_found==1}
						<tr valign="top" id="bb_row">
							<td colspan="2">													
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
								
									<a id="bb_button_units" title="Jednostki" href="#" onclick="BBCodes.unitPickerToggle(event); return false">
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
						
							{literal}
								<script type="text/javascript">
									$(document).ready(function(){
										BBCodes.init({
											target : '#message',
											ajax_unit_url: 'ajax/unit_bb.php',
											ajax_building_url: 'ajax/build_bb.php'
										});
									});
								</script>
							{/literal}
						</tr>
						<tr id="edit_row">
							<td colspan="2">
								<textarea id="message" name="message" cols="40" rows="15">{$tekst_wew_bb}</textarea>
							</td>
						</tr>
						<tr id="submit_row"><td><input type="submit" name="edit" value="Salvar" /> <input type="submit" name="preview" value="Visualização" /></td></tr>
					{/if}
				</table>
			</form>
			{if $user.ally_found==1}
				<a id="edit_link" href="javascript:bbEdit()" style="display:none">opracuj</a><br />
			{/if}
			
			{if empty($preview)}
				<script type="text/javascript">
				  gid("edit_row").style.display = 'none';
				  gid("bb_row").style.display = 'none';
					gid("submit_row").style.display = 'none';
					gid("edit_link").style.display = '';
				</script>
			{else}
				<script type="text/javascript">
					gid("edit_row").style.display = '';
					gid("show_row").style.display = 'none';
					gid("submit_row").style.display = '';
					gid("edit_link").style.display = 'none';
				</script>
			{/if}

		</td>
	</tr>
</table>


