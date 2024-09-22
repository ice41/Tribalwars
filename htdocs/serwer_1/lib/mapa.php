<?php
/*****************************************/
/*=======================================*/
/*     PLIK: mapa.php   		 		 */
/*     DATA: 2.12.2011r        		 	 */
/*     ROLA: klasa - mapa				 */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

class mapa {
	//Tablica osad - superglobalna:
    var $villages = null;
	
	//Tablica osad do minimapy
	var $vgs_mm = null;
	
	var $minimapy_width = 251;
	
	var $minimapy_height = 251;
	
	var $minimapy_px = 5;
	
	var $mm_sektoryw = 50;
	
	var $mm_sektoryh = 50;
	
	var $kontrakty = null;
	
	//Odznaczenia aktualnego gracza:
	var $odznaczenia = null;
	
	//Tablica krzaków - superglobalna:
    var $krzaki = null;
	var $trawy = null;
	var $kgs_mm = null;
	
	//Wejœciowa funkcja tej klasy:
    function mapa($minx,$maxx,$miny,$maxy,$sojusz,$gracza) {
		$gracze = array();
		$gracze_brb = array();
	    $query = MYSQL_QUERY("SELECT id,continent,name,userid,x,y,points,bonus FROM `villages` WHERE `x` >= '$minx' AND `x` <= '$maxx' AND `y` >= '$miny' AND `y` <= '$maxy'");
		while ($vinfo = mysql_fetch_assoc($query)) {
		    $impl_cood = $vinfo['x'].'|'.$vinfo['y'];
		    $v_obj[$impl_cood] = array('vid' => $vinfo['id'],'gid' => $vinfo['userid'], 'nazwa' => entparse($vinfo['name']) , 'kont' => $vinfo['continent'], 'punkty' => $vinfo['points'],'bonus' => $vinfo['bonus']);
			if ($vinfo['userid'] != '-1') {
				if (!is_array($gracze[$vinfo['userid']])) {
					$plemie = sql("SELECT `ally` FROM `users` WHERE `id` = '".$vinfo['userid']."'",'array');
					$pinf = sql("SELECT name,points FROM `ally` WHERE `id` = '$plemie'",'assoc');
					$gracze[$vinfo['userid']] = array($plemie,entparse($pinf['name']),$pinf['points']);
					$v_obj[$impl_cood]['plemie_id'] = $gracze[$vinfo['userid']][0];
					$v_obj[$impl_cood]['plemie_name'] = $gracze[$vinfo['userid']][1];
					$v_obj[$impl_cood]['plemie_points'] = $gracze[$vinfo['userid']][2];
					} else {
					$v_obj[$impl_cood]['plemie_id'] = $gracze[$vinfo['userid']][0];
					$v_obj[$impl_cood]['plemie_name'] = $gracze[$vinfo['userid']][1];
					$v_obj[$impl_cood]['plemie_points'] = $gracze[$vinfo['userid']][2];
					}
				}
			if ($vinfo['userid'] != '-1') {
				if (!is_array($gracze_brb[$vinfo['userid']])) {
					$userinfo = sql("SELECT username,points FROM `users` WHERE `id` = '".$vinfo['userid']."'",'assoc');
					$gracze_brb[$vinfo['userid']] = array(entparse($userinfo['username']),$userinfo['points']);
					$v_obj[$impl_cood]['uname'] = $gracze_brb[$vinfo['userid']][0];
					$v_obj[$impl_cood]['upoints'] = $gracze_brb[$vinfo['userid']][1];
					} else {
					$v_obj[$impl_cood]['uname'] = $gracze_brb[$vinfo['userid']][0];
					$v_obj[$impl_cood]['upoints'] = $gracze_brb[$vinfo['userid']][1];
					}
				}
		    }
			
		//Przenieœ wynik pêtli do zmiennej superglobalnej:
		$this->villages = $v_obj;
		
		unset($v_obj);
		
		$queryc = mysql_query("SELECT typ,do_plemienia FROM `kontrakty` WHERE `od_plemienia` = '$sojusz'");
		while ($kontrakt = mysql_fetch_assoc($queryc)) {
		    $cnt[$kontrakt['do_plemienia']] = array('typ' => $kontrakt['typ']);
		    }
			
		$this->kontrakty = $cnt;
		
		unset($cnt);
		
		//Wybierz odznaczenia graczy aktualnego gracza:
		
		$odz_que = mysql_query("SELECT do_gracza,kolor FROM `odznaczenia` WHERE `od_gracza` = '".$gracza."'");
	    while($odznaczenie = mysql_fetch_assoc($odz_que)) {
		    $kolor = explode(',',$odznaczenie['kolor']);
	        $cnt[$odznaczenie['do_gracza']] = array('r' => $kolor[0],'g' => $kolor[1],'b' => $kolor[2]);
	        }
			
		$this->odznaczenia = $cnt;
		
		unset($cnt);
		
		//Wybierz krzaki na mapie
		
		$queryk = mysql_query("SELECT typ,x,y,typ2 FROM `krzaki` WHERE `x` >= '$minx' AND `x` <= '$maxx' AND `y` >= '$miny' AND `y` <= '$maxy'");
		while ($kinfo = mysql_fetch_assoc($queryk)) {
			$impl_cood = $kinfo['x'].'|'.$kinfo['y'];
			if ($kinfo['typ2'] == 'krzak') {
				$cnt[$impl_cood] = array('typ' => $kinfo['typ']);
				}
			if ($kinfo['typ2'] == 'trawa') {
				$cnt2[$impl_cood] = array('typ' => $kinfo['typ']);
				}
		    }
			
		//Przenieœ wynik pêtli do zmiennej superglobalnej:
		$this->krzaki = $cnt;
		unset($cnt);
		
		//Przenieœ wynik pêtli do zmiennej superglobalnej:
		$this->trawy = $cnt2;
		unset($cnt2);
	    }
		
	function minimapa($mmminx,$mmmaxx,$mmminy,$mmmaxy) {
	    //Wybierz potrzebne dane do narysowania minimapy:
		
		$gracze = array();
		$query = mysql_query("SELECT id,userid,x,y FROM `villages` WHERE `x` >= '$mmminx' AND `x` <= '$mmmaxx' AND `y` >= '$mmminy' AND `y` <= '$mmmaxy'");
		while ($vinfo = mysql_fetch_assoc($query)) {
		    $impl_cood = $vinfo['x'].'|'.$vinfo['y'];
		    $vm_obj[$impl_cood] = array('id' => $vinfo['id'],'graczid' => $vinfo['userid']);
			if ($vinfo['userid'] != '-1') {
				if (!is_array($gracze[$vinfo['userid']])) {
					$plemie = sql("SELECT `ally` FROM `users` WHERE `id` = '".$vinfo['userid']."'",'array');
					$gracze[$vinfo['userid']] = array($plemie);
					$vm_obj[$impl_cood]['plemie_id'] = $gracze[$vinfo['userid']][0];
					} else {
					$vm_obj[$impl_cood]['plemie_id'] = $gracze[$vinfo['userid']][0];
					}
				}
		    }
			
		//Przenieœ wynik pêtli do zmiennej superglobalnej:
		$this->vgs_mm = $vm_obj;
		
		$queryk = mysql_query("SELECT x,y,typ2 FROM `krzaki` WHERE `x` >= '$mmminx' AND `x` <= '$mmmaxx' AND `y` >= '$mmminy' AND `y` <= '$mmmaxy'");
		while ($kinfo = mysql_fetch_assoc($queryk)) {
			if ($kinfo['typ2'] == 'krzak') {
				$impl_cood = $kinfo['x'].'|'.$kinfo['y'];
				$k_obj[$impl_cood] = array();
				}
		    }
			
		//Przenieœ wynik pêtli do zmiennej superglobalnej:
		$this->kgs_mm = $k_obj;
	    }
		
	function is_odznaczony($gracz) {
	    if (is_array($this->odznaczenia[$gracz])) {
		    $return = true;
		    } else {
			$return = false;
			}
		
		return $return;
	    }
		
	function kolor_odznaczenia($gracz) {
	    $k = $this->odznaczenia[$gracz];
		return $k;
	    }
		
	function is_osada_mm($impl_coord) {
	    if (is_array($this->vgs_mm[$impl_coord])) {
		    $return = true;
		    } else {
			$return = false;
			}
		
        //Powruæ rezultat szukania w tablicy:		
		return $return;
	    }
		
	function is_osada($impl_coord) {
	    if (is_array($this->villages[$impl_coord])) {
		    $return = true;
		    } else {
			$return = false;
			}
		
        //Powruæ rezultat szukania w tablicy:		
		return $return;
	    }
		
	function grafika_osady($impl_coord) {
	    $punkty = $this->villages[$impl_coord]['punkty'];
	    if ($punkty >= 0 XOR 299 <= $punkty) {
			$grafika = 1;
			}
	    elseif ($punkty >= 300 XOR 999 <= $punkty) {
			$grafika = 2;
			}
		elseif ($punkty >= 1000 XOR 2999 <= $punkty) {
			$grafika = 3;
			}
		elseif ($punkty >= 3000 XOR 8999 <= $punkty) {
		    $grafika = 4;
		    }
	    elseif ($punkty >= 9000 XOR 10999 <= $punkty) {
		    $grafika = 5;
	    	}
	    elseif ($punkty >= 11000) {
			$grafika = 6;
		    }
			
		if ($this->villages[$impl_coord]['gid'] != '-1') {
			if ($this->villages[$impl_coord]['bonus'] > 0) {
				$ret = 'b'.$grafika.'.png';
				} else {
				$ret = 'v'.$grafika.'.png';
				}
		    } else {
			if ($this->villages[$impl_coord]['bonus'] > 0) {
				$ret = 'b'.$grafika.'_left.png';
				} else {
				$ret = 'v'.$grafika.'_left.png';
				}
		    }
		return $ret;
	    }
		
	function get_style($x,$y) {
	    if ($y % 5 == 0) {
			if ($y % 100 == 0) {
				$border = 'border-top: 1px solid rgb(0,0,0);';
		    	} else {
		    	$border = 'border-top: 1px solid #445522;';
			    }
			}
	    if ($x % 5 == 0) {
			if ($x % 100 == 0) {
				$border .= 'border-left: 1px solid rgb(0,0,0);';
			    } else {
			    $border .= 'border-left: 1px solid #445522;';
			    }
			}
			
	    return 'position: relative;'.$border;
	    }
		
	function in_contracts($sojuszdo) {
	    if (is_array($this->kontrakty[$sojuszdo])) {
		    $return = true;
		    } else {
			$return = false;
			}
		
        //Powruæ rezultat szukania w tablicy:		
		return $return;
	    }
		
	function get_conctract_type($sojuszdo) {
	    $kt = $this->kontrakty[$sojuszdo]['typ'];
		return $kt;
	    }
		
	function is_krzak_mm($impl_coord) {
	    if (is_array($this->kgs_mm[$impl_coord])) {
		    $return = true;
		    } else {
			$return = false;
			}
		
        //Powruæ rezultat szukania w tablicy:		
		return $return;
	    }
		
	function is_krzak($impl_coord) {
	    if (is_array($this->krzaki[$impl_coord])) {
		    $return = true;
		    } else {
			$return = false;
			}
		
        //Powruæ rezultat szukania w tablicy:		
		return $return;
		}
		
	function get_krzak_typ($impl_coord) {
	    $kt = $this->krzaki[$impl_coord]['typ'];
		return $kt;
	    }
		
	function is_trawa($impl_coord) {
	    if (is_array($this->trawy[$impl_coord])) {
		    $return = true;
		    } else {
			$return = false;
			}
		
        //Powruæ rezultat szukania w tablicy:		
		return $return;
		}
		
	function get_trawa_typ($impl_coord) {
	    $kt = $this->trawy[$impl_coord]['typ'];
		return $kt;
	    }
		
	function get_color($impl_coord,$aktu_village,$aktu_gracz,$aktu_sojusz) {
	    $gracz = $this->villages[$impl_coord]['gid'];
		$plemie = $this->villages[$impl_coord]['plemie_id'];
		$vid = $this->villages[$impl_coord]['vid'];
		
		$kolor = 'background-color:rgb(127, 63, 0);';
		
		if ($gracz != -1) {
		    if ($vid == $aktu_village) {
			    $kolor = 'background-color:rgb(255,255,255);';
			    } else {
				if ($gracz == $aktu_gracz) {
				    $kolor = 'background-color:rgb(240,200,0);';
				    } else {
					if ($this->is_odznaczony($gracz)) {
						$kodz = $this->kolor_odznaczenia($gracz);
						$kolor = 'background-color:rgb('.$kodz['r'].', '.$kodz['g'].', '.$kodz['b'].');';
						} else {
						if ($aktu_sojusz != '-1') {
							if ($aktu_sojusz == $plemie) {
								$kolor = 'background-color:rgb(0, 0, 244);';
								} else {
								if ($this->in_contracts($plemie)) {
									$kontrakt_typ = $this->get_conctract_type($plemie);
									if ($kontrakt_typ == 'enemy') {
										$kolor = 'background-color:rgb(255, 0, 0);';
										}	
									if ($kontrakt_typ == 'nap') {
										$kolor = 'background-color:rgb(128, 0, 128);';
										}
									if ($kontrakt_typ == 'partner') {
										$kolor = 'background-color:rgb(0, 160, 244);';
										}
									} else {
									$kolor = 'background-color:rgb(127, 63, 0);';
									}
								}
							} else {
							$kolor = 'background-color:rgb(130, 60, 10);';
							}
						}
					}
				}
		    } else {
			$kolor = 'background-color:rgb(166,166,166);';
			}
			
		return $kolor;
	    }
		
	function get_vid($impl_coord) {
	    $vid = $this->villages[$impl_coord]['vid'];
		return $vid;
	    }
		
	function get_osada_name($impl_coord) {
	    $vname = entparse($this->villages[$impl_coord]['nazwa']);
		return $vname;
	    }
		
	function get_continent($impl_coord) {
	    $vk = $this->villages[$impl_coord]['kont'];
		return $vk;
	    }
		
	function get_bonus_image($impl_coord) {
		global $bonus;
		
		if ($this->villages[$impl_coord]['bonus'] != 0) {
			$vb = 'graphic/bonus/'.$bonus->bonusy[$this->villages[$impl_coord]['bonus']]['grafika'];
			} else {
			$vb = '';
			}
			
		return $vb;
	    }
		
	function get_bonus_text($impl_coord) {
		global $bonus;
		
	    $vb = $bonus->bonusy[$this->villages[$impl_coord]['bonus']]['opis'];
		return $vb;
	    }
		
	function get_points($impl_coord) {
		$return .= "'";
	    $return .= number_format($this->villages[$impl_coord]['punkty']);
		$return .= "'";
		return $return;
	    }
		
	function get_player_info($impl_coord) {
	    $ginfo = $this->villages[$impl_coord];
		$return .= "'";
		if ($ginfo['gid'] != '-1') {
			$return .=  $ginfo['uname'] .' ('.number_format($ginfo['upoints']).' punktów)';
		    }
		$return .= "'";
		return $return;
	    }
		
	function get_ally_info($impl_coord) {
	    $g_info = $this->villages[$impl_coord];
		$return .= "'";
		if ($g_info['plemie_id'] != '-1' && $g_info['gid'] != '-1') {
			$return .= $g_info['plemie_name'] .' ('.number_format($g_info['plemie_points']).' punktów)';
		    }
		$return .= "'";
		return $return;
	    }
		
    function rysuj_minimape($xxx,$yyy,$rozmiar_x,$rozmiar_y,$rozmiar_px,$aktuosada,$aktugracz,$aktusojusz) {
		$miny = $yyy - $rozmiar_y;
		$maxy = $yyy + $rozmiar_y;
		
		$minx = $xxx - $rozmiar_x;
		$maxx = $xxx + $rozmiar_x;
		$rozmiar_pxx = $rozmiar_px - 1;
		
		$im = imagecreatefrompng("graphic/conmap.png");
		$czerwony = imagecolorallocate($im, 255, 0, 0);
        $zielony = imagecolorallocate($im, 0, 0, 244);
        $bialy = imagecolorallocate($im, 255, 255, 255);
        $czarny = imagecolorallocate($im, 0, 0, 0);
		$zulty2 = imagecolorallocate($im, 240, 200, 0);
        $zulty = imagecolorallocate($im, 0, 160, 244);
        $pomaranczowy = imagecolorallocate($im, 128, 0, 128);
        $brazowy = imagecolorallocate($im, 130, 60, 10);
        $krzakowy = imagecolorallocate($im, 74, 102, 35);
		$zamapa = imagecolorallocate($im, 74, 102, 35);
		$siwy = imagecolorallocate($im, 143, 143, 143);
		$border = imagecolorallocate($im, 50, 76, 5);
		
		for ($y_c = $miny; $y_c <= $maxy; $y_c++) {
            for ($x_c=$minx; $x_c <= $maxx; $x_c++) {
				$wx = $x_c - $minx;
			    $wy = $y_c - $miny;
                if ($x_c % 100 == 0) {
					$poww = $wx*$rozmiar_px;
					imageline($im, $poww, 0, $poww, 888, $czarny);
					} 
				elseif ($y_c % 100 == 0) {
					$powek = $wy*$rozmiar_px;
					imageline($im, 0, $powek, 888, $powek, $czarny);
					} else {	
                    if ($x_c % 5 == 0) {
					    $pow = $wx*$rozmiar_px;
					    imageline($im, $pow, 0, $pow, 888, $border);
					    } 
					if ($y_c % 5 == 0) {
					    $powy = $wy*$rozmiar_px;
					    imageline($im, 0, $powy,888 ,$powy, $border);
				     	}
				    }
				
				if ($x_c > 999 || $x_c < 0 || $y_c > 999 || $y_c < 0) {
					imagefilledrectangle($im, ($wx*$rozmiar_px)+1, ($wy*$rozmiar_px)+1, $wx*$rozmiar_px+$rozmiar_px-1, $wy*$rozmiar_px+$rozmiar_px-1, $zamapa);
					} 
					if ($this->is_osada_mm($x_c.'|'.$y_c)) {
                        $v_info = $this->vgs_mm[$x_c.'|'.$y_c];							
	                    if ($v_info['graczid'] == -1) {
	                        imagefilledrectangle($im, ($wx*$rozmiar_px)+1, ($wy*$rozmiar_px)+1, $wx*$rozmiar_px+$rozmiar_px-1, $wy*$rozmiar_px+$rozmiar_px-1, $siwy);
	                        } else {		
	                        if ($v_info['id'] == $aktuosada) {
	    	                    imagefilledrectangle($im, ($wx*$rozmiar_px)+1, ($wy*$rozmiar_px)+1, $wx*$rozmiar_px+$rozmiar_px-1, $wy*$rozmiar_px+$rozmiar_px-1, $bialy);
								} else {
		                        if($aktugracz == $v_info['graczid']) {
		                            imagefilledrectangle($im, ($wx*$rozmiar_px)+1, ($wy*$rozmiar_px)+1, $wx*$rozmiar_px+$rozmiar_px-1, $wy*$rozmiar_px+$rozmiar_px-1, $zulty2);
							        } else {
									if ($this->is_odznaczony($v_info['graczid'])) {
										$kodz = $this->kolor_odznaczenia($v_info['graczid']);
										$kol = imagecolorallocate($im, $kodz['r'], $kodz['g'], $kodz['b']);
										imagefilledrectangle($im, ($wx*$rozmiar_px)+1, ($wy*$rozmiar_px)+1, $wx*$rozmiar_px+$rozmiar_px-1, $wy*$rozmiar_px+$rozmiar_px-1, $kol);
										} else {
										if ($v_info['plemie_id'] != '-1') {
											if ($aktusojusz == $v_info['plemie_id']) {
												imagefilledrectangle($im, ($wx*$rozmiar_px)+1, ($wy*$rozmiar_px)+1, $wx*$rozmiar_px+$rozmiar_px-1, $wy*$rozmiar_px+$rozmiar_px-1, $zielony);
												} else {
												if ($this->in_contracts($v_info['plemie_id'])) {
													$kontrakt_typ = $this->get_conctract_type($v_info['plemie_id']);
													if ($kontrakt_typ == 'enemy') {
														imagefilledrectangle($im, ($wx*$rozmiar_px)+1, ($wy*$rozmiar_px)+1, $wx*$rozmiar_px+$rozmiar_px-1, $wy*$rozmiar_px+$rozmiar_px-1, $czerwony);
														}	
													if ($kontrakt_typ == 'nap') {
														imagefilledrectangle($im, ($wx*$rozmiar_px)+1, ($wy*$rozmiar_px)+1, $wx*$rozmiar_px+$rozmiar_px-1, $wy*$rozmiar_px+$rozmiar_px-1, $pomaranczowy);
														}
													if ($kontrakt_typ == 'partner') {
														imagefilledrectangle($im, ($wx*$rozmiar_px)+1, ($wy*$rozmiar_px)+1, $wx*$rozmiar_px+$rozmiar_px-1, $wy*$rozmiar_px+$rozmiar_px-1, $zulty);
														}
													} else {
													imagefilledrectangle($im, ($wx*$rozmiar_px)+1, ($wy*$rozmiar_px)+1, $wx*$rozmiar_px+$rozmiar_px-1, $wy*$rozmiar_px+$rozmiar_px-1, $brazowy);
													}
												}
											} else {
											imagefilledrectangle($im, ($wx*$rozmiar_px)+1, ($wy*$rozmiar_px)+1, $wx*$rozmiar_px+$rozmiar_px-1, $wy*$rozmiar_px+$rozmiar_px-1, $brazowy);
											}
										}
									}
								}
							}
						} else {
						if ($this->is_krzak_mm($x_c.'|'.$y_c)) {
						    imagefilledrectangle($im, ($wx*$rozmiar_px)+1, ($wy*$rozmiar_px)+1, $wx*$rozmiar_px+$rozmiar_px-1, $wy*$rozmiar_px+$rozmiar_px-1, $krzakowy);
						    }
						}
					}
				}
		imagepng($im, 'graphic/continent/'.$aktugracz.'.png', 100);
		imagedestroy($im);
		}
    }
?>