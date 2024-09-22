{php}
if (!isset($this->_tpl_vars['cl_builds'])) {
	global $cl_builds;
	$this->assign('cl_builds',$cl_builds);
	}
$this->_tpl_vars['dbname'] = $this->_tpl_vars['screen'];
$this->_tpl_vars['aktu_build_prc'] = $this->_tpl_vars['village'][$this->_tpl_vars['dbname']] / $this->_tpl_vars['cl_builds']->get_maxstage($this->_tpl_vars['dbname']);
{/php}
<table>
	<tr>
		<td>
			{if $cl_builds->get_maxstage($dbname) > 3}
				{if $aktu_build_prc > 0.5}
					<img src="/ds_graphic/big_buildings/{$dbname}3.png" title="{$cl_builds->get_name($dbname)}" alt="" />
				{else}
					{if $aktu_build_prc > 0.2}
						<img src="/ds_graphic/big_buildings/{$dbname}2.png" title="{$cl_builds->get_name($dbname)}" alt="" />
					{else}
						<img src="/ds_graphic/big_buildings/{$dbname}1.png" title="{$cl_builds->get_name($dbname)}" alt="" />
					{/if}
				{/if}
			{else}
				<img src="/ds_graphic/big_buildings/{$dbname}1.png" title="{$cl_builds->get_name($dbname)}" alt="" />
			{/if}
		</td>
		<td>
			<h2>{$cl_builds->get_name($dbname)} ({if $village.$dbname > 0}Poziom {$village.$dbname}{else}Nie zbudowano{/if})</h2>
			{$cl_builds->get_description_bydbname($dbname)}
		</td>
	</tr>
</table>
<br />

<script src="/js/recruit.js" type="text/javascript"></script>

{if $show_build}
	{if count($recruit_units)>0}
		<div class="current_prod_wrapper">
			<div id="replace_barracks">
				{if $first_unit.is}
					<table class="vis">
						<tbody>
							<tr>
								<th width="250">Zakoñczenie szkolenia nastêpnej jednostki ({$first_unit.unitname}):</th>
								<th><span class="timer">{$first_unit.time_to_train|format_time}</span></th>
							</tr>
						</tbody>
					</table>
				{/if}
		
				<div class="trainqueue_wrap" id="trainqueue_wrap_barracks">
					<table class="vis">
						<tr>
							<th width="190">Kszta³cenie</th>
							<th width="120">Trwanie</th>
							<th width="150">Gotowe</th>
							<th width="100">Zakoñcz *</th>
						</tr>

						{foreach from=$recruit_units key=key item=value}
							<tr {if $recruit_units.$key.lit}class="lit"{/if}>
								<td>{$recruit_units.$key.num_unit} {$cl_units->get_name($recruit_units.$key.unit)}</td>
								{if $recruit_units.$key.lit && $recruit_units.$key.countdown>-1}
									<td><span class="timer">{$recruit_units.$key.countdown|format_time}</span></td>
									{else}
									<td>{$recruit_units.$key.countdown|format_time}</td>
								{/if}
								<td>{$pl->format_date($recruit_units.$key.time_finished)}</td>
								<td><a href="game.php?village={$village.id}&amp;screen={$dbname}&amp;action=cancel&amp;id={$key}&amp;h={$hkey}">przerwij</a></td>
							</tr>
						{/foreach}
					</table>
				</div>
				<div style="font-size: 7pt;">* (zostanie zwrócone 90% surowców)</div>
				<br>
			</div>
		</div>
	{/if}

	{if !empty($error)}
		<font class="error">{$error}</font>
	{/if}
	<form action="game.php?village={$village.id}&amp;screen={$dbname}&amp;action=train&amp;h={$hkey}" method="post" onsubmit="this.submit.disabled=true;">
		<table class="vis">
			<tr>
				<th width="180">Jednostka</th>
				<th colspan="4" width="120">Zapotrzebowanie</th>
				<th width="130">Czas  (gg:mm:ss)</th>
				<th>W wiosce/Ogólnie</th>
				<th>Rekrutacja</th>
			</tr>

			{foreach from=$units key=unit_dbname item=name}
				<tr>
					<td><a href="javascript:popup_scroll('popup_unit.php?unit={$unit_dbname}', 520, 520)"> <img src="/ds_graphic/unit/{$unit_dbname}.png" alt="" /> {$name}</a></td>
					<td><img src="/ds_graphic/holz.png" title="Drewno" alt="" /> {$cl_units->get_woodprice($unit_dbname)}</td>
					<td><img src="/ds_graphic/lehm.png" title="Glina" alt="" /> {$cl_units->get_stoneprice($unit_dbname)}</td>
					<td><img src="/ds_graphic/eisen.png" title="Ruda" alt="" /> {$cl_units->get_ironprice($unit_dbname)}</td>
					<td><img src="/ds_graphic/face.png" title="Wieœniak" alt="" /> {$cl_units->get_bhprice($unit_dbname)}</td>
					<td>{$cl_units->get_time_round($village.$dbname,$unit_dbname,$village.bonus)|format_time}</td>
					<td>{$units_in_village.$unit_dbname|format_number}/{$units_all.$unit_dbname|format_number}</td>

					{$cl_units->check_needed($unit_dbname,$village)}
					{if $cl_units->last_error==not_tec}
					    <td class="inactive">Jednostka nie zosta³a jeszcze zbadana</td>
					{elseif $cl_units->last_error==not_needed}
					    <td class="inactive">Wymagania budynkowe nie zosta³y spe³nione</td>
					{elseif $cl_units->last_error==not_enough_ress}
					    <td class="inactive">Posiadasz za ma³o surowców</td>
					{elseif $cl_units->last_error==not_enough_bh}
					    <td class="inactive">Za ma³o miejsc w zagrodzie, by móc wy¿ywiæ dodatkowe jednostki.</td>
					{else}
						<td class="nowrap">
							<input style="color: black;" name="{$unit_dbname}" class="recruit_unit" id="{$unit_dbname}_0" size="5" maxlength="5" tabindex="1" type="text">
							<a id="{$unit_dbname}_0_a" href="javascript:unit_build_block.set_max('{$unit_dbname}')">({$cl_units->last_error})</a>
						</td>
					{/if}
				</tr>
			{/foreach}

		    <tr><td colspan="8" align="right"><input name="submit" type="submit" value="Rekrutowaæ" style="font-size: 10pt;" /></td></tr>
		</table>
	</form>
	
	<script type="text/javascript">
		$(document).ready(function(){ldelim}
			TrainOverview.init();
			TrainOverview.train_link = "";
			TrainOverview.cancel_link = "";
			TrainOverview.pop_max = {$village.r_bh};
		{rdelim});

		unit_managers = {ldelim}{rdelim};
		unit_managers.units = {ldelim}
		{php}
			$this->_tpl_vars['i'] = 0;
		{/php}
		{foreach from=$units key=unit_dbname item=name}
			{php}
				$this->_tpl_vars['i']++;
			{/php}
			{$unit_dbname}: {ldelim}wood: {$cl_units->get_woodprice($unit_dbname)}, stone: {$cl_units->get_stoneprice($unit_dbname)}, iron: {$cl_units->get_ironprice($unit_dbname)}, pop: {$cl_units->get_bhprice($unit_dbname)}{rdelim}{if $i != count($units)},{/if}
		{/foreach}
		{rdelim};

		var unit_build_block = new UnitBuildManager(0, {ldelim}
			res: {ldelim}wood: {$village.r_wood},stone: {$village.r_stone},iron: {$village.r_iron},pop: {$max_bh-$village.r_bh}{rdelim}
			{rdelim});
		unit_build_block._onchange();
	</script>
{/if}