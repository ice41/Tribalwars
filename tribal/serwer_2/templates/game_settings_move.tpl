<h3>Zacznij od nowa</h3>
<p>Je�eli jeste� pewien, �e nie masz szans na przetrwanie w twojej okolicy, masz mo�liwo�� startu w nowej wiosce. Twoja stara wioska zostanie w takim wypadku opuszczona, a ty masz mo�liwo�� za�o�y� now� wiosk� na nowym miejscu.</p>

<p>Po ponownym rozpocz�ciu musisz zaczeka� 3 dni by mie� mo�liwo�� zrobi� to po raz kolejny. Restart jest mo�liwy tylko wtedy, gdy masz dok�adnie jedn� wiosk�.</p>

{if $form}
	<form action="game.php?village={$village.id}&amp;screen=settings&amp;mode=move&amp;action=move&amp;h={$hkey}" method="post">
		Podaj has�o dla potwierdzenia: <input name="password" type="password">
		<input value="OK" type="submit">
	</form>
{else}
	<b>Mo�liwe w : {$mozliwe_o}</b>
{/if}