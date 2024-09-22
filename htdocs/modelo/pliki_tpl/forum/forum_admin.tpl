<table class="vis" width="100%">
	<tbody>
		<tr>
			<th>Forum</th>
			<th>Widocznoœæ</th>
			<th>Dostêp</th>
			<th>Akcja</th>
		</tr>
	</tbody>
	<tbody id="sortable_forums" class="ui-sortable">
		{foreach from=$ally_forum_arr key=fid item=finfo}
			<tr id="forum_{$fid}">
				<td>
					<form action="{$base_link}&sm=admin&action=edit_forum&fid={$fid}&h={$hkey}" method="post">
						<input name="title" size="32" value="{$finfo.name}" type="text">
						<input value="Zmieñ nazwê" type="submit">
					</form>
				</td>
				<td>
					{if $finfo.visible == 0}
						Dla wszystkich
					{/if}
					{if $finfo.visible == 1}
						Ukryte forum
					{/if}
					{if $finfo.visible == 2}
						Zaufani cz³onkowie
					{/if}
					<a href="{$base_link}&sm=admin&action=make_private&fid={$fid}&h={$hkey}">zmieñ</a>
				</td>
				<td>
					Te plemiê
				</td>
				<td>
					<form action="{$base_link}&sm=admin&action=del_forum&fid={$fid}&h={$hkey}" method="post">
						<input name="confirm" value="true" type="checkbox">potwierdŸ
						<input value="Skasuj" type="submit">
					</form>
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>

<div style="text-align: right;">*: To plemiê nie zaakceptowa³o jeszcze dzielenia forum.</div>

<br>
<br>

<form action="{$base_link}&sm=admin&action=new_forum&h={$hkey}" method="post">
	<table class="vis">
		<tbody>
			<tr>
				<th colspan="4">Utwórz nowe forum</th>
			</tr>
			
			<tr>
				<td>Nazwa forum: <input name="title" type="text"></td>
				<td>
					<label>
						<input name="trust_priv" value="0" checked="checked" type="radio"> Widoczne dla wszystkich
					</label>
					<br>
					<label>
						<input name="trust_priv" value="1" type="radio"> Ukryte forum
					</label>
					<br>
					<label>
						<input name="trust_priv" value="2" type="radio"> Zaufani cz³onkowie
					</label>
				</td>
				<td>
					<input value="Utwórz" type="submit">
				</td>
			</tr>
		</tbody>
	</table>
</form>


