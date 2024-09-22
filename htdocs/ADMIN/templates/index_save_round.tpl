<h2>Runda speed</h2>
Rundele speed pot fi setate data inceperi/sfarsiri unei eunde iar datele sunt pastrate in Runde speed de pe pagina principala.
<br /><br />

{if !empty($error)}
	<br /><br /><font class="error">{$error}</font><br /><br />
{/if}

{if $is_send}
	Runde speed
{else}
	<form method="post" action="index.php?screen=save_round&amp;action=send" onSubmit="this.submit.disabled=true;">
		<table class="vis">
			<tr>
				<td>Nume:</td><td><input type="text" name="name" size="70" value="{$name}"></td>
			</tr>
			<tr>
				<td>Start:</td><td><input type="text" name="start" size="70" value="{$start}"></td>
			</tr>
			<tr>
				<td>Sfarsit:</td><td><input type="text" name="end" size="70" value="{$end}"></td>
			</tr>
			<tr>
				<td>Descriere:</td><td><input type="text" name="description" size="70" value="{$description}"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Start"></td>
			</tr>
		</table>
	</form>
{/if}