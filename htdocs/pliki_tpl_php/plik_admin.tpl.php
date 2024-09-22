<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2022-11-28 16:35:52
         Wersja PHP pliku pliki_tpl/admin_page/admin.tpl */ ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Tribos - Painel de Admin</title><link rel="shortcut icon" href="/graphic/favicon.ico" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="stamm.css" />
<script src="script.js?1159978916" type="text/javascript"></script>			<link rel="stylesheet" type="text/css" href="index.css?1232382056" />

		<!--[if lt IE 7]>
		<link rel="stylesheet" type="text/css" href="index_ie6.css" media="screen"/>
		<![endif]-->
									<script type="text/javascript">
		if(top!=self)
			top.location=self.location;
		</script>
				<style type="text/css">
		
			

		
		</style>
		
		</style>


</head>



<?php if ($this->_tpl_vars['loging']): ?> <?php if ($this->_tpl_vars['loging']): ?>				
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Tribos - Painel de Admin</title>
		<link rel="shortcut icon" href="/graphic/favicon.ico" type="image/x-icon" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="description" content="Tribal Wars é um jogo de navegador online. Cada jogador tem uma pequena aldeia para levar ao poder e à glória." />
		<link rel="stylesheet" type="text/css" href="index.css" />
		<script type="text/javascript">
		if(top!=self)
			top.location=self.location;
		</script>
	</head>

	<body>	<div id="gamebar">
			<div id="gamebar_content">
				<div id="flag1_dropdown" style="display: inline;"><ul id="flags">J�zyki panelu:
<li>Atualmente painel de  <a href="admin.php">Administrator</a> não pode ser traduzido!</li></ul>
              

<a href="#" onclick="javascript:toggle_visibility('flags')"> 
<img src="ds_graphic/index/flag_PT.gif" alt="pl" /><img src="ds_graphic/drop.png" alt="" /></a>
			    </div>
					

		  <!--<a href="http://www.plemionawars.pl/index.php">Plemionawars</a> - <a href="support">Support</a> 	-->

				</div>
		</div>
							<div id="index_body">
			<div id="main">
						<div id="header">
				<h1><a href="/admin.php" style="background:url(graphic/index/bg-logo.jpg) no-repeat 100% 0;"></a></h1>
				<div class="navigation">
					<div class="navigation-holder">

						<div class="navigation-wrapper">
							<div id="navigation_span">
								<a href="../index.php">Página Incial</a> -<a href="../rules.php">Regras</a> -<a href="../team.php">Equipa</a> - <a href="../hall_of_fame.php">Hall da Fama</a> 						</div>
						</div>
				</div>
				</div>
				<span class="paladin"><img src="graphic/index/bg-paladin-new.png" alt="" /></span>			</div>
							<div id="content">
					<div class="container-block">
						<div class="container-top"></div>

						<div class="container">
													<div class="info-block">
							<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
		<h4><?php echo $this->_tpl_vars['error']; ?>
</h4>

<?php else: ?>
	<h2>Painel de administração</h2>
								<p>Este painel é usado para administrar o servidor. Acessá-lo requer direitos de administrador em sua conta!</p>

<?php endif; ?>
									
						<br style="clear:both;" />
															</div>
				
				
<div class="login-block">    <h2 style="text-align: left; margin-bottom: 70px;">	Administração - Acesso</h2>
	

							
		<p>	<form method="POST" action="admin.php?action=zaloguj">  <label for="user">
                <strong>Login:</strong>
                <span>
                    <input id="user" name="login" class="text" value="" type="text">

                </span>
            </label>



<label for="password">
                <strong>Senha:</strong>
                <span>
                    <input name="clear" value="true" type="hidden">
                    <input id="password" name="pass" class="text" type="password">
                </span>

            </label>
   <br /><div  style=""><center><input type="submit" value="Logar" class="btn btn-success btn-small" ></center>		</a>
</div>

	 </form>   
</div><?php endif; ?>
				</div>
						<div class="container-bottom">
</div>
					</div>
				</div><!-- content -->
																		
						<div id="footer">
					<div class="footer-header"></div>										<div class="footer-holder">
										
							<div>
								<span class="global-news"></span>
								<strong>10.02.2013</strong>
								<p>Bem-vindo ao painel de administração! Para acessá-lo, digite seu login e senha, se você for o proprietário do servidor e não tiver um administrador agora, poderá adicioná-lo ao banco de dados <b>PHPMYADMIN.</p>
							</div>
							
																						
																						</div>
					



<div class="footer-bottom"></div>

				</div><div id="footer">
					






				</div><!-- footer -->
			

			</div><!-- main -->

			<script type="text/javascript" src="js/mootools.js" ></script>
			<script type="text/javascript" src="js/index.js"></script>	
			<div id="screenshot" style="visibility:hidden" onclick="hide_screenshot();">
				<div id="screenshot_image"></div>
			</div>
		</div>

			<div class="closure">&copy; 2013-2022 &middot; ice41</div>	
	</div>



<?php else: ?>
<?php if ($this->_tpl_vars['screen'] != news): ?>
<script type="text/javascript" src="js/index.js"></script>	<body>
<div id="index_body">
			<div id="main">
			<div id="header">
				<h1><a href="/admin.php" style="background:url(graphic/index/bg-logo.jpg) no-repeat 100% 0;">Plemiona - Gra Online</a></h1>
				<div class="navigation">
					<div class="navigation-holder">
						<div class="navigation-wrapper">
							<div id="navigation_span">
								
<a href="admin.php?screen=ogloszenia">Anuncios</a> - <a href="admin.php?screen=rules">Regras</a> - <a href="admin.php?screen=uzytkownicy">jogadores</a> - <a href="admin.php?screen=create_new_server">Novo Mundo</a> - <a href="admin.php?screen=edit_serwer">Editar mundos</a> - <a href="admin.php?screen=news">Noticias</a> - <a href="admin.php?screen=configs">Definições</a> - <a href="admin.php?action=wyloguj">Sair</a>
																					</div>
						</div>
				</div>
				</div>
							 </div><div id="content">
  <div class="container-block-full">
    <div class="container-top-full"></div>
     <div class="container">
      <div class="info-block register">

<?php if ($this->_tpl_vars['blad']): ?><h2 class="error">A versão do mecanismo que você possui atualmente não é a mais recente! Você pode fazer o download da versão mais recente nesta página: <a href="http://plemiona-silnik.p.ht/najnowsza.php">Najnowsza wersja!</a> </h2><?php endif; ?>
	  <?php if (! empty ( $this->_tpl_vars['error'] )): ?> 					  		<font   color="red"><?php echo $this->_tpl_vars['error']; ?>
</font><br> 		  				<?php else: ?> 					  		<?php if (in_array ( $this->_tpl_vars['screen'] , $this->_tpl_vars['allow_screens'] )): ?> 		  						  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "admin_page/admin_".($this->_tpl_vars['screen']).".tpl", 'smarty_include_vars' => array('title' => 'foo')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?> 					  		 						  <?php endif; ?><?php endif; ?>




       

        
          <table class="vis">
          

</table>
<br /> 
       
      </div>
    </div>
    <div class="container-bottom-full"></div>
  </div>
</div>
			
<!-- content -->
																	
					
							


<div class="closure">
				&copy; 2013 &middot;
 </div>
 <?php else: ?>
 <p><small><a href="admin.php">>>Voltar ao Painel</a></small><p>
 <?php 
require('http://plemiona-silnik.zz.mu/news.php');
 ?>

 <?php endif; ?>
 <?php endif; ?><script type="text/javascript">
		if(top!=self)
			top.location=self.location;
		</script>
 <script type="text/javascript" src="js/mootools.js" ></script>
				
			<div id="screenshot" style="visibility:hidden" onclick="hide_screenshot();">
                              
                			</div>
</body>
</html>

	








