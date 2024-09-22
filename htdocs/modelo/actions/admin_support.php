<?php



//ARR//
$query = $db->query("SELECT * FROM support ORDER BY username");
 while($row = $db->fetch($query))
    {
     $support[] = $row;
    }
	$sterse = array();

//stergere definitiva//
if ($_GET['do'] == 'delete')
{$id = $_GET['id'];
mysql_query("DELETE FROM support WHERE id = '$id'");
header("Location: game.php?village=".$village['id']."&screen=admin&mode=support");
}
//arhiveaza//
if ($_GET['do'] == 'archive')
{$id = $_GET['id'];
mysql_query("UPDATE support SET archive = '1' WHERE id = '$id'");
header("Location: game.php?village=".$village['id']."&screen=admin&mode=support");
}

$tpl->assign('support', $support);
?>