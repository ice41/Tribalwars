<table class="vis" width="400">
<tr><th colspan="3">Invita&#355;ii</th></tr>
	{foreach from=$invites item=arr key=id}
		<tr>
			<td><a href="game.php?village={$village.id}&amp;screen=info_player&amp;id={$arr.to_userid}">{$arr.to_username}</a></td>
			<td>{php}
                            $data_terminare=$this->_tpl_vars['arr']['time'];
                            $data_terminare = str_replace("heute um","Ast&#259;zi la ora",$data_terminare);
                            $data_terminare = str_replace("Uhr","",$data_terminare);
                            $data_terminare = str_replace("am","&#206;n data de",$data_terminare);
                            $data_terminare = str_replace("um","la ora",$data_terminare);
                            $data_terminare = str_replace("morgen","M&#226;ine",$data_terminare);
                            //Variabila originala tpl: {$arr.time}
                            echo $data_terminare;
                            {/php}</td>
			<td><a href="game.php?village={$village.id}&amp;screen=ally&amp;mode=invite&amp;action=cancel_invitation&amp;id={$id}&amp;h={$hkey}">Retragere</a></td>
		</tr>
	{/foreach}
</table>
<br />
<form action="game.php?village={$village.id}&amp;screen=ally&amp;action=invite&amp;mode=invite&amp;action=invite&amp;h={$hkey}" method="post">
	<table class="vis" width="400">
	<tr><th colspan="3">Invita&#355;ie</th></tr>
	<tr><td>Nume:</td>
	<td><input name="name" type="text" value="" /></td>
	<td><input type="submit" value=" OK " /></td></tr>
	</table>
</form>