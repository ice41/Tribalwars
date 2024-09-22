<?php
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
}
/*
 * Klasse starten
 */
$bh_neuberechnen = new bh_neuberechnen;
$bh_neuberechnen->construct($db, $cl_units, $cl_builds, $version);
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