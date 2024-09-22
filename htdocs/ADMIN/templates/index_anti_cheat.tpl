<h2>AntiCheat Conturi multiple / deblocare/blocare </h2>

{if !empty($action_text)}
<h3>Actiune</h3>
{$action_text}
{/if}

<h3>Conturi multiple gasite :</h3>
{if $multis_found == "Y"}
<table class="vis">
<tr>
	<th>Jucaotor</th>
	<th>IP</th>
	<th>Jucator cu acelasi IP</th>
	<th>Actiune</th>
</tr>

{foreach from=$users item=u}
{if $u.multi.enum == "Y"}
<tr>
	<td>{$u.username|urldecode|htmlentities} {if $u.banned == "Y"}<strong>(Banat)</strong>{/if}</td>
	<td>{$u.ip}</td>
	<td>{$u.multi.username|urldecode|htmlentities}</td>
	<td>
		<a href="index.php?screen=anti_cheat&amp;do=ban&amp;user[0]={$u.id}&amp;user[1]={$u.multi.userid}">Blocheazale pe amndoua</a> - 
		<a href="index.php?screen=anti_cheat&amp;do=ban&amp;user[0]={$u.id}">{$u.username|urldecode|htmlentities} blocheaza</a> - 
		<a href="index.php?screen=anti_cheat&amp;do=ban&amp;user[0]={$u.multi.userid}">{$u.multi.username|urldecode|htmlentities} Blocari</a> <br />
		<a href="index.php?screen=anti_cheat&amp;do=remove_village&amp;user[0]={$u.id}&amp;user[1]={$u.multi.userid}">Le iei un sat la amandoi</a> - 
		<a href="index.php?screen=anti_cheat&amp;do=remove_village&amp;user[0]={$u.id}">{$u.username|urldecode|htmlentities} Le iei sate</a> - 
		<a href="index.php?screen=anti_cheat&amp;do=remove_village&amp;user[0]={$u.multi.userid}">{$u.multi.username|urldecode|htmlentities} Le iei sate</a>
	</td>
</tr>
{/if}
{/foreach}
</table>
{else}
<i>Nu a fost gasita nici o infractiune (conturi multiple).</i>
{/if}

<h3>Jucatori blocari/deblocari</h3>
<table class="vis">
<tr>
	<th>Jucator</th>
	<th>blocari/deblocari</th>
	<th>Actiune</th>
</tr>
{foreach from=$users item=u}
<tr>
	<td>{$u.username|urldecode|htmlentities}</td>
	<td>
		<form action="index.php?screen=anti_cheat&amp;do=change_ban_state&amp;id={$u.id}" method="post">
		<select name="state">
			<option value="Y" {if $u.banned == "Y"}selected="selected"{/if}>Blocheaza</option>
			<option value="N" {if $u.banned == "N"}selected="selected"{/if}>Deblocheaza</option>
		</select>
		<input type="submit" value="Actioneaza" />
		</form>
	</td>
	<td>
		<a href="index.php?screen=anti_cheat&amp;do=remove_village&amp;user[0]={$u.id}">Ia din sate</a>
	</td>
</tr>
{/foreach}
</table>

{literal}

{/literal}
<!--
End of Extension
-->