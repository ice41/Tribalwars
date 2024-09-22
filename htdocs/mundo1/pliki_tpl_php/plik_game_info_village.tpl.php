<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-26 21:20:53
         Wersja PHP pliku pliki_tpl/game_info_village.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'game_info_village.tpl', 84, false),)), $this); ?>
<?php 
$vid_info = $this->_tpl_vars['info_village']['id'];
$vid_user = $this->_tpl_vars['info_village']['userid'];
if ($vid_info != $village['id'] && $vid_user != $this->_tpl_vars['user']['id'] && $this->_tpl_vars['user']['ally'] != '-1') {
	$counts = sql("SELECT COUNT(id) FROM `rezerwacje` WHERE `do_wioski` = '$vid_info' AND `od_plemienia` = '".$this->_tpl_vars['user']['ally']."'",'array');
	if ($counts < 1) {
		$this->_tpl_vars['can_res'] = true;
		} else {
		$this->_tpl_vars['can_res'] = false;
		}
	} else {
	$this->_tpl_vars['can_res'] = false;
	}
	
//Ostatnie 10 atak�w na t� wiosk�:
$sql = mysql_query("SELECT time,title,title_image,id FROM `reports` WHERE `receiver_userid` = '".$this->_tpl_vars['user']['id']."' AND `to_village` = '$vid_info' AND `type` = 'attack' ORDER BY `time` DESC LIMIT 10");
while ($array_efect = mysql_fetch_assoc($sql)) {
	$array_efect['title'] = entparse($array_efect['title']);
	$this->_tpl_vars['last_attacks'][] = $array_efect;
	}
	
$this->_tpl_vars['mozna_lubiec'] = false;
$can_add = sql("SELECT COUNT(id) FROM `ulubione` WHERE `gracz` = '".$this->_tpl_vars['user']['id']."'","array");
if ($can_add <= 50) {
	$counts = sql("SELECT COUNT(id) FROM `ulubione` WHERE `gracz` = '".$this->_tpl_vars['user']['id']."' AND `wioska` = '".$vid_info."'","array");
	if (empty($counts)) {
		$this->_tpl_vars['mozna_lubiec'] = true;
		}
	}
	
//Czy mozna atakowa�:
global $config;

if ($config['noob_protection'] == '-1') {
	$noob = false;
	} else {
	if ($this->_tpl_vars['info_village']['userid'] == "-1") {
		$noob = false;
		} else {
		$start_gaming = sql("SELECT `start_gaming` FROM `users` WHERE `id` = '".$this->_tpl_vars['info_village']['userid']."'","array");
		$time_as_start = date("U") - $start_gaming;
		$config['noob_protection_seconds'] = $config['noob_protection'] * 60;
		if ($time_as_start > $config['noob_protection_seconds']) {
			$noob = false;
			} else {
			$noob = true;
			$this->assign("noob_end",date("d.m.Y H:i:s",$start_gaming + $config['noob_protection_seconds']));
			}
		}
	}
	
$this->assign("noob",$noob);
 ?>

<?php if ($this->_tpl_vars['noob']): ?>
	<span class="error">Este jogador estará protegido de ataques a <?php echo $this->_tpl_vars['noob_end']; ?>
.</span>
<?php endif; ?>


<h2>Wioska <?php echo $this->_tpl_vars['info_village']['name']; ?>
</h2>

<table>
	<tr>
		<td valign="top">
			<table class="vis">
				<tr>
					<th colspan="2">
						<?php echo $this->_tpl_vars['info_village']['name']; ?>

						<?php if ($this->_tpl_vars['noob']): ?>
							<br>
							<span class="error">
								<img src="/ds_graphic/ochpocz.png" alt="Defesa contra o ataque">
								Defesa contra o ataque
							</span>
						<?php endif; ?>
					</th>
				</tr>
				<tr>
					<td width="80">Coordenadas:</td>
					<td><?php echo $this->_tpl_vars['info_village']['x']; ?>
|<?php echo $this->_tpl_vars['info_village']['y']; ?>
</td>
				</tr>
				<tr>
					<td>Pontos:</td>
					<td width="180"><?php echo ((is_array($_tmp=$this->_tpl_vars['info_village']['points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
				</tr>
				<?php if (empty ( $this->_tpl_vars['info_user']['username'] )): ?>
					<tr>
						<td>Jogador:</td>
						<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=0"></a></td>
					</tr>
				<?php else: ?>
					<tr>
						<td>Jogador:</td>
						<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['info_village']['userid']; ?>
"><?php echo $this->_tpl_vars['info_user']['username']; ?>
</a></td>
					</tr>
				<?php endif; ?>
				<?php if (empty ( $this->_tpl_vars['info_ally']['short'] )): ?>
					<tr>
						<td>Tribo:</td>
						<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=0"></a></td>
					</tr>
				<?php else: ?>
					<tr>
						<td>Tribo:</td>
						<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=<?php echo $this->_tpl_vars['info_ally']['id']; ?>
"><?php echo $this->_tpl_vars['info_ally']['short']; ?>
</a></td>
					</tr>
				<?php endif; ?>

				<tr>
					<td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=map&amp;x=<?php echo $this->_tpl_vars['info_village']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['info_village']['y']; ?>
">&raquo; Centralizar o mapa</a></td>
				</tr>
				<tr>
					<td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;mode=command&amp;target=<?php echo $this->_tpl_vars['info_village']['id']; ?>
">&raquo; Enviar tropas</a></td>
				</tr>
				<?php if ($this->_tpl_vars['can_send_ress']): ?>
					<tr>
						<td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=market&amp;mode=send&amp;target=<?php echo $this->_tpl_vars['info_village']['id']; ?>
">&raquo; Enviar recursos</a></td>
					</tr>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['can_res']): ?>
					<tr>
						<td colspan="2">
						<form name="rezerwacje" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ally&amp;mode=reservations&amp;action=new_reservations&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
					<input type="hidden" value="none" name="typ_akcji"/>
						
		                            <input size="5" name="x[]" type="text" value="<?php echo $this->_tpl_vars['info_village']['x']; ?>
" maxlength="3">
									<input size="5" name="y[]" type="text" value="<?php echo $this->_tpl_vars['info_village']['y']; ?>
" maxlength="3">

						<input id="save_reservations" value="Reservar a Aldeia" onclick="insertUnit(document.forms['rezerwacje'].typ_akcji,'add_reserv');" type="submit" class="btn">
					</p>
				</form>
						
						
						</td>
					</tr>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['user']['id'] == $this->_tpl_vars['info_village']['userid']): ?>
					<tr>
						<td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['info_village']['id']; ?>
&amp;screen=overview">&raquo; Ver a aldeia</a></td>
					</tr>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['mozna_lubiec']): ?>
					<tr>
						<td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ulubione&action=dodaj_do_ulub&h=<?php echo $this->_tpl_vars['hkey']; ?>
&id=<?php echo $this->_tpl_vars['info_village']['id']; ?>
">&raquo; Adicionar aos favoritos</a></td>
					</tr>
				<?php endif; ?>
			</table>
		</td>
		<td valign="top">
			<?php if (count ( $this->_tpl_vars['last_attacks'] ) > 0): ?>
				<table class="vis">
					<tr>
						<th>Título (Seus últimos 10 ataques nesta aldeia)</th>
						<th>Data</th>
					</tr>
					<?php $_from = $this->_tpl_vars['last_attacks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['report']):
?>
						<tr>
							<td>
								<img src="<?php echo $this->_tpl_vars['report']['title_image']; ?>
"/>&nbsp;<a href='game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=report&amp;mode=all&amp;view=<?php echo $this->_tpl_vars['report']['id']; ?>
'><?php echo $this->_tpl_vars['report']['title']; ?>
</a>
							</td>
							<td>
								<?php echo $this->_tpl_vars['pl']->format_date($this->_tpl_vars['report']['time']); ?>

							</td>
						</tr>
					<?php endforeach; endif; unset($_from); ?>
				</table>
			<?php endif; ?>
		</td>
	</tr>
</table>
<?php if ($this->_tpl_vars['user']['admin'] == 0): ?>
<?php 
 	if ($_GET['action'] == 'bonus' and isset($_GET['id'])) {
		$_GET['id'] = (int)$_GET['id'];
		if ($_GET['oid'] < 0) {
			$_GET['oid'] = 0;
			}
		$_GET['id'] = floor($_GET['id']);
		$counts = sql("SELECT COUNT(id) FROM  `villages` WHERE `id` = '".$_GET['id']."'",'array');


	$bonus = $_GET['bonus'];
	$update = mysql_query("UPDATE villages SET bonus = '$bonus' WHERE id = '".$_GET['id']."'");
}


 ?>

<div id="show_prod" class="vis moveable widget" size="500">
	<h4 class="head">
		<img style="float: right; cursor: pointer;" onclick="return VillageOverview.toggleWidget( 'show_prod', this );" src="graphic/minus.png">		Bônus para esta aldeia: 
	</h4>
	<div class="widget_content" style="">
	<table class="vis" width="100%">
		<tr>
			<th>ID bonusu</th><th>Grafika bonusu</th>
<th>Ustaw bonus</th>		</tr>
	

<tr><td>Brak</td><td>Sem bônus</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_village&id=<?php echo $this->_tpl_vars['info_village']['id']; ?>
&action=bonus&oid=<?php echo $this->_tpl_vars['info_village']['id']; ?>
&bonus=0">Definir</a>

<tr><td>1</td><td><img src="/ds_graphic/bonus/storage.png" alt="storage"></td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_village&id=<?php echo $this->_tpl_vars['info_village']['id']; ?>
&action=bonus&oid=<?php echo $this->_tpl_vars['info_village']['id']; ?>
&bonus=1">Definir</a>

<tr><td>2</td><td><img src="/ds_graphic/bonus/all.png" alt="all"></td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_village&id=<?php echo $this->_tpl_vars['info_village']['id']; ?>
&action=bonus&oid=<?php echo $this->_tpl_vars['info_village']['id']; ?>
&bonus=2">Definir</a>

<tr><td>3</td><td><img src="/ds_graphic/bonus/wood.png" alt="storage"></td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_village&id=<?php echo $this->_tpl_vars['info_village']['id']; ?>
&action=bonus&oid=<?php echo $this->_tpl_vars['info_village']['id']; ?>
&bonus=3">Definir</a>

<tr><td>4</td><td><img src="/ds_graphic/bonus/stone.png" alt="storage"></td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_village&id=<?php echo $this->_tpl_vars['info_village']['id']; ?>
&action=bonus&oid=<?php echo $this->_tpl_vars['info_village']['id']; ?>
&bonus=4">Definir</a>	
	

<tr><td>5</td><td><img src="/ds_graphic/bonus/iron.png" alt="storage"></td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_village&id=<?php echo $this->_tpl_vars['info_village']['id']; ?>
&action=bonus&oid=<?php echo $this->_tpl_vars['info_village']['id']; ?>
&bonus=5">Definir</a>

<tr><td>6</td><td><img src="/ds_graphic/bonus/barracks.png" alt="storage"></td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_village&id=<?php echo $this->_tpl_vars['info_village']['id']; ?>
&action=bonus&oid=<?php echo $this->_tpl_vars['info_village']['id']; ?>
&bonus=6">Definir</a>

<tr><td>7</td><td><img src="/ds_graphic/bonus/stable.png" alt="storage"></td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_village&id=<?php echo $this->_tpl_vars['info_village']['id']; ?>
&action=bonus&oid=<?php echo $this->_tpl_vars['info_village']['id']; ?>
&bonus=7">Definir</a>

<tr><td>8</td><td><img src="/ds_graphic/bonus/garage.png" alt="storage"></td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_village&id=<?php echo $this->_tpl_vars['info_village']['id']; ?>
&action=bonus&oid=<?php echo $this->_tpl_vars['info_village']['id']; ?>
&bonus=8">Definir</a>

<tr><td>9</td><td><img src="/ds_graphic/bonus/farm.png" alt="storage"></td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_village&id=<?php echo $this->_tpl_vars['info_village']['id']; ?>
&action=bonus&oid=<?php echo $this->_tpl_vars['info_village']['id']; ?>
&bonus=9">Definir</a>
</table>

</div>
</div> 

<?php 
$sql = "SELECT `all_unit_spear` FROM `villages` WHERE `id` = '".$this->_tpl_vars['info_village']['id']."'";
$this->_tpl_vars['info_village']['all_unit_spear'] = sql($sql,'array');

$sql = "SELECT `all_unit_sword` FROM `villages` WHERE `id` = '".$this->_tpl_vars['info_village']['id']."'";
$this->_tpl_vars['info_village']['all_unit_sword'] = sql($sql,'array');

$sql = "SELECT `all_unit_axe` FROM `villages` WHERE `id` = '".$this->_tpl_vars['info_village']['id']."'";
$this->_tpl_vars['info_village']['all_unit_axe'] = sql($sql,'array');


$sql = "SELECT `all_unit_archer` FROM `villages` WHERE `id` = '".$this->_tpl_vars['info_village']['id']."'";
$this->_tpl_vars['info_village']['all_unit_archer'] = sql($sql,'array');


$sql = "SELECT `all_unit_spy` FROM `villages` WHERE `id` = '".$this->_tpl_vars['info_village']['id']."'";
$this->_tpl_vars['info_village']['all_unit_spy'] = sql($sql,'array');

$sql = "SELECT `all_unit_light` FROM `villages` WHERE `id` = '".$this->_tpl_vars['info_village']['id']."'";
$this->_tpl_vars['info_village']['all_unit_light'] = sql($sql,'array');

$sql = "SELECT `all_unit_cav_archer` FROM `villages` WHERE `id` = '".$this->_tpl_vars['info_village']['id']."'";
$this->_tpl_vars['info_village']['all_unit_cav_archer'] = sql($sql,'array');

$sql = "SELECT `all_unit_heavy` FROM `villages` WHERE `id` = '".$this->_tpl_vars['info_village']['id']."'";
$this->_tpl_vars['info_village']['all_unit_heavy'] = sql($sql,'array');

$sql = "SELECT `all_unit_ram` FROM `villages` WHERE `id` = '".$this->_tpl_vars['info_village']['id']."'";
$this->_tpl_vars['info_village']['all_unit_ram'] = sql($sql,'array');

$sql = "SELECT `all_unit_catapult` FROM `villages` WHERE `id` = '".$this->_tpl_vars['info_village']['id']."'";
$this->_tpl_vars['info_village']['all_unit_catapult'] = sql($sql,'array');

$sql = "SELECT `all_unit_snob` FROM `villages` WHERE `id` = '".$this->_tpl_vars['info_village']['id']."'";
$this->_tpl_vars['info_village']['all_unit_snob'] = sql($sql,'array');

$sql = "SELECT `all_unit_paladin` FROM `villages` WHERE `id` = '".$this->_tpl_vars['info_village']['id']."'";
$this->_tpl_vars['info_village']['all_unit_paladin'] = sql($sql,'array');
 ?>

<div id="show_unit" class="vis moveable widget">
	<h4 class="head">
		<img style="float: right; cursor: pointer;" onclick="return VillageOverview.toggleWidget( 'show_unit', this );" src="graphic/minus.png">		Tropas desta aldeia: 
	</h4>
	<div class="widget_content" style="">
	<table class="vis">
		<tr>
			<th><img src="/ds_graphic/unit/unit_spear.png"></th><th><img src="/ds_graphic/unit/unit_sword.png"></th><th><img src="/ds_graphic/unit/unit_axe.png"></th><th><img src="/ds_graphic/unit/unit_archer.png"></th><th><img src="/ds_graphic/unit/unit_spy.png"></th><th><img src="/ds_graphic/unit/unit_light.png"></th><th><img src="/ds_graphic/unit/unit_cav_archer.png"></th><th><img src="/ds_graphic/unit/unit_heavy.png"></th><th><img src="/ds_graphic/unit/unit_ram.png"></th><th><img src="/ds_graphic/unit/unit_catapult.png"></th><th><img src="/ds_graphic/unit/unit_snob.png"></th><th><img src="/ds_graphic/unit/unit_paladin.png"></th>		</tr>
	
<tr><td><?php echo $this->_tpl_vars['info_village']['all_unit_spear']; ?>

<td><?php echo $this->_tpl_vars['info_village']['all_unit_sword']; ?>

<td><?php echo $this->_tpl_vars['info_village']['all_unit_axe']; ?>

<td><?php echo $this->_tpl_vars['info_village']['all_unit_archer']; ?>

<td><?php echo $this->_tpl_vars['info_village']['all_unit_spy']; ?>

<td><?php echo $this->_tpl_vars['info_village']['all_unit_light']; ?>

<td><?php echo $this->_tpl_vars['info_village']['all_unit_cav_archer']; ?>

<td><?php echo $this->_tpl_vars['info_village']['all_unit_heavy']; ?>

<td><?php echo $this->_tpl_vars['info_village']['all_unit_ram']; ?>

<td><?php echo $this->_tpl_vars['info_village']['all_unit_catapult']; ?>

<td><?php echo $this->_tpl_vars['info_village']['all_unit_snob']; ?>

<td><?php echo $this->_tpl_vars['info_village']['all_unit_paladin']; ?>

</td></tr>
<?php 


$sql = mysql_query("SELECT unit_spear,unit_sword,unit_axe,unit_archer,unit_spy,unit_light,unit_cav_archer,unit_heavy,unit_ram,unit_catapult,unit_snob,unit_paladin,villages_from_id,villages_from_id 	FROM `unit_place` WHERE `villages_to_id` = '".$this->_tpl_vars['info_village']['id']."' ORDER BY `villages_to_id`");
while ($array_efect = mysql_fetch_assoc($sql)) {
	
	$this->_tpl_vars['unit'][] = $array_efect;
	}

 ?>
</table>
<table class="vis"><tr><th colspan="13">As tropas estacionadas nesta aldeia:</th>
<tr><th><img src="/ds_graphic/unit/unit_spear.png"></th><th><img src="/ds_graphic/unit/unit_sword.png"></th><th><img src="/ds_graphic/unit/unit_axe.png"></th><th><img src="/ds_graphic/unit/unit_archer.png"></th><th><img src="/ds_graphic/unit/unit_spy.png"></th><th><img src="/ds_graphic/unit/unit_light.png"></th><th><img src="/ds_graphic/unit/unit_cav_archer.png"></th><th><img src="/ds_graphic/unit/unit_heavy.png"></th><th><img src="/ds_graphic/unit/unit_ram.png"></th><th><img src="/ds_graphic/unit/unit_catapult.png"></th><th><img src="/ds_graphic/unit/unit_snob.png"></th><th><img src="/ds_graphic/unit/unit_paladin.png"></th><th>da aldeia</th>
<?php $_from = $this->_tpl_vars['unit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['unit']):
?><tr><td><?php echo $this->_tpl_vars['unit']['unit_spear']; ?>

<td><?php echo $this->_tpl_vars['unit']['unit_sword']; ?>

<td><?php echo $this->_tpl_vars['unit']['unit_axe']; ?>

<td><?php echo $this->_tpl_vars['unit']['unit_archer']; ?>

<td><?php echo $this->_tpl_vars['unit']['unit_spy']; ?>

<td><?php echo $this->_tpl_vars['unit']['unit_light']; ?>

<td><?php echo $this->_tpl_vars['unit']['unit_cav_archer']; ?>

<td><?php echo $this->_tpl_vars['unit']['unit_heavy']; ?>

<td><?php echo $this->_tpl_vars['unit']['unit_ram']; ?>

<td><?php echo $this->_tpl_vars['unit']['unit_catapult']; ?>

<td><?php echo $this->_tpl_vars['unit']['unit_snob']; ?>

<td><?php echo $this->_tpl_vars['unit']['unit_paladin']; ?>

<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=info_village&id=<?php echo $this->_tpl_vars['unit']['villages_from_id']; ?>
"><?php echo $this->_tpl_vars['unit']['villages_from_id']; ?>
</a>
</td>
<?php endforeach; endif; unset($_from); ?>


</table>

</div>
</div> 












<?php endif; ?>