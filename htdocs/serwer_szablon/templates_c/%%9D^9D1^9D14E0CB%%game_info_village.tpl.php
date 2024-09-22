<?php /* Smarty version 2.6.14, created on 2012-01-30 20:52:45
         compiled from game_info_village.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'game_info_village.tpl', 38, false),)), $this); ?>
<?php 
$vid_info = $this->_tpl_vars['info_village']['id'];
$vid_user = $this->_tpl_vars['info_village']['userid'];
if ($vid_info != $village['id'] && $vid_user != $this->_tpl_vars['user']['id']) {
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
$sql = mysql_query("SELECT time,title,title_image FROM `reports` WHERE `receiver_userid` = '".$this->_tpl_vars['user']['id']."' AND `to_village` = '$vid_info' ORDER BY `time` DESC LIMIT 10");
while ($array_efect = mysql_fetch_assoc($sql)) {
	$array_efect['title'] = entparse($array_efect['title']);
	$this->_tpl_vars['last_attacks'][] = $array_efect;
	}
 ?>

<h2>Wioska <?php echo $this->_tpl_vars['info_village']['name']; ?>
</h2>

<table>
	<tr>
		<td valign="top">
			<table class="vis">
				<tr>
					<th colspan="2"><?php echo $this->_tpl_vars['info_village']['name']; ?>
</th>
				</tr>
				<tr>
					<td width="80">Wspó³¿êdne:</td>
					<td><?php echo $this->_tpl_vars['info_village']['x']; ?>
|<?php echo $this->_tpl_vars['info_village']['y']; ?>
</td>
				</tr>
				<tr>
					<td>Punkty:</td>
					<td width="180"><?php echo ((is_array($_tmp=$this->_tpl_vars['info_village']['points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
				</tr>
				<?php if (empty ( $this->_tpl_vars['info_user']['username'] )): ?>
					<tr>
						<td>Gracz:</td>
						<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=0"></a></td>
					</tr>
				<?php else: ?>
					<tr>
						<td>Gracz:</td>
						<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['info_village']['userid']; ?>
"><?php echo $this->_tpl_vars['info_user']['username']; ?>
</a></td>
					</tr>
				<?php endif; ?>
				<?php if (empty ( $this->_tpl_vars['info_ally']['short'] )): ?>
					<tr>
						<td>Plemiê:</td>
						<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=0"></a></td>
					</tr>
				<?php else: ?>
					<tr>
						<td>Plemiê:</td>
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
">&raquo; Scentruj mapê</a></td>
				</tr>
				<tr>
					<td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;mode=command&amp;target=<?php echo $this->_tpl_vars['info_village']['id']; ?>
">&raquo; Wyœlij wojsko</a></td>
				</tr>
				<?php if ($this->_tpl_vars['can_send_ress']): ?>
					<tr>
						<td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=market&amp;mode=send&amp;target=<?php echo $this->_tpl_vars['info_village']['id']; ?>
">&raquo; Wyœlij surowce</a></td>
					</tr>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['can_res']): ?>
					<tr>
						<td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=ally&mode=reservations&amp;x=<?php echo $this->_tpl_vars['info_village']['x']; ?>
&amp;y=<?php echo $this->_tpl_vars['info_village']['y']; ?>
">&raquo; Zarezerwuj t¹ wioskê</a></td>
					</tr>
				<?php endif; ?>
				<?php if ($this->_tpl_vars['user']['id'] == $this->_tpl_vars['info_village']['userid']): ?>
					<tr>
						<td colspan="2"><a href="game.php?village=<?php echo $this->_tpl_vars['info_village']['id']; ?>
&amp;screen=overview">&raquo; Do podgl¹du wioski</a></td>
					</tr>
				<?php endif; ?>
			</table>
		</td>
		<td valign="top">
			<?php if (count ( $this->_tpl_vars['last_attacks'] ) > 0): ?>
				<table class="vis">
					<tr>
						<th>Tytu³ (Twoje 10 ostatnich ataków na t¹ wioskê)</th>
						<th>Data</th>
					</tr>
					<?php $_from = $this->_tpl_vars['last_attacks']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['report']):
?>
						<tr>
							<td>
								<img src="<?php echo $this->_tpl_vars['report']['title_image']; ?>
"/>&nbsp;<?php echo $this->_tpl_vars['report']['title']; ?>

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