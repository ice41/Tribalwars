<p>
	Na tej stronie mo�na zarz�dza� stosunkami dyplomatycznymi z innymi plemionami. Ustawienia <strong>nie s� obowi�zuj�ce w praktyce</strong>, wioski s� ukazywane w innych kolorach dla rozr�nienia. Stosunki te s� widoczne tylko dla cz�onk�w plemienia i mog� by� zmieniane wy��cznie przez osoby posiadaj�ce odpowiednie prawa w plemieniu.
</p>
{if !empty($err)}
	<font class="error"/>{$err}</font>
{/if}
<table id="partners" class="vis" width="100%">
	<tbody>
		<tr>
			<th colspan="2">Sprzymierze�cy</th>
		</tr>
			
		{foreach from=$kontrakty.partner item=kontrakt}
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
			<th colspan="2">Pakty o nieagresji</th>
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
			<th colspan="2">Wrogowie</th>
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
		<label for="tag">Skr�t nazwy plemienia:</label> 
		<input name="tag" type="text">
		<select name="type">
			<option value="partner">Sprzymierzeniec</option>
			<option value="nap">Pakty o nieagresji</option>

			<option value="enemy">Wr�g</option>
		</select>
		<input value="OK" type="submit">
	</form>
{/if}