<h2>Externer Login</h2>
Der Externer Login dient dazu, dass sich Spieler einloggen können und Vorbereitungen treffen können, ohne von anderen Spielern gestört zu werden!<br /><br />

{if empty($hash)}
	<a href="index.php?screen=extern_login&action=open">Externen Login öffnen</a>
{else}
	Kann aufgerufen werden über folgende Adresse:
	<a href="../extern_login.php?hash={$hash}" target="_blank">hier</a><br /><br />
	<a href="index.php?screen=extern_login&action=close">Externen Login schließen</a>
{/if}
