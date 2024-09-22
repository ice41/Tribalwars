<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Tr1burile</title>
<link rel="stylesheet" type="text/css" href="/stamm.css?1222347117" />
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
</head>

<body id="ds_body" >
<table class="main" width="800" align="center"><tr><td>
<table class="vis">
<tr>
<td ><a href="/guest.php?screen=ranking">Lista de pozitionare</a></td>
</tr>
</table><h2>Sat {$guestVillage}</h2>
<table class="vis">
<tr><th colspan="2">{$guestVillage}</th></tr>
<tr><td width="80">Coordonate:</td><td>{$guestVillageX}|{$guestVillageY}</td></tr>
<tr><td>Puncte:</td><td width="180">{$guestVillagePoints}</td></tr>

<tr><td>Player:</td><td><a href="/guest.php?screen=info_player&id={$guestVillageOwnerId}">{$guestVillageOwner}</a></td></tr>
<tr><td>Trib:</td><td><a href="guest.php?screen=info_ally&id={$guestVillageOwnerAllyId}">{$guestVillageOwnerAlly}</a></td></tr>
</table></td></tr></table>
</body>
</html>