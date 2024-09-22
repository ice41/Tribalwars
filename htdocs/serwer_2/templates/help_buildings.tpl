<h3>Gebäude</h3>
<table class="vis" width="100%">
{foreach from=$cl_builds->get_array('dbname') item=dbname}
	<tr>
	<td class="nowrap">
	<a href="javascript:popup_scroll('popup_building.php?building={$dbname}', 520, 520)"><img src="graphic/buildings/{$dbname}.png" alt="" /> {$cl_builds->get_name($dbname)}</a>
	</td>
	<td>{$cl_builds->get_description_bydbname($dbname)}</td>
	</tr>
{/foreach}
</table>