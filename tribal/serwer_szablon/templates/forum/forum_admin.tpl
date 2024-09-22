<table class="vis" width="100%">
	<tbody>
		<tr>
			<th>Forum</th>
			<th>Widoczno��</th>
			<th>Dost�p</th>
			<th>Akcja</th>
		</tr>
	</tbody>
	<tbody id="sortable_forums" class="ui-sortable">
		{foreach from=$ally_forum_arr key=fid item=finfo}
			<tr id="forum_{$fid}">
				<td>
					<form action="{$base_link}&sm=admin&action=edit_forum&fid={$fid}&h={$hkey}" method="post">
						<input name="title" size="32" value="{$finfo.name}" type="text">
						<input value="Zmie� nazw�" type="submit">
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
						Zaufani cz�onkowie
					{/if}
					<a href="{$base_link}&sm=admin&action=make_private&fid={$fid}&h={$hkey}">zmie�</a>
				</td>
				<td>
					Te plemi�
				</td>
				<td>
					<form action="{$base_link}&sm=admin&action=del_forum&fid={$fid}&h={$hkey}" method="post">
						<input name="confirm" value="true" type="checkbox">potwierd�
						<input value="Skasuj" type="submit">
					</form>
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>

<div style="text-align: right;">*: To plemi� nie zaakceptowa�o jeszcze dzielenia forum.</div>

<br>
<br>

<form action="{$base_link}&sm=admin&action=new_forum&h={$hkey}" method="post">
	<table class="vis">
		<tbody>
			<tr>
				<th colspan="4">Utw�rz nowe forum</th>
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
						<input name="trust_priv" value="2" type="radio"> Zaufani cz�onkowie
					</label>
				</td>
				<td>
					<input value="Utw�rz" type="submit">
				</td>
			</tr>
		</tbody>
	</table>
</form>


