<h2>Debugger</h2>
Der Debugger dient dazu, um in der Laufzeit einer Runde Bugs zu umgehen.<br /><br />
	
{if $done=='attacks'}
	Angriffe wurden neu berechnet!
{else}
	<a href="index.php?screen=debugger&action=attacks">Angriffe</a><br />
	Dieser Debugger behebt falsche Anzeige der Angriffsanzahl. Da dieser Bug leider immer wieder Auftritt, gibt es hier nun einen Debugger. Dieser Berechnet für alle Dörfer und Spieler die Angriffe neu.<br />
{/if}