<?
	if($_GET['action'] == 'add' && !empty($_POST['add'])){
		if(empty($_POST['world_name']) || empty($_POST['world_link']) || empty($_POST['world_db']) || empty($_POST['world_end']) || ($_POST['world_active'] == '' || $_POST['world_active'] < '0' || $_POST['world_active'] > '1') || empty($_POST['world_peso']) || empty($_POST['world_bonus'])){
			$error = 'Preencha corretamente todos os campos.';
		}
		if(empty($error)){
			$world_end = (($_POST['world_end']+1)*86400)+time();
			$db->query("INSERT INTO `worlds` (`world_name`,`world_link`,`world_db`,`world_start`,`world_end`,`world_active`,`world_peso`,`world_bonus`) VALUES ('".urlencode($_POST['world_name'])."','".$_POST['world_link']."','".$_POST['world_db']."','".time()."','".$world_end."','".$_POST['world_active']."','".$_POST['world_peso']."','".$_POST['world_bonus']."')");
			$succes = 'O mundo foi adicionado com sucesso.';
		}
	}
	if($_GET['action'] == 'delete' && !empty($_GET['id'])){
		$db->query("DELETE FROM `worlds` WHERE `id` = '".$func->EscapeString($_GET['id'])."'");
		$succes = 'O mundo foi apagado com sucesso.';
	}
	if($_GET['acao'] == 'abrir' && !empty($_GET['db'])){
		$world_end = (($_POST['open_world_end']+1)*86400)+time();
		$db->query("UPDATE `worlds` SET `world_active` = '1' WHERE `world_db` = '".$func->EscapeString($_GET['db'])."'");
		$db->query("UPDATE `worlds` SET `world_start` = '".time()."' WHERE `world_db` = '".$func->EscapeString($_GET['db'])."'");
		$db->query("UPDATE `worlds` SET `world_end` = '".$world_end."' WHERE `world_db` = '".$func->EscapeString($_GET['db'])."'");
		$db->query("UPDATE `worlds` SET `world_peso` = '".$_POST['open_world_peso']."' WHERE `world_db` = '".$func->EscapeString($_GET['db'])."'");
		$db->query("UPDATE `worlds` SET `world_bonus`='".$_POST['open_world_bonus']."' WHERE `world_db` = '".$func->EscapeString($_GET['db'])."'");
		$succes = 'O mundo foi aberto com sucesso.';
	}
	if($_GET['action'] == 'close' && !empty($_GET['db'])){
		$world = $_GET['db'];
		$db->query("UPDATE `worlds` SET `world_active` = '0' WHERE `world_db` = '".$func->EscapeString($_GET['db'])."'");
		$db->query("TRUNCATE TABLE `$world`.`sessions`");
		$succes = 'O mundo foi fechado com sucesso.';
	}
	if(!empty($_POST['delete'])){
		$db->query("TRUNCATE TABLE `worlds`");
		$succes = 'Todos os mundos foram apagados.';
	}
		if($_GET['action'] == 'reset' && !empty($_GET['db'])){
		$world = $func->EscapeString($_GET['db']);
		require_once('../'.$world.'/include/config.php');
		mysql_query("insert ignore into login.users_hall (select null,mu.username,ma.name,ma.short,wo.world_round,wo.world_db,mu.points,mu.villages,mu.killed_units_altogether,mu.hives_total from $world.users mu left join $world.ally ma on ma.id=mu.ally left join login.worlds wo on wo.world_db='".$world."' order by mu.rang asc limit 20)") or die(mysql_error());
		mysql_query("insert into login.users_ranking (select null,mu.id,ifnull(round((((mu.points*mu.villages)/$config[speed])*(wo.world_peso/100)),0),0) from $world.users mu left join login.worlds wo on wo.world_db='".$world."' order by mu.rang asc) on duplicate key update exp = exp+(select ifnull(round((((mu.points*mu.villages)/$config[speed])*(wo.world_peso/100)),0), 0) from $world.users mu left join login.worlds wo on wo.world_db='".$world."' where mu.id=userid)") or die(mysql_error());
		$db->query("UPDATE `worlds` SET `world_round`=`world_round`+'1', `world_active`='0' WHERE `world_db` = '".$world."'");
		$db->query("UPDATE `users` SET `wins`=`wins`+'1', `gc`=`gc`+(SELECT `world_bonus` FROM `worlds` WHERE `world_db` = '".$world."') WHERE `id` = (SELECT `id` FROM `$world`.`users` ORDER BY `rang` ASC LIMIT 1)");
		$db->query("TRUNCATE TABLE `$world`.`ally`");
		$db->query("TRUNCATE TABLE `$world`.`ally_contracts`");
		$db->query("TRUNCATE TABLE `$world`.`ally_events`");
		$db->query("TRUNCATE TABLE `$world`.`ally_invites`");
		$db->query("TRUNCATE TABLE `$world`.`ally_reservations`");
		$db->query("TRUNCATE TABLE `$world`.`build`");
		$db->query("UPDATE `$world`.`create_village` SET `nw_c`='1',`no_c`='1',`so_c`='1',`sw_c`='1',`nw`='0',`no`='0',`so`='0',`sw`='0'");
		$db->query("UPDATE `$world`.`create_village` SET `no_alpha`='0',`nw_alpha`='0',`so_alpha`='0',`sw_alpha`='0',`next_left`='".$config['count_create_left']."'");
		$db->query("TRUNCATE TABLE `$world`.`dealers`");
		$db->query("TRUNCATE TABLE `$world`.`events`");
		$db->query("TRUNCATE TABLE `$world`.`logins`");
		$db->query("TRUNCATE TABLE `$world`.`logs`");
		$db->query("TRUNCATE TABLE `$world`.`mail`");
		$db->query("TRUNCATE TABLE `$world`.`mail_archiv`");
		$db->query("TRUNCATE TABLE `$world`.`mail_block`");
		$db->query("TRUNCATE TABLE `$world`.`mail_in`");
		$db->query("TRUNCATE TABLE `$world`.`mail_out`");
		$db->query("TRUNCATE TABLE `$world`.`mail_send`");
		$db->query("TRUNCATE TABLE `$world`.`movements`");
		$db->query("TRUNCATE TABLE `$world`.`offers`");
		$db->query("TRUNCATE TABLE `$world`.`offers_multi`");
		$db->query("TRUNCATE TABLE `$world`.`quickbar`");
		$db->query("TRUNCATE TABLE `$world`.`recruit`");
		$db->query("TRUNCATE TABLE `$world`.`reports`");
		$db->query("TRUNCATE TABLE `$world`.`research`");
		$db->query("TRUNCATE TABLE `$world`.`run_events`");
		$db->query("TRUNCATE TABLE `$world`.`sessions`");
		$db->query("TRUNCATE TABLE `$world`.`share`");
		$db->query("TRUNCATE TABLE `$world`.`unit_place`");
		$db->query("TRUNCATE TABLE `$world`.`users`");
		$db->query("TRUNCATE TABLE `$world`.`villages`");
		$succes = 'Mundo resetado com sucesso.';
	}
?>
<h2>Gerenciar mundos</h2>
<p>Aqui você pode gerenciar os mundos (ver estatísticas, abrir, fechar, resetar e editar).</p>
<? if(!empty($error)){ echo '<div class="error">'.$error.'</div>'; } ?>
<? if(!empty($succes)){ echo '<div class="succes">'.$succes.'</div>'; } ?>
<?
	if($_GET['action'] == 'open' && empty($_GET['acao'])){
		$select = $db->fet_array($db->query("SELECT * FROM `worlds` WHERE `world_db` = '".$func->EscapeString($_GET['db'])."'"));
?>
<form action="menu.php?screen=settings_worlds&amp;action=open&amp;db=<?=$_GET['db'];?>&amp;acao=abrir" method="post">
	<table class="vis" width="90%" style="border-spacing:1px; background-color:#FEE47D;">
		<tr><th colspan="2">Abrir Mundo: <?=urldecode($select['world_name']);?></th></tr>
		<tr><td>Dura&ccedil;&atilde;o:</td><td><input type="text" name="open_world_end" size="35" /> <b>&raquo</b> Dura&ccedil;&atilde;o em dias</td></tr>
		<tr><td>Peso:</td><td><input type="text" name="open_world_peso" size="35" value="<?=$select['world_peso'];?>" /> <b>&raquo</b> Peso do mundo (Ex.: Velocidade alta peso alto, velocidade baixa peso baixo.)</td></tr>
		<tr><td>Premia&ccedil;&atilde;o:</td><td><input type="text" name="open_world_bonus" size="35" value="<?=$select['world_bonus'];?>" /> <b>&raquo</b> Premia&ccedil;&atilde;o em PP's</td></tr>
		<tr><th colspan="2"><div align="right"><input type="submit" name="open" value="Abrir" class="button" /></div></th></tr>

	</table><br />
</form>

<? }else{ ?>
<form action="menu.php?screen=settings_worlds&amp;action=add" method="post">
	<table class="vis" width="90%" style="border-spacing:1px; background-color:#FEE47D;">
		<tr><th colspan="2">Adiconar mundo</th></tr>
		<tr><td width="15%">Nome:</td><td><input type="text" name="world_name" size="35" /> <b>&raquo</b> Nome de exibi&ccedil;&atilde;o do mundo</td></tr>
		<tr><td>Link:</td><td> <input type="text" name="world_link" size="35" /> <b>&raquo</b> Pasta onde esta localizado os arquivos do mundo</td></tr>
		<tr><td>DB:</td><td><input type="text" name="world_db" size="35" /> <b>&raquo</b> Nome do banco dedados do mundo</td></tr>
		<tr><td>Dura&ccedil;&atilde;o:</td><td><input type="text" name="world_end" size="35" /> <b>&raquo</b> Dura&ccedil;&atilde;o em dias</td></tr>
		<tr>
			<td>Status:</td>
			<td>
				<label><input type="radio" name="world_active" value="1" /> Aberto</label> <b>|</b> 
				<label><input type="radio" name="world_active" value="0" checked="checked" /> Fechado</label>
			</td>
		</tr>
		<tr><td>Peso:</td><td><input type="text" name="world_peso" size="35" /> <b>&raquo</b> Peso do mundo (Ex.: Velocidade alta peso alto, velocidade baixa peso baixo.)</td></tr>
		<tr><td>Premia&ccedil;&atilde;o:</td><td><input type="text" name="world_bonus" size="35" /> <b>&raquo</b> Premia&ccedil;&atilde;o em PP's</td></tr>
		<tr><th colspan="2"><div align="right"><input type="submit" name="add" value="Adicionar" class="button" /></div></th></tr>

	</table><br />
</form>
<? } ?>
<table class="vis" width="90%" style="border-spacing:1px; background-color:#FEE47D;">
	<tr><th colspan="8">Lista de mundos</th></tr>
	<tr>
		<th style="text-align:center;">#</th>
		<th>Nome</th>
		<th width="70">Velocidade</th>
		<th>Peso</th>
		<th width="120">Premia&ccedil;&atilde;o (PP's)</th>
		<th>Inicio</th>
		<th>Fim</th>
		<th>A&ccedil;&atilde;o</th>
	</tr>
<?
	$sql2 = $db->query("SELECT * FROM `worlds` ORDER BY `id` ASC");
	while($wrd = $db->fet_array($sql2)){
		require_once('../'.$wrd['world_link'].'/include/config.php');
?>
	<tr>
		<td align="center"><a href="menu.php?screen=settings_worlds&amp;action=delete&amp;id=<?=$wrd['id'];?>"><img src="../graphic/icons/delete.png" /></a></td>
		<td align="center"><a href="menu.php?screen=settings_worlds&amp;online=<?=$wrd['world_db'];?>"><?=urldecode($wrd['world_name']);?></a></td>
		<td align="center"><?=$func->FormatNumber($config['speed']);?>x</td>
		<td align="center"><?=$wrd['world_peso'];?></td>
		<td align="center"><?=$func->FormatNumber($wrd['world_bonus']);?></td>
		<td align="center"><?=date('d.m.Y', $wrd['world_start']);?></td>
		<td align="center"><?=date('d.m.Y', $wrd['world_end']);?></td>
		<td align="center">
			<? if($wrd['world_active']=='1'){ ?>
			<div class="button" title="Fechar o mundo & Encerrar todas as sess&otilde;es">
				<a href="menu.php?screen=settings_worlds&amp;action=close&amp;db=<?=$wrd['world_db'];?>">Fechar</a>
			</div>
			<? }else{ ?>
			<div class="button" title="Abrir o mundo">
				<a href="menu.php?screen=settings_worlds&amp;action=open&amp;db=<?=$wrd['world_db'];?>">Abrir</a>
			</div>
			<? } ?>
			<div class="button" title="Resetar o mundo">
				<a href="menu.php?screen=settings_worlds&amp;action=reset&amp;db=<?=$wrd['world_db'];?>">Resetar</a>
			</div>
		</td>
	</tr>
<?
	}
?>
	<tr>
		<form action="" method="post">
			<th colspan="8"><span style="float:right;"><input type="submit" name="delete" value="Apagar todos" class="button" /></span></th>
		</form>
	</tr>
</table><br />
<?
	if($_GET['online'] != ''){
		$lipe = $db->fet_array($db->query("SELECT * FROM `worlds` WHERE `world_db` = '".$func->EscapeString($_GET['online'])."'"));
		$lipe_time = time()-300;
		$dbw = $func->EscapeString($_GET['online']);
		$Querry = $db->fet_array($db->query("SELECT COUNT(id) AS online FROM `$dbw`.`users` WHERE `last_activity` > '".$lipe_time."'"));
?>
<br />
<table class="vis" width="90%" style="border-spacing:1px; background-color:#FEE47D;">
	<tr><th colspan="6">Jogadores online em: <?=urldecode($lipe['world_name']);?><span style="float:right;">Online: <?=$func->FormatNumber($Querry['online']);?></span></th></tr>
	<tr>
		<th>&raquo; Rank</th>
		<th>&raquo; Jogador</th>
		<th>&raquo; Pontos</th>
		<th>&raquo; Aldeias</th>
		<th>&raquo; Tribo</th>
		<th>&raquo; Ultima a&ccedil;&atilde;o</th>
	</tr>
<?
	$MyWorld = $_GET['online'];
	$MyQuery = $db->query("SELECT * FROM `$MyWorld`.`users` WHERE `last_activity` > '".$lipe_time."' ORDER BY `rang` ASC");
	if($db->num($MyQuery) <= 0){
		echo('<tr><td colspan="7"><div class="error">NENHUM JOGADOR ONLINE NESTE MUNDO.</div></td></tr>');
	}else{
		while($row = $db->fet_array($MyQuery)){
			$ally = $db->fet_array($db->query("SELECT * FROM $MyWorld.ally WHERE id = '".$row['ally']."'"));
?>
	<tr>
		<td align="center"><?=$func->FormatNumber($row['rang']);?></td>
		<td align="center"><?=urldecode($row['username']);?></td>
		<td align="center"><?=$func->FormatNumber($row['points']);?></td>
		<td align="center"><?=$func->FormatNumber($row['villages']);?></td>
		<td align="center"><? if($row['ally'] == '-1'){ echo '---'; }else{ echo urldecode($ally['short']); } ?></td>
		<td align="center"><?=date("d.m.Y, H:i",$row['last_activity']);?></td>
	</tr>
<? } } ?>
</table><br />
<? } ?>