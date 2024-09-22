<h3>Zast�pstwo</h3>
<p>Je�li chcesz, aby kto� ci "popilnowa�" konta, mo�esz poprosi� dowolnego gracza o zast�pstwo</p>

<p>Podczas trwania zast�pstwa zast�pca nie mo�e:</p>
<ul>
<li>Przesy�a� surowc�w</li>
<li>Wysy�a� atak�w</li>

<li>Przeprowadza� skoordynowanych atak�w</li>
</ul>

{php}
$this->_tpl_vars['vacation_is_cancq'] = false;
{/php}
{if $vacation_is_cancq}

{if empty($user.vacation_name)}
	<form action="game.php?village={$village.id}&amp;screen=settings&amp;mode=vacation&amp;action=sitter_offer&amp;h={$hkey}" method="post">
		<table class="vis">
		<tr>
			<th>Zast�pca</th>
			<td><input name="sitter" type="text" /> <input type="submit" value="OK" /></td>
	
		</tr>
	    </table>
	</form>
{else}
	{if $sid->is_vacation()}
		<p>
		<a href="javascript:ask('Czy chcesz na pewno zako�czy� zast�pstwo?', 'game.php?village={$village.id}&amp;screen=settings&amp;mode=vacation&amp;action=end_vacation&amp;h={$hkey}')">Zako�cz zast�pstwo</a>
		</p>
	{else}
		<table class="vis">
		<tr>
			<td>Wys�ano do:</td>
			<td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$user.vacation_id}">{$user.vacation_name}</a></td>
			<td><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=vacation&amp;action=sitter_offer_cancel&amp;h={$hkey}">&raquo; Cofn�� pro�b�</a></td>
		</tr>
		</table>
	{/if}
{/if}

{if count($vacation_accept)>0 && !$sid->is_vacation()}
	<h3>Aktywowane zast�pstwa</h3>
	<p>Tutaj mo�esz si� przelogowa� na konto zast�powanego gracza:</p>
	<table class="vis">
	<tr><th width="200">Gracz</th></tr>
	{foreach from=$vacation_accept item=arr key=id}
		<tr><td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$id}">{$arr.username}</a></td>
		<td><a href="login_uv.php?id={$id}" target="_blank">&raquo; Wyloguj</a></td>	</tr>
	{/foreach}
	</table>
{/if}

{if count($vacation)>0 && !$sid->is_vacation()}
	<h3>Pro�by o zast�pstwo</h3>
	<p>Gracze, kt�rzy prosz� ci� o przyj�cie zast�pstwa</p>
	<table class="vis">
	<tr><th>Gracz</th><th colspan="2">Akcja</th></tr>
	{foreach from=$vacation item=arr key=id}
		<tr>
		<td width="200"><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$id}">{$arr.username}</a></td>
		<td width="100"><a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=vacation&amp;action=sitter_accept&amp;player_id={$id}&amp;h={$hkey}">Przyj��</a></td>
		<td width="100"><a href="javascript:ask('Czy chcesz od�uci� t� propozycj�?', 'game.php?village={$village.id}&amp;screen=settings&amp;mode=vacation&amp;action=sitter_reject&amp;player_id={$id}&amp;h={$hkey}')">Od�uci�</a></td>
		</tr>
	{/foreach}
{/if}

{else}
<span class="error"/>Opcja zast�pstwa zosta�a wy��czona przez administracj� gry.</span>
{/if}