<table>
	<tr>
		<td><img src="../graphic/build/farm.jpg" title="Fazenda" alt="" /></td>
		<td>
			<h2>Fazenda ({$village.farm|nivel})</h2>
			{$description}
		</td>
	</tr>
</table><br />
<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-left:5px;">
	<tr>
		<td><img src="../graphic/icons/farm.png" title="Ferma" alt="" /> Popula&ccedil;&atilde;o m&aacute;xima</td>
		<td><b>{$farm_datas.farm_size}</b></td>
	</tr>
	{if ($farm_datas.farm_size_next)!=false}
	<tr>
		<td><img src="../graphic/icons/farm.png" title="Ferma" alt="" /> Popula&ccedil;&atilde;o m&aacute;xima no <b>({$village.farm+1|nivel})</b></td>
		<td><strong>{$farm_datas.farm_size_next}</strong></td>
	</tr>
   	{/if}
</table>