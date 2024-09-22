<?php
$subject = urlencode($_POST['subject']);
$message = urlencode($_POST['message']);
$from = urlencode($_POST['from']);
$time = time();
$default_from = $config['mass_mail_from'];

if ($_GET['action'] == 'send'){
 if (strlen($_POST[from]) < 4){
$error = "Numele de cine va fi trimis trebuie sa contina cel putin 4 caractere";
}
if (strlen($_POST[subject]) < 4){	
$error = "Subiectul trebuie sa contina minim 4 caractere!"; 
	}
if (strlen($_POST[message]) < 1){ 	
$error = "Continutul mesajului trebuie sa contina minim 1 caractere!"; 	
}

if (!$error){
$select_users = mysql_query("SELECT * FROM users");
while($row = mysql_fetch_array($select_users)){
$id = $row['id'];
$username = $row['username'];
$insert = "INSERT INTO mail (`from_userid`,`from_username`,`to_userid`,`to_username`,`title`,`message`,`time`,`from_read`) VALUES ('-1','".$from."','".$id."','".$username."','".$subject."','".$message."','".$time."','0')";
mysql_query($insert) or die (mysql_error());

$succes = "Mesajul a fost trimis cu succes";
}
mysql_query("UPDATE users SET new_mail = '1'") or die (mysql_error());
}
$tpl->assign('succes', $succes);
$tpl->assign('error', $error);
}
$tpl->assign('from_default', $default_from);
?>
