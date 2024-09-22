<tr align="right">
                                                                                                                                        <td align="left" width ="33%"><a href="?article=external_igm">&laquo; Mesaje externe</a></td>
                                                                                                                                <td align="center" width ="33%"><a href="?article=server_info">Alte informatii</a></td>

                                                                                                                                        <td align="right" width ="33%"><a href="?article="></a></td>
                                                                                                                        </tr>
                                                </table>

                                        </td>
                                </tr>
                                <tr>
                                        <td>
						<h1>Datele lumii</h1>
						<p>Pentru a creea statistici externe sau ceva asemanator, îti oferim datele cele mai importante ale lumii într-un download. Însusirile satelor, ale triburilor si ale jucatorilor sunt în mod regulat într-un Download. Între timp exista deja mai multe date, ca de exemplu nobilimea de la începutul lumii cu Unix Timestamp sau contexte de profile.</p>

<p>Incearca sa-ti iei cât mai rar datele lumii, pentru a reduce traficul. Scripturi, care în uzul normal îsi iau date mai mult de o data pe ora, nu sunt admise. Încearca în cazul acesta, sa-ti iei datele de pe un server extern. Datele lumilor sunt actualizate în mod curent. Timpul dintre actualizari este specific serverului respectiv.</p>
<p>Poti lua date si în forma comprimata (dataend .txt.gz). Ca metoda de comprimare s-a folosit gzip. Foloseste aceste date, daca îti este posibil.</p>

<p>Exista în total 5 files pentru download. Fiecare file contine mai multe rânduri, care contin date despartite prin virgula. Acestea sunt codate cu ajutorul functiunii PHP urlencode(), din cauza aceasta este înlocuita, de exemplu o virgula, prin %2C.</p>

<h4><a href="/map/village.txt">/map/village.txt</a> - <a href="/map/village.txt.gz">/map/village.txt.gz</a></h4>
<p>În acest file se gasesc informatii despre sate. Datele stau în ordinea urmatoare la dispozitie:</p>
<pre>$id, $name, $x, $y, $player, $points, $rank</pre>

<h4><a href="/map/player.txt">/map/player.txt</a> - <a href="/map/player.txt.gz">/map/player.txt.gz</a></h4>
<p>În acest file sunt informatiile despre jucatori. Datele stau în ordinea urmatoare la dispozitie:</p>
<pre>$id, $name, $ally, $villages, $points, $rank</pre>

<h4><a href="/map/ally.txt">/map/ally.txt</a> - <a href="/map/ally.txt.gz">/map/ally.txt.gz</a></h4>
<p>În acest file sunt informatiile despre triburi. Datele stau în ordinea urmatoare la dispozitie:</p>
<pre>$id, $name, $tag, $members, $villages, $points, $all_points, $rank</pre>

<h4><a href="/map/conquer.txt">/map/conquer.txt</a> - <a href="/map/conquer.txt.gz">/map/conquer.txt.gz</a></h4>
<p>Acest file contine toate titlurile nobile de la începutul lumii. Datele îti stau la dispozitie în ordinea urmatoare:</p>
<pre>$village_id, $unix_timestamp, $new_owner, $old_owner</pre>

<h4>/interface.php?func=get_conquer&since=unix_timestamp</h4>
<p>Prin functiunea aceasta poti vedea toate titlurile nobile de la ultimul Unix-Timestamp. Timestamp nu are voie sa fie mai vechi de 24 ore. Datele îti stau la dispozitie în ordinea urmatoare:</p>
<pre>$village_id, $unix_timestamp, $new_owner, $old_owner</pre>

<h4><a href="/map/profile.txt">/map/profile.txt</a> - <a href="/map/profile.txt.gz">/map/profile.txt.gz</a></h4>
<p>În acest file sunt datele din profilul jucatorilor. Datele îti stau la dispozitie în ordinea urmatoare:</p>
<pre>$player_id, Geburtstag, Geschlecht, Wohnort, Profiltext (als XHTML), Profilbild-Dateiname</pre>


<h4><a href="/interface.php?func=get_config">/interface.php?func=get_config</a></h4>
<p>Prin aceasta functie poti citi configuratia lumii (Format: XML).</p>

<h4>Exemplu</h4>
<p>Un exemplu simplu în PHP, pentru a scrie Satul + Numele din lumea 1 într-o MySQL-Datebase:</p>

<pre>
$lines = gzfile('http://ds1.die-staemme.de/map/village.txt.gz');
if(!is_array($lines)) die("File nu a putut fi deschis");
foreach($lines as $line) {
	list($id, $name,$x, $y, $player, $points, $rank) = explode(',', $line);
	$name = urldecode($name);

	$name = addslashes($name);
	mysql_query("INSERT INTO village SET id='$id', name='$name', x='$x', y='$y',
		player='$player', points='$points', rank='$rank'");
}
</pre>

<p>Mai multe informatii gasesti în<a href="http://forum.die-staemme.de/showthread.php?t=71112">Forum</a>.</p>                                   </td>
                                </tr>
                                <tr>
                                        <td>


                                        <table class="vis" width="100%">
                                                <tr align="right">
                                                                                                                        <td align="left" width ="33%"><a href="?article=external_igm">&laquo; Mesaje externe</a></td>
                                                                                                                        <td align="center" width ="33%"><a href="?article=server_info">Alte informatii</a></td>
                                                                                                                        <td align="right" width ="33%"><a href="?article="></a></td>
                                                                                                        </tr>