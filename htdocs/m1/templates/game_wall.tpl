<table>
	<tr>
		<td><img src="../graphic/build/wall.jpg" title="Muralha" alt="" /></td>
		<td>
			<h2>Muralha ({$village.wall|nivel})</h2>
			{$description}
		</td>
	</tr>
</table>
<table class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;margin-left:5px;">
	<tr>
		<td width="200">Atual</td>
		<td width="200"><strong>{$wall_datas.basic_defense}</strong> Defesa b&aacute;sica</td>
		<td width="200"><strong>{$wall_datas.wall_bonus}%</strong> Bonus de defesa</td>
	</tr>
	{if $wall_datas.basic_defense_next}
	<tr>
		<td>no ({$village.wall+1|nivel})</td>
		<td><strong>{$wall_datas.basic_defense_next}</strong> Defesa b&aacute;sica</td>
		<td><strong>{$wall_datas.wall_bonus_next}%</strong> Bonus de defesa</td>
	</tr>
	{/if}
</table>