{php}
	$to = $_POST['to'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];
	$from_username = $this->_tpl_vars['user']['username'];
	$from_userid = $this->_tpl_vars['user']['id'];
	$villageid = $this->_tpl_vars['village']['id'];
	if($_GET['action'] == 'send'){
		if($_POST['send']){
			if(!$_POST['to']){ $error = 'A mensagem deve conter um destinat&aacute;rio.'; }
			if(strlen($subject) < 3 || strlen($subject) > 30){ $error = 'O assunto deve conter entre 3 e 30 caracteres.'; }
			if(strlen($message) < 5){ $error = 'A mensagem deve conter no minimo 5 caracteres.'; }
			$explode = explode(";", $to);
			foreach($explode as $key => $value){
				$query01 = mysql_query("SELECT username FROM users WHERE username = '".parse($explode[$key])."'");
				$rows = mysql_num_rows($query01);
				if($rows == '0'){ $error = "Jogador inexistente."; }
				$q01 = mysql_fetch_array(mysql_query("SELECT id FROM users WHERE username = '".parse($explode[$key])."'"));
				$q02 = mysql_num_rows(mysql_query("SELECT * FROM `mail_block` WHERE to_userid = '".$q01['0']."' AND from_userid = '".$from_userid."' OR from_userid = '".$q01['0']."' AND to_userid = '".$from_userid."'"));
				if($q02 > 0){ $error = "Este jogador n&atilde;o deseja receber suas mensagens."; }
				if(!$error){
					$select_info = mysql_fetch_array(mysql_query("SELECT username,id FROM users WHERE username = '".parse($explode[$key])."'"));
					$sql = "INSERT INTO `mail`(`subject`,`time`,`message`,`from_username`,`from_userid`,`to_username`,`to_userid`,`from_read`,`to_read`) VALUES ('".parse($_POST['subject'])."','".time()."','".parse($_POST['message'])."','".$from_username."','".$from_userid."','".$select_info[0]."','".$select_info[1]."','0','1')";
					mysql_query($sql);
					mysql_query("UPDATE users SET new_mail = '1' WHERE id = '".$select_info['id']."'");
					header("Location: game.php?village=$villageid&screen=mail");
				}
			}
		}elseif($_POST['preview']){
{/php}
<table class="vis " width="100%"><tr><td>
	<div class="post">
		<div class="igmline small">
			<span class="author"><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$user.id}" >{$user.username}</a></span>
			 <span class="date">{php}echo date("d.m.Y, H:i:s", time()); {/php}</span>
		</div>
		<div class="text">{php}echo bb_format(wordwrap(stripslashes(nl2br(htmlspecialchars(entparse($_POST['message'])))), 90, "<br />", true)); {/php}</div>
	</div>
</td></tr></table>
{php}
		}
	}
	if($error){ echo '<div class="error">'.$error.'</div>'; }
{/php}
<form name="header" action="game.php?village={$village.id}&amp;screen=mail&amp;mode=new&action=send" method="post">
  <table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
    <tbody>
      <tr><td>Para:</td><td>
          <input type="text" name="to" size="50" value="{php} if (isset($_GET['player'])) { $g1 = mysql_fetch_array(mysql_query("SELECT username FROM users WHERE id = '".$_GET['player']."'")); echo stripslashes(entparse($g1['0'])); } echo stripslashes(entparse($_POST['to'])); {/php}" /> {if $user.ally_mass_mail==1 && $user.ally!=-1}<a href="javascript:popup_scroll('igm_to.php?', 250, 300)">&nbsp;&raquo; Tribo</a>{/if}</td>
      </tr>
      <tr><td>Assunto:</td><td>
          <input type="text" name="subject" size="50" value="{php} echo stripslashes(urldecode($_POST['subject'])); {/php}"/></td>
      </tr>
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
						$(document).ready(function(){ldelim}
							BBCodes.init({ldelim}
								target : '#message',
							{rdelim});
						{rdelim});
					</script>
				</div>
				<div style="clear:both;">
					<textarea id="message" name="message" cols="85" rows="16">{php} echo stripslashes(entparse($_POST['message'])); {/php}</textarea>
				</div>
            </td>
        </tr>
		<tr><th colspan="2"><span style="float:right;"><input type="submit" name="preview" value="Visualizar" class="button" /> <input type="submit" name="send" value="Enviar" class="button" /></span></th></tr>
    </tbody>
</table>
</form> 