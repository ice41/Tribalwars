<?php /* Smarty version 2.6.14, created on 2011-01-16 13:58:08
         compiled from index_getfluela.tpl */ ?>
<h2>Bot sate de barbari</h2>
<table border="0" width="100%">

	<tr>
		<td>
		<p align="center">Acest bot odata ce e pornit este setat sa creeze singur sate de barbari la internal de cateva minute. 
                <p align="center"><?php if (! isset ( $_GET['action'] )): ?>Pentru a activa bot-ul apasa
		<a href="http://localhost/admin/index.php?screen=getfluela&action=start">
		aici</a><?php endif; ?><p align="center"><b><?php if ($_GET['action'] == 'start'): ?>Bot-ul de sate parasite a fost pornit el va creea un numar de sate la fiecare 20 de secunde<meta http-equiv='refresh' content='20; URL=index.php?screen=getfluela&action=start'><?php endif; ?></b><p align="center">&nbsp;<p align="center">
		Pentru a modifica numarul de sate de refugiati create odata la 20 de secunde intra in "htdocs/afluelaconfig.php"</td>
	</tr>
</table>