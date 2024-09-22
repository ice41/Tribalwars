<form action="game.php?village={$village.id}&amp;screen=report&amp;mode={$mode}&amp;action=del_arch&amp;h={$hkey}" method="post">
	<table class="vis" width="100%">
		{if $num_pages>1}
			<tr>
				<td align="center" colspan="2">
					{section name=countpage start=1 loop=$num_pages+1 step=1}
						{if $site==$smarty.section.countpage.index}
							<strong> &gt;{$smarty.section.countpage.index}&lt; </strong>
						{else}
							<a href="game.php?village={$village.id}&amp;screen=report&amp;mode={$mode}&amp;site={$smarty.section.countpage.index}"> [{$smarty.section.countpage.index}] </a>
						{/if}
					{/section}
				</td>
			</tr>
		{/if}
		<tr>
			<th>Subiect</th>
			<th width="140">Primire</th>
		</tr>
		{if count($reports)>0}
			{foreach from=$reports key=key item=array}
				{$ida}
				<tr>
					<td><input name="id_{$reports.$key.id}" type="checkbox" /> <a href="game.php?village={$village.id}&amp;screen=report&amp;mode={$mode}&amp;view={$reports.$key.id}">{php}

$data_terminaree=$this->_tpl_vars['reports'][$this->_tpl_vars['key']]['title'];
if(preg_match('/greift/', $data_terminaree)) {
$data_terminaree = str_replace("greift","ataca",$data_terminaree);
$data_terminaree = str_replace(" an","",$data_terminaree);
}
if(preg_match('/eingeladen/', $data_terminaree)) {
$data_terminaree = str_replace("hat dich in den Stamm","te-a invitat in tribul",$data_terminaree);
$data_terminaree = str_replace(" eingeladen","",$data_terminaree);
}

if(preg_match('/hat deinen Stamm aufgel/', $data_terminaree)) {
$data_terminaree = str_replace("hat deinen Stamm aufgel","a dizolvat tribul in care te aflai",$data_terminaree);
$data_terminaree = substr_replace($data_terminaree,"",-4);
}
$data_terminaree = str_replace("'","",$data_terminaree);


if(preg_match('/Die Einladung des Stamm/', $data_terminaree)) {
$data_terminaree = str_replace("Die Einladung des Stamm","Invitatia tribului",$data_terminaree);
$data_terminaree = str_replace("wurde zur","a fost retrasa",$data_terminaree);
$data_terminaree = substr_replace($data_terminaree,"",-11);
}

if(preg_match('/Angebot von/', $data_terminaree)) {
$data_terminaree = str_replace("Angebot von","Oferta a fost acceptata de",$data_terminaree);
$data_terminaree = str_replace(" angenommen","",$data_terminaree);
}

$data_terminaree = str_replace("hat dein Angebot angenommen","a acceptat oferta",$data_terminaree);
$data_terminaree = str_replace("beliefert","aprovizioneaza",$data_terminaree);

$data_terminaree = str_replace("besucht","viziteaza",$data_terminaree);
$data_terminaree=urlencode($data_terminaree);

if(preg_match('/Deine/', $data_terminaree)) {
$data_terminaree = str_replace("Deine+Unterst%C3%BCtzung+aus","Sprijinul tau din",$data_terminaree);
$data_terminaree = str_replace("wurde+angegriffen","a fost atacat",$data_terminaree);
}

$data_terminaree = str_replace("unterst%C3%BCtzt","sprijina",$data_terminaree);
$data_terminaree=urldecode($data_terminaree);


$id_raport=$this->_tpl_vars['reports'][$this->_tpl_vars['key']]['id'];



$titlu=$data_terminaree;
$titlu = preg_replace("/\<img(.{1,})\>/i","",$titlu);

$titlu=urlencode($titlu);


if ($data_terminaree<>$this->_tpl_vars['reports'][$this->_tpl_vars['key']]['title']) {

$sql5 = "UPDATE `reports` SET `title` = '$titlu' WHERE `id` = '$id_raport'";
$exec_sql1 = mysql_query($sql5);
}

//Variabila originala tpl:{$reports.$key.title}

echo $data_terminaree;
{/php}</a> {if $reports.$key.is_new=="1"}(nou){/if}</td>
					<td>{$reports.$key.date}</td>
				</tr>
			{/foreach}
			<tr>
				<th><input name="all" type="checkbox" onclick="selectAll(this.form, this.checked)" /> Selecta&#355;i toate </th>
				<th></th>
			</tr>
			</table>

			<table class="vis" align="left">
			<tr>
				<td><input type="submit" value="Sterge" name="del" /></td>
			</tr>
		{/if}
	</table>
</form>