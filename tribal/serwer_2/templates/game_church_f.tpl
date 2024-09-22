<table>
	<tr>
		<td>
			<img src="graphic/big_buildings/church_first.png"  alt="" />
		</td>
		<td>
			<h2> 	Erste Kirche (Stufe 1)</h2>
			Die Erste Kirche stärkt den Glauben der Bewohner der umliegenden Dörfer. Die Erste Kirche kann nur einmal gebaut werden. Ohne Kirche kämpfen die Einheiten dieses Dorfes und der Dörfer im Einflussbereich der Kirche schlechter. 
			</td>
		</tr>
	</table>
	<br />
<h3>Dörfer in deinem Kirchenradius:</h3>
<table class="vis">
<tr><th>Dorf</th></tr>
{php}
//Berechnet die Dörfer im Kirchenradius mit Radius 6
$user = $this->get_template_vars('user');
$village = $this->get_template_vars('village');
$result = mysql_query("SELECT * FROM villages WHERE userid = '".$user['id']."' and ((x <= '".$village['x']."-6' and y <= '".$village['y']."-6') or (x >= '".$village['x']."+6' and y >= '".$village['y']."+6'))");
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
echo "<tr><td><a href='game.php?village=".$village['id']."&screen=info_village&id=".$row['id']."'>".$row['name']." (".$row['x']."|".$row['y'].") K".$row['continent']."</a></td></tr>";
}
{/php}
</table>
