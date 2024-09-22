<h3>Medalhas</h3>

<form method="post" action="game.php?village={$village.id}&amp;screen=settings&amp;mode=award&amp;action=h_set&amp;h={$hkey}">
	<table class="vis">
		<tbody><tr>
			<td><input name="hide_own_awards" type="checkbox" {if $setts.hide_own_awards}checked="checked"{/if}>Mostre seus proprios emblemas em seu perfil</td>
		</tr>
		<tr>
			<td><input name="hide_own_wtwaw" type="checkbox" {if $setts.hide_own_wtwaw}checked="checked"{/if}>Mostre seus próprios emblemas de classificacao</td>
		</tr>
		<tr>
			<td><input value="Salvar" type="submit"></td>
		</tr>
</tbody></table>
</form>
