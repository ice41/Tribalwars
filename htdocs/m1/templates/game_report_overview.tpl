<form action="game.php?village={$village.id}&amp;screen=report&amp;mode={$mode}&amp;action=del_arch&amp;h={$hkey}" method="post">
	<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
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
			<th>Assunto</th>
			<th>Recursos saqueados</th>
			<th width="140">Recebido em</th>
		</tr>
		{if count($reports)>0}
			{foreach from=$reports key=key item=array}
				{$ida}
		<tr>
		{php}
			$arr = $this->_tpl_vars['key']; 
			$hives = mysql_fetch_array(mysql_query("SELECT hives,type,agreement FROM reports WHERE id = '$arr'"));
		{/php}
			<td {php}if($hives['type'] != 'attack'){echo 'colspan="2"';}{/php}><input name="id_{$reports.$key.id}" type="checkbox" /> <a href="game.php?village={$village.id}&amp;screen=report&amp;mode={$mode}&amp;view={$reports.$key.id}">
{php}
	$explode_agreement = explode(";", $hives['agreement']);
	$data_terminaree=$this->_tpl_vars['reports'][$this->_tpl_vars['key']]['title'];
	if($explode_agreement['1'] < 0){
		if(preg_match('/greift/', $data_terminaree)){
			$data_terminaree = str_replace("greift","conquistou",$data_terminaree);
			$data_terminaree = str_replace(" an","",$data_terminaree);
		}
	}else{
		if(preg_match('/greift/', $data_terminaree)){
			$data_terminaree = str_replace("greift","atacou",$data_terminaree);
			$data_terminaree = str_replace(" an","",$data_terminaree);
		}
	}
	if(preg_match('/eingeladen/', $data_terminaree)) {
		$data_terminaree = str_replace("hat dich in den Stamm","te convidou para a tribo",$data_terminaree);
		$data_terminaree = str_replace(" eingeladen","",$data_terminaree);
	}
	if(preg_match('/Urlaubsvertretung/', $data_terminaree)) {
		$data_terminaree = str_replace("hat um eine Urlaubsvertretung angefragt","solicitou uma substituição!",$data_terminaree);
		$data_terminaree = str_replace("hat die Urlaubsvertretung beendet","terminou a substituição",$data_terminaree);
		$data_terminaree = str_replace("hat die Urlaubsvertretung angenommen","aceitou a solicitação de substituição",$data_terminaree);
	}
	if(preg_match('/eingeladen/', $data_terminaree)) {
		$data_terminaree = str_replace("Deine Unterstützung aus","Seu apoio em",$data_terminaree);
		$data_terminaree = str_replace(" wurde angegriffen","foi atacado",$data_terminaree);
	}
	if(preg_match('/hat deinen Stamm aufgel/', $data_terminaree)) {
		$data_terminaree = str_replace("hat deinen Stamm aufgel","debandou sua tribo",$data_terminaree);
		$data_terminaree = substr_replace($data_terminaree,"",-4);
	}
	$data_terminaree = str_replace("'","",$data_terminaree);
	if(preg_match('/Die Einladung des Stamm/', $data_terminaree)) {
		$data_terminaree = str_replace("Die Einladung des Stamm","O convite para a tribo",$data_terminaree);
		$data_terminaree = str_replace("wurde zur","foi cancelado",$data_terminaree);
		$data_terminaree = substr_replace($data_terminaree,"",-11);
	}
	if(preg_match('/Deine Unterstützung/', $data_terminaree)) {
		$data_terminaree = str_replace("Deine Unterstützung aus","Seu apoio de",$data_terminaree);
		$data_terminaree = str_replace("in","em",$data_terminaree);
		$data_terminaree = str_replace("wurde","foi atacado",$data_terminaree);
		$data_terminaree = substr_replace($data_terminaree,"",-11);
	}
	if(preg_match('/Deine UnterstÃ¼tzung/', $data_terminaree)) {
		$data_terminaree = str_replace("Deine UnterstÃ¼tzung aus","Seu apoio de",$data_terminaree);
		$data_terminaree = str_replace("in","em",$data_terminaree);
		$data_terminaree = str_replace("wurde","foi atacado",$data_terminaree);
		$data_terminaree = substr_replace($data_terminaree,"",-11);
	}

	if(preg_match('/unterstützt/', $data_terminaree)) {
		$data_terminaree = str_replace("unterstützt","apoiou",$data_terminaree);
	}
	if(preg_match('/unterstÃ¼tzt/', $data_terminaree)) {
		$data_terminaree = str_replace("unterstÃ¼tzt","apoiou",$data_terminaree);
	}
	if(preg_match('/Angebot von/', $data_terminaree)) {
		$data_terminaree = str_replace("Angebot von","Sua oferta foi aceita por",$data_terminaree);
		$data_terminaree = str_replace(" angenommen","",$data_terminaree);
	}
	$data_terminaree = str_replace("hat dein Angebot angenommen","aceitou sua oferta",$data_terminaree);
	$data_terminaree = str_replace("beliefert","forneceu",$data_terminaree);
	$data_terminaree = str_replace("besucht","visitou",$data_terminaree);

	$id_raport = $this->_tpl_vars['reports'][$this->_tpl_vars['key']]['id'];

	$titlu = $data_terminaree;
	$titlu = preg_replace("/\<img(.{1,})\>/i","",$titlu);

	$titlu = parse($titlu);

	if($data_terminaree<>$this->_tpl_vars['reports'][$this->_tpl_vars['key']]['title']){
		$sql5 = "UPDATE `reports` SET `title` = '$titlu' WHERE `id` = '$id_raport'";
		$exec_sql1 = mysql_query($sql5);
	}
	$data_terminaree = str_replace("graphic/dots", "../graphic/dots", $data_terminaree);
	echo $data_terminaree;
{/php}
			</a> {if $reports.$key.is_new=="1"} <strong>(novo)</strong>{else}<span class="inactive">(lido)</span>{/if}</td>
{php} 
	$hivess = explode(";", $hives[0]);
	if($hives['type'] == 'attack'){ echo "<td align=\"center\">".number_format($hivess['3'], 0, '', '.')."<span class='inactive'> / ".number_format($hivess['4'], 0, '', '.')."</span></td>"; }else{ }
{/php} 
			<td>{$reports.$key.date}</td>
		</tr>
			{/foreach}
		<tr>
			<th colspan="2"><input name="all" type="checkbox" onclick="selectAll(this.form, this.checked)" /> Selecionar todos </th>
			<th><div align="center"><input type="submit" value="Apagar" class="button" name="del" /></div></th>
		</tr>
		{/if}
	</table>
</form>