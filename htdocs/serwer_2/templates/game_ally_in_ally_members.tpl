<form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=members&amp;action=mod&amp;h={$hkey}" method="post">
<table class="vis">
<tr>
  <th width="280">Nazwa</th>
  <th width="40">Ranking</th>
  <th width="80">Punkty</th>
  <th width="40">Wioski</th>
  {if $user.ally_lead==1 || $user.ally_found==1}
	  <th><img src="graphic/ally_rights/found.png" title="Za³o¿yciel" /></th>
	  <th><img src="graphic/ally_rights/lead.png" title="Administrator" /></th>
	  <th><img src="graphic/ally_rights/invite.png" title="Zaproszenie" /></th>
	  <th><img src="graphic/ally_rights/diplomacy.png" title="Dyplomacja" /></th>
	  <th><img src="graphic/ally_rights/mass_mail.png" title="Masowa wiadomoœæ" /></th>
	  <th>Zastêpstwo</th>
  {/if}
</tr>

    {foreach from=$members item=arr key=id}
		<tr {if $id==$user.id}class="lit"{/if}>
			<td>
				{if $user.ally_lead==1 || $user.ally_found==1}<input type="radio" name="player_id" value="{$id}" />	{foreach from=$arr.icons item=graphic}<img src="graphic/stat/{$graphic}.png" title="" alt="" /> {/foreach}{/if}<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$id}">{$arr.username}</a> {if !empty($arr.ally_titel)}({$arr.ally_titel}){/if}
			</td>
			<td>{$arr.rank}</td>
			<td>{$arr.points}</td>
			<td>{$arr.villages}</td>
			{if $user.ally_lead==1 || $user.ally_found==1}
				<td>{if $arr.ally_found==1}<img src="graphic/dots/green.png"/>{else}<img src="graphic/dots/grey.png"/>{/if}</td>
				<td>{if $arr.ally_lead==1}<img src="graphic/dots/green.png"/>{else}<img src="graphic/dots/grey.png"/>{/if}</td>
				<td>{if $arr.ally_invite==1}<img src="graphic/dots/green.png"/>{else}<img src="graphic/dots/grey.png"/>{/if}</td>
				<td>{if $arr.ally_diplomacy==1}<img src="graphic/dots/green.png"/>{else}<img src="graphic/dots/grey.png"/>{/if}</td>
				<td>{if $arr.ally_mass_mail==1}<img src="graphic/dots/green.png"/>{else}<img src="graphic/dots/grey.png"/>{/if}</td>
				<td>{if !empty($arr.vacation_id)}<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$arr.vacation_id}">{$arr.vacation_name}</a>{/if}</td>
			{/if}
		</tr>
 {/foreach}

</table>
{if $user.ally_lead==1 || $user.ally_found==1}
	<select name="action"><option label="Wybierz akcjê..." value="">Wybierz akcjê...</option>
	<option label="Rechte und Titel" value="rights">Prawa i tytu³</option>
	<option label="Entlassen" value="kick">Wyproœ</option>
	</select>
	<input type="submit" value="OK" />
{/if}
</form>

{if $user.ally_lead==1 || $user.ally_found==1}
	<br />

	<table class="vis">
<tbody><tr><th>Status</th></tr>
<tr><td><img src="graphic/stat/green.png?1" alt=""> aktywny</td></tr>
<tr><td><img src="graphic/stat/yellow.png?1" alt=""> nieaktywny od 2 dni</td></tr>
<tr><td><img src="graphic/stat/red.png?1" alt=""> nieaktywny od tygodnia</td></tr>
<tr><td><img src="graphic/stat/vacation.png?1" alt=""> Zastêpstwo</td></tr>

<tr><td><img src="graphic/stat/birthday.png?1" alt=""> Urodziny</td></tr>
<tr><td><img src="graphic/stat/banned.png?1" alt=""> zablokowany</td></tr>
</tbody></table>
<div style="font-size: 7pt;">Status mog¹ widzieæ tylko administratorzy plemienia.</div>
{/if}