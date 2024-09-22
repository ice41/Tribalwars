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
			<h2>{$cl_builds->get_name($dbname)} ({if $village.$dbname > 0}nível {$village.$dbname}{else}não construído{/if})</h2>
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

	{* ALLE GEBÄUDE IN DER BAUSCHLEIFE AUSLESEN *}
	{if $num_do_build>0}
		<table class="vis">
			<tr>
				<th width="250">Ordem de construção</th>
				<th width="100">Duração</th>
				<th width="150">Conclusão</th>
				<th>cancelar</th>
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
						<a href="javascript:ask('Tem certeza de que quer interromper a construção?', 'game.php?village={$village.id}&amp;screen=main&amp;action=cancel&amp;id={$do_build.$id.r_id}&amp;mode=build&amp;h={$hkey}')">Cancelar</a>
					</td>
				</tr>
			{/foreach}
			{* ZUSATZKOSTEN FÜR DEN NÄCHSTEN AUFTRAG*}
			{if $num_do_build>2}
				<tr>
					<td colspan="4">
						Custos de construção adicionais são causados pelas longas listas de construção: <b>{$cl_builds->get_buildsharpens_costs($num_do_build)}%</b><br />
						<small>Os custos adicionais de construção não são devolvidos em caso de interrupção.</small>
					</td>
				</tr>
			{/if}
		</table>
		<br />
	{/if}
	
	{if $num_do_destory > 0}
		<table class="vis">
			<tr>
				<th width="250">Demolição de comando</th>
				<th width="100">Duração</th>
				<th width="150">Conclusão</th>
				<th>Cancelar</th>
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
						<a href="javascript:ask('Czy na pewno chcesz przerwaæ wyburzanie?', 'game.php?village={$village.id}&amp;screen=main&mode=build&amp;action=cancel_dest&amp;id={$do_destory.$id.r_id}&amp;h={$hkey}')">Przerwij</a>
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
				<th width="200">Edifícios</th>
				<th colspan="4">Necessidade</th>
				<th width="60">Tempo<br /> (hh:mm:ss)</th>
				<th width="330">Construir</th>
				<th>Pontos</th>
			</tr>

			{foreach from=$fulfilled_builds item=dbname key=id}
				<tr>
					<td>
						<a href="game.php?village={$village.id}&screen={$dbname}">
							<img src="/ds_graphic/buildings/{$dbname}.png"> 
							{$cl_builds->get_name($dbname)}
						</a> 
						({if $village.$dbname > 0}nível {$village.$dbname}{else}não construído{/if})
					</td>
					{if $cl_builds->get_maxstage($dbname)<=$build_village.$dbname}
						<td colspan="7" align="center" class="inactive">
							O nível máximo de expansão
						</td>
					{else}
						<td><img src="/ds_graphic/holz.png" title="drewno" alt="" />{if $cl_builds->get_wood($dbname,$build_village.$dbname+1) > $village.r_wood}<font color="red">{$cl_builds->get_wood($dbname,$build_village.$dbname+1)|format_number}</font>{else}{$cl_builds->get_wood($dbname,$build_village.$dbname+1)|format_number}{/if}</td>
						<td><img src="/ds_graphic/lehm.png" title="glina" alt="" />{if $cl_builds->get_stone($dbname,$build_village.$dbname+1) > $village.r_stone}<font color="red">{$cl_builds->get_stone($dbname,$build_village.$dbname+1)|format_number}</font>{else}{$cl_builds->get_stone($dbname,$build_village.$dbname+1)|format_number}{/if}</td>
						<td><img src="/ds_graphic/eisen.png" title="ruda" alt="" />{if $cl_builds->get_iron($dbname,$build_village.$dbname+1) > $village.r_iron}<font color="red">{$cl_builds->get_iron($dbname,$build_village.$dbname+1)|format_number}</font>{else}{$cl_builds->get_iron($dbname,$build_village.$dbname+1)|format_number}{/if}</td>
						<td>{if $cl_builds->get_bh($dbname,$build_village.$dbname+1)>0}<img src="/ds_graphic/face.png" title="Wieœniak" alt="" />{if $cl_builds->get_bh($dbname,$build_village.$dbname+1) > ($max_bh - $village.r_bh)}<font color="red">{$cl_builds->get_bh($dbname,$build_village.$dbname+1)}</font>{else}{$cl_builds->get_bh($dbname,$build_village.$dbname+1)}{/if}{/if}</td>
						<td>{$cl_builds->get_time($village.main,$dbname,$build_village.$dbname+1)|format_time}</td>
					
						{if $can_build.$dbname == 'not_enough_ress'}
							<td class="inactive"><span>As matérias-primas disponíveis para<span class="timer_replace">{$res_timer.$dbname}</span></span><span style="display:none">Os materiais adequados .</span></td>
						{elseif $can_build.$dbname == 'not_enough_ress_plus'}
							<td class="inactive">Muito pouca matérias para adicionar à fila edifícios .</td>
						{elseif $can_build.$dbname == 'not_fulfilled'}
							<td class="inactive">Não tem todos os requisitos para este edifício.</td>
						{elseif $can_build.$dbname == 'not_enough_bh'}
							<td class="inactive">Pouca capacitância a fazenda.</td>
						{elseif $can_build.$dbname == 'not_enough_storage'}
							<td class="inactive">Pouca capacitância no armazem.</td>
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
				<th colspan="2">O processo de construção da aldeia:</th>
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
				<th colspan="3">Mudar o nome da aldeia</th>
			</tr>
			<tr>
				<td><input type="text" name="name" value="{$village.name}"></td>
				<td><input type="submit" value="Alterar">
			</tr>
		</table>
	</form>
	
{/if}

{if $mode == 'destroy'}
	{* ALLE GEBÄUDE IN DER BAUSCHLEIFE AUSLESEN *}
	{if $num_do_build>0}
		<table class="vis">
			<tr>
				<th width="250">Ordem de construção</th>
				<th width="100">Duração</th>
				<th width="150">Conclusão</th>
				<th>Cancelar</th>
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
						<a href="javascript:ask('Tem certeza de que quer interromper a construção?', 'game.php?village={$village.id}&amp;screen=main&mode=destroy&amp;action=cancel&amp;id={$do_build.$id.r_id}&amp;h={$hkey}')">Cancelar</a>
					</td>
				</tr>
			{/foreach}
		</table>
		<br />
	{/if}
	
	{if $num_do_destory > 0}
		<table class="vis">
			<tr>
				<th width="250">Ordem de construção</th>
				<th width="100">Duração</th>
				<th width="150">Conclusão</th>
				<th>Cancelar</th>
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
						<a href="javascript:ask('Tem certeza de que quer interromper a demolição?', 'game.php?village={$village.id}&amp;screen=main&mode=destroy&amp;action=cancel_dest&amp;id={$do_destory.$id.r_id}&amp;h={$hkey}')">Cancelar</a>
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
				<th>Edifícios</th>
				<th>Tempo Demolição<br /> (hh:mm:ss)</th>
				<th>População</th>
				<th>Demolir</th>
			</tr>

			{foreach from=$fulfilled_builds item=dbname key=id}
				<tr>
					<td>
						<a href="game.php?village={$village.id}&screen={$dbname}">
							<img src="/ds_graphic/buildings/{$dbname}.png"> 
							{$cl_builds->get_name($dbname)}
						</a> 
						(nível {$village.$dbname})
					</td>
					
					{if $village_builds_do_destory.$dbname <= 0}
						
						<td colspan="3" class="inactive">Não pode demolir o edifício</td>
						
					{else}
						{if in_array($dbname,$arr_builds_starts_by_one) && $village_builds_do_destory.$dbname <= 1}
							<td colspan="3" class="inactive">Não pode demolir o edifício</td>
						{else}
							<td>{$cl_builds->get_time($village.main,$dbname,$village_builds_do_destory.$dbname)|format_time}</td>
					
							<td>
								<img src="/ds_graphic/face.png" title="Wieœniak" alt="" />
								{$cl_builds->get_bh($dbname,$village_builds_do_destory.$dbname)}
							</td>
							
							{if $counts_do_build.$dbname > 0}
							<td class="inactive">O Edifício já está a ser demolido</span>
							{else}
								<td><span class="link" onclick="insertUnit(document.forms['burzenie'].id,'{$dbname}');document.forms['burzenie'].submit();">Demolir um nível</span></td>
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
				<th colspan="2">O processo de construção da aldeia:</th>
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
				<th colspan="3">Mudar o nome da aldeia</th>
			</tr>
			<tr>
				<td><input type="text" name="name" value="{$village.name}"></td>
				<td><input type="submit" value="Alterar">
			</tr>
		</table>
	</form>
{/if}