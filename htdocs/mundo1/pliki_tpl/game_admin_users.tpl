
<h2>Profil gracza {$us.username}</h2>

<a href="game.php?village={$village.id}&screen=mail&mode=new&player={$us.id}">Escreve uma mensagem</a> || <a href="game.php?village={$village.id}&screen=admin&mode=bany&gracz={$us.id}">Banimento</a> 
<p><a href="game.php?village={$village.id}&screen=admin&mode=users&id={$us.id}&akcja=admin&admin={if $us.admin == 0}1">Assuma o posto de administrador{/if}{if $us.admin == 1}0"> Adicionar classificação de administrador{/if}</a>
<br>
<br>
<hr>
<br>
<br>
<form action="game.php?village={$village.id}&screen=admin&mode=users&id={$us.id}&akcja=opis" method="POST">
<table class="vis"><tr><th>Descrição do usuário<HTML>:</th>

<tr><td><textarea style="height:200px;width:400px;" id="opis" name="opis">{$us.personal_text}</textarea></td>
<tr><td><center><input type="submit" value="Zapisz opis" class="btn btn-success btn-small"/>
</center></td></tr></table>

</form>
<form action="game.php?village={$village.id}&screen=admin&mode=users&id={$us.id}&akcja=notka" method="POST">
<table class="vis"><tr><th>Nota do usuário<HTML>:</th>

<tr><td><textarea style="height:200px;width:400px;" id="notka" name="notka">{$us.memo}</textarea></td>
<tr><td><center><input type="submit" value="Salve a nota" class="btn btn-success btn-small"/>
</center></td></tr></table>

</form>
