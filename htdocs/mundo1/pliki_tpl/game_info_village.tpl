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
{/php}

{if $noob}
	<span class="error">Este jogador estará protegido de ataques a {$noob_end}.</span>
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
								<img src="/ds_graphic/ochpocz.png" alt="Defesa contra o ataque">
								Defesa contra o ataque
							</span>
						{/if}
					</th>
				</tr>
				<tr>
					<td width="80">Coordenadas:</td>
					<td>{$info_village.x}|{$info_village.y}</td>
				</tr>
				<tr>
					<td>Pontos:</td>
					<td width="180">{$info_village.points|format_number}</td>
				</tr>
				{if empty($info_user.username)}
					<tr>
						<td>Jogador:</td>
						<td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id=0"></a></td>
					</tr>
				{else}
					<tr>
						<td>Jogador:</td>
						<td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$info_village.userid}">{$info_user.username}</a></td>
					</tr>
				{/if}
				{if empty($info_ally.short)}
					<tr>
						<td>Tribo:</td>
						<td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id=0"></a></td>
					</tr>
				{else}
					<tr>
						<td>Tribo:</td>
						<td><a href="game.php?village={$village.id}&amp;screen=info_ally&amp;id={$info_ally.id}">{$info_ally.short}</a></td>
					</tr>
				{/if}

				<tr>
					<td colspan="2"><a href="game.php?village={$village.id}&amp;screen=map&amp;x={$info_village.x}&amp;y={$info_village.y}">&raquo; Centralizar o mapa</a></td>
				</tr>
				<tr>
					<td colspan="2"><a href="game.php?village={$village.id}&amp;screen=place&amp;mode=command&amp;target={$info_village.id}">&raquo; Enviar tropas</a></td>
				</tr>
				{if $can_send_ress}
					<tr>
						<td colspan="2"><a href="game.php?village={$village.id}&amp;screen=market&amp;mode=send&amp;target={$info_village.id}">&raquo; Enviar recursos</a></td>
					</tr>
				{/if}
				{if $can_res}
					<tr>
						<td colspan="2">
						<form name="rezerwacje" action="game.php?village={$village.id}&amp;screen=ally&amp;mode=reservations&amp;action=new_reservations&amp;h={$hkey}" method="post">
					<input type="hidden" value="none" name="typ_akcji"/>
						
		                            <input size="5" name="x[]" type="text" value="{$info_village.x}" maxlength="3">
									<input size="5" name="y[]" type="text" value="{$info_village.y}" maxlength="3">

						<input id="save_reservations" value="Reservar a Aldeia" onclick="insertUnit(document.forms['rezerwacje'].typ_akcji,'add_reserv');" type="submit" class="btn">
					</p>
				</form>
						
						
						</td>
					</tr>
				{/if}
				{if $user.id==$info_village.userid}
					<tr>
						<td colspan="2"><a href="game.php?village={$info_village.id}&amp;screen=overview">&raquo; Ver a aldeia</a></td>
					</tr>
				{/if}
				{if $mozna_lubiec}
					<tr>
						<td colspan="2"><a href="game.php?village={$village.id}&amp;screen=ulubione&action=dodaj_do_ulub&h={$hkey}&id={$info_village.id}">&raquo; Adicionar aos favoritos</a></td>
					</tr>
				{/if}
			</table>
		</td>
		<td valign="top">
			{if count($last_attacks) > 0}
				<table class="vis">
					<tr>
						<th>Título (Seus últimos 10 ataques nesta aldeia)</th>
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
{if $user.admin == 0}
{php}
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


{/php}

<div id="show_prod" class="vis moveable widget" size="500">
	<h4 class="head">
		<img style="float: right; cursor: pointer;" onclick="return VillageOverview.toggleWidget( 'show_prod', this );" src="graphic/minus.png">		Bônus para esta aldeia: 
	</h4>
	<div class="widget_content" style="">
	<table class="vis" width="100%">
		<tr>
			<th>ID bonusu</th><th>Grafika bonusu</th>
<th>Ustaw bonus</th>		</tr>
	

<tr><td>Brak</td><td>Sem bônus</td><td><a href="game.php?village={$village.id}&screen=info_village&id={$info_village.id}&action=bonus&oid={$info_village.id}&bonus=0">Definir</a>

<tr><td>1</td><td><img src="/ds_graphic/bonus/storage.png" alt="storage"></td><td><a href="game.php?village={$village.id}&screen=info_village&id={$info_village.id}&action=bonus&oid={$info_village.id}&bonus=1">Definir</a>

<tr><td>2</td><td><img src="/ds_graphic/bonus/all.png" alt="all"></td><td><a href="game.php?village={$village.id}&screen=info_village&id={$info_village.id}&action=bonus&oid={$info_village.id}&bonus=2">Definir</a>

<tr><td>3</td><td><img src="/ds_graphic/bonus/wood.png" alt="storage"></td><td><a href="game.php?village={$village.id}&screen=info_village&id={$info_village.id}&action=bonus&oid={$info_village.id}&bonus=3">Definir</a>

<tr><td>4</td><td><img src="/ds_graphic/bonus/stone.png" alt="storage"></td><td><a href="game.php?village={$village.id}&screen=info_village&id={$info_village.id}&action=bonus&oid={$info_village.id}&bonus=4">Definir</a>	
	

<tr><td>5</td><td><img src="/ds_graphic/bonus/iron.png" alt="storage"></td><td><a href="game.php?village={$village.id}&screen=info_village&id={$info_village.id}&action=bonus&oid={$info_village.id}&bonus=5">Definir</a>

<tr><td>6</td><td><img src="/ds_graphic/bonus/barracks.png" alt="storage"></td><td><a href="game.php?village={$village.id}&screen=info_village&id={$info_village.id}&action=bonus&oid={$info_village.id}&bonus=6">Definir</a>

<tr><td>7</td><td><img src="/ds_graphic/bonus/stable.png" alt="storage"></td><td><a href="game.php?village={$village.id}&screen=info_village&id={$info_village.id}&action=bonus&oid={$info_village.id}&bonus=7">Definir</a>

<tr><td>8</td><td><img src="/ds_graphic/bonus/garage.png" alt="storage"></td><td><a href="game.php?village={$village.id}&screen=info_village&id={$info_village.id}&action=bonus&oid={$info_village.id}&bonus=8">Definir</a>

<tr><td>9</td><td><img src="/ds_graphic/bonus/farm.png" alt="storage"></td><td><a href="game.php?village={$village.id}&screen=info_village&id={$info_village.id}&action=bonus&oid={$info_village.id}&bonus=9">Definir</a>
</table>

</div>
</div> 

{php}
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
{/php}

<div id="show_unit" class="vis moveable widget">
	<h4 class="head">
		<img style="float: right; cursor: pointer;" onclick="return VillageOverview.toggleWidget( 'show_unit', this );" src="graphic/minus.png">		Tropas desta aldeia: 
	</h4>
	<div class="widget_content" style="">
	<table class="vis">
		<tr>
			<th><img src="/ds_graphic/unit/unit_spear.png"></th><th><img src="/ds_graphic/unit/unit_sword.png"></th><th><img src="/ds_graphic/unit/unit_axe.png"></th><th><img src="/ds_graphic/unit/unit_archer.png"></th><th><img src="/ds_graphic/unit/unit_spy.png"></th><th><img src="/ds_graphic/unit/unit_light.png"></th><th><img src="/ds_graphic/unit/unit_cav_archer.png"></th><th><img src="/ds_graphic/unit/unit_heavy.png"></th><th><img src="/ds_graphic/unit/unit_ram.png"></th><th><img src="/ds_graphic/unit/unit_catapult.png"></th><th><img src="/ds_graphic/unit/unit_snob.png"></th><th><img src="/ds_graphic/unit/unit_paladin.png"></th>		</tr>
	
<tr><td>{$info_village.all_unit_spear}
<td>{$info_village.all_unit_sword}
<td>{$info_village.all_unit_axe}
<td>{$info_village.all_unit_archer}
<td>{$info_village.all_unit_spy}
<td>{$info_village.all_unit_light}
<td>{$info_village.all_unit_cav_archer}
<td>{$info_village.all_unit_heavy}
<td>{$info_village.all_unit_ram}
<td>{$info_village.all_unit_catapult}
<td>{$info_village.all_unit_snob}
<td>{$info_village.all_unit_paladin}
</td></tr>
{php}


$sql = mysql_query("SELECT unit_spear,unit_sword,unit_axe,unit_archer,unit_spy,unit_light,unit_cav_archer,unit_heavy,unit_ram,unit_catapult,unit_snob,unit_paladin,villages_from_id,villages_from_id 	FROM `unit_place` WHERE `villages_to_id` = '".$this->_tpl_vars['info_village']['id']."' ORDER BY `villages_to_id`");
while ($array_efect = mysql_fetch_assoc($sql)) {
	
	$this->_tpl_vars['unit'][] = $array_efect;
	}

{/php}
</table>
<table class="vis"><tr><th colspan="13">As tropas estacionadas nesta aldeia:</th>
<tr><th><img src="/ds_graphic/unit/unit_spear.png"></th><th><img src="/ds_graphic/unit/unit_sword.png"></th><th><img src="/ds_graphic/unit/unit_axe.png"></th><th><img src="/ds_graphic/unit/unit_archer.png"></th><th><img src="/ds_graphic/unit/unit_spy.png"></th><th><img src="/ds_graphic/unit/unit_light.png"></th><th><img src="/ds_graphic/unit/unit_cav_archer.png"></th><th><img src="/ds_graphic/unit/unit_heavy.png"></th><th><img src="/ds_graphic/unit/unit_ram.png"></th><th><img src="/ds_graphic/unit/unit_catapult.png"></th><th><img src="/ds_graphic/unit/unit_snob.png"></th><th><img src="/ds_graphic/unit/unit_paladin.png"></th><th>da aldeia</th>
{foreach from=$unit item=unit}<tr><td>{$unit.unit_spear}
<td>{$unit.unit_sword}
<td>{$unit.unit_axe}
<td>{$unit.unit_archer}
<td>{$unit.unit_spy}
<td>{$unit.unit_light}
<td>{$unit.unit_cav_archer}
<td>{$unit.unit_heavy}
<td>{$unit.unit_ram}
<td>{$unit.unit_catapult}
<td>{$unit.unit_snob}
<td>{$unit.unit_paladin}
<td><a href="game.php?village={$village.id}&screen=info_village&id={$unit.villages_from_id}">{$unit.villages_from_id}</a>
</td>
{/foreach}


</table>

</div>
</div> 












{/if}