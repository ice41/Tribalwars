<h2>Configurações do mundo {$serwerid}</h2>

<table class="vis" width="100%">
	<tbody>
		<tr>
			<th colspan="2">Definições</th>
		</tr>
		<tr>
			<td width="50%">Velocidade do jogo</td>
			<td width="50%">{$speed}</td>
		</tr>
		<tr>
			<td>Velocidade das unidades</td>
			<td>{$units_speed}</td>
		</tr>
		<tr>
			<td>Demolição de edifícios</td>
			<td>{if !$buildings_destroy}Nie{/if}ativo</td>
		</tr>
		<tr>
			<td>Moral</td>
			<td>{if !$morals}Nie{/if}ativo</td>
		</tr>
		<tr>
			<td>regra de propriedade</td>
			<td>inativo</td>
		</tr>
		<tr>
			<td>defesa básica da aldeia</td>
			<td>{$basic_village_defense}</td>
		</tr>
		<tr>
			<td>milissegundos</td>
			<td>Inativo</td>
		</tr>
		<tr>
			<td>Limitação Bogey</td>
			<td>inativo</td>
		</tr>
		<tr>
			<td>Sistema de pesquisa</td>
			<td>{if $max_tech_level > 1}expandido (Max. {$max_tech_level} nível){else}simples (inexplorado/pesquisado){/if}</td>
		</tr>
		<tr>
			<td>OSSO</td>
			<td>inativo</td>
		</tr>
		<tr>
			<td>Medalhas</td>
			<td>{if !$display_awards}nie{/if}ativo</td>
		</tr>
		<tr>
			<td>Desenvolvimento de aldeias bárbaras</td>
			<td>
				{if $bot_barbar_disp}
					ativo (do {$bot_barbar_limit} pontos)
				{else}
					inativo
				{/if}
			</td>
		</tr>
		<tr>
			<td>Aldeias abarbaras</td>
			<td>Aldeias abarbaras melhoradas</td>
		</tr>
		<tr>
			<td>Hora de parar o ataque</td>
			<td>{$time_att_pz} minuto</td>
		</tr>
		<tr>
			<td>Horário de intervalo do comerciante</td>
			<td>{$cancel_dealers} minuto</td>
		</tr>
		<tr>
			<td>Bônus noturno</td>
			<td>{if $noc}ativo de 0:00 do 8:00{else}inativo{/if}</td>
		</tr>
		<tr>
			<td>Proteção para novos jogadores</td>
			<td>
				{if $protect_new_users != '-1'}{$protect_new_users} Dias{else}Sem proteção{/if}
			</td>
		</tr>
		<tr>
			<td>Proporção máxima de atacantes para defensores</td>
			<td>Ilimitado</td>
		</tr>
	</tbody>
</table>

<table class="vis" width="98%">
	<tbody>
		<tr>
			<th colspan="2">Unidades</th>
		</tr>
		<tr>
			<td width="50%">Pesquisa</td>
			<td width="50%">{if !$archers}Não{/if}ativo</td>
		</tr>
		<tr>
			<td>Batedores</td>
			<td>Batedores podem detectar tropas, edifícios e recursos<br>e unidades fora da aldeia</td>
		</tr>
		<tr>
			<td>Paladino</td>
			<td>{if !$paladin}Não{/if}ativo{if !$paladin}.{else}, pode encontrar itens.{/if}</td>
		</tr>
	</tbody>
</table>

<table class="vis" width="98%">
	<tbody>
		<tr>
			<th colspan="2">Nobre</th>
		</tr>

		<tr>
			<td width="50%">Aumento dos preços dos nobres</td>
			<td width="50%">
				{$snob_text}
			</td>
		</tr>
		<tr>
			<td>Renovação nobre barata</td>
			<td>Ativo</td>
		</tr>					
		<tr>
			<td>Alcance Nobre Máxima</td>
			<td>{if $snob_range != '-1'}{$snob_range} p.l{else}sem limitação{/if}</td>
		</tr>
		<tr>
			<td>Perda de apoio após o ataque de um nobre</td>
			<td>{$pop_min}-{$pop_max}</td>
		</tr>
		<tr>
			<td>Aumento de apoio por hora</td>
			<td>{$pop_per_hour}</td>
		</tr>
	</tbody>
</table>

<table class="vis" width="98%">
	<tbody>
		<tr>
			<th colspan="2">Configuração</th>
		</tr>
		<tr>
			<td>Limite de membros da tribo</td>
			<td>inativo</td>
		</tr>
		<tr>
			<td width="50%">Ranking de opunentes derrotados</td>
			<td width="50%">ativo</td>
		</tr>
		<tr>
			<td>Sitter (modo ferias)</td>
			<td>inativo</td>
		</tr>					
		<tr>
			<td>Seleção de direção</td>
			<td>{if !$village_choose_direction}nie{/if}ativo</td>
		</tr>					
		<tr>
			<td>Data de início</td>
			<td>{$server_start}</td>
		</tr>
	</tbody>
</table>
