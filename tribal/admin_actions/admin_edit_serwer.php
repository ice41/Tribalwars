<?php
/*****************************************/
/*=======================================*/
/*     PLIK: admin_edit_serwer.php   	 */
/*     DATA: 10.04.2012r        		 */
/*     ROLA: akcja - admin				 */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

if ($config->get_cfg('admin_key') === 'actions_massiv_keyaaassd') {
	$srv_id = floor((int)$_GET['id']);
	if ($_GET['action'] === 'edit_serw' && file_exists("serwer_$srv_id\lib\config.php")) {
		$configuration = $config;
		unset($config);
		
		include ("serwer_$srv_id\lib\config.php");
		
		$config["admin_pass"] = $config["master_pw"];
		$config["id"] = $config["__SERVER__ID"];
		
		$tpl->assign("serv",$config);
		
		unset($config);
		$config = $configuration;
		
		$tpl->assign("show_edit_form",true);
		} else {
		//Akacja usuñ serwer:
		if ($_GET['action'] === 'del_serw' && file_exists("serwer_$srv_id\lib\config.php")) {
			//Usun¹æ serwer z pliku serwery.php:	
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
			$out_cont .= "//Dodawanie serwerów znajduje siê na adresie:'http://localhost/admin.php?screen=create_new_server'\n";
			$out_cont .= '$serwery = array('.$servers_string.");\n";
			$out_cont .= '?>';
		
			$p = fopen('configs/serwery.php','w');
			fputs($p,$out_cont);
			fclose($p);
			
			//Usun¹æ wszystkim graczom serwer gry:
			
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
				
			//Usun¹æ katalog serwera:
			rrmdir("serwer_".$srv_id);
			
			//Usun¹æ bazê serwera:
			mysql_query("DROP DATABASE `lan_$srv_id`");
			
			header("LOCATION: admin.php?screen=edit_serwer");
			exit;
			}
			
		if ($_GET['action'] === 'edit_serw_form' && file_exists("serwer_$srv_id\lib\config.php") && count($_POST) > 0) {
			/*Walidacja danych pochodz¹cych od usera*/
			
			$new_speed = (float)$_POST['speed'];
			
			if ($new_speed < 0.1) {
				$new_speed = 0.1;
				}
				
			if ($new_speed > 10000000000) {
				$new_speed = 10000000000;
				}
				
			$_POST['admin_pass'] = str_replace("\\","\\\\'",$_POST['admin_pass']);
			$new_admin_pass = str_replace("'","\'",$_POST['admin_pass']);
			
			$new_reason_defense = floor((int)$_POST['reason_defense']);
			
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
				
			if ($new_snob_range > 1500) {
				$new_snob_range = 1500;
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
			
			$configs_contents = file_get_contents("serwer_$srv_id\lib\config.php");
			
			$configs_contents = preg_replace('/\$config\[(\'|\")speed(\'|\")\]( )*(.*?)( )*\;/',"\$config['speed'] = $new_speed;",$configs_contents);
			$configs_contents = preg_replace('/\$config\[(\'|\")master_pw(\'|\")\]( )*(.*?)( )*\;/',"\$config['master_pw'] = '$new_admin_pass';",$configs_contents);
			$configs_contents = preg_replace('/\$config\[(\'|\")reason_defense(\'|\")\]( )*(.*?)( )*\;/',"\$config['reason_defense'] = $new_reason_defense;",$configs_contents);
			$configs_contents = preg_replace('/\$config\[(\'|\")moral_activ(\'|\")\]( )*(.*?)( )*\;/',"\$config['moral_activ'] = $new_moral_activ;",$configs_contents);
			$configs_contents = preg_replace('/\$config\[(\'|\")ag_style(\'|\")\]( )*(.*?)( )*\;/',"\$config['ag_style'] = $new_ag_style;",$configs_contents);
			$configs_contents = preg_replace('/\$config\[(\'|\")snob_range(\'|\")\]( )*(.*?)( )*\;/',"\$config['snob_range'] = $new_snob_range;",$configs_contents);
			$configs_contents = preg_replace('/\$config\[(\'|\")noc(\'|\")\]( )*(.*?)( )*\;/',"\$config['noc'] = $new_noc;",$configs_contents);
			$configs_contents = preg_replace('/\$config\[(\'|\")create_users_and_villages(\'|\")\]( )*(.*?)( )*\;/',"\$config['create_users_and_villages'] = $new_create_users_and_villages;",$configs_contents);
			$configs_contents = preg_replace('/\$config\[(\'|\")awards(\'|\")\]( )*(.*?)( )*\;/',"\$config['awards'] = $new_awards;",$configs_contents);

			$f = fopen("serwer_$srv_id\lib\config.php","w");
			fputs($f,$configs_contents);
			fclose($f);
			
			header("LOCATION: admin.php?screen=edit_serwer");
			exit;
			}
			
		$configuration = $config;
		unset($config);
			
		foreach ($serwery as $serwer) {
			if (file_exists("serwer_$serwer\lib\config.php")) {
				include ("serwer_$serwer\lib\config.php");
				
				$srvs[$serwer]["speed"] = $config["speed"];
				$srvs[$serwer]["admin_pass"] = $config["master_pw"];
				$srvs[$serwer]["reason_defense"] = $config["reason_defense"];
				$srvs[$serwer]["moral_activ"] = $config["moral_activ"];
				$srvs[$serwer]["ag_style"] = $config["ag_style"];
				$srvs[$serwer]["snob_range"] = $config["snob_range"];
				$srvs[$serwer]["noc"] = $config["noc"];
				$srvs[$serwer]["create_users_and_villages"] = $config["create_users_and_villages"];
				$srvs[$serwer]["awards"] = $config["awards"];
				}
			}
			
		unset($config);
		$config = $configuration;
		
		$tpl->assign("serwery",$srvs);
		$tpl->assign("show_edit_form",false);
		}
	}
?>