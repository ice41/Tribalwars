<?php /* Smarty version 2.6.14, created on 2011-12-24 09:52:23
         compiled from index_reset.tpl */ ?>
<?php if (! $this->_tpl_vars['suk']): ?>
<h2>Restart gry</h2>

<a href='javascript:ask("Czy naprawd� chcesz usun�� dane tego serwera?","index.php?screen=reset&action=reset")'>Reset: </a>
<br />
Wszystkie dane zostan� utracone!
<?php else: ?>
<font color="green"/>Zrestartowano dane ca�ego serwera.</a>
<?php endif; ?>