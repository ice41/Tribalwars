<h3>Criando um novo servidor</h3>
<center><b><h1>{if !empty($err)}
	<font color="red">{$err}</font>
{/if}
{if !empty($sukces)}
<h1>	<font color="green">{$sukces}</font></h1>
{else}</center></b></h1>
<br>

<center><h2 class="error">Adicionar um mundo pode levar de 1 segundo a 1 minuto!</h2>
<form action="admin.php?screen=create_new_server&akcja=add_new_server" method="POST"/>
<center>	<table class="vis" width="400">
		<tr>
			<th>Opções</th>
			<th>valores</th>
			<th>Indicar</th>
		</tr>
		<tr>
			<td>Senha do administrador:</td>
			<td><input type="text" name="master_pw" value="voropi4141" style="width: 135px;"/></td><td>Senha do administrador do mundo.</td>
		</tr>
		<tr>
			<td>Velocidade do servidor:</td>
			<td><input type="text" name="speed" value="10" style="width: 135px;"/></td><td>Velocidade de construção, demolição e produção de recursos</td>
		</tr>
		<tr>
			<td>Velocidade da unidade:</td>
			<td><input type="text" name="movement_speed" value="5" style="width: 135px;"/></td><td>Dividido pela velocidade do servidor!</td>
		</tr>
		<tr>
			<td>Apoios por hora:</td>
			<td><input type="text" name="agreement_per_hour" value="1" style="width: 135px;"/></td><td>Multiplicado pela velocidade do servidor!</td>
		</tr>
		<tr>
			<td>Velocidade do comerciante:</td>
			<td><input type="text" name="dealer_time" value="5" style="width: 135px;"/></td><td>Dividido pela velocidade do servidor</td>
		</tr>
		<tr>
			<td>Aldeias iniciais:</td>
			<td><input type="text" name="wioski" value="1" style="width: 135px;"/></td><td>Aldeias iniciais para o jogador</td>
		</tr>
		<tr>
			<td>O remetente da mensagem de boas-vindas:</td>
			<td colspan ="2"><input type="text" name="nadawca" value="ice41 team" style="width: 250px;"/></td>
		</tr>
		<tr>
			<td>O assunto da mensagem de boas-vindas:</td>
			<td colspan ="2"><input type="text" name="temat" value="Bem vindo a este novo mundo" style="width: 250px;"/></td>
		</tr>	
		<tr>
			<td>Conteúdo da mensagem de boas-vindas:</td>
			<td colspan ="2"><input type="text" name="tresc" value="divirta-se e nunca use trapaças!" style="width: 250px;"/></td>
		</tr>
		<tr>
			<td>Recursos premium:</td>
			<td colspan ="2"><input name="premium" value="false" checked="checked" type="radio"> Não<br>
					<input name="premium" value="true" type="radio"> Sim</td>
		</tr>
		<tr>
			<td>Igreja e monges:</td>
			<td colspan ="2"><input name="kosciol" value="false" checked="checked" type="radio"> Não<br>
					<input name="kosciol" value="true" type="radio"> Sim</td>
		</tr>
		<tr>
			<td>Escolha a direção para criar uma aldeia:</td>
			<td colspan ="2"><input name="kierunek" value="false" checked="checked" type="radio"> Não<br>
					<input name="kierunek" value="true" type="radio"> Sim</td>
		</tr>	
		<tr>
			<td>Proteção inicial:</td>
			<td><input type="text" name="ochrona" value="180" style="width: 135px;"/><td>Para desabilitar a proteção, digite -1</td>
		</tr>			
		
		
			</table><input type="submit" name="sub" value="Criar este Mundo!" style="width: 200px;"  class="btn btn-success btn-small"/></center>
		
	
</form>

</table>{/if}