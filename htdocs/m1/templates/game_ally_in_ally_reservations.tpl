{php}
	$parenthesis = array("(",")"," ");
	$replace = array("","","");
	$replace = str_replace($parenthesis, $replace, $_POST['coord']);
	$userid = $this->_tpl_vars['user']['id'];
	$ally = $this->_tpl_vars['user']['ally'];
	$kf = mysql_fetch_array(mysql_query("SELECT * FROM `ally` WHERE id = '".$ally."'"));
	$time_s = time();
	mysql_query("DELETE FROM `ally_reservations` WHERE expire_time < '$time_s'");
	$vill = $_GET['village'];
	if($_GET['do'] == 'new'){
		$explode = explode("|", $replace);
		$x = $explode['0'];
		settype($x, "integer");
		$y = $explode['1'];
		settype($y, "integer");

		$query = mysql_query("SELECT * FROM villages WHERE x = '".$x."' AND y = '".$y."'");
		$array = mysql_fetch_array($query);
		$true = mysql_num_rows($query);
		if($true != true){ $error = 'N&atilde;o conseguimos encontrar nenhuma aldeia com as coordenas enviadas.';}
		if($array['userid'] == $userid){ $error = 'Voc&ecirc; n&atilde;o pode reservar sua pr&oacute;pria aldeia.'; }
		$allyr = mysql_query("SELECT * FROM ally_reservations WHERE ally = '".$this->_tpl_vars['user']['ally']."' AND x = '$x' AND y = '$y'");
		$arrayr = mysql_fetch_array($allyr);
		$rowsr = mysql_num_rows($allyr);
		if($rowsr >= '1'){ $error = 'Aldeia reservada.'; }
		$rowskf = mysql_num_rows(mysql_query("SELECT * FROM `ally_reservations` WHERE `by` = '".$this->_tpl_vars['user']['id']."'"));
		if ($rowskf >= $kf['max_reservations']) { $error = 'Voc&ecirc; j&aacute; atingiu o limite de rerservas.'; }
		if(!$error){
			$time = time();
			$by = $this->_tpl_vars['user']['id'];
			$ally = $this->_tpl_vars['user']['ally'];;
			$end_reservation = $kf['end_reservations'] * 3600 * 24 + time();
			mysql_query("INSERT INTO `ally_reservations` (`x`,`y`,`by`,`expire_time`,`ally`) VALUES ('$x','$y','$by','$end_reservation','$ally')") or die (mysql_error());
			$vill = $_GET['village'];
			header("Location: game.php?village=$vill&screen=ally&mode=reservations");
			exit;
		}
	}
	if($_GET['delete'] == 'reservation'){
		$id = $_GET['id'];
		$select = mysql_fetch_array(mysql_query("SELECT `ally`,`by` FROM ally_reservations WHERE id = '".$id."'"));
		if($select['ally'] == $ally && $select['by'] == $userid){
			mysql_query("DELETE FROM ally_reservations WHERE id = '".$id."'");
			header("Location: game.php?village=$vill&screen=ally&mode=reservations");
			exit;
		}
	}
{/php}
{php}if($error){{/php}
<div class="error">{php} echo $error; {/php}</div>
{php}}{/php}
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th>Aldeia</th>
		<th width="50">Pontos</th>
		<th>Proprietario</th>
		<th>Rezervada por</th>
		<th width="160">Fim da reserva</th>
		<th width="40" style="text-align:center;">#</th>
	</tr>
{php}
	$query01 = mysql_query("SELECT * FROM ally_reservations WHERE ally = '".$this->_tpl_vars['user']['ally']."'");
	while($array = mysql_fetch_array($query01)){
		$village = mysql_fetch_array(mysql_query("SELECT `id`,`name`,`points`,`userid`,`continent` FROM `villages` WHERE `x` = '".$array['x']."' AND `y` = '".$array['y']."'"));
		$prop = mysql_fetch_array(mysql_query("SELECT `id`,`username` FROM `users` WHERE `id` = '".$village['userid']."'"));
		$by = mysql_fetch_array(mysql_query("SELECT `username` FROM `users` WHERE `id` = '".$array['by']."'"));
		if($prop == false){ $prop = '---'; }else{ $prop = '<a href="game.php?village='.$vill.'&screen=info_player&id='.$prop['id'].'">'.entparse($prop['username']).'</a>'; }
		echo '<tr><td><a href="game.php?village='.$vill.'&screen=info_village&id='.$village['id'].'">'.entparse($village['name']).'('.$array['x'].'|'.$array['y'].') K'.$village['continent'].'</a></td><td>'.$village['points'].'</td><td>'.$prop.'</td><td><a href="game.php?village='.$vill.'&screen=info_player&id='.$array['by'].'">'.stripslashes(urldecode($by['username'])).'</a></td><td>'.date("d.m.Y, H:i", $array['expire_time']).'</td>';
		echo '<td align="center"><a href="game.php?village='.$vill.'&screen=map&x='.$array['x'].'&y='.$array['y'].'"><img src="../graphic/icons/map_center.png" title="Centralizar no mapa"/></a><br />';
		$select = mysql_fetch_array(mysql_query("SELECT `ally`,`by` FROM ally_reservations WHERE id = '".$array['id']."'"));
		if($select['ally'] == $ally && $select['by'] == $userid){
			echo '<a href="game.php?village='.$vill.'&screen=ally&mode=reservations&delete=reservation&id='.$array['id'].'"><img src="../graphic/icons/delete.png" alt="Apagar" title="Apagar"/></a></td></tr>';
		}elseif ($this->_tpl_vars['user']['ally_found'] == '1' OR $this->_tpl_vars['user']['ally_lead'] == '1'){
			echo '<a href="game.php?village='.$vill.'&screen=ally&mode=reservations&delete=reservation&id='.$array['id'].'"><img src="../graphic/icons/delete.png" alt="Apagar" title="Apagar"/></a></td></tr>';
		}
		}
		{/php}
	
</table><br />
<form action="game.php?village={$village.id}&screen=ally&mode=reservations&do=new" method="post">
	<table class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr>
			<th>Reservar aldeia</th>
			<th>Configura&ccedil;&otilde;es</th>
		</tr>
{php}
	$x = $_GET['x'];
	settype($x, "integer");
	$y = $_GET['y'];
	settype($y, "integer");
{/php}
	<tr><td>Coordenadas: <input type="text" name="coord" size="12" value="{php} if ($_GET['x']) { echo $x; } else { echo 'x'; }{/php} | {php} if ($_GET['y']) { echo $y; } else { echo 'y'; }{/php}"/></td>
	<td>Limite de reservas: {php} $select = mysql_fetch_array(mysql_query("SELECT * FROM ally WHERE id = '".$this->_tpl_vars['user']['ally']."'")); echo $select['max_reservations']; {/php} aldeias<br />
	Dura&ccedil;&atilde;o: {php} echo $select['end_reservations']; {/php} dias
	</td></tr>
	<tr><th colspan="2"><span style="float:right;"><input type="submit" name="reservation_start" value="Reservar" class="button" /></span></th></tr>
</table><br />
</form>