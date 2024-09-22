<h2>Runde abspeichern</h2>
Die aktuell laufende Runde kann hier abgespeichert werden und kann dann jederzeit auf der Startseite unter SDS Runden aufgerufen werden.
<br /><br />

{if !empty($error)}
	<br /><br /><font class="error">{$error}</font><br /><br />
{/if}

{if $is_send}
	Runde abgespeichert.
{else}
	<form method="post" action="index.php?screen=save_round&amp;action=send" onSubmit="this.submit.disabled=true;">
		<table class="vis">
			<tr>
				<td>Name:</td><td><input type="text" name="start" size="70" value="{$name}"></td>
			</tr>
			<tr>
				<td>Start:</td><td><input type="text" name="start" size="70" value="{$start}"></td>
			</tr>
			<tr>
				<td>Ende:</td><td><input type="text" name="end" size="70" value="{$end}"></td>
			</tr>
			<tr>
				<td>Beschreibung:</td><td><input type="text" name="description" size="70" value="{$description}"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Abspeichern"></td>
			</tr>
		</table>
	</form>
{/if}