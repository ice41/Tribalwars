<?php


		include ("lib\config.php");
		
		$config["admin_pass"] = $config["master_pw"];
		$config["id"] = $config["__SERVER__ID"];			
		$tpl->assign("serv",$config);
			
	
	if ($_GET['action'] === 'edit_serw_form' && file_exists("lib\config.php") && count($_POST) > 0) {
	

			
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
			if (!$_POST['close_ally']) {
				$new_close_ally = "false";
				} else {
				$new_close_ally = "true";
				}
				if (!$_POST['kosciol_i_mnisi']) {
				$new_kosciol_i_mnisi = "false";
				} else {
				$new_kosciol_i_mnisi = "true";
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

				if (!$_POST['niszczenie']) {
				$new_niszczenie = "false";
				} else {
				$new_niszczenie = "true";
				}				
				
			$new_snob_range = floor((int)$_POST['snob_range']);
			
			if ($new_snob_range < 1) {
				$new_snob_range = 1;
				}
				
			if ($new_snob_range > 5000) {
				$new_snob_range = 5000;
				}
				
			$new_wioski_na_start = floor((int)$_POST['w_start']);
			
			if ($new_wioski_na_start < 1) {
				$new_wioski_na_start = 1;
				}
				
			if ($new_wioski_na_start > 50) {
				$new_wioski_na_start = 50;
				}

			$new_pop_min = floor((int)$_POST['pop_min']);
			
			if ($new_pop_min < 1) {
				$new_pop_min = 1;
				}
				
			if ($new_pop_min > 100) {
				$new_pop_min = 100;
				}

			$new_pop_min_paladin = floor((int)$_POST['pop_min_paladin']);
			
			if ($new_pop_min_paladin < 1) {
				$new_pop_min_paladin = 1;
				}
				
			if ($new_pop_min_paladin > 100) {
				$new_pop_min_paladin = 100;
				}

			$new_pop_max = floor((int)$_POST['pop_max']);
			
			if ($new_pop_max < 1) {
				$new_pop_max = 1;
				}
				
			if ($new_pop_max > 100) {
				$new_pop_max = 100;
				}				
				
			$new_noc_poczatek = floor((int)$_POST['noc_poczatek']);
			
			if ($new_noc_poczatek < 1) {
				$new_noc_poczatek = 1;
				}
				
			if ($new_noc_poczatek > 24) {
				$new_noc_poczatek = 24;
				}
			$new_noc_koniec = floor((int)$_POST['noc_koniec']);
			
			if ($new_noc_koniec < 1) {
				$new_noc_koniec = 1;
				}
				
			if ($new_noc_koniec > 24) {
				$new_noc_koniec = 24;
				}					
			$new_m_wood = floor((int)$_POST['m_wood']);
			
			if ($new_m_wood < 1) {
				$new_m_wood = 1;
				}
				
			if ($new_m_wood > 500000) {
				$new_m_wood = 500000;
				}

				$new_m_stone = floor((int)$_POST['m_stone']);
			
			if ($new_m_stone < 1) {
				$new_m_stone = 1;
				}
				
			if ($new_m_stone > 500000) {
				$new_m_stone = 500000;
				}

				$new_m_iron = floor((int)$_POST['m_iron']);
			
			if ($new_m_iron < 1) {
				$new_m_iron = 1;
				}
				
			if ($new_m_iron > 500000) {
				$new_m_iron = 500000;
				}				
	
			$new_poparcie = $_POST['poparcie'];
			
			if ($new_poparcie < 0.000000000000000000001) {
				$new_poparcie = 0.000000000000000000001;
				}
				
			if ($new_poparcie > 50) {
				$new_poparcie = 50;
				}

				$new_wsk_obraz = $_POST['wsk_obraz'];
				$new_wsk_text = $_POST['wsk_text'];			
				$new_kolor = $_POST['kolor'];
				$new_mail_n = $_POST['mail_nadawca'];
				$new_mail_temat = $_POST['mail_temat'];			
				$new_mail_text = $_POST['mail_text'];						
	
			if (!$_POST['noc']) {
				$new_noc = "false";
				} else {
				$new_noc = "true";
				}
				
			if (!$_POST['premium']) {
				$new_premium = "false";
				} else {
				$new_premium = "true";
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
			
			$configs_contents = file_get_contents("lib\config.php");
		
			$configs_contents = preg_replace('/\$config\[(\'|\")wioski_na_start(\'|\")\]( )*(.*?)( )*\;/',"\$config['wioski_na_start'] = $new_wioski_na_start;",$configs_contents);
		
			$configs_contents = preg_replace('/\$config\[(\'|\")noob_protection(\'|\")\]( )*(.*?)( )*\;/',"\$config['noob_protection'] = $new_noob_protection;",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")speed(\'|\")\]( )*(.*?)( )*\;/',"\$config['speed'] = $new_speed;",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")master_pw(\'|\")\]( )*(.*?)( )*\;/',"\$config['master_pw'] = '$new_admin_pass';",$configs_contents);

			$configs_contents = preg_replace('/\$conf\[(\'|\")opcja1(\'|\")\]( )*(.*?)( )*\;/',"\$conf['opcja1'] = '$new_wsk_obraz';",$configs_contents);	

			$configs_contents = preg_replace('/\$conf\[(\'|\")opcja2(\'|\")\]( )*(.*?)( )*\;/',"\$conf['opcja2'] = '$new_wsk_text';",$configs_contents);	

			$configs_contents = preg_replace('/\$conf\[(\'|\")opcja3(\'|\")\]( )*(.*?)( )*\;/',"\$conf['opcja3'] = '$new_kolor';",$configs_contents);

			$configs_contents = preg_replace('/\$conf\[(\'|\")opcja4(\'|\")\]( )*(.*?)( )*\;/',"\$conf['opcja4'] = '$new_mail_n';",$configs_contents);	

			$configs_contents = preg_replace('/\$conf\[(\'|\")opcja5(\'|\")\]( )*(.*?)( )*\;/',"\$conf['opcja5'] = '$new_mail_temat';",$configs_contents);	

			$configs_contents = preg_replace('/\$conf\[(\'|\")opcja6(\'|\")\]( )*(.*?)( )*\;/',"\$conf['opcja6'] = '$new_mail_text';",$configs_contents);

			$configs_contents = preg_replace('/\$conf\[(\'|\")premium(\'|\")\]( )*(.*?)( )*\;/',"\$conf['premium'] = '$new_premium';",$configs_contents);					
			
			$configs_contents = preg_replace('/\$config\[(\'|\")left_name(\'|\")\]( )*(.*?)( )*\;/',"\$config['left_name'] = '$new_left_name';",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")m_wood(\'|\")\]( )*(.*?)( )*\;/',"\$config['m_wood'] = '$new_m_wood';",$configs_contents);	

			$configs_contents = preg_replace('/\$config\[(\'|\")m_stone(\'|\")\]( )*(.*?)( )*\;/',"\$config['m_stone'] = '$new_m_stone';",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")m_iron(\'|\")\]( )*(.*?)( )*\;/',"\$config['m_iron'] = '$new_m_iron';",$configs_contents);		
			
			$configs_contents = preg_replace('/\$config\[(\'|\")village_choose_direction(\'|\")\]( )*(.*?)( )*\;/',"\$config['village_choose_direction'] = $new_village_choose_direction;",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")create_ally(\'|\")\]( )*(.*?)( )*\;/',"\$config['create_ally'] = $new_create_ally;",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")destroy_mode_main(\'|\")\]( )*(.*?)( )*\;/',"\$config['destroy_mode_main'] = $new_niszczenie;",$configs_contents);			
			
			$configs_contents = preg_replace('/\$config\[(\'|\")kosciol_i_mnisi(\'|\")\]( )*(.*?)( )*\;/',"\$config['kosciol_i_mnisi'] = $new_kosciol_i_mnisi;",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")leave_ally(\'|\")\]( )*(.*?)( )*\;/',"\$config['leave_ally'] = $new_leave_ally;",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")close_ally(\'|\")\]( )*(.*?)( )*\;/',"\$config['close_ally'] = $new_close_ally;",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")reason_defense(\'|\")\]( )*(.*?)( )*\;/',"\$config['reason_defense'] = $new_reason_defense;",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")agreement_per_hour(\'|\")\]( )*(.*?)( )*\;/',"\$config['agreement_per_hour'] = $new_poparcie;",$configs_contents);			
			
			$configs_contents = preg_replace('/\$config\[(\'|\")moral_activ(\'|\")\]( )*(.*?)( )*\;/',"\$config['moral_activ'] = $new_moral_activ;",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")ag_style(\'|\")\]( )*(.*?)( )*\;/',"\$config['ag_style'] = $new_ag_style;",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")snob_range(\'|\")\]( )*(.*?)( )*\;/',"\$config['snob_range'] = $new_snob_range;",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")noc(\'|\")\]( )*(.*?)( )*\;/',"\$config['noc'] = $new_noc;",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")noc_poczatek(\'|\")\]( )*(.*?)( )*\;/',"\$config['noc_poczatek'] = $new_noc_poczatek;",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")noc_koniec(\'|\")\]( )*(.*?)( )*\;/',"\$config['noc_koniec'] = $new_noc_koniec;",$configs_contents);			
			
			$configs_contents = preg_replace('/\$config\[(\'|\")create_users_and_villages(\'|\")\]( )*(.*?)( )*\;/',"\$config['create_users_and_villages'] = $new_create_users_and_villages;",$configs_contents);

			$configs_contents = preg_replace('/\$config\[(\'|\")awards(\'|\")\]( )*(.*?)( )*\;/',"\$config['awards'] = $new_awards;",$configs_contents);

			$f = fopen("lib\config.php","w");
			fputs($f,$configs_contents);
			fclose($f);
			
			header("LOCATION: game.php?village=".$village['id']."&screen=admin&mode=edit#zapisano");
			exit;
			}
			

		
	
?>