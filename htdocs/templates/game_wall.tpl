<table>
	<tr>
		<td>
			<img src="graphic/big_buildings/wall.png" title="Zid" alt="" />
		</td>
		<td>
			<h2>
				Zid (Nivelul {$village.wall|replace:"stufe":"nivel"})
			</h2>
			{$description}
		</td>
	</tr>
</table>
<br />
<table class="vis">
	<tr>
		<td width="200">
			Actual
		</td>
		<td width="200">
			<strong>{$wall_datas.Basic_defense}</strong>
			Baz&#259; de Ap&#259;rare
		</td>
		<td width="200">
			<strong>{$wall_datas.wall_bonus}%</strong>
			Bonus de Ap&#259;rare
		</td>
	</tr>

	{if $wall_datas.basic_defense_next}

	{else}

		<tr>
			<td>
				Pe (Nivelul {$village.wall+1|replace:"stufe":"nivel"})
			</td>
			<td>
				<strong>{$wall_datas.Basic_defense_next}</strong>
				Baz&#259; de Ap&#259;rare
			</td>
			<td>
				<strong>{$wall_datas.wall_bonus_next}%</strong>
				Bonus de Ap&#259;rare
			</td>
		</tr>

    {/if}
    
</table>
