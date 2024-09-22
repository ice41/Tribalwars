<h2>Sistemul de mail</h2>
Aici, un mesaj poate fi trimis la toti jucatori inregistrati!<br /><br />

{if !empty($error)}
	<br /><br /><font class="error">{$error}</font><br /><br />
{/if}

{if $is_send}
	Mesajul de la sistem a fost trimis!
{else}
	<form method="post" action="index.php?screen=mail&amp;action=send" onSubmit="this.submit.disabled=true;">
		<table class="vis">
			<tr>
				<td>Subiect:</td><td><input type="text" name="subject" size="70" value="{$subject}"></td>
			</tr>
			<tr>
				<td colspan="2"><textarea rows="20" cols="80" name="text">{$text}</textarea></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Trimite"></td>
			</tr>
		</table>
	</form>
{/if}