<table>
	<tr>
		<td>
			<img src="graphic/big_buildings/place.png" title="Pia&#355;a central&#259;" alt="" />
		</td>
		<td>
			<h2>Pia&#355;a central&#259; (Nivelul {$village.place})</h2>
			{$description}
		</td>
	</tr>
</table>
<br />
{if $show_build}

	<table width="100%"><tr><td valign="top" width="100">
	<table class="vis" width="100%">
			{if command==$mode}
				<tr>
					<td class="selected" width="120">
						<a href="game.php?village={$village.id}&amp;screen=place&amp;mode=command">Comenzi</a>
					</td>
				</tr>
			{else}
                <tr>
                    <td width="120">
						<a href="game.php?village={$village.id}&amp;screen=place&amp;mode=command">Comenzi</a>
					</td>
				</tr>
			{/if}
			{if units==$mode}
				<tr>
					<td class="selected" width="120">
						<a href="game.php?village={$village.id}&amp;screen=place&amp;mode=units">Trupe</a>
					</td>
				</tr>
			{else}
                <tr>
                    <td width="120">
						<a href="game.php?village={$village.id}&amp;screen=place&amp;mode=units">Trupe</a>
					</td>
				</tr>
			{/if}
			{if sim==$mode}
				<tr>
					<td class="selected" width="120">
						<a href="game.php?village={$village.id}&amp;screen=place&amp;mode=sim">Simulator</a>
					</td>
				</tr>
			{else}
                <tr>
                    <td width="120">
						<a href="game.php?village={$village.id}&amp;screen=place&amp;mode=sim">Simulator</a>
					</td>
				</tr>
			{/if}
	</table>
	
	</td><td valign="top" width="*">
		{if in_array($mode,$allow_mods)}
			{include file="game_place_$mode.tpl" title=foo}
		{/if}
	</td></tr></table>



{/if}