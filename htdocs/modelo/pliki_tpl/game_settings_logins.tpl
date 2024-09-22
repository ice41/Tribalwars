<h3>Login</h3>
<p>Nesta página, pode ver quando houve logins e tentativas falhadas de entrar em sua conta. Se descobrir que uma pessoa não autorizada tem acesso à sua conta, deverá alterar sua senha imediatamente. Dependendo do tipo de conexão: o número IP pode mudar quando se reconectar à Internet.</p>

<h4>Ultimos 20 logins</h4>

<table class="vis">
	<tbody>
		<tr>
			<th>Data</th>
			<th>IP</th>
			<th>Deputado</th>
		</tr>
		{foreach from=$logins item=login}
			<tr>
				<td>{$login.time}</td>
				<td>{$login.ip}</td>
				<td><a href="game.php?village={$village.id}&screen=info_user&id={$login.uv}"/>{$login.uv_name}</a></td>
			</tr>
		{/foreach}
	</tbody>
</table>