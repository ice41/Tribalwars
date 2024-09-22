<h3>Zastêpstwo</h3>
<p>Jeœli chcesz, aby ktoœ ci "popilnowa³" konta, mo¿esz poprosiæ dowolnego gracza o zastêpstwo</p>

<p>Podczas trwania zastêpstwa zastêpca nie mo¿e:</p>
<ul>
<li>Przesy³aæ surowców</li>
<li>Wysy³aæ ataków</li>

<li>Przeprowadzaæ skoordynowanych ataków</li>
</ul>

{php}
$this->_tpl_vars['vacation_is_cancq'] = false;
{/php}
{if $vacation_is_cancq}

{if empty($user.vacation_name)}
	<form action="game.php?village={$village.id}&amp;screen=settings&amp;mode=vacation&amp;action=sitter_offer&amp;h={$hkey}" method="post">
		<table class="vis">
		<tr>
			<th>Zastêpca</th>
			<td><input name="sitter" type="text" /> <input type="submit" value="OK" /></td>
	
		</tr>
	    </table>
	</form>
{else}
	{if $sid->is_vacation()}
		<p>
		<a href="javascript:ask('Czy chcesz na pewno zakoñczyæ zastêpstwo?', 'game.php?village={$village.id}&amp;screen=settings&amp;mode=vacation&amp;action=end_vacation&amp;h={$hkey}')">Zakoñcz zastêpstwo</a>
		</p>
	{else}
		<table class="vis">
		<tr>
			<td>Wys³ano do:</td>
			<td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$user.vacation_id}">{$user.vacation_name}</a></td>
			<td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=vacation&amp;action=sitter_offer_cancel&amp;h={$hkey}">&raquo; Cofn¹æ proœbê</a></td>
		</tr>
		</table>
	{/if}
{/if}

{if count($vacation_accept)>0 && !$sid->is_vacation()}
	<h3>Aktywowane zastêpstwa</h3>
	<p>Tutaj mo¿esz siê przelogowaæ na konto zastêpowanego gracza:</p>
	<table class="vis">
	<tr><th width="200">Gracz</th></tr>
	{foreach from=$vacation_accept item=arr key=id}
		<tr><td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$id}">{$arr.username}</a></td>
		<td><a href="login_uv.php?id={$id}" target="_blank">&raquo; Wyloguj</a></td>	</tr>
	{/foreach}
	</table>
{/if}

{if count($vacation)>0 && !$sid->is_vacation()}
	<h3>Proœby o zastêpstwo</h3>
	<p>Gracze, którzy prosz¹ ciê o przyjêcie zastêpstwa</p>
	<table class="vis">
	<tr><th>Gracz</th><th colspan="2">Akcja</th></tr>
	{foreach from=$vacation item=arr key=id}
		<tr>
		<td width="200"><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$id}">{$arr.username}</a></td>
		<td width="100"><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=vacation&amp;action=sitter_accept&amp;player_id={$id}&amp;h={$hkey}">Przyj¹æ</a></td>
		<td width="100"><a href="javascript:ask('Czy chcesz od¿uciæ t¹ propozycjê?', 'game.php?village={$village.id}&amp;screen=settings&amp;mode=vacation&amp;action=sitter_reject&amp;player_id={$id}&amp;h={$hkey}')">Od¿uciæ</a></td>
		</tr>
	{/foreach}
{/if}

{else}
<span class="error"/>Opcja zastêpstwa zosta³a wy³¹czona przez administracjê gry.</span>
{/if}