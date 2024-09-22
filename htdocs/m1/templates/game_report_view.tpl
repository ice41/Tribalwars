{php}
	$report_type = $this->_tpl_vars['report']['type'];
	if($_GET['public'] == 'options' && $report_type == 'attack'){
{/php}
<table width="450">
	<tr>
		<td>
			<table class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr>
					<th width="140">Relat&oacute;rio</th>
					<th width="400">{$report.title}</th>
				</tr>
				<tr>
					<td>Recebido em</td>
					<td>{$report.date}</td>
				</tr>
			</table><br />
			<table class="vis">
				<tr> 
 					<td colspan="2" valign="top" height="160" style="border:1px solid #FEE47D; padding:4px;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;"> 
						<h3>Publicar relat&oacute;rio</h3> 
						<p>Aqui voc&ecirc; deve especificar o que ser&aacute; exibido e o que ser&aacute; ocultado no relat&oacute;rio.</p> 
						<form action="game.php?village={$village.id}&screen=report&mode=all&view={php}echo $_GET['view'];{/php}&public=do" method="post"> 
							<ul style="list-style-type:none;"> 
								<li><input type="checkbox" name="public_own_troups" value="Y"  /><label for="own_units">Esconder suas tropas</label></li> 
								<li><input type="checkbox" name="public_own_dead" value="Y"  /><label for="own_losses">Esconder suas perdas</label></li> 
								<li><input type="checkbox" name="public_own_steal" value="Y"  /><label for="carry">Esconder saque</label></li> 
								<li><input type="checkbox" name="public_enemy_troups" value="Y"  /><label for="own_units">Esconder tropas inimigas</label></li> 
								<li><input type="checkbox" name="public_enemy_dead" value="Y"  /><label for="own_losses">Esconder perdas inimigas</label></li> 
							</ul> 
							<span style="float:right;"><input type="submit" name="publish" value="Ok" class="button" /></span>
						</form>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
{php}
	}elseif($_GET['public'] == 'do' && $report_type == 'attack'){
		$id = $_GET['view'];
		$public_troups = $_POST['public_own_troups'];
		$public_dead = $_POST['public_own_dead'];
		$public_steal = $_POST['public_own_steal'];
		$enemy_troups = $_POST['public_enemy_troups'];
		$enemy_dead = $_POST['public_enemy_dead'];

		if($public_troups){ $public_t = '1'; }
		if($public_dead){ $public_d = '1'; }
		if($public_steal){ $public_s = '1'; }
		if($enemy_dead){ $public_ed = '1'; }
		if($enemy_troups){ $public_et = '1'; }
		$id_user = $this->_tpl_vars['user']['id'];

		$username = $this->_tpl_vars['user']['username'];
		$report_from = $id_user."|".$username;

		$num_rep = mysql_num_rows(mysql_query("SELECT * FROM public_reports WHERE report_id = '$id'"));
		if($num_rep >= '1'){
			mysql_query("UPDATE public_reports SET public_own_troups = '$public_t'");
			mysql_query("UPDATE public_reports SET public_own_dead = '$public_d'");
			mysql_query("UPDATE public_reports SET public_own_steal = '$public_s'");
			mysql_query("UPDATE public_reports SET public_enemy_troups = '$public_et'");
			mysql_query("UPDATE public_reports SET public_enemy_dead = '$public_ed'");
		}else{
			$select_report = mysql_fetch_array(mysql_query("SELECT * FROM reports WHERE id = '$id'"));
			$title = $select_report['title'];
			$title_image = $select_report['title_image'];
			$time = $select_report['time'];
			$a_units = $select_report['a_units'];
			$b_units = $select_report['b_units'];
			$c_units = $select_report['c_units'];
			$d_units = $select_report['d_units'];
			$e_units = $select_report['e_units'];
			$agreement = $select_report['agreement'];
			$ram = $select_report['ram'];
			$catapult = $select_report['catapult'];
			$message = $select_report['message'];
			$to_username = mysql_fetch_array(mysql_query("SELECT username FROM users WHERE id = '".$select_report['to_user']."'"));
			$from_username = mysql_fetch_array(mysql_query("SELECT username FROM users WHERE id = '".$select_report['from_user']."'"));
			$to_village = $select_report['to_village'];
			$to_village = mysql_fetch_array(mysql_query("SELECT name,x,y,continent FROM villages WHERE id = '".$to_village."'"));
			$to_village = $to_village[0]." (".$to_village[1]."|".$to_village[2].") K".$to_village[3];
			$from_village = $select_report['from_village'];
			$from_village = mysql_fetch_array(mysql_query("SELECT name,x,y,continent FROM villages WHERE id = '".$from_village."'"));
			$from_village = $from_village[0]." (".$from_village[1]."|".$from_village[2].") K".$from_village[3];
			$receiver_userid = $select_report['receiver_userid'];
			$luck = $select_report['luck'];
			$moral = $select_report['moral'];
			$wins = $select_report['wins'];
			$hives = $select_report['hives'];
			$see_def_units = $select_report['see_def_units'];
			mysql_query("INSERT INTO public_reports (`report_id`,`title`,`title_image`,`time`,`a_units`,`b_units`,`c_units`,`d_units`,`e_units`,`agreement`,`ram`,`catapult`,`message`,`to_user`,`to_village`,`from_village`,`receiver_userid`,`luck`,`moral`,`wins`,`hives`,`see_def_units`,`from_username`,`to_username`,`public_own_troups`,`public_own_dead`,`public_own_steal`,`report_from`,`report_fromid`,`public_enemy_troups`,`public_enemy_dead`,`publicat`) VALUES ('$id','$title','$title_image','$time','$a_units','$b_units','$c_units','$d_units','$e_units','$agreement','$ram','$catapult','$message','".$select_report['to_user']."','".$select_report['from_user']."','$to_village','$from_village','$receiver_userid','$luck','$moral','$wins','$hives','$see_def_units','$from_username[0]','$to_username[0]','$public_t','$public_d','$public_s','$report_from','$id_user','$public_et','$public_ed','".time()."')") or die(mysql_error());
		}
{/php}
<table width="450">
	<tr>
		<td>
			<table class="vis">
				<tr>
					<th width="140">Relat&oacute;rio</th>
					<th width="400">{$report.title|replace:"graphic/":"../graphic/"}</th>
				</tr>
				<tr>
					<td>Recebido em</td>
					<td>{$report.date}</td>
				</tr>
			</table>
			<table class="vis">
				<tr>
 					<td colspan="2" valign="top" height="160" style="border:1px solid #FEE47D; padding:4px;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;"> 
						<h3 align="center">O relat&oacute;rio foi publicado!</h3> 
						<p>O relat&oacute;rio foi publicado. Para ver o relat&oacute;tio utilize o link: <a href="http://{php}echo $_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"])."/public_reports.php?report_id=".$_GET['view'];{/php}">http://{php}echo $_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"])."/public_reports.php?report_id=".$_GET['view'];{/php}</a></p> 
						Copie e cole r&aacute;pidamente: <input type="text" size="50" onclick="this.select(); this.focus()" value="http://{php}echo $_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"])."/public_reports.php?report_id=".$_GET['view'];{/php}"/><br />
						<a href="game.php?village={$village.id}&screen=report&mode=public_reports">&raquo; Relat&oacute;rio publicados</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
{php}
	}else{
		$userid1 = $_GET['village'];
		$userid2 = mysql_query("SELECT * FROM `villages` WHERE `id` = '".$userid1."'");
		$userid3 = mysql_fetch_assoc($userid2);
		$userid = $userid3['userid'];
		$reportid = $_GET['view'];
		$next_report1 = mysql_query("SELECT * FROM `reports` WHERE (`receiver_userid` = '".$userid."' AND `id` > '".$reportid."') ORDER BY `id` ASC LIMIT 1");
		if(mysql_num_rows($next_report1)){
			$next_report2 = mysql_fetch_assoc($next_report1);
			$next_report = $next_report2['id'];
			$next = true;
		}else{
			$next = false;
		}
		$last_report1 = mysql_query("SELECT id FROM `reports` WHERE (`receiver_userid` = '".$userid."' AND `id` < '".$reportid."') ORDER BY `id` DESC LIMIT 1");
		if(mysql_num_rows($last_report1)){
			$last_report2 = mysql_fetch_assoc($last_report1);
			$last_report = $last_report2['id'];
			$last = true;
		}else{
			$last = false;
		}
		$mode = $_GET['mode'];
{/php}
<table width="450">
		<tr>
			<td>
				<table align="center" class="vis" width="100%">
					<tr>
						<td align="center" {if $report.type != 'attack'}colspan="2"{/if} width="20%">
							<a href="game.php?village={$village.id}&amp;screen=report&amp;mode={$mode}&amp;action=del_one&amp;id={$report.id}&amp;h={$hkey}">Apagar</a>
						</td>
						{if $report.type == 'attack'}
						{php}$id = $_GET['view'];{/php}
						<td align="center" width="20%">
							<a href="game.php?village={$village.id}&amp;screen=report&amp;mode={$mode}&amp;view={php}echo $id;{/php}&public=options">Publicar relat&oacute;rio</a>
						</td>
						{/if}
					</tr>
					<tr>
						<td align="center" width="20%">
						{php}
							if($last){
								echo '<a href="game.php?village='.$userid1.'&amp;screen=report&amp;mode='.$mode.'&amp;view='.$last_report.'">&laquo;</a>';
							}
						{/php}
						</td>
						<td align="center" width="20%">
						{php}
							if($next){
								echo '<a href="game.php?village='.$userid1.'&amp;screen=report&amp;mode='.$mode.'&amp;view='.$next_report.'">&raquo;</a>';
							}
						{/php}
						</td>
					</tr>
				</table>
				<table class="vis">
					<tr>
						<th width="140">Relat&oacute;rio</th>
						<th width="400">{$report.title|replace:"graphic/":"../graphic/"}</th>
					</tr>
				<tr>
					<td>Recebido em</td>
					<td>{$report.date}</td>
				</tr>
				<tr>
					<td colspan="2" valign="top" height="160" style="border:1px solid #FEE47D; padding:4px;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
						{assign var='reporttype' value=$report.type}
						{include file="game_report_view_$reporttype.tpl"}
					</td>
				</tr>
			</table>
			<table align="center" class="vis" width="100%">
				<tr>
					<td align="center" width="20%">
					{php}
						if($last){
							echo '<a href="game.php?village='.$userid1.'&amp;screen=report&amp;mode='.$mode.'&amp;view='.$last_report.'">&laquo;</a>';
						}
					{/php}
					</td>
					<td align="center" width="20%">
						<a href="game.php?village={$village.id}&amp;screen=report&amp;mode={$mode}&amp;action=del_one&amp;id={$report.id}&amp;h={$hkey}">Apagar</a>
					</td>
					<td align="center" width="20%">
					{php}
						if($next){
							echo '<a href="game.php?village='.$userid1.'&amp;screen=report&amp;mode='.$mode.'&amp;view='.$next_report.'">&raquo;</a>';
						}
					{/php}
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
{php}}{/php}