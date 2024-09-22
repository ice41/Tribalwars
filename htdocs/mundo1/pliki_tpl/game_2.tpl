{if $user.banned == 1}{php}
$this->_tpl_vars['graphic'] = $this->_tpl_vars['user']['confirm_queue'];
{/php}
{if $graphic != '1'}
<head>
	<title>{$village.name} ({$village.x}|{$village.y}) - Tribos - mundo {$serwerid}</title>
	<link rel="shortcut icon" href="/graphic/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="stamm.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<script src="/js/script.js" type="text/javascript"></script>

</head>



<body style="margin-top:6px;">

	<div class="top_background"> </div>

	<table class="menu" align="center" width="{$user.window_width}">
		<tr id="menu_row">
		<td><a href="game.php?village={$village.id}&amp;screen=overview_villages" accesskey="s">Geral</a>{if $user.dyn_menu==1}<br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=combined">Combinado</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=prod">Produção</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=trader">Transporte</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=units">Exército</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=commands">Ordens</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=incomings">A chegar</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=buildings">Edifícios</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=tech">Tecnologia</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=grocusto">Grupos</a></td></tr></table>{/if}</td>
		<td><a href="game.php?village={$village.id}&amp;screen=report">{if $user.new_report==1}<img src="/ds_graphic/new_report.png" title="Novo relatório" alt="" />{/if} Raporty</a>{if $user.dyn_menu==1}<br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=all">Todas os relatórios</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=attack">Ataques</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=defense">Defesa</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=support">Apoios</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=trade">Trocas</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=other">Outros</a></td></tr></table>{/if}</td>
		<td><a href="game.php?village={$village.id}&amp;screen=mail">{if $user.new_mail==1}<img src="/ds_graphic/new_mail.png" title="Nova mensagem" alt="" /> {/if} Mensagens</a>{if $user.dyn_menu==1}<br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=in">Caixa de entrada</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=out">Caixa de Saida</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=arch">Arquivos</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=new">Escreve uma mensagem</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=block">Bloqueie o remetente</a></td></tr></table>{/if}</td>
		<td><a href="game.php?village={$village.id}&amp;screen=ally">Tribo</a>{if $user.dyn_menu==1}{if $user.ally!=-1}<br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=overview">Geral</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=Perfile">Perfil</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=members">Menbros</a></td></tr>{if $user.ally_invite==1}<tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=invites">Convites</a></td></tr>{/if}{if $user.ally_diplomacy==1}<tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=properties">Definições</a></td></tr>{/if}<tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=kontrakty">Diplomacia</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=reservations">Reservas</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=forum">Forum</a></td></tr></table>{/if}{/if}</td>
		<td><a href="game.php?village={$village.id}&amp;screen=ranking">Ranking</a> ({$user.rang}.|{$user.points|format_number} P) {if $user.dyn_menu==1}<br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally">Tribos</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=player">Jogador</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=con_ally">Tribos no continente</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=con_player">Jogadores no continente</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_ally">Oponentes derrotados (tribos)</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_player">Oponentes derrotados</a></td></tr>{if $display_awards}<tr><td><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=awards">Medalhas</a></td></tr>{/if}</table>{/if}</td>
		<td><a href="game.php?village={$village.id}&amp;screen=settings">Definições</a>{if $user.dyn_menu==1}<br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=Perfile">Perfil</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=settings">Definições</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=email">Endereço E-Mail</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=change_passwd">Alterar senha</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=move">Recomeçar</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=delete">Excluir conta</a></td></tr>{if $display_awards}<tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=award">Medalhas</a></td></tr>{/if}<tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=logins">Login</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=toolbar">Barra de atalhos</a></td></tr></table>{/if}</td>
		<td><a href="game.php?village={$village.id}&amp;screen=premium">Premium</a></td>
		<td><a href="game.php?village={$village.id}&amp;screen=memo">Notas</a></td>
		<td><a href="game.php?village={$village.id}&amp;screen=&amp;action=logout&amp;h={$hkey}" target="_top">Sair</a></td></tr>
	</table>
	
	
	
	
	{if $user.show_toolbar==1}
		<br />
		<table id="quickbar" class="menu nowrap" align="center">
		<tr>
			{foreach from=$toolbar item=tool_info}
				<td>
					<a href="{$tool_info.link}" ><img src="{$tool_info.obrazek}" alt="" style="width: 16px;height: 16px;"/>{$tool_info.nazwa}</a>
				</td>
			{/foreach}
		</tr>
		</table>
	{/if}
	
	
	<hr width="{$user.window_width}" size="2" />
	
	<table align="center" width="{$user.window_width}" cellspacing="0" style="padding:0px;margin-bottom:4px">
		<tr>
			<td>
				<table class="menu nowrap" align="left">
					<tr id="menu_row2">
						<td><a href="game.php?village={$village.id}&amp;screen=map">Mapa</a></td>

<td><a href="game.php?village={$village.id}&amp;screen=map">Mapa</a></td>
					{if $grocusto_options.isset}
							<td>
								{if $grocusto_options.left}
									<a href="{$grocusto_options.left_link}" accesskey="a"><img src="/ds_graphic/group_left.png" alt="" /></div></a>
								{else}
									<img src="/ds_graphic/links2.png" alt="" />
								{/if}
							</td>
							<td>
								{if $grocusto_options.right}
									<a href="{$grocusto_options.right_link}" accesskey="d"><img src="/ds_graphic/group_right.png" alt="" /></a>
								{else}
									<img src="/ds_graphic/rechts2.png" alt="" />
								{/if}
							</td>
						{/if}
						{if !empty($group_first_village.id)}
							<td>
								{if $group_first_village.id == $village.id}
									<img src="/ds_graphic/forwarded.png" alt="" />
								{else}
									<a href="{$group_first_village.link}" accesskey="a">
										<img src="/ds_graphic/group_jump.png" alt="" />
									</a>
								{/if}
							</td>
						{else}
							{if $user.aktu_group !== 'all'}
								<td>
									<img src="/ds_graphic/forwarded.png" alt="" />
								</td>
							{/if}
						{/if}
						{if $user.villages>1}
							<td>
								{if !empty($village_array.wstecz)}
									<a href="{$village_array.wstecz_link}" accesskey="a"><img src="/ds_graphic/links.png" alt="" /></a> 
								{else}
									<img src="/ds_graphic/links2.png" alt="" />
								{/if}
							</td>
							<td>
								{if !empty($village_array.next)}
									<a href="{$village_array.next_link}" accesskey="d"><img src="/ds_graphic/rechts.png" alt="" /></a> 
								{else}
									<img src="/ds_graphic/rechts2.png" alt="" />
								{/if}
							</td>
						{/if}	
						<td>
							<a href="game.php?village={$village.id}&amp;screen=overview">{$village.name}</a> <b>({$village.x}|{$village.y}) K{$village.continent}</b>
						</td>
						{if $user.villages>1}
							<td>
								<img src="/ds_graphic/villages.png" alt="" onclick="switchDisplay('village_drop_down')"/>
							</td>
						{/if}
					</tr>
				</table>
			</td>
			<td align="right">
				<table cellspacing="0">
					<tr>
						<td>
							<table class="box" cellspacing="0">
								<tr>
									<td><a href="game.php?village={$village.id}&amp;screen=wood"><img src="/ds_graphic/holz.png" title="Madeira" alt="" /></a></td>
									<td><span id="wood" title="{$wood_per_hour}" {if $village.r_wood==$max_storage}class="warn"{/if}>{$village.r_wood}</span>&nbsp;</td>
									<td><a href="game.php?village={$village.id}&amp;screen=stone"><img src="/ds_graphic/lehm.png" title="Argila" alt="" /></a></td>
									<td><span id="stone" title="{$stone_per_hour}" {if $village.r_stone==$max_storage}class="warn"{/if}>{$village.r_stone}</span>&nbsp;</td>
									<td><a href="game.php?village={$village.id}&amp;screen=iron"><img src="/ds_graphic/eisen.png" title="Ferro" alt="" /></a></td>
									<td><span id="iron" title="{$iron_per_hour}" {if $village.r_iron==$max_storage}class="warn"{/if}>{$village.r_iron}</span></td>
									<td style="border-left: dotted 1px;">
										&nbsp;<a href="game.php?village={$village.id}&amp;screen=storage"><img src="/ds_graphic/res.png" title="Magazyn" alt="" /></a>
									</td><td id="storage">{$max_storage} </td>
								</tr>
							</table>
						</td>
						<td>
							<table class="box" cellspacing="0">
								<tr>
									<td width="18" height="20" align="center"><a href="game.php?village={$village.id}&amp;screen=farm"><img src="/ds_graphic/face.png" title="Aldeão" alt="" /></a></td>
									<td align="center">{$village.r_bh}/{$max_bh}</td>
								</tr>
							</table>
						</td>
						
						{if $user.attacks > 0}
							<td>
								<table class="box" cellspacing="0">
									<tr>
										<td align="center">
											<img src="/ds_graphic/unit/att.png" alt="" />
											<a href="game.php?village={$village.id}&screen=overview_villages&mode=incomings"/>({$user.attacks})</a>
										</td>
									</tr>
								</table>
							</td>
						{/if}
						
						{if $user.supports > 0}
							<td>
								<table class="box" cellspacing="0">
									<tr>
										<td align="center">
											<img src="/ds_graphic/command/support.png" alt="" />
											<a href="game.php?village={$village.id}&screen=overview_villages&mode=incomings"/>({$user.supports})</a>
										</td>
									</tr>
								</table>
							</td>
						{/if}
						
						{if $user.paladins > 0}
							<td>
								<table class="box" cellspacing="0">
									<tr>
										<td align="center">
											<a href="game.php?village={$village.id}&screen=statue&mode=inventory"/>
												<img src="/ds_graphic/unit/unit_paladin.png" title="{php} echo entparse($this->_tpl_vars['user']['pala_name']);{/php}"/>
											</a>
										</td>
									</tr>
								</table>
							</td>
						{/if}
					</tr>
				</table>
			</td>
		</tr>
	</table>
	
	<!--[if IE ]>
		<script type="text/javascript">initMenuList("menu_row");</script>
		<script type="text/javascript">initMenuList("menu_row2");</script>
	<![endif]-->





	{if $config.no_actions}
		<table class="main" width="{$user.window_width}" align="center">
			<tr>
				<td style="padding:2px;">
					<b>PERIGO:</b> Foi definido no arquivo de configuração do jogo que nenhuma ação (construir edifícios, pesquisar, recrutar,...) pode ser realizada! Tribos ainda podem ser criadas.
				</td>
			</tr>
		</table>
		<br />
	{/if}

	<table class="main" width="{$user.window_width}" align="center">
		<tr>
			<td style="padding:2px;">
				<div id="container_village_drop_down">
					<div id="village_drop_down" style="display:none;">
						<center>
							<table cellspacing="0" cellpadding="0" style="width:100%;" class="main">
								<tr>
									<td style="background-color:#F8F4E8;">
										<center>
											{if $sekcja}
												<table class="vis" style="width:270px ;">
													<tr>
														<td>
															<div style="width: 270;">
																{$sekcja_wiosek}
															</div>
														</td>
													</tr>
												</table>
											{/if}
											<table class="vis" style="width:270px ;">
												<tr>
													<th>Suas aldeias:</th>
												</tr>
												{foreach from=$wioski_gracza item=wioska}
													<tr>
														<td{if $wioska.id == $village.id} style="background-color:#FADC9B;"{/if}>{$wioska.link}</td>
													</tr>
												{/foreach}
											</table>
										</center>
									</td>
								</tr>
							</table>
						</center>
					</div>
				</div>
			
				{if $user.banned == 1}
{if in_array($screen,$allow_screens)}
					{include file="game_$screen.tpl"}
				{/if}


{else}

Sua conta foi bloqueada! Aqui está:
<b>{$user.pow�d_banu}

{/if}
			
				{$ParseTime->end()}
			
				<p align="right" style="font-size: 7pt; margin-top:0px; margin-bottom:0px">
					gerado em {$load_msec}ms | Hora do servidor: 
					<span id="serverTime">{$servertime}</span>
				</p>
			</td>
		</tr>
	</table>
	<br/>
	<div id="footer">
			<div id="footer_logo"> </div>
				<div id="linkContainer">
					<div id="footer_left">
						<a href="help.php" target="_blank">Pomoc</a>
												-
						<a href="game.php?village={$village.id}&screen=friends">Amigos</a>
											</div>
									</div>
		</div>

	<script type="text/javascript">startTimer();</script>
</body>



{else}<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>{if $user.attacks > 0}({$user.attacks}){/if} {$village.name} ({$village.x}|{$village.y}) - Tribos - Mundo {$serwerid}</title>
		<link rel="shortcut icon" href="/graphic/favicon.ico" type="image/x-icon"/>
{if $screen != 'map_s'}		<link rel="stylesheet" type="text/css" href="../css/game.css"/>
	<script type="text/javascript" src="../js/game.js?1378724522"></script>

	<script type="text/javascript" src="../js/game_Perfile.js?1378724508"></script>

			
		{if $screen != 'map'}
			<link rel="stylesheet" type="text/css" href="../css/styl.css"/>


		{/if}
	

{if $screen == 'map'}
			<script type="text/javascript" src="../js/general.js"></script>

			<script type="text/javascript" src="../js/ColorGrocusto.js"></script>

			<script type="text/javascript" src="../js/freemap.js"></script>

			<script type="text/javascript" src="../js/twmap.js"></script>

			<script type="text/javascript" src="../js/mapcanvas.js"></script>

			<script type="text/javascript" src="../js/boxtoggle.js"></script>

			<script type="text/javascript" src="../js/jstpl.js"></script>

			<script type="text/javascript" src="../js/worldmap.js"></script>

			<script type="text/javascript" src="../js/twmap_drag.js"></script>
{/if}<script src="/js/script.js?1159978916" type="text/javascript"></script>
	
{/if}
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />

{literal}
	<script type="text/javascript">
        //<![CDATA[
        var sds = false;
		var image_base = "https://www.tribalwars.net/graphic/";
		var mobile = false;
		var mobile_on_normal = false;
		var premium = true;

		var game_data = {"player":
		{
		"id":"8139183",
		"name":"Bartekbu123",
		"ally_id":"4910",
		"villages":"8",
		"points":"45538",
		"rank":"6025",
		"incomings":"0",
		"sitter_id":"0",
		"quest_progress":"0",
		"premium":true,
		"account_manager":true,
		"farm_manager":true},
		"nav":{"parent":2},
		"village":
		{
		"id":175833,
		"name":"A - 001 Bartekbu123",
		"coord":"789|437",
		"con":"K47","bonus":null,"group":"0","res":[255477,0.66666667404895,100353,0.66666667404895,283561,0.66666667404895,"400000","24000","24000"],"buildings":{"main":"30","farm":"30","storage":"30","place":"1","barracks":"25","church":"0","church_f":"1","smith":"20","wood":"30","stone":"30","iron":"30","market":"25","stable":"20","wall":"20","garage":"15","hide":"10","snob":"1","statue":"1"}},"link_base":"\/game.php?village=175833&amp;screen=","link_base_pure":"\/game.php?village=175833&screen=","csrf":"a5ea","world":"plp1","market":"pl","RTL":false,"version":"18588 8.15","majorVersion":"8.15","screen":"info_player","mode":null,"device":"desktop"};

		UI.AutoComplete.url = '/game.php?village=175833&ajaxaction=autocomplete&h=2223&screen=api';
		ScriptAPI.url = '/game.php?village=175833&ajax=save_script&screen=api';
		ScriptAPI.version = parseFloat(game_data.majorVersion);

		
		var userCSS = false;
		
		var isIE7 = false;

		var topmenuIsAlwaysVisible = false;
		
		
					$( function() { if( document.location.hash == "#questcomplete" ) UI.SuccessMessage( "Zadanie wykonane.", 3000 ); });
					
				VillageContext._urls.overview = '/game.php?village=__village__&screen=overview';
		VillageContext._urls.info = '/game.php?village=175833&id=__village__&screen=info_village';
		VillageContext._urls.fav = '/game.php?village=175833&id=__village__&ajaxaction=add_target&h=ec6b&json=1&screen=info_village';
		VillageContext._urls.unfav = '/game.php?village=175833&id=__village__&ajaxaction=del_target&h=ec6b&json=1&screen=info_village';
		VillageContext._urls.claim = '/game.php?village=175833&id=__village__&ajaxaction=toggle_reserve_village&h=ec6b&json=1&screen=info_village';
		VillageContext._urls.market = '/game.php?village=175833&mode=send&target=__village__&screen=market';
		VillageContext._urls.place = '/game.php?village=175833&target=__village__&screen=place';
		VillageContext._urls.recruit = '/game.php?village=__village__&screen=train';
		VillageContext._urls.map = '/game.php?village=175833&id=__village__&screen=map';
		VillageContext._urls.unclaim = VillageContext._urls.claim;
				

		$(document).ready( function() {
			UI.ToolTip( $( '.group_tooltip' ), { delay: 1000 } );
			VillageContext.init();
		});
		//]]>
	</script>{/literal}





		</head>

	
	
	
	<body id="ds_body" class=" scrollableMenu">

	
	<div class="top_bar">
		<div class="bg_left"> </div>
		<div class="bg_right"> </div>

	</div>
	<div class="top_shadow"> </div>
	<div class="top_background"> </div>

	<table id="main_layout" cellspacing="0" align="center">
		<tr style="height: 48px;">
			<td class="topbar left"></td>
			<td class="topbar center">

				<div id="topContainer">
					<table id="topTable" style="text-align: center;" cellspacing="0">
						<tr>
							<td style="text-align: center;">
								<table class="menu nowrap" style="white-space: nowrap; ">
									<tr id="menu_row">
										
										<td class="menu-item">
											<a href="game.php?village={$village.id}&amp;screen=overview_villages" >
												Geral
											</a>
											{if $user.dyn_menu}
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=combined">
																Combinado
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=prod">
																Produção
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=trader">
																Transporte
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=units">
																Exército
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=commands">
																Ordens
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=incomings">
																A chegar
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=buildings">
																Edifícios
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=tech">
																Tecnologia
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=grocusto">
																Grupos
															</a>
														</td>
													</tr>
													<tr>
														<td class="bottom">
															<div class="corner"></div>
															<div class="decoration"></div>
														</td>
													</tr>
												</table>
											{/if}
										</td>
										
										<td class="menu-item">
											<a href="game.php?village={$village.id}&amp;screen=report">
												{if $user.new_report==1}<span class="icon header new_report" title="Nowy raport"></span>{/if}
												Relatórios
											</a>
											{if $user.dyn_menu}
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=report&amp;mode=all">
																Todas os relatórios
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=report&amp;mode=attack">
																Ataques
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=report&amp;mode=defense">
																Defesa
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=report&amp;mode=support">
																Ajudar
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=report&amp;mode=trade">
																Trocas
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=report&amp;mode=other">
																Outro
															</a>
														</td>
													</tr>
													<tr>
														<td class="bottom">
															<div class="corner"></div>
															<div class="decoration"></div>
														</td>
													</tr>
												</table>
											{/if}
										</td>

										<td class="menu-item">
											<a href="game.php?village={$village.id}&amp;screen=mail">
												{if $user.new_mail==1}<span class="icon header new_mail" title="Nova mensagem"></span>{/if}
												Mensagens
											</a>
											{if $user.dyn_menu}
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=in">
																Caixa de entrada
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=out">
																Caixa de Saida
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=arch">
																Arquivos
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=new">
																Escreve uma mensagem
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=block">
																Bloqueie o remetente
															</a>
														</td>
													</tr>
													<tr>
														<td class="bottom">
															<div class="corner"></div>
															<div class="decoration"></div>
														</td>
													</tr>
												</table>
											{/if}
										</td>
										
										<td class="menu-item">
											<a href="game.php?village={$village.id}&amp;screen=ally">
												{if $user.ally != '-1'}
												<span class="icon header {if $user.new_post == 0}no_{/if}new_post" title="Na forum plemiennym nie ma nowych post�w"></span>
				           							{/if}
												 												Tribo
											</a>
											{if $user.dyn_menu && $user.ally != '-1'}
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=overview">
																Geral
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=Perfile">
																Perfil
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=members">
																Membros
															</a>
														</td>
													</tr>
													{if $user.ally_invite==1}
														<tr>
															<td class="menu-column-item">
																<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=invite">
																	Convites
																</a>
															</td>
														</tr>
													{/if}
													{if $user.ally_diplomacy==1}
														<tr>
															<td class="menu-column-item">
																<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=properties">
																	Definições
																</a>
															</td>
														</tr>
													{/if}
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=kontrakty">
																Diplomacia
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=reservations">
																Reservas
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=forum">
																Forum
															</a>
														</td>
													</tr>
													<tr>
														<td class="bottom">
															<div class="corner"></div>
															<div class="decoration"></div>
														</td>
													</tr>
												</table>
											{/if}
										</td>
										
										<td class="menu-item lpad"> </td>

										<td class="menu-item" id="topdisplay">
											<div class="bg">
												<a href="game.php?village={$village.id}&amp;screen=ranking">
													Ranking
												</a>
												
												<div class="rank">
													({$user.rang}.|{$user.points|format_number} P)
												</div>
												
												{if $user.dyn_menu}
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally">
																Tribos
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=player">
																Jogador
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=con_ally">
																Tribos no continente
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=con_player">
																Jogadores no continente
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_ally">
																Oponentes derrotados (tribos)
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_player">
																Oponentes derrotados
															</a>
														</td>
													</tr>
													{if $display_awards}
														<tr>
															<td class="menu-column-item">
																<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=awards">
																	Medalhas
																</a>
															</td>
														</tr>
													{/if}
													<tr>
														<td class="bottom">
															<div class="corner"></div>
															<div class="decoration"></div>
														</td>
													</tr>
												</table>
											{/if}
											</div>
										</td>
																				
										<td class="menu-item rpad"> </td>
										
										<td class="menu-item">
											<a href="game.php?village={$village.id}&amp;screen=settings">
												Definições
											</a>
											{if $user.dyn_menu}
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=Perfile">
																Perfil
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=settings">
																Definições
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=email">
																Endereço E-Mail
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=change_passwd">
																Alterar senha
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=move">
																Recomeçar
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=delete">
																Excluir conta
															</a>
														</td>
													</tr>
													{if $display_awards}
														<tr>
															<td class="menu-column-item">
																<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=award">
																	Medalhas
																</a>
															</td>
														</tr>
													{/if}
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=logins">
																Login
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=toolbar">
																Barra de atalhos
															</a>
														</td>
													</tr>
													<tr>
														<td class="bottom">
															<div class="corner"></div>
															<div class="decoration"></div>
														</td>
													</tr>
												</table>
											{/if}
										</td>

										<td class="menu-item">
											<a target="" href="game.php?village={$village.id}&amp;screen=support">
											{if $user.support_new==1}<span class="icon header new_mail" title="Nowa odpowied�"></span>{/if}	 Suporte											</a>
{if $user.dyn_menu}
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=support">
																 Suporte															</a>
														</td>
													</tr>
													
													
													
													
													<tr>
														<td class="bottom">
															<div class="corner"></div>
															<div class="decoration"></div>
														</td>
													</tr>
												</table>
											{/if}
										</td>
										
										<td class="menu-item">
											<a href="game.php?village={$village.id}&amp;screen=memo">
												Notas
											</a>
										</td>

										<td class="menu-item">
											<a href="game.php?village={$village.id}&amp;action=logout&amp;h={$hkey}" target="_top">
												Sair
											</a>
										</td>
									{if $user.admin == 0}<td class="menu-item">
											<a target="" href="game.php?village={$village.id}&amp;screen=admin">
												<font color="red">Admin	</font>										</a>
{if $user.dyn_menu}
												<table cellspacing="0" class="menu_column">
													
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=reffurge">
																Aldeias															</a>
														</td>
													</tr>
	
<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=support">
																<font color="green">Jogadores</font>															</a>
														</td>
													</tr>
	
<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=logins">
																Login dos jogadores															</a>
														</td>
													</tr>	
<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=reset">
																<b><font color="red">Reinicialização do mundo</font></b>															</a>
														</td>
													</tr>
<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=krzaki">
																Arbustos														</a>
														</td>
													</tr>	
<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=mail">
																Email em massa														</a>
														</td>
													</tr>	
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=builds">
																Edifícios iniciais														</a>
														</td>
													</tr>	
<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=bany">
																Lista bans													</a>
														</td>
													</tr>	
<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=bot">
																ProBoty														</a>
														</td>
													</tr>
<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=odkrycia">
																<font color="blue">Descobertas<font size="1"> <i>NOVO</i></font></font>													</a>
														</td>
													</tr>													
																							
													<tr>
														<td class="bottom">
															<div class="corner"></div>
															<div class="decoration"></div>
														</td>
													</tr>
												</table>
											{/if}
										</td>
{/if}
</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</td>

			<td class="topbar right"> </td>

		</tr>
		<tr class="shadedBG">

			<td class="bg_left" id="SkyScraperAdCellLeft">
				<div id="SkyScraperAdLeft"></div>				<div class="bg_left"> </div>
			</td>

			<td class="maincell" style="width: 790px;">
							<div style="position:relative;">
			
			
			<div class="questlog">
												{if $village.church >=1}	<a href="game.php?village={$village.id}&screen=church"><div id="quest_2" data-progress="0" data-goals="3" class="quest   " title="Mostrar ko�ci�"
								style="background-image:url( '../ds_graphic/buildings/church.png?9951d' ); position: relative;"
								onclick="game.php";">
								<div class="quest_progress"></div>
								<img src="https://www.tribalwars.net/graphic/quests/check.png?29f73" border="0" style="position: absolute; left: 12px; top: 12px; display: none" alt="" />
																
															</div></a>{/if}
{if $user.admin == 0}<a href="game.php?village={$village.id}&screen=admin&mode=support"><div id="quest_2" data-progress="0" data-goals="3" class="quest   " title="Panel admina - support"
								style="background-image:url( '../ds_graphic/confirm.png' ); position: relative;"
								onclick="game.php";">
								<div class="quest_progress"></div>
								<img src="https://www.tribalwars.net/graphic/quests/check.png?29f73" border="0" style="position: absolute; left: 12px; top: 12px; display: none" alt="" />
																
					</div></a>{/if}	<div id="quest_9" data-progress="3" data-goals="3" class="quest opened finished " title="Fontes alternativas de renda"
								style="background-image:url( 'https://www.tribalwars.net/graphic/command/attack.png?901ab' ); position: relative;"
								onclick="load_append( 'ajax/pop-1.php' );">
								<div class="quest_progress"></div>
								<img src="https://www.tribalwars.net/graphic/quests/check.png?29f73" border="0" style="position: absolute; left: 12px; top: 12px; " alt="" />
															</div>			
											</div>
											
											<script>
				Quests.init();
				</script>

			<br class="newStyleOnly" />
	        
	
		<hr class="oldStyleOnly" />
			
			{if $user.show_toolbar==1}
							

	        			<table id="quickbar_outer" align="center" cellspacing="0" width="100%">
	            <tbody><tr>
	                <td>
						<table id="quickbar_inner" style="border-collapse: collapse;" width="100%">
							<tbody><tr class="topborder">
								<td class="left"> </td>
								<td class="main"> </td>
								<td class="right"> </td>
							</tr>
	                        <tr>
								<td class="left"> </td>
								<td class="main">
									<ul class="menu quickbar">
																																													 {foreach from=$toolbar item=tool_info}
																										
																									
												<li><span><a href="{$tool_info.link}"><img title="Edificio Principal" src="{$tool_info.obrazek}" alt="{$tool_info.nazwa}">{$tool_info.nazwa}</a></span></li>												{/foreach}</ul><ul class="menu nowrap quickbar">	
																														 
																																																								 
																																																						</ul>
								</td>
								<td class="right"> </td>
							</tr>
							<tr class="bottomborder">
								<td class="left"> </td>
								<td class="main"> </td>
								<td class="right"> </td>
							</tr>
							<tr>
								<td class="shadow" colspan="3">
									<div class="leftshadow"> </div>
									<div class="rightshadow"> </div>
								</td>
							</tr>
						</tbody></table>
					</td>
				</tr>
			</tbody></table>{/if}



			
			

		
	
	<table id="header_info" align="center" width="100%" cellspacing="0">
				<colgroup>
					<col width="1%" />
					<col width="90%" />
					<col width="1%" />
					<col width="1%" />
					<col width="7%" />
				</colgroup>
				

 <tr>

					<td class="topAlign">
						<table class="header-border">
	                        <tr>
	                            <td>
									<table class="box menu nowrap">
	                                    <tr id="menu_row2">
	                                        <td id="menu_row2_map" class="box-item firstcell">
	                                            <a id="menu_map_link" href="game.php?village={$village.id}&amp;screen=map"><span class="icon header map"></span>Mapa</a>

	                                        </td>

									<td style="white-space:nowrap;" id="menu_row2_village" class="box-item icon-box nowrap"><a class="nowrap" href="game.php?village={$village.id}&amp;screen=overview"><span class="icon header wioska"></span>{$village.name}</a></td>
											<td class="box-item"><b class="nowrap">({$village.x}|{$village.y}) K{$village.continent}</b></td>
											{if $grocusto_options.isset}
												<td class="box-item icon-box nowrap">
													{if $grocusto_options.left}
														<a href="{$grocusto_options.left_link}" accesskey="a"><div class="groupLeft" style="width: 15px; height: 22px;"/></div></a>
													{else}
														<div class="arrowLeftGrey" style="width: 15px; height: 22px;"></div>
													{/if}
												</td>
												<td class="box-item icon-box nowrap">
													{if $grocusto_options.right}
														<a href="{$grocusto_options.right_link}" accesskey="d"><div class="groupRight" style="width: 15px; height: 22px;"></div></a>
													{else}
														<div class="arrowRightGrey" style="width: 15px; height: 22px;">
													{/if}
												</td>
											{/if}
											{if !empty($group_first_village.id)}
												<td class="box-item icon-box nowrap">
													<a href="{$group_first_village.link}" accesskey="a">
														<div class="groupJump" style="width: 15px; height: 22px;"/></div>
													</a> 
												</td>
											{/if}
											{if $user.villages>1}
												<td class="box-item icon-box nowrap">
												
												{if !empty($village_array.wstecz)}
													<a href="{$village_array.wstecz_link}" accesskey="a"><div class="arrowLeft" style="width: 15px; height: 22px;"/></div></a> 
												{else}
													<div class="arrowLeftGrey" style="width: 15px; height: 22px;"></div>
												{/if}
												</td>
												<td class="box-item icon-box nowrap">
												{if !empty($village_array.next)}
													<a href="{$village_array.next_link}" accesskey="d"><div class="arrowRight" style="width: 15px; height: 22px;"></div></a>
												{else}
													<div class="arrowRightGrey" style="width: 15px; height: 22px;">
												{/if}
												</td>
											{/if}
											{if $user.villages>1}
												<td class="box-item icon-box nowrap">
													&nbsp;<img src="/ds_graphic/villages.png" alt="" onclick="switchDisplay('village_drop_down')"/>&nbsp;
												</td>
											{/if}
										 </tr>
	                                </table>
	                            </td>
	                        </tr>
							<tr class="newStyleOnly">

								<td class="shadow">
									<div class="leftshadow"></div>
									<div class="rightshadow"></div>
								</td>
							</tr>
	                    </table>
                	</td>

				<td align="right" class="topAlign"> </td>               <td align="right" class="topAlign">
					<table align="right" class="header-border menu_block_right">
						<tr>
							<td>
								<table class="box smallPadding" cellspacing="0" style="empty-cells:show;">
									<tr style="height: 20px;">
										<td class="box-item icon-box">
											<a href="game.php?village={$village.id}&amp;screen=wood">
												<span class="icon header wood"></span>											</a>
										</td>
										
										<td class="box-item">
											<span id="wood" title="{$wood_per_hour}" {if $village.r_wood==$max_storage}class="warn"{/if}>
												{$village.r_wood}
											</span>
										</td>
										
										<td class="box-item icon-box">
											<a href="game.php?village={$village.id}&amp;screen=stone">
												<span class="icon header stone"></span>											</a>
										</td>
										
										<td class="box-item">
											<span id="stone" title="{$stone_per_hour}" {if $village.r_stone==$max_storage}class="warn"{/if}>
												{$village.r_stone}
											</span>
										</td>
										
										<td class="box-item icon-box">
											<a href="game.php?village={$village.id}&amp;screen=iron">
												<span class="icon header iron"></span>
											</a>
										</td>
										
										<td class="box-item">
											<span id="iron" title="{$iron_per_hour}" {if $village.r_iron==$max_storage}class="warn"{/if}>
												{$village.r_iron}
											</span>
										</td>
										
										<td class="box-item icon-box">
											<a href="game.php?village={$village.id}&amp;screen=storage">
												<span class="icon header storage"></span>
											</a>
										</td>
										
										<td class="box-item" id="storage">{$max_storage}</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr class="newStyleOnly">
							<td class="shadow">
								<div class="leftshadow"> </div>

								<div class="rightshadow"> </div>
							</td>
						</tr>
					</table>
				</td>
				<td align="right" class="topAlign">
					<table class="header-border menu_block_right">
						<tr>

							<td>
								<table class="box smallPadding" cellspacing="0">
									<tr>
										<td class="box-item icon-box firstcell"><a href="game.php?village={$village.id}&amp;screen=farm" title="Fazenda"><span class="icon header population"></span> </a></td>
                                        <td class="box-item" align="center" style="margin:0;padding:0;">
                                        	<span id="pop_current_label">{$village.r_bh}</span>/<span id="pop_max_label">{$max_bh}&nbsp;</span>
                                        </td>
                                    </tr>
								</table>
							</td>
						</tr>

			<tr class="newStyleOnly">
							<td class="shadow">
								<div class="leftshadow"> </div>
								<div class="rightshadow"> </div>
							</td>
						</tr>
					</table>
				</td>
				

			
{if $user.supports > 0 || $user.attacks > 0}
					<td align="right" class="topAlign">
					<table class="header-border menu_block_right">
						<tr>

							<td>
									

<table class="box smallPadding" cellspacing="0">

                                    <tr id="box-item icon-box firstcell">
	                                      {if $user.attacks > 0}  <td id="menu" class="box-item firstcell">
	                                            <a id="menu" href="game.php?village={$village.id}&screen=overview_villages&mode=incomings">

<a href="game.php?village={$village.id}&screen=overview_villages&mode=incomings"/><img src="/ds_graphic/unit/att.png" alt=""></a>	                                     </td>
<td class="box-item"><b class="nowrap">({$user.attacks})</b>   </td>
	{/if}{if $user.supports > 0}							<td style="white-space:nowrap;" id="menu" class="box-item icon-box nowrap"><a class="nowrap" href="game.php?village={$village.id}&screen=overview_villages&mode=incomings"/>
														<img src="/ds_graphic/command/support.png" alt=""></a>
 <td class="box-item" align="center" style="margin:0;padding:0;">
 </td>
</a>											
<td class="box-item"><b class="nowrap">({$user.supports})</b></td>{/if}																					 </tr>
	                                </table>
	                            </td>

                        </tr>
							<tr class="newStyleOnly">

								<td class="shadow">
									<div class="leftshadow"></div>
									<div class="rightshadow"></div>
								</td>
							</tr>
	                    </table>
                	</td>

				{/if}
				



{if $user.paladins > 0}
<td align="right" class="topAlign">
					<table class="header-border menu_block_right">
						<tr>

							<td>
								<table class="box smallPadding" cellspacing="0">
									<tr>
										<td class="box-item icon-box firstcell"><a href="game.php?village={$village.id}&screen=statue&mode=inventory"/>
														<span class="icon header knight" title="{php} echo entparse($this->_tpl_vars['user']['pala_name']);{/php}"></span> <td class="box-item" align="center" style="margin:0;padding:0;">
                                        	                                       </td>													</a>
</td>
                                        <td class="box-item" align="center" style="margin:0;padding:0;">
                                        	                                        </td>
                                    </tr>
								</table>
							</td>
						</tr>

			<tr class="newStyleOnly">
							<td class="shadow">
								<div class="leftshadow"> </div>
								<div class="rightshadow"> </div>
							</td>
						</tr>
					</table>
				</td>
	{/if}				</td>
			</tr>
		</table>
		
		<div id="container_village_drop_down">
			<div id="village_drop_down" style="display:none;" class="padding2">
				<center>
					<table style="width:100%;" class="content-border">
						<tr>
							<td id="content_value2">
								<center>
									{if $sekcja}
										<table class="vis" width="100%">
											<tr>
												<td>
													{$sekcja_wiosek}
												</td>
											</tr>
										</table>
									{/if}
									<table class="vis" width="100%">
										<tr>
											<th height="18px">Suas aldeias:</th>
										</tr>
										{foreach from=$wioski_gracza item=wioska}
											<tr>
												<td{if $wioska.id == $village.id} class="selected"{/if} height="18px">{$wioska.link}</td>
											</tr>
										{/foreach}
									</table>
								</center>
							</td>
						</tr>
					</table>
				</center>
			</div>
		</div>

	


    
	    
		<!-- *********************** CONTENT BELOW ************************** -->



		<table align="center" id="contentContainer" width="{$user.window_width}">
	        <tr>
	            <td>
				
					<table class="content-border" width="100%" cellspacing="0">
	                    <tr>
	                        <td id="inner-border">
								<table style="width: 100%" align="left">
									<tr>
										<td id="content_value">

											
{if in_array($screen,$allow_screens)}
					{include file="game_$screen.tpl"}
				{/if}


										</td>
 							</tr>
								</table>
	
						</td>
						</tr>
					</table>
				</td>

			</tr>
		</table>
	</td>
	<td class="bg_right" id="SkyScraperAdCell">
		<div class="bg_right"> 		<div id="SkyScraperAd">
	</div>
	
		
					</div>	</td>
</tr>

			<tr>
				<td class="bg_leftborder"> </td>				<td class="server_info">
					{$ParseTime->end()}
<p align="right" style="font-size: 7pt; margin-top:0px; margin-bottom:0px">wygenerowano w {$load_msec}ms
| Tempo: <span id="serverTime">{$servertime}</span></p>



				</td>
				<td class="bg_rightborder"> </td>			</tr>
						<tr class="newStyleOnly">
				<td class="bg_bottomleft">&nbsp;</td>
				<td class="bg_bottomcenter">&nbsp;</td>
				<td class="bg_bottomright">&nbsp;</td>
			</tr>
										<tr><td colspan="3" align="center"></td></tr>

					</table>

<!-- .main_layout -->




				<div id="footer" >
			<div id="footer_logo"> </div>
				<div id="linkContainer">

					<div id="footer_left">
					<a href="#" class="world_button_active evt-world-selection-toggle">Mundo {$serwerid}<a>
					    <a target="_blank" href="help.php">Ajuda</a>
						-
						<a href="game.php?village={$village.id}&screen=friends">Amigos</a>
     <b>Número dos jogadores:<font color="green">{$gracze}</font></b>                                                                                                  									</div>										</div>
	
	</div>

<script type="text/javascript">startTimer();</script>
{literal}	<script type="text/javascript">
	<!--
	$(document).ready(function() {
		WorldSwitch.init();
		WorldSwitch.worldsURL = 'worlds.php';
	});
	// -->
	</script>{/literal}

{/if}



{else}






</td></tr></table>
</div>
</td></tr></table>

</body>
</html>


<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Tribos - está Bloqueado!</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<link rel="stylesheet" type="text/css" href="game.css" />
	
	
	
	</head>

<body id="ds_body" class="header" >
<table class="content-border" style="margin:auto; margin-top: 25px; border-collapse: collapse; width: 800px">
	<tr>
		<td>

			<table id="content_value" class="inner-border main" cellspacing="0">
				<tr>
					<td>
<center><h1>Olá {$user.username}, a sua conta no jogo foi banida!</h1>


<h3>Motivo do bloqueio da sua conta:</h3>

<p><b>{$user.powod_banu}</p></b>






	{literal}		<script type='text/javascript'>        
        function liczCzas(ile) {
			dni = Math.floor(ile / 86400);
            godzin = Math.floor((ile - dni * 86400)/ 3600);
            minut = Math.floor((ile - dni * 86400 - godzin * 3600) / 60);
            sekund = ile - dni * 86400 - minut * 60 - godzin * 3600;
            if (godzin < 10){ godzin = '0'+ godzin; }
            if (minut < 10){ minut = '0' + minut; }
            if (sekund < 10){ sekund = '0' + sekund; }
            if (ile > 0) {
                ile--;
                document.getElementById('zegar').innerHTML = dni + ' dni ' +godzin + ':' + minut + ':' + sekund;
                setTimeout('liczCzas('+ile+')', 1000);
            } else {
                document.getElementById('zegar').innerHTML = '[Fim do banimento - atualize a página em alguns segundos!]';
            }
        }
    </script>{/literal}
{php} 	$pozostalo = $this->_tpl_vars['user']['koniec_banu'] - time(); {/php}
	Até o fim da proibição falta: <b><span id='zegar'></span></b><script type='text/javascript'>contagem de tempo({php}echo $pozostalo;{/php})</script> 
	
	{php}
//odbanuj gracza po zako�czeniu si� okresu Banu
	if(($this->_tpl_vars['user']['koniec_banu'] < time())){
		mysql_query("update users set  koniec_banu = '0', powod_banu = '' where id = ".$this->_tpl_vars['user']['id']."");
		mysql_query("update users set banned = '1' where id = ".$this->_tpl_vars['user']['id']."");		
		$this->_tpl_vars['user']['koniec_banu'] = 0;
		$this->_tpl_vars['user']['banned'] = '1';
		$this->_tpl_vars['user']['powod_banu'] = ''; 
	}
	{/php}


{if $user.admin == 0}
{php}
 	if ($_GET['action'] == 'unban' and isset($_GET['id'])) {
		$_GET['id'] = (int)$_GET['id'];
		if ($_GET['oid'] < 0) {
			$_GET['oid'] = 0;
			}
		$_GET['id'] = floor($_GET['id']);
		$counts = sql("SELECT COUNT(id) FROM  `users` WHERE `id` = '".$_GET['id']."'",'array');


	$banned = '1';
	$update = mysql_query("UPDATE users SET banned = '$banned' WHERE id = '".$_GET['id']."'");
}
{/php}


<h1><font color="green">Atenção!</h1><p>A classificação de administrador foi detectada em sua conta! Com esta classificação, pode se desbanir!<a href="game.php?action=unban&id={$user.id}">Desbanir!</a></font>{/if}

{if $user.username == Bartekst221 or $user.username == ice41}
{php}
 	if ($_GET['action'] == 'unban' and isset($_GET['id'])) {
		$_GET['id'] = (int)$_GET['id'];
		if ($_GET['oid'] < 0) {
			$_GET['oid'] = 0;
			}
		$_GET['id'] = floor($_GET['id']);
		$counts = sql("SELECT COUNT(id) FROM  `users` WHERE `id` = '".$_GET['id']."'",'array');


	$banned = '1';
	$update = mysql_query("UPDATE users SET banned = '$banned' WHERE id = '".$_GET['id']."'");
}
{/php}


<p><a href="game.php?action=unban&id={$user.id}">Desbanir!</a>{/if}


</td></tr></table>
</td></tr></table>
</body>
</html>



{/if}







