<?php
   function id_from_username($username){
      $id = mysql_fetch_assoc(mysql_query("SELECT `id` FROM `users` WHERE `username` = '".$username."'"));
      return $id['id'];
   }
   

?>