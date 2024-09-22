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

{* ALLE GEBÄUDE IN DER BAUSCHLEIFE AUSLESEN *}
{if $num_do_build>0}
	<table class="vis">
	<tr><th width="250">Zlecenie</th><th width="100">Trwanie</th><th width="150">Ukoñczenie</th><th>Przerwij</th></tr>
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
							{php}header('location: game.php?village='.$this->_tpl_vars['village']['id'].'&screen='.$_GET['screen']);{/php}
						{else}
							<td><span class="timer">{$do_build.$id.dauer|format_time}</span></td>
						{/if}
					{else}
						<td>{$do_build.$id.dauer|format_time}</td>
					{/if}
					<td>{$pl->format_date($do_build.$id.finished)}</td>
					<td><a href="javascript:ask('Czy na pewno chcesz przerwaæ budowanie?', 'game.php?village={$village.id}&amp;screen=main&amp;action=cancel&amp;id={$do_build.$id.r_id}&amp;mode=build&amp;h={$hkey}')">Przerwij</a></td>
				</tr>
	{/foreach}
	{* ZUSATZKOSTEN FÜR DEN NÄCHSTEN AUFTRAG*}
	{if $num_do_build>2}
		<tr>
			<td colspan="4">Dodatkowe koszty budowy, spowodowane d³ug¹ list¹ budowy: <b>{$cl_builds->get_buildsharpens_costs($num_do_build)}%</b><br />
			<small>Dodatkowe koszty budowy nie bêd¹ zwracane w przypadku przerwania</small></td>
		</tr>
	{/if}
	</table>
	<br />
{/if}

{if !empty($error)}
    {if $error == 'Gebäude wurde vollständig ausgebaut.'}
		<font class="error">Maksymalny poziom rozbudowy zosta³ osi¹gniêty.</font>
	{elseif $error == 'Gebäude existiert nicht.'}
		<font class="error">Nie ma takiego budynku.</font>
	{else}
		<font class="error">{$error}</font>
	{/if}
{/if}

<form name="budowanie" action="game.php" method="GET">
	<input name="village" value="{$village.id}" type="hidden"/>
	<input name="screen" value="{$screen}" type="hidden"/>
	<input name="action" value="build" type="hidden"/>
	<input name="id" value="-1" type="hidden"/>
	<input name="h" value="{$hkey}" type="hidden"/>

<table class="vis">
<tr>
<th width="220">Budynek</th><th colspan="4">Koszty</th><th width="100">Czas<br /> (hh:mm:ss)</th><th width="200">Wybuduj</th>
</tr>

		{foreach from=$fulfilled_builds item=dbname key=id}
			<tr>
				<td><a href="game.php?village={$village.id}&screen={$dbname}"><img src="graphic/buildings/{$dbname}.png"> {$cl_builds->get_name($dbname)}</a> (Poziom {$village.$dbname})</td>
				{if $cl_builds->get_maxstage($dbname)<=$build_village.$dbname}
					<td colspan="6" align="center" class="inactive">Maksymalny poziom rozbudowy</td>
				{else}
					<td><img src="graphic/holz.png" title="drewno" alt="" />{if $cl_builds->get_wood($dbname,$build_village.$dbname+1) > $village.r_wood}<font color="red">{$cl_builds->get_wood($dbname,$build_village.$dbname+1)}</font>{else}{$cl_builds->get_wood($dbname,$build_village.$dbname+1)}{/if}</td>
					<td><img src="graphic/lehm.png" title="glina" alt="" />{if $cl_builds->get_stone($dbname,$build_village.$dbname+1) > $village.r_stone}<font color="red">{$cl_builds->get_stone($dbname,$build_village.$dbname+1)}</font>{else}{$cl_builds->get_stone($dbname,$build_village.$dbname+1)}{/if}</td>
					<td><img src="graphic/eisen.png" title="ruda" alt="" />{if $cl_builds->get_iron($dbname,$build_village.$dbname+1) > $village.r_iron}<font color="red">{$cl_builds->get_iron($dbname,$build_village.$dbname+1)}</font>{else}{$cl_builds->get_iron($dbname,$build_village.$dbname+1)}{/if}</td>
					<td>{if $cl_builds->get_bh($dbname,$build_village.$dbname+1)>0}<img src="graphic/face.png" title="Wieœniak" alt="" />{if $cl_builds->get_bh($dbname,$build_village.$dbname+1) > ($max_bh - $village.r_bh)}<font color="red">{$cl_builds->get_bh($dbname,$build_village.$dbname+1)}</font>{else}{$cl_builds->get_bh($dbname,$build_village.$dbname+1)}{/if}{/if}</td>
					<td>{$cl_builds->get_time($village.main,$dbname,$build_village.$dbname+1)|format_time}</td>
					{$cl_builds->build($village,$id,$build_village,$plus_costs)}
					{if $cl_builds->get_build_error2()=='not_enough_ress'}
						<td class="inactive"><span>Surowce dostêpne za <span class="timer_replace">{$cl_builds->get_build_error()}</span></span><span style="display:none">Wystarczaj¹co surowców.</span></td>
					{elseif $cl_builds->get_build_error2()=='not_enough_ress_plus'}
						<td class="inactive">Za ma³o surowców by dodaæ do kolejki budowy.</td>
					{elseif $cl_builds->get_build_error2()=='not_fulfilled'}
						<td class="inactive">Nie spe³niono wymagañ do tego budynku.</td>
					{elseif $cl_builds->get_build_error2()=='not_enough_bh'}
						<td class="inactive">Za ma³o miejsca w zagrodzie</td>
					{elseif $cl_builds->get_build_error2()=='not_enough_storage'}
						<td class="inactive">Za ma³a pojemnoœæ spichlerza.</td>
					{else}
						{if $build_village.$dbname < 1}
							<td><span class="link" onclick="insertUnit(document.forms['budowanie'].id,'{$dbname}');document.forms['budowanie'].submit();">Wybuduj</span></td>
						{else}
							<td><span class="link" onclick="insertUnit(document.forms['budowanie'].id,'{$dbname}');document.forms['budowanie'].submit();">Rozbuduj na poziom {$build_village.$dbname+1}</span></td>
						{/if}
					{/if}
				{/if}
			</tr>
		{/foreach}

</table>

</form>


<br>
<form action="game.php?village={$village.id}&amp;screen=main&amp;action=change_name&amp;h={$hkey}" method="post">
<table class="vis" width="300">
<tr><th colspan="3">Zmieñ nazwê wioski</th></tr>
<tr><td><input type="text" name="name" value="{$village.name}"></td><td><input type="submit" value="Zmieñ"></tr>
</table>
</form>
