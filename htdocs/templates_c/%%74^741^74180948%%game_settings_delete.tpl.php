<?php /* Smarty version 2.6.14, created on 2024-01-10 01:48:34
         compiled from game_settings_delete.tpl */ ?>
<h2>Stergere cont</h2>

Hier kannst du dich l&ouml;schen, wenn du nicht mehr spielen m&ouml;chtest!<br>
Beachte bitte, dass du das nicht mehr r&uuml;ckg&auml;ngig machen kannst.<br>
Zur Sicherheit musst du nochmal dein Passwort eingeben.<br>
<p>&nbsp;</p>
<form action="?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=settings&mode=delete&hkey=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
 <input name="pw" type="password"><input type="submit" value="Sterge">
</form>