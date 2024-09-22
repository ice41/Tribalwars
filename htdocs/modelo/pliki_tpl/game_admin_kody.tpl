{if $premium}<center><b>{$lang.admin.code.title}</b><br/>
{$lang.admin.code.title2}<hr/>
{$lang.admin.code.codes.1} <b>{$kody_n}</b> {$lang.admin.code.codes.2} <b>{$kody_u}</b> {$lang.admin.code.codes.3}<hr/>
<form action='game.php?village={$village.id}&screen=admin&mode=kody&act=vip' method='post'>
<textarea name='kody' style='width:400px; height:200px;'></textarea><br/>
{$lang.admin.code.codes.pkt}?<br>
<input type="radio" name="typ" value="1" /> 50<br>
<input type="radio" name="typ" value="2" /> 150<br>
<input type="radio" name="typ" value="3" /> 300<br>


<input type='submit' class='btn btn-big' value='{$lang.admin.code.add}'/>
</form>{else}<center><h4><font color="red">{$lang.admin.errors.code.premiumoff}</font></h4>{/if}