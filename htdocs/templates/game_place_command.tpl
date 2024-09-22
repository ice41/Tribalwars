{if !empty($error)}
         {if $error=='Es wurden keine Einheiten gewählt.'}
            {assign var='error' value='Nu au fost alese unit&#259;&#355;i'}
         {/if}
         {if $error=='Nicht genügend Einheiten vorhanden.'}
            {assign var='error' value='Nu ai destule unit&#259;&#355;i'}
         {/if}
         {if $error=='Keine Koordinaten angegeben.'}
            {assign var='error' value='Nu au fost date coordonatele'}
         {/if}
		 {if $error=='Das Ziel steht noch unter Anfangsschutz. Du darfst erst heute um  Uhr angreifen.'}
            {assign var='error' value='Juc&#259;torul &#238;nca mai are protec&#355;ie de &#238;ncepator'}
         {/if}
	<div style="color:red; font-size:150%">{$error}</div>
{/if}

<h3>D&#259; comand&#259;</h3>

<form name="units" action="game.php?village={$village.id}&amp;screen=place&amp;try=confirm" method="post">
	<table>
		<tr>
			{assign var=counter value=0}
			{foreach from=$group_units key=group_name item=value}
				<td width="150" valign="top">
					<table class="vis" width="100%">
						{foreach from=$group_units.$group_name item=dbname}
							{* Counter um 1 erhöhren für den Tab für die Input Felder *}
							{math assign=counter equation="x + y" x=$counter y=1}
							<tr>
								<td>
									<a href="javascript:popup('popup_unit.php?unit={$dbname}', 520, 520)"><img src="graphic/unit/{$dbname}.png" title="{$cl_units->get_name($dbname)}" alt="" /></a> <input name="{$dbname}" type="text" size="5" tabindex="{$counter}" value="{$values.$dbname}" /> <a href="javascript:insertUnit(document.forms[0].{$dbname}, {$units.$dbname})">({$units.$dbname})</a>
								</td>
							</tr>
						{/foreach}
					</table>
				</td>
			{/foreach}
		</tr>
	</table>

	<table>
		<tr>
			<td rowspan="2">
				x: <input type="text" name="x" value="{$values.x}" size="5" />
				y: <input type="text" name="y" value="{$values.y}" size="5" />
			</td>
			<td valign="top"></td>
			<td valign="top"></td>
			<td rowspan="2"><input class="attack" name="attack" type="submit" value="Atac" style="font-size: 10pt;" /></td>
			<td rowspan="2"><input class="support" name="support" type="submit" value="Sprijin" style="font-size: 10pt;" /></td>
		</tr>
	</table>
</form>

<h3>Miscari de trupe</h3>
{* Eigene losgeschickte Angriffe *}
{if count($my_movements)>0}
<table class="vis">
	<tr>
		<th width="250">Trupele tale</th>
		<th width="160">Sosire</th>
		<th width="80">Sosire &#238n</th>
	</tr>
	{foreach from=$my_movements item=array}
	    <tr>
	        <td>
	            <a href="game.php?village={$village.id}&amp;screen=info_command&amp;id={$array.id}&amp;type=own">
	            <img src="graphic/command/{$array.type}.png"> {$array.message}
	            </a>
	        </td>
	        <td>{$array.end_time|format_date}</td>
	        {if $array.arrival_in<0}
	        	<td>{$array.arrival_in|format_time}</td>
	        {else}
	        	<td><span class="timer">{$array.arrival_in|format_time}</span></td>
	        {/if}
	        {if $array.can_cancel}
	        	<td><a href="game.php?village={$village.id}&amp;screen=place&amp;action=cancel&amp;id={$array.id}&amp;h={$hkey}">&#238ntrerupe</a></td>
	        {/if}
	    </tr>
	{/foreach}
</table>
{/if}



{* Andere Angriffe auf das aktuelle Dorf *}
{if count($other_movements)>0}
<table class="vis">
	<tr>
		<th width="250">Trupe care sosesc</th>
		<th width="160">Sosire</th>
		<th width="80">Sosire &#238n</th>
	</tr>
	{foreach from=$other_movements item=array}
	    <tr>
	        <td>
	            <a href="game.php?village={$village.id}&amp;screen=info_command&amp;id={$array.id}&amp;type=other">
	            <img src="graphic/command/{$array.type}.png"> {$array.message}
	            </a>
	        </td>
	        <td>{$array.end_time|format_date}</td>
	        {if $array.arrival_in<0}
	        	<td>{$array.arrival_in|format_time}</td>
	        {else}
	        	<td><span class="timer">{$array.arrival_in|format_time}</span></td>
	        {/if}
	    </tr>
	{/foreach}
</table>
{/if}