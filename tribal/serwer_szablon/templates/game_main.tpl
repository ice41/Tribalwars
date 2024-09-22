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
{if $display_modes}
	<table class="vis modemenu">
		<tbody>
			<tr>
				{foreach from=$modes key=modename item=modephp}
					{if $modephp == $mode}
						<td class="selected" width="100"><a href="game.php?village={$village.id}&amp;screen=main&amp;mode={$modephp}">{$modename} </a></td>
					{else}
						<td width="100"><a href="game.php?village={$village.id}&amp;screen=main&amp;mode={$modephp}">{$modename} </a></td>
					{/if}
				{/foreach}
			</tr>
		</tbody>
	</table>
{/if}

{if $mode == 'build'}

	{* ALLE GEB�UDE IN DER BAUSCHLEIFE AUSLESEN *}
	{if $num_do_build>0}
		<table class="vis">
			<tr>
				<th width="250">Polecenie budowy</th>
				<th width="100">Trwanie</th>
				<th width="150">Gotowe</th>
				<th>Przerwij</th>
			</tr>
			{foreach from=$do_build item=item key=id}
				{assign var="buildname" value=$do_build.$id.build}
				{if $id==0}
					<tr class="lit">
				{else}
					<tr>
				{/if}
					<td>{$cl_builds->get_name($buildname)} (poziom {$do_build.$id.stage})</td>
					{if $id==0}
						{if $do_build.$id.finished<$time}
							<td>{$do_build.$id.dauer|format_time}</td>
						{else}
							<td><span class="timer">{$do_build.$id.dauer|format_time}</span></td>
						{/if}
					{else}
						<td>{$do_build.$id.dauer|format_time}</td>
					{/if}
					<td>
						{$pl->format_date($do_build.$id.finished)}
					</td>
					<td>
						<a href="javascript:ask('Czy na pewno chcesz przerwa� budowanie?', 'game.php?village={$village.id}&amp;screen=main&amp;action=cancel&amp;id={$do_build.$id.r_id}&amp;mode=build&amp;h={$hkey}')">Przerwij</a>
					</td>
				</tr>
			{/foreach}
			{* ZUSATZKOSTEN F�R DEN N�CHSTEN AUFTRAG*}
			{if $num_do_build>2}
				<tr>
					<td colspan="4">
						Dodatkowe koszty budowy, spowodowane d�ug� list� budowy: <b>{$cl_builds->get_buildsharpens_costs($num_do_build)}%</b><br />
						<small>Dodatkowe koszty budowy nie b�d� zwracane w przypadku przerwania</small>
					</td>
				</tr>
			{/if}
		</table>
		<br />
	{/if}
	
	{if $num_do_destory > 0}
		<table class="vis">
			<tr>
				<th width="250">Polecenie Wyburzania</th>
				<th width="100">Trwanie</th>
				<th width="150">Gotowe</th>
				<th>Przerwij</th>
			</tr>
			{foreach from=$do_destory item=item key=id}
				{assign var="buildname" value=$do_destory.$id.build}
				{if $id==0}
					<tr class="lit">
				{else}
					<tr>
				{/if}
					<td>{$cl_builds->get_name($buildname)} (zburz poziom)</td>
					{if $id==0}
						{if $do_destory.$id.finished<$time}
							<td>{$do_destory.$id.dauer|format_time}</td>
						{else}
							<td><span class="timer">{$do_destory.$id.dauer|format_time}</span></td>
						{/if}
					{else}
						<td>{$do_destory.$id.dauer|format_time}</td>
					{/if}
					<td>
						{$pl->format_date($do_destory.$id.finished)}
					</td>
					<td>
						<a href="javascript:ask('Czy na pewno chcesz przerwa� wyburzanie?', 'game.php?village={$village.id}&amp;screen=main&mode=build&amp;action=cancel_dest&amp;id={$do_destory.$id.r_id}&amp;h={$hkey}')">Przerwij</a>
					</td>
				</tr>
			{/foreach}
		</table>
		<br />
	{/if}

	{if !empty($error)}
		<font class="error">{$error}</font>
	{/if}

	<form name="budowanie" action="game.php?village={$village.id}&screen=main&action=build&h={$hkey}" method="POST">
		<input name="id" value="-1" type="hidden"/>

		<table class="vis">
			<tr>
				<th width="200">Budynki</th>
				<th colspan="4">Zapotrzebowanie</th>
				<th width="60">Czas<br /> (hh:mm:ss)</th>
				<th width="330">Wybuduj</th>
				<th>Punkty</th>
			</tr>

			{foreach from=$fulfilled_builds item=dbname key=id}
				<tr>
					<td>
						<a href="game.php?village={$village.id}&screen={$dbname}">
							<img src="/ds_graphic/buildings/{$dbname}.png"> 
							{$cl_builds->get_name($dbname)}
						</a> 
						({if $village.$dbname > 0}Poziom {$village.$dbname}{else}Nie zbudowane{/if})
					</td>
					{if $cl_builds->get_maxstage($dbname)<=$build_village.$dbname}
						<td colspan="7" align="center" class="inactive">
							Maksymalny poziom rozbudowy
						</td>
					{else}
						<td><img src="/ds_graphic/holz.png" title="drewno" alt="" />{if $cl_builds->get_wood($dbname,$build_village.$dbname+1) > $village.r_wood}<font color="red">{$cl_builds->get_wood($dbname,$build_village.$dbname+1)|format_number}</font>{else}{$cl_builds->get_wood($dbname,$build_village.$dbname+1)|format_number}{/if}</td>
						<td><img src="/ds_graphic/lehm.png" title="glina" alt="" />{if $cl_builds->get_stone($dbname,$build_village.$dbname+1) > $village.r_stone}<font color="red">{$cl_builds->get_stone($dbname,$build_village.$dbname+1)|format_number}</font>{else}{$cl_builds->get_stone($dbname,$build_village.$dbname+1)|format_number}{/if}</td>
						<td><img src="/ds_graphic/eisen.png" title="ruda" alt="" />{if $cl_builds->get_iron($dbname,$build_village.$dbname+1) > $village.r_iron}<font color="red">{$cl_builds->get_iron($dbname,$build_village.$dbname+1)|format_number}</font>{else}{$cl_builds->get_iron($dbname,$build_village.$dbname+1)|format_number}{/if}</td>
						<td>{if $cl_builds->get_bh($dbname,$build_village.$dbname+1)>0}<img src="/ds_graphic/face.png" title="Wie�niak" alt="" />{if $cl_builds->get_bh($dbname,$build_village.$dbname+1) > ($max_bh - $village.r_bh)}<font color="red">{$cl_builds->get_bh($dbname,$build_village.$dbname+1)}</font>{else}{$cl_builds->get_bh($dbname,$build_village.$dbname+1)}{/if}{/if}</td>
						<td>{$cl_builds->get_time($village.main,$dbname,$build_village.$dbname+1)|format_time}</td>
					
						{if $can_build.$dbname == 'not_enough_ress'}
							<td class="inactive"><span>Surowce dost�pne za <span class="timer_replace">{$res_timer.$dbname}</span></span><span style="display:none">Wystarczaj�co surowc�w.</span></td>
						{elseif $can_build.$dbname == 'not_enough_ress_plus'}
							<td class="inactive">Za ma�o surowc�w, aby doda� do kolejki budowy.</td>
						{elseif $can_build.$dbname == 'not_fulfilled'}
							<td class="inactive">Nie spe�niono wymaga� do tego budynku.</td>
						{elseif $can_build.$dbname == 'not_enough_bh'}
							<td class="inactive">Zagroda za ma�a</td>
						{elseif $can_build.$dbname == 'not_enough_storage'}
							<td class="inactive">Za ma�a pojemno�� spichlerza.</td>
						{else}
							{if $build_village.$dbname < 1}
								<td><span class="link" onclick="insertUnit(document.forms['budowanie'].id,'{$dbname}');document.forms['budowanie'].submit();">Wybuduj</span></td>
							{else}
								<td><span class="link" onclick="insertUnit(document.forms['budowanie'].id,'{$dbname}');document.forms['budowanie'].submit();">Rozbuduj na poziom {$build_village.$dbname+1}</span></td>
							{/if}
						{/if}
						<td>
							+{$plus_points.$dbname}
						</td>
					{/if}
					
				</tr>
			{/foreach}
		</table>
	</form>

	<br>
	
	<table style="margin: 0pt; padding: 0pt;" width="100%" class="vis">
		<tbody>
			<tr>
				<th colspan="2">Proces budowy wioski:</th>
			</tr>
			<tr>
				<td style="border: 1px solid rgb(128, 64, 0); margin: 0pt; padding: 0pt; width: 90%;">
					<div style="width: {$village_build_process}%; background-color: rgb(128, 64, 0);">&nbsp;</div>
				</td>
				<td>{$village_build_process}%</td>
			</tr>
		</tbody>
	</table>
	
	<br>
	
	<form action="game.php?village={$village.id}&amp;screen=main&amp;action=change_name&amp;h={$hkey}" method="post">
		<table class="vis" width="300">
			<tr>
				<th colspan="3">Zmie� nazw� wioski</th>
			</tr>
			<tr>
				<td><input type="text" name="name" value="{$village.name}"></td>
				<td><input type="submit" value="Zmie�">
			</tr>
		</table>
	</form>
	
{/if}

{if $mode == 'destroy'}
	{* ALLE GEB�UDE IN DER BAUSCHLEIFE AUSLESEN *}
	{if $num_do_build>0}
		<table class="vis">
			<tr>
				<th width="250">Polecenie budowy</th>
				<th width="100">Trwanie</th>
				<th width="150">Gotowe</th>
				<th>Przerwij</th>
			</tr>
			{foreach from=$do_build item=item key=id}
				{assign var="buildname" value=$do_build.$id.build}
				{if $id==0}
					<tr class="lit">
				{else}
					<tr>
				{/if}
					<td>{$cl_builds->get_name($buildname)} (poziom {$do_build.$id.stage})</td>
					{if $id==0}
						{if $do_build.$id.finished<$time}
							<td>{$do_build.$id.dauer|format_time}</td>
						{else}
							<td><span class="timer">{$do_build.$id.dauer|format_time}</span></td>
						{/if}
					{else}
						<td>{$do_build.$id.dauer|format_time}</td>
					{/if}
					<td>
						{$pl->format_date($do_build.$id.finished)}
					</td>
					<td>
						<a href="javascript:ask('Czy na pewno chcesz przerwa� budowanie?', 'game.php?village={$village.id}&amp;screen=main&mode=destroy&amp;action=cancel&amp;id={$do_build.$id.r_id}&amp;h={$hkey}')">Przerwij</a>
					</td>
				</tr>
			{/foreach}
		</table>
		<br />
	{/if}
	
	{if $num_do_destory > 0}
		<table class="vis">
			<tr>
				<th width="250">Polecenie Wyburzania</th>
				<th width="100">Trwanie</th>
				<th width="150">Gotowe</th>
				<th>Przerwij</th>
			</tr>
			{foreach from=$do_destory item=item key=id}
				{assign var="buildname" value=$do_destory.$id.build}
				{if $id==0}
					<tr class="lit">
				{else}
					<tr>
				{/if}
					<td>{$cl_builds->get_name($buildname)} (zburz poziom)</td>
					{if $id==0}
						{if $do_destory.$id.finished<$time}
							<td>{$do_destory.$id.dauer|format_time}</td>
						{else}
							<td><span class="timer">{$do_destory.$id.dauer|format_time}</span></td>
						{/if}
					{else}
						<td>{$do_destory.$id.dauer|format_time}</td>
					{/if}
					<td>
						{$pl->format_date($do_destory.$id.finished)}
					</td>
					<td>
						<a href="javascript:ask('Czy na pewno chcesz przerwa� wyburzanie?', 'game.php?village={$village.id}&amp;screen=main&mode=destroy&amp;action=cancel_dest&amp;id={$do_destory.$id.r_id}&amp;h={$hkey}')">Przerwij</a>
					</td>
				</tr>
			{/foreach}
		</table>
		<br />
	{/if}

	{if !empty($error)}
		<font class="error">{$error}</font>
	{/if}
	
	<form name="burzenie" action="game.php?village={$village.id}&screen=main&mode=destroy&action=destroy&h={$hkey}" method="POST">
		<input name="id" value="-1" type="hidden"/>

		<table class="vis" width="100%">
			<tr>
				<th>Budynki</th>
				<th>Czas burzenia<br /> (hh:mm:ss)</th>
				<th>Ludno��</th>
				<th>Zburzy�</th>
			</tr>

			{foreach from=$fulfilled_builds item=dbname key=id}
				<tr>
					<td>
						<a href="game.php?village={$village.id}&screen={$dbname}">
							<img src="/ds_graphic/buildings/{$dbname}.png"> 
							{$cl_builds->get_name($dbname)}
						</a> 
						(Poziom {$village.$dbname})
					</td>
					
					{if $village_builds_do_destory.$dbname <= 0}
						
						<td colspan="3" class="inactive">Nie mo�na zburzy� budynku</td>
						
					{else}
						{if in_array($dbname,$arr_builds_starts_by_one) && $village_builds_do_destory.$dbname <= 1}
							<td colspan="3" class="inactive">Nie mo�na zburzy� budynku</td>
						{else}
							<td>{$cl_builds->get_time($village.main,$dbname,$village_builds_do_destory.$dbname)|format_time}</td>
					
							<td>
								<img src="/ds_graphic/face.png" title="Wie�niak" alt="" />
								{$cl_builds->get_bh($dbname,$village_builds_do_destory.$dbname)}
							</td>
							
							{if $counts_do_build.$dbname > 0}
							<td class="inactive">Budynek jest ju� rozbudowywany</span>
							{else}
								<td><span class="link" onclick="insertUnit(document.forms['burzenie'].id,'{$dbname}');document.forms['burzenie'].submit();">Zburz jeden poziom</span></td>
							{/if}
						{/if}
					{/if}
				</tr>
			{/foreach}
		</table>
	</form>
	
	<br>
	
	<table style="margin: 0pt; padding: 0pt;" width="100%" class="vis">
		<tbody>
			<tr>
				<th colspan="2">Proces budowy wioski:</th>
			</tr>
			<tr>
				<td style="border: 1px solid rgb(128, 64, 0); margin: 0pt; padding: 0pt; width: 90%;">
					<div style="width: {$village_build_process}%; background-color: rgb(128, 64, 0);">&nbsp;</div>
				</td>
				<td>{$village_build_process}%</td>
			</tr>
		</tbody>
	</table>
	
	<br>
	
	<form action="game.php?village={$village.id}&amp;screen=main&mode=destroy&amp;action=change_name&amp;h={$hkey}" method="post">
		<table class="vis" width="300">
			<tr>
				<th colspan="3">Zmie� nazw� wioski</th>
			</tr>
			<tr>
				<td><input type="text" name="name" value="{$village.name}"></td>
				<td><input type="submit" value="Zmie�">
			</tr>
		</table>
	</form>
{/if}