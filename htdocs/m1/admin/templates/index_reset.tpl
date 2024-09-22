<h2>Restart server</h2>
{if $error}
	{$error}
{/if}
<form action="index.php?screen=reset&restart=total_server" method="POST">
<table class="vis">
	<tr><th>Restarteaza baza de date - Serverul va fi restartat complet,conturile vor fi sters.</th></tr>
    <tr><td><p>Introdu parola: <input type="pass" name="password" /><input type="submit" value="Restart" /></td></tr>
</table>
</form>