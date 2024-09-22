<?
/*****************************************/
/*=======================================*/
/*     PLIK: pl.php   		 			 */
/*     DATA: 2.12.2011r        		 	 */
/*     ROLA: plik spolszczaj�cy plemiona */
/*     AUTOR: SIR ROLAND                 */
/*=======================================*/
/*****************************************/

class pl {
    function pl_text($text) {
	    $co = array('Angriff auf','R�ckkehr von','Unterst�tzung f�r','Angriff von','Angriff','Unterst�tzung','R�ckzug von');
		$na = array('Atak na','Powr�t z','Pomoc do','Atak z','Atak','Pomoc','Wycofane z');
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
		$co = array(' an',' hat dich in den Stamm ',' eingeladen',' hat dein Angebotgenommen','Angebot von kibelgenommen',' beliefert ',' hat deinen Stamm aufgelöst');
		$na = array('',' zaprasza do plemienia ','',' przyj� twoj� ofert�','Przyj�to ofert�',' dostarcza surowce dla ',' rozwi�za� twoje plemi�');
		$pl_title = str_replace($co,$na,$title);
		return $pl_title;
		}
		
	function count($arr) {
		return count($arr);
		}
		
	function compile_ally_events($title) {
		$co = array('ist dem Stamm beigetreten.','Der Stamm wurde von','gegr�ndet.','eingeladen.','wurde von','hat die interne Ank�ndigung ge�ndert.',' entlassen.');
		$na = array('do��cza do plemienia.','Plemi� zosta�o za�o�one przez','','','zosta� zaproszony do plemienia przez','zmienia wewn�trzne og�oszenie.','');
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