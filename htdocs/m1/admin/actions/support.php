<?php

if ($_GET['screen'] == 'support') {

//ARR//
$query = $db->query("SELECT id,uid,subject,date,username,message,block,new_admin,new FROM support ORDER BY username");
 while($row = $db->fetch($query))
    {
     $support[] = $row;
    }
	$sterse = array();
}
//stergere definitiva//
if ($_GET['do'] == 'delete')
{$id = $_GET['id'];
mysql_query("DELETE FROM support WHERE id = '$id'");
header("Location: index.php?screen=support");
}
//arhiveaza//
if ($_GET['do'] == 'archive')
{$id = $_GET['id'];
mysql_query("UPDATE support SET archive = '1' WHERE id = '$id'");
header("Location: index.php?screen=support");
}

$tpl->assign('support', $support);
?>