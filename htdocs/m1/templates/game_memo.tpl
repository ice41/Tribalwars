<h2>Bloco de notas - <a id="edit_link" href="javascript:memoEdit()">Editar</a><a id="cancel_link" href="javascript:memoCancel()" style="display:none">Cancelar</a></h2>
<script type="text/javascript">
	function memoEdit() {ldelim}
		gid("show_row").style.display = 'none';
		gid("edit_link").style.display = 'none';
		gid("edit_row").style.display = '';
		gid("submit_row").style.display = '';
		gid("cancel_link").style.display = '';
	{rdelim}
	function memoCancel() {ldelim}
		gid("show_row").style.display = '';
		gid("edit_link").style.display = '';
		gid("edit_row").style.display = 'none';
		gid("submit_row").style.display = 'none';
		gid("cancel_link").style.display = 'none';
	{rdelim}
</script>
<noscript>
	<form action="game.php?village={$village.id}&amp;screen=memo&amp;action=edit&amp;h={$hkey}" method="post">
		<table class="vis" width="99%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
			<tr><td colspan="2">{$memo.output|bb_format}</td></tr>
			<tr><td colspan="2"><textarea name="memo" cols="80" rows="25">{$memo.output_textarea}</textarea></td></tr>
			<tr><td><input type="submit" value="Salvar" class="button" /></td><td align="right"></td></tr>
		</table>
	</form>
</noscript>
<div id="memo_script" style="display:none">
	<form action="game.php?village={$village.id}&amp;screen=memo&amp;action=edit&amp;h={$hkey}" method="post">
		<table class="vis" width="99%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
			<tr id="show_row"><td colspan="2">{$memo.output|bb_format}</td></tr>
			<tr id="edit_row" style="display:none">
				<td colspan="2"> 
					<div id="bb_bar" style="text-align:left; overflow:visible;">
						<a id="bb_button_bold" title="Negrito" href="#" onclick="BBCodes.insert('[b]', '[/b]');return false;">
							<span style="display:inline-block; zoom:1; *display:inline; background:url('../graphic//bbcodes/bbcodes.png') no-repeat 0px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
						</a>
						<a id="bb_button_italic" title="It�lico" href="#" onclick="BBCodes.insert('[i]', '[/i]');return false;">
							<span style="display:inline-block; zoom:1; *display:inline; background:url('../graphic//bbcodes/bbcodes.png') no-repeat -20px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
						</a>
						<a id="bb_button_underline" title="Sublinhado" href="#" onclick="BBCodes.insert('[u]', '[/u]');return false;">
							<span style="display:inline-block; zoom:1; *display:inline; background:url('../graphic//bbcodes/bbcodes.png') no-repeat -40px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
						</a>
						<a id="bb_button_strikethrough" title="Riscado" href="#" onclick="BBCodes.insert('[s]', '[/s]');return false;">
							<span style="display:inline-block; zoom:1; *display:inline; background:url('../graphic//bbcodes/bbcodes.png') no-repeat -60px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
						</a>
						<a id="bb_button_quote" title="Citar" href="#" onclick="BBCodes.insert('[quote=Author]', '[/quote]');return false;">
							<span style="display:inline-block; zoom:1; *display:inline; background:url('../graphic//bbcodes/bbcodes.png') no-repeat -140px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
						</a>
						<a id="bb_button_url" title="Endere�o" href="#" onclick="BBCodes.insert('[url]', '[/url]');return false;">
							<span style="display:inline-block; zoom:1; *display:inline; background:url('../graphic//bbcodes/bbcodes.png') no-repeat -160px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
						</a>
						<a id="bb_button_spoiler" title="Spoiler" href="#" onclick="BBCodes.insert('[spoiler]', '[/spoiler]');return false;">
							<span style="display:inline-block; zoom:1; *display:inline; background:url('../graphic//bbcodes/bbcodes.png') no-repeat -260px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
						</a>
						<a id="bb_button_player" title="Jogador" href="#" onclick="BBCodes.insert('[player]', '[/player]');return false;">
							<span style="display:inline-block; zoom:1; *display:inline; background:url('../graphic//bbcodes/bbcodes.png') no-repeat -80px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
						</a>
						<a id="bb_button_tribe" title="Tribo" href="#" onclick="BBCodes.insert('[ally]', '[/ally]');return false;">
							<span style="display:inline-block; zoom:1; *display:inline; background:url('../graphic//bbcodes/bbcodes.png') no-repeat -100px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
						</a>
						<a id="bb_button_coord" title="Coordenada" href="#" onclick="BBCodes.insert('[coord]', '[/coord]');return false;">
							<span style="display:inline-block; zoom:1; *display:inline; background:url('../graphic//bbcodes/bbcodes.png') no-repeat -120px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
						</a>
						<a id="bb_button_size" title="Tamanho da fonte" href="#" onclick="$('#bb_sizes').slideToggle(); BBCodes.placePopups(); return false;">
							<span style="display:inline-block; zoom:1; *display:inline; background:url('../graphic//bbcodes/bbcodes.png') no-repeat -220px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
						</a>
						<a id="bb_button_image" title="Imagem" href="#" onclick="BBCodes.insert('[img]', '[/img]');return false;">
							<span style="display:inline-block; zoom:1; *display:inline; background:url('../graphic//bbcodes/bbcodes.png') no-repeat -180px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
						</a>
						<a id="bb_button_color" title="Cor" href="#" onclick="BBCodes.colorPickerToggle(); BBCodes.placePopups(); return false">
							<span style="display:inline-block; zoom:1; *display:inline; background:url('../graphic//bbcodes/bbcodes.png') no-repeat -200px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
						</a>
						<table id="bb_sizes" style="display:none; clear:both;">
							<tr>
								<td>
									<a href="#" onclick="BBCodes.insert('[size=6]', '[/size]');$('#bb_sizes').slideToggle(); return false;">&raquo; Muito pequeno</a><br />
									<a href="#" onclick="BBCodes.insert('[size=7]', '[/size]');$('#bb_sizes').slideToggle(); return false;">&raquo; Pequeno</a><br />
									<a href="#" onclick="BBCodes.insert('[size=9]', '[/size]');$('#bb_sizes').slideToggle(); return false;">&raquo; Normal</a><br />
									<a href="#" onclick="BBCodes.insert('[size=12]', '[/size]');$('#bb_sizes').slideToggle(); return false;">&raquo; Grande</a><br />
									<a href="#" onclick="BBCodes.insert('[size=20]', '[/size]');$('#bb_sizes').slideToggle(); return false;">&raquo; Muito Grande</a><br />
								</td>
							</tr>
						</table>
						<div id="bb_color_picker" style="display: none; clear:both; margin-bottom:20px;" align="center">
							<div class="popup_menu" style="cursor:default" align="right"><a onclick="$('#bb_color_picker').toggle();return false;" href="#">fechar</a></div>
							<div id="bb_color_picker_colors" align="center">
							<div id="bb_color_picker_c0" style="background:#f00"></div>
							<div id="bb_color_picker_c1" style="background:#ff0"></div>
							<div id="bb_color_picker_c2" style="background:#0f0"></div>
							<div id="bb_color_picker_c3" style="background:#0ff"></div>
							<div id="bb_color_picker_c4" style="background:#00f"></div>
							<div id="bb_color_picker_c5" style="background:#f0f"></div>
							<br />
						</div>
						<div id="bb_color_picker_tones" align="center">
							<div id="bb_color_picker_10"></div><div id="bb_color_picker_11"></div><div id="bb_color_picker_12"></div><div id="bb_color_picker_13"></div><div id="bb_color_picker_14"></div><div id="bb_color_picker_15"></div><br clear="all" />
							<div id="bb_color_picker_20"></div><div id="bb_color_picker_21"></div><div id="bb_color_picker_22"></div><div id="bb_color_picker_23"></div><div id="bb_color_picker_24"></div><div id="bb_color_picker_25"></div><br clear="all" />
							<div id="bb_color_picker_30"></div><div id="bb_color_picker_31"></div><div id="bb_color_picker_32"></div><div id="bb_color_picker_33"></div><div id="bb_color_picker_34"></div><div id="bb_color_picker_35"></div><br clear="all" />
							<div id="bb_color_picker_40"></div><div id="bb_color_picker_41"></div><div id="bb_color_picker_42"></div><div id="bb_color_picker_43"></div><div id="bb_color_picker_44"></div><div id="bb_color_picker_45"></div><br clear="all" />
							<div id="bb_color_picker_50"></div><div id="bb_color_picker_51"></div><div id="bb_color_picker_52"></div><div id="bb_color_picker_53"></div><div id="bb_color_picker_54"></div><div id="bb_color_picker_55"></div><br clear="all" />
						</div>
						<div id="bb_color_picker_preview">Texto</div>
						<input type="text" id="bb_color_picker_tx" /><input type="button" value="Ok" class="button" id="bb_color_picker_ok" onclick="BBCodes.colorPickerToggle(true);return false;"/>
					</div>
					<script type="text/javascript">
						$(document).ready(function(){ldelim}
							BBCodes.init({ldelim}
								target : '#message',
							{rdelim});
						{rdelim});
					</script>
					<div style="clear:both;"> 
						<textarea id="message" name="memo" cols="113" rows="25">{$memo.output_textarea}</textarea>
					</div> 
				</td>
			</tr>
			<tr id="submit_row" style="display:none"><td align="right"><input type="submit" value="Salvar" class="button" /></td></tr>
		</table>
	</form>
</div>
<script type="text/javascript">
	gid("memo_script").style.display = '';
</script>