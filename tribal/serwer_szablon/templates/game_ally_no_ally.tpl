<h2>Plemi�</h2>
{if !empty($error)}
	<div style="color:red; font-size:large">{$error}</div>
{/if}
<p>By zosta� cz�onkiem plemienia, musisz zosta� zaproszony przez administrator�w lub moderator�w plemienia.</p>

<form action="game.php?village={$village.id}&amp;screen=ally&amp;action=create&amp;h={$hkey}" method="post">
<table class="vis">
<tr><th colspan="2">Utw�rz plemi�</th></tr>
<tr><td>Nazwa plemienia:</td><td><input type="text" name="name" /></td></tr>
<tr><td>Skr�t:
(maksymalnie sze�� liter)</td><td><input type="text" name="tag" maxlength="6" /></td></tr>
</table>
<input type="submit" value="Utw�rz" style="font-size:10pt;" />
</form>
<br />
	
<table class="vis">
<tr><th colspan="3" width="400">Zaproszenia</th></tr>
	{foreach from=$invites item=arr key=id}
		<tr>
		<td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$arr.from_ally}">{$arr.tag}</a></td>
		<td align="center"><a href="game.php?village={$village.id}&amp;screen=ally&amp;action=accept_invite&amp;id={$id}&amp;h={$hkey}">Przyj��</td>
		<td align="center"><a href="game.php?village={$village.id}&amp;screen=ally&amp;action=reject&amp;id={$id}&amp;h={$hkey}">Odrzuci�</td>
		</tr>
	{/foreach}
</table>