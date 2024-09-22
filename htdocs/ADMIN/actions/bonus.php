<?php
/**
 * @author Milos Stanojvic
 * @copyright Milos Stanojevic
 */
 
function get_playername($id)
{
  $sql = mysql_query("SELECT * FROM users WHERE id = '$id'");
  $user = mysql_fetch_assoc($sql);
  return $user["username"];
}

if ($_GET["add"])
{
  $id = $_GET["add"];
  $rand = rand(1, 6);
  mysql_query("UPDATE villages SET bonus = '".$rand."'  WHERE id = '$id'");
  $status = "<b>ID #$id</b> ist jetzt ein Bonusdorf.";
}

if ($_GET["delete"])
{
  $id = $_GET["delete"];
  mysql_query("UPDATE villages SET bonus = 0 WHERE id = '$id'");
  $status = "<b>ID #$id</b> ist kein Bonusdorf mehr.";
}
$tpl->assign("status", $status);

$sql_vills = mysql_query("SELECT * FROM villages");
$villages = array();
while ($vills = mysql_fetch_assoc($sql_vills))
{
  $villages[] = $vills;
}

if($_GET['action'] == "newvillages")
	{
	 $anzahl = intval(mysql_real_escape_string($_POST['anzahl']));
	 $bonus = $_POST['bonus'];
	 
	 if($anzahl <= 250)
		{
		for($i = 1; $i <= $anzahl; $i++)
			{
			$q1 = create_village(-1, "Bonusdorf", "random");
			}
		$all = mysql_query("SELECT * FROM villages");
		$all_e = mysql_num_rows($all);
		
		$lim1 = $all_e - $anzahl;
		
		$qu1 = mysql_query("SELECT * FROM villages ORDER BY id LIMIT $lim1, $all_e");
		
		while($er1 = mysql_fetch_assoc($qu1))
			{
			 if($bonus == 0)
				{
				 $rand = rand(1, 6);
				$u1 = mysql_query("UPDATE villages SET bonus = '".$rand."' WHERE id = '".$er1['id']."'");
				$u2 = mysql_query("UPDATE villages SET name = 'Bonusdorf' WHERE id = '".$er1['id']."'");
				}
				else
				{
				 $u1 = mysql_query("UPDATE villages SET bonus = '".$bonus."' WHERE id = '".$er1['id']."'");
				 $u2 = mysql_query("UPDATE villages SET name = 'Bonusdorf' WHERE id = '".$er1['id']."'");
				}
			}
		 if($u1 && $u2)
			{
			 $error = "<font color='green'>Erfolgreich erstellt!</font>";
			}
		}
		else
		{
		 $error = "<font color='red'>Maximal 250 Bonusdörfer möglich!</font>";
		}
	}
	
$tpl->assign("villages", $villages);
$tpl->assign("error", $error);
?>
