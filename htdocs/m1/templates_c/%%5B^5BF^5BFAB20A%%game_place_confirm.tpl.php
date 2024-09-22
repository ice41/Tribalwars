<?php /* Smarty version 2.6.14, created on 2016-12-22 21:35:40
         compiled from game_place_confirm.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_time', 'game_place_confirm.tpl', 53, false),array('modifier', 'format_date', 'game_place_confirm.tpl', 54, false),array('modifier', 'replace', 'game_place_confirm.tpl', 54, false),)), $this); ?>
<?php 
	include('include/config.php');

	$test = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$this->_tpl_vars['info_village']['userid']."'"));

	if($this->_tpl_vars['type'] == 'attack' && $this->_tpl_vars['user']['id'] == $this->_tpl_vars['info_village']['userid']){
		$error = parse("Voc&ecirc; n&atilde;o pode enviar ataques a suas aldeias!");
		header("Location: game.php?village=".$this->_tpl_vars['village']['id']."&screen=place&error=$error");
	}
	if($config['village_limit']){
		$unit = $this->_tpl_vars['send_units'];
		if($this->_tpl_vars['user']['villages'] >= $config['villages_limit'] && $this->_tpl_vars['type'] == 'attack' && $unit['unit_snob'] >= 1){
			$error = parse("Voc&ecirc; j&aacute; atingiu o limite de aldeias!");
			header("Location: game.php?village=".$this->_tpl_vars['village']['id']."&screen=place&error=$error");
		}
	}
	if($test['sleep'] == '1'){
		$error = parse("Este jogador est&aacute; sob prote&ccedil;&atilde;o do modo noturno.");
		header("Location: game.php?village=".$this->_tpl_vars['village']['id']."&screen=place&error=$error");
	}

	$timp = time();

	if($timp < $test['noob_protection'] && $this->_tpl_vars['type'] == 'attack'){
		$error = parse("O jogador ".$this->_tpl_vars['info_user']['username']." est&aacute; sob prote&ccedil;&atilde;o, voc&ecirc; poder&aacute; ataca-lo apartir de ".date("d.m.Y, H:i:s", $test['noob_protection']).".");
		header("Location: game.php?village=".$this->_tpl_vars['village']['id']."&screen=place&error=$error");
	}
	$internet_share = mysql_num_rows(mysql_query("SELECT * FROM `share` WHERE `id_to` = '".$test['id']."' AND `id_from` = '".$this->_tpl_vars['user']['id']."'"));
	if($internet_share == '1' && ($this->_tpl_vars['type'] == 'support')){
		$error = parse("N&atilde;o &eacute; permitido este tipo de comando entre jogadores que partilham a mesma conex&atilde;o!");
		header("Location: game.php?village=".$this->_tpl_vars['village']['id']."&screen=place&error=$error");
	}
	if(!$config['send_support'] && $this->_tpl_vars['info_village']['userid'] != $this->_tpl_vars['user']['id'] && $this->_tpl_vars['type'] == 'support'){
		$error = parse("Voc&ecirc; s&oacute; pode enviar apoios entre suas pr&oacute;prias aldeias!");
		header("Location: game.php?village=".$this->_tpl_vars['village']['id']."&screen=place&error=$error");
	}
	if(empty($error)){
 ?>
<?php if ($this->_tpl_vars['type'] == 'attack'): ?>
	<h2>Ataque</h2>
<?php else: ?>
	<h2>Apoio</h2>
<?php endif; ?>

	<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;action=command&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post" onSubmit="this.submit.disabled=true;">
		<input type="hidden" name="<?php echo $this->_tpl_vars['type']; ?>
" value="true">
		<input type="hidden" name="x" value="<?php echo $this->_tpl_vars['values']['x']; ?>
">
		<input type="hidden" name="y" value="<?php echo $this->_tpl_vars['values']['y']; ?>
">
		<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-left:5px;">
			<tr><th colspan="2">Comando</th></tr>
			<tr><td>Destino:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['info_village']['id']; ?>
"><?php echo $this->_tpl_vars['info_village']['name']; ?>
 (<?php echo $this->_tpl_vars['values']['x']; ?>
|<?php echo $this->_tpl_vars['values']['y']; ?>
) K<?php echo $this->_tpl_vars['info_village']['continent']; ?>
</a></td></tr>
			<tr><td>Jogador:</td><td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['info_village']['userid']; ?>
"><?php echo $this->_tpl_vars['info_user']['username']; ?>
</a></td></tr>
			<tr><td>Dura&ccedil;&atilde;o:</td><td><?php echo ((is_array($_tmp=$this->_tpl_vars['unit_runtime']+1)) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td></tr>
			<tr><td>Chegada:</td><td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['arrival'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, 'heute um', "hoje &agrave;s") : smarty_modifier_replace($_tmp, 'heute um', "hoje &agrave;s")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Uhr', "") : smarty_modifier_replace($_tmp, 'Uhr', "")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'am', 'em') : smarty_modifier_replace($_tmp, 'am', 'em')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'um', "&agrave;s") : smarty_modifier_replace($_tmp, 'um', "&agrave;s")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'morgen', "amanh&atilde;") : smarty_modifier_replace($_tmp, 'morgen', "amanh&atilde;")); ?>
</td></tr>
		</table><br />
		<table class="vis" width="50%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-left:5px;">
			<tr>
		    <?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
				<th width="50"><div align="center"><img src="../graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" /></div></th>
			<?php endforeach; endif; unset($_from); ?>
			</tr>
			<tr>
			<?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
				<?php if ($this->_tpl_vars['send_units'][$this->_tpl_vars['dbname']] > 0): ?>
			    <td align="center"><?php echo $this->_tpl_vars['send_units'][$this->_tpl_vars['dbname']]; ?>
</td>
				<?php else: ?>
				<td class="hidden" align="center">0</td>
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
			</tr>
		</table><br />
	    <?php $_from = $this->_tpl_vars['cl_units']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['name'] => $this->_tpl_vars['dbname']):
?>
    	    <input type="hidden" name="<?php echo $this->_tpl_vars['dbname']; ?>
" value="<?php echo $this->_tpl_vars['send_units'][$this->_tpl_vars['dbname']]; ?>
">
		<?php endforeach; endif; unset($_from); ?>
		<?php if ($this->_tpl_vars['send_units']['unit_catapult'] > 0 && $this->_tpl_vars['type'] != 'support'): ?>
		<table class="vis" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px; margin-left:5px;">
			<tr>
				<th>Alvo da catapulta:</th>
	            <td>
                    <select name="building" size="1">
                        <?php $_from = $this->_tpl_vars['cl_builds']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['dbname']):
?>
                            <?php if (! in_array ( 'catapult_protection' , $this->_tpl_vars['cl_builds']->get_specials($this->_tpl_vars['dbname']) )): ?>
                        		<option label="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" value="<?php echo $this->_tpl_vars['dbname']; ?>
"><?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
</option>
				<?php endif; ?>
			   <?php endforeach; endif; unset($_from); ?>
                    </select>
		    </td>
	        </tr>
	    </table><br />
		<?php endif; ?>
		<input name="submit" type="submit" onload="this.disabled=false;" value="Confirmar" class="button">
</form>
<?php }else{ ?> <h3 class="error">Foi encontrado um possivel erro, favor entrar em contato com o administrador do servidor!</h3><?php } ?>