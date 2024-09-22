<?php

$thread_name = $_POST['thread_name'];
$thread_text = $_POST['thread_text'];
$thread_preview = $_POST['thread_preview'];
$thread_open = $_POST['thread_open'];

if(isset($thread_open)){

	if(strlen(trim($thread_text)) < 4){
		$error = "Textul topicului trebuie sa contina minim 4 caractere";
	}
	
	if(strlen(trim($thread_name)) < 4 OR strlen(trim($thread_name)) > 32){
		$error = "Numele topicului trebuie sa contina 4 si maxim 32 de caractere.";
	}
	
	if(!isset($error)){
		mysql_query("INSERT INTO `forum_thread` (`category_id`,`title`,`message`,`author`,`time`) 
		VALUES ('".$_GET['category']."', '".addslashes(urlencode($thread_name))."','".addslashes(urlencode($thread_text))."','".$user['username']."','".time()."')") or die (mysql_error());
		die(header("Location: forum.php?ally=".$_GET['ally']."&category=".$_GET['category']));
	}
	$tpl->assign("error", $error);
	
}

if(isset($thread_preview)){
	$tpl->assign("thread_text", $thread_text);
	$tpl->assign("thread_name", $thread_name);
	$tpl->assign("thread_preview", $thread_preview);
	
	if(strlen(trim($thread_text)) < 4){
		$error = "Textul topicului trebuie sa contina minim 4 caractere";
	}
	
	$tpl->assign("error", $error);
}
?>