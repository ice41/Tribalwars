<?php /* Smarty version 2.6.14, created on 2016-12-22 21:33:38
         compiled from game_map.tpl */ ?>
<?php 
	$id_player = $this->_tpl_vars['user']['id'];
	$idsat = $this->_tpl_vars['village']['id'];

	$SQLuser = mysql_fetch_array(mysql_query("SELECT * FROM users WHERE id = '".$id_player."'"));
	$this->_tpl_vars['user']['minimap_size'] = $SQLuser['minimap_size'];

	$pixeli_minimap = $SQLuser['minimap_size'];
	$cat = round($pixeli_minimap/5/1.2);

	$minimap_pixel = $pixeli_minimap;
	$image_diameter = $minimap_pixel/5;
	$image_radius = floor($image_diameter/2);

	/* sa stiu cum formez linkul */
	$idselect = $_GET['village'];
	$url = $_SERVER["REQUEST_URI"];
	$ex = explode("?x=",$url);
	$url = $ex[0];
	$ex = explode("&x=",$url);
	$url = $ex[0];
	if(strpos($url, "?") === FALSE)
		$url.="?";
	else
		$url.="&";
	if(!isset($_POST['x'])){
		$x = 0;
		$y = 0;
		if(isset($_GET['x']) AND isset($_GET['y'])){
			$x = mysql_real_escape_string($_GET['x']);
			$y = mysql_real_escape_string($_GET['y']);
		}else{
			$x = $this->_tpl_vars['village']['x'];
			$y = $this->_tpl_vars['village']['y'];
			$this->_tpl_vars["map"]["x"] = $x;
			$this->_tpl_vars["map"]["y"] = $y;
			$_GET['x'] = $x;
			$_GET['y'] = $y;
		}
	}elseif(isset($_POST['x']) && isset($_POST['go'])){
		$x = $_POST['x'];
		$y = $_POST['y'];
	}elseif(isset($_POST['curx'])&&isset($_POST['cury'])){
		$curx = $_POST['curx'];
		$cury = $_POST['cury'];

		$x = $_POST['x'];
		$y = $_POST['y'];
		$y = $minimap_pixel-$y;
		$x = floor($x/5);
		$y = floor($y/5);
		$x = ($curx-$image_radius)+$x;
		$y = ($cury-$image_radius)+$y;
		header("Location: ".$url."x=".$x."&y=".$y);
	}

	//Incarca obiectele de pe harta in array
	require('include/config.php');
	$algo_value = sin($config['speed']) * pi();
	$deco_type = array();
	$deco = array();
	$deco_x = $this->_tpl_vars['x_coords'];
	$deco_y = $this->_tpl_vars['y_coords'];
	array_unshift($deco_x, $deco_x[0] - 1);
	array_unshift($deco_y, $deco_y[0] - 1);
	array_push($deco_x, $deco_x[count($deco_x) - 1] + 1);
	array_push($deco_y, $deco_y[count($deco_y) - 1] + 1);
	foreach($deco_y as $y){
		foreach($deco_x as $x){
			if(isset($deco_type[$x][$y])){
				continue;
			}
			$deco_type[$x][$y] = "gras";
			$current_algo = sin($x * $y + $algo_value);
			if(0 <= $current_algo && $current_algo < 0.1){
				$deco_type[$x][$y] = "see";
				$deco[$x][$y] = 'see.png';
				if($this->_tpl_vars["mapa"] == 'map'){
					if(!$this->_tpl_vars['cl_map']->getVillage($x+1,$y) && !$this->_tpl_vars['cl_map']->getVillage($x,$y+1) && !$this->_tpl_vars['cl_map']->getVillage($x+1,$y+1) && !isset($deco[$x+1][$y]) && !isset($deco[$x][$y+1]) && !isset($deco[$x+1][$y+1])){
						$deco_type[$x][$y] = "lago";
						$deco_type[$x+1][$y] = "lago";
						$deco_type[$x][$y+1] = "lago";
						$deco_type[$x+1][$y+1] = "lago";
						$deco[$x][$y] = "lago3.png";
						$deco[$x+1][$y] = "lago4.png";
						$deco[$x][$y+1] = "lago1.png";
						$deco[$x+1][$y+1] = "lago2.png";
					}
				}
			}elseif(0.1 <= $current_algo && $current_algo < 0.3){
				if(!$this->_tpl_vars['cl_map']->getVillage($x+1,$y) && !$this->_tpl_vars['cl_map']->getVillage($x,$y+1) && !$this->_tpl_vars['cl_map']->getVillage($x+1,$y+1) && !isset($deco[$x+1][$y]) && !isset($deco[$x][$y+1]) && !isset($deco[$x+1][$y+1])){
					$deco_type[$x][$y] = "berg";
					$deco_type[$x+1][$y] = "berg";
					$deco_type[$x][$y+1] = "berg";
					$deco_type[$x+1][$y+1] = "berg";
					$deco[$x][$y] = "berg4.png";
					$deco[$x+1][$y] = "berg1.png";
					$deco[$x][$y+1] = "berg3.png";
					$deco[$x+1][$y+1] = "berg2.png";
				}
			}elseif(0.3 <= $current_algo && $current_algo < 1){
					$deco_type[$x][$y] = "forest";
			}
		}
	}
	foreach($deco_y as $y){
		foreach($deco_x as $x){
			switch ($deco_type[$x][$y]){
				case "gras":
				$deco[$x][$y] = 'gras'.rand(1,4).'.png';
				break;
				case "forest":
				$first = 0;
				$second = 0;
				$third = 0;
				$fourth = 0;
				if($deco_type[$x][$y-1] == "forest"){
					$first = 1;
				}
				if($deco_type[$x-1][$y] == "forest"){
					$second = 1;
				}
				if($deco_type[$x][$y+1] == "forest"){
					$third = 1;
				}
				if($deco_type[$x+1][$y] == "forest"){
					$fourth = 1;
				}
				$deco[$x][$y] = 'forest'.$first.$second.$third.$fourth.'.png';
				break;
			}
		}
	}
 ?>
<div id="info" style="position:absolute; top:0px; left:0px; width:350px; height:1px; visibility: hidden; z-index:10">
	<table class="vis" style="border-spacing: 1px; background-color: #FEE47D; box-shadow: 0 0 8px #FEE47D; -moz-box-shadow: 0 0 8px #FEE47D; -webkit-box-shadow: 0 0 8px #FEE47D; -moz-border-radius: 5px 5px 5px 5px; -webkit-border-top-left-radius: 5px; -webkit-border-top-right-radius: 5px; -webkit-border-bottom-left-radius: 5px; -webkit-border-bottom-right-radius: 5px;">
		<tr><th id="info_title" colspan="2">title</th></tr>
		<tr><td>Pontos:</td><td id="info_points">points</td></tr>
		<tr id="info_owner_row"><td>Proprietario:</td><td id="info_owner">owner</td></tr>
		<tr id="info_left_row"><td colspan="2">Abandonada</td></tr>
		<tr id="info_ally_row"><td>Tribo:</td><td id="info_ally">ally</td></tr>
		<tr id="info_village_groups_row"><td>Grupo:</td><td id="info_village_groups">village_groups</td></tr>
	</table>
</div>
<h2>Continente <?php echo $this->_tpl_vars['continent']; ?>
</h2>
<table collspacing="1" collpadding="0">
	<tr>
		<td valign="top">
			<table>
				<tr>
					<td valign="top" align="center">
						<table cellspacing="0" cellpadding="0" class="vis" style="border: 1px solid #FEE47D;">
							<tr>
								<td align="center"></td>
								<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']+$this->_tpl_vars['map']['size']-1; ?>
"><img src="../graphic/<?php echo $this->_tpl_vars['map_graphic']; ?>
/map_n.png" style="z-index:1; position:relative;" /></a></td>
								<td align="center"></td>
							</tr>
							<tr>
								<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']-$this->_tpl_vars['map']['size']+1; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']; ?>
"><img src="../graphic/<?php echo $this->_tpl_vars['map_graphic']; ?>
/map_w.png" style="z-index:1; position:relative;" /></a></td>
								<td>
									<table style="background-color:#F1EBDD; border:1px solid #FEE47D;" cellspacing="0" cellpadding="0" class="map">
									<?php $_from = $this->_tpl_vars['y_coords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['y']):
?>
										<tr>
											<td width="20"><?php echo $this->_tpl_vars['y']; ?>
</td>
											<?php $_from = $this->_tpl_vars['x_coords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['x']):
?>
												<?php if (! $this->_tpl_vars['cl_map']->getVillage($this->_tpl_vars['x'],$this->_tpl_vars['y'])): ?>
											<td id="tile_<?php echo $this->_tpl_vars['x']; ?>
_<?php echo $this->_tpl_vars['y']; ?>
" class="<?php echo $this->_tpl_vars['cl_map']->getClass($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
" style="<?php echo get_continente($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>"><?php echo '<img src="../graphic/'.$this->_tpl_vars['map_graphic'].'/'.$deco[$this->_tpl_vars['x']][$this->_tpl_vars['y']].'" alt="" />'; ?></td>
												<?php else:  
	$aldeia = mysql_fetch_array(mysql_query("SELECT * FROM `villages` WHERE `id` = '".$this->_tpl_vars['cl_map']->getvillageid($this->_tpl_vars['x'],$this->_tpl_vars['y'])."'"));
	$usuario = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$aldeia['userid']."'"));
	if($usuario['sleep'] == '1'){
		$this->_tpl_vars['culoare'] = "0,0,0";
	}else{
		if($usuario['noob_protection'] >= time() && $usuario['id'] != $this->_tpl_vars['user']['id']){
			$this->_tpl_vars['culoare'] = "255,128,0";
		}else{
			$this->_tpl_vars['culoare'] = $this->_tpl_vars['cl_map']->getColor($this->_tpl_vars['x'],$this->_tpl_vars['y']);
			if($this->_tpl_vars['culoare'] == "180,0,0"){
				$this->_tpl_vars['culoare'] = "130,60,10";
			}
		}
	}
 ?>
											<td id="tile_<?php echo $this->_tpl_vars['x']; ?>
_<?php echo $this->_tpl_vars['y']; ?>
" class="<?php echo $this->_tpl_vars['cl_map']->getClass($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
" style="background-color:rgb(<?php echo $this->_tpl_vars['culoare']; ?>
);<?php echo get_continente($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>">
												<div style="float: left; position: relative;">
													<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_village&id=<?php echo $this->_tpl_vars['cl_map']->getvillageid($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
"><img src="../graphic/<?php echo $this->_tpl_vars['map_graphic']; ?>
/<?php echo $this->_tpl_vars['cl_map']->graphic($this->_tpl_vars['x'],$this->_tpl_vars['y']);  if (get_bonus ( $this->_tpl_vars['x'] , $this->_tpl_vars['y'] )): ?>b.png<?php endif; ?>" onmouseover="showinfo(<?php echo $this->_tpl_vars['cl_map']->getvillageid($this->_tpl_vars['x'],$this->_tpl_vars['y']); ?>
, <?php echo $this->_tpl_vars['user']['id']; ?>
, <?php echo $this->_tpl_vars['village']['x']; ?>
, <?php echo $this->_tpl_vars['village']['y']; ?>
);" onmouseout="hideinfo();" /></a>
<?php 
	unset($id_move,$type_move);
	$id_sat_mouse = $this->_tpl_vars['cl_map']->getvillageid($this->_tpl_vars['x'],$this->_tpl_vars['y']);
	$user_id = $this->_tpl_vars['user']['id'];
	$sql2 = "SELECT `id`,`type` FROM `movements` WHERE `to_village` = '$id_sat_mouse' AND `from_userid` = '$user_id'";
	$exec_sql1 = mysql_query($sql2) or die(mysql_error());
	while($array2 = mysql_fetch_array($exec_sql1)){
		$id_move[] = $array2[0];
		$type_move[] = $array2[1];
	}
	$numar_miscari = mysql_num_rows($exec_sql1);
	$nr_attack = 0;
	$nr_support = 0;
	if(is_array($id_move)){
		foreach($id_move as $key => $value){
			if($type_move[$key] == "attack"){
				$nr_attack++;
				$attack_unique = $value;
			}
			if($type_move[$key] == "support"){
				$nr_support++;
				$support_unique = $value;
			}
		}
	}
	if($numar_miscari<>0 AND $nr_support>=1){
 ?>
														<a href="<?php if($nr_support==1){ ?>game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_command&id=<?php echo $support_unique; ?>&type=own<?php }else{ ?>game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_village&id=<?php echo $this->_tpl_vars['cl_map']->getvillageid($this->_tpl_vars['x'],$this->_tpl_vars['y']);  } ?>"><img style="position: absolute; <?php if($nr_attack>=1){echo "bottom:10px"; }else{ echo "top: 5";} ?>; right: 0;" src="../graphic/map/support.gif" title="Apoio" alt="Apoio"/></a>
<?php 
	}
	if($numar_miscari<>0 AND $nr_attack>=1){
 ?>
														<a href="<?php if ($nr_attack==1){ ?>game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_command&id=<?php echo $attack_unique; ?>&type=own<?php }else{ ?>game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_village&id=<?php echo $this->_tpl_vars['cl_map']->getvillageid($this->_tpl_vars['x'],$this->_tpl_vars['y']);  } ?>"><img style="position: absolute; top: 0; right: 0;" src="../graphic/map/axe_attack.gif" title="Ataque" alt="Ataque" /></a>
<?php 
	}
 ?>
												</div>
											</td>
												<?php endif; ?>
											<?php endforeach; endif; unset($_from); ?>
										</tr>
									<?php endforeach; endif; unset($_from); ?>
										<tr>
											<td height="20"></td>
											<?php $_from = $this->_tpl_vars['x_coords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['x']):
?>
											<td><?php echo $this->_tpl_vars['x']; ?>
</td>
											<?php endforeach; endif; unset($_from); ?>
										</tr>
									</table>
								</td>
								<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']+$this->_tpl_vars['map']['size']-1; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']; ?>
"><img src="../graphic/<?php echo $this->_tpl_vars['map_graphic']; ?>
/map_e.png" style="z-index:1; position:relative;" /></a></td>
							</tr>
							<tr>
								<td align="center"></td>
								<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']-$this->_tpl_vars['map']['size']+1; ?>
"><img src="../graphic/<?php echo $this->_tpl_vars['map_graphic']; ?>
/map_s.png" style="z-index:1; position:relative;" /></a></td>
								<td align="center"></td>
							</tr>
						</table>
					</td>
					<td valign="top"></td>
				</tr>
			</table><br />
			<table class="vis" style="border: 1px solid #fee47d; -moz-border-radius: 5px 5px 5px 5px; -webkit-border-top-left-radius: 5px; -webkit-border-top-right-radius: 5px; -webkit-border-bottom-left-radius: 5px; -webkit-border-bottom-right-radius: 5px; border-collapse:separate; text-align:left; margin-left:5px;" width="100%">
				<tr class="nowrap">
					<td class="small" rowspan="2" valign="top">Padr&atilde;o:</td>
					<td style="background-image: none; width:15px; padding:0px; background-color:rgb(255,255,255)"></td>
					<td class="small" style="white-space:normal"> Aldeia atual</td>
					<td style="background-image: none; width:15px; padding:0px; background-color:rgb(240,200,0)"></td>
					<td class="small" style="white-space:normal; width:100px;"> Suas aldeias</td>
					<td style="background-image: none; width:15px; padding:0px; background-color:rgb(0,0,244)"></td>
					<td class="small" style="white-space:normal"> Sua tribo</td>
					<td style="background-image: none; width:15px; padding:0px; background-color:rgb(150,150,150)"></td>
					<td class="small" style="white-space:normal"> Abandonadas</td>
					<td style="background-image: none; width:15px; padding:0px; background-color:rgb(130,60,10)"></td>
					<td class="small" style="white-space:normal"> Outras aldeias</td>
				</tr>
					<tr class="nowrap">
						<td style="background-image: none; width:15px; padding:0px; background-color:rgb(0,0,0)"></td>
						<td class="small" style="white-space:normal;"> Modo noturno</td>
						<td style="background-image: none; width:15px; padding:0px; background-color:rgb(255,128,0)"></td>
						<td class="small" style="white-space:normal;" colspan="7"> Sob prote&ccedil;&atilde;o</td>
					</tr>
				<tr class="nowrap">
					<td class="small" valign="top">Tribo:</td>
					<td style="background-image: none; width:15px; padding:0px; background-color:rgb(0,160,244)"></td>
					<td class="small" style="white-space:normal;"> Aliados</td>
					<td style="background-image: none; width:15px; padding:0px; background-color:rgb(128,0,128)"></td>
					<td class="small" style="white-space:normal;" colspan="3"> Pactos de n&atilde;o-agress&atilde;o (PNA)</td>
					<td style="background-image: none; width:15px; padding:0px; background-color:rgb(244,0,0)"></td>
					<td class="small" style="white-space:normal" colspan="3"> Inimigos</td>
				</tr>
			</table>
		</td>
		<td valign="top">
			<table>
				<tr>
					<td valign="top">
						<table cellspacing="0" cellpadding="0" class="vis" style="border: 1px solid #FEE47D;">
							<tr>
								<td align="center"></td>
								<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']+50; ?>
"><img src="../graphic/<?php echo $this->_tpl_vars['map_graphic']; ?>
/map_n.png" style="z-index:1; position:relative;" /></a></td>
								<td align="center"></td>
							</tr>
							<tr>
								<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']-50; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']; ?>
"><img src="../graphic/<?php echo $this->_tpl_vars['map_graphic']; ?>
/map_w.png" style="z-index:1; position:relative;" /></a></td>
								<td>
									<form style="margin:0px;padding:0px;border:1px solid #FEE47D;" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=map" method="post">
										<input type="hidden" name="curx" value="<?php echo $this->_tpl_vars['map']['x']; ?>
" maxlength="3" />
										<input type="hidden" name="cury" value="<?php echo $this->_tpl_vars['map']['y']; ?>
" maxlength="3" />
										<input type="image" name="" src="minimap.php?x=<?php echo $this->_tpl_vars['map']['x']; ?>
&y=<?php echo $this->_tpl_vars['map']['y']; ?>
&id=<?php echo $this->_tpl_vars['village']['id']; ?>
"/>
									</form>
								</td>
								<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']+50; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']; ?>
"><img src="../graphic/<?php echo $this->_tpl_vars['map_graphic']; ?>
/map_e.png" style="z-index:1; position:relative;" /></a></td>
							</tr>
							<tr>
								<td align="center"></td>
								<td align="center"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['map']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['map']['y']-50; ?>
"><img src="../graphic/<?php echo $this->_tpl_vars['map_graphic']; ?>
/map_s.png" style="z-index:1; position:relative;" /></a></td>
								<td align="center"></td>
							</tr>
						</table>
					</td>
					<td valign="top"></td>
				</tr>
			</table>
			<table class="vis" style="border: 1px solid #FEE47D;" align="center">
				<tr><th colspan="2">Centralizar mapa</th></tr>
				<tr>
					<form style="text-align:center;" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map" method="post">
						<td>
							X: <input type="text" class="datax" name="x" maxlength="3" size="3" id="inputx" value="<?php echo $this->_tpl_vars['map']['x']; ?>
" onkeyup="xProcess('inputx', 'inputy')">
							Y: <input type="text" class="datay" name="y" maxlength="3" size="3" id="inputy" value="<?php echo $this->_tpl_vars['map']['y']; ?>
" >
			               <input type="submit" class="button" name="go" value="Ok" />
						</td>
					</form>
				</tr>
			</table>
		</td>
	</tr>
</table>