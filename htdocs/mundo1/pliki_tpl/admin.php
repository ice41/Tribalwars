{if $user.admin == 0}
<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> {$village.name} ({$village.x}|{$village.y}) - Tribos - Mundo {$serwerid}</title>
<link id="favicon" rel="shortcut icon"  href="/graphic/favicon.ico" />
<link rel="stylesheet" type="text/css" href="../css/stammm.css" />
<link rel="stylesheet" type="text/css" href="../css/game_new.css" />
<link rel="stylesheet" type="text/css" href="../css/game.css" />
<link rel="stylesheet" type="text/css" href="../css/styl.css" />
<link rel="stylesheet" type="text/css" href="../admin.css" />
<meta http-equiv="content-type" content="text/html; charset={if $mode != 'edit'}UTF-8{else}windows-1250{/if}">
<script src="../js/script.js" type="text/javascript"></script>
<script src="../js/game.js" type="text/javascript"></script>
<script src="../js/game_old.js" type="text/javascript"></script>
</head>
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
												Inspeções
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
												Raporty
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
												{if $user.new_mail==1}<span class="icon header new_mail" title="nova mensagem"></span>{/if}
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
												<span class="icon header {if $user.new_post == 0}no_{/if}new_post" title="Não há novas postagens no fórum da tribo"></span>
				           							{/if}
												 												Tribo
											</a>
											{if $user.dyn_menu && $user.ally != '-1'}
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=overview">
																visão global
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
																Planejador de conquista
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
																Endereço E-mail
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=change_passwd">
																Mudar senha
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=move">
																Comece de novo
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=delete">
																Excluir a conta
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
											<a target="" href="game.php?village={$village.id}&amp;screen=support">
											{if $user.support_new==1}<span class="icon header new_mail" title="Nowa odpowiedź"></span>{/if}	 Suporte											</a>
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
																<font color="green">Aplicações dos jogadores</font>															</a>
														</td>
													</tr>
	
<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=logins#admin">
																Login nos jogadores															</a>
														</td>
													</tr>	
<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=reset#admin">
																<b><font color="red">Redefinição mundial</font></b>															</a>
														</td>
													</tr>
<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=krzaki#admin">
																Arbustos														</a>
														</td>
													</tr>	
<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=mail#admin">
																Mensagem de massa														</a>
														</td>
													</tr>	
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=builds#admin">
																Prédios iniciantes														</a>
														</td>
													</tr>	
<tr>
														<td class="menu-column-item">
															<a href="game.php?village={$village.id}&amp;screen=admin&mode=bany#admin">
																Lista de Banów													</a>
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

<div style="margin: 10px">
<table cellspacing="0" width="100%"><tr><td width="250" valign="top">
<div style="margin: 2px">
	<table class="main" width="100%"><tr><td>
		<tr>
		<td>
			<table class="menueadmin" width="100%">
				<tr><th><center>{$lang.admin.menu_name}</center></th></tr>
					{foreach from=$admin_modes key=name item=dbmode}
						{if $dbmode == kody && $premium} 
						{if $dbmode != 'users'}				<tr>
									<td{if $dbmode == $mode} 
class="selected"{/if}
 width="100">
										<a href="game.php?village={$village.id}&amp;screen=admin&amp;mode={$dbmode}">{$name} </a>
									</td>
								</tr>{/if}
								{else}
{if  $dbmode != 'kody'}
								{if $dbmode != 'users'}				<tr>
									<td{if $dbmode == $mode} 
class="selected"{/if}
 width="100">
										<a href="game.php?village={$village.id}&amp;screen=admin&amp;mode={$dbmode}">{$name} </a>
									</td>
								</tr>{/if}	
{/if}								
								{/if}
							
																					{/foreach}
								 <tr><th>{$lang.admin.menu_others}</th></tr>
					<tr><td><a href="game.php?village={$village.id}&screen=welcome">{$lang.admin.menu.game}</a></td></tr>													
			 </table>
			 			
					</td></tr></table>
	



</td><td width="*" valign="top">

<div style="margin: 2px">
	<table class="main" width="100%">
	<tr>
	<td style="padding:2px;">
	
{if !empty($error)}<h2 class="error"><center>{$error}</center></h2>{/if}
					{include file="game_admin_$mode.tpl"}
		<p align="right" style="font-size: 7pt; margin-top:0px; margin-bottom:0px">gerado em {$load_msec} ms
	Hora do servidor: <span id="serverTime">{$servertime}</span></p>
	</td>
	</tr>
	</table>

</td></tr></table>

<script type="text/javascript">startTimer();</script>
</body>
</html>



{elseif $user.admin != 0}
<h2><b><font color="red">Não dá direito a procurar esta página!</font></color></b></h2>
{/if}













{*
<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title> {$village.name} ({$village.x}|{$village.y}) - Tribos - Mundo {$serwerid} - Panel administrador</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="shortcut icon" href="/graphic/favicon.ico" type="image/x-icon" />

	
	<link rel="stylesheet" type="text/css" href="/css/game_new.css" />
	<link rel="stylesheet" type="text/css" href="/css/styl.css" />

	<link rel="stylesheet" type="text/css" href="/css/premiumBenefits.css" />

	
	<script type="text/javascript" src="/js/game.js"></script>

	<script type="text/javascript" src="/js/PremiumBenefits.js"></script>

	
	
</head>

<body id="ds_body" class="header" >
<div style="margin: 10px" valign="top">
<table width="100%" valign="top">
<td>
<table class="content-border" width="100%" valign="top">
<tr>
	
		<td>
<table id="content_value" class="inner-border main" valign="top">
<tr>
					<td>
					<table class="vis" width="150" valign="top">
					<tr><th>{$lang.game.admin.menu_name}</th></tr>
					
					{foreach from=$admin_modes key=name item=dbmode}
						{if $dbmode == kody && $premium} 
						{if $dbmode != 'users'}				<tr>
									<td{if $dbmode == $mode} 
class="selected"{/if}
 width="100">
										<a href="game.php?village={$village.id}&amp;screen=admin&amp;mode={$dbmode}">{$name} </a>
									</td>
								</tr>{/if}
								{else}
{if  $dbmode != 'kody'}
								{if $dbmode != 'users'}				<tr>
									<td{if $dbmode == $mode} 
class="selected"{/if}
 width="100">
										<a href="game.php?village={$village.id}&amp;screen=admin&amp;mode={$dbmode}">{$name} </a>
									</td>
								</tr>{/if}	
{/if}								
								{/if}
							
																					{/foreach}
			       
					</table>
</table>

</table>
<td>
<table class="content-border" style=" border-collapse: collapse; margin: 0 auto" width="100%" valign="top">
	
	<tr>
	
		<td>
			<table id="content_value" class="inner-border main" cellspacing="0" valign="top">
				
				<tr>
					<td>
					{if !empty($error)}<h2 class="error"><center>{$error}</center></h2>{/if}
					{include file="game_admin_$mode.tpl"}
					
</td></tr>
</table>
</div>
</td></tr></table>
</table>
</body>
</html>


*}



