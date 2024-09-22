<?php /* Smarty version 2.6.14, created on 2012-05-02 14:13:34
         compiled from game.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'game.tpl', 21, false),array('modifier', 'number_format', 'game.tpl', 586, false),)), $this); ?>
<?php 
$this->_tpl_vars['graphic'] = $this->_tpl_vars['user']['confirm_queue'];
  if ($this->_tpl_vars['graphic'] != '1'): ?>
<head>
	<title><?php echo $this->_tpl_vars['village']['name']; ?>
 (<?php echo $this->_tpl_vars['village']['x']; ?>
|<?php echo $this->_tpl_vars['village']['y']; ?>
) - Plemiona - Świat <?php echo $this->_tpl_vars['serwerid']; ?>
</title>
	<link rel="stylesheet" type="text/css" href="stamm.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
	<script src="/js/script.js?1159978916" type="text/javascript"></script>

</head>

<body style="margin-top:6px;">

	<table class="menu" align="center" width="<?php echo $this->_tpl_vars['user']['window_width']; ?>
">
		<tr id="menu_row">
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=&amp;action=logout&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" target="_top">Wyloguj</a></td>
		<td><a href="http://www.ds-lan.de" target="_blank">DSLAN Forum</a></td>
		<td><a href="help.php" target="_blank">Pomoc</a></td>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings">Ustawnienia</a><?php if ($this->_tpl_vars['user']['dyn_menu'] == 1): ?><br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=profile">Profil</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=settings">Ustawienia</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=email">Adres E-Mail</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=change_passwd">Zmień hasło</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=move">Zacznij od nowa</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=delete">Usuń konto</a></td></tr><?php if ($this->_tpl_vars['display_awards']): ?><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=award">Odznaczenia</a></td></tr><?php endif; ?><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=logins">Logowania</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=toolbar">Toolbar</a></td></tr></table><?php endif; ?></td>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking">Ranking</a> (<?php echo $this->_tpl_vars['user']['rang']; ?>
.|<?php echo ((is_array($_tmp=$this->_tpl_vars['user']['points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
 Pkt) <?php if ($this->_tpl_vars['user']['dyn_menu'] == 1): ?><br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=ally">Plemiona</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=player">Gracz</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=con_ally">Plemiona na kontynencie</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=con_player">Gracze na kontynencie</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=kill_ally">Pokonani przeciwnicy (plemiona)</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=kill_player">Pokonani przeciwnicy</a></td></tr><?php if ($this->_tpl_vars['display_awards']): ?><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=awards">Odznaczenia</a></td></tr><?php endif; ?></table><?php endif; ?></td>
		<td> <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally">Plemię</a><?php if ($this->_tpl_vars['user']['dyn_menu'] == 1):  if ($this->_tpl_vars['user']['ally'] != -1): ?><br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=overview">Przegląd</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=profile">Profil</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=members">Członkowie</a></td></tr><?php if ($this->_tpl_vars['user']['ally_invite'] == 1): ?><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=invites">Zaproszenia</a></td></tr><?php endif;  if ($this->_tpl_vars['user']['ally_diplomacy'] == 1): ?><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=properties">Ustawnienia</a></td></tr><?php endif; ?><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=kontrakty">Dyplomacja</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=reservations">Planer podbojów</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=forum">Forum sojuszu</a></td></tr></table><?php endif;  endif; ?></td>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report"><?php if ($this->_tpl_vars['user']['new_report'] == 1): ?><img src="/ds_graphic/new_report.png" title="Nowy raport" alt="" /><?php endif; ?> Raporty</a><?php if ($this->_tpl_vars['user']['dyn_menu'] == 1): ?><br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=all">Wszystkie raporty</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=attack">Ataki</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=defense">Obrona</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=support">Pomoc</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=trade">Handel</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=other">Inne</a></td></tr></table><?php endif; ?></td>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail"><?php if ($this->_tpl_vars['user']['new_mail'] == 1): ?><img src="/ds_graphic/new_mail.png" title="Nowa wiadomość" alt="" /> <?php endif; ?> Wiadomości</a><?php if ($this->_tpl_vars['user']['dyn_menu'] == 1): ?><br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=in">Skrzynka odbiorcza</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=out">Skrzynka nadawcza</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=arch">Archiwum</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=new">Napisz wiadomość</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=block">Zablokuj nadawcę</a></td></tr></table><?php endif; ?></td>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=memo">Notatki</a></td></tr>
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
&amp;screen=overview_villages" accesskey="s">Przeglądy</a><?php if ($this->_tpl_vars['user']['dyn_menu'] == 1): ?><br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=combined">Kombinowany</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=prod">Produkcja</a></td></tr><tr><td class="menu-column-item"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=trader">Transporty</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=units">Wojsko</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=commands">Własne rozkazy</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=incomings">Ruchy wojska</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=buildings">Budynki</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=tech">Technologia</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=groups">Grupy</a></td></tr></table><?php endif; ?></td>
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
&amp;screen=wood"><img src="/ds_graphic/holz.png" title="Drewno" alt="" /></a></td>
									<td><span id="wood" title="<?php echo $this->_tpl_vars['wood_per_hour']; ?>
" <?php if ($this->_tpl_vars['village']['r_wood'] == $this->_tpl_vars['max_storage']): ?>class="warn"<?php endif; ?>><?php echo $this->_tpl_vars['village']['r_wood']; ?>
</span>&nbsp;</td>
									<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=stone"><img src="/ds_graphic/lehm.png" title="Glina" alt="" /></a></td>
									<td><span id="stone" title="<?php echo $this->_tpl_vars['stone_per_hour']; ?>
" <?php if ($this->_tpl_vars['village']['r_stone'] == $this->_tpl_vars['max_storage']): ?>class="warn"<?php endif; ?>><?php echo $this->_tpl_vars['village']['r_stone']; ?>
</span>&nbsp;</td>
									<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=iron"><img src="/ds_graphic/eisen.png" title="ruda" alt="" /></a></td>
									<td><span id="iron" title="<?php echo $this->_tpl_vars['iron_per_hour']; ?>
" <?php if ($this->_tpl_vars['village']['r_iron'] == $this->_tpl_vars['max_storage']): ?>class="warn"<?php endif; ?>><?php echo $this->_tpl_vars['village']['r_iron']; ?>
</span></td>
									<td style="border-left: dotted 1px;">
										&nbsp;<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=storage"><img src="/ds_graphic/res.png" title="Magazyn" alt="" /></a>
									</td><td id="storage"><?php echo $this->_tpl_vars['max_storage']; ?>
 </td>
								</tr>
							</table>
						</td>
						<td>
							<table class="box" cellspacing="0">
								<tr>
									<td width="18" height="20" align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=farm"><img src="/ds_graphic/face.png" title="Wieśniak" alt="" /></a></td>
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
					<b>ACHTUNG:</b> Es wurde in der Spielekonfigurationsdatei eingestellt, dass keine Aktionen (Gebäude bauen, Forschen, Rekrutieren,...) ausgeführt werden können! Stämme können trotzdem noch erstellt werden.
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
													<th>Twoje wioski:</th>
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
					Czas prasowania <?php echo $this->_tpl_vars['ParseTime']->get_parse_time(); ?>
s | wygenerowano w <?php echo $this->_tpl_vars['load_msec']; ?>
ms | Czas: 
					<span id="serverTime"><?php echo $this->_tpl_vars['servertime']; ?>
</span>
				</p>
			</td>
		</tr>
	</table>

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
) - Plemiona - Świat <?php echo $this->_tpl_vars['serwerid']; ?>
</title>
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
											<a target="_blank" href="help.php">
												Pomoc
											</a>
										</td>
										
										<td class="menu-item">
											<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages" >
												Przeglądy
											</a>
											<?php if ($this->_tpl_vars['user']['dyn_menu']): ?>
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=combined">
																Kombinowany
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=prod">
																Produkcja
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=trader">
																Transporty
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=units">
																Wojska
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=commands">
																Rozkazy
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=incomings">
																Przybywające
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=buildings">
																Budynki
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=tech">
																Technologia
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=groups">
																Grupy
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
												<?php if ($this->_tpl_vars['user']['new_report'] == 1): ?><img src="/ds_graphic/new_report.png" title="Nowy raport" alt="" /> <?php endif; ?>
												Raporty
											</a>
											<?php if ($this->_tpl_vars['user']['dyn_menu']): ?>
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=all">
																Wszystkie raporty
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=attack">
																Ataki
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=defense">
																Obrona
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=support">
																Pomoc
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=trade">
																Handel
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=other">
																Inne
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
												<?php if ($this->_tpl_vars['user']['new_mail'] == 1): ?><img src="/ds_graphic/new_mail.png" title="Nowa wiadomość" alt="" /><?php endif; ?>
												Wiadomości
											</a>
											<?php if ($this->_tpl_vars['user']['dyn_menu']): ?>
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=in">
																Skrzynka odbiorcza
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=out">
																Skrzynka nadawcza
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=arch">
																Archiwum
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=new">
																Napisz wiadomość
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail&amp;mode=block">
																Zablikuj Nadawcę
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
												Plemię
											</a>
											<?php if ($this->_tpl_vars['user']['dyn_menu'] && $this->_tpl_vars['user']['ally'] != '-1'): ?>
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=overview">
																Przegląd
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=profile">
																Profil
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=members">
																Członkowie
															</a>
														</td>
													</tr>
													<?php if ($this->_tpl_vars['user']['ally_invite'] == 1): ?>
														<tr>
															<td class="menu-column-item">
																<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=invite">
																	Zaproszenia
																</a>
															</td>
														</tr>
													<?php endif; ?>
													<?php if ($this->_tpl_vars['user']['ally_diplomacy'] == 1): ?>
														<tr>
															<td class="menu-column-item">
																<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=properties">
																	Ustawienia
																</a>
															</td>
														</tr>
													<?php endif; ?>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=kontrakty">
																Dyplomacja
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=reservations">
																Planer podbojów
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=forum">
																Forum sojuszu
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
|<?php echo ((is_array($_tmp=$this->_tpl_vars['user']['points'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
 P)
												</div>
												
												<?php if ($this->_tpl_vars['user']['dyn_menu']): ?>
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=ally">
																Plemiona
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=player">
																Gracz
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=con_ally">
																Plemiona na kontynencie
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=con_player">
																Gracze na kontynencie
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=kill_ally">
																Pokonani przeciwnicy (plemiona)
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=kill_player">
																Pokonani przeciwnicy
															</a>
														</td>
													</tr>
													<?php if ($this->_tpl_vars['display_awards']): ?>
														<tr>
															<td class="menu-column-item">
																<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=awards">
																	Odznaczenia
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
												Ustawienia
											</a>
											<?php if ($this->_tpl_vars['user']['dyn_menu']): ?>
												<table cellspacing="0" class="menu_column">
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=profile">
																Profil
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=settings">
																Ustawienia
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=email">
																Adres E-Mail
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=change_passwd">
																Zmień hasło
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=move">
																Zacznij od nowa
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=delete">
																Usuń konto
															</a>
														</td>
													</tr>
													<?php if ($this->_tpl_vars['display_awards']): ?>
														<tr>
															<td class="menu-column-item">
																<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=award">
																	Odznaczenia
																</a>
															</td>
														</tr>
													<?php endif; ?>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=logins">
																Logowania
															</a>
														</td>
													</tr>
													<tr>
														<td class="menu-column-item">
															<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=toolbar">
																Toolbar
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
&amp;screen=memo">
												Notatki
											</a>
										</td>
										
										<td class="menu-item">
											<a target="_blank" href="http://www.twlan.org/">
												DS-LAN forum
											</a>
										</td>

										<td class="menu-item">
											<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;action=logout&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" target="_top">
												Wyloguj
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
                                        	<span id="pop_current_label"><?php echo ((is_array($_tmp=$this->_tpl_vars['village']['r_bh'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
</span>/<span id="pop_max_label"><?php echo ((is_array($_tmp=$this->_tpl_vars['max_bh'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
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
											<th height="18px">Twoje wioski:</th>
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

<p align="right" style="font-size: 7pt; margin-top:0px; margin-bottom:0px">Czas prasowania <?php echo $this->_tpl_vars['ParseTime']->get_parse_time(); ?>
s | wygenerowano w <?php echo $this->_tpl_vars['load_msec']; ?>
ms
| Czas: <span id="serverTime"><?php echo $this->_tpl_vars['servertime']; ?>
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
						Gracze on-line: <b><?php echo $this->_tpl_vars['users_online']; ?>
</b>
											</div>
										</div>
		</div>

<script type="text/javascript">startTimer();</script>		
</body>
</html>
<?php endif; ?>