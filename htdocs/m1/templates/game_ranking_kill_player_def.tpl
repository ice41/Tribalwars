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
			$site=$site+1;
		}
		settype($site, "integer");
		header("location: game.php?village=$id_sat&screen=ranking&mode=kill_player&type=def&site=$site&start=$from");
	}

	if($name <> ""){
		$name = trim($name);
		$name = urlencode($name);
		if(strlen($name) >= 3){
			$sql3 = "SELECT * FROM `users` WHERE `username` LIKE \"%$name%\"";
			$exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
			$numar_search = mysql_num_rows($exec_sql2);
			while($array2 = mysql_fetch_array($exec_sql2)){
				$id_user_search[] = $array2['id'];
				$username_user_search[] = $array2['username'];
				$killed_units_def_user_search[] = $array2['killed_units_def'];
				$killed_units_def_rank_user_search[] = $array2['killed_units_def_rank'];
			}
		}else{
			echo "<div class='error'>Para efetuar a busca voc&ecirc; deve digitar no minimo 3 caracteres.</div>";
		}
	}
{/php}
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th width="60">Rank</th>
		<th width="160">Nome</th>
		<th width="100">Total</th>
	</tr>
{php}
	if(strlen($name) >= 3){
		if($numar_search <> 0){
			foreach($id_user_search as $key => $value){
				$username_user_search[$key] = entparse($username_user_search[$key]);
				$userid = $value; 
				$var_vs = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$userid."'"));
				$allyid = $var_vs['ally'];
				$var_vs_ally = mysql_fetch_array(mysql_query("SELECT * FROM `ally` WHERE `id` = '$allyid'"));
				$short_name_ally = $var_vs_ally['short'];
				$id_ally_var = $var_vs_ally['id'];
{/php}
	<tr>
		<td>{php}echo $killed_units_def_rank_user_search[$key];{/php}</td>
		<td><a href="game.php?village={$village.id}&screen=info_player&id={php}echo $value;{/php}">{php}echo $username_user_search[$key];{/php}</a>{php}if($allyid != -1){{/php} [<a href="game.php?village={$village.id}&screen=info_ally&id={php}echo $id_ally_var;{/php}">{php}echo entparse($short_name_ally);{/php}</a>]{php}}{/php}</td>
		<td>{php}echo $killed_units_def_user_search[$key];{/php}</td>
	</tr>
{php}
			}
		}
	}else{
{/php}
	{foreach from=$ranks item=item key=id}
{php}
		$userid = $this->_tpl_vars['id']; 
		$var_vs = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$userid."'"));
		$allyid = $var_vs['ally'];
		$var_vs_ally = mysql_fetch_array(mysql_query("SELECT * FROM `ally` WHERE `id` = '$allyid'"));
		$short_name_ally = $var_vs_ally['short'];
		$id_ally_var = $var_vs_ally['id'];
{/php}
	<tr {if $lit==$ranks.$id.rang}class="lit"{/if} {$ranks.$id.mark}>
		<td>{$ranks.$id.rang}</td>
		<td><a href="game.php?village={$village.id}&screen=info_player&id={$id}">{$ranks.$id.username}</a>{php}if($allyid != -1){{/php} [<a href="game.php?village={$village.id}&screen=info_ally&id={php}echo $id_ally_var;{/php}">{php}echo entparse($short_name_ally);{/php}</a>]{php}}{/php}</td>
		<td>{$ranks.$id.killed_units}</td>
	</tr>
	{/foreach}
{php}
	}
{/php}
</table><br />
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr width="100%">
	{if $site!=1}
		<td align="center"><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_player&amp;type=def&amp;site={$site-1}">&lt;&lt;&lt; anterior</a></td>
	{/if}
	<td align="center"><a href="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_player&amp;type=def&amp;site={$site+1}">pr&oacute;xima &gt;&gt;&gt;</a></td>
	</tr>
</table><br />
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<td style="padding-right:10px; text-align: center;" width="45%">
			<form action="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_player&type=def" method="post">
				Rank: <input name="from" type="text" value="{php}if($start){ echo $start; }{/php}" size="1" />
				<input type="submit" class="button" value="Ok" />
			</form>
		</td>
 		<td style="padding-right:10px;text-align: center;"  width="55%">
			<form action="game.php?village={$village.id}&amp;screen=ranking&amp;mode=kill_player&type=def&amp;search=" method="post">
				Nome: <input name="name" type="text" value="{php}echo entparse($name);{/php}" size="7" />
				<input type="submit" class="button" value="Ok" />
			</form>
		</td>
	</tr>
</table>