<table>
	<tr>
		<td>
			<img src="graphic/big_buildings/market.png" title="T&#226;rg" alt="" />
		</td>
		<td>
			<h2>T&#226;rg (Nivelul {$village.market})</h2>
			{$description}
		</td>
	</tr>
</table>
<br />
{if $show_build}
	<table width="100%"><tr><td valign="top" width="100">
	<table class="vis" width="100%">
			{if send==$mode}
				<tr>
					<td class="selected" width="120">
						<a href="game.php?village={$village.id}&amp;screen=market&amp;mode=send">Trimitere de materii prime</a>
					</td>
				</tr>
			{else}
                <tr>
                    <td width="120">
						<a href="game.php?village={$village.id}&amp;screen=market&amp;mode=send">Trimitere de materii prime</a>
					</td>
				</tr>
			{/if}
			{if own_offer==$mode}
				<tr>
					<td class="selected" width="120">
						<a href="game.php?village={$village.id}&amp;screen=market&amp;mode=own_offer">Oferte proprii</a>
					</td>
				</tr>
			{else}
                <tr>
                    <td width="120">
						<a href="game.php?village={$village.id}&amp;screen=market&amp;mode=own_offer">Oferte proprii</a>
					</td>
				</tr>
			{/if}
			{if $f_mode==$mode}
				<tr>
					<td class="selected" width="120">
						<a href="game.php?village={$village.id}&amp;screen=market&amp;mode=other_offer">Oferte str&#259;ine</a>
					</td>
				</tr>
			{else}
                <tr>
                    <td width="120">
						<a href="game.php?village={$village.id}&amp;screen=market&amp;mode=other_offer">Oferte str&#259;ine</a>
					</td>
				</tr>
			{/if}
	</table>
	
	</td><td valign="top" width="*">
		{if in_array($mode,$allow_mods)}
			{include file="game_market_$mode.tpl" title=foo}
		{/if}
	</td></tr></table>
{/if}