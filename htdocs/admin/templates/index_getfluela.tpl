<h2>Bot sate de barbari</h2>
<table border="0" width="100%">

	<tr>
		<td>
		<p align="center">Acest bot odata ce e pornit este setat sa creeze singur sate de barbari la internal de cateva minute. 
                <p align="center">{if !isset($smarty.get.action)}Pentru a activa bot-ul apasa
		<a href="http://localhost/admin/index.php?screen=getfluela&action=start">
		aici</a>{/if}<p align="center"><b>{if $smarty.get.action == 
		"start"}Bot-ul de sate parasite a fost pornit el va creea un numar de sate la fiecare 20 de secunde<meta http-equiv='refresh' content='20; URL=index.php?screen=getfluela&action=start'>{/if}</b><p align="center">&nbsp;<p align="center">
		Pentru a modifica numarul de sate de refugiati create odata la 20 de secunde intra in "htdocs/afluelaconfig.php"</td>
	</tr>
</table>