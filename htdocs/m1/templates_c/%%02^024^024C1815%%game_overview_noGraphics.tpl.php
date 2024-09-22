<?php /* Smarty version 2.6.14, created on 2016-12-22 21:46:05
         compiled from game_overview_noGraphics.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'nivel', 'game_overview_noGraphics.tpl', 70, false),array('modifier', 'replace', 'game_overview_noGraphics.tpl', 90, false),array('modifier', 'format_date', 'game_overview_noGraphics.tpl', 91, false),array('modifier', 'format_time', 'game_overview_noGraphics.tpl', 92, false),)), $this); ?>
<?php 
	$userid = $this->_tpl_vars['user']['id'];
	$vill = $this->_tpl_vars['village']['id'];
	if($_GET['overview'] == 'new'){
		$sql11 = "UPDATE `users` SET `overview` = 'new' WHERE `id` = '".$userid."'";
		mysql_query($sql11);
		header('Location: game.php?village='.$vill.'&screen=overview');
	}
	if(isset($_GET['info_acc']) && $_GET['info_acc'] == 'hide'){
		mysql_query("UPDATE `users` SET `info_acc_show` = '0' WHERE `id` = '".$userid."'");
	}
	$st = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$userid."'"));
 ?>
<h2><?php echo $this->_tpl_vars['village']['name']; ?>
 (<?php echo $this->_tpl_vars['village']['x']; ?>
|<?php echo $this->_tpl_vars['village']['y']; ?>
) K<?php echo $this->_tpl_vars['village']['continent']; ?>
</h2>
<table>
	<tr>
		<td valign="top">
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr><th colspan="2">Produ&ccedil;&atilde;o</th></tr>
				<tr class="nowrap"><td width="70"><img src="../graphic/icons/wood.png" title="Madeira" alt="" /> Madeira</td><td><strong><?php echo $this->_tpl_vars['wood_prod_overview']; ?>
</strong> por <?php if ($this->_tpl_vars['speed'] > 10): ?>minuto<?php else: ?>hora<?php endif; ?></td></tr>
				<tr class="nowrap">
				  <td><img src="../graphic/icons/stone.png" title="Argila" alt="" /> Argila</td><td><strong><?php echo $this->_tpl_vars['stone_prod_overview']; ?>
</strong> por <?php if ($this->_tpl_vars['speed'] > 10): ?>minuto<?php else: ?>hora<?php endif; ?></td></tr>
				<tr class="nowrap"><td><img src="../graphic/icons/iron.png" title="Ferro" alt="" /> Ferro</td><td><strong><?php echo $this->_tpl_vars['iron_prod_overview']; ?>
</strong> por <?php if ($this->_tpl_vars['speed'] > 10): ?>minuto<?php else: ?>hora<?php endif; ?></td></tr>
			</table><br />

			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr><th>Unidades <span style="float:right;font-size:9px;"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=train">&raquo; Recrutar</a></span></th></tr>
<?php 
	$_from = $this->_tpl_vars['in_village_units'];
	if(!is_array($_from) && !is_object($_from)){
		settype($_from, 'array');
	}
	if(count($_from)):
    	foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['num']):
  if ($this->_tpl_vars['dbname'] == 'unit_knight'):  
		$pala_name = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id = '".$userid."'"));
		echo '<tr><td><img src="../graphic/unit/unit_knight.png"> '.$pala_name['knight_name'].'</td></tr>';
  else: ?>
				<tr><td><img src="../graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png"> <b><?php echo $this->_tpl_vars['num']; ?>
</b> <?php echo $this->_tpl_vars['cl_units']->get_name($this->_tpl_vars['dbname']); ?>
</td></tr>
<?php endif;  
		endforeach;
	endif;
	unset($_from);
 ?>
			</table><br />

<?php if ($this->_tpl_vars['village']['agreement'] != '100'): ?>
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr><th width="50%">Lealdade:</th><td align="center"><?php echo $this->_tpl_vars['village']['agreement']; ?>
%</td></tr>
			</table><br />
<?php endif; ?>
		</td>
		<td width="650" valign="top">
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr><th>Edif&iacute;cios</th></tr>
<?php 
	$_from = $this->_tpl_vars['built_builds'];
	if(!is_array($_from) && !is_object($_from)){
		settype($_from, 'array');
	}
	if(count($_from)):
		foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dbname']):
 ?>
				<tr>
					<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=<?php echo $this->_tpl_vars['dbname']; ?>
"><img src="../graphic/buildings/<?php echo $this->_tpl_vars['dbname']; ?>
.png"> <?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>

</a> <span style="float:right;">(<?php echo ((is_array($_tmp=$this->_tpl_vars['village'][$this->_tpl_vars['dbname']])) ? $this->_run_mod_handler('nivel', true, $_tmp) : nivel($_tmp)); ?>
)</span></td>
				</tr>
<?php 
		endforeach;
	endif;
	unset($_from);
 ?>
			</table>
<?php if (count ( $this->_tpl_vars['my_movements'] ) > 0): ?><br />
<?php 
	$num_my_movements = mysql_num_rows(mysql_query("SELECT * FROM `movements` WHERE `send_from_village` = '".$_GET['village']."'"));
 ?>
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr>
					<th width="52%">Próprios comandos (<?php echo $num_my_movements; ?>)</th>
					<th width="33%">Chegada</th>
					<th width="15%">Chegada em</th>
				</tr>
	<?php $_from = $this->_tpl_vars['my_movements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
?>
				<tr>
					<td><img src="../graphic/command/<?php echo $this->_tpl_vars['array']['type']; ?>
.png" alt="" /> <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_command&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;type=own"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['array']['message'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'Angriff auf', "Ataque &agrave;") : smarty_modifier_replace($_tmp, 'Angriff auf', "Ataque &agrave;")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Rückkehr von', 'Retorno de') : smarty_modifier_replace($_tmp, 'Rückkehr von', 'Retorno de')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Rückzug von', 'Retirada de') : smarty_modifier_replace($_tmp, 'Rückzug von', 'Retirada de')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Unterstützung für', "Apoio &agrave;") : smarty_modifier_replace($_tmp, 'Unterstützung für', "Apoio &agrave;")); ?>
</a></td>
					<td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['array']['end_time'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, 'heute um', "hoje &agrave;s") : smarty_modifier_replace($_tmp, 'heute um', "hoje &agrave;s")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Uhr', "") : smarty_modifier_replace($_tmp, 'Uhr', "")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'am', 'em') : smarty_modifier_replace($_tmp, 'am', 'em')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'um', "&agrave;s") : smarty_modifier_replace($_tmp, 'um', "&agrave;s")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'morgen', "amanh&atilde;") : smarty_modifier_replace($_tmp, 'morgen', "amanh&atilde;")); ?>
</td>
					<td><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in']+1)) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
		<?php if ($this->_tpl_vars['array']['can_cancel']): ?>
					<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;action=cancel&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">cancelar</a></td>
		<?php endif; ?>
				</tr>
	<?php endforeach; endif; unset($_from); ?>
			</table>
<?php endif;  if (count ( $this->_tpl_vars['other_movements'] ) > 0): ?><br />
<?php 
	$num_other_movements = mysql_num_rows(mysql_query("SELECT * FROM `movements` WHERE `to_village` = '".$this->_tpl_vars['village']['id']."' AND `type` != 'cancel'"));
 ?>
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr>
					<th width="52%">Origem (<?php echo $num_other_movements; ?>)</th>
					<th width="33%">Chegada</th>
					<th width="15%">Chegada em</th>
				</tr>
	<?php $_from = $this->_tpl_vars['other_movements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
?>
				<tr>
					<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_command&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;type=other"><img src="../graphic/command/<?php echo $this->_tpl_vars['array']['type']; ?>
.png"> <?php echo $this->_tpl_vars['array']['message']; ?>
</a></td>
					<td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['array']['end_time'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, 'heute um', "hoje &agrave;s") : smarty_modifier_replace($_tmp, 'heute um', "hoje &agrave;s")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Uhr', "") : smarty_modifier_replace($_tmp, 'Uhr', "")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'am', 'em') : smarty_modifier_replace($_tmp, 'am', 'em')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'um', "&agrave;s") : smarty_modifier_replace($_tmp, 'um', "&agrave;s")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'morgen', "amanh&atilde;") : smarty_modifier_replace($_tmp, 'morgen', "amanh&atilde;")); ?>
</td>
					<td><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in']+1)) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
				</tr>
	<?php endforeach; endif; unset($_from); ?>
			</table>
<?php endif; ?>
		</td>
<?php 
	if($st['info_acc_show'] == TRUE){ 
		$numar_rapoarte = mysql_num_rows(mysql_query("SELECT `id` FROM `reports` WHERE `receiver_userid` = '".$userid."'"));
		$numar_rapoarte_necitite = mysql_num_rows(mysql_query("SELECT `id` FROM `reports` WHERE `receiver_userid` = '".$userid."' AND `is_new` = '1'"));
		include("include/config.php");
 ?>
		<td width="280" valign="top">
			<table class="vis" width="280" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr><th colspan="2" >Informa&ccedil;&otilde;es da conta <span style="float:right;"><a id="hide_info_acc" href="javascript:hide_info_acc()">Esconder</a><a id="hide_cancel_info_acc" href="javascript:show_info_acc()" style="display:none;">Mostrar</a></span></th></tr>
				<tr id="info_acc_points"><td width="120">Pontos:</td><td align="center"><?php echo format_number($st['points']); ?>&nbsp;|&nbsp;<b><?php echo format_number($st['rang']); ?></b></td></tr>
				<tr id="info_acc_villages"><td>Aldeias:</td><td align="center"><?php echo format_number($st['villages']); ?></td></tr>
				<tr id="info_acc_hives"><td>Saque:</td><td align="center"><?php echo format_number($st['hives_total']); ?>&nbsp;|&nbsp;<b><?php if($st['hives_rank'] <= '20'){echo $st['hives_rank'];} ?></b></td></tr>
				<tr id="info_acc_nr_reports"><td>Relat&oacute;rios:</td><td align="center"><?php echo $numar_rapoarte; ?></td></tr>
				<tr id="info_acc_nr_reports_new"><td>Relat&oacute;rios novos:</td><td align="center"><?php echo $numar_rapoarte_necitite; ?></td>
				<tr id="info_acc_ip"><td>IP atual:</td><td align="center"><?php  echo $_SERVER['REMOTE_ADDR'];  ?></td></tr>
<?php 
		if($st['ally'] > 0){
			$trib = mysql_query("SELECT * FROM `ally` WHERE `id` = '".$st['ally']."'");
			$exista = mysql_num_rows($trib);
			if($exista == '1'){
				$trib = mysql_fetch_assoc($trib);
				echo '<tr><th colspan="2">Informa&ccedil;&otilde;es da tribo <span style="float:right;"><a id="hide_info_ally" href="javascript:hide_info_ally()">Esconder</a><a id="hide_cancel_info_ally" href="javascript:show_info_ally()" style="display:none;">Mostrar</a></span></th></tr>';
				echo '<tr id="info_ally_name"><td>Nome:</td><td align="center">'.stripslashes(entparse($trib['name'])).'</td></tr>';
				echo '<tr id="info_ally_short"><td>Abrevia&ccedil;&atilde;o:</td><td align="center">'.stripslashes(entparse($trib['short'])).'</td></tr>';
				echo '<tr id="info_ally_members"><td>Membros:</td><td align="center">'.$trib['members'].'</td></tr>';
				echo '<tr id="info_ally_points"><td>Pontos:</td><td align="center">'.format_number($trib['points']).'&nbsp;|&nbsp;<b>'.$trib['rank'].'</b></td></tr>';
			}
		}
 ?>
				<tr><th colspan="2">Oponentes derrotados <span style="float:right;"><a id="hide_button_inamici_invinsi" href="javascript:hide_inamici_invinsi()">Esconder</a><a id="show_button_inamici_invisi" href="javascript:show_inamici_invinsi()" style="display:none;">Mostrar</a></span></th></tr>
				<tr id="agresor"><td>Atacante:</td><td align="center"><?php  echo format_number($st['killed_units_att'])." |<b> ".$st['killed_units_att_rank'];  ?> </b></td></tr>
				<tr id="aparator"><td>Defensor:</td><td align="center"><?php  echo format_number($st['killed_units_def'])." |<b> ".$st['killed_units_def_rank'];  ?> </b></td></tr>
				<tr id="total"><td>Total:</td><td align="center"><?php  echo format_number($st['killed_units_altogether'])." |<b> ".$st['killed_units_altogether_rank'];  ?> </b></td></tr>

				<tr><th colspan="2">&Uacute;ltimos 5 acessos <span style="float:right;"><a id="hide_logs5_button" href="javascript:hide_logs5()">Esconder</a><a id="show_logs5_button" href="javascript:show_logs5()" style="display:none;">Mostrar</a></span></th></tr>
<?php 
		$logari5 = mysql_query("SELECT * FROM `logins` WHERE `userid` = '".$userid."' ORDER BY `time` DESC LIMIT 5");
		$logari5_rows = mysql_num_rows($logari5);
		while($log5 = mysql_fetch_assoc($logari5)){
			$flalo = $i++ + 1;
			echo '<tr id="logs5_'.$flalo.'"><td>IP:&nbsp;'.$log5['ip'].'</td><td align="center">'.date("d.m.Y H:i:s", $log5['time']).'</td></tr>';
      }
       ?>

				<tr><th colspan="2"><center><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=overview&info_acc=hide" onclick="return confirm('Est&aacute; op&ccedil;&atilde;o pode ser reativada em suas configura&ccedil;&otilde;es.');">Esconder / Hide</a></center></th></tr>
			</table>
		</td>
		<script type="text/javascript">
			function hide_info_acc() {
				gid("hide_info_acc").style.display = 'none';
				gid("hide_cancel_info_acc").style.display = '';
				gid("info_acc_points").style.display='none';
				gid("info_acc_villages").style.display='none';
				gid("info_acc_hives").style.display='none';
				gid("info_acc_nr_reports").style.display='none';
				gid("info_acc_nr_reports_new").style.display='none';
				gid("info_acc_ip").style.display='none';
				createCookie('info_acc','1',365);
			}
			function show_info_acc() {
				gid("hide_info_acc").style.display = '';
				gid("hide_cancel_info_acc").style.display = 'none';
				gid("info_acc_points").style.display='';
				gid("info_acc_villages").style.display='';
				gid("info_acc_hives").style.display='';
				gid("info_acc_nr_reports").style.display='';
				gid("info_acc_nr_reports_new").style.display='';
				gid("info_acc_ip").style.display='';
				createCookie('info_acc','0',365);
			}
			function hide_info_ally() {
				gid("hide_info_ally").style.display = 'none';
				gid("hide_cancel_info_ally").style.display = '';
				gid("info_ally_name").style.display='none';
				gid("info_ally_short").style.display='none';
				gid("info_ally_members").style.display='none';
				gid("info_ally_points").style.display='none';
				createCookie('info_ally','1',365);
			}
			function show_info_ally() {
				gid("hide_info_ally").style.display = '';
				gid("hide_cancel_info_ally").style.display = 'none';
				gid("info_ally_name").style.display='';
				gid("info_ally_short").style.display='';
				gid("info_ally_members").style.display='';
				gid("info_ally_points").style.display='';
				createCookie('info_ally','0',365);
			}
			function hide_inamici_invinsi() {
				gid("hide_button_inamici_invinsi").style.display = 'none';
				gid("show_button_inamici_invisi").style.display = '';
				gid("agresor").style.display = 'none';
				gid("aparator").style.display = 'none';
				gid("total").style.display = 'none';
				createCookie('inamici_invinsi','1',365);
			}
			function show_inamici_invinsi() {
				gid("hide_button_inamici_invinsi").style.display = '';
				gid("show_button_inamici_invisi").style.display = 'none';
				gid("agresor").style.display = '';
				gid("aparator").style.display = '';
				gid("total").style.display = '';
				createCookie('inamici_invinsi','0',365);
			}
			function hide_logs5() {
				gid("hide_logs5_button").style.display = 'none';
				gid("show_logs5_button").style.display = '';
			<?php 
				if($logari5_rows >= 1) { echo "gid(\"logs5_1\").style.display = 'none';\r\n"; }
				if($logari5_rows >= 2) { echo "gid(\"logs5_2\").style.display = 'none';\r\n"; }
				if($logari5_rows >= 3) { echo "gid(\"logs5_3\").style.display = 'none';\r\n"; }
				if($logari5_rows >= 4) { echo "gid(\"logs5_4\").style.display = 'none';\r\n"; }
				if($logari5_rows >= 5) { echo "gid(\"logs5_5\").style.display = 'none';\r\n"; }
			 ?>
				createCookie('logs5','1',365);
			}
			function show_logs5() {
				gid("hide_logs5_button").style.display = '';
				gid("show_logs5_button").style.display = 'none';
			<?php 
				if($logari5_rows >= 1) { echo "gid(\"logs5_1\").style.display = '';\r\n"; }
				if($logari5_rows >= 2) { echo "gid(\"logs5_2\").style.display = '';\r\n"; }
				if($logari5_rows >= 3) { echo "gid(\"logs5_3\").style.display = '';\r\n"; }
				if($logari5_rows >= 4) { echo "gid(\"logs5_4\").style.display = '';\r\n"; }
				if($logari5_rows >= 5) { echo "gid(\"logs5_5\").style.display = '';\r\n"; }
			 ?>
				createCookie('logs5','0',365);
			}
		</script>
<?php  }  ?>
	</tr>
</table>
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;margin-bottom:5px;">
	<tr><th colspan="100%"><center><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=overview&amp;overview=new">Visualiza&ccedil;&atilde;o gr&aacute;fica da aldeia</a></center></th></tr>
</table>