
<table width="100%" class="vis">
		<tr>			<th>ID</th><th>Nick</th>

		</tr>


{foreach from=$gracze item=gracz key=id}
										<tr {if $gracz.id == $user.id}class="selected"{/if}>

<td><strong><a href="game.php?village={$village.id}&screen={if $strona_mail}admin&mode=mail&do=1&us={$gracz.id}{else}admin&mode=users&id={$gracz.id}{/if}">{$gracz.id}</a></td>

<td><strong><font color="{if $gracz.admin != 0}orange{else}red{/if}"> {$gracz.username}</font></td></tr>															
												{/foreach}



		
</table>

<table class="vis" width="108%"><tr>
						{if $aktu_page_ra > 0}
							<td align="center" width="50%">
								<a href="game.php?village={$village.id}&screen={if $strona_mail}admin&mode=mail&do=1&us={$gracz.id}{else}admin&mode=users&id={$gracz.id}{/if}&page={$aktu_page_ra-1}">&lt;&lt;&lt; acima</a>
							</td>
						{/if}
						<td align="center" width="50%">
							<a href="game.php?village={$village.id}&screen={if $strona_mail}admin&mode=mail&do=1&us={$gracz.id}{else}admin&mode=users&id={$gracz.id}{/if}&amp;page={$aktu_page_ra+1}">na dół &gt;&gt;&gt;</a>
						</td>
					</tr></table>