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
			<br>
			<a href="game.php?village={$village.id}&screen=smith&action=ulepsz_wszystkie_tech">&raquo; Ulepszyæ wszystkie technologie</a>
		</td>
	</tr>
</table>
<br />
{if !empty($error)}
	<font class="error">{$error}</font>
{/if}
{if !empty($errorr)}
	<font class="error">{$errorr}</font>
{/if}
{if $show_build}
	{* Aktuelle Forschung *}
	{if $is_researches}
		<table class="vis">
		<tr>
			<td width="220">Techonolgia</td>
			<td width="100">Trwanie</td>
			<td width="120">Ukoñczenie</td>
			<td rowspan="2"><a href="game.php?village={$village.id}&amp;screen=smith&amp;action=cancel&amp;h={$hkey}">przerwij</a></td>
		</tr>
		<tr>
		    {assign var=research_unitname value=$research.research}
			<th>{$cl_techs->get_name($research.research)} (Poziom {$techs.$research_unitname+1})</th>
			{if ($research.end_time < $time)}
			    <th>{$research.reminder_time|format_time}</th>
				{php}header('location: game.php?screen=smith&village='.$this->_tpl_vars['village']['id']);{/php}
			{else}
			    <th><span class="timer">{$research.reminder_time|format_time}</span></th>
			{/if}
			<th>{$pl->format_date($research.end_time)}</th>
		</tr>
		</table><br />
	{/if}
	
	<table class="vis" width="100%">
		{* ALLE GRUPPEN AUSLESEN *}
		<tr>
			{foreach from=$group_techs item=item key=group_name}
				<th width="{$table_width}%">{$group_name}</th>
			{/foreach}
		</tr>
		{* EINZELNEN EINHEITEN AUSLESEN *}
		{section name=counter start=0 loop=$maxNum_groupTech step=1}
			{assign var=num value=$smarty.section.counter.index}
			<tr>
				{foreach from=$group_techs item=item key=group_name}
					{if !empty($group_techs.$group_name.$num)}
						{assign var=unitname value=$group_techs.$group_name.$num}
						<td>
							{$cl_techs->check_tech($group_techs.$group_name.$num,$village)}

							<table class="vis">
								<tr><td><a href="javascript:popup('popup_unit.php?unit=unit_{$group_techs.$group_name.$num}&amp;level=0', 520, 520)"><img src="graphic/unit_big/{$cl_techs->get_graphic()}" alt="" /></a></td>
									<td valign="top"><a href="javascript:popup('popup_unit.php?unit={$group_techs.$group_name.$num}&amp;level=0', 520, 520)">{$cl_techs->get_name($group_techs.$group_name.$num)}</a> (Poziom {$techs.$unitname})	
										<br />
										{if $cl_techs->get_last_error()=='not_enough_ress'}
											<br /><img src="graphic/holz.png" title="Holz" alt="" />{$cl_techs->get_wood($unitname,$techs.$unitname+1)} <img src="graphic/lehm.png" title="Lehm" alt="" />{$cl_techs->get_stone($unitname,$techs.$unitname+1)} <img src="graphic/eisen.png" title="Eisen" alt="" />{$cl_techs->get_iron($unitname,$techs.$unitname+1)}
											<br /><span class="inactive">Surowce dostêpne za <span class="timer_replace">{$cl_techs->get_time_wait()}</span></span><span style="display:none">Surowce dostêpne.</span>
										{elseif $cl_techs->get_last_error()=='not_fulfilled'}
											<span class="inactive">Wymagania budynkowe nie zosta³y spe³nione.</span>
										{elseif $cl_techs->get_last_error()=='max_stage'}
											<span class="inactive">Zbadane.</span>
										{elseif $cl_techs->get_last_error()=='not_enough_storage'}
											<br /><img src="graphic/holz.png" title="Holz" alt="" />{$cl_techs->get_wood($unitname,$techs.$unitname+1)} <img src="graphic/lehm.png" title="Lehm" alt="" />{$cl_techs->get_stone($unitname,$techs.$unitname+1)} <img src="graphic/eisen.png" title="Eisen" alt="" />{$cl_techs->get_iron($unitname,$techs.$unitname+1)}
											<br /><span class="inactive">Za ma³a pojemnoœæ spichlerza.</span>
										{else}
											<br /><img src="graphic/holz.png" title="Holz" alt="" />{$cl_techs->get_wood($unitname,$techs.$unitname+1)} <img src="graphic/lehm.png" title="Lehm" alt="" />{$cl_techs->get_stone($unitname,$techs.$unitname+1)} <img src="graphic/eisen.png" title="Eisen" alt="" />{$cl_techs->get_iron($unitname,$techs.$unitname+1)}
											{if $is_researches}
											    <br /><span class="inactive">Badanie w toku.</span> ({$cl_techs->get_time($village.smith,$unitname,$techs.$unitname+1)|format_time})
											{else}
												{if $techs.$unitname < 1}
													<br /><a href="game.php?village={$village.id}&amp;screen=smith&amp;action=research&amp;id={$unitname}&amp;h={$hkey}">&raquo; Zbadaæ</a> ({$cl_techs->get_time($village.smith,$unitname,$techs.$unitname+1)|format_time})
												{else}
													<br /><a href="game.php?village={$village.id}&amp;screen=smith&amp;action=research&amp;id={$unitname}&amp;h={$hkey}">&raquo; Ulepszyæ na poziom {$techs.$unitname+1}</a> ({$cl_techs->get_time($village.smith,$unitname,$techs.$unitname+1)|format_time})
												{/if}
											{/if}
										{/if}
									</td>
								</tr>
							</table>
						</td>
					{/if}
				{/foreach}
			</tr>
		{/section}
	</table>
{/if}
