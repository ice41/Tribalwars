<table>
	<tr>
		<td>
			<img src="graphic/big_buildings/{$dbname}.png" title="Cazarma" alt="" />
		</td>
		<td>
			<h2>Curte nobila (Nivelul {$village.$dbname|replace:"stufe":"nivel"})</h2>
			{$description}
		</td>
	</tr>
</table>
<br />
{if $show_build}
	{if count($recruit_units)>0}
	    <table class="vis">
			<tr>
				<th width="150">Instructie</th>
				<th width="120">Durat&#259;</th>
				<th width="150">Terminare</th>
				<th width="100">&#206;ntrerupere*</th>
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
					<td><a href="game.php?t=129107&amp;village={$village.id}&amp;screen={$dbname}&amp;action=cancel&amp;id={$key}&amp;h={$hkey}">intrerupe</a></td>
			    </tr>
			{/foreach}

		</table>
		<div style="font-size: 7pt;">* (90% din materiile prime iti vor fi &#238;napoiate)</div>
		<br>
	{/if}

	{if !empty($error)}
		<font class="error">{$error}</font>
	{/if}
	<form action="game.php?village={$village.id}&amp;screen={$dbname}&amp;action=train&amp;h={$hkey}" method="post" onsubmit="this.submit.disabled=true;">
		<table class="vis">
			<tr>
				<th width="150">Unitate</th>
				<th colspan="4" width="120">Necesitate</th>
				<th width="130">Durat&#259; (hh:mm:ss)</th>
				<th>&#206;n sat / Total</th>
				<th>Recrutare</th>
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
					    <td class="inactive">Unitatea nu este &#238;nca cercetat&#259;</td>
					{elseif $cl_units->last_error==not_needed}
					    <td class="inactive">Cerin&#355;ele de construire nu sunt &#238;ndeplinite</td>
					{elseif $cl_units->last_error==build_ah}
					    <td class="inactive">Trebuie sa fie &#238;nt&#259;rite.</td>
					{elseif $cl_units->last_error==not_enough_ress}
					    <td class="inactive">Nu sunt destule materii prime disponibile</td>
					{elseif $cl_units->last_error==not_enough_bh}
					    <td class="inactive">Ferma este prea mica</td>
					{else}
						<td><a href="game.php?h={$hkey}&amp;action=train_snob&amp;screen=snob&amp;village={$village.id}">Generare unitate</a></td>
					{/if}
				</tr>
			{/foreach}


		</table>
		<br />
		{if $ag_style==0}
			<h4>Num&#259;rul genera&#355;iilor de nobili care pot fi create &#238;n acest sat</h4>
			<table class="vis">
			<tr><td>Nivelul cur&#355;ii nobile:</td><td>{$village.snob}</td></tr>
			<tr><td>- satele cucerite de acest sat</td><td>{$village.control_villages}</td></tr>
			<tr><td>- nobilimea existenta si cea tocmai creat&#259; &#238;n acest sat:</td><td>{$village.recruited_snobs}</td></tr>
			<tr><th>Mai pot fi create:</th><th>{$village.snob-$village.control_villages-$village.recruited_snobs}</th></tr>
			</table>
		{elseif $ag_style==1}
			<h4>Num&#259;rul genera&#355;iilorr de nobili care mai pot fi create</h4>
			<table class="vis">
			<tr><td>Limit&#259; - GN:</td><td>{$village.snob_info.stage_snobs}</td></tr>
			<tr><td>- GN existen&#355;i:</td><td>{$village.snob_info.all_snobs}</td></tr>
			<tr><td>- GN in producere:</td><td>{$village.snob_info.ags_in_prod}</td></tr>
			<tr><td>- Numarul satelor cucerite:</td><td>{$village.snob_info.control_villages}</td></tr>
			<tr><th>Mai pot fi create:</th><th>{$village.snob_info.can_prod}</th></tr>
			</table>
		{/if}
{/if}

{* Beherschte Dörfer *}
{if count($snobed_villages)>0}
	<br /><br />
	<table class="vis" width="300">
		<tr>
			<th>Sate asuprite de aceasta curte nobila</th>
		</tr>
		{foreach from=$snobed_villages key=id item=villagename}
			<tr>
				<td>
					<a href="game.php?village={$village.id}&amp;screen=info_village&amp;id={$id}">{$villagename}</a>
				</td>
			</tr>
		{/foreach}
	</table>
{/if}