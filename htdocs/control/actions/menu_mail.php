<h2>Fazer comunicado</h2>
<p>Aqui você poderá enviar um comunicado/mensagem a todos os jogadores com conta ativa no servidor.</p>
<?
	if($_GET['action'] == 'send' && $_POST['send']){
		if(strlen($_POST['subject']) < 3 || strlen($_POST['subject']) > 25){
			$error = 'O assunto deve conter entre 3 e 25 caracteres.';
		}else{
			if(empty($_POST['message'])){
				$error = 'Você deve digitar uma mensagem para que seja enviada.';
			}
		}
		if(empty($error)){
			$from = $func->EscapeString(urlencode('LanServers.tk'));
			$subject = $func->EscapeString(urlencode($_POST['subject']));
			$message = $func->EscapeString(urlencode($_POST['message']));
			$sql = $db->query("SELECT * FROM `worlds` WHERE `world_active` = '1'");
			while($world = $db->fet_array($sql)){
				$mundo = $world['world_db'];
				$sql2 = $db->query("SELECT * FROM `$mundo`.`users`");
				while($user = $db->fet_array($sql2)){
					$db->query("INSERT INTO `$mundo`.`mail` (`from_userid`,`from_username`,`to_userid`,`to_username`,`subject`,`message`,`time`,`from_read`) VALUES ('-1','".$from."','".$user['id']."','".$user['username']."','".$subject."','".$message."','".time()."','0')");
				}
				$db->query("UPDATE `$mundo`.`users` SET `new_mail` = '1'");
			}
			echo '<div class="succes">O comunicado foi enviado a todos os jogadores com sucesso.</div><br />';
		}
	}
	if($_GET['action'] == 'send' && $_POST['prop']){
		$from = $func->EscapeString(urlencode('LanServers.tk'));
		$subject = $func->EscapeString(urlencode("* Aviso importante *"));
		$message = $func->EscapeString(urlencode("Ajude o servidor clicando nos anúncios dos patrocinadores todos os dias enquando você estiver online, basta 5 cliques a cada 10 minutos.\r\n\r\n Equipe [b]LanServers.tk[\/\b]!"));
		$sql = $db->query("SELECT * FROM `worlds` WHERE `world_active` = '1'");
		while($world = $db->fet_array($sql)){
			$mundo = $world['world_db'];
			$sql2 = $db->query("SELECT * FROM `$mundo`.`users`");
			while($user = $db->fet_array($sql2)){
				$db->query("INSERT INTO `$mundo`.`mail` (`from_userid`,`from_username`,`to_userid`,`to_username`,`subject`,`message`,`time`,`from_read`) VALUES ('-1','".$from."','".$user['id']."','".$user['username']."','".$subject."','".$message."','".time()."','0')");
			}
			$db->query("UPDATE `$mundo`.`users` SET `new_mail` = '1'");
		}
		echo '<div class="succes">O comunicado foi enviado a todos os jogadores com sucesso.</div><br />';
	}
	if(!empty($error)){
		echo '<div class="error">'.$error.'</div><br />';
	}
	if($_POST['preview']){
?>
<table class="vis" width="100%" align="center">
	<tr>
		<td width="100%">
			<div class="post">
				<div class="igmline small">
					<span class="author"><a href="http://eow.zapto.org" title="Empire of War | Jogo da Era Medieval!">Empire of War</a></span>
					 <span class="date"><?=date("d.m.Y, H:i:s", time());?></span>
				</div>
				<div class="text"><?=$func->EscapeString(wordwrap(nl2br(urldecode($_POST['message'])), 90, "<br />", true));?></div>
			</div>
		</td>
	</tr>
</table>
<? } ?>
<form name="header" action="menu.php?screen=mail&action=send" method="post">
	<table class="vis" style="border-spacing: 1px; background-color: #FEE47D;">
		<tr><th colspan="2">Enviar comunicado a todos os jogadores</th></tr>
		<tr><th>Assunto:</th><td><input type="text" name="subject" size="50" value="<?=urldecode($_POST['subject']);?>" /></td></tr>
        <tr>
			<td colspan="2">
				<div id="bb_bar" style="text-align:left; overflow:visible;">
					<a id="bb_button_bold" title="Negrito" href="#" onclick="BBCodes.insert('[b]', '[/b]');return false;">
						<span style="display:inline-block; zoom:1; *display:inline; background:url('../graphic//bbcodes/bbcodes.png') no-repeat 0px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
					</a>
					<a id="bb_button_italic" title="Itálico" href="#" onclick="BBCodes.insert('[i]', '[/i]');return false;">
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
					<a id="bb_button_url" title="Endereço" href="#" onclick="BBCodes.insert('[url]', '[/url]');return false;">
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
					<a id="bb_button_color" title="Cor" href="#" onclick="BBCodes.colorPickerToggle(); BBCodes.placePopups(); return false">
						<span style="display:inline-block; zoom:1; *display:inline; background:url('../graphic//bbcodes/bbcodes.png') no-repeat -200px 0px; padding-left: 0px; padding-bottom:0px; margin-right: 2px; margin-bottom:3px; width: 20px; height: 20px">&nbsp;</span>
					</a>
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
						$(document).ready(function(){
							BBCodes.init({
								target : '#message',
							});
						});
					</script>
					<script type="text/javascript">
						$(function() {
							autoresize_textarea('#message');
						});
					</script>
				</div>
				<div style="clear:both;">
					<textarea id="message" name="message" cols="85" rows="16"><?=urldecode($_POST['message']);?></textarea>
				</div>
			</td>
		</tr>
		<tr><th colspan="2">
			<span style="float:left;">
				<input type="submit" name="prop" value="Propaganda" class="button green" />
			</span>
			<span style="float:right;">
				<input type="submit" name="preview" value="Visualizar" class="button" /> 
				<input type="submit" name="send" value="Enviar" class="button" />
			</span>
		</th></tr>
	</table><br />
</form>
