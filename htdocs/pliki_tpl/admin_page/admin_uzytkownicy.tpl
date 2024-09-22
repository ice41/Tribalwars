<center><h3>Cz³onkowie Teamu:</h3></center>
<strong>Lista cz³onków która wyœwietla siê na stronie <a href="team.php">Team.php</a></strong>
<form action="admin.php?screen=uzytkownicy&akcja=dodaj_teama" method="post" onsubmit="return validateReplyForm(this)">
<table class="vis">
<tr><th>Nazwa nowego gracza w teamie</th><th>Opis</th></tr>
<tr><td><input id="tm_gracz" name="tm_gracz" class="text btn" value="" type="text"></td><td><input id="tm_opis" name="tm_opis" class="text btn" value="" type="text" size="45"></td></tr>
<tr><td colspan="2"><center><input name="sub" type="submit" value="Dodaj nowego cz³onka" class="btn btn-success btn-small"//></center></td></tr>
</table>
</form>







<p>
<br />
<hr>


<center><h3>Lista u¿ytkowników serwera</h3></center>



<strong>Na serwerze znajduje siê {$players} graczy, w tym {$admins} administratorów i {$users} zwyczajnych u¿ytkowników!</strong>
<small><a href="admin.php?screen=uzytkownicy&akcja=aktywuj_wszystkim"> >>Ative todas as contas no servidor!</a></small>

	<table width="100%" id="player_ranking_table" class="vis">
<tr><td colspan="8"><strong>* - klikniêcie zmieni rangê!</td></tr>		<tr>			<th>ID</th><th>Nick</th><th width="10">E-mail</th><th>Œwiaty gry</th><th>Data rejestracji</th><th>Usuñ</th><th>Ranga*</th>

		</tr>


{foreach from=$gracze item=gracz key=id}
										<tr {if $gracz.id == $user.id}class="selected"{/if}>

<td><strong><a href="admin.php?screen=user&graczID={$gracz.id}">{$gracz.id}</a></td>

<td><strong><font color="{if $gracz.admin != 0}orange{else}red{/if}"> {$gracz.nazwa}</font></td><td width="10"><strong>{$gracz.email}</strong></td><td><strong>{$gracz.serwery_gry}</td><td><strong>{$gracz.date_reg}</td><td><a href="admin.php?screen=uzytkownicy&akcja=usun_usera&oid={$id}"><img src="ds_graphic/delete.png" alt="Usuñ" title="Usuñ tego usera"></a></strong>	

<td>{if $gracz.admin != 0}<a href="admin.php?screen=uzytkownicy&akcja=admin&oid={$id}&admin=0">U¿ytkownik</a>{else}<a href="admin.php?screen=uzytkownicy&akcja=admin&oid={$id}&admin=1">Admin</a>{/if}</td></tr>															
												{/foreach}



		
</table>

<table class="vis" width="108%"><tr>
						{if $aktu_page_ra > 0}
							<td align="center" width="50%">
								<a href="admin.php?screen=uzytkownicy&amp;page={$aktu_page_ra-1}">&lt;&lt;&lt; do góry</a>
							</td>
						{/if}
						<td align="center" width="50%">
							<a href="admin.php?screen=uzytkownicy&amp;page={$aktu_page_ra+1}">na dó³ &gt;&gt;&gt;</a>
						</td>
					</tr></table>
					