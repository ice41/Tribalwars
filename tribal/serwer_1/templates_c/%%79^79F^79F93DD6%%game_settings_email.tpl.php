<?php /* Smarty version 2.6.14, created on 2016-08-26 20:48:31
         compiled from game_settings_email.tpl */ ?>
<h3>Zmieñ adres e-mail</h3>

<p>Tutaj mo¿esz zmieniæ swój adres e-mail, wymagany jest on w wypadku, gdy zapomniesz swoje has³o.</p>

<b>Twoje konto jest zarejestrowane na adres: </b><?php echo $this->_tpl_vars['email']; ?>
<br><br>

<form method="post" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=email&amp;action=change_email&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">
<table class="vis">
	<tbody><tr>
		<td><label for="passwd">Has³o</label></td>
		<td><input name="passwd" id="passwd" type="password"></td>
	</tr>
	<tr>
		<td><label for="new_email">Nowy adres e-mail</label></td>
		<td><input name="new_email" id="new_email" type="text"></td>
	</tr>
	<tr>
		<td></td>
		<td><input value="Zmieñ has³o" type="submit"></td>

	</tr>
</tbody></table>
</form>