<table>
	<tr>
		<td>
			<img src="graphic/big_buildings/storage.png" title="Magazie" alt="" />
		</td>
		<td>
			<h2>Magazie (Nivelul {$village.storage|replace:"stufe":"nivel"})</h2>
			{$description}
		</td>
	</tr>
</table>
<br />
<table>
	<tr>
		<td width="220">
			Capacitatea curent&#259;:
		</td>
		<td>
			<b>{$store_datas.storage_size}</b> Unit&#259;&#355;i de marf&#259; pe minut
		</td>
	</tr>
	
	{if ($store_datas.storage_size_next)==false}

	{else}

		<tr>
			<td>
				Unit&#259;&#355;i de marf&#259; pe minut (Nivelul {$village.storage+1|replace:"stufe":"nivel"})
			</td>
			<td>
				<b>{$store_datas.storage_size_next}</b> Unit&#259;&#355;i de marf&#259; pe minut
			</td>
		</tr>

    {/if}

</table>
<br />

<table class="vis">
	<tr>
		<th width="150">
			Magazie plin&#259;
		</th>
		<th>
			Durat&#259; (hh:mm:ss)
		</th>
	</tr>
	{if $wood_sec!=0}
		<tr>
			<td width="250">
				<img src="graphic/holz.png" title="Lemn" alt="" />
				{$wood_sec_date|format_date}
			</td>
			<td>
				<span class="timer">{$wood_sec|format_time}</span>
			</td>
		</tr>
	{else}
		<tr>
			<td width="250" colspan="2" class="error">
				<img src="graphic/holz.png" title="Lemn" alt="" />
				Magazia este plina. Nu se pot face alte materii prime!
			</td>
		</tr>
	{/if}
	{if $stone_sec!=0}
		<tr>
			<td width="250">
				<img src="graphic/lehm.png" title="Argil&#259;" alt="" />
				{$stone_sec_date|format_date}
			</td>
			<td>
				<span class="timer">{$stone_sec|format_time}</span>
			</td>
		</tr>
	{else}
		<tr>
			<td width="250" colspan="2" class="error">
				<img src="graphic/lehm.png" title="Argil&#259;" alt="" />
				Magazia este plina. Nu se pot face alte materii prime!
			</td>
		</tr>
	{/if}
	{if $iron_sec!=0}
		<tr>
			<td width="250">
				<img src="graphic/eisen.png" title="Fier" alt="" />
				{$iron_sec_date|format_date}
			</td>
			<td>
				<span class="timer">{$iron_sec|format_time}</span>
			</td>
		</tr>
	{else}
		<tr>
			<td width="250" colspan="2" class="error">
				<img src="graphic/eisen.png" title="Fier" alt="" />
				Magazia este plina. Nu se pot face alte materii prime!
			</td>
		</tr>
	{/if}
</table>