<?php
/*****************************************/
/*=======================================*/
/*     PLIK: admin_edit_serwer.php   	 */
/*     DATA: 10.04.2012r        		 */
/*     ROLA: akcja - admin				 */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

if ($conf['admin_key'] === 'actions_massiv_keyaaassd') {
	$srv_id = floor((int)$_GET['id']);
	if ($_GET['action'] === 'edit_serw' && file_exists("pl$srv_id\lib\config.php")) {
		$configuration = $config;
		unset($config);
		
		include ("mundo$srv_id\lib\config.php");
		
		$config["admin_pass"] = $config["master_pw"];
		$config["id"] = $config["__SERVER__ID"];
		
		$tpl->assign("serv",$config);
		
		unset($config);
		$config = $configuration;
		
		$tpl->assign("show_edit_form",true);
		} else {
		//Akacja usu� serwer:
		if ($_GET['action'] === 'del_serw' && file_exists("mundo$srv_id\lib\config.php")) {
			//Usun�� serwer z pliku serwery.php:	
			$output_serw = array();
			foreach ($serwery as $serwer) {
				if ($serwer != $srv_id) {
					$output_serw[] = $serwer;
					}
				}
				
			$servers_string = "";
			$out_cont = "";
			if (is_array($output_serw)) $servers_string = implode(",",$output_serw);
			
			$out_cont .= "<?php\n";
			$out_cont .= "//Dodawanie serwer�w znajduje si� na adresie:'http://localhost/admin.php?screen=create_new_server'\n";
			$out_cont .= '$serwery = array('.$servers_string.");\n";
			$out_cont .= '?>';
		
			$p = fopen('configs/serwery.php','w');
			fputs($p,$out_cont);
			fclose($p);
			
			//Usun�� wszystkim graczom serwer gry:
			
			$qe = mysql_query("SELECT serwery_gry,id FROM `gracze`");
			while($uinfo = mysql_fetch_array($qe)) {
				$arr = explode(';',$uinfo[0]);
				$ay = array();
				foreach ($arr as $val) {
					if	($val != $srv_id && !empty($val)) {
						$ay[] = $val;
						}
					}
					
				$str = implode(';',$ay);
		
				mysql_query("UPDATE `gracze` SET `serwery_gry` = '$str' WHERE `id` = '".$uinfo[1]."'");
		
				unset($ay);
				}
				
			//Usun�� katalog serwera:
			rrmdir("mundo".$srv_id);
			
			//Usun�� baz� serwera:
			mysql_query("DROP DATABASE `lan_$srv_id`");
			
			header("LOCATION: admin.php?screen=edit_serwer");
			exit;
			}
			
		if ($_GET['action'] === 'edit_serw_form' && file_exists("mundo$srv_id\lib\config.php") && count($_POST) > 0) {
				/*Walidacja danych pochodz�cych od usera*/
			
			$new_noob_protection = (float)$_POST['noob_protection'];
			
			if ($new_noob_protection < 0) {
				$new_noob_protection = -1;
				}
				
			if ($new_noob_protection > 7200) {
				$new_noob_protection = 7200;
				}

			$new_speed = (float)$_POST['speed'];
			
			if ($new_speed < 0.1) {
				$new_speed = 0.1;
				}
				
			if ($new_speed > 10000000000) {
				$new_speed = 10000000000;
				}
			
			$_POST['admin_pass'] = str_replace("\\","\\\\'",$_POST['admin_pass']);
			$new_admin_pass = str_replace("'","\'",$_POST['admin_pass']);
			
$_POST['left_name'] = str_replace("\\","\\\\'",$_POST['left_name']);
			$new_left_name = str_replace("'","\'",$_POST['left_name']);

			if (!$_POST['village_choose_direction']) {
				$new_village_choose_direction = "false";
				} else {
				$new_village_choose_direction = "true";
				}
			$new_reason_defense = floor((int)$_POST['reason_defense']);
			
			if (!$_POST['create_ally']) {
				$new_create_ally = "false";
				} else {
				$new_create_ally = "true";
				}
			if (!$_POST['leave_ally']) {
				$new_leave_ally = "false";
				} else {
				$new_leave_ally = "true";
				}
			if (!$_POST['kosciol_i_mnisi']) {
				$new_kosciol_i_mnisi = "false";
				} else {
				$new_kosciol_i_mnisi = "true";
				}				
			if (!$_POST['close_ally']) {
				$new_close_ally = "false";
				} else {
				$new_close_ally = "true";
				}
			if ($new_reason_defense < 0) {
				$new_reason_defense = 0;
				}
				
			if ($new_reason_defense > 10000000000) {
				$new_reason_defense = 10000000000;
				}
				
			if (!$_POST['moral_activ']) {
				$new_moral_activ = "false";
				} else {
				$new_moral_activ = "true";
				}
				
			if (!$_POST['ag_style']) {
				$new_ag_style = "0";
				} else {
				$new_ag_style = "1";
				}
				
			$new_snob_range = floor((int)$_POST['snob_range']);
			
			if ($new_snob_range < 1) {
				$new_snob_range = 1;
				}
				
			if ($new_snob_range > 5000) {
				$new_snob_range = 5000;
				}
				
			if (!$_POST['noc']) {
				$new_noc = "false";
				} else {
				$new_noc = "true";
				}
				
			if (!$_POST['create_users_and_villages']) {
				$new_create_users_and_villages = "false";
				} else {
				$new_create_users_and_villages = "true";
				}
				
			if (!$_POST['awards']) {
				$new_awards = "false";
				} else {
				$new_awards = "true";
				}
				
			/*Koniec walidacji*/
			
			$configs_contents = file_get_contents("mundo$srv_id\lib\config.php");
			
			$configs_contents = preg_replace('/\$config\[(\'|\")noob_protection(\'|\")\]( )*(.*?)( )*\;/',"\$config['noob_protection'] = $new_noob_protection;",$configs_contents);
			$configs_contents = preg_replace('/\$config\[(\'|\")speed(\'|\")\]( )*(.*?)( )*\;/',"\$config['speed'] = $new_speed;",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")master_pw(\'|\")\]( )*(.*?)( )*\;/',"\$config['master_pw'] = '$new_admin_pass';",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")left_name(\'|\")\]( )*(.*?)( )*\;/',"\$config['left_name'] = '$new_left_name';",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")village_choose_direction(\'|\")\]( )*(.*?)( )*\;/',"\$config['village_choose_direction'] = $new_village_choose_direction;",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")create_ally(\'|\")\]( )*(.*?)( )*\;/',"\$config['create_ally'] = $new_create_ally;",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")kosciol_i_mnisi(\'|\")\]( )*(.*?)( )*\;/',"\$config['kosciol_i_mnisi'] = $new_kosciol_i_mnisi;",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")leave_ally(\'|\")\]( )*(.*?)( )*\;/',"\$config['leave_ally'] = $new_leave_ally;",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")close_ally(\'|\")\]( )*(.*?)( )*\;/',"\$config['close_ally'] = $new_close_ally;",$configs_contents);

			$configs_contents = preg_replace('/\
$config\[(\'|\")reason_defense(\'|\")\]( )*(.*?)( )*\;/',"\$config['reason_defense'] = $new_reason_defense;",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")moral_activ(\'|\")\]( )*(.*?)( )*\;/',"\$config['moral_activ'] = $new_moral_activ;",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")ag_style(\'|\")\]( )*(.*?)( )*\;/',"\$config['ag_style'] = $new_ag_style;",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")snob_range(\'|\")\]( )*(.*?)( )*\;/',"\$config['snob_range'] = $new_snob_range;",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")noc(\'|\")\]( )*(.*?)( )*\;/',"\$config['noc'] = $new_noc;",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")create_users_and_villages(\'|\")\]( )*(.*?)( )*\;/',"\$config['create_users_and_villages'] = $new_create_users_and_villages;",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")awards(\'|\")\]( )*(.*?)( )*\;/',"\$config['awards'] = $new_awards;",$configs_contents);

			$f = fopen("mundo$srv_id\lib\config.php","w");
			fputs($f,$configs_contents);
			fclose($f);
			
			header("LOCATION: admin.php?screen=edit_serwer");
			exit;
			}
			
		$configuration = $config;
		unset($config);
			
		foreach ($serwery as $serwer) {
			if (file_exists("mundo$serwer\lib\config.php")) {
				include ("mundo$serwer\lib\config.php");	
				
			$srvs[$serwer]["noob_protection"] = $config["noob_protection"];
			$srvs[$serwer]["create_ally"] = $config["create_ally"];
			$srvs[$serwer]["leavy_ally"] = $config["leavy_ally"];
			$srvs[$serwer]["close_ally"] = $config["close_ally"];
			$srvs[$serwer]["speed"] = $config["speed"];
				$srvs[$serwer]["admin_pass"] = $config["master_pw"];
				$srvs[$serwer]["left_name"] = $config["left_name"];
				$srvs[$serwer]["village_choose_direction"] = $config["village_choose_direction"];
				$srvs[$serwer]["reason_defense"] = $config["reason_defense"];
				$srvs[$serwer]["moral_activ"] = $config["moral_activ"];
				$srvs[$serwer]["ag_style"] = $config["ag_style"];
				$srvs[$serwer]["snob_range"] = $config["snob_range"];
				$srvs[$serwer]["noc"] = $config["noc"];
				$srvs[$serwer]["create_users_and_villages"] = $config["create_users_and_villages"];
				$srvs[$serwer]["awards"] = $config["awards"];
				$srvs[$serwer]["kosciol_i_mnisi"] = $config["kosciol_i_mnisi"];
				
				}
			}
			
		unset($config);
		$config = $configuration;
		
		$tpl->assign("serwery",$srvs);
		$tpl->assign("show_edit_form",false);
		}
	}
?>