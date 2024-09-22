<script>
                    $( function() {ldelim} if( document.location.hash == "#zapisano" ) UI.SuccessMessage( "As opções do mundo {$serverid} foram salvas!", 5000 ); {rdelim});	
</script>
<h3>Edição do mundo</h3>
<b></b>
<p>
Aqui pode editar opções de servidor

<br><br>


	<form action="game.php?village={$village.id}&screen=admin&mode=edit&action=edit_serw_form" method="POST"/>
		<table class="vis" width="100%">
			<tr>
				<th colspan="2">Painel de ediçãoo do mundo {$serv.id}</th>
			</tr>
<tr>		
		<td>Funkcje Premium</td>
				<td>
					<input type="radio" name="premium" value="0" {if !$serv.premium}checked="checked"{/if}> Nie<br>
					<input type="radio" name="premium" value="1" {if $serv.premium}checked="checked"{/if}> Tak<br>
					<b>Atenção! N├║meros, conte├║do e custo do SMS<br> devem ser editados no arquivo htdocs/mundo{$serwerid}/lib/config.php</b>
				</td>				
			</tr>
			<tr>
				<td>Aldeias para come├ºar [1-50] :</td>
				<td><input type="text" name="w_start" value="{$serv.wioski_na_start}"></td>
			</tr>
			<tr>
				<td>Senha do <a href="admin">Admin</a>:</td>
				<td><input type="text" name="admin_pass" value="{$serv.admin_pass}"></td>
			</tr>
			<tr>
				<td>O nome da aldeia abandonada:</td>
				<td><input type="text" name="left_name" value="{$serv.left_name}"></td>
			</tr>
			<tr>
				<td>Proteção inicial em minutos:</td>
				<td><input type="text" name="noob_protection" value="{$serv.noob_protection}"></td>
			</tr>
			<tr>
				<td>Seleção de direções:</td>
				<td>
					<input type="radio" name="village_choose_direction" value="0" {if !$serv.village_choose_direction}checked="checked"{/if}> Não<br>
					<input type="radio" name="village_choose_direction" value="1" {if $serv.village_choose_direction}checked="checked"{/if}> Sim
				</td>
			</tr>
			<tr>
				<td>Velocidade:</td>
				<td><input type="text" name="speed" value="{$serv.speed}"></td>
			</tr>
			<tr>
				<td>Configurações da tribo:</td>
				<td>
				<input type="radio" name="create_ally" value="0" {if !$serv.create_ally}checked="checked"{/if}> <b>Criação</b> Não<br>
				<input type="radio" name="create_ally" value="1" {if $serv.create_ally}checked="checked"{/if}>
				<b>Criação</b> Sim<br>
				<input type="radio" name="leave_ally" value="0" {if !$serv.leave_ally}checked="checked"{/if}>
				<b>Permição de abandonar</b> Não<br>
				<input type="radio" name="leave_ally" value="1" {if $serv.leave_ally}checked="checked"{/if}>
				<b>Permição de abandonar</b> Sim
				</td>
			</tr>
		
<tr>		
		<td>Demolição de edif├¡cios:</td>
				<td>
					<input type="radio" name="niszczenie" value="0" {if !$serv.destroy_mode_main}checked="checked"{/if}> Não<br>
					<input type="radio" name="niszczenie" value="1" {if $serv.destroy_mode_main}checked="checked"{/if}> Sim
				</td>				
			</tr>
			<tr>
				<td>razão de defesa:</td>
				<td><input type="text" name="reason_defense" value="{$serv.reason_defense}"></td>
			</tr>
			<tr>
				<td>Configurações de apoios:</td>
				<td><input type="text" name="poparcie" value="{$serv.agreement_per_hour}"><b> moral em 1h<br><b>Nota! multiplicado pela velocidade do servidor({$serv.speed})!</b><br>
				<input type="text" name="pop_min" value="{$serv.pop_min}" size="2"> -
                <input type="text" name="pop_min_paladin" value="{$serv.pop_min_paladin}" size="2"> -
				<input type="text" name="pop_max" value="{$serv.pop_max}" size="2"><b>Suporte derrubado<br>(min-min_z_rycerzem-max)
				</td>
			</tr>


			<tr>
				<td>Bem-vindo:</td>
				<td><b>Dica da semana:</b><br><input type="text" name="wsk_obraz" value="{$serv.powitalna.wsk_tyg_img}" size="50">  <img src="{$serv.powitalna.wsk_tyg_img}" /><br>
				<input type="text" name="wsk_text" value="{$serv.powitalna.wsk_tyg_text}" size="55">  <br>
				<b>Cor da linha de estat├¡sticas:</b><br>
				<input type="radio" name="kolor" value="green" {if $serv.powitalna.kolor == green}checked="checked"{/if}>
				<b><font color="green">Verde</font></b><br>
				<input type="radio" name="kolor" value="red" {if $serv.powitalna.kolor == red}checked="checked"{/if}>
				<b><font color="red">Vermelho</font></b><br>
				<input type="radio" name="kolor" value="yellow" {if $serv.powitalna.kolor == yellow}checked="checked"{/if}>
				<b><font color="yellow">Amarelo</font></b><br>
				<input type="radio" name="kolor" value="orange" {if $serv.powitalna.kolor == orange}checked="checked"{/if}>
				<b><font color="orange">laranja</font></b>				
				</td>
			</tr>				
		
			<tr>
				<td>Moral:</td>
				<td>
					<input type="radio" name="moral_activ" value="0" {if !$serv.moral_activ}checked="checked"{/if}> Não<br>
					<input type="radio" name="moral_activ" value="1" {if $serv.moral_activ}checked="checked"{/if}> Sim
				</td>
			</tr>
			<tr>
				<td>Nobreza Configurações:</td>
				<td>
					<input type="radio" name="ag_style" value="0" {if !$serv.ag_style}checked="checked"{/if}>
					<b>Estilo</b> Academia<br>
					<input type="radio" name="ag_style" value="1" {if $serv.ag_style}checked="checked"{/if}>
					<b>Estilo</b> Moedas<br>
					<input type="text" name="snob_range" value="{$serv.snob_range}"> <b>Metade do alcance</b><br>
                            <img alt="" title="Madeira" src="/ds_graphic/holz.png">
															<input type="text" name="m_wood" value="{$serv.m_wood}" size="4">
													
							<img alt="" title="Argila" src="/ds_graphic/lehm.png">
															<input type="text" name="m_stone" value="{$serv.m_stone}" size="4">
													
							<img alt="" title="Ferro" src="/ds_graphic/eisen.png">
															<input type="text" name="m_iron" value="{$serv.m_iron}" size="4"> <b>Custo da moeda</b><br>
															
					</td>
			</tr>
			
					
			<tr>
				<td>Noite:</td>
				<td>
					<input type="radio" name="noc" value="0" {if !$serv.noc}checked="checked"{/if}> Não<br>
					<input type="radio" name="noc" value="1" {if $serv.noc}checked="checked"{/if}> Sim
				</td>
			</tr>
{if $serv.noc}			<tr>
				<td>Noite[Inicio-fim]:</td>
				<td><b>come├ºo:<input type="text" name="noc_poczatek" value="{$serv.noc_poczatek}"> <br>Fim:<input type="text" name="noc_koniec" value="{$serv.noc_koniec}"></b></td>
			</tr>{/if}				
			<tr>
				<td>Recrutamento de jogadores:</td>
				<td>
					<input type="radio" name="create_users_and_villages" value="0" {if !$serv.create_users_and_villages}checked="checked"{/if}> Não<br>
					<input type="radio" name="create_users_and_villages" value="1" {if $serv.create_users_and_villages}checked="checked"{/if}> Sim
				</td>
			</tr>
			<tr>
				<td>Medalhas:</td>
				<td>
					<input type="radio" name="awards" value="0" {if !$serv.awards}checked="checked"{/if}> Não<br>
					<input type="radio" name="awards" value="1" {if $serv.awards}checked="checked"{/if}> Sim
				</td>
			</tr>
			<tr>
				<td>Igreja</td>
				<td>
					<input type="radio" name="kosciol_i_mnisi" value="0" {if !$serv.kosciol_i_mnisi}checked="checked"{/if}> Não<br>
					<input type="radio" name="kosciol_i_mnisi" value="1" {if $serv.kosciol_i_mnisi}checked="checked"{/if}> Sim
				</td>
			</tr>			
			<tr>
				<td>Configurações de mensagens:</td>
				<td><input type="text" name="mail_nadawca" value="{$serv.mail.nadawca}"><b> Remetente da mensagem do sistema<br>
				<input type="text" name="mail_temat" value="{$serv.mail.temat}" size="30"> <b>O assunto da mensagem de boas-vindas</b><br> <b>Conte├║do da mensagem de boas-vindas:</b><br>
               <textarea id="message" rows="5" cols="45" name="mail_text">{$serv.mail.text}</textarea>
			   </td>
			</tr>			
			<tr>
				<td colspan="2"><center><input type="submit" name="sub" value="Alterar opções" class="btn btn-success btn-small"/></center></td>
			</tr>
		</table>
	</form>
	
