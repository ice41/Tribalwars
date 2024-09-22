<?php

if($_GET['action'] == "add_bonus")
	{
	 $anzahl = intval(mysql_real_escape_string($_POST['anzahl']));
	 $bonus = $_POST['bonus'];
	 
	 if($anzahl <= 1000 && $anzahl > 1)
		{
		for($i = 1; $i <= $anzahl; $i++)
			{
			$q1 = create_village(-1, "Sat bonus! :)", "random");
			}
		$all = mysql_query("SELECT * FROM villages");
		$all_e = mysql_num_rows($all);
		
		$lim1 = $all_e - $anzahl;
		
		$qu1 = mysql_query("SELECT * FROM villages ORDER BY id LIMIT $lim1, $all_e");
		
		while($er1 = mysql_fetch_assoc($qu1))
			{
			 if($bonus == 0)
				{
				 $rand = rand(0, 6);
				$u1 = mysql_query("UPDATE villages SET bonus = '".$rand."' WHERE id = '".$er1['id']."'");
				$u2 = mysql_query("UPDATE villages SET name = 'Sat bonus! :)' WHERE id = '".$er1['id']."'");
				}
				else
				{
				 $u1 = mysql_query("UPDATE villages SET bonus = '".$bonus."' WHERE id = '".$er1['id']."'");
				 $u2 = mysql_query("UPDATE villages SET name = 'Sat bonus! :)' WHERE id = '".$er1['id']."'");
				}
			}
		 if($u1 && $u2)
			{
			 $error = "<td colspan='3'><font color='green'><b>Satele bonus au fost adaugate cu succes</b></font></td>";
			}
		}
		else
		{
		 $error = "<td colspan='3'><font color='red'><b>Puteti introduce maxim 1000 de sate si minim 1 sat!</b></font></td>";
		}
	}
	$sate1 = mysql_num_rows(mysql_query("SELECT * FROM villages WHERE bonus = '1'"));
$sate2 = mysql_num_rows(mysql_query("SELECT * FROM villages WHERE bonus = '2'"));
$sate3 = mysql_num_rows(mysql_query("SELECT * FROM villages WHERE bonus = '3'"));
$sate4 = mysql_num_rows(mysql_query("SELECT * FROM villages WHERE bonus = '4'"));
$sate5 = mysql_num_rows(mysql_query("SELECT * FROM villages WHERE bonus = '5'"));
$sate6 = mysql_num_rows(mysql_query("SELECT * FROM villages WHERE bonus = '6'"));
$total = $sate1+$sate2+$sate3+$sate4+$sate5+$sate6;

$tpl->assign("villages", $villages);
$tpl->assign("error", $error);
$tpl->assign("sate1", $sate1);
$tpl->assign("sate2", $sate2);
$tpl->assign("sate3", $sate3);
$tpl->assign("sate4", $sate4);
$tpl->assign("sate5", $sate5);
$tpl->assign("sate6", $sate6);
$tpl->assign("total", $total);
?>
<?php

if($_GET['action'] == "add_villages")
	{
	 $numar = intval(mysql_real_escape_string($_POST['numar']));
	 $buton = $_POST['buton'];
	 if($buton){
	 if($numar <= 1000 && $numar > 1)
		{
		for($i = 1; $i <= $numar; $i++)
			{
			$q1 = create_village(-1, "Sat parasit!", "0");
			}
			 $err = "<td colspan='3'><font color='green'><b>Satele bonus au fost adaugate cu succes</b></font></td>";
			
		}
		else
		{
		 $err = "<td colspan='3'><font color='red'><b>Puteti introduce maxim 1000 de sate si minim 1 sat!</b></font></td>";
		}
	}
	}
	$sate = mysql_num_rows(mysql_query("SELECT * FROM villages WHERE userid = '-1'"));
$tpl->assign("err", $err);
$tpl->assign("sate", $sate);
?>
