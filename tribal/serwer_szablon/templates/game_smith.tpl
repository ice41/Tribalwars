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
			<br>
			<a href="game.php?village={$village.id}&screen=smith&action=ulepsz_wszystkie_tech">&raquo; Ulepszyæ wszystkie technologie</a>
		</td>
	</tr>
</table>
<br />

{if !empty($error)}
	<font class="error">{$error}</font>
{/if}

{if $show_build}
	{* Aktuelle Forschung *}
	{if is_array($vill_research)}
		<table class="vis">
			<tr>
				<th width="220">Techonolgia</th>
				<th width="100">Trwanie</th>
				<th width="120">Ukoñczenie</th>
				<th>Zakoñcz</th>
			</tr>
			{foreach from=$vill_research key=id item=arr}
				<tr {if $arr.lit}class="lit"{/if}>
					<td>{$cl_techs->get_name($arr.research)} (Poziom {$arr.stage})</td>
					{if $arr.lit && $arr.countdown>-1}
						<td>
							<span class="timer">{$arr.countdown|format_time}</span>
						</td>
					{else}
						<td>{$arr.countdown|format_time}</td>
					{/if}
					<td>
						{$pl->format_date($arr.end_time)}
					</td>
					<td>
						<a href="game.php?village={$village.id}&amp;screen=smith&amp;action=cancel&amp;id={$id}&amp;h={$hkey}">przerwij</a>
					</td>
				</tr>
			{/foreach}
		</table>
		<br />
	{/if}
	
	<table class="vis" width="100%">
		<tr>
			{foreach from=$group_techs item=group_name}
				<th width="{$table_width}%">{$group_name}</th>
			{/foreach}
		</tr>
		<tr>
			{foreach from=$group_techs item=group_name}
				{if is_array($techs_columns.$group_name)}
					<td valign="top">
						{foreach from=$techs_columns.$group_name item=TechName}
							{$cl_techs->check_tech($TechName,$village)}
							<table class="vis">
								<tr>
									<td>
										<a href="javascript:popup('popup_unit.php?unit=unit_{$TechName}&amp;level=0', 520, 520)">
											<img src="/ds_graphic/unit_big/{$cl_techs->get_graphic()}" alt="" />
										</a>
									</td>
									<td valign="top">
										<a href="javascript:popup('popup_unit.php?unit=unit_{$TechName}&amp;level=0', 520, 520)">
											{$cl_techs->get_name($TechName)}
										</a> 
										{if $techs.$TechName > 0}
											(Poziom {$techs.$TechName})	
										{else}
											(Nie zbadane)
										{/if}
										<br />
										{if $cl_techs->get_last_error()=='not_enough_ress'}
											<br />
											<img src="/ds_graphic/holz.png" title="Holz" alt="" /> {$cl_techs->get_wood($TechName,$techs_res.$TechName+1)}
											<img src="/ds_graphic/lehm.png" title="Lehm" alt="" />{$cl_techs->get_stone($TechName,$techs_res.$TechName+1)} 
											<img src="/ds_graphic/eisen.png" title="Eisen" alt="" />{$cl_techs->get_iron($TechName,$techs_res.$TechName+1)}
											<br />
											<span class="inactive">Surowce dostêpne za 
												<span class="timer_replace">{$cl_techs->get_time_wait()}</span>
											</span>
											<span style="display:none">Surowce dostêpne.</span>
										{elseif $cl_techs->get_last_error()=='not_fulfilled'}
											<span class="inactive">Wymagania budynkowe nie zosta³y spe³nione.</span>
										{elseif $cl_techs->get_last_error()=='max_stage'}
											<span class="inactive">Zbadane.</span>
										{elseif $cl_techs->get_last_error()=='not_enough_storage'}
											<br />
											<img src="/ds_graphic/holz.png" title="Holz" alt="" /> {$cl_techs->get_wood($TechName,$techs_res.$TechName+1)} 
											<img src="/ds_graphic/lehm.png" title="Lehm" alt="" />{$cl_techs->get_stone($TechName,$techs_res.$TechName+1)} 
											<img src="/ds_graphic/eisen.png" title="Eisen" alt="" />{$cl_techs->get_iron($TechName,$techs_res.$TechName+1)}
											<br /><span class="inactive">Za ma³a pojemnoœæ spichlerza.</span>
										{else}
											<br />
											<img src="/ds_graphic/holz.png" title="Holz" alt="" /> {$cl_techs->get_wood($TechName,$techs_res.$TechName+1)}
											<img src="/ds_graphic/lehm.png" title="Lehm" alt="" />{$cl_techs->get_stone($TechName,$techs_res.$TechName+1)} 
											<img src="/ds_graphic/eisen.png" title="Eisen" alt="" />{$cl_techs->get_iron($TechName,$techs_res.$TechName+1)}
											{if $techs_res.$TechName < 1}
												<br />
												<a href="game.php?village={$village.id}&amp;screen=smith&amp;action=research&amp;id={$TechName}&amp;h={$hkey}">
													&raquo; Zbadaæ
												</a> 
												({$cl_techs->get_time($village.smith,$TechName,$techs_res.$TechName+1)|format_time})
											{else}
												<br />
												<a href="game.php?village={$village.id}&amp;screen=smith&amp;action=research&amp;id={$TechName}&amp;h={$hkey}">
													&raquo; Ulepszyæ na poziom {$techs_res.$TechName+1}
												</a> 
												({$cl_techs->get_time($village.smith,$TechName,$techs_res.$TechName+1)|format_time})
											{/if}
										{/if}
									</td>
								</tr>
							</table>
						{/foreach}
					</td>
				{/if}
			{/foreach}
		</tr>
	</table>
{/if}
