<h1>Adaugare sate bonus!</h1>
<form action="?screen=add_villages&action=add_bonus" method="post">
<table class="vis">
<tr>
<th colspan="4">Adaugare sate parasite(maxim 1000)</th>
</tr>
{$error}
<tr>
<tr><td>Optiuni:</td><td colspan="3"><select name="bonus">
	<option value="0" selected="selected">Random</option>
	<option value="1">Magazia mai mare cu 50% si cu 30% mai multi negustori!</option>
	<option value="2">Ferma mai mare cu 10%</option>
	<option value="3">Productia in grajd cu 33% mai mare</option>
	<option value="4">Productia in cazarma cu 33% mai mare</option>
	<option value="5">Productia in atelier cu 50% mai mare</option>
	<option value="6">Productia de resurse mai mare cu 50%!</option>
</select></td></tr>
<td>Numar:</td><td><input type="text" name="anzahl" size="20" maxlength="4"></td><td><input type="submit" value="Adauga"></td></tr></table>
<table class="vis">
<tr>
<th colspan="1">Statistici sate bonus!</th><th colspan="1">Optiuni</th>
</tr>
<tr><td>Sunt <b>{$sate1}</b> de sate bonus cu </td><td>Magazia mai mare cu 50% si cu 30% mai multi negustori!</td></tr>
<tr><td>Sunt <b>{$sate2}</b> de sate bonus cu </td><td>Ferma mai mare cu 50%</td></tr>
<tr><td>Sunt <b>{$sate3}</b> de sate bonus cu </td><td>Productia in grajd cu 33% mai mare</td></tr>
<tr><td>Sunt <b>{$sate4}</b> de sate bonus cu </td><td>Productia in cazarma cu 33% mai mare</td></tr>
<tr><td>Sunt <b>{$sate5}</b> de sate bonus cu </td><td>Productia in atelier cu 50% mai mare</td></tr>
<tr><td>Sunt <b>{$sate6}</b> de sate bonus cu </td><td>Productia de resurse mai mare cu 50%!</td></tr>
<tr><td colspan="2">In total sunt <b>{$total}</b> de sate bonus</tr>
</table>

</form>
<hr />
<h1>Adaugare sate parasite normale!</h1>
<form action="?screen=add_villages&action=add_villages" method="post">
<table class="vis">
<tr>
<th colspan="3">Adaugare sate parasite(maxim 1000)</th>
</tr>
{$err}
<tr>
<td>Numar:</td><td><input type="text" name="numar" size="20" maxlength="4"></td><td with="10"><input name="buton" type="submit" value="Adauga"></td></tr>
<tr>
<td colspan="3"><b>Sunt {$sate} de sate parasite si bonus<b/></td>
</tr>
</table>

</form>
