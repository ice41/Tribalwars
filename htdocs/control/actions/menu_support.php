<h2>Sistema de suporte</h2>
<p>Área para suporte interno a jogadores.</p>
<table class="vis" width="99%" align="center" style="border-spacing:1px; background-color:#FEE47D;">
	<tr><th colspan="4">Submenu</th></tr>
	<tr>
		<td <? if($_GET['mode']=='all'){?>class="selected"<? } ?>><a href="menu.php?screen=support&mode=all"><? if($_GET['mode']=='all'){?>&raquo; <? } ?>Todos os tickets</a></td>
		<td <? if($_GET['mode']=='new'){?>class="selected"<? } ?>><a href="menu.php?screen=support&mode=new"><? if($_GET['mode']=='new'){?>&raquo; <? } ?>Novos tickets</a></td>
		<td <? if($_GET['mode']=='open'){?>class="selected"<? } ?>><a href="menu.php?screen=support&mode=open"><? if($_GET['mode']=='open'){?>&raquo; <? } ?>Tickets abertos</a></td>
		<td <? if($_GET['mode']=='closed'){?>class="selected"<? } ?>><a href="menu.php?screen=support&mode=closed"><? if($_GET['mode']=='closed'){?>&raquo; <? } ?>Tickets fechados</a></td>
	</tr>
</table><br />
<?
	if($_GET['screen'] == 'support' && empty($_GET['mode'])){
		header('Location: menu.php?screen=support&mode=new');
	}else{
		require_once('actions/menu_support_'.$_GET['mode'].'.php');
	}
?>