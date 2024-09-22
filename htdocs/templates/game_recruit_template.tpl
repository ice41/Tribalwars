{if $modes == 'massrek'}

<table>
	<tr>
		<td>
			<img src="graphic/big_buildings/barracks.png" title="Cazarm&#259;" alt="" />
			<img src="graphic/big_buildings/stable.png" title="Grajd" alt="" />
			<img src="graphic/big_buildings/garage.png" title="Atelier" alt="" />
		</td>
		<td>
			<h2>Recrutare &#238;n mas&#259;</h2>
			De aici pute&#355;i recruta trupe &#238;n mas&#259;,adic&#259; din grajd,cazarm&#259; &#351;i atelier!</td>
	</tr>
</table>
<table class="vis">
<tr>
<td><a href="game.php?village={$village.id}&screen=barracks">Cazarm&#259;</a></td>
<td><a href="game.php?village={$village.id}&screen=stable">Grajd</a></td>
<td><a href="game.php?village={$village.id}&screen=garage">Atelier</a></td>
<td><a href="game.php?village={$village.id}&screen=barracks&mode=massrek">Recrutare &#238;n mas&#259;</a></td>
</tr></table>

{if count($recruit_units)>0}
	    <table class="vis">
			<tr>
				<th width="150">Comanda</th>
				<th width="120">Durat&#259;</th>
				<th width="150">Terminare</th>
			</tr>
				{foreach from=$recruit_units key=key item=value}
			    <tr {if $recruit_units.$key.lit}class="lit"{/if}>
					<td>{$recruit_units.$key.num_unit} {$cl_units->get_name($recruit_units.$key.unit)}</td>
	                {if $recruit_units.$key.lit && $recruit_units.$key.countdown>-1}
						<td><span class="timer">{$recruit_units.$key.countdown|format_time}</span></td>
					{else}
					   	<td>{$recruit_units.$key.countdown|format_time}</td>
					{/if}
					<td>{$recruit_units.$key.time_finished|format_date}</td>
			    </tr>
				{/foreach}
		</table>
		<br>
	{/if}

{$err}
<form action="game.php?village={$village.id}&amp;screen=stable&amp;mode=massrek&amp;do=recruit" method="post" onsubmit="this.submit.disabled=true;">

<table class="vis" width="100%">
			<tr>
				<th width="150">Unitate</th>
				<th colspan="4" width="120">Necesitate</th>
				<th width="130">Durat&#259; (hh:mm:ss)</th>
								<th>Recrut&#259;</th>
			</tr>
			
		{foreach from=$unit item=name_unit key=unit_name}
			{if $name_unit != 'unit_snob'}
				<tr>
					<td><a href="javascript:popup('popup_unit.php?unit={$name_unit}', 520, 520)"> <img src="graphic/unit/{$name_unit}.png" alt="" /> {$unit_name}</a></td>
					<td><img src="graphic/holz.png" title="Lemn" alt="" /> {$cl_units->get_woodprice($name_unit)}</td>
					<td><img src="graphic/lehm.png" title="Argil&#259;" alt="" /> {$cl_units->get_stoneprice($name_unit)}</td>
					<td><img src="graphic/eisen.png" title="Fier" alt="" /> {$cl_units->get_ironprice($name_unit)}</td>
					<td><img src="graphic/face.png" title="Ferm&#259;" alt="" /> {$cl_units->get_bhprice($name_unit)}</td>
					<td>{$cl_units->get_time($village.$dbname,$name_unit)|format_time}</td>
										
					{$cl_units->check_needed($name_unit,$village)}
					{if $cl_units->last_error==not_tec}
					    <td class="inactive">Unitate necercetat&#259;</td>
					{elseif $cl_units->last_error==not_needed}
					    <td class="inactive">Condi&#355;iile de construire nu sunt &#238;ndeplinite</td>
					{elseif $cl_units->last_error==not_enough_ress}
					    <td class="inactive">Nu sunt suficiente materii prime</td>
					{elseif $cl_units->last_error==not_enough_bh}
					    <td class="inactive">Ferma este prea mica</td>
					{else}
						<td><input name="{$name_unit}" type="text" size="5" maxlength="5" /> <a href="javascript:insertUnit(document.forms[0].{$name_unit}, {$cl_units->last_error})">(max. {$cl_units->last_error})</a></td>
					{/if}
			{/if}
			{/foreach}
		<tr><td colspan="8" align="right"><input name="submit" type="submit" value="Recruteaz&#259;" style="font-size: 10pt;" /></td></tr>
	</table>
</form>
{else}
<table>
	<tr>
		<td>
			<img src="graphic/big_buildings/{$dbname}.png" title="{$buildname}" alt="" />
		</td>
		<td>
			<h2>{$buildname} (Nivelul {$village.$dbname|replace:"stufe":"nivel"})</h2>
			{$description}
		</td>
	</tr>
</table>
<br />
{if $show_build}
   
	{if count($recruit_units)>0}
	    <table class="vis">
			<tr>
				<th width="150">Comanda</th>
				<th width="120">Durat&#259;</th>
				<th width="150">Terminare</th>
				<th width="100">&#206;ntrerupe *</th>
			</tr>

			{foreach from=$recruit_units key=key item=value}
			    <tr {if $recruit_units.$key.lit}class="lit"{/if}>
					<td>{$recruit_units.$key.num_unit} {$cl_units->get_name($recruit_units.$key.unit)}</td>
	                {if $recruit_units.$key.lit && $recruit_units.$key.countdown>-1}
						<td><span class="timer">{$recruit_units.$key.countdown|format_time}</span></td>
					{else}
					   	<td>{$recruit_units.$key.countdown|format_time}</td>
					{/if}
					<td>{$recruit_units.$key.time_finished|format_date}</td>
					<td><a href="game.php?t=129107&amp;village={$village.id}&amp;screen={$dbname}&amp;action=cancel&amp;id={$key}&amp;h={$hkey}">&#238;ntrerupe</a></td>
			    </tr>
			{/foreach}

		</table>
		<div style="font-size: 7pt;">* (90% din materile prime vor fi date &#238;napoi)</div>
		<br>
	{/if}

	{if !empty($error)}
		<font class="error">{$error}</font>
	{/if}
	<form action="game.php?village={$village.id}&amp;screen={$dbname}&amp;action=train&amp;h={$hkey}" method="post" onsubmit="this.submit.disabled=true;">
	<table class="vis">

<td><a href="game.php?village={$village.id}&screen=barracks">Cazarm&#259;</a></td>
<td><a href="game.php?village={$village.id}&screen=stable">Grajd</a></td>
<td><a href="game.php?village={$village.id}&screen=garage">Atelier</a></td>
<td><a href="game.php?village={$village.id}&screen=barracks&mode=massrek">Recrutare &#238;n mas&#259;</a></td>
</table>	<table class="vis">
			<tr>
				<th width="150">Unitate</th>
				<th colspan="4" width="120">Necesitate</th>
				<th width="130">Durat&#259; (hh:mm:ss)</th>
				<th>&#206;n sat / Total</th>
				<th>Recrut&#259;</th>
			</tr>

			{foreach from=$units key=unit_dbname item=name}
				<tr>
					<td><a href="javascript:popup('popup_unit.php?unit={$unit_dbname}', 520, 520)"> <img src="graphic/unit/{$unit_dbname}.png" alt="" /> {$name}</a></td>
					<td><img src="graphic/holz.png" title="Lemn" alt="" /> {$cl_units->get_woodprice($unit_dbname)}</td>
					<td><img src="graphic/lehm.png" title="Argil&#259;" alt="" /> {$cl_units->get_stoneprice($unit_dbname)}</td>
					<td><img src="graphic/eisen.png" title="Fier" alt="" /> {$cl_units->get_ironprice($unit_dbname)}</td>
					<td><img src="graphic/face.png" title="Ferm&#259;" alt="" /> {$cl_units->get_bhprice($unit_dbname)}</td>
					<td>{$cl_units->get_time($village.$dbname,$unit_dbname)|format_time}</td>
					<td>{$units_in_village.$unit_dbname}/{$units_all.$unit_dbname}</td>

					{$cl_units->check_needed($unit_dbname,$village)}
					{if $cl_units->last_error==not_tec}
					    <td class="inactive">Unitate necercetat&#259;</td>
					{elseif $cl_units->last_error==not_needed}
					    <td class="inactive">Condi&#355;iile de construire nu sunt &#238;ndeplinite</td>
					{elseif $cl_units->last_error==not_enough_ress}
					    <td class="inactive">Nu sunt suficiente resurse disponibile</td>
					{elseif $cl_units->last_error==not_enough_bh}
					    <td class="inactive">Ferma este prea mica</td>
					{else}
						<td><input name="{$unit_dbname}" type="text" size="5" maxlength="5" /> <a href="javascript:insertUnit(document.forms[0].{$unit_dbname}, {$cl_units->last_error})">(max. {$cl_units->last_error})</a></td>
					{/if}
				</tr>
			{/foreach}

		    <tr><td colspan="8" align="right"><input name="submit" type="submit" value="Recruteaz&#259;" style="font-size: 10pt;" /></td></tr>
		</table>
	</form>
{/if}
{/if}