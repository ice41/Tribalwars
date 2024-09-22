<?php
class bonus {
	var $bonusy = null;
	
	function add_bonus($id,$modyfikator,$opis,$nazwa_grafiki,$nazwa_grafiki_mini) {
		$this->bonusy[$id]['id'] = $id;
		$this->bonusy[$id]['modifer'] = $modyfikator;
		$this->bonusy[$id]['opis'] = str_replace('%s',$modyfikator * 100,$opis);
		$this->bonusy[$id]['grafika'] = $nazwa_grafiki;
		$this->bonusy[$id]['grafika_mini'] = $nazwa_grafiki_mini;
		}
		
	function get_bonus($vid) {
		$bonus = sql("SELECT `bonus` FROM `villages` WHERE `id` = '$vid'","array");
		return $this->bonusy[$bonus]['modifer'];
		}
		
	function get_bonus_mini_image($vbonus) {
		if ($vbonus > 0) {
			$img = '<img src="graphic/bonus/'.$this->bonusy[$vbonus]['grafika_mini'].'" style="position: relative; top: 2px;" alt=""/>&nbsp;';
			} else {
			$img = '';
			}
		return $img;
		}
	}
?>