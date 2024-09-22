{php}
	$userid = $this->_tpl_vars['user']['id'];
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '$userid'"));

	include("include/config.php");
	$time = time();

	$select_d = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `delete_acc` < $time AND `delete_acc` > 1"));
	$select_a = $select_d['id'];

	if($user['delete_acc'] != '0'){
{/php}
		{include file="game_ann_delete.tpl"}
{php}
		if($_GET['action'] == 'backup'){
			mysql_query("UPDATE `users` SET `delete_acc` = '0' WHERE `id` = '$userid'");
			die(header("Location: game.php"));
		}
	}else{
		if($user['sleep'] == '1'){
			$reactive_time = $config['sleep_reactive_time'] * 60;
			$reactive_time = $reactive_time + $user['sleep_start'];
			if($time >= $reactive_time){
				if(isset($_GET['sleep']) AND $_GET['sleep'] == 'reactive'){
					mysql_query("UPDATE `users` SET `sleep` = '0' WHERE `id` = '".$userid."'");
					mysql_query("UPDATE `users` SET `sleep_end` = '0' WHERE `id` = '".$userid."'");
					header("Location: game.php");
					exit;
				}
			}else{
				$this->_tpl_vars['erro'] = "Sua conta poder&aacute; ser reativada ap&oacute;s ".$config['sleep_reactive_time']." minuto(s) da ativa&ccedil;&atilde;o do modo noturno.";
			}

			$scadere = $user['sleep_end'] - time();
			mysql_query("UPDATE `users` SET `sleep_time` = '".$scadere."' WHERE `id` = '".$userid."'");
			if($scadere < 0){
		    	mysql_query("UPDATE `users` SET `sleep` = '0' WHERE `id` = '".$userid."'");
			    die(header("Location: game.php"));
			}
			$this->_tpl_vars['user']['sleep_end'] = $scadere;
{/php}
			{include file="game_ann_sleep.tpl"}
{php}
		}else{
			if($user['map_size'] > 18){ mysql_query("UPDATE `users` SET `map_size` = '9' WHERE `id` = '".$userid."'"); }

			$user_vills = $this->_tpl_vars['user']['villages'];
			$check_vills = mysql_num_rows(mysql_query("SELECT * FROM `villages` WHERE `userid` = '".$userid."'"));
			if($user_vills != $check_vills){
				mysql_query("UPDATE `users` SET `villages` = '".$check_vills."' WHERE `id` = '".$userid."'");
				reload_village_points($this->_tpl_vars['village']['id']);
				reload_player_points($this->_tpl_vars['user']['id']); 
				reload_ally_points($this->_tpl_vars['user']['ally']);
				reload_ally_rangs();
				reload_player_rangs();
				header("Location: ".$_SERVER['REQUEST_URI']);
			}

			$username = entparse($this->_tpl_vars['user']['username']);
			$sql111 = mysql_query("SELECT * FROM `villages` WHERE `userid` = '".$userid."'");
			while($sss = mysql_fetch_array($sql111)){
				$aldeia = urldecode($sss['name']);
				if(preg_match('/   /', $aldeia) || preg_match('/s Dorf/', $aldeia)){
					$this->_tpl_vars['village']['name'] = "Aldeia de $username";
					$vill_name = $this->_tpl_vars['village']['name'];
					mysql_query("UPDATE `villages` SET `name` = '".parse($vill_name)."' WHERE `id` = '".$sss['id']."'");
					header("Location: ".$_SERVER['REQUEST_URI']);
				}
			}

			mysql_query("UPDATE `users` SET `sleep` = '0' WHERE `sleep_end` < '".time()."' AND `sleep_end` > '1'");
			mysql_query("UPDATE `users` SET `sleep_time` = '0' WHERE `sleep_end` < '".time()."' AND `sleep_end` > '1'");

			$select = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$userid."'"));
			$select = $select['noob_protection'];
			require('include/config.php');
			$s1 = $config['noob_protection_v1']*60;
			$all = $time+$s1;
			if($select == '0'){
				mysql_query("UPDATE `users` SET `noob_protection` = '".$all."' WHERE `id` = '".$userid."'");
				header("Location: ".$_SERVER['REQUEST_URI']."");
			}

			$new_ticket = mysql_num_rows(mysql_query("SELECT * FROM `login`.`support` WHERE `new` = '1' AND `userid` = '".$userid."'"));

			if($this->_tpl_vars['user']['ally'] <= '-1' && $_GET['do'] != 'create'){ 
				mysql_query("UPDATE `users` SET  `ally_found` =  '0', `ally_lead` =  '0', `ally_invite` =  '0', `ally_diplomacy` =  '0', `ally_mass_mail` =  '0', `ally_forum_mod` = '0', `ally_internal_forum` = '0', `ally_trusted_member` = '0' WHERE `id` = '".$userid."'");
			}
			mysql_query("UPDATE `login`.`users` SET `last_activity` = '".$time."' WHERE `id` = '".$userid."'");
{/php}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>{$village.name} ({$village.x}|{$village.y}) K{$village.continent} - Empire of War - Mundo 1</title>
	<link rel="stylesheet" href="../css/game.css" type="text/css" />
	<link rel="icon" href="../graphic/icons/rabe.png" type="image/x-icon"> 
	<link rel="shortcut icon" href="../graphic/icons/rabe.png" type="image/x-icon">
	{php}if($_GET['mode'] != 'forum'){echo "<meta http-equiv=\"refresh\" content=\"250\">\r\n";}{/php}
	<script type="text/javascript" src="../js/script.js"></script>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/func.js"></script>
	<script type="text/javascript">
		var vid = {$village.id};
		var act_vid = {$village.id};
		var act_points = {$user.points};
		var userid = {$user.id};
		var storage = {$max_storage};
	</script>
	<!--[if IE 6]>
		<script type="text/javascript">document.execCommand("BackgroundImageCache",false,true);</script>
	<![endif]-->
</head>
{php}
	if($_GET['screen'] == 'overview'){
		if($_COOKIE['info_acc'] == '1') { $onload[] = 'hide_info_acc()'; } 
		if($_COOKIE['info_ally'] == '1') { $onload[] = 'hide_info_ally()'; } 
		if($_COOKIE['inamici_invinsi'] == '1') { $onload[] = 'hide_inamici_invinsi()'; } 
		if($_COOKIE['logs5'] == '1') { $onload[] = 'hide_logs5()'; } 
	}
{/php}
<body onload="{php}if(isset($onload)){foreach($onload as $test){$count = $i++ + 1;if($count>1){echo ",".$test;}else{echo $test;}}}{/php}">
{if $user.dyn_menu==1}
<table class="menu nowrap" align="center" width="{$user.window_width}" cellspacing="0">
	<tr id="menu_row">
		<td height="24"><div align="center"><a href="game.php?village={$village.id}&amp;screen=&amp;action=logout&amp;h={$hkey}" target="_top">Sair</a></div></td>
		<td><div align="center"><a href="http://LanServers.tk" target="_blank">LanServers</a></div></td>
		<td><div align="center"><a href="help.php" target="_blank">Ajuda</a></div></td>
		<td><div align="center"><a href="game.php?village={$village.id}&amp;screen=settings">Configura&ccedil;&otilde;es</a></div>
			<table cellspacing="0" width="150">
				<tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=profile">&raquo; Perfil</a></td></tr>
				<tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=settings">&raquo; Configura&ccedil;&otilde;es</a></td></tr>
				<tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=email">&raquo; Endere&ccedil;o de e-mail</a></td></tr>
				<tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=change_passwd">&raquo; Trocar senha</a></td></tr>
				<tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=start">&raquo; Recome&ccedil;ar</a></td></tr>
				<tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=delete">&raquo; Apagar conta</a></td></tr>
				<tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=quickbar">&raquo; Editar barra de acesso r&aacute;pido</a></td></tr>
				<tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=share">&raquo; Compartilhar conex&atilde;o à internet</a></td></tr>
				<tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=vacation">&raquo; Modo de f&eacute;rias</a></td></tr>
				<tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=logins">&raquo; Acessos</a></td></tr>
				<tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=sleep">&raquo; Modo noturno</a></td></tr>
			</table>
		</td>
		<td><div align="center"><a href="game.php?village={$village.id}&amp;screen=ranking">Ranking</a> <b>({$user.rang}.|{$user.points|format_number} P)</b></div>
			<table cellspacing="0" width="150">
				<tr><td><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally">&raquo; Tribos</a></td></tr>
				<tr><td><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=player">&raquo; Jogadores</a></td></tr>
				<tr><td><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_player">&raquo; Oponentes derrotados</a></td></tr>
				<tr><td><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=hives">&raquo; Saqueadores</a></td></tr>
			</table>
		</td>
		<td><div align="center"><a href="game.php?village={$village.id}&amp;screen=ally">Tribo</a></div>
			{if $user.ally!=-1}
				<table cellspacing="0" width="150">
					<tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=overview">&raquo; Visualiza&ccedil;&atilde;o geral</a></td></tr>
					<tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=profile">&raquo; Perfil</a></td></tr>
					<tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=members">&raquo; Membros</a></td></tr>
					<tr><td><a href="game.php?village={$village.id}&screen=ally&mode=contracts">&raquo; Diplomacia</a></td></tr>
					<tr><td><a href="game.php?village={$village.id}&screen=ally&mode=reservations">&raquo; Reserva de aldeias</a></td></tr>
					{if $user.ally_invite==1}<tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=invite">&raquo; Convites</a></td></tr>{/if}
					{if $user.ally_lead == 1}<tr><td><a href="game.php?village={$village.id}&screen=ally&mode=intro_igm">&raquo; Bem vindo</a></td></tr>{/if}
					{if $user.ally_diplomacy==1}<tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=properties">&raquo; Propriedades</a></td></tr>{/if}
					<tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=forum">&raquo; F&oacute;rum da tribo</a></td></tr>
				</table>
			{/if}
		</td>
		<td {if $user.new_report==1}class="new_report"{/if}><div align="center"><a href="game.php?village={$village.id}&amp;screen=report">{if $user.new_report==1}<img src="../graphic/icons/new_rep.png" title="Novo relat&oacute;rio" alt="" />{/if} Relat&oacute;rios</a></div>
			<table cellspacing="0" width="150">
				<tr><td><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=all">&raquo; Todos os relat&oacute;rios</a></td></tr>
				<tr><td><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=attack">&raquo; Ataques</a></td></tr>
				<tr><td><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=defense">&raquo; Defesa</a></td></tr>
				<tr><td><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=support">&raquo; Apoio</a></td></tr>
				<tr><td><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=trade">&raquo; Mercado</a></td></tr>
				<tr><td><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=other">&raquo; Outros</a></td></tr>
				<tr><td><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=public_reports">&raquo; Relat&oacute;rios publicados</a></td></tr>
			</table>
		</td>
		<td {if $user.new_mail==1}class="new_mail"{/if}><div align="center"><a href="game.php?village={$village.id}&amp;screen=mail">{if $user.new_mail==1}<img src="../graphic/icons/new_mail.png" title="Nova mensagem" alt="" />{/if} Mensagens</a></div>
			<table cellspacing="0" width="150">
				<tr><td><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=in">&raquo; Mensagens</a></td></tr>
				<tr><td><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=new">&raquo; Escrever mensagem</a></td></tr>
				<tr><td><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=block">&raquo; Bloquear remetente</a></td></tr>
			</table>
		</td>
		<td><div align="center"><a href="game.php?village={$village.id}&amp;screen=memo">Notas</a></div></td>
		<td><div align="center"><a href="game.php?village={$village.id}&amp;screen=friends">Amigos</a></div></td>
	</tr>
</table><br />
{if $user.show_toolbar == 1}
	{include_php file="quickbar.php"}
{/if}
<table align="center" width="{$user.window_width}" cellspacing="0">
	<tr>
		<td align="left">
			<table class="menu nowrap" cellspacing="0">
				<tr id="menu_row2">
					<td height="24"><div align="center"><a href="game.php?village={$village.id}&amp;screen=overview_villages" accesskey="s">Visualiza&ccedil;&atilde;o</a></div>
						<table cellspacing="0" width="150">
							<tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=combined">&raquo; Combinado</a></td></tr>
							<tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=prod">&raquo; Produ&ccedil;&atilde;o</a></td></tr>
							<tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=units">&raquo; Tropas</a></td></tr>
							<tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=commands">&raquo; Comandos</a></td></tr>
							<tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=incomings">&raquo; Chegando</a></td></tr>
							<tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=rename">&raquo; Renoemar aldeias</a></td></tr>
						</table>
					</td>
					<td><div align="center"><a href="game.php?village={$village.id}&amp;screen=map">Mapa</a></div></td>
					<td class="no_hover"><div align="center">
					{if $user.villages>1}
						{if !empty($village_array.last)}
						<a class="village_switch_link" href="{$village_array.last_link}" accesskey="a"><span class="arrowLeft"> </span></a>
						{else}
						<span class="arrowLeftGrey"> </span>
						{/if}
						{if !empty($village_array.next)}
						<a class="village_switch_link" href="{$village_array.next_link}" accesskey="d"><span class="arrowRight"> </span></a>
						{else}
						<span class="arrowRightGrey"> </span>
						{/if}
					{/if}
					</div></td>
					<td><div align="center"><a href="game.php?village={$village.id}&amp;screen=overview">{$village.name}</a> <b>({$village.x}|{$village.y}) K{$village.continent}</b></div></td>
				</tr>
			</table>
		</td>
		<td align="center">
			<table cellspacing="0">
				<tr>
					<td>
						<table class="box" cellspacing="0">
							<tr>
								<td height="24"><a href="game.php?village={$village.id}&amp;screen=wood"><img src="../graphic/icons/wood.png" title="Madeira" alt="" /></a></td>
								<td><span id="wood" title="{$wood_per_hour}" {if $village.r_wood==$max_storage}class="warn"{/if}>{$village.r_wood}</span>&nbsp;</td>
								<td><a href="game.php?village={$village.id}&amp;screen=stone"><img src="../graphic/icons/stone.png" title="Argila" alt="" /></a></td>
								<td><span id="stone" title="{$stone_per_hour}" {if $village.r_stone==$max_storage}class="warn"{/if}>{$village.r_stone}</span>&nbsp;</td>
								<td><a href="game.php?village={$village.id}&amp;screen=iron"><img src="../graphic/icons/iron.png" title="Ferro" alt="" /></a></td>
								<td><span id="iron" title="{$iron_per_hour}" {if $village.r_iron==$max_storage}class="warn"{/if}>{$village.r_iron}</span>&nbsp;</td>
								<td style="border-left: dotted 1px;">&nbsp;
									<a href="game.php?village={$village.id}&amp;screen=storage"><img src="../graphic/icons/storage.png" title="Armaz&eacute;m" /></a>
								</td>
								<td><div id="storage" style="display:none;">{$max_storage}</div><b>{$max_storage}</b>&nbsp;</td>
							</tr>
						</table>

					</td>
					<td>
						<table class="box" cellspacing="0">
							<tr>
								<td width="18" height="24" align="center">
									<a href="game.php?village={$village.id}&amp;screen=farm"><img src="../graphic/icons/farm.png" title="Fazenda" alt="" /></a>
								</td>
								<td align="center"><b>{$village.r_bh}/{$max_bh}</b>&nbsp;</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
		{if $user.attacks>0}
		<td align="right">
			<table cellspacing="0">
				<tr>
					<td>
						<table class="box" cellspacing="0">
							<tr>
								<td width="30" height="24" class="att">
									<a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=incomings">({$user.attacks})</a>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
		{/if}
	</tr>
</table><br />
<!--[if IE ]>
	<script type="text/javascript">initMenuList("menu_row");</script>
	<script type="text/javascript">initMenuList("menu_row2");</script>
<![endif]-->
{else}
<table class="menu nowrap" align="center" width="{$user.window_width}" cellspacing="0">
	<tr id="menu_row">
		<td height="24"><div align="center"><a href="game.php?village={$village.id}&amp;screen=&amp;action=logout&amp;h={$hkey}" target="_top">Sair</a></div></td>
		<td><div align="center"><a href="#" target="_blank">F&oacute;rum</a></div></td>
		<td><div align="center"><a href="help.php" target="_blank">Ajuda</a></div></td>
		<td><div align="center"><a href="game.php?village={$village.id}&amp;screen=settings">Configura&ccedil;&otilde;es</a></div></td>
		<td><div align="center"><a href="game.php?village={$village.id}&amp;screen=premium">Premium</a></div></td>
		<td><div align="center"><a href="game.php?village={$village.id}&amp;screen=ranking">Ranking</a> <b>({$user.rang}.|{$user.points|format_number} P)</b></div></td>
		<td><div align="center"><a href="game.php?village={$village.id}&amp;screen=ally">Tribo</a></div></td>
		<td {if $user.new_report==1}class="new_report"{/if}><div align="center"><a href="game.php?village={$village.id}&amp;screen=report">{if $user.new_report==1}<img src="../graphic/icons/new_rep.png" title="Novo relat&oacute;rio" alt="" />{/if} Relat&oacute;rios</a></div></td>
		<td {if $user.new_mail==1}class="new_mail"{/if}><div align="center"><a href="game.php?village={$village.id}&amp;screen=mail">{if $user.new_mail==1}<img src="../graphic/icons/new_mail.png" title="Nova mensagem" alt="" />{/if} Mensagens</a></div></td>
		<td><div align="center"><a href="game.php?village={$village.id}&amp;screen=memo">Notas</a></div></td>
		<td><div align="center"><a href="game.php?village={$village.id}&amp;screen=friends">Amigos</a></div></td>
	</tr>
</table><br />
<table align="center" width="{$user.window_width}" cellspacing="0">
	<tr>
		<td align="left">
			<table class="menu nowrap" cellspacing="0">
				<tr id="menu_row2">
					<td height="24"><div align="center"><a href="game.php?village={$village.id}&amp;screen=overview_villages" accesskey="s">Visualiza&ccedil;&atilde;o</a></div></td>
					<td><div align="center"><a href="game.php?village={$village.id}&amp;screen=map">Mapa</a></div></td>
					<td><div align="center"><a href="game.php?village={$village.id}&amp;screen=overview">{$village.name}</a> <b>({$village.x}|{$village.y}) K{$village.continent}</b></div></td>
				</tr>
			</table>
		</td>
		<td align="center">
			<table cellspacing="0">
				<tr>
					<td>
						<table class="box" cellspacing="0">
							<tr>
								<td height="24"><a href="game.php?village={$village.id}&amp;screen=wood"><img src="../graphic/icons/wood.png" title="Madeira" alt="" /></a></td>
								<td><span id="wood" title="{$wood_per_hour}" {if $village.r_wood==$max_storage}class="warn"{/if}>{$village.r_wood}</span>&nbsp;</td>
								<td><a href="game.php?village={$village.id}&amp;screen=stone"><img src="../graphic/icons/stone.png" title="Argila" alt="" /></a></td>
								<td><span id="stone" title="{$stone_per_hour}" {if $village.r_stone==$max_storage}class="warn"{/if}>{$village.r_stone}</span>&nbsp;</td>
								<td><a href="game.php?village={$village.id}&amp;screen=iron"><img src="../graphic/icons/iron.png" title="Ferro" alt="" /></a></td>
								<td><span id="iron" title="{$iron_per_hour}" {if $village.r_iron==$max_storage}class="warn"{/if}>{$village.r_iron}</span>&nbsp;</td>
								<td style="border-left: dotted 1px;">&nbsp;
									<a href="game.php?village={$village.id}&amp;screen=storage"><img src="../graphic/icons/storage.png" title="Armaz&eacute;m" /></a>
								</td>
								<td><div id="storage" style="display:none;">{$max_storage}</div><b>{$max_storage}</b>&nbsp;</td>
							</tr>
						</table>
					</td>
					<td>
						<table class="box" cellspacing="0">
							<tr>
								<td width="18" height="24" align="center">
									<a href="game.php?village={$village.id}&amp;screen=farm"><img src="../graphic/icons/farm.png" title="Fazenda" alt="" /></a>
								</td>
								<td align="center"><b>{$village.r_bh}/{$max_bh}</b>&nbsp;</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
		{if $user.attacks>0}
		<td align="right">
			<table cellspacing="0">
				<tr>
					<td>
						<table class="box" cellspacing="0">
							<tr>
								<td width="30" height="24" class="att">({$user.attacks})</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
		{/if}
	</tr>
</table><br />
{/if}
{php}
			$show = mysql_fetch_array(mysql_query("SELECT `show_announcements` FROM `users` WHERE `id` = '".$userid."'"));
			if($show[0] == '1'){
				$hkey = $this->_tpl_vars['hkey'];
				$uri = $_SERVER['REQUEST_URI'];
				if($_GET['hide'] == $hkey){
					mysql_query("UPDATE `users` SET `show_announcements` = '0' WHERE `id` = '".$userid."'");
					header("Location: $uri");
				}
				$query30 = mysql_fetch_assoc(mysql_query("SELECT COUNT(id) AS `ann_number` FROM `login`.`news` WHERE `stats` = '1'"));
				$query30 = $query30['ann_number'];
				if($query30 >= 1){
{/php}
<table class="main" width="{$user.window_width}" align="center">
	<tr>
		<td style="padding:2px;">
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D;">
				<tr><th colspan="2"><center>An&uacute;ncio | Empire of War | Announcement</center></th></tr>
				<tr>
{php}
					$query31 = mysql_query("SELECT * FROM `login`.`news` WHERE `stats` = '1'");
					while($array32 = mysql_fetch_array($query31)){
						if($array32['type'] == 'update') { $type = '<div class="gamenews_green">UPDATE</div>'; }
						elseif($array32['type'] == 'important') { $type = '<div class="gamenews_red">IMPORTANTE</div>'; }
						elseif($array32['type'] == 'bugfix') { $type = '<div class="gamenews_blue">BUG FIX</div>'; }
						elseif($array32['type'] == 'anunt') { $type = '<div class="gamenews_blue">AN&Uacute;NCIO</div>'; }
						echo "<tr><td width=\"120\">".$type."</td><td>".bb_format(wordwrap(stripslashes(nl2br(entparse($array32['text']))), 130, "<br />", true))."</td></tr>";
					}
{/php}
				</tr>
				<tr><th colspan="2" style="text-align:center;"><a href="{php}echo $uri;{/php}&hide={$hkey}">Ocultar | [v2.1] | Hide</a></th></tr>
			</table>
		</td>
	</tr>
</table><br />
{php}
				}
			}
{/php}
{if $config.no_actions}
<table class="main" width="{$user.window_width}" align="center">
	<tr>
		<td style="padding:2px;">
			<div class="error">
				<b style="color:red">ATEN&Ccedil;&Atilde;O:</b> Servidor pausado para manuten&ccedil;&atilde;o. Nenuma a&ccedil;&atilde;o (recrutamento, contru&ccedil;&atilde;o, cria&ccedil;&atilde;o de tribos, ataques, etc.) est&aacute; disponivel no momento, pedimos que aguardem at&eacute; que tudo volte ao normal.
			</div>
		</td>
	</tr>
</table><br />
{/if}
<table class="main" width="{$user.window_width}" align="center">
	<tr>
		<td style="padding:2px;">
			{if $screen == 'train'}
				{include_php file="actions/train.php"}
			{else}
				{include file="game_$screen.tpl"}
			{/if}
		</td>
	</tr>
	<tr>
		<th {if $screen!='overview' || $screen!='overview_villages'}colspan="2"{/if}><span style="float:right;">Gerado em {$load_msec}ms | Hora do Servidor: <span id="serverTime">{$servertime}</span> | {php}echo date("d.m.Y");{/php}</span></th>
	</tr>
</table>
<table class="corp" style="width:{$user.window_width}px;" align="center">
	<tr>
		<td class="corp_s"></td>
		<td class="header" width="90%">
{php}
	$noob_end = $user['noob_protection']-time();
	if($user['noob_protection'] >= time()){
{/php}
			<div class="noob">Sua prote&ccedil;&atilde;o acaba em <b>{php}echo date("d.m.Y, H:i", $user['noob_protection']);{/php}</b> | Tempo restante: <b><span class="timer">{php}echo format_time($noob_end);{/php}</span></b></div>
{php}
	}
{/php}
		</td>
		<td class="corp_s"></td>
	</tr>
</table>
<table class="main" width="{$user.window_width}" align="center">
	<tr><th style="text-align:center;">&copy;{php}echo date('Y');{/php} | Empire of War - Todos os direitos reservados - <a href="http://LanServers.tk" target="_blank">LanServers</a></th></tr>
</table>
<div id="footer">
	<div id="linkContainer" style="max-width:{$user.window_width}px; min-width:250px;">
		<div id="footer_left">
			<a href="http://lanservers.tk" target="_blank">F&oacute;rum</a> - 
			<a href="game.php?village={$village.id}&amp;screen=support">Suporte</a> - 
			<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=profile">Perfil</a>
		</div>
		<div id="footer_right">
			<a href="game.php?village={$village.id}&amp;screen=friends">Amigos</a>
		</div>
	</div>
</div>
<script type="text/javascript">startTimer();</script>
</body>
</html>
{php}}}{/php}