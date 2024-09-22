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
				{if aktu_build_prc > 0.5}
					<img src="graphic/big_buildings/{$dbname}3.png" title="{$cl_builds->get_name($dbname)}" alt="" />
				{else}
					{if $aktu_build_prc > 0.2}
						<img src="graphic/big_buildings/{$dbname}2.png" title="{$cl_builds->get_name($dbname)}" alt="" />
					{else}
						<img src="graphic/big_buildings/{$dbname}1.png" title="{$cl_builds->get_name($dbname)}" alt="" />
					{/if}
				{/if}
			{else}
				<img src="graphic/big_buildings/{$dbname}1.png" title="{$cl_builds->get_name($dbname)}" alt="" />
			{/if}
		</td>
		<td>
			<h2>{$cl_builds->get_name($dbname)} ({if $village.$dbname > 0}Poziom {$village.$dbname}{else}Nie zbudowano{/if})</h2>
			{$cl_builds->get_description_bydbname($dbname)}
		</td>
	</tr>
</table>
<br />

{if $show_build}
	{if $ag_style == 1 }
	<table class="vis">
		<tr>
			{foreach from=$links item=f_mode key=f_name}
				{if $f_mode==$mode}
					<td class="selected" width="120">
						<a href="game.php?village={$village.id}&amp;screen=snob&amp;mode={$f_mode}">{$f_name}</a>
					</td>
				{else}
					<td width="120">
						<a href="game.php?village={$village.id}&amp;screen=snob&amp;mode={$f_mode}">{$f_name}</a>
					</td>
				{/if}
			{/foreach}
		</tr>
	</table>
	<br>
	{/if}
	{if $mode == 'poj_monety'}
		{if count($recruit_units)>0}
			<table class="vis">
				<tr>
					<th width="150">Kszta³cenie</th>
					<th width="120">Trwanie</th>
					<th width="150">Gotowe</th>
					<th width="100">Zakoñcz *</th>
				</tr>

				{foreach from=$recruit_units key=key item=value}
					<tr {if $recruit_units.$key.lit}class="lit"{/if}>
						<td>{$recruit_units.$key.num_unit} {$cl_units->get_name($recruit_units.$key.unit)}</td>
						{if $recruit_units.$key.lit}
							{if $recruit_units.$key.countdown > 0}
								<td><span class="timer">{$recruit_units.$key.countdown|format_time}</span></td>
							{else}
								<td>{$recruit_units.$key.countdown|format_time}</td>
								{php}header('location: game.php?village='.$this->_tpl_vars['village']['id'].'&screen='.$_GET['screen']);{/php}
							{/if}
						{else}
							<td>{$recruit_units.$key.trwanie|format_time}</td>
						{/if}
						<td>{$pl->format_date($recruit_units.$key.time_finished)}</td>
						<td><a href="game.php?t=129107&amp;village={$village.id}&amp;screen={$dbname}&amp;action=cancel&amp;id={$key}&amp;h={$hkey}">przerwij</a></td>
					</tr>
				{/foreach}
			</table>
		
			<div style="font-size: 7pt;">* (W przypadku przerwania, zostanie zwrócone 90% surowcówn)</div>
		
			<br>
		{/if}

		{if !empty($error)}
			<font class="error">{$error}</font>
		{/if}
	
		<form action="game.php?village={$village.id}&amp;screen={$dbname}&amp;action=train&amp;h={$hkey}" method="post" onsubmit="this.submit.disabled=true;">
			<table class="vis">
				<tr>
					<th width="150">Jednostka</th>
					<th colspan="4" width="120">Koszt</th>
					<th width="130">Czas (hh:mm:ss)</th>
					<th>W wiosce/Ogólnie</th>
					<th>Rekrutuj</th>
				</tr>

				{foreach from=$units key=unit_dbname item=name}
					<tr>
						<td><a href="javascript:popup('popup_unit.php?unit={$unit_dbname}', 520, 520)"> <img src="graphic/unit/{$unit_dbname}.png" alt="" /> {$name}</a></td>
						<td><img src="graphic/holz.png" title="Holz" alt="" /> {if $village.r_wood >= $cl_units->get_woodprice($unit_dbname)}{$cl_units->get_woodprice($unit_dbname)}{else}<font color="red">{$cl_units->get_woodprice($unit_dbname)}</font>{/if}</td>
						<td><img src="graphic/lehm.png" title="Lehm" alt="" /> {if $village.r_stone >= $cl_units->get_stoneprice($unit_dbname)}{$cl_units->get_stoneprice($unit_dbname)}{else}<font color="red">{$cl_units->get_stoneprice($unit_dbname)}</font>{/if}</td>
						<td><img src="graphic/eisen.png" title="Eisen" alt="" /> {if $village.r_iron >= $cl_units->get_ironprice($unit_dbname)}{$cl_units->get_ironprice($unit_dbname)}{else}<font color="red">{$cl_units->get_ironprice($unit_dbname)}</font>{/if}</td>
						<td><img src="graphic/face.png" title="Arbeiter" alt="" /> {if $max_bh - $village.r_bh >= $cl_units->get_bhprice($unit_dbname)}{$cl_units->get_bhprice($unit_dbname)}{else}<font color="red">{$cl_units->get_bhprice($unit_dbname)}</font>{/if}</td>
						<td>{$cl_units->get_time_round($village.$dbname,$unit_dbname,$village.bonus)|format_time}</td>
						<td>{$units_in_village.$unit_dbname}/{$units_all.$unit_dbname}</td>
						{if $village.r_wood >= $cl_units->get_woodprice($unit_dbname) && $village.r_stone >= $cl_units->get_stoneprice($unit_dbname) && $village.r_iron >= $cl_units->get_ironprice($unit_dbname)}
							{if $max_bh - $village.r_bh >= $cl_units->get_bhprice($unit_dbname)}
								{if $snobs_canpr > 0}
									<td>
										<input id="{$unit_dbname}" name="atren_{$unit_dbname}" type="text" style="width:50px;"/>
										<span style="font-weight:bold; color: #804000;" onclick="insertNumId('{$unit_dbname}', '{$units_can_prod.$unit_dbname}');return false;">
											(maks. {$units_can_prod.$unit_dbname})
										</span>
									</td>
								{else}
									<td class="inactive">Za ma³y limit szlachty</td>
								{/if}
							{else}
								<td class="inactive">Za ma³o miejsca w zagrodzie</td>
							{/if}
						{else}
							<td class="inactive">Posiadasz za ma³o surowców</td>
						{/if}
					</tr>
					<tr>
						<td colspan="8" align="right">
							<input name="submit" type="submit" value="Rekrutowaæ" style="font-size: 10pt;" />
						</td>
					</tr>
				{/foreach}
			</table>
		</form>
		
		<br />
		{if $ag_style==0}
			<h4>Liczba szlachciców, których mo¿na wytrenowaæ</h4>
			<table class="vis">
				<tr><td>Poziom szlachty:</td><td>{$snobs_stage}</td></tr>
				<tr><td>- Szlachcice dostêpni:</td><td>{$snobs_dostepne}</td></tr>
				<tr><td>- Szlachcice w produkcji:</td><td>{$snobs_produkcja}</td></tr>
				<tr><td>- Szlachcice osadzenie w wioskach:</td><td>{$snobs_in_vgs}</td></tr>
				<tr><th>Mo¿na wyprodukowaæ:</th><th>{$snobs_canpr}</th></tr>
			</table>
		{elseif $ag_style==1}
			<h4>Liczba szlachciców, których mo¿na wytrenowaæ</h4>
			<table class="vis">
				<tr>
					<td>Limit szlachty:</td>
					<td>{$snobs_stage}</td>
				</tr>
				<tr>
					<td>- Szlachcice dostêpni:</td>
					<td>{$snobs_dostepne}</td>
				</tr>
				<tr>
					<td>- Szlachcice w produkcji:</td>
					<td>{$snobs_produkcja}</td>
				</tr>
				<tr>
					<td>- Przejête wioski:</td>
					<td>{$snobs_in_vgs}</td>
				</tr>
				<tr>
					<th>Mo¿na wyprodukowaæ:</th>
					<th>{$snobs_canpr}</th>
				</tr>
			</table>
			
			<br/>
    
			<table>
				<tbody>
					<tr>
						<td>
							<img alt="Moneta" src="graphic/gold_big.png" />
						</td>
						<td>
							<h4>Z³ote monety</h4>
							<p>Aby móc trenowaæ szlachciców do przejmowania wiosek, musisz wybiæ odpowiedni¹ iloœæ monet.</p>
						</td>
					</tr>
				</tbody>
			</table>
	
			<table class="vis">
				<tbody>
					<tr>
						<td>Wybite monety:</td>
						<td>{$all_coins}</td>
					</tr>
					<tr>
						<td>Monety potrzebne do nastêpnego szlachcica:</td>
						<td>{$coins_next}</td>
					</tr>
					<tr>
						<td>Monety zgromadzone do nastêpnego szlachcica:</td>
						<td>{$coins_zgr}</td>
					</tr>
					<tr>
						<td>Limit szlachty:</td>
						<td>{$snobs_stage}</td>
					</tr>
				</tbody>
			</table>

			<br>
		
			<table class="vis">
				<tbody>
					<tr>
						<th>Zapotrzebowanie</th>
						<th>Wybiæ monetê</th>
					</tr>
					<tr>
						<td>
							<img alt="" title="Drewno" src="graphic/holz.png"/>
							{if $village.r_wood > $koszt_monety.wood}
								{$koszt_monety.wood}
							{else}
								<font color="red">{$koszt_monety.wood}</font>
							{/if}
						
							<img alt="" title="Glina" src="graphic/lehm.png"/>
							{if $village.r_stone > $koszt_monety.stone}
								{$koszt_monety.stone}
							{else}
								<font color="red">{$koszt_monety.stone}</font>
							{/if}
						
							<img alt="" title="Ruda" src="graphic/eisen.png"/>
							{if $village.r_iron > $koszt_monety.iron}
								{$koszt_monety.iron}
							{else}
								<font color="red">{$koszt_monety.iron}</font>
							{/if}
						</td>
						<td class="inactive">
							{if $twoz_monete}
								<a href="game.php?village={$village.id}&screen=snob&action=wybij_monete">&raquo; Wybiæ monetê</a>
							{else}
								<span>Surowce dostêpne za <span class="timer_replace">{$czekanie|format_time}</span></span><span style="display:none">Surowce dostêpne</span>
							{/if}
						</td>
					</tr>
				</tbody>
			</table>
			<br>
		{/if}
	{elseif $mode == 'mass_monety' && $ag_style == 1}
		<table>
			<tbody>
				<tr>
					<td>
						<img alt="Moneta" src="graphic/gold_big.png" />
					</td>
					<td>
						<h4>Z³ote monety</h4>
						<p>Aby móc trenowaæ szlachciców do przejmowania wiosek, musisz wybiæ odpowiedni¹ iloœæ monet.</p>
					</td>
				</tr>
			</tbody>
		</table>
	
		<table class="vis">
			<tbody>
				<tr>
					<td>Wybite monety:</td>
					<td>{$all_coins}</td>
				</tr>
				<tr>
					<td>Monety potrzebne do nastêpnego szlachcica:</td>
					<td>{$coins_next}</td>
				</tr>
				<tr>
					<td>Monety zgromadzone do nastêpnego szlachcica:</td>
					<td>{$coins_zgr}</td>
				</tr>
				<tr>
					<td>Limit szlachty:</td>
					<td>{$snobs_stage}</td>
				</tr>
			</tbody>
		</table>

		<br>
		{if !empty($error)}
			<font class="error">{$error}</font>
		{/if}
			
		<form action="game.php?village={$village.id}&amp;screen=snob&amp;mode=mass_monety&amp;action=wybijaj_wiele_monet" method="post" name="kingsage">
			{if $sekcja}
				<table class="vis" width="810">
					<tr>
						<td>
							{$sekcja_wiosek} 
						</td>
					</tr>
				</table>
			{/if}
			<table class="vis" width="810">
				<tr>
					<th>
						Wioska
					</th>
					<th colspan="3">
						Surowce
					</th>
					<th colspan="3">
						Iloœæ monet
					</th>
				</tr>
				{foreach from=$masowe_wybijanie item=wioska}
					<tr{if $wioska.id == $village.id} class="lit"{else}{if !$wioska.parzysta_liczba} class="lp"{/if}{/if}>
						<td width="250">
							{$bonus->get_bonus_mini_image($wioska.bonus)}
							<a href="game.php?village={$wioska.id}&screen=snob">
								{$wioska.name} ({$wioska.x}|{$wioska.y}) K{$wioska.continent}
							</a>
						</td>
						<td width="120">
							<img src="graphic/wood.png" title="Drewno"/>&nbsp;
							{if $wioska.r_wood >= $wioska.max_storage}
								<span class="warn"/>{$wioska.r_wood|format_number}</span>
							{else}
								{$wioska.r_wood|format_number}
							{/if}
						</td>
						<td width="120">
							<img src="graphic/stone.png" title="Kamienie"/>&nbsp;
							{if $wioska.r_stone >= $wioska.max_storage}
								<span class="warn"/>{$wioska.r_stone|format_number}</span>
							{else}
								{$wioska.r_stone|format_number}
							{/if}
						</td>
						<td width="120">
							<img src="graphic/iron.png" title="¯elazo"/>&nbsp;
							{if $wioska.r_iron >= $wioska.max_storage}
								<span class="warn"/>{$wioska.r_iron|format_number}</span>
							{else}
								{$wioska.r_iron|format_number}
							{/if}
						</td>
						<td width="150">
						<input id="{$wioska.id}" name="m{$wioska.id}" max_value="{$wioska.max_monets_can_coin}" type="text" style="width:50px;"/>
						<span style="font-weight:bold; color: #804000; cursor: pointer;" onclick="insertNumId('{$wioska.id}', '{$wioska.max_monets_can_coin}');return false;">
							(maks. {$wioska.max_monets_can_coin})
						</span>
						</td>
					</tr>
				{/foreach}
				<td style="height:24px;" align="left">
					<span class="click" onclick="selectCoiningNoneMax('Wybierz maksymaln¹ liczbê', 'Odznacz wszystko');return false;">
						<span id="select_all_1" style="font-weight:bold; color: #804000; cursor: pointer;">
							Wybierz maksymaln¹ liczbê
						</span>
					</span>
				</td>
				<td colspan=3 style="height:24px;">
				</td>
				<td style="height:24px;" align="right">
					<input type="submit" name="wybij" value="Wybij monety" style="font-size: 10pt;"/>
				</td>
			</table>
		</form>
	{/if}
{/if}
