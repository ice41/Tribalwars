<?
/*****************************************/
/*=======================================*/
/*     PLIK: pl.php   		 			 */
/*     DATA: 2.12.2011r        		 	 */
/*     ROLA: plik spolszczaj¹cy plemiona */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

class pl {
    function pl_text($text) {
	    $co = array('Angriff auf','Rückkehr von','Unterstützung für','Angriff von','Angriff','Unterstützung','Rückzug von');
		$na = array('Atak na','Powrót z','Pomoc do','Atak z','Atak','Pomoc','Wycofane z');
	    $out = str_replace($co,$na,$text);
		return $out;
	    }
		
	function format_date($date) {
	    $date = format_date($date);
		$co = array('heute um','Uhr','morgen um','am','um');
		$na = array('dzisiaj o','','Jutro o','w','o');
	    $date = str_replace($co,$na,$date);
		return $date;
	    }
		
	function pl_date($date) {
		$co = array('heute um','Uhr','morgen um','am','um');
		$na = array('dzisiaj o','','Jutro o','w','o');
	    $date = str_replace($co,$na,$date);
		return $date;
	    }
		
	function del_znak($znak,$string) {
	    $out = str_replace($znak,'',$string);
		return $out;
		}
		
	function compile_report_title($title) {
		$co = array(' an',' hat dich in den Stamm ',' eingeladen',' hat dein Angebotgenommen','Angebot von kibelgenommen',' beliefert ',' hat deinen Stamm aufgelÃ¶st');
		$na = array('',' zaprasza do plemienia ','',' przyj¹ twoj¹ ofertê','Przyjêto ofertê',' dostarcza surowce dla ',' rozwi¹za³ twoje plemiê');
		$pl_title = str_replace($co,$na,$title);
		return $pl_title;
		}
		
	function count($arr) {
		return count($arr);
		}
		
	function compile_ally_events($title) {
		$co = array('ist dem Stamm beigetreten.','Der Stamm wurde von','gegründet.','eingeladen.','wurde von','hat die interne Ankündigung geändert.',' entlassen.');
		$na = array('do³¹cza do plemienia.','Plemiê zosta³o za³o¿one przez','','','zosta³ zaproszony do plemienia przez','zmienia wewnêtrzne og³oszenie.','');
		$pl_title = str_replace($co,$na,$title);
		return $pl_title;
		}
    }

/*
$im = imagecreatefrompng("graphic/cgfp.png");
for ($i = 0; $i <= 555 ;$i++) {
	$a = getrandomxyforcircle(50,'OW');
	imagesetpixel($im,$a[0] - 400,$a[1] - 400,111);
	}
imagepng($im, 'graphic/cgfp2.png', 100);
imagedestroy($im);
*/

?>