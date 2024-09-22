<h2>Login extern</h2>
Login-ul extern este de a asigura ca jucatorii se pot loga pe server fara a avea vreo problema!<br /><br />

{if empty($hash)}
	<a href="index.php?screen=extern_login&action=open">Autentificare externa deschisa</a>
{else}
	Pot fi gasite pe urmatoarea adresa:
	<a href="../extern_login.php?hash={$hash}" target="_blank">hier</a><br /><br />
	<a href="index.php?screen=extern_login&action=close">Login-ul extern oprit</a>
{/if}
