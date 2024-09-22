<?
/*****************************************/
/*=======================================*/
/*     PLIK: bb-code.php   		 	     */
/*     DATA: 23.7.2013r          	 	 */
/*     ROLA: Plik dodatkowy BB-Code      */
/*     AUTOR: BARTEKST221                */
/*=======================================*/
/*****************************************/

class bbc {	
	function format_date($U) {
	    return format_date($U);
	    }
	
    function bbc_date($date) {
        return $date;
        }	
		
	function del_znak($znak,$string) {
	    $out = str_replace($znak,'',$string);
		return $out;
		}
		
	function compile_report_title($title) {
		$co = array(' um',' tem na tribo ',' convidamos');
		$na = array('',' convida-o para a tribo ','');
		$bbc_title = str_replace($co,$na,$title);
		return $bbc_title;
		}
		
	function count($arr) {
		return count($arr);
		}
		
	function compile_ally_events($title) {
		$co = array('A tribo era de','fundado.','convidamos.','Era de','mudou o anúncio interno.',' apagou.','Deixou a tribo.');
		$na = array('A tribo foi fundada por','','','foi convidado para a tribo por','mudou anúncio interno.','','deixou a tribo');
		$bbc_title = str_replace($co,$na,$title);
		return $bbc_title;
		}
		
	function compile_mail_text($title) {
		$co = array('[b]','[/b]','[i]','[/i]','[s]','[/s]','[spoiler]','[/spoiler]','[u]','[/u]','&lt;img src=','&gt;','[center]','[/center]');
		$na = array('<b>','</b>','<i>','</i>','<strike>','</strike>','<div class="spoiler"><input value="Spoiler" onclick="toggle_spoiler(this)" type="button"><div><span style="display: none;">','</span></div></div>','<u>','</u>','<img src="','">','<center>','</center>');
		$bbc_title = str_replace($co,$na,$title);
		return $bbc_title;
		}	
    }
?>