<h2>Sat: {$info_village.name}</h2>

<table class="vis">
<tr><th colspan="2">{$info_village.name}</th></tr>
<tr><td width="80">Coordonate:</td><td>{$info_village.x}|{$info_village.y}</td></tr>
<tr><td>Puncte:</td><td width="180">{$info_village.points|format_number}</td></tr>
{if empty($info_user.username)}
	<tr><td>Juc&#259;tor:</td><td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id=0"></a></td></tr>
{else}
	<tr><td>Juc&#259;tor:</td><td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$info_village.userid}">{$info_user.username}</a></td></tr>
{/if}

{if empty($info_ally.short)}
	<tr><td>Trib:</td><td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id=0"></a></td></tr>
{else}
	<tr><td>Trib:</td><td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$info_ally.id}">{$info_ally.short}</a></td></tr>
{/if}

<tr><td colspan="2"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$info_village.x}&amp;y={$info_village.y}">&raquo; Centrarea har&#355;ii</a></th></tr>
<tr><td colspan="2"><a href="game.php?village={$village.id}&amp;screen=place&amp;mode=command&amp;target={$info_village.id}">&raquo; Trimitere de trupe</a></th></tr>
{if $can_send_ress}<tr><td colspan="2"><a href="game.php?village={$village.id}&amp;screen=market&amp;mode=send&amp;target={$info_village.id}">&raquo; Trimitere de materi prime</a></th></tr>{/if}
{if $user.id==$info_village.userid}<tr><td colspan="2"><a href="game.php?village={$info_village.id}&amp;screen=overview">&raquo; Privire general&#259; asupra satului</a></th></tr>{/if}
</table>