<?
	$wsql = $db->query("SELECT * FROM `worlds` WHERE `world_active` = '1'");
	$nwords = $db->num($wsql);

	$wrd = $func->EscapeString($_GET['db']);
	if(empty($wrd)){
		$up = $db->fet_array($db->query("SELECT * FROM `worlds` WHERE `world_active` = '1' ORDER BY `id` ASC"));
		$wrd = $func->EscapeString($up['world_db']);
	}

	if($_GET['action'] == 'add_bonus'){
		require_once('../'.$wrd.'/include.inc.php');
		$qtde = $func->EscapeString(intval($_POST['qtde']));
		$bonus = $func->EscapeString(intval($_POST['bonus']));
		if($qtde <= 250 && $qtde >= 1){
			for($i=1;$i<=$qtde; $i++){
				create_village(-1, $config['left_name'], "random");
			}
			$all = $db->query("SELECT * FROM `$wrd`.`villages`");
			$all_e = $db->numrows($all);
			$lim1 = $all_e - $qtde;
			$qu1 = $db->query("SELECT * FROM `$wrd`.`villages` ORDER BY `id` LIMIT $lim1, $all_e");
			while($er1 = $db->fetch($qu1)){
				if($bonus == 0){
					$rand = rand(1, 6);
					$u1 = $db->query("UPDATE `$wrd`.`villages` SET bonus = '".$rand."', `name` = 'Aldeia+bonus' WHERE `id` = '".$er1['id']."'");
				}else{
					$u1 = $db->query("UPDATE `$wrd`.`villages` SET bonus = '".$bonus."', `name` = 'Aldeia+bonus' WHERE `id` = '".$er1['id']."'");
				}
			}
			if($u1){
				header('Location: menu.php?screen=settings_villages&db='.$wrd.'&add_bonus=succes');
			}
		}else{
			header('Location: menu.php?screen=settings_villages&db='.$wrd.'&add_bonus=error');
		}
	}

	$sate1 = $db->num($db->query("SELECT * FROM `$wrd`.`villages` WHERE `bonus` = '1'"));
	$sate2 = $db->num($db->query("SELECT * FROM `$wrd`.`villages` WHERE `bonus` = '2'"));
	$sate3 = $db->num($db->query("SELECT * FROM `$wrd`.`villages` WHERE `bonus` = '3'"));
	$sate4 = $db->num($db->query("SELECT * FROM `$wrd`.`villages` WHERE `bonus` = '4'"));
	$sate5 = $db->num($db->query("SELECT * FROM `$wrd`.`villages` WHERE `bonus` = '5'"));
	$sate6 = $db->num($db->query("SELECT * FROM `$wrd`.`villages` WHERE `bonus` = '6'"));
	$total = $sate1+$sate2+$sate3+$sate4+$sate5+$sate6;
	$sate = $db->num($db->query("SELECT * FROM `$wrd`.`villages` WHERE `userid` = '-1' AND `bonus` <= '0'"));

	if($_GET['action'] == "add_comun"){
		require_once('../'.$wrd.'/include.inc.php');
		$qtde = $func->EscapeString(intval($_POST['qtde']));
		if($qtde <= 250 && $qtde >= 1){
			for($i=1;$i<=$qtde;$i++){
				$q1 = create_village(-1, $config['left_name'], "random");
			}
			header('Location: menu.php?screen=settings_villages&db='.$wrd.'&add_comun=succes');
		}else{
			header('Location: menu.php?screen=settings_villages&db='.$wrd.'&add_comun=error');
		}
	}
?>

<h2>Gerenciar aldeias</h2>
<p>Aqui você pode adicionar aldeias abandonadas em qualquer mundo que esteja aberto no servidor.</p>
<table class="vis" style="border-spacing:1px; background-color:#FEE47D;" width="100%" align="center">
	<tr><th colspan="<?=$nwords;?>">&raquo; Mundos</th></tr>
	<tr>
<?
	while($mundo = $db->fet_array($wsql)){
?>
		<td<? if($mundo['world_db']==$wrd){echo" class=\"selected\"";} ?>>
			<a href="menu.php?screen=settings_villages&db=<?=$mundo['world_db'];?>"><? if($mundo['world_db']==$wrd){echo"&raquo; ";} ?><?=urldecode($mundo['world_name']);?></a>
		</td>
<?
	}
?>
	</tr>
</table>
<table width="100%" align="center">
	<tr>
		<td width="50%" valign="top">
			<h3>&raquo; Adicionar aldeias bonus</h3>
			<form action="menu.php?screen=settings_villages&action=add_bonus&db=<?=$wrd;?>" method="post">
				<table class="vis" width="100%" style="border-spacing:1px; background-color:#FEE47D;">
					<tr><th colspan="4">Adicionar aldeias bonus (m&aacute;x.: 250)</th></tr>
					<? if($_GET['add_bonus'] == 'error'){ ?>
					<tr><td colspan="4"><div class="error">O limite para adicionar aldeias é entre 1 e 250 aldeias.</div></td></tr>
					<? }elseif($_GET['add_bonus'] == 'succes'){ ?>
					<tr><td colspan="4"><div class="succes">Aldeias adicionadas com sucesso.</div></td></tr>
					<? } ?>
					<tr><td>Bonus:</td><td colspan="3"><select name="bonus">
						<option value="0" selected="selected">Aleat&oacute;rio</option>
						<option value="1">Bonus de 50% no arma&eacute;m e mercadores</option>
						<option value="2">Bonus de 10% no espa&ccedil;o da fazenda</option>
						<option value="3">Bonus de 33% em recrutamento no es&aacute;bulo</option>
						<option value="4">Bonus de 33% em recrutamento no quartel</option>
						<option value="5">Bonus de 50% em recrutamento na oficina</option>
						<option value="6">Bonus de 30% na produ&ccedil;&atilde;o de recursos</option>
					</select></td></tr>
					<tr>
						<td>Quantidade:</td>
						<td><input type="text" name="qtde" size="20" maxlength="4" /></td>
						<th><center><input type="submit" value="Adicionar" class="button" /></center></th>
					</tr>
					<tr><th colspan="3" style="font-size:18px; height:20px;">&raquo; Estat&iacute;sticas das aldeias bonus</th></tr>
					<tr>
						<td colspan="3">
							<table class="vis" style="border-spacing:1px; background-color:#FEE47D;" width="100%">
								<tr><th colspan="1">Quantidade</th><th colspan="1">Tipo de bonus</th></tr>
								<tr><td align="center">Existem <b><?=$sate1;?></b> aldeias</td><td>Bonus de 50% no arma&eacute;m e mercadores</td></tr>
								<tr><td align="center">Existem <b><?=$sate2;?></b> aldeias</td><td>Bonus de 10% no espa&ccedil;o da fazenda</td></tr>
								<tr><td align="center">Existem <b><?=$sate3;?></b> aldeias</td><td>Bonus de 33% em recrutamento no es&aacute;bulo</td></tr>
								<tr><td align="center">Existem <b><?=$sate4;?></b> aldeias</td><td>Bonus de 33% em recrutamento no quartel</td></tr>
								<tr><td align="center">Existem <b><?=$sate5;?></b> aldeias</td><td>Bonus de 50% em recrutamento na oficina</td></tr>
								<tr><td align="center">Existem <b><?=$sate6;?></b> aldeias</td><td>Bonus de 30% na produ&ccedil;&atilde;o de recursos</td></tr>
								<tr><th colspan="2" style="text-align:center;">Existe um total de <b><?=$total;?></b> aldeias abandonadas com bonus</th></tr>
							</table>
						</td>
					</tr>
				</table>
			</form>
		</td>
		<td width="50%" valign="top">
			<h3>&raquo; Adicionar aldeias comuns</h3>
			<form action="menu.php?screen=settings_villages&action=add_comun&db=<?=$wrd;?>" method="post">
				<table class="vis" style="border-spacing:1px; background-color:#FEE47D;" width="100%">
					<tr><th colspan="3">Adicionar aldeias comuns(m&aacute;x.: 250)</th></tr>
					<? if($_GET['add_comun'] == 'error'){ ?>
					<tr><td colspan="4"><div class="error">O limite para adicionar aldeias é entre 1 e 250 aldeias.</div></td></tr>
					<? }elseif($_GET['add_comun'] == 'succes'){ ?>
					<tr><td colspan="4"><div class="succes">Aldeias adicionadas com sucesso.</div></td></tr>
					<? } ?>
					<tr>
						<td>Quantidade:</td>
						<td><input type="text" name="qtde" size="20" maxlength="4" /></td>
						<th><center><input name="buton" type="submit" value="Adicionar" class="button" /></center></th>
					</tr>
					<tr><th colspan="3"><b>Existem <?=$sate;?> aldeias abandonadas comuns</b></th></tr>
				</table>
			</form>
		</td>
	</tr>
</table>