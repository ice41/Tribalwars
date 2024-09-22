<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-26 21:19:08
         Wersja PHP pliku pliki_tpl/hof.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Tribos</title>
		<link rel="shortcut icon" href="/graphic/favicon.ico" type="image/x-icon" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="/start.css" />
		<meta name="description" content="Die St&auml;mme ist ein Browsergame. Jeder Jogador ist Herrscher eines kleinen Dorfes, dem er zu Ruhm und Macht verhelfen soll." />
		<meta name="keywords" content="Browsergame, Browsergames, Browserspiel, Onlinespiel, Onlinegame, Mittelalter, Ritter, Burg, Burgen, Dorf, Krieg, Kampf, K&auml;mpfen, Ruhm, Ehre, Die St&auml;mme" />
		<link rel="stylesheet" type="text/css" href="/index.css" />
		<!--[if lt IE 7]>
		<link rel="stylesheet" type="text/css" href="/index_ie6.css" media="screen"/>
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
				<h1><a href="/index.php" style="background:url(/graphic/index/bg-logo.jpg) no-repeat 100% 0;"></a></h1>
				<div class="navigation">
					<div class="navigation-holder">
						<div class="navigation-wrapper">
							<div id="navigation_span">
																<?php 
								$lcount = count($this->_tpl_vars["linki"]);
								 ?>
								<?php $_from = $this->_tpl_vars['linki']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['link'] => $this->_tpl_vars['value']):
?>
									<?php $i++ ?>
									<a href="../<?php echo $this->_tpl_vars['link']; ?>
"/><?php echo $this->_tpl_vars['value']; ?>
</a>
									<?php  if ($lcount != $i) echo"-"; ?>
								<?php endforeach; endif; unset($_from); ?>
							</div>
						</div>
				</div>
				</div>
							</div><div class="container-block-full">
			<div class="container-top-full"></div>
				<div class="container">
				<h2 class="hof-banner">Hall da Fama - Mundo <?php echo $this->_tpl_vars['serwerid']; ?>
</h2>
					<table>
						<tr>
							<td valign="top">
								<table class="vis" style="margin:0 18px 0 12px;">
									<?php $_from = $this->_tpl_vars['serwery']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['serwer']):
?>	
									<tr>
										<td  style="width:65px;"><a href="/mundo<?php echo $this->_tpl_vars['serwer']; ?>
/hall_of_fame.php">Mundo <?php echo $this->_tpl_vars['serwer']; ?>
</a>
										</td>
									</tr>
									<?php endforeach; endif; unset($_from); ?>									
								</table>
							</td>
						<td style="width: 650px" valign="top">					
<div class="hof-wrapper">
	
<div>
		

<div class="hof-top3">
			<div class="gold">
				<a  class="hof-large	<?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['user']):
?>						<?php if ($this->_tpl_vars['user']['rang'] == 1): ?>"href="guest.php?screen=info_player&amp;id=<?php echo $this->_tpl_vars['user']['id']; ?>
"><?php echo $this->_tpl_vars['user']['username']; ?>
<?php endif; ?></a><?php endforeach; endif; unset($_from); ?>
			</div>

			<div class="silver">
				<a  class="hof-medium <?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['user']):
?>						<?php if ($this->_tpl_vars['user']['rang'] == 2): ?>"href="guest.php?screen=info_player&amp;id=<?php echo $this->_tpl_vars['user']['id']; ?>
"><?php echo $this->_tpl_vars['user']['username']; ?>
<?php endif; ?></a><?php endforeach; endif; unset($_from); ?>
			</div>

			<div class="bronze">
				<a  class="	hof-medium"					
					<?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['user']):
?>						
					<?php if ($this->_tpl_vars['user']['rang'] == 3): ?>href="guest.php?screen=info_player&amp;id=<?php echo $this->_tpl_vars['user']['id']; ?>
"><?php echo $this->_tpl_vars['user']['username']; ?>
<?php endif; ?><?php endforeach; endif; unset($_from); ?>	
				</a>	
			</div>

</div>


<div class="hof-best-tribe-top">
			<div class="tribe-name">
				<a class="hof-small" <?php $_from = $this->_tpl_vars['ally']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['ally']):
?>	<?php if ($this->_tpl_vars['ally']['rank'] == 1): ?>href="guest.php?screen=info_ally&amp;id=<?php echo $this->_tpl_vars['ally']['id']; ?>
"><?php echo $this->_tpl_vars['ally']['name']; ?>
 (<?php echo $this->_tpl_vars['ally']['short']; ?>
)<?php endif; ?><?php endforeach; endif; unset($_from); ?></a>
			</div>
</div>
<div class="hof-best-tribe-body">
		<?php $_from = $this->_tpl_vars['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['user']):
?>			
		<?php if ($this->_tpl_vars['user']['ally']['rank'] == 1): ?><a href="guest.php?screen=info_player&amp;id=<?php echo $this->_tpl_vars['user']['id']; ?>
"><?php echo $this->_tpl_vars['user']['username']; ?>
</a>,<?php endif; ?><?php endforeach; endif; unset($_from); ?>		

</div>
<div class="hof-best-tribe-bottom">
</div>
</table>
</td>
</tr>
</div>
<div class="container-bottom-full"></div>
</div>
		</div><!-- content -->
					<div class="closure">
				&copy; 2013-2022 &middot;		

                                
                			</div>	</body>
</html>