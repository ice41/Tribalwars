{php}
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
	   

{/php}
<table class="vis" width="700">
<h3><a href="game.php?village={$village.id}&screen=admin&mode=support"> Support </a> => {php} echo stripslashes(urldecode($subject_topic)); if ($block_topic != 0) {} else { echo '[Bloqueado]'; } {/php}</h3>
<tr>
	<th>{php} echo urldecode($username_topic); echo "<font size='1'> ".$date_topic; {/php}</font></th>

</tr>
<tr>
			<td>{php} echo stripslashes(nl2br(urldecode($message_topic))); {/php}</td>
			</tr>
			
			
		{php}
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
			 
		
		{/php}
<tr>
	<th>{php} 
	if ($nume[$key] == $username){ echo '<span style="color: green">'.urldecode($nume[$key]).'</span>'; } else { echo urldecode($nume[$key]); }  echo " <font size='1'>".$date[$key]; {/php}</font></th>

</tr>
		<tr>
			<td>{php} echo stripslashes(nl2br(urldecode($mesaj_q[$key]))) {/php}</td>
			
			</tr>
			{php}
			 }
      } }
		{/php}
			</table>
			<Br>
			<form method=post action="game.php?village={$village.id}&screen=admin&mode=support&view=ticket&do=post&id={php} echo $id; {/php}">
<table class="vis" width="570">
<tr><th colspan="2">{$lang.admin.support.add_odp}</th></tr>
{php}
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

{/php}
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

        
    
                {literal}
                <script type="text/javascript">
                    $(document).ready(function(){
                        BBCodes.init({target : '#message'});
                    });
                </script>
                {/literal}
    
            </div>            
      </td>
    </tr>
<tr><td colspan="2"><textarea cols=67 rows=10 id="message" name=message_post></textarea></td></tr>
<tr><td colspan=2 align=center><input type=submit name="write" value="{$lang.admin.buttons.ok}" /></form>

{php} 
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
{/php}
<form  method=post action="game.php?village={$village.id}&screen=admin&mode=support&view=ticket&do=open_ticket&id={php} echo $id; {/php}"><input type=submit name="open" value="{$lang.admin.support.open}"" /></form></td></tr>
</table>
{php}
}
else
{
{/php}

<form  method=post action="game.php?village={$village.id}&screen=admin&mode=support&view=ticket&do=close&id={php} echo $id; {/php}"><input type=submit name="close" value="{$lang.admin.support.close}" /></form></td></tr>
</table>

{php}
}}
else
{
{/php}
<h3>{$lang.admin.support.list}</h3><br />
<table class="vis" width="100%">
 <tr>
 <th>{$lang.admin.support.listsubject}</th>
  <th>{$lang.admin.support.listplayer}</th>
   <th>{$lang.admin.support.listcreate}</th>
 </tr>
{foreach from=$support item=s}

<td>
<a href="game.php?village={$village.id}&screen=admin&mode=support&view=ticket&id={$s.id}">
{if $s.block != '0'}
<img src="../graphic/forum/thread_closed.png">
{elseif $s.new_admin == '1'}
<img src="../graphic/forum/thread_unread.png">
{else}
<img src="../graphic/forum/thread_read.png">

{/if}
{php}
$tests = stripslashes(urldecode($this->_tpl_vars['s']['subject']));
echo $tests;
{/php}
</a>
</td>
<td>
{if $s.block != '0'}
<img src="../graphic/forum/thread_closed.png">
{elseif $s.new == '1'}
<img src="../graphic/forum/thread_unread.png">
{else}
<img src="../graphic/forum/thread_read.png">

{/if}<a href="game.php?village={$village.id}&screen=admin&mode=users&id={$s.uid}">{php}
$this->_tpl_vars['s']['username']=urldecode($this->_tpl_vars['s']['username']);
{/php}{$s.username}</a>
</td>
<td>{$s.date}</td>


<tr>
{/foreach}
</table>
{php}}{/php}