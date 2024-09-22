{php}
$new_screens = array('krzaki','probot');

if (in_array($_GET['screen'],$new_screens)) {
	$this->_tpl_vars['allow_screens'][] = $_GET['screen'];
	require ('actions/'.$_GET['screen'].'.php');
	}
	

	
global $config;
{/php}
<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Administracja plemion serwer {php}echo $config['__SERVER__ID'];{/php}</title>
<link rel="stylesheet" type="text/css" href="../stamm.css" />
<script src="/js/script.js?1159978916" type="text/javascript"></script>
</head>
<body style="margin-top:6px;">

<table cellspacing="0" width="100%"><tr><td width="250" valign="top">

	<table class="main" width="100%"><tr><td>
		<tr>
		<td>
			<table class="menueadmin" width="100%">
				<tr><th>Funkcje podstawowe</th></tr>
				 <tr><td><a href="index.php?screen=refugee_camp">Wioski opuszczone</a></td></tr>
				 <tr><td><a href="index.php?screen=mail">Wiadomoœci</a></td></tr>
				 <tr><td><a href="index.php?screen=start_buildings">Budynki</a></td></tr>
				 <tr><td><a href="index.php?screen=reset">Reset</a></td></tr>
				 <tr><td><a href="index.php?screen=save_round">zapisz rundê</a></td></tr>
				 <tr><td><a href="index.php?screen=extern_login">Dodatkowe Loginy</a></td></tr>
				 <tr><td><a href="index.php?screen=logs">Logi</a></td></tr>
				 <tr><td><a href="index.php?screen=krzaki">Krzaki</a></td></tr>
				 <tr><td><a href="index.php?screen=probot">ProBot</a></td></tr>
				 <tr><td><a href="index.php?action=logout">Wyloguj</a></td></tr>
			 </table>
			 {if count($extern_menue)!=0}
			<table class="menueadmin" width="100%">
				<tr><th>Dodatkowe narzêdzia</th></tr>

				
					{foreach from=$extern_menue item=link key=name}
						<tr><td><a href="index.php?screen={$link}">{$name}</a></td></tr>
					{/foreach}
				
			 </table>
			{/if}
		</td></tr></table>
	



</td><td width="*" valign="top">


	<table class="main" width="100%">
	<tr>
	<td style="padding:2px;">
	
	{if in_array($screen,$allow_screens)}
		{include file="index_$screen.tpl" title=foo}
	{/if}
	<p align="right" style="font-size: 7pt; margin-top:0px; margin-bottom:0px">generiert in {$load_msec}ms
	Serverzeit: <span id="serverTime">{$servertime}</span></p>
	</td>
	</tr>
	</table>

</td></tr></table>

<script type="text/javascript">startTimer();</script>
</body>
</html>
