<?php
/*****************************************/
/*=======================================*/
/*     PLIK: awards.php   		 		 */
/*     DATA: 19.01.2012r        		 */
/*     ROLA: Silnik odznaczeñ do plemion */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/
	
class awards {
	var $awards_configs = array (
		'odznaczenie_punkty' => array(
			array(100,5000,100000,10000000),
			4,
			'Król punktów',
			'Zdoby³eœ ju¿ %s punktów!',
			'Zdob¹dŸ %s punktów!'
			),
		'odznaczenie_lupy' => array(
			array(500,10000,1000000,100000000),
			4,
			'Rabuœ',
			'Zrabowa³eœ ju¿ %s surowców!',
			'Spl¹druj %s surowców'
			),
		'odznaczenie_farmienie' => array(
			array(10,100,1000,10000),
			4,
			'Grabie¿ca',
			'Liczba udanych pl¹drowañ: %s!',
			'Spl¹druj %s innych wiosek!'
			),
		'odznaczenie_podbicia' => array(
			array(5,50,500,1000),
			4,
			'Podbój',
			'Iloœæ podbitych do tej pory wiosek: %s!',
			'Musisz podbiæ nastêpuj¹c¹ iloœæ wiosek: %s!'
			),
		'odznaczenie_zabite_jednostki' => array(
			array(10000,100000,1000000,20000000),
			4,
			'Przywódca',
			'Pokona³eœ ju¿ %s wrogich jednostek!',
			'Pokonaj %s wrogich jednostek!'
			),
		'odznaczenie_zabjed_wwsp' => array(
			array(100,1000,10000,100000),
			4,
			'Œmieræ bohatera',
			'Liczba twoich jednostek, które ponios³y honorow¹ œmieræ wspieraj¹c inne wioski: %s!',
			'Straæ %s jednostek pomagaj¹c innym wioskom!'
			),
		'odznaczenie_ranking' => array(
			array(1000,100,20,1),
			4,
			'Najlepszy zdobywca',
			'Dosta³eœ siê do czo³owej %s tego œwiata!',
			'Dostañ siê do czo³owej %s tego œwiata!'
			),
		'odznaczenie_rycerz' => array(
			array(1),
			1,
			'Potêga rycerza',
			'Znalaz³eœ wszystkie przedmioty rycerza!',
			'ZnajdŸ wszystkie przedmioty rycerza!'
			),
		'odznaczenie_szczescie' => array(
			array(1),
			1,
			'Szczesciarz',
			'Poparcie wioski wynosi³o 0 po jej podbiciu!',
			'Poparcie wioski musi wynosiæ 0 po jej podbiciu!'
			),
		'odznaczenie_pech' => array(
			array(1),
			1,
			'Pechowiec',
			'Poparcie wioski spad³o do +1 po jednym z Twoich ataków!',
			'Poparcie wioski musi spaœæ do +1 po jednym z twoich ataków!'
			),
		'odznaczenie_zmartwychstanie' => array(
			array(5),
			1,
			'Zmartwychwstanie',
			'Zaczynasz ju¿ poraz pi¹ty grê na tym œwiecie!',
			'Zacznij od nowa 5 razy w tym œwiecie!'
			),
		'odznaczenie_pok_wlasne_jed' => array(
			array(10,100,1000,10000),
			4,
			'Samobój',
			'Zaatakowa³eœ samego siebie i straci³eœ w bitwie ponad %s jednostek!',
			'Zaatakowa³eœ samego siebie i straci³eœ w bitwie ponad %s jednostek!'
			),
		'odznaczenie_podbicie_siebie' => array(
			array(1),
			1,
			'Podbój samego siebie',
			'Podbi³eœ samego siebie!',
			'Podbij samego siebie!'
			),
		'odznaczenie_podbite_rezerwacje' => array(
			array(5,25,50,100),
			4,
			'Rezerwacja wioski udana',
			'Iloœæ podbitych do tej pory zarezerwowanych wiosek: %s!',
			'Podbij %s zarezerwowanych wiosek!'
			),
		'odznaczenie_dni_w_sojuszu' => array(
			array(30,60,180,360),
			4,
			'Towarzysz broni',
			'Jesteœ cz³onkiem swojego plemienia ju¿ od %s dni!',
			'B¹dŸ cz³onkiem plemienia przez %s dni!'
			),
		'odznaczenie_destory_builds' => array(
			array(25,250,2500,10000),
			4,
			'Cz³owiek Demolka',
			'Do tej pory uda³o ci siê zniszczyæ %s poziomów budynków!',
			'Zniszcz %s poziomów budynków!'
			),
		'odznaczenie_oferty' => array(
			array(10,100,500,1000),
			4,
			'Cz³owiek interesu',
			'Wymieni³eœ towary na rynku ju¿ %s razy!',
			'Wymieñ towary na rynku %s razy!'
			),
		'odznaczenie_zniszczone_armie' => array(
			array(25,250,1500,2500),
			4,
			'RzeŸnik',
			'Uda³o ci siê ca³kowicie zniszczyæ ju¿ %s wrogich armii!',
			'Zniszcz ca³kowicie %s wrogich armii!'
			),
		'odznaczenie_zniszczona_szlachta' => array(
			array(15,100,350,700),
			4,
			'Pogromca szlachty',
			'Do tej pory uda³o ci siê zabiæ %s szlachciców!',
			'Zabij %s szlachciców!'
			),
		'odznaczenie_wspieranie_innego_gracza' => array(
			array(50,100,500,3000),
			4,
			'Pewny dowódca',
			'Wspar³eœ innych graczy w bitwach %s razy!',
			'Wesprzyj innego gracza w %s bitwach!'
			),
		'odznaczenie_def_spy_att' => array(
			array(25,50,250,500),
			4,
			'Pogromca zwiadowców',
			'Uda³o ci siê ju¿ obroniæ przed %s atakami zwiadowców!',
			'Odeprzyj %s ataków zwiadowców!'
			),
		'odznaczenie_att_users' => array(
			array(10,25,100,250),
			4,
			'Hetman',
			'Zaatakowa³eœ ju¿ %s ró¿nych graczy!',
			'Zaatakuj %s ró¿nych graczy!'
			),
		'odznaczenie_monety' => array(
			array(50,500,5000,50000),
			4,
			'Krezus',
			'Uda³o ci siê wybiæ ju¿ %s z³otych monet!',
			'Wybij %s z³otych monet!'
			),
		'odznaczenie_destory_walls' => array(
			array(25,250,2500,10000),
			4,
			'Niszczyciel murów',
			'Uda³o ci siê zniszczyæ ju¿ %s poziomów murów obronnych!',
			'Zniszcz %s poziomów murów obronnych!'
			)
		);
		
	var $day_awards_configs = array (
		'day_lupy' => array(
			'Rabuœ dnia',
			'Dnia %d zrabowa³eœ najwiêcej surowców na tym œwiecie (%s surowców)!',
			'Do pó³nocy spl¹druj najwiêcej surowców na tym œwiecie!'
			),
		'day_att_kill' => array(
			'Agresor dnia',
			'Dnia %d pokona³eœ jako napastnik najwiêcej jednostek na tym œwiecie (%s jednostek)!',
			'Do pó³nocy pokonaj jako agresor najwiêcej jednostek na tym œwiecie!'
			),
		'day_def_kill' => array(
			'Obroñca dnia',
			'Dnia %d pokona³eœ jako obroñca najwiêcej jednostek na tym œwiecie (%s jednostek)!',
			'Do pó³nocy pokonaj jako obroñca najwiêcej jednostek na tym œwiecie!'
			),
		'day_snob_vills' => array(
			'Mocarstwo dnia',
			'dnia %d przej¹³eœ najwiêcej wiosek na tym œwiecie (%s wiosek)!',
			'Do pó³nocy podbij najwiêcej wiosek na tym œwiecie!'
			),
		'day_farmed_vills' => array(
			'Grabie¿ca dnia',
			'dnia %d spl¹drowa³eœ najwiêcej wiosek na tym œwiecie (%s wiosek)!',
			'Do pó³nocy spl¹druj najwiêcej wiosek na tym œwiecie!'
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
		'2' => 'Br¹z',
		'3' => 'Srebro',
		'4' => 'Z³oto'
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
			
		//Dekoduj string na tablicê:
		$userinfo['levele_odzanczen'] = unserialize($userinfo['levele_odzanczen']);
		
		foreach ($this->mysql_get_awards_data as $award_name => $award_mysql) {
			if ($this->awards_configs[$award_name][1] == 1) {
				if ($userinfo[$award_mysql] >= $this->awards_configs[$award_name][0][0] && $userinfo['levele_odzanczen'][$award_name]['stopien'] == 0) {
					$userinfo['levele_odzanczen'][$award_name]['stopien'] = 1;
					$userinfo['levele_odzanczen'][$award_name]['tekst'] = $this->awards_configs[$award_name][3];
					$userinfo['levele_odzanczen'][$award_name]['nazwa'] = $this->awards_configs[$award_name][2];
					//Dodaj raport o zdobyciu nowego odznaczenia:
					$raport['title'] = 'Otrzymane odznaczenie: ' . $userinfo['levele_odzanczen'][$award_name]['nazwa'] . ' (Drewno - Stopieñ 1)  ';
					$raport['czas'] = date("U");
					$raport['id_gracza_domyslnego'] = $userinfo['id'];
					$raport['report_hives_info'] = '<h3>' . $userinfo['levele_odzanczen'][$award_name]['nazwa'] . ' (Drewno - Stopieñ 1)</h3>'
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
					$raport['title'] = 'Otrzymane odznaczenie: ' . $userinfo['levele_odzanczen'][$award_name]['nazwa'] . ' ('.$this->level_compiler[$award_lev].' - Stopieñ '.$award_lev.')  ';
					$raport['czas'] = date("U");
					$raport['id_gracza_domyslnego'] = $userinfo['id'];
					$raport['report_hives_info'] = '<h3>' . $userinfo['levele_odzanczen'][$award_name]['nazwa'] . ' ('.$this->level_compiler[$award_lev].' - Stopieñ '.$award_lev.')</h3>'
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
			
		//Zakoduj tablicê z powrotem na string:
		$userinfo['levele_odzanczen'] = serialize($userinfo['levele_odzanczen']);
		
		mysql_query("UPDATE `users` SET `levele_odzanczen` = '".$userinfo['levele_odzanczen']."' , `awards_points` = '$awards_points_user_sum' ,`awards_points_all` = `day_aw_points` + `awards_points` WHERE `id` = '$userid'");
		}
		
	function dec_vars($str,$aktu_village) {
		$out = str_replace('[akuvillage]',$aktu_village,$str);
		return $out;
		}
		
	function get_user_awards($userid,$aktuuser) {
		//Dekoduj string na tablicê odznaczeñ gracza:
		$user_awards = unserialize(sql("SELECT `levele_odzanczen` FROM `users` WHERE `id` = '$userid'",'array'));
		$user_day_awards = unserialize(sql("SELECT `dzienne_odznaczenia` FROM `users` WHERE `id` = '$userid'",'array'));
		
		if ($userid == $aktuuser) {
			foreach ($this->mysql_get_awards_data as $award_name => $award_mysql) {
				if (!is_array($user_awards[$award_name])) {
					$nie_zdobyte_odznaczenia[$award_name] = false;
					} else {
					$content_add = '<tr><td class="no_bg" valign="top" width="20"><div class="award level'.$user_awards[$award_name]['stopien'].'"><img src="graphic/awards/'.$award_name.'.png?1" title="" alt=""></div>'
						. '</td><td valign="top"><h5>'.$user_awards[$award_name]['nazwa'].' ('.$this->level_compiler[$user_awards[$award_name]['stopien']].' - Stopieñ '.$user_awards[$award_name]['stopien'].')</h5>'.$user_awards[$award_name]['tekst'];
						
					if (($user_awards[$award_name]['stopien'] + 1) <= $this->awards_configs[$award_name][1]) {
						$content_add .= '<br><span class="inactive">Nastêpny poziom: '.str_replace('%s',format_number($this->awards_configs[$award_name][0][$user_awards[$award_name]['stopien']]),$this->awards_configs[$award_name][4]).'</span>';
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
				$return .= '<table class="vis" width="100%"><tbody><tr><th colspan="2">Odznaczenia, które nie zosta³y jeszcze zdobyte</th></tr>'
					. $niezdobyte_odznaczenia . '</tbody></table>';
				}
			} else {
			foreach ($this->mysql_get_awards_data as $award_name => $award_mysql) {
				if (is_array($user_awards[$award_name])) {
					$content_add = '<tr><td class="no_bg" valign="top" width="20"><div class="award level'.$user_awards[$award_name]['stopien'].'"><img src="graphic/awards/'.$award_name.'.png?1" title="" alt=""></div>'
						. '</td><td valign="top"><h5>'.$user_awards[$award_name]['nazwa'].' ('.$this->level_compiler[$user_awards[$award_name]['stopien']].' - Stopieñ '.$user_awards[$award_name]['stopien'].')</h5>'.$user_awards[$award_name]['tekst'];
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
		$return .= '<tbody><tr><th width="60">Ranking</th><th width="180">Nazwa</th><th width="100">Plemiê</th>';
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
			$return .= '<td align="center"><a href="game.php?village='.$_GET['village'].'&amp;screen=ranking&amp;mode=awards&amp;site='.--$_GET['site'].'">&lt;&lt;&lt; W górê</a></td>';
			}
			
		$return .= '<td align="center">';
		$return .= '<a href="game.php?village='.$_GET['village'].'&amp;screen=ranking&amp;mode=awards&amp;site='.++$_GET['site'].'">W dó³ &gt;&gt;&gt;</a></td>';
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