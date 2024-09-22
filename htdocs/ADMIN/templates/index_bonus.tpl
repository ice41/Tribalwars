<h1>Sate bonus</h1>
<h3>Editeaza sate bonus</h3>
<br>{$status}
<table border="1" width="100%" style="border-collapse: collapse" bordercolor="#000000" bgcolor="#F8F4E8">
	<tr>
		<td width="20%"><b>ID</b></td>
		<td width="20%"><b>Proprietar</b></td>
		<td width="20%"><b>Numele satului</b></td>
		<td width="20%"><b>Sat bonus</b></td>
		<td width="20%"><b>Actiune</b></td>
	</tr>
	{foreach from=$villages item=vill}
	<tr>
		<td>{$vill.id}</td>
		<td>{php}echo get_playername($this->_tpl_vars["vill"]["userid"]){/php}</td>
		<td>{$vill.name}</td>
		<td>{if $vill.bonus > "0"}Da{else}Nu{/if}</td>
		<td>{if $vill.bonus > "0"}<a href="?screen=bonus&delete={$vill.id}">Sterge bonusul</a>{else}<a href="?screen=bonus&add={$vill.id}">Adauga bonus</a>{/if}</td>
	</tr>
	{/foreach}
</table>
<br>
<br>

<h3>Creaza sate bonus</h3>

<form action="?screen=bonus&action=newvillages#status" method="post">
Numar:<br>
<input type="text" name="anzahl" size="3" maxlength="3">
<br><br>

Bonus:<br>
<select name="bonus">
	<option value="0">Aleatoriu</option>
	<option value="1">50% mai mult&#259; capacitate de depozitare si negustori</option>
	<option value="2">10% mai mult&#259; popula&#355;ie</option>
	<option value="3">33% produc&#355;ie mai rapid&#259; &#238;n grajd</option>
	<option value="4">33% produc&#355;ie mai rapid&#259; &#238;n cazarm&#259;</option>
	<option value="5">50% produc&#355;ie mai rapid&#259; &#238;n atelier</option>
	<option value="6">30% produc&#355;ie m&#259;rit&#259; de resurse</option>
</select>
<br><br>

<input type="submit" value="Creati">
</form><br>

<a name="status"></a>
{$error}<br><br>