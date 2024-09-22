<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Administrare Speed-triburile</title>
<link rel="stylesheet" type="text/css" href="../stamm.css" />
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<script src="../script.js?1159978916" type="text/javascript"></script>
</head>
<body style="margin-top:6px;">

<table cellspacing="0" width="100%"><tr><td width="250" valign="top">

	<table class="main" width="100%"><tr><td>
		<tr>
		<td>
			<table class="menueadmin" width="100%">
				<tr>
				  <th>General</th>
				</tr>
				<tr>
				  <td><a href="index.php?screen=startpage">Anunturi prima pagina</a></td>
				</tr>
				 <tr>
				   <td><a href="index.php?screen=refugee_camp">Baga sate parasite normale</a></td>
				 </tr>
                 <tr>
				  <td><a href="index.php?screen=fluela_special">Baga sate parasite cum vrei</a></td>
			  </tr>
				 <tr>
				   <td><a href="index.php?screen=mail">Trimite mesaje la toti jucatori</a></td>
				 </tr>
				 <tr><td><a href="index.php?screen=start_buildings">Nivelul cladirilor la start</a></td></tr>
				 <tr><td><a href="index.php?screen=reset">Resetati jocul</a></td></tr>
				 <tr>
				   <td><a href="index.php?screen=debugger">Reparare</a></td>
				 </tr>
				 <tr>
				   <td><a href="index.php?action=logout">Logout admin</a></td>
				 </tr>
		    </table>
{if count($extern_menue)!=0}
			<table class="menueadmin" width="100%">
				<tr><th>Extern Tools</th></tr>

				
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
<p align="right" style="font-size: 7pt; margin-top:0px; margin-bottom:0px">generat&#259; &#238;n: {$load_msec} ms <b>|</b> 
Ora Server: <span id="serverTime">{$servertime}</span> {php} echo date("d/m/Y") {/php}</p>
	</td>
	</tr>
	</table>

</td></tr></table>

<script type="text/javascript">startTimer();</script>
</body>
</html>
