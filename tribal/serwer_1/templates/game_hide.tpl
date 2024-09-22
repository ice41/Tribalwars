{php}
if (!isset($this->_tpl_vars['cl_builds'])) {
	global $cl_builds;
	$this->assign('cl_builds',$cl_builds);
	}
$this->_tpl_vars['dbname'] = $this->_tpl_vars['screen'];
$this->_tpl_vars['aktu_build_prc'] = $this->_tpl_vars['village'][$this->_tpl_vars['dbname']] / $this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']);
{/php}
<table>
	<tr>
		<td>
			{if $cl_builds->get_maxstage($dbname) > 3}
				{if $aktu_build_prc > 0.5}
					<img src="/ds_graphic/big_buildings/{$dbname}3.png" title="{$cl_builds->get_name($dbname)}" alt="" />
				{else}
					{if $aktu_build_prc > 0.2}
						<img src="/ds_graphic/big_buildings/{$dbname}2.png" title="{$cl_builds->get_name($dbname)}" alt="" />
					{else}
						<img src="/ds_graphic/big_buildings/{$dbname}1.png" title="{$cl_builds->get_name($dbname)}" alt="" />
					{/if}
				{/if}
			{else}
				<img src="/ds_graphic/big_buildings/{$dbname}1.png" title="{$cl_builds->get_name($dbname)}" alt="" />
			{/if}
		</td>
		<td>
			<h2>{$cl_builds->get_name($dbname)} ({if $village.$dbname > 0}Poziom {$village.$dbname}{else}Nie zbudowano{/if})</h2>
			{$cl_builds->get_description_bydbname($dbname)}
		</td>
	</tr>
</table>
<br />


{if $village.$screen > 0}
	<table class="vis">
		{foreach from=$hide_arr item=lev}
		<tr>
			<td width="200">
				<img src="/ds_graphic/{$sur_name}.png" alt="" />
				{$lev.opis}
			</td>
			<td>
				<b>{$lev.produkcja}</b>
				Surowców
			</td>
		</tr>
		{/foreach}
	</table>

	<br>
				
	<table class="vis">
		<tr>
			<th colspan="2">
				Informacje
			</th>
		</tr>
		<tr>
			<td>
				Surowce mo¿liwe do spl¹drowania:
			</td>
			<td>
				<img src="/ds_graphic/holz.png" title="Drewno" alt="" /> {$p_wood}
				<img src="/ds_graphic/lehm.png" title="Glina" alt="" />{$p_stone}
				<img src="/ds_graphic/eisen.png" title="¯elazo" alt="" />{$p_iron}
			</td>
		</tr>
		<tr>
			<td colspan="2">
				Oferty na rynku s¹ mo¿liwe do spl¹drowania.
			</td>
		</tr>
	</table>
{/if}