<p>Se voc&ecirc; achar que n&atilde;o tem a chance de de desenvolver com sucesso na regi&atilde;o, voce&ecirc; pode recome&ccedil;ar com outra aldeia. Mas suas aldeias antigas ser&atilde;o abandonadas e voc&ecirc; pode estabelecer-se noutro local com uma nova aldeia.</p>
{php}
	include("include/config.php");
	$userid = $this->_tpl_vars['user']['id'];
	$select = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$userid."'"));
	$new_begin_time = $select['new_begin_time'];
	$time = time();
	if($time >= $new_begin_time){
{/php}
<form action="game.php?village={$village.id}&screen=settings&mode=start&do=new_begin" method="post">
	<table class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr>
			<th>Senha:</th>
			<td align="center"><input type="password" name="password" /></td>
			<td align="center"><input type="submit" onclick="return confirm('Aten&ccedil;&atilde;o: Todas suas aldeias, pontos e tropas ser&atilde;o perdidos. Continuar est&aacute; a&ccedil;&atilde;o?');" value="Recome&ccedil;ar" class="button" /></td>
		</tr>
	</table>
</form>
{php}
	}else{
{/php}
<h3>Voc&ecirc; poder&aacute; recome&ccedil;ar novamente em <span class="timer">{$new_begin_time|format_time}</span>!</h3>
<table class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th>Voc&ecirc; recome&ccedil;ou em:</th>
		<td>{php}echo date("d.m.Y, H:i:s", $new_begin_time);{/php}</td>
	</tr>
</table>
{php}
	}
{/php}