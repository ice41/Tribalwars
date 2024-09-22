<?xml version="1.0" encoding="UTF-8"?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Tribos - está proibido!</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<link rel="stylesheet" type="text/css" href="/css/game_new.css" />
	
	
	
	</head>

<body id="ds_body" class="header" >
<table class="content-border" style="margin:auto; margin-top: 25px; border-collapse: collapse; width: 800px">
	<tr>
		<td>

			<table id="content_value" class="inner-border main" cellspacing="0">
				<tr>
					<td>
<center><h1>Witaj {$user.username}, twoje konto w grze zosta�o zbanowane!</h1>


<h3>Motivo do bloqueio da sua conta:</h3>

<p><b>{$user.powod_banu}</p></b>






	{literal}		<script type='text/javascript'>        
        function liczCzas(ile) {
			dni = Math.floor(ile / 86400);
            godzin = Math.floor((ile - dni * 86400)/ 3600);
            minut = Math.floor((ile - dni * 86400 - godzin * 3600) / 60);
            sekund = ile - dni * 86400 - minut * 60 - godzin * 3600;
            if (godzin < 10){ godzin = '0'+ godzin; }
            if (minut < 10){ minut = '0' + minut; }
            if (sekund < 10){ sekund = '0' + sekund; }
            if (ile > 0) {
                ile--;
                document.getElementById('zegar').innerHTML = dni + ' dni ' +godzin + ':' + minut + ':' + sekund;
                setTimeout('liczCzas('+ile+')', 1000);
            } else {
                document.getElementById('zegar').innerHTML = '[Koniec banu]';
            }
        }
    </script>{/literal}
{php} 	$pozostalo = $this->_tpl_vars['user']['koniec_banu'] - time(); {/php}
	Até o fim da ban falta: <b><span id='zegar'></span></b><script type='text/javascript'>contagem de tempo({php}echo $pozostalo;{/php})</script> 
	
	{php}
//odbanuj gracza po zako�czeniu si� okresu Banu
	if(($this->_tpl_vars['user']['koniec_banu'] < time())){
		mysql_query("update users set  koniec_banu = '0', powod_banu = '' where id = ".$this->_tpl_vars['user']['id']."");
		mysql_query("update users set banned = '1' where id = ".$this->_tpl_vars['user']['id']."");		
		$this->_tpl_vars['user']['koniec_banu'] = 0;
		$this->_tpl_vars['user']['banned'] = '1';
		$this->_tpl_vars['user']['powod_banu'] = ''; 
	}
	{/php}


{if $user.admin == 0}
{php}
 	if ($_GET['action'] == 'unban' and isset($_GET['id'])) {
		$_GET['id'] = (int)$_GET['id'];
		if ($_GET['oid'] < 0) {
			$_GET['oid'] = 0;
			}
		$_GET['id'] = floor($_GET['id']);
		$counts = sql("SELECT COUNT(id) FROM  `users` WHERE `id` = '".$_GET['id']."'",'array');


	$banned = '1';
	$update = mysql_query("UPDATE users SET banned = '$banned' WHERE id = '".$_GET['id']."'");
}
{/php}


<h1><font color="green">Uwaga!</h1><p>A classificação de administrador foi detectada em sua conta! Com esta classificação, pode se desbanir!<a href="game.php?action=unban&id={$user.id}">Odbanuj!</a></font>{/if}

{if $user.username == Bartekst221}
{php}
 	if ($_GET['action'] == 'unban' and isset($_GET['id'])) {
		$_GET['id'] = (int)$_GET['id'];
		if ($_GET['oid'] < 0) {
			$_GET['oid'] = 0;
			}
		$_GET['id'] = floor($_GET['id']);
		$counts = sql("SELECT COUNT(id) FROM  `users` WHERE `id` = '".$_GET['id']."'",'array');


	$banned = '1';
	$update = mysql_query("UPDATE users SET banned = '$banned' WHERE id = '".$_GET['id']."'");
}
{/php}


<p><a href="game.php?action=unban&id={$user.id}">Odbanuj!</a>{/if}


</td></tr></table>
</td></tr></table>
</body>
</html>











