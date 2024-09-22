<?
	if($_GET['action'] == 'resp'){
		$text = $func->EscapeStringHK(urlencode($_POST['text']));
		if(strlen($_POST['text']) < 6){
			$error = 'O texto &eacute; muito pequeno.';
		}
		if(empty($error)){
			$db->query("INSERT INTO `support_post` (`username`,`userid`,`text`,`time`,`ticket`) VALUES ('".$func->EscapeString($_COOKIE['admname'])."','-1','".$text."','".time()."','".$func->EscapeString($_GET['view'])."')");
			$db->query("UPDATE `support` SET `stat` = '".$func->EscapeString($_POST['stat'])."', `new` = '1', `u_resp` = '".time()."' WHERE `id` = '".$func->EscapeString($_GET['view'])."'");
			header('location: menu.php?screen=support&mode='.$_GET['mode'].'&view='.$_GET['view']);
		}
	}
	if($_GET['action'] == 'delete'){
		$id = $func->EscapeString($_GET['id']);
		$db->query("DELETE FROM `support` WHERE `id` = '".$id."'");
		$db->query("DELETE FROM `support_post` WHERE `ticket` = '".$id."'");
		$sucess = 'Ticket apagado com sucesso!';
	}
?>
<? if(!empty($error)){ ?><div class="error"><?=$error;?></div><? } ?>
<? if(!empty($sucess)){ ?><div class="succes"><?=$sucess;?></div><? } ?>
<? if(empty($_GET['view'])){ ?>
<form action="menu.php?screen=support&amp;mode=<?=$_GET['mode'];?>&amp;action=mdel" method="POST">
	<table width="99%" class="vis"  style="border-spacing:1px; background-color:#FEE47D;" align="center">
		<tr><th colspan="5"><div align="center">Tickets fechados</div></th></tr>
		<tr>
			<th><div align="center">#</div></th>
			<th><div align="center">Assunto</div></th>
			<th><div align="center">Jogador</div></th>
			<th><div align="center">&Uacute;ltima resposta</div></th>
			<th><div align="center">Situa&ccedil;&atilde;o</div></th>
		</tr>
<?
	$sql = $db->query("SELECT * FROM `support` WHERE `stat` = '2' ORDER BY `u_resp` DESC");
	while($ticket = $db->fet_array($sql)){
		if($ticket['newadm'] == '0'){
			if($ticket['stat'] == '0' || $ticket['stat'] == '1'){
				$img = "<img src=\"../graphic/forum/thread_read.png\" alt=\"Lido\" /> ";
			}
			if($ticket['stat'] == '2'){
				$img = "<img src=\"../graphic/forum/thread_closed_read.png\" alt=\"lido\" /> ";
			}
		}
		if($ticket['newadm'] == '1'){
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
		$sql2 = $db->query("SELECT * FROM `support_post` WHERE `ticket` = '".$ticket['id']."' ORDER BY `time` DESC");
		$rsp_ticket = $db->fet_array($sql2);
		$n_rsp = $db->num($sql2);
?>
		<tr>
			<td align="center"><a href="menu.php?screen=support&amp;mode=<?=$_GET['mode'];?>&amp;action=delete&amp;id=<?=$ticket['id'];?>"><img src="../graphic/icons/delete.png" /></a></td>
			<td><?=$img;?> <a href="menu.php?screen=support&amp;mode=<?=$_GET['mode'];?>&amp;view=<?=$ticket['id'];?>"><?=urldecode($ticket['subject']);if($n_rsp>0){echo " ("; echo $n_rsp+1; echo ")";}?></a></td>
			<td align="center"><a href="#"><?=$func->EscapeString(urldecode($ticket['username']));?></a><br /><b class="small"><?=date('d.m.Y, H:i', $ticket['time']);?></b></td>
			<td align="center">
				<? if($n_rsp != 0){ ?>
					<? if($rsp_ticket['userid'] != -1){ ?>
				<a href="#"><?=$func->EscapeString(urldecode($rsp_ticket['username']));?></a><br /><b class="small"><?=date('d.m.Y, H:i', $rsp_ticket['time']);?></b>
					<? }else{ ?>
				<b><?=$func->EscapeString(urldecode($rsp_ticket['username']));?></b><br /><b class="small"><?=date('d.m.Y, H:i', $rsp_ticket['time']);?></b>
					<? } ?>
				<? }else{ ?>
					--
				<? } ?>
			</td>
			<td align="center"><?=$stat;?></td>
		</tr>
<? } ?>
		<tr><th colspan="5">&nbsp;</th></tr>
	</table>
</form>
<?
	}else{
		$ticket = $db->fet_array($db->query("SELECT * FROM `support` WHERE `id` = '".$func->EscapeString($_GET['view'])."'"));
		$db->query("UPDATE `support` SET `newadm` = '0' WHERE `id` = '".$func->EscapeString($_GET['view'])."'");
		if($ticket['stat'] == '0'){
			$stat = "<img src=\"../graphic/dots/red.png\" /> <b>Aberto</b>";
		}elseif($ticket['stat'] == '1'){
			$stat = "<img src=\"../graphic/dots/yellow.png\" /> <b>Em Verifica&ccedil;&atilde;o</b>";
		}elseif($ticket['stat'] == '2'){
			$stat = "<img src=\"../graphic/dots/green.png\" /> <b>Fechado (Resolvido)</b>";
		}
?>
<table width="99%" class="vis"  style="border-spacing:1px; background-color:#FEE47D;" align="center">
	<tr><th colspan="2"><div align="center"><?=urldecode($ticket['subject']);?></div></td></tr>
	<tr>
		<td width="10%">Tipo:</td>
		<td><?=urldecode($ticket['type']);?></td>
	</tr>
	<tr>
		<td>Data:</td>
		<td><?=date('d.m.Y H:i', $ticket['time']);?></td>
	</tr>
	<tr>
		<td>Situa&ccedil;&atilde;o:</td>
		<td><?=$stat;?></td>
	</tr>
<?
	$qnt = 10;
	$max_links = 2;
	$n_pages =  $db->num($db->query("SELECT * FROM `support_post` WHERE `ticket` = '".$func->EscapeString($_GET['view'])."' ORDER BY `id` DESC"));
	$pags = ceil($n_pages/$qnt);
	if(isset($_GET['p'])){ $p = $_GET['p']; }else{ $p = 1; }
	if($_GET['p'] <= 0){ $p = 1; }elseif($_GET['p'] > $pags){ $p = $pags; }
	$inicio = ($p*$qnt) - $qnt;
	$sql3 = $db->query("SELECT * FROM `support_post` WHERE `ticket` = '".$func->EscapeString($_GET['view'])."' ORDER BY `id` DESC LIMIT $inicio, $qnt"); 
	if($pags > 1){
?>
	<tr>
		<td colspan="2" align="center">
<?
	if($p != '1'){
?>
			<a href="menu.php?screen=support&amp;mode=<?=$_GET['mode'];?>&amp;view=<?=$ticket['id'];?>&amp;p=1">&lt;&lt;</a> | 
<?
	}
	for($i=$p-$max_links;$i<=$p-1;$i++){
		if($i >0){
?>
			<a href="menu.php?screen=support&amp;mode=<?=$_GET['mode'];?>&amp;view=<?=$ticket['id'];?>&amp;p=<?=$i;?>">[<?=$i;?>]</a>
<?
		}
	}
?>
			<b>><?=$p;?><</b>
<?
	for($i=$p+1;$i<=$p+$max_links;$i++){
		if($i > $pags){
		}else{
?>
			<a href="menu.php?screen=support&amp;mode=<?=$_GET['mode'];?>&amp;view=<?=$ticket['id'];?>&amp;p=<?=$i;?>">[<?=$i;?>]</a>
<?
		}
	}
	if($p != $pags && $pags > 0){
?>
			 | <a href="menu.php?screen=support&amp;mode=<?=$_GET['mode'];?>&amp;view=<?=$ticket['id'];?>&amp;p=<?=$pags;?>">&gt;&gt;</a>
<?
	}
?>
		</td>
	</tr>
<?
	}
?>
</table><br />
<table width="99%" class="vis"  style="border-spacing:1px; background-color:#FEE47D;" align="center">
	<tr>
		<td>
<?
		while($r_ticket = $db->fet_array($sql3)){
?>
			<div class="post"> 
				<div class="igmline small">
					<? if($r_ticket['userid'] == '-1'){ ?>
					<span class="author"><b><?=urldecode($r_ticket['username']);?></b></span> 
					<? }else{ ?>
					<span class="author"><a href="#"><?=urldecode($r_ticket['username']);?></a></span> 
					<? } ?>
					<span class="date"><?=date("d.m.Y, H:i", $r_ticket['time']);?></span>
				</div>
				<div class="text"><?=nl2br(wordwrap(urldecode($r_ticket['text']), 150, "<br />", true));?></div> 
			</div>
<?
		}
		if($_GET['p'] == $pags || $pags == 1){
?>
			<div class="post"> 
				<div class="igmline small"> 
					<span class="author"><a href="#"><?=urldecode($ticket['username']);?></a></span>
					<span class="date"><?=date('d.m.Y, H:i', $ticket['time']);?></span>
				</div> 
				<div class="text"><?=nl2br(wordwrap(urldecode($ticket['text']), 150, "<br />", true));?></div> 
			</div>
<?
		}
?>
		</td>
	</tr>
</table>
<div id="edit_link" align="right"><input type="button" class="button" onclick="javascript:resp_show();" value="Responder" /></div><br />
<?
	}
?>
<script type="text/javascript">
	$(function() {
		autoresize_textarea('#message');
	});
</script>
<table class="vis" width="100%" border="0" id="resp_row" style="display:none;border-spacing:1px; background-color:#FEE47D;" align="center">
	<form method="post" action="menu.php?screen=support&amp;mode=<?=$_GET['mode'];?>&amp;view=<?=$ticket['id'];?>&action=resp">
		<tr>
			<td><strong>Situa&ccedil;&atilde;o:</strong></td>
			<td>
				<input name="stat" type="radio" value="1" <? if($ticket['stat']=='0' || $ticket['stat']=='1'){ ?>checked="checked" <? } ?>/> Em Verifica&ccedil;&atilde;o<br />
				<input name="stat" type="radio" value="2" <? if($ticket['stat']=='2'){ ?>checked="checked" <? } ?>/> Resolvido
			</td>
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
					$(document).ready(function(){
						BBCodes.init({
							target : '#message',
						});
					});
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
	function resp_show() {
		gid("resp_row").style.display = '';
		gid("edit_link").style.display = 'none';
	}
</script>