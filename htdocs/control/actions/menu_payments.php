<?php
	$sql = $db->query("SELECT c.id, u.username, c.codigo, c.status FROM payments c left join users u on c.userid = u.id ORDER BY `data` DESC");
	if($_GET['action'] == 'confirma'){
		$id = $func->EscapeString($_GET['id']);
		$db->query("UPDATE `payments` SET `status` = '1' WHERE `id` = '".$id."'");
		echo('Confirmacao de pagamento de'.$row[username].' atualizada!');
	}
	if($_GET['action'] == 'cancela'){
		$id = $func->EscapeString($_GET['id']);
		$db->query("UPDATE `payments` SET `status` = '2' WHERE `id` = '".$id."'");
		echo('Confirmacao de pagamento de'.$row[username].' atualizada!');
	}
?>
<h2>Gerenciar pagamentos</h2>
<form action="" method="post">
	<table class="vis" width="99%" align="center" style="border-spacing:1px; background-color:#FEE47D;">
		<tr>
			<th width="150">Conta</th>
			<th width="200">Codigo</th>
			<th width="100">Status</th>
			<th width="50">Acao</th>
		</tr>
<?
	while($row = mysql_fetch_array($sql)){
		echo('<tr>');
		echo('<td>'.$row[username].'</td>');
		echo('<td>'.$row[codigo].'</td>');
		echo('<td>'.$row[status].'</td>');
		echo('<td><a href="menu.php?screen=confirma_pgto&id='.$row[id].'&action=confirma">confirma</a></td>');
		echo('<td><a href="menu.php?screen=confirma_pgto&id='.$row[id].'&action=cancela">cancela</a></td>');
		echo('</td>');
	}
?>             
	</table><br />
</form>