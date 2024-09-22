<?php
$tpl->assign('version', $version = '0.6');
$tpl->assign('thread_url', $thread_url = 'http://dslan.gfx-dose.de/thread-1390.html');
/*
 * Neue Klasse: groups
 */
class groups {
    /*
     * Datenbank-Verbindung
     */
    var $db;
    /*
     * Template-System
     */
    var $tpl;
    /*
     * User-ID
     */
    var $uid;
    /*
     * Datenbanktyp
     */
    var $db_type = 1;
    /*
     * Aktuelle Version
     */
    var $version;
    /*
     * villages_per_page
     */
    var $villages_per_page;     
    /*
     * In PHP 5 waere das __construct
     */
    function construct($db, $tpl, $userid, $version) {
        $this->db = $db;
        $this->tpl = $tpl;
        $this->uid = $userid;
        $this->version = $version;
    }
    /*
     * Neue Gruppe erstellen
     */
    function new_group($name) {
        $this->db->query('INSERT INTO groups (userid, name) VALUES (\''.$this->uid.'\', \''.$name.'\')');
    }
    /*
     * Gruppe bearbeiten
     */
    function edit_group($gid, $name) {
        $this->db->query('UPDATE groups SET name=\''.$name.'\' WHERE id=\''.$gid.'\' LIMIT 1');
    }
    /*
     * Gruppe loeschen
     */
    function del_group($gid){
        $this->db->query('DELETE FROM groups WHERE id=\''.$gid.'\' LIMIT 1');
    }
    /*
     * Aktuelle Gruppe holen
     */
    function get_aktu_group() {
      $query = $this->db->query('SELECT aktu_group FROM users WHERE id=\''.$this->uid.'\'');
      $row = $this->db->fetch($query);
      return $row['aktu_group'];
    }
    /*
     * Alle Gruppen vom User holen
     */
    function get_groups() {
        $groups_sql = $this->db->query('SELECT * FROM groups WHERE userid=\''.$this->uid.'\'');
        while ($row = $this->db->fetch($groups_sql)) {
          $groups_array[] = $row;
        }
        return $groups_array;
    }
    /*
     * Alle Gruppen fuer ein Dorf holen
     */
    function get_groups_for_village($vid, $for_user = true) {
        $group = array();
        $groups_sql = $this->db->query('SELECT groups FROM villages WHERE id=\''.$vid.'\' LIMIT 1');
        $row = $this->db->fetch($groups_sql);
        if ($row != '') {
          $exploded = explode(';', $row['groups']);
          foreach ($exploded as $key => $value) {
            if ($value != '') {
              if ($for_user === true) {
                $query = $this->db->query('SELECT * FROM groups WHERE id=\''.$value.'\' AND userid=\''.$this->uid.'\'');
              }
              else {
                $query = $this->db->query('SELECT * FROM groups WHERE id=\''.$value.'\'');
              }
              $group[] = $this->db->fetch($query);
            }
          }
        }
        return $group;
    }
    /*
     * Alle Gruppen vom User holen, mit Dorf-Gruppen-Info
     */
    function get_groups_with_village($vid) {
        $user_groups = $this->get_groups();
        $village_groups = $this->get_groups_for_village($vid);
        echo '<br /><br /><br />';
        if (isset($user_groups[0]))
        {
          foreach ($user_groups as $key => $value)
          {
            foreach ($village_groups as $key2 => $value2)
            {
              if ($value['id'] == $value2['id'])
              {
                $user_groups[$key]['group_of_village'] = true;
                break;
              }
            }
          }
        }
        return $user_groups;
    }
    /*
     * Alle Dörfer von der Gruppe holen
     */     
    function get_villages_of_group($gid, $only_id = true) {
        if ($only_id === true) {
          $query = $this->db->query('SELECT id FROM villages WHERE groups like \'%;'.$gid.';%\'');
        }
        else {
          $query = $this->db->query('SELECT * FROM villages WHERE groups like \'%;'.$gid.';%\'');
        }
        while ($row = $this->db->fetch($query)) {
          $villages['id_'.$row['id']] = $row;
        }
        return $villages;
    }
    /*
     * Haupt-Info ueber ein Dorf
     */
    function get_village_main_info($vid) {
         $query = $this->db->query('SELECT name, x, y FROM villages WHERE id=\''.$_GET['village_id'].'\' LIMIT 1');
         $row = $this->db->fetch($query);
         $row['name'] = entparse($row['name']);
         return $row;
    }
    /*
     * Check, ob die Gruppe, dem User gehoert
     */
    function check_group($gid) {
        $group = false;
        $groups_sql = $this->db->query('SELECT * FROM groups WHERE userid=\''.$this->uid.'\' AND id=\''.$gid.'\'');
        while ($row = $this->db->fetch($groups_sql)) {
          $group = true;
        }
        return $group;
    }
    /*
     * Check, ob das Dorf dem User gehoert
     */
    function check_village($vid) {
        $query = $this->db->query('SELECT id FROM villages WHERE id=\''.$vid.'\' AND userid=\''.$this->uid.'\' LIMIT 1');
        $row = $this->db->fetch($query);
        if (isset($row['id'])) {
          return true;
        }
        return false;
    }
    /*
     * Check, ob das Dorf in der Gruppe ist
     */
    function check_village_in_group($vid, $gid) {
      $query = $this->db->query('SELECT id FROM villages WHERE id=\''.$vid.'\' AND groups LIKE \'%;'.$gid.';%\'');
      $row = $this->db->fetch($query);
      if (isset($row['id'])) {
        return true;
      }
      return false;
    }
    /*
     * Holt die UID mithilfe von hkey
     */
    function get_uid_by_hkey($hkey) {
        $query = $this->db->query('SELECT userid FROM sessions WHERE hkey=\''.$hkey.'\' LIMIT 1');
        $row = $this->db->fetch($query);
        if (isset($row['userid'])) {
          $this->uid = $row['userid'];
          return true;
        }
        return false;
    }
    /*
     * Holt den aktuellen Mode bei overview_villages
     */
    function get_mode() {
        if (isset($_GET['mode']) and $_GET['mode'] != '') {
          return $_GET['mode'];
        }
        else {
          $query = $this->db->query('SELECT villages_mode FROM users WHERE id=\''.$this->uid.'\' LIMIT 1');
          $row = $this->db->fetch($query);
          return $row['villages_mode'];
        }
    }
    function get_next_village($vid, $gid, $villages_array = array()) {
        $query = $this->db->query('SELECT id FROM villages WHERE userid=\''.$this->uid.'\' AND groups LIKE \'%;'.$gid.';%\' ORDER BY name');
        $last_vid = '';
        $break = false;
        $village_array = $villages_array;
        $villages_array = array();
        while ($row = $this->db->fetch($query)) {
          if (!isset($a)) {
            $villages_array['first_link'] = str_replace($village_array['next'], $row['id'], $village_array['next_link']);
            $villages_array['first'] = $row['id'];
            $a = 0;
          }
          if ($break == true) {
            $villages_array['next_link'] = str_replace($village_array['next'], $row['id'], $village_array['next_link']);
            $villages_array['next'] = $row['id'];
            break;
          }
          if ($vid == $row['id']) {
            $villages_array['last_link'] = str_replace($village_array['last'], $last_vid, $village_array['last_link']);
            $villages_array['last'] = $last_vid;
            $break = true;
          }
          $last_vid = $row['id'];
        }
        return $villages_array;
    }
    /*
     * Gruppen setzten
     */
    function set_groups_of_village($vid, $groups = array()) {
        $gruppen = '';
        if (isset($groups[0])) {
          foreach ($groups as $key => $value) {
            if (!isset($a)) {
              $a = 0;
              $gruppen .= ';';
            }
            $gruppen .= $value.';';
          }
        }
        $this->db->query('UPDATE villages SET groups=\''.$gruppen.'\' WHERE id=\''.$vid.'\' LIMIT 1');
    }
    /*
     * Aktuelle Gruppe setzten
     */
    function set_aktu_group($gid) {
        $this->db->query('UPDATE users SET aktu_group=\''.$gid.'\' WHERE id=\''.$this->uid.'\' LIMIT 1');
    }
    /*
     * Aktuelle Page setzten
     */
    function set_aktu_page($pid, $gid) {
        if ($gid == 0)
        {
          $this->db->query('UPDATE users SET aktu_page=\''.$pid.'\' WHERE id=\''.$this->uid.'\' LIMIT 1');
        }
        else
        {
          $this->db->query('UPDATE groups SET aktu_page=\''.$pid.'\' WHERE id=\''.$gid.'\' LIMIT 1');
        }
    }
    /*
     * Aktuelle Page Number kriegen
     */
    function get_aktu_page_number($gid) {
      if ($gid == 0)
      {
        $query = $this->db->query('SELECT aktu_page FROM users WHERE id=\''.$this->uid.'\'');
      }
      else
      {
        $query = $this->db->query('SELECT aktu_page FROM groups WHERE id=\''.$gid.'\'');
      }
      $row = $this->db->fetch($query);
      return $row['aktu_page'];
    }
    /*
     * Alle Gruppen vom User holen
     */
    function get_page_numbers($villages_number = 0) {
        $sql = $this->db->query('SELECT villages FROM users WHERE id=\''.$this->uid.'\' LIMIT 1');
        $row = $this->db->fetch($sql);
        $number_villages = $villages_number;
        if ($villages_number == 0) {
          $number_villages = $row['villages'];
        }
        $villages_per_page = $this->villages_per_page;
        $a = 2;
        for ($i = 1; $i < $a; ++$i)
        {
          $page_array[$i] = $i;
          if ($number_villages < $villages_per_page * ($i + 1))
          {
            if ($number_villages > $villages_per_page * $i)
            {
              $page_array[$i + 1] = $i + 1;
            }
            break;
          }
          ++$a;
        }
        return $page_array;
    }
    /*
     *
     */
    function get_villages_per_page() {
        $sql = $this->db->query('SELECT villages_per_page FROM users WHERE id=\''.$this->uid.'\' LIMIT 1');
        $row = $this->db->fetch($sql);
        $this->villages_per_page = $row['villages_per_page'];
        return $this->villages_per_page;
    }     
    /*
     *
     */
    function sort_out_villages_by_page($villages, $page_number) {
        $villages_per_page = $this->villages_per_page;
        $i = 0;
        $to = $page_number * $villages_per_page;
        $from = $to - $villages_per_page;
        foreach ($villages as $key => $value)
        {
          if ($from <= $i and $to > $i)
          {
            $return_villages[$key] = $value;
          }
          if ($to < $i)
          {
            break;
          }
          ++$i;
        }
        return $return_villages;
    }
    /*
     *
     */
    function change_page_number($page_size) {
        $this->db->query('UPDATE users SET villages_per_page=\''.$page_size.'\' WHERE id=\''.$this->uid.'\' LIMIT 1');
    }
    /*
     * Sortiert aus $villages, die in $sort nicht gennannten Doerfer aus
     */     
    function sort_out_villages_by_group($villages, $sort, $type = 1) {
        if ($type == 1) {
          foreach ($villages as $key => $value) {
            if (!isset($sort['id_'.$key])) {
              unset($villages[$key]);
            }
          }
        }
        elseif ($type == 2) {
          if (isset($villages[0])) {
            foreach ($villages as $key => $value) {
              if (!isset($sort['id_'.$value['to_village']])) {
                unset($villages[$key]);
              }
            }
          }
        }
        elseif ($type == 3) {
          /*
           * Funktioniert nicht, kein Plan warum :'(
           */           
          if (isset($villages[0])) {
            foreach ($villages as $key => $value) {
              if (!isset($sort['id_'.$value['homevillageid']])) {
                unset($villages[$key]);
              }
            }
          }
        }
        return $villages;
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
        $ausgabe = '<p style="color: green; text-align: center;">Ein Update f&uuml;r das Addon '.$tool_name.' (&copy; Copyright by <a href="http://dslan.gfx-dose.de/user-11.html">Philipp Ranft</a>) verf&uuml;gbar!<br /><a href="#" onClick="document.getElementsByName(\'infos\')[0].style.display=\'block\';">Mehr Infos/&Auml;nderungen</a></p><span name="infos" style="display: none; text-align: center;">';
        foreach ($info as $key => $value) {
          $ausgabe .= $value.'<br />';
        }
        $ausgabe .= '</span><p style="text-align: center;"><a href="'.$url.'">Download/Update-Info</a></p>';
        echo $ausgabe;
    }
}
/*
 * Klasse oeffnen
 */
$groups = new groups;
$groups->construct($db, $tpl, $user['id'], $version);
/*
 * Gruppen
 */
/*
 * Versions-Check
 */
if (!file_exists('actions/no_update_check.txt'))
{
  $check = $groups->check_nach_update('groups');
  if ($check !== true)
  {
    $version_new = explode('_', $check);
    if ($version_new[0] == 'update')
    {
      $groups->echo_update_info('groups', '(D&ouml;rfer-)Gruppen', $version_new[1], $thread_url);
    }
  }
}
/*
 * Aktu_group & aktu_page_number
 */
if ($_GET['screen'] == 'overview_villages')
{
  if (isset($_GET['mode']))
  {
    if ($_GET['mode'] == 'groups')
    {
      $db->query('UPDATE users SET villages_mode=\'groups\' WHERE id=\''.$user['id'].'\'');
    }
  }
  if (isset($_GET['group']))
  {
    if ($_GET['group'] != '')
    {
      if ($groups->check_group($_GET['group']) or $_GET['group'] == 0) {
        $groups->set_aktu_group($_GET['group']);
      }
    }
  }
  if (isset($_GET['page']))
  {
    if ($_GET['page'] != '')
    {
      $groups->set_aktu_page($_GET['page'], $groups->get_aktu_group());
    }
  }
}
if ($action === 'overview_villages')
{
  /*
   * Action
   */
  if (isset($_GET['action']))
  {
    /*
     * new_group
     */
    if ($_GET['action'] == 'new_group')
    {
      if (isset($_POST['group_name']) and $_POST['group_name'] != '')
      {
        $groups->new_group($_POST['group_name']);
        $tpl->assign('done', 'new_group');
      }
      else
      {
        $tpl->assign('fehler', 'no_name');
      }
    }
    /*
     * edit_group:
     * - edit_group();
     * - del_group();          
     */     
    if ($_GET['action'] == 'edit_group' and isset($_GET['id']))
    {
      if ($groups->check_group($_GET['id']) === true)
      {
        if (isset($_POST['del']))
        {
          $groups->del_group($_GET['id']);
          $tpl->assign('done', 'del_group');
        }
        else
        {
          if ($_POST['group_name_'.$_GET['id']] != '') {
            $groups->edit_group($_GET['id'], $_POST['group_name_'.$_GET['id']]);
            $tpl->assign('done', 'edit_group');
          }
          else
          {
            $tpl->assign('fehler', 'no_name');
          }
        }
      }
      else
      {
        $tpl->assign('fehler', 'wrong_id');
      }
    }
    /*
     * Change page size
     */
    if ($_GET['action'] == 'change_page_size' and isset($_POST['page_size']))
    {
      if ($_POST['page_size'] <= 200 and $_POST['page_size'] >= 5)
      {
        $groups->change_page_number($_POST['page_size']);
      }
    }
  }
  /*
   * groups
   */
  $tpl->assign('gruppen', $groups->get_groups());
  // Aktuelle Gruppe
  $aktu_group = $groups->get_aktu_group();
  $tpl->assign('aktu_group', $aktu_group);
  // Aktuelle Page Nummer
  $aktu_page_number = $groups->get_aktu_page_number($aktu_group);
  $tpl->assign('aktu_page_number', $aktu_page_number);
  $tpl->assign('villages_per_page', $groups->get_villages_per_page());
  // Wenn aktuelle Gruppe nicht >Alle< ist
  if ($aktu_group != 0)
  {
    // Normal
    if ($groups->get_mode() != 'incomings' and $groups->get_mode() != 'commands')
    {
      $villages = $groups->sort_out_villages_by_group($villages, $groups->get_villages_of_group($aktu_group));
      $tpl->assign('page_numbers', $groups->get_page_numbers(count($villages)));
      if ($aktu_page_number != 0)
      {
        $tpl->assign('villages', $villages = $groups->sort_out_villages_by_page($villages, $aktu_page_number));
      }
      else
      {
        $tpl->assign('villages', $villages);
      }
    }
    // Incomings
    elseif ($groups->get_mode() == 'incomings')
    {
      $tpl->assign('other_movements', $other_movements = $groups->sort_out_villages_by_group($other_movements, $groups->get_villages_of_group($aktu_group), 2));
    }
    // Comands
    elseif ($groups->get_mode() == 'commands')
    {
      $tpl->assign('other_movements', $my_movements = $groups->sort_out_villages_by_group($my_movements, $groups->get_villages_of_group($aktu_group), 3));
    }
    // Villages of Group
    $tpl->assign('villages_of_group', $groups->get_villages_of_group($aktu_group));
  }
  // Wenn aktuelle Gruppe >Alle< ist
  else
  {
    // Wenn aktuelle Seite nicht >Alle< ist
    if ($aktu_page_number != 0)
    {
      $tpl->assign('villages', $villages = $groups->sort_out_villages_by_page($villages, $aktu_page_number));
    }
    $tpl->assign('page_numbers', $groups->get_page_numbers());
  }
}
elseif ($action == 'overview') {
  $tpl->assign('gruppen', $groups->get_groups_for_village($_GET['village']));
}
$aktu_group = $groups->get_aktu_group();
if ($aktu_group != 0) {
  $tpl->assign('aktu_group', $aktu_group);
  $tpl->assign('village_array', $village_array = $groups->get_next_village($_GET['village'], $aktu_group, $village_array));
  $tpl->assign('village_in_group', $groups->check_village_in_group($_GET['village'], $aktu_group));
}
?>