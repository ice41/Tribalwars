{php}
	$folos = $this->_tpl_vars['info_village']['id'];
	$folos2 = $this->_tpl_vars['user']['id'];
	$sql1 = mysql_query("SELECT id, title, time, title_image, hives FROM reports where `to_village`='$folos' AND `type`='attack' AND `receiver_userid`='$folos2' ORDER BY time DESC LIMIT 10");
	$nr_public = mysql_num_rows($sql1);
	while($array = mysql_fetch_array($sql1)){
		$id_p[] =  $array[0];
		$title_p[] = $array[1];
		$time_p[] = $array[2];
		$title_image_p[] = $array[3];
		$hives[] = $array[4];
	}
{/php}
<h2>{$info_village.name}</h2>
<table>
	<tr>
		<td valign="top" width="50%">
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr><th colspan="2">{$info_village.name}</th></tr>
				<tr><td width="80">Coordenadas:</td><td>{$info_village.x}|{$info_village.y}</td></tr>
				<tr><td>Pontos:</td><td width="180">{$info_village.points|format_number}</td></tr>
				{if empty($info_user.username)}
				<tr><td>Jugador:</td><td>--</td></tr>
				{else}
				<tr><td>Jugador:</td><td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$info_village.userid}">{$info_user.username}</a></td></tr>
				{/if}
				{if !empty($info_ally.short)}
				<tr><td>Tribo:</td><td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$info_ally.id}">{$info_ally.short}</a></td></tr>
				{/if}
				<tr><td colspan="2"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$info_village.x}&amp;y={$info_village.y}">&raquo; Centralizar no mapa</a></th></tr>
				<tr><td colspan="2"><a href="game.php?village={$village.id}&amp;screen=place&amp;mode=command&amp;target={$info_village.id}">&raquo; Enviar tropas</a></th></tr>
				{if $can_send_ress}
				<tr><td colspan="2"><a href="game.php?village={$village.id}&amp;screen=market&amp;mode=send&amp;target={$info_village.id}">&raquo; Enviar recursos</a></th></tr>
				{/if}
				{if $user.ally > 0}
{php}
	$x = $this->_tpl_vars['info_village']['x'];
	$y = $this->_tpl_vars['info_village']['y'];
	$ar1 = mysql_num_rows(mysql_query("SELECT * FROM ally_reservations WHERE ally = '".$this->_tpl_vars['user']['ally']."' AND x = '$x' AND y = '$y'"));
	if($ar1 >= '1'){
		$ally = $this->_tpl_vars['user']['ally'];
		$query = mysql_fetch_array(mysql_query("SELECT * FROM `ally_reservations` WHERE x = '$x' AND y = '$y' AND ally = '$ally'"));
		$by = mysql_fetch_array(mysql_query("SELECT username FROM users WHERE id = '".$query['by']."'"));
		$vill = $_GET['village'];
		echo '<tr><td colspan="2"><b><span style="color:red;">&raquo; Aldeia reservada por: <a href="game.php?village='.$vill.'&screen=info_player&id='.$query['by'].'">'.stripslashes(entparse($by['username'])).'</a> !</span></b></td></tr>';
	}else{
		$vill = $_GET['village'];
		echo '<tr><td colspan="2"><a href="game.php?village='.$vill.'&screen=ally&mode=reservations&x='.$x.'&y='.$y.'">&raquo; Reservar aldeia</a></td></tr>';
	}
{/php}
				{/if}
				{if $user.id==$info_village.userid}
				<tr><td colspan="2"><a href="game.php?village={$info_village.id}&amp;screen=overview">&raquo; Visualiza&ccedil;&atilde;o geral da aldeia</a></th></tr>
				{/if}
			</table>
		</td>
		<td align="right" valign="top" width="50%">
			<table class="vis" width="600" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr><th colspan="3">Ultimos 10 ataques</th></tr>
{php}
	if($nr_public <> 0){
		foreach($id_p as $key => $value){
			$title_p[$key] = entparse($title_p[$key]);
			$time_p[$key] = date("d.n.Y, H:i:s", $time_p[$key]);
			$hives_explode = explode(";", $hives[$key]);
{/php}
				<tr>
					<td><a href="game.php?village={$village.id}&screen=report&mode=all&view={php}echo $value;{/php}"><img src="{php}echo str_replace("graphic/", "../graphic/", $title_image_p[$key]);{/php}"> {php}echo $title_p[$key];{/php}</a></td>
					<td align="center">{php} echo number_format($hives_explode[3], 0, '','.')." <span class='inactive'>/ ".number_format($hives_explode[4], 0, '', '.')."</span>"; {/php}</td>
					<td align="center">{php}echo $time_p[$key];{/php}</td>
				</tr>
{php}
		}
	}
{/php}
			</table>
		</td>
	</tr>
</table>