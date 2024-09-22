<div style="padding: 7px 2px;">
	<form action="game.php?village={$village.id}&screen={$screen}&mode={$mode}&action=change_villages_per_page&h={$hkey}" method="POST"/>
		Número de aldeias por página:&nbsp;
		<input type="text" value="{$user_villages_per_page}" size="3" name="value"/>&nbsp;
		<input type="submit" size="2" value="OK" name="sub"/>
	</form>
</div>