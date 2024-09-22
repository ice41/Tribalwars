{php}
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
	
//Ostatnie 10 atak�w na t� wiosk�:
$sql = mysql_query("SELECT time,title,title_image FROM `reports` WHERE `receiver_userid` = '".$this->_tpl_vars['user']['id']."' AND `to_village` = '$vid_info' ORDER BY `time` DESC LIMIT 10");
while ($array_efect = mysql_fetch_assoc($sql)) {
	$array_efect['title'] = entparse($array_efect['title']);
	$this->_tpl_vars['last_attacks'][] = $array_efect;
	}
{/php}

<h2>Wioska {$info_village.name}</h2>

<table>
	<tr>
		<td valign="top">
			<table class="vis">
				<tr>
					<th colspan="2">{$info_village.name}</th>
				</tr>
				<tr>
					<td width="80">Wsp��dne:</td>
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
						<td>Plemi�:</td>
						<td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id=0"></a></td>
					</tr>
				{else}
					<tr>
						<td>Plemi�:</td>
						<td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$info_ally.id}">{$info_ally.short}</a></td>
					</tr>
				{/if}

				<tr>
					<td colspan="2"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$info_village.x}&amp;y={$info_village.y}">&raquo; Scentruj map�</a></td>
				</tr>
				<tr>
					<td colspan="2"><a href="game.php?village={$village.id}&amp;screen=place&amp;mode=command&amp;target={$info_village.id}">&raquo; Wy�lij wojsko</a></td>
				</tr>
				{if $can_send_ress}
					<tr>
						<td colspan="2"><a href="game.php?village={$village.id}&amp;screen=market&amp;mode=send&amp;target={$info_village.id}">&raquo; Wy�lij surowce</a></td>
					</tr>
				{/if}
				{if $can_res}
					<tr>
						<td colspan="2"><a href="game.php?village={$village.id}&screen=ally&mode=reservations&amp;x={$info_village.x}&amp;y={$info_village.y}">&raquo; Zarezerwuj t� wiosk�</a></td>
					</tr>
				{/if}
				{if $user.id==$info_village.userid}
					<tr>
						<td colspan="2"><a href="game.php?village={$info_village.id}&amp;screen=overview">&raquo; Do podgl�du wioski</a></td>
					</tr>
				{/if}
			</table>
		</td>
		<td valign="top">
			{if count($last_attacks) > 0}
				<table class="vis">
					<tr>
						<th>Tytu� (Twoje 10 ostatnich atak�w na t� wiosk�)</th>
						<th>Data</th>
					</tr>
					{foreach from=$last_attacks item=report}
						<tr>
							<td>
								<img src="{$report.title_image}"/>&nbsp;{$report.title}
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