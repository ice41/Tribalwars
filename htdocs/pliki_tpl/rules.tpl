<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">
	<head>
		<title>Plemiona - gra online</title>



					<meta id="og_description" property="og:description" content="Plemiona - gra online"/>
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="description" content="Plemiona to przegl¹darkowa gra online. Ka¿dy gracz posiada ma³¹ wioskê, któr¹ ma doprowadziæ do w³adzy i chwa³y." />
		<meta name="keywords" content="Gra online, Gry online, Gra przegl¹darkowa, gry przegl¹darkowe, gry, wiki, gry pl, statystyki, Multiplayer, darmowa, darmowy, darmowe, strategia, œredniowiecze, forum" />
		<link rel="stylesheet" type="text/css" href="/index.css?1380715368" />

		<script type="text/javascript" src="/js/index.js?1380715368"></script>

						<link rel="alternate" type="application/rss+xml" title="Plemiona - Nowoœci" href="http://www.plemiona.pl/news.php?type=rss2.0" />
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
						<p style="position: absolute; top: -300px">Plemiona - gra online</p>
					</a>
				</h1>
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
					<div class="container-block-full">
		  			<div class="container-top-full"></div>
		  			<div class="container">
				<div id="content" style="margin-left:160px; width: 600px;">
					<h2>Zasady</h2>
					<script type="text/javascript">
//<![CDATA[
	
	/**
	 * @jQuery
	 */
	function toggleRule(rule_number) {ldelim}
		$('#more_'+rule_number).slideToggle();
		$('#link_'+rule_number).slideToggle();

		return false;
	}
	
//]]>
</script>


{foreach from=$zasady item=z key=id}
{php}
$id = $typ = $this->_tpl_vars['z']['id'];
$typ = $typ = $this->_tpl_vars['z']['typ'];
{/php}
<p><h4>§{$z.typ}) {$z.nazwa}{if $admin} <a href="rules.php?akcja=usun_kt&id={php}echo $id;{/php}&typ={php}echo $typ;{/php}">Usuñ kategoriê i zasady</a>{/if}</h4>

{php}

	$query['big_arr'] = mysql_query("SELECT * FROM `lista_zasad`");
	while ($tm_info = mysql_fetch_array($query['big_arr'])) {

		$za[$tm_info['id']]['id'] = urldecode($tm_info['id']);
		$za[$tm_info['id']]['kategoria'] = urldecode($tm_info['kategoria']);
        $za[$tm_info['id']]['nazwa'] = urldecode($tm_info['nazwa']);
        $za[$tm_info['id']]['text'] = urldecode($tm_info['text']);		
}
$_from = $za; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $id => $za):
$ka = $za['kategoria'];
$typ = $this->_tpl_vars['z']['typ'];
	if ($ka == $typ) {

$za_kategoria = $za['kategoria'];
$za_txt = $za['text'];
$za_id = $za['id'];
	{/php}
	
<p>{php}echo $za_kategoria;{/php}.{php} echo $za_txt; {/php} {if $admin} <a href="rules.php?akcja=usun&id={php}echo $za_id;{/php}">Usuñ</a>{/if}	
		
		
		
		
		
		{php}}
		endforeach; endif; unset($_from);{/php}
		



{/foreach}



</p>
				</div>
			</div>
		  			<div class="container-bottom-full"></div>
		  		 </div>
					<div class="closure">
				&copy; 2003 - 2013
	

                
                			</div>
	</body>
</html>




							
