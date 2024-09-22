{php}
	$o_categorie = mysql_fetch_assoc(mysql_query("SELECT `id` FROM `forum` WHERE `ally` = '".$this->_tpl_vars['user']['ally']."' ORDER BY `id` ASC"));
{/php}
<iframe src="forum/forum.php?ally={$user.ally}" width="1000" height="450" frameborder="0">
  <p>Your browser does not support iframes.</p>
</iframe>
<center><a href="forum/forum.php?ally={$user.ally}" target="_blank">Deschide intr-o fereastra noua</a></center>
