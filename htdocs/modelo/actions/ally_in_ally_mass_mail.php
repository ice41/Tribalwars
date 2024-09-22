<?php 



	
$is_send = false;
$subject = "";
$text  = "";


if (isset($_GET['action']) && $_GET['action']=='send') {
 if (empty($_POST['subject'])) {
	$error = "O assunto não pode ficar vazio!";
 }

 if (empty($_POST['text'])) {
	$error = "O texto não pode estar vazio!";
 }

 if (empty($error)) {

$text = $bb_interpreter->compile_bb_code($_POST['text'],$user['id']);

  $result = $db->query("SELECT id,username FROM users WHERE `ally` = '".$user['ally']."'");
  while($row=$db->Fetch($result)) {
   send_mail($user['id'],$user['username'],$row['id'],$row['username'],parse($_POST['subject']),$text,false);
  }
  $is_send = true;
 }


}





$tpl->assign("is_send",$is_send);
 ?>
