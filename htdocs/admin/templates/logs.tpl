Diese Log Datei ist für den Entwickler der DS LAN gedacht. Wer diese Log durchblickt, viel Spass damit :-).
{if $num_pages>1}
	<center>
		{section name=countpage start=1 loop=$num_pages+1 step=1}
			{if $site==$smarty.section.countpage.index}
				<strong> &gt;{$smarty.section.countpage.index}&lt; </strong>
			{else}
				<a href="index.php?screen=logs&amp;site={$smarty.section.countpage.index}"> [{$smarty.section.countpage.index}] </a>
			{/if}
		{/section}
	</center>
{/if}

<table class="vis" width="100%">
	<tr>
		<th>Datum</th>
		<th>Username</th>
		<th>Dorf</th>
		<th>Event Type</th>
		<th>Event ID</th>
		<th>Ereignis</th>
	</tr>
	{foreach from=$logs item=arr key=id}
		<tr>
			<td>{$arr.time}</td>
			<td>{$arr.user}</td>
			<td>{$arr.village}</td>
			<td>{$arr.event_type}</td>
			<td>{$arr.event_id}</td>
			<td>{$arr.log}</td>
		</tr>
	{/foreach}
</table>