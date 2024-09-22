<?php

// id-ul post pe care userul il vizualizeaza
$thread_id = (int) $_GET['id'];
$categorie = (int) $_GET['category'];

// selectam informatii despre thread
$info_thread = mysql_query("SELECT * FROM `forum_thread` WHERE `id` = '$thread_id' AND `category_id` = '$categorie'");

// verificam daca exista acest thread
if(mysql_num_rows($info_thread) > 0){
	
	$readed = mysql_num_rows(mysql_query("SELECT * FROM `forum_read` WHERE `thread_id` = '".$_GET['id']."' AND `user_id` = '".$user['id']."'"));
	if($readed == '0'){
		mysql_query("INSERT INTO `forum_read` (`user_id`,`thread_id`) VALUES ('".$user['id']."', '".$_GET['id']."')");
	}
	
	$info_thread_assoc = mysql_fetch_assoc($info_thread);
	
	$tpl->assign("title", $info_thread_assoc['title']);
	$tpl->assign("message", $info_thread_assoc['message']);
	$tpl->assign("author", $info_thread_assoc['author']);
	$tpl->assign("date", date("H:i:s d.m.Y", $info_thread_assoc['time']));
	$tpl->assign("thread_closed", $info_thread_assoc['closed']);
	
	$page = $_GET['page'];
	
	$tpl->assign("page", $page);
	$limit = 20;
	if(isset($page)){
		if($page < 1){
			$page = 1;
		}
		$start = ($page - 1) * $limit;
	} else {
		$start = 0;
	}
	$page = $page * 20;
	
	// selectam posturile din acest thread
	$arr = mysql_query("SELECT * FROM `forum_post` WHERE `thread_id` = '".$thread_id."' ORDER BY `time` ASC LIMIT $start, $limit");
	while($a = mysql_fetch_assoc($arr)){
		$post_id[] = $a['id'];
		$post_thread_id[] = $a['thread_id'];
		$post_message[] = bb_format(nl2br(htmlentities(stripslashes(urldecode($a['message'])), ENT_QUOTES, "UTF-8")));
		$post_by[] = $a['posted_by'];
		$post_by_id_ = mysql_fetch_assoc(mysql_query("SELECT `id` FROM `users` WHERE `username` = '".$a['posted_by']."'"));
		$post_by_id[] = $post_by_id_['id'];
		$post_time[] = date("H:i:s d.m.Y", $a['time']);
	}
	
	$query = mysql_query("SELECT * FROM `forum_post` WHERE `thread_id` = '".$thread_id."'");
	$numar_pagini = mysql_num_rows($query);
	$numar_pagini = ceil($numar_pagini / 20);
	
	$tpl->assign("numar_pagini", $numar_pagini);
	$tpl->assign("post_by_id", $post_by_id);
	$tpl->assign("post_id", $post_id);
	$tpl->assign("post_thread_id", $post_thread_id);
	$tpl->assign("post_message", $post_message);
	$tpl->assign("post_by", $post_by);
	$tpl->assign("post_date", $post_time);
	
if($info_thread_assoc['closed'] == '0' OR $info_thread_assoc['closed'] == '1' AND $user['ally_titel'] == '1' OR $user['ally_lead'] == '1'){
	if(isset($_GET['delete_post'])){
		$delete_post_id = (int) $_GET['delete_post'];
		$thread_id = (int) $_GET['id'];
		if($user['ally_titel'] == '1' OR $user['ally_lead'] == '1'){
		mysql_query("DELETE FROM `forum_post` WHERE `id` = '".$delete_post_id."' AND `thread_id` = '".$thread_id."'");
		} else {
		mysql_query("DELETE FROM `forum_post` WHERE `id` = '".$delete_post_id."' AND `thread_id` = '".$thread_id."' AND `posted_by` = '".$user['username']."'");
		}
		die(header("Location: forum.php?ally=".$_GET['ally']."&category=".$_GET['category']."&do=view_thread&id=".$_GET['id']."&page=$numar_pagini"));
	}
	
	if(isset($_GET['quote'])){
	
		if($_GET['quote'] == 'first'){
			$quote_post_by = $info_thread_assoc['author'];
			$quote_message = $info_thread_assoc['message'];
		} else {
			$quote = mysql_fetch_assoc(mysql_query("SELECT `posted_by`,`message` FROM `forum_post` WHERE `thread_id` = '".$_GET['id']."' AND `id` = '".$_GET['quote']."'"));
			$quote_post_by = $quote['posted_by'];
			$quote_message = $quote['message'];
		}
		$tpl->assign("quote_post_by", $quote_post_by);
		$tpl->assign("quote_message", $quote_message);
	}
	$tpl->assign("quote_yes", $_GET['quote']);
	
	if(isset($_POST['reply'])){
		if(trim(strlen($_POST['reply_message'])) >= 4){
			mysql_query("INSERT INTO `forum_post` (`thread_id`,`message`,`posted_by`,`time`) VALUES ('".$thread_id."','".urlencode($_POST['reply_message'])."','".$user['username']."','".time()."')");
			mysql_query("DELETE FROM `forum_read` WHERE `thread_id` = '".$thread_id."'") or die (mysql_error());
			mysql_query("INSERT INTO `forum_read` (`user_id`,`thread_id`) VALUES ('".$user['id']."', '".$thread_id."')");
			die(header("Location: forum.php?ally=".$_GET['ally']."&category=".$_GET['category']."&do=view_thread&id=".$_GET['id']."&page=$numar_pagini"));
		} else {
			$tpl->assign("error", "Mesajul trebuie sa contina minim 4 caractere");
		}
	}
}
} else {
	$tpl->assign("no_thread", "S-a produs o eroare, va rugam sa contactati administratorul sitului.");
}

?>