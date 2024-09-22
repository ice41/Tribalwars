<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Was ist Die Stämme</title>
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
<link rel="stylesheet" type="text/css" href="stamm.css" />
<script src="script.js?1159978916" type="text/javascript"></script>
</head>

<body >
<table class="main" width="100%" align="center"><tr><td>
<h2>Die Stämme</h2>

<table>
<tr><td valign="top"><img src="{$graphic}" alt="" /></td><td valign="top">{$text}</td>
</tr>
</table>
<br />

<table width="100%"><tr>
{if $page>="2"}
  <td align="center"><h3><a href="intro.php?page={$page-1}">&laquo; Zurück</a></h3></td>
{/if}
<td align="center"><h2><a href="register.php">&raquo; Jetzt kostenlos anmelden! &raquo;</a></h2></td>
{if $page<="3"}
<td align="center"><h3><a href="intro.php?page={$page+1}">&raquo; Weiter</a></h3></td>
{/if}
</tr></table>

</td></tr></table>
<script type="text/javascript">setImageTitles();</script>
</body>
</html>
