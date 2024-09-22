<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Elitewars - gra online</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="start.css" />
        <link rel="shortcut icon" href="/graphic/favicon.ico" type="image/x-icon" />
		<meta name="description" content="Elitewars este un joc online, care se petrece in evul mediu. Fiecare jucator este stapanul unui mic sat, pe care il aduce la faima si putere." />
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
<link rel="alternate" type="application/rss+xml" title="Triburile - Informaþii" href="http://triburile.ro/news.php?type=rss2.0" />
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
								{php}
								$lcount = count($this->_tpl_vars["linki"]);
								{/php}
								{foreach from=$linki key=link item=value}
									{php}$i++{/php}
									<a href="{$link}"/>{$value}</a>
									{php} if ($lcount != $i) echo"-";{/php}
								{/foreach}
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
         	 Zmieñ has³o 
        </h2>

        <h3 style="font-weight: bold;">
          Je¿eli chcesz zmieniæ swoje has³o, podaj nazwê u¿ytkownika i adres e-mail, których u¿y³eœ przy meldowaniu siê. <br />
        </h3>
        {if !empty($error)}	{if $green}		<font color="green">{$error}</font><br>	{else}		<font color="red">{$error}</font><br>	{/if}{/if}

        <div style="margin-top: 50px;">

          <form action="lost_pw.php?action=send" method="post">
<table><tr><th>Imiê u¿ytkownika:</th><td><input name="name" type="text" size="20" maxlength="50"></td></tr>
<tr><th>E-Mail:</th><td><input name="email" type="text" size="20" maxlength="150"></td></tr>

<tr><th>Nowe has³o:</th><td><input name="new_pass" type="password" size="20" maxlength="100"></td></tr><tr><td colspan="2"><input type="submit" value="Wyœlij"></td></tr></table>
</form>
<br /> 
        </div>
      </div>
    </div>
    <div class="container-bottom-full"></div>
  </div>
</div>
			<div class="closure">
				&copy; 2013 &middot;
                                
                			</div></div><!-- main -->
</body>
</html>