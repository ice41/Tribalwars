<?php
$sql3 = "SELECT * FROM `friends`";
$exec_sql2 = mysql_query($sql3) or $none_sql=1; 

if ($none_sql==1){
	$sql3 = "CREATE TABLE  `friends` (
	 `id` INT( 20 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	 `type` ENUM(  'activ',  'pending' ) NOT NULL DEFAULT  'pending',
	 `id_from` INT( 20 ) NOT NULL DEFAULT  '-1',
	 `id_to` INT( 20 ) NOT NULL DEFAULT  '-1'
	) ENGINE = MYISAM ;";
	$exec_sql2 = mysql_query($sql3) or die(mysql_error());
}

$id_sat=$this->_tpl_vars['village']['id'];
$id_player=$this->_tpl_vars['user']['id'];
$nume_player=urldecode($this->_tpl_vars['user']['username']);
$_GET['action'] = addslashes($_GET['action']);
$do=$_GET['action'];
$_GET['buddy_id'] = addslashes($_GET['buddy_id']);
$buddy_id=$_GET['buddy_id'];
$timp=time();



if ($do=="cancel_buddy"){

   $sql3 = "SELECT `id`,`id_to` FROM `friends` where `id_from`='$id_player' AND `id`='$buddy_id'";
   $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
   $numar_control = mysql_num_rows($exec_sql2);
   while ($array2 = mysql_fetch_array($exec_sql2)) {
      $id_to = $array2[1];
   }



   if ($numar_control==1){
      $sql3 = "DELETE FROM `friends` WHERE `id`='$buddy_id'";
      $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 

	   $numar_control_block = 0;
	   
      if ($numar_control_block==0) {

         $titlu="Retragere cerere de prietenie de la $nume_player";

         $sql3 = "INSERT INTO `reports` (title, time, type, to_user, from_user, receiver_userid, is_new, in_group, from_username) VALUES ('$titlu', '$timp', 'invite_friend_cancel', '$id_to', '$id_player', '$id_to', '1', 'other', '$nume_player')";
         $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
          
         $sql3 = "UPDATE `users` set `new_report`='1' WHERE `id`='$id_to'";
         $exec_sql2 = mysql_query($sql3) or die(mysql_error());
      }

      header("Location: game.php?village=$id_sat&screen=friends");



   } else {
         header("Location: game.php?village=$id_sat&screen=friends&error=Intrarea nu exista!");
   }

}


if ($do=="reject_buddy"){

   $sql3 = "SELECT `id`,`id_from` FROM `friends` where `id_to`='$id_player' AND `id`='$buddy_id'";
   $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
   $numar_control = mysql_num_rows($exec_sql2);
   while ($array2 = mysql_fetch_array($exec_sql2)) {
      $id_from = $array2[1];
   }

   if ($numar_control==1){
      $sql3 = "DELETE FROM `friends` WHERE `id`='$buddy_id'";
      $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 

      $numar_control_block = 0;

      if ($numar_control_block==0) {

         $titlu="$nume_player a refuzat cererea de adaugare in lista de prieteni";

         $sql3 = "INSERT INTO `reports` (title, time, type, to_user, from_user, receiver_userid, is_new, in_group, from_username) VALUES ('$titlu', '$timp', 'decline_friend', '$id_from', '$id_player', '$id_from', '1', 'other', '$nume_player')";
         $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 

         $sql3 = "UPDATE `users` set `new_report`='1' WHERE `id`='$id_from'";
         $exec_sql2 = mysql_query($sql3) or die(mysql_error());
      }
      header("Location: game.php?village=$id_sat&screen=friends");



   } else {
         header("Location: game.php?village=$id_sat&screen=friends&error=Intrarea nu exista!");
   }

}

if ($do=="approve_buddy"){

   $sql3 = "SELECT `id`,`id_from` FROM `friends` where `id_to`='$id_player' AND `id`='$buddy_id'";
   $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
   $numar_control = mysql_num_rows($exec_sql2);
   while ($array2 = mysql_fetch_array($exec_sql2)) {
      $id_from = $array2[1];
   }

   if ($numar_control==1){
      $sql3 = "UPDATE `friends` set `type`='activ' WHERE `id`='$buddy_id'";
      $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
      $titlu="$nume_player a acceptat cererea de adaugare in lista de prieteni";

      $numar_control_block = 0;

      if ($numar_control_block==0) {

         $sql3 = "INSERT INTO `reports` (title, time, type, to_user, from_user, receiver_userid, is_new, in_group, from_username) VALUES ('$titlu', '$timp', 'accept_friend', '$id_from', '$id_player', '$id_from', '1', 'other', '$nume_player')";
         $exec_sql2 = mysql_query($sql3) or die(mysql_error());

         $sql3 = "UPDATE `users` set `new_report`='1' WHERE `id`='$id_from'";
         $exec_sql2 = mysql_query($sql3) or die(mysql_error());
      }

      header("Location: game.php?village=$id_sat&screen=friends");


   } else {
         header("Location: game.php?village=$id_sat&screen=friends&error=Intrarea nu exista!");
   }

}

if ($do=="delete_buddy"){


   $sql3 = "SELECT `id`,`id_to`,`id_from` FROM `friends` where (`id_to`='$id_player' OR `id_from`='$id_player') AND `type`='activ' AND `id`='$buddy_id'";
   $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
   $numar_control = mysql_num_rows($exec_sql2);
   while ($array2 = mysql_fetch_array($exec_sql2)) {
      $id_to = $array2[1];
      $id_from = $array2[2];
   }

   if ($numar_control==1){
      $sql3 = "DELETE FROM `friends` WHERE `id`='$buddy_id'";
      $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
      if ($id_to==$id_player) {
         $id_all=$id_from;
      } elseif ($id_from==$id_player) {
         $id_all=$id_to;
      }


      $numar_control_block = 0;

      if ($numar_control_block==0) {

         $titlu="$nume_player s-a sters din lista ta de prieteni";

         $sql3 = "INSERT INTO `reports` (title, time, type, to_user, from_user, receiver_userid, is_new, in_group, from_username) VALUES ('$titlu', '$timp', 'delete_friend', '$id_all', '$id_player', '$id_all', '1', 'other', '$nume_player')";
         $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 

         $sql3 = "UPDATE `users` set `new_report`='1' WHERE `id`='$id_all'";
         $exec_sql2 = mysql_query($sql3) or die(mysql_error());
      }

      header("Location: game.php?village=$id_sat&screen=friends");

   } else {
         header("Location: game.php?village=$id_sat&screen=friends&error=Intrarea nu exista!");
   }




}


if ($do=="add_buddy"){

   $_POST['name'] = addslashes($_POST['name']);
   $nume_adaugare=urlencode($_POST['name']);

   $sql7 = "SELECT `id` FROM `users` where `username`='$nume_adaugare' LIMIT 1";
   $exec_sql6 = mysql_query($sql7) or die(mysql_error());
   $nr_result = mysql_num_rows($exec_sql6);
   $nume_adaugare=htmlspecialchars($nume_adaugare);
   $error="Jucatorul $nume_adaugare nu exista!";
   $error=urlencode($error);
   if ($nr_result<>1){ header("Location: game.php?village=$id_sat&screen=friends&error=$error");}
   if ($nr_result==1){   
        while ($array2 = mysql_fetch_array($exec_sql6)) {
         $id_newfriend = $array2[0];
      }
      if ($id_newfriend<>$id_player){
         $sql7 = "SELECT `id` FROM `friends` where `id_from`='$id_player' AND `id_to`='$id_newfriend' OR `id_to`='$id_player' AND `id_from`='$id_newfriend'  LIMIT 1";
         $exec_sql6 = mysql_query($sql7) or die(mysql_error());
         $nr_result_ver = mysql_num_rows($exec_sql6);
         if ($nr_result_ver==0) {
            $sql0 = "INSERT INTO `friends` (id_from, id_to, type) VALUES ('$id_player', '$id_newfriend', 'pending')";
            $exec_sql0 = mysql_query($sql0);

            $numar_control_block = 0;

            if ($numar_control_block==0) {

               $titlu="Cerere de prietenie de la $nume_player";
               $sql3 = "INSERT INTO `reports` (title, time, type, to_user, from_user, receiver_userid, is_new, in_group, from_username) VALUES ('$titlu', '$timp', 'invite_friend', '$id_newfriend', '$id_player', '$id_newfriend', '1', 'other', '$nume_player')";
               $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 

               $sql3 = "UPDATE `users` set `new_report`='1' WHERE `id`='$id_newfriend'";
               $exec_sql2 = mysql_query($sql3) or die(mysql_error());

            }

            header("Location: game.php?village=$id_sat&screen=friends");
         } else {
             header("Location: game.php?village=$id_sat&screen=friends&error=Jucatorul $nume_adaugare este deja in lista ta de prieteni!");
         }
      } else {
         header("Location: game.php?village=$id_sat&screen=friends&error=Nu te poti adauga singur in lista de prieteni!");
      }

   }


}

   $sql7 = "SELECT `id`,`id_to` FROM `friends` where `id_from`='$id_player' AND `type`='pending' ORDER BY ID";
   $exec_sql6 = mysql_query($sql7) or die(mysql_error());
   $nr_pending = mysql_num_rows($exec_sql6);
   if ($nr_pending<>0){   
      while ($array2 = mysql_fetch_array($exec_sql6)) {
         $id_pending[] = $array2[0];
         $id_to_pending[] = $array2[1];
      }

   }

   $sql7 = "SELECT `id`,`id_from` FROM `friends` where `id_to`='$id_player' AND `type`='pending' ORDER BY ID";
   $exec_sql6 = mysql_query($sql7) or die(mysql_error());
   $nr_pending_request = mysql_num_rows($exec_sql6);
   if ($nr_pending_request<>0){   
      while ($array2 = mysql_fetch_array($exec_sql6)) {
         $id_pending_request[] = $array2[0];
         $id_from_pending_request[] = $array2[1];
      }

   }


   $sql7 = "SELECT `id`,`id_from`, `id_to` FROM `friends` where (`id_to`='$id_player' OR `id_from`='$id_player') AND `type`='activ' ORDER BY ID";
   $exec_sql6 = mysql_query($sql7) or die(mysql_error());
   $nr_activ = mysql_num_rows($exec_sql6);
   if ($nr_activ<>0){   
      while ($array2 = mysql_fetch_array($exec_sql6)) {
         $id_activ[] = $array2[0];
         $id_from_activ[] = $array2[1];
         $id_to_activ[] = $array2[2];
         if ($array2[1]==$id_player) {
            $id_all_activ[]=$array2[2];
         } else {
            $id_all_activ[]=$array2[1];
         }
      }

   }
?>