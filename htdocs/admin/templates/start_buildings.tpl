<h2>Start Gebäude</h2>
Hier können die Standart Gebäude eingestellt werden, mit dennen jedes Dorf beginnt.

<form method="post" action="index.php?screen=start_buildings&action=edit">
	<table class="vis">
		<tr>
			<th>Gebäude</th><th>Stufe</th>
		</tr>
		{foreach from=$buildings item=arr key=dbname}
			<tr>
				<td><img src="../graphic/buildings/{$dbname}.png"> {$arr.name}:</td>
				<td><input type="text" size="4" name="{$dbname}" value="{$arr.stage}"></td>
			</tr>
		{/foreach}
		<tr>
			<td colspan="2" align="center"><input name="standard" type="submit" value="Stardard Einstellungen"> <input type="submit" value="Speichern"></td>
		</tr>
	</table>
</form>