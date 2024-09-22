<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2022-11-30 20:30:38
         Wersja PHP pliku pliki_tpl/admin.php */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'admin.php', 329, false),)), $this); ?>
<?php if ($this->_tpl_vars['user']['admin'] == 0): ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title> <?php echo $this->_tpl_vars['village']['name']; ?>
 (<?php echo $this->_tpl_vars['village']['x']; ?>
|<?php echo $this->_tpl_vars['village']['y']; ?>
) - Tribos - Mundo <?php echo $this->_tpl_vars['serwerid']; ?>
</title>
<link id="favicon" rel="shortcut icon"  href="/graphic/favicon.ico" />
<link rel="stylesheet" type="text/css" href="../css/stammm.css" />
<link rel="stylesheet" type="text/css" href="../css/game_new.css" />
<link rel="stylesheet" type="text/css" href="../css/game.css" />
<link rel="stylesheet" type="text/css" href="../css/styl.css" />
<link rel="stylesheet" type="text/css" href="../admin.css" />
<meta http-equiv="content-type" content="text/html; charset=<?php if ($this->_tpl_vars['mode'] != 'edit'): ?>UTF-8<?php else: ?>windows-1250<?php endif; ?>">
<script src="../js/script.js" type="text/javascript"></script>
<script src="../js/game.js" type="text/javascript"></script>
<script src="../js/game_old.js" type="text/javascript"></script>
</head>
	<style type="text/css">

		/* force posts in the forum to obey to maximum width set in the settings */
		#forum_box .text {
							width: 950px;
						word-wrap: break-word;
		}
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
											<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages" >
												Inspeções
											</a>
											<?php if ($this->_tpl_vars['user']['dyn_menu']): ?>
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=combined">
																Combinado
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=prod">
																Produção
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=trader">
																Transporte
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=units">
																Exército
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=commands">
																Ordens
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=incomings">
																A chegar
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=buildings">
																Edifícios
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=tech">
																Tecnologia
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=grocusto">
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
											<?php endif; ?>
										</td>
										
										<td class="menu-item">
											<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report">
												<?php if ($this->_tpl_vars['user']['new_report'] == 1): ?><span class="icon header new_report" title="Nowy raport"></span><?php endif; ?>
												Raporty
											</a>
											<?php if ($this->_tpl_vars['user']['dyn_menu']): ?>
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=all">
																Todas os relatórios
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=attack">
																Ataques
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=defense">
																Defesa
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=support">
																Ajudar
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=trade">
																Trocas
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=other">
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
											<?php endif; ?>
										</td>

										<td class="menu-item">
											<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail">
												<?php if ($this->_tpl_vars['user']['new_mail'] == 1): ?><span class="icon header new_mail" title="nova mensagem"></span><?php endif; ?>
												Mensagens
											</a>
											<?php if ($this->_tpl_vars['user']['dyn_menu']): ?>
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=in">
																Caixa de entrada
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=out">
																Caixa de saida
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=arch">
																Arquivos
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=new">
																Escreve uma mensagem
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=block">
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
											<?php endif; ?>
										</td>
										
										<td class="menu-item">
											<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally">
												<?php if ($this->_tpl_vars['user']['ally'] != '-1'): ?>
												<span class="icon header <?php if ($this->_tpl_vars['user']['new_post'] == 0): ?>no_<?php endif; ?>new_post" title="Não há novas postagens no fórum da tribo"></span>
				           							<?php endif; ?>
												 												Tribo
											</a>
											<?php if ($this->_tpl_vars['user']['dyn_menu'] && $this->_tpl_vars['user']['ally'] != '-1'): ?>
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=overview">
																visão global
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=Perfile">
																Perfil
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=members">
																Membros
															</a>
														</td>
													</tr>
													<?php if ($this->_tpl_vars['user']['ally_invite'] == 1): ?>
														<tr>
															<td class="menu-column-item">
																<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=invite">
																	Convites
																</a>
															</td>
														</tr>
													<?php endif; ?>
													<?php if ($this->_tpl_vars['user']['ally_diplomacy'] == 1): ?>
														<tr>
															<td class="menu-column-item">
																<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=properties">
																	Definições
																</a>
															</td>
														</tr>
													<?php endif; ?>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=kontrakty">
																Diplomacia
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=reservations">
																Planejador de conquista
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=forum">
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
											<?php endif; ?>
										</td>
										
										<td class="menu-item lpad"> </td>

										<td class="menu-item" id="topdisplay">
											<div class="bg">
												<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking">
													Ranking
												</a>
												
												<div class="rank">
													(<?php echo $this->_tpl_vars['user']['rang']; ?>
.|<?php echo ((is_array($_tmp=$this->_tpl_vars['user']['points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
 P)
												</div>
												
												<?php if ($this->_tpl_vars['user']['dyn_menu']): ?>
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=ally">
																Tribos
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=player">
																Jogador
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=con_ally">
																Tribos no continente
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=con_player">
																Jogadores no continente
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=kill_ally">
																Oponentes derrotados (tribos)
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=kill_player">
																Oponentes derrotados
															</a>
														</td>
													</tr>
													<?php if ($this->_tpl_vars['display_awards']): ?>
														<tr>
															<td class="menu-column-item">
																<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=awards">
																	Medalhas
																</a>
															</td>
														</tr>
													<?php endif; ?>
													<tr>
														<td class="bottom">
															<div class="corner"></div>
															<div class="decoration"></div>
														</td>
													</tr>
												</table>
											<?php endif; ?>
											</div>
										</td>
																				
										<td class="menu-item rpad"> </td>
										
										<td class="menu-item">
											<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings">
												Definições
											</a>
											<?php if ($this->_tpl_vars['user']['dyn_menu']): ?>
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=Perfile">
																Perfil
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=settings">
																Definições
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=email">
																Endereço E-mail
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=change_passwd">
																Mudar senha
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=move">
																Comece de novo
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=delete">
																Excluir a conta
															</a>
														</td>
													</tr>
													<?php if ($this->_tpl_vars['display_awards']): ?>
														<tr>
															<td class="menu-column-item">
																<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=award">
																	Medalhas
																</a>
															</td>
														</tr>
													<?php endif; ?>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=logins">
																Login
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=toolbar">
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
											<?php endif; ?>
										</td>

										<td class="menu-item">
											<a target="" href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=support">
											<?php if ($this->_tpl_vars['user']['support_new'] == 1): ?><span class="icon header new_mail" title="Nowa odpowiedź"></span><?php endif; ?>	 Suporte											</a>
<?php if ($this->_tpl_vars['user']['dyn_menu']): ?>
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=support">
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
											<?php endif; ?>
										</td>
										
										<td class="menu-item">
											<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=memo">
												Notas
											</a>
										</td>

										<td class="menu-item">
											<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;action=logout&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" target="_top">
												Sair
											</a>
										</td>
									<?php if ($this->_tpl_vars['user']['admin'] == 0): ?><td class="menu-item">
											<a target="" href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=admin#admin">
												<font color="red">Admin	</font>										</a>
<?php if ($this->_tpl_vars['user']['dyn_menu']): ?>
												<table cellspacing="0" class="menu_column">
													
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=admin&mode=reffurge#admin">
																Aldeias															</a>
														</td>
													</tr>
	
<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=admin&mode=support#admin">
																<font color="green">Aplicações dos jogadores</font>															</a>
														</td>
													</tr>
	
<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=admin&mode=logins#admin">
																Login nos jogadores															</a>
														</td>
													</tr>	
<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=admin&mode=reset#admin">
																<b><font color="red">Redefinição mundial</font></b>															</a>
														</td>
													</tr>
<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=admin&mode=krzaki#admin">
																Arbustos														</a>
														</td>
													</tr>	
<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=admin&mode=mail#admin">
																Mensagem de massa														</a>
														</td>
													</tr>	
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=admin&mode=builds#admin">
																Prédios iniciantes														</a>
														</td>
													</tr>	
<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=admin&mode=bany#admin">
																Lista de Banów													</a>
														</td>
													</tr>	
<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=admin&mode=bot#admin">
																ProBoty														</a>
														</td>
													</tr>
<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=admin&mode=odkrycia#admin">
																<font color="blue">Descobertas</font>													</a>
														</td>
<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=admin&mode=edit#admin">
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
											<?php endif; ?>
										</td>
<?php endif; ?>
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
				<tr><th><center><?php echo $this->_tpl_vars['lang']['admin']['menu_name']; ?>
</center></th></tr>
					<?php $_from = $this->_tpl_vars['admin_modes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbmode']):
?>
						<?php if ($this->_tpl_vars['dbmode'] == kody && $this->_tpl_vars['premium']): ?> 
						<?php if ($this->_tpl_vars['dbmode'] != 'users'): ?>				<tr>
									<td<?php if ($this->_tpl_vars['dbmode'] == $this->_tpl_vars['mode']): ?> 
class="selected"<?php endif; ?>
 width="100">
										<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=admin&amp;mode=<?php echo $this->_tpl_vars['dbmode']; ?>
"><?php echo $this->_tpl_vars['name']; ?>
 </a>
									</td>
								</tr><?php endif; ?>
								<?php else: ?>
<?php if ($this->_tpl_vars['dbmode'] != 'kody'): ?>
								<?php if ($this->_tpl_vars['dbmode'] != 'users'): ?>				<tr>
									<td<?php if ($this->_tpl_vars['dbmode'] == $this->_tpl_vars['mode']): ?> 
class="selected"<?php endif; ?>
 width="100">
										<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=admin&amp;mode=<?php echo $this->_tpl_vars['dbmode']; ?>
"><?php echo $this->_tpl_vars['name']; ?>
 </a>
									</td>
								</tr><?php endif; ?>	
<?php endif; ?>								
								<?php endif; ?>
							
																					<?php endforeach; endif; unset($_from); ?>
								 <tr><th><?php echo $this->_tpl_vars['lang']['admin']['menu_others']; ?>
</th></tr>
					<tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=welcome"><?php echo $this->_tpl_vars['lang']['admin']['menu']['game']; ?>
</a></td></tr>													
			 </table>
			 			
					</td></tr></table>
	



</td><td width="*" valign="top">

<div style="margin: 2px">
	<table class="main" width="100%">
	<tr>
	<td style="padding:2px;">
	
<?php if (! empty ( $this->_tpl_vars['error'] )): ?><h2 class="error"><center><?php echo $this->_tpl_vars['error']; ?>
</center></h2><?php endif; ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_admin_".($this->_tpl_vars['mode']).".tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<p align="right" style="font-size: 7pt; margin-top:0px; margin-bottom:0px">gerado em <?php echo $this->_tpl_vars['load_msec']; ?>
 ms
	Hora do servidor: <span id="serverTime"><?php echo $this->_tpl_vars['servertime']; ?>
</span></p>
	</td>
	</tr>
	</table>

</td></tr></table>

<script type="text/javascript">startTimer();</script>
</body>
</html>



<?php elseif ($this->_tpl_vars['user']['admin'] != 0): ?>
<h2><b><font color="red">Não dá direito a procurar esta página!</font></color></b></h2>
<?php endif; ?>















