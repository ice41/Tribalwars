{if !empty($error)}
	<b><div style="color:red;">{$error}</div></b><br />
{/if}

<table class="vis">
<tr><th>Kupcy: {$inside_dealers}/{$max_dealers}</th><th>Maksymalna pojemnoœæ transportu: {math equation="x * 1000" x=$inside_dealers}</th></tr>
</table>

<h3>Szukaj ofery</h3>

<form action="game.php?village={$village.id}&amp;screen=market&amp;mode=other_offer&amp;action=search&amp;h={$hkey}" method="post">
<table class="vis">
<tr>
	<td>Oferujê:</td><td>
		<select name="res_sell">
		<option value="all" {if $market.market_sell=='all'}selected="selected"{/if}>Wszystko</option>
		<option value="wood" {if $market.market_sell=='wood'}selected="selected"{/if}>Drewno</option>
		<option value="stone" {if $market.market_sell=='stone'}selected="selected"{/if}>Glina</option>
		<option value="iron" {if $market.market_sell=='iron'}selected="selected"{/if}>Ruda</option>
		</select>
	</td><td width="10"></td>
	<td></td><td></td>

	<td rowspan="3"><input type="submit" value="Szukaæ" /></td>
</tr>

<tr>
	<td>Potrzebujê:</td><td>
		<select name="res_buy">
		<option value="all" {if $market.market_buy=='all'}selected="selected"{/if}>Wszystko</option>
		<option value="wood" {if $market.market_buy=='wood'}selected="selected"{/if}>Drewno</option>
		<option value="stone" {if $market.market_buy=='stone'}selected="selected"{/if}>Glina</option>
		<option value="iron" {if $market.market_buy=='iron'}selected="selected"{/if}>Ruda</option>
		</select>
	</td>
	<td></td>
	<td>Maksymalny stosunek:</td><td><input name="ratio_max" value="{$market.market_ratio_max}" type="text" size="4" /> (np: 1.8)</td>
</tr>
</table>
</form>
{if $num_pages>1}
	<table class="vis" width="100%">
		<tr>
			<td align="center">
				{section name=countpage start=1 loop=$num_pages+1 step=1}
					{if $site==$smarty.section.countpage.index}
						<strong> &gt;{$smarty.section.countpage.index}&lt; </strong>
					{else}
						<a href="game.php?village={$village.id}&amp;screen=market&amp;mode=other_offer&amp;site={$smarty.section.countpage.index}"> [{$smarty.section.countpage.index}] </a>
					{/if}
				{/section}
			</td>
		</tr>
	</table>
{/if}
<table class="vis">
	<tr><th>Oferta</th><th>Za</th><th>Gracz</th><th>Czas dostarczenia</th><th>Stosunek</th><th>Dostêpne</th></tr>
	{foreach from=$offers item=arr key=id}
		<tr>
			<td>
				{if $arr.sell_ress=='wood'}<img src="graphic/holz.png" title="Drewno" alt="" />{/if}{if $arr.sell_ress=='stone'}<img src="graphic/lehm.png" title="Glina" alt="" />{/if}{if $arr.sell_ress=='iron'}<img src="graphic/eisen.png" title="¯elazo" alt="" />{/if}{$arr.sell}
			</td>
			<td>
				{if $arr.buy_ress=='wood'}<img src="graphic/holz.png" title="Drewno" alt="" />{/if}{if $arr.buy_ress=='stone'}<img src="graphic/lehm.png" title="Glina" alt="" />{/if}{if $arr.buy_ress=='iron'}<img src="graphic/eisen.png" title="¯elazo" alt="" />{/if}{$arr.buy}
			</td>
			<td><a href="game.php?village=820&amp;screen=info_player&amp;id={$arr.userid}">{$arr.username}</a></td>
			<td>{$arr.unit_running}</td>
			<td>
			<table width="40"><tr><td style="background-color: rgb({$arr.ratio_red}, {$arr.ratio_green}, 100)">{$arr.ratio_max}</td></tr></table>
			</td>
				
			<td>{$arr.multi}x</td>
		
			<td>
				{if $arr.message=='not_enough_dealers'}
					Posiadasz za ma³o kupców
				{elseif $arr.message=='not_enough_ress'}
					Posiadasz za ma³o surowców
				{else}
					<form action="game.php?village={$village.id}&amp;screen=market&amp;mode=other_offer&amp;action=accept_multi&amp;id={$id}&amp;site={$site}&amp;h={$hkey}" method="post">
						<input type="text" name="count" size="3" value="1" onclick="javascript:this.value=''" />
						<input type="submit" value="Przyj¹æ" size="5" />
					</form>						
				{/if}
			</td>
		</tr>
	{/foreach}
</table>