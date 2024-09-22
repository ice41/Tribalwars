<h3>Recomecar</h3>
<p>Se tem certeza de que não tem chance de sobreviver em sua área, tem a oportunidade de começar em uma nova aldeia. Sua antiga aldeia será abandonada e terá a opção de fundar uma nova aldeia no novo local.</p>

<p>Depois de reiniciar, deve esperar 3 dias antes de poder fazê-lo novamente. O reinício só é possível se tiver exatamente uma aldeia.</p>

{if $form}
	<form action="game.php?village={$village.id}&amp;screen=settings&amp;mode=move&amp;action=move&amp;h={$hkey}" method="post">
		Digite a senha para confirmação: <input name="password" type="password">
		<input value="OK" type="submit">
	</form>
{else}
	<b>Possível em : {$mozliwe_o}</b>
{/if}