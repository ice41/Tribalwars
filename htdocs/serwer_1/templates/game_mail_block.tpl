<h3>Zablokuj nadawcê</h3>
<p>Tudaj mo¿esz zablokowaæ nadawcê.</p>
	
<form action="game.php?village={$village.id}&amp;screen=mail&amp;mode=block&amp;action=block_name&amp;h={$hkey}" method="post">
<table class="vis"><tr>
<td>Gracz:</td>
<td><input name="tribe_name" type="text" /></td>
<td><input type="submit" value="OK" /></td>
</tr></table>
</form>

{if count($blocked)>0}
	<h4>Zablokowani gracze</h4>
	<table class="vis">
	<tr><th width="200">Nazwa</th><th width="100">Odblokuj</th></tr>
		{foreach from=$blocked item=arr key=id}
			<tr>
			<td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$arr.blocked_id}">{$arr.blocked_name}</a></td>
			<td><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=block&amp;action=unblock&amp;from_id={$arr.blocked_id}&amp;h={$hkey}">odblokuj</a></td>
			</tr>
		{/foreach}
	</table>
{/if}