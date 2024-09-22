<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Dost�p go�cinny</title>
<link rel="stylesheet" type="text/css" href="/stamm.css?1222347117" />
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>

<body id="ds_body" >
<table class="main" width="800" align="center"><tr><td>


<table class="vis">
<tr>
<td ><a href="guest.php?screen=ranking">Ranking</a></td>
</tr>
</table><h2>{$guestAllyName}</h2>
<table><tr><td valign="top">

<table class="vis" width="100%">
<tr><th colspan="2">Propriedades</th></tr>
<tr><td width="100">Nome da tribo:</td><td>{$guestAllyName}</td></tr>

<tr><td>abreviação:</td><td>{$guestAllyShort}</td></tr>
<tr><td>Número de membros:</td><td>{$guestAllyMembers}</td></tr>
<tr><td>Número de pontos:</td><td>{$guestAllyPoints}</td></tr>

<tr><td>média de pontos:</td><td>{$guestAllyPointsAverage}</td></tr>
<tr><td>Ranking:</td><td>{$guestAllyRank}</td></tr>

{if $guestAllyHomepage ==! '' }
<tr><td>Local na rede Internet:</td><td><a href="{$guestAllyHomepage}" target="_blank">{$guestAllyHomepage}</a></td></tr>
{/if}

<tr><td colspan="2" align="center"><a href="guest.php?screen=info_member&id={$guestAllyId}">membros</a></td></tr>

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