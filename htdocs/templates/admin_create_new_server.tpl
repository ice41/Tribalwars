<h3>Tworzenie nowego serwera</h3>
{if !empty($err)}
	<font color="red">{$err}</font>
{/if}
{if !empty($sukces)}
	<font color="green">{$sukces}</font>
{/if}
<br>

<small>Dodawanie serwera mo¿e trwaæ minutê!</small>
<form action="admin.php?screen=create_new_server&akcja=add_new_server" method="POST"/>
	<table class="vis" width="400">
		<tr>
			<th>Opcja</th>
			<th>Wartoœæ</th>
		</tr>
		<tr>
			<td>Szybkoœæ serwera:</td>
			<td><input type="text" name="speed" value="1" style="width: 135px;"/></td>
		</tr>
		<tr>
			<td>Szybkoœæ jednostek:</td>
			<td><input type="text" name="movement_speed" value="1" style="width: 135px;"/></td>
		</tr>
		<tr>
			<td>Poparcie na godzinê:</td>
			<td><input type="text" name="agreement_per_hour" value="1" style="width: 135px;"/></td>
		</tr>
		<tr>
			<td>Szybkoœæ kupców:</td>
			<td><input type="text" name="dealer_time" value="12" style="width: 135px;"/></td>
		</tr>
		<tr>
			<td colspan="2"><center><input type="submit" name="sub" value="Dodaæ nowy serwer" style="width: 135px;"/></center></td>
		</tr>
	</table>
</form>