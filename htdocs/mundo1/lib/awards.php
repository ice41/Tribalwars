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
			'Rei dos pontos',
			'Já ganhou %s pontos!',
			'Marque %s pontos!'
			),
		'odznaczenie_lupy' => array(
			array(500,10000,1000000,100000000),
			4,
			'Roubo',
			'Já saqueou os recursos de %s!',
			'Saqueie os recursos de %s'
			),
		'odznaczenie_farmienie' => array(
			array(10,100,1000,10000),
			4,
			'Rabieca',
			'Número de saques bem-sucedidos: %s!',
			'Pilhar %s outras aldeias!'
			),
		'odznaczenie_podbicia' => array(
			array(5,50,500,1000),
			4,
			'Conquistar',
			'Número de aldeias conquistadas até agora: %s!',
			'Deve conquistar o seguinte número de aldeias: %s!'
			),
		'odznaczenie_zabite_jednostki' => array(
			array(10000,100000,1000000,20000000),
			4,
			'Líder',
			'Já derrotou %s unidades inimigas!',
			'Derrote %s unidades inimigas!'
			),
		'odznaczenie_zabjed_wwsp' => array(
			array(100,1000,10000,100000),
			4,
			'Morte do herói',
			'Número de suas unidades que morreram apoiando honrosamente outras aldeias: %s!',
			'Unidades de força %s ajudando outras aldeias!'
			),
		'odznaczenie_ranking' => array(
			array(1000,100,20,1),
			4,
			'O melhor conquistador',
			'Eu chegarei ao top %s deste mundo!',
			'Chegue ao topo %s deste mundo!'
			),
		'odznaczenie_rycerz' => array(
			array(1),
			1,
			'Força do Cavaleiro', 
			'Encontre todos os itens de cavaleiro!', 
			'Encontre todos os itens de cavaleiro!'
			),
		'odznaczenie_szczescie' => array(
			array(1),
			1,
			'Sortudo',
			'A moral da aldeia foi 0 depois de conquistá-la!',
			'A moral da aldeia deve ser 0 depois de conquistá-la!'
			),
		'odznaczenie_pech' => array(
			array(1),
			1,
			'Azarado',
			'A moral da aldeia caiu para +1 após um de seus ataques!',
			'A moral da aldeia deve cair para +1 após um de seus ataques!'
			),
		'odznaczenie_zmartwychstanie' => array(
			array(5),
			1,
			'Ressurreição',
			'Você está começando seu quinto jogo neste mundo!',
			'Recomece 5 vezes neste mundo!'
			),
		'odznaczenie_pok_wlasne_jed' => array(
			array(10,100,1000,10000),
			4,
			'Matou-se', 
			'Atacou a si mesmo e perdeu mais de %s unidades em batalha!', 
			'Atacou a si mesmo e perdeu mais de %s unidades em batalha!'
			),
		'odznaczenie_podbicie_siebie' => array(
			array(1),
			1,
			'Conquiste a si mesmo',
			'Conquista-te!',
			'Conquiste-se!'
			),
		'odznaczenie_podbite_rezerwacje' => array(
			array(5,25,50,100),
			4,
			'Reserva de aldeia com sucesso',
			'Número de aldeias reservadas conquistadas até agora: %s!',
			'Conquiste %s aldeias reservadas!'
			),
		'odznaczenie_dni_w_sojuszu' => array(
			array(30,60,180,360),
			4,
			'Irmão de armas',
			'É membro da sua tribo há %s dias!',
			'Seja um membro da tribo por %s dias!'
			),
		'odznaczenie_destory_builds' => array(
			array(25,250,2500,10000),
			4,
			'Demolidor',
			'Destruiu %s níveis de edifícios até agora!',
			'Destrua %s níveis de construção!'
			),
		'odznaczenie_oferty' => array(
			array(10,100,500,1000),
			4,
			'Homem de negocios',
			'Já trocou mercadorias no mercado %s vezes!',
			'Troque mercadorias no mercado %s vezes!'
			),
		'odznaczenie_zniszczone_armie' => array(
			array(25,250,1500,2500),
			4,
			'Carniceiro',
			'Já destruiu completamente %s exércitos inimigos!',
			'Destrua %s exércitos inimigos completamente!'
			),
		'odznaczenie_zniszczona_szlachta' => array(
			array(15,100,350,700),
			4,
			'Matador da nobreza',
			'Matou %s nobres até agora!',
			'Mate %s nobres!'
			),
		'odznaczenie_wspieranie_innego_gracza' => array(
			array(50,100,500,3000),
			4,
			'Comandante Confiante',
			'Apoie outros jogadores em batalhas %s vezes!',
			'Apoie outro jogador em %s batalhas!'
			),
		'odznaczenie_def_spy_att' => array(
			array(25,50,250,500),
			4,
			'Matador de Carniceiros',
			'Já se defendeu contra ataques de batedores %s!',
			'Repelir %s ataques de batedores!'
			),
		'odznaczenie_att_users' => array(
			array(10,25,100,250),
			4,
			'O homem',
			'Já atacou %s jogadores diferentes!',
			'Atacar %s jogadores diferentes!'
			),
		'odznaczenie_monety' => array(
			array(50,500,5000,50000),
			4,
			'Creso',
			'Já cunhou %s moedas de ouro!',
			'Cuidado com %s moedas de ouro!'
			),
		'odznaczenie_destory_walls' => array(
			array(25,250,2500,10000),
			4,
			'Destruidor de moralhas', 
			'Divirta-se destruindo %s níveis de muralhas!',
			'Destrua %s níveis de muralhas!'
			)
		);
		
	var $day_awards_configs = array (
		'day_lupy' => array(
			'Roubo do dia',
			'Em %d roubou mais recursos neste mundo (%s recursos)!',
			'À meia-noite saqueie o maior número de recursos neste mundo!'
			),
		'day_att_kill' => array(
			'Agressor do dia',
			'Em %d, derrotei o maior número de unidades neste mundo como atacante (%s unidades)!',
			'À meia-noite, derrote o maior número de unidades neste mundo como o agressor!'
			),
		'day_def_kill' => array(
			'Defensor do dia',
			'Em %d, derrotou o maior número de unidades neste mundo como defensor (%s unidades)!',
			'À meia-noite, como defensor, derrote o maior número de unidades neste mundo!'
			),
		'day_snob_vills' => array(
			'Poder do dia',
			'em %d a maioria das aldeias neste mundo (%s aldeias) são capturadas!',
			'À meia-noite, conquiste o maior número de aldeias neste mundo!'
			),
		'day_farmed_vills' => array(
			'O saqueador do dia',
			'em %d saqueou o maior número de aldeias neste mundo (%s aldeias)!',
			'À meia-noite, saqueie o maior número de aldeias neste mundo!'
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
		'1' => 'Madeira',
		'2' => 'bronze',
		'3' => 'Prata',
		'4' => 'Ouro'
		);
		
	function save($val = null) {
		global $serwer;
		$f = fopen("rangs_reloader/day_awards_lr.txt",'w');
		fputs($f,$val);
		fclose($f);
		}
	
	function awards_files() {
		global $serwer;
		if (!file_exists("rangs_reloader/day_awards_lr.txt")) $this->save();
		}
		
	function get_last_reload_day() {
		global $serwer;
		$last_reload = file_get_contents("rangs_reloader/day_awards_lr.txt");
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
					mysql_query("UPDATE `users` SET `dzienne_odznaczenia` = '$user_awards_str' , `$mysql_query` = '0' , `day_aw_points` = `day_aw_points` + '4' , `awards_points_all` = `awards_points_all` + '4' WHERE `id` = '".$rekord_info['id']."'");
					
					$report_title = 'Prêmio diário recebido: '.$this->day_awards_configs[$award_name][0];
					$report_time = date("U");
					$report_user = $rekord_info['id'];
					$report_tit2 = str_replace(array('%d','%s'),array($user_awards_array_info[$award_name]['data'],format_number($user_awards_array_info[$award_name]['ilosc'])),$this->day_awards_configs[$award_name][1]);
					$report_hives .= '<h3>'.$this->day_awards_configs[$award_name][0].'</h3>';
					$report_hives .= '<div class="award level4" style="float: left; margin-right: 10px;">';
					$report_hives .= '<img src="/ds_graphic/awards/'.$award_name.'.png" alt="">';
					$report_hives .= '</div>';
					$report_hives .= '<p>'.$report_tit2.'</p>';
					$report_hives .= '<p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id='.$report_user.'">Veja suas Medalhas</a></p>';

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
					$raport['title'] = 'Prêmio recebido: ' . $userinfo['levele_odzanczen'][$award_name]['nazwa'] . ' (Madeira - Pare 1)  ';
					$raport['czas'] = date("U");
					$raport['id_gracza_domyslnego'] = $userinfo['id'];
					$raport['report_hives_info'] = '<h3>' . $userinfo['levele_odzanczen'][$award_name]['nazwa'] . ' (Madeira - Pare 1)</h3>'
						. '<div class="award level1" style="float: left; margin-right: 10px;">'
						. '<img src="/ds_graphic/awards/'.$award_name.'.png" alt=""></div>'
						. '<p>'.$userinfo['levele_odzanczen'][$award_name]['tekst'].'</p>'
						. '<p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id='.$userid.'">Veja suas medalhas</a></p>';
					
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
				
				if ($award_lev > $userinfo['levele_odzanczen'][$award_name]['stopien'] && $award_lev != 0) {
					$awards_points_user_sum += $award_lev;
					$userinfo['levele_odzanczen'][$award_name]['stopien'] = $award_lev;
					$userinfo['levele_odzanczen'][$award_name]['tekst'] = str_replace('%s',format_number($this->awards_configs[$award_name][0][$award_lev - 1]),$this->awards_configs[$award_name][3]);
					$userinfo['levele_odzanczen'][$award_name]['nazwa'] = $this->awards_configs[$award_name][2];
					//Dodaj raport o zdobyciu nowego odznaczenia:
					$raport['title'] = 'Prêmio recebido: ' . $userinfo['levele_odzanczen'][$award_name]['nazwa'] . ' ('.$this->level_compiler[$award_lev].' - Nível '.$award_lev.')  ';
					$raport['czas'] = date("U");
					$raport['id_gracza_domyslnego'] = $userinfo['id'];
					$raport['report_hives_info'] = '<h3>' . $userinfo['levele_odzanczen'][$award_name]['nazwa'] . ' ('.$this->level_compiler[$award_lev].' - Nível '.$award_lev.')</h3>'
						. '<div class="award level'.$award_lev.'" style="float: left; margin-right: 10px;">'
						. '<img src="/ds_graphic/awards/'.$award_name.'.png" alt=""></div>'
						. '<p>'.$userinfo['levele_odzanczen'][$award_name]['tekst'].'</p>'
						. '<p><a href="game.php?village=[akuvillage]&amp;screen=info_player&amp;id='.$userid.'">Veja suas medalhas</a></p>';
					
					mysql_query("INSERT INTO reports(title,time,type,receiver_userid,hives,in_group) VALUES (
						'".$raport['title']."','".$raport['czas']."','get_award','".$raport['id_gracza_domyslnego']."','".$raport['report_hives_info']."','other')");
						
					mysql_query("UPDATE `users` SET `new_report` = '1' WHERE `id` = '$userid'");
					} else {
					$awards_points_user_sum += $userinfo['levele_odzanczen'][$award_name]['stopien'];
					}
				}
			}
			
		//Zakoduj tablic� z powrotem na string:
		$userinfo['levele_odzanczen'] = serialize($userinfo['levele_odzanczen']);
		
		$points_sum = $userinfo['day_aw_points'] + $awards_points_user_sum;
		
		mysql_query("UPDATE `users` SET `levele_odzanczen` = '".$userinfo['levele_odzanczen']."' , `awards_points` = '$awards_points_user_sum' ,`awards_points_all` = '$points_sum' WHERE `id` = '$userid'");
		}
		
	function dec_vars($str,$aktu_village) {
		$out = str_replace('[akuvillage]',$aktu_village,$str);
		return $out;
		}
		
	function get_user_awards($userid,$aktuuser) {
		$user_info = sql("SELECT hide_own_awards,levele_odzanczen,dzienne_odznaczenia,tw_id FROM `users` WHERE `id` = '$userid'",'assoc');
		if ($user_info['hide_own_awards'] || $userid == $aktuuser) {
			//Dekoduj string na tablic� odznacze� gracza:
			$user_awards = unserialize($user_info['levele_odzanczen']);
			$user_day_awards = unserialize($user_info['dzienne_odznaczenia']);
		
			if ($userid == $aktuuser) {
				foreach ($this->mysql_get_awards_data as $award_name => $award_mysql) {
					if (!is_array($user_awards[$award_name])) {
						$nie_zdobyte_odznaczenia[$award_name] = false;
						} else {
						$content_add = '
								<div class="award-box clearfix">
			<div class="award level'.$user_awards[$award_name]['stopien'].'">
						<img src="/ds_graphic/awards/'.$award_name.'.png?1" title="" alt="">
						</div>
			<div class="award-desc">
				<strong>'.$user_awards[$award_name]['nazwa'].' ('.$this->level_compiler[$user_awards[$award_name]['stopien']].' - Nível '.$user_awards[$award_name]['stopien'].')</strong>
									<p>'.$user_awards[$award_name]['tekst'].'</p>
																	</div>
		</div>

		<hr />';
						$zdobyte_odznaczenia .= $content_add;
						}
					$content_add = '';
					}
				
				foreach ($this->mysql_get_day_data as $award_name => $award_mysql) {
					if (!is_array($user_day_awards[$award_name])) {
						$nie_zdobyte_odznaczenia[$award_name] = true;
						} else {
						$content_add .= '
								<div class="award-box clearfix">
			<div class="award level4">
						<img src="/ds_graphic/awards/'.$award_name.'.png?1" title="" alt="">
						</div>
			<div class="award-desc">
				<strong>'.$user_day_awards[$award_name]['razy'].'x '.$this->day_awards_configs[$award_name][0].'</strong>
									<p>Assuma as maiores aldeias deste mundo.</p>
										<p>'.$user_day_awards[$award_name]['tekst'].'</p>
																						</div>
		</div>

		<hr>';
						$zdobyte_odznaczenia_dzienne .= $content_add;
						$content_add = '';
						}
					}
				
				foreach ($nie_zdobyte_odznaczenia as $award_name => $award_type) {
					if (!$award_type) {
						$content_add = '<tr><td class="no_bg" valign="top" width="20"><div class="award level0"><img src="/ds_graphic/awards/dummy.png?1" title="" alt=""></div></td>'
							. '<td class="inactive" valign="top"><h5>'.$this->awards_configs[$award_name][2].'</h5>'
							. str_replace('%s',format_number($this->awards_configs[$award_name][0][0]),$this->awards_configs[$award_name][4])
							. '</td></tr>';
						$niezdobyte_odznaczenia .= $content_add;
						} else {
						$content_add = '<tr><td class="no_bg" valign="top" width="20"><div class="award level0"><img src="/ds_graphic/awards/dummy.png?1" title="" alt=""></div></td>'
							. '<td class="inactive" valign="top"><h5>'.$this->day_awards_configs[$award_name][0].'</h5>'
							. $this->day_awards_configs[$award_name][2]
							. '</td></tr>';
						$niezdobyte_odznaczenia .= $content_add;
						}
					$content_add = '';
					}
				
				$return .= '<br>';
				
				if (strlen($zdobyte_odznaczenia_dzienne) > 0) {
					$return .= '<div class="award-group">
	<div class="award-group-head">Medalhas diárias</div>
	<div class="award-group-content">
				
		<div class="award-box clearfix">'
						. $zdobyte_odznaczenia_dzienne . '</div>
	<div class="award-group-foot">&nbsp;</div>
</div>';
					}
				if (strlen($zdobyte_odznaczenia) > 0) {
					$return .= '<div class="award-group">
	<div class="award-group-head">Medalhas adquiridas</div>
	<div class="award-group-content">'
						. $zdobyte_odznaczenia . '</div>	
						<div class="award-group-foot">&nbsp;</div>
</div>';
					}
				} else {
				foreach ($this->mysql_get_awards_data as $award_name => $award_mysql) {
					if (is_array($user_awards[$award_name])) {
						$content_add = '<tr><td class="no_bg" valign="top" width="20"><div class="award level'.$user_awards[$award_name]['stopien'].'"><img src="/ds_graphic/awards/'.$award_name.'.png?1" title="" alt=""></div>'
							. '</td><td valign="top"><h5>'.$user_awards[$award_name]['nazwa'].' ('.$this->level_compiler[$user_awards[$award_name]['stopien']].' - Nível '.$user_awards[$award_name]['stopien'].')</h5>'.$user_awards[$award_name]['tekst'];
						$content_add .= '</td></tr>';
						$zdobyte_odznaczenia .= $content_add;
						}
					$content_add = '';
					}
				
				foreach ($this->mysql_get_day_data as $award_name => $award_mysql) {
					if (is_array($user_day_awards[$award_name])) {
						$content_add .= '<tr><td class="no_bg" valign="top" width="20"><div class="award level4">'
							. '<img src="/ds_graphic/awards/'.$award_name.'.png?1" title="" alt=""></div></td>'
							. '<td valign="top"><h5>'.$user_day_awards[$award_name]['razy'].'x '.$this->day_awards_configs[$award_name][0].'</h5>'.$user_day_awards[$award_name]['tekst']
							. '</td></tr>';
						$zdobyte_odznaczenia_dzienne .= $content_add;
						$content_add = '';
						}
					}
				
				$return .= '<br>';
				
				if (strlen($zdobyte_odznaczenia_dzienne) > 0) {
					$return .= '<table class="vis" width="100%"><tbody><tr><th colspan="2">Medalhas diárias obtidas</th></tr>'
						. $zdobyte_odznaczenia_dzienne . '</tbody></table>';
					}
				if (strlen($zdobyte_odznaczenia) > 0) {
					$return .= '<table class="vis" width="100%"><tbody><tr><th colspan="2">Medalhas adquiridas</th></tr>'
						. $zdobyte_odznaczenia . '</tbody></table>';
					}
				}
				
			$else_serwers_awards = $this->get_worlds_awards($user_info['tw_id'],$aktuuser);
			if (!empty($else_serwers_awards)) {
				$return .= '<br>'.$else_serwers_awards;
				}
			}
			
		return $return;
		}
		
	function get_user_awards_mini($userid,$aktuuser,$type) {
		if ($type === 'rangs') {
			$query_extends = 'hide_own_wtwaw';
			} else {
			$query_extends = 'hide_own_awards';
			}
			
		$show_awards = sql("SELECT `$query_extends` FROM `users` WHERE `id` = '$userid'",'array');
		
		if ($show_awards || $userid == $aktuuser) {	
			$userinfo = sql("SELECT dzienne_odznaczenia,levele_odzanczen FROM `users` WHERE `id` = '$userid' LIMIT 1",'assoc');
				
			$ad_arr = unserialize($userinfo['dzienne_odznaczenia']);
			$an_arr = unserialize($userinfo['levele_odzanczen']);
				
			if (is_array($ad_arr) && count($ad_arr) > 0) {
				foreach ($ad_arr as $aname => $arr) {
					if (is_array($arr)) {
						$zdobyte_odznaczenia .= '<div class="awardmini level4">';
						$zdobyte_odznaczenia .= '<img src="/ds_graphic/awards/'.$aname.'_mini.png" title="'.$this->day_awards_configs[$aname][0].'"/>';
						$zdobyte_odznaczenia .= '</div>';
						}
					}
				}
				
			if (is_array($an_arr) && count($an_arr) > 0) {
				foreach ($an_arr as $aname => $arr) {
					if (is_array($arr)) {
						$zdobyte_odznaczenia .= '<div class="awardmini level'.$arr['stopien'].'">';
						$zdobyte_odznaczenia .= '<img src="/ds_graphic/awards/'.$aname.'_mini.png" title="'.$this->awards_configs[$aname][2].'"/>';
						$zdobyte_odznaczenia .= '</div>';
						}
					}
				}
			}
		
		return $zdobyte_odznaczenia;
		}
		
	function get_worlds_awards($user_tw,$aktuuser) {
		global $config;
		
		//Po��cz z centraln� baz� danych:
		cdb_central();
		
		//Pobierz serwery gry usera:
		$tw_user_serwers = sql("SELECT `serwery_gry` FROM `gracze` WHERE `id` = '".$user_tw."'",'array');
		if (!empty($tw_user_serwers)) {
			$tw_user_serwers = explode(';',$tw_user_serwers);
			
			$array_servers = array();
			
			if (is_array($tw_user_serwers)) {
				$tw_user_serwers = del_emptys($tw_user_serwers);
				} else {
				$tw_user_serwers = array();
				}
			
			foreach ($tw_user_serwers as $serwer) {
				if ($config['__SERVER__ID'] != $serwer) {
					$array_servers[] = $serwer;
					}
				}
				
			unset($serwer);
				
			if (is_array($array_servers) && count($array_servers) > 0) { 
				$return .= '<table class="vis" width="100%"/><tr><th colspan="2">Prêmio adquirido em outros mundos</th></tr>';
				foreach ($array_servers as $serwer) {
					//Po��czy� z baz� danych docelowego serwera:
					cdb_server($serwer);
					
					//Wybra� id usera na podstawie tw_id:
					$user_server_id = sql("SELECT `id` FROM `users` WHERE `tw_id` = '$user_tw'",'array');
					
					//Pobra� sk�ad odznacze�:
					$awards_contents = $this->get_user_awards_mini($user_server_id,$aktuuser,'Perfile');
					
					if (!empty($awards_contents)) {
						$return .= '<tr><td>Mundo '.$serwer.'</td><td>'.$awards_contents.'</td>';
						}
					}
				$return .= '</table>';
				}
			}
			
		cdb_server();
		return $return;
		}
	}
?>