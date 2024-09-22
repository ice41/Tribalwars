{if !empty($error)}
	<b><div style="color:red;">{$error}</div></b><br />
{/if}

<table class="vis">
<tr><th>Negustori: {$inside_dealers}/{$max_dealers}</th><th>Transport maxim: {math equation="x * 1000" x=$inside_dealers}</th></tr>
</table>

<h3>Crea&#355;i oferta</h3>

<form action="game.php?village={$village.id}&amp;screen=market&amp;mode=other_offer&amp;action=search&amp;h={$hkey}" method="post">
<table class="vis">
<tr>
	<td>Caut&#259;:</td><td>
		<select name="res_sell">
		<option value="all" {if $market.market_sell=='all'}selected="selected"{/if}>Tot</option>
		<option value="wood" {if $market.market_sell=='wood'}selected="selected"{/if}>Lemn</option>
		<option value="stone" {if $market.market_sell=='stone'}selected="selected"{/if}>Argil&#259;</option>
		<option value="iron" {if $market.market_sell=='iron'}selected="selected"{/if}>Fier</option>
		</select>
	</td><td width="10"></td>
	<td></td><td></td>

	<td rowspan="3"><input type="submit" value="Caut&#259;" /></td>
</tr>

<tr>
	<td>Ofer&#259;:</td><td>
		<select name="res_buy">
		<option value="all" {if $market.market_buy=='all'}selected="selected"{/if}>Tot</option>
		<option value="wood" {if $market.market_buy=='wood'}selected="selected"{/if}>Lemn</option>
		<option value="stone" {if $market.market_buy=='stone'}selected="selected"{/if}>Argil&#259;</option>
		<option value="iron" {if $market.market_buy=='iron'}selected="selected"{/if}>Fier</option>
		</select>
	</td>
	<td></td>
	<td>Propor&#355;ie maximal&#259;:</td><td><input name="ratio_max" value="{$market.market_ratio_max}" type="text" size="4" /> (ex: 1.8)</td>
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
	<tr><th>Oferte</th><th>Pentru</th><th>Juc&#259;tor</th><th>Termenul de livrare</th><th>Ra&#355;io</th><th>Disponibilitate</th></tr>
	{foreach from=$offers item=arr key=id}
		<tr>
			<td>
				{if $arr.sell_ress=='wood'}<img src="graphic/holz.png" title="Lemn" alt="" />{/if}{if $arr.sell_ress=='stone'}<img src="graphic/lehm.png" title="Argil&#259;" alt="" />{/if}{if $arr.sell_ress=='iron'}<img src="graphic/eisen.png" title="Fier" alt="" />{/if}{$arr.sell}
			</td>
			<td>
				{if $arr.buy_ress=='wood'}<img src="graphic/holz.png" title="Lemn" alt="" />{/if}{if $arr.buy_ress=='stone'}<img src="graphic/lehm.png" title="Argil&#259;" alt="" />{/if}{if $arr.buy_ress=='iron'}<img src="graphic/eisen.png" title="Fier" alt="" />{/if}{$arr.buy}
			</td>
			<td><a href="game.php?village=820&amp;screen=info_player&amp;id={$arr.userid}">{$arr.username}</a></td>
			<td>{$arr.unit_running}</td>
			<td>
			<table width="40"><tr><td style="background-color: rgb({$arr.ratio_red}, {$arr.ratio_green}, 100)">{$arr.ratio_max}</td></tr></table>
			</td>
				
			<td>{$arr.multi} mal</td>
		
			<td>
				{if $arr.message=='not_enough_dealers'}
					Nu sunt destui negustori prezenti
				{elseif $arr.message=='not_enough_ress'}
					Nu sunt destule materii prime disponibile
				{else}
					<form action="game.php?village={$village.id}&amp;screen=market&amp;mode=other_offer&amp;action=accept_multi&amp;id={$id}&amp;site={$site}&amp;h={$hkey}" method="post">
						<input type="text" name="count" size="3" value="1" onclick="javascript:this.value=''" />
						<input type="submit" value="Raspuns" size="5" />
					</form>						
				{/if}
			</td>
		</tr>
	{/foreach}
</table>