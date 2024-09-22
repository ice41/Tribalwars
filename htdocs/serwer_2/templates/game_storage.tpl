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
				{if aktu_build_prc > 0.5}
					<img src="graphic/big_buildings/{$dbname}3.png" title="{$cl_builds->get_name($dbname)}" alt="" />
				{else}
					{if $aktu_build_prc > 0.2}
						<img src="graphic/big_buildings/{$dbname}2.png" title="{$cl_builds->get_name($dbname)}" alt="" />
					{else}
						<img src="graphic/big_buildings/{$dbname}1.png" title="{$cl_builds->get_name($dbname)}" alt="" />
					{/if}
				{/if}
			{else}
				<img src="graphic/big_buildings/{$dbname}1.png" title="{$cl_builds->get_name($dbname)}" alt="" />
			{/if}
		</td>
		<td>
			<h2>{$cl_builds->get_name($dbname)} ({if $village.$dbname > 0}Poziom {$village.$dbname}{else}Nie zbudowano{/if})</h2>
			{$cl_builds->get_description_bydbname($dbname)}
		</td>
	</tr>
</table>
<br />

<table class="vis">
	{foreach from=$storage_arr item=lev}
	<tr>
		<td width="200">
			<img src="graphic/res.png" alt="" />
			{$lev.opis}
		</td>
		<td>
			<b>{$lev.produkcja}</b>
			Surowców
		</td>
	</tr>
	{/foreach}
</table>

<br />

<table class="vis">
	<tr>
		<th width="150">
			Spichlerz pe³ny
		</th>
		<th>
			Czas (hh:mm:ss)
		</th>
	</tr>
	{if $wood_is_full}
		<tr>
			<td width="250" colspan="2">
				<img src="graphic/wood.png" title="Drewno" alt="" />
				Spichlerz jest pe³ny
			</td>
		</tr>
	{else}
		<tr>
			<td width="250">
				<img src="graphic/wood.png" title="Drewno" alt="" />
				{$pl->format_date($end_wood)}
			</td>
			<td>
				<span class="timer">{$time_wood|format_time}</span>
			</td>
		</tr>
	{/if}
	{if $stone_is_full}
		<tr>
			<td width="250" colspan="2">
				<img src="graphic/stone.png" title="Glina" alt="" />
				Spichlerz jest pe³ny
			</td>
		</tr>
	{else}
		<tr>
			<td width="250">
				<img src="graphic/stone.png" title="Glina" alt="" />
				{$pl->format_date($end_stone)}
			</td>
			<td>
				<span class="timer">{$time_stone|format_time}</span>
			</td>
		</tr>
	{/if}
	{if $iron_is_full}
		<tr>
			<td width="250" colspan="2">
				<img src="graphic/iron.png" title="¯elazo" alt="" />
				Spichlerz jest pe³ny
			</td>
		</tr>
	{else}
		<tr>
			<td width="250">
				<img src="graphic/iron.png" title="¯elazo" alt="" />
				{$pl->format_date($end_iron)}
			</td>
			<td>
				<span class="timer">{$time_iron|format_time}</span>
			</td>
		</tr>
	{/if}
</table>