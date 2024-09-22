{php}
	$id_sat = $this->_tpl_vars['village']['id'];
	$id_player = $this->_tpl_vars['user']['id'];
	$mode = $_GET['mode'];
	$_POST['from'] = addslashes($_POST['from']);
	$from = $_POST['from'];
	$_POST['name'] = addslashes($_POST['name']);
	$name = $_POST['name'];
	$_GET['start'] = addslashes($_GET['start']);
	$start = $_GET['start'];
	$this->_tpl_vars['lit'] = $start;
	settype($start, "integer");
	if($from <> ""){
		settype($from, "integer");
		$site = $from/20;
		if($from%20 <> 0){
			$site = $site+1;
		}
		settype($site, "integer");
		header("location: game.php?village=$id_sat&screen=ranking&mode=ally&site=$site&start=$from");
	}

	if($name <> ""){
		$name = trim($name);
		$name = urlencode($name);
		if(strlen($name) >= 3){
			$sql3 = "SELECT * FROM `ally` WHERE `short` LIKE \"%$name%\"";
			$exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
			$numar_search = mysql_num_rows($exec_sql2);
			while($array2 = mysql_fetch_array($exec_sql2)){
				$id_ally_search[] = $array2['id'];
				$short_ally_search[] = $array2['short'];
				$villages_ally_search[] = $array2['villages'];
				$points_ally_search[] = $array2['points'];
				$best_points_ally_search[] = $array2['best_points'];
				$rank_ally_search[] = $array2['rank'];
				$members_ally_search[] = $array2['members'];
			}
		}else{
			echo "<div class='error'>Para efetuar a busca voc&ecirc; deve digitar no minimo 3 caracteres.</div>";
		}
	}
{/php}
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th width="60">Rank</th>
		<th width="60">Nome da tribo</th>
		<th width="60">Total de pontos</th>
		<th width="100">Membros</th>
		<th width="100">M&eacute;dia de pontos por jogador</th>
		<th width="60">Aldeias</th>
		<th width="100">M&eacute;dia de pontos por aldeias</th>
	</tr>
{php}
	if(strlen($name) >= 3){
		if($numar_search <> 0){
			foreach($id_ally_search as $key => $value){
				if($members_ally_search[$key] <> 0){
					$medie_jucator = $points_ally_search[$key]/$members_ally_search[$key];
					$medie_jucator = round($medie_jucator);
				}else{
					$medie_jucator = 0;
				}

				if($members_ally_search[$key] <> 0){
					$medie_sate_jucator = $villages_ally_search[$key]/$members_ally_search[$key];
					$medie_sate_jucator = round($medie_sate_jucator);
				}else{
					$medie_sate_jucator = 0;
				}

				if($medie_sate_jucator <> 0){
					$medie_sate = $medie_jucator/$medie_sate_jucator;
					$medie_sate = round($medie_sate);
				}else{
					$medie_sate = 0;
				 }
				$short_ally_search[$key] = entparse($short_ally_search[$key]);
{/php}
	<tr>
		<td align="center">{php}echo $rank_ally_search[$key];{/php}</td>
		<td align="center"><a href="game.php?village={$village.id}&screen=info_ally&id={php}echo $value;{/php}">{php}echo $short_ally_search[$key];{/php}</a></td>
		<td align="center">{php}echo $points_ally_search[$key];{/php}</td>
		<td align="center">{php}echo $members_ally_search[$key];{/php}</td>
		<td align="center">{php}echo $medie_jucator;{/php}</td>
		<td align="center">{php}echo $villages_ally_search[$key];{/php}</td>
		<td align="center">{php}echo $medie_sate;{/php}</td>
	</tr>
{php}
			}
		}
	}else{
{/php}
	{foreach from=$ranks item=item key=id}
	<tr {if $lit == $ranks.$id.rank}class="selected"{/if} {$ranks.$id.mark}>
		<td align="center">{$ranks.$id.rank}</td>
		<td align="center"><a href="game.php?village={$village.id}&screen=info_ally&id={$id}">{$ranks.$id.short}</a></td>
		<td align="center">{$ranks.$id.points}</td>
		<td align="center">{$ranks.$id.members}</td>
		<td align="center">{$ranks.$id.cuttrought_members|format_number}</td>
		<td align="center">{$ranks.$id.villages}</td>
		<td align="center">{$ranks.$id.cuttrought_villages|format_number}</td>
	</tr>
	{/foreach}
{php}
	}
{/php}
</table><br />
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr width="100%">
		{if $site != 1}
		<td align="center">
			<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally&amp;site={$site-1}">&lt;&lt;&lt; anterior</a>
		</td>
		{/if}
		<td align="center">
			<a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally&amp;site={$site+1}">pr&oacute;xima &gt;&gt;&gt;</a>
		</td>
	</tr>
</table><br />
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<td width="30%" aign="center">
			<form action="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally" method="post">
				Rank: <input name="from" type="text" value="{php}if($start){ echo $start; }{/php}" size="6" />
				<input type="submit" class="button" value="Ok" />
			</form>
		</td>
		<td width="20%" align="center">
			<form name="form" id="form">
				P&aacute;gina: <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
{php}
	$sql = "SELECT COUNT(id) FROM ally"; 
	$rs_result = mysql_query($sql); 
	$row = mysql_fetch_row($rs_result); 
	$total_records = $row[0];
	$total_pages = ceil($total_records / 20);
	for($i=1; $i<=$total_pages; $i++){
		$p = $_GET['site'];
		if($_GET['site'] == $i){ $selected = 'selected="selected"'; }else{ $selected = ''; }
		echo '<option '.$selected.' value="game.php?village='.$id_sat.'&screen=ranking&mode=ally&site='.$i.'">'.$i.'</option>';
	}
{/php}
				</select>
			</form>
		</td>
		<td width="50%" align="center">
			<form action="game.php?village={$village.id}&amp;screen=ranking&amp;mode=ally&amp;search=" method="post">
				Abrevia&ccedil;&atilde;o: <input name="name" type="text" value="{php}echo entparse($name);{/php}" size="20" />
				<input type="submit" class="button" value="Ok" />
			</form>
		</td>
	</tr>
</table>