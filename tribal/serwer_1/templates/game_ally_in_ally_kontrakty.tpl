<p>
	Nesta página pode gerenciar relações diplomáticas com outras tribos. Configurações<strong> não estão em vigor, o que são, na prática</strong>, aldeias são retratados em cores diferentes para distinguir ¿pressão. Essas relações são visíveis apenas para os membros da tribo e pode ser alterado você são as únicas pessoas em que os direitos relevantes na tribo.
</p>
{if !empty($err)}
	<font class="error"/>{$err}</font>
{/if}
<table id="partners" class="vis" width="100%">
	<tbody>
		<tr>
			<th colspan="2">Aliados</th>
		</tr>
			
		{foreach from=$kontrakty.partner item=kontrakt}
			<tr>
				<td>
					<a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$kontrakt.do_plemienia}">{$kontrakt.do_plemienia_tag}</a>
				</td>
				{if $dyplomata}
					<td>
						<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=kontrakty&amp;action=cancel_contract&amp;h={$hkey}&amp;id={$kontrakt.id}">fora a final</a>
					</td>
				{/if}
			</tr>
		{/foreach}
		
		<tr>
			<td colspan="2" style="background: transparent none repeat scroll 0%; height: 12px;"></td>
		</tr>

		<tr>
			<th colspan="2">Pactos de não-agressão</th>
		</tr>
		
		{foreach from=$kontrakty.nap item=kontrakt}
			<tr>
				<td>
					<a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$kontrakt.do_plemienia}">{$kontrakt.do_plemienia_tag}</a>
				</td>
				{if $dyplomata}
					<td>
						<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=kontrakty&amp;action=cancel_contract&amp;h={$hkey}&amp;id={$kontrakt.id}">fora a final</a>
					</td>
				{/if}
			</tr>
		{/foreach}
		
		<tr>
			<td colspan="2" style="background: transparent none repeat scroll 0%; height: 12px;"></td>
		</tr>
		
		<tr>
			<th colspan="2">Inimigos</th>
		</tr>
		
		{foreach from=$kontrakty.enemy item=kontrakt}
			<tr>
				<td>
					<a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$kontrakt.do_plemienia}">{$kontrakt.do_plemienia_tag}</a>
				</td>
				{if $dyplomata}
					<td>
						<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=kontrakty&amp;action=cancel_contract&amp;h={$hkey}&amp;id={$kontrakt.id}">zakoñcz</a>
					</td>
				{/if}
			</tr>
		{/foreach}
	</tbody>
</table>
{if $dyplomata}
	<br style="clear: both;">
	<h3>Adicionar Relação com uma tribo</h3>
	<form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=kontrakty&amp;action=add_contract&amp;h={$hkey}" method="post">
		<label for="tag">Abreviatura da Tribo:</label> 
		<input name="tag" type="text">
		<select name="type">
			<option value="partner">Aliado</option>
			<option value="nap">Pacto de não-agressão</option>

			<option value="enemy">Inimigo</option>
		</select>
		<input value="OK" type="submit">
	</form>
{/if}