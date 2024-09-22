<?php /* Smarty version 2.6.14, created on 2016-12-22 21:33:42
         compiled from game_info_village.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'game_info_village.tpl', 21, false),)), $this); ?>
<?php 
	$folos = $this->_tpl_vars['info_village']['id'];
	$folos2 = $this->_tpl_vars['user']['id'];
	$sql1 = mysql_query("SELECT id, title, time, title_image, hives FROM reports where `to_village`='$folos' AND `type`='attack' AND `receiver_userid`='$folos2' ORDER BY time DESC LIMIT 10");
	$nr_public = mysql_num_rows($sql1);
	while($array = mysql_fetch_array($sql1)){
		$id_p[] =  $array[0];
		$title_p[] = $array[1];
		$time_p[] = $array[2];
		$title_image_p[] = $array[3];
		$hives[] = $array[4];
	}
 ?>
<h2><?php echo $this->_tpl_vars['info_village']['name']; ?>
</h2>
<table>
	<tr>
		<td valign="top" width="50%">
			<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr><th colspan="2"><?php echo $this->_tpl_vars['info_village']['name']; ?>
</th></tr>
				<tr><td width="80">Coordenadas:</td><td><?php echo $this->_tpl_vars['info_village']['x']; ?>
|<?php echo $this->_tpl_vars['info_village']['y']; ?>
</td></tr>
				<tr><td>Pontos:</td><td width="180"><?php echo ((is_array($_tmp=$this->_tpl_vars['info_village']['points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td></tr>
				<?php if (empty ( $this->_tpl_vars['info_user']['username'] )): ?>
				<tr><td>Jugador:</td><td>--</td></tr>
				<?php else: ?>
				<tr><td>Jugador:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['info_village']['userid']; ?>
"><?php echo $this->_tpl_vars['info_user']['username']; ?>
</a></td></tr>
				<?php endif; ?>
				<?php if (! empty ( $this->_tpl_vars['info_ally']['short'] )): ?>
				<tr><td>Tribo:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=<?php echo $this->_tpl_vars['info_ally']['id']; ?>
"><?php echo $this->_tpl_vars['info_ally']['short']; ?>
</a></td></tr>
				<?php endif; ?>
				<tr><td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['info_village']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['info_village']['y']; ?>
">&raquo; Centralizar no mapa</a></th></tr>
				<tr><td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;mode=command&amp;target=<?php echo $this->_tpl_vars['info_village']['id']; ?>
">&raquo; Enviar tropas</a></th></tr>
				<?php if ($this->_tpl_vars['can_send_ress']): ?>
				<tr><td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=market&amp;mode=send&amp;target=<?php echo $this->_tpl_vars['info_village']['id']; ?>
">&raquo; Enviar recursos</a></th></tr>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['user']['ally'] > 0): ?>
<?php 
	$x = $this->_tpl_vars['info_village']['x'];
	$y = $this->_tpl_vars['info_village']['y'];
	$ar1 = mysql_num_rows(mysql_query("SELECT * FROM ally_reservations WHERE ally = '".$this->_tpl_vars['user']['ally']."' AND x = '$x' AND y = '$y'"));
	if($ar1 >= '1'){
		$ally = $this->_tpl_vars['user']['ally'];
		$query = mysql_fetch_array(mysql_query("SELECT * FROM `ally_reservations` WHERE x = '$x' AND y = '$y' AND ally = '$ally'"));
		$by = mysql_fetch_array(mysql_query("SELECT username FROM users WHERE id = '".$query['by']."'"));
		$vill = $_GET['village'];
		echo '<tr><td colspan="2"><b><span style="color:red;">&raquo; Aldeia reservada por: <a href="game.php?village='.$vill.'&screen=info_player&id='.$query['by'].'">'.stripslashes(entparse($by['username'])).'</a> !</span></b></td></tr>';
	}else{
		$vill = $_GET['village'];
		echo '<tr><td colspan="2"><a href="game.php?village='.$vill.'&screen=ally&mode=reservations&x='.$x.'&y='.$y.'">&raquo; Reservar aldeia</a></td></tr>';
	}
 ?>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['user']['id'] == $this->_tpl_vars['info_village']['userid']): ?>
				<tr><td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['info_village']['id']; ?>
&amp;screen=overview">&raquo; Visualiza&ccedil;&atilde;o geral da aldeia</a></th></tr>
				<?php endif; ?>
			</table>
		</td>
		<td align="right" valign="top" width="50%">
			<table class="vis" width="600" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
				<tr><th colspan="3">Ultimos 10 ataques</th></tr>
<?php 
	if($nr_public <> 0){
		foreach($id_p as $key => $value){
			$title_p[$key] = entparse($title_p[$key]);
			$time_p[$key] = date("d.n.Y, H:i:s", $time_p[$key]);
			$hives_explode = explode(";", $hives[$key]);
 ?>
				<tr>
					<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=report&mode=all&view=<?php echo $value; ?>"><img src="<?php echo str_replace("graphic/", "../graphic/", $title_image_p[$key]); ?>"> <?php echo $title_p[$key]; ?></a></td>
					<td align="center"><?php  echo number_format($hives_explode[3], 0, '','.')." <span class='inactive'>/ ".number_format($hives_explode[4], 0, '', '.')."</span>";  ?></td>
					<td align="center"><?php echo $time_p[$key]; ?></td>
				</tr>
<?php 
		}
	}
 ?>
			</table>
		</td>
	</tr>
</table>