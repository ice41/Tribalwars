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
				<h1><a href="/index.php" style="background:url(/graphic/index/bg-logo.jpg) no-repeat 100% 0;">Tribos</a></h1>
				<div class="navigation">
					<div class="navigation-holder">
						<div class="navigation-wrapper">
							<div id="navigation_span">
																{php}
								$lcount = count($this->_tpl_vars["linki"]);
								{/php}
								{foreach from=$linki key=link item=value}
									{php}$i++{/php}
									<a href="../{$link}"/>{$value}</a>
									{php} if ($lcount != $i) echo"-";{/php}
								{/foreach}
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
	{foreach from=$serwery item=serwer}									<tr><td  style="width:65px;"><a href="/mundo{$serwer}/hall_of_fame.php">Mundo {$serwer}</a></td></tr>
				{/foreach}					
												
														</table>
							</td>
		<td style="width: 650px" valign="top">					
	<div class="hof-wrapper">
<div>
	<h2 class="hof-banner">Hall da Fama - Mundo {$serwerid}</h2>	

	<div class="hof-top3">
				<div class="gold">
				<a  class="hof-large	{foreach from=$users item=user key=id}						{if $user.rang == 1}"href="guest.php?screen=info_player&amp;id={$user.id}">{$user.username}{/if}</a>{/foreach}
			</div>

				<div class="silver">
				<a  class="hof-medium {foreach from=$users item=user key=id}						{if $user.rang == 2}"href="guest.php?screen=info_player&amp;id={$user.id}">{$user.username}{/if}</a>{/foreach}
			</div>

				<div class="bronze">
				<a  class="	hof-medium"					
	{foreach from=$users item=user key=id}						{if $user.rang == 3 }href="guest.php?screen=info_player&amp;id={$user.id}">{$user.username}{/if}{/foreach}	</a>	</div>

			</div>


			<div class="hof-best-tribe-top">
			<div class="tribe-name"><a class="
									hof-small"
		{foreach from=$ally item=ally key=id}							{if $ally.rank == 1 }href="guest.php?screen=info_ally&amp;id={$ally.id}">{$ally.name} ({$ally.short}){/if}{/foreach}</a>
			</div>
		</div>
		<div class="hof-best-tribe-body">
		{foreach from=$users item=user key=id}			{if $user.ally.rank == 1}<a href="guest.php?screen=info_player&amp;id={$user.id}">{$user.username}</a>,{/if}{/foreach}		

									</div>
		<div class="hof-best-tribe-bottom">
		</div></table>
</td></tr>
				</div>
			<div class="container-bottom-full"></div>
		 </div>
		</div><!-- content -->
					<div class="closure">
				&copy; 2013 &middot;		

                                
                			</div>	</body>
</html>