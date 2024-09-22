<table>
	<tr>
		<td>
			<img src="graphic/big_buildings/stone.png" title="Mina de argil&#259;" alt="" />
		</td>
		<td>
			<h2>
				Argila (Nivelul {$village.stone|replace:"stufe":"nivel"})
			</h2>
			{$description}
		</td>
	</tr>
</table>
<br />
	<table class="vis">
		<tr>
			<td width="200">
				<img src="graphic/lehm.png" title="Argil&#259;" alt="" />
				Produc&#355;ie actual&#259;
			</td>
			<td>
				<b>{$stone_datas.stone_production} </b>
				Unit&#259;&#355;i pe minut
			</td>
		</tr>

		{if ($stone_datas.stone_production_next)==false}

		{else}

			<tr>
				<td>
					<img src="graphic/lehm.png" title="Argil&#259;" alt="" />
				Produc&#355;ie la (Nivelul {$village.stone+1|replace:"stufe":"nivel"})
			</td>
			<td>
				<b>{$stone_datas.stone_production_next}</b>
				Unit&#259;&#355;i pe minut
			</td>
		</tr>
    {/if}

</table>
