{if $do_destroy != 0}
<table class="vis">
  <th width="250">{$lang->get('doDestroy')}</th>
  <th width="100">{$lang->grab('main', 'duration')}</th>
  <th width="150">{$lang->grab('main', 'time_finished')}</th>
  <th></th>
  {foreach from=$destroy item=d key=id}
  {if $id==0}
		<tr class="lit">
	{else}
		<tr>
	{/if}
  <td>{$cl_builds->get_name($d.building)} ({$lang->grab('main', 'stage')} {$village[$d.building]})</td>
  {if $id == 0}
  <td><span class="timer">{$d.id}</span></td>
  {else}
  <td><span class="timer">{$d.id.dauer|format_time}</span></td>
  {/if}
  <td>{$d.end_time|format_date}</td>
  </tr>
  {/foreach}
</table><br />
{/if}
{if $mode == 'destroy'}
<table class="vis">
<tr>
<td width="100">
{/if}
<a href="game.php?village={$village.id}&amp;screen=main">{$lang->grab("main", "build")}</a>
</td>
{if $mode == 'destroy'}
<td class="selected" width="100"><a href="game.php?village={$village.id}&amp;screen=main&amp;mode=destroy">{$lang->grab("main", "destroy")}</td>
{else}
<td width="100"></td>
</tr>
</table>
{/if}
<table class="vis">
  <th width="220">{$lang->grab("main", "building")}</th>
  <th width="100">{$lang->get("destroy_time")}</th>
  <th width="200">{$lang->get("do_destroy")}</th>
  		{foreach from=$fulfilled_builds item=dbname key=id}
			<tr>
				<td><a href="game.php?village={$village.id}&amp;screen={$dbname}"><img src="{$image_base}/buildings/{$dbname}.png"> {$cl_builds->get_name($dbname)}</a> ({$village.$dbname|stage})</td>
				{if $village.$dbname == 0}
        <td colspan="2">
        <span class="grey">{$lang->grab("error", "building_destroy_error")}</span>
        </td>
        {else}
        <td>{$cl_builds->get_time($village.main,$dbname,$build_village.$dbname+1)|format_time}</td>
        <td><a href="game.php?village={$village.id}&amp;screen=main&amp;mode=destroy&amp;building_id={$dbname}&amp;h={$hkey}">{$lang->get('destroy_one_level')}</a></td>
        {/if}
			</tr>
		{/foreach}
</table><br />