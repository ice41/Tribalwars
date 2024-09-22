<? require_once('inc/config.inc.php'); ?>
<ul class="subNav">
	<li style="margin-right:5px;"><a href="javascript:;" onclick="popup('ajax', 'Hall da Fama', 'ranking.php?rank=hall', 900)"<? if($_GET['rank'] == 'hall'){ ?>class="active"<? } ?>>Hall da Fama</a></li>
	<li style="margin-right:5px;"><a href="javascript:;" onclick="popup('ajax', 'Ranking Global', 'ranking.php?rank=global', 900)"<? if(empty($_GET['rank']) || $_GET['rank'] == 'global'){ ?>class="active"<? } ?>>Ranking Global</a></li>
	<li style="margin-right:5px;"><a href="javascript:;" onclick="popup('ajax', 'Ranking de Jogadores', 'ranking.php?rank=players', 900)"<? if($_GET['rank'] == 'players'){ ?>class="active"<? } ?>>Ranking de Jogadores</a></li>
	<li style="margin-right:5px;"><a href="javascript:;" onclick="popup('ajax', 'Ranking de Tribos', 'ranking.php?rank=allys', 900)"<? if($_GET['rank'] == 'allys'){ ?>class="active"<? } ?>>Ranking de Tribos</a></li>
</ul>
<? if(empty($_GET['rank']) || $_GET['rank'] == 'global'){ ?>
<div class="popupTabsContent">
	<div align="right">
		<select onchange="popup('ajax', 'Ranking Global', 'ranking.php?rank=global&pag=' + this.value, 900)" class="hall_select">
<?
	$results = $db->num($db->query("SELECT * FROM `users_ranking` WHERE `exp` > '0'"));
	$total_pages = ceil($results/20);
	if(isset($_GET['pag'])){ $p = $_GET['pag']; }else{ $p = 1; }
	if($_GET['pag'] <= 0){ $p = 1; }elseif($_GET['pag'] > $total_pages){ $p = $total_pages; }
	$inicio = ($p*20)-20;
	for($i=1;$i<=$total_pages;$i++){
		if($_GET['pag'] == $i){ $selected = 'selected="selected"'; }else{ $selected = ''; }
		echo '<option '.$selected.' value="'.$i.'">'.$i.'</option>';
	}
	$sRank = $db->query("SELECT us.username username, lh.exp pontos, us.wins wins FROM login.users_ranking lh left join login.users us on us.id=lh.userid where lh.exp > 0 ORDER BY lh.exp DESC, `lh`.`userid` ASC LIMIT $inicio,20");
	$posicao = $inicio;
?>
		</select>
		&nbsp;&nbsp;
	</div>
	<table class="listTable">
		<thead>
			<tr>
				<th>Rank</th>
				<th>Jogador</th>
				<th>Pontos</th>
				<th>Titulo de nobresa</th>
				<th>Vit&oacute;rias</th>
			</tr>
		</thead>
		<tbody>
			<? while($rank = $db->fet_array($sRank)){ $inicio++; ?>
			<tr>
				<td align="center"><?=$inicio;?>&deg;</td>
				<td align="center"><?=urldecode($rank['username']);?></td>
				<td align="center"><?=$func->FormatNumber($rank['pontos']);?></td>
				<td align="center"><?=$func->TitleName($rank['pontos']);?></td>
				<td align="center"><?=$func->FormatNumber($rank['wins']);?></td>
			</tr>
			<? } ?>
		</tbody>
	</table>
</div>
<? }elseif($_GET['rank'] == 'players'){ ?>
<?
	$sql = $db->fet_array($db->query("SELECT * FROM `worlds` WHERE `world_active` = '1' ORDER BY `id` ASC LIMIT 0,1"));
	if(empty($_GET['world'])){
		$wrd = $sql['world_db'];
	}else{
		$wrd = $func->EscapeString($_GET['world']);
	}
?>
<div class="popupTabsContent">
	<div align="right">
		<select onchange="popup('ajax', 'Ranking de Jogadores', 'ranking.php?rank=players&world=' + this.value, 900)" class="hall_select">
<?
	$m_sql = $db->query("SELECT * FROM `worlds` WHERE `world_active` = '1' ORDER BY `id` ASC");
	while($mundo = $db->fet_array($m_sql)){
		if($_GET['world'] == $mundo['world_db']){ $selected = 'selected="selected"'; }else{ $selected = ''; }
		echo '<option '.$selected.' value="'.$mundo['world_db'].'">'.urldecode($mundo['world_name']).'</option>';
	}
?>
		</select>
		&nbsp;&nbsp;
		<select onchange="popup('ajax', 'Ranking de Jogadores', 'ranking.php?rank=players&world=<?=$wrd;?>&pag=' + this.value, 900)" class="hall_select">
<?
	$results = $db->num($db->query("SELECT * FROM `$wrd`.`users`"));
	$total_pages = ceil($results/20);
	if(isset($_GET['pag'])){ $p = $_GET['pag']; }else{ $p = 1; }
	if($_GET['pag'] <= 0){ $p = 1; }elseif($_GET['pag'] > $total_pages){ $p = $total_pages; }
	$inicio = ($p*20)-20;
	for($i=1;$i<=$total_pages;$i++){
		if($_GET['pag'] == $i){ $selected = 'selected="selected"'; }else{ $selected = ''; }
		echo '<option '.$selected.' value="'.$i.'">'.$i.'</option>';
	}
	$sRank = $db->query("SELECT * FROM `$wrd`.`users` ORDER BY `rang` ASC LIMIT $inicio,20");
?>
		</select>
	</div>
	<table class="listTable">
		<thead>
			<tr>
				<th>Rank</th>
				<th>Jogador</th>
				<th>Tribo</th>
				<th>Pontos</th>
				<th>Aldeias</th>
				<th>OD</th>
			</tr>
		</thead>
		<tbody>
			<? while($rank = $db->fet_array($sRank)){ ?>
			<tr>
				<td align="center"><?=$rank['rang'];?>&deg;</td>
				<td align="center"><?=urldecode($rank['username']);?></td>
				<td align="center"><?=urldecode($func->AllyName($rank['ally'], $wrd));?></td>
				<td align="center"><?=$func->FormatNumber($rank['points']);?></td>
				<td align="center"><?=$func->FormatNumber($rank['villages']);?></td>
			</tr>
			<? } ?>
		</tbody>
	</table>
</div>
<? }elseif($_GET['rank'] == 'allys'){ ?>
<?
	$sql = $db->fet_array($db->query("SELECT * FROM `worlds` WHERE `world_active` = '1' ORDER BY `id` ASC LIMIT 0,1"));
	if(empty($_GET['world'])){
		$wrd = $sql['world_db'];
	}else{
		$wrd = $func->EscapeString($_GET['world']);
	}
?>
<div class="popupTabsContent">
	<div align="right">
		<select onchange="popup('ajax', 'Ranking de Jogadores', 'ranking.php?rank=allys&world=' + this.value, 900)" class="hall_select">
<?
	$m_sql = $db->query("SELECT * FROM `worlds` WHERE `world_active` = '1' ORDER BY `id` ASC");
	while($mundo = $db->fet_array($m_sql)){
		if($_GET['world'] == $mundo['world_db']){ $selected = 'selected="selected"'; }else{ $selected = ''; }
		echo '<option '.$selected.' value="'.$mundo['world_db'].'">'.urldecode($mundo['world_name']).'</option>';
	}
?>
		</select>
		&nbsp;&nbsp;
		<select onchange="popup('ajax', 'Ranking de Jogadores', 'ranking.php?rank=allys&world=<?=$wrd;?>&pag=' + this.value, 900)" class="hall_select">
<?
	$results = $db->num($db->query("SELECT * FROM `$wrd`.`ally`"));
	$total_pages = ceil($results/20);
	if(isset($_GET['pag'])){ $p = $_GET['pag']; }else{ $p = 1; }
	if($_GET['pag'] <= 0){ $p = 1; }elseif($_GET['pag'] > $total_pages){ $p = $total_pages; }
	$inicio = ($p*20)-20;
	for($i=1;$i<=$total_pages;$i++){
		if($_GET['pag'] == $i){ $selected = 'selected="selected"'; }else{ $selected = ''; }
		echo '<option '.$selected.' value="'.$i.'">'.$i.'</option>';
	}
	$sRank = $db->query("SELECT * FROM `$wrd`.`ally` ORDER BY `rank` ASC LIMIT $inicio,20");
?>
		</select>
	</div>
	<table class="listTable">
		<thead>
			<tr>
				<th>Rank</th>
				<th>Nome</th>
				<th>TAG</th>
				<th>Membros</th>
				<th>Pontos</th>
				<th>Aldeias</th>
				<th>ODA</th>
				<th>ODD</th>
				<th>OD</th>
			</tr>
		</thead>
		<tbody>
			<? while($rank = $db->fet_array($sRank)){ ?>
			<tr>
				<td align="center"><?=$rank['rank'];?>&deg;</td>
				<td align="center"><?=urldecode($rank['name']);?></td>
				<td align="center"><?=urldecode($rank['short']);?></td>
				<td align="center"><?=$func->FormatNumber($rank['members']);?></td>
				<td align="center"><?=$func->FormatNumber($func->AllyInfoSum($rank['id'], 'points', $wrd));?></td>
				<td align="center"><?=$func->FormatNumber($func->AllyInfoSum($rank['id'], 'villages', $wrd));?></td>
				<td align="center"><?=$func->FormatNumber($func->AllyInfoSum($rank['id'], 'killed_units_att', $wrd));?></td>
				<td align="center"><?=$func->FormatNumber($func->AllyInfoSum($rank['id'], 'killed_units_def', $wrd));?></td>
				<td align="center"><?=$func->FormatNumber($func->AllyInfoSum($rank['id'], 'killed_units_altogether', $wrd));?></td>
			</tr>
			<? } ?>
		</tbody>
	</table>
</div>
<? }elseif($_GET['rank'] == 'hall'){ ?>
<?
	$sql = $db->fet_array($db->query("SELECT * FROM `worlds` ORDER BY `id` ASC LIMIT 0,1"));
	if(empty($_GET['world'])){
		$wrd = $sql['world_db'];
	}else{
		$wrd = $func->EscapeString($_GET['world']);
	}
?>
<div class="popupTabsContent">
	<div align="right">
		<select onchange="popup('ajax', 'Hall da Fama', 'ranking.php?rank=hall&world=' + this.value, 900)" class="hall_select">
<?
	$m_sql = $db->query("SELECT * FROM `worlds` ORDER BY `id` ASC");
	while($mundo = $db->fet_array($m_sql)){
		if($_GET['world'] == $mundo['world_db']){ 
		   $selected = 'selected="selected"'; 
		}else{ 
		   $selected = ''; 
		}
		echo '<option '.$selected.' value="'.$mundo['world_db'].'">'.urldecode($mundo['world_name']).'</option>';
	}
?>
		</select>
		&nbsp;&nbsp;
		<select onchange="popup('ajax', 'Hall da Fama', 'ranking.php?rank=hall&world=<?=$wrd;?>&pag=' + this.value, 900)" class="hall_select">
<?
	$results = $db->num($db->query("SELECT * FROM `users_hall` WHERE `world` = '".$wrd."' "));
	$total_pages = ceil($results/20);
	if(isset($_GET['pag'])){ 
	   $p = $_GET['pag']; 
	}else{ 
	   $p = 1; 
	}
	if($_GET['pag'] <= 0){ 
	   $p = 1; 
	}elseif($_GET['pag'] > $total_pages){ 
	   $p = $total_pages; 
	}
	$inicio = ($p*20)-20;
	for($i=1;$i<=$total_pages;$i++){
		if($_GET['pag'] == $i){ 
		   $selected = 'selected="selected"'; 
		}else{ 
		   $selected = ''; 
		}
		echo '<option '.$selected.' value="'.$i.'">'.$i.'</option>';
	}
	$sRank = $db->query("SELECT * FROM `users_hall` WHERE `world` = '".$wrd."' ORDER BY `round` DESC, `points` DESC, `villages` DESC, `od` DESC LIMIT $inicio,20");
?>
		</select>
	</div>
	<table class="listTable">
		<thead>
			<tr>
				<th width="80">Round</th>
				<th width="120">Vencedor</th>
				<th width="90">Tribo</th>
				<th width="80">Pontos</th>
				<th width="80">Aldeias</th>
				<th width="80">OD</th>
				<th width="80">Saque</th>
			</tr>
		</thead>
		<tbody>
			<? while($rank = $db->fet_array($sRank)){ ?>
			<tr>
				<td align="center"><?=$rank['round'];?></td>
				<td align="center"><?=urldecode($rank['username']);?></td>
				<td align="center"><?=urldecode($rank['ally']);?></td>
				<td align="center"><?=$func->FormatNumber($rank['points']);?></td>
				<td align="center"><?=$func->FormatNumber($rank['villages']);?></td>
				<td align="center"><?=$func->FormatNumber($rank['od']);?></td>
				<td align="center"><?=$func->FormatNumber($rank['hives']);?></td>
			</tr>
			<? } ?>
		</tbody>
	</table>
</div>
<? } ?>