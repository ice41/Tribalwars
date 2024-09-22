{php}
$this->_tpl_vars['graphic'] = $this->_tpl_vars['user']['confirm_queue'];
{/php}
{if $graphic != '1'}
<head>
	<title>{$village.name} ({$village.x}|{$village.y}) - DarkGamesPT Mundo {$serwerid}</title>
	<link rel="shortcut icon" href="/graphic/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="stamm.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
	<script src="/js/script.js?1159978916" type="text/javascript"></script>

</head>

<body style="margin-top:6px;">

	<div class="top_background"> </div>

	<table class="menu" align="center" width="{$user.window_width}">
		<tr id="menu_row">
		<td><a href="game.php?village={$village.id}&amp;screen=overview_villages" accesskey="s">Visualizaçőes gerais</a>{if $user.dyn_menu==1}<br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=combined">Combinado</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=prod">Produçăo</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=trader">Transportes</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=units">Exercito</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=commands">Emcomendas</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=incomings">A chegar</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=buildings">Edificios</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=tech">Pesquisas</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=groups">Grupo</a></td></tr></table>{/if}</td>
		<td><a href="game.php?village={$village.id}&amp;screen=report">{if $user.new_report==1}<img src="/ds_graphic/new_report.png" title="Novo ralatório" alt="" />{/if} Relatórios</a>{if $user.dyn_menu==1}<br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=all">Todos os relatórios</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=attack">Ataques</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=defense">Defesa</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=support">Ajuda</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=trade">Comércio</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=report&amp;mode=other">Outros</a></td></tr></table>{/if}</td>
		<td><a href="game.php?village={$village.id}&amp;screen=mail">{if $user.new_mail==1}<img src="/ds_graphic/new_mail.png" title="Nowa wiadomość" alt="" /> {/if} Mensagens</a>{if $user.dyn_menu==1}<br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=in">Caixa de entrada</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=out">Caixa de saida</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=arch">Arquivo</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=new">Escrever Mensagem</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=block">Bloquear Remetente</a></td></tr></table>{/if}</td>
		<td><a href="game.php?village={$village.id}&amp;screen=ally">Tribo</a>{if $user.dyn_menu==1}{if $user.ally!=-1}<br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=overview">Visualizaçăo Geral</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=profile">Perfil</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=members">Membros</a></td></tr>{if $user.ally_invite==1}<tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=invites">Convites</a></td></tr>{/if}{if $user.ally_diplomacy==1}<tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=properties">Configuraçőes</a></td></tr>{/if}<tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=kontrakty">Diplomacia</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=reservations">Sistema de Reservas</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=forum">Forum</a></td></tr></table>{/if}{/if}</td>
		<td><a href="game.php?village={$village.id}&amp;screen=ranking">Classificaçăo</a> ({$user.rang}.|{$user.points|format_number} P) {if $user.dyn_menu==1}<br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally">Tribos</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=player">Jogadores</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=con_ally">Tribos do Continente</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=con_player">Jogadores do Continente</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_ally">Oponentes derrotados (Tribo)</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_player">Oponentes derrotados</a></td></tr>{if $display_awards}<tr><td><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=awards">Metas</a></td></tr>{/if}</table>{/if}</td>
		<td><a href="game.php?village={$village.id}&amp;screen=settings">Configuraçőes</a>{if $user.dyn_menu==1}<br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=profile">Perfil</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=settings">Configuraçőes</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=email">Email</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=change_passwd">Mudar senha</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=move">Recomeçar</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=delete">Apagar conta</a></td></tr>{if $display_awards}<tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=award">Metas</a></td></tr>{/if}<tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=logins">Login</a></td></tr><tr><td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=toolbar">Barra de atalhos</a></td></tr></table>{/if}</td>
		<td><a href="game.php?village={$village.id}&amp;screen=premium">Premium</a></td>
		<!--<td><a href="game.php?village={$village.id}&amp;screen=memo">Notas</a></td>
		<td><a href="game.php?village={$village.id}&amp;screen=&amp;action=logout&amp;h={$hkey}" target="_top">Sair</a></td></tr>-->
	</table>
	
	
	
	
	{if $user.show_toolbar==1}
		<br />
		<table id="quickbar" class="menu nowrap" align="center">
		<tr>
			{foreach from=$toolbar item=tool_info}
				<td>
					<a href="{$tool_info.link}" ><img src="{$tool_info.obrazek}" alt="ERR" style="width: 16px;height: 16px;"/>{$tool_info.nazwa}</a>
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
						{if $groups_options.isset}
							<td>
								{if $groups_options.left}
									<a href="{$groups_options.left_link}" accesskey="a"><img src="/ds_graphic/group_left.png" alt="" /></div></a>
								{else}
									<img src="/ds_graphic/links2.png" alt="" />
								{/if}
							</td>
							<td>
								{if $groups_options.right}
									<a href="{$groups_options.right_link}" accesskey="d"><img src="/ds_graphic/group_right.png" alt="" /></a>
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
										&nbsp;<a href="game.php?village={$village.id}&amp;screen=storage"><img src="/ds_graphic/res.png" title="Armazém" alt="" /></a>
									</td><td id="storage">{$max_storage} </td>
								</tr>
							</table>
						</td>
						<td>
							<table class="box" cellspacing="0">
								<tr>
									<td width="18" height="20" align="center"><a href="game.php?village={$village.id}&amp;screen=farm"><img src="/ds_graphic/face.png" title="Fazenda" alt="" /></a></td>
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
					<b>ACHTUNG:</b> Foi criado no arquivo de configuraçăo de jogo que há açőes (construir edifícios, pesquisa, recrutamento, ...) pode ser executado! Cepas ainda pode ser criado.
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
													<th>O seu perfil:</th>
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
			
				{if in_array($screen,$allow_screens)}
					{include file="game_$screen.tpl"}
				{/if}
			
				{$ParseTime->end()}
			
				<p align="right" style="font-size: 7pt; margin-top:0px; margin-bottom:0px">
					wygenerowano w {$load_msec}ms | Czas: 
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
						<a href="help.php" target="_blank">Ajuda</a>
												-
						<a href="game.php?village={$village.id}&screen=friends">Amigos</a>
						<a href="game.php?village={$village.id}&amp;screen=&amp;action=logout&amp;h={$hkey}" target="_top">LogOut</a>
											</div>
									</div>
		</div>

	<script type="text/javascript">startTimer();</script>
</body>



{else}



<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>{$village.name} ({$village.x}|{$village.y}) - DarkGamesPT Mundo {$serwerid}</title>
		<link rel="shortcut icon" href="/graphic/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="game.css?1327661335"/>
		
		{if $screen != 'map'}
			<link rel="stylesheet" type="text/css" href="styl.css"/>
		{/if}
		
		<meta http-equiv="content-type" content="text/html; charset=windows-1250" />
		<script src="/js/script.js?1159978916" type="text/javascript"></script>
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
												Visualizaçőes gerais
											</a>
											{if $user.dyn_menu}
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=combined">
																combinado
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=prod">
																produçăo
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=trader">
																Transportes
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=units">
																exército
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=commands">
																encomendas
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
																Edificios
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=tech">
																Pesquisa
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=groups">
																grupo
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
																Todos os relatórios
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
																comércio
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=report&amp;mode=other">
																outros
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
												Mensagem
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
																Caixa de saída
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=arch">
																Arquivo
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=new">
																Escrever Mensagem
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=block">
																Bloquear Remetente
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
												<span class="icon header no_new_post" title="no total, tribo sem novas mensagens"></span>
												{/if}
												{if $user.new_post == 1}
												<span class="icon header new_post" title="No total, há tribais  są novos posts"></span>
												{/if}
												Tribo
											</a>
											{if $user.dyn_menu && $user.ally != '-1'}
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=overview">
																Configuraçőes
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=profile">
																Perfil
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=members">
																Os membros
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
																	Configuraçőes
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
													Classificaçăo
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
																Jogadores
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=con_ally">
																Tribos do Continente
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=con_player">
																Jogadores do Continente
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_ally">
																Oponentes derrotados (Tribo)
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
																	Metas
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
												Configuraçőes
											</a>
											{if $user.dyn_menu}
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=profile">
																Perfil
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=settings">
																Configuraçőes
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=email">
																E-Mail
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
																Apagar conta
															</a>
														</td>
													</tr>
													{if $display_awards}
														<tr>
															<td class="menu-column-item">
																<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=award">
																	Metas
																</a>
															</td>
														</tr>
													{/if}
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=logins">
																Acessos
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=toolbar">
																Barra de Atalhos
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
											<a target="" href="game.php?village={$village.id}&amp;screen=premium">
												Premium
											</a>
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
			
			
			
			

			<br class="newStyleOnly" />
	        
			<hr class="oldStyleOnly" />
			
			{if $user.show_toolbar==1}
				<table id="header_info" align="center" width="100%" cellspacing="0">
					<tr>
						<td align="center" class="topAlign">
							<table class="header-border">
								<tr>
									<td>
										<table class="box menu nowrap">
											<tr id="menu_row2">
												{foreach from=$toolbar item=tool_info}
													<td class="box-item icon-box {if $tool_info.first}firstcell{else}nowrap{/if}">
														<a href="{$tool_info.link}" ><img src="{$tool_info.obrazek}" alt="ERR" style="width: 16px;height: 16px;"/>{$tool_info.nazwa}</a>
													</td>
												{/foreach}
											</tr>
											<tr class="newStyleOnly">

												<td class="shadow" colspan="9">
													<div class="leftshadow"></div>
													<div class="rightshadow"></div>
												</td>
											</tr>
										</table>	
									</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
			{/if}
			
			

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
	                                            <a id="menu_map_link" href="game.php?village={$village.id}&amp;screen=map">Mapa</a>

	                                        </td>
											<td style="white-space:nowrap;" id="menu_row2_village" class="box-item icon-box nowrap"><a class="nowrap" href="game.php?village={$village.id}&amp;screen=overview">{$village.name}</a></td>
											<td class="box-item"><b class="nowrap">({$village.x}|{$village.y}) K{$village.continent}</b></td>
											{if $groups_options.isset}
												<td class="box-item icon-box nowrap">
													{if $groups_options.left}
														<a href="{$groups_options.left_link}" accesskey="a"><div class="groupLeft" style="width: 15px; height: 22px;"/></div></a>
													{else}
														<div class="arrowLeftGrey" style="width: 15px; height: 22px;"></div>
													{/if}
												</td>
												<td class="box-item icon-box nowrap">
													{if $groups_options.right}
														<a href="{$groups_options.right_link}" accesskey="d"><div class="groupRight" style="width: 15px; height: 22px;"></div></a>
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

				<td align="right" class="topAlign"> </td>

                <td align="right" class="topAlign">
					<table align="right" class="header-border menu_block_right">
						<tr>
							<td>
								<table class="box smallPadding" cellspacing="0" style="empty-cells:show;">
									<tr style="height: 20px;">
										<td class="box-item icon-box">
											<a href="game.php?village={$village.id}&amp;screen=wood">
												<img src="/ds_graphic/holz.png" title="Drewno" alt="" />
											</a>
										</td>
										
										<td class="box-item">
											<span id="wood" title="{$wood_per_hour}" {if $village.r_wood==$max_storage}class="warn"{/if}>
												{$village.r_wood}
											</span>
										</td>
										
										<td class="box-item icon-box">
											<a href="game.php?village={$village.id}&amp;screen=stone">
												<img src="/ds_graphic/lehm.png" title="Glina" alt="" />
											</a>
										</td>
										
										<td class="box-item">
											<span id="stone" title="{$stone_per_hour}" {if $village.r_stone==$max_storage}class="warn"{/if}>
												{$village.r_stone}
											</span>
										</td>
										
										<td class="box-item icon-box">
											<a href="game.php?village={$village.id}&amp;screen=iron">
												<img src="/ds_graphic/eisen.png" title="Żelazo" alt="" />
											</a>
										</td>
										
										<td class="box-item">
											<span id="iron" title="{$iron_per_hour}" {if $village.r_iron==$max_storage}class="warn"{/if}>
												{$village.r_iron}
											</span>
										</td>
										
										<td class="box-item icon-box">
											<a href="game.php?village={$village.id}&amp;screen=storage">
												<img src="/ds_graphic/res.png" title="Pojemność spichlerza" alt="" />
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
										<td class="box-item icon-box firstcell"><a href="game.php?village={$village.id}&amp;screen=farm" title="Zagroda"><img src="/ds_graphic/face.png"/> </a></td>
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
				
				<td align="right" class="topAlign">
					{if $user.paladins > 0 || $user.attacks > 0 || $user.supports > 0}
						<table class="header-border menu_block_right">
							<tr>

								<td>
									<table class="box smallPadding" cellspacing="0" style="width: {$user.right_tbl_width}px;">
										<tr>
											
												<td width="60" height="20" align="center"></td>
											{if $user.attacks > 0}
												<td class="box-item icon-box firstcell" style="width: 49%;">
													<a href="game.php?village={$village.id}&screen=overview_villages&mode=incomings"/>
														<img src="/ds_graphic/unit/att.png" alt="">({$user.attacks})</a>
													</a>
												</td>
											{/if}
											{if $user.supports > 0}
												<td class="box-item icon-box{if $user.attacks <= 0} firstcell{/if}" style="width: 49%;">
													<a href="game.php?village={$village.id}&screen=overview_villages&mode=incomings"/>
														<span><img src="/ds_graphic/command/support.png" alt="">({$user.supports})</span>
													</a>
												</td>
											{/if}
											{if $user.paladins > 0}
												<td class="box-item icon-box{if $user.supports <= 0 && $user.attacks <= 0} firstcell{/if}" style="width: 1%;">
													<a href="game.php?village={$village.id}&screen=statue&mode=inventory"/>
														<img src="/ds_graphic/unit/unit_paladin.png" title="{php} echo entparse($this->_tpl_vars['user']['pala_name']);{/php}"/>
													</a>
												</td>
											{/if}
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
					{/if}
				</td>
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
											<th height="18px">O seu perfil:</th>
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
		<div class="bg_right"> </div>
		<div id="SkyScraperAd">
		
		
		{*TUTAJ MOŻNA WKLEIĆ REKLAMĘ*}
		
		
</div>	</td>
</tr>

			<tr>
				<td class="bg_leftborder"> </td>				<td class="server_info">
					{$ParseTime->end()}
<p align="right" style="font-size: 7pt; margin-top:0px; margin-bottom:0px">gerado em {$load_msec}ms
| Hora: <span id="serverTime">{$servertime}</span></p>



				</td>
				<td class="bg_rightborder"> </td>			</tr>
						<tr class="newStyleOnly">
				<td class="bg_bottomleft">&nbsp;</td>
				<td class="bg_bottomcenter">&nbsp;</td>
				<td class="bg_bottomright">&nbsp;</td>
			</tr>
										<tr><td colspan="3" align="center"><div id="AdBottom"></div></td></tr>

					</table><!-- .main_layout -->




				<div id="footer" >
			<div id="footer_logo"> </div>
				<div id="linkContainer">

					<div id="footer_left">
					    <center><a target="_blank" href="darkgamespt.site88.net">DarkGamesPT</a>
						-
						<a target="_blank" href="help.php">Ajuda</a>
						-
						<a href="game.php?village={$village.id}&screen=friends">Amigos</a>
						-
						<a href="game.php?village={$village.id}&amp;screen=memo">Bloco de Notas</a>
						-
						<a href="game.php?village={$village.id}&amp;screen=&amp;action=logout&amp;h={$hkey}" target="_top">Terminar Sessăo</a></td></tr>

						</center>
											</div>
										</div>
		</div>

<script type="text/javascript">startTimer();</script>		
</body>
</html>
{/if}
