<p>
	Nesta página pode gerenciar relações diplomáticas com outras tribos. Definições <strong>não são vinculativas na prática</strong>, aldeias são mostradas em cores diferentes para distinção. Essas relações são visíveis apenas para os membros da tribo e só podem ser alteradas por pessoas com os direitos apropriados na tribo.
</p>
{if !empty($err)}
	<font class="error"/>{$err}</font>
{/if}
<table id="partners" class="vis" width="100%">
	<tbody>
		<tr>
			<th colspan="2">Alidados</th>
		</tr>
			
		{foreach from=$kontrakty.partner item=kontrakt}
			<tr>
				<td>
					<a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$kontrakt.do_plemienia}">{$kontrakt.do_plemienia_tag}</a>
				</td>
				{if $dyplomata}
					<td>
						<a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=kontrakty&amp;action=cancel_contract&amp;h={$hkey}&amp;id={$kontrakt.id}">Cancelar</a>
					</td>
				{/if}
			</tr>
		{/foreach}
		
		<tr>
			<td colspan="2" style="background: transparent none repeat scroll 0%; height: 12px;"></td>
		</tr>

		<tr>
			<th colspan="2">Pactos de não agressão</th>
		</tr>
		
		{foreach from=$kontrakty.nap item=kontrakt}
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
	<h3>dodaj nowy stosunek</h3>
	<form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=kontrakty&amp;action=add_contract&amp;h={$hkey}" method="post">
		<label for="tag">Abreviação do nome da tribo:</label> 
		<input name="tag" type="text">
		<select name="type">
			<option value="partner">Aliado</option>
			<option value="nap">Pactos de não agressão</option>

			<option value="enemy">Inimigo</option>
		</select>
		<input class="btn" value="OK" type="submit">
	</form>
{/if}