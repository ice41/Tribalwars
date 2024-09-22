<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Gastzugang</title>
<link rel="stylesheet" type="text/css" href="/stamm.css?1222347117" />
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
</head>

<body id="ds_body" >
<table class="main" width="800" align="center"><tr><td>


<table class="vis">
<tr>
<td ><a href="/guest.php?screen=ranking">Lista de pozitionare</a></td>
</tr>
</table><h2>{$guestAllyName}</h2>
<table><tr><td valign="top">

<table class="vis" width="100%">
<tr><th colspan="2">Proprietati</th></tr>
<tr><td width="100">Porecla:</td><td>{$guestAllyName}</td></tr>

<tr><td>Prescurtare:</td><td>{$guestAllyShort}</td></tr>
<tr><td>Numarul de membri:</td><td>{$guestAllyMembers}</td></tr>
<tr><td>Punctaj total:</td><td>{$guestAllyPoints}</td></tr>

<tr><td>Punctaj mediu::</td><td>{$guestAllyPointsAverage}</td></tr>
<tr><td>Rang:</td><td>{$guestAllyRank}</td></tr>

<tr><td>Homepage:</td><td><a href="{$guestAllyHomepage}" target="_blank">{$guestAllyHomepage}</a></td></tr>


<tr><td colspan="2" align="center"><a href="/guest.php?screen=info_member&id={$guestAllyId}">Membri</a></td></tr>

</table>

</td><td valign="top">

<table class="vis" width="300">
{if $guestAllyImage != ''}
<tr><td align="center"><img src="graphic/ally/{$guestAllyImage}"></td></tr>
{/if}
<tr><th>Descriere</th></tr>
{if $guestAllyDescription != ''}
<tr><td align="center">{$guestAllyDescription}</td></tr>
{/if}
</table>

</td></tr></table></td></tr></table>
</body>
</html>