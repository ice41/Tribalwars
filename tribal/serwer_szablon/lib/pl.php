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
	function format_date($U) {
	    return format_date($U);
	    }
	
    function pl_date($date) {
        return $date;
        }	
		
	function del_znak($znak,$string) {
	    $out = str_replace($znak,'',$string);
		return $out;
		}
		
	function compile_report_title($title) {
		$co = array(' an',' hat dich in den Stamm ',' eingeladen');
		$na = array('',' zaprasza do plemienia ','');
		$pl_title = str_replace($co,$na,$title);
		return $pl_title;
		}
		
	function count($arr) {
		return count($arr);
		}
		
	function compile_ally_events($title) {
		$co = array('Der Stamm wurde von','gegründet.','eingeladen.','wurde von','hat die interne Ankündigung geändert.',' entlassen.','hat den Stamm verlassen.');
		$na = array('Sojusz zosta³ za³o¿ony przez','','','zosta³ zaproszony do sojuszu przez','zmienia wewnêtrzne og³oszenie.','','opuœci³ sojusz');
		$pl_title = str_replace($co,$na,$title);
		return $pl_title;
		}
    }
?>