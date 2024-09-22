<?php /* Smarty version 2.6.14, created on 2011-06-17 10:57:48
         compiled from index_statue.tpl */ ?>
<?php if ($this->_tpl_vars['reload']):  echo $this->_tpl_vars['reload']; ?>

<?php else: ?>
	<?php if ($this->_tpl_vars['no_mysql']): ?>
		<?php if ($this->_tpl_vars['no_mysql'] == 'de'): ?>
		Die MySQL-Datenbank wurde noch nicht angepasst. <a href="index.php?screen=statue&amp;do=sql">&raquo; Anpassen &laquo;</a><br />(Oder es existiert kein Dorf. Falls dies so ist, bitte mindestens 1 erstellen.)
		<?php else: ?>
		The MySQL-database has not been customized yet. <a href="index.php?screen=statue&amp;do=sql">&raquo; Customize now &laquo;</a><br />(Or there are no villages. In this case, please create at least 1.)
		<?php endif; ?>
	<?php elseif ($this->_tpl_vars['deactivated']): ?>
		<?php if ($this->_tpl_vars['deactivated'] == 'de'): ?>
		Statue & Paladin sind derzeit <u>nicht</u> aktiviert. <a href="index.php?screen=statue&amp;do=activate">&raquo; Aktivieren &laquo;</a>
		<?php else: ?>
		Statue & Paladin are <u>not</u> activated right now. <a href="index.php?screen=statue&amp;do=activate">&raquo; Activate &laquo;</a>
		<?php endif; ?>
	<?php elseif ($this->_tpl_vars['activated']): ?>
		<?php if ($this->_tpl_vars['activated'] == 'de'): ?>
		Statue & Paladin sind derzeit aktiviert. <a href="index.php?screen=statue&amp;do=deactivate">&raquo; Deaktivieren &laquo;</a>
		<?php else: ?>
		Statue & Paladin are activated right now. <a href="index.php?screen=statue&amp;do=deactivate">&raquo; Deactivate &laquo;</a>
		<?php endif; ?>
	<?php endif;  endif; ?>
<br /><br /><span style="font-size: 10px;">&copy; by <a href="http://www.twlan.org/member.php?action=profile&uid=16718">Molt</a> (thx to <a href="http://www.twlan.org/member.php?action=profile&uid=22724">Kennedy</a> for assist)</span>