{if $reload}
{$reload}
{else}
	{if $no_mysql}
		{if $no_mysql == 'de'}
		Die MySQL-Datenbank wurde noch nicht angepasst. <a href="index.php?screen=statue&amp;do=sql">&raquo; Anpassen &laquo;</a><br />(Oder es existiert kein Dorf. Falls dies so ist, bitte mindestens 1 erstellen.)
		{else}
		The MySQL-database has not been customized yet. <a href="index.php?screen=statue&amp;do=sql">&raquo; Customize now &laquo;</a><br />(Or there are no villages. In this case, please create at least 1.)
		{/if}
	{elseif $deactivated}
		{if $deactivated == 'de'}
		Statue & Paladin sind derzeit <u>nicht</u> aktiviert. <a href="index.php?screen=statue&amp;do=activate">&raquo; Aktivieren &laquo;</a>
		{else}
		Statue & Paladin are <u>not</u> activated right now. <a href="index.php?screen=statue&amp;do=activate">&raquo; Activate &laquo;</a>
		{/if}
	{elseif $activated}
		{if $activated == 'de'}
		Statue & Paladin sind derzeit aktiviert. <a href="index.php?screen=statue&amp;do=deactivate">&raquo; Deaktivieren &laquo;</a>
		{else}
		Statue & Paladin are activated right now. <a href="index.php?screen=statue&amp;do=deactivate">&raquo; Deactivate &laquo;</a>
		{/if}
	{/if}
{/if}
<br /><br /><span style="font-size: 10px;">&copy; by <a href="http://www.twlan.org/member.php?action=profile&uid=16718">Molt</a> (thx to <a href="http://www.twlan.org/member.php?action=profile&uid=22724">Kennedy</a> for assist)</span>