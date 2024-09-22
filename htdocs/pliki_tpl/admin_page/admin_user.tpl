
<h2>Profil gracza {$gracz.nazwa}</h2>
<table class="vis" width="108%"><tr><th>Jego adres E-mail:<th>Ranga :<th>Œwiaty gry:<th>IP rejestarcji:

<tr><td><strong>{$gracz.email}<td><strong>{if $gracz.admin == 0}<font color="red">Admin</font>{/if}{if $gracz.admin != 0}<font color="orange">U¿ytkownik</font>{/if}{if $gracz.banned == 1} Zbanowany!{/if}<td><strong>{$gracz.serwery_gry}<td><strong>{$gracz.ip_reg}</table>

<br>
<br>
<hr>
<br>
<br>
<form action="admin.php?screen=user&graczID={$gracz.id}&akcja=notka" method="POST">
<table class="vis"><tr><th>Notatki o u¿ytkowniku:</th>

<tr><td><textarea style="height:200px;width:400px;" id="notka" name="notka">{$gracz.notka}</textarea></td>
<tr><td><center><input type="submit" value="Zapisz notatkê" class="btn btn-success btn-small"/>
</center></td></tr>

</form>
