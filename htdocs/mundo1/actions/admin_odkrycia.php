<?php




if (isset($_GET['action']) && $_GET['action']=='dodaj') {
 if (empty($_POST['wioska'])) {
	$error = "Musisz poda� ID wioski!";
 }

 if (empty($error)) {

mysql_query("INSERT INTO odkrycia(wioska,typ) VALUES('$_POST[wioska]','$_POST[typ]')");
header ('location:  game.php?village='.$village['id'].'&screen=admin&mode=odkrycia');
$update = mysql_query("UPDATE villages SET odkrycie +'1' WHERE id = '".$_POST['wioska']."'");
				EXIT;

 }
	
}


	//Pobra� ilo�� wiosek z bazy danych:
$v = mysql_num_rows(mysql_query("select * from villages"));
	            


$text_tut = 'Esta página permite adicionar 1 descoberta ao jogo, é possível escolher uma aldeia ou configurá-la para ser adicionada aleatoriamente. As Descobertas permitem que as tribos vaguem na tabela de classificação, quanto mais Descobertas uma tribo tiver, mais alta ela estará na tabela de classificação.';
$tpl->assign('text_tut',$text_tut);

$tpl->assign('villages',$v);

$tpl->assign("error",$error);

$tpl->assign("text",$text);
?>