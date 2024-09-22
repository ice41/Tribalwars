{php}
	$userid = $this->_tpl_vars['user']['id'];
	include("include/configs/coins.php");

	// selectam toate satele userului
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page = 1;
	}
	$start_from = ($page-1) * 25;

	$villages = mysql_query("SELECT * FROM `villages` WHERE `snob` > 0 AND `userid` = '".$userid."' LIMIT $start_from, 25");
	if($_GET['action'] == 'create' && isset($_POST['ve_taleri'])){
		foreach($_POST['vill_id'] as $vid => $value){
			// verificam informatii despre sat
			$info_vill = mysql_fetch_assoc(mysql_query("SELECT `r_wood`,`r_stone`,`r_iron`,`userid`,`snob` FROM `villages` WHERE `id` = '".$vid."'"));
			$wood = $coins['wood'] * $value;
			$stone = $coins['stone'] * $value;
			$iron = $coins['iron'] * $value;
			// verificam daca satul apartine userului
			if($info_vill['userid'] == $userid){
				//verificam daca exista curtea nobila
				if($info_vill['snob'] > 0){
					// verificam daca satul are destule resurse
					if($info_vill['r_wood'] < $wood || $info_vill['r_stone'] < $stone || $info_vill['r_iron'] < $iron){
						/* ??? */
					}else{
						for($test = 1; $test <= $value; $test++){
							mysql_query("UPDATE `users` SET `coins` = `coins` + 1 WHERE `id` = '".$userid."'") or die (mysql_error());
							mysql_query("UPDATE `users` SET `coins_n` = `coins_n` + 1 WHERE id = '".$userid."'") or die (mysql_error());
							$nextcoins_1 = mysql_fetch_array(mysql_query("SELECT nextsnob FROM users WHERE id = '".$userid."'")) or die (mysql_error());
							$nextcoins_2 = mysql_fetch_array(mysql_query("SELECT coins_n FROM users WHERE id = '".$userid."'")) or die (mysql_error());
							if($nextcoins_2['coins_n'] >= $nextcoins_1['nextsnob']){
								mysql_query("UPDATE users SET nextsnob = nextsnob + 1 WHERE id = '".$userid."'") or die (mysql_error());
								mysql_query("UPDATE users SET coins_n = '0' WHERE id = '".$userid."'") or die (mysql_error());
							}
						}
						mysql_query("UPDATE villages SET r_wood = r_wood - '".$wood."' WHERE id = '".$vid."'") or die (mysql_error());
						mysql_query("UPDATE villages SET r_stone = r_stone - '".$stone."' WHERE id = '".$vid."'");
						mysql_query("UPDATE villages SET r_iron = r_iron - '".$iron."' WHERE id = '".$vid."'");
					}
				}
			}
		}
		$vill = $_GET['village'];
		die(header("Location: game.php?village=$vill&screen=snob&mode=coins"));
	}
	$taleri = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$userid."'"));
{/php}
<table class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-top:5px;">
	<tr><th colspan="100%">Estat&uacute;sticas</th></tr>
	<tr><td>Total de moedas:</td><td>{php} echo $taleri['coins']; {/php}</td></tr>
	<tr><td>Limite de Nobres:</td><td>{php} echo $taleri['nextsnob']; {/php}</td></tr>
	<tr>
		<td>Falta ainda para o limite de {php}echo $taleri['nextsnob']+1;{/php} nobres:</td>
		<td>{php}echo ($taleri['nextsnob']-$taleri['coins_n']);{/php} moedas de ouro</td>
	</tr>
	<tr><td>J&aacute; guardadas para o limite de {php}echo $taleri['nextsnob']+1;{/php} nobres:</td><td>{php}echo $taleri['coins_n'];{/php} moedas de ouro</td></tr>
</table><br />
<select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
{php}
	$rs_result = mysql_query("SELECT COUNT(id) FROM `villages` WHERE `userid` = '".$userid."'");
	$row = mysql_fetch_row($rs_result); 
	$total_records = $row[0];
	$total_pages = ceil($total_records / 25);
	for($i=1; $i<=$total_pages; $i++){
		$p = $_GET['page'];
		if($_GET['page'] == $i){
			$selected = 'selected="selected"';
		}else{
			$selected = '';
		}
		echo '<option '.$selected.' value="game.php?village='.$_GET['village'].'&screen=snob&mode=coins&page='.$i.'">'.$i.'</option>';
	}
{/php}
</select>
<span style="float:right;"><a href="game.php?village={$village.id}&screen=overview_villages&mode=prod&action=reload_res">&raquo; Recarregar recursos</a></span>
<form action="game.php?village={$village.id}&screen=snob&mode=coins&action=create" method="POST">
	<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-top:5px;">
		<tr>
			<th width="300">Aldeia</th>
			<th>Recursos</th>
			<th>Cunhar</th>
		</tr>
{php}
	while($a = mysql_fetch_assoc($villages)){
		//reload_resource_villages($a['userid'], $a['id']);
		$res = mysql_fetch_assoc(mysql_query("SELECT `r_wood`,`r_iron`,`r_stone` FROM `villages` WHERE `id` = '".$a['id']."'"));
		echo '<tr><td width="140"><a href="game.php?village='.$a['id'].'&screen=overview">'.stripslashes(entparse($a['name'])).' ('.$a['x'].'|'.$a['y'].') K'.$a['continent'].'</a></td>';
		echo '<td><img src="../graphic/icons/wood.png" title="Madeira" alt="" />'.format_number($res['r_wood']).'&nbsp;<img src="../graphic/icons/stone.png" title="Argila" alt="" />'.format_number($res['r_stone']).'&nbsp;<img src="../graphic/icons/iron.png" title="Ferro" alt="" />'.format_number($res['r_iron']).'</td>';
		echo '<td><select name="vill_id['.$a['id'].']">
	    <option value="0">Selecione</option>';
		$count = 1;
		while(true){
			$wood = $coins['wood'] * $count;
			$stone = $coins['stone'] * $count;
			$iron = $coins['iron'] * $count;
			if($res['r_wood'] > $wood  && $res['r_stone'] > $stone && $res['r_iron'] > $iron){
				echo '<option value="'.$count.'">'.$count.'x '.$wood.', '.$stone.', '.$iron.'</option>';
			}else{
				break;
			}
			$count++;
		}
		echo '</select></td></tr>';
	}
{/php}
		<tr><th colspan="3"><span style="float:right;"><input type="submit" value="Cunhar moedas" name="ve_taleri" class="button" /></span></th></tr>
</table>
</form>