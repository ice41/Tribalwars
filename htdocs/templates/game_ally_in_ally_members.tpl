<form action="game.php?village={$village.id}&amp;screen=ally&amp;mode=members&amp;action=mod&amp;h={$hkey}" method="post">
<table class="vis">
<tr>
  <th width="280">Porecla</th>
  <th width="40">Loc</th>
  <th width="80">Puncte</th>
  <th width="40">Sate</th>
  {if $user.ally_lead==1 || $user.ally_found==1}
	  <th><img src="graphic/ally_rights/found.png" alt="&#206;ntemeiatorul tribului" title="&#206;ntemeiatorul tribului" /></th>
	  <th><img src="graphic/ally_rights/lead.png" alt="Conducerea tribului" title="Conducerea tribului" /></th>
	  <th><img src="graphic/ally_rights/invite.png" alt="Invita&#355;ie" title="Invita&#355;ie" /></th>
	  <th><img src="graphic/ally_rights/diplomacy.png" alt="Diploma&#355;ie" title="Diploma&#355;ie" /></th>
	  <th><img src="graphic/ally_rights/mass_mail.png" alt="Circular&#259;" title="Circular&#259;" /></th>
	  <th>Mod de vacan&#355;&#259;</th>
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
				<td>{if $arr.ally_found==1}<img src="graphic/dots/green.png" alt="Da" />{else}<img src="graphic/dots/grey.png" alt="Nu" />{/if}</td>
				<td>{if $arr.ally_lead==1}<img src="graphic/dots/green.png" alt="Da" />{else}<img src="graphic/dots/grey.png" alt="Nu" />{/if}</td>
				<td>{if $arr.ally_invite==1}<img src="graphic/dots/green.png" alt="Da" />{else}<img src="graphic/dots/grey.png" alt="Nu" />{/if}</td>
				<td>{if $arr.ally_diplomacy==1}<img src="graphic/dots/green.png" alt="Da" />{else}<img src="graphic/dots/grey.png" alt="Nu" />{/if}</td>
				<td>{if $arr.ally_mass_mail==1}<img src="graphic/dots/green.png" alt="Da" />{else}<img src="graphic/dots/grey.png" alt="Nu" />{/if}</td>
				<td>{if !empty($arr.vacation_id)}<a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$arr.vacation_id}">{$arr.vacation_name}</a>{/if}</td>
			{/if}
		</tr>
 {/foreach}

</table>
{if $user.ally_lead==1 || $user.ally_found==1}
	<select name="action"><option label="Alege-&#355;i o ac&#355;iune..." value="">Alege-&#355;i o ac&#355;iune...</option>
	<option label="Drepturi si titluri" value="rights">Drepturi si titluri</option>
	<option label="Concediere" value="kick">Concediere</option>
	</select>
	<input type="submit" value=" OK " />
{/if}
</form>

{if $user.ally_lead==1 || $user.ally_found==1}
	<br />

	<table class="vis">
	<tr><th>Statut</th></tr>
	<tr><td><img src="graphic/stat/green.png" alt="" /> activ</td></tr>
	<tr><td><img src="graphic/stat/yellow.png" alt="" /> de 2 zile inactiv</td></tr>
	<tr><td><img src="graphic/stat/red.png" alt="" /> de o s&#259;pt&#259;m&#226;n&#259; inactiv</td></tr>
	<tr><td><img src="graphic/stat/vacation.png" alt="" /> Mod de vacan&#355;&#259;</td></tr>
	<tr><td><img src="graphic/stat/birthday.png" alt="" /> Ziua de na&#351;tere</td></tr>
	<tr><td><img src="graphic/stat/banned.png" alt="" /> &#238;ncuiat</td></tr>
	</table>
	<div style="font-size: 7pt;">statutul poate fi v&#259;zut doar de c&#259;tre conducerea tribului</div>
{/if}