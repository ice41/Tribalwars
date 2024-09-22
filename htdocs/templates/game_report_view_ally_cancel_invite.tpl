<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$report.from_user}">{$report.from_username}</a> a acceptat invita&#355;ia &#238;n trib
{if $report.ally_exist==0}{$report.allyname} (aufgelöst){else}<a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$report.ally}">{$report.allyname}</a>{/if}
&nbsp;retrase.