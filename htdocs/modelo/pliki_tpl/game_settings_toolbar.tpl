<h3>Editar barra de Atalhos</h3>
<p>Ao digitar [akuvillage] no campo de endereço da nova barra de ferramentas, exibe o id da aldeia atual.</p>

<table class="vis">
	<tr>
		<th>Título</th>
		<th>Foto</th>
		<th>Link</th>
		<th>Compartilhar</th>
	</tr>
	{foreach from=$toolbar_array key=tid item=tool_info}
		<tr>
			<td><span class="link">{$tool_info.nazwa}</span></td>
			<td><img src="{$tool_info.obrazek}" alt="ERR" title="{$tool_info.nazwa}" style="width: 16px;height: 16px;"/></td>
			<td><a href="{$tool_info.link}"/>{$tool_info.link}</a></td>
			<td>
				<a href="game.php?village={$village.id}&screen=settings&mode=toolbar&action=del_tool&id={$tid}&h={$hkey}"/><img src="/ds_graphic/delete.png" alt="excluir" title="excluir"/></a>&nbsp;
				<a href="game.php?village={$village.id}&screen=settings&mode=toolbar&action=replace_down&id={$tid}&h={$hkey}"/><img src="/ds_graphic/overview/down.png" alt="Deslize para baixo" title="Deslize para baixo"/></a>&nbsp;
				<a href="game.php?village={$village.id}&screen=settings&mode=toolbar&action=replace_up&id={$tid}&h={$hkey}"/><img src="/ds_graphic/overview/up.png" alt="Deslize para cima" title="Deslize para cima"/></a>&nbsp;
			</td>
		</tr>
	{/foreach}
</table>
<br>
<a href="game.php?village={$village.id}&screen=settings&mode=toolbar&action=reset_toolbar&h={$hkey}"/>
	Redefinir a barra de atalhos
</a>
<br><br>

<form action="game.php?village={$village.id}&screen=settings&mode=toolbar&action=add_tolbar&h={$hkey}" method="POST">
	<table class="vis">
		<tr>
			<th colspan="2">
				Adicionar uma nova barra de atalhos
			</th>
		</tr>
		<tr>
			<td>
				Nome:
			</td>
			<td>
				<input type="text" name="name" value="" style="width: 300px;"/>
			</td>
		</tr>
		<tr>
			<td>
				Link para a imagem:
			</td>
			<td>
				<input type="text" name="img_link" value="" style="width: 300px;"/>
			</td>
		</tr>
		<tr>
			<td>
				Link:
			</td>
			<td>
				<input type="text" name="link" value="" style="width: 300px;"/>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="sub" value="Adicionar"/>
			</td>
		</tr>
	</table>
</form>