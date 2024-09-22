{if $preview}
	<table width="100%">
<tr><td colspan="2" style="background-color: white; border: solid 1px black;" valign="top">
			{$preview_message}
		</td>
	
	</tr>
	</table><br />
{/if}
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


<form name="header" action="game.php?village={$village.id}&amp;screen=mail&amp;mode=new&amp;action=send&amp;answer_mail_id={$view}&amp;h={$hkey}" method="post">
	<table class="vis" width="100%">
		<tbody><tr>
			<td>
				<acronym title="Separe os destinatários com um ponto e vírgula - ;"></acronym>
			</td>
			<td>
				<input autocomplete="off" title="Separe os destinatários com um ponto e vírgula - ;" id="to" name="to" tabindex="1" size="50" value="{$inputs.to}" class="autocomplete ui-autocomplete-input" data-type="player" type="text"><span class="ui-helper-hidden-accessible" aria-live="polite" role="status"></span>
															<div id="igm_to" class="igm_to popup_menu">
							<div align="right">
								<a href="javascript:igm_to_hide()">fechar</a>
							</div>
							<div id="igm_to_content"></div>
							<div id="igm_to_footer">
								<a href="javascript:igm_to_addresses_clear()">excluir remetente</a>
							</div>
						</div>
						<div style="display:inline">
							{if $user.ally_mass_mail==1 && $user.ally!=-1}<a href="game.php?village={$village.id}&screen=ally&mode=mass_mail">Tribo</a>{/if}						</div>
												</td>
		</tr>
		
		<tr>
			<td>
				Assunto:
			</td>
			<td>
				<input name="subject" tabindex="2" size="50" value="{$inputs.subject}" type="text">
			</td>
		</tr>
		<tr>
			<td colspan="2">
																	
				<div id="bb_bar" style="text-align:left; overflow:visible; ">
														<a id="bb_button_bold" title="Pogrubienie" href="#" onclick="BBCodes.insert('[b]', '[/b]');return false;">
													<span style="display:inline-block; zoom:1; *display:inline; background:url(https://www.tribalwars.net/graphic//bbcodes/bbcodes.png?1) no-repeat 0px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
												</a>
																			<a id="bb_button_italic" title="Kursywa" href="#" onclick="BBCodes.insert('[i]', '[/i]');return false;">
													<span style="display:inline-block; zoom:1; *display:inline; background:url(https://www.tribalwars.net/graphic//bbcodes/bbcodes.png?1) no-repeat -20px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
												</a>
																			<a id="bb_button_underline" title="Podkre�lenie" href="#" onclick="BBCodes.insert('[u]', '[/u]');return false;">
													<span style="display:inline-block; zoom:1; *display:inline; background:url(https://www.tribalwars.net/graphic//bbcodes/bbcodes.png?1) no-repeat -40px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
												</a>
																			<a id="bb_button_strikethrough" title="Przekre�lenie" href="#" onclick="BBCodes.insert('[s]', '[/s]');return false;">
													<span style="display:inline-block; zoom:1; *display:inline; background:url(https://www.tribalwars.net/graphic//bbcodes/bbcodes.png?1) no-repeat -60px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
												</a>

																												<a id="bb_button_spoiler" title="Spoiler" href="#" onclick="BBCodes.insert('[spoiler]', '[/spoiler]');return false;">
													<span style="display:inline-block; zoom:1; *display:inline; background:url(https://www.tribalwars.net/graphic//bbcodes/bbcodes.png?1) no-repeat -260px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
												</a>
	

				

				

				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<textarea id="message" name="text" tabindex="3" cols="70" rows="16">{$inputs.text}</textarea>
			</td>
		</tr>
		<tr>
			<td colspan="2" align="right">
				<a onclick="javascript:popup_scroll('help.php?mode=BB', 900, 650); return false;" href="help.php?mode=BB" target="_blank">BB-Codes</a>
			</td>
		</tr>
	</tbody></table>


	
	<p><input name="extended" value="0" type="hidden"> <input tabindex="5" name="preview" value="Podgl�d" type="submit"> <input tabindex="6" name="send" value="Enviar" type="submit"></p>
</form>