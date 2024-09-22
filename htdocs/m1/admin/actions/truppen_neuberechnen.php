<?php
/*
 * Version
 * Thread-Url 
 */
$tpl->assign('version', $version = '0.2');
$tpl->assign('thread_url', $thread_url = 'http://dslan.gfx-dose.de/thread-1378.html');
/*
 * Klasse: truppen_neuberechnen
 */
class truppen_neuberechnen {
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
     * Truppen von einem Dorf (Zwischenspeicherung)
     */
    var $truppen;
    /*
     * Aktuelle Version
     */
    var $version;
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
     * Truppen, die in den Doerfern stehen berechnen/zaehlen
     */
    function unit_place($dorf_info) {
        $query = 'SELECT ';
        foreach ($this->units->dbname as $key => $value) {
          if (isset($a)) {
            $query .= ', ';
          }
          else {
            $a = true;
          }
          $query .= 'SUM('.$value.') AS '.$value;
        }
        $query .= ' FROM unit_place WHERE villages_from_id='.$dorf_info['id'];
        $unit_place_sql = $this->db->query($query);
        while ($row = $this->db->fetch($unit_place_sql)) {
          $this->truppen = $row;
        }
    }
    /* 
     * Truppen, die unterwegs sind
     */
    function unit_move($dorf_info) {
      /*
       * Unit-Names
       */
      foreach ($this->units->dbname as $key => $value) {
        $units[] = $value;
      }
      $anzahl_units = count($units);
      /*
       * Movements holen und verarbeiten
       */
      $query = 'SELECT * FROM movements WHERE from_village='.$dorf_info['id'];
      $unit_move_sql = $this->db->query($query);
      while ($row = $this->db->fetch($unit_move_sql)) {
        $exploded = explode(';', $row['units']);
        for ($i = 0; $i < $anzahl_units; ++$i) {
          $this->truppen[$units[$i]] += $exploded[$i];
        }
      }
    }
    /*
     * Truppen in DB schreiben
     */
    function truppen_in_db($dorf_info) {
        $dorf_id = $dorf_info['id'];
        $query = 'UPDATE villages SET ';
        foreach ($this->units->dbname as $key => $value) {
          if (isset($a)) {
            $query .= ', ';
          }
          else {
            $a = true;
          }
          $query .= 'all_'.$value.'='.$this->truppen[$value];
        }
        $query .= ' WHERE id=\''.$dorf_id.'\' LIMIT 1';
        $this->db->query($query);
    }
}
/*
 * Klasse starten
 */
$truppen_neuberechnen = new truppen_neuberechnen;
$truppen_neuberechnen->construct($db, $cl_units, $cl_builds, $version);
if (isset($_GET['start'])) {
  /*
   * Doerfer laden
   */
  $truppen_neuberechnen->doerfer_laden();
  /*
   * Schleife starten fuer alle Doerfer
   */
  for ($c = 0; $c < $truppen_neuberechnen->doerfer_anzahl; ++$c) {
    /*
     * $dorf ist das momentane Dorf
     */
    $dorf = $truppen_neuberechnen->doerfer[$c];
    /*
     * Truppen, die in den Doerfern stehen berechnen/zaehlen
     */
    $truppen_neuberechnen->unit_place($dorf);
    /*
     * Truppen, die unterwegs sind
     */
    $truppen_neuberechnen->unit_move($dorf);
    /*
     * aktualisierte Bauernhoefe in DB schreiben
     */
    $truppen_neuberechnen->truppen_in_db($dorf);
  }
  $tpl->assign('done', true);
}
?>