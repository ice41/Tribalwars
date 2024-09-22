<table class="vis">
	{if $rename_error}
		<div class="error">{$rename_error}</div>
	{/if}
	<tr>
		<th>Nome</th>
		<th>Ação</th>
	</tr>
	
	{foreach from=$category_id key=value item=id}
	<form action="forum.php?ally={$ally}&do=new_category&mod={$id}" method="POST">
	<tr>
		<td><input type="text" size="40" name="r_name" value="{$category_name.$value}" /></td>
		<td>
			<input type="submit" name="rename_category" value="Renomear" />
			<input type="submit" name="delete_category" onclick="return confirm('Deseja realmente excluir?');" value="excluir" />
		</td>
	</tr>
	</form>
	{/foreach}
</table>
	<h3>Nova Categoria</h3>
	{if $error}
		<div class="error">{$error}</div>
	{/if}
<form action="forum.php?ally={$ally}&do=new_category&new=yes" method="POST" />
	<table class="vis">
		<tr><th>Nome</th></tr>
		<tr><td><input type="text" name="name" size="40" /><input type="submit" name="go" value="Preparar" /></td></tr>
	</table>
</form>
