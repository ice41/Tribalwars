{php}
	if($_GET['action'] == 'send'){
		$subject = parse($_POST['subject']);
		$type = parse($_POST['type']);
		$text = parse($_POST['text']);
		if(strlen($_POST['subject']) < 6 || strlen($_POST['subject']) > 120){
			$error = 'O assunto deve conter entre 6 e 120 caracteres.';
		}else{
			if(strlen($_POST['text']) < 15){
				$error = 'O ticket &eacute; muito curto.';
			}
		}
		if(empty($error)){
			mysql_query("INSERT INTO `login`.`support` (`userid`,`username`,`time`,`subject`,`text`,`type`,`stat`,`newadm`) VALUES ('".$this->_tpl_vars['user']['id']."','".$this->_tpl_vars['user']['username']."','".time()."','".$subject."','".$text."','".$type."','0','1')") or die(mysql_error());
			header('Location: game.php?village='.$this->_tpl_vars['village']['id'].'&screen=support&mode=tickets');
		}
	}
	if(!empty($error)){
		echo '<div class="error">'.$error.'</div><br />';
	}
{/php}
<form action="game.php?village={$village.id}&amp;screen=support&amp;mode=open&amp;action=send" method="post">
	<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;" align="center">
		<tr><th colspan="2">Abrir novo ticket</th></tr>
		<tr><td>Assunto:</td><td><input type="text" name="subject" maxlength="120" /></td></tr>
		<tr>
			<td>Departamento:</td>
			<td><select name="type">
				<option value="Erros & Bug's">Erros & Bug's</option>
				<option value="Abusos & Infrações">Abusos & Infra&ccedil;&otilde;es</option>
				<option value="Pagamentos">Pagamentos</option>
				<option value="Outros">Outros assuntos</option>
			</select></td>
		</tr>
		<tr>
			<td colspan="2">
				<div id="bb_bar" style="text-align:left; overflow:visible;">
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
					<a id="bb_button_coord" title="Coordenada" href="#" onclick="BBCodes.insert('[coord]', '[/coord]');return false;">
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
						<div id="bb_color_picker_preview" style="color:#FFFFFF;">Texto</div>
						<input type="text" id="bb_color_picker_tx" /><input type="button" value="Ok" class="button" id="bb_color_picker_ok" onclick="BBCodes.colorPickerToggle(true);return false;"/>
					</div>
					<script type="text/javascript">
						$(function() {ldelim}
							autoresize_textarea('#message');
						{rdelim});
						$(document).ready(function(){ldelim}
							BBCodes.init({ldelim}
								target : '#message',
							{rdelim});
						{rdelim});
					</script>
				</div>
				<div style="clear:both;"><textarea id="message" name="text" cols="85" rows="5"></textarea></div>
			</td>
		</tr>
		<tr id="submit_row">
			<td>
				<a href="javascript:resizeIGMField('bigger');">&raquo; Aumentar tamanho do campo</a><br />
				<a href="javascript:resizeIGMField('smaller');">&raquo; Diminuir tamanho do campo</a>
			</td>
			<td align="center"><input type="submit" class="button green" value="Enviar ticket" /></td>
		</tr>
	</table>
</form>