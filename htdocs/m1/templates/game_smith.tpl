<table>
	<tr>
		<td><img src="../graphic/build/smith.jpg" title="Ferreiro" alt="" /></td>
		<td>
			<h2>Ferreiro ({$village.smith|nivel})</h2>
			{$description}
		</td>
	</tr>
</table>
{if !empty($error)}
<div class="error">{$error}</div>
{/if}
{if $show_build}
{if $is_researches}
<table class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th width="220">Perquisa</th>
		<th width="100">Dura&ccedil;&atilde;o</th>
		<th width="120">T&eacute;rmino</th>
		<th rowspan="2"><a href="game.php?village={$village.id}&amp;screen=smith&amp;action=cancel&amp;h={$hkey}">cancelar</a></th>
	</tr>
	<tr class="lit">
    	{assign var=research_unitname value=$research.research}
		<td class="selected">{$cl_techs->get_name($research.research)} ({$techs.$research_unitname+1|nivel})</td>
		{if ($research.end_time < $time)}
    	<td class="selected"><span class="timer">{$research.reminder_time+1|format_time}</span></td>
		{else}
	    <td class="selected"><span class="timer">{$research.reminder_time+1|format_time}</span></td>
		{/if}
		<td class="selected">{$research.end_time|format_date|replace:"heute um":"hoje &agrave;s"|replace:"Uhr":""|replace:"am":"em"|replace:"um":"&agrave;s"|replace:"morgen":"amanh&atilde;"}</td>
	</tr>
</table><br />
{/if}
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
	{foreach from=$group_techs item=item key=group_name}
		<th width="{$table_width}%">{$group_name}</th>
	{/foreach}
	</tr>
	{section name=counter start=0 loop=$maxNum_groupTech step=1}
		{assign var=num value=$smarty.section.counter.index}
	<tr>
		{foreach from=$group_techs item=item key=group_name}
			{if !empty($group_techs.$group_name.$num)}
				{assign var=unitname value=$group_techs.$group_name.$num}
		<td>
				{$cl_techs->check_tech($group_techs.$group_name.$num,$village)}
			<table class="vis">
				<tr>
					<td><a href="javascript:popup('popup_unit.php?unit=unit_{$group_techs.$group_name.$num}&amp;level={$techs.$unitname}', 520, 520)"><img src="../graphic/unit_big/{$cl_techs->get_graphic()}" alt="" /></a></td>
					<td valign="top"><a href="javascript:popup('popup_unit.php?unit=unit_{$group_techs.$group_name.$num}&amp;level={$techs.$unitname}', 520, 520)">{$cl_techs->get_name($group_techs.$group_name.$num)}</a> ({$techs.$unitname|tech})<br />
						{if $cl_techs->get_last_error()=='not_enough_ress'}
						<br /><img src="../graphic/icons/wood.png" title="Madeira" alt="" />{$cl_techs->get_wood($unitname,$techs.$unitname+1)} <img src="../graphic/icons/stone.png" title="Argila" alt="" />{$cl_techs->get_stone($unitname,$techs.$unitname+1)} <img src="../graphic/icons/iron.png" title="Ferro" alt="" />{$cl_techs->get_iron($unitname,$techs.$unitname+1)}
						<br /><span class="inactive">Recursos disponiveis em <span class="timer_replace">{$cl_techs->get_time_wait()}</span></span><span style="display:none">Recurssos disponiveis.</span>
									{elseif $cl_techs->get_last_error()=='not_fulfilled'}
						<span class="inactive">Requerimentos n&atilde;o atingidos.</span>
									{elseif $cl_techs->get_last_error()=='max_stage' && $cl_techs->get_last_error()!='not_fulfilled'}
						<span class="inactive">Pesquisado.</span>
									{elseif $cl_techs->get_last_error()=='not_enough_storage'}
						<br /><img src="../graphic/icons/wood.png" title="Madeira" alt="" />{$cl_techs->get_wood($unitname,$techs.$unitname+1)} <img src="../graphic/icons/stone.png" title="Argila" alt="" />{$cl_techs->get_stone($unitname,$techs.$unitname+1)} <img src="../graphic/icons/iron.png" title="Ferro" alt="" />{$cl_techs->get_iron($unitname,$techs.$unitname+1)}
						<br /><span class="inactive">Armaz&eacute;m muito pequeno.</span>
									{else}
						<br /><img src="../graphic/icons/wood.png" title="Madeira" alt="" />{$cl_techs->get_wood($unitname,$techs.$unitname+1)} <img src="../graphic/icons/stone.png" title="Argila" alt="" />{$cl_techs->get_stone($unitname,$techs.$unitname+1)} <img src="../graphic/icons/iron.png" title="Ferro" alt="" />{$cl_techs->get_iron($unitname,$techs.$unitname+1)}
										{if $is_researches}
					    <br /><span class="inactive">Pesquisa em andamento.</span> ({$cl_techs->get_time($village.smith,$unitname,$techs.$unitname+1)+1|format_time})
										{else}
											{if $techs.$unitname < 1}
						<br /><a href="game.php?village={$village.id}&amp;screen=smith&amp;action=research&amp;id={$unitname}&amp;h={$hkey}">&raquo; Pesquisar</a> ({$cl_techs->get_time($village.smith,$unitname,$techs.$unitname+1)+1|format_time})
											{else}
						<br /><a href="game.php?village={$village.id}&amp;screen=smith&amp;action=research&amp;id={$unitname}&amp;h={$hkey}">&raquo; Pesquisar {$techs.$unitname+1|nivel}</a> ({$cl_techs->get_time($village.smith,$unitname,$techs.$unitname+1)+1|format_time})
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