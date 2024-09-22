<?php /* Smarty version 2.6.14, created on 2010-11-19 18:36:00
         compiled from index_debugger.tpl */ ?>
<h2>Debugger</h2>
Der Debugger dient dazu, um in der Laufzeit einer Runde Bugs zu umgehen.<br /><br />
	
<?php if ($this->_tpl_vars['done'] == 'attacks'): ?>
	Angriffe wurden neu berechnet!
<?php elseif ($this->_tpl_vars['done'] == 'reload_events'): ?>
	Alle Ereignisse wurden neu berechnet!
<?php else: ?>
	<a href="index.php?screen=debugger&action=attacks">Angriffe</a><br />
	Dieser Debugger behebt falsche Anzeige der Angriffsanzahl. Da dieser Bug leider immer wieder Auftritt, gibt es hier nun einen Debugger. Dieser Berechnet für alle Dörfer und Spieler die Angriffe neu.<br />

<?php endif; ?>