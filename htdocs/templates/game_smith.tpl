<table>
	<tr>
		<td>
			<img src="graphic/big_buildings/smith.png" title="Fier&#259;rie" alt="" />
		</td>
		<td>
			<h2>Fier&#259;rie (Nivelul {$village.smith|replace:"stufe":"nivel"})</h2> {$description}
<br><br>				</td>
	</tr>
</table>
<br />
{if !empty($error)}
	<font class="error">{$error}</font>
{/if}
{if $show_build}
	{* Aktuelle Forschung *}
	{if $is_researches}
		<table class="vis">
		<tr>
			<th width="220">Comanda de cercetare</td>
			<th width="100">Durat&#259;</td>
			<th width="120">Terminare</td>
			<td rowspan="2"><a href="game.php?village={$village.id}&amp;screen=smith&amp;action=cancel&amp;h={$hkey}">Anulare</a></td>
		</tr>
		<tr>
		    {assign var=research_unitname value=$research.research}
			<td>{$cl_techs->get_name($research.research)} (Nivelul {$techs.$research_unitname+1})</td>
			{if ($research.end_time < $time)}
			    <td>{$research.reminder_time|format_time}</td>
			{else}
			    <td><span class="timer">{$research.reminder_time|format_time}</span></td>
			{/if}
			<td>{$research.end_time|format_date}</td>
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
									<td valign="top"><a href="javascript:popup('popup_unit.php?unit=unit_{$group_techs.$group_name.$num}&amp;level=0', 520, 520)">{$cl_techs->get_name($group_techs.$group_name.$num)}</a> (Nivelul {$techs.$unitname|replace:"stufe":"nivel"})	
										<br />
										{if $cl_techs->get_last_error()=='not_enough_ress'}
											<br /><img src="graphic/holz.png" title="Lemn" alt="" />{$cl_techs->get_wood($unitname,$techs.$unitname+1)} <img src="graphic/lehm.png" title="Argil&#259;" alt="" />{$cl_techs->get_stone($unitname,$techs.$unitname+1)} <img src="graphic/eisen.png" title="Fier" alt="" />{$cl_techs->get_iron($unitname,$techs.$unitname+1)}
											<br /><span class="inactive">Materii prime disponibile &#238;n<span class="timer_replace">{$cl_techs->get_time_wait()}</span></span><span style="display:none">Materiile sunt disponibile</span>
										{elseif $cl_techs->get_last_error()=='not_fulfilled'}
											<span class="inactive">Conditiile de construire nu sunt &#238;ndeplinite.</span>
										{elseif $cl_techs->get_last_error()=='max_stage'}
											<span class="inactive">Unitate cercetat&#259;</span>
										{elseif $cl_techs->get_last_error()=='not_enough_storage'}
											<br /><img src="graphic/holz.png" title="Lemn" alt="" />{$cl_techs->get_wood($unitname,$techs.$unitname+1)} <img src="graphic/lehm.png" title="Argila" alt="" />{$cl_techs->get_stone($unitname,$techs.$unitname+1)} <img src="graphic/eisen.png" title="Fier" alt="" />{$cl_techs->get_iron($unitname,$techs.$unitname+1)}
											<br /><span class="inactive">Depozitul de resurse este prea mic.</span>
										{else}
											<br /><img src="graphic/holz.png" title="Lemn" alt="" />{$cl_techs->get_wood($unitname,$techs.$unitname+1)} <img src="graphic/lehm.png" title="Argila" alt="" />{$cl_techs->get_stone($unitname,$techs.$unitname+1)} <img src="graphic/eisen.png" title="Fier" alt="" />{$cl_techs->get_iron($unitname,$techs.$unitname+1)}
											{if $is_researches}
											    <br /><span class="inactive">Cercetare</span> ({$cl_techs->get_time($village.smith,$unitname,$techs.$unitname+1)|format_time})
											{else}
												{if $techs.$unitname < 1}
													<br /><a href="game.php?village={$village.id}&amp;screen=smith&amp;action=research&amp;id={$unitname}&amp;h={$hkey}">&raquo; Cerceteaz&#259;</a> ({$cl_techs->get_time($village.smith,$unitname,$techs.$unitname+1)|format_time})
												{else}
													<br /><a href="game.php?village={$village.id}&amp;screen=smith&amp;action=research&amp;id={$unitname}&amp;h={$hkey}">&raquo; Cerceteaz&#259; etapa {$techs.$unitname+1}</a> ({$cl_techs->get_time($village.smith,$unitname,$techs.$unitname+1)|format_time})
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
