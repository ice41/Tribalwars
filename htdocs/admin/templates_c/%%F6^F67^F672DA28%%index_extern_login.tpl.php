<?php /* Smarty version 2.6.14, created on 2010-12-17 10:55:10
         compiled from index_extern_login.tpl */ ?>
<h2>Login extern</h2>
Login-ul extern este de a asigura ca jucatorii se pot loga pe server fara a avea vreo problema!<br /><br />

<?php if (empty ( $this->_tpl_vars['hash'] )): ?>
	<a href="index.php?screen=extern_login&action=open">Autentificare externa deschisa</a>
<?php else: ?>
	Pot fi gasite pe urmatoarea adresa:
	<a href="../extern_login.php?hash=<?php echo $this->_tpl_vars['hash']; ?>
" target="_blank">hier</a><br /><br />
	<a href="index.php?screen=extern_login&action=close">Login-ul extern oprit</a>
<?php endif; ?>