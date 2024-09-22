{if !empty($error)}
	<span class="error"/>{$error}</span>
{/if}

<h2>Ranking</h2>

<table width="100%">
	<tbody>
		<tr>
			<td valign="top" width="130">
				<table class="vis modemenu">
					<tbody>
						{foreach from=$ranking_modes key=name item=dbmode}
							{if $dbmode == $mode}
								<tr>
									<td class="selected" width="100">
										<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode={$dbmode}">{$name} </a>
									</td>
								</tr>
							{else}
								<tr>
									<td width="100">
										<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode={$dbmode}">{$name} </a>
									</td>
								</tr>
							{/if}
						{/foreach}
					</tbody>
				</table>
			</td>
			<td valign="top">
				{include file="game_ranking_$mode.tpl"}
			</td>
		</tr>
	</tbody>
</table>