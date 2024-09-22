{if $sekcja}
	<table class="vis" width="810">
		<tr>
			<td>
				{$sekcja_wiosek} 
			</td>
		</tr>
	</table>
{/if}

<form action="game.php?village={$village.id}&amp;screen=overview_villages&amp;mode=groups&amp;action=edit_groups&amp;h={$hkey}" method="post">
	<table class="vis overview_table" width="100%">
		<tbody>
			<tr>
				<th width="280">Wioska</th>
				<th>Punkty</th>
				<th>Zagroda</th>
				<th>Grupy</th>
			</tr>

			{foreach from=$villages item=id key=arr_id}
				<tr {if $village.id == $arr_id}class="selected"{else}{if !$id.parzysta_liczba}class="row_b"{else}class="row_a"{/if}{/if}>
					<td>
						<input name="village_ids_{$arr_id}" value="{$arr_id}" type="checkbox">

						<span id="label_{$arr_id}">
							{$bonus->get_bonus_mini_image($villages.$arr_id.bonus)}
							<a href="game.php?village={$arr_id}&amp;screen=overview">
								<span>{$id.name} ({$id.x}|{$id.y}) K{$id.continent}</span>
							</a>
						</span>
					</td>
					
					<td>{$id.points}</td>
					<td>{$id.r_bh} / {$id.max_farm}</td>
					{if $id.group === 'all'}
						<td class="inactive">nie przyporz¹dkowane</td>
					{else}
						<td>{$id.group}</td>
					{/if}
				</tr>
			{/foreach}
			<tr>
				<th colspan="6">
					<input id="select_all" class="selectAll" onchange="selectAll(this.form, this.checked)" type="checkbox"> <label for="select_all"><b>zaznacz wszystkie</b></label>
				</th>
			</tr>
		</tbody>
	</table>

	<select name="selected_group">
		{foreach from=$user_groups item=group}
			<option value="{php} echo base64_encode($this->_tpl_vars['group']);{/php}">{$group}</option>
		{/foreach}
	</select>
	
	<input name="add_to_group" value="Dodaj" type="submit">
	<input name="remove_from_group" value="Usuñ" type="submit">
</form>