<?php /*This encoded file was generated using PHPCoder (http://phpcoder.sourceforge.net/) and eAccelerator (http://eaccelerator.sourceforge.net/)*/ if (!is_callable("eaccelerator_load") && !@dl("eAccelerator.so")) { die("This PHP script has been encoded using the excellent eAccelerator Optimizer, to run it you must install <a href=\"http://eaccelerator.sourceforge.net/\">eAccelerator or the eLoader</a>"); }eaccelerator_load('eJyFVt9v2zYQJiW3s2sjRgMb8hZhE2pA7pZi2N76SysU11sGZIlbOQ8bBhipxTpabSmT5LZ56XP/7PGOIkVTKOYX0qfjd8fvuw/gLJxOZ2ez1+Hi4jVpEUIoIRbBHSGfifj9aeNCbQgvf5styF+2SKX2Xb65WpVJlp5hFqXHsFrk07xx6pXI2D92H4MtSu2vIFaWV6t3hcSI7lQYvCcSv6HP4D9t8QBs/t2x/DaEXUDtMV8u5y/DxczbZOsk9aLZQuyWm2z1jsXB5JYVEwrZd0QbvNl21DYqtJsV2qLCd3yJOFnThZfEj6pOvbd5tvXeJ5vN1ZoViN6W6KRGh/vmrNhtSupDzKL8ylHHqN3Ra//KytX13x0Ftgdy0sGesJ5MsXi9TpUK/OXZB+pXJVrWMexa5CTqGkW7jQvPu4hWo7zqCuEscSqJ25hB7bOakunF5fniYcHSeFlmy4qQ770w8lbZLi0FT9vsPduytCy8D9csZ56RHrQoIlOLY3/DN154/tIrb29YMBF8T7xNsk1K7+cQ8gJLMNDVGJfXswVZ1O8qunvGzXtNunsa3RLhpFdzLb8D170qD/7n1O9JpucHJn0Hij5txkXUIlV9ZOnwQJiByyVADhGsriIOweTWh04g9hzben5Q9Qeo90CqYpnutixPVgjYIodR32Ch39S/X12gqtlX7aua7b4YALd2nfQAGq+6Iwjal4JCP5XuSRyoIoolLGNrQ4YZFm3ZNQakhH1N+r4UjLZ/uM/Xw2hg3G/QuF84QEGx+S8YelewXLh5oM2WhNbdPFDjNTQKD5vjNdTGS3fzsJ4wmQITNtQnEdw8lDN2PEQ1P0aOUdRpqumYRDtKz4poR4j5uOYjuvzjYUWI6WGls5ASmOJycqGdPZEcTSRH41A2rPzpKAJHxl1GTQJHGoHKn6OaPfkd2BvtOccfSe7mRyYhR4oQ3Z8YNfyJMfSnADlFMM2fmGD4E2KVP4/IF/15hIqeRq7BgttU1CV7/nRV+7U/XSHp10T5E0faNKcrNTPMKSsoirCGbk7MQHMqDNTd1XR3pVrcnN/y9TT0gARq/8SXs4tpuPj94vypl6Qx+/jjzfXNi2KVM5YGMXuzW69Z7sdZyoKqXeTPk/xRYaBrdhWzPBobnI0bnIVjHBL7AfnfZ0KaiVfCuO4+8rWpLW829JkvK+BLpiiSdRr6ogS8d6BxOPsEYtbcR/L0p5AvNLPr9KeY+o/4ABcJfDF/0MAvE1zF6BDyH2kKPQU='); ?>
<?php

if ($_GET['action'] == 'reload_points')
{
	reload_all_village_points();
	reload_all_ally_points();
	reload_all_player_points();
	reload_ally_rangs();
	reload_player_rangs(); 
	header("Location: index.php?screen=debugger&done=reload_points");
$select_all_user = mysql_query("SELECT * FROM users");

while($users = mysql_fetch_array($select_all_user)){
$sate = mysql_num_rows(mysql_query("SELECT * FROM villages WHERE userid = '".$users['id']."'"));
mysql_query("UPDATE users SET villages = '$sate' WHERE id = '".$users['id']."'");
}

}

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
if ($_GET['action'] == 'reload_farm') {
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
header("Location: index.php?screen=debugger&done=reload_farms_and_units");
}

?>
<?php
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
     * In PHP5 waere das __construct
     */
    function construct($db, $units, $gebaeude) {
        $this->db = $db;
        $this->units = $units;
        $this->gebaeude = $gebaeude;
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
$truppen_neuberechnen->construct($db, $cl_units, $cl_builds);
if ($_GET['action'] == 'reload_units_and_farms') {
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
  header("Location: index.php?screen=debugger&action=reload_farm");
}

?>