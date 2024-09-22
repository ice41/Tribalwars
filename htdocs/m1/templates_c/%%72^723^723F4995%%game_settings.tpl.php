<?php /* Smarty version 2.6.14, created on 2016-12-22 21:37:14
         compiled from game_settings.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'game_settings.tpl', 23, false),)), $this); ?>
<br />
	<table class="vis" width="98%" align="center" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><th>Configura&ccedil;&otilde;es</th></tr>
		<tr><td <?php if ($this->_tpl_vars['mode'] == 'profile'): ?>class="selected" <?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=profile"><?php if ($this->_tpl_vars['mode'] == 'profile'): ?>&raquo; <?php endif; ?>Perfil</a></td></tr>
		<tr><td <?php if ($this->_tpl_vars['mode'] == 'settings'): ?>class="selected" <?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=settings"><?php if ($this->_tpl_vars['mode'] == 'settings'): ?>&raquo; <?php endif; ?>Configura&ccedil;&otilde;es</a></td></tr>
		<tr><td <?php if ($this->_tpl_vars['mode'] == 'email'): ?>class="selected" <?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=email"><?php if ($this->_tpl_vars['mode'] == 'email'): ?>&raquo; <?php endif; ?>Endere&ccedil;o de e-mail</a></td></tr>
		<tr><td <?php if ($this->_tpl_vars['mode'] == 'change_passwd'): ?>class="selected" <?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=change_passwd"><?php if ($this->_tpl_vars['mode'] == 'change_passwd'): ?>&raquo; <?php endif; ?>Trocar senha</a></td></tr>
		<tr><td <?php if ($this->_tpl_vars['mode'] == 'start'): ?>class="selected" <?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=start"><?php if ($this->_tpl_vars['mode'] == 'start'): ?>&raquo; <?php endif; ?>Recome&ccedil;ar</a></td></tr>
		<tr><td <?php if ($this->_tpl_vars['mode'] == 'delete'): ?>class="selected" <?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=delete"><?php if ($this->_tpl_vars['mode'] == 'delete'): ?>&raquo; <?php endif; ?>Apagar conta</a></td></tr>
		<tr><td <?php if ($this->_tpl_vars['mode'] == 'quickbar'): ?>class="selected" <?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=quickbar"><?php if ($this->_tpl_vars['mode'] == 'quickbar'): ?>&raquo; <?php endif; ?>Editar barra de acesso r&aacute;pido</a></td></tr>
		<tr><td <?php if ($this->_tpl_vars['mode'] == 'share'): ?>class="selected" <?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=share"><?php if ($this->_tpl_vars['mode'] == 'share'): ?>&raquo; <?php endif; ?>Compartilhar conex&atilde;o &agrave; internet</a></td></tr>
		<tr><td <?php if ($this->_tpl_vars['mode'] == 'vacation'): ?>class="selected" <?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=vacation"><?php if ($this->_tpl_vars['mode'] == 'vacation'): ?>&raquo; <?php endif; ?>Modo de f&eacute;rias</a></td></tr>
		<tr><td <?php if ($this->_tpl_vars['mode'] == 'logins'): ?>class="selected" <?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=logins"><?php if ($this->_tpl_vars['mode'] == 'logins'): ?>&raquo; <?php endif; ?>Acessos</a></td></tr>
		<tr><td <?php if ($this->_tpl_vars['mode'] == 'sleep'): ?>class="selected" <?php endif; ?>><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;mode=sleep"><?php if ($this->_tpl_vars['mode'] == 'sleep'): ?>&raquo; <?php endif; ?>Modo noturno</a></td></tr>
	</table>
</td>
<td width="80%">
	<table width="100%">
		<tr>
			<td>
				<h2><?php if ($this->_tpl_vars['mode'] == 'profile'): ?>Perfil<?php elseif ($this->_tpl_vars['mode'] == 'settings'): ?>Prefer&ecirc;ncias<?php elseif ($this->_tpl_vars['mode'] == 'email'): ?>Endere&ccedil;o de e-mail<?php elseif ($this->_tpl_vars['mode'] == 'change_passwd'): ?>Trocar senha<?php elseif ($this->_tpl_vars['mode'] == 'start'): ?>Recome&ccedil;ar<?php elseif ($this->_tpl_vars['mode'] == 'delete'): ?>Apagar conta<?php elseif ($this->_tpl_vars['mode'] == 'quickbar'): ?>Editar barra de acesso r&aacute;pido<?php elseif ($this->_tpl_vars['mode'] == 'share'): ?>Compartilhar conex&atilde;o &agrave; internet<?php elseif ($this->_tpl_vars['mode'] == 'vacation'): ?>Modo de f&eacute;rias<?php elseif ($this->_tpl_vars['mode'] == 'logins'): ?>Acessos<?php elseif ($this->_tpl_vars['mode'] == 'sleep'): ?>Modo noturno<?php endif; ?></h2>
				<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
				<div class="error"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['error'])) ? $this->_run_mod_handler('replace', true, $_tmp, "Ungültiger Dateiformat. Erlaubt sind JPEG, JPG, PNG und GIF!", "O bras&atilde;o deve ser nos formatos JPEG, JPG, PNG e GIF!") : smarty_modifier_replace($_tmp, "Ungültiger Dateiformat. Erlaubt sind JPEG, JPG, PNG und GIF!", "O bras&atilde;o deve ser nos formatos JPEG, JPG, PNG e GIF!")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Ungültiger Benutzername', 'Jogador inexistente') : smarty_modifier_replace($_tmp, 'Ungültiger Benutzername', 'Jogador inexistente')))) ? $this->_run_mod_handler('replace', true, $_tmp, "Das Passwort muss mindestens 4 Zeichen lang sein!", "Sua senha deve conter no minimo 4 caracteres!") : smarty_modifier_replace($_tmp, "Das Passwort muss mindestens 4 Zeichen lang sein!", "Sua senha deve conter no minimo 4 caracteres!")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Du kannst dich nicht selbst als Urlaubsvertretung eintragen', "voc&ecirc; n&atilde;o pode ser seu pr&oacute;prio substituto.") : smarty_modifier_replace($_tmp, 'Du kannst dich nicht selbst als Urlaubsvertretung eintragen', "voc&ecirc; n&atilde;o pode ser seu pr&oacute;prio substituto.")); ?>
</div>
				<?php endif; ?>
			</td>
		</tr>
		<tr>
			<td valign="top" width="100%">
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_settings_".($this->_tpl_vars['mode']).".tpl", 'smarty_include_vars' => array('title' => 'foo')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			</td>
		</tr>
	</table>
</td>