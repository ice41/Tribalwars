<?php /* Smarty version 2.6.14, created on 2016-12-22 21:33:29
         compiled from game_ranking_player.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'game_ranking_player.tpl', 85, false),)), $this); ?>
<?php 
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
		$site=$from/20;
		if($from%20 <> 0){
			$site = $site+1;
		}
		settype($site, "integer");
		header("location: game.php?village=$id_sat&screen=ranking&mode=player&site=$site&start=$from");
	}
	if($name <> ""){
		$name = trim($name);
		$name = urlencode($name);
		if(strlen($name) >= 3){
			$sql3 = "SELECT * FROM `users` WHERE username LIKE \"%$name%\"";
			$exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
			$numar_search = mysql_num_rows($exec_sql2);
			while($array2 = mysql_fetch_array($exec_sql2)){
				$id_user_search[] = $array2['id'];
				$username_user_search[] = $array2['username'];
				$villages_user_search[] = $array2['villages'];
				$points_user_search[] = $array2['points'];
				$ally_user_search[] = $array2['ally'];
				$rang_user_search[] = $array2['rang'];
			}
		}else{
			echo "<div class='error'>Para efetuar a busca voc&ecirc; deve digitar no minimo 3 caracteres.</div>";
		}
	}
 ?>
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th width="60">Rank</th>
		<th width="200">Nome</th>
		<th width="100">Tribo</th>
		<th width="60">Pontos</th>
		<th>Aldeias</th>
		<th>M&eacute;dia de pontos por aldeia</th>
	</tr>
<?php 
	if(strlen($name) >= 3){
		if($numar_search <> 0){
			foreach($id_user_search as $key => $value){
				if($villages_user_search[$key] <> 0){
					$medie_sat = $points_user_search[$key]/$villages_user_search[$key];
					$medie_sat = round($medie_sat);
				}else{
					$medie_sat = 0;
				}
				$short_trib = entparse($short_trib);
				$username_user_search[$key] = entparse($username_user_search[$key]);
				$select_ally = mysql_fetch_array(mysql_query("SELECT `short` FROM `ally` WHERE `id` = '".$ally_user_search[$key]."'"));
 ?>
	<tr>
		<td align="center"><?php echo $rang_user_search[$key]; ?></td>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_player&id=<?php echo $value; ?>"><?php echo $username_user_search[$key]; ?></a></td>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_ally&id=<?php echo $ally_user_search[$key]; ?>"><?php echo entparse($select_ally[0]); ?></a></td>
		<td align="center"><?php echo format_number($points_user_search[$key]); ?></td>
		<td align="center"><?php echo $villages_user_search[$key]; ?></td>
		<td align="center"><?php echo format_number($medie_sat); ?></td>
	</tr>
<?php 
			}
		}
	}else{
 ?>
	<?php $_from = $this->_tpl_vars['ranks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['item']):
?>
	<tr <?php if ($this->_tpl_vars['lit'] == $this->_tpl_vars['ranks'][$this->_tpl_vars['id']]['rang']): ?>class="lit"<?php endif;  echo $this->_tpl_vars['ranks'][$this->_tpl_vars['id']]['mark']; ?>
>
		<td align="center"><?php echo $this->_tpl_vars['ranks'][$this->_tpl_vars['id']]['rang']; ?>
</td>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_player&id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['ranks'][$this->_tpl_vars['id']]['username']; ?>
</a></td>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_ally&id=<?php echo $this->_tpl_vars['ranks'][$this->_tpl_vars['id']]['ally']; ?>
"><?php echo $this->_tpl_vars['ranks'][$this->_tpl_vars['id']]['allyname']; ?>
</a></td>
		<td align="center"><?php echo $this->_tpl_vars['ranks'][$this->_tpl_vars['id']]['points']; ?>
</td>
		<td align="center"><?php echo $this->_tpl_vars['ranks'][$this->_tpl_vars['id']]['villages']; ?>
</td>
		<td align="center"><?php echo ((is_array($_tmp=$this->_tpl_vars['ranks'][$this->_tpl_vars['id']]['cuttrought'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
<?php 
	}
 ?>
</table><br />
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr width="100%">
	<?php if ($this->_tpl_vars['site'] != 1): ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=player&amp;site=<?php echo $this->_tpl_vars['site']-1; ?>
">&lt;&lt;&lt; anterior</a></td>
	<?php endif; ?>
		<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=player&amp;site=<?php echo $this->_tpl_vars['site']+1; ?>
">pr&oacute;xima &gt;&gt;&gt;</a></td>
	</tr>
</table><br />
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<td width="30%" align="center">
			<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=player" method="post"> 
				Rank: <input name="from" type="text" value="<?php if($start){ echo $start; } ?>" size="6" />
				<input type="submit" class="button" value="Ok" />
			</form>
		</td>
		<td width="20%" align="center">
			<form name="form" id="form">
				P&aacute;gina: <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('parent',this,0)">
<?php 
	$sql = "SELECT COUNT(id) FROM users"; 
	$rs_result = mysql_query($sql); 
	$row = mysql_fetch_row($rs_result); 
	$total_records = $row[0];
	$total_pages = ceil($total_records / 20);
	for($i=1; $i<=$total_pages; $i++){
		echo $p = $this->_tpl_vars['site'];
		if($p == $i){ $selected = 'selected="selected"'; }else{ $selected = ''; }
		echo '<option '.$selected.' value="game.php?village='.$id_sat.'&screen=ranking&mode=player&site='.$i.'">'.$i.'</option>';
	}
 ?>
				</select>
			</form>
		</td>
		<td width="50%" align="center">
			<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=player&amp;search=" method="post">
				Nome: <input name="name" type="text" value="<?php echo entparse($name); ?>" size="20" />
				<input type="submit" class="button" value="Ok" />
			</form>
		</td>
	</tr>
</table>