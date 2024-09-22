{if $sekcja}
	<table class="vis" width="810">
		<tr>
			<td>
				{$sekcja_wiosek} 
			</td>
		</tr>
	</table>
{/if}
<table class="vis">
<tr>
<th>Aldeia</th><th>Pontos</th><th>Recursos</th><th>Armazém</th><th>Fazenda</th>
<th>Edificio</th><th>Pesquisar</th><th>Recrutamento</th>
</tr>

{foreach from=$villages item=id key=arr_id}
	<tr {if $village.id == $villages.$arr_id.id}class="selected"{else}{if !$villages.$arr_id.parzysta_liczba}class="row_b"{else}class="row_a"{/if}{/if}>
		<td>{if $villages.$arr_id.attacks!=0}<img src="/ds_graphic/command/attack.png"> {/if}{$bonus->get_bonus_mini_image($villages.$arr_id.bonus)}<a href="game.php?village={$arr_id}&screen=overview">{$villages.$arr_id.name} ({$villages.$arr_id.x}|{$villages.$arr_id.y}) K{$villages.$arr_id.continent}</a></td>
		<td>{$villages.$arr_id.points}</td>
		<td><img src="/ds_graphic/holz.png" title="Madeira" alt="" />{if $villages.$arr_id.r_wood==$villages.$arr_id.max_storage}<span class="warn">{/if}{$villages.$arr_id.r_wood}{if $villages.$arr_id.r_wood==$villages.$arr_id.max_storage}</span>{/if} <img src="/ds_graphic/lehm.png" title="Kamienie" alt="" />{if $villages.$arr_id.r_stone==$villages.$arr_id.max_storage}<span class="warn">{/if}{$villages.$arr_id.r_stone}{if $villages.$arr_id.r_stone==$villages.$arr_id.max_storage}</span>{/if} <img src="/ds_graphic/eisen.png" title="�elazo" alt="" />{if $villages.$arr_id.r_iron==$villages.$arr_id.max_storage}<span class="warn">{/if}{$villages.$arr_id.r_iron}{if $villages.$arr_id.r_iron==$villages.$arr_id.max_storage}</span>{/if} </td>
		<td><img src="/ds_graphic/res.png" title="Spichlerz" alt="" />{$villages.$arr_id.max_storage|number_format}</td>
		<td><img src="/ds_graphic/face.png" title="População" alt="" />{$villages.$arr_id.r_bh}/{$villages.$arr_id.max_farm}</td>
		{if isset($villages.$arr_id.first_build.buildname)}
			<td><img src="/ds_graphic/buildings/{$villages.$arr_id.first_build.buildname}.png" alt="" /></td>

		{else}
		    <td></td>
		{/if}
		{if isset($villages.$arr_id.first_tec.tecname)}
			<td><b><img src="/ds_graphic/unit/{$villages.$arr_id.first_tec.tecname}.png" alt="" /></td>

		{else}
		    <td></td>
		{/if}
		<td>{foreach from=$villages.$arr_id.recruits item=arr_rec key=id_rec}<img src="/ds_graphic/unit/{$arr_rec.dbname}.png" title="{$arr_rec.num} {$arr_rec.unit}" alt="">{/foreach}</td>
	</tr>
{/foreach}

</table>