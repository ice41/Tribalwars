<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$report.from_user}">{$report.from_username}</a> zaprasza do plemienia
{if $report.ally_exist==0}{$report.allyname} (rozwi�zane){else}<a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$report.ally}">{$report.allyname}</a>{/if}
{if $user.ally==-1}
	<p><a href="game.php?village={$village.id}&amp;screen=ally">&raquo; Zaproszenia</a></p>
{/if}