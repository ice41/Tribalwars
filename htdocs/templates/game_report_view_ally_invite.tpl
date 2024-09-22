<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$report.from_user}">{$report.from_username}</a> te-a invitat in tribul
{if $report.ally_exist==0}{$report.allyname} (aufgelöst){else}<a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$report.ally}">{$report.allyname}</a>{/if}
&nbsp; .
{if $user.ally==-1}
	<p><a href="game.php?village={$village.id}&amp;screen=ally">&raquo; Afi&#351;a&#355;i invita&#355;iile</a></p>
{/if}