<table>
	<tr>
		<td style="padding:2px;">
			<table>
				<tr>
					<td><img src="../graphic/build/hide.jpg" title="Esconderijo" alt="" /></td>
					<td>
						<h2>Esconderijo ({$village.hide|nivel})</h2>
						{$description}
					</td>
				</tr>
			</table>
			<table class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-left:5px;">
				<tr>
					<td width="200">Armaz&eacute;mento atual:</td>
					<td><b>{$hide_datas.max_hide}</b> Unidades de cada recurso</td>
				</tr>
				{if ($hide_datas.max_hide_next) != false}
				<tr>
					<td>Armaz&eacute;mento no ({$village.hide+1|nivel})</td>
					<td><b>{$hide_datas.max_hide_next}</b> Unidades de cada recurso</td>
				</tr>
    			{/if}
				<tr>
					<td>Recursos que podem ser saqueados:</td>
					<td>
						<img src="../graphic/icons/wood.png" title="Madeira" alt="" /> {$village.r_wood-$hide_datas.max_hide}
						<img src="../graphic/icons/stone.png" title="Argila" alt="" />{$village.r_stone-$hide_datas.max_hide}
						<img src="../graphic/icons/iron.png" title="Ferro" alt="" />{$village.r_iron-$hide_datas.max_hide}
					</td>
				</tr>
				<tr><td colspan="2" align="center">Ofertas no mercado podem ser saqueadas.</td></tr>
			</table>
		</td>
	</tr>
</table>