{if !empty($error)}
	<span class="error"/>{$error}</span>
	<br><br>
{/if}
		
<a href="#" onclick="switchDisplay('group_config')"/>»&nbsp; Edytuj grupy</a>
<div id="group_config" class="group_config" style="display: none;">
	<form action="game.php?village={$village.id}&amp;screen={$screen}&mode={$mode}&amp;action=create_group&amp;h={$hkey}" method="post">
		Utwórz grupê:<input type="text" name="group_name"> <input value="OK" name="sub" type="submit">
	</form>
		
	<table class="vis" width="100%"/>
		<tr height="23">
			<th>Grupy</th>
			<th width="25"></th>
		</tr>
		{foreach from=$user_groups item=group_name}
			<tr height="23">
				<td {if $user.aktu_group === $group_name}class="selected"{/if}><a href="game.php?village{$village.id}&screen={$screen}&mode={$mode}&amp;action=change_group&group={php} echo base64_encode($this->_tpl_vars['group_name']);{/php}&amp;h={$hkey}"/>{php} echo entparse($this->_tpl_vars['group_name']);{/php}</td>
				<td {if $user.aktu_group === $group_name}class="selected"{/if}><a href="game.php?village{$village.id}&screen={$screen}&mode={$mode}&amp;action=del_group&group={php} echo base64_encode($this->_tpl_vars['group_name']);{/php}&amp;h={$hkey}"/><img src="/ds_graphic/delete.png" alt="usuñ"/></a></td>
			</tr>
		{/foreach}
		<tr height="20">
			<td {if $user.aktu_group === 'all'}class="selected"{/if}><a href="game.php?village{$village.id}&screen={$screen}&mode={$mode}&amp;action=change_group&group={php} echo base64_encode('all');{/php}&amp;h={$hkey}"/>Wszystkie</td>
			<td {if $user.aktu_group === 'all'}class="selected"{/if}></td>
		</tr>
	</table>
</div>
<hr size="3">