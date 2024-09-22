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
			$img = '<img src="/ds_graphic/bonus/'.$this->bonusy[$vbonus]['grafika_mini'].'" style="position: relative; top: 2px;" alt=""/>&nbsp;';
			} else {
			$img = '';
			}
		return $img;
		}
	}
	
$bonus = new bonus();

$bonus->add_bonus('1','0.5','%s% wiêksza pojemnoœæ spichlerza i handlarzy','storage.png','storage_mini.png');
$bonus->add_bonus('2','0.3','%s% wiêksza produkcja surowców (wszystkie surowce)','all.png','all_mini.png');
$bonus->add_bonus('3','1','%s% wiêksza produkcja drewna','wood.png','wood_mini.png');
$bonus->add_bonus('4','1','%s% wiêksza produkcja gliny','stone.png','stone_mini.png');
$bonus->add_bonus('5','1','%s% wiêksza produkcja ¿elaza','iron.png','iron_mini.png');
$bonus->add_bonus('6','0.33','%s% szybsze szkolenie w koszarach','barracks.png','barracks_mini.png');
$bonus->add_bonus('7','0.33','%s% szybsze szkolenie w stajniach','stable.png','stable_mini.png');
$bonus->add_bonus('8','0.5','%s% szybsza produkcja w warsztacie','garage.png','garage_mini.png');
$bonus->add_bonus('9','0.1','%s% wiêcej ludnoœci','farm.png','farm_mini.png');
?>