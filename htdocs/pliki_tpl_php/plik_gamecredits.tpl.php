<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2024-09-23 01:08:57
         Wersja PHP pliku pliki_tpl/team.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
	<head>
		<title>Tribos - jogo online</title>

		<meta id="og_title" property="og:title" content="Plemiona"/>
		<meta id="og_type" property="og:type" content="game"/>
		<meta id="og_url" property="og:url" content="http://www.plemiona.pl/team.php"/>
		<meta id="og_image" property="og:image" content="http://www.die-staemme.de/graphic/reports/support_arrives.jpg"/>
		<meta id="og_site_name" property="og:site_name" content="Plemiona"/>
		<meta id="fb_app_id" property="fb:app_id" content="110344252415324"/>

					<meta id="og_description" property="og:description" content="Tribos - Jogo online"/>
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="description" content="Plemiona to przegl٤arkowa gra online. Kaߤy gracz posiada maӹ wioskꬠkt󲹠ma doprowadzi栤o wӡdzy i chwaӹ." />
		<meta name="keywords" content="Gra online, Gry online, Gra przegl٤arkowa, gry przegl٤arkowe, gry, wiki, gry pl, statystyki, Multiplayer, darmowa, darmowy, darmowe, strategia, ܲedniowiecze, forum" />
		<link rel="stylesheet" type="text/css" href="index.css?1378724175" />

		<script type="text/javascript" src="/js/index.js?1378724175"></script>

						<link rel="alternate" type="application/rss+xml" title="Tribos - Nots" href="http://www.plemiona.pl/news.php?type=rss2.0" />
		<script type="text/javascript">
		//<![CDATA[
			var mobile = false;
		//]]>
		</script>
	</head>

	<body>
	

		<div id="index_body">
			<div id="main">
						<div id="header">
				<h1>
					<a href="/index.php" style="background:url(graphic/index/bg-logo.jpg) no-repeat 100% 0;">
						<p style="position: absolute; top: -300px">Tribos - Jogo online</p>
					</a>
				</h1>
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
				<span class="paladin"><img src="graphic/index/bg-paladin-new.png" alt="" /></span>			</div>
			<div id="content">
  <div class="container-block-full">
    <div class="container-top-full"></div>
    <div class="container">
      <div class="info-block register">
        <h2 class="register">
         Equipa
        </h2>

        <h3 style="font-weight: bold;">
          Dúvidas sobre o jogo devem ser direcionadas apenas através sistema de Suporte!<br />
        </h3>
       

        <div style="margin-top: 50px;">
	  <a href="/gamecredits.php">&raquo; Os criadores do jogo</a><br/><br/>
          <h2>Gerenciamento de Projetos</h2>
          <table class="vis">
<?php $_from = $this->_tpl_vars['team']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['tm']):
?>
	
	<td width="300"><?php echo $this->_tpl_vars['tm']['gracz']; ?>
</td>
	<td width="250"><?php echo $this->_tpl_vars['tm']['opis']; ?>
</td></tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<br />        </div>
      </div>
    </div>
    <div class="container-bottom-full"></div>
  </div>
</div>
			<div class="closure">
				&copy; 2003 - 2022
				

                
                			</div>
</div><!-- main -->
</body>
</html>






