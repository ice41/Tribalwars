<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Hilfe</title>
<link rel="stylesheet" type="text/css" href="stamm.css" />
<script src="script.js?1159978916" type="text/javascript"></script>
</head>

<body >
<table class="main" width="800" align="center"><tr><td>
<h2>Hilfe</h2>

<table width="100%"><tr><td valign="top" width="120">
<table class="vis">
{foreach from=$links item=f_mode key=f_name}
	{if $f_mode==$mode}
		<tr>
			<td class="selected" width="120"><a href="help.php?mode={$f_mode}">{$f_name}</a></td>
		</tr>
	{else}
		<tr>
			<td width="120"><a href="help.php?mode={$f_mode}">{$f_name}</a></td>
		</tr>	
	{/if}
{/foreach}
</table>

</td><td valign="top" align="left">

{if in_array($mode,$allow_mods)}
	{include file="help_$mode.tpl" title=foo}
{/if}

</td></tr></table>
</td></tr></table>
<script type="text/javascript">setImageTitles();</script>
</body>
</html>