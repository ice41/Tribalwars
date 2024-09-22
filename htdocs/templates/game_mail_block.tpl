<h3>Blocheaz&#259; expeditorul</h3>
<p>Aici po&#355;i scrie juc&#259;torii, ale c&#259;ror mesaje c&#259;tre tine sa fie blocate.</p>
	
<form action="game.php?village={$village.id}&amp;screen=mail&amp;mode=block&amp;action=block_name&amp;h={$hkey}" method="post">
<table class="vis"><tr>
<td>Juc&#259;tor:</td>
<td><input name="tribe_name" type="text" /></td>
<td><input type="submit" value="OK" /></td>
</tr></table>
</form>

{if count($blocked)>0}
	<h4>Juc&#259;tori bloca&#355;i</h4>
	<table class="vis">
	<tr><th width="200">Porecla</th><th width="100">Descuiere</th></tr>
		{foreach from=$blocked item=arr key=id}
			<tr>
			<td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$arr.blocked_id}">{$arr.blocked_name}</a></td>
			<td><a href="game.php?village={$village.id}&amp;screen=mail&amp;mode=block&amp;action=unblock&amp;from_id={$arr.blocked_id}&amp;h={$hkey}">descuiere</a></td>
			</tr>
		{/foreach}
	</table>
{/if}