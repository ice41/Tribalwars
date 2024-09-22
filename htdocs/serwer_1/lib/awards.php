<?php
/*****************************************/
/*=======================================*/
/*     PLIK: awards.php   		 		 */
/*     DATA: 19.01.2012r        		 */
/*     ROLA: Silnik odznacze� do plemion */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/
	
class awards {
	var $awards_configs = array (
		'odznaczenie_punkty' => array(
			array(100,5000,100000,10000000),
			4,
			'Kr�l punkt�w',
			'Zdoby�e� ju� %s punkt�w!',
			'Zdob�d� %s punkt�w!'
			),
		'odznaczenie_lupy' => array(
			array(500,10000,1000000,100000000),
			4,
			'Rabu�',
			'Zrabowa�e� ju� %s surowc�w!',
			'Spl�druj %s surowc�w'
			),
		'odznaczenie_farmienie' => array(
			array(10,100,1000,10000),
			4,
			'Grabie�ca',
			'Liczba udanych pl�drowa�: %s!',
			'Spl�druj %s innych wiosek!'
			),
		'odznaczenie_podbicia' => array(
			array(5,50,500,1000),
			4,
			'Podb�j',
			'Ilo�� podbitych do tej pory wiosek: %s!',
			'Musisz podbi� nast�puj�c� ilo�� wiosek: %s!'
			),
		'odznaczenie_zabite_jednostki' => array(
			array(10000,100000,1000000,20000000),
			4,
			'Przyw�dca',
			'Pokona�e� ju� %s wrogich jednostek!',
			'Pokonaj %s wrogich jednostek!'
			),
		'odznaczenie_zabjed_wwsp' => array(
			array(100,1000,10000,100000),
			4,
			'�mier� bohatera',
			'Liczba twoich jednostek, kt�re ponios�y honorow� �mier� wspieraj�c inne wioski: %s!',
			'Stra� %s jednostek pomagaj�c innym wioskom!'
			),
		'odznaczenie_ranking' => array(
			array(1000,100,20,1),
			4,
			'Najlepszy zdobywca',
			'Dosta�e� si� do czo�owej %s tego �wiata!',
			'Dosta� si� do czo�owej %s tego �wiata!'
			),
		'odznaczenie_rycerz' => array(
			array(1),
			1,
			'Pot�ga rycerza',
			'Znalaz�e� wszystkie przedmioty rycerza!',
			'Znajd� wszystkie przedmioty rycerza!'
			),
		'odznaczenie_szczescie' => array(
			array(1),
			1,
			'Szczesciarz',
			'Poparcie wioski wynosi�o 0 po jej podbiciu!',
			'Poparcie wioski musi wynosi� 0 po jej podbiciu!'
			),
		'odznaczenie_pech' => array(
			array(1),
			1,
			'Pechowiec',
			'Poparcie wioski spad�o do +1 po jednym z Twoich atak�w!',
			'Poparcie wioski musi spa�� do +1 po jednym z twoich atak�w!'
			),
		'odznaczenie_zmartwychstanie' => array(
			array(5),
			1,
			'Zmartwychwstanie',
			'Zaczynasz ju� poraz pi�ty gr� na tym �wiecie!',
			'Zacznij od nowa 5 razy w tym �wiecie!'
			),
		'odznaczenie_pok_wlasne_jed' => array(
			array(10,100,1000,10000),
			4,
			'Samob�j',
			'Zaatakowa�e� samego siebie i straci�e� w bitwie ponad %s jednostek!',
			'Zaatakowa�e� samego siebie i straci�e� w bitwie ponad %s jednostek!'
			),
		'odznaczenie_podbicie_siebie' => array(
			array(1),
			1,
			'Podb�j samego siebie',
			'Podbi�e� samego siebie!',
			'Podbij samego siebie!'
			),
		'odznaczenie_podbite_rezerwacje' => array(
			array(5,25,50,100),
			4,
			'Rezerwacja wioski udana',
			'Ilo�� podbitych do tej pory zarezerwowanych wiosek: %s!',
			'Podbij %s zarezerwowanych wiosek!'
			),
		'odznaczenie_dni_w_sojuszu' => array(
			array(30,60,180,360),
			4,
			'Towarzysz broni',
			'Jeste� cz�onkiem swojego plemienia ju� od %s dni!',
			'B�d� cz�onkiem plemienia przez %s dni!'
			),
		'odznaczenie_destory_builds' => array(
			array(25,250,2500,10000),
			4,
			'Cz�owiek Demolka',
			'Do tej pory uda�o ci si� zniszczy� %s poziom�w budynk�w!',
			'Zniszcz %s poziom�w budynk�w!'
			),
		'odznaczenie_oferty' => array(
			array(10,100,500,1000),
			4,
			'Cz�owiek interesu',
			'Wymieni�e� towary na rynku ju� %s razy!',
			'Wymie� towary na rynku %s razy!'
			),
		'odznaczenie_zniszczone_armie' => array(
			array(25,250,1500,2500),
			4,
			'Rze�nik',
			'Uda�o ci si� ca�kowicie zniszczy� ju� %s wrogich armii!',
			'Zniszcz ca�kowicie %s wrogich armii!'
			),
		'odznaczenie_zniszczona_szlachta' => array(
			array(15,100,350,700),
			4,
			'Pogromca szlachty',
			'Do tej pory uda�o ci si� zabi� %s szlachcic�w!',
			'Zabij %s szlachcic�w!'
			),
		'odznaczenie_wspieranie_innego_gracza' => array(
			array(50,100,500,3000),
			4,
			'Pewny dow�dca',
			'Wspar�e� innych graczy w bitwach %s razy!',
			'Wesprzyj innego gracza w %s bitwach!'
			),
		'odznaczenie_def_spy_att' => array(
			array(25,50,250,500),
			4,
			'Pogromca zwiadowc�w',
			'Uda�o ci si� ju� obroni� przed %s atakami zwiadowc�w!',
			'Odeprzyj %s atak�w zwiadowc�w!'
			),
		'odznaczenie_att_users' => array(
			array(10,25,100,250),
			4,
			'Hetman',
			'Zaatakowa�e� ju� %s r�nych graczy!',
			'Zaatakuj %s r�nych graczy!'
			),
		'odznaczenie_monety' => array(
			array(50,500,5000,50000),
			4,
			'Krezus',
			'Uda�o ci si� wybi� ju� %s z�otych monet!',
			'Wybij %s z�otych monet!'
			),
		'odznaczenie_destory_walls' => array(
			array(25,250,2500,10000),
			4,
			'Niszczyciel mur�w',
			'Uda�o ci si� zniszczy� ju� %s poziom�w mur�w obronnych!',
			'Zniszcz %s poziom�w mur�w obronnych!'
			)
		);
		
	var $day_awards_configs = array (
		'day_lupy' => array(
			'Rabu� dnia',
			'Dnia %d zrabowa�e� najwi�cej surowc�w na tym �wiecie (%s surowc�w)!',
			'Do p�nocy spl�druj najwi�cej surowc�w na tym �wiecie!'
			),
		'day_att_kill' => array(
			'Agresor dnia',
			'Dnia %d pokona�e� jako napastnik najwi�cej jednostek na tym �wiecie (%s jednostek)!',
			'Do p�nocy pokonaj jako agresor najwi�cej jednostek na tym �wiecie!'
			),
		'day_def_kill' => array(
			'Obro�ca dnia',
			'Dnia %d pokona�e� jako obro�ca najwi�cej jednostek na tym �wiecie (%s jednostek)!',
			'Do p�nocy pokonaj jako obro�ca najwi�cej jednostek na tym �wiecie!'
			),
		'day_snob_vills' => array(
			'Mocarstwo dnia',
			'dnia %d przej��e� najwi�cej wiosek na tym �wiecie (%s wiosek)!',
			'Do p�nocy podbij najwi�cej wiosek na tym �wiecie!'
			),
		'day_farmed_vills' => array(
			'Grabie�ca dnia',
			'dnia %d spl�drowa�e� najwi�cej wiosek na tym �wiecie (%s wiosek)!',
			'Do p�nocy spl�druj najwi�cej wiosek na tym �wiecie!'
			),
		);
		
	var $mysql_get_awards_data = array(
		'odznaczenie_punkty' => 'points',
		'odznaczenie_lupy' => 'zlupione_sur',
		'odznaczenie_farmienie' => 'sfarmione_wioski',
		'odznaczenie_podbicia' => 'villages',
		'odznaczenie_zabite_jednostki' => 'zabite_jednostki',
		'odznaczenie_zabjed_wwsp' => 'zab_jed_wwsp',
		'odznaczenie_ranking' => 'rang',
		'odznaczenie_rycerz' => 'rycek_all_items',
		'odznaczenie_szczescie' => 'szcz_szlachta',
		'odznaczenie_pech' => 'pech_szlachta',
		'odznaczenie_zmartwychstanie' => 'razy_rozp_nwg',
		'odznaczenie_pok_wlasne_jed' => 'pok_ownunits',
		'odznaczenie_podbicie_siebie' => 'podbicie_siebie',
		'odznaczenie_dni_w_sojuszu' => 'dni_w_plemieniu',
		'odznaczenie_podbite_rezerwacje' => 'udane_rezerwacje',
		'odznaczenie_destory_builds' => 'zniszczone_bud',
		'odznaczenie_oferty' => 'a_oferty',
		'odznaczenie_zniszczone_armie' => 'zniszczone_armie',
		'odznaczenie_zniszczona_szlachta' => 'zab_szlachta',
		'odznaczenie_wspieranie_innego_gracza' => 'wspieranie_inngr',
		'odznaczenie_def_spy_att' => 'def_spy_attacks',
		'odznaczenie_att_users' => 'attacked_players',
		'odznaczenie_monety' => 'monety',
		'odznaczenie_destory_walls' => 'zniszczone_mury',
		);
		
	var $mysql_get_day_data = array(
		'day_lupy' => 'day_zlupione_sur',
		'day_att_kill' => 'day_pok_att',
		'day_def_kill' => 'day_pok_def',
		'day_snob_vills' => 'day_podbicia',
		'day_farmed_vills' => 'day_sfarmione_wioski'
		);
		
	var $level_compiler = array (
		'1' => 'Drewno',
		'2' => 'Br�z',
		'3' => 'Srebro',
		'4' => 'Z�oto'
		);
		
	function save($val = null) {
		global $serwer;
		$f = fopen("../serwer_$serwer/rangs_reloader/day_awards_lr.txt",'w');
		fputs($f,$val);
		fclose($f);
		}
	
	function awards_files() {
		global $serwer;
		if (!file_exists("../serwer_$serwer/rangs_reloader/day_awards_lr.txt")) $this->save();
		}
		
	function get_last_reload_day() {
		global $serwer;
		$last_reload = file_get_contents("../serwer_$serwer/rangs_reloader/day_awards_lr.txt");
		return $last_reload;
		}
		
	function get_unix_day() {
		$day = floor(date("U") / 86400);
		return $day;
		}
		
	function reload_day_awards() {
		$this->awards_files();
		
		$last_reload_day = $this->get_last_reload_day();
		
		if ($this->get_unix_day() > $last_reload_day) {
			foreach ($this->mysql_get_day_data as $award_name => $mysql_query) {
				$rekord_info = sql("SELECT id,$mysql_query,dzienne_odznaczenia FROM `users` ORDER BY `$mysql_query` DESC LIMIT 1",'assoc');
				if ($rekord_info[$mysql_query] > 0) {
					$user_awards_array_info = unserialize($rekord_info['dzienne_odznaczenia']);
					if (!empty($user_awards_array_info[$award_name])) {
						$user_awards_array_info[$award_name]['razy'] += 1;
						$user_awards_array_info[$award_name]['data'] = date("d-m-Y",date("U"));
						$user_awards_array_info[$award_name]['ilosc'] = $rekord_info[$mysql_query];
						$user_awards_array_info[$award_name]['tekst'] = str_replace(array('%d','%s'),array($user_awards_array_info[$award_name]['data'],format_number($user_awards_array_info[$award_name]['ilosc'])),$this->day_awards_configs[$award_name][1]);
						} else {
						$user_awards_array_info[$award_name]['razy'] = 1;
						$user_awards_array_info[$award_name]['data'] = date("d-m-Y",date("U"));
						$user_awards_array_info[$award_name]['ilosc'] = $rekord_info[$mysql_query];
						$user_awards_array_info[$award_name]['tekst'] = str_replace(array('%d','%s'),array($user_awards_array_info[$award_name]['data'],format_number($user_awards_array_info[$award_name]['ilosc'])),$this->day_awards_configs[$award_name][1]);
						}
					$user_awards_str = serialize($user_awards_array_info);
					mysql_query("UPDATE `users` SET `dzienne_odznaczenia` = '$user_awards_str' , `$mysql_query` = '0' WHERE `id` = '".$rekord_info['id']."'");
					
					$report_title = 'Otrzymane odznaczenie dzienne: '.$this->day_awards_configs[$award_name][0];
					$report_time = date("U");
					$report_user = $rekord_info['id'];
					$report_tit2 = str_replace(array('%d','%s'),array($user_awards_array_info[$award_name]['data'],format_number($user_awards_array_info[$award_name]['ilosc'])),$this->day_awards_configs[$award_name][1]);
					$report_hives .= '<h3>'.$this->day_awards_configs[$award_name][0].'</h3>';
					$report_hives .= '<div class="award level4" style="float: left; margin-right: 10px;">';
					$report_hives .= '<img src="graphic/awards/'.$award_name.'.png" alt="">';
					$report_hives .= '</div>';
					$report_hives .= '<p>'.$report_tit2.'</p>';
					$report_hives .= '<p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id='.$report_user.'">Zobacz swoje odznaczenia</a></p>';
					
					mysql_query("INSERT INTO reports(
						title,time,type,receiver_userid,hives,
						in_group
						) VALUES(
						'$report_title','$report_time','get_award','$report_user','$report_hives',
						'other'
						)");
						
					mysql_query("UPDATE `users` SET `new_report` = '1' WHERE `id` = '$report_user'");
					}
				$report_hives = '';
				}
				
			$this->save($this->get_unix_day());
			}
		}
		
	function reload_user_awards($userid) {
		global $pala_bonus;
		
		$userinfo = sql("SELECT * FROM `users` WHERE `id` = '$userid'",'assoc');
		
		if ($userinfo['ally'] == '-1' || $userinfo['awards_lastarel'] == 0 || $userinfo['ally'] != $userinfo['awards_ally']) {
			mysql_query("UPDATE `users` SET `dni_w_plemieniu` = '0' , `awards_lastarel` = '".date("U")."' , `awards_ally` = '".$userinfo['ally']."' WHERE `id` = '".$userid."'");
			$userinfo['dni_w_plemieniu'] = 0;
			} else {
			if ($userinfo['ally'] == $userinfo['awards_ally']) {
				mysql_query("UPDATE `users` SET `dni_w_plemieniu` = `dni_w_plemieniu` + '".(date("U") - $userinfo['awards_lastarel'])."' , `awards_lastarel` = '".date("U")."' WHERE `id` = '".$userid."'");
				$userinfo['dni_w_plemieniu'] += (date("U") - $userinfo['awards_lastarel']) + $userinfo['dni_w_plemieniu'];
				}
			}
			
		$userinfo['dni_w_plemieniu'] /= 86400;
		
		$pala_items_arr = explode(';',$userinfo['pala_items']);
		$pala_items_arr = del_emptys($pala_items_arr);
		
		if (count($pala_bonus) > count($pala_items_arr)) {
			$userinfo['rycek_all_items'] = 0;
			} else {
			$userinfo['rycek_all_items'] = 1;
			}
			
		//Dekoduj string na tablic�:
		$userinfo['levele_odzanczen'] = unserialize($userinfo['levele_odzanczen']);
		
		foreach ($this->mysql_get_awards_data as $award_name => $award_mysql) {
			if ($this->awards_configs[$award_name][1] == 1) {
				if ($userinfo[$award_mysql] >= $this->awards_configs[$award_name][0][0] && $userinfo['levele_odzanczen'][$award_name]['stopien'] == 0) {
					$userinfo['levele_odzanczen'][$award_name]['stopien'] = 1;
					$userinfo['levele_odzanczen'][$award_name]['tekst'] = $this->awards_configs[$award_name][3];
					$userinfo['levele_odzanczen'][$award_name]['nazwa'] = $this->awards_configs[$award_name][2];
					//Dodaj raport o zdobyciu nowego odznaczenia:
					$raport['title'] = 'Otrzymane odznaczenie: ' . $userinfo['levele_odzanczen'][$award_name]['nazwa'] . ' (Drewno - Stopie� 1)  ';
					$raport['czas'] = date("U");
					$raport['id_gracza_domyslnego'] = $userinfo['id'];
					$raport['report_hives_info'] = '<h3>' . $userinfo['levele_odzanczen'][$award_name]['nazwa'] . ' (Drewno - Stopie� 1)</h3>'
						. '<div class="award level1" style="float: left; margin-right: 10px;">'
						. '<img src="graphic/awards/'.$award_name.'.png" alt=""></div>'
						. '<p>'.$userinfo['levele_odzanczen'][$award_name]['tekst'].'</p>'
						. '<p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id='.$userid.'">Zobacz swoje odznaczenia</a></p>';
					
					mysql_query("INSERT INTO reports(title,time,type,receiver_userid,hives,in_group) VALUES (
						'".$raport['title']."','".$raport['czas']."','get_award','".$raport['id_gracza_domyslnego']."','".$raport['report_hives_info']."','other')");
						
					mysql_query("UPDATE `users` SET `new_report` = '1' WHERE `id` = '".$raport['id_gracza_domyslnego']."'");
					}
				}
			if ($this->awards_configs[$award_name][1] == 4 && $userinfo[$award_mysql] > 0) {
				$award_lev = 0;
				if ($award_name == 'odznaczenie_ranking') {
					if ($userinfo[$award_mysql] <= $this->awards_configs[$award_name][0][0]) $award_lev = 1;
					if ($userinfo[$award_mysql] <= $this->awards_configs[$award_name][0][1]) $award_lev = 2;
					if ($userinfo[$award_mysql] <= $this->awards_configs[$award_name][0][2]) $award_lev = 3;
					if ($userinfo[$award_mysql] <= $this->awards_configs[$award_name][0][3]) $award_lev = 4;
					} else {
					if ($userinfo[$award_mysql] >= $this->awards_configs[$award_name][0][0]) $award_lev = 1;
					if ($userinfo[$award_mysql] >= $this->awards_configs[$award_name][0][1]) $award_lev = 2;
					if ($userinfo[$award_mysql] >= $this->awards_configs[$award_name][0][2]) $award_lev = 3;
					if ($userinfo[$award_mysql] >= $this->awards_configs[$award_name][0][3]) $award_lev = 4;
					}
					
				$awards_points_user_sum += $award_lev;
				
				if ($award_lev > $userinfo['levele_odzanczen'][$award_name]['stopien'] && $award_lev != 0) {
					$userinfo['levele_odzanczen'][$award_name]['stopien'] = $award_lev;
					$userinfo['levele_odzanczen'][$award_name]['tekst'] = str_replace('%s',format_number($this->awards_configs[$award_name][0][$award_lev - 1]),$this->awards_configs[$award_name][3]);
					$userinfo['levele_odzanczen'][$award_name]['nazwa'] = $this->awards_configs[$award_name][2];
					//Dodaj raport o zdobyciu nowego odznaczenia:
					$raport['title'] = 'Otrzymane odznaczenie: ' . $userinfo['levele_odzanczen'][$award_name]['nazwa'] . ' ('.$this->level_compiler[$award_lev].' - Stopie� '.$award_lev.')  ';
					$raport['czas'] = date("U");
					$raport['id_gracza_domyslnego'] = $userinfo['id'];
					$raport['report_hives_info'] = '<h3>' . $userinfo['levele_odzanczen'][$award_name]['nazwa'] . ' ('.$this->level_compiler[$award_lev].' - Stopie� '.$award_lev.')</h3>'
						. '<div class="award level'.$award_lev.'" style="float: left; margin-right: 10px;">'
						. '<img src="graphic/awards/'.$award_name.'.png" alt=""></div>'
						. '<p>'.$userinfo['levele_odzanczen'][$award_name]['tekst'].'</p>'
						. '<p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id='.$userid.'">Zobacz swoje odznaczenia</a></p>';
					
					mysql_query("INSERT INTO reports(title,time,type,receiver_userid,hives,in_group) VALUES (
						'".$raport['title']."','".$raport['czas']."','get_award','".$raport['id_gracza_domyslnego']."','".$raport['report_hives_info']."','other')");
						
					mysql_query("UPDATE `users` SET `new_report` = '1' WHERE `id` = '$userid'");
					}
				}
			}
			
		//Zakoduj tablic� z powrotem na string:
		$userinfo['levele_odzanczen'] = serialize($userinfo['levele_odzanczen']);
		
		mysql_query("UPDATE `users` SET `levele_odzanczen` = '".$userinfo['levele_odzanczen']."' , `awards_points` = '$awards_points_user_sum' ,`awards_points_all` = `day_aw_points` + `awards_points` WHERE `id` = '$userid'");
		}
		
	function dec_vars($str,$aktu_village) {
		$out = str_replace('[akuvillage]',$aktu_village,$str);
		return $out;
		}
		
	function get_user_awards($userid,$aktuuser) {
		//Dekoduj string na tablic� odznacze� gracza:
		$user_awards = unserialize(sql("SELECT `levele_odzanczen` FROM `users` WHERE `id` = '$userid'",'array'));
		$user_day_awards = unserialize(sql("SELECT `dzienne_odznaczenia` FROM `users` WHERE `id` = '$userid'",'array'));
		
		if ($userid == $aktuuser) {
			foreach ($this->mysql_get_awards_data as $award_name => $award_mysql) {
				if (!is_array($user_awards[$award_name])) {
					$nie_zdobyte_odznaczenia[$award_name] = false;
					} else {
					$content_add = '<tr><td class="no_bg" valign="top" width="20"><div class="award level'.$user_awards[$award_name]['stopien'].'"><img src="graphic/awards/'.$award_name.'.png?1" title="" alt=""></div>'
						. '</td><td valign="top"><h5>'.$user_awards[$award_name]['nazwa'].' ('.$this->level_compiler[$user_awards[$award_name]['stopien']].' - Stopie� '.$user_awards[$award_name]['stopien'].')</h5>'.$user_awards[$award_name]['tekst'];
						
					if (($user_awards[$award_name]['stopien'] + 1) <= $this->awards_configs[$award_name][1]) {
						$content_add .= '<br><span class="inactive">Nast�pny poziom: '.str_replace('%s',format_number($this->awards_configs[$award_name][0][$user_awards[$award_name]['stopien']]),$this->awards_configs[$award_name][4]).'</span>';
						}
					$content_add .= '</td></tr>';
					$zdobyte_odznaczenia .= $content_add;
					}
				$content_add = '';
				}
				
			foreach ($this->mysql_get_day_data as $award_name => $award_mysql) {
				if (!is_array($user_day_awards[$award_name])) {
					$nie_zdobyte_odznaczenia[$award_name] = true;
					} else {
					$content_add .= '<tr><td class="no_bg" valign="top" width="20"><div class="award level4">'
						. '<img src="graphic/awards/'.$award_name.'.png?1" title="" alt=""></div></td>'
						. '<td valign="top"><h5>'.$user_day_awards[$award_name]['razy'].'x '.$this->day_awards_configs[$award_name][0].'</h5>'.$user_day_awards[$award_name]['tekst']
						. '</td></tr>';
					$zdobyte_odznaczenia_dzienne .= $content_add;
					$content_add = '';
					}
				}
				
			foreach ($nie_zdobyte_odznaczenia as $award_name => $award_type) {
				if (!$award_type) {
					$content_add = '<tr><td class="no_bg" valign="top" width="20"><div class="award level0"><img src="graphic/awards/dummy.png?1" title="" alt=""></div></td>'
						. '<td class="inactive" valign="top"><h5>'.$this->awards_configs[$award_name][2].'</h5>'
						. str_replace('%s',format_number($this->awards_configs[$award_name][0][0]),$this->awards_configs[$award_name][4])
						. '</td></tr>';
					$niezdobyte_odznaczenia .= $content_add;
					} else {
					$content_add = '<tr><td class="no_bg" valign="top" width="20"><div class="award level0"><img src="graphic/awards/dummy.png?1" title="" alt=""></div></td>'
						. '<td class="inactive" valign="top"><h5>'.$this->day_awards_configs[$award_name][0].'</h5>'
						. $this->day_awards_configs[$award_name][2]
						. '</td></tr>';
					$niezdobyte_odznaczenia .= $content_add;
					}
				$content_add = '';
				}
				
			$return .= '<br>';
				
			if (strlen($zdobyte_odznaczenia_dzienne) > 0) {
				$return .= '<table class="vis" width="100%"><tbody><tr><th colspan="2">Zdobyte odznaczenia dzienne</th></tr>'
					. $zdobyte_odznaczenia_dzienne . '</tbody></table>';
				}
			if (strlen($zdobyte_odznaczenia) > 0) {
				$return .= '<table class="vis" width="100%"><tbody><tr><th colspan="2">Zdobyte odznaczenia</th></tr>'
					. $zdobyte_odznaczenia . '</tbody></table>';
				}
			if (strlen($niezdobyte_odznaczenia) > 0) {
				$return .= '<table class="vis" width="100%"><tbody><tr><th colspan="2">Odznaczenia, kt�re nie zosta�y jeszcze zdobyte</th></tr>'
					. $niezdobyte_odznaczenia . '</tbody></table>';
				}
			} else {
			foreach ($this->mysql_get_awards_data as $award_name => $award_mysql) {
				if (is_array($user_awards[$award_name])) {
					$content_add = '<tr><td class="no_bg" valign="top" width="20"><div class="award level'.$user_awards[$award_name]['stopien'].'"><img src="graphic/awards/'.$award_name.'.png?1" title="" alt=""></div>'
						. '</td><td valign="top"><h5>'.$user_awards[$award_name]['nazwa'].' ('.$this->level_compiler[$user_awards[$award_name]['stopien']].' - Stopie� '.$user_awards[$award_name]['stopien'].')</h5>'.$user_awards[$award_name]['tekst'];
					$content_add .= '</td></tr>';
					$zdobyte_odznaczenia .= $content_add;
					}
				$content_add = '';
				}
				
			foreach ($this->mysql_get_day_data as $award_name => $award_mysql) {
				if (is_array($user_day_awards[$award_name])) {
					$content_add .= '<tr><td class="no_bg" valign="top" width="20"><div class="award level4">'
						. '<img src="graphic/awards/'.$award_name.'.png?1" title="" alt=""></div></td>'
						. '<td valign="top"><h5>'.$user_day_awards[$award_name]['razy'].'x '.$this->day_awards_configs[$award_name][0].'</h5>'.$user_day_awards[$award_name]['tekst']
						. '</td></tr>';
					$zdobyte_odznaczenia_dzienne .= $content_add;
					$content_add = '';
					}
				}
				
			$return .= '<br>';
				
			if (strlen($zdobyte_odznaczenia_dzienne) > 0) {
				$return .= '<table class="vis" width="100%"><tbody><tr><th colspan="2">Zdobyte odznaczenia dzienne</th></tr>'
					. $zdobyte_odznaczenia_dzienne . '</tbody></table>';
				}
			if (strlen($zdobyte_odznaczenia) > 0) {
				$return .= '<table class="vis" width="100%"><tbody><tr><th colspan="2">Zdobyte odznaczenia</th></tr>'
					. $zdobyte_odznaczenia . '</tbody></table>';
				}
			}
			
		return $return;
		}
		
	function get_awards_ranking($user_awards_rang,$id) {
		if ($_GET['action'] == 'change_page' and !empty($_POST['page_RA'])) {
			$_POST['page_RA'] = (int)$_POST['page_RA'];
			if ($_POST['page_RA'] < 0) {
				$_POST['page_RA'] = 0;
				}
	
			$_POST['page_RA'] = round($_POST['page_RA']);
	
			$RA_PAGE = $_POST['page_RA'];
	
			$_GET['site'] = floor($_POST['page_RA'] / 20);
			}
			
		if (!isset($_GET['site']) && !is_numeric($_GET['site'])) {
			$_GET['site'] = floor($user_awards_rang / 20);
			}
		
		$_GET['site'] = round($_GET['site']);
		
		$do_query = $_GET['site'] * 20;
		
		$return .= '<table id="player_ranking_table" class="vis" width="100%">';
		$return .= '<tbody><tr><th width="60">Ranking</th><th width="180">Nazwa</th><th width="100">Plemi�</th>';
		$return .= '<th width="60">P.</th><th>Odznaczenia</th></tr>';
		
		$awards_rangs_sql = mysql_query("SELECT id,username,ally,awards_points_all,dzienne_odznaczenia,levele_odzanczen,award_rang FROM `users` ORDER BY `award_rang` ASC LIMIT $do_query , 20");
		while ($data = mysql_fetch_assoc($awards_rangs_sql)) {
			if ($id == $data['id']) {
				$return .= '<tr class="lit">';
				} else {
				$return .= '<tr>';
				}
				
			$ad_arr = unserialize($data['dzienne_odznaczenia']);
			$an_arr = unserialize($data['levele_odzanczen']);
				
			if (is_array($ad_arr) && count($ad_arr) > 0) {
				foreach ($ad_arr as $aname => $arr) {
					if (is_array($arr)) {
						$zdobyte_odznaczenia .= '<div class="awardmini level4">';
						$zdobyte_odznaczenia .= '<img src="graphic/awards/'.$aname.'_mini.png" title="'.$this->day_awards_configs[$aname][0].'"/>';
						$zdobyte_odznaczenia .= '</div>';
						}
					}
				}
				
			if (is_array($an_arr) && count($an_arr) > 0) {
				foreach ($an_arr as $aname => $arr) {
					if (is_array($arr)) {
						$zdobyte_odznaczenia .= '<div class="awardmini level'.$arr['stopien'].'">';
						$zdobyte_odznaczenia .= '<img src="graphic/awards/'.$aname.'_mini.png" title="'.$this->awards_configs[$aname][2].'"/>';
						$zdobyte_odznaczenia .= '</div>';
						}
					}
				}
				
			$ually_short = entparse(sql("SELECT `short` FROM `ally` WHERE `id` = '".$data['ally']."'",'array'));
				
			$return .= '<td>'.$data['award_rang'].'</td>';
			$return .= '<td><a href="game.php?villge='.$_GET['village'].'&screen=info_player&id='.$data['id'].'"/>'.entparse($data['username']).'</a></td>';
			$return .= '<td><a href="game.php?villge='.$_GET['village'].'&screen=info_ally&id='.$data['ally'].'"/>'.$ually_short.'</a></td>';
			$return .= '<td>'.$data['awards_points_all'].'</td>';
			$return .= '<td>'.$zdobyte_odznaczenia.'</td>';
			$return .= '</tr>';
			
			$zdobyte_odznaczenia = '';
			}
			
		$return .= '<table class="vis" width="100%"><tr>';
		
		if ($_GET['site'] > 0) {
			$return .= '<td align="center"><a href="game.php?village='.$_GET['village'].'&amp;screen=ranking&amp;mode=awards&amp;site='.--$_GET['site'].'">&lt;&lt;&lt; W g�r�</a></td>';
			}
			
		$return .= '<td align="center">';
		$return .= '<a href="game.php?village='.$_GET['village'].'&amp;screen=ranking&amp;mode=awards&amp;site='.++$_GET['site'].'">W d� &gt;&gt;&gt;</a></td>';
		$return .= '</tr></table>';
		
		if (!empty($RA_PAGE)) {
			$postval = $RA_PAGE;
			} else {
			$postval = $user_awards_rang;
			}
		
		$return .= '<form action="game.php?village='.$_GET['village'].'&screen=ranking&mode=awards&action=change_page" method="post"/>';
		$return .= 'Ranga: <input name="page_RA" value="'.$postval.'" type="text" style="width: 40px;"/>&nbsp;';
		$return .= '<input type="submit" name="sub" value="Szukaj"/>';
		$return .= '</form>';
		
		return $return;
		}
	}
?>