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
			<h2>{$cl_builds->get_name($dbname)} ({if $village.$dbname > 0}Nível {$village.$dbname}{else}Não construído{/if})</h2>
			{$cl_builds->get_description_bydbname($dbname)}
		</td>
	</tr>
</table>
<br />

{if $village.$screen > 0}
	<table class="vis">
		<tr>
			<th width="150">
				Nível da moralha
			</th>
			<th width="220">
				Bônus defensivo em porcentagem
			</th>
			<th width="150">
				Defesa terrestre
			</th>
		</tr>
		{foreach from=$wall_arr item=lev}
			<tr>
				<td>
					{$lev.opis}
				</td>
				<td>
					{$lev.bonus}
				</td>
				<td>
					{$lev.gruntowa}
				</td>
			</tr>
		{/foreach}
	</table>
{/if}
