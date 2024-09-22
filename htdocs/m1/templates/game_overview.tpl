{php}
	$userid = $this->_tpl_vars['user']['id'];
	$v = mysql_fetch_assoc(mysql_query("SELECT * FROM `users` WHERE `id` = '".$userid."'")) or die(mysql_error());
	if($v['overview'] == 'old'){
{/php}
		{include file="game_overview_noGraphics.tpl"}
{php}
	}else{
{/php}
		{include file="game_overview_Graphics.tpl"}
{php}
	}
{/php}