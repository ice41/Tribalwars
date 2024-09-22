<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="stamm.css" />
<script src="script.js?1176997364" type="text/javascript"></script>
</head>

<body >
<table class="main" width="800" align="center"><tr><td>
<h2>SDS Runden</h2>

	{foreach from=$rounds item=arr key=id}
		<h3>#{$id} {$arr.name}</h3>
	
		<table cellspacing="0" cellpadding="0">
		<tr><td>
		
		<table class="vis">
		<tr><td style="width:180px">Start:</td><td style="width:300px"><strong>{$arr.start}</strong></td></tr>
		<tr><td>Ende:</td><td><strong>{$arr.end}</strong></td></tr>
		<tr><td>Beschreibung:</td><td>{$arr.description}</td></tr>
		<tr><td>Geschwindigkeit:</td><td>{$arr.speed}</td></tr>
		<tr><td>Geschwindigkeit Einheiten:</td><td>{$arr.speed_units}</td></tr>
		<tr><td>Moral:</td><td>{$arr.moral}</td></tr>
		<tr><td>Karte:</td><td>{$arr.map}</td></tr>
		</table>
		
		</td><td style="padding-left: 10px" valign="top">
		
		<p><a href="sds_ranking.php?round_id={$id}">&raquo; Rangliste</a></p>
		
		</td></tr></table>
	{/foreach}


</td></tr></table>
<script type="text/javascript">setImageTitles();</script>
</body>
</html>