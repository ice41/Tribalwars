<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Tr1burile/title>
<link rel="stylesheet" type="text/css" href="stamm.css" />
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
</head>
<body id="ds_body" >
<table class="main" width="800" align="center"><tr><td>

<table class="vis">
<tr>
<td class="selected"><a href="/guest.php?screen=ranking">Lista de pozitionare</a></td>
</tr>
</table>

<h2>Lista de pozitionare</h2>

<table><tr><td valign="top">

<table class="vis">
<tr>
  <td class="selected" width="100"><a href="/guest.php?screen=ranking&amp;mode=ally">Triburi</a></td>
</tr>
<tr>
  <td width="100"><a href="/guest.php?screen=ranking&amp;mode=player">Jucatori</a></td>
</tr>
</table>

</td><td valign="top"><table class="vis">
<tr><th width="60">Rang</th><th width="70">Porecla</th>

<th width="60">Puncte Totale</th><th>Membri</th><th>Punctaj Mediu<br />Player</th><th>Sate</th><th>Punctaj Mediu<br />Sat</th></tr>
{foreach from=$allydatas item=allydata}
<tr>
  <td>{$allydata.rank}</td>
  <td><a href="guest.php?screen=info_ally&id={$allydata.id}">{$allydata.short}</a></td>
  <td>{$allydata.points}</td>
  <td>{$allydata.members}</td>
  <td>{$allydata.average_player}</td>
  <td>{$allydata.villages}</td>
  <td>{$allydata.average_village}</td>
</tr>
{/foreach}
</table><table class="vis" width="100%"><tr>

</tr></table></td></tr></table></td></tr></table>
</body>
</html>