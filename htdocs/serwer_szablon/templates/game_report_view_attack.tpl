{php}
$report_info = sql("SELECT bonus_noc,f_units,sorowce_poz,budynki,att_pala_item,def_pala_item,att_pala_name,def_pala_name,pala_find_item FROM `reports` WHERE `id` = '".$this->_tpl_vars['report']['id']."'",'assoc');

global $pala_bonus,$cl_builds;

$report_info['f_units'] = explode(';',$report_info['f_units']);
if (count($report_info['f_units']) > 1) {
	$pzw_units_see = true;
	} else {
	$pzw_units_see = false;
	}
$this->_tpl_vars['def_out_units_see'] = $pzw_units_see;

$report_info['sorowce_poz'] = explode(';',$report_info['sorowce_poz']);
if (array_sum($report_info['sorowce_poz']) > 0) {
	$pzw_res_see = true;
	} else {
	$pzw_res_see = false;
	}
	
$this->_tpl_vars['def_out_res_see'] = $pzw_res_see;
$report_info['budynki'] = explode(';',$report_info['budynki']);

$i = 0;

foreach ($this->_tpl_vars['cl_units']->get_array("dbname") as $dbname) {
	if ($dbname == 'unit_paladin') {
		$pala_id = $i;
		}
	if ($dbname == 'unit_spy') {
		$spy_id = $i;
		}
	$i++;
	}
	
if (($this->_tpl_vars['report_units']['units_a'][$spy_id] - $this->_tpl_vars['report_units']['units_b'][$spy_id]) > 0) {
	$OR_SPY = true;
	}
	
$i = 0;

$this->_tpl_vars['reportps'] = $report_info;
$this->_tpl_vars['pala_bonuses'] = $pala_bonus;
$this->_tpl_vars['cl_builds'] = $cl_builds;
$this->_tpl_vars['unit_paladin'] = $pala_id;
$this->_tpl_vars['OR_SPY'] = $OR_SPY;
{/php}

{if $report.wins=='att'}
	<h3>Agresor zwyci�y�</h3>
{else}
    <h3>Obro�ca zwyci�y�</h3>
{/if}

<h4>Szcz�cie (z punktu widzenia agresora)</h4>
<table id="attack_luck">
	{if $report.luck<0}
		<tr>
			<td class="nobg" style="padding: 0pt;"><b>{$report.luck}%</b></td>
			<td class="nobg"><img src="graphic/rabe.png?1" alt="Pech"></td>

			<td class="nobg">

				<table class="luck" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td class="luck-item nobg" height="12" width="{math equation="a-(b*(x * y))" b=-1 a=50 x=$report.luck y=2}"></td>
							<td class="luck-item nobg" style="border-right: 1px solid rgb(0, 0, 0); background-image: url(graphic/balken_pech.png?1);" width="{math equation="b*(x * y)" b=-1 x=$report.luck y=2}"></td>
							<td class="luck-item nobg" width="50"></td>
						</tr>
					</tbody>
				</table>
			</td>

			<td class="nobg"><img src="graphic/klee_grau.png?1" alt="Szcz�cie"></td>
		</tr>
	{else}
		<tr>
			<td class="nobg" style="padding: 0pt;"><b>{$report.luck}%</b></td>
			<td class="nobg"><img src="graphic/rabe.png?1" alt="Pech"></td>

			<td class="nobg">

				<table class="luck" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td class="luck-item nobg" height="12" width="50"></td>
							<td class="luck-item nobg" style="border-left: 1px solid rgb(0, 0, 0); background-image: url(graphic/balken_glueck.png?1);" width="{math equation="x * y" x=$report.luck y=2}"></td>
							<td class="luck-item nobg" width="{math equation="a-(x * y)" a=50 x=$report.luck y=2}"></td>
						</tr>
					</tbody>
				</table>
			</td>

			<td class="nobg"><img src="graphic/klee_grau.png?1" alt="Szcz�cie"></td>
		</tr>
	{/if}
</table>

{if $moral_activ=='true'}
	<table>
	<tr><td><h4>Morale: {$report.moral}%</h4></td></tr>
	</table>
	<br />
{/if}

{if $reportps.bonus_noc == 1}
	<table>
	<tr><td><h4>100% Nocny bonus dla obrony jest aktywny.</h4></td></tr>
	</table>
	<br />
{/if}

<table width="100%" style="border: 1px solid #DED3B9">
<tr><th width="100">Napastnik:</th><th><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$report.from_user}">{$report.from_username}</a></th></tr>
<tr><td>Wioska:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$report.from_village}">{$report.from_villagename} ({$report.from_x}|{$report.from_y})</a></td></tr>

<tr><td colspan="2">
	<table class="vis">
	<tr class="center">
		<td></td>
		{foreach from=$cl_units->get_array("dbname") item=dbname key=name}
			<td width="35"><img src="graphic/unit/{$dbname}.png" title="{$name}" alt="" /></td>
		{/foreach}
	</tr>
	<tr class="center"><td>Jednostki:</td>{foreach from=$report_units.units_a item=num_units}{if $num_units>0}<td>{$num_units}</td>{else}<td class="hidden">0</td>{/if}{/foreach}</tr>

	<tr class="center"><td>Straty:</td>{foreach from=$report_units.units_b item=num_units}{if $num_units>0}<td>{$num_units}</td>{else}<td class="hidden">0</td>{/if}{/foreach}</tr>
	{if $report_units.units_a.$unit_paladin > 0}
		<tr class="center">
			<td>
				Rycerz:
			</td>
			<td colspan="{php} echo count($this->_tpl_vars['cl_units']->get_array("dbname"));{/php}">
			{if $report_units.units_a.$unit_paladin == $report_units.units_b.$unit_paladin}
				{if $report.from_user == $user.id}
					Tw�j rycerz zgin�.
				{else}
					Rycerz zosta� zabity.
				{/if}
			{else}
				Rycerz o imieniu {$reportps.att_pala_name} ,
				{if !empty($reportps.att_pala_item)}
					wyposa�ony w {$pala_bonuses[$reportps.att_pala_item].2}.
				{else}
					bez przedmiotu.
				{/if}
			{/if}
			</td>
		</tr>
	{/if}
	</table>

</td></tr>
</table><br />

<table width="100%" style="border: 1px solid #DED3B9">
<tr><th width="100">Obro�ca:</th><th><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$report.to_user}">{$report.to_username}</a></th></tr>
<tr><td>Wioska:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$report.to_village}">{$report.to_villagename} ({$report.to_x}|{$report.to_y})</a></td></tr>
<tr><td colspan="2">
	{if $see_def_units || $OR_SPY}
		<table class="vis">
		<tr class="center">
			<td></td>
			{foreach from=$cl_units->get_array("dbname") item=dbname key=name}
				<td width="35"><img src="graphic/unit/{$dbname}.png" title="{$name}" alt="" /></th>
			{/foreach}
		</tr>
		<tr class="center"><td>Jednostki:</td>{foreach from=$report_units.units_c item=num_units}{if $num_units>0}<td>{$num_units}</td>{else}<td class="hidden">0</td>{/if}{/foreach}</tr>
	
		<tr class="center"><td>Straty:</td>{foreach from=$report_units.units_d item=num_units}{if $num_units>0}<td>{$num_units}</td>{else}<td class="hidden">0</td>{/if}{/foreach}</tr>
		
		{if $report_units.units_c.$unit_paladin > 0}
			<tr class="center">
				<td>
					Rycerz:
				</td>
				<td colspan="{php} echo count($this->_tpl_vars['cl_units']->get_array("dbname"));{/php}">
				{if $report_units.units_c.$unit_paladin == $report_units.units_d.$unit_paladin}
					{if $report.to_user == $user.id}
						Tw�j rycerz zgin�.
					{else}
						Rycerz zosta� zabity.
					{/if}
				{else}
					Rycerz o imieniu {$reportps.att_pala_name} ,
					{if !empty($reportps.def_pala_item)}
						wyposa�ony w {$pala_bonuses[$reportps.def_pala_item].2}.
					{else}
						bez przedmiotu.
					{/if}
				{/if}
				</td>
			</tr>
		{/if}
		
		</table>
	{else}
		<p>Wszyscy twoi �o�nierze polegli, nie uzyskano �adnych informacji o wojskach przeciwnika</p>
	{/if}

</td></tr>
</table><br /><br />
{if count($report_units.units_e)>1}
	<h4>Wojska, kt�re by�y po za wiosk�</h4>
	<table>
	<tr>
		{foreach from=$cl_units->get_array("dbname") item=dbname key=name}
			<th width="35"><img src="graphic/unit/{$dbname}.png" title="{$name}" alt="" /></th>
		{/foreach}
	</tr>
	<tr>{foreach from=$report_units.units_e item=num_units}{if $num_units>0}<td>{$num_units}</td>{else}<td class="hidden">0</td>{/if}{/foreach}</tr>
	</table>
	<br>
{/if}

{if $def_out_units_see && $report.to_user != $user.id}
	<h4>Wyszpiegowane jednostki, przebywaj�ce po za wiosk�</h4>
	<table class="vis">
		<tr>
			{foreach from=$cl_units->get_array("dbname") item=dbname key=name}
				<th width="35"><img src="graphic/unit/{$dbname}.png" title="{$name}" alt="" /></th>
			{/foreach}
		</tr>
		<tr>{foreach from=$reportps.f_units item=num_units}{if $num_units>0}<td>{$num_units}</td>{else}<td class="hidden">0</td>{/if}{/foreach}</tr>
	</table>
	<br>
{/if}

{if $report.to_user != $user.id && count($reportps.budynki) > 1}
	<table class="vis"/>
		<tr>
			<th>
				Wyszpiegowane poziomy budynk�w
			</th>
		</tr>
		{php}$this->_tpl_vars['i'] = 0;{/php}
		{foreach from=$cl_builds->get_array("dbname") item=dbname key=name}
			<tr>
				{if $reportps.budynki.$i > 0}
					<td><img src="graphic/buildings/{$dbname}.png"/> {$cl_builds->get_name($dbname)} (poziom {$reportps.budynki.$i})</td>
				{/if}
				{php}$this->_tpl_vars['i']++;{/php}
			</tr>
		{/foreach}
	</table>
	<br>
{/if}

{if $def_out_res_see && $report.to_user != $user.id}
	<table class="vis"/>
		<tr>
			<th>
				Wyszpiegowane surowce
			</th>
		</tr>
		<tr>
			<td>
				{if $reportps.sorowce_poz.0 > 0}<img src="graphic/holz.png" title="Drewno" alt="" />{$reportps.sorowce_poz.0} {/if}
				{if $reportps.sorowce_poz.1 > 0}<img src="graphic/lehm.png" title="Ceg�y" alt="" />{$reportps.sorowce_poz.1} {/if}
				{if $reportps.sorowce_poz.2 > 0}<img src="graphic/eisen.png" title="�elazo" alt="" />{$reportps.sorowce_poz.2} {/if}
			</td>
		</tr>
	</table>
	<br>
{/if}

<table width="100%" style="border: 1px solid #DED3B9">
	{if $report_ress.wood>0 || $report_ress.stone>0 || $report_ress.iron>0}
		<tr><th>�upy:</th>
		<td width="220">
			{if $report_ress.wood>0}<img src="graphic/holz.png" title="Drewno" alt="" />{$report_ress.wood} {/if}
			{if $report_ress.stone>0}<img src="graphic/lehm.png" title="Kamienie" alt="" />{$report_ress.stone} {/if}
			{if $report_ress.iron>0}<img src="graphic/eisen.png" title="�elazo" alt="" />{$report_ress.iron} {/if}</td>
		<td>{$report_ress.sum}/{$report_ress.max}</td>
		</tr>
	{/if}
	{if $report.to_user == $user.id && $def_out_units_see}
		<tr>
			<th>Uwaga:</th>
			<td>
				Napastnik wyspiegowa� twoje jednostki , budynki i surowce.
			</td>
		</tr>
	{/if}
	{if !empty($reportps.pala_find_item)}
		<tr>
			<th>Ryczerz:</th>
			<td>
				Tw�j rycerz znalaz� przedmiot - {$pala_bonuses[$reportps.pala_find_item].2}.
			</td>
		</tr>
	{/if}
	{if $report_ram.from!=$report_ram.to}
		<tr><th>Uszkodzenia zadane przez tarany:</th>
		<td colspan="2">Mur zniszczono z Poziomu <b>{$report_ram.from}</b> na Poziom <b>{$report_ram.to}</b></td></tr>
	{/if}
	{if $report_agreement.from!=$report_agreement.to}
	<tr><th>Zmiana poparcia</th>
	<td colspan="2">Zmiana poparcia z <b>{$report_agreement.from}</b> na <b>{$report_agreement.to}</b></td></tr>
	{/if}
	{if $report_catapult.from!=$report_catapult.to}
		<tr><th>Uszkodzenia zadane przez katapulty:</th>
		<td colspan="2">{$cl_builds->get_name($report_catapult.building)} zniszczono z Poziomu <b>{$report_catapult.from}</b> na Poziom <b>{$report_catapult.to}</b></td></tr>
	{/if}
</table>