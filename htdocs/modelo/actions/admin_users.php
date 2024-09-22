<?php
$id = $_GET['id'];

$gracz = mysql_query("SELECT * FROM users WHERE id = $id");
$gracz = mysql_fetch_array($gracz);

	if ($_GET['akcja'] == 'opis' and isset($_POST)) {
    $opis = $_POST['opis'];
	mysql_query("UPDATE `users` SET `personal_text` = '".$opis."' WHERE `id` = '".$gracz['id']."'");
	}
	if ($_GET['akcja'] == 'notka' and isset($_POST)) {
    $n = $_POST['notka'];
	mysql_query("UPDATE `users` SET `memo` = '".$n."' WHERE `id` = '".$gracz['id']."'");
	}
	if ($_GET['akcja'] == 'admin' and isset($_GET)) {
    $a = $_GET['admin'];
	mysql_query("UPDATE `users` SET `admin` = '".$a."' WHERE `id` = '".$gracz['id']."'");
	}	
$tpl->assign('us',$gracz);
?>

