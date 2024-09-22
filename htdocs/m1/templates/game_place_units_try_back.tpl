<h3>Unterstützung zurückziehen</h3>

<form name="units" action="game.php?village={$village.id}&amp;screen=place&amp;action=back&amp;unit_id={$unit_id}&amp;mode=units&amp;h={$hkey}" method="post">
	<table>
		<tr>
			{assign var=counter value=0}
			{foreach from=$group_units key=group_name item=value}
				<td width="150" valign="top">
					<table class="vis" width="100%">
						{foreach from=$group_units.$group_name item=dbname}
							{* Counter um 1 erhöhren für den Tab für die Input Felder *}
							{math assign=counter equation="x + y" x=$counter y=1}
							<tr>
								<td>
									<a href="javascript:popup('popup_unit.php?unit={$dbname}', 520, 520)"><img src="graphic/unit/{$dbname}.png" title="{$cl_units->get_name($dbname)}" alt="" /></a> <input name="{$dbname}" type="text" size="5" tabindex="{$counter}" value="{if $arr_units.$dbname>0}{$arr_units.$dbname}{/if}" /> <a href="javascript:insertUnit(document.forms[0].{$dbname}, {$arr_units.$dbname})">({$arr_units.$dbname})</a>
								</td>
							</tr>
						{/foreach}
					</table>
				</td>
			{/foreach}
		</tr>
	</table>
<input type="submit" value="&raquo; OK " style="font-size: 10pt;" />
</form>