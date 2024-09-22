<html>
<head><title>Parolã uitatã/ Modificarea parolei</title>
<link rel="stylesheet" type="text/css" href="stamm.css">
<style tpye="text/css">
body{
padding-top:30px;
}
</style>
</head>
<body>

<table class="main" width="800" align="center">
 <tr>
	<td>
	  <h1>Parolã uitatã/ Modificarea parolei</h1><br>
	  Dacã þi-ai uitat parola sau doreºti sã þi-o modifici, scrieþi numele de utilizator ºi adresa de e-mail, pe care le-ai folosit la înscriere. Vei primi un e-mail, cu care îþi poþi alege o nouã parolã.<br><br>
	  <form action="lost_pw.php?action=send" method="Post">
	  Nume de utilizator: &nbsp;&nbsp;&nbsp;<input type="text" name="username"><br>
	  <input type="submit" value="Expediere"><br><br>
	  </form>
	  <?php
	  $send = $_GET["action"];
	  $username = $_POST["username"];
	  if($send == "send")
	  {
	  if($username !== "")
	  {
	  $verbindung = mysql_connect("localhost", "root","");
	  mysql_select_db("lan");

	  $result = mysql_query("SELECT id FROM users WHERE username LIKE '$username'");
	  $menge = mysql_num_rows($result);

	  if($menge !== 0)
	  {
	  $zufall = rand(9999,99999);
	  echo "Noua parola este<br>
	  <br>
	  &nbsp;&nbsp;&nbsp;<b>$zufall</b><br>
	  <br>
	  Parola vo puteti modifica intrand in joc cu parola data de noi si intrati in <b>(Setari->Modificarea parolei)</b><br>
	  <a href=\"index.php\">Zur&uuml;ck</a>";

	  $new_pw = md5($zufall);

	  $sql = "UPDATE users SET password = '$new_pw' WHERE username = '$username'";
	  $update = mysql_query($sql);
	  }
	  else
	  {
	  echo "Du hast einen ung&uuml;ltigen Benutzernamen angegeben.<br><a href=\"lost_pw.php\">Zur&uuml;ck</a>";
	  }
	  }
  	  else
	  {
	  echo "Bitte das Feld <b>\"Username\"</b> ausfüllen<br><a href=\"lost_pw.php\">Zur&uuml;ck</a>";
	  }
	  }
	  ?>
	</td>
 </tr>
</table>

</body>
</html>