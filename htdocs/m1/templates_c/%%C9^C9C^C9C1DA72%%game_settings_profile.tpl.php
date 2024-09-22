<?php /* Smarty version 2.6.14, created on 2016-12-22 21:37:14
         compiled from game_settings_profile.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'bb_format', 'game_settings_profile.tpl', 55, false),)), $this); ?>
<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;action=change_profile&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" enctype="multipart/form-data" method="post">
	<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><th colspan="2">Dados pessoais</th></tr>
		<tr>
			<td>Nascimento:</td>
            <td>
                <input name="day" type="text" size="2" maxlength="2" value="<?php echo $this->_tpl_vars['profile']['b_day']; ?>
" />
                    <select name="month">
                        <option value="1" <?php if ($this->_tpl_vars['profile']['b_month'] == 1): ?>selected<?php endif; ?>>Janeiro</option>
                        <option value="2" <?php if ($this->_tpl_vars['profile']['b_month'] == 2): ?>selected<?php endif; ?>>Fevereiro</option>
                        <option value="3" <?php if ($this->_tpl_vars['profile']['b_month'] == 3): ?>selected<?php endif; ?>>Mar&ccedil;o</option>
                        <option value="4" <?php if ($this->_tpl_vars['profile']['b_month'] == 4): ?>selected<?php endif; ?>>Abril</option>
                        <option value="5" <?php if ($this->_tpl_vars['profile']['b_month'] == 5): ?>selected<?php endif; ?>>Maio</option>
                        <option value="6" <?php if ($this->_tpl_vars['profile']['b_month'] == 6): ?>selected<?php endif; ?>>Junho</option>
                        <option value="7" <?php if ($this->_tpl_vars['profile']['b_month'] == 7): ?>selected<?php endif; ?>>Julho</option>
                        <option value="8" <?php if ($this->_tpl_vars['profile']['b_month'] == 8): ?>selected<?php endif; ?>>Agosto</option>
                        <option value="9" <?php if ($this->_tpl_vars['profile']['b_month'] == 9): ?>selected<?php endif; ?>>Setembro</option>
                        <option value="10" <?php if ($this->_tpl_vars['profile']['b_month'] == 10): ?>selected<?php endif; ?>>Outubro</option>
                        <option value="11" <?php if ($this->_tpl_vars['profile']['b_month'] == 11): ?>selected<?php endif; ?>>Novembro</option>
                        <option value="12" <?php if ($this->_tpl_vars['profile']['b_month'] == 12): ?>selected<?php endif; ?>>Dezembro</option>
                    </select>
                <input name="year" type="text" size="4" maxlength="4" value="<?php echo $this->_tpl_vars['profile']['b_year']; ?>
" />
			</td>
		</tr>
		<tr>
            <td>Sexo:</td>
			<td>
				<label><input type="radio" name="sex" value="f" <?php if ($this->_tpl_vars['profile']['sex'] == 'f'): ?>checked="checked"<?php endif; ?> /> Feminino</label>
                <label><input type="radio" name="sex" value="m" <?php if ($this->_tpl_vars['profile']['sex'] == 'm'): ?>checked="checked"<?php endif; ?> /> Masculino</label>
                <label><input type="radio" name="sex" value="x" <?php if ($this->_tpl_vars['profile']['sex'] == 'x'): ?>checked="checked"<?php endif; ?> /> n&atilde;o especificado</label>
			</td>
		</tr>
		<tr>
			<td>Localidade:</td>
			<td><input name="home" type="text" size="40" maxlength="32" value="<?php echo $this->_tpl_vars['profile']['home']; ?>
" /></td>
		</tr>
		<tr><th colspan="2">Bras&atilde;o</th></tr>
        <tr>
			<td colspan="2">
			<?php if (! empty ( $this->_tpl_vars['user']['image'] )): ?>
				<img src="graphic/player/<?php echo $this->_tpl_vars['user']['image']; ?>
" alt="Bras&atilde;o" /><br />
				<input name="del_image" type="checkbox" /> Apagar<br />
			<?php endif; ?>
				<input name="image" type="file" size="40" accept="image/*" class="clean" maxlength="1048576" /><br />
				<span style="font-size: xx-small">max. 240x180, max. 120kByte, (jpg, jpeg, png, gif)</span>
			</td>
		</tr>
		<tr><th colspan="2"><div align="right"><input type="submit" value="Ok" class="button" /></div></th></tr>
	</table><br />
</form>

<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=settings&amp;action=change_text&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
	<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
		<tr><th>Texto pessoal</th></tr>
		<tr><td><?php echo ((is_array($_tmp=$this->_tpl_vars['profile']['personal_text'])) ? $this->_run_mod_handler('bb_format', true, $_tmp) : bb_format($_tmp)); ?>
</td></tr>
		<tr id="bbcode">
			<td>
				<div style="text-align: left; overflow: visible;">
					<a id="bb_button_bold" title="Negrito" href="#" onclick="BBCodes.insert('[b]', '[/b]');return false;">
						<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll 0px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
					</a>
					<a id="bb_button_italic" title="Italico" href="#" onclick="BBCodes.insert('[i]', '[/i]');return false;">
						<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll -20px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
					</a>
					<a id="bb_button_underline" title="Sublinhado" href="#" onclick="BBCodes.insert('[u]', '[/u]');return false;">
						<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll -40px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
					</a>
					<a id="bb_button_strikethrough" title="Riscado" href="#" onclick="BBCodes.insert('[s]', '[/s]');return false;">
						<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll -60px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
					</a>
					<a id="bb_button_quote" title="Comentar" href="#" onclick="BBCodes.insert('[quote=[player]<?php echo $this->_tpl_vars['user']['username']; ?>
[/player]]', '[/quote]');return false;">
						<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll -140px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
					</a>
					<a id="bb_button_url" title="URL" href="#" onclick="BBCodes.insert('[url]', '[/url]');return false;">
						<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll -160px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
					</a>
					<a id="bb_button_spoiler" title="Spoiler" href="#" onclick="BBCodes.insert('[spoiler]', '[/spoiler]');return false;">
						<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll -260px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
					</a>
					<a id="bb_button_player" title="Jogador" href="#" onclick="BBCodes.insert('[player]', '[/player]');return false;">
						<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll -80px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
					</a>
					<a id="bb_button_tribe" title="Tribo" href="#" onclick="BBCodes.insert('[ally]', '[/ally]');return false;">
						<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll -100px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
					</a>
					<a id="bb_button_coord" title="Cordenadas" href="#" onclick="BBCodes.insert('[coord]', '[/coord]');return false;">
						<div style="display: inline-block; background: url('../graphic/bbcodes/bbcodes.png') no-repeat scroll -120px 0px transparent; padding-left: 0px; padding-bottom: 0px; margin-right: 2px; margin-bottom: 3px; width: 20px; height: 20px;">&nbsp;</div>
					</a>
					<?php echo '
					<script type="text/javascript">
						$(document).ready(function(){
							BBCodes.init({target : \'#message\'});
						});
					</script>
					'; ?>

				</div>
			</td>
		</tr>
		<tr><td><textarea id="message" name="personal_text" cols="87" rows="10"><?php echo $this->_tpl_vars['profile']['personal_text']; ?>
</textarea></td></tr>
		<tr><th><div align="right"><input type="submit" name="send" class="button" value="Ok" /></div></th></tr>
	 </table>
</form>