<table class="vis">
	{if $rename_error}
		<div class="error">{$rename_error}</div>
	{/if}
	<tr>
		<th>Nume</th>
		<th>Actiune</th>
	</tr>
	
	{foreach from=$category_id key=value item=id}
	<form action="forum.php?ally={$ally}&do=new_category&mod={$id}" method="POST">
	<tr>
		<td><input type="text" size="40" name="r_name" value="{$category_name.$value}" /></td>
		<td>
			<input type="submit" name="rename_category" value="Redenumire" />
			<input type="submit" name="delete_category" onclick="return confirm('Sigur doriti sa stergeti aceasta categorie?');" value="Sterge" />
		</td>
	</tr>
	</form>
	{/foreach}
</table>
	<h3>Categorie noua</h3>
	{if $error}
		<div class="error">{$error}</div>
	{/if}
<form action="forum.php?ally={$ally}&do=new_category&new=yes" method="POST" />
	<table class="vis">
		<tr><th>Nume</th></tr>
		<tr><td><input type="text" name="name" size="40" /><input type="submit" name="go" value="Creaza" /></td></tr>
	</table>
</form>