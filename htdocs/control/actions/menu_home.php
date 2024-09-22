<h2>Regras para GA&rsquo;s e GM&rsquo;s</h2>
<p>Aqui você irá encontrar as regras para um bom desempenho como membro da equipe.</p>
<table class="vis" width="100%" align="center" style="border-spacing:1px; background-color:#FEE47D;">
	<tr><th colspan="5">Submenu</th></tr>
	<tr>
		<td <? if($_GET['rule']=='all'){ ?>class="selected"<? } ?>><a href="menu.php?screen=home&rule=all"><? if($_GET['rule']=='all'){ ?>&raquo; <? } ?>Regras gerais</a></td>
		<td <? if($_GET['rule']=='support'){ ?>class="selected"<? } ?>><a href="menu.php?screen=home&rule=support"><? if($_GET['rule']=='support'){ ?>&raquo; <? } ?>Regras de suporte</a></td>
		<td <? if($_GET['rule']=='ban'){ ?>class="selected"<? } ?>><a href="menu.php?screen=home&rule=ban"><? if($_GET['rule']=='ban'){ ?>&raquo; <? } ?>Regras de banimento</a></td>
		<td <? if($_GET['rule']=='spam'){ ?>class="selected"<? } ?>><a href="menu.php?screen=home&rule=spam"><? if($_GET['rule']=='spam'){ ?>&raquo; <? } ?>Regras para envio de SPAM</a></td>
		<td <? if($_GET['rule']=='dir'){ ?>class="selected"<? } ?>><a href="menu.php?screen=home&rule=dir"><? if($_GET['rule']=='dir'){ ?>&raquo; <? } ?>Direitos gerais</a></td>
	</tr>
</table>
<?
	if($_GET['screen'] == 'home' && empty($_GET['rule'])){
		header('Location: menu.php?screen=home&rule=all');
	}else{
		require_once('actions/menu_home_'.$_GET['rule'].'.php');
	}
?>
<p style="font-weight:bold; margin-top:10px; text-align:center;">SEGUINDO  ESTAS REGRAS, TER&Aacute; UMA BOA CONVIV&Ecirc;NCIA NA EQUIPE!</p>
<a href="http://lanservers.tk/">LanServers</a>