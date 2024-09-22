<?php /* Smarty version 2.6.14, created on 2013-12-19 14:38:20
         compiled from world.tpl */ ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Tribos NPED</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="start.css" />
        <link rel="shortcut icon" href="/graphic/favicon.ico" type="image/x-icon" />
		<meta name="description" content="Tribal Wars é um jogo online de navegador, com a ação definida na Idade Média. O jogador controla uma pequena aldeia, o que levou ao poder e glória." />
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


		<body>
<body>
	
		<div id="index_body">
			<div id="main">
			<div id="header">
				<h1><a href="/index.php" style="background:url(graphic/index/bg-logo.jpg) no-repeat 100% 0;">Tribal Wars - O jogo de browser</a></h1>
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
									<a href="<?php echo $this->_tpl_vars['link']; ?>
"/><?php echo $this->_tpl_vars['value']; ?>
</a>
									<?php  if ($lcount != $i) echo"-"; ?>
								<?php endforeach; endif; unset($_from); ?>
							</div>
						</div>
				</div>
				</div>
				<span class="paladin"><img src="graphic/index/bg-paladin-new.png" alt="" /></span>			</div>		<div id="content">
			<div id="screenshot" style="visibility:hidden" onclick="hide_screenshot();">
				<div id="screenshot_image"></div>
			</div>
		<div class="container-block-full">
			<div class="container-top-full"></div>
				<div class="container">
					<div class="info-block register">
						<h2 class="register">Em que mundo você quer entrar após o registo?</h2>
												<p><a href="register.php?mode=new_account&amp;server=pl<?php echo $this->_tpl_vars['serwer']; ?>
" style="font-size: 18px;"> &raquo; Mundo <?php echo $this->_tpl_vars['serwer']; ?>
 (recomendado)</a></p>
						<br />
												<table>
							<tr>
								<th>Mundo</th>
								<th>Começo</th>
								<th>Número de jogadores</th>
								<th>Descrição</th>
							</tr>
							<?php $_from = $this->_tpl_vars['serwery']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['serwer']):
?>
							<tr class="lit">
								<td width="100" align="center">
									<a href="register.php?mode=new_account&amp;server=pl<?php echo $this->_tpl_vars['serwer']; ?>
"><span class="world_button_active">Mundo <?php echo $this->_tpl_vars['serwer']; ?>
</span></a>
								</td>
								<td>
									19.12.2013								</td>
								<td>
									ilimitado								</td>
								<td width="300">
									Mundo 1: Velocidade 1000, velocidade de unidades 10, 1 hora de proteção , acampamento militar, o grupo, os membros da tribo ilimitadas
								</td>
							</tr>
                             <?php endforeach; endif; unset($_from); ?>                                                                                   <tr class="row_a">
								
														
			
													</table>
					</div>
				</div>
				<div class="container-bottom-full"></div>
			 </div>
			</div><!-- content -->
						<div class="closure">
				&copy; 2009 - 2014 <a href="http://nped.tk">NPED</a>&nbsp;&nbsp;<a href="http://nped.tk/minecraft/">Minecraft</a>&nbsp;&nbsp;<a href="http://nped.tk/apoio/">Suporte</a>&middot;				
                                
                			</div>		</div><!-- main -->