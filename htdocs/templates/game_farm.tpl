<table>
	<tr>
		<td>
			<img src="graphic/big_buildings/farm.png" title="Ferm&#259;" alt="" />
		</td>
		<td>
			<h2>Ferm&#259; (Nivelul {$village.farm})</h2>
				{$description}
			</td>
		</tr>
	</table>
	<br />
	<table class="vis">
		<tr>
			<td>
				<img src="graphic/face.png" title="Locuitori" alt="" />
				Popula&#355;ie maxim&#259;
			</td>
			<td>
				<b>{$farm_datas.farm_size}</b>
			</td>
		</tr>

		{if ($farm_datas.farm_size_next)==false}

		{else}

			<tr>
				<td>
					<img src="graphic/face.png" title="Locuitori" alt="" />
					Popula&#355;ie maxim&#259; pentru (Nivelul {$village.farm+1})
				</td>
				<td>
					<strong>{$farm_datas.farm_size_next}</strong>
				</td>
			</tr>
    	{/if}

</table>