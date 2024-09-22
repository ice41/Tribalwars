<h3>Zacznij od nowa</h3>
<p>Je¿eli jesteœ pewien, ¿e nie masz szans na przetrwanie w twojej okolicy, masz mo¿liwoœæ startu w nowej wiosce. Twoja stara wioska zostanie w takim wypadku opuszczona, a ty masz mo¿liwoœæ za³o¿yæ now¹ wioskê na nowym miejscu.</p>

<p>Po ponownym rozpoczêciu musisz zaczekaæ 3 dni by mieæ mo¿liwoœæ zrobiæ to po raz kolejny. Restart jest mo¿liwy tylko wtedy, gdy masz dok³adnie jedn¹ wioskê.</p>

{if $form}
	<form action="game.php?village={$village.id}&amp;screen=settings&amp;mode=move&amp;action=move&amp;h={$hkey}" method="post">
		Podaj has³o dla potwierdzenia: <input name="password" type="password">
		<input value="OK" type="submit">
	</form>
{else}
	<b>Mo¿liwe w : {$mozliwe_o}</b>
{/if}