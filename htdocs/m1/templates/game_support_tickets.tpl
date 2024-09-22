{php} if(empty($_GET['view'])){ {/php}
<table width="100%" class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr><th colspan="5"><div align="center">Meus tickets</div></th></tr>
	<tr>
		<th><div align="center">#</div></th>
		<th><div align="center">Assunto</div></th>
		<th><div align="center">Jogador</div></th>
		<th><div align="center">&Uacute;ltima resposta</div></th>
		<th><div align="center">Situa&ccedil;&atilde;o</div></th>
	</tr>
{php}
	$sql = mysql_query("SELECT * FROM `login`.`support` WHERE `userid` = '".$this->_tpl_vars['user']['id']."' ORDER BY `u_resp` DESC");
	while($ticket = mysql_fetch_array($sql)){
		if($ticket['new'] == '0'){
			if($ticket['stat'] == '0' || $ticket['stat'] == '1'){
				$img = "<img src=\"../graphic/forum/thread_read.png\" alt=\"Lido\" /> ";
			}
			if($ticket['stat'] == '2'){
				$img = "<img src=\"../graphic/forum/thread_closed_read.png\" alt=\"lido\" /> ";
			}
		}
		if($ticket['new'] == '1'){
			if($ticket['stat'] == '0' || $ticket['stat'] == '1'){
				$img = "<img src=\"../graphic/forum/thread_unread.png\" alt=\"Novo\" /> ";
			}
			if($ticket['stat'] == '2'){
				$img = "<img src=\"../graphic/forum/thread_closed_unread.png\" alt=\"Novo\" /> ";
			}
		}
		if($ticket['stat'] == '0'){
			$stat = "<img src=\"../graphic/dots/red.png\" /><br /><b class=\"small\">Aberto</b>";
		}elseif($ticket['stat'] == '1'){
			$stat = "<img src=\"../graphic/dots/yellow.png\" /><br /><b class=\"small\">Em Verifica&ccedil;&atilde;o</b>";
		}elseif($ticket['stat'] == '2'){
			$stat = "<img src=\"../graphic/dots/green.png\" /><br /><b class=\"small\">Fechado (Resolvido)</b>";
		}
		$sql2 = mysql_query("SELECT * FROM `login`.`support_post` WHERE `ticket` = '".$ticket['id']."' ORDER BY `time` DESC");
		$rsp_ticket = mysql_fetch_array($sql2);
		$n_rsp = mysql_num_rows($sql2);
		$count = mysql_num_rows(mysql_query("SELECT * FROM `login`.`support_post` WHERE `ticket` = '".$ticket['id']."'"))
{/php}
	<tr>
		<td align="center">{php}echo $img;{/php}</td>
		<td><a href="game.php?village={$village.id}&amp;screen=support&amp;mode=tickets&amp;view={php}echo $ticket['id'];{/php}">{php}echo entparse($ticket['subject']);if($count > 0){echo " ("; echo $count+1; echo ")";}{/php}</a></td>
		<td align="center"><a href="#">{php}echo entparse($ticket['username']);{/php}</a><br /><b class="small">{php}echo date('d.m.Y H:i', $ticket['time']);{/php}</b></td>
		<td align="center">
			{php} if($n_rsp != 0){ {/php}
				{php} if($rsp_ticket['userid'] == '-1'){ {/php}
			<b>{php}echo entparse($rsp_ticket['username']);{/php}</b><br /><b class="small">{php}echo date('d.m.Y H:i', $rsp_ticket['time']);{/php}</b>
				{php} }else{ {/php}
			<a href="#">{php}echo entparse($rsp_ticket['username']);{/php}</a><br /><b class="small">{php}echo date('d.m.Y H:i', $rsp_ticket['time']);{/php}</b>
				{php} } {/php}
			{php} }else{ {/php}
				--
			{php} } {/php}
		</td>
		<td align="center">{php}echo $stat;{/php}</td>
	</tr>
{php} } {/php}
</table>
{php}
	}else{
		if($_GET['action'] == 'resp'){
			$text = parse($_POST['text']);
			if(strlen($_POST['text']) < 6){
				$error = 'O texto &eacute; muito pequeno.';
			}
			if(empty($error)){
				if(isset($_POST['stat'])){
					$status = '2';
				}else{
					$status = '1';
				}
				mysql_query("INSERT INTO `login`.`support_post` (`username`,`userid`,`text`,`time`,`ticket`) VALUES ('".$this->_tpl_vars['user']['username']."','".$this->_tpl_vars['user']['id']."','".$text."','".time()."','".parse($_GET['view'])."')");
				mysql_query("UPDATE `login`.`support` SET `stat` = '".$status."',`newadm` = '1', `u_resp` = '".time()."' WHERE `id` = '".parse($_GET['view'])."' AND `userid` = '".$this->_tpl_vars['user']['id']."'");
				header('location: game.php?village='.$this->_tpl_vars['village']['id'].'&screen=support&mode=tickets&view='.$_GET['view']);
			}
		}
		$ticket = mysql_fetch_array(mysql_query("SELECT * FROM `login`.`support` WHERE `id` = '".parse($_GET['view'])."' AND `userid` = '".$this->_tpl_vars['user']['id']."'"));
		mysql_query("UPDATE `login`.`support` SET `new` = '0' WHERE `id` = '".parse($_GET['view'])."'");
		if($ticket['stat'] == '0'){
			$stat = "<img src=\"../graphic/dots/red.png\" /> <b>Aberto</b>";
		}elseif($ticket['stat'] == '1'){
			$stat = "<img src=\"../graphic/dots/yellow.png\" /> <b>Em Verifica&ccedil;&atilde;o</b>";
		}elseif($ticket['stat'] == '2'){
			$stat = "<img src=\"../graphic/dots/green.png\" /> <b>Fechado (Resolvido)</b>";
		}
{/php}
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;" align="center">
	<tr><th colspan="2"><div align="center">{php}echo entparse($ticket['subject']);{/php}</div></td></tr>
	<tr>
		<td width="10%">Tipo:</td>
		<td>{php}echo entparse($ticket['type']);{/php}</td>
	</tr>
	<tr>
		<td>Data:</td>
		<td>{php}echo date('d.m.Y H:i', $ticket['time']);{/php}</td>
	</tr>
	<tr>
		<td>Situa&ccedil;&atilde;o:</td>
		<td>{php}echo $stat;{/php}</td>
	</tr>
{php}
	$qnt = 10;
	$max_links = 2;
	$n_pages =  mysql_num_rows(mysql_query("SELECT * FROM `login`.`support_post` WHERE `ticket` = '".parse($_GET['view'])."' ORDER BY `id` DESC"));
	$pags = ceil($n_pages/$qnt);
	if(isset($_GET['p'])){ $p = $_GET['p']; }else{ $p = 1; }
	if($_GET['p'] <= 0){ $p = 1; }elseif($_GET['p'] > $pags){ $p = $pags; }
	$inicio = ($p*$qnt) - $qnt;
	$sql3 = mysql_query("SELECT * FROM `login`.`support_post` WHERE `ticket` = '".parse($_GET['view'])."' ORDER BY `id` DESC LIMIT $inicio, $qnt"); 
	if($pags > 1){
{/php}
	<tr>
		<td colspan="2" align="center">
{php}
	if($p != '1'){
{/php}
			<a href="game.php?village={$village.id}&amp;screen=support&amp;mode=tickets&amp;view={php}echo $_GET['view'];{/php}&amp;p=1">&lt;&lt;</a> | 
{php}
	}
	for($i=$p-$max_links;$i<=$p-1;$i++){
		if($i >0){
{/php}
			<a href="game.php?village={$village.id}&amp;screen=support&amp;mode=tickets&amp;view={php}echo $_GET['view'];{/php}&amp;p={php}echo $i;{/php}">[{php}echo $i;{/php}]</a>
{php}
		}
	}
{/php}
			<b>>{php}echo $p;{/php}<</b>
{php}
	for($i=$p+1;$i<=$p+$max_links;$i++){
		if($i > $pags){
		}else{
{/php}
			<a href="game.php?village={$village.id}&amp;screen=support&amp;mode=tickets&amp;view={php}echo $_GET['view'];{/php}&amp;p={php}echo $i;{/php}">[{php}echo $i;{/php}]</a>
{php}
		}
	}
	if($p != $pags && $pags > 0){
{/php}
			 | <a href="game.php?village={$village.id}&amp;screen=support&amp;mode=tickets&amp;view={php}echo $_GET['view'];{/php}&amp;p={php}echo $pags;{/php}">&gt;&gt;</a>
{php}
	}
{/php}
		</td>
	</tr>
{php}
	}
{/php}
</table><br />
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<td>
{php}
		while($r_ticket = mysql_fetch_array($sql3)){
{/php}
			<div class="post"> 
				<div class="igmline small">
					{php} if($r_ticket['userid'] == '-1'){ {/php}
					<span class="author"><b>{php}echo urldecode($r_ticket['username']);{/php}</b></span> 
					{php} }else{ {/php}
					<span class="author"><a href="#">{php}echo urldecode($r_ticket['username']);{/php}</a></span> 
					{php} } {/php}
					<span class="date">{php}echo date("d.m.Y H:i", $r_ticket['time']);{/php}</span>
				</div>
				<div class="text">{php}echo bb_format(wordwrap(nl2br(entparse($r_ticket['text'])), 88, "<br />", true));{/php}</div> 
			</div>
{php}
		}
		if($_GET['p'] == $pags || $pags == 1){
{/php}

			<div class="post"> 
				<div class="igmline small"> 
					<span class="author"><a href="#">{php}echo entparse($ticket['username']);{/php}</a></span>
					<span class="date">{php}echo date('d.m.Y H:i', $ticket['time']);{/php}</span>
				</div> 
				<div class="text">{php}echo bb_format(wordwrap(nl2br(entparse($ticket['text'])), 88, "<br />", true));{/php}</div> 
			</div>
{php}
		}
{/php}
		</td>
	</tr>
</table>
{php}if($ticket['stat'] == '0' || $ticket['stat'] == '1'){{/php}
<table id="edit_link" align="right"><tr><td align="right"><input type="button" class="button" onclick="javascript:resp_show();" value="Responder" /></td></tr></table>
{php}}else{{/php}
<table id="edit_link" align="right"><tr><td align="right"><input type="button" class="button red" value="Ticket fechado" /></td></tr></table>
{php}}{/php}
{php}
	}
{/php}
{php}if($ticket['stat'] == '0' || $ticket['stat'] == '1'){{/php}
<script type="text/javascript">
	$(function() {ldelim}
		autoresize_textarea('#message');
	{rdelim});
</script><br />
<table class="vis" width="100%" border="0" id="resp_row" style="display:none;border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;" align="center">
	<form method="post" action="game.php?village={$village.id}&amp;screen=support&amp;mode=tickets&amp;view={php}echo $ticket['id'];{/php}&action=resp">
		<tr>
			<td><strong>Situa&ccedil;&atilde;o:</strong></td>
			<td><label><input type="checkbox" name="stat" {php}if($ticket['stat'] == '2'){{/php}checked="checked"{php}}{/php} /> Resolvido</label></td>
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
					$(document).ready(function(){ldelim}
						BBCodes.init({ldelim}
							target : '#message',
						{rdelim});
					{rdelim});
				</script>
				<div style="clear:both;"><textarea id="message" name="text" cols="85" rows="5"></textarea></div> 
			</td>
		</tr>
		<tr> 
			<td> 
				<a href="javascript:resizeIGMField('bigger');">&raquo; Aumentar tamanho do campo</a><br />
				<a href="javascript:resizeIGMField('smaller');">&raquo; Diminuir tamanho do campo</a>
			</td>
			<td align="center"><input type="submit" value="Responder" class="button" /></td>
		</tr>
	</form>
</table>
<script type="text/javascript"> 
	function resp_show() {ldelim}
		gid("resp_row").style.display = '';
		gid("edit_link").style.display = 'none';
	{rdelim}
</script>
{php}}{/php}
