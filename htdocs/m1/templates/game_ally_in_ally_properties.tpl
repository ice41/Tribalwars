{php}
	$ally = $this->_tpl_vars['user']['ally'];
	$vill = $_GET['village'];
	if($_GET['change'] == 'reservations'){
		$end_reservations = $_POST['end_reservations'];
		settype($end_reservations, "integer");
		$max_reservations = $_POST['max_reservations'];
		settype($max_reservations, "integer");
		if($end_reservations < 1 || $end_reservations > 60){ $error = 'A dura&ccedil;&atilde;o deve ser entre 1 e 60 dias.'; }
		if($max_reservations < 1 || $max_reservations > 100){ $error = 'O limite de reservas deve ser entre 1 e 100 aldeias.'; }
		if(!$error){
			mysql_query("UPDATE `ally` SET `end_reservations` = '$end_reservations' WHERE id = '$ally'");
			mysql_query("UPDATE `ally` SET `max_reservations` = '$max_reservations' WHERE id = '$ally'");
			header("Location: game.php?village=$vill&screen=ally&mode=properties");
			exit;
		} 
	}
	$select = mysql_query("SELECT * FROM `ally` WHERE id = '".$ally."'");
	$array = mysql_fetch_array($select);
{/php}
<table cellspacing="0" width="100%">
	<tr>
		<td valign="top" width="65%">
		{php}if($error){{/php}
			<div class="error">{php} echo $error; {/php}</div>
		{php}}{/php}
		{if $user.ally_found==1}
		    <form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=properties&amp;action=change&amp;h={$hkey}" method="post">
			    <table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
			        <tr><th colspan="2">Propriedades</th></tr>
			        <tr><td>Nome:</td><td><input type="text" name="name" value="{$ally.name}" /></td></tr>
			        <tr><td width="140">Abrevia&ccedil;&atilde;o:</td><td><input type="text" name="tag" maxlength="6" value="{$ally.short}" /></td></tr>
			        <tr><th colspan="2"><span style="float:right;"><input type="submit" value="Salvar" class="button" /></span></th></tr>
			    </table><br />
		    </form>
		{/if}
		{if $user.ally_lead==1}
			<form action="game.php?village={$village.id}&screen=ally&mode=properties&change=reservations" method="POST">
				<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
					<tr><th colspan="2">Reserva de aldeias - Defini&ccedil;&otilde;es</th></tr>
					<tr><td>Quantidade de reservas por jogador: (m&aacute;x. 100):</td><td><input type="text" name="max_reservations" value="{php}echo $array['max_reservations'];{/php}"/></td>
					<tr><td>Dura&ccedil;&atilde;o das reservas (dias):</td><td><input type="text" name="end_reservations" value="{php}echo $array['end_reservations'];{/php}"/></td></tr>
					<tr><th colspan="2"><span style="float:right;"><input type="submit" value="Salvar" class="button" /></span></th></tr>
				</table><br />
			</form>
		{/if}
		{if $user.ally_found==1}
		    <table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
			    <tr><th>Debandar tribo</th></tr>
			    <tr><td><a href="javascript:ask('Certeza que gostaria de desfazer a tribo? Est&aacute; a&ccedil;&atilde;o &eacute; irreversivel!', 'game.php?village={$village.id}&amp;screen=ally&amp;mode=properties&amp;do=close&amp;h={$hkey}')">Debandar tribo</a></td></tr>
		    </table>
		{/if}
		</td>
		<td valign="top" width="35%">
		{if $user.ally_diplomacy==1}
			{if !empty($preview)}
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr><th colspan="2">Visualiza&ccedil;&atilde;o</th></tr>
				<tr><td colspan="2" align="center">{$ally.description|bb_format}</td></tr>
			</table><br />
			{/if}
			<script type="text/javascript">
			function bbEdit() {ldelim}
				gid("edit_link").style.display = 'none';
				gid("edit_link_close").style.display = '';
				gid("edit_row").style.display = '';
				gid("submit_row").style.display = '';
				gid("bbcode").style.display = '';
			{rdelim}
			function bbEdit_close() {ldelim}
				gid("edit_link").style.display = '';
				gid("edit_link_close").style.display = 'none';
				gid("edit_row").style.display = 'none';
				gid("submit_row").style.display = 'none';
				gid("bbcode").style.display = 'none';
			{rdelim}
			</script>
			<form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=properties&amp;action=change_desc&amp;h={$hkey}" method="post" name="edit_profile">
				<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
					<tr><th width="100%">Descri&ccedil;&atilde;o da tribo <span style="float:right;"><a id="edit_link" href="javascript:bbEdit()" style="display:none">Editar</a><a id="edit_link_close" href="javascript:bbEdit_close()" style="display:none">Cancelar</a></span></th></tr>
					<tr align="center"><td colspan="2">{$ally.description|bb_format}</td></tr>
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
									<div id="bb_color_picker_preview" style="color:#FFFFFF;">Texto</div>
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
					<tr id="edit_row"><td><textarea id="message" name="desc_text" cols="48" rows="10">{$ally.edit_description}</textarea></td></tr>
					<tr id="submit_row"><th colspan="2"><span style="float:right;"><input type="submit" name="edit" value="Salvar" class="button" /></span></th></tr>
				</table><br />
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
			<form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=properties&amp;action=ally_image&amp;h={$hkey}" enctype="multipart/form-data" method="post">
				<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
					<tr><th>Bras&atilde;o da tribo:</th></tr>
					<tr>
						<td>
						{if !empty($ally.image)}
							<img src="graphic/ally/{$ally.image}" /><br />
    						<input name="del_image" type="checkbox" /> Apagar<br />
						{/if}
							<input name="image" type="file" size="40" accept="image/*" maxlength="1048576" /><br />
							<span style="font-size: xx-small">max. 300x200, max. 256kByte, (jpg, jpeg, png, gif)</span>
						</td>
					</tr>
					<tr><th colspan="2"><span style="float:right;"><input type="submit" value="Enviar bras&atilde;o" class="button" /></span></th></tr>
				</table>
			</form>
		{/if}
		</td>
	</tr>
</table>