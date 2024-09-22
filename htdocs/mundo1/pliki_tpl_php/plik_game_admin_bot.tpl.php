<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-26 22:55:15
         Wersja PHP pliku pliki_tpl/game_admin_bot.tpl */ ?>
<script>
                    $( function() { if( document.location.hash == "#ustawiony" ) UI.SuccessMessage( "Gracz <?php  echo $_POST['uname'];  ?>zosta� ustawiony jako bot!", 5000 ); });	

                    $( function() { if( document.location.hash == "#usuniety" ) UI.ErrorMessage( "Bot zosta� usuni�ty!", 5000 ); });	
</script>
<h2><font color="red"><?php echo $this->_tpl_vars['error']; ?>
</font></h2>

<h2><?php echo $this->_tpl_vars['lang']['admin']['bot']['title']; ?>
</h2>


<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=admin&mode=bot&action=add_user" method="POST"/>
	<table class="vis">
		<tr>
			<th colspan="3"><?php echo $this->_tpl_vars['lang']['admin']['bot']['title2']; ?>
</th>
		</tr>
		<tr>
			<td><?php echo $this->_tpl_vars['lang']['admin']['bot']['name']; ?>
: </td>
			<td><input type="text" value="" name="uname"/></td>
			<td><input type="submit" value="<?php echo $this->_tpl_vars['lang']['admin']['bot']['add']; ?>
" name="sub" class="btn" class="btn btn-build"/></td>
		</tr>
	</table>
</form>

<?php if (count ( $this->_tpl_vars['BotUsers'] ) > 0): ?>
	<h3><?php echo $this->_tpl_vars['lang']['admin']['bot']['tab']['t']; ?>
</h3>
	<table class="vis">
		<tr>
			<th><?php echo $this->_tpl_vars['lang']['admin']['bot']['tab']['1']; ?>
</th>
			<th width="25"><?php echo $this->_tpl_vars['lang']['admin']['bot']['tab']['2']; ?>
</th>
		</tr>
		<?php $_from = $this->_tpl_vars['BotUsers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['user']):
?>
			<tr>
				<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=admin&mode=users&id=<?php echo $this->_tpl_vars['id']; ?>
" class="btn btn-small"><?php echo $this->_tpl_vars['user']; ?>
</a></td>
				<td>
					
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&screen=admin&mode=bot&action=del_user&id=<?php echo $this->_tpl_vars['id']; ?>
" class="btn btn-cancel evt-confirm" data-confirm-msg="Tem certeza de que deseja remover do player <?php echo $this->_tpl_vars['user']; ?>
 o bot?">Excluir</a>
					
				</td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>
	
<?php else: ?>
	<br>
	<span class="error"><?php echo $this->_tpl_vars['lang']['admin']['bot']['0']; ?>
</span>

<?php endif; ?>