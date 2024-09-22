<p>
	Nesta p�gina pode gerenciar rela��es diplom�ticas com outras tribos. Configura��es<strong> n�o est�o em vigor, o que s�o, na pr�tica</strong>, aldeias s�o retratados em cores diferentes para distinguir �press�o. Essas rela��es s�o vis�veis apenas para os membros da tribo e pode ser alterado voc� s�o as �nicas pessoas em que os direitos relevantes na tribo.
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
			<th colspan="2">Pactos de n�o-agress�o</th>
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
						<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=kontrakty&amp;action=cancel_contract&amp;h={$hkey}&amp;id={$kontrakt.id}">zako�cz</a>
					</td>
				{/if}
			</tr>
		{/foreach}
	</tbody>
</table>
{if $dyplomata}
	<br style="clear: both;">
	<h3>Adicionar Rela��o com uma tribo</h3>
	<form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=kontrakty&amp;action=add_contract&amp;h={$hkey}" method="post">
		<label for="tag">Abreviatura da Tribo:</label> 
		<input name="tag" type="text">
		<select name="type">
			<option value="partner">Aliado</option>
			<option value="nap">Pacto de n�o-agress�o</option>

			<option value="enemy">Inimigo</option>
		</select>
		<input value="OK" type="submit">
	</form>
{/if}