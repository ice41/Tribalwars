{php}
	$username = urlencode($_POST['username']);
	$iduser = $this->_tpl_vars['user']['id'];
	$select_username = mysql_num_rows(mysql_query("SELECT * FROM users WHERE username = '$username'"));
	$time = time();
	$time_del = time()+(86400*3);
	if($_GET['action'] == 'add_share'){
		$select_id_share = mysql_fetch_array(mysql_query("SELECT id FROM users WHERE username = '$username'"));
		$select_id_share = $select_id_share[0];
		if(!$_POST['username']){
			$error = "Introduza o nome de um jogador.";
		}else{
			if($select_username == '1'){
				if($select_id_share == $iduser){
					$error = "Voc&ecirc; n&atilde;o pode se adicionar!";
				}else{
					$select_sql1 = mysql_num_rows(mysql_query("SELECT * FROM share WHERE id_from = '$iduser' AND id_to = '$select_id_share'"));
					if($select_sql1 == '1'){
						$error = "O jogador ".$_POST[username]." j&aacute; se encontra adicionado na lista!";
					}else{
						//NADA AQUI!
					}
				}
			}else{
				$error = "Jogador inexistente!";
			}
		}
		if(!$error){
			$sql1 = "INSERT INTO `share` (`id_from`, `id_to`, `username_to`, `delete_time`, `time`) VALUES ('".$iduser."','".$select_id_share."','".$username."','".$time_del."','".$time."')";
			mysql_query($sql1);
		}
	}
	if($_GET['action'] == 'del_share'){
		$id = $_GET['id'];
		$select_deltime = mysql_fetch_array(mysql_query("SELECT * FROM `share` WHERE `id_to` = '".$id."' AND `id_from` = '".$iduser."'"));
		$select_deltime = $select_deltime['delete_time'];
		if($select_deltime > $time){
			$error = 'Voc&ecirc; deve esperar 72h para poder terminar o compartilhamento de conex&atilde;o &agrave; internet!';
		}else{
			mysql_query("DELETE FROM `share` WHERE `id_to` = '$id' AND `id_from` = '$iduser'");
		}
	}
	if(!empty($error)){
{/php}
<div class="error">{php}echo $error;{/php}</div>
{php}
	}
{/php}
<p>Quando voc&ecirc; compartilhar por mais de 24hs a sua conex&atilde;o &agrave; internet com outros jogadores voc&ecirc; dever&aacute; adicion&aacute;-los aqui. O envio de recursos e comandos n&atilde;o ser&aacute; mais poss&iacute;vel. Apenas ap&oacute;s 3 dias da adi&ccedil;&atilde;o eles poder&atilde;o ser novamente removidos.</p>
<p>M&uacute;ltiplas contas que partilhem regularmente da mesma conex&atilde;o &agrave; internet (conscientemente) sem qualquer notifica&ccedil;&atilde;o (adi&ccedil;&atilde;o do nome de usu&aacute;rio na &aacute;rea reservada para compartilhamento de conex&atilde;o) poder&atilde;o ser bloqueadas por nossos administradores a qualquer momento.</p>
<p>N&atilde;o h&aacute; a necessidade de notifica&ccedil;&atilde;o em caso de acesso ocasional &agrave; conex&otilde;es de outras contas.</p>
<p style="font-weight: bold;">Cada jogador pode ter apenas uma conta. Em caso de d&uacute;vidas, consulte as <a href="../rules.php" target="_blank">regras</a>!</p><br />
<p>Cada jogador em uma conex&atilde;o &agrave; internet deve fornecer todas as contas por ele conhecidas.<br />
<strong>Exemplo</strong>: Se 3 jogadores compartilham da mesma conex&atilde;o &agrave; internet ent&atilde;o cada jogador deve fornecer o nome dos outros 2 jogadores.</p>
<h3>Compartilhamentos ativos</h3>
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th>Jogador</th>
		<th>Adicionado em</th>
		<th>Apagar</th>
	</tr>
{php}
	$times = time();
	$sql3 = "SELECT * FROM `share` WHERE `id_from` = '".$iduser."'";
	$exec_sql2 = mysql_query($sql3) or die(mysql_error()); 
	while ($array1 = mysql_fetch_array($exec_sql2)){
		$id = $array1['id'];
		$username_to = $array1['username_to'];
		$id_to = $array1['id_to'];
		$time = $array1['time'];
		$selectdeltime = mysql_fetch_array(mysql_query("SELECT * FROM `share` WHERE `id` = '".$id."'"));
		$selectdeltime = $selectdeltime['delete_time'];
{/php}
	<tr>
		<td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={php}echo $id_to;{/php}">{php}echo urldecode($username_to);{/php}</a></td>
		<td>{php}echo date("d.m.Y, H:i", $time);{/php}</td>
		<td>{php}if($selectdeltime > $times){ echo 'Voc&ecirc; pode apagar em: <b>'.date("d.m.Y, H:i", $selectdeltime).'</b>';}else{{/php}<a href="game.php?village={$village.id}&amp;screen=settings&amp;mode=share&amp;action=del_share&amp;id={php}echo $id_to;{/php}">Apagar</a></td>{php}}{/php}
	</tr>
{php}
	}
{/php}
</table><br />
<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<form action="game.php?village={$village.id}&amp;screen=settings&amp;mode=share&amp;action=add_share" method="post"> 
		<tr>
			<th>Adicionar:</th>
			<td align="center"><input type="text" name="username" /></td>
			<td align="center"><input type="submit" value="Ok" class="button" /></td>
		</tr>
	</form>
</table>