<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th>Rank</th>
		<th>Jogador</th>
		<th>Recursos saqueados</th>
	</tr>
{php}
	$cookie = $_COOKIE['top'];
	settype($cookie, "integer");
	if(!$cookie){
		$cookie = 10;
	}else{
		if($cookie > 60){
			$error = 'O m&aacute;ximo &eacute; de 60 posi&ccedil;&otilde;es.';
			setcookie('top', '10', time()+454545);
			$cookie = 10;
		}else{
			$cookie = $_COOKIE['top'];
		}
	}
	settype($cookie, "integer");
	$query = "SELECT `id`, `username`, SUM(hives_total) AS hives FROM `users` GROUP BY `id` ORDER BY `hives` DESC LIMIT $cookie"; 
	$result = mysql_query($query) or die(mysql_error());
	mysql_query("UPDATE `users` SET `hives_rank` = '0'");
	while($row = mysql_fetch_array($result)){
		$i = $i++ + 1;
		mysql_query("UPDATE users SET `hives_rank` = 0+$i WHERE id = '".$row['id']."'");
		if($row['id'] == $this->_tpl_vars['user']['id']){
			echo '<tr class="lit"><td>'.$i.'</td><td><a href="game.php?village='.$_GET['village'].'&screen=info_player&id='.$row['id'].'">'.stripslashes(entparse($row['username'])).'</a></td><td>'.number_format($row['hives'], 0, '', '.').'</td></tr>';
		}else{
			echo '<tr><td>'.$i.'</td><td><a href="game.php?village='.$_GET['village'].'&screen=info_player&id='.$row['id'].'">'.stripslashes(entparse($row['username'])).'</a></td><td>'.number_format($row['hives'], 0, '', '.').'</td></tr>';
		}
	}
	if($_GET['sup'] == 'ok'){
		$top = $_POST['top'];
		settype($top, "integer");
		if($top > 60){
			$error = 'O m&aacute;ximo &eacute; de 60 posi&ccedil;&otilde;es.';
		}else{
			setcookie("top", $top, time()+60*60*24*300);
			$vil = $_GET['village'];
			header("Location: game.php?village=$vil&screen=ranking&mode=hives");
			exit;
		}
	}
	if($error){echo '<div class="error">'.$error.'</div>';}
{/php}
	<form action="game.php?village={$village.id}&screen=ranking&mode=hives&sup=ok" method="POST" />
		<th colspan="4">Top: <input type="text" name="top" size="20" value="{php}echo $cookie;{/php}"/> <input type="submit" value="OK" class="button" /></th>
	</form>
</table>
