<h3>Einheiten</h3>

<table class="vis" width="100%">
<tr align="right"><th align="left">Einheit</th><th><img src="graphic/holz.png" title="Holz" alt="" /></th><th><img src="graphic/lehm.png" title="Lehm" alt="" /></th><th><img src="graphic/eisen.png" title="Eisen" alt="" /></th><th><img src="graphic/face.png" title="Arbeiter" alt="" /></th>
<th><img src="graphic/unit/att.png" alt="Angriffsstärke" /></th>
<th><img src="graphic/unit/def.png" alt="Verteidigung allgemein" /></th>
<th><img src="graphic/unit/def_cav.png" alt="Verteidigung Kavallerie" /></th>
<th><img src="graphic/unit/def_archer.png" alt="Verteidigung Bogenschütze" /></th>
<th><img src="graphic/unit/speed.png" alt="Geschwindigkeit" /></th>
<th><img src="graphic/unit/booty.png" alt="Beute" /></th>
</tr>

{foreach from=$cl_units->get_array('dbname') item=dbname key=name}
	<tr>
		<td align="left"><a href="javascript:popup('popup_unit.php?unit={$dbname}', 550, 520)"><img src="graphic/unit/{$dbname}.png" alt="" /> {$name}</a></td>
		<td>{$cl_units->get_woodprice($dbname)}</td><td>{$cl_units->get_stoneprice($dbname)}</td><td>{$cl_units->get_ironprice($dbname)}</td>
		<td>{$cl_units->get_bhprice($dbname)}</td>
		<td>{$cl_units->get_att($dbname,1)}</td><td>{$cl_units->get_def($dbname,1)}</td><td>{$cl_units->get_defcav($dbname,1)}</td><td>{$cl_units->get_defarcher($dbname,1)}</td>

		<td>{$cl_units->get_speed($dbname,'minutes')}</td>
		<td>{$cl_units->get_booty($dbname)}</td>
	</tr>
{/foreach}
</table><br />