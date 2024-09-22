{php}
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
{/php}

{if $noob}
	<span class="error">Ten gracz bêdzie chroniony przed atakami do {$noob_end}.</span>
{/if}


<h2>Wioska {$info_village.name}</h2>

<table>
	<tr>
		<td valign="top">
			<table class="vis">
				<tr>
					<th colspan="2">
						{$info_village.name}
						{if $noob}
							<br>
							<span class="error">
								<img src="/ds_graphic/ochpocz.png" alt="Obrona przed atakiem">
								Obrona przed atakiem
							</span>
						{/if}
					</th>
				</tr>
				<tr>
					<td width="80">Wspó³rzêdne:</td>
					<td>{$info_village.x}|{$info_village.y}</td>
				</tr>
				<tr>
					<td>Punkty:</td>
					<td width="180">{$info_village.points|format_number}</td>
				</tr>
				{if empty($info_user.username)}
					<tr>
						<td>Gracz:</td>
						<td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id=0"></a></td>
					</tr>
				{else}
					<tr>
						<td>Gracz:</td>
						<td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$info_village.userid}">{$info_user.username}</a></td>
					</tr>
				{/if}
				{if empty($info_ally.short)}
					<tr>
						<td>Plemiê:</td>
						<td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id=0"></a></td>
					</tr>
				{else}
					<tr>
						<td>Plemiê:</td>
						<td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$info_ally.id}">{$info_ally.short}</a></td>
					</tr>
				{/if}

				<tr>
					<td colspan="2"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$info_village.x}&amp;y={$info_village.y}">&raquo; Scentruj mapê</a></td>
				</tr>
				<tr>
					<td colspan="2"><a href="game.php?village={$village.id}&amp;screen=place&amp;mode=command&amp;target={$info_village.id}">&raquo; Wyœlij wojsko</a></td>
				</tr>
				{if $can_send_ress}
					<tr>
						<td colspan="2"><a href="game.php?village={$village.id}&amp;screen=market&amp;mode=send&amp;target={$info_village.id}">&raquo; Wyœlij surowce</a></td>
					</tr>
				{/if}
				{if $can_res}
					<tr>
						<td colspan="2"><a href="game.php?village={$village.id}&screen=ally&mode=reservations&amp;x={$info_village.x}&amp;y={$info_village.y}">&raquo; Zarezerwuj t¹ wioskê</a></td>
					</tr>
				{/if}
				{if $user.id==$info_village.userid}
					<tr>
						<td colspan="2"><a href="game.php?village={$info_village.id}&amp;screen=overview">&raquo; Do podgl¹du wioski</a></td>
					</tr>
				{/if}
				{if $mozna_lubiec}
					<tr>
						<td colspan="2"><a href="game.php?village={$village.id}&amp;screen=ulubione&action=dodaj_do_ulub&h={$hkey}&id={$info_village.id}">&raquo; Dodaæ do ulubionych</a></td>
					</tr>
				{/if}
			</table>
		</td>
		<td valign="top">
			{if count($last_attacks) > 0}
				<table class="vis">
					<tr>
						<th>Tytu³ (Twoje 10 ostatnich ataków na t¹ wioskê)</th>
						<th>Data</th>
					</tr>
					{foreach from=$last_attacks item=report}
						<tr>
							<td>
								<img src="{$report.title_image}"/>&nbsp;<a href='game.php?village={$village.id}&amp;screen=report&amp;mode=all&amp;view={$report.id}'>{$report.title}</a>
							</td>
							<td>
								{$pl->format_date($report.time)}
							</td>
						</tr>
					{/foreach}
				</table>
			{/if}
		</td>
	</tr>
</table>