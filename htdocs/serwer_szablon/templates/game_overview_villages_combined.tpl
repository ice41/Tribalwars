{if $sekcja}
	<table class="vis" width="810">
		<tr>
			<td>
				{$sekcja_wiosek} 
			</td>
		</tr>
	</table>
{/if}
<table class="vis">
<tr>
	<th>Wioska</th>
	<th><img src="graphic/overview/main.png" title="Ratusz" alt="" /></th>
	<th><img src="graphic/overview/barracks.png" title="Koszary" alt="" /></th>
	<th><img src="graphic/overview/stable.png" title="Stajania" alt="" /></th>
	<th><img src="graphic/overview/garage.png" title="Waraszat" alt="" /></th>
	<th><img src="graphic/overview/smith.png" title="KuŸnia" alt="" /></th>
	<th><img src="graphic/overview/farm.png" title="Zagroda" alt="" /></th>
	
	{foreach from=$unit item=name key=dbname}
		<th width="35"><img src="graphic/unit/{$dbname}.png" title="{$name}" alt="" /></th>
	{/foreach}
	
	<th><img src="graphic/overview/trader.png" title="Kupcy" alt="" /></th>

</tr>

{foreach from=$villages item=arr key=arr_id}
	{if $villages.$arr_id.parzysta_liczba}
	<tr>
		<td>{if $villages.$arr_id.attacks!=0}<img src="graphic/command/attack.png"> {/if}{$bonus->get_bonus_mini_image($villages.$arr_id.bonus)}<a href="game.php?village={$arr_id}&screen=overview">{$villages.$arr_id.name} ({$villages.$arr_id.x}|{$villages.$arr_id.y}) K{$villages.$arr_id.continent}</a></td>

		{if isset($villages.$arr_id.first_build.buildname)}
			<td><a href="game.php?village={$arr_id}&amp;screen=main"><img src="graphic/overview/prod_running.png" title="" alt="" /></a></td>
		{else}
		    <td><a href="game.php?village={$arr_id}&amp;screen=main"><img src="graphic/overview/prod_avail.png" title="" alt="" /></a></td>
		{/if}
		
		{if $villages.$arr_id.barracks==0}
        	<td><a href="game.php?village={$arr_id}&amp;screen=barracks"><img src="graphic/overview/prod_impossible.png" title="" alt="" /></a></td>
		{elseif !empty($villages.$arr_id.barracks_prod)}
			<td><a href="game.php?village={$arr_id}&amp;screen=barracks"><img src="graphic/overview/prod_running.png" title="" alt="" /></a></td>
		{else}
        	<td><a href="game.php?village={$arr_id}&amp;screen=barracks"><img src="graphic/overview/prod_avail.png" title="" alt="" /></a></td>
		{/if}
		
		{if $villages.$arr_id.stable==0}
        	<td><a href="game.php?village={$arr_id}&amp;screen=stable"><img src="graphic/overview/prod_impossible.png" title="" alt="" /></a></td>
		{elseif !empty($villages.$arr_id.stable_prod)}
			<td><a href="game.php?village={$arr_id}&amp;screen=stable"><img src="graphic/overview/prod_running.png" title="" alt="" /></a></td>
		{else}
		    <td><a href="game.php?village={$arr_id}&amp;screen=stable"><img src="graphic/overview/prod_avail.png" title="" alt="" /></a></td>
		{/if}

		{if $villages.$arr_id.garage==0}
			<td><a href="game.php?village={$arr_id}&amp;screen=garage"><img src="graphic/overview/prod_impossible.png" title="" alt="" /></a></td>
		{elseif !empty($villages.$arr_id.garage_prod)}
			<td><a href="game.php?village={$arr_id}&amp;screen=garage"><img src="graphic/overview/prod_running.png" title="" alt="" /></a></td>
		{else}
			<td><a href="game.php?village={$arr_id}&amp;screen=garage"><img src="graphic/overview/prod_avail.png" title="" alt="" /></a></td>
		{/if}
		
		{if $villages.$arr_id.smith==0}
			<td><a href="game.php?village={$arr_id}&amp;screen=smith"><img src="graphic/overview/prod_impossible.png" title="" alt="" /></a></td>
		{elseif !empty($villages.$arr_id.first_tec.tecname)}
			<td><a href="game.php?village={$arr_id}&amp;screen=smith"><img src="graphic/overview/prod_running.png" title="" alt="" /></a></td>
		{else}
			<td><a href="game.php?village={$arr_id}&amp;screen=smith"><img src="graphic/overview/prod_avail.png" title="" alt="" /></a></td>
		{/if}

		<td><a href="game.php?village={$arr_id}&amp;screen=farm">{$villages.$arr_id.wolni} ({$villages.$arr_id.farm})</a></td>
		
		{foreach from=$unit item=name key=dbname}
			{if $villages.$arr_id.$dbname==0}
					<td class="hidden">{$villages.$arr_id.$dbname}</td>
			{else}
					<td>{$villages.$arr_id.$dbname}</td>
			{/if}
		{/foreach}
		
		<td><a href="game.php?village={$arr_id}&amp;screen=market">{$villages.$arr_id.dealers.in_village}/{$villages.$arr_id.dealers.max_dealers}</a></td>
	</tr>
	{else}
	<tr class="lp">
		<td>{if $villages.$arr_id.attacks!=0}<img src="graphic/command/attack.png"> {/if}{$bonus->get_bonus_mini_image($villages.$arr_id.bonus)}<a href="game.php?village={$arr_id}&screen=overview">{$villages.$arr_id.name} ({$villages.$arr_id.x}|{$villages.$arr_id.y}) K{$villages.$arr_id.continent}</a></td>

		{if isset($villages.$arr_id.first_build.buildname)}
			<td><a href="game.php?village={$arr_id}&amp;screen=main"><img src="graphic/overview/prod_running.png" title="" alt="" /></a></td>
		{else}
		    <td><a href="game.php?village={$arr_id}&amp;screen=main"><img src="graphic/overview/prod_avail.png" title="" alt="" /></a></td>
		{/if}
		
		{if $villages.$arr_id.barracks==0}
        	<td><a href="game.php?village={$arr_id}&amp;screen=barracks"><img src="graphic/overview/prod_impossible.png" title="" alt="" /></a></td>
		{elseif !empty($villages.$arr_id.barracks_prod)}
			<td><a href="game.php?village={$arr_id}&amp;screen=barracks"><img src="graphic/overview/prod_running.png" title="" alt="" /></a></td>
		{else}
        	<td><a href="game.php?village={$arr_id}&amp;screen=barracks"><img src="graphic/overview/prod_avail.png" title="" alt="" /></a></td>
		{/if}
		
		{if $villages.$arr_id.stable==0}
        	<td><a href="game.php?village={$arr_id}&amp;screen=stable"><img src="graphic/overview/prod_impossible.png" title="" alt="" /></a></td>
		{elseif !empty($villages.$arr_id.stable_prod)}
			<td><a href="game.php?village={$arr_id}&amp;screen=stable"><img src="graphic/overview/prod_running.png" title="" alt="" /></a></td>
		{else}
		    <td><a href="game.php?village={$arr_id}&amp;screen=stable"><img src="graphic/overview/prod_avail.png" title="" alt="" /></a></td>
		{/if}

		{if $villages.$arr_id.garage==0}
			<td><a href="game.php?village={$arr_id}&amp;screen=garage"><img src="graphic/overview/prod_impossible.png" title="" alt="" /></a></td>
		{elseif !empty($villages.$arr_id.garage_prod)}
			<td><a href="game.php?village={$arr_id}&amp;screen=garage"><img src="graphic/overview/prod_running.png" title="" alt="" /></a></td>
		{else}
			<td><a href="game.php?village={$arr_id}&amp;screen=garage"><img src="graphic/overview/prod_avail.png" title="" alt="" /></a></td>
		{/if}
		
		{if $villages.$arr_id.smith==0}
			<td><a href="game.php?village={$arr_id}&amp;screen=smith"><img src="graphic/overview/prod_impossible.png" title="" alt="" /></a></td>
		{elseif !empty($villages.$arr_id.first_tec.tecname)}
			<td><a href="game.php?village={$arr_id}&amp;screen=smith"><img src="graphic/overview/prod_running.png" title="" alt="" /></a></td>
		{else}
			<td><a href="game.php?village={$arr_id}&amp;screen=smith"><img src="graphic/overview/prod_avail.png" title="" alt="" /></a></td>
		{/if}

		<td><a href="game.php?village={$arr_id}&amp;screen=farm">{$villages.$arr_id.wolni} ({$villages.$arr_id.farm})</a></td>
		
		{foreach from=$unit item=name key=dbname}
			{if $villages.$arr_id.$dbname==0}
					<td class="hidden">{$villages.$arr_id.$dbname}</td>
			{else}
					<td>{$villages.$arr_id.$dbname}</td>
			{/if}
		{/foreach}
		
		<td><a href="game.php?village={$arr_id}&amp;screen=market">{$villages.$arr_id.dealers.in_village}/{$villages.$arr_id.dealers.max_dealers}</a></td>
	</tr>
	{/if}
{/foreach}

</table>