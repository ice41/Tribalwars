{if $report.wins=='att'}
{php}
	$rid = $this->_tpl_vars['report_agreement']['to'];
	if ($rid <= "-1"){
		$this->_tpl_vars['report']['image'] = 'image_village_won';
{/php}
<h3 style="margin-bottom:5px;">O atacante venceu!</h3>
{php}
	}elseif($rid >= "0"){
		$this->_tpl_vars['report']['image'] = 'image_attack_won';
{/php}
<h3 style="margin-bottom:5px;">O atacante venceu!</h3>
{php}
	}
{/php}
{else}
<h3 style="margin-bottom:5px;">O defensor venceu</h3>
{php}
		$this->_tpl_vars['report']['image'] = 'image_attack_lost';
{/php}
{/if}
<div class="report_image {$report.image}" style="margin-left:1px;">    	    	        
	<div class="report_transparent_overlay">
		<h4 style="color:#000000;">Sorte (do ponto de vista do atacante)</h4>
		{if $report.luck < 0}
		<table id="attack_luck">
			<tr>
				<td class="nobg">{if $report.luck < 1}<img src="../graphic/icons/rabe.png" alt="Azar" />{else}<img src="../graphic/icons/rabe_grau.png" alt="Azar" />{/if}</td>
				<td class="nobg">
					<table class="luck" cellspacing="0" cellpadding="0">
						<tr>
							<td class="luck-item nobg" width="{math equation="a-(b*(x * y))" b=-1 a=50 x=$report.luck y=2}" height="12"></td>
							<td class="luck-item nobg" width="{math equation="b*(x * y)" b=-1 x=$report.luck y=2}" style="background-image:url(../graphic/layout/balken_pech.png);"></td>
							<td class="luck-item nobg" width="0" style="background-image:url(../graphic/layout/balken_glueck.png);border-left:1px solid #000000"></td>
							<td class="luck-item nobg" width="50"></td>
						</tr>
					</table>
				</td>
				<td class="nobg">{if $report.luck>=1}<img src="../graphic/icons/klee.png" alt="Sorte" />{else}<img src="../graphic/icons/klee_grau.png" alt="Sorte" />{/if}</td>
				<td class="nobg"><b style="color:#000000;">{$report.luck}%</b></td>
			</tr>
		</table>
		{else}
		<table id="attack_luck">
			<tr>
				<td class="nobg">{if $report.luck < 1}<img src="../graphic/icons/rabe.png" alt="Azar" />{else}<img src="../graphic/icons/rabe_grau.png" alt="Azar" />{/if}</td>
				<td class="nobg">
					<table class="luck" cellspacing="0" cellpadding="0">
						<tr>
							<td class="luck-item nobg" width="50" height="12"></td>
							<td class="luck-item nobg" width="0" style="background-image:url('../graphic/layout/balken_pech.png');border-right:1px solid #000000"></td>
							<td class="luck-item nobg" width="{math equation="x * y" x=$report.luck y=2}" style="background-image:url('../graphic/layout/balken_glueck.png');"></td>
							<td class="luck-item nobg" width="{math equation="a-(x * y)" a=50 x=$report.luck y=2}"></td>
						</tr>
					</table>
				</td>
				<td class="nobg">{if $report.luck>=1}<img src="../graphic/icons/klee.png" alt="Sorte" />{else}<img src="../graphic/icons/klee_grau.png" alt="Sorte" />{/if}</td>
				<td class="nobg"><b style="color:#000000;">{$report.luck}%</b></td>
			</tr>
		</table>
		{/if}
	{if $moral_activ=='true'}
		<h4 style="color:#000000;">Moral: {$report.moral}%</h4>
	{/if}
	</div>
</div>
<table width="428" style="border-spacing:1px;background-color:#FEE47D;" align="center">
	<tr><th style="width:20%">Atacante:</th><th><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$report.from_user}">{$report.from_username|entparse}</a></th></tr>
	<tr><td>Origem:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$report.from_village}">{$report.from_villagename} ({$report.from_x}|{$report.from_y}) K</a></td></tr>
	<tr>
		<td colspan="2">
			<table class="vis" style="border-spacing:1px;background-color:#FEE47D;" align="center">
				<tr class="center">
					<td></td>
					{foreach from=$cl_units->get_array("dbname") item=dbname key=name}
					<td width="35"><img src="../graphic/unit/{$dbname}.png" title="{$name}" alt="" /></td>
					{/foreach}
				</tr>
				<tr class="center"><td>Tropas:</td>{foreach from=$report_units.units_a item=num_units}{if $num_units>0}<td>{$num_units}</td>{else}<td class="hidden">0</td>{/if}{/foreach}</tr>
				<tr class="center"><td>Perdas:</td>{foreach from=$report_units.units_b item=num_units}{if $num_units>0}<td>{$num_units}</td>{else}<td class="hidden">0</td>{/if}{/foreach}</tr>
			</table>
		</td>
	</tr>
</table><br />
<table width="428" style="border-spacing:1px;background-color:#FEE47D;" align="center">
	<tr><th style="width:20%">Defensor:</th><th><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$report.to_user}">{$report.to_username|entparse}</a></th></tr>
	<tr><td>Destino:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$report.to_village}">{$report.to_villagename} ({$report.to_x}|{$report.to_y}) K</a></td></tr>
	<tr>
		<td colspan="2">
		{if $see_def_units}
			<table class="vis" style="border-spacing:1px;background-color:#FEE47D;" align="center">
				<tr class="center">
					<td></td>
					{foreach from=$cl_units->get_array("dbname") item=dbname key=name}
					<td width="35"><img src="../graphic/unit/{$dbname}.png" title="{$name}" alt="" /></td>
					{/foreach}
				</tr>
				<tr class="center"><td>Tropas:</td>{foreach from=$report_units.units_c item=num_units}{if $num_units>0}<td>{$num_units}</td>{else}<td class="hidden">0</td>{/if}{/foreach}</tr>
				<tr class="center"><td>Perdas:</td>{foreach from=$report_units.units_d item=num_units}{if $num_units>0}<td>{$num_units}</td>{else}<td class="hidden">0</td>{/if}{/foreach}</tr>
			</table>
		{else}
			<p>Nenhuma unidade voltou com informa&ccedil;&otilde;es das tropas inimigas.</p>
		{/if}
		</td>
	</tr>
</table><br />
{php}
	$info = mysql_fetch_array(mysql_query("SELECT `s_buildings`,`s_res` FROM `reports` WHERE id = '".parse($_GET['view'])."'"));
	if($info['s_res']){
		$q_res = explode(';',$info['s_res']);
		$n_res = array(
			0 => '<img src="../graphic/icons/wood.png" title="Madeira" />',
			1 => '<img src="../graphic/icons/stone.png" title="Argila" />',
			2 => '<img src="../graphic/icons/iron.png" title="Ferro" />'
		);
		echo '<table width="428" style="border-spacing:1px;background-color:#FEE47D;" align="center">
			<tr>
				<th width="150">Recursos descobertos:</th>
				<td>';
		for($i = 0; $i < count($n_res); $i++){
			if($q_res[$i] > 0){
				echo $n_res[$i].''.format_number($q_res[$i]).' ';
			}
		}
		echo '</td></tr>';
	}
	if($info['s_buildings']){
		$level = explode(';',$info['s_buildings']);
		$_builds = array(
			0 => 'Edif&iacute;cio Principal',
			1 => 'Quartel',
			2 => 'Estabulo',
			3 => 'Oficina',
			4 => 'Academia',
			5 => 'Ferreiro',
			6 => 'Pra&ccedil;a de Reuni&atilde;o',
			7 => 'Mercado',
			8 => 'Bosque',
			9 => 'Po&ccedil;o de Argila',
			10 => 'Mina de Ferro',
			11 => 'Fazenda',
			12 => 'Armaz&eacute;m',
			13 => 'Esconderijo',
			14 => 'Muralha'
		);
		echo '<tr>
				<th>Edif&iacute;cios:</th>
				<td>';
		for($i = 0; $i < count($_builds); $i++)
			if($level[$i] > 0)
				echo $_builds[$i].' <b>('.nivel($level[$i]).')</b><br />';
			echo '</td></tr></table><br/>';
	}
{/php}
{if count($report_units.units_e)>1}
<h4>Tropas em movimento</h4>
<table width="428" class="vis" style="border-spacing:1px;background-color:#FEE47D;" align="center">
	<tr>
		{foreach from=$cl_units->get_array("dbname") item=dbname key=name}
		<th width="35"><img src="../graphic/unit/{$dbname}.png" title="{$name}" alt="" /></th>
		{/foreach}
	</tr>
	<tr>{foreach from=$report_units.units_e item=num_units}{if $num_units>0}<td>{$num_units}</td>{else}<td class="hidden">0</td>{/if}{/foreach}</tr>
</table><br />
{/if}
<table width="428" style="border-spacing:1px;background-color:#FEE47D;" align="center">
	{if $report_ress.wood>0 || $report_ress.stone>0 || $report_ress.iron>0}
	<tr>
		<th>Saque:</th>
		<td width="220" align="center">
			{if $report_ress.wood>0}<img src="../graphic/icons/wood.png" title="Madeira" /> {$report_ress.wood} {/if}
			{if $report_ress.stone>0}<img src="../graphic/icons/stone.png" title="Argila" /> {$report_ress.stone} {/if}
			{if $report_ress.iron>0}<img src="../graphic/icons/iron.png" title="Ferro" /> {$report_ress.iron} {/if}
		</td>
		<td align="center">{$report_ress.sum|format_number}/{$report_ress.max|format_number}</td>
	</tr>
	{/if}
	{if $report_ram.from!=$report_ram.to}
	<tr>
		<th>Dano das arietes:</th>
		<td colspan="2">Muralha demolida do n&iacute;vel <b>{$report_ram.from}</b> para o n&iacute;vel <b>{$report_ram.to}</b></td>
	</tr>
	{/if}
	{if $report_agreement.from!=$report_agreement.to}
	<tr>
		<th>Lealdade</th>
		<td colspan="2">Descida de lealdade de <b>{$report_agreement.from}</b> para <b>{$report_agreement.to}</b></td>
	</tr>
	{/if}
	{if $report_catapult.from!=$report_catapult.to}
	<tr>
		<th>Dano das catapultas:</th>
		<td colspan="2">{$cl_builds->get_name($report_catapult.building)} demolido do n&iacute;vel <b>{$report_catapult.from}</b> para o n&iacute;vel <b>{$report_catapult.to}</b></td>
	</tr>
	{/if}
</table>