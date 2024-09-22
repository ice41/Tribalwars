{php}
$timp=time();
$limit=urlencode($_POST["limit"]);
settype($limit, "integer");
if ($limit==""){ $limit==0; }

$compare=urlencode($_POST["compare"]);
settype($compare, "integer");
if ($compare==""){ $compare==0; }
$compare_sec=$compare*3600;
$timp_ver=$timp-$compare_sec;


if($_GET["action"] == "view") {

   $user_from=urlencode($_POST["from"]);
   $user_to=urlencode($_POST["to"]);


   $sql3 = "select `id` from `users` where `username`='$user_from'";
   $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
   while ($array2 = mysql_fetch_array($exec_sql2)) {
      $id_from = urldecode($array2[0]);
   }

   $sql3 = "select `id` from `users` where `username`='$user_to'";
   $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
   while ($array2 = mysql_fetch_array($exec_sql2)) {
      $id_to = urldecode($array2[0]);
   }




   $sql7 = "SELECT `id`,`subject`, `text`, `time`, `from_id`, `to_id` FROM `mail_in` where (`from_id`='$id_from'";
   if ($id_to<>"") { $sql7.= "AND `to_id`='$id_to'";} $sql7.= " OR ";
   if ($id_to<>"") { $sql7.="`from_id`='$id_to' AND";} $sql7.=" `to_id`='$id_from')";
   if ($compare_sec<>0) { $sql7 .=" AND `time`>='$timp_ver'";} $sql7 .= " ORDER BY `time` DESC";

   $exec_sql6 = mysql_query($sql7) or die(mysql_error());
   $numar=-1;
   settype($mesaj['text_mesaj'], "array");
   settype($mesaj['time_mesaj'], "array");
   settype($mesaj['id_from_display'], "array");
   settype($mesaj['unic_display'], "array");
 

   while ($array2 = mysql_fetch_array($exec_sql6)) {
     $ver1=date("d.n.Y H:i:s", $array2[3]);
        
     $no=0;      


    if ($no==0) {
      $numar++;
      $mesaj["numar"][]=$numar;
      $mesaj["id_mesaj"][] = $array2[0];
      $mesaj["tip_mesaj"][] = "mail_in";
      $mesaj["subject_mesaj"][] = urldecode($array2[1]);
      $mesaj["text_mesaj"][] = urldecode($array2[2]);
      $mesaj["time_mesaj"][] = date("d.n.Y H:i:s", $array2[3]);
      $mesaj["unic_display"][]= $array2[3].$array2[2].$array2[4].$array2[5];


      $mesaj["id_from_display"][]= $array2[4];
      $mesaj["id_to_display"][]= $array2[5];

      $sql3 = "select `username` from `users` where `id`='$array2[4]' LIMIT 1";
      $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
      $nr_user1 = mysql_num_rows($exec_sql2);
      if ($nr_user1==0) { $mesaj["nume_from_display"][] = "negasit"; }
      while ($array = mysql_fetch_array($exec_sql2)) {
         $mesaj["nume_from_display"][] = urldecode($array[0]);
      }

      $sql3 = "select `username` from `users` where `id`='$array2[5]' LIMIT 1";
      $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
      $nr_user1 = mysql_num_rows($exec_sql2);
      if ($nr_user1==0) { $mesaj["nume_to_display"][] = "negasit"; }
      while ($array = mysql_fetch_array($exec_sql2)) {
         $mesaj["nume_to_display"][] = urldecode($array[0]);
      }
     } 
     

   }
   $nr_mesaj1 = mysql_num_rows($exec_sql6);

   $sql7 = "SELECT `id`,`subject`, `text`, `time`, `from_id`, `to_id` FROM `mail_out` where (";
   if ($id_to<>"") { $sql7 .="`from_id`='$id_to' AND";} $sql7 .=" `to_id`='$id_from' OR `from_id`='$id_from'";
   if ($id_to<>"") { $sql7 .=" AND `to_id`='$id_to')";} else { $sql7 .= ")"; }
   if ($compare_sec<>0) { $sql7 .=" AND `time`>='$timp_ver'";} $sql7 .= " ORDER BY `time` DESC";

   $exec_sql6 = mysql_query($sql7) or die(mysql_error());
   while ($array2 = mysql_fetch_array($exec_sql6)) {
     $ver1=date("d.n.Y H:i:s", $array2[3]);

     $no=0;


     if ($no==0) {
      $numar++;
      $mesaj["numar"][]=$numar;
      $mesaj["id_mesaj"][] = $array2[0];
      $mesaj["tip_mesaj"][] = "mail_out";
      $mesaj["subject_mesaj"][] = urldecode($array2[1]);
      $mesaj["text_mesaj"][] = urldecode($array2[2]);
      $mesaj["time_mesaj"][] = date("d.n.Y H:i:s", $array2[3]);

      $mesaj["id_from_display"][]= $array2[4];
      $mesaj["id_to_display"][]= $array2[5];
      $mesaj["unic_display"][]= $array2[3].$array2[2].$array2[4].$array2[5];

      $sql3 = "select `username` from `users` where `id`='$array2[4]' LIMIT 1";
      $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
      $nr_user1 = mysql_num_rows($exec_sql2);
      if ($nr_user1==0) { $mesaj["nume_from_display"][] = "negasit"; }
      while ($array = mysql_fetch_array($exec_sql2)) {
         $mesaj["nume_from_display"][] = urldecode($array[0]);
      }

      $sql3 = "select `username` from `users` where `id`='$array2[5]' LIMIT 1";
      $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
      $nr_user1 = mysql_num_rows($exec_sql2);
      if ($nr_user1==0) { $mesaj["nume_to_display"][] = "negasit"; }
      while ($array = mysql_fetch_array($exec_sql2)) {
         $mesaj["nume_to_display"][] = urldecode($array[0]);
      }
     }
   }
   $nr_mesaj2 = mysql_num_rows($exec_sql6);













   $sql7 = "SELECT `id`,`subject`, `text`, `time`, `from_id`, `to_id` FROM `mail_archiv` where (`from_id`='$id_from'";
   if ($id_to<>"") { $sql7.= "AND `to_id`='$id_to'";} $sql7.= " OR ";
   if ($id_to<>"") { $sql7.="`from_id`='$id_to' AND";} $sql7.=" `to_id`='$id_from')";
   if ($compare_sec<>0) { $sql7 .=" AND `time`>='$timp_ver'";} $sql7 .= " ORDER BY `time` DESC";

   $exec_sql6 = mysql_query($sql7) or die(mysql_error());
 

   while ($array2 = mysql_fetch_array($exec_sql6)) {
     $ver1=date("d.n.Y H:i:s", $array2[3]);
        
     $no=0;      


    if ($no==0) {
      $numar++;
      $mesaj["numar"][]=$numar;
      $mesaj["id_mesaj"][] = $array2[0];
      $mesaj["tip_mesaj"][] = "mail_archiv";
      $mesaj["subject_mesaj"][] = urldecode($array2[1]);
      $mesaj["text_mesaj"][] = urldecode($array2[2]);
      $mesaj["time_mesaj"][] = date("d.n.Y H:i:s", $array2[3]);
      $mesaj["unic_display"][]= $array2[3].$array2[2].$array2[4].$array2[5];


      $mesaj["id_from_display"][]= $array2[4];
      $mesaj["id_to_display"][]= $array2[5];

      $sql3 = "select `username` from `users` where `id`='$array2[4]' LIMIT 1";
      $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
      $nr_user1 = mysql_num_rows($exec_sql2);
      if ($nr_user1==0) { $mesaj["nume_from_display"][] = "negasit"; }
      while ($array = mysql_fetch_array($exec_sql2)) {
         $mesaj["nume_from_display"][] = urldecode($array[0]);
      }

      $sql3 = "select `username` from `users` where `id`='$array2[5]' LIMIT 1";
      $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
      $nr_user1 = mysql_num_rows($exec_sql2);
      if ($nr_user1==0) { $mesaj["nume_to_display"][] = "negasit"; }
      while ($array = mysql_fetch_array($exec_sql2)) {
         $mesaj["nume_to_display"][] = urldecode($array[0]);
      }
     } 
     

   }
   $nr_mesaj3 = mysql_num_rows($exec_sql6);
















if (is_array($mesaj["time_mesaj"])){
   $mesaj["unic_display"] = array_unique($mesaj["unic_display"] );

   arsort($mesaj["unic_display"]);
}



if ($id_from=="") {
      $user_from=stripslashes(urldecode($user_from));
      $error="The user $user_from doesn't exist";
   } elseif ($id_to=="" AND $user_to<>"") {
      $user_to=stripslashes(urldecode($user_to));
      $error="The user $user_to doesn't exist";
   } elseif ($nr_mesaj1+$nr_mesaj2+$nr_mesaj3==0) {
      $error="There are no messages resulted from this search";

   } 
}



{/php}


      
<h2> Here you can view all the ingame mails</h2>
<br>
{php}
if ($error<>""){
   echo '<h1><font color="red">ERROR: ',$error,'</font></h1>';
}
{/php}
<br>
<form action="?screen=mail_game&action=view" method="post">
        User 1:<input name="from" type="text" value="{php}echo stripslashes(urldecode($user_from));{/php}" />
           

        User 2:<input name="to" type="text" value="{php}echo stripslashes(urldecode($user_to));{/php}"/><br>
Results limit <input name="limit" type="text" size="2" value="{php}echo stripslashes(urldecode($limit));{/php}"/>
Messages newer than <input name="compare" type="text" size="2" value="{php}echo stripslashes(urldecode($compare));{/php}"/> hours
             <br> <input type="submit" value=Search />
<br><br>
P.S.1 If the both text boxes contain a valid username the messages between the 2 will be displayed
<br>
P.S.2 If the box "User 2" is empty all the messages from "User 1" will be displayed
<br>
P.S.3 If a fields value is 0 it won't be considered in the search
<br>
Copyright 2010 by DSLAN.RO - Version: 3.2 <a href="?screen=mail_game&changelog=1">Changelog</a>
</form>
<br><br>
{php}
if($_GET["changelog"] == "1") {
{/php}
Version 1.0<br>
 - First release. Working quite good<br><br>
Version 2.0<br>
 - New features: Limit the results and the time of the searched mails<br><br>
Version 2.1<br>
 - Fixed bug with displaying mass mails(only one of the mass mails was displayed in 1.0)<br><br>
Version 2.2<br>
 - Fixed order by time<br><br>
Version 3.0<br>
 - The script now searches in arhives too<br><br>
Version 3.1<br>
 - Fixed again the order of displayed messages which didn't work as exected after the 3.0 update<br><br>
Version 3.2<br>
 -  Fixed some minor bugs
{php}
}
{/php}

{php}
if ($error=="" AND $_GET["action"] == "view"){
{/php}
<h2> Search results: </h2>
<br>
{php}
$numar=0;
   foreach ($mesaj['unic_display'] as $key => $value) {
$numar_ordine++;
if ($numar_ordine<=$limit OR $limit==0) { 
{/php}
<b>{php}echo $numar_ordine;{/php}) Taken from: {php}echo $mesaj["tip_mesaj"][$key];{/php} ID: {php}echo $mesaj["id_mesaj"][$key];{/php}</b>
<table class="vis" width="100%"> 
		<tr><th >Subject:</th><td > 
		
		{php}echo $mesaj["subject_mesaj"][$key];{/php}
		
		</td><th>Sent:</td><td>{php}echo $mesaj["time_mesaj"][$key]{/php}</th></tr> 
		<tr><th>Sender | ID:</td><td>{php}echo $mesaj["nume_from_display"][$key],' | ',$mesaj["id_from_display"][$key];{/php}
		</th><th>Receiver | ID:</th><td>{php}echo $mesaj["nume_to_display"][$key],' | ',$mesaj["id_to_display"][$key];{/php}</th></tr> 


		</table> 
		
		<table class="vis" width="100%"> 
		<tr><td colspan="2" valign="top"  style="background-color: white; border: solid 1px black;"> 
		<link rel="stylesheet" type="text/css" href="stamm.css"/> 
{php}echo stripslashes($mesaj["text_mesaj"][$key]);{/php}	</td></tr> 
		</table> <br>



{php}
}
}
}

{/php}