<h2>Flüchtlingslager</h2>

{if !empty($error)}
	<font class="error">{$error}</font><br /><br />
{/if}
{if $success}
	Flüchtlingslager wurden erfolgreich erstellt!
{else}
	<form method="post" action="index.php?screen=refugee_camp&amp;action=create" onSubmit="this.submit.disabled=true;">
		<table class="vis">
			<tr>
				<th colspan="2">Flüchtlingslager erstellen</th>
			</tr>
			<tr>
				<td width="350">Wie viele Flüchtlingslager sollen erstellt werden?<br />(maximal 250)</td>
				<td><input type="text" name="num" value="0"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Erstellen" onload="this.disabled=false;"> Der Vorgang kann bis zu 5 Sekunden dauern!</td>
			</tr>
		</table>
	</form>
{/if}