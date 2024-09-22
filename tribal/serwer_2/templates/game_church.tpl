{php}
$village = $this->get_template_vars('village');
{/php}
<table>
	<tr>
		<td>
			<img src="graphic/big_buildings/church_first.png"  alt="" />
		</td>
		<td>
			<h2>Kirche (Stufe {php} echo $village['church']; {/php})</h2>
			Die  Kirche stärkt den Glauben der Bewohner der umliegenden Dörfer. Ohne Kirche kämpfen die Einheiten dieses Dorfes und der Dörfer im Einflussbereich der Kirche schlechter. Der Glaubensbereich steigt pro steigendem Kirchenstufe!
			</td>
		</tr>
	</table>
	<br />
<h3>Dörfer in deinem Kirchenradius:</h3>
<table class="vis">
<tr><th>Dorf</th></tr>
{php}
if($village['church'] == 1) {
$step = 4;
} elseif($village['church'] == 2) {
$step = 6;
} else {
$step = 8; }
//Berechnet die Dörfer im Kirchenradius mit Radius $step
$user = $this->get_template_vars('user');
$result = mysql_query("SELECT * FROM villages WHERE userid = '".$user['id']."' and ((x <= '".$village['x']."-$step' and y <= '".$village['y']."-$step') or (x >= '".$village['x']."+$step' and y >= '".$village['y']."+$step'))");
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
echo "<tr><td><a href='game.php?village=".$village['id']."&screen=info_village&id=".$row['id']."'>".$row['name']." (".$row['x']."|".$row['y'].") K".$row['continent']."</a></td></tr>";
}
{/php}
</table>
