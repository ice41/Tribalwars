<h2>Narz�dzie do dodawania wiosek</h2>

{if !empty($error)}
	<font class="error">{$error}</font><br /><br />
{else}	
	<form method="post" action="index.php?screen=refugee_camp&amp;action=create" onSubmit="this.submit.disabled=true;">
		<table class="vis">
			<tr>
				<th colspan="2">Dodawanie wiosek barbarzy�skich</th>
			</tr>
			<tr>
				<td width="350">Ile ustawi� wiosek?<br />(maksymalnie 2000)</td>
				<td><input type="text" name="num" value="0"></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Ustawi�" onload="this.disabled=false;">Mo�e to potrwa� 30 sekund</td>
			</tr>
		</table>
</form>
{/if}