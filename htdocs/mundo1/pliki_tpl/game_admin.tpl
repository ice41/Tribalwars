{if $user.admin == 0}{if !empty($error)}
	<span class="error"/>{$error}</span>
{/if}

<h2>Panel de administrator</h2>

<table width="100%">
	<tbody>
		<tr>
			<td valign="top" width="130">
				<table class="vis modemenu">
					<tbody>
						{foreach from=$admin_modes key=name item=dbmode}
						{if $dbmode == kody && $premium} 
						{if $dbmode != 'users'}				<tr>
									<td{if $dbmode == $mode} 
class="selected"{/if}
 width="100">
										<a href="game.php?village={$village.id}&amp;screen=admin&amp;mode={$dbmode}">{$name} </a>
									</td>
								</tr>{/if}
								{else}
{if  $dbmode != 'kody'}
								{if $dbmode != 'users'}				<tr>
									<td{if $dbmode == $mode} 
class="selected"{/if}
 width="100">
										<a href="game.php?village={$village.id}&amp;screen=admin&amp;mode={$dbmode}">{$name} </a>
									</td>
								</tr>{/if}	
{/if}								
								{/if}
							
																					{/foreach}
					</tbody>
				</table>


			</td>
			<td valign="top">
				{include file="game_admin_$mode.tpl"}
			</td>
		</tr>
	


</tbody>
</table>









<div style="left: 902px; top: 735px;" id="tutorial_tooltip" class="tutorial">




	{$text_tut}
<br>

</div>
<div style="left: 1120px; top: 755px;" id="tutorial_head" class="tutorial{if $mode == 'reffurge'}_vilg{/if}">
	<a href="#" onclick="return tutorial.head_clicked()"><img style="float: right;" src="/ds_graphic/tutorial_65/head.png" alt=""></a><br>
	
</div>



	                                </td>


</tr>
{elseif $user.admin != 0}
<h2><b><font color="red">Não está autorizado a visualizar esta página!</font></color></b></h2>
{/if}


