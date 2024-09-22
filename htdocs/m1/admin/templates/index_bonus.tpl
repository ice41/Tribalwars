<h1>Adaugare sate bonus!</h1>
<form action="?screen=bonus&action=newvillages" method="post">
<table class="vis">
<tr>
<th colspan="2">Adaugare sate parasite(maxim 1000)</th>
</tr>
{$error}
<tr>
<tr><td>Optiuni:</td><td><select name="bonus">
	<option value="0" selected="selected">Random</option>
	<option value="1">Magazia mai mare cu 50% si cu 30% mai multi negustori!</option>
	<option value="2">Ferma mai mare cu 10%</option>
	<option value="3">Productia in grajd cu 33% mai mare</option>
	<option value="4">Productia in cazarma cu 33% mai mare</option>
	<option value="5">Productia in atelier cu 50% mai mare</option>
	<option value="6">Productia de resurse mai mare cu 50%!</option>
</select></td></tr>
<td>Numar:</td><td><input type="text" name="anzahl" size="20" maxlength="4"></td></tr>
</table>
<input type="submit" value="Adauga">
</form>
<hr />
<h1>Adaugare sate parasite normale!</h1>
<form action="?screen=bonus&action=newvillages" method="post">
<table class="vis">
<tr>
<th colspan="3">Adaugare sate parasite(maxim 1000)</th>
</tr>
{$error}
<tr>
<td>Numar:</td><td><input type="text" name="numar" size="20" maxlength="4"></td><td with="20"><input name="buton" type="submit" value="Adauga"></td></tr>
</table>

</form>
