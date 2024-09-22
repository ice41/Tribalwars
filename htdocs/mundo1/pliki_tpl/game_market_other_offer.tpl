{if !empty($error)}
	<b><div style="color:red;">{$error}</div></b><br />
{/if}

<table class="vis">
<tr><th>Compradores: {$inside_dealers}/{$max_dealers}</th><th>Capacidade máxima de transporte: {math equation="x * 1000" x=$inside_dealers}</th></tr>
</table>

<h3>Procure por ofertas</h3>

<form action="game.php?village={$village.id}&amp;screen=market&amp;mode=other_offer&amp;action=search&amp;h={$hkey}" method="post">
<table class="vis">
<tr>
	<td>Ofertas:</td><td>
		<select name="res_sell">
		<option value="all" {if $market.market_sell=='all'}selected="selected"{/if}>Todas</option>
		<option value="wood" {if $market.market_sell=='wood'}selected="selected"{/if}>Madeira</option>
		<option value="stone" {if $market.market_sell=='stone'}selected="selected"{/if}>Argila</option>
		<option value="iron" {if $market.market_sell=='iron'}selected="selected"{/if}>Ferro</option>
		</select>
	</td><td width="10"></td>
	<td></td><td></td>

	<td rowspan="3"><input type="submit" value="Szuka�" /></td>
</tr>

<tr>
	<td>Precisa de:</td><td>
		<select name="res_buy">
		<option value="all" {if $market.market_buy=='all'}selected="selected"{/if}>Todas</option>
		<option value="wood" {if $market.market_buy=='wood'}selected="selected"{/if}>Madeira</option>
		<option value="stone" {if $market.market_buy=='stone'}selected="selected"{/if}>Argila</option>
		<option value="iron" {if $market.market_buy=='iron'}selected="selected"{/if}>Ferro</option>
		</select>
	</td>
	<td></td>
	<td>Razão Máxima:</td><td><input name="ratio_max" value="{$market.market_ratio_max}" type="text" size="4" /> (np: 1.8)</td>
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
	<tr><th>Oferta</th><th>Za</th><th>Gracz</th><th>Tempo de entrega</th><th>Razão</th><th>Acessível</th></tr>
	{foreach from=$offers item=arr key=id}
		<tr>
			<td>
				{if $arr.sell_ress=='wood'}<img src="/ds_graphic/holz.png" title="Madeira" alt="" />{/if}{if $arr.sell_ress=='stone'}<img src="/ds_graphic/lehm.png" title="Argila" alt="" />{/if}{if $arr.sell_ress=='iron'}<img src="/ds_graphic/eisen.png" title="ferro" alt="" />{/if}{$arr.sell|format_number}
			</td>
			<td>
				{if $arr.buy_ress=='wood'}<img src="/ds_graphic/holz.png" title="Madeira" alt="" />{/if}{if $arr.buy_ress=='stone'}<img src="/ds_graphic/lehm.png" title="Argila" alt="" />{/if}{if $arr.buy_ress=='iron'}<img src="/ds_graphic/eisen.png" title="ferro" alt="" />{/if}{$arr.buy|format_number}
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
					Tem poucos comerciantes
				{elseif $arr.message=='nr'}
					Sem recursos disponíveis
				{else}
					<form action="game.php?village={$village.id}&amp;screen=market&amp;mode=other_offer&amp;action=accept_multi&amp;id={$id}&amp;page={$aktu_opage}&amp;h={$hkey}" method="post">
						<input type="text" name="count" size="4" value="1" onclick="javascript:this.value=''" />
						<input type="submit" value="Aceitar" size="5" />
					</form>						
				{/if}
			</td>
		</tr>
	{/foreach}
</table>