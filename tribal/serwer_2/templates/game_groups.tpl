<?xml version="1.0"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>{$lang->get("village_groups")}</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="{$css}" />
<script type="text/javascript" src="script.js"></script>
</head>
<body id="ds_body">
<table class="navi-border" width="100%" style="margin:auto; margin-top: 25px; border-collapse: collapse;"><tr><td><table class="main" width="100%" align="center"><tr><td>
<h3>{$lang->get("village_groups")}</h3>
{if $mode == ''}
<form method="post" action="groups.php?village={$village}&amp;action=create">
<table class="vis">
<tr><th>{$lang->get("found_group")}:</th><td><input type="text" name="group_name" /> <input type="submit" value="{$lang->get('found')}" /></td></tr>
</table>
</form>

{if $amountGroups != 0}
<table>
<tr><td valign="top">

<table class="vis"><tbody>
{foreach from=$groups item=g}
	<tr>
		<td {if $g.id == $group_id}class="selected"{/if}><a href="groups.php?village={$village}&amp;group_id={$g.id}">{$g.group_name|escape:html}</a></td>
	</tr>
{/foreach}
</tbody></table>
</td>
<td valign="top">
<form method="post" action="groups.php?village={$village}&amp;action=edit&amp;group_id={$group.id}">
<table class="vis"><tbody>
<tr><th>{$lang->get("change")}:</th><td><input value="{$group.group_name|escape:html}" name="group_rename" /></td><td rowspan="2"><input type="submit" value="OK" /></td></tr>
<tr><td colspan="2"><label><input type="checkbox" name="delete" /> {$lang->get("delete_group")}</label></td></tr>
</tbody></table>
</form>
</td>
</tr>
</table>
{/if}
{else}
{include file='../templates/game_groups_village.tpl'}
{/if}
</td></tr></table></td></tr></table>
</body>
</html>
