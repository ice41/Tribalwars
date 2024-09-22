<?php /* Smarty version 2.6.14, created on 2013-12-19 12:39:45
         compiled from team.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Plemiona - gra online</title>
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
		<link rel="stylesheet" type="text/css" href="start.css" />
        <link rel="shortcut icon" href="/graphic/favicon.ico" type="image/x-icon" />
		<meta name="description" content="Triburile este un joc online, care se petrece in evul mediu. Fiecare jucator este stapanul unui mic sat, pe care il aduce la faima si putere." />
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
<link rel="alternate" type="application/rss+xml" title="Triburile - Informaţii" href="http://triburile.ro/news.php?type=rss2.0" />
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
				<span class="paladin"><img src="graphic/index/bg-paladin-new.png" alt="" /></span>			</div><div id="content">
  <div class="container-block-full">
    <div class="container-top-full"></div>
    <div class="container">
      <div class="info-block register">
        <h2 class="register">
         	Equipa 
        </h2>

        <h3 style="font-weight: bold;">
          Perguntas sobre o jogo, entre em contato exclusivamente através do sistema de apoio!<br />
        </h3>
        <a href="support.php">&raquo; Criar uma pergunta para a página de suporte</a>

        <div style="margin-top: 50px;">
          <table class="vis">
          <h2>Responsavel pelo Projecto</h2>
<tr>

    <td width="300">Ice41</td>
	<td width="250">ice@darkgamespt.site88.net</td></tr>

</table>
<br />    
          <table class="vis">
          <h2>Membros da equipe</h2>
<tr>
	<td width="300">Em actualizaçăo</td>
	<td width="250">Em actualizaçăo</td></tr>
</table>
<br /> 
        </div>
      </div>
    </div>
    <div class="container-bottom-full"></div>
  </div>
</div>
			<div class="closure">&copy; 2009 - 2013 <a href="http://darkgamespt.site.vu">DarkGamesPT</a>&nbsp;&nbsp;<a href="http://minecraft.darkgamespt.site88.net">Minecraft</a>&nbsp;&nbsp;<a href="http://apoio.darkgamespt.site88.net">Suporte</a>&middot;</div>	
	</div></div><!-- main -->
</body>
</html>