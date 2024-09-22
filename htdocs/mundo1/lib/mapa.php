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
	
	//Tablica informacyjna o graczach
	var $_users_info = null;
	var $_allys_info = null;
	
	var $minimapy_width = 251;
	
	var $minimapy_height = 251;
	
	var $minimapy_px = 5;
	
	var $mm_sektoryw = 50;
	
	var $mm_sektoryh = 50;
	
	var $kontrakty = null;
	
	//Odznaczenia aktualnego gracza:
	var $odznaczenia = null;
	
	//Tablica krzak�w - superglobalna:
    var $krzaki = null;
	var $trawy = null;
	var $kgs_mm = null;
	
	//Czas w formacie unix
	var $date = null;
	
	//Wej�ciowa funkcja tej klasy:
    function mapa($minx,$maxx,$miny,$maxy,$sojusz,$gracza) {
		global $config;
		$config['noob_protection_seconds'] = $config['noob_protection'] * 60;
		$q = mysql_query("SELECT id,x,y,continent,name,userid,points,bonus,`group` FROM `villages` WHERE `x` >= '$minx' AND `x` <= '$maxx' AND `y` >= '$miny' AND `y` <= '$maxy'");
		while ($v = mysql_fetch_array($q)) {
			$ic = $v[1].'|'.$v[2];	
			$this->villages[$ic] = array('vid' => $v[0],'gid' => $v[5], 'nazwa' => entparse($v[4]) , 'kont' => $v[3], 'punkty' => $v[6],'bonus' => $v[7],'group' => $v[8]);
				
			if ($v[5] != '-1' && !is_array($this->_users_info[$v[5]])) {
				$ua = sql("SELECT username,ally,points,start_gaming FROM `users` WHERE `id` = '".$v[5]."'","assoc");
				if (is_array($ua)) {
					if ($config['noob_protection'] == '-1') {
						$ua["is_noob"] = false;
						} else {
						$tas = date("U") - $ua['start_gaming'];
						if ($tas > $config['noob_protection_seconds']) {
							$ua["is_noob"] = false;
							} else {
							$ua["is_noob"] = true;
							}
						}
					$this->_users_info[$v[5]] = $ua;
					}
				}
					
			if ($v[5] != '-1') {
				$us = $this->_users_info[$v[5]]['ally'];
				if ($us != '-1' && !is_array($this->_allys_info[$us])) {
					$aa = sql("SELECT name,points FROM `ally` WHERE `id` = '".$us."'","assoc");
					if (is_array($aa)) $this->_allys_info[$us] = $aa;
					}
				}
			}
	
		if ($sojusz != '-1') {
			$q = mysql_query("SELECT typ,do_plemienia FROM `kontrakty` WHERE `od_plemienia` = '$sojusz'");
			while ($k = mysql_fetch_array($q)) {
				$this->kontrakty[$k[1]] = array('typ' => $k[0]);
				}
			}
		
		//Wybierz odznaczenia graczy aktualnego gracza:
		$q = mysql_query("SELECT do_gracza,kolor FROM `odznaczenia` WHERE `od_gracza` = '".$gracza."'");
	    while($o = mysql_fetch_array($q)) {
		    $k = explode(',',$o[1]);
			$this->odznaczenia[$o[0]] = array('r' => $k[0],'g' => $k[1],'b' => $k[2]);
	        }
		
		//Wybierz krzaki na mapie
		$q = mysql_query("SELECT typ,x,y,typ2 FROM `krzaki` WHERE `x` >= '$minx' AND `x` <= '$maxx' AND `y` >= '$miny' AND `y` <= '$maxy'");
		while ($k = mysql_fetch_array($q)) {
			$ic = $k[1].'|'.$k[2];
			if ($k[3] == 'krzak') {
				$this->krzaki[$ic] = array('typ' => $k[0]);
				}
			if ($k[3] == 'trawa') {
				$this->trawy[$ic] = array('typ' => $k[0]);
				}
		    }
			
		$this->date = date("U");
	    }

	function minimapa($mmminx,$mmmaxx,$mmminy,$mmmaxy) {
	    //Wybierz potrzebne dane do narysowania minimapy:
		$q = mysql_query("SELECT id,userid,x,y FROM `villages` WHERE `x` >= '$mmminx' AND `x` <= '$mmmaxx' AND `y` >= '$mmminy' AND `y` <= '$mmmaxy' LIMIT 2500");
		while ($v = mysql_fetch_array($q)) {
			$ic = $v[2].'|'.$v[3];
			$this->vgs_mm[$ic] = array('id' => $v[0],'graczid' => $v[1]);
			
			if ($v[1] != '-1' && !is_array($this->_users_info[$v[1]])) {
				$ua = sql("SELECT ally FROM `users` WHERE `id` = '".$v[1]."'","assoc");
				if (is_array($ua)) $this->_users_info[$v[1]] = $ua;
				}
			}
		
		$queryk = mysql_query("SELECT x,y,typ2 FROM `krzaki` WHERE `x` >= '$mmminx' AND `x` <= '$mmmaxx' AND `y` >= '$mmminy' AND `y` <= '$mmmaxy'");
		while ($k = mysql_fetch_array($queryk)) {
			if ($k[2] == 'krzak') {
				$i = $k[0].'|'.$k[1];
				//Przenie� wynik p�tli do zmiennej superglobalnej:
				$this->kgs_mm[$i] = array();
				}
			}
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
		
        //Powru� rezultat szukania w tablicy:		
		return $return;
	    }
		
	function is_osada($impl_coord) {
	    if (is_array($this->villages[$impl_coord])) {
		    $return = true;
		    } else {
			$return = false;
			}
		
        //Powru� rezultat szukania w tablicy:		
		return $return;
	    }
		
	function grafika_osady($impl_coord) {
	    $punkty = $this->villages[$impl_coord]['punkty'];
		
	    if ($punkty >= 0 xor 299 <= $punkty) {
			$grafika = 1;
			}
	    elseif ($punkty >= 300 xor 999 <= $punkty) {
			$grafika = 2;
			}
		elseif ($punkty >= 1000 xor 2999 <= $punkty) {
			$grafika = 3;
			}
		elseif ($punkty >= 3000 xor 8999 <= $punkty) {
		    $grafika = 4;
		    }
	    elseif ($punkty >= 9000 xor 10999 <= $punkty) {
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
		
	function status_osady($impl_coord,$auser,$aally) {
		if ($this->villages[$impl_coord]['gid'] == $auser) {
			$atts_to_user = sql("SELECT `attacks` FROM `villages` WHERE `id` = '".$this->villages[$impl_coord]['vid']."'",'array');
			} else {
			$atts_to_user = 0;
			}
			
		if ($atts_to_user > 0) {
			$return = '<img style="position: relative; top: -15px; left: 0px;" src="/ds_graphic/map/att_to.PNG"/>';
			} else {
			$in_reservations = sql("SELECT COUNT(id) FROM `rezerwacje` WHERE `do_wioski` = '".$this->villages[$impl_coord]['vid']."' AND `od_gracza` = '$auser'",'array');
			
			if ($in_reservations > 0) {
				$return = '<img style="position: relative; top: -15px; left: 0px;" src="/ds_graphic/map/reserved_player.png"/>';
				} else {
			$in_reservations_ally = sql("SELECT COUNT(id) FROM `rezerwacje` WHERE `do_wioski` = '".$this->villages[$impl_coord]['vid']."' AND `od_plemienia` = '$aally'",'array');
			if ($in_reservations_ally > 0) {
				$return = '<img style="position: relative; top: -15px; left: 0px;" src="/ds_graphic/map/reserved_player.png"/>';	
				} else {
				$atts_from_user = sql("SELECT COUNT(id) FROM `movements` WHERE `send_from_user` = '$auser' AND `send_to_village` = '".$this->villages[$impl_coord]['vid']."' AND `type` = 'attack'",'array');
				if ($atts_from_user > 0) {
					$return = '<img style="position: relative; top: -15px; left: 0px;" src="/ds_graphic/map/attack.png"/>';
					} else {
					$returns_from_user = sql("SELECT COUNT(id) FROM `movements` WHERE `send_from_user` = '$auser' AND `send_to_village` = '".$this->villages[$impl_coord]['vid']."' AND `type` = 'return'",'array');
					if ($returns_from_user > 0) {
						$return = '<img style="position: relative; top: -15px; left: 0px;" src="/ds_graphic/map/return.png"/>';
						}
					}
				}
			}
		}			
		return $return;
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
		
        //Powru� rezultat szukania w tablicy:		
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

        //Powru� rezultat szukania w tablicy:		
		return $return;
	    }
	function is_odk_mm($impl_coord) {
	    if (is_array($this->kgs_mm[$impl_coord])) {
		    $return = true;
		    } else {
			$return = false;
			}
		return $return;
	    }					
	function is_krzak($impl_coord) {
	    if (is_array($this->krzaki[$impl_coord])) {
		    $return = true;
		    } else {
			$return = false;
			}
		
        //Powru� rezultat szukania w tablicy:		
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
		
        //Powru� rezultat szukania w tablicy:		
		return $return;
		}
		
	function get_trawa_typ($impl_coord) {
	    $kt = $this->trawy[$impl_coord]['typ'];
		return $kt;
	    }
		
	function get_color($impl_coord,$aktu_village,$aktu_gracz,$aktu_sojusz) {
	    $gracz = $this->villages[$impl_coord]['gid'];
		$plemie = $this->_users_info[$gracz]["ally"];
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
		
	function get_vid($i) {
	    $v = $this->villages[$i]['vid'];
		return $v;
	    }
		
	function get_osada_name($i) {
	    $n = entparse($this->villages[$i]['nazwa']);
		return $n;
	    }
		
	function get_continent($i) {
	    $k = $this->villages[$i]['kont'];
		return $k;
	    }
		
	function get_group($i,$u) {
		if ($u == $this->villages[$i]['gid']) {
			$g = $this->villages[$i]['group'];
			if ($g === 'all') {
				$r = '';
				} else {
				$r = $g;
				}
			} else {
			$r = false;
			}
		return $r;
		}
		
	function get_bonus_image($impl_coord) {
		global $bonus;
		
		if ($this->villages[$impl_coord]['bonus'] != 0) {
			$vb = '/ds_graphic/bonus/'.$bonus->bonusy[$this->villages[$impl_coord]['bonus']]['grafika'];
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
		
	function get_points($i) {
		$return .= "'";
	    $return .= $this->html_num($this->villages[$i]['punkty']);
		$return .= "'";
		return $return;
	    }
		
	function get_player_info($i) {
	    $u = $this->_users_info[$this->villages[$i]['gid']];
		
		$return .= "'";
		if (is_array($u)) {
			$return .= entparse($u['username']) .' ('.$this->html_num($u['points']).' pontos)';
		    }
		$return .= "'";
		return $return;
	    }
		
	function html_num($num) {
		return str_replace(",",".",number_format($num));
		}
		
	function get_ally_info($i) {
		$a = $this->_allys_info[$this->_users_info[$this->villages[$i]['gid']]['ally']];
		
		$return .= "'";
		if (is_array($a)) {
			$return .= entparse($a['name']) .' ('.$this->html_num($a['points']).' pontos)';
		    }
		$return .= "'";
		return $return;
	    }
		
	function get_morals($i,$uip,$uid) {
		$usid = $this->villages[$i]['gid'];
		if ($usid != $uid && $usid != "-1") return kalkuluj_morale($this->_users_info[$usid]['points'],$uip) . "%";
		}
		
	function get_res($i,$uid) {
		$usid = $this->villages[$i]['gid'];
		if ($usid == $uid) {
			global $arr_maxstorage,$bonus;
			
			$vid = $this->villages[$i]['vid'];
			
			//Zreloadowa� surowce i wosjko:
			reload_vdata($vid,$this->date);
			
			$res = sql("SELECT r_wood,r_stone,r_iron,bonus,storage FROM `villages` WHERE `id` = '$vid'","assoc");
			
			$maxmag = $arr_maxstorage[$res["storage"]];
			
			if ($res['bonus'] == 1) {
				$maxmag *= $bonus->bonusy[$res['bonus']]['modifer'] + 1;
				}
			
			return $this->html_num(floor($res['r_wood'])).':'.$this->html_num(floor($res['r_stone'])).':'.$this->html_num(floor($res['r_iron'])).':'.$this->html_num(floor($maxmag));
			}
		}
		
	function get_bh($i,$uid) {
		$usid = $this->villages[$i]['gid'];
		if ($usid == $uid) {
			global $arr_farm,$bonus;
			
			$vid = $this->villages[$i]['vid'];
			$vg = sql("SELECT r_bh,farm,bonus FROM `villages` WHERE `id` = '$vid'","assoc");
			
			$maxfarm = $arr_farm[$vg["farm"]];
			
			if ($vg['bonus'] == 9) {
				$maxfarm *= $bonus->bonusy[$vg['bonus']]['modifer'] + 1;
				}
			
			return $this->html_num(floor($vg["r_bh"])) . " / " . $this->html_num(floor($maxfarm));
			}
		}
		
	function get_traders($i,$uid) {
		$usid = $this->villages[$i]['gid'];
		if ($usid == $uid) {
			global $arr_dealers,$bonus;
			
			$vid = $this->villages[$i]['vid'];
			$vg = sql("SELECT market,bonus,dealers_outside FROM `villages` WHERE `id` = '$vid'","assoc");
			
			//Ustawi� maksymaln� ilo�� kupc�w:
			$max_dealers = $arr_dealers[$vg['market']];
	
			if ($vg['bonus'] == 1) {
				$max_dealers *= $bonus->bonusy[$vg['bonus']]['modifer'] + 1;
				}
		
			$max_dealers = floor($max_dealers);
			
			//Ustawi� liczb� kupc�w dost�pnych:
			$inside_dealers = $max_dealers - $vg['dealers_outside'];
			
			return floor($inside_dealers) . "/" . $max_dealers;
			}
		}
		
	function get_units($i,$uid) {
		$usid = $this->villages[$i]['gid'];
		if ($usid == $uid) {
			global $cl_units;
			
			$vid = $this->villages[$i]['vid'];
			
			//Zreloadowa� surowce i wosjko:
			reload_vdata($vid,$this->date);
			
			$u = $cl_units->read_units($vid,$vid);
			
			$o = array();
			foreach ($u as $val) {
				$o[] = $this->html_num(floor($val));
				}
				
			return implode(":",$o);
			}
		}
		
	function is_noob_protection($i) {
		$uid = $this->villages[$i]['gid'];
		
		if ($this->_users_info[$uid]["is_noob"]) {
			return "true";
			} else {
			return "false";
			}
		}
		
    function rysuj_minimape($xxx,$yyy,$rozmiar_x,$rozmiar_y,$rozmiar_px,$aktuosada,$aktugracz,$aktusojusz,$t) {
	    if ($t == 1) {
		$my = $yyy - $rozmiar_y;
		$ay = $yyy + $rozmiar_y;
		
		$mx = $xxx - $rozmiar_x;
		$ax = $xxx + $rozmiar_x;
		$rozmiar_pxx = $rozmiar_px - 1;
		} else {
		$my = $yyy;
		$ay = $yyy + 50;
		
		$mx = $xxx;
		$ax = $xxx + 50;
		$rozmiar_pxx = $rozmiar_px - 1;
		}
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
		
		for ($y = $my; $y <= $ay; $y++) {
            for ($x=$mx; $x <= $ax; $x++) {
				$wx = $x - $mx;
			    $wy = $y - $my;
                if ($x % 100 == 0) {
					$poww = $wx*$rozmiar_px;
					imageline($im, $poww, 0, $poww, 888, $czarny);
					} 
				elseif ($y % 100 == 0) {
					$powek = $wy*$rozmiar_px;
					imageline($im, 0, $powek, 888, $powek, $czarny);
					} else {	
                    if ($x % 5 == 0) {
					    $pow = $wx*$rozmiar_px;
					    imageline($im, $pow, 0, $pow, 888, $border);
					    } 
					if ($y % 5 == 0) {
					    $powy = $wy*$rozmiar_px;
					    imageline($im, 0, $powy,888 ,$powy, $border);
				     	}
				    }
				
				if ($x > 999 || $x < 0 || $y > 999 || $y < 0) {
					imagefilledrectangle($im, ($wx*$rozmiar_px)+1, ($wy*$rozmiar_px)+1, $wx*$rozmiar_px+$rozmiar_px-1, $wy*$rozmiar_px+$rozmiar_px-1, $zamapa);
					} 
					if ($this->is_osada_mm($x.'|'.$y)) {
                        $v_info = $this->vgs_mm[$x.'|'.$y];	
						$v_info['plemie_id'] = $this->_users_info[$v_info['graczid']]['ally'];
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
						if ($this->is_krzak_mm($x.'|'.$y)) {
						    imagefilledrectangle($im, ($wx*$rozmiar_px)+1, ($wy*$rozmiar_px)+1, $wx*$rozmiar_px+$rozmiar_px-1, $wy*$rozmiar_px+$rozmiar_px-1, $krzakowy);
						    }
						}
					}
				}
		//Baixar dados do usuário
		/*$contect = mysql_fetch_assoc(mysql_query("SELECT * FROM users WHERE id = $aktugracz"));		
		$nazwa_gracza = $contect['username'];
		$pozwolenie = $contect['nick_minimap'];
		$admin = $contect['admin'];
		if (empty($pozwolenie)) {
		$pozwolenie = true;
		}
        //Se o jogador existir, adicione seu nick
		if(isset($nazwa_gracza) && $pozwolenie) {
		
		$background_color = imagecolorallocate($im, 0, 0, 0);
		if ($admin == 0) {
        $text_color = imagecolorallocate($im, 233, 14, 91);
		} else {
		$text_color = imagecolorallocate($im, 128, 0, 128);
		}
        imagestring($im, 1, 165, 240,  $nazwa_gracza, $text_color);		
		}*/
		header('Content-type: image-png');
        imagepng($im);
		//imagepng($im, 'graphic/'.$aktugracz.'.png');
        //imagedestroy($im); 		

		}
    }
?>