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

{if $village.$dbname > 0}
	<table class="vis modemenu">
		<tbody>
			<tr>
				{foreach from=$modes item=amode key=mname}
					{if $mname == $mode}
					<td class="selected" width="100">
						<a href="game.php?village={$village.id}&amp;screen=statue&amp;mode={$mname}">{$amode} </a>
					</td>
					{else}
					<td width="100">
						<a href="game.php?village={$village.id}&amp;screen=statue&amp;mode={$mname}">{$amode} </a>
					</td>
					{/if}
				{/foreach}
			</tr>
		</tbody>
	</table>

	{if !empty($error)}
		<span class="error"/>{$error}</span>
	{/if}

	{if $mode == 'inventory'}
	<div style="width: 840px; float: left;">
		<div style="float: right; width: 210px; padding-right: 5px;">
			<p>Przedmioty dzia³aj¹, gdy rycerz zostanie w nie wyposa¿ony i gdy znajduje siê on w danej armii.</p>
			{if !$pala_all_items}
				{if $pala_none_items}
					<p>Dotychczas nie znaleziono ¿adnych przedmiotów.</p>
				{else}
					<p>Odnalezione przedmioty:</p>
					<p>
					{foreach from=$user_pala_arr item=pala_item}
						{$pala_bonuses.$pala_item.2}<br>
					{/foreach}
					</p>
				{/if}
			{else}
				<p>Odnaleziono ju¿ wszystkie przedmioty.</p>
			{/if}
			{if !empty($user.pala_aktu_item)}
				<b>Twój&nbsp;rycerz&nbsp;wyposa¿ony&nbsp;jest&nbsp;w:</b></br>
				{$pala_bonuses[$user.pala_aktu_item].2}
			{/if}
		</div>
	
		<div style="float: left; position: relative; z-index: 9996; width: 605px; padding-left: 2px;">

		<div style="padding: 0pt; width: 600px; height: 430px; margin-right: 10px; z-index: 9997;">
			
		<img src="/ds_graphic/map/empty.png?1" alt="" title="" class="inv_empty" usemap="#inv">
		<map id="inv" name="inv">
			{foreach from=$user_pala_arr item=pala_item}
				<img style="position: absolute;" class="inv_{$pala_item}" src="/ds_graphic/inventory/{$pala_item}.png" title="{$pala_bonuses.$pala_item.2}"/>
				<area shape="poly" coords="{$pala_coords.$pala_item}" href="game.php?village={$village.id}&screen=statue&mode=inventory&action=change_pala_item&item_name={$pala_item}" alt="" title="{$pala_bonuses.$pala_item.2}"/>
			{/foreach}
		</map>
		<img src="/ds_graphic/inventory/inventory.jpg?1" alt="" title="">
	</div>

	<br style="clear: both;">

	{if !$pala_all_items}
		<table style="margin: 0pt; padding: 0pt;">
			<tbody>
				<tr>
					<th colspan="3">Postêp do znalezienia nastêpnego przedmiotu:</th>
				</tr>
				<tr>
					<td>0%</td>
					<td style="border: 1px solid rgb(128, 64, 0); margin: 0pt; padding: 0pt; width: 390px;">
						<div style="width: {$img_width}px; background-color: rgb(128, 64, 0);">&nbsp;</div></td>
					<td>100%</td>
				</tr>
				<tr>
					<td colspan="3" style="text-align: center;">{$proc_to_next_item}%</td>
				</tr>
			</tbody>
		</table>
	{/if}

	{else}
	<br>
	{if count($jed_produkcja) > 0}
		<table class="vis">
			<tr>
				<th width="150">Kszta³cenie</th>
				<th width="120">Trwanie</th>
				<th width="150">Gotowe</th>
				<th width="100">Zakoñcz *</th>
			</tr>

			{foreach from=$jed_produkcja key=key item=value}
				<tr {if $jed_produkcja.$key.lit}class="lit"{/if}>
					<td>{$jed_produkcja.$key.num_unit} {$cl_units->get_name($jed_produkcja.$key.unit)}</td>
						{if $jed_produkcja.$key.lit}
							{if $jed_produkcja.$key.countdown > 0}
								<td><span class="timer">{$jed_produkcja.$key.countdown|format_time}</span></td>
							{else}
								<td>{$jed_produkcja.$key.countdown|format_time}</td>
							{/if}
						{else}
							<td>{$jed_produkcja.$key.trwanie|format_time}</td>
						{/if}
					<td>{$pl->format_date($jed_produkcja.$key.time_finished)}</td>
					<td><a href="game.php?t=129107&amp;village={$village.id}&amp;screen={$dbname}&amp;action=anuluj&amp;id={$key}&amp;h={$hkey}">przerwij</a></td>
				</tr>
			{/foreach}
		</table>
		
		<div style="font-size: 7pt;">* (W przypadku przerwania, zostanie zwrócone 90% surowców)</div>
		
		<br>
	{/if}

	<table class="vis">
		<tbody>
			<tr>
				<th>Jednostka</th>
				<th colspan="4">Koszt</th>
				<th>Czas<br>(gg:mm:ss)</th>
				<th>Wybierz rycerza</th>

			</tr>
			{foreach from=$units item=unit key=name}
				<tr>
					<td>
						<a href="javascript:popup('popup_unit.php?unit={$unit}', 520, 520)"> <img src="/ds_graphic/unit/{$unit}.png" alt="" /> {$name}</a>
					</td>
					<td>
						<img src="/ds_graphic/wood.png" title="Drewno" alt=""/> 
						{$cl_units->get_woodprice($unit)}
					</td>
					<td>
						<img src="/ds_graphic/stone.png" title="Ceg³y" alt=""/> 
						{$cl_units->get_stoneprice($unit)}
					</td>
					<td>
						<img src="/ds_graphic/iron.png" title="¯elazo" alt=""/> 
						{$cl_units->get_ironprice($unit)}
					</td>
					<td>
						<img src="/ds_graphic/face.png" title="Wieœniak" alt=""/> 
						{$cl_units->get_bhprice($unit)}
					</td>
	
					<td>
						{$cl_units->get_time_round($village.$screen,$unit,$village.bonus)|format_time}
					</td>

					<td>
						{if $village.r_wood >= $cl_units->get_woodprice($unit) && $village.r_stone >= $cl_units->get_stoneprice($unit) && $village.r_iron >= $cl_units->get_ironprice($unit)}
							{if $wolni_osadnicy >= $cl_units->get_bhprice($unit)}
								{if $user.paladins > 0}
									<span class="inactive">Ka¿dy gracz mo¿e posiadaæ tylko jednego rycerza!</span>	
								{else}
									{if $user.pala_train > 0}
										<span class="inactive">Rycerz w trakcie trenowania.</span>
									{else}
										<a href="game.php?village={$village.id}&amp;screen=statue&amp;action=train&unit={$unit}&amp;h={$hkey}">Wybierz rycerza</a>
									{/if}
								{/if}
							{else}
								<span class="inactive">Za ma³o miejsc w zagrodzie, by móc wy¿ywiæ rycerza.</span>	
							{/if}
						{else}
							<span class="inactive">Posiadasz za ma³o surowców.</span>
						{/if}
					</td>
				</tr>
			{/foreach}
		</tbody>
	</table>
	<br>
	{if $user.paladins == 1}
		<form action="game.php?village={$village.id}&screen=statue&mode=main&action=change_pala_name&h={$hkey}" method="post"/>
			<table class="vis"/>
				<tr>
					<th colspan="2">Zmieñ nazwê swojego rycerza</th>
				</tr>
				<tr>
					<td>
						Nazwa: <input type="text" value="{$pala_name}" name="nazwa"/>
					</td>
					<td>
						<input type="submit" value="Zmieñ nazwê" name="tbutton"/>
					</td>
				</tr>
			</table>
		</form>
	{/if}
{/if}
{/if}