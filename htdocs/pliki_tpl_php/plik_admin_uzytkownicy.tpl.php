<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2022-11-28 16:36:05
         Wersja PHP pliku pliki_tpl/admin_page/admin_uzytkownicy.tpl */ ?>
<center><h3>Cz�onkowie Teamu:</h3></center>
<strong>Lista cz�onk�w kt�ra wy�wietla si� na stronie <a href="team.php">Team.php</a></strong>
<form action="admin.php?screen=uzytkownicy&akcja=dodaj_teama" method="post" onsubmit="return validateReplyForm(this)">
<table class="vis">
<tr><th>Nazwa nowego gracza w teamie</th><th>Opis</th></tr>
<tr><td><input id="tm_gracz" name="tm_gracz" class="text btn" value="" type="text"></td><td><input id="tm_opis" name="tm_opis" class="text btn" value="" type="text" size="45"></td></tr>
<tr><td colspan="2"><center><input name="sub" type="submit" value="Dodaj nowego cz�onka" class="btn btn-success btn-small"//></center></td></tr>
</table>
</form>







<p>
<br />
<hr>


<center><h3>Lista u�ytkownik�w serwera</h3></center>



<strong>Na serwerze znajduje si� <?php echo $this->_tpl_vars['players']; ?>
 graczy, w tym <?php echo $this->_tpl_vars['admins']; ?>
 administrator�w i <?php echo $this->_tpl_vars['users']; ?>
 zwyczajnych u�ytkownik�w!</strong>
<small><a href="admin.php?screen=uzytkownicy&akcja=aktywuj_wszystkim"> >>Ative todas as contas no servidor!</a></small>

	<table width="100%" id="player_ranking_table" class="vis">
<tr><td colspan="8"><strong>* - klikni�cie zmieni rang�!</td></tr>		<tr>			<th>ID</th><th>Nick</th><th width="10">E-mail</th><th>�wiaty gry</th><th>Data rejestracji</th><th>Usu�</th><th>Ranga*</th>

		</tr>


<?php $_from = $this->_tpl_vars['gracze']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['gracz']):
?>
										<tr <?php if ($this->_tpl_vars['gracz']['id'] == $this->_tpl_vars['user']['id']): ?>class="selected"<?php endif; ?>>

<td><strong><a href="admin.php?screen=user&graczID=<?php echo $this->_tpl_vars['gracz']['id']; ?>
"><?php echo $this->_tpl_vars['gracz']['id']; ?>
</a></td>

<td><strong><font color="<?php if ($this->_tpl_vars['gracz']['admin'] != 0): ?>orange<?php else: ?>red<?php endif; ?>"> <?php echo $this->_tpl_vars['gracz']['nazwa']; ?>
</font></td><td width="10"><strong><?php echo $this->_tpl_vars['gracz']['email']; ?>
</strong></td><td><strong><?php echo $this->_tpl_vars['gracz']['serwery_gry']; ?>
</td><td><strong><?php echo $this->_tpl_vars['gracz']['date_reg']; ?>
</td><td><a href="admin.php?screen=uzytkownicy&akcja=usun_usera&oid=<?php echo $this->_tpl_vars['id']; ?>
"><img src="ds_graphic/delete.png" alt="Usu�" title="Usu� tego usera"></a></strong>	

<td><?php if ($this->_tpl_vars['gracz']['admin'] != 0): ?><a href="admin.php?screen=uzytkownicy&akcja=admin&oid=<?php echo $this->_tpl_vars['id']; ?>
&admin=0">U�ytkownik</a><?php else: ?><a href="admin.php?screen=uzytkownicy&akcja=admin&oid=<?php echo $this->_tpl_vars['id']; ?>
&admin=1">Admin</a><?php endif; ?></td></tr>															
												<?php endforeach; endif; unset($_from); ?>



		
</table>

<table class="vis" width="108%"><tr>
						<?php if ($this->_tpl_vars['aktu_page_ra'] > 0): ?>
							<td align="center" width="50%">
								<a href="admin.php?screen=uzytkownicy&amp;page=<?php echo $this->_tpl_vars['aktu_page_ra']-1; ?>
">&lt;&lt;&lt; do g�ry</a>
							</td>
						<?php endif; ?>
						<td align="center" width="50%">
							<a href="admin.php?screen=uzytkownicy&amp;page=<?php echo $this->_tpl_vars['aktu_page_ra']+1; ?>
">na d� &gt;&gt;&gt;</a>
						</td>
					</tr></table>
					