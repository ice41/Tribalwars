<h2>Raporty</h2>
{php}
$this->_tpl_vars['pl_trans'] = array("all" => "Wszystkie raporty","attack" => "Ataki","defense" => "Obrona","support" => "Pomoc","trade" => "Handel","other" => "Inne");
{/php}
<table>
	<tr>
		<td valign="top">
			<table class="vis" width="75">
				{foreach from=$links item=f_mode key=f_name}
					{if $f_mode==$mode}
						<tr>
							<td class="selected" width="120">
								<a href="game.php?village={$village.id}&amp;screen=report&amp;mode={$f_mode}">{$pl_trans.$f_mode}</a>
							</td>
						</tr>
					{else}
		                <tr>
		                    <td width="120">
								<a href="game.php?village={$village.id}&amp;screen=report&amp;mode={$f_mode}">{$pl_trans.$f_mode}</a>
							</td>
						</tr>
					{/if}
				{/foreach}
			</table>
		</td>
		<td valign="top" width="100%">
			
			{include file="game_report_$do.tpl"}
		</td>
	</tr>
</table>