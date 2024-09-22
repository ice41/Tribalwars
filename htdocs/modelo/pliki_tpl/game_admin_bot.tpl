<script>
                    $( function() {ldelim} if( document.location.hash == "#ustawiony" ) UI.SuccessMessage( "Gracz {php} echo $_POST['uname']; {/php}zosta� ustawiony jako bot!", 5000 ); {rdelim});	

                    $( function() {ldelim} if( document.location.hash == "#usuniety" ) UI.ErrorMessage( "Bot zosta� usuni�ty!", 5000 ); {rdelim});	
</script>
<h2><font color="red">{$error}</font></h2>

<h2>{$lang.admin.bot.title}</h2>


<form action="game.php?village={$village.id}&screen=admin&mode=bot&action=add_user" method="POST"/>
	<table class="vis">
		<tr>
			<th colspan="3">{$lang.admin.bot.title2}</th>
		</tr>
		<tr>
			<td>{$lang.admin.bot.name}: </td>
			<td><input type="text" value="" name="uname"/></td>
			<td><input type="submit" value="{$lang.admin.bot.add}" name="sub" class="btn" class="btn btn-build"/></td>
		</tr>
	</table>
</form>

{if count($BotUsers) > 0}
	<h3>{$lang.admin.bot.tab.t}</h3>
	<table class="vis">
		<tr>
			<th>{$lang.admin.bot.tab.1}</th>
			<th width="25">{$lang.admin.bot.tab.2}</th>
		</tr>
		{foreach from=$BotUsers key=id item=user}
			<tr>
				<td><a href="game.php?village={$village.id}&screen=admin&mode=users&id={$id}" class="btn btn-small">{$user}</a></td>
				<td>
					
						<a href="game.php?village={$village.id}&screen=admin&mode=bot&action=del_user&id={$id}" class="btn btn-cancel evt-confirm" data-confirm-msg="Tem certeza de que deseja remover do player {$user} o bot?">Excluir</a>
					
				</td>
			</tr>
		{/foreach}
	</table>
	
{else}
	<br>
	<span class="error">{$lang.admin.bot.0}</span>

{/if}