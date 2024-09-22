<?php
include('../awards/awards_config.php');
include('../awards/'.$language_file);
$js = '<script type="text/javascript">function check(adresse){ var check = confirm("'.$admin_reset.'");if(check == true){location.href = adresse;}}</script>';
$tpl->assign('javascript', $javascript = $js);
$tpl->assign('headline', $headline = $admin_headline);
$tpl->assign('text', $text = $admin_text);
$tpl->assign('version', $version = $admin_version);
if ($_GET["action"] == 'reset') {
$connect = mysql_connect($mysql_host,$mysql_user,$mysql_pw);
mysql_select_db($mysql_db);
$drop = mysql_query(" DROP TABLE IF EXISTS awards ");
$create = mysql_query(" CREATE TABLE awards (
id INT( 10 ) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
user_id INT( 10 ) NOT NULL ,
last_rep_id INT( 10 ) NOT NULL ,
min_vill INT( 12) NOT NULL,
max_points VARCHAR( 15 ) NOT NULL ,
best_rank INT( 2 ) NOT NULL ,
robber VARCHAR( 22 ) NOT NULL ,
plunderer VARCHAR( 12 ) NOT NULL ,
leader VARCHAR( 12 ) NOT NULL ,
conquest INT( 10 ) NOT NULL ,
jinx INT( 2 ) NOT NULL ,
lucky INT( 2 ) NOT NULL ,
dealer VARCHAR( 12 ) NOT NULL,
krsus INT( 8 ) NOT NULL,
demolisher INT( 10 ) NOT NULL,
scout_hunter INT( 10 ) NOT NULL,
steps VARCHAR( 25 ) NOT NULL,
steps_all INT( 3 ) NOT NULL
) ENGINE = MYISAM ");
if ($drop AND $create) {
$tpl->assign('status', $status = '<br/><center><font color="green">'.$admin_reset_status[0].'</font></center></br>');
}
else {
$tpl->assign('status', $status = '<br/><center><font color="red">'.$admin_reset_status[1].'</font></center></br>');
}
}
?>