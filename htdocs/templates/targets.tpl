<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Triburile - Lumea 1</title>
    <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">
    <link rel="stylesheet" type="text/css" href="stamm.css" />
    <script src="script.js?1159978916" type="text/javascript"></script>
    <script src="menu.js?1148466057" type="text/javascript"></script>
  </head>
  <body>
    <table class="navi-border" width="100%" style="margin:auto; margin-top: 5px; border-collapse: collapse;">
      <tr>
		    <td>
          <table class="main" width="100%" align="center">
  				  <tr>
      				<td>
<table class="vis" width="100%">
<tr><th><div align="right">
<a href="javascript:window.close();">&#206;nchide</a>
</div></th></tr></table>
<h3>Satul</h3>
<table class="vis">
<tbody>
<tr>
<td class="selected">
<a href="javascript:popup_scroll('targets.php?village={$village}', 520, 520);" target="_self">Selecteaza satul</a>
</td>
</tr>
</tbody>
{foreach from=$villages item=village}
<tr>
<td>
<a href="javascript:selectTarget({$village.x}, {$village.y});">{$village.name}</a></td>
<td><img src="graphic/holz.png">{$village.r_wood}&nbsp;<img src="graphic/lehm.png">{$village.r_stone}&nbsp;<img src="graphic/eisen.png">{$village.r_iron}</td>
<td><img src="graphic/face.png">{$village.r_bh}</td>
<td><a href="javascript:selectTarget({$village.x}, {$village.y});">{$village.x}|{$village.y}</a></td>
</tr>
{/foreach}
</table>
{$userid}
</body>
</html>