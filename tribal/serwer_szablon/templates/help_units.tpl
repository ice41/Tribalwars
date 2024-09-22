<h3>Jednostki</h3>

<table class="vis" width="100%">
<tr align="right"><th align="left">Jednostka</th><th><img src="/ds_graphic/holz.png" title="Drewno" alt="" /></th><th><img src="/ds_graphic/lehm.png" title="Ceg³y" alt="" /></th><th><img src="/ds_graphic/eisen.png" title="¯elazo" alt="" /></th><th><img src="/ds_graphic/face.png" title="Wieœniak" alt="" /></th>
<th><img src="/ds_graphic/unit/att.png" alt="Si³a ataku" /></th>
<th><img src="/ds_graphic/unit/def.png" alt="Ogólna si³a obrony" /></th>
<th><img src="/ds_graphic/unit/def_cav.png" alt="Obrona przeciw kawalerii" /></th>
<th><img src="/ds_graphic/unit/def_archer.png" alt="Obrona przeciw ³ucznikom" /></th>
<th><img src="/ds_graphic/unit/speed.png" alt="Szybkoœæ" /></th>
<th><img src="/ds_graphic/unit/booty.png" alt="£up" /></th>
</tr>

{foreach from=$cl_units->get_array('dbname') item=dbname key=name}
	<tr>
		<td align="left"><a href="javascript:popup('popup_unit.php?unit={$dbname}', 550, 520)"><img src="/ds_graphic/unit/{$dbname}.png" alt="" /> {$name}</a></td>
		<td>{$cl_units->get_woodprice($dbname)}</td><td>{$cl_units->get_stoneprice($dbname)}</td><td>{$cl_units->get_ironprice($dbname)}</td>
		<td>{$cl_units->get_bhprice($dbname)}</td>
		<td>{$cl_units->get_att($dbname,1)}</td><td>{$cl_units->get_def($dbname,1)}</td><td>{$cl_units->get_defcav($dbname,1)}</td><td>{$cl_units->get_defarcher($dbname,1)}</td>

		<td>
			{php}
				$var = $this->_tpl_vars['cl_units']->get_speed($this->_tpl_vars['dbname']) / 60; 
				echo $var;
			{/php}
		</td>
		<td>{$cl_units->get_booty($dbname)}</td>
	</tr>
{/foreach}
</table><br />

<table class="vis" width="100%">
	<tbody>
		<tr align="left">
			<th align="right">Symbol</th>
			<th>Znaczenie</th>
			<th>Wyjaœnienie</th>
		</tr>
		<tr>
			<td><img src="/ds_graphic/unit/att.png?1" alt=""></td><td> Si³a napadu</td>
			<td>Si³a napadu to po prostu walecznoœæ danej jednostki w napadzie.</td>
		</tr>

		<tr>
			<td><img src="/ds_graphic/unit/def.png?1" alt=""></td><td> Obrona ogólnie</td>
			<td>Obrona ogólna informuje, jak dobrze radzi sobie dana jednostka w obronie przed infanteri¹. </td>
		</tr>
		<tr>
			<td><img src="/ds_graphic/unit/def_cav.png?1" alt=""></td><td> Obrona przeciwko kawalerii</td>
			<td>Obrona przeciwko kawalerzystom informuje, jak mocna jest si³a obrony danej jednostki przeciw kawalerii.</td>
		</tr>
		<tr>
			<td><img src="/ds_graphic/unit/def_archer.png?1" alt=""></td><td> Obrona £ucznik</td>
			<td>Obrona ³uczników przedstawia wartoœæ walecznoœci danej jednostki w obronie przeciwko napadowi ³uczników. </td>
		</tr>
		<tr>
			<td><img src="/ds_graphic/unit/speed.png?1" alt=""></td><td> Prêdkoœæ</td>
			<td>Prêdkoœæ mierzona jest w minutach, które dana jednostka potrzebuje na przebycie jednego pola.</td>
		</tr>
		<tr>
			<td><img src="/ds_graphic/unit/booty.png?1" alt=""></td><td> £up</td>
			<td>Wartoœæ ³upu informuje o tym, ile surowców mo¿e unieœæ dana jednostka. </td>
		</tr>
	</tbody>
</table>