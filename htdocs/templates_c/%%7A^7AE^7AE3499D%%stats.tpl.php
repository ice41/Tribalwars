<?php /* Smarty version 2.6.14, created on 2012-04-29 08:01:50
         compiled from ../templates/stats.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Triburile - Jocul online</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="start.css" />
		<meta name="description" content="Die St&auml;mme ist ein Browsergame. Jeder Spieler ist Herrscher eines kleinen Dorfes, dem er zu Ruhm und Macht verhelfen soll." />
		<meta name="keywords" content="Browsergame, Browsergames, Browserspiel, Onlinespiel, Onlinegame, Mittelalter, Ritter, Burg, Burgen, Dorf, Krieg, Kampf, K&auml;mpfen, Ruhm, Ehre, Die St&auml;mme" />
		<link rel="stylesheet" type="text/css" href="index.css?1232382056" />
		<!--[if lt IE 7]>
		<link rel="stylesheet" type="text/css" href="index_ie6.css" media="screen"/>
		<![endif]-->
									<script type="text/javascript">
		if(top!=self)
			top.location=self.location;
		</script>
				<style type="text/css">
		
			

		
		</style>
	</head>

	<body>

<div id="index_body">
			<div id="main">
			<div id="header">
				<h1><a href="/index.php" style="background:url(graphic/index/bg-logo.jpg) no-repeat 100% 0;">Triburile - Jocul online</a></h1>
				<div class="navigation">
					<div class="navigation-holder">
						<div class="navigation-wrapper">
							<div id="navigation_span">
								<a href="http://wiki.triburile.ro/">Wiki</a> - <a href="/help/index.php">Ajutor</a>  - <a href="rules.php">Reguli de joc</a>  - <a href="/forum">Forum</a>  - <a href="support.php">Suport</a>  - <a href="team.php">Echipa</a>  - <a href="stats.php">Statistic&#259;</a>
							</div>
						</div>
				</div>
				</div>
							</div><div class="container-block-full">
			<div class="container-top-full"></div>
				<div class="container">
					<table>
						<tr>
							<td valign="top">
								<table class="vis" style="margin:0 18px 0 12px;">
																			<tr>
											<td  style="width:65px;"><a href="stats.php">Lumea 1</a></td>
										</tr>
												
																	</table>
							</td>
							<td valign="top">
								<h2>Statistic&#259; Lumea 1</h2>
								<h3><a href="guest.php" target="_top">&raquo; Intrare vizitator</a> <a href="stat.php" target="_top">&raquo; Set&#259;rile lumii</a></h3><br />

								<table class="vis" width="98%">
									<tr><th>Numar de juc&#259;tori:</th><th><?php echo $this->_tpl_vars['players']; ?>
</th></tr>
									<tr><td>Total sate:</td><td><?php echo $this->_tpl_vars['villages']; ?>
 (<?php echo $this->_tpl_vars['vpp']; ?>
 pe juc&#259;tor)</td></tr>
								</table>
								<br />

								<table class="vis" width="98%">
									<tr><th style="width:150px">Urm&#259;torele valori au fost calculate</th>
									<th>ast&#259;zi la ora <?php echo $this->_tpl_vars['time']; ?>
</th></tr>
									<tr><td>Mesaje expediate:</td><td><?php echo $this->_tpl_vars['mail']; ?>
 (<?php echo $this->_tpl_vars['mpp']; ?>
 pe juc&#259;tor)</td></tr>

									<tr><td>Punctaj total:</td><td><?php echo $this->_tpl_vars['points']; ?>
 (<?php echo $this->_tpl_vars['ppp']; ?>
 pe juc&#259;tor, <?php echo $this->_tpl_vars['ppv']; ?>
 pe sat)</td></tr>

									<tr><td>Total materii prime:</td><td><img src="/graphic/holz.png" title="Lemn" alt="" /><?php echo $this->_tpl_vars['wood']; ?>
 <img src="/graphic/lehm.png" title="Argila" alt="" /><?php echo $this->_tpl_vars['stone']; ?>
 <img src="/graphic/eisen.png" title="Fier" alt="" /><?php echo $this->_tpl_vars['iron']; ?>
 </td></tr>
									<tr><td>Total popula&#355;ie:</td><td><span class="icon header population"> </span> <?php echo $this->_tpl_vars['bh']; ?>
</td></tr>

									<tr>
										<tr><td>Total trupe:</td>
<td>
<table><tr>
<th width="45"><img src="/graphic/unit/unit_spear.png" title="Lancier" alt="" /></th><th width="45"><img src="/graphic/unit/unit_sword.png" title="Luptator cu spada" alt="" /></th><th width="45"><img src="/graphic/unit/unit_axe.png" title="Luptator cu toporul" alt="" /></th><th width="45"><img src="/graphic/unit/unit_spy.png" title="Spion" alt="" /></th><th width="45"><img src="/graphic/unit/unit_light.png" title="Cavalerie usoara" alt="" /></th><th width="45"><img src="/graphic/unit/unit_heavy.png" title="Cavalerie Grea" alt="" /></th><th width="45"><img src="/graphic/unit/unit_ram.png" title="Berbec" alt="" /></th><th width="45"><img src="/graphic/unit/unit_catapult.png" title="Catapulta"> </th><th width="45"><img src="/graphic/unit/unit_snob.png" title="Nobil" alt="" /></th>
</tr><tr>

<?php $_from = $this->_tpl_vars['unitsAll']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['unitsAll']):
?>
<?php if ($this->_tpl_vars['unitsAll'] == 0): ?>
<td class="hidden"><?php echo $this->_tpl_vars['unitsAll']; ?>
</td>
<?php else: ?>
<td><?php echo $this->_tpl_vars['unitsAll']; ?>
</td>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</tr></table>
</td></tr>

<tr>
  <td>Trupe &icirc;n medie pe juc&#259;tor:</td>
  <td>
<table><tr>
<th width="45"><img src="/graphic/unit/unit_spear.png" title="Lancier" alt="" /></th><th width="45"><img src="/graphic/unit/unit_sword.png" title="Luptator cu spada" alt="" /></th><th width="45"><img src="/graphic/unit/unit_axe.png" title="Luptator cu toporul" alt="" /></th><th width="45"><img src="/graphic/unit/unit_spy.png" title="Spion" alt="" /></th><th width="45"><img src="/graphic/unit/unit_light.png" title="Cavalerie usoara" alt="" /></th><th width="45"><img src="/graphic/unit/unit_heavy.png" title="Cavalerie grea" alt="" /></th><th width="45"><img src="/graphic/unit/unit_ram.png" title="Rammbock" alt="" /></th><th width="45"><img src="/graphic/unit/unit_catapult.png" title="Catapulta" alt="" /></th></th><th width="45"><img src="/graphic/unit/unit_snob.png" title="Nobili" alt="" /></th>
</tr><tr>
<?php $_from = $this->_tpl_vars['unitsPlayer']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['unitsPlayer']):
?>
<?php if ($this->_tpl_vars['unitsPlayer'] == 0): ?>
<td class="hidden"><?php echo $this->_tpl_vars['unitsPlayer']; ?>
</td>
<?php else: ?>
<td><?php echo $this->_tpl_vars['unitsPlayer']; ?>
</td>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>

</tr></table>
</td></tr>

<tr>
<td>Trupe &icirc;n medie pe sat :</td>
<td>
<table><tr>
<th width="45"><img src="/graphic/unit/unit_spear.png" title="Lancier" alt="" /></th><th width="45"><img src="/graphic/unit/unit_sword.png" title="Luptator cu spada" alt="" /></th><th width="45"><img src="/graphic/unit/unit_axe.png" title="Luptator cu toporul" alt="" /></th><th width="45"><img src="/graphic/unit/unit_spy.png" title="Spion" alt="" /></th><th width="45"><img src="/graphic/unit/unit_light.png" title="Cavalerie usoara" alt="" /></th><th width="45"><img src="/graphic/unit/unit_heavy.png" title="Cavalerie grea" alt="" /></th><th width="45"><img src="/graphic/unit/unit_ram.png" title="Rammbock" alt="" /></th><th width="45"><img src="/graphic/unit/unit_catapult.png" title="Catapulta" alt="" /></th><th width="45"><img src="/graphic/unit/unit_snob.png" title="Nobili" alt="" /></th>
</tr><tr>
<?php $_from = $this->_tpl_vars['unitsVillage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['unitsVillage']):
?>
<?php if ($this->_tpl_vars['unitsVillage'] == 0): ?>
<td class="hidden"><?php echo $this->_tpl_vars['unitsVillage']; ?>
</td>
<?php else: ?>
<td><?php echo $this->_tpl_vars['unitsVillage']; ?>
</td>
<?php endif; ?>
<?php endforeach; endif; unset($_from); ?>
</tr></table>
</td></tr>

</table>

</td></tr></table>

</td></tr></table>
				</div>
			<div class="container-bottom-full"></div>
		 </div>
		</div><!-- content -->
					<div class="closure">

                                
                			</div>	</body>
</html>