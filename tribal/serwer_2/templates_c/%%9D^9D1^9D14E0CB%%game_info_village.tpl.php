<?php /* Smarty version 2.6.14, created on 2014-07-03 02:37:26
         compiled from game_info_village.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'game_info_village.tpl', 83, false),)), $this); ?>
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
	
//Ostatnie 10 ataków na t¹ wioskê:
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
	
//Czy mozna atakowaæ:
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
	<span class="error">Este jogador estará protegido contra os ataques até <?php echo $this->_tpl_vars['noob_end']; ?>
.</span>
<?php endif; ?>


<h2>Aldeia <?php echo $this->_tpl_vars['info_village']['name']; ?>
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
								<img src="/ds_graphic/ochpocz.png" alt="Defesa contra ataques">
								Defesa contra ataques
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
">&raquo; Centralizar mapa</a></td>
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
						<td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=ally&mode=reservations&amp;x=<?php echo $this->_tpl_vars['info_village']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['info_village']['y']; ?>
">&raquo; Reservar</a></td>
					</tr>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['user']['id'] == $this->_tpl_vars['info_village']['userid']): ?>
					<tr>
						<td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['info_village']['id']; ?>
&amp;screen=overview">&raquo; Reservar</a></td>
					</tr>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['mozna_lubiec']): ?>
					<tr>
						<td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ulubione&action=dodaj_do_ulub&h=<?php echo $this->_tpl_vars['hkey']; ?>
&id=<?php echo $this->_tpl_vars['info_village']['id']; ?>
">&raquo; Adicionar aos Favoritos</a></td>
					</tr>
				<?php endif; ?>
			</table>
		</td>
		<td valign="top">
			<?php if (count ( $this->_tpl_vars['last_attacks'] ) > 0): ?>
				<table class="vis">
					<tr>
						<th>Título (seus 10 ataques mais recentes sobre a aldeia)</th>
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