<table width="100%">
	<tr>
		<td valign="top" width="50%">
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
			{if $num_pages>1}
				<tr>
					<td align="center" colspan="3">
					{section name=countpage start=1 loop=$num_pages+1 step=1}
						{if $site==$smarty.section.countpage.index}
						<strong>>{$smarty.section.countpage.index}<</strong>
						{else}
						<a href="game.php?village={$village.id}&amp;screen=ally&amp;site={$smarty.section.countpage.index}">[{$smarty.section.countpage.index}]</a>
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
					<td>
{php}
	$text_f = $this->_tpl_vars['arr']['message'];
	$text_f = str_replace("Der Stamm wurde von","Tribo fundada por",$text_f);
	$text_f = str_replace(" gegründet","",$text_f);
	$text_f = str_replace("ist dem Stamm beigetreten","se juntou a tribo",$text_f);
	$text_f = str_replace("hat den Stamm verlassen.","deixou a tribo.",$text_f);
	$text_f = str_replace("rejeitou o convite.","recusou o convite.",$text_f);
	$text_f = str_replace("hat die interne Ankündigung geändert","modificou o an&uacute;ncio interno",$text_f);
	$text_f = str_replace("hat die Stammesbeschreibung geändert","modificou a descri&ccedil;&atilde;o da tribo.",$text_f);
	if(preg_match('/eingeladen/', $text_f)){
		$text_f = str_replace("wurde von","foi convidado por",$text_f);
		$text_f = str_replace(" eingeladen","",$text_f);		
	}
	if(preg_match('/entlassen/', $text_f)){
		$text_f = str_replace("wurde von","foi expulso por",$text_f);
		$text_f = str_replace(" entlassen","",$text_f);		
	}
	if(preg_match('/Die Einladung an/', $text_f)){
		$text_f = str_replace("Die Einladung an","O convite para",$text_f);
		$text_f = str_replace("wurde von","foi cancelado por",$text_f);
		$text_f = str_replace(" zurückgezogen","",$text_f); 	
	}
	echo $text_f;
{/php}
					</td>
				</tr>
				{/foreach}
			</table>
		</td>
		<td valign="top" width="50%">
			<table class="vis" width="100%" style="border-spacing:1px;background-color:#FEE47D;border-top:1px solid #fee47d;border-right:1px solid #fee47d;border-left:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr><td><a href="game.php?village=36841&amp;screen=ally&amp;action=exit&amp;h=cc6f" onclick="javascript:ask('Voc&ecirc; confirma que deseja abandonar sua tribo?', 'game.php?village={$village.id}&amp;screen=ally&amp;action=exit&amp;h={$hkey}'); return false;">Deixar tribo</a></td></tr>
			</table>
			{if !empty($preview)}
			<table class="vis" width="100%" style="border-spacing:1px;background-color:#FEE47D;border-right:1px solid #fee47d;border-left:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr><th>Visualiza&ccedil;&atilde;o</th></tr>
				<tr><td align="center">{$ally.intern_text|bb_format}</td></tr>
			</table>
			{/if}
			<script type="text/javascript">
				function bbEdit() {ldelim}
					gid("edit_link").style.display = 'none';
					gid("edit_row").style.display = '';
					gid("submit_row").style.display = '';
					gid("bbcode").style.display = '';
					gid("cancel_link").style.display = '';
				{rdelim}
				function bbCancel() {ldelim}
					gid("edit_link").style.display = '';
					gid("edit_row").style.display = 'none';
					gid("submit_row").style.display = 'none';
					gid("bbcode").style.display = 'none';
					gid("cancel_link").style.display = 'none';
				{rdelim}
			</script>
			<form action="game.php?village={$village.id}&amp;screen=ally&amp;action=edit_intern&amp;h={$hkey}" method="post" name="edit_profile">
				<table class="vis" width="100%" style="border-spacing:1px;background-color:#FEE47D;border-bottom:1px solid #fee47d;border-right:1px solid #fee47d;border-left:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
					<tr><th width="100%">An&uacute;ncio interno {if $user.ally_found==1}<span style="float:right"><a id="edit_link" href="javascript:bbEdit()" style="display:none">Editar</a><a id="cancel_link" href="javascript:bbCancel()" style="display:none">Cancelar</a></span>{/if}</th></tr>
					<tr id="show_row" align="center"><td>{$ally.intern_text|bb_format}</td></tr>
					{if $user.ally_found==1}
					<tr id="bbcode">
						<td>
				            <div style="text-align:left; overflow:visible;">
								<a id="bb_button_bold" title="Negrito" href="#" onclick="BBCodes.insert('[b]', '[/b]');return false;">
									<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll 0px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
								</a>
								<a id="bb_button_italic" title="Italico" href="#" onclick="BBCodes.insert('[i]', '[/i]');return false;">
									<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll -20px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
								</a>
								<a id="bb_button_underline" title="Sublinhado" href="#" onclick="BBCodes.insert('[u]', '[/u]');return false;">
									<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll -40px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
								</a>
								<a id="bb_button_strikethrough" title="Riscado" href="#" onclick="BBCodes.insert('[s]', '[/s]');return false;">
									<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll -60px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
								</a>
								<a id="bb_button_quote" title="Citar" href="#" onclick="BBCodes.insert('[quote=Author]', '[/quote]');return false;">
									<span style="display:inline-block; zoom:1; *display:inline; background:url('../graphic/bbcodes/bbcodes.png') no-repeat -140px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
								</a>
								<a id="bb_button_url" title="URL" href="#" onclick="BBCodes.insert('[url]', '[/url]');return false;">
									<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll -160px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
								</a>
								<a id="bb_button_spoiler" title="Spoiler" href="#" onclick="BBCodes.insert('[spoiler]', '[/spoiler]');return false;">
									<span style="display:inline-block; zoom:1; *display:inline; background:url('../graphic/bbcodes/bbcodes.png') no-repeat -260px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
								</a>
								<a id="bb_button_player" title="Jogador" href="#" onclick="BBCodes.insert('[player]', '[/player]');return false;">
									<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll -80px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
								</a>
								<a id="bb_button_tribe" title="Tribo" href="#" onclick="BBCodes.insert('[ally]', '[/ally]');return false;">
									<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll -100px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
								</a>
								<a id="bb_button_coord" title="Cordenadas" href="#" onclick="BBCodes.insert('[coord]', '[/coord]');return false;">
									<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll -120px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
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
							</div>
						</td>
					</tr>
					<tr id="edit_row"><td><textarea id="message" name="intern" cols="53" rows="15">{$ally.edit_intern_text}</textarea></td></tr>
					<tr id="submit_row">
						<td align="right">
							<input type="submit" name="edit" value="Salvar" class="button" />
							<input type="submit" name="preview" value="Visualizar" class="button" />
						</td>
					</tr>
					{/if}
				</table>
			</form>
			{if empty($preview)}
			<script type="text/javascript">
				gid("edit_row").style.display = 'none';
				gid("submit_row").style.display = 'none';
				gid("bbcode").style.display = 'none';
				gid("edit_link").style.display = '';
			</script>
			{else}
			<script type="text/javascript">
				gid("edit_row").style.display = '';
				gid("bbcode").style.display = '';
				gid("show_row").style.display = 'none';
				gid("submit_row").style.display = '';
				gid("edit_link").style.display = 'none';
			</script>
			{/if}
		</td>
	</tr>
</table>