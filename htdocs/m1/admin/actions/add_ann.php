<?php
if ($_GET['screen'] == 'add_ann') {
$ann = array();
//SELECTARE//
$query = $db->query("SELECT id,announcement`,poza,display FROM game_announcement");
 while($row = $db->fetch($query))
    {
     $ann[] = $row;
    }
}
//activare//
if ($_GET['screen'] == 'add_ann' AND $_GET['do'] == 'activate')
{
$activate = $_GET['id'];
$sql1 = mysql_query("UPDATE anunturi SET display = '1' WHERE id = '$activate'");
$sql2 = mysql_query("UPDATE anunturi SET display = '0' WHERE id != '$activate'");
$sql3 = mysql_query("UPDATE users SET next_ann = '1'");
header("Location: index.php?screen=add_ann");
}

//dezactivare//
if ($_GET['screen'] == 'add_ann' AND $_GET['do'] == 'dezactivate')
{
$dezactivate = $_GET['id'];
$sql01 = mysql_query("UPDATE anunturi SET display = '0' WHERE id = '$dezactivate'");
$sql02 = mysql_query("UPDATE users SET next_ann = '0'");
header("Location: index.php?screen=add_ann");
}
//sterge anunt//
if ($_GET['screen'] == 'add_ann' AND $_GET['do'] == 'delete')
{
$delete = $_GET['id'];
$sql001 = mysql_query("DELETE FROM anunturi WHERE id = '$delete'");
header("Location: index.php?screen=add_ann");
}



$tpl->assign('annInfo', $ann);


?>
