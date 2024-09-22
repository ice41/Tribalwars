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
		{foreach from=$production_arr item=lev}
			<tr>
				<td width="200">
					<img src="/ds_graphic/{$sur_name}.png" alt="" />
					{$lev.opis}
				</td>
				<td>
					<b>{$lev.produkcja}</b>
					na godzin�
				</td>
			</tr>
		{/foreach}
	</table>
	
	<br>
	
	<table class="vis">
		<tr>
			<td width="60%">
				Ilo�� surowc�w wyprodukowanych do tej pory.:
			</td>
			<td>
				od: {$time_last_rel} ({$day_last_rel} {if $day_last_rel == 1}Dzie�{else}Dni{/if})
			</td>
			<td>
				<img src="/ds_graphic/{$sur_name}.png" alt="" /> <b>{$sur_dtp}</b>
			</td>
			<td>
				<a href="game.php?village={$village.id}&screen={$sur_name}&action=resetCounter&h={$hkey}">
					resetuj
				</a>
			</td>
		</tr>
	</table>
{/if}