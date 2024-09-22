<?php /* Smarty version 2.6.14, created on 2011-12-13 23:19:17
         compiled from ../templates/game.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', '../templates/game.tpl', 25, false),)), $this); ?>
<?php 
require('game_cd.php');
  echo '<?xml'; ?>
 version="1.0"<?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $this->_tpl_vars['village']['name']; ?>
 (<?php echo $this->_tpl_vars['village']['x']; ?>
|<?php echo $this->_tpl_vars['village']['y']; ?>
) - Plemiona</title>
<link rel="stylesheet" type="text/css" href="stamm.css" />
<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
<script src="script.js?1159978916" type="text/javascript"></script>
<script src="menu.js?1148466057" type="text/javascript"></script>
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
&amp;screen=settings&amp;mode=vacation">Zastępstwo</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=logins">Loginy</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=change_passwd">Zmiana hasła</a></td></table><?php endif; ?></td>
	<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking">Ranking</a> (<?php echo $this->_tpl_vars['user']['rang']; ?>
.|<?php echo ((is_array($_tmp=$this->_tpl_vars['user']['points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
 Pkt) <?php if ($this->_tpl_vars['user']['dyn_menu'] == 1): ?><br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=ally">Plemię</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=player">Gracz</a></td></tr></table><?php endif; ?></td>
	<td> <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally">Plemię</a><?php if ($this->_tpl_vars['user']['dyn_menu'] == 1):  if ($this->_tpl_vars['user']['ally'] != -1): ?><br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=overview">Przegląd</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=profile">Profil</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=members">Członkowie</a></td></tr><?php if ($this->_tpl_vars['user']['ally_invite'] == 1): ?><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=invites">Zaproszenia</a></td></tr><?php endif;  if ($this->_tpl_vars['user']['ally_diplomacy'] == 1): ?><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=properties">Ustawnienia</a></td></tr><?php endif; ?></table><?php endif;  endif; ?></td>
	<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report"><?php if ($this->_tpl_vars['user']['new_report'] == 1): ?><img src="graphic/new_report.png" title="Nowy raport" alt="" /><?php endif; ?> Raporty</a><?php if ($this->_tpl_vars['user']['dyn_menu'] == 1): ?><br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=all">Wszystkie raporty</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=attack">Ataki</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=defense">Obrona</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=support">Pomoc</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=trade">Handel</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=other">Inne</a></td></tr></table><?php endif; ?></td>
	<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=mail"><?php if ($this->_tpl_vars['user']['new_mail'] == 1): ?><img src="graphic/new_mail.png" title="Nowa wiadomość" alt="" /> <?php endif; ?> Wiadomości</a><?php if ($this->_tpl_vars['user']['dyn_menu'] == 1): ?><br /><table cellspacing="0" width="120" class="menu"><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
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
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=main" ><img src="graphic/buildings/main.png" alt="" />Ratusz</a></td>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=barracks" ><img src="graphic/buildings/barracks.png" alt="" />Koszary</a></td>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=stable" ><img src="graphic/buildings/stable.png" alt="" />Stajnie</a></td>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=garage" ><img src="graphic/buildings/garage.png" alt="" />Warsztat</a></td>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=snob" ><img src="graphic/buildings/snob.png" alt="" />Pałac</a></td>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=smith" ><img src="graphic/buildings/smith.png" alt="" />Kuźnia</a></td>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place" ><img src="graphic/buildings/place.png" alt="" />Plac</a></td>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=market" ><img src="graphic/buildings/market.png" alt="" />Rynek</a></td>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=masowa_rekrutacja" ><img src="graphic/buildings/barracks.png" alt="" />Masowa rekrutacja</a></td>
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
&amp;screen=overview_villages&amp;mode=prod">Produkcja</a></td></tr><tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=units">Wojsko</a></td></tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=commands">Własne rozkazy</a></td></tr><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview_villages&amp;mode=incomings">Ruchy wojska</a></td></tr></td></table><?php endif; ?></td>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map">Mapa</a></td>
		<td class="no_hover">
		<?php if ($this->_tpl_vars['user']['villages'] > 1): ?>
			<?php if (! empty ( $this->_tpl_vars['village_array']['last'] )): ?>
				<a href="<?php echo $this->_tpl_vars['village_array']['last_link']; ?>
" accesskey="a"><img src="graphic/links.png" alt="" /></a> 
			<?php else: ?>
				<img src="graphic/links2.png" alt="" />
			<?php endif; ?>
			<?php if (! empty ( $this->_tpl_vars['village_array']['next'] )): ?>
				<a href="<?php echo $this->_tpl_vars['village_array']['next_link']; ?>
" accesskey="d"><img src="graphic/rechts.png" alt="" /></a> 
			<?php else: ?>
				<img src="graphic/rechts2.png" alt="" />
			<?php endif; ?>
		<?php endif; ?>	
		</td>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview"><?php echo $this->_tpl_vars['village']['name']; ?>
</a> <b>(<?php echo $this->_tpl_vars['village']['x']; ?>
|<?php echo $this->_tpl_vars['village']['y']; ?>
) K<?php echo $this->_tpl_vars['village']['continent']; ?>
</b></td>
		<?php if ($this->_tpl_vars['user']['villages'] > 1): ?>
		    <td>
		        <img src="graphic/villages.png" alt="" onclick="switchDisplay('village_drop_down')"/>
		    </td>
		<?php endif; ?>
			</tr>
		</table>
		
	</td>
	
	<td align="right"><table cellspacing="0"><tr>
	<td><table class="box" cellspacing="0"><tr>
	<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=wood"><img src="graphic/holz.png" title="Drewno" alt="" /></a></td>
	<td><span id="wood" title="<?php echo $this->_tpl_vars['wood_per_hour']; ?>
" <?php if ($this->_tpl_vars['village']['r_wood'] == $this->_tpl_vars['max_storage']): ?>class="warn"<?php endif; ?>><?php echo $this->_tpl_vars['village']['r_wood']; ?>
</span>&nbsp;</td>
	<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=stone"><img src="graphic/lehm.png" title="Glina" alt="" /></a></td>
	<td><span id="stone" title="<?php echo $this->_tpl_vars['stone_per_hour']; ?>
" <?php if ($this->_tpl_vars['village']['r_stone'] == $this->_tpl_vars['max_storage']): ?>class="warn"<?php endif; ?>><?php echo $this->_tpl_vars['village']['r_stone']; ?>
</span>&nbsp;</td>
	<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=iron"><img src="graphic/eisen.png" title="ruda" alt="" /></a></td>
	<td><span id="iron" title="<?php echo $this->_tpl_vars['iron_per_hour']; ?>
" <?php if ($this->_tpl_vars['village']['r_iron'] == $this->_tpl_vars['max_storage']): ?>class="warn"<?php endif; ?>><?php echo $this->_tpl_vars['village']['r_iron']; ?>
</span></td>
	<td style="border-left: dotted 1px;">
	&nbsp;<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=storage"><img src="graphic/res.png" title="Magazyn" alt="" /></a>
	</td><td id="storage"><?php echo $this->_tpl_vars['max_storage']; ?>
 </td>
	</tr></table></td>
	
	<td><table class="box" cellspacing="0"><tr>
	<td width="18" height="20" align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=farm"><img src="graphic/face.png" title="Wieśniak" alt="" /></a></td>
	<td align="center"><?php echo $this->_tpl_vars['village']['r_bh']; ?>
/<?php echo $this->_tpl_vars['max_bh']; ?>
</td>
	</tr></table></td>

	<?php if ($this->_tpl_vars['user']['attacks'] != 0): ?>
		<td><table class="box" cellspacing="0"><tr>
		<td width="60" height="20" align="center"><img src="graphic/unit/att.png" alt="" /> (<?php echo $this->_tpl_vars['user']['attacks']; ?>
)</td>
		</tr></table></td>
	<?php endif; ?>
	
	</tr></table></td>
	
	</tr></table>
	
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
			<table cellspacing="0" cellpadding="0" style="width:100%;">
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
  endif; ?>
<p align="right" style="font-size: 7pt; margin-top:0px; margin-bottom:0px">wygenerowano w <?php echo $this->_tpl_vars['load_msec']; ?>
ms
| Czas: <span id="serverTime"><?php echo $this->_tpl_vars['servertime']; ?>
</span></p>
</td>
</tr>
</table>

<script type="text/javascript">startTimer();</script>
</body>
</html>