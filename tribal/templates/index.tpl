<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Tribos DarkGamesPT</title>
		<link rel="shortcut icon" href="/graphic/favicon.ico" type="image/x-icon" />
		<meta http-equiv="Content-Type" content="text/html; charset=windows-1250" />
		<meta name="description" content="Tribos browsergame é uma revisăo do jogo online. Cada jogador tem uma aldeia ą ł que levou ao poder e glória este anúncio" />
		<link rel="stylesheet" type="text/css" href="index.css" />
		<script type="text/javascript">
		if(top!=self)
			top.location=self.location;
		</script>
	</head>

	<body>

	<table id="main_layout" cellspacing="0" align="center">
			<div id="gamebar_content">
				<div id="flag1_dropdown" style="display: inline;"><ul id="flags"></ul>
              <a href="#" onclick="javascript:toggle_visibility('flags')"> <img src="http://cdn.portal-bar.innogames.de/images/staemme-logo.png" alt="pl" /></a>
			    </div>
			  <a href="http://darkgamespt.site.vu">DarkGamesPT</a>
			- <a href=""></a>
			- <a href="#">Forum</a></p>
			</div>
	</table>
	<!--<div id="gamebar">
			<div id="gamebar_content">
				<div id="flag1_dropdown" style="display: inline;"><ul id="flags"></ul>
              <a href="#" onclick="javascript:toggle_visibility('flags')"> <img src="http://cdn.portal-bar.innogames.de/images/staemme-logo.png" alt="pl" /></a>
			    </div>
			  <a href="http://darkgamespt.site.vu">DarkGamesPT</a>
			- <a href=""></a>
			- <a href="#">Forum</a>
			</div>
		</div>-->
		<div id="index_body">
			<div id="main">
						<div id="header">
				<h1><a href="/index.php" style="background:url(graphic/index/bg-logo.jpg) no-repeat 100% 0;">Tribos DarkGamesPT</a></h1>
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
				<span class="paladin"><img src="graphic/index/bg-paladin-new.png" alt="" /></span>			</div>
							<div id="content">
					<div class="container-block">
						<div class="container-top"></div>

						<div class="container">
													<div class="info-block">
								<h2>DarkGamesPT</h2>
								<p>Tribos é um jogo de browser passado Idade Média. Cada jogador é senhor de uma pequena aldeia, a qual ele deve ajudar a ganhar poder e glória.</p>

									<a class="btn-kostenlos-anmelden" href="register.php">Registo Grátis!</a>
									<strong>Imagens do jogo:</strong>

									<ul class="screenshots">
										<li><a href="#" onclick="javascript:toggle_screenshot(1)"><img src="graphic/index/tribalwars-map.png?1" alt="Gra przeglądarkowa Plemiona: Mapa świata" /></a></li>
										<li><a href="#" onclick="javascript:toggle_screenshot(2)"><img src="graphic/index/tribalwars-rally-point.png?1" alt="Gra przeglądarkowa Plemiona: Plac" /></a></li>
										<li class="last"><a href="#" onclick="javascript:toggle_screenshot(3)"><img src="graphic/index/tribalwars-paladin.png?1" alt="Gra przeglądarkowa Plemiona: Rycerz" /></a></li>
									</ul>
								<br style="clear:both;" />
								<strong style="padding-top:10px;">Existem {$players} contas registadas!</strong> 
							</div>
				
{if $can_log and !$speedlogin}					
<div class="login-block">
    <h2 style="text-align: left; margin-bottom: 15px;">DarkGamesPT- Login</h2>
	{if !empty($error)}
		<h4 class="error">{$error}</h4>
	{/if}
        <div id="world_selection" class="ar_login" style="display: none;">
            <a href="#" onclick="$('#world_selection').hide();return false;" class="login_close">
                <img src="graphic/login_close.png" alt="Zamknąć" style="border: medium none ;">
            </a>
            <div class="servers-list-top"></div>
            <div id="servers-list-block"></div>

            <div class="servers-list-bottom"></div>
        </div>

    <form name="plemiona_login" action="index.php?action=login" method="post">
        <div>
            <label for="user">
                <strong>Nome de utilizador:</strong>
                <span>
                    <input id="user" name="user" class="text" value="{$l_val}" type="text">

                </span>
            </label>
            <label for="password">
                <strong>Palavra-chave:</strong>
                <span>
                    <input name="clear" value="true" type="hidden">
                    <input id="password" name="password" class="text" type="password">
                </span>

            </label>
            
            <div style="display: none;" id="non_script_login">
				<input id="login_button" style="margin-bottom: 10px; width: 126px; float: right;" value="Login" type="submit">
			</div>

			<div id="js_login_button" style="">
				<a onclick="document.forms['plemiona_login'].submit();" class="login_button">
					<span class="button_left"></span>
					<span class="button_middle">Login</span>
					<span class="button_right"></span>
				</a>
			</div>				

            <br style="clear: both;">
            <label for="cookie" style="text-align: right;">

                <input id="cookie" name="cookie" value="1" type="checkbox">
					Lembrar os dados
            </label>
            <p><a href="lost_pw.php">Recuperaçăo de palavra-chave</a></p>
                    </div>
    </form>
</div>


{/if}

{if !$can_log}
{if $wybierz_swiat}
{literal}
<script type="text/javascript">
function insertUnit(input, count) {
	if(input.value != count)
		input.value=count;
	else
		input.value='';
}
</script>
{/literal}
<div class="login-block">
	<div id="world_selection" class="ar_login">
        <a href="index.php" class="login_close">
            <img src="graphic/index/login_close.png" alt="Zamknąć" style="border:none" />
        </a>
		
        <div class="servers-list-top"></div>

        <div id="servers-list-block">
			<form name="wys" action="index.php?action=zaloguj" method="post">
				<input name="user" type="hidden" value="{$user_info.id}" />
				<input name="password" type="hidden" value="{$user_info.haslo}" />
				<input name="serwer" type="hidden" value="0" />
				{if $speedlogin}
					<input name="speedlogin" type="hidden" value="1" />
				{/if}
				<div id="active_server" style="overflow: visible; margin-bottom: 5px; margin-left: 5px;">
					<p style="margin: 5px 5px 10px 0px; font-weight: bold;">Em que mundo<br> quer entrar?</p>
				</div>
				<div id="inactive_server_list" style="overflow: visible; margin-bottom: 1px; margin-top: 10px; clear: both; margin-left: 5px;">
					{foreach from=$serwery item=serwer}
        			<a onclick="insertUnit(document.forms['wys'].serwer,{$serwer});document.forms['wys'].submit();">
						<span class="world_button_{if !in_array($serwer,$user_info.serwery_gry)}in{/if}active">
							Mundo {$serwer}
						</span>
					</a>
					{/foreach}
				</div>
			</form>
		</div>
	<div class="servers-list-bottom"></div>
	</div>
</div>	
{/if}
{if !$wybierz_swiat}
<div class="login-block logged_in">
    <h2 style="text-align:left;">Bem-vindo {$user_info.nazwa}!</h2>
    <div class="ar_login">
        <p>Clique no botăo de login para, escolher um mundo!</p>
		<div style="padding-left: 20%; margin-top: 10px; margin-bottom: 10px;">
		<form name="ws" action="index.php?action=wybierz_swiat" method="post">
			<input name="userid" type="hidden" value="{$user_info.id}" />
			<input name="password" type="hidden" value="{$user_info.haslo}" />
		</form>
		<a onclick="document.forms['ws'].submit();">
			<span class="button_left"></span>
			<span class="button_middle">Login</span>

			<span class="button_right"></span>
		</a>
		</div>

      
        <p>Nie jesteś <strong>{$user_info.nazwa}</strong>? <a href="index.php?action=wyloguj">(sair)</a></p>
		<p><a href="lost_pw.php">Recuperaçăo de palavra-chave</a></p>
		    </div>

</div>
{/if}
{/if}
						</div>
						<div class="container-bottom"></div>
					</div>
				</div><!-- content -->
																		
							<div id="footer">
					<div class="footer-header"></div>
					<div class="footer-holder">
					{if count($ogloszenia) > 0}
						{foreach from=$ogloszenia item=ogloszenie key=id}
							<div>
								<span class="global-news">&nbsp;</span>
								<strong>{$ogloszenie.data}</strong>
								<p>{$ogloszenie.text}</p>
							</div>
							
							{if count($ogloszenia) != $ogloszenie.counter}
								<div class="news-separator"></div>
							{/if}
						{/foreach}
					{/if}
																						</div>
					<div class="footer-bottom"></div>

				</div><!-- footer -->
			

			</div><!-- main -->

			<script type="text/javascript" src="js/mootools.js" ></script>
			<script type="text/javascript" src="js/index.js"></script>	
			<div id="screenshot" style="visibility:hidden" onclick="hide_screenshot();">
				<div id="screenshot_image"></div>
			</div>
		</div>

			<div class="closure">&copy; 2009 - 2013 <a href="http://darkgamespt.site.vu">DarkGamesPT</a>&nbsp;&nbsp;<a href="http://minecraft.darkgamespt.site88.net">Minecraft</a>&nbsp;&nbsp;<a href="http://apoio.darkgamespt.site88.net">Suporte</a>&middot;</div>	
	</div>	

	</body>
</html>