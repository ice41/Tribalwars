{if $amountGroups == 0}
<span class="error">{$lang->grab("error", "no_groups")}</span>
{else}
<form method="post" action="groups.php?village={$village}&amp;mode=village&amp;action=update">
<table class="vis">
	<tr>
		<th>{$lang->get('groups_from')} {$info.name|stripslashes|escape:html} ({$info.x}|{$info.y})</th>
	</tr>
  {foreach from=$groups item=g}
	<tr>
		<td><label><input type="checkbox" class="check" name="{$g.id}" value="{$g.id}" {if is_array($array) && in_array($g.id, $array)}checked="checked" {/if}/>{$g.group_name|escape:html}</label></td>
	</tr>
  {/foreach}
</table>
<p><input type="submit" value="{$lang->get('set_group')}" /></p>
</form>
{/if}
