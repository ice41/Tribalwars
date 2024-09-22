<?php /* Smarty version 2.6.14, created on 2014-07-06 22:21:32
         compiled from game.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'game.tpl', 24, false),)), $this); ?>
<?php 
$this->_tpl_vars['graphic'] = $this->_tpl_vars['user']['confirm_queue'];
  if ($this->_tpl_vars['graphic'] != '1'): ?>
<head>
	<title><?php echo $this->_tpl_vars['village']['name']; ?>
 (<?php echo $this->_tpl_vars['village']['x']; ?>
|<?php echo $this->_tpl_vars['village']['y']; ?>
) - DarkGamesPT Mundo <?php echo $this->_tpl_vars['serwerid']; ?>
</title>
	<link rel="shortcut icon" href="/graphic/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="stamm.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
	<script src="/js/script.js?1159978916" type="text/javascript"></script>

</head>

<body style="margin-top:6px;">

	<div class="top_background"> </div>

	<table class="menu" align="center" width="<?php echo $this->_tpl_vars['user']['window_width']; ?>
">
		<tr id="menu_row">
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages" accesskey="s">Visualizaçőes gerais</a><?php if ($this->_tpl_vars['user']['dyn_menu'] == 1): ?><br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=combined">Combinado</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=prod">Produçăo</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=trader">Transportes</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=units">Exercito</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=commands">Emcomendas</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=incomings">A chegar</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=buildings">Edificios</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=tech">Pesquisas</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=groups">Grupo</a></td></tr></table><?php endif; ?></td>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report"><?php if ($this->_tpl_vars['user']['new_report'] == 1): ?><img src="/ds_graphic/new_report.png" title="Novo ralatório" alt="" /><?php endif; ?> Relatórios</a><?php if ($this->_tpl_vars['user']['dyn_menu'] == 1): ?><br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=all">Todos os relatórios</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=attack">Ataques</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=defense">Defesa</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=support">Ajuda</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=trade">Comércio</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=other">Outros</a></td></tr></table><?php endif; ?></td>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail"><?php if ($this->_tpl_vars['user']['new_mail'] == 1): ?><img src="/ds_graphic/new_mail.png" title="Nowa wiadomość" alt="" /> <?php endif; ?> Mensagens</a><?php if ($this->_tpl_vars['user']['dyn_menu'] == 1): ?><br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=in">Caixa de entrada</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=out">Caixa de saida</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=arch">Arquivo</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=new">Escrever Mensagem</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=block">Bloquear Remetente</a></td></tr></table><?php endif; ?></td>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally">Tribo</a><?php if ($this->_tpl_vars['user']['dyn_menu'] == 1):  if ($this->_tpl_vars['user']['ally'] != -1): ?><br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=overview">Visualizaçăo Geral</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=profile">Perfil</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=members">Membros</a></td></tr><?php if ($this->_tpl_vars['user']['ally_invite'] == 1): ?><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=invites">Convites</a></td></tr><?php endif;  if ($this->_tpl_vars['user']['ally_diplomacy'] == 1): ?><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=properties">Configuraçőes</a></td></tr><?php endif; ?><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=kontrakty">Diplomacia</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=reservations">Sistema de Reservas</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=forum">Forum</a></td></tr></table><?php endif;  endif; ?></td>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking">Classificaçăo</a> (<?php echo $this->_tpl_vars['user']['rang']; ?>
.|<?php echo ((is_array($_tmp=$this->_tpl_vars['user']['points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
 P) <?php if ($this->_tpl_vars['user']['dyn_menu'] == 1): ?><br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=ally">Tribos</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=player">Jogadores</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=con_ally">Tribos do Continente</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=con_player">Jogadores do Continente</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=kill_ally">Oponentes derrotados (Tribo)</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=kill_player">Oponentes derrotados</a></td></tr><?php if ($this->_tpl_vars['display_awards']): ?><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=awards">Metas</a></td></tr><?php endif; ?></table><?php endif; ?></td>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings">Configuraçőes</a><?php if ($this->_tpl_vars['user']['dyn_menu'] == 1): ?><br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=profile">Perfil</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=settings">Configuraçőes</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=email">Email</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=change_passwd">Mudar senha</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=move">Recomeçar</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=delete">Apagar conta</a></td></tr><?php if ($this->_tpl_vars['display_awards']): ?><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=award">Metas</a></td></tr><?php endif; ?><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=logins">Login</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=toolbar">Barra de atalhos</a></td></tr></table><?php endif; ?></td>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=premium">Premium</a></td>
		<!--<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=memo">Notas</a></td>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=&amp;action=logout&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" target="_top">Sair</a></td></tr>-->
	</table>
	
	
	
	
	<?php if ($this->_tpl_vars['user']['show_toolbar'] == 1): ?>
		<br />
		<table id="quickbar" class="menu nowrap" align="center">
		<tr>
			<?php $_from = $this->_tpl_vars['toolbar']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tool_info']):
?>
				<td>
					<a href="<?php echo $this->_tpl_vars['tool_info']['link']; ?>
" ><img src="<?php echo $this->_tpl_vars['tool_info']['obrazek']; ?>
" alt="ERR" style="width: 16px;height: 16px;"/><?php echo $this->_tpl_vars['tool_info']['nazwa']; ?>
</a>
				</td>
			<?php endforeach; endif; unset($_from); ?>
		</tr>
		</table>
	<?php endif; ?>
	
	
	<hr width="<?php echo $this->_tpl_vars['user']['window_width']; ?>
" size="2" />
	
	<table align="center" width="<?php echo $this->_tpl_vars['user']['window_width']; ?>
" cellspacing="0" style="padding:0px;margin-bottom:4px">
		<tr>
			<td>
				<table class="menu nowrap" align="left">
					<tr id="menu_row2">
						<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map">Mapa</a></td>
						<?php if ($this->_tpl_vars['groups_options']['isset']): ?>
							<td>
								<?php if ($this->_tpl_vars['groups_options']['left']): ?>
									<a href="<?php echo $this->_tpl_vars['groups_options']['left_link']; ?>
" accesskey="a"><img src="/ds_graphic/group_left.png" alt="" /></div></a>
								<?php else: ?>
									<img src="/ds_graphic/links2.png" alt="" />
								<?php endif; ?>
							</td>
							<td>
								<?php if ($this->_tpl_vars['groups_options']['right']): ?>
									<a href="<?php echo $this->_tpl_vars['groups_options']['right_link']; ?>
" accesskey="d"><img src="/ds_graphic/group_right.png" alt="" /></a>
								<?php else: ?>
									<img src="/ds_graphic/rechts2.png" alt="" />
								<?php endif; ?>
							</td>
						<?php endif; ?>
						<?php if (! empty ( $this->_tpl_vars['group_first_village']['id'] )): ?>
							<td>
								<?php if ($this->_tpl_vars['group_first_village']['id'] == $this->_tpl_vars['village']['id']): ?>
									<img src="/ds_graphic/forwarded.png" alt="" />
								<?php else: ?>
									<a href="<?php echo $this->_tpl_vars['group_first_village']['link']; ?>
" accesskey="a">
										<img src="/ds_graphic/group_jump.png" alt="" />
									</a>
								<?php endif; ?>
							</td>
						<?php else: ?>
							<?php if ($this->_tpl_vars['user']['aktu_group'] !== 'all'): ?>
								<td>
									<img src="/ds_graphic/forwarded.png" alt="" />
								</td>
							<?php endif; ?>
						<?php endif; ?>
						<?php if ($this->_tpl_vars['user']['villages'] > 1): ?>
							<td>
								<?php if (! empty ( $this->_tpl_vars['village_array']['wstecz'] )): ?>
									<a href="<?php echo $this->_tpl_vars['village_array']['wstecz_link']; ?>
" accesskey="a"><img src="/ds_graphic/links.png" alt="" /></a> 
								<?php else: ?>
									<img src="/ds_graphic/links2.png" alt="" />
								<?php endif; ?>
							</td>
							<td>
								<?php if (! empty ( $this->_tpl_vars['village_array']['next'] )): ?>
									<a href="<?php echo $this->_tpl_vars['village_array']['next_link']; ?>
" accesskey="d"><img src="/ds_graphic/rechts.png" alt="" /></a> 
								<?php else: ?>
									<img src="/ds_graphic/rechts2.png" alt="" />
								<?php endif; ?>
							</td>
						<?php endif; ?>	
						<td>
							<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview"><?php echo $this->_tpl_vars['village']['name']; ?>
</a> <b>(<?php echo $this->_tpl_vars['village']['x']; ?>
|<?php echo $this->_tpl_vars['village']['y']; ?>
) K<?php echo $this->_tpl_vars['village']['continent']; ?>
</b>
						</td>
						<?php if ($this->_tpl_vars['user']['villages'] > 1): ?>
							<td>
								<img src="/ds_graphic/villages.png" alt="" onclick="switchDisplay('village_drop_down')"/>
							</td>
						<?php endif; ?>
					</tr>
				</table>
			</td>
			<td align="right">
				<table cellspacing="0">
					<tr>
						<td>
							<table class="box" cellspacing="0">
								<tr>
									<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=wood"><img src="/ds_graphic/holz.png" title="Madeira" alt="" /></a></td>
									<td><span id="wood" title="<?php echo $this->_tpl_vars['wood_per_hour']; ?>
" <?php if ($this->_tpl_vars['village']['r_wood'] == $this->_tpl_vars['max_storage']): ?>class="warn"<?php endif; ?>><?php echo $this->_tpl_vars['village']['r_wood']; ?>
</span>&nbsp;</td>
									<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=stone"><img src="/ds_graphic/lehm.png" title="Argila" alt="" /></a></td>
									<td><span id="stone" title="<?php echo $this->_tpl_vars['stone_per_hour']; ?>
" <?php if ($this->_tpl_vars['village']['r_stone'] == $this->_tpl_vars['max_storage']): ?>class="warn"<?php endif; ?>><?php echo $this->_tpl_vars['village']['r_stone']; ?>
</span>&nbsp;</td>
									<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=iron"><img src="/ds_graphic/eisen.png" title="Ferro" alt="" /></a></td>
									<td><span id="iron" title="<?php echo $this->_tpl_vars['iron_per_hour']; ?>
" <?php if ($this->_tpl_vars['village']['r_iron'] == $this->_tpl_vars['max_storage']): ?>class="warn"<?php endif; ?>><?php echo $this->_tpl_vars['village']['r_iron']; ?>
</span></td>
									<td style="border-left: dotted 1px;">
										&nbsp;<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=storage"><img src="/ds_graphic/res.png" title="Armazém" alt="" /></a>
									</td><td id="storage"><?php echo $this->_tpl_vars['max_storage']; ?>
 </td>
								</tr>
							</table>
						</td>
						<td>
							<table class="box" cellspacing="0">
								<tr>
									<td width="18" height="20" align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=farm"><img src="/ds_graphic/face.png" title="Fazenda" alt="" /></a></td>
									<td align="center"><?php echo $this->_tpl_vars['village']['r_bh']; ?>
/<?php echo $this->_tpl_vars['max_bh']; ?>
</td>
								</tr>
							</table>
						</td>
						
						<?php if ($this->_tpl_vars['user']['attacks'] > 0): ?>
							<td>
								<table class="box" cellspacing="0">
									<tr>
										<td align="center">
											<img src="/ds_graphic/unit/att.png" alt="" />
											<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview_villages&mode=incomings"/>(<?php echo $this->_tpl_vars['user']['attacks']; ?>
)</a>
										</td>
									</tr>
								</table>
							</td>
						<?php endif; ?>
						
						<?php if ($this->_tpl_vars['user']['supports'] > 0): ?>
							<td>
								<table class="box" cellspacing="0">
									<tr>
										<td align="center">
											<img src="/ds_graphic/command/support.png" alt="" />
											<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview_villages&mode=incomings"/>(<?php echo $this->_tpl_vars['user']['supports']; ?>
)</a>
										</td>
									</tr>
								</table>
							</td>
						<?php endif; ?>
						
						<?php if ($this->_tpl_vars['user']['paladins'] > 0): ?>
							<td>
								<table class="box" cellspacing="0">
									<tr>
										<td align="center">
											<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=statue&mode=inventory"/>
												<img src="/ds_graphic/unit/unit_paladin.png" title="<?php  echo entparse($this->_tpl_vars['user']['pala_name']); ?>"/>
											</a>
										</td>
									</tr>
								</table>
							</td>
						<?php endif; ?>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	
	<!--[if IE ]>
		<script type="text/javascript">initMenuList("menu_row");</script>
		<script type="text/javascript">initMenuList("menu_row2");</script>
	<![endif]-->





	<?php if ($this->_tpl_vars['config']['no_actions']): ?>
		<table class="main" width="<?php echo $this->_tpl_vars['user']['window_width']; ?>
" align="center">
			<tr>
				<td style="padding:2px;">
					<b>ACHTUNG:</b> Foi criado no arquivo de configuraçăo de jogo que há açőes (construir edifícios, pesquisa, recrutamento, ...) pode ser executado! Cepas ainda pode ser criado.
				</td>
			</tr>
		</table>
		<br />
	<?php endif; ?>

	<table class="main" width="<?php echo $this->_tpl_vars['user']['window_width']; ?>
" align="center">
		<tr>
			<td style="padding:2px;">
				<div id="container_village_drop_down">
					<div id="village_drop_down" style="display:none;">
						<center>
							<table cellspacing="0" cellpadding="0" style="width:100%;" class="main">
								<tr>
									<td style="background-color:#F8F4E8;">
										<center>
											<?php if ($this->_tpl_vars['sekcja']): ?>
												<table class="vis" style="width:270px ;">
													<tr>
														<td>
															<div style="width: 270;">
																<?php echo $this->_tpl_vars['sekcja_wiosek']; ?>

															</div>
														</td>
													</tr>
												</table>
											<?php endif; ?>
											<table class="vis" style="width:270px ;">
												<tr>
													<th>O seu perfil:</th>
												</tr>
												<?php $_from = $this->_tpl_vars['wioski_gracza']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['wioska']):
?>
													<tr>
														<td<?php if ($this->_tpl_vars['wioska']['id'] == $this->_tpl_vars['village']['id']): ?> style="background-color:#FADC9B;"<?php endif; ?>><?php echo $this->_tpl_vars['wioska']['link']; ?>
</td>
													</tr>
												<?php endforeach; endif; unset($_from); ?>
											</table>
										</center>
									</td>
								</tr>
							</table>
						</center>
					</div>
				</div>
			
				<?php if (in_array ( $this->_tpl_vars['screen'] , $this->_tpl_vars['allow_screens'] )): ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_".($this->_tpl_vars['screen']).".tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				<?php endif; ?>
			
				<?php echo $this->_tpl_vars['ParseTime']->end(); ?>

			
				<p align="right" style="font-size: 7pt; margin-top:0px; margin-bottom:0px">
					wygenerowano w <?php echo $this->_tpl_vars['load_msec']; ?>
ms | Czas: 
					<span id="serverTime"><?php echo $this->_tpl_vars['servertime']; ?>
</span>
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
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=friends">Amigos</a>
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=&amp;action=logout&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" target="_top">LogOut</a>
											</div>
									</div>
		</div>

	<script type="text/javascript">startTimer();</script>
</body>



<?php else: ?>



<?php echo '<?xml'; ?>
 version="1.0" encoding="UTF-8"<?php echo '?>'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?php echo $this->_tpl_vars['village']['name']; ?>
 (<?php echo $this->_tpl_vars['village']['x']; ?>
|<?php echo $this->_tpl_vars['village']['y']; ?>
) - NPED Mundo <?php echo $this->_tpl_vars['serwerid']; ?>
</title>
		<link rel="shortcut icon" href="/graphic/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" type="text/css" href="game.css?1327661335"/>
		
		<?php if ($this->_tpl_vars['screen'] != 'map'): ?>
			<link rel="stylesheet" type="text/css" href="styl.css"/>
		<?php endif; ?>
		
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
											<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages" >
												Visualizaçőes gerais
											</a>
											<?php if ($this->_tpl_vars['user']['dyn_menu']): ?>
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=combined">
																combinado
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=prod">
																produçăo
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=trader">
																Transportes
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=units">
																exército
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=commands">
																encomendas
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
																Edificios
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=tech">
																Pesquisa
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=groups">
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
											<?php endif; ?>
										</td>
										
										<td class="menu-item">
											<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report">
												<?php if ($this->_tpl_vars['user']['new_report'] == 1): ?><span class="icon header new_report" title="Nowy raport"></span><?php endif; ?>
												Relatórios
											</a>
											<?php if ($this->_tpl_vars['user']['dyn_menu']): ?>
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=all">
																Todos os relatórios
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
																Apoios
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=trade">
																comércio
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=other">
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
											<?php endif; ?>
										</td>

										<td class="menu-item">
											<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail">
												<?php if ($this->_tpl_vars['user']['new_mail'] == 1): ?><span class="icon header new_mail" title="Nova mensagem"></span><?php endif; ?>
												Mensagem
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
																Caixa de saída
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=arch">
																Arquivo
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=new">
																Escrever Mensagem
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=block">
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
											<?php endif; ?>
										</td>
										
										<td class="menu-item">
											<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally">
												<?php if ($this->_tpl_vars['user']['ally'] != '-1'): ?>
												<span class="icon header no_new_post" title="no total, tribo sem novas mensagens"></span>
												<?php endif; ?>
												<?php if ($this->_tpl_vars['user']['new_post'] == 1): ?>
												<span class="icon header new_post" title="No total, há tribais  są novos posts"></span>
												<?php endif; ?>
												Tribo
											</a>
											<?php if ($this->_tpl_vars['user']['dyn_menu'] && $this->_tpl_vars['user']['ally'] != '-1'): ?>
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=overview">
																Configuraçőes
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=profile">
																Perfil
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=members">
																Os membros
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
																	Configuraçőes
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
																Reservas
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
													Classificaçăo
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
																Jogadores
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=con_ally">
																Tribos do Continente
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=con_player">
																Jogadores do Continente
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=kill_ally">
																Oponentes derrotados (Tribo)
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
																	Metas
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
												Configuraçőes
											</a>
											<?php if ($this->_tpl_vars['user']['dyn_menu']): ?>
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=profile">
																Perfil
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=settings">
																Configuraçőes
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=email">
																E-Mail
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=change_passwd">
																Alterar senha
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=move">
																Recomeçar
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=delete">
																Apagar conta
															</a>
														</td>
													</tr>
													<?php if ($this->_tpl_vars['display_awards']): ?>
														<tr>
															<td class="menu-column-item">
																<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=award">
																	Metas
																</a>
															</td>
														</tr>
													<?php endif; ?>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=logins">
																Acessos
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
&amp;screen=premium">
												Premium
											</a>
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
			
			<?php if ($this->_tpl_vars['user']['show_toolbar'] == 1): ?>
				<table id="header_info" align="center" width="100%" cellspacing="0">
					<tr>
						<td align="center" class="topAlign">
							<table class="header-border">
								<tr>
									<td>
										<table class="box menu nowrap">
											<tr id="menu_row2">
												<?php $_from = $this->_tpl_vars['toolbar']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tool_info']):
?>
													<td class="box-item icon-box <?php if ($this->_tpl_vars['tool_info']['first']): ?>firstcell<?php else: ?>nowrap<?php endif; ?>">
														<a href="<?php echo $this->_tpl_vars['tool_info']['link']; ?>
" ><img src="<?php echo $this->_tpl_vars['tool_info']['obrazek']; ?>
" alt="ERR" style="width: 16px;height: 16px;"/><?php echo $this->_tpl_vars['tool_info']['nazwa']; ?>
</a>
													</td>
												<?php endforeach; endif; unset($_from); ?>
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
			<?php endif; ?>
			
			

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
	                                            <a id="menu_map_link" href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map">Mapa</a>

	                                        </td>
											<td style="white-space:nowrap;" id="menu_row2_village" class="box-item icon-box nowrap"><a class="nowrap" href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview"><?php echo $this->_tpl_vars['village']['name']; ?>
</a></td>
											<td class="box-item"><b class="nowrap">(<?php echo $this->_tpl_vars['village']['x']; ?>
|<?php echo $this->_tpl_vars['village']['y']; ?>
) K<?php echo $this->_tpl_vars['village']['continent']; ?>
</b></td>
											<?php if ($this->_tpl_vars['groups_options']['isset']): ?>
												<td class="box-item icon-box nowrap">
													<?php if ($this->_tpl_vars['groups_options']['left']): ?>
														<a href="<?php echo $this->_tpl_vars['groups_options']['left_link']; ?>
" accesskey="a"><div class="groupLeft" style="width: 15px; height: 22px;"/></div></a>
													<?php else: ?>
														<div class="arrowLeftGrey" style="width: 15px; height: 22px;"></div>
													<?php endif; ?>
												</td>
												<td class="box-item icon-box nowrap">
													<?php if ($this->_tpl_vars['groups_options']['right']): ?>
														<a href="<?php echo $this->_tpl_vars['groups_options']['right_link']; ?>
" accesskey="d"><div class="groupRight" style="width: 15px; height: 22px;"></div></a>
													<?php else: ?>
														<div class="arrowRightGrey" style="width: 15px; height: 22px;">
													<?php endif; ?>
												</td>
											<?php endif; ?>
											<?php if (! empty ( $this->_tpl_vars['group_first_village']['id'] )): ?>
												<td class="box-item icon-box nowrap">
													<a href="<?php echo $this->_tpl_vars['group_first_village']['link']; ?>
" accesskey="a">
														<div class="groupJump" style="width: 15px; height: 22px;"/></div>
													</a> 
												</td>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['user']['villages'] > 1): ?>
												<td class="box-item icon-box nowrap">
												
												<?php if (! empty ( $this->_tpl_vars['village_array']['wstecz'] )): ?>
													<a href="<?php echo $this->_tpl_vars['village_array']['wstecz_link']; ?>
" accesskey="a"><div class="arrowLeft" style="width: 15px; height: 22px;"/></div></a> 
												<?php else: ?>
													<div class="arrowLeftGrey" style="width: 15px; height: 22px;"></div>
												<?php endif; ?>
												</td>
												<td class="box-item icon-box nowrap">
												<?php if (! empty ( $this->_tpl_vars['village_array']['next'] )): ?>
													<a href="<?php echo $this->_tpl_vars['village_array']['next_link']; ?>
" accesskey="d"><div class="arrowRight" style="width: 15px; height: 22px;"></div></a>
												<?php else: ?>
													<div class="arrowRightGrey" style="width: 15px; height: 22px;">
												<?php endif; ?>
												</td>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['user']['villages'] > 1): ?>
												<td class="box-item icon-box nowrap">
													&nbsp;<img src="/ds_graphic/villages.png" alt="" onclick="switchDisplay('village_drop_down')"/>&nbsp;
												</td>
											<?php endif; ?>
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
											<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=wood">
												<img src="/ds_graphic/holz.png" title="Drewno" alt="" />
											</a>
										</td>
										
										<td class="box-item">
											<span id="wood" title="<?php echo $this->_tpl_vars['wood_per_hour']; ?>
" <?php if ($this->_tpl_vars['village']['r_wood'] == $this->_tpl_vars['max_storage']): ?>class="warn"<?php endif; ?>>
												<?php echo $this->_tpl_vars['village']['r_wood']; ?>

											</span>
										</td>
										
										<td class="box-item icon-box">
											<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=stone">
												<img src="/ds_graphic/lehm.png" title="Glina" alt="" />
											</a>
										</td>
										
										<td class="box-item">
											<span id="stone" title="<?php echo $this->_tpl_vars['stone_per_hour']; ?>
" <?php if ($this->_tpl_vars['village']['r_stone'] == $this->_tpl_vars['max_storage']): ?>class="warn"<?php endif; ?>>
												<?php echo $this->_tpl_vars['village']['r_stone']; ?>

											</span>
										</td>
										
										<td class="box-item icon-box">
											<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=iron">
												<img src="/ds_graphic/eisen.png" title="Żelazo" alt="" />
											</a>
										</td>
										
										<td class="box-item">
											<span id="iron" title="<?php echo $this->_tpl_vars['iron_per_hour']; ?>
" <?php if ($this->_tpl_vars['village']['r_iron'] == $this->_tpl_vars['max_storage']): ?>class="warn"<?php endif; ?>>
												<?php echo $this->_tpl_vars['village']['r_iron']; ?>

											</span>
										</td>
										
										<td class="box-item icon-box">
											<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=storage">
												<img src="/ds_graphic/res.png" title="Pojemność spichlerza" alt="" />
											</a>
										</td>
										
										<td class="box-item" id="storage"><?php echo $this->_tpl_vars['max_storage']; ?>
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
					<table class="header-border menu_block_right">
						<tr>

							<td>
								<table class="box smallPadding" cellspacing="0">
									<tr>
										<td class="box-item icon-box firstcell"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=farm" title="Zagroda"><img src="/ds_graphic/face.png"/> </a></td>
                                        <td class="box-item" align="center" style="margin:0;padding:0;">
                                        	<span id="pop_current_label"><?php echo $this->_tpl_vars['village']['r_bh']; ?>
</span>/<span id="pop_max_label"><?php echo $this->_tpl_vars['max_bh']; ?>
&nbsp;</span>
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
					<?php if ($this->_tpl_vars['user']['paladins'] > 0 || $this->_tpl_vars['user']['attacks'] > 0 || $this->_tpl_vars['user']['supports'] > 0): ?>
						<table class="header-border menu_block_right">
							<tr>

								<td>
									<table class="box smallPadding" cellspacing="0" style="width: <?php echo $this->_tpl_vars['user']['right_tbl_width']; ?>
px;">
										<tr>
											
												<td width="60" height="20" align="center"></td>
											<?php if ($this->_tpl_vars['user']['attacks'] > 0): ?>
												<td class="box-item icon-box firstcell" style="width: 49%;">
													<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview_villages&mode=incomings"/>
														<img src="/ds_graphic/unit/att.png" alt="">(<?php echo $this->_tpl_vars['user']['attacks']; ?>
)</a>
													</a>
												</td>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['user']['supports'] > 0): ?>
												<td class="box-item icon-box<?php if ($this->_tpl_vars['user']['attacks'] <= 0): ?> firstcell<?php endif; ?>" style="width: 49%;">
													<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview_villages&mode=incomings"/>
														<span><img src="/ds_graphic/command/support.png" alt="">(<?php echo $this->_tpl_vars['user']['supports']; ?>
)</span>
													</a>
												</td>
											<?php endif; ?>
											<?php if ($this->_tpl_vars['user']['paladins'] > 0): ?>
												<td class="box-item icon-box<?php if ($this->_tpl_vars['user']['supports'] <= 0 && $this->_tpl_vars['user']['attacks'] <= 0): ?> firstcell<?php endif; ?>" style="width: 1%;">
													<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=statue&mode=inventory"/>
														<img src="/ds_graphic/unit/unit_paladin.png" title="<?php  echo entparse($this->_tpl_vars['user']['pala_name']); ?>"/>
													</a>
												</td>
											<?php endif; ?>
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
					<?php endif; ?>
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
									<?php if ($this->_tpl_vars['sekcja']): ?>
										<table class="vis" width="100%">
											<tr>
												<td>
													<?php echo $this->_tpl_vars['sekcja_wiosek']; ?>

												</td>
											</tr>
										</table>
									<?php endif; ?>
									<table class="vis" width="100%">
										<tr>
											<th height="18px">O seu perfil:</th>
										</tr>
										<?php $_from = $this->_tpl_vars['wioski_gracza']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['wioska']):
?>
											<tr>
												<td<?php if ($this->_tpl_vars['wioska']['id'] == $this->_tpl_vars['village']['id']): ?> class="selected"<?php endif; ?> height="18px"><?php echo $this->_tpl_vars['wioska']['link']; ?>
</td>
											</tr>
										<?php endforeach; endif; unset($_from); ?>
									</table>
								</center>
							</td>
						</tr>
					</table>
				</center>
			</div>
		</div>
	    
	    
		<!-- *********************** CONTENT BELOW ************************** -->
		<table align="center" id="contentContainer" width="<?php echo $this->_tpl_vars['user']['window_width']; ?>
">
	        <tr>
	            <td>
				
					<table class="content-border" width="100%" cellspacing="0">
	                    <tr>
	                        <td id="inner-border">
								<table style="width: 100%" align="left">
									<tr>
										<td id="content_value">

											<?php if (in_array ( $this->_tpl_vars['screen'] , $this->_tpl_vars['allow_screens'] )): ?>
												<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_".($this->_tpl_vars['screen']).".tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
											<?php endif; ?>
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
		
		
				
		
</div>	</td>
</tr>

			<tr>
				<td class="bg_leftborder"> </td>				<td class="server_info">
					<?php echo $this->_tpl_vars['ParseTime']->end(); ?>

<p align="right" style="font-size: 7pt; margin-top:0px; margin-bottom:0px">gerado em <?php echo $this->_tpl_vars['load_msec']; ?>
ms
| Hora: <span id="serverTime"><?php echo $this->_tpl_vars['servertime']; ?>
</span></p>



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
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=friends">Amigos</a>
						-
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=memo">Bloco de Notas</a>
						-
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=&amp;action=logout&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" target="_top">Terminar Sessăo</a></td></tr>

						</center>
											</div>
										</div>
		</div>

<script type="text/javascript">startTimer();</script>		
</body>
</html>
<?php endif; ?>