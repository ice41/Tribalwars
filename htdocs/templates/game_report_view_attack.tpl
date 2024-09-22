{if $report.wins=='att'}
	<h3>Atacatorul a castigat</h3>
<img src="graphic/reports/battle_attacker_won.jpg" alt="" />
{else}
    <h3>Aparatorul a castigat</h3>
<img src="graphic/reports/battle_attacker_lost.jpg" alt="" />
{/if}

<h4>Noroc (din punctul de vedere al agresorului)</h4>
<table>
{if $report.luck<0}
	<tr>
	<td><b>{$report.luck}%</b></td>
	<td><img src="graphic/rabe.png" alt="Pech" /></td>
	<td>
		<table style="border: 1px solid black;" cellspacing="0" cellpadding="0">
		<tr>
	        <td width="{math equation="a-(b*(x * y))" b=-1 a=50 x=$report.luck y=2}" height="12"></td>
			<td width="{math equation="b*(x * y)" b=-1 x=$report.luck y=2}" style="background-image:url(graphic/balken_pech.png);"></td>
			<td width="2" style="background-color:rgb(0, 0, 0)"></td>
			<td width="0" style="background-image:url(graphic/balken_glueck.png);"></td>
			<td width="50"></td>
		</tr>
		</table>
{else}
	<tr>
    <td><img src="graphic/rabe.png" alt="Pech" /></td>
	<td>
		<table style="border: 1px solid black;" cellspacing="0" cellpadding="0">
		<tr>
			<td width="50"></td>
			<td width="2" style="background-color:rgb(0, 0, 0)"></td>
			<td width="{math equation="x * y" x=$report.luck y=2}" style="background-image:url(graphic/balken_glueck.png);"></td>
			<td width="{math equation="a-(x * y)" a=50 x=$report.luck y=2}" height="12"></td>
		</tr>
		</table>
	<td>{if $report.luck>=1}<img src="graphic/klee.png" alt="Noroc" />{else}<img src="graphic/klee_grau.png" alt="Glück" />{/if}</td>
	<td><b>{$report.luck}%</b></td>
{/if}
</td>



</tr>
</table>

{if $moral_activ=='true'}
	<table>
	<tr><td><h4>Moral: {$report.moral}%</h4></td></tr>
	</table>
	<br />
{/if}


<table width="100%" style="border: 1px solid #DED3B9">
<tr><th width="100">Agresor:</th><th><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$report.from_user}">{$report.from_username}</a></th></tr>
<tr><td>Sat:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$report.from_village}">{$report.from_villagename} ({$report.from_x}|{$report.from_y})</a></td></tr>

<tr><td colspan="2">
	<table class="vis">
	<tr class="center">
		<td></td>
		{foreach from=$cl_units->get_array("dbname") item=dbname key=name}
			<td width="35"><img src="graphic/unit/{$dbname}.png" title="{$name}" alt="" /></td>
		{/foreach}
	</tr>
	<tr class="center"><td>Num&#259;r:</td>{foreach from=$report_units.units_a item=num_units}{if $num_units>0}<td>{$num_units}</td>{else}<td class="hidden">0</td>{/if}{/foreach}</tr>

	<tr class="center"><td>Pierderi:</td>{foreach from=$report_units.units_b item=num_units}{if $num_units>0}<td>{$num_units}</td>{else}<td class="hidden">0</td>{/if}{/foreach}</tr>
	</table>

</td></tr>
</table><br />

<table width="100%" style="border: 1px solid #DED3B9">
<tr><th width="100">Ap&#259;r&#259;tor:</th><th><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$report.to_user}">{$report.to_username}</a></th></tr>
<tr><td>Sat:</td><td><a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$report.to_village}">{$report.to_villagename} ({$report.to_x}|{$report.to_y})</a></td></tr>
<tr><td colspan="2">
	{if $see_def_units}
		<table class="vis">
		<tr class="center">
			<td></td>
			{foreach from=$cl_units->get_array("dbname") item=dbname key=name}
				<td width="35"><img src="graphic/unit/{$dbname}.png" title="{$name}" alt="" /></th>
			{/foreach}
		</tr>
		<tr class="center"><td>Num&#259;r:</td>{foreach from=$report_units.units_c item=num_units}{if $num_units>0}<td>{$num_units}</td>{else}<td class="hidden">0</td>{/if}{/foreach}</tr>
	
		<tr class="center"><td>Pierderi:</td>{foreach from=$report_units.units_d item=num_units}{if $num_units>0}<td>{$num_units}</td>{else}<td class="hidden">0</td>{/if}{/foreach}</tr>
		</table>
	{else}
		<p>Nici unul din lupt&#259;torii tai nu a supravie&#355;uit. Nu au putut fi luate nici informa&#355;ii despre puterea trupelor du&#351;mane.</p>
	{/if}

</td></tr>
</table><br /><br />
{if count($report_units.units_e)>1}
	<h4>Trupele ap&#259;r&#259;torului, care au fost pe drum</h4>
	<table>
	<tr>
		{foreach from=$cl_units->get_array("dbname") item=dbname key=name}
			<th width="35"><img src="graphic/unit/{$dbname}.png" title="{$name}" alt="" /></th>
		{/foreach}
	</tr>
	<tr>{foreach from=$report_units.units_e item=num_units}{if $num_units>0}<td>{$num_units}</td>{else}<td class="hidden">0</td>{/if}{/foreach}</tr>
	</table>
{/if}

<table width="100%" style="border: 1px solid #DED3B9">
	{if $report_ress.wood>0 || $report_ress.stone>0 || $report_ress.iron>0}
		<tr><th>Prad&#259;:</th>
		<td width="220">
			{if $report_ress.wood>0}<img src="graphic/holz.png" title="Lemn" alt="" />{$report_ress.wood} {/if}
			{if $report_ress.stone>0}<img src="graphic/lehm.png" title="Argil&#259;" alt="" />{$report_ress.stone} {/if}
			{if $report_ress.iron>0}<img src="graphic/eisen.png" title="Fier" alt="" />{$report_ress.iron} {/if}</td>
		<td>{$report_ress.sum}/{$report_ress.max}</td>
		</tr>
	{/if}
	{if $report_ram.from!=$report_ram.to}
		<tr><th>Distrugere prin berbeci:</th>
		<td colspan="2">Zidul a fost distrus de la nivelul <b>{$report_ram.from}</b> la nivelul <b>{$report_ram.to}</b></td></tr>
	{/if}
	{if $report_agreement.from!=$report_agreement.to}
	<tr><th>Modificare de adeziune</th>
	<td colspan="2">Adeziune sc&#259;zut&#259; de la <b>{$report_agreement.from}</b> la <b>{$report_agreement.to}</b></td></tr>
	{/if}
	{if $report_catapult.from!=$report_catapult.to}
		<tr><th>Distrugere prin foc de catapult&#259;:</th>
		<td colspan="2">{$cl_builds->get_name($report_catapult.building)} distrus de la nivelul <b>{$report_catapult.from}</b> la nivelul <b>{$report_catapult.to}</b></td></tr>
	{/if}
</table>