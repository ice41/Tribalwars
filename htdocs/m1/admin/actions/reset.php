<?php
if ($_GET['restart'] == 'total_server'){
 if ($_POST['password'] == $config['restart_total_server_pass']){
  mysql_query("TRUNCATE ally") or die (mysql_error());
  mysql_query("TRUNCATE ally_contracts") or die (mysql_error());
  mysql_query("TRUNCATE ally_events") or die (mysql_error());
  mysql_query("TRUNCATE ally_invites") or die (mysql_error());
  mysql_query("TRUNCATE announcement") or die (mysql_error());
  mysql_query("TRUNCATE build") or die (mysql_error());
  mysql_query("UPDATE create_village SET nw_c = '1'") or die (mysql_error());
  mysql_query("UPDATE create_village SET no_c = '1'") or die (mysql_error());
  mysql_query("UPDATE create_village SET so_c = '1'") or die (mysql_error());
  mysql_query("UPDATE create_village SET sw_c = '1'") or die (mysql_error());
  mysql_query("UPDATE create_village SET nw = '0'") or die (mysql_error());
  mysql_query("UPDATE create_village SET no = '0'") or die (mysql_error());
  mysql_query("UPDATE create_village SET so = '0'") or die (mysql_error());
  mysql_query("UPDATE create_village SET sw = '0'") or die (mysql_error());
  mysql_query("UPDATE create_village SET no_alpha = '0'") or die (mysql_error());
  mysql_query("UPDATE create_village SET nw_alpha = '0'") or die (mysql_error());
  mysql_query("UPDATE create_village SET so_alpha = '0'") or die (mysql_error());
  mysql_query("UPDATE create_village SET sw_alpha = '0'") or die (mysql_error());
  mysql_query("UPDATE create_village SET next_left = '".$config['count_create_left']."'") or die (mysql_error());
  mysql_query("TRUNCATE dealers") or die (mysql_error());
  mysql_query("TRUNCATE events") or die (mysql_error());
 /* mysql_query("TRUNCATE forum") or die (mysql_error());
  mysql_query("TRUNCATE forum_f_read") or die (mysql_error());
  mysql_query("TRUNCATE forum_post") or die (mysql_error());
  mysql_query("TRUNCATE forum_read") or die (mysql_error());
  mysql_query("TRUNCATE forum_thread") or die (mysql_error());*/
  mysql_query("TRUNCATE friends") or die (mysql_error());
  mysql_query("TRUNCATE groups") or die (mysql_error());
  mysql_query("TRUNCATE login") or die (mysql_error());
  mysql_query("TRUNCATE logs") or die (mysql_error());
  mysql_query("TRUNCATE mail") or die (mysql_error());
  /*mysql_query("TRUNCATE mail_block") or die (mysql_error());*/
  mysql_query("TRUNCATE mail_send") or die (mysql_error());
  mysql_query("TRUNCATE map") or die (mysql_error());
  /*mysql_query("TRUNCATE map_marking") or die (mysql_error());*/
  mysql_query("TRUNCATE movements") or die (mysql_error());
  mysql_query("TRUNCATE offers") or die (mysql_error());
  mysql_query("TRUNCATE offers_multi") or die (mysql_error());
  mysql_query("TRUNCATE public_reports") or die (mysql_error());
  mysql_query("TRUNCATE quickbar") or die (mysql_error());
  mysql_query("TRUNCATE recruit") or die (mysql_error());
  mysql_query("TRUNCATE reports") or die (mysql_error());
  mysql_query("TRUNCATE research") or die (mysql_error());
  mysql_query("TRUNCATE run_events") or die (mysql_error());
  mysql_query("TRUNCATE save_players") or die (mysql_error());
  mysql_query("TRUNCATE save_rounds") or die (mysql_error());
  mysql_query("TRUNCATE sessions") or die (mysql_error());
  mysql_query("TRUNCATE share_internet") or die (mysql_error());
  mysql_query("TRUNCATE support") or die (mysql_error());
  mysql_query("TRUNCATE support_post") or die (mysql_error());
  mysql_query("TRUNCATE unit_place") or die (mysql_error());
  mysql_query("TRUNCATE users") or die (mysql_error());
  mysql_query("TRUNCATE villages") or die (mysql_error());
  mysql_query("TRUNCATE logins") or die (mysql_error());
  $error = "<p><b><span style='color:green;'>Server restartat!</span></b></p>";
 } else { $error = "<p><b><span style='color:red;'>Parola incorecta</span></b></p>"; }
 $tpl->assign("error", $error);
}
?>