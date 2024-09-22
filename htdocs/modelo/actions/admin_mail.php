<?php
$do = array(
	'Do wszystkich' => 'all',
	'Do 1 gracza' => '1',
	);
$do = $_GET['do'];
if ($do == 'all') {
$is_send = false;
$subject = "";
$text  = "";

if (isset($_GET['action']) && $_GET['action']=='send') {
 if (empty($_POST['subject'])) {
	$error = "O assunto não pode estar vazio!";
 }

 if (empty($_POST['text'])) {
	$error = "O texto não pode estar vazio!";
 }

 if (empty($error)) {
  $text = $_POST['text'];//$bb_interpreter->compile_bb_code($_POST['text'],$user['id']);
  $result = $db->query("SELECT id,username from users");
  while($row=$db->Fetch($result)) {

   send_mail(-1,$config['mail']['nadawca'],$row['id'],$row['username'],parse($_POST['subject']),$text,false);
  }

  
  $is_send = true;
 }

 $subject = $_POST['subject'];
 $text = $_POST['text'];
}

} elseif($do == '1') {
if (empty($_GET['us'])) {
$wybierz = true;
	if ($_GET['akcja'] == 'znajdz' and isset($_POST)) {
    $id1 = sql("SELECT * FROM `users` WHERE `username` = '".$_POST['id']."'","assoc");
    if (empty($_POST['id'])) {
    $error = 'Deve inserir o apelido do jogador!';
	} elseif ($id1 == 0) {
	$error = 'O usuário não existe!';
	} else {
header('LOCATION: game.php?village='.$village['id'].'&screen=admin&mode=mail&do=1&us='.$id1['id'].'');
    }
}

} elseif (isset($_GET['us'])) {
$wybierz = false;
$is_send = false;
$subject = "";
$text  = "";

$us = $_GET['us'];
if (isset($_GET['action']) && $_GET['action']=='send') {
 if (empty($_POST['subject'])) {
	$error = "O assunto não pode ficar vazio!";
 }

 if (empty($_POST['text'])) {
	$error = "O texto não pode estar vazio!";
 }
 

 if (empty($error)) {



 $text = $bb_interpreter->compile_bb_code($_POST['text'],$user['id']); 
  $result = $db->query("SELECT id,username from users WHERE `id` = '".$us."'");
  while($row=$db->Fetch($result)) {
   send_mail(-1,$config['mail']['nadawca'],$row['id'],$row['username'],parse($_POST['subject']),$text,false);
  }
  
  $is_send = true;
 }

 $subject = $_POST['subject'];
 $text = $_POST['text'];
}
}
}

//Pobra� ilo�� graczy z bazy danych:
$players = mysql_num_rows(mysql_query("select * from users"));

$text_tut = 'Esta página permite que envie mensagens para todos os jogadores, bem como para 1 jogador neste mundo. Há um total de jogadores neste servidor <b>'.$players.'</b>.';
$tpl->assign('text_tut',$text_tut);
$tpl->assign("sm",$do);
$tpl->assign("is_send",$is_send);
$tpl->assign("error",$error);
$tpl->assign("subject",$subject);
$tpl->assign("text",$text);
$tpl->assign("w",$wybierz);
$tpl->assign("us",$_GET['us']);
?>