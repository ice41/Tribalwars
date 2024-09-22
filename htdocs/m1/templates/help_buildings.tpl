<h3>Edif&iacute;cios</h3>
<table class="vis" align="center" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
{foreach from=$cl_builds->get_array('dbname') item=dbname}
	<tr>
	<td class="nowrap">
	<a href="javascript:popup_scroll('popup_building.php?building={$dbname}', 520, 520)"><img src="../graphic/buildings/{$dbname}.png" alt="" /> {$cl_builds->get_name($dbname)}</a>
	</td>
	<td>{$cl_builds->get_description_bydbname($dbname)}</td>
	</tr>
{/foreach}
</table>