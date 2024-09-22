<?
	require_once("../inc/config.inc.php");

	if($_GET['action'] == 'logout'){
		setcookie('admname', '', time());
		setcookie('session', '', time());
		header("Location: index.php");
	}

	$admname = $func->EscapeString($_COOKIE['admname']);
	$session = $func->EscapeString($_COOKIE['session']);
	if(!empty($admname) && !empty($session)){
		$check = $db->fet_array($db->query("SELECT * FROM `admin` WHERE `username` = '".$admname."'"));
		if($check['session'] == $session){
			$time->start();
			$new_ticket = $db->num($db->query("SELECT * FROM `support` WHERE `newadm` = '1'"));
			$db->query("UPDATE `admin` SET `last_activity` = '".time()."' WHERE `username` = '".$admname."'");
			if($new_ticket != 0){
				$back =  ' style="background-image:url(\'../graphic/layout/th_rep.gif\');" title="'.$new_ticket.' Novo(s) ticket(s)"';
			}
			$staff = $db->fet_array($db->query("SELECT * FROM `admin` WHERE `level` > '0'"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
	<title>Painel Administrativo - Empire of War</title>
	<link rel="stylesheet" href="../css/game.css" type="text/css" />
	<link rel="stylesheet" href="../css/admin.css" type="text/css" />
	<link rel="icon" href="../graphic/icons/rabe.png" type="image/x-icon"> 
	<link rel="shortcut icon" href="../graphic/icons/rabe.png" type="image/x-icon">
	<script type="text/javascript" src="../js/script.js"></script>
	<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/func.js"></script>
	<!--[if IE 6]>
		<script type="text/javascript">document.execCommand("BackgroundImageCache",false,true);</script>
	<![endif]-->
</head>
<body>
<table cellspacing="0" width="100%">
	<tr>
		<td width="250" valign="top">
			<table class="main" width="100%" cellspacing="0">
				<tr>
					<td>
						<table class="vis" width="100%" style="border-spacing:1px; background-color:#FEE47D;">
							<tr><th>Menu principal</th></tr>
<?
			if($handle = opendir('extern_modules')){
				while(false !== ($file = readdir($handle))){
					if($file != "." && $file != ".."){
						require_once("extern_modules/".$file);
						if($check['level'] >= $level){
?>
							<tr><td<? if($_GET['screen']==$url){echo ' class="selected"';} if($new_ticket!=0 && $url=='support'){echo $back;} ?>>
								<a href="menu.php?screen=<?=$url;?>"><? if($_GET['screen']==$url){ ?>&raquo; <? } ?><?=$name;?></a>
							</td></tr>
<?
						}
					}
				}
				closedir($handle);
			}
?>
							<tr><td><a href="menu.php?action=logout">Sair</a></td></tr>
						</table>
					</td>
				</tr>
				<tr>
					<td>
						<table class="vis" width="100%" style="border-spacing:1px; background-color:#FEE47D;">
							<tr><th colspan="3">Equipe</th></tr>
							<tr><th width="10" style="text-align:center;">#</th><th>Nome</th><th>IP</th></tr>

<?
			$sql7 = "SELECT * FROM `admin` WHERE `level` > '0' ORDER BY `id` ASC";
			$exec_sql6 = $db->query($sql7);
			$nr_activ = $db->num($exec_sql6);
			if($nr_activ <> 0){
				while($array2 = $db->fet_array($exec_sql6)){
					$id_activ[] = $array2['id'];
				}
			}
			foreach($id_activ as $key => $value){
				$sqlstaff = $db->query("SELECT `username`,`last_activity`,`last_ip` FROM `admin` WHERE `id`='$id_activ[$key]'");
				while($array2 = $db->fet_array($sqlstaff)){
					$username = $func->EscapeString(urldecode($array2['username']));
					$last_activity = $array2['last_activity'];
					$last_ip = $array2['last_ip'];
				}
				$admtmp = time()-300;
				if($last_activity >= $admtmp){
					$online = true;
				}else{
					$online = false;
				}
?>
							<tr> 
								<td align="center"><? if($online){echo'<img src="../graphic/dots/green.png" title="Online" />';}else{echo'<img src="../graphic/dots/red.png" title="Offline" />';} ?></td>
								<td align="center"><b><?=$username;?></a></b></td>
								<td align="center"><? if($online){echo $last_ip;}else{echo'<b>---</b>';}?></a></td>
							</tr> 
			<? } ?>
						</table> 
					</td>
				</tr>
			</table>
		</td>
		<td width="*" valign="top">
			<table class="main" width="98%" align="center">
				<tr>
					<td style="padding:2px;">
						<table width="100%" align="center" cellspacing="1">
							<tr>
								<td valign="top" width="100%">
<?
								$screen = $_GET['screen'];
								if($screen){
									require_once("extern_modules/$screen.php");
									if($check['level'] >=  $level){
										require_once("actions/menu_$screen.php");
									}else{
										echo '<div class="error">Você não possui permissão para acessar este item.</div>';
									}
								}else{
									header('Location: menu.php?screen=home');
								}
?>
								</td>
							</tr>
						</table>
					</td>
				</tr>
				<tr><th><span style="float:right;">Gerado em <?=$time->result();?>ms | Hora do Servidor: <span id="serverTime"><?=date("H:i:s", time());?></span> | <?=date("d.m.Y");?></span></th></tr>
			</table>
			<table class="corp" width="98%" align="center">
				<tr>
					<td class="corp_s"></td>
					<td class="header" width="90%">
						<div class="noob">
							<b>Conta:</b> <?=urldecode($_COOKIE['admname']);?> | 
							<b>N&iacute;vel de acesso:</b> <?=$check['level'];?> | 
							<b>&Uacute;ltimo acesso:</b> <?=date("d.m.Y H:i",$check['last_visit']);?>
							<b>Logado &agrave;:</b> <?=$func->FormatTime(time()-$check['last_visit'], true);?>
						</div>
					</td>
					<td class="corp_s"></td>
				</tr>
			</table>
			<table class="main" width="98%" align="center">
				<tr><th style="text-align:center;">&copy;<?=date("Y");?> | Empire of War - Todos os direitos reservados</th></tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>
<?
		}else{
			header("Location: index.php");
		}
	}else{
		header("Location: index.php");
	}
?>