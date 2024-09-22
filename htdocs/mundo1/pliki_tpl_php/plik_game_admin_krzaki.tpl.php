<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-26 21:24:12
         Wersja PHP pliku pliki_tpl/game_admin_krzaki.tpl */ ?>
<h3><?php echo $this->_tpl_vars['lang']['admin']['krzaki']['title']; ?>
</h3><?php if (! empty ( $this->_tpl_vars['error'] )): ?>	<font class="error"><?php echo $this->_tpl_vars['error']; ?>
</font><br /><?php endif; ?>

<div id="show_logins" class="vis moveable widget">
	<h4 class="head">
		<img style="float: right; cursor: pointer;" onclick="return VillageOverview.toggleWidget( 'show_logins', this );" src="graphic/minus.png">		<?php echo $this->_tpl_vars['lang']['admin']['krzaki']['title2']; ?>

	</h4>
	<div class="widget_content" style=""><form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=admin&mode=krzaki&akcja=dodaj_krzaki" method="POST">	<table class="vis" width="350">		<tr>			<th colspan="2"><?php echo $this->_tpl_vars['lang']['admin']['krzaki']['title2']; ?>
</th>		</tr>		<tr>			<td><?php echo $this->_tpl_vars['lang']['admin']['krzaki']['number']; ?>
<small> (max. 100.000)</small>:</td>			<td><input name="ile" type="text" value="100000"/></td>		</tr>		<tr>			<td><?php echo $this->_tpl_vars['lang']['admin']['krzaki']['type']; ?>
:</td>			<td><input name="typ" type="text"/></td>		</tr>		<tr>			<td colspan="2">				<input name="sub" type="submit" value="<?php echo $this->_tpl_vars['lang']['admin']['krzaki']['add']; ?>
" class="btn btn-success btn-small"/>			</td>			

	
</table></form>

<table class="vis">	<tr>		<th>ID</th>		<th>Mapa</th>	</tr>	<?php $_from = $this->_tpl_vars['krzaki']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['krzak']):
?>		<tr>			<td>				<?php echo $this->_tpl_vars['id']; ?>
			</td>			<td>				<?php $_from = $this->_tpl_vars['krzak']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['info']):
?>					<?php if ($this->_tpl_vars['key'] == 0): ?>						<?php $_from = $this->_tpl_vars['info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['wyglad_x']):
?>							<table cellspacing="0" cellpadding="0">								<tr>									<?php $_from = $this->_tpl_vars['wyglad_x']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['wyglad_y']):
?> 										<td>											<img src="/ds_graphic/map/<?php echo $this->_tpl_vars['wyglad_y']; ?>
"/>										</td>									<?php endforeach; endif; unset($_from); ?>								</tr>							</table>						<?php endforeach; endif; unset($_from); ?>					<?php endif; ?>				<?php endforeach; endif; unset($_from); ?>			</td>		</tr>	<?php endforeach; endif; unset($_from); ?>	<br /><br /></table>
			
</div>
</div> 