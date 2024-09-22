<table>
	<tr>
		<td>
			<img src="graphic/big_buildings/wood.png" title="Taietori de lemne" alt="" />
		</td>
		<td>
			<h2>
				Taietori de lemne ({php}
$data_terminaree=(is_array($_tmp=$this->_tpl_vars['village']['wood'])) ? $this->_run_mod_handler('stage', true, $_tmp) : stage($_tmp);
$data_terminaree = str_replace("Stufe","Nivelul",$data_terminaree);
//Variabila originala tpl: {$village.wood|stage}

echo $data_terminaree;
{/php})
			</h2>
			{$description}
		</td>
	</tr>
</table>
<br />
<table class="vis">
	<tr>
		<td width="200">
			<img src="graphic/holz.png" title="Lemn" alt="" />
			Produc&#355;ie actual&#259;
		</td>
		<td>
			<b>{$wood_datas.wood_production}</b>
			Unit&#259;&#355;i pe minut
		</td>
	</tr>


	{if ($wood_datas.wood_production_next)==false}
			
	{else}

		<tr>
			<td>
				<img src="graphic/holz.png" title="Lemn" alt="" />
				Produc&#355;ie la ({php}
$data_terminaree=(is_array($_tmp=$this->_tpl_vars['village']['wood']+1)) ? $this->_run_mod_handler('stage', true, $_tmp) : stage($_tmp);
$data_terminaree = str_replace("Stufe","Nivelul",$data_terminaree);
//Variabila originala tpl:  {$village.wood+1|stage}
echo $data_terminaree;
{/php})
			</td>

			<td>
  				<b>{$wood_datas.wood_production_next}</b> Unit&#259;&#355;i pe minut
        	</td>
		</tr>
    {/if}

</table>