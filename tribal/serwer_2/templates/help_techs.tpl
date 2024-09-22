<h3>Technologie</h3>

{foreach from=$cl_techs->get_array("dbname") item=dbname}
	{php}
	$this->_tpl_vars['unit'] = 'unit_'.$this->_tpl_vars['dbname'];
	{/php}
	<table>
		<tr>
			<td valign="top">
				<img src="/ds_graphic/unit_big/{$dbname}.png" alt="{$cl_techs->get_name($dbname)}" title="{$cl_techs->get_name($dbname)}"/>
			</td>
			<td valign="top">
				{$cl_units->get_description($unit)}
			</td>
		</tr>
	</table>
	<br>
	<table class="vis" width="100%">
		<tr>
			<th colspan="{$cl_units->get_countNeeded($unit)}">Wymagane poziomy budynków, aby móc rekrutowaæ dan¹ jednostkê</th>
		</tr>
								
		<tr>
			{if count($cl_units->get_needed($unit))>0}
				{foreach from=$cl_units->get_needed($unit) key=n_unit item=n_stage}
					<td>
						<a href="popup_building.php?building={$n_unit}">{$cl_builds->get_name($n_unit)}</a> (Poziom {$n_stage})
					</td>
				{/foreach}
			{else}
				<td>Jednostka dostêpna bez wymagañ.</td>
			{/if}
		</tr>
	</table>
	<br>
	<table class="vis" width="100%">
		<tr>
			<th style="text-align:center;">poziom technologiczny</th>
			<th style="text-align:center;" colspan="3">Koszt badañ</th>
			<th width="30"><center><img src="/ds_graphic/unit/att.png" alt="Si³a ataku" /></center></th>
			<th width="30"><center><img src="/ds_graphic/unit/def.png" alt="Ogólna si³a obrony" /></center></th>
			<th width="30"><center><img src="/ds_graphic/unit/def_cav.png" alt="Obrona przeciw kawalerii" /></center></th>
			<th width="30"><center><img src="/ds_graphic/unit/def_archer.png" alt="Obrona przeciw ³ucznikom" /></center></th>
		</tr>
		{php}/*Pobierz maksymalny poziom technologii:*/$maxstage = $this->_tpl_vars['cl_techs']->get_maxstage($this->_tpl_vars['dbname']);for($i=1;$i<=$maxstage;$i++):$this->_tpl_vars['stage'] = $i;{/php}
			<tr>
				<td style="text-align:center;">{$stage}</td>
				<td style="text-align:center;"><img src="/ds_graphic/holz.png" title="Drewno" alt="" /> {$cl_techs->get_wood($dbname,$stage)}</td>
				<td style="text-align:center;"><img src="/ds_graphic/lehm.png" title="Ceg³y" alt="" /> {$cl_techs->get_stone($dbname,$stage)}</td>
				<td style="text-align:center;"><img src="/ds_graphic/eisen.png" title="¯elazo" alt="" /> {$cl_techs->get_iron($dbname,$stage)}</td>
				{php}$this->_tpl_vars['stage'] -= 1;{/php}
				<td style="text-align:center;">{$cl_units->get_att($unit,$stage)}</td>
				<td style="text-align:center;">{$cl_units->get_def($unit,$stage)}</td>
				<td style="text-align:center;">{$cl_units->get_defcav($unit,$stage)}</td>
				<td style="text-align:center;">{$cl_units->get_defarcher($unit,$stage)}</td>
			</tr>
		{php}endfor;{/php}
	</table>
{/foreach}