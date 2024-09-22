{php}
$report_info = sql("SELECT bonus_noc,f_units,sorowce_poz,budynki,att_pala_item,def_pala_item,att_pala_name,def_pala_name,pala_find_item,allyname FROM `reports` WHERE `id` = '".$this->_tpl_vars['report']['id']."'",'assoc');

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
$report_info['att_pala_name'] = entparse($report_info['att_pala_name']);
$report_info['def_pala_name'] = entparse($report_info['def_pala_name']);

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
$this->_tpl_vars['bb_report'] = base64_encode($this->_tpl_vars['report']['id']);
{/php}

{if $report.wins=='att'}
	<h3>Agresor zwyciê¿y³</h3>
{else}
    <h3>Obroñca zwyciê¿y³</h3>
{/if}

{if !$user.classic_graphics && !empty($reportps.allyname)}
	<div class="report_image {$reportps.allyname}"><div class="report_transparent_overlay">
{/if}

<h4>Szczêœcie (z punktu widzenia agresora)</h4>
<table id="attack_luck">
	{if $report.luck<0}
		<tr>
			<td class="nobg" style="padding: 0pt;"><b>{$report.luck}%</b></td>
			<td class="nobg"><img src="/ds_graphic/rabe.png?1" alt="Pech"></td>

			<td class="nobg">

				<table class="luck" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td class="luck-item nobg" height="12" width="{math equation="a-(b*(x * y))" b=-1 a=50 x=$report.luck y=2}"></td>
							<td class="luck-item nobg" style="border-right: 1px solid rgb(0, 0, 0); background-image: url(/ds_graphic/balken_pech.png?1);" width="{math equation="b*(x * y)" b=-1 x=$report.luck y=2}"></td>
							<td class="luck-item nobg" width="50"></td>
						</tr>
					</tbody>
				</table>
			</td>

			<td class="nobg"><img src="/ds_graphic/klee_grau.png?1" alt="Szczêœcie"></td>
		</tr>
	{else}
		<tr>
			<td class="nobg" style="padding: 0pt;"></td>
			<td class="nobg"><img src="/ds_graphic/rabe_grau.png?1" alt="Pech"></td>

			<td class="nobg">

				<table class="luck" cellpadding="0" cellspacing="0">
					<tbody>
						<tr>
							<td class="luck-item nobg" height="12" width="50"></td>
							<td class="luck-item nobg" style="border-left: 1px solid rgb(0, 0, 0); background-image: url(/ds_graphic/balken_glueck.png?1);" width="{math equation="x * y" x=$report.luck y=2}"></td>
							<td class="luck-item nobg" width="{math equation="a-(x * y)" a=50 x=$report.luck y=2}"></td>
						</tr>
					</tbody>
				</table>
			</td>

			<td class="nobg"><img src="/ds_graphic/klee.png?1" alt="Szczêœcie"></td>
			<td class="nobg"><b>{$report.luck}%</b></td>
		</tr>
	{/if}
</table>

{if $moral_activ=='true'}
	{if $user.classic_graphics && empty($reportps.allyname)}
		<table>
			<tr><td><h4>Morale: {$report.moral}%</h4></td></tr>
		</table>
		<br />
	{else}
		<h4>Morale: {$report.moral}%</h4>
	{/if}
{/if}

{if $reportps.bonus_noc == 1}
	{if $user.classic_graphics && empty($reportps.allyname)}
		<table>
			<tr><td><h4>100% Nocny bonus dla obrony jest aktywny.</h4></td></tr>
		</table>
		<br />
	{else}
		<h4>100% Nocny bonus dla obrony jest aktywny.</h4>
	{/if}
{/if}

{if !$user.classic_graphics && !empty($reportps.allyname)}
	</div></div>
{/if}

<table width="100%" style="border: 1px solid #DED3B9">
<tr><th width="100">Agresor:</th><th><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$report.from_user}">{$report.from_username}</a></th></tr>
<tr><td>Pochodzenie:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$report.from_village}">{$report.from_villagename} ({$report.from_x}|{$report.from_y})</a></td></tr>

<tr><td colspan="2">
	<table class="vis">
	<tr class="center">
		<td></td>
		{foreach from=$cl_units->get_array("dbname") item=dbname key=name}
			<td width="35"><img src="/ds_graphic/unit/{$dbname}.png" title="{$name}" alt="" /></td>
		{/foreach}
	</tr>
	<tr class="center"><td>Iloœæ:</td>{foreach from=$report_units.units_a item=num_units}{if $num_units>0}<td>{$num_units|format_number}</td>{else}<td class="hidden">0</td>{/if}{/foreach}</tr>

	<tr class="center"><td>Straty:</td>{foreach from=$report_units.units_b item=num_units}{if $num_units>0}<td>{$num_units|format_number}</td>{else}<td class="hidden">0</td>{/if}{/foreach}</tr>
	{if $report_units.units_a.$unit_paladin > 0}
		<tr class="center">
			<td>
				Rycerz:
			</td>
			<td colspan="{php} echo count($this->_tpl_vars['cl_units']->get_array("dbname"));{/php}">
			{if $report_units.units_a.$unit_paladin == $report_units.units_b.$unit_paladin}
				{if $report.from_user == $user.id}
					Twój rycerz zgin¹.
				{else}
					Rycerz zosta³ zabity.
				{/if}
			{else}
				Rycerz o imieniu {$reportps.att_pala_name} ,
				{if !empty($reportps.att_pala_item)}
					wyposa¿ony w {$pala_bonuses[$reportps.att_pala_item].2}.
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
<tr><th width="100">Obroñca:</th><th><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$report.to_user}">{$report.to_username}</a></th></tr>
<tr><td>cel:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$report.to_village}">{$report.to_villagename} ({$report.to_x}|{$report.to_y})</a></td></tr>
<tr><td colspan="2">
	{if $see_def_units || $OR_SPY}
		<table class="vis">
		<tr class="center">
			<td></td>
			{foreach from=$cl_units->get_array("dbname") item=dbname key=name}
				<td width="35"><img src="/ds_graphic/unit/{$dbname}.png" title="{$name}" alt="" /></th>
			{/foreach}
		</tr>
		<tr class="center"><td>Iloœæ:</td>{foreach from=$report_units.units_c item=num_units}{if $num_units>0}<td>{$num_units|format_number}</td>{else}<td class="hidden">0</td>{/if}{/foreach}</tr>
	
		<tr class="center"><td>Straty:</td>{foreach from=$report_units.units_d item=num_units}{if $num_units>0}<td>{$num_units|format_number}</td>{else}<td class="hidden">0</td>{/if}{/foreach}</tr>
		
		{if $report_units.units_c.$unit_paladin > 0}
			<tr class="center">
				<td>
					Rycerz:
				</td>
				<td colspan="{php} echo count($this->_tpl_vars['cl_units']->get_array("dbname"));{/php}">
				{if $report_units.units_c.$unit_paladin == $report_units.units_d.$unit_paladin}
					{if $report.to_user == $user.id}
						Twój rycerz zgin¹.
					{else}
						Rycerz zosta³ zabity.
					{/if}
				{else}
					Rycerz o imieniu {$reportps.def_pala_name} ,
					{if !empty($reportps.def_pala_item)}
						wyposa¿ony w {$pala_bonuses[$reportps.def_pala_item].2}.
					{else}
						bez przedmiotu.
					{/if}
				{/if}
				</td>
			</tr>
		{/if}
		
		</table>
	{else}
		<p>Wszyscy twoi ¿o³nierze polegli, nie uzyskano ¿adnych informacji o wojskach przeciwnika</p>
	{/if}

</td></tr>
</table><br />

{if $def_out_units_see || count($reportps.budynki) > 1 || $def_out_res_see}
	<h4>Szpiegostwo</h4>
	
	<table id="attack_spy" style="border: 1px solid rgb(222, 211, 185); padding: 0px 0px 0px 0px;">
		{if $def_out_res_see}
			<tr>
				<th>
					Wyszpiegowane surowce:
				</th>
				<td>
					{if $reportps.sorowce_poz.0 > 0}<img src="/ds_graphic/holz.png" title="Drewno" alt="" />{$reportps.sorowce_poz.0|format_number} {/if}
					{if $reportps.sorowce_poz.1 > 0}<img src="/ds_graphic/lehm.png" title="Ceg³y" alt="" />{$reportps.sorowce_poz.1|format_number} {/if}
					{if $reportps.sorowce_poz.2 > 0}<img src="/ds_graphic/eisen.png" title="¯elazo" alt="" />{$reportps.sorowce_poz.2|format_number} {/if}
				</td>
			</tr>
		{/if}
		{if count($reportps.budynki) > 1}
			<tr>
				<th>Budynki:</th>
				<td>
					{php}$this->_tpl_vars['i'] = 0;{/php}
					{foreach from=$cl_builds->get_array("dbname") item=dbname key=name}
						{if $reportps.budynki.$i > 0}
							{$cl_builds->get_name($dbname)} <b>(Stopieñ {$reportps.budynki.$i})</b><br>
						{/if}
						{php}$this->_tpl_vars['i']++;{/php}
					{/foreach}
					{php}$this->_tpl_vars['i'] = 0;{/php}
				</td>
			</tr>
		{/if}
		{if $def_out_units_see}
			<tr>
				<th colspan="2">Jednostki poza wiosk¹:</th>
			</tr>
			<tr>
				<td colspan="2"/>
					<table class="vis">
						<tr>
							{foreach from=$cl_units->get_array("dbname") item=dbname key=name}
								<th width="35">
									<img src="/ds_graphic/unit/{$dbname}.png" title="{$name}" alt="" />
								</th>
							{/foreach}
						</tr>
						<tr>
							{foreach from=$reportps.f_units item=num_units}
								{if $num_units>0}
									<td>{$num_units|format_number}</td>
								{else}
									<td class="hidden">0</td>
								{/if}
							{/foreach}
						</tr>
					</table>
				</td>
			</tr>
		{/if}
	</table>
	<br>
{/if}

	
<table width="100%" style="border: 1px solid #DED3B9">
	{if count($report_units.units_e)>1}
		<h4>Wojska, które by³y po za wiosk¹</h4>
		<table>
			<tr>
				{foreach from=$cl_units->get_array("dbname") item=dbname key=name}
					<th width="35">
						<img src="/ds_graphic/unit/{$dbname}.png" title="{$name}" alt="" />
					</th>
				{/foreach}
			</tr>
			<tr>
				{foreach from=$report_units.units_e item=num_units}
					{if $num_units>0}
						<td>{$num_units}</td>
					{else}
						<td class="hidden">0</td>
					{/if}
				{/foreach}
			</tr>
	</table>
	<br>
{/if}

<table width="100%" style="border: 1px solid #DED3B9">
	{if $report_ress.wood>0 || $report_ress.stone>0 || $report_ress.iron>0}
		<tr><th>£upy:</th>
		<td width="220">
			{if $report_ress.wood>0}<img src="/ds_graphic/holz.png" title="Drewno" alt="" />{$report_ress.wood|format_number} {/if}
			{if $report_ress.stone>0}<img src="/ds_graphic/lehm.png" title="Kamienie" alt="" />{$report_ress.stone|format_number} {/if}
			{if $report_ress.iron>0}<img src="/ds_graphic/eisen.png" title="¯elazo" alt="" />{$report_ress.iron|format_number} {/if}</td>
		<td>{$report_ress.sum}/{$report_ress.max}</td>
		</tr>
	{/if}
	{if $report.to_user == $user.id && $def_out_units_see}
		<tr>
			<th>Uwaga:</th>
			<td>
				Twoje wojska zosta³y wykryte przez wroga.
			</td>
		</tr>
	{/if}
	{if !empty($reportps.pala_find_item)}
		<tr>
			<th>Ryczerz:</th>
			<td>
				Twój rycerz znalaz³ przedmiot - {$pala_bonuses[$reportps.pala_find_item].2}.
			</td>
		</tr>
	{/if}
	{if $report_ram.from!=$report_ram.to}
		<tr><th>Uszkodzenia zadane przez tarany:</th>
		<td colspan="2">Mur zniszczono z Poziomu <b>{$report_ram.from}</b> na Poziom <b>{$report_ram.to}</b></td></tr>
	{/if}
	{if $report_agreement.from!=$report_agreement.to}
	<tr><th>Poparcie:</th>
	<td colspan="2">Spad³o z <b>{$report_agreement.from|format_number}</b> na <b>{$report_agreement.to|format_number}</b></td></tr>
	{/if}
	{if $report_catapult.from!=$report_catapult.to}
		<tr><th>Uszkodzenia zadane przez katapulty:</th>
		<td colspan="2">{$cl_builds->get_name($report_catapult.building)} zniszczono z Poziomu <b>{$report_catapult.from}</b> na Poziom <b>{$report_catapult.to}</b></td></tr>
	{/if}
</table>

<br>
<table class="vis" width="100%"/>
	<tr>
		<th><span class="link" onclick="switchDisplay('bb_report_send')"/>Poka¿ ten raport w bb-code</span></th>
	</tr>
	<tr>
		<td>
		<div id="bb_report_send" style="display:none;">
			<p>[report_display]{$bb_report}[/report_display]</p>
		</div>
		</td>
	</tr>
</table>