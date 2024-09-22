<? require_once('inc/config.inc.php'); ?>
<ul class="subNav">
	<li><a href="javascript:;" onclick="popup('ajax', 'Estat&iacute;sticas', 'stats.php', 900)" class="active">Status dos servidores</a></li>
</ul>
<div class="popupTabsContent">
	<table class="listTable">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Speed</th>
				<th>Peso</th>
				<th>Jogadores</th>
				<th>Online</th>
				<th>Inicio</th>
				<th>Fim</th>
				<th>Premia&ccedil;&atilde;o</th>
			</tr>
		</thead>
		<tbody>
<?
	$sql = $db->query("SELECT * FROM `worlds` WHERE `world_active` = '1' ORDER BY `id` ASC");
	while($world = $db->fet_array($sql)){
		$timp = time()-300;
		$wrd = $world['world_db'];
		require_once($wrd.'/include/config.php');
		$users = $db->num($db->query("SELECT * FROM `$wrd`.`users`"));
		$onusers = $db->num($db->query("SELECT * FROM `$wrd`.`users` WHERE `last_activity` >= '".$timp."'"));
?>
			<tr>
				<td align="center"><?=urldecode($world['world_name']);?></td>
				<td align="center"><?=$func->FormatNumber($config['speed']);?>x</td>
				<td align="center"><?=$world['world_peso'];?></td>
				<td align="center"><?=$func->FormatNumber($users);?></td>
				<td align="center"><?=$func->FormatNumber($onusers);?></td>
				<td align="center"><?=date('d.m.Y', $world['world_start']);?></td>
				<td align="center"><?=date('d.m.Y', $world['world_end']);?></td>
				<td align="center"><?=$world['world_bonus'];?> GC's</td>
			</tr>
<?
	}
?>
<center><a href="http://LanServers.tk" target="_blank">LanServers</a></center>
		</tbody>
	</table>
</div>