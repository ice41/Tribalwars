{php} header ("LOCATION: ../index.php"); {/php}



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Tribos</title>
		<link rel="shortcut icon" href="/graphic/favicon.ico" type="image/x-icon" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<link rel="stylesheet" type="text/css" href="start.css" />
		<meta name="description" content="Tribos é um jogo de navegador. Cada jogador é o governante de uma pequena aldeia que deve ajudar a ganhar fama e poder." />
		<meta name="keywords" content="Browsergame, Browsergames, Browserspiel, Onlinespiel, Onlinegame, Mittelalter, Ritter, Burg, Burgen, Dorf, Krieg, Kampf, K&auml;mpfen, Ruhm, Ehre, Die St&auml;mme" />
		<link rel="stylesheet" type="text/css" href="/index.css?1232382056" />
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
							<td valign="top">
								<h2>Estatísticas mundiais {$serwerid}</h2>
								<h3><a href="guest.php" target="_top">&raquo; Acesso de convidado</a> <a href="stat.php?mode=settings" target="_top">&raquo; Definições do Mundo</a></h3><br />

								<table class="vis" width="98%">
									<tr><th>O número de jogadores:</th><th>{$players}</th></tr>
									<tr><td>Número de aldeias:</td><td>{$villages} ({$vpp} por jogador)</td></tr>
								</table>
								<br />

								<table class="vis" width="98%">
									<tr><th style="width:150px">Os seguintes dados foram calculados</th>
									<th>Hoje às {$time}</th></tr>
									<tr><td>Número de mensagens enviadas:</td><td>{$mail} ({$mpp} por jogador)</td></tr>

									<tr><td>Número de pontos (geral):</td><td>{$points} ({$ppp} por jogador, {$ppv} no mundo)</td></tr>

									<tr><td>Quantidade de recursos (geral):</td><td><img src="/ds_graphic/holz.png" title="Madeira" alt="" />{$wood} <img src="/ds_graphic/lehm.png" title="Argila" alt="" />{$stone} <img src="/ds_graphic/eisen.png" title="Ferro" alt="" />{$iron} </td></tr>
									<tr><td>População (geral):</td><td><span class="icon header population"> </span> {$bh}</td></tr>

									<tr>
										<tr><td>Unidades (geral):</td>
<td>
<table><tr>
<th width="45"><img src="/ds_graphic/unit/unit_spear.png" title="Lanceiro" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_sword.png" title="Espadachim" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_axe.png" title="Viking" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_spy.png" title="Batedor" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_light.png" title="Cavalaria Leve" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_heavy.png" title="Cavalaria Pesada" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_ram.png" title="Ariete" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_catapult.png" title="Catapulta"> </th><th width="45"><img src="/ds_graphic/unit/unit_snob.png" title="Nobre" alt="" /></th>
</tr><tr>

{foreach from=$unitsAll item=unitsAll}
{if $unitsAll == 0}
<td class="hidden">{$unitsAll}</td>
{else}
<td>{$unitsAll}</td>
{/if}
{/foreach}
</tr></table>
</td></tr>

<tr>
  <td>Média de unidades por jogador:</td>
  <td>
<table><tr>
<th width="45"><img src="/ds_graphic/unit/unit_spear.png" title="Lanceiro" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_sword.png" title="Espadachim" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_axe.png" title="Viking" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_spy.png" title="Batedor" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_light.png" title="Cavalaria Leve" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_heavy.png" title="Cavalaria Pesada" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_ram.png" title="Ariete" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_catapult.png" title="Catapulta"> </th><th width="45"><img src="/ds_graphic/unit/unit_snob.png" title="Nobre" alt="" /></th>
</tr><tr>
{foreach from=$unitsPlayer item=unitsPlayer}
{if $unitsPlayer == 0}
<td class="hidden">{$unitsPlayer}</td>
{else}
<td>{$unitsPlayer}</td>
{/if}
{/foreach}

</tr></table>
</td></tr>

<tr>
<td>Média de unidades por aldeia:</td>
<td>
<table><tr>
<th width="45"><img src="/ds_graphic/unit/unit_spear.png" title="Lanceiro" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_sword.png" title="Espadachim" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_axe.png" title="Viking" alt="" /></th><th width="45"><img src="" title="Monge" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_spy.png" title="Batedor" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_light.png" title="Cavalaria Leve" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_heavy.png" title="Cavalaria Pesada" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_ram.png" title="Ariete" alt="" /></th><th width="45"><img src="/ds_graphic/unit/unit_catapult.png" title="Catapulta"> </th><th width="45"><img src="/ds_graphic/unit/unit_snob.png" title="Nobre" alt="" /></th>
</tr><tr>
{foreach from=$unitsVillage item=unitsVillage}
{if $unitsVillage == 0}
<td class="hidden">{$unitsVillage}</td>
{else}
<td>{$unitsVillage}</td>
{/if}
{/foreach}
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
				&copy; 2012 &middot;		

                                
                			</div>	</body>
</html>