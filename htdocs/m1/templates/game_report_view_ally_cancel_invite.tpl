<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$report.from_user}">{$report.from_username|urldecode}</a> cancelou o seu convite para a tribo
{if $report.ally_exist==0}{$report.allyname} (apagada){else}<a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$report.ally}">{$report.allyname}</a>{/if}.