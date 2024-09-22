{php}
	$userid = $this->_tpl_vars['user']['id'];
	$username = $this->_tpl_vars['user']['username'];
	$hkey = $this->_tpl_vars['hkey'];
	$villageid = $this->_tpl_vars['village']['id'];
	if($_GET['action'] == 'export'){
		$select = mysql_query("SELECT * FROM `mail` WHERE `id` = '".mysql_real_escape_string($_GET['read'])."'");
		$row1 = mysql_fetch_array($select);
{/php}
<h3>Exportar como BB-Code</h3>
<p>Copie o texto e cole, por exemplo, no f&oacute;rum.</p><br />
<textarea id="bb_code" rows="20" cols="80">
[quote]
[u][url=#]{php} echo stripslashes(entparse($row1['from_username'])); {/php}[/url] {php} echo date("d.m.Y, H:i:s", $row1['time']); {/php}[/u]
{php} echo stripslashes(entparse($row1['message'])); {/php}

{php}
	$af1 = mysql_query("SELECT * FROM `mail_send` WHERE `mail` = '".mysql_real_escape_string($_GET['read'])."'");
	while($array = mysql_fetch_array($af1)){
{/php}
[u][url=#]{php} echo stripslashes(entparse($array['to_username'])); {/php}[/url] {php} echo date("d.m.Y, H:i:s", $array['time']); {/php}[/u]
{php} echo stripslashes(entparse($array['message'])); {/php}

{php}
	}
{/php}
[/quote]
</textarea>

{php}
	}elseif(isset($_GET['read'])){ 
		$bf = mysql_fetch_array(mysql_query("SELECT * FROM `mail` WHERE `id` = '".mysql_real_escape_string($_GET['read'])."'"));
		if($bf['from_userid'] != $userid){
			if($bf['to_userid'] != $userid){
				$error = 'Erro 1';
			}else{
				$error = '';
			}
		}else{
			$error = '';
		}
		if($bf['from_userid'] == $userid){
			if($bf['from_delete'] == '1'){
				$error = 'Erro 2';
			}else{
				
			}
			}elseif($bf['to_userid'] == $userid){
				if($bf['to_delete'] == '1'){
					$error = 'Erro 3';
				}else{
					
				}
			}
			if(!$error){
				if($_GET['action'] == 'delete'){
					if($hkey == $_GET['h']){
						$et1 = mysql_fetch_array(mysql_query("SELECT * FROM `mail` WHERE `id` = '".mysql_real_escape_string($_GET['read'])."'"));
						if($et1['from_userid'] == $userid){
							mysql_query("UPDATE `mail` SET `from_delete` = '1' WHERE `id` = '".mysql_real_escape_string($_GET['read'])."'");
						}else{
							mysql_query("UPDATE `mail` SET `to_delete` = '1' WHERE `id` = '".mysql_real_escape_string($_GET['read'])."'");
						}
						header("Location: game.php?village=$villageid&screen=mail");
					}
				}
				$query03 = mysql_fetch_array(mysql_query("SELECT * FROM `mail` WHERE `id` = '".mysql_real_escape_string($_GET['read'])."'"));
				if($query03['to_userid'] == $userid){
					mysql_query("UPDATE `mail` SET `to_read` = '0' WHERE `id` = '".mysql_real_escape_string($_GET['read'])."'");
				}else{
					mysql_query("UPDATE `mail` SET `from_read` = '0' WHERE `id` = '".mysql_real_escape_string($_GET['read'])."'");
				}
				if(isset($_GET['answer'])){ 
					if($_POST['answer']){
						if($_POST['text']){ 
							mysql_query("INSERT INTO `mail_send` (`message`,`mail`,`to_username`,`time`) VALUES ('".parse($_POST['text'])."','".mysql_real_escape_string($_GET['read'])."','".$username."','".time()."')") or die(mysql_error());
							if($query03['to_userid'] == $userid){
								mysql_query("UPDATE `mail` SET `from_read` = '1' WHERE `id` = '".mysql_real_escape_string($_GET['read'])."'");
							}else{
								mysql_query("UPDATE `mail` SET `to_read` = '1' WHERE `id` = '".mysql_real_escape_string($_GET['read'])."'");
							}
							if($query03['to_userid'] == $userid){
								mysql_query("UPDATE `mail` SET `from_delete` = '0' WHERE `id` = '".mysql_real_escape_string($_GET['read'])."'");
							}else{
								mysql_query("UPDATE `mail` SET `to_delete` = '0' WHERE `id` = '".mysql_real_escape_string($_GET['read'])."'");
							}
							mysql_query("UPDATE `mail` SET `time` = '".time()."' WHERE `id` = '".mysql_real_escape_string($_GET['read'])."'");
							$b54 = mysql_fetch_array(mysql_query("SELECT * FROM `mail` WHERE `id` = '".mysql_real_escape_string($_GET['read'])."'"));
							if($b54['from_userid'] == $userid){
								$q01 = mysql_fetch_array(mysql_query("SELECT `to_userid` FROM `mail` WHERE id = '".mysql_real_escape_string($_GET['read'])."'"));
							}else{
								$q01 = mysql_fetch_array(mysql_query("SELECT `from_userid` FROM `mail` WHERE `id` = '".mysql_real_escape_string($_GET['read'])."'"));
							}
							mysql_query("UPDATE `users` SET `new_mail` = '1' WHERE `id` = '".$q01['0']."'");
							header("Location: game.php?village=$villageid&screen=mail&mode=in&read=".$_GET['read']);
						}
					}
				}
				$query02 = mysql_fetch_array(mysql_query("SELECT * FROM `mail` WHERE `id` = '".mysql_real_escape_string($_GET['read'])."'"));
				if(isset($_GET['answer']) && $_POST['preview']){
{/php}
<table class="vis" width="100%">
	<tr>
		<td>
			<div class="post">
				<div class="igmline small">
					<span class="author"><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$user.id}" >{$user.username}</a></span>
					 <span class="date">{php}echo date("d.m.Y, H:i:s", time()); {/php}</span>
				</div>
				<div class="text">{php}echo bb_format(wordwrap(stripslashes(nl2br(htmlspecialchars(entparse($_POST['text'])))), 90, "<br />", true)); {/php}</div>
			</div>
		</td>
	</tr>
</table>
{php}
				}
{/php}
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr><th width="140">Assunto</th><th width="300">{php}echo stripslashes(entparse($query02['subject'])); {/php}</th></tr>
	<tr><td>Parceiro</td><td>{php}if($query02['from_userid']=='-1'){echo "<b>".stripslashes(entparse($query02['to_username']))."</b>";}elseif($query02['to_userid']==$userid){if($query02['from_read']=='1'){echo "<img src='../graphic/icons/new_mail.png' /> ";}else{echo "<img src='../graphic/icons/read_mail.png' /> ";}echo '<a href="game.php?village='.$villageid.'&screen=info_player&id='.$query02[from_userid].'">'.entparse($query02['from_username']).'</a>';}else{if($query02['to_read']=='1'){echo "<img src='../graphic/icons/new_mail.png' /> ";}else{echo "<img src='../graphic/icons/read_mail.png' /> ";}echo '<a href="game.php?village='.$villageid.'&screen=info_player&id='.$query02[to_userid].'">'.stripslashes(entparse($query02['to_username'])).'</a>';}{/php}</td></tr>
	<tr id="action_row"> 
		<td colspan="2"> 
			<table class="vis " width="100%"> 
				<tr> 
					{php}if ($query02['from_userid'] == '-1'){ }else {
					    $user_blocare = mysql_num_rows(mysql_query("SELECT * FROM `mail_block` WHERE (`from_userid` = '".$this->_tpl_vars['user']['id']."' AND `to_userid` = '".$query02['to_userid']."' OR `from_userid` = '".$query02['to_userid']."' AND `to_userid` = '".$this->_tpl_vars['user']['id']."')"));
						    if($user_blocare >= '1') { echo '<td width="25%" align="center"><b>Impossivel responder.</b></td>'; } else {
					    {/php}<td width="25%" align="center"> 
						<a href="javascript:answer_show();">Responder</a> 
					</td> 
					{php}}}{/php}
					<td width="50%" align="center"> 
						<a  href="game.php?village={$village.id}&amp;screen=mail&amp;mode=in&amp;read={php}echo $_GET['read'];{/php}&amp;h={$hkey}&amp;action=delete">Apagar</a> 
					</td> 
				<td align="center"><a href="game.php?village={$village.id}&screen=mail&mode=in&read={php}echo $_GET['read'];{/php}&action=export">Exportar</a></td>
				</tr> 
				
			</table> 
		</td> 
</tr>
<script type="text/javascript">
	$(function() {ldelim}
		autoresize_textarea('#message');
	{rdelim});

</script>
<form method="POST" action="game.php?village={$village.id}&screen=mail&mode=in&read={php}echo $_GET['read'];{/php}&answer">
	<tr id="answer_row1"> 
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
				<textarea id="message" name="text" cols="85" rows="5">{php}if(isset($_POST['preview'])){ echo $_POST['text']; }{/php}</textarea> 
			</div> 
		</td> 
	</tr> 
	<tr id="answer_row2" > 
				<td width="50%"> 
			<a href="javascript:resizeIGMField('bigger');">&raquo; Aumentar tamanho do campo</a><br /><a href="javascript:resizeIGMField('smaller');">&raquo; Diminuir tamanho do campo</a> 
		</td> 
		<td width="50%" align="center"> 
			<input type="submit" name="preview" value="Visualizar" class="button" /><input type="submit" name="answer" value="Responder" class="button" />		</td> 
		{php} if (isset($_POST['preview'])){ {/php}
		<script type="text/javascript"> 
		gid('answer_row1').style.display = '';
		gid('answer_row2').style.display = '';
		</script> 
		{php} } else { {/php}
		 <script type="text/javascript"> 
		gid('answer_row1').style.display = 'none';
		gid('answer_row2').style.display = 'none';
		</script> 
		 {php} } {/php}
	</tr> 

</form>
{php}
if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
$start_from = ($page-1) * 10;
$sql = "SELECT COUNT(id) FROM `mail_send` WHERE `mail` = '".mysql_real_escape_string($_GET['read'])."'"; 
$rs_result = mysql_query($sql); 
$row = mysql_fetch_row($rs_result); 
$total_records = $row[0];
$total_pages = ceil($total_records / 10);
if($total_pages > 1){
echo "<tr><td colspan='4' align='center'>";
for ($i=1; $i<=$total_pages; $i++){
	if($page == $i){
		echo "<b>>".$i."<</b> ";
	}else{
		echo "<a href='game.php?village=".$_GET['village']."&screen=mail&mode=in&read=".$_GET['read']."&page=".$i."'>[".$i."]</a> "; 
	}
};
echo "</td></tr>";
}
$a1 = mysql_query("SELECT * FROM `mail_send` WHERE `mail` = '".mysql_real_escape_string($_GET['read'])."' ORDER BY `id` DESC  LIMIT $start_from, 10 ");
while($a2 = mysql_fetch_array($a1)){
{/php}
<tr>
		<td colspan="2"> 
			<div class="post"> 
				<div class="igmline small"> 
					<span class="author"><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={php} $fg1 = mysql_fetch_Array(mysql_query("SELECT id FROM users WHERE username = '".$a2['to_username']."'")); echo $fg1[0];{/php}" >{php} echo entparse($a2['to_username']);{/php}</a></span> 
					 <span class="date">{php} echo date("d.m.Y, H:i:s", $a2['time']);{/php}</span> 
				</div> 
				<div class="text">
{php} echo bb_format(wordwrap(stripslashes(nl2br(htmlspecialchars(entparse($a2['message'])))), 90, "<br />", true)); {/php}</div> 
			</div> 
		</td> 
	</tr> 
{php}}


if ($_GET['page'] == $total_pages || $total_pages == 1){
{/php}
	<tr>
		<td colspan="2"> 
			<div class="post"> 
				<div class="igmline small"> 
					<span class="author">{php} if ($query02['from_userid'] == '-1') { echo "<b>".entparse($query02['from_username'])."</b>"; } else { {/php}<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={php} echo $query02['from_userid']; {/php}" >{php} echo entparse($query02['from_username']);  {/php}</a>{php}}{/php}</span> 
					 <span class="date">{php} echo date("d.m.Y, H:i:s", $query02['time']); {/php}</span> 
				</div> 
				<div class="text">
{php} echo bb_format(wordwrap(stripslashes(nl2br(htmlspecialchars(entparse($query02['message'])))), 90, "<br />", true)); {/php}</div> 
			</div> 
		</td> 
	</tr> 


{php}
 }{/php}</table>{php}   } else { header("Location: game.php?village=$villageid&screen=mail"); }} else {
{/php}
<form action="game.php?village={$village.id}&screen=mail&mode=in&action=mdel&h={$hkey}" method="POST">
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
	   <th>Assunto</th>
	   <th>Parceiro de converssa</th>
	   <th>&uacute;ltima resposta</th>
	</tr>
	
	{php} 

$query01 = mysql_query("SELECT * FROM `mail` WHERE `to_userid` = '$userid' OR `from_userid` = '$userid' ORDER BY `time` DESC");
   while($array01 = mysql_fetch_array($query01)){
        if($array01['from_userid'] == $userid && $array01['from_delete'] == '1') {} 
		elseif ($array01['to_userid'] == $userid && $array01['to_delete'] == '1')  {} 
		else { 
	       if ($array01['to_read'] == '1') { 
		      $to_read_img = 'new_mail.png'; 
		   } else { 
		      $to_read_img = 'read_mail.png'; 
		   }
	       if ($array01['from_read'] == '1') { 
		      $from_read_img = 'new_mail.png'; 
		   } else { 
		      $from_read_img = 'read_mail.png'; 
		   }
           if ($array01['to_userid'] == $userid) { 
		      $img = $to_read_img; 
		   } else { 
		      $img = $from_read_img; 
		   }
	   $count = mysql_num_rows(mysql_query("SELECT * FROM `mail_send` WHERE mail = '".$array01['id']."'"));
	   echo "<tr><td>
	<input name='checkbox[]' type='checkbox' value='".$array01['id']."' class='check'><a href='game.php?village=".$_GET['village']."&screen=mail&mode=in&read=".$array01['id']."'> <img src='../graphic/icons/".$img."' /> ".stripslashes(entparse($array01['subject']))." ";
if ($count > 0) { echo "("; echo $count+1; echo ")"; }
  echo "</td>";
if ($array01['from_userid'] == '-1') {
echo "<td><img src='../graphic/icons/".$from_read_img."' /><b> ".entparse($array01['from_username'])."</b></td>";
} elseif ($array01['from_userid'] == $userid) {
echo "<td><img src='../graphic/icons/".$to_read_img."' /> <a href='game.php?village=".$_GET['village']."&screen=info_player&id=".$array01['to_userid']."'>".entparse($array01['to_username'])."</a></td>"; } else {
echo "<td><img src='../graphic/icons/".$from_read_img."' /> <a href='game.php?village=".$_GET['village']."&screen=info_player&id=".$array01['from_userid']."'>".entparse($array01['from_username'])."</a></td>";
}
echo "<td align=\"center\">".date("d.m.Y, H:i:s", $array01['time'])."</td></tr>";
	}
}


 {/php}
<tr>
	<th colspan="2"><input name="all" type="checkbox" class="selectAll" onclick="selectAll(this.form, this.checked)"> Selecionar tudo</th>
	<th colspan="3"><div align="center"><input name="delete" type="submit" id="delete" class="button" value="Apagar"></div></th>
</tr>

 

 

</table>
</form>
{php} } 
if(isset($_GET['read'])){
	/* ??? */
}else{
	$count = mysql_num_rows($query01);
	if($_GET['action'] == 'mdel' && $_GET['h'] == $hkey){
		for($i=0;$i< $count;$i++){
			$del_id = $_POST['checkbox'][$i];
			$et1 = mysql_fetch_array(mysql_query("SELECT * FROM `mail` WHERE `id` = '".$del_id."'"));
			if($et1['from_userid'] == $userid){
				mysql_query("UPDATE `mail` SET `from_delete` = '1' WHERE `id` = '".$del_id."'");
			}else{
				mysql_query("UPDATE `mail` SET `to_delete` = '1' WHERE `id` = '".$del_id."'");
			}
			header("Location: game.php?village=$villageid&screen=mail");
		}
	}
}
{/php}