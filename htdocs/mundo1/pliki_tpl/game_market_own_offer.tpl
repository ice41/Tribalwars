{if !empty($error)}
	<b><div style="color:red;">{$error}</div></b><br />
{/if}

<table class="vis">
	<tr>
		<th>Compradores: {$inside_dealers}/{$max_dealers}</th>
		<th>Capacidade máxima de transporte: {math equation="x * 1000" x=$inside_dealers}</th>
	</tr>
</table>

<h3>Definir oferta</h3>

<form action="game.php?village={$village.id}&amp;screen=market&amp;mode=own_offer&amp;action=new_offer&amp;h={$hkey}" method="post">
	<table class="vis">
		<tr>
			<td>Oferta:</td>
			<td><input name="sell" type="text" size="5" value="" /></td>
			<td>
				<table cellspacing="0" cellpadding="0">
					<tr>
						<td><input id="res_sell_wood" name="res_sell" type="radio" value="wood" /></td>
						<td width="30"><label for="res_sell_wood"><img src="/ds_graphic/holz.png" title="Madeira" alt="" /></label></td>
						<td><input id="res_sell_stone" name="res_sell" type="radio" value="stone" /></td>
						<td width="30"><label for="res_sell_stone"><img src="/ds_graphic/lehm.png" title="Argila" alt="" /></label></td>
						<td><input id="res_sell_iron" name="res_sell" type="radio" value="iron" /></td>
						<td width="30"><label for="res_sell_iron"><img src="/ds_graphic/eisen.png" title="ferro" alt="" /></label></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>Eu preciso de:</td>
			<td><input name="buy" type="text" size="5" value="" /></td>
			<td>
				<table cellspacing="0" cellpadding="0">
					<tr>
						<td><input id="res_buy_wood" name="res_buy" type="radio" value="wood" /></td>
						<td width="30"><label for="res_buy_wood"><img src="/ds_graphic/holz.png" title="Madeira" alt="" /></label></td>
						<td><input id="res_buy_stone" name="res_buy" type="radio" value="stone" /></td>
						<td width="30"><label for="res_buy_stone"><img src="/ds_graphic/lehm.png" title="Argila" alt="" /></label></td>
						<td><input id="res_buy_iron" name="res_buy" type="radio" value="iron" /></td>
						<td width="30"><label for="res_buy_iron"><img src="/ds_graphic/eisen.png" title="Ferro" alt="" /></label></td>
					</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td>Quantas vezes:</td>
			<td><input name="multi" type="text" size="5" value="1" /></td>
			<td>x</td>
		</tr>
	</table>
	<input type="submit" value="Definir" />
</form>

<h3>Criar oferta</h3>
{if count($offers)>0}
	<form action="game.php?village={$village.id}&amp;screen=market&amp;mode=own_offer&amp;action=modify_offers&amp;h={$hkey}" method="post">
	<table class="vis">
	<tr><th>Oferta</th><th>por</th><th>Quantas vezes</th><th>Data de configuração</th></tr>
		{foreach from=$offers item=arr key=id}
			<tr><td><input name="id_{$id}" type="checkbox" />{if $arr.sell_ress=='wood'}<img src="/ds_graphic/holz.png" title="Madeira" alt="" />{/if}{if $arr.sell_ress=='stone'}<img src="/ds_graphic/lehm.png" title="Argila" alt="" />{/if}{if $arr.sell_ress=='iron'}<img src="/ds_graphic/eisen.png" title="Ferro" alt="" />{/if}{$arr.sell|format_number} </td>
			<td>{if $arr.buy_ress=='wood'}<img src="/ds_graphic/holz.png" title="Madeira" alt="" />{/if}{if $arr.buy_ress=='stone'}<img src="/ds_graphic/lehm.png" title="Argila" alt="" />{/if}{if $arr.buy_ress=='iron'}<img src="/ds_graphic/eisen.png" title="Ferro" alt="" />{/if}{$arr.buy|format_number} </td>
			<td>{$arr.multi}</td>	
			<td>{$arr.time}</td>
			</tr>
		{/foreach}
	<tr><th colspan="4"><input name="all" type="checkbox" onclick="selectAll(this.form, this.checked)" /> Marcar tudo </th></tr>
	</table>
	
	<input type="submit" value="Excluir" name="delete" />
	<input type="text" size="2" name="mod_count" value="1" />
	<input type="submit" value="Aumentar" name="increase" />
	<input type="submit" value="Reduzir" name="decrease" /></form>
{/if}