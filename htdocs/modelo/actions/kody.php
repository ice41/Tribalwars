<?php 
if ($user['admin'] == 0) {
$modes = array(
	'Wykup' => 'kody',
	'Prze�lij' => 'przeslij',
    'Dodaj Punkty Premium' => 'dodaj',	
	
	);
	} else {
$modes = array(
	'Wykup' => 'kody',
	'Prze�lij' => 'przeslij',

	
	);	
	}
if (!in_array($_GET['mode'],$modes)) {
	$_GET['mode'] = 'kody';
	}	

	//Po��cz z baz� serwera g��wnego
cdb_central();
if ($_GET['mode'] == 'kody') {
	if ($_GET['akcja'] == 'kod' and isset($_POST)) {

				if (empty($error)) {
					$kod = parse($kod);
	
					$kod = sql("SELECT * FROM `kody` WHERE `kod` = '".$kod."'","assoc");
					if ($kod == 0) {
						$error = '<b><font color="red">O código fornecido não existe!</font></b>';
                        $ilosc = $_COOKIE['proby_kodow'] + 1;
						setcookie('proby_kodow',$ilosc);
            
                    } elseif($kod['wykorzystany'] == 'Y') {   
						$error = '<b><font color="red">O código que já foi usado!</font></b>';
						if ($kod['wykorzystal'] != $user['id']) {
						$error = '<b><font color="red">O código que colocou já foi usado!A administração será informada sobre o seu padre "adivinhação" do código!</font></b>';
						}
                    } else { 					
						$error = '<b><font color="green">Código correto ! A moedas foram adicionadas - agora escolha a aldeia e active o que pretende!</font></b>';
                        
                        if ($event_p) {
						$m = 2;
						} else {
						$m = 1;
						}
						
                        $typ = $kod['typ'];
						if ($typ == 1) {
						$new_premium = 50 * $m + $user['premium_p'];
						$wykupiono = 50 * $m;
						}elseif ($typ == 2) {
						$new_premium = 150 * $m + $user['premium_p'];
						$wykupiono = 150 * $m;
						}elseif ($typ == 3) {
						$new_premium = 300 * $m + $user['premium_p'];
						$wykupiono = 300 * $m;
						}
						mysql_query("UPDATE gracze SET premium_p = '".$new_premium."' WHERE id = '".$user['tw_id']."'");
                        mysql_query("UPDATE kody SET wykorzystany = 'Y' WHERE id = '".$kod['id']."'");
                        mysql_query("UPDATE kody SET wykorzystal = '".$user['id']."' WHERE id = '".$kod['id']."'");
                        mysql_query("UPDATE kody SET wykorzystano = '".date("U")."' WHERE id = '".$kod['id']."'");
                        mysql_query("UPDATE kody SET po = '".$_COOKIE['proby_kodow']."' WHERE id = '".$kod['id']."'");
						setcookie('proby_kodow','');
						$user['premium_p'] = $new_premium;
						$text = "Foi comprado '$wykupiono' Pontos premium!";
                        add_pe($user['tw_id'],$text,$config['__SERVER__ID'],$new_premium);	                       

						}
    }
}
} elseif ($_GET['mode'] == 'przeslij') {

	if ($_GET['akcja'] == 'przeslij' and isset($_POST)) {
	$pp = floor((int)$_POST['points']);
	$do = $_POST['name'];
    $sql = mysql_query("SELECT * FROM gracze WHERE nazwa = '$do'");
    $ilosc = mysql_num_rows($sql);
	$przeslane = sql("SELECT * FROM gracze WHERE nazwa = '$do'","assoc");
	$przeslane_us = $przeslane['nazwa'];
			if ($pp < 1) {
				$error = "Você deve enviar 1 a 5.000 Pontos Premium! [Passe ".$pp."]";
				} elseif ($pp > 5000) {
				$error = "Você deve enviar 1 a 5.000 Pontos Premium! [Passe ".$pp."]";
                } elseif ($ilosc != 1) {
                $error = "O usuário de quem é dado não existe!";
                } elseif ($przeslane['is'] == $user['tw_id']) {
				$error = "Você não pode se inserir!";
				} elseif ($pp <= 5000 && $pp >= 1 && $ilosc = 1 && $przeslane['id'] != $user['tw_id']) {
				$new_premium = $user['premium_p'] - $pp;
				$new_premium_2 = $przeslane['premium_p'] + $pp;
				mysql_query("UPDATE gracze SET premium_p = '".$new_premium."' WHERE id = '".$user['tw_id']."'");
				mysql_query("UPDATE gracze SET premium_p = '".$new_premium_2."' WHERE id = '".$przeslane['id']."'");
//Po��cz z baz� serwera g��wnego
cdb_central();	
                $text = "enviado '$pp' Pontos Premium Player '$przeslane_us'.";
                add_pe($user['tw_id'],$text,$config['__SERVER__ID'],$new_premium);
                $text2 = "Recebido '$pp' Pontos Premium do jogador ".$user['username']."!";
				$swiat = '--';
//Po��cz z baz� serwera g��wnego
cdb_central();					
                add_pe($przeslane['id'],$text2,$swiat,$new_premium_2);				
	}
}	
} elseif ($_GET['mode'] == 'dodaj' && $user['admin'] == 0) {

}

		//Wr�� do bazy �wiata
cdb_server();
	$tpl->assign('error',$error);	
    $tpl->assign('modes',$modes);
	
?>
 