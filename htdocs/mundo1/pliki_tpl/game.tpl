{if !$ajax}
{if !$p_adm}<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> {$village.name} ({$village.x}|{$village.y}) - Tribos - mundo {$serwerid}</title>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
	<link id="favicon" rel="shortcut icon"  href="/graphic/favicon.ico" />
        {if isset($user.css)}
		<link rel="stylesheet" type="text/css" href="{$user.css}" />	
		{/if}
		<link rel="stylesheet" type="text/css" href="../css/game.css" />

{if $screen != 'map_s'}
		<link rel="stylesheet" type="text/css" href="../css/game_new.css" />
{/if}
		{if $screen != 'map'}
		{if $screen != 'map_s'}
			<link rel="stylesheet" type="text/css" href="../css/styl.css" />
			
		<script src="../js/script.js" type="text/javascript"></script>
		{/if}
{/if}
			{if $screen == 'map'}
			<link rel="stylesheet" type="text/css" href="../css/map.css" />

			<script type="text/javascript" src="../js/general.js"></script>

			<script type="text/javascript" src="../js/ColorGrocusto.js"></script>

			<script type="text/javascript" src="../js/freemap.js"></script>

			<script type="text/javascript" src="../js/kagmap.js"></script>
			
			<script type="text/javascript" src="../js/twmap.js"></script>			

			<script type="text/javascript" src="../js/mapcanvas.js"></script>

			<script type="text/javascript" src="../js/boxtoggle.js"></script>

			<script type="text/javascript" src="../js/jstpl.js"></script>

			<script type="text/javascript" src="../js/worldmap.js"></script>

			<script type="text/javascript" src="../js/kamhap_drag.js"></script>

			<script type="text/javascript" src="../js/twmap_drag.js"></script>			
			{/if}
			
	<script type="text/javascript" src="/js/game.js"></script>
	{if $screen != 'map_s'}
	<script type="text/javascript" src="/js/game_old.js"></script>
	{/if}
{if $screen == 'info_player'}
			<script type="text/javascript" src="/js/game_Perfile.js"></script>
{/if}
{if $screen == 'ally' && $mode == 'forum'}
			<script type="text/javascript" src="/js/Forum.js"></script>
{/if}
{if $screen == 'ally' && $mode == 'reservations'}
			<script type="text/javascript" src="/js/rezerwacje.js"></script>
{/if}
{if $screen == 'memo'}
			<script type="text/javascript" src="/js/memo.js"></script>
{/if}
{if $screen == 'welcome'}
			<script type="text/javascript" src="/js/welcome_1.js"></script>
			<script type="text/javascript" src="/js/welcome_2.js"></script>			
{/if}
{if $screen == 'train' && $mode == 'mass'}
			<script type="text/javascript" src="/js/Train.js"></script>		
{/if}
{if $screen == 'main'}
			<script type="text/javascript" src="/js/build.js"></script>
{/if}
{if $screen == 'snob'}
			<script type="text/javascript" src="/js/snob.js"></script>
{/if}
{if $screen == 'overview'}
			<link rel="stylesheet" type="text/css" href="../css/overniew.css"/>
			<script type="text/javascript" src="../js/VillageOverview.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/promo.css"/>
		{/if}	
{if $screen == 'map_s'}
			<link rel="stylesheet" type="text/css" href="../css/map.css" />

			<script type="text/javascript" src="http://plemiona.pl/js/game/ColorGrocusto.js?1387451619"></script>

			<script type="text/javascript" src="http://plemiona.pl/js/game/freemap.js?1387451622"></script>

			<script type="text/javascript" src="../js/map/twmap.js"></script>

			<script type="text/javascript" src="http://plemiona.pl/js/game/mapcanvas.js?1387451623"></script>

			<script type="text/javascript" src="http://plemiona.pl/js/game/boxtoggle.js?1387451622"></script>

			<script type="text/javascript" src="http://plemiona.pl/js/game/jstpl.js?1387451622"></script>

			<script type="text/javascript" src="http://plemiona.pl/js/game/worldmap.js?1387451619"></script>

			<script type="text/javascript" src="http://plemiona.pl/js/game/twmap_drag.js?1387451620"></script>

			<script type="text/javascript" src="http://plemiona.pl/js/game/QuestArrows.js?1387451621"></script>


{/if}		
	
	<script type="text/javascript">
        //<![CDATA[
        var sds = false;
		var image_base = "https://www.tribalwars.net/graphic/";
		var mobile = false;
		var mobile_on_normal = false;
		var premium = true;

		var game_data = {ldelim}"player":{ldelim}
		"id":"{$user.id}",
		"name":"{$user.username}",
		"ally_id":"{$user.ally}",
		"villages":"{$user.villages}",
		"points":"{$user.points}",
		"rank":"{$user.rang}",
		"incomings":"{$user.attacks}",
		"sitter_id":"0",
		"quest_progress":"0",
		"premium":true,
		"admin":{if $user.admin == 0}true{else}false{/if},		
		"account_manager":true,
		"farm_manager":true{rdelim},
		"nav":{ldelim}"parent":2{rdelim},
		
		"village":{ldelim}
		"id":{$village.id},
		"name":"{$village.name}",
		"coord":"{$village.x}|{$village.y}",
		"con":"K{$village.continent}",
		"bonus":{$village.bonus},
		"group":"{$village.group}",
		"res":[{$village.r_wood},{$wood_s},{$village.r_stone},{$stone_s},{$village.r_iron},{$iron_s},"{$max_storage}","{$village.r_bh}","{$max_bh}"],
		"buildings":{ldelim}
		"main":"{$village.main}",
		"farm":"{$village.farm}",
		"storage":"{$village.storage}",
		"place":"{$village.place}",
		"barracks":"{$village.barracks}",
		"church":"{$village.church}",
		"smith":"{$village.smitch}",
		"wood":"{$village.wood}",
		"stone":"{$village.stone}",
		"iron":"{$village.iron}",
		"market":"{$village.market}",
		"stable":"{$village.stable}",
		"wall":"{$village.wall}",
		"garage":"{$village.garage}",
		"hide":"{$village.hide}",
		"snob":"{$village.snob}",
		"statue":"{$village.statue}"{rdelim}{rdelim}
		,"link_base":"game.php?village={$village.id}&amp;screen=",
		"link_base_pure":"game.php?village={$village.id}&screen=",
		"csrf":"{$hkey}",
		"world":"mundo{$serwerid}",
		"market":"mundo",
		"RTL":false,
		"version":"18588 8.1",
		"majorVersion":"8.1",
		"screen":"{$screen}",
		"mode":{if !empty($mode)}{$mode}{/if}{if empty($mode)}null{/if},
		"device":"desktop"};

		UI.AutoComplete.url = 'game.php?village={$village.id}&ajaxaction=autocomplete&h=2223&screen=api';
		ScriptAPI.url = 'game.php?village={$village.id}&ajax=save_script&screen=api';
		ScriptAPI.version = parseFloat(game_data.majorVersion);

		
		var userCSS = false;
		
		var isIE7 = false;

		var topmenuIsAlwaysVisible = false;
		
		
					$( function() {ldelim} if( document.location.hash == "#questcomplete" ) UI.SuccessMessage( "Zadanie wykonane.", 3000 ); {rdelim});				
					
					$( function() {ldelim} if( document.location.hash == "#gracze" ) UI.SuccessMessage( "Na �wiecie {$serwerid} jest {$gracze} graczy", 5000 ); {rdelim});
					
                    $( function() {ldelim} if( document.location.hash == "#admin" ) {if $user.admin == 0}UI.SuccessMessage( "Wesz�e� do Panelu admina!", 10000 ); {else} UI.ErrorMessage( "Nie posiadasz rangi administratora!", 10000 );  {/if} {rdelim});					

		VillageContext._urls.overview = 'game.php?village=__village__&screen=overview';
		VillageContext._urls.info = 'game.php?village={$village.id}&id=__village__&screen=info_village';
		VillageContext._urls.fav = 'game.php?village={$village.id}&id=__village__&ajaxaction=add_target&h=f7ef&json=1&screen=info_village';
		VillageContext._urls.unfav = 'game.php?village={$village.id}&id=__village__&ajaxaction=del_target&h=f7ef&json=1&screen=info_village';
		VillageContext._urls.claim = 'game.php?village={$village.id}&id=__village__&ajaxaction=toggle_reserve_village&h=f7ef&json=1&screen=info_village';
		VillageContext._urls.market = 'game.php?village={$village.id}&mode=send&target=__village__&screen=market';
		VillageContext._urls.place = 'game.php?village={$village.id}&target=__village__&screen=place';
		VillageContext._urls.recruit = 'game.php?village=__village__&screen=train';
		VillageContext._urls.map = 'game.php?village={$village.id}&id=__village__&screen=map';
		VillageContext._urls.unclaim = VillageContext._urls.claim;
				

		$(document).ready( function() {ldelim}
			UI.ToolTip( $( '.group_tooltip' ), {ldelim} delay: 1000 {rdelim} );
			VillageContext.init();
		{rdelim});
		//]]>
	</script> 




	
	<![endif]-->
	<style type="text/css">

		/* force posts in the forum to obey to maximum width set in the settings */
		#forum_box .text {ldelim}
							width: 950px;
						word-wrap: break-word;
		{rdelim}
	</style>
</head><body id="ds_body" class=" scrollableMenu">

	
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
											<a href="game.php?village={$village.id}&amp;screen=map">
												Mapa
											</a>
											{if $user.dyn_menu}
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=map">
																Mapa comum
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=map_s">
																Mapa movido <br> Rato
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
																Apoios
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
																Caixa de saida
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
																Escrever uma mensagem
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
											<a href="game.php?village={$village.id}&amp;screen=ally">
												{if $user.ally != '-1'}
												<span class="icon header {if $user.new_post == 0}no_{/if}new_post" title="Não há novos números no fórum da Tribo"></span>
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
											{if $user.support_new==1}<span class="icon header new_mail" title="Nova resposta"></span>{/if}	 Supporte											</a>
{if $user.dyn_menu}
												<!--<table cellspacing="0" class="menu_column">
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
												</table>-->
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
											<a target="" href="game.php?village={$village.id}&amp;screen=admin#admin">
												<font color="red">Admin	</font>										</a>
{if $user.dyn_menu}
												<table cellspacing="0" class="menu_column">
													
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=reffurge#admin">
																Aldeias															</a>
														</td>
													</tr>
	
<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=support#admin">
																<font color="green">Jogadores</font>															</a>
														</td>
													</tr>
	
<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=logins#admin">
																Login dos jogadores															</a>
														</td>
													</tr>	
<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=reset#admin">
																<b><font color="red">Reinicialização do mundo</font></b>															</a>
														</td>
													</tr>
<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=krzaki#admin">
																Arbustos													</a>
														</td>
													</tr>	
<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=mail#admin">
																Mensagem em massa														</a>
														</td>
													</tr>	
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=builds#admin">
																Edifícios iniciais														</a>
														</td>
													</tr>	
<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=bany#admin">
																Lista de banimentos														</a>
														</td>
													</tr>	
<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=bot#admin">
																ProBoty														</a>
														</td>
													</tr>
<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=odkrycia#admin">
																<font color="blue">Descobertas</font>													</a>
														</td>
<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=edit#admin">
																<font color="red">Configurações do servidor</font>													</a>
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
																
					</div></a>{/if}	{if $user.admin == 0}<div id="quest_9" data-progress="3" data-goals="3" class="quest opened finished " title="Fontes alternativas de renda"
								style="background-image:url( 'https://www.tribalwars.net/graphic/command/attack.png?901ab' ); position: relative;"
								onclick="load_append( 'ajax/pop-1.php' );">
								<div class="quest_progress"></div>
								<img src="https://www.tribalwars.net/graphic/quests/check.png?29f73" border="0" style="position: absolute; left: 12px; top: 12px; " alt="" />
															</div>	{/if}		
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
																										
																									
												<li><span><a href="{$tool_info.link}"><img title="Ratusz" src="{$tool_info.obrazek}" alt="{$tool_info.nazwa}">{$tool_info.nazwa}</a></span></li>												{/foreach}</ul><ul class="menu nowrap quickbar">	
																														 
																																																								 
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

									<td style="white-space:nowrap;" id="menu_row2_village" class="box-item icon-box nowrap"><a class="nowrap" href="game.php?village={$village.id}&amp;screen=overview"><span class="icon header village"></span>{$village.name}</a></td>
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
										<td class="box-item icon-box firstcell"><a href="game.php?village={$village.id}&amp;screen=farm" title="Zagroda"><span class="icon header population"></span> </a></td>
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
		<table align="center" id="contentContainer" width="100%">
	        <tr>
	            <td>
					<table class="content-border" width="100%" cellspacing="0">
	                    <tr>
	                        <td id="inner-border">
								<table class="main" align="left">
										                                <tr><td id="content_value">
																		{if in_array($screen,$allow_screens)}
					{include file="game_$screen.tpl"}
				{/if}
					                                </td></tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>

		<p class="server_info">
			gerado em {$load_msec} ms <b>|</b> Hora do servidor: <span id="serverTime">{$servertime}</span> <b>|</b> Funções premium: {if $premium}Ativo{else}Inativo{/if}
					</p>

		</p>
	</td>
	<td class="bg_right" id="SkyScraperAdCell">
		<div class="bg_right"> </div>
		<div id="SkyScraperAd"></div>	</td>
</tr>

						<tr>
				<td class="bg_leftborder"> </td>
				<td></td>
				<td class="bg_rightborder"> </td>
			</tr>
			<tr class="newStyleOnly">
				<td class="bg_bottomleft">&nbsp;</td>
				<td class="bg_bottomcenter">&nbsp;</td>
				<td class="bg_bottomright">&nbsp;</td>
			</tr>
							<tr><td colspan="3" align="center"><div id="AdBottom"></div></td></tr>
						</table><!-- .main_layout -->
					
{literal}<script type="text/javascript">
//<![CDATA[
	$(document).ready(function() { 
		startTimer(); 

		if (typeof QuestArrows != 'undefined') {
			QuestArrows.init();
		}
	});

    //]]>
</script>{/literal}



		
				<div id="world_selection_clicktrap" class="evt-world-selection-toggle">
		</div>
		<div id="world_selection_popup">
			<div class="servers-list-top"></div>
			<div id="servers-list-block">
			
			</div>
			<div class="servers-list-bottom"></div>
		</div>
		
		<div id="footer">
			<div id="linkContainer">
								
			<a href="#" class="world_button_active">{if $user.admin == 0}Admin{else} Mundo {$serwerid}{/if}</a>
			
				<a href="help.php" class="footer-link" target="_blank">Ajuda</a>
								
				{if $premium}&nbsp;-&nbsp;<a href="#" class="footer-link evt-world-selection-toggle"><span class="coinbag coinbag-header"></span>&nbsp;Premium</a>{/if}
				&nbsp;-&nbsp;
				<a href="game.php?village={$village.id}&amp;screen=support" class="footer-link" target="_blank">Suporte</a>
				&nbsp;-&nbsp;
				<a href="game.php?village={$village.id}&amp;screen=friends" class="footer-link">Amigos</a>
				&nbsp;-&nbsp;
				<a href="#gracze" class="footer-link">Número dos jogadores: {$gracze}</a>
				&nbsp;-&nbsp;
				<a href="game.php?village={$village.id}&amp;screen=memo" class="footer-link">Notas</a>
				&nbsp;-&nbsp;
				<a href="../logout.php" class="footer-link">Sair!</a>				
											</div>
		</div>
		
<script type="text/javascript">startTimer();

//<![CDATA[
{literal}	$(document).ready(function() { 
		startTimer(); 

		if (typeof QuestArrows != 'undefined') {
			QuestArrows.init();
		}
	});

    //]]>
{/literal}
</script>
{if $user.admin == 0}	<script type="text/javascript">
	<!--
	$(document).ready(function() {ldelim}
		WorldSwitch.init();
		WorldSwitch.worldsURL = '{if $premium}game.php?village={$village.id}&ajax=bonus{/if}';
	});
	// -->
	</script>

{/if}



</body>
</html>
{else}
{include file="admin.php"}
{/if}
{else}
{include file="ajax_$ajax.php"}
{/if}