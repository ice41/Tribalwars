{if !empty($error)}
	<span class="error"/>{$error}</span>
{/if}

<h2>Definiçoes</h2>
	
<table>
	<tbody>
		<tr>
			<td valign="top">
				<table class="vis modemenu" style="width: 125px;">
					<tbody>	
						{foreach from=$links item=f_mode key=link}
							<tr>
								{if $f_mode == $mode}
									<td width="100" class="selected">
										<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode={$f_mode}">{$link} </a>
									</td>
								{else}
									<td width="100">
										<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode={$f_mode}">{$link} </a>
									</td>
								{/if}
							</tr>
						{/foreach}
					</tbody>
				</table>
			</td>
			<td valign="top">
				{if in_array($mode,$links)}
					{include file="game_settings_$mode.tpl"}
				{/if}
			</td>
		</tr>
	</tbody>
</table>