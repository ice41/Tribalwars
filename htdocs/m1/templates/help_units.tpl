<h3>Unidades</h3>
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;" align="center">
	<tr align="right">
		<th align="left">Unidade</th>
		<th><div align="center"><img src="../graphic/icons/wood.png" alt="" /></div></th>
		<th><div align="center"><img src="../graphic/icons/stone.png" alt="" /></div></th>
		<th><div align="center"><img src="../graphic/icons/iron.png" alt="" /></div></th>
		<th><div align="center"><img src="../graphic/icons/farm.png" alt="" /></div></th>
		<th><div align="center"><img src="../graphic/unit/att.png" alt="" /></div></th>
		<th><div align="center"><img src="../graphic/unit/def.png" alt="" /></div></th>
		<th><div align="center"><img src="../graphic/unit/def_cav.png" alt="" /></div></th>
		<th><div align="center"><img src="../graphic/unit/def_archer.png" alt="" /></div></th>
		<th><div align="center"><img src="../graphic/unit/speed.png" alt="" /></div></th>
		<th><div align="center"><img src="../graphic/icons/storage.png" alt="" /></div></th>
	</tr>
{foreach from=$cl_units->get_array('dbname') item=dbname key=name}
	<tr>
		<td align="left"><a href="javascript:popup('popup_unit.php?unit={$dbname}', 550, 520)"><img src="../graphic/unit/{$dbname}.png" alt="" /> {$name}</a></td>
		<td align="center">{$cl_units->get_woodprice($dbname)}</td>
		<td align="center">{$cl_units->get_stoneprice($dbname)}</td>
		<td align="center">{$cl_units->get_ironprice($dbname)}</td>
		<td align="center">{$cl_units->get_bhprice($dbname)}</td>
		<td align="center">{$cl_units->get_att($dbname,1)}</td>
		<td align="center">{$cl_units->get_def($dbname,1)}</td>
		<td align="center">{$cl_units->get_defcav($dbname,1)}</td>
		<td align="center">{$cl_units->get_defarcher($dbname,1)}</td>
		<td align="center">{$cl_units->get_speed($dbname,'minutes')}</td>
		<td align="center">{$cl_units->get_booty($dbname)}</td>
	</tr>
{/foreach}
</table><br /> 
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;" align="center">
	<tr align="left"> 
		<th align="right">Simbolo</th>
		<th>Significado</th> 
		<th>Explica&ccedil;&atilde;o</th>
	</tr> 
	<tr> 
		<td align="center"><img src="../graphic/unit/att.png?1" alt="" /></td><td> Pontos de ataque</td> 
		<td>Puterea de atac arata puterea unitatii în timpul atacului.</td> 
	</tr> 
	<tr> 
		<td align="center"><img src="../graphic/unit/def.png?1" alt="" /></td><td> Defesa geral</td> 
		<td>apararea, arata în general, cât de bine se poate apara o unitate împotriva infanteriei</td> 
	</tr> 
	<tr> 
		<td align="center"><img src="../graphic/unit/def_cav.png?1" alt="" /></td><td> Defesa contra cavalaria</td> 
		<td>Cavaleria aparatoare arata puterea trupelor în confrutarea contra cavalariei</td> 
	</tr> 
	<tr> 
		<td align="center"><img src="../graphic/unit/def_archer.png?1" alt="" /></td><td> Defesa contra arqueiros</td> 
		<td>Apararea arcasilor arata puterea de aparare împotriva arcasilor</td> 
	</tr> 
	<tr> 
		<td align="center"><img src="../graphic/unit/speed.png?1" alt="" /></td><td> Velocidade</td> 
		<td>Viteza va arata câte minute necesita o unitate pentru a trece peste un câmp.</td> 
	</tr> 
	<tr> 
		<td align="center"><img src="../graphic/icons/storage.png" alt="" /></td><td> Saque</td> 
		<td>Masura de prada va arata câte resurse pot fi transportate de catre unitatea respectiva. </td> 
	</tr> 
</table> 