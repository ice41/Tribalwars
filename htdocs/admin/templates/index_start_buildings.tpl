<h2>Incepe construirea</h2>
Aici poti seta ce level sa aiba cladirile la inceputul jocului.
{if !empty($error)}
	<br /><br /><font class="error">{$error}</font><br />
{/if}
<form method="post" action="index.php?screen=start_buildings&action=edit">
	<table class="vis">
		<tr>
			<th>Cladire</th><th>Nivel</th>
		</tr>
		{foreach from=$buildings item=arr key=dbname}
			<tr>
				<td><img src="../graphic/buildings/{$dbname}.png"> {$arr.name}:</td>
				<td><input type="text" size="4" name="{$dbname}" value="{$arr.stage}"></td>
			</tr>
		{/foreach}
		<tr>
			<td colspan="2" align="center"><input name="standard" type="submit" value="Setarile standard"> <input type="submit" value="Salveaza"></td>
		</tr>
	</table>
</form>