<h2>Systemmail</h2>
Hier kann eine Nachricht verschickt werden, die alle Registrierten Spieler erhalten!<br /><br />

{if !empty($error)}
	<br /><br /><font class="error">{$error}</font><br /><br />
{/if}

{if $is_send}
	Systemnachricht wurde versand!
{else}
	<form method="post" action="index.php?screen=mail&amp;action=send" onSubmit="this.submit.disabled=true;">
		<table class="vis">
			<tr>
				<td>Betreff:</td><td><input type="text" name="subject" size="70" value="{$subject}"></td>
			</tr>
			<tr>
				<td colspan="2"><textarea rows="20" cols="80" name="text">{$text}</textarea></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Senden"></td>
			</tr>
		</table>
	</form>
{/if}