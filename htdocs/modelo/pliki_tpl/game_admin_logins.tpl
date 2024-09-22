<div id="show_logins" class="vis moveable widget">
	<h4 class="head">
		<img style="float: right; cursor: pointer;" onclick="return VillageOverview.toggleWidget( 'show_logins', this );" src="graphic/minus.png">		Faça login nos jogadores no servidor
	</h4>
	<div class="widget_content" style=""><table class="vis" width="100%">
		<tr><th>ID</th><th>Jogador:</th><th>ID jogador:</th><th>IP:</th><th>Data:</th>

{foreach from=$logowania item=lg}


<tr {if $user.id == $lg.userid}class="lit"{/if}><td>{if $user.id == $lg.userid}<strong>{/if}{$lg.id}<td>{if $user.id == $lg.userid}<strong>{/if}<a href="game.php?village={$village.id}&screen=info_player&id={$lg.userid}">{$lg.username}</a><td>{if $user.id == $lg.userid}<strong>{/if}{$lg.userid}<td><a href="game.php?village={$village.id}&screen=admin&mode=logins&sm=ip&ip={$lg.ip}">{if $lg.ip == '127.0.0.1'}Localhost{else}{$lg.ip}{/if}</a><td>{if $user.id == $lg.userid}<strong>{/if}{$lg.time}</tr>

{/foreach}

	</tbody></table>
<table class="vis" width="100%">
				<tbody>
					<tr>
						{if $aktu_page_ra > 0}
							<td align="center" width="50%">
								<a href="game.php?village={$village.id}&amp;screen=admin&amp;mode=logins&sm={php}$sm = $_GET['sm']; echo $sm;{/php}{php}if ($sm == ip) {$ip = $_GET['ip']; echo '&ip='.$ip.'';   }{/php}&amp;page={$aktu_page_ra-1}">&lt;&lt;&lt; Starsze</a>
							</td>
						{/if}
						<td align="center" width="50%">
<a href="game.php?village={$village.id}&amp;screen=admin&amp;mode=logins&sm={php}$sm = $_GET['sm']; echo $sm;{/php}{php}if ($sm == ip) {$ip = $_GET['ip']; echo '&ip='.$ip.'';   }{/php}&amp;page={$aktu_page_ra+1}">Nowsze &gt;&gt;&gt;</a>
						</td>
					</tr>
				</tbody>
			</table>
</div>
</div> 






