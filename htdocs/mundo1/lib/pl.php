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
		$co = array(' um',' tem na tribo ',' convidamos');
		$na = array('',' convida-o para a tribo ','');
		$pl_title = str_replace($co,$na,$title);
		return $pl_title;
		}
		
	function count($arr) {
		return count($arr);
		}
		
	function compile_ally_events($title) {
		$co = array('A tribo era de','gegr�ndet.','convidamos.','era de','mudou o anúncio interno.',' incêndio.','deixou a tribo.');
		$na = array('A tribo foi fundada por','','','foi convidado para a tribo por','altera um anúncio interno.','','deixe a tribo');
		$pl_title = str_replace($co,$na,$title);
		return $pl_title;
		}
	function kill_p($title) {
		$co = array('<','"','>');
		$na = array('&lt;','&quot;','&gt;');
		$pl_title = str_replace($co,$na,$title);
		return $pl_title;
		} 
 }
?>