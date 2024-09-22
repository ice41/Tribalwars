<h2>Plemi�</h2>
{if !empty($error)}
	<div style="color:red; font-size:large">{$error}</div>
{/if}
<p>Para se tornar membro de uma tribo, deve ser convidado pelos administradores ou moderadores da tribo.</p>

<form action="game.php?village={$village.id}&amp;screen=ally&amp;action=create&amp;h={$hkey}" method="post">
<table class="vis">
<tr><th colspan="2">Criar uma tribo</th></tr>
<tr><td>Nome da tribo:</td><td><input type="text" name="name" /></td></tr>
<tr><td>Abreviatura:
(até seis letras)</td><td><input type="text" name="tag" maxlength="6" /></td></tr>
</table>
<input type="submit" value="criar" style="font-size:10pt;" />
</form>
<br />
	
<table class="vis">
<tr><th colspan="3" width="400">Convites</th></tr>
	{foreach from=$invites item=arr key=id}
		<tr>
		<td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$arr.from_ally}">{$arr.tag}</a></td>
		<td align="center"><a href="game.php?village={$village.id}&amp;screen=ally&amp;action=accept_invite&amp;id={$id}&amp;h={$hkey}">aceitar</td>
		<td align="center"><a href="game.php?village={$village.id}&amp;screen=ally&amp;action=reject&amp;id={$id}&amp;h={$hkey}">Rejeitar</td>
		</tr>
	{/foreach}
</table>