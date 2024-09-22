<h3>Budynki</h3>
<table class="vis" width="100%">
{foreach from=$cl_builds->get_array('dbname') item=dbname}
	<tr>
		<td class="nowrap" width="150">
			<a href="javascript:popup_scroll('popup_building.php?building={$dbname}', 520, 520)">
				<center><img src="/ds_graphic/big_buildings/{$dbname}1.png" alt="" /></center>
				<br><center>{$cl_builds->get_name($dbname)}</center>
			</a>
		</td>
		<td>
			{$cl_builds->get_description_bydbname($dbname)}</td>
		</tr>
{/foreach}
</table>

<h3>Drzewko technologii dla œwiatów w starym stylu</h3>

<img src="/ds_graphic/Techtree_with_statue.png" alt=""/>