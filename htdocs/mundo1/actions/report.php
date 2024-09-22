<?php
// Sicherheits Ausf�hrungscheck:
if ($ACTIONS_MASSIVKEY_HIGHAAASSDD!='sdjahsdkJHSAJDKHALKJHSADJHSADNsjdhaksjdlhJNASDKL') {
	die("Ação - Exec!");
}

if (!isset($_GET['mode']))
	$_GET['mode'] = "all";
		
// Alle Links im Men�
$links = array(
	"Wszystkie Raporty" => "all",
	"Ataki" => "attack",
	"Obrona" => "defense",
	"Pomoc" => "support",
	"Handel" => "trade",
	"inne" => "other"
);

// Welche mods d�rfen aufgerufen werden:
$allow_mods = array("all","attack","defense","support","trade","other");

// Berichte l�schen:
if (isset($_POST['del'])) {
	// HKEY �berpr�fen:
	if ($session['hkey']!=$_GET['h'])
		die("Caminhada inválida!");

	foreach($_POST AS $id=>$value) {
		if (substr($id, 0, 3)=="id_") {
			$id = parse(array_pop(explode("id_", $id)));
			// Schauen, ob Jogador besitzer vom Bericht ist:
			$result = $db->query("SELECT receiver_userid from reports where id='".$id."'");
			$del = $db->Fetch($result);
			if (!$del['receiver_userid']==$user['id']) {
				die("Relatório não pode ser excluído!");
			}
			else
			{
				$db->query("DELETE from reports where id='".$id."'");
			}
			
		}
	}
	HEADER("LOCATION: game.php?village=".$village['id']."&screen=report&mode=".$_GET['mode']."");
}

// Einzelnen Bericht l�schen:
if (isset($_GET['action']) && $_GET['action']=="del_one") {
	// HKEY �berpr�fen:
	if ($session['hkey']!=$_GET['h'])
		die("Ung�ltiger hkey!");
		
	$id = parse($_GET['id']);
	// Schauen, ob Jogador besitzer vom Bericht ist:
	$result = $db->query("SELECT receiver_userid from reports where id='".$id."'");
	$del = $db->Fetch($result);
	if (!$del['receiver_userid']==$user['id']) {
		die("Relatório não pode ser excluído!");
	}
	else
	{
		$db->query("DELETE from reports where id='".$id."'");
	}
	HEADER("LOCATION: game.php?village=".$village['id']."&screen=report&mode=".$_GET['mode']);
}

if (!isset($_GET['view'])) {
	// Wenn new_report auf 1 ist, dann auf 0 setzen:
	if($user['new_report']) {
		$db->query("UPDATE users SET new_report='0' where id='".$user['id']."'");
	}

	// Berichte vorbeiteiten...
	if( !isset($_GET['site']) || ( isset($_GET['site']) && (!is_numeric($_GET['site'])) ) ) {
		$site=1;
	}
	else
	{
	    $site=parse($_GET['site']);
	}
	$reports_per_page=$user['reports_per_page'];
	
	$num_rows=$db->numRows($db->query("SELECT id FROM reports where receiver_userid='".$user['id']."'"));
	$num_pages=(($num_rows%$reports_per_page)==0) ? $num_rows/$reports_per_page : ceil($num_rows/$reports_per_page);
	$start=($site-1)*$reports_per_page;
	
	// Berichte SQL ausf�hren und dann alle berichte in ein Array
	$reports = array();
	if ($_GET['mode']!="all") {
		$sql_add = " AND in_group='".parse($_GET['mode'])."' ";
	}
	else
	{
		$sql_add = "";
	}
	$result = $db->query("SELECT title,title_image,time,id,is_new,hives FROM reports WHERE receiver_userid='".$user['id']."' $sql_add order by id desc Limit $start,$reports_per_page");
	while($row=$db->Fetch($result)) {
$ex = explode(";", $row['hives']);
$report_ress['wood'] = $ex['0'];
$report_ress['stone'] = $ex['1'];
$report_ress['iron'] = $ex['2'];
$report_ress_all = $report_ress['wood'] + $report_ress['stone'] + $report_ress['iron'];
if ($report_ress_all >= 1) {
		$reports[$row['id']]['surowce'] = true;
}	
        $reports[$row['id']]['img'] = $row['title_image'];
		$reports[$row['id']]['id'] = $row['id'];
		$reports[$row['id']]['time'] = $row['time'];
		$reports[$row['id']]['is_new'] = $row['is_new'];
		$reports[$row['id']]['title'] = (!empty($row['title_image']))?"<img src=\"".$row['title_image']."\"> ".entparse($row['title']):entparse($row['title']);
		$reports[$row['id']]['date'] = date("j.n.Y H:i:s", $row['time']);
	}

	$tpl->assign("reports", $reports);
	$tpl->assign("num_pages", $num_pages);
	$tpl->assign("site", $site);
	$tpl->assign('do', 'overview');
}
else
{

	// Bericht auslesen
	$result = $db->query("SELECT from_username,ally,allyname,id,title,title_image,time,type,a_units,b_units,c_units,d_units,e_units,agreement,hives,ram,catapult,message,to_user,from_user,to_village,from_village,is_new,wins,receiver_userid,luck,moral,see_def_units from reports where id='".parse($_GET['view'])."'");
	$report = $db->Fetch($result);
	$report['title'] = (!empty($report['title_image']))?"<img src=\"".$report['title_image']."\"> ".entparse($report['title']):entparse($report['title']);
	$report['date'] = date("j.n.Y H:i:s", @$report['time']);

	// Schauen, ob Bericht User geh�rt:
	if ($user['id']!=@$report['receiver_userid']) {
		die("Fehler!");
	}
	
	// Wenn Bericht noch nicht als gelesen markiert wurde, dann jetzt tuhen:
	if ($report['is_new']=="1") {
		$db->query("UPDATE reports SET is_new='0' where id='".parse($_GET['view'])."'");
	}
	// AKTIONSDATEI des Berichtstypes laden
	 include("report_view_".$report['type'].".php");
	// Ausgew�hlten Bericht auslesen:
	$tpl->assign('do', 'view');
	$tpl->assign('report', $report);
}
$tpl->assign("allow_mods", $allow_mods);
$tpl->assign("mode", $_GET['mode']);
$tpl->assign("links", $links);
?>