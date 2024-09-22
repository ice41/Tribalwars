<?php 
if( !isset($_GET['site']) || ( isset($_GET['site']) && (!is_numeric($_GET['site'])) ) ) {
	$site=1;
}
else
{
    $site=parse($_GET['site']);
}
$events_per_page=10;
$events=$cl_ally->fetch_events($site,$events_per_page,$user['ally']);

$tpl->assign("preview",@$preview);
$tpl->assign("num_pages",$num_pages);
$tpl->assign("events",$events);
$tpl->assign("site",$site);
?>