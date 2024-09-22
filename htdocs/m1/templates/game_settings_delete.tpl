{php}
	$iduser = $this->_tpl_vars['user']['id'];
	$senha = md5($_POST['password']);
	$delete_time = time()+(86400*3);

	$select_pw = mysql_fetch_array(mysql_query("SELECT * FROM `login`.`users` WHERE `id` = '$iduser'")) or die(mysql_error());

	if($_POST['submit']){
		if($select_pw['password'] == $senha){
			mysql_query("UPDATE `users` SET `delete_acc` = '$delete_time' WHERE `id` = '$iduser'") or die(mysql_error());
			header("Location: game.php");
		}else{
			$error = 'Senha Invalida!';
		}
	}
{/php}
<h3>Apagar conta</h3>
<p>Aqui voc&ecirc; pode apagar sua conta caso queira desistir do jogo ou qualquer outro motivo.</p>
<p>A conta &eacute; excluida em 3 dias, antes deste prazo voc&ecirc; pode retirar a solicita&ccedil;&atilde;o de apagamento da conta.</p>
{php}if(!empty($error)){{/php}<div class="error">{php}echo $error;{/php}</div><br />{php}}{/php}
<form action="game.php?village={$village.id}&amp;screen=settings&amp;mode=delete&amp;action=delete_acc" method="post">
	&raquo; Senha: <input type="password" name="password" value=""> <input type="submit" name="submit" value="Apagar" class="button" />
</form>