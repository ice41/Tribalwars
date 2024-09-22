<h2>Nivelul cladirilor la start!</h2>
Aici setati nivelul de start al cladirilor . (Adica useri cand intra in joc primesc nivelul cladirilor setate aici)
{if !empty($error)}
	<br /><br /><font class="error">{$error}</font><br />
{/if}
<form method="post" action="index.php?screen=start_buildings&action=edit">
	<table class="vis">
		<tr>
			<th>Cladiri</th>
			<th>Nivelul</th>
		</tr>
		{foreach from=$buildings item=arr key=dbname}
			<tr>
				<td><img src="../graphic/buildings/{$dbname}.png"> {$arr.name}:</td>
				<td><input type="text" size="4" name="{$dbname}" value="{$arr.stage}"></td>
			</tr>
		{/foreach}
		<tr>
			<td colspan="2" align="center"><input name="standard" type="submit" value="Setarile Standard"> <input type="submit" value="Modifica"></td>
		</tr>
	</table>
</form>