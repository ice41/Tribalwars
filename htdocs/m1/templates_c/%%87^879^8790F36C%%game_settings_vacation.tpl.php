<?php /* Smarty version 2.6.14, created on 2022-11-26 16:32:27
         compiled from game_settings_vacation.tpl */ ?>
<p>Aqui voc&ecirc; pode perguntar &agrave; algum jogador se ele gostaria de ser o seu substituto enquanto voc&ecirc; se encontra em f&eacute;rias. Tal jogador poder&aacute; acessar a sua conta e jogar por voc&ecirc;. Enquanto isso voc&ecirc; n&atilde;o conseguir&aacute; acessar a sua conta normalmente. Para tanto ter&aacute; que cancelar substitui&ccedil;&atilde;o de f&eacute;rias.</p>
<p>At&eacute; 24 horas horas ap&oacute;s o t&eacute;rmino do modo de f&eacute;rias n&atilde;o s&atilde;o permitidas a&ccedil;&otilde;es de jogo entre a conta que estava em f&eacute;rias e a conta do substituto. Em especial:</p>
<ul>
  <li>Transportes de recursos</li>
  <li>Saque m&uacute;tuo</li>
  <li>Ataques coordenados de ambas as contas</li>
  <li>Envio de tropas de apoio</li>
</ul>
<?php if (empty ( $this->_tpl_vars['user']['vacation_name'] )): ?>
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=vacation&amp;action=sitter_offer&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
	<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr>
			<th>Substituto</th>
			<td><input name="sitter" type="text" /> <input type="submit" value="Ok" class="button" /></td>
		</tr>
    </table>
</form>
<?php else: ?>
	<?php if ($this->_tpl_vars['sid']->is_vacation()): ?>
<?php 
	$id = $this->_tpl_vars['user']['id'];
	$hkey = $this->_tpl_vars['hkey'];
	if($_GET['action'] == 'end_vacation'){
		$h = $_GET['h'];
		mysql_query("DELETE FROM sessions WHERE hkey = '$h'");
		header("Location: index.php");
	}
 ?>
<p><a href="javascript:ask('Deseja terminar a substitui&ccedil;&atilde;o? Voc&ecirc; n&atilde;o ter&aacute; mais acesso a est&aacute; conta!', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=vacation&amp;action=end_vacation&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
')">terminar</a></p>
	<?php else: ?>
<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th width="50">Substituto:</th>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['user']['vacation_id']; ?>
"><?php echo $this->_tpl_vars['user']['vacation_name']; ?>
</a></td>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=vacation&amp;action=sitter_offer_cancel&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">&raquo; terminar</a></td>
	</tr>
</table>
	<?php endif; ?>
<?php endif; ?>
<?php if (count ( $this->_tpl_vars['vacation_accept'] ) > 0 && ! $this->_tpl_vars['sid']->is_vacation()): ?>
<h3>Modo de f&eacute;rias</h3>
<p>Jogadores no qual voc&ecirc; est&aacute; com substituto:</p>
<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr><th width="200" colspan="2">Jogador</th></tr>
	<?php $_from = $this->_tpl_vars['vacation_accept']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
	<tr>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['arr']['username']; ?>
</a></td>
		<td><a href="login_uv.php?id=<?php echo $this->_tpl_vars['id']; ?>
" target="_blank">&raquo; acessar</a></td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
<?php endif; ?>
<?php if (count ( $this->_tpl_vars['vacation'] ) > 0 && ! $this->_tpl_vars['sid']->is_vacation()): ?>
<h3>Pedido</h3>
<p>Aqui s&atilde;o apresentados os jogadores que voc&ecirc; possui o modo de f&eacute;rias ativo.</p>
<table class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th>Jogador</th>
		<th colspan="2">A&ccedil;&atilde;o</th>
	</tr>
	<?php $_from = $this->_tpl_vars['vacation']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
<?php 
	$id=$this->_tpl_vars['id'];
	$nume_player=$this->_tpl_vars['user']['username'];
	$id_player=$this->_tpl_vars['user']['id'];
	$idsat=$this->_tpl_vars['village']['id'];
	$ids = $_GET['player_id'];
	$timp=time();
	if($_GET['action'] == 'sitter_accept' AND $id){
		$s1 = mysql_query("UPDATE users SET vacation_accept = '1' WHERE id = '$ids'");
		header("Location: game.php?village=$idsat&screen=settings&mode=vacation");
		$titlu="$nume_player aceitou a solicitação de substituição de férias!";
		$sql3 = "INSERT INTO `reports` (title, time, type, to_user, from_user, receiver_userid, is_new, in_group, from_username) VALUES ('$titlu', '$timp', 'accept_uv', '$id_to', '$id_player', '$ids', '1', 'other', '$nume_player')";
		$exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
		$sql3 = "UPDATE `users` set `new_report`='1' WHERE `id`='$ids'";
		$exec_sql2 = mysql_query($sql3) or die(mysql_error());
	}elseif($_GET['action'] == 'sitter_reject' AND $id){
		$s2 = mysql_query("UPDATE users SET vacation_accept = '0' WHERE id = '$ids'");
		$s3 = mysql_query("UPDATE users SET vacation_name = '' WHERE id = '$ids'");
		$s4 = mysql_query("UPDATE users SET vacation_id = '-1' WHERE id = '$ids'");
		$titlu="$nume_player recusou a solicitação de substituição de férias!";
		$sql3 = "INSERT INTO `reports` (title, time, type, to_user, from_user, receiver_userid, is_new, in_group, from_username) VALUES ('$titlu', '$timp', 'reject_uv', '$id_to', '$id_player', '$ids', '1', 'other', '$nume_player')";
		$exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
		$sql3 = "UPDATE `users` set `new_report`='1' WHERE `id`='$ids'";
		$exec_sql2 = mysql_query($sql3) or die(mysql_error());
		header("Location: game.php?village=$idsat&screen=settings&mode=vacation");
	}
 ?>
	<tr>
		<td width="200"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['id']; ?>
"><?php echo $this->_tpl_vars['arr']['username']; ?>
</a></td>
		<td width="100"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=vacation&amp;action=sitter_accept&amp;player_id=<?php echo $this->_tpl_vars['id']; ?>
">aceitar</a></td>
		<td width="100"><a href="javascript:ask('Voc&ecirc; deseja recusar o pedido de substitui&ccedil;&atilde;o?', 'game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=vacation&amp;action=sitter_reject&amp;player_id=<?php echo $this->_tpl_vars['id']; ?>
')">recusar</a></td>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
<?php endif; ?>