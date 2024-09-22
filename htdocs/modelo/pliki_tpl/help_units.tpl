<h3>Jednostki</h3>

<table class="vis" width="100%">
<tr align="right"><th align="left">Unidade</th><th><img src="/ds_graphic/holz.png" title="Madeira" alt="" /></th><th><img src="/ds_graphic/lehm.png" title="Argina" alt="" /></th><th><img src="/ds_graphic/eisen.png" title="Ferro" alt="" /></th><th><img src="/ds_graphic/face.png" title="População" alt="" /></th>
<th><img src="/ds_graphic/unit/att.png" alt="Poder de ataque" /></th>
<th><img src="/ds_graphic/unit/def.png" alt="Poder geral de defesa" /></th>
<th><img src="/ds_graphic/unit/def_cav.png" alt="Defesa contra cavalaria" /></th>
<th><img src="/ds_graphic/unit/def_archer.png" alt="Defesa contra arqueiros" /></th>
<th><img src="/ds_graphic/unit/speed.png" alt="Velocidade" /></th>
<th><img src="/ds_graphic/unit/booty.png" alt="Saque" /></th>
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
			<th>Significado</th>
			<th>Explicação</th>
		</tr>
		<tr>
			<td><img src="/ds_graphic/unit/att.png?1" alt=""></td><td> A força do ataque</td>
			<td>Força de assalto é simplesmente a proeza de combate de uma unidade em um ataque.</td>
		</tr>

		<tr>
			<td><img src="/ds_graphic/unit/def.png?1" alt=""></td><td> Defesa em geral</td>
			<td>A Defesa Geral informa o desempenho de uma unidade contra a infantaria. </td>
		</tr>
		<tr>
			<td><img src="/ds_graphic/unit/def_cav.png?1" alt=""></td><td> Defesa contra cavalaria</td>
			<td>Defensa contra cavalaria informa o quão forte é a defesa da sua unidade contra a cavalaria.</td>
		</tr>
		<tr>
			<td><img src="/ds_graphic/unit/def_archer.png?1" alt=""></td><td> Defesa contra arqueiros</td>
			<td>Defesa contra arqueiros representa o valor de Valor da unidade ao se defender contra um ataque de arqueiro. </td>
		</tr>
		<tr>
			<td><img src="/ds_graphic/unit/speed.png?1" alt=""></td><td> Velocidade</td>
			<td>A velocidade é medida em minutos, leva uma unidade para percorrer um campo.</td>
		</tr>
		<tr>
			<td><img src="/ds_graphic/unit/booty.png?1" alt=""></td><td> Saque</td>
			<td>O valor do saque informa quantos recursos uma unidade pode carregar. </td>
		</tr>
	</tbody>
</table>