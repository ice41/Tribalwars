<p>Aqui vo&ecirc; pode ver a frequencia de acesso em sua conta, os IP's das conex&otilde;es e as datas.</p>
<h3>&Uacute;ltimos 20 acessos</h3>
<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th>Data</th>
		<th>IP</th>
		<th>Modo de f&eacute;rias</th>
	</tr>
	{foreach from=$logins item=arr key=id}
	<tr>
		<td>{$arr.time|replace:"heute um":"hoje &agrave;s"|replace:"Uhr":""|replace:"am":"em"|replace:"um":"&agrave;s"|replace:"morgen":"amanh&atilde;"}</td>
		<td align="center">{$arr.ip}</td>
		<td align="center">{$arr.uv}</td>
	</tr>
	{/foreach}
</table>