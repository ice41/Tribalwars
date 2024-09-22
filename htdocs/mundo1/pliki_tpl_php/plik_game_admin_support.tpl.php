<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2022-11-30 20:30:38
         Wersja PHP pliku pliki_tpl/game_admin_support.tpl */ ?>
<?php 
$username=$this->_tpl_vars['user']['username'];
$data =  date("d.m.Y H:i");
if ($_GET['view'] == 'ticket')
{
$id = $_GET['id'];
mysql_query("UPDATE support SET new_admin = '0' WHERE id = '$id'");
 $selectare = mysql_fetch_array(mysql_query("SELECT message,date,subject,username,uid,block FROM support WHERE id = '$id'"));
	   $message_topic = $selectare[0];
	   $date_topic = $selectare[1];
	   $subject_topic = $selectare[2];
	   $username_topic = $selectare[3];
	   $uid = $selectare[3];
	   $block_topic = $selectare[4];
	   

 ?>
<table class="vis" width="700">
<h3><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=admin&mode=support"> Support </a> => <?php  echo stripslashes(urldecode($subject_topic)); if ($block_topic != 0) {} else { echo '[Bloqueado]'; }  ?></h3>
<tr>
	<th><?php  echo urldecode($username_topic); echo "<font size='1'> ".$date_topic;  ?></font></th>

</tr>
<tr>
			<td><?php  echo stripslashes(nl2br(urldecode($message_topic)));  ?></td>
			</tr>
			
			
		<?php 
		$sql3 = "select * from `support_post` where  id_ticket ='$id'";
	   $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
	   while ($array2 = mysql_fetch_array($exec_sql2)) {
		  $mesaj_q[] = $array2['message'];
		  $id_q[] = $array2['id'];
		  $date[] = $array2['date'];
		  $nume[] = $array2['username'];
		  
		  
	   }
	   $select = mysql_num_rows(mysql_query("SELECT * FROM support_post WHERE id_ticket = '$id'"));
	  if ($select > 0) {
	   foreach ($id_q as $key => $value) {
			 if ($id_q<>0) {
			 
		
		 ?>
<tr>
	<th><?php  
	if ($nume[$key] == $username){ echo '<span style="color: green">'.urldecode($nume[$key]).'</span>'; } else { echo urldecode($nume[$key]); }  echo " <font size='1'>".$date[$key];  ?></font></th>

</tr>
		<tr>
			<td><?php  echo stripslashes(nl2br(urldecode($mesaj_q[$key])))  ?></td>
			
			</tr>
			<?php 
			 }
      } }
		 ?>
			</table>
			<Br>
			<form method=post action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=admin&mode=support&view=ticket&do=post&id=<?php  echo $id;  ?>">
<table class="vis" width="570">
<tr><th colspan="2"><?php echo $this->_tpl_vars['lang']['admin']['support']['add_odp']; ?>
</th></tr>
<?php 
if ($_GET['do'] == 'close')
{
$mesaj_postat1 = urlencode($_POST['message_post']);
$id_ticket1 = $_GET['id'];


mysql_query("UPDATE support SET block = '1' WHERE id = '$id_ticket1'");

}
if ($_GET['do'] == 'post')
{
$id_ticket = $_GET['id'];
$mesaj_postat = urlencode($_POST['message_post']);



if (strlen($mesaj_postat) <= 1)
{
$error1 = '<tr><td colspan="2"><font color="red"><b>{$lang.admin.errors.support.post_0}</b></font></td></tr>';
} else { $error1 = ''; }
if ($error1 == '')
{
$sql3 = "INSERT INTO `support_post` (message,uid,date,username,id_ticket) VALUES ('$mesaj_postat',-1,'$data','$username','$id_ticket')";
         $exec_sql2 = mysql_query($sql3) or die(mysql_error());
		 $selectare = mysql_fetch_array(mysql_query("SELECT uid FROM support WHERE id = '$id_ticket'"));
	   $uid_topic = $selectare[0];
		 mysql_query("UPDATE support SET new = '1' WHERE id = '$id'");	 
		 mysql_query("UPDATE users SET support_new = '1' WHERE id = '$uid_topic'");
		 header("Location: game.php?village=".$village['id']."&screen=admin&mode=support&view=ticket&id=$id");
}
}
eb

 ?>
<tr id="bbcode">
        <td colspan="2">
            <div style="text-align: left; overflow: visible;">
                <a id="bb_button_bold" title="Ameaçador" href="#" onclick="BBCodes.insert('<b>', '</b>');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll 0px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_italic" title="Itálico" href="#" onclick="BBCodes.insert('<i>', '</i>');return false;"> 
            <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -20px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_underline" title="Estresse" href="#" onclick="BBCodes.insert('<u>', '</u>');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -40px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_strikethrough" title="Tachado" href="#" onclick="BBCodes.insert('<s>', '</s>');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -60px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
  
                  <a id="bb_button_img" title="Imagem" href="#" onclick="BBCodes.insert('<img src=', '/>');return false;"> 
            <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -180px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a>
				<a id="bb_button_color" title="Cor" href="#" onclick="BBCodes.insert('<font color=>', '</font>');return false;"> 
            <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -200px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
                </a> 
                <a id="bb_button_url" title="URL" href="#" onclick="BBCodes.insert('<a href=>', '</a>');return false;"> 
                    <div style="display: inline-block; background: url(&quot;../graphic/bbcodes/bbcodes.png?1&quot;) no-repeat scroll -160px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div> 
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
<tr><td colspan=2 align=center><input type=submit name="write" value="<?php echo $this->_tpl_vars['lang']['admin']['buttons']['ok']; ?>
" /></form>

<?php  
if ($_GET['do'] == 'open_ticket')
{
$id = $_GET['id'];
mysql_query("UPDATE support SET block = '0' WHERE id = '$id'");
header("Location: game.php?village=".$village['id']."&screen=admin&mode=support&view=ticket&id=$id");
}
$select_block = mysql_fetch_array(mysql_query("SELECT block FROM support WHERE id = '$id'"));
$select01 = $select_block[0];
if ($select01 != '0')
{
 ?>
<form  method=post action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=admin&mode=support&view=ticket&do=open_ticket&id=<?php  echo $id;  ?>"><input type=submit name="open" value="<?php echo $this->_tpl_vars['lang']['admin']['support']['open']; ?>
"" /></form></td></tr>
</table>
<?php 
}
else
{
 ?>

<form  method=post action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=admin&mode=support&view=ticket&do=close&id=<?php  echo $id;  ?>"><input type=submit name="close" value="<?php echo $this->_tpl_vars['lang']['admin']['support']['close']; ?>
" /></form></td></tr>
</table>

<?php 
}}
else
{
 ?>
<h3><?php echo $this->_tpl_vars['lang']['admin']['support']['list']; ?>
</h3><br />
<table class="vis" width="100%">
 <tr>
 <th><?php echo $this->_tpl_vars['lang']['admin']['support']['listsubject']; ?>
</th>
  <th><?php echo $this->_tpl_vars['lang']['admin']['support']['listplayer']; ?>
</th>
   <th><?php echo $this->_tpl_vars['lang']['admin']['support']['listcreate']; ?>
</th>
 </tr>
<?php $_from = $this->_tpl_vars['support']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['s']):
?>

<td>
<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=admin&mode=support&view=ticket&id=<?php echo $this->_tpl_vars['s']['id']; ?>
">
<?php if ($this->_tpl_vars['s']['block'] != '0'): ?>
<img src="../graphic/forum/thread_closed.png">
<?php elseif ($this->_tpl_vars['s']['new_admin'] == '1'): ?>
<img src="../graphic/forum/thread_unread.png">
<?php else: ?>
<img src="../graphic/forum/thread_read.png">

<?php endif; ?>
<?php 
$tests = stripslashes(urldecode($this->_tpl_vars['s']['subject']));
echo $tests;
 ?>
</a>
</td>
<td>
<?php if ($this->_tpl_vars['s']['block'] != '0'): ?>
<img src="../graphic/forum/thread_closed.png">
<?php elseif ($this->_tpl_vars['s']['new'] == '1'): ?>
<img src="../graphic/forum/thread_unread.png">
<?php else: ?>
<img src="../graphic/forum/thread_read.png">

<?php endif; ?><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=admin&mode=users&id=<?php echo $this->_tpl_vars['s']['uid']; ?>
"><?php 
$this->_tpl_vars['s']['username']=urldecode($this->_tpl_vars['s']['username']);
 ?><?php echo $this->_tpl_vars['s']['username']; ?>
</a>
</td>
<td><?php echo $this->_tpl_vars['s']['date']; ?>
</td>


<tr>
<?php endforeach; endif; unset($_from); ?>
</table>
<?php } ?>