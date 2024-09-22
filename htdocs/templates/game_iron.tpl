<table>
	<tr>
		<td>
			<img src="graphic/big_buildings/iron.png" title="Mina de fier" alt="" />
		</td>
		<td>
			<h2>
				Mina de fier (Nivelul {$village.iron})
			</h2>
            {$description}
		</td>
	</tr>
</table>
<br />
<table class="vis">
	<tr>
		<td width="200">
			<img src="graphic/eisen.png" title="Fier" alt="" /> Produc&#355;ie actual&#259;
		</td>
		<td>
			<b>{$iron_datas.iron_production} </b>Unit&#259;&#355;i pe minut
		</td>
	</tr>

	{if ($iron_datas.iron_production_next)==false}

	{else}
		<tr>
	 		<td>
		 		<img src="graphic/eisen.png" title="Fier" alt="" />
				 Produc&#355;ie la (Nivelul {$village.iron+1})
			</td>
			<td>
				<b>{$iron_datas.iron_production_next}</b> Unit&#259;&#355;i pe minut
			</td>
		</tr>
    {/if}
</table>