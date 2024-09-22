{if !empty($error)}
	<b><div style="color:red;">{$error}</div></b><br />
{/if}

<table class="vis">
<tr><th>mercadores {$inside_dealers}/{$max_dealers}</th><th>A capacidade máxima de transporte: {math equation="x * 1000" x=$inside_dealers}</th></tr>
</table>

<h3>Pesquisar ofertas</h3>

<form action="game.php?village={$village.id}&amp;screen=market&amp;mode=other_offer&amp;action=search&amp;h={$hkey}" method="post">
<table class="vis">
<tr>
	<td>Oferece</td><td>
		<select name="res_sell">
		<option value="all" {if $market.market_sell=='all'}selected="selected"{/if}>Todos</option>
		<option value="wood" {if $market.market_sell=='wood'}selected="selected"{/if}>Madeira</option>
		<option value="stone" {if $market.market_sell=='stone'}selected="selected"{/if}>Argila</option>
		<option value="iron" {if $market.market_sell=='iron'}selected="selected"{/if}>Ferro</option>
		</select>
	</td><td width="10"></td>
	<td></td><td></td>

	<td rowspan="3"><input type="submit" value="Szukaæ" /></td>
</tr>

<tr>
	<td>Procura:</td><td>
		<select name="res_buy">
		<option value="all" {if $market.market_buy=='all'}selected="selected"{/if}>Todos</option>
		<option value="wood" {if $market.market_buy=='wood'}selected="selected"{/if}>Madeira</option>
		<option value="stone" {if $market.market_buy=='stone'}selected="selected"{/if}>Argila</option>
		<option value="iron" {if $market.market_buy=='iron'}selected="selected"{/if}>Ferro</option>
		</select>
	</td>
	<td></td>
	<td>Relação máxima:</td><td><input name="ratio_max" value="{$market.market_ratio_max}" type="text" size="4" /> (racio: 1.8)</td>
</tr>
</table>
</form>
{if $section_offers_exists}
	<table class="vis" width="100%">
		<tr>
			<td align="center">
				{$offers_section}
			</td>
		</tr>
	</table>
{/if}
<table class="vis">
	<tr><th>Oferta</th><th>para</th><th>jogador</th><th>tempo para entregar</th><th>relação</th><th>Dostêpne</th></tr>
	{foreach from=$offers item=arr key=id}
		<tr>
			<td>
				{if $arr.sell_ress=='wood'}<img src="/ds_graphic/holz.png" title="Madeira" alt="" />{/if}{if $arr.sell_ress=='stone'}<img src="/ds_graphic/lehm.png" title="Argila" alt="" />{/if}{if $arr.sell_ress=='iron'}<img src="/ds_graphic/eisen.png" title="¯elazo" alt="" />{/if}{$arr.sell|format_number}
			</td>
			<td>
				{if $arr.buy_ress=='wood'}<img src="/ds_graphic/holz.png" title="Madeira" alt="" />{/if}{if $arr.buy_ress=='stone'}<img src="/ds_graphic/lehm.png" title="Argila" alt="" />{/if}{if $arr.buy_ress=='iron'}<img src="/ds_graphic/eisen.png" title="¯elazo" alt="" />{/if}{$arr.buy|format_number}
			</td>
			<td>
				<a href="game.php?village=820&amp;screen=info_player&amp;id={$arr.userid}">{$arr.username}</a>
				{if $arr.userally != "-1"}
					 [<a href="game.php?village=820&amp;screen=info_ally&amp;id={$arr.userally}">{$arr.user_allyshort}</a>]
				{/if}
			</td>
			<td>{$arr.unit_running}</td>
			<td>
			<table width="40"><tr><td style="background-color: rgb({$arr.ratio_red}, {$arr.ratio_green}, 100)">{$arr.ratio_max}</td></tr></table>
			</td>
				
			<td>{$arr.multi}x</td>
		
			<td>
				{if $arr.message=='nd'}
					Posiadasz za ma³o kupców
				{elseif $arr.message=='nr'}
					Posiadasz za ma³o surowców
				{else}
					<form action="game.php?village={$village.id}&amp;screen=market&amp;mode=other_offer&amp;action=accept_multi&amp;id={$id}&amp;page={$aktu_opage}&amp;h={$hkey}" method="post">
						<input type="text" name="count" size="4" value="1" onclick="javascript:this.value=''" />
						<input type="submit" value="Przyj¹æ" size="5" />
					</form>						
				{/if}
			</td>
		</tr>
	{/foreach}
</table>