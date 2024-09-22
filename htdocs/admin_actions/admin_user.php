
<?php
if ($conf['admin_key'] == 'actions_massiv_keyaaassd') {
$id = $_GET['graczID'];

$gracz = mysql_query("SELECT * FROM gracze WHERE id = $id");
$gracz = mysql_fetch_array($gracz);

	if ($_GET['akcja'] == 'notka' and isset($_POST)) {
    $notka = $_POST['notka'];
	mysql_query("UPDATE `gracze` SET `notka` = '".$notka."' WHERE `id` = '".$gracz['id']."'");
	}

$tpl->assign('gracz',$gracz);
}
?>


