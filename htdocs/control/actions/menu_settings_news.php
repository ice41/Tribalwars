<?
	if($_GET['action'] == 'add'){
		if(strlen($_POST['text']) < 1){
			$error = 'Você deve digitar um texto para a noticia.';
		}
		if(empty($error)){
			$text = $func->EscapeStringHK(urlencode($_POST['text']));
			$author = $_COOKIE['admname'];
			$db->query("INSERT INTO `news` (`text`,`author`,`time`,`type`) VALUES ('".$text."','".$author."','".time()."','".$func->EscapeString($_POST['type'])."')");
		}
	}
	if($_GET['action'] == 'edit'){
		$sql_enews = $db->fet_array($db->query("SELECT * FROM `news` WHERE `id` = '".$func->EscapeString($_GET['id'])."'"));
		if($_GET['do'] == 'edit'){
			if(strlen($_POST['text']) < 1){
				$error = 'Você deve digitar um texto para a noticia.';
			}
			if(empty($error)){
				$id = $func->EscapeString($_GET['id']);
				$text = $func->EscapeStringHK(urlencode($_POST['text']));
				$db->query("UPDATE `news` SET `type` = '".$func->EscapeString($_POST['type'])."' WHERE `id` = '".$id."'");
				$db->query("UPDATE `news` SET `text` = '".$text."' WHERE id = '".$id."'");
				header('Location: menu.php?screen=settings_news&action=edit&id='.$_GET['id']);
			}
		}
?>
<h2>Gerenciar noticias</h2>
<p>Aqui você pode adicionar, editar e apagar noticias que são exibidas dentro do jogo.</p>
<table class="vis" style="border-spacing:1px; background-color:#FEE47D;">
	<form action="menu.php?screen=settings_news&action=edit&id=<?=$_GET['id'];?>&do=edit" method="post">
		<tr><th colspan="2" style="font-size:18px; height:20px;">&raquo; Editar noticia</th></tr>
		<? if($error){ ?><tr><td colspan="2"><div class="error"><?=$error;?></div></td></tr><? } ?>
		<tr><th width="90">Escrita por:</th><td><input type="text" name="author" value="<?=urldecode($sql_enews['author']);?>" disabled="disabled" /></td></tr>
		<tr><th>Tipo:</td><td><select name="type">
			<option value="update" <? if($sql_enews['type'] == 'update'){echo 'selected="select"';}?>>UPDATE</option>
			<option value="important" <? if($sql_enews['type'] == 'important'){echo 'selected="select"';}?>>IMPORTANTE</option>
			<option value="bugfix" <? if($sql_enews['type'] == 'bugfix'){echo 'selected="select"';}?>>BUG FIX</option>
			<option value="anunt" <? if($sql_enews['type'] == 'anunt'){echo 'selected="select"';}?>>AN&Uacute;NCIO</option>
		</select></td></tr>
		<script type="text/javascript">
			$(function() {
				autoresize_textarea('#message');
			});
		</script>
		<tr><th>Noticia:</th><td><textarea rows="6" cols="60" name="text" id="message"><?=urldecode($sql_enews['text']);?></textarea></td></tr>
		<tr><th colspan="2"><span style="float:right"><input type="submit" name="edit" value="Salvar" class="button" /></span></th></tr>
	</form>
</table><br />
<? }else{ ?>
<h2>Gerenciar noticias</h2>
<p>Aqui você pode adicionar, editar e apagar noticias que são exibidas dentro do jogo.</p>
<table class="vis" style="border-spacing:1px; background-color:#FEE47D;">
	<form action="menu.php?screen=settings_news&action=add" method="post">
		<tr><th colspan="2" style="font-size:18px; height:20px;">&raquo; Adicionar noticia</th></tr>
		<? if($error){ ?><tr><td colspan="2"><div class="error"><?=$error;?></div></td></tr><? } ?>
		<tr><th width="90">Escrita por:</th><td><input type="text" name="author" value="<?=urldecode($_COOKIE['admname']);?>" disabled="disabled" /></td></tr>
		<tr><th>Tipo:</td><td><select name="type">
			<option value="update">UPDATE</option>
			<option value="important">IMPORTANTE</option>
			<option value="bugfix">BUG FIX</option>
			<option value="anunt">AN&Uacute;NCIO</option>
		</select></td></tr>
		<script type="text/javascript">
			$(function() {
				autoresize_textarea('#message');
			});
		</script>
		<tr><th>Noticia:</th><td><textarea rows="6" cols="60" name="text" id="message"></textarea></td></tr>
		<tr><th colspan="2"><span style="float:right"><input type="submit" value="Criar" class="button" /></span></th></tr>
	</form>
</table><br />
<? } ?>
<table class="vis" width="100%" style="border-spacing:1px; background-color:#FEE47D;">
	<tr><th colspan="4" style="font-size:18px; height:20px;">&raquo; Todas as noticias</th></tr>
	<tr>
		<th>Escrito por</th>
		<th>Tipo</th>
		<th>Noticia</th>
		<th>A&ccedil;&atilde;o</th>
	</tr>
<?
	if($_GET['action'] == 'del'){
		$db->query("DELETE FROM `news` WHERE `id` = '".$func->EscapeString($_GET['id'])."'");
	}
	if($_GET['action'] == 'active'){
		$db->query("UPDATE `news` SET `stats` = '1' WHERE `id` = '".$func->EscapeString($_GET['id'])."'");
		$sql_wrds = $db->query("SELECT * FROM `worlds` WHERE `world_active` = '1'");
		while($array = $db->fet_array($sql_wrds)){
			$server = $array['world_link'];
			$db->query("UPDATE `$server`.`users` SET `show_announcements` = '1'");
		}
	}
	if($_GET['action'] == 'dezactive'){ $db->query("UPDATE `news` SET `stats` = '0' WHERE `id` = '".$func->EscapeString($_GET['id'])."'"); }

	$sql_news = $db->query("SELECT * FROM news");
	while($array = $db->fet_array($sql_news)){
		if($array['stats'] == '0'){
			$stats = '<a href="menu.php?screen=settings_news&action=active&id='.$array['id'].'">Exibir</ah>';
		}else{
			$stats = '<a href="menu.php?screen=settings_news&action=dezactive&id='.$array['id'].'">Ocultar</ah>';
		}
		if($array['type'] == 'update'){
			$type = '<div class="gamenews_green">UPDATE</div>';
		}elseif($array['type'] == 'important'){
			$type = '<div class="gamenews_red">IMPORTANTE</div>';
		}elseif($array['type'] == 'bugfix'){
			$type = '<div class="gamenews_blue">BUG FIX</div>';
		}elseif($array['type'] == 'anunt'){
			$type = '<div class="gamenews_blue">AN&Uacute;NCIO</div>';
		}
		echo "<tr><td align=\"center\" width=\"130\"><b>".urldecode($array['author'])."</b></td><td width=\"120\"><b>".$type."</b></td><td width=\"*\">".stripslashes(nl2br(urldecode($array['text'])))."</td><td align=\"center\" width=\"180\"><a href='menu.php?screen=settings_news&action=del&id=".$array['id']."'>Apagar</a> | <a href='menu.php?screen=settings_news&action=edit&id=".$array['id']."'>Editar</a> | ".$stats."</td></tr>";
	}
?>
</table>