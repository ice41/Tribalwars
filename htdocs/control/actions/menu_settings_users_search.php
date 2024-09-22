<table width="100%">
	<tr>
		<td width="50%" valign="top">
			<form action="" method="POST">
				<table class="vis" width="100%" style="border-spacing:1px; background-color:#FEE47D;">
					<tr><th colspan="2">Busca r&aacute;pida</th></tr>
					<tr>
						<td><input type="text" style="text-align:center;width:400px;font-size:20px" name="user" value="<?=$func->EscapeString($_POST['user'])?>" /></td>
						<td><input type="submit" name="search" value="Buscar" class="button" /></td>
					</tr>
				</table>
			</form>
		</td>
		<td width="50%" valign="top">
			<table class="vis" width="100%" style="border-spacing:1px; background-color:#FEE47D;">
			<?
				if($_POST['search']){
					if(strlen($_POST['user']) >= 3){
						$name = $func->EscapeString(urlencode($_POST['user']));
						echo "<tr><th>Jogador</th><th>E-mail</th></tr>";
						$sql3 = "SELECT * FROM `users` WHERE `username` LIKE \"%$name%\"";
						$exec_sql2 = $db->query($sql3);
						$rows = $db->num($exec_sql2);
						if($rows > 0){
							while($array2 = $db->fet_array($exec_sql2)){
								echo "<tr><td><a href='menu.php?screen=settings_users&mode=edit&id=".$array2['id']."'>".$func->EscapeString(urldecode($array2['username']))."</a></td><td>".$array2['mail']."</td></tr>";
							}
						}else{
							echo "<tr><td colspan=\"2\"><div class=\"error\">Nenhum resultado foi obtido.</div></td></tr>";
						}
					}else{
						echo "<tr><td colspan=\"2\"><div class=\"error\">Para efetuarmos a busca, voc&ecirc; deve digitar no minimo 3 caracteres.</div></td></tr>";
					}
				}
			?>
			</table>
		</td>
	</tr>
</table>