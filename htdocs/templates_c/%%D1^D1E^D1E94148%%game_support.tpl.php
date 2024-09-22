<?php /* Smarty version 2.6.14, created on 2012-12-29 10:41:08
         compiled from game_support.tpl */ ?>
<h2>Support</hi2><?php 
$idsat=$this->_tpl_vars['village']['id'];
$username=$this->_tpl_vars['user']['username'];
$id_user=$this->_tpl_vars['user']['id'];
$subiect = urlencode($_POST['subject']);
$mesaj = $_POST['message'];
$data =  date("d.m.Y H:i");
if ($_GET['screen'] == 'support' AND $_GET['do'] == 'new' AND (isset($_GET['send']))){
if (strlen($subiect) <= 4){
		$error = '<tr><td colspan="2"><font color="red"><b>Subiectul trebuie sa contina cel putin 4 caractere!</b></font></td></tr>';
	}
	if (strlen($subiect) >= 21){
		$error = '<tr><td colspan="2"><font color="red"><b>Subiectul trebuie sa contina cel mult 20 de caractere!</b></font></td></tr>';
	}

if (strlen($mesaj) <= 5)
{
$error = '<tr><td colspan="2"><font color="red"><b>Mesajul trebuie sa contina cel putin 6 caractere</b></font></td></tr>';
}
	if (!$error)
	{
	$sql3 = "INSERT INTO `support` (subject, message,uid,date,username) VALUES ('$subiect', '$mesaj','$id_user','$data','$username')";
         $exec_sql2 = mysql_query($sql3) or die(mysql_error());
		 header("Location: game.php?village=$idsat&screen=support&action=succes");
	}
}
 ?>

<h5></h5>
	<br>
<table class="vis" width="800">
<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=support&do=new"><img style="border:1px;" src="graphic/ticket_new.png" /></a>  <h5>Ticketele tale</h5>	<tr>
		<th>Subiect</th>
		<th>Mesaj</th>
		<th>Trimis</th>
	</tr>
	<?php 
$sql3 = "select * from `support` where uid = '$id_user' and display = '0'";
	   $exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
	   while ($array2 = mysql_fetch_array($exec_sql2)) {
		  $mesaj_q[] = $array2['message'];
		  $id_q[] = $array2['id'];
		  $subject[] = $array2['subject'];
		  $date[] = $array2['date'];
		  
	   }
	   $select = mysql_num_rows(mysql_query("SELECT * FROM support WHERE uid = '$id_user' AND display = '0'"));
	
	  if ($select > 0) {
	   foreach ($id_q as $key => $value) {
			 if ($id_q<>0) {
			 
		echo '<tr>
			<td>',urldecode($subject[$key]),'</td>
			<td>',$mesaj_q[$key],'</td>
			<td>',$date[$key],'</td>
			<td><a href="game.php?village=',$idsat,'&screen=support&action=delete&id=',$id_q[$key],'">Sterge</td>
			</tr>';
			 }
      }
	  if ($_GET['action'] == 'delete')
	  {
	  $id = $_GET['id'];
	  mysql_query("UPDATE support SET display = '1' WHERE id = '$id'");
	  header("Location: game.php?village=$idsat&screen=support");
	  }

		  }
$idsat11 = $_GET['village'];           
 ?>
</table>
<?php 
if ($_GET['do'] == 'new'){
     ?>
<br />
<form method=post action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=support&do=new&send">
<table class="vis" width="570" align=center>
<tr><th colspan="2">Ticket nou</th></tr>
<?php 
echo $error;
if ($_GET['action'] == 'succes')
{
$succes = '<tr><td colspan="2"><font color="green"><b>Mesajul a fost trimis!</b></font></td></tr>';
echo $succes;
}
 ?>
<tr><td width=100><b>Subiect</b></td><td><input type=text name=subject size="25"/></td></tr>

    
            </div>            
      </td>
    </tr>
<tr><td colspan="2"><textarea cols=67 rows=10 id="message" name=message></textarea></td></tr>
<tr><td colspan=2 align=center><input type=submit value=Trimite /></td></tr>
</table>
</form>
<?php } ?>