<?php
/*
 * Version
 * Thread-Url 
 */
$tpl->assign('version', $version = '0.2');
$tpl->assign('thread_url', $thread_url = 'http://dslan.gfx-dose.de/thread-1362.html');
/*
 * Klasse: bh_neuberechnen
 */
class bh_neuberechnen {
    /*
     * Datenbankverbindung
     */
    var $db;
    /*
     * Alle Doerfer im Array
     */
    var $doerfer;
    /*
     * Anzahl der Doerfer
     */
    var $doerfer_anzahl;
    /*
     * Alle Einheiten als Object
     */
    var $units;
    /*
     * Alle Gebaeude als Object
     */
    var $gebaeude;
    /*
     * Aktuelle Version
     */
    var $version;   
    /*
     * Hier werden die benutzten BH-Plaetze gespeichert (Truppen und Gebaeude)
     */
    var $bh = array();
    /*
     * In PHP5 waere das __construct
     */
    function construct($db, $units, $gebaeude, $version) {
        $this->db = $db;
        $this->units = $units;
        $this->gebaeude = $gebaeude;
        $this->version = $version;
    }
    /*
     * Alle Doerfer laden
     */
    function doerfer_laden() {
        $doerfer_sql = $this->db->query('SELECT * FROM `villages`');
        while($row = $this->db->fetch($doerfer_sql)) {
          	$doerfer_array[] = $row;
        }
        $this->doerfer = $doerfer_array;
        $this->doerfer_anzahl = count($doerfer_array);
    }
    /*
     * BH-Plaetze von Truppen im Dorf zaehlen
     */
    function truppen_zaehlen($dorf_info) {
        $truppen = 0;
        foreach ($this->units->bhprice as $key => $value) {
          $truppen += $dorf_info['all_'.$key] * $value;
        }
        $this->bh[$dorf_info['id']]['truppen'] = $truppen;
    }
    /*
     * BH-Plaetze von Gebaeuden zaehlen
     */
    function gebaeude_zaehlen($dorf_info) {
        $gebaeude = 0;
        foreach ($this->gebaeude->bh as $key => $value) {
          for ($z = 1; $z <= $dorf_info[$key]; ++$z) {
            $gebaeude += $this->gebaeude->get_bh($key, $z);
          }
        }
        $this->bh[$dorf_info['id']]['gebaeude'] = $gebaeude;
    }
    /*
     * Bauernhofplaetze in DB schreiben
     */     
    function bh_in_db($dorf_info) {
      $dorf_id = $dorf_info['id'];
      $bh_plaetze = $this->bh[$dorf_id]['truppen'] + $this->bh[$dorf_id]['gebaeude'].'<br />';
      $this->db->query('UPDATE villages SET r_bh=\''.$bh_plaetze.'\' WHERE id=\''.$dorf_id.'\' LIMIT 1');
    }
    /*
     * Checked nach einem Update
     */
    function check_nach_update($tool) {
        $lines = file('http://leichtathletik.kilu.de/dslan/info/'.$tool.'/version.txt');
        if (!$lines) {
          return 'no connection';
        }
        if ($lines[0] != $this->version) {
          return 'update_'.$lines[0];
        }
        return true;
    }
    /*
     * Holt Informationen
     */
    function echo_update_info($tool, $tool_name, $version, $url) {
        $info = file('http://leichtathletik.kilu.de/dslan/info/'.$tool.'/change_'.$this->version.'_'.$version.'.txt');
        if (!$info) {
          $info = array('');
        }
        $ausgabe = '<p style="color: green; text-align: center;">Ein Update f&uuml;r das Addon '.$tool_name.' (&copy; Copyright by <a href="http://dslan.gfx-dose.de/user-11.html">Philipp Ranft</a>) ist verf&uuml;gbar!<br /><a href="#" onClick="document.getElementsByName(\'infos\')[0].style.display=\'block\';">Mehr Infos/&Auml;nderungen</a></p><span name="infos" style="display: none; text-align: center;">';
        foreach ($info as $key => $value) {
          $ausgabe .= $value.'<br />';
        }
        $ausgabe .= '</span><p style="text-align: center;"><a href="'.$url.'">Download/Update-Info</a></p>';
        echo $ausgabe;
    }
}
/*
 * Klasse starten
 */
$bh_neuberechnen = new bh_neuberechnen;
$bh_neuberechnen->construct($db, $cl_units, $cl_builds, $version);
/*
 * Versions-Check
 */
$check = $bh_neuberechnen->check_nach_update('bh_neuberechnen');
if ($check !== true) {
  $version_new = explode('_', $check);
  if ($version_new[0] == 'update') {
    $bh_neuberechnen->echo_update_info('bh_neuberechnen', 'Bauernhöfe neuberechnen', $version_new[1], $thread_url);
  }
}
/*
 * Bauernhoefe neuberechnen
 */
if (isset($_GET['start'])) {
  /*
   * Doerfer laden
   */
  $bh_neuberechnen->doerfer_laden();
  /*
   * Schleife starten fuer alle Doerfer
   */
  for ($c = 0; $c < $bh_neuberechnen->doerfer_anzahl; ++$c) {
    /*
     * $dorf ist das momentane Dorf
     */
    $dorf = $bh_neuberechnen->doerfer[$c];
    /*
     * BH-Plaetze von Truppen zaehlen
     */
    $bh_neuberechnen->truppen_zaehlen($dorf);
    /*
     * BH-Plaetze von Gebaeuden zaehlen
     */
    $bh_neuberechnen->gebaeude_zaehlen($dorf);
    /*
     * aktualisierte Bauernhoefe in DB schreiben
     */
    $bh_neuberechnen->bh_in_db($dorf);
  }
  $tpl->assign('done', true);
}
?>