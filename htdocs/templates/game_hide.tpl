<table>
	<tr>
		<td style="padding:2px;">
			<table>
				<tr>
					<td>
						<img src="graphic/big_buildings/hide.png" title="	Ascunz&#259;toare" alt="" />
					</td>
					<td>
						<h2>Ascunz&#259;toare (Nivelul {$village.hide})</h2>
						{$description}
					</td>
				</tr>
			</table><br />
			<table class="vis">
				<tr>
					<td width="200">
						M&#259;rimea actual&#259;
					</td>
					<td>
						<b>{$hide_datas.max_hide}</b>
						Unit&#259;&#355;i din fiecare resurs&#259;
					</td>
				</tr>

				{if ($hide_datas.max_hide_next)==false}

				{else}



					<tr>
						<td>
							M&#259;rime la (Nivelul {$village.hide+1})
						</td>
						<td>
							<b>{$hide_datas.max_hide_next}</b>
							Unit&#259;&#355;i din fiecare resurs&#259;
						</td>
					</tr>
				<tr>
    			{/if}

					<td>
						Materii prime care pot fi jefuite:</td>
					<td>
						<img src="graphic/holz.png" title="Lemn" alt="" /> {$village.r_wood-$hide_datas.max_hide}
						<img src="graphic/lehm.png" title="Argil&#259;" alt="" />{$village.r_stone-$hide_datas.max_hide}
						<img src="graphic/eisen.png" title="Fier" alt="" />{$village.r_iron-$hide_datas.max_hide}
					</td>
				</tr>
				<tr>
					<td colspan="2">
						Ofertele din t&#226;rg pot fi jefuite
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>