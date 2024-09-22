<?php
/*****************************************/
/*=======================================*/
/*     PLIK: bb_interpreter.PHP   		 */
/*     DATA: 04.03.2012r        		 */
/*     ROLA: Interpreter BB-CODES		 */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/
	
class bb_interpreter {
	var $objects = array();
	var $micro_start = '';
	var $micro_end = '';
	
	var $_ALL_TAGS_TYPES = array();
	var $_OPENED_TAGS_COUNT = array();
	
	function bb_interpreter($cl_builds,$cl_units,$pl) {
		if (is_object($cl_builds)) {
			$this->objects['cl_builds'] = $cl_builds;
			} else {
			$this->fatal_error("Zmienna cl_builds musi byæ obiektem! ",__FILE__,__LINE__);
			}
		if (is_object($cl_units)) {
			$this->objects['cl_units'] = $cl_units;
			} else {
			$this->fatal_error("Zmienna cl_units musi byæ obiektem! ",__FILE__,__LINE__);
			}
		if (is_object($pl)) {
			$this->objects['pl'] = $pl;
			} else {
			$this->fatal_error("Zmienna pl musi byæ obiektem! ",__FILE__,__LINE__);
			}
		}
	
	function fatal_error($message,$file,$line) {
		$message = "<br />\n<b>Fatalny b³¹d</b>:  $message w <b>$file</b> na lini <b>$line</b><br />";
		die($message);
		}
		
	function get_ms() {
		$arr = explode(" ",microtime());
		
		$microtime = $arr[0] + $arr[1];
		return $microtime;
		}
		
	function start() {
		$this->micro_start = $this->get_ms();
		}
		
	function end() {
		$this->micro_end = $this->get_ms();
		}
		
	function get_parse_time() {
		$parse_time = substr(round($this->micro_end - $this->micro_start,4),0,6);
		return $parse_time;
		}
	
	function compile_bb_code($str,$aktu_user) {
		//Start licznik:
		$this->start();
		
		//Zresetuj informacje:
		$this->_OPENED_TAGS_COUNT = array();
		$this->_VALID_TAGS_COUNT = array();
		
		$is_bb_tags = preg_match_all('~\[(.*?)\]~s',$str,$_BB_TAGS);
		
		//Jeœli s¹ jakieœ bb-tagi, to przejdŸ do prasowania tego stringu 
		if ($is_bb_tags && count($_BB_TAGS[1]) < 500) {
			foreach ($_BB_TAGS[1] as $_ID_NUMBER => $_TAG) {
				if ($_TAG === 'b' || $_TAG === 'B') {
					if (!isset($this->_OPENED_TAGS_COUNT['b'])) {
						$this->_OPENED_TAGS_COUNT['b'] = 1;
						} else {
						$this->_OPENED_TAGS_COUNT['b']++;
						}
						
					$str = preg_replace('/\['.$_TAG.'\]/','<b>',$str,1);
					}
				if ($_TAG === '/b' || $_TAG === '/B') {
					if ($this->_OPENED_TAGS_COUNT['b'] > 0) {
						$this->_OPENED_TAGS_COUNT['b']--;
						
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','</b>',$str,1);
						} else {
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','_VAL_B_TAG',$str,1);
						}
					}
				if ($_TAG === 'i' || $_TAG === 'I') {
					if (!isset($this->_OPENED_TAGS_COUNT['i'])) {
						$this->_OPENED_TAGS_COUNT['i'] = 1;
						} else {
						$this->_OPENED_TAGS_COUNT['i']++;
						}
						
					$str = preg_replace('/\['.$_TAG.'\]/','<i>',$str,1);
					}
				if ($_TAG === '/i' || $_TAG === '/I') {
					if ($this->_OPENED_TAGS_COUNT['i'] > 0) {
						$this->_OPENED_TAGS_COUNT['i']--;
						
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','</i>',$str,1);
						} else {
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','_VAL_I_TAG',$str,1);
						}
					}
				if ($_TAG === 'u' || $_TAG === 'U') {
					if (!isset($this->_OPENED_TAGS_COUNT['u'])) {
						$this->_OPENED_TAGS_COUNT['u'] = 1;
						} else {
						$this->_OPENED_TAGS_COUNT['u']++;
						}
						
					$str = preg_replace('/\['.$_TAG.'\]/','<u>',$str,1);
					}
				if ($_TAG === '/u' || $_TAG === '/U') {
					if ($this->_OPENED_TAGS_COUNT['u'] > 0) {
						$this->_OPENED_TAGS_COUNT['u']--;
						
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','</u>',$str,1);
						} else {
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','_VAL_U_TAG',$str,1);
						}
					}
				if ($_TAG === 's' || $_TAG === 'S') {
					if (!isset($this->_OPENED_TAGS_COUNT['s'])) {
						$this->_OPENED_TAGS_COUNT['s'] = 1;
						} else {
						$this->_OPENED_TAGS_COUNT['s']++;
						}
						
					$str = preg_replace('/\['.$_TAG.'\]/','<s>',$str,1);
					}
				if ($_TAG === '/s' || $_TAG === '/S') {
					if ($this->_OPENED_TAGS_COUNT['s'] > 0) {
						$this->_OPENED_TAGS_COUNT['s']--;
						
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','</s>',$str,1);
						} else {
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','_VAL_S_TAG',$str,1);
						}
					}
					
				if (preg_match('/(?:color|COLOR)\=(.+)/',$_TAG,$_EFFECT)) {
					if (!isset($this->_OPENED_TAGS_COUNT['color'])) {
						$this->_OPENED_TAGS_COUNT['color'] = 1;
						} else {
						$this->_OPENED_TAGS_COUNT['color']++;
						}
						
					$str = preg_replace('/\['.validate_reg($_TAG).'\]/','<span style="color: '.$_EFFECT[1].';">',$str,1);
					}
				if ($_TAG === '/color' || $_TAG === '/COLOR') {
					if ($this->_OPENED_TAGS_COUNT['color'] > 0) {
						$this->_OPENED_TAGS_COUNT['color']--;
						
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','</span>',$str,1);
						} else {
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','_VAL_COLOR_TAG',$str,1);
						}
					}
				if (preg_match('~(?:size|SIZE)\=(.+)~s',$_TAG,$_EFFECT)) {
					if (!isset($this->_OPENED_TAGS_COUNT['size'])) {
						$this->_OPENED_TAGS_COUNT['size'] = 1;
						} else {
						$this->_OPENED_TAGS_COUNT['size']++;
						}
						
					$_EFFECT[1] = floor($_EFFECT[1]);
					if ($_EFFECT[1] < 5) {
						$_EFFECT[1] = 5;
						}
					if ($_EFFECT[1] > 500) {
						$_EFFECT[1] = 500;
						}
					$str = preg_replace('/\['.validate_reg($_TAG).'\]/','<span style="font-size: '.$_EFFECT[1].'px;">',$str,1);
					}
				if ($_TAG === '/size' || $_TAG === '/SIZE') {
					if ($this->_OPENED_TAGS_COUNT['size'] > 0) {
						$this->_OPENED_TAGS_COUNT['size']--;
						
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','</span>',$str,1);
						} else {
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','_VAL_SIZE_TAG',$str,1);
						}
					}
				if ($_TAG === 'img' || $_TAG === 'IMG') {
					if (!isset($this->_OPENED_TAGS_COUNT['img'])) {
						$this->_OPENED_TAGS_COUNT['img'] = 1;
						} else {
						$this->_OPENED_TAGS_COUNT['img']++;
						}
						
					$str = preg_replace('/\['.$_TAG.'\]/','<img src="',$str,1);
					}
				if ($_TAG === '/img' || $_TAG === '/IMG') {
					if ($this->_OPENED_TAGS_COUNT['img'] > 0) {
						$this->_OPENED_TAGS_COUNT['img']--;
						
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','" alt="" title=""/>',$str,1);
						} else {
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','_VAL_IMG_TAG',$str,1);
						}
					}
				if ($_TAG === 'url' || $_TAG === 'URL') {
					if (!isset($this->_OPENED_TAGS_COUNT['url'])) {
						$this->_OPENED_TAGS_COUNT['url'] = 1;
						} else {
						$this->_OPENED_TAGS_COUNT['url']++;
						}
						
					$str = preg_replace('/\['.$_TAG.'\]/','<a href="',$str,1);
					}
				if ($_TAG === '/url' || $_TAG === '/URL') {
					if ($this->_OPENED_TAGS_COUNT['url'] > 0) {
						$this->_OPENED_TAGS_COUNT['url']--;
						
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','" rel="nofollow" title="$1"> zewnêtrzny odnoœnik </a>',$str,1);
						} else {
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','_VAL_URL_TAG',$str,1);
						}
					}
				if (preg_match('~(?:quote|QUOTE)\=(.+)~s',$_TAG,$_EFFECT)) {
					if (!isset($this->_OPENED_TAGS_COUNT['quote'])) {
						$this->_OPENED_TAGS_COUNT['quote'] = 1;
						} else {
						$this->_OPENED_TAGS_COUNT['quote']++;
						}
						
					$BOX_VALUE = '<table class="quote"><tbody><tr><td></td><td class="quote_author">'.$_EFFECT[1].' napisa³:';
					$BOX_VALUE .= '</td></tr><tr><td width="10"></td><td class="quote_message">';
					$str = preg_replace('/\['.validate_reg($_TAG).'\]/',$BOX_VALUE,$str,1);
					}
				if ($_TAG === '/quote' || $_TAG === '/QUOTE') {
					if ($this->_OPENED_TAGS_COUNT['quote'] > 0) {
						$this->_OPENED_TAGS_COUNT['quote']--;
						
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','</td></tr></tbody></table>',$str,1);
						} else {
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','_VAL_QUOTE_TAG',$str,1);
						}
					}
				if ($_TAG === 'spoiler' || $_TAG === 'SPOILER') {
					if (!isset($this->_OPENED_TAGS_COUNT['spoiler'])) {
						$this->_OPENED_TAGS_COUNT['spoiler'] = 1;
						} else {
						$this->_OPENED_TAGS_COUNT['spoiler']++;
						}
						
					$BOX_VALUE = '<div class="spoiler"><input value="Spoiler" onclick="toggle_spoiler(this)" type="button"><div><span style="display: none;">';
					$str = preg_replace('/\['.$_TAG.'\]/',$BOX_VALUE,$str,1);
					}
				if ($_TAG === '/spoiler' || $_TAG === '/SPOILER') {
					if ($this->_OPENED_TAGS_COUNT['spoiler'] > 0) {
						$this->_OPENED_TAGS_COUNT['spoiler']--;
						
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','</span></div></div>',$str,1);
						} else {
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','_VAL_SPOILER_TAG',$str,1);
						}
					}
				if ($_TAG === 'building' || $_TAG === 'BUILDING') {
					if (!isset($this->_OPENED_TAGS_COUNT['building'])) {
						$this->_OPENED_TAGS_COUNT['building'] = 1;
						} else {
						$this->_OPENED_TAGS_COUNT['building']++;
						}
						
					$str = preg_replace('/\['.$_TAG.'\]/','<img src="/ds_graphic/buildings/',$str,1);
					}
				if ($_TAG === '/building' || $_TAG === '/BUILDING') {
					if ($this->_OPENED_TAGS_COUNT['building'] > 0) {
						$this->_OPENED_TAGS_COUNT['building']--;
						
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','.png" alt="" title=""/>',$str,1);
						} else {
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','_VAL_BUILDING_TAG',$str,1);
						}
					}
				if ($_TAG === 'unit' || $_TAG === 'UNIT') {
					if (!isset($this->_OPENED_TAGS_COUNT['unit'])) {
						$this->_OPENED_TAGS_COUNT['unit'] = 1;
						} else {
						$this->_OPENED_TAGS_COUNT['unit']++;
						}
						
					$str = preg_replace('/\['.$_TAG.'\]/','<img src="/ds_graphic/unit/',$str,1);
					}
				if ($_TAG === '/unit' || $_TAG === '/UNIT') {
					if ($this->_OPENED_TAGS_COUNT['unit'] > 0) {
						$this->_OPENED_TAGS_COUNT['unit']--;
						
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','.png" alt="" title=""/>',$str,1);
						} else {
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','_VAL_UNIT_TAG',$str,1);
						}
					}
					
				if ($_TAG === 'table' || $_TAG === 'TABLE') {
					if (!isset($this->_OPENED_TAGS_COUNT['table'])) {
						$this->_OPENED_TAGS_COUNT['table'] = 1;
						} else {
						$this->_OPENED_TAGS_COUNT['table']++;
						}
						
					$str = preg_replace('/\['.$_TAG.'\]/','<table class="vis" align="center">',$str,1);
					}
				if ($_TAG === '/table' || $_TAG === '/TABLE') {
					if ($this->_OPENED_TAGS_COUNT['table'] > 0) {
						$this->_OPENED_TAGS_COUNT['table']--;
						
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','</table>',$str,1);
						} else {
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','_VAL_TABLE_TAG',$str,1);
						}
					}
				if ($_TAG === 'tr' || $_TAG === 'TR') {
					if ($this->_OPENED_TAGS_COUNT['table'] > 0) {
						if (!isset($this->_OPENED_TAGS_COUNT['tr'])) {
							$this->_OPENED_TAGS_COUNT['tr'] = 1;
							} else {
							$this->_OPENED_TAGS_COUNT['tr']++;
							}
						
						$str = preg_replace('/\['.$_TAG.'\]/','<tr>',$str,1);
						} else {
						$str = preg_replace('/\['.$_TAG.'\]/','_VAL_TR_OPEN_TAG',$str,1);
						}
					}
				if ($_TAG === '/tr' || $_TAG === '/TR') {
					if ($this->_OPENED_TAGS_COUNT['table'] > 0) {
						if ($this->_OPENED_TAGS_COUNT['tr'] > 0) {
							$this->_OPENED_TAGS_COUNT['tr']--;
							$str = preg_replace('/\['.validate_reg($_TAG).'\]/','</tr>',$str,1);
							} else {
							$str = preg_replace('/\['.validate_reg($_TAG).'\]/','_VAL_TR_CLOSE_TAG',$str,1);
							}
						} else {
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','_VAL_TR_CLOSE_TAG',$str,1);
						}
					}	
				if ($_TAG === 'th' || $_TAG === 'TH') {
					if ($this->_OPENED_TAGS_COUNT['table'] > 0) {
						if ($this->_OPENED_TAGS_COUNT['tr'] > 0) {
							if (!isset($this->_OPENED_TAGS_COUNT['th'])) {
								$this->_OPENED_TAGS_COUNT['th'] = 1;
								} else {
								$this->_OPENED_TAGS_COUNT['th']++;
								}
						
							$str = preg_replace('/\['.$_TAG.'\]/','<th>',$str,1);
							} else {
							$str = preg_replace('/\['.$_TAG.'\]/','_VAL_TH_OPEN_TAG',$str,1);
							}
						} else {
						$str = preg_replace('/\['.$_TAG.'\]/','_VAL_TH_OPEN_TAG',$str,1);
						}
					}
				if ($_TAG === '/th' || $_TAG === '/TH') {
					if ($this->_OPENED_TAGS_COUNT['table'] > 0) {
						if ($this->_OPENED_TAGS_COUNT['tr'] > 0) {
							if ($this->_OPENED_TAGS_COUNT['th'] > 0) {
								$this->_OPENED_TAGS_COUNT['th']--;
								$str = preg_replace('/\['.validate_reg($_TAG).'\]/','</th>',$str,1);
								} else {
								$str = preg_replace('/\['.validate_reg($_TAG).'\]/','_VAL_TH_CLOSE_TAG',$str,1);
								}
							} else {
							$str = preg_replace('/\['.validate_reg($_TAG).'\]/','_VAL_TH_CLOSE_TAG',$str,1);
							}
						} else {
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','_VAL_TH_CLOSE_TAG',$str,1);
						}
					}
				if ($_TAG === 'td' || $_TAG === 'TD') {
					if ($this->_OPENED_TAGS_COUNT['table'] > 0) {
						if ($this->_OPENED_TAGS_COUNT['tr'] > 0) {
							if (!isset($this->_OPENED_TAGS_COUNT['td'])) {
								$this->_OPENED_TAGS_COUNT['td'] = 1;
								} else {
								$this->_OPENED_TAGS_COUNT['td']++;
								}
						
							$str = preg_replace('/\['.$_TAG.'\]/','<td>',$str,1);
							} else {
							$str = preg_replace('/\['.$_TAG.'\]/','_VAL_TD_OPEN_TAG',$str,1);
							}
						} else {
						$str = preg_replace('/\['.$_TAG.'\]/','_VAL_TD_OPEN_TAG',$str,1);
						}
					}
				if ($_TAG === '/td' || $_TAG === '/TD') {
					if ($this->_OPENED_TAGS_COUNT['table'] > 0) {
						if ($this->_OPENED_TAGS_COUNT['tr'] > 0) {
							if ($this->_OPENED_TAGS_COUNT['td'] > 0) {
								$this->_OPENED_TAGS_COUNT['td']--;
								$str = preg_replace('/\['.validate_reg($_TAG).'\]/','</td>',$str,1);
								} else {
								$str = preg_replace('/\['.validate_reg($_TAG).'\]/','_VAL_TD_CLOSE_TAG',$str,1);
								}
							} else {
							$str = preg_replace('/\['.validate_reg($_TAG).'\]/','_VAL_TD_CLOSE_TAG',$str,1);
							}
						} else {
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','_VAL_TD_CLOSE_TAG',$str,1);
						}
					}
					
				/*Wywal wszystkie specjalne tagi znajduj¹ce siê w otwartym specjalnym tagu*/
				/*if TAG (player|coord|ally|report_display) in TAG (player|coord|ally|report_display) TAG COMPILATION = ''*/
				
				if ($_TAG === 'player' || $_TAG === 'PLAYER') {
					if ($this->_OPENED_TAGS_COUNT['player'] > 0 || $this->_OPENED_TAGS_COUNT['coord'] > 0 || 
					$this->_OPENED_TAGS_COUNT['ally'] > 0 || $this->_OPENED_TAGS_COUNT['report_display'] > 0) {
						$str = preg_replace('/\['.$_TAG.'\]/','',$str,1);
						} else {
						if (!isset($this->_OPENED_TAGS_COUNT['player'])) {
							$this->_OPENED_TAGS_COUNT['player'] = 1;
							} else {
							$this->_OPENED_TAGS_COUNT['player']++;
							}
							
						$str = preg_replace('/\['.$_TAG.'\]/','_PLAYER_S',$str,1);
						}
					}
					
				if ($_TAG === '/player' || $_TAG === '/PLAYER') {
					if ($this->_OPENED_TAGS_COUNT['player'] > 0) {
						$this->_OPENED_TAGS_COUNT['player'] = 0;
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','_PLAYER_E',$str,1);
						} else {
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','',$str,1);
						}
					}
				if ($_TAG === 'coord' || $_TAG === 'COORD') {
					if ($this->_OPENED_TAGS_COUNT['player'] > 0 || $this->_OPENED_TAGS_COUNT['coord'] > 0 || 
					$this->_OPENED_TAGS_COUNT['ally'] > 0 || $this->_OPENED_TAGS_COUNT['report_display'] > 0) {
						$str = preg_replace('/\['.$_TAG.'\]/','',$str,1);
						} else {
						if (!isset($this->_OPENED_TAGS_COUNT['coord'])) {
							$this->_OPENED_TAGS_COUNT['coord'] = 1;
							} else {
							$this->_OPENED_TAGS_COUNT['coord']++;
							}
							
						$str = preg_replace('/\['.$_TAG.'\]/','_COORD_S',$str,1);
						}
					}
					
				if ($_TAG === '/coord' || $_TAG === '/COORD') {
					if ($this->_OPENED_TAGS_COUNT['coord'] > 0) {
						$this->_OPENED_TAGS_COUNT['coord'] = 0;
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','_COORD_E',$str,1);
						} else {
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','',$str,1);
						}
					}
					
				if ($_TAG === 'ally' || $_TAG === 'ALLY') {
					if ($this->_OPENED_TAGS_COUNT['player'] > 0 || $this->_OPENED_TAGS_COUNT['coord'] > 0 || 
					$this->_OPENED_TAGS_COUNT['ally'] > 0 || $this->_OPENED_TAGS_COUNT['report_display'] > 0) {
						$str = preg_replace('/\['.$_TAG.'\]/','',$str,1);
						} else {
						if (!isset($this->_OPENED_TAGS_COUNT['ally'])) {
							$this->_OPENED_TAGS_COUNT['ally'] = 1;
							} else {
							$this->_OPENED_TAGS_COUNT['ally']++;
							}
							
						$str = preg_replace('/\['.$_TAG.'\]/','_ALLY_S',$str,1);
						}
					}
					
				if ($_TAG === '/ally' || $_TAG === '/ALLY') {
					if ($this->_OPENED_TAGS_COUNT['ally'] > 0) {
						$this->_OPENED_TAGS_COUNT['ally'] = 0;
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','_ALLY_E',$str,1);
						} else {
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','',$str,1);
						}
					}
					
				if ($_TAG === 'report_display' || $_TAG === 'REPORT_DISPLAY') {
					if ($this->_OPENED_TAGS_COUNT['player'] > 0 || $this->_OPENED_TAGS_COUNT['coord'] > 0 || 
					$this->_OPENED_TAGS_COUNT['ally'] > 0 || $this->_OPENED_TAGS_COUNT['report_display'] > 0) {
						$str = preg_replace('/\['.$_TAG.'\]/','',$str,1);
						} else {
						if (!isset($this->_OPENED_TAGS_COUNT['report_display'])) {
							$this->_OPENED_TAGS_COUNT['report_display'] = 1;
							} else {
							$this->_OPENED_TAGS_COUNT['report_display']++;
							}
							
						$str = preg_replace('/\['.$_TAG.'\]/','_REPORT_DISPLAY_S',$str,1);
						}
					}
					
				if ($_TAG === '/report_display' || $_TAG === '/REPORT_DISPLAY') {
					if ($this->_OPENED_TAGS_COUNT['report_display'] > 0) {
						$this->_OPENED_TAGS_COUNT['report_display'] = 0;
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','_REPORT_DISPLAY_E',$str,1);
						} else {
						$str = preg_replace('/\['.validate_reg($_TAG).'\]/','',$str,1);
						}
					}
				}
				
			//PrzejdŸ do kolejnego procesu kompilacji bb-codes:
		
			$_ARRAY_REPLACES_BLOCKS = array(
				'_VAL_B_TAG' => '[/b]' , '_VAL_I_TAG' => '[/i]' , '_VAL_U_TAG' => '[/u]' ,
				'_VAL_S_TAG' => '[/s]' , '_VAL_COLOR_TAG' => '[/color]' , '_VAL_SIZE_TAG' => '[/size]' ,
				'_VAL_IMG_TAG' => '[/img]' , '_VAL_URL_TAG' => '[/url]' , '_VAL_QUOTE_TAG' => '[/quote]' ,
				'_VAL_SPOILER_TAG' => '[/spoiler]' , '_VAL_BUILDING_TAG' => '[/building]' , '_VAL_UNIT_TAG' => '[/unit]' ,
				'_VAL_TABLE_TAG' => '[/table]' , '_VAL_TR_OPEN_TAG' => '[tr]' , '_VAL_TR_CLOSE_TAG' => '[/tr]' ,
				'_VAL_TH_OPEN_TAG' => '[th]' , '_VAL_TH_CLOSE_TAG' => '[/th]' , '_VAL_TD_OPEN_TAG' => '[td]' ,
				'_VAL_TD_CLOSE_TAG' => '[/td]' , '_PLAYER_S' => '[player]' , '_PLAYER_E' => '[/player]' ,
				'_COORD_S' => '[coord]' , '_COORD_E' => '[/coord]' , '_ALLY_S' => '[ally]' ,
				'_ALLY_E' => '[/ally]' , '_REPORT_DISPLAY_S' => '[report_display]' , '_REPORT_DISPLAY_E' => '[/report_display]' ,
				);
				
			foreach ($_ARRAY_REPLACES_BLOCKS as $_BLOCK_KEY => $R_VALUE) {
				$str = str_replace($_BLOCK_KEY,$R_VALUE,$str);
				}
				
			//Przedostatni etap kompilacji bb-codes : kompilacja specjalnych tagów sql:
			
			//Kompilacja linków do gracza:
			$users_links_array = $this->get_array_bb_tag('player','PLAYER',$str);
		
			$str = str_replace('[/PLAYER]','[/player]',$str);
			$str = str_replace('[PLAYER]','[player]',$str);
		
			if (count($users_links_array) > 0) {
				foreach ($users_links_array as $username) {
					$userid = sql("SELECT `id` FROM `users` WHERE `username` = '".parse($username)."'",'array');
				
					if (empty($userid)) {
						$str = preg_replace('/'.validate_reg('[player]'.$username.'[/player]').'/',$username,$str,1);
						} else {
						$str = preg_replace('/'.validate_reg('[player]'.$username.'[/player]').'/','<a href="game.php?village=[aktuvillage]&screen=info_player&id='.$userid.'"/>'.$username.'</a>',$str,1);
						}
					}
				}
			
			//Kompilacja linków do wiosek:
			$villages_links_array = $this->get_array_bb_tag('coord','COORD',$str);
		
			$str = str_replace('[/COORD]','[/coord]',$str);
			$str = str_replace('[COORD]','[coord]',$str);
		
			if (count($villages_links_array) > 0) {
				foreach ($villages_links_array as $villagecoords) {
					$coords = explode('|',$villagecoords);
					$coords[0] = (int)$coords[0];
					$coords[1] = (int)$coords[1];
					$villageid = sql("SELECT `id` FROM `villages` WHERE `x` = '".$coords[0]."' AND `y` = '".$coords[1]."'",'array');
				
					if (empty($villageid)) {
						$str = preg_replace('/'.validate_reg('[coord]'.$villagecoords.'[/coord]').'/',$coords[0].'|'.$coords[1],$str,1);
						} else {
						$str = preg_replace('/'.validate_reg('[coord]'.$villagecoords.'[/coord]').'/','<a href="game.php?village=[aktuvillage]&screen=info_village&id='.$villageid.'"/>'.$coords[0].'|'.$coords[1].'</a>',$str,1);
						}
					}
				}
			
			//Kompilacja linków do plemienia:
			$ally_links_array = $this->get_array_bb_tag('ally','ALLY',$str);
		
			$str = str_replace('[/ALLY]','[/ally]',$str);
			$str = str_replace('[ALLY]','[ally]',$str);
		
			if (count($ally_links_array) > 0) {
				foreach ($ally_links_array as $allyshort) {
					$allyid = sql("SELECT `id` FROM `ally` WHERE `short` = '".parse($allyshort)."'",'array');
				
					if (empty($allyid)) {
						$str = preg_replace('/'.validate_reg('[ally]'.$allyshort.'[/ally]').'/',$allyshort,$str,1);
						} else {
						$str = preg_replace('/'.validate_reg('[ally]'.$allyshort.'[/ally]').'/','<a href="game.php?village=[aktuvillage]&screen=info_ally&id='.$allyid.'"/>'.$allyshort.'</a>',$str,1);
						}
					}
				}
				
			//Kompilacja tagu [report_display](.*?)[/report_display]
			$reports_id_array = $this->get_array_bb_tag('report_display','REPORT_DISPLAY',$str);
		
			$str = str_replace('[/REPORT_DISPLAY]','[/report_display]',$str);
			$str = str_replace('[REPORT_DISPLAY]','[report_display]',$str);
		
			if (count($reports_id_array) > 0) {
				$report_counter = 0;
			
				foreach ($reports_id_array as $based_report_id) {
					$report_counter++;
					if ($report_counter > 10) {
						$str = preg_replace('/'.validate_reg('[report_display]'.$based_report_id.'[/report_display]').'/','<b>Uwaga:</b> Maksymalnie mo¿na prasowaæ 10 raportów!<br>',$str,1);
						} else {
						$report_id = @base64_decode($based_report_id);
						$report_id = (int)$report_id;
						
						$report_count = sql("SELECT COUNT(id) FROM `reports` WHERE `id` = '$report_id' AND `receiver_userid` = '$aktu_user' AND `type` = 'attack'",'array');
						if ($report_count > 0) {
							$str = preg_replace('/'.validate_reg('[report_display]'.$based_report_id.'[/report_display]').'/',$this->get_report_contents($report_id,$aktu_user),$str,1);
							} else {
							$str = preg_replace('/'.validate_reg('[report_display]'.$based_report_id.'[/report_display]').'/','Nie mo¿na odnaleŸæ raportu!<br>',$str,1);
							}
						}
					}
				}
				
			//Ostatni etap kompilacji bb-codes : zamykanie tagów, które nie zosta³y zamkniête:
			$_TAGS_BB_HTML = array (
				'b' => '</b>' , 'i' => '</i>' , 'u' => '</u>' , 's' => '</s>' , 'color' => '</span>' ,
				'size' => '</span>' , 'img' => '" alt="" title=""/>' ,
				'url' => '" rel="nofollow" title="$1"> zewnêtrzny odnoœnik </a>' , 
				'quote' => '</td></tr></tbody></table>' , 'spoiler' => '</span></div></div>' ,
				'building' => '.png" alt="" title=""/>' , 'unit' => '.png" alt="" title=""/>' , 
				'table' => '</table>' , 'tr' => '</tr>' , 'th' => '</th>' , 'td' => '</td>'
				);
				
			$this->_OPENED_TAGS_COUNT = array_reverse($this->_OPENED_TAGS_COUNT);
				
			foreach ($this->_OPENED_TAGS_COUNT as $_TAG => $_COUNTS_UNCLOSED) {
				if ($_COUNTS_UNCLOSED > 0) {
					for ($i = 1; $i <= $_COUNTS_UNCLOSED; $i++) {
						$str .= $_TAGS_BB_HTML[$_TAG];
						}
					}
				}
			}
			
		if (count($_BB_TAGS[1]) >= 500) {
			$str = 'Liczba nawiasów kwadratowych "<b>[</b>" i "<b>]</b>" nie mo¿e przekraczaæ 1000';
			}
		
		//Zatrzymaæ licznik
		$this->end();
		
		//Zamieñ znaczniki \n na <br>
		$str = nl2br(trim($str));
		
		//Zwróæ przeprasowany bb-string:
		return $str;
		}
		
	function load_bb($str,$atuvillage) {
		$str = str_replace('[aktuvillage]',$atuvillage,$str);
		
		return $str;
		}
		
	function get_report_contents($id,$aktuuser) {
		global $pala_bonus;
		
		$raport = sql("SELECT title,title_image,time,a_units,b_units,c_units,d_units,e_units,f_units,agreement,ram,catapult,message,to_user,from_user,to_village,from_village,luck,moral,wins,hives,see_def_units,sorowce_poz,budynki,att_pala_item,def_pala_item,att_pala_name,def_pala_name,bonus_noc,pala_find_item,allyname FROM `reports` WHERE `id` = '$id'",'assoc');
		$raport['from_username'] = entparse(sql("SELECT `username` FROM `users` WHERE `id` = '".$raport['from_user']."'",'array'));
		if ($raport['to_user'] != "-1") {
			$raport['to_username'] = entparse(sql("SELECT `username` FROM `users` WHERE `id` = '".$raport['to_user']."'",'array'));
			}
		$raport['from_village_info'] = sql("SELECT name,x,y FROM `villages` WHERE `id` = '".$raport['from_village']."'",'assoc');
		$raport['to_village_info'] = sql("SELECT name,x,y FROM `villages` WHERE `id` = '".$raport['to_village']."'",'assoc');
		
		$raport['a_units'] = explode(';',$raport['a_units']);
		$raport['b_units'] = explode(';',$raport['b_units']);
		$raport['c_units'] = explode(';',$raport['c_units']);
		$raport['d_units'] = explode(';',$raport['d_units']);
		$raport['e_units'] = explode(';',$raport['e_units']);
		$raport['f_units'] = explode(';',$raport['f_units']);
		
		$raport['agreement'] = explode(';',$raport['agreement']);
		$raport['ram'] = explode(';',$raport['ram']);
		$raport['catapult'] = explode(';',$raport['catapult']);
		
		$raport['hives'] = explode(';',$raport['hives']);
		
		if (count($raport['f_units']) > 1) {
			$def_out_units_see = true;
			} else {
			$def_out_units_see = false;
			}
			

		$raport['sorowce_poz'] = explode(';',$raport['sorowce_poz']);
		if (array_sum($raport['sorowce_poz']) > 0) {
			$def_out_res_see = true;
			} else {
			$def_out_res_see = false;
			}
	
		$raport['budynki'] = explode(';',$raport['budynki']);
		$raport['att_pala_name'] = entparse($raport['att_pala_name']);
		$raport['def_pala_name'] = entparse($raport['def_pala_name']);
		
		$i = 0;
		foreach ($this->objects['cl_units']->get_array("dbname") as $dbname) {
			if ($dbname == 'unit_paladin') $pala_id = $i;
			if ($dbname == 'unit_spy') $spy_id = $i;
			$i++;
			}
		$i = 0;
		
		$report_content .= '<table width="450"><tr><td><table class="vis"><tr>';
		$report_content .= '<th width="140">Tytu³</th><th width="400"><img src="'.$raport['title_image'].'"/>&nbsp;';
		$report_content .= entparse($raport['title']).'</th></tr><tr><td>Data</td><td>'.$this->objects['pl']->format_date($raport['time']);
		$report_content .= '</td></tr><tr><td colspan="2" valign="top" height="160" style="border: solid 1px black; padding: 4px;">';
			
		if ($raport['wins'] == 'att') {
			$report_content .= '<h3>Agresor zwyciê¿y³</h3>';
			} else {
			$report_content .= '<h3>Obroñca zwyciê¿y³</h3>';
			}
			
		if (!empty($raport['allyname'])) {
			$report_content .= '<div class="report_image '.$raport['allyname'].'"><div class="report_transparent_overlay">';
			}

		$report_content .= '<h4>Szczêœcie (z punktu widzenia agresora)</h4><table id="attack_luck">';
		
		if ($raport['luck'] < 0) {
			$report_content .= '<tr><td class="nobg" style="padding: 0pt;"><b>'.$raport['luck'].'%</b></td><td class="nobg"><img src="/ds_graphic/rabe.png?1" alt="Pech"></td><td class="nobg"><table class="luck" cellpadding="0" cellspacing="0"><tbody><tr><td class="luck-item nobg" height="12" width="'.round(50 - ('-1' * ($raport['luck'] * 2))).'"></td><td class="luck-item nobg" style="border-right: 1px solid rgb(0, 0, 0); background-image: url(/ds_graphic/balken_pech.png?1);" width="'.round('-1' * ($raport['luck'] * 2)).'"></td><td class="luck-item nobg" width="50"></td></tr></tbody></table></td><td class="nobg"><img src="/ds_graphic/klee_grau.png?1" alt="Szczêœcie"></td></tr>';
			} else {
			$report_content .= '<tr><td class="nobg" style="padding: 0pt;"></td><td class="nobg"><img src="/ds_graphic/rabe_grau.png?1" alt="Pech"></td><td class="nobg"><table class="luck" cellpadding="0" cellspacing="0"><tbody><tr><td class="luck-item nobg" height="12" width="50"></td><td class="luck-item nobg" style="border-left: 1px solid rgb(0, 0, 0); background-image: url(/ds_graphic/balken_glueck.png?1);" width="'.round($raport['luck'] * 2).'"></td><td class="luck-item nobg" width="'.round(50 - ($raport['luck'] * 2)).'"></td></tr></tbody></table></td><td class="nobg"><img src="/ds_graphic/klee.png?1" alt="Szczêœcie"></td><td class="nobg"><b>'.$raport['luck'].'%</b></td></tr></table>';
			}
			
		if (!empty($raport['allyname'])) {
			$report_content .= '<h4>Morale: '.floor($raport['moral']).'%</h4>';
			} else {
			$report_content .= '<table><tr><td><h4>Morale: '.floor($raport['moral']).'%</h4></td></tr></table><br />';
			}
		
		if ($raport['bonus_noc'] == 1) {
			if (!empty($raport['allyname'])) {
				$report_content .= '<h4>100% Nocny bonus dla obrony jest aktywny.</h4>';
				} else {
				$report_content .= '<table><tr><td><h4>100% Nocny bonus dla obrony jest aktywny.</h4></td></tr></table><br />';
				}
			}

		if (!empty($raport['allyname'])) {
			$report_content .= '</div></div>';
			}
			
		$report_content .= '<table width="100%" style="border: 1px solid #DED3B9"><tr><th width="100">Agresor:</th><th>';
		if (!empty($raport['from_username'])) $report_content .= '<a href="game.php?village=[aktuvillage]&amp;screen=info_player&amp;id='.$raport['from_user'].'">'.$raport['from_username'].'</a>';
		$report_content .= '</th></tr><tr><td>Pochodzenie:</td><td><a href="game.php?village=[aktuvillage]&amp;screen=info_village&amp;id='.$raport['from_village'].'">'.entparse($raport['from_village_info']['name']).' ('.$raport['from_village_info']['x'].'|'.$raport['from_village_info']['y'].')</a></td></tr>';

		$report_content .= '<tr><td colspan="2"><table class="vis"><tr class="center"><td></td>';
		
		foreach ($this->objects['cl_units']->get_array("dbname") as $name => $dbname) $report_content .= '<td width="35"><img src="/ds_graphic/unit/'.$dbname.'.png" title="'.$name.'" alt="" /></td>';
		
		$report_content .= '</tr><tr class="center"><td>Iloœæ:</td>';
		
		foreach ($raport['a_units'] as $num_units) {
			if ($num_units > 0) {
				$report_content .= '<td>'.$num_units.'</td>';
				} else {
				$report_content .= '<td class="hidden">0</td>';
				}
			}
		
		$report_content .= '</tr><tr class="center"><td>Straty:</td>';
			
		foreach ($raport['b_units'] as $num_units) {
			if ($num_units > 0) {
				$report_content .= '<td>'.$num_units.'</td>';
				} else {
				$report_content .= '<td class="hidden">0</td>';
				}
			}
	
		$report_content .= '</tr>';
		
		if ($raport['a_units'][$pala_id] > 0) {
			$report_content .= '<tr class="center"><td>Rycerz:</td><td colspan="'.count($this->objects['cl_units']->get_array("dbname")).'">';
			if ($raport['a_units'][$pala_id] == $raport['b_units'][$pala_id]) {
				if ($aktuuser == $raport['from_user']) {
					$report_content .= 'Twój rycerz zgin¹.';
					} else {
					$report_content .= 'Rycerz zosta³ zabity.';
					}
				} else {
				$report_content .= 'Rycerz o imieniu '.$raport['att_pala_name'].' ,';
				if (!empty($raport['att_pala_item'])) {
					$report_content .= 'wyposa¿ony w '.$pala_bonus[$raport['att_pala_item']][2];
					} else {
					$report_content .= 'bez przedmiotu.';
					}
				}
			$report_content .= '</td></tr>';
			}
			
		$report_content .= '</table></td></tr></table><br />';
		

		$report_content .= '<table width="100%" style="border: 1px solid #DED3B9"><tr><th width="100">Obroñca:</th><th>';
		if (!empty($raport['to_username'])) $report_content .= '<a href="game.php?village=[aktuvillage]&amp;screen=info_player&amp;id='.$raport['to_user'].'">'.$raport['to_username'].'</a></th></tr>';
		$report_content .= '<tr><td>cel:</td><td><a href="game.php?village=[aktuvillage]&amp;screen=info_village&amp;id='.$raport['to_village'].'">'.entparse($raport['to_village_info']['name']).' ('.$raport['to_village_info']['x'].'|'.$raport['to_village_info']['y'].')</a></td></tr><tr><td colspan="2">';
		
		if ($raport['to_user'] == $aktuuser || $raport['wins'] == 'att' || ($raport['a_units'][$spy_id] - $raport['b_units'][$spy_id]) > 0) {
			$report_content .= '<table class="vis"><tr class="center"><td></td>';
			foreach ($this->objects['cl_units']->get_array("dbname") as $name => $dbname) $report_content .= '<td width="35"><img src="/ds_graphic/unit/'.$dbname.'.png" title="'.$name.'" alt="" /></td>';
		
			$report_content .= '</tr><tr class="center"><td>Iloœæ:</td>';
			
			foreach ($raport['c_units'] as $num_units) {
				if ($num_units > 0) {
					$report_content .= '<td>'.$num_units.'</td>';
					} else {
					$report_content .= '<td class="hidden">0</td>';
					}
				}
		
			$report_content .= '</tr><tr class="center"><td>Straty:</td>';
			
			foreach ($raport['d_units'] as $num_units) {
				if ($num_units > 0) {
					$report_content .= '<td>'.$num_units.'</td>';
					} else {
					$report_content .= '<td class="hidden">0</td>';
					}
				}
			
			$report_content .= '</tr>';

			if ($raport['c_units'][$pala_id] > 0) {
				$report_content .= '<tr class="center"><td>Rycerz:</td><td colspan="'.count($this->objects['cl_units']->get_array("dbname")).'">';
				if ($raport['c_units'][$pala_id] == $raport['d_units'][$pala_id]) {
					if ($raport['to_user'] == $aktuuser) {
						$report_content .= 'Twój rycerz zgin¹.';
						} else {
						$report_content .= 'Rycerz zosta³ zabity.';
						}
					} else {
					$report_content .= 'Rycerz o imieniu '.$raport['def_pala_name'].' ,';
					if (!empty($raport['def_pala_item'])) {
						$report_content .= 'wyposa¿ony w '.$pala_bonus[$raport['def_pala_item']][2];
						} else {
						$report_content .= 'bez przedmiotu.';
						}
					}
				$report_content .= '</td></tr>';
				}	
			$report_content .= '</table>';
			} else {
			$report_content .= '<p>Wszyscy twoi ¿o³nierze polegli, nie uzyskano ¿adnych informacji o wojskach przeciwnika</p>';
			}

		$report_content .= '</td></tr></table><br />';

		if ($def_out_units_see || count($raport['budynki']) > 1 || $def_out_res_see) {
			$report_content .= '<h4>Szpiegostwo</h4>';
	
			$report_content .= '<table id="attack_spy" style="border: 1px solid rgb(222, 211, 185); padding: 0px 0px 0px 0px;">';
			if ($def_out_res_see) {
				$report_content .= '<tr><th>Wyszpiegowane surowce:</th><td>';
				
					if ($raport['sorowce_poz']['0'] > 0) $report_content .= '<img src="/ds_graphic/wood.png" title="Drewno" alt="" />'.$raport['sorowce_poz']['0'].' ';
					if ($raport['sorowce_poz']['1'] > 0) $report_content .= '<img src="/ds_graphic/stone.png" title="Ceg³y" alt="" />'.$raport['sorowce_poz']['1'].' ';
					if ($raport['sorowce_poz']['2'] > 0) $report_content .= '<img src="/ds_graphic/iron.png" title="¯elazo" alt="" />'.$raport['sorowce_poz']['2'].' ';
				$report_content .= '</td></tr>';
				}
				
			if (count($raport['budynki']) > 1) {
				$report_content .= '<tr><th>Budynki:</th><td>';
				
				$i = 0;
				
				foreach ($this->objects['cl_builds']->get_array("dbname") as $name => $dbname) {
					if ($raport['budynki'][$i] > 0) $report_content .= $this->objects['cl_builds']->get_name($dbname) . ' <b>(Stopieñ '.$raport['budynki'][$i].')</b><br>';
					$i++;
					}
					
				$i = 0;
				
				$report_content .= '</td></tr>';
				}
				
			if ($def_out_units_see) {
				$report_content .= '<tr><th colspan="2">Jednostki poza wiosk¹:</th></tr><tr><td colspan="2"/><table class="vis"><tr>';
				foreach ($this->objects['cl_units']->get_array("dbname") as $name => $dbname) $report_content .= '<th width="35"><img src="/ds_graphic/unit/'.$dbname.'.png" title="'.$name.'" alt="" /></td>';
		
				$report_content .= '</tr><tr>';
			
				foreach ($raport['f_units'] as $num_units) {
					if ($num_units > 0) {
						$report_content .= '<td>'.$num_units.'</td>';
						} else {
						$report_content .= '<td class="hidden">0</td>';
						}
					}
				
				$report_content .= '</tr></table></td></tr>';
				}
			
			$report_content .= '</table><br>';
			}

	
		$report_content .= '<table width="100%" style="border: 1px solid #DED3B9">';
		if (count($raport['e_units']) > 1) {
			$report_content .= '<h4>Wojska, które by³y po za wiosk¹</h4><table><tr>';
			foreach ($this->objects['cl_units']->get_array("dbname") as $name => $dbname) $report_content .= '<th width="35"><img src="/ds_graphic/unit/'.$dbname.'.png" title="'.$name.'" alt="" /></td>';
			$report_content .= '</tr><tr>';
			foreach ($raport['e_units'] as $num_units) {
				if ($num_units > 0) {
					$report_content .= '<td>'.$num_units.'</td>';
					} else {
					$report_content .= '<td class="hidden">0</td>';
					}
				}
			$report_content .= '</tr></table><br>';
			}

		$report_content .= '<table width="100%" style="border: 1px solid #DED3B9">';
		
		if ($raport['hives']['0'] > 0 || $raport['hives']['1'] > 0 || $raport['hives']['2'] > 0) {
			$report_content .= '<tr><th>£upy:</th><td width="220">';
			
			if ($raport['hives']['0'] > 0) {
				$report_content .= '<img src="/ds_graphic/wood.png" title="Drewno" alt="" />'.$raport['hives']['0'].' ';
				}
			if ($raport['hives']['1'] > 0) {
				$report_content .= '<img src="/ds_graphic/stone.png" title="Ceg³y" alt="" />'.$raport['hives']['1'].' ';
				}
			if ($raport['hives']['2'] > 0) {
				$report_content .= '<img src="/ds_graphic/iron.png" title="¯elazo" alt="" />'.$raport['hives']['2'].' ';
				}
			$report_content .= '</td><td>'.$raport['hives']['3'].'/'.$raport['hives']['4'].'</td></tr>';
			}
		
		if ($raport['to_user'] == $aktuuser && $def_out_units_see) {
			$report_content .= '<tr><th>Uwaga:</th><td>Twoje wojska zosta³y wykryte przez wroga.</td></tr>';
			}
		if (!empty($raport['pala_find_item'])) {
			$report_content .= '<tr><th>Ryczerz:</th><td>Twój rycerz znalaz³ przedmiot - '.$pala_bonus[$raport['pala_find_item']][2].'.</td></tr>';
			}
		if ($raport['ram'][0] != $raport['ram'][1]) {
			$report_content .= '<tr><th>Uszkodzenia zadane przez tarany:</th><td colspan="2">Mur zniszczono z Poziomu <b>'.$raport['ram'][0].'</b> na Poziom <b>'.$raport['ram'][1].'</b></td></tr>';
			}
		if ($raport['agreement'][0] != $raport['agreement'][1]) {
			$report_content .= '<tr><th>Poparcie:</th><td colspan="2">Spad³o z <b>'.$raport['agreement'][0].'</b> na <b>'.$raport['agreement'][1].'</b></td></tr>';
			}
		if ($raport['catapult'][0] != $raport['catapult'][1]) {
			$report_content .= '<tr><th>Uszkodzenia zadane przez katapulty:</th><td colspan="2">'.$this->objects['cl_builds']->get_name($raport['catapult'][2]).' zniszczono z Poziomu <b>'.$raport['catapult'][0].'</b> na Poziom <b>'.$raport['catapult'][1].'</b></td></tr>';
			}

		$report_content .= '</table></td></tr></table></td></tr></table>';
		
		return $report_content;
		}
		
	function get_array_bb_tag($tinytag,$bigtag,$str) {
		$reg = '~\[(?:'.$tinytag.'|'.$bigtag.')\](.*?)\[\/(?:'.$tinytag.'|'.$bigtag.')\]~s';
		$if_compiled = preg_match_all($reg,$str,$effect);
	
		if ($if_compiled) {
			$return = $effect[1];
			} else {
			$return = array();
			}
		
		return $return;
		}
		
	function create_bb_RegExp($tinytag,$bigtag) {
		$reg = '~\[(?:'.$tinytag.'|'.$bigtag.')\](.*?)\[\/(?:'.$tinytag.'|'.$bigtag.')\]~s';
		return $reg;
		}
	}
?>