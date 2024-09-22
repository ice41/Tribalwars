<?php
/*
 * Smarty
 */
require_once('include.inc.php');
$tpl = new Smarty;
/*
 * Klasse: Gruppen
 */
$action = 'none';
require('actions/groups.php');
/*
 * Berechnen, etc.
 */
if (isset($_GET['mode'])) {
  /*
   * Doerfergruppen
   */
  if ($_GET['mode'] == 'village' and isset($_GET['village_id'])) {
    /*
     * UID mithilfe von hkey rausfinden
     */
    if ($groups->get_uid_by_hkey($_GET['hkey'])) {
      /*
       * Dorf mit UID pruefen
       */      
      if ($groups->check_village($_GET['village_id'])) {
        if (isset($_GET['action']) and $_GET['action'] == 'village') {
          $groups->set_groups_of_village($_GET['village_id'], $_POST['groups']);
          $tpl->assign('done', 'village');
        }
        /*
         * Gruppen uebergeben
         */
        $tpl->assign('village', $groups->get_village_main_info($_GET['village_id']));
        $tpl->assign('gruppen', $groups->get_groups_with_village($_GET['village_id']));
      }
      else {
        $tpl->assign('fehler', 'wrong_village');
      }
    }
    else {
      $tpl->assign('fehler', 'wrong_uid');
    }
  }
}
/*
 * Ausgeben
 */
$tpl->display('groups.tpl');
?>