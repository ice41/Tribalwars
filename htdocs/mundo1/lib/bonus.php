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

$bonus->add_bonus('1','0.5','%s% Capacidade adicional de fazenda e mercado','storage.png','storage_mini.png');
$bonus->add_bonus('2','0.3','%s% maior produção de Recursos (todos os recursos)','all.png','all_mini.png');
$bonus->add_bonus('3','1','%s% maior produção de madeira','wood.png','wood_mini.png');
$bonus->add_bonus('4','1','%s% maior produção de argila','stone.png','stone_mini.png');
$bonus->add_bonus('5','1','%s% maior produção de ferro','iron.png','iron_mini.png');
$bonus->add_bonus('6','0.33','%s% Treinamento mais rápido em quartéis','barracks.png','barracks_mini.png');
$bonus->add_bonus('7','0.33','%s% Treinamento mais rápido em estábulos','stable.png','stable_mini.png');
$bonus->add_bonus('8','0.5','%s% produção mais rápida no Oficina','garage.png','garage_mini.png');
$bonus->add_bonus('9','0.1','%s% de espaço na fazenda','farm.png','farm_mini.png');
?>