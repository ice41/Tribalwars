<h3>Jucator de vacanta (loctiitor)</h3>
<p>Aici poti ruga pe cineva sa-ti administreze contul in timp ce tu esti in concediu. Acest jucator se poate loga/inscrie de pe contul lui pe contul tau fara ai oferi parola de la contul tau. In timp ce modul de vacanta este activ, nu ai acces la contul tau.</p>

<p>Pana la 24 ore ore dupa terminarea modului de vacanta nu ai voie sa interactionezi in joc intre contul tau si contul pentru care ai jucat ca loctiitor. Mai ales aceste actiuni sunt interzise:</p>
<ul>
<li>Livrare de resurse</li>
<li>Jefuirea intre jucatori</li>

<li>Atacuri combinate ale celor doua conturi</li>
<li>Trimiterea de trupe de sprijin</li>
</ul>
{if empty($user.vacation_name)}
	<form action="game.php?village={$village.id}&amp;screen=settings&amp;mode=vacation&amp;action=sitter_offer&amp;h={$hkey}" method="post">
		<table class="vis">
		<tr>
			<th>Loctiitor</th>
			<td><input name="sitter" type="text" /> <input type="submit" value="OK" /></td>
	
		</tr>
	    </table>
	</form>
{else}
	{if $sid->is_vacation()}
		<p>
		<a href="javascript:ask('bla bla...ca pe triburile', 'game.php?village={$village.id}&amp;screen=settings&amp;mode=vacation&amp;action=end_vacation&amp;h={$hkey}')">Intrerupe modul de vacanta</a>
		</p>
	{else}
		<table class="vis">
		<tr>
			<td>Anfrage an:</td>
			<td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$user.vacation_id}">{$user.vacation_name}</a></td>
			<td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=vacation&amp;action=sitter_offer_cancel&amp;h={$hkey}">&raquo;Retrage invitatie</a></td>
		</tr>
		</table>
	{/if}
{/if}

{if count($vacation_accept)>0 && !$sid->is_vacation()}
	<h3>Mod de vacanta</h3>
	<p>Aici Vezi cine a facut cerere de sitter</p>
	<table class="vis">
	<tr><th width="200">Jucator</th></tr>
	{foreach from=$vacation_accept item=arr key=id}
		<tr><td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$id}">{$arr.username}</a></td>
		<td><a href="login_uv.php?id={$id}" target="_blank">&raquo; login</a></td>	</tr>
	{/foreach}
	</table>
{/if}

{if count($vacation)>0 && !$sid->is_vacation()}
	<h3>Comanda</h3>
	<p>Aici Vezi cine a facut cerere de sitter</p>
<tr>
<th>JUCATOR</th><th colspan="2">Actiune</th></tr>
	{foreach from=$vacation item=arr key=id}
		<tr>
		<td width="200"><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$id}">{$arr.username}</a></td>
		<td width="100"><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=vacation&amp;action=sitter_accept&amp;player_id={$id}&amp;h={$hkey}">accepta</a></td>
		<td width="100"><a href="javascript:ask('Doriti sa refuzati sitterul?', 'game.php?village={$village.id}&amp;screen=settings&amp;mode=vacation&amp;action=sitter_reject&amp;player_id={$id}&amp;h={$hkey}')">refuza</a></td>
		</tr>
	{/foreach}
{/if}