<?php
 /**********************************\
 * Erweiterung fuer Die-Staemme Lan *
 * ******************************** *
 *             Gruppen              *
 * ******************************** *
 *   (c) Copyright Philipp Ranft    *
 \**********************************/
$tpl->assign('version', $version = '0.6');
$tpl->assign('thread_url', $thread_url = 'http://dslan.gfx-dose.de/thread-1390.html');
/*
 * Klasse: groups_admin
 */
class groups_admin {
    /*
     * Datenbank-Verbindung
     */
    var $db;
    /*
     * Dateien fuer die Datei-Installation
     */
    var $dateien = array('ally',
                         'barracks',
                         'farm',
                         'garage',
                         'hide',
                         'info_ally',
                         'info_command',
                         'info_member',
                         'info_player',
                         'info_village',
                         'iron',
                         'mail',
                         'main',
                         'map',
                         'market',
                         'memo',
                         'place',
                         'ranking',
                         'recruit_template',
                         'report',
                         'settings',
                         'smith',
                         'snob',
                         'stable',
                         'stone',
                         'storage',
                         'wall',
                         'wood');
    // Version
    var $version;
    /*
     * In PHP 5 waere das __construct
     */
    function construct($db, $version) {
        $this->db = $db;
        $this->version = $version;
    }
    /*
     * Installation Mysql
     */
    function do_mysql_install() {
        $this->db->query("ALTER TABLE `villages` ADD `groups` VARCHAR( 1000 ) NOT NULL AFTER `wall`");
        $this->db->query("CREATE TABLE IF NOT EXISTS `groups` (
                            `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
                            `userid` INT NOT NULL ,
                            `name` VARCHAR( 255 ) NOT NULL ,
                            `aktu_page` INT NOT NULL DEFAULT '0'
                          ) ENGINE = MYISAM");
        $this->db->query("ALTER TABLE `users` 
                            ADD `aktu_group` INT NOT NULL DEFAULT '0' AFTER `ennobled_by` ,
                            ADD `aktu_page` INT NOT NULL DEFAULT '0' AFTER `aktu_group` ,
                            ADD `villages_per_page` INT NOT NULL DEFAULT '25' AFTER `aktu_page`");
        return true;
    }
    /*
     * Deinstallation Mysql
     */
    function do_mysql_uninstall() {
        $this->db->query("DROP TABLE `groups`");
        $this->db->query("ALTER TABLE `users`
                            DROP `aktu_group` ,
                            DROP `aktu_page` ,
                            DROP `villages_per_page`");
        $this->db->query("ALTER TABLE `villages` DROP `groups`");
        return true;
    }
    /*
     * Installation Dateien
     */
    function do_datei_install() {
        $plus_content = "\n<?php\ninclude 'actions/groups.php';\n?".">";
        $datei_array = $this->dateien;
        foreach ($datei_array as $key => $value) {
          $dateiname = '../actions/'.$value.'.php';
          if (!$handle = fopen($dateiname, "a")) {
            return false;
          }
          if (!fwrite($handle, $plus_content)) {
            return false;
          }
          fclose($handle);
        }
        return true;
    }
    /*
     * Nur fuer Testzwecke geeignet!!
     */     
    function do_datei_uninstall() {
        $datei_array = $this->dateien;
        foreach ($datei_array as $key => $value) {
          $dateiname = '../actions/'.$value.'.php';
          if (!$handle = fopen($dateiname, "r")) {
            return false;
          }
          $content = fread($handle, filesize($dateiname));
          #$search = "<?php\ninclude 'actions/groups.php';\n?".">";
          #$search = "include 'actions/groups.php';";
          #$search = "\n";
          #$search = "";
          #$search = htmlentities($search);
          $content = str_replace($search, '', $content);
          fclose($handle);
          if (!$handle = fopen($dateiname, "w")) {
            return false;
          }
          if (!fwrite($handle, $content)) {
            return false;
          }
          fclose($handle);
        }
        return true;
    }
    /*
     * Pruefen, ob die Installation schon gemacht wurde
     */     
    function check_install() {
        if (file_exists('actions/install_'.$this->version.'.txt'))
        {
          return true;
        }
        return false;
    }
    function check_first_install() {
        if (file_exists('actions/install_first.txt'))
        {
          return true;
        }
        return false;
    }
    /*
     * install setzen
     */
    function set_install() {
        if ($handle = fopen('actions/install_'.$this->version.'.txt', 'w'))
        {
          fclose($handle);
          return true;
        }
        fclose($handle);
        return false;
    }
    function set_first_install() {
        if ($handle = fopen('actions/install_first.txt', 'w'))
        {
          fclose($handle);
          return true;
        }
        fclose($handle);
        return false;
    }     
    /*
     * Updatesystem Status
     */
    function check_updatesystem() {
        if (file_exists('../actions/no_update_check.txt'))
        {
          return 'off';
        }
        return 'on';
    }
    /*
     * reset
     */
    function do_reset() {
        $this->db->query('TRUNCATE TABLE groups');
        $this->db->query('UPDATE users SET aktu_group=\'0\', aktu_page=\'0\', villages_per_page=\'25\'');
        return true;
    }
}
/*
 * Klasse starten
 */
$groups_admin = new groups_admin;
$groups_admin->construct($db, $version);
/*
 * Pruefen ob Installation schon gemacht wurde
 */
$install = $groups_admin->check_install();
$tpl->assign('install', $install);
/*
 * Installation
 */
if ($_GET['action'] == 'install')
{
  if ($install === false)
  {
    if (!$groups_admin->check_first_install())
    {
      if ($groups_admin->do_datei_install() === true)
      {
        $groups_admin->set_first_install();
      }
    }
    else
    {
      $groups_admin->do_mysql_uninstall();
    }
    $groups_admin->do_mysql_install();
    $groups_admin->set_install();
    $tpl->assign('install_done', true);
    $tpl->assign('install', $groups_admin->check_install());
  }
}
/*
 * Updatesystem ausschalten/anschalten
 */
if ($_GET['action'] == 'updatesystem_on')
{
  if (file_exists('../actions/no_update_check.txt'))
  {
    if (unlink('../actions/no_update_check.txt'))
    {
      $tpl->assign('updatesystem_on', true);
    }
  }
  else
  {
    $tpl->assign('updatesystem_is_already_on', true);
  }
}
elseif ($_GET['action'] == 'updatesystem_off')
{
  if ($handle = fopen('../actions/no_update_check.txt', 'w'))
  {
    fclose($handle);
    $tpl->assign('updatesystem_off', true);
  }
}
$updatesystem_status = $groups_admin->check_updatesystem();
$tpl->assign('updatesystem_status', $updatesystem_status);
/*
 * Reset
 */
if ($_GET['action'] == 'reset')
{
  if ($groups_admin->do_reset())
  {
    $tpl->assign('reset', true);
  }
  else
  {
    $tpl->assign('reset', false);
  }
}
?>