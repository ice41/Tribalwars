<?php
$villageid = $_GET['village'];
if($_GET['do'] == "delete")
	{
	 $passwort = md5(mysql_real_escape_string($_POST['passwort']));
	 
	 $ab1 = mysql_query("SELECT * FROM villages WHERE id = '".$_GET['village']."'");
	 $er1 = mysql_fetch_assoc($ab1);
	 
	 $ab2 = mysql_query("SELECT password FROM users WHERE id = '".$er1['userid']."' LIMIT 1");
	 $er2 = mysql_fetch_assoc($ab2);
	 
	 if($passwort == $er2['password'])
		{
		 $ab3 = mysql_query("DELETE FROM users WHERE id = '".$er1['userid']."'");
		 $ab4 = mysql_query("SELECT * FROM villages WHERE userid = '".$er1['userid']."'");
		 
		 while($er4 = mysql_fetch_assoc($ab4))
			{
			mysql_query("UPDATE villages SET userid = '-1' WHERE userid = '".$er1['userid']."'");
			}
		
		$ab5 = mysql_query("DELETE FROM sessions WHERE userid = '".$er1['userid']."'");
		
		if($ab3 && $ab5)
			{
			 $error = "<font color='green'>Contul a fost sters!</font>";
			}
			else
			{
			 $error = "<font color='red'>Gresit!</font>";
			}
		}
		else
		{
		 $error = "<font color='red'>Parola inserata nu este corecta!</font>";
		}
	}
	
$tpl->assign("err", $error);
$tpl->assign("villageid", $villageid);
?>