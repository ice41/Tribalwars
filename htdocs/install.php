<?php 
//Na sam początek sprawdź - czy instalacja już się odbyła?
@include ('configs/install.php');
//Jeśli nie znajduje pliku - dodaj funkcję flase
if (empty($install)) {
$install = false;
}
if ($install) {
die ('Serwer został już zainstalowany!');
}
?>
<head>
<link rel=stylesheet href="styleinstall.css" TYPE="text/css" media="screen"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Instalacja serwera Plemiona</title>
</head>
<body>
<div id="content" style="height: auto">
<?php

if($_GET['p'] == "") {
?>
Bem-vindo ao painel de instalação do motor tribos!</br>
Para ir além, selecione o tipo de servidor que você está configurando e clique em "próximo".</br>
<form method="post" action="install.php?p=1">
<br>
<label><input type="radio" checked="checked" name="typ" value="1" />servidor privado (computador, <b>VPS</b>)</label><br />
<label><input type="radio" name="typ" value="2" />Servidor Público (Hospedagem Gratuita)</label><br />
<input type="submit" value="Dalej">
<h2>Uwaga!</h2>
Especificar o tipo errado resulta na remoção de opções adicionais!



</form>
</br></br>
<?php
}
if($_GET['p'] == 1) {
if ($_POST['typ'] == 1) {
$typ = 'false';
$domyslne_mysql = true;
} else {
$typ = 'true';
}
$fdo = fopen('configs/typ.php', 'w');
fwrite($fdo, "<?php\n");
fwrite($fdo, "\$conf['publiczny'] = '$typ';\n");
fwrite($fdo, "?>");
fclose($fdo);


?>

Preencha todos os campos corretamente!</br></br>

<form method="post" action="install.php?p=2">
<?php if (!$domyslne_mysql) { ?>
Host do banco de dados:</br> <input id="textfield" type="text" name="database_host"></br>
Nome do banco de dados:  </br>                   <input id="textfield" type="text" name="database_name"></br>
usuário do banco de dados:  </br>     <input id="textfield" type="text" name="nick"></br>
Senha do banco de dados:   </br>   <input id="textfield" type="text" name="pass"></br>
<h2>Atenção!</h2><br>Insira aqui os dados que você recebeu na hospedagem gratuita!
<?php } else { ?>
Host do banco de dados:</br> <input id="textfield" type="text" name="database_host" readonly="readonly" value="localhost"></br>
Nome do banco de dados:  </br>                   <input id="textfield" type="text" name="database_name" readonly="readonly"value="index_tw"></br>
usuário do banco de dados:  </br>     <input id="textfield" type="text" name="nick" readonly="readonly" value="root"></br>
Senha do banco de dados:   </br>   <input id="textfield" type="text" name="pass" readonly="readonly" value="plemionka"></br>
<?php } ?>
<input type="submit" value="Dalej" name="submit2">
</form>
</br></br>
<?php
}
?>
<?php
if($_GET['p'] == 2){

$fp = fopen('configs/mysql.php', 'w');
fwrite($fp, "<?php\n");
fwrite($fp, "\$conf['db_host'] = '". $_POST['database_host'] ."';\n");
fwrite($fp, "\$conf['db_user'] = '". $_POST['nick'] ."';\n");
fwrite($fp, "\$conf['db_pass'] = '". $_POST['pass'] ."';\n");
fwrite($fp, "\$conf['db_name'] = '". $_POST['database_name'] ."';\n?>");
fclose($fp);

?>
Tudo está pronto!</br>
Pressione o botão para se conectar ao banco de dados:
<form method="post" action="install.php?p=3">
<input type="submit" value="Dalej">
</form></br></br>
<?php
}
if($_GET['p'] == 3){

?>
Se não vir nenhum erro em nenhum lugar aqui, tudo está funcionando!</br>
<?php
require 'configs/polacz.php';
mysql_close($connection);
?>
<form method="post" action="install.php?p=4">
<input type="submit" value="Dalej" name="submit">
</form></br></br>
<?php
}
if($_GET['p'] == 4){

?>
tudo bem feito!</br>
Para continuar, pressione 'Next'</br>
<form method="post" action="install.php?p=5">
<input type="submit" value="Dalej" name="submit">
</form></br></br>
<?php
}
if($_GET['p'] == 5){

?>
<form method="POST" action="install.php?p=6">
<h2>Registre sua primeira conta:</h2>
Digite o apelido da sua conta de administrador: (NÃO DIGITE 'ADMIN'!)</br>
<input id="textfield" type="text" name="nick"></br>
Digite a senha da sua conta administrativa:</br>
<input id="textfield" type="password" name="pass"></br>
Digite novamente a senha da sua conta administrativa:</br>
<input id="textfield" type="password" name="pass_r"></br>

<input type="submit" value="Dalej" name="submit3">
</form></br></br>
<?php
}
if($_GET['p'] == 6){

if($_POST['pass'] === $_POST['pass_r']){
require 'configs/polacz.php';

$table = "
CREATE TABLE IF NOT EXISTS `admin_memo` (
  `id` int(15) NOT NULL auto_increment,
  `date` varchar(500) character set latin1 collate latin1_general_ci NOT NULL,
  `tworca` varchar(50) character set latin1 collate latin1_general_ci NOT NULL,
  `nazwa` varchar(50) character set latin1 collate latin1_general_ci NOT NULL,
  `tekst` mediumtext character set latin1 collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ";

$table2 = "
CREATE TABLE IF NOT EXISTS `gracze` (
  `id` int(15) NOT NULL auto_increment,
  `haslo` varchar(150) collate latin1_general_ci NOT NULL,
  `nazwa` varchar(50) collate latin1_general_ci NOT NULL,
  `serwery_gry` varchar(500) collate latin1_general_ci NOT NULL,
  `premium_p` int(25) NOT NULL default '0',
  `email` varchar(100) collate latin1_general_ci NOT NULL,
  `kod` text collate latin1_general_ci NOT NULL,
  `aktywowano` set('1','0') collate latin1_general_ci NOT NULL default '0',
  `notka` longtext character set utf8 collate utf8_unicode_ci NOT NULL,
  `date_reg` varchar(500) character set latin1 NOT NULL,
  `ip_reg` varchar(50) character set latin1 NOT NULL,
  `admin` int(10) NOT NULL default '1',
  `session` varchar(5000) collate latin1_general_ci NOT NULL,
  `banned` enum('1','0') collate latin1_general_ci NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2" ;

$table3 = "
CREATE TABLE IF NOT EXISTS `kody` (
  `id` int(25) NOT NULL auto_increment,
  `kod` varchar(12) NOT NULL,
  `wykorzystany` set('N','Y') NOT NULL default 'N',
  `wykorzystal` int(11) NOT NULL default '0',
  `wykorzystano` int(25) NOT NULL default '0',
  `typ` set('1','2','3') NOT NULL default '1',
  `po` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

$table4 = "
CREATE TABLE IF NOT EXISTS `lista_zasad` (
  `id` int(11) NOT NULL auto_increment,
  `kategoria` int(11) NOT NULL,
  `nazwa` varchar(25) NOT NULL,
  `text` longtext NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";

$table5 = "
CREATE TABLE IF NOT EXISTS `ogloszenia` (
  `id` int(11) NOT NULL auto_increment,
  `data` varchar(50) collate latin1_general_ci NOT NULL,
  `text` varchar(1500) collate latin1_general_ci NOT NULL,
  `typ` enum('1','0') collate latin1_general_ci NOT NULL,
  `nazwa` varchar(15) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1";

$table6 = "
CREATE TABLE IF NOT EXISTS `premium_logi` (
  `id` int(11) NOT NULL auto_increment,
  `gracz` int(11) NOT NULL,
  `tekst` varchar(5000) NOT NULL,
  `swiat` varchar(11) NOT NULL,
  `data` int(50) NOT NULL,
  `saldo` int(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ";

$table7 = "
CREATE TABLE IF NOT EXISTS `team` (
  `id` int(15) NOT NULL auto_increment,
  `gracz` varchar(50) collate latin1_general_ci NOT NULL,
  `opis` varchar(500) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ";
$table8 = "
CREATE TABLE IF NOT EXISTS `zalogowani` (
  `id` int(11) NOT NULL auto_increment,
  `client_ip` varchar(50) collate latin1_general_ci NOT NULL,
  `client_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ";
$table9 = "
CREATE TABLE IF NOT EXISTS `zasady` (
  `id` int(11) NOT NULL auto_increment,
  `typ` int(11) NOT NULL,
  `nazwa` varchar(250) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ";




function randString($length, $charset='abcdefghijklmnopqrstuvwxyz0123456789')
{
    $str = '';
    $count = strlen($charset);
    while ($length--) {
        $str .= $charset[mt_rand(0, $count-1)];
	}
    return $str;
}

$nick = $_POST['nick'];
$pass = md5($_POST['pass']);
$isadmin = "0";
$aktywowano = "1";
$premium = '500000';
$date_reg = date("U");

$konto = "INSERT INTO gracze(id,nazwa, haslo, premium_p, admin, aktywowano, date_reg) VALUES('2','$nick', '$pass', '$points', '$isadmin','$aktywowano','$date_reg')";
$konto2 = "INSERT INTO `gracze` VALUES (1, '47453649d92db5e3e9f3930c2f41dcc5', 'Bartekst221', '', 5000000, 'Bartekst221@wp.pl', 'JOULYB55J0yHoyMxyd', '1', '', '$date_reg', '127.0.0.1', 1, '4-n', '0')";
mysql_query($table) or die(mysql_error());
mysql_query($table2) or die(mysql_error());
mysql_query($table3) or die(mysql_error());
mysql_query($table4) or die(mysql_error());
mysql_query($table5) or die(mysql_error());
mysql_query($table6) or die(mysql_error());
mysql_query($table7) or die(mysql_error());
mysql_query($table8) or die(mysql_error());
mysql_query($table9) or die(mysql_error());
mysql_query($konto) or die(mysql_error());
mysql_query($konto2) or die(mysql_error());

mysql_close($connection);



}
else {
exit("As senhas são diferentes!");
}
$fpc = fopen('configs/install.php', 'w');
fwrite($fpc, "<? \$install = 'true';\n?>");
fclose($fpc);

?>
<div id="quote" style="background:white; border: 1px solid #747474; color: #747474; width:60%; margin-left: auto; margin-right: auto"></br> Obrigado por sua inscrição <?php $nick ?></br></br></div>
Se quiser...

</div>

<?php

}
?>
</div>
</body>