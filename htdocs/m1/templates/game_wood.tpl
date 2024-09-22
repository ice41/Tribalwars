<table>
	<tr>
		<td><img src="../graphic/build/wood.jpg" title="Bosque" alt="" /></td>
		<td>
			<h2>Bosque ({$village.wood|nivel})</h2>
			{$description}
		</td>
	</tr>
</table>
<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;margin-left:5px;">
	<tr>
		<td width="200">
			<img src="../graphic/icons/wood.png" title="Madeira" alt="" />
			Produ&ccedil;&atilde;o atual
		</td>
		<td>
			<b>{$wood_datas.wood_production}</b>
			Unidades por minuto
		</td>
	</tr>


	{if ($wood_datas.wood_production_next)==false}
			
	{else}

		<tr>
			<td>
				<img src="../graphic/icons/wood.png" title="Madeira" alt="" />
				Produ&ccedil;&atilde;o no ({$village.stone+1|nivel})
			</td>

			<td>
  				<b>{$wood_datas.wood_production_next}</b> Unidades por minuto
        	</td>
		</tr>
    {/if}
		{php}
		$p1 = mysql_fetch_Array(mysql_query("SELECT bonus FROM villages WHERE id = '".$_GET['village']."'"));
		include("include/config.php");
		if ($p1['bonus'] == 6) { include("include/bonus/raw_material_production_bonus.php"); } else { include("include/configs/raw_material_production.php"); }
		$wood = $this->_tpl_vars['village']['wood'];
		
		
		{/php}
		{php} if ($arr_production[$wood+2]) {
		$arr1 = $arr_production[$wood+2] * $config['speed'] / 60;
		{/php}

		<tr>
			<td>
				<img src="../graphic/icons/wood.png" title="Madeira" alt="" />
				Produ&ccedil;&atilde;o no ({$village.stone+2|nivel})
			</td>

			<td>
  				<b>{php}echo $arr1;{/php}</b> Unidades por minuto
        	</td>
		</tr>
		{php}}{/php}
{php} if ($arr_production[$wood+3]) {
		$arr2 = $arr_production[$wood+3] * $config['speed'] / 60;
		{/php}

		<tr>
			<td>
				<img src="../graphic/icons/wood.png" title="Madeira" alt="" />
				Produ&ccedil;&atilde;o no ({$village.stone+3|nivel})
			</td>

			<td>
  				<b>{php}echo $arr2;{/php}</b> Unidades por minuto
        	</td>
		</tr>
		{php}}{/php}
{php} if ($arr_production[$wood+4]) {
		$arr3 = $arr_production[$wood+4] * $config['speed'] / 60;
		{/php}

		<tr>
			<td>
				<img src="../graphic/icons/wood.png" title="Madeira" alt="" />
				Produ&ccedil;&atilde;o no ({$village.stone+4|nivel})
			</td>

			<td>
  				<b>{php}echo $arr3;{/php}</b> Unidades por minuto
        	</td>
		</tr>
		{php}}{/php}


</table>
