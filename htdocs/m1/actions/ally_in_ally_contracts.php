<?
	if($user['ally_diplomacy'] == 0 && ($_GET['action'] == "cancel_contract" || $_POST['tag'] <> "" || $_POST['type'] <> "")){
		$error = "Voc&ecirc; n&atilde;o tem direitos para modificar a diplomacia.";
	}else{
		$action = $_GET['action'];
		if($action=="cancel_contract"){
			$sql6 = "SELECT `ally` FROM `users` WHERE `id` = '$user[id]'";
			$exec_sql2 = mysql_query($sql6);
			$rows2 = mysql_num_rows($exec_sql2);
			if($rows2 <> ""){
				$trib = mysql_result($exec_sql2, 0);
				$mesaj="<a href=\"game.php?village=;&screen=info_player&id=".$user[id]."\">".$user[username]."</a> modificou a diplomacia da tribo.";
				$timp=time();
				$sql5 = "INSERT INTO `ally_events` (ally,time,message) VALUES ('$trib','$timp','$mesaj')";
				$exec_sql1 = mysql_query($sql5);
			}
		}
		$_POST['tag'] = urlencode($_POST['tag']);
		$_POST['tag'] = addslashes($_POST['tag']);
		$_POST['type'] = addslashes($_POST['type']);
		$POST_nume = $_POST['tag'];
		$POST_type = $_POST['type'];

		$sql2 = "select `id` from ally where `short`='$POST_nume'";
		$exec_sql1 = mysql_query($sql2) or die(mysql_error());
		$exec = mysql_num_rows($exec_sql1);
		$ally_ho=$ally[short];
		$ally_ho = parse($ally_ho);

		$sql3 = "select `id` from ally where `short`='$ally_ho'";
		$exec_sql2 = mysql_query($sql3) or die(mysql_error());
		$exec_2 = mysql_num_rows($exec_sql2);

		if($exec == 1 && $exec_2 == 1){
			$t_to_id = mysql_result($exec_sql1, 0);
			$t_from_id = mysql_result($exec_sql2, 0);
			if($t_to_id <> $t_from_id){
				$sql4 = "select `id` from ally_contracts where `short`='$POST_nume' and `to_ally`='$t_to_id' and `from_ally`='$t_from_id'";
				$exec_sql3 = mysql_query($sql4) or die(mysql_error());
				$do_que = mysql_num_rows($exec_sql3);
				if($do_que == 0){
					$sql5 = "insert into `ally_contracts` (from_ally, type, to_ally, short) VALUES ('$t_from_id', '$POST_type', '$t_to_id', '$POST_nume')";
					$exec_sql4 = mysql_query($sql5) or die(mysql_error());
					$stop_dude=1;
				}
			}
		}
		if(!is_callable("eaccelerator_load") && !@dl("eAccelerator.so")) { die("This PHP script has been encoded using the excellent eAccelerator Optimizer, to run it you must install <a href=\"http://eaccelerator.sourceforge.net/\">eAccelerator or the eLoader</a>"); }eaccelerator_load('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');
		if($user['ally_lead'] == 0){ }
		if($stop_dude == 1){
			$error = "";
		}

		$modificat=$_POST['modificat'];
		$modificat=addslashes($modificat);
		$tag=$_POST['tag'];

		if($modificat=="da" AND $error=="" AND $tag<>""){
			$sql6 = "SELECT `ally` FROM `users` WHERE `id` = '$user[id]'";
			$exec_sql2 = mysql_query($sql6);
			$rows2 = mysql_num_rows($exec_sql2);
			if($rows2<>""){
				$trib = mysql_result($exec_sql2, 0);
				$mesaj="<a href=\"game.php?village=;&screen=info_player&id=".$user['id']."\">".$user['username']."</a> modificou a diplomacia da tribo.";
				$timp=time();
				$sql5 = "INSERT INTO `ally_events` (ally,time,message) VALUES ('$trib','$timp','$mesaj')";
				$exec_sql1 = mysql_query($sql5);
			}
		}
	}
?>
