<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2024-01-10 02:05:22
         Wersja PHP pliku pliki_tpl/game_support.tpl */ ?>
<table class="vis" width="700">

<?php 
$us_id=$this->_tpl_vars['user']['id'];
$username=$this->_tpl_vars['user']['username'];
mysql_query("UPDATE users SET support_new = '0' WHERE id = '$us_id'");
if ($_GET['view'] == 'ticket')
{ 
$id = $_GET['id'];
 $select_inchis = mysql_fetch_array(mysql_query("SELECT block FROM support WHERE id = '$id'"));
 $select_inchis = $select_inchis[0];
if($select_inchis == '1')
{
mysql_query("UPDATE support SET block = '2' WHERE id = '$id'");
}
else
{
mysql_query("UPDATE support SET new = '0' WHERE id = '$id'");
}
$id_user=$this->_tpl_vars['user']['id'];
 $select_id = mysql_fetch_array(mysql_query("SELECT uid FROM support WHERE id = '$id'"));
 $select_id1 = $select_id[0];
  if ($select_id1 == $id_user) {
 $selectare = mysql_fetch_array(mysql_query("SELECT message,date,subject,username,uid FROM support WHERE id = '$id'"));
	   $message_topic = $selectare[0];
	   $date_topic = $selectare[1];
	   $subject_topic = $selectare[2];
	   $username_topic = $selectare[3];
	   $uid_topic = $selectare[4];
	   
 ?>
<h3><?php  echo urldecode($subject_topic);  ?></h3>
<tr>
	<th><?php 
$id_s=$this->_tpl_vars['village']['id'];
	echo '<a href="game.php?village='.$id_s.'&screen=info_player&id='.$uid_topic.' "> '.$username_topic.'</a>'; echo "<font size='1'> ".$date_topic;  ?></font></th>

</tr>
<tr>
			<td><?php  echo stripslashes(nl2br(urldecode($message_topic)));  ?></td>
			</tr>
<?php 



$id_s=$this->_tpl_vars['village']['id'];
$data =  date("d.m.Y H:i");
$sql3 = "select * from `support_post` where  id_ticket ='$id'";
	   $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
	   while ($array2 = mysql_fetch_array($exec_sql2)) {
		  $mesaj_q[] = $array2['message'];
		  $id_q[] = $array2['uid'];
		  $date[] = $array2['date'];
		  $nume[] = $array2['username'];
		  
	   }
	   $select = mysql_num_rows(mysql_query("SELECT * FROM support_post WHERE id_ticket = '$id'"));
	   if ($select > 0) {
	   foreach ($id_q as $key => $value) {
			 if ($id_q<>0) {
			 
		
		 ?>
<tr>
	<th><?php  if ($id_q[$key] == '-1') { echo '<font color="green">'.$nume[$key].'</font>'; } else { echo '<a href="game.php?village='.$id_s.'&screen=info_player&id='.$id_q[$key].' "> '.$nume[$key].'</a>'; } echo "<font size='1'> ".$date[$key];  ?></font></th>

</tr>
		<tr>
			<td><?php  echo stripslashes(nl2br(urldecode($mesaj_q[$key])));  ?></td>
			
			</tr>
			<?php 
			 }
      } }
	   ?>
	  <?php 
	  if ($select_inchis != '0')
{
 ?><table> <Br /><h3>Tópico fechado!</h3> </table>
<?php 
}
else
{
	   ?>
	  </table>
	  <br>
<form method=post action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=support&view=ticket&do=post&id=<?php  echo $id;  ?>">
<table class="vis" width="570">
<tr>
  <th colspan="2">Escreva um novo</th></tr>
<?php 

if ($_GET['do'] == 'post')
{
$id_ticket = $_GET['id'];
$idsat=$this->_tpl_vars['village']['id'];
$mesaj_postat = urlencode($_POST['message_post']);
if (strlen($mesaj_postat) <= 1)
{
$error1 = '<tr>
  <td colspan="2"><font color="red"><b>Musisz coś napisać!</b></font></td></tr>';
} else { $error1 = ''; }
if ($error1 == '')
{
$sql3 = "INSERT INTO `support_post` (message,uid,date,username,id_ticket) VALUES ('$mesaj_postat','$id_user','$data','$username','$id_ticket')";
         $exec_sql2 = mysql_query($sql3) or die(mysql_error());
		 mysql_query("UPDATE support SET new_admin = '1' WHERE id = '$id'");
		 header("Location: game.php?village=$idsat&screen=support&view=ticket&id=$id_ticket");
}
}
echo $error1;

 ?>
<tr id="bbcode">
        <td colspan="2">
            <div style="text-align: left; overflow: visible;">
                <a id="bb_button_bold" title="Bold" href="#" onclick="BBCodes.insert('[b]', '[/b]');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll 0px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_italic" title="Italic" href="#" onclick="BBCodes.insert('[i]', '[/i]');return false;"> 
            <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -20px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_underline" title="Subliniat" href="#" onclick="BBCodes.insert('[u]', '[/u]');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -40px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_strikethrough" title="T&#259;iat" href="#" onclick="BBCodes.insert('[s]', '[/s]');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -60px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_quote" title="Citat" href="#" onclick="BBCodes.insert('[quote=Author]', '[/quote]');return false;"> 
            <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -140px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                  <a id="bb_button_img" title="Imagine" href="#" onclick="BBCodes.insert('[img]', '[/img]');return false;"> 
            <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -180px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a>
				<a id="bb_button_color" title="Culoare" href="#" onclick="BBCodes.insert('[color=]', '[/color]');return false;"> 
            <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -200px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_url" title="URL" href="#" onclick="BBCodes.insert('[url]', '[/url]');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -160px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_spoiler" title="Spoiler" href="#" onclick="BBCodes.insert('[spoiler]', '[/spoiler]');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -260px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_player" title="Juc&#259;tori" href="#" onclick="BBCodes.insert('[player]', '[/player]');return false;"> 
            <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -80px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_tribe" title="Triburi" href="#" onclick="BBCodes.insert('[ally]', '[/ally]');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -100px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_coord" title="Coordonate" href="#" onclick="BBCodes.insert('[village]', '[/village]');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -120px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a>
				<a id="bb_button_li" title="Punct inaintea textului" href="#" onclick="BBCodes.insert('[li]', '[/li]');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -280px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a>
    
                <?php echo '
                <script type="text/javascript">
                    $(document).ready(function(){
                        BBCodes.init({target : \'#message\'});
                    });
                </script>
                '; ?>

    
            </div>            
      </td>
    </tr>
<tr><td colspan="2"><textarea cols=67 rows=10 id="message" name=message_post></textarea></td></tr>
<tr><td colspan=2 align=center><input type=submit value=OK /></td></tr>
</table>
</form>
	  
	  <?php }}
	  else
	  {
	   ?>
	  <table> 
	  <h3>Não pode ver este tópico!</h3>
	  </table>
	  <?php 
	  }
}
else
{
 ?>
<?php 
if ($_GET['do'] == 'new_ticket')
{
$idsat=$this->_tpl_vars['village']['id'];
$username=$this->_tpl_vars['user']['username'];
$id_user=$this->_tpl_vars['user']['id'];
$subiect = urlencode($_POST['subject']);
$mesaj = urlencode($_POST['message']);
$data =  date("d.m.Y H:i");
if ($_GET['do'] == 'new_ticket' AND isset($_GET['open']))
{
if (strlen($subiect) <= 4){
		$error1 = '<tr>
		  <td colspan="2"><font color="red"><b>Deve escrever no assunto de 4 a 20 caracteres!</b></font></td></tr>';
	}
	else
	{
		$error1 = '';
	}
	if (strlen($subiect) >= 21){
		$error3 = '<tr>
		  <td colspan="2"><font color="red"><b>Deve escrever no assunto de 4 a 20 caracteres!</b></font></td></tr>';
	}
	else
	{
		$error3 = '';
	}
if (strlen($mesaj) <= 3)
{
$error2 = '<tr><td colspan="2"><strong><font color="red">A mensagem deve conter pelo menos 3 caracteres!</td></tr>';
}
else{
$error2 = '';
}
if ($error1 == '' && $error2 == '' && $error3 == '')
	{
	$sql3 = "INSERT INTO `support` (subject, message,uid,date,username,new_admin) VALUES ('$subiect', '$mesaj','$id_user','$data','$username','1')";
         $exec_sql2 = mysql_query($sql3) or die(mysql_error());
		 $select1 = mysql_fetch_array(mysql_query("SELECT id FROM support WHERE subject = '$subiect' AND message = '$mesaj' AND uid = '$id_user' AND date = '$data'"));
		 $select1 = $select1[0];
		 header("Location: game.php?village=$idsat&screen=support");
	}
}
 ?>
<h2>Abrir novo ticket</h2>
<form method=post action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=support&do=new_ticket&open">
<table class="vis" width="570" align=center>
<tr>
  <th colspan="2">Escreva um novo</th></tr>
<?php 
echo $error1;
echo $error2;
echo $error3;
 ?>
<tr>
  <td width=100><b>temat</b></td><td><input type=text name=subject size="25"/></td></tr>
<tr id="bbcode">
        <td colspan="2">
            <div style="text-align: left; overflow: visible;">
                <a id="bb_button_bold" title="Bold" href="#" onclick="BBCodes.insert('[b]', '[/b]');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll 0px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_italic" title="Italic" href="#" onclick="BBCodes.insert('[i]', '[/i]');return false;"> 
            <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -20px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_underline" title="Subliniat" href="#" onclick="BBCodes.insert('[u]', '[/u]');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -40px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_strikethrough" title="T&#259;iat" href="#" onclick="BBCodes.insert('[s]', '[/s]');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -60px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_quote" title="Citat" href="#" onclick="BBCodes.insert('[quote=Author]', '[/quote]');return false;"> 
            <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -140px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                  <a id="bb_button_img" title="Imagine" href="#" onclick="BBCodes.insert('[img]', '[/img]');return false;"> 
            <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -180px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a>
				<a id="bb_button_color" title="Culoare" href="#" onclick="BBCodes.insert('[color=]', '[/color]');return false;"> 
            <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -200px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_url" title="URL" href="#" onclick="BBCodes.insert('[url]', '[/url]');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -160px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_spoiler" title="Spoiler" href="#" onclick="BBCodes.insert('[spoiler]', '[/spoiler]');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -260px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_player" title="Juc&#259;tori" href="#" onclick="BBCodes.insert('[player]', '[/player]');return false;"> 
            <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -80px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_tribe" title="Triburi" href="#" onclick="BBCodes.insert('[ally]', '[/ally]');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -100px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_coord" title="Coordonate" href="#" onclick="BBCodes.insert('[village]', '[/village]');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -120px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a>
				<a id="bb_button_li" title="Punct inaintea textului" href="#" onclick="BBCodes.insert('[li]', '[/li]');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -280px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a>
    
                <?php echo '
                <script type="text/javascript">
                    $(document).ready(function(){
                        BBCodes.init({target : \'#message\'});
                    });
                </script>
                '; ?>

    
            </div>            
      </td>
    </tr>
<tr><td colspan="2"><textarea cols=67 rows=10 id="message" name=message></textarea></td></tr>
<tr><td colspan=2 align=center><input type=submit value=OK /></td></tr>
</table>
</form>

<?php 
}else {
 ?>

<h2>Support</h2>
<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=support&do=new_ticket"><img style="border:1px;" src="../graphic/support/ticket.gif" /></a> 
<br>

<table class="vis" width="700">

<tr>
		<th>Assunto</th>
		<th>Última resposta</th>
	</tr>
	<?php 
	$id_user=$this->_tpl_vars['user']['id'];
$sql3 = "select * from `support` where  uid = '$id_user'";
	   $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
	   while ($array2 = mysql_fetch_array($exec_sql2)) {
		  $id_q[] = $array2['id'];
		  $new[] = $array2['new'];
		  $subject[] = $array2['subject'];
		  $date[] = $array2['date'];
		  $inchis[] = $array2['block'];
		  
	   }
	   $select = mysql_num_rows(mysql_query("SELECT * FROM support WHERE uid = '$id_user'"));
	   if ($select > 0) {
	   foreach ($id_q as $key => $value) {
			 if ($id_q<>0) {
			  ?>
	<tr>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=support&view=ticket&id=<?php  print $id_q[$key];  ?>">
			
			<?php 
			if ($inchis[$key] == '1' )
			{
			$read = 'thread_close.png';
			}
			elseif($inchis[$key] == '2' )
			{
			$read = 'thread_closed.png';
			}
			elseif($inchis[$key] == '0')
			{
if ($new[$key] == '0')
			{
			$read = 'thread_read.png';
			}			
			elseif ($new[$key] == '1')
			{
			$read = 'thread_unread.png';
			}
			} ?>
			<img src="../graphic/forum/<?php  echo $read;  ?>">
			<?php 
			echo stripslashes(urldecode($subject[$key]));  ?></td>
			<td><?php  echo $date[$key];  ?></td>
			</tr>
			<?php 
			 }
      } }
	   ?>
</table>
<?php } } ?>