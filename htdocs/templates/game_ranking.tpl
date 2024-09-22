<table width="100%" align="center">
	<tr>
		<td>
			<h2>{$lang->grab("ranking", "ranking")}</h2>
				<table>
					<tr>
						<td valign="top" width="120">
							<table class="vis">
                                {foreach from=$links item=f_mode key=f_name}
									{if $f_mode==$mode}

								<tr>
                        			<td class="selected" width="120">
										<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode={$f_mode}">{$f_name}</a>
									</td>
                    			</tr>

									{else}
                    			<tr>
                        		<td width="120">
									<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode={$f_mode}">{$f_name}</a>
								</td>
							</tr>
									{/if}
								{/foreach}
						     <tr>
							 <td width="120px" {if $mode == 'awards'}style="background-color: #F0D49A;"{/if}>
							 <a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=awards" style="text-decoration: none;color: #884000;">Awards</a>
							 </td>
							 </tr>
                		</table>
            		</td>
					<td valign="top" align="left">

						{if in_array($mode,$allow_mods)}

							{include file="game_ranking_$mode.tpl" title=foo}
                         
						{/if}
						{if $mode == 'awards'}
						{include file="game_ranking_awards.tpl" title=foo}
						{/if}
            		</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
