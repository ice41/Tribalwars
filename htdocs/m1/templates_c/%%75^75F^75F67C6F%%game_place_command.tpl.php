<?php /* Smarty version 2.6.14, created on 2016-12-22 21:35:36
         compiled from game_place_command.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'replace', 'game_place_command.tpl', 11, false),array('modifier', 'format_date', 'game_place_command.tpl', 92, false),array('modifier', 'format_time', 'game_place_command.tpl', 94, false),array('function', 'math', 'game_place_command.tpl', 22, false),)), $this); ?>
<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<?php if ($this->_tpl_vars['error'] == 'Es wurden keine Einheiten gewählt.'): ?>
		<?php $this->assign('error', 'Nenhuma unidade selecionada.'); ?>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['error'] == 'Nicht genügend Einheiten vorhanden.'): ?>
		<?php $this->assign('error', 'Tropas insuficientes.'); ?>
	<?php endif; ?>
	<?php if ($this->_tpl_vars['error'] == 'Keine Koordinaten angegeben.'): ?>
		<?php $this->assign('error', 'Nenhuma cordenada inserida.'); ?>
	<?php endif; ?>
	<div class="error"><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['error'])) ? $this->_run_mod_handler('replace', true, $_tmp, "Das Ziel steht noch unter Anfangsschutz.", "Jogador sob prote&ccedil;&atilde;o de iniciantes.") : smarty_modifier_replace($_tmp, "Das Ziel steht noch unter Anfangsschutz.", "Jogador sob prote&ccedil;&atilde;o de iniciantes.")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Du darfst erst heute um ', "A prote&ccedil;&atilde;o termina em ") : smarty_modifier_replace($_tmp, 'Du darfst erst heute um ', "A prote&ccedil;&atilde;o termina em ")))) ? $this->_run_mod_handler('replace', true, $_tmp, " Uhr angreifen.", ".") : smarty_modifier_replace($_tmp, " Uhr angreifen.", ".")); ?>
</div>
<?php endif; ?>
<h3>Enviar tropas</h3>
<form name="units" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;try=confirm" method="post">
	<table width="100%">
		<tr>
		<?php $this->assign('counter', 0); ?>
		<?php $_from = $this->_tpl_vars['group_units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group_name'] => $this->_tpl_vars['value']):
?>
			<td width="150" valign="top" style="background:none;">
				<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
			<?php $_from = $this->_tpl_vars['group_units'][$this->_tpl_vars['group_name']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname']):
?>
				<?php echo smarty_function_math(array('assign' => 'counter','equation' => "x + y",'x' => $this->_tpl_vars['counter'],'y' => 1), $this);?>

					<tr>
						<td>
							<img src="../graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" alt="<?php echo $this->_tpl_vars['cl_units']->get_name($this->_tpl_vars['dbname']); ?>
" style="vertical-align: -4px;"> 
							<input id="input_<?php echo $this->_tpl_vars['dbname']; ?>
" name="<?php echo $this->_tpl_vars['dbname']; ?>
" type="text" size="5" value="" class="unitsInput"> 
							<a href="javascript:insertUnit($('#input_<?php echo $this->_tpl_vars['dbname']; ?>
'), <?php echo $this->_tpl_vars['units'][$this->_tpl_vars['dbname']]; ?>
)">(<?php echo $this->_tpl_vars['units'][$this->_tpl_vars['dbname']]; ?>
)</a>
						</td>
					</tr>
			<?php endforeach; endif; unset($_from); ?>
				</table>
			</td>
		<?php endforeach; endif; unset($_from); ?>
		</tr>
	</table>
	<table>
		<tr><td style="background: none;"><a id="selectAllUnits" href="javascript:selectAllUnits(true);">&raquo; Todas as tropas</a></td></tr>
		<tr>
			<td style="background: none;">
				X: <input type="text" name="x" id="inputx" value="<?php echo $this->_tpl_vars['values']['x']; ?>
" size="5" maxlength="3" onkeyup="xProcess('inputx', 'inputy')">
				Y: <input type="text" name="y" id="inputy" value="<?php echo $this->_tpl_vars['values']['y']; ?>
" size="5" maxlength="3">
			</td>
			<?php if ($this->_tpl_vars['user']['villages'] > 1): ?>
			<td>
<?php 
	$userid = $this->_tpl_vars['user']['id'];
	$villid = $this->_tpl_vars['village']['id'];
	$villages = mysql_query("SELECT * FROM `villages` WHERE `userid` = '$userid' ORDER BY `name` ASC");
	$rows = mysql_num_rows($villages);
	if($rows > 0){
		while($a = mysql_fetch_assoc($villages)){
			if($a['id'] != $villid){
				$id[] = $a['id'];
				$x[] = $a['x'];
				$y[] = $a['y'];
				$name[] = $a['name'];
				$continent[] = $a['continent'];
			}
		}
 ?>
			<select name="target" size="1" onchange="insertCoord(document.forms[0], this)" style="text-align:center;">
			    <option disabled="disabled" selected="selected">-> Suas aldeias <-</option>
			  <?php  foreach($id as $key => $value){
			    echo '<option value="'.$x[$key].'|'.$y[$key].'">'.entparse($name[$key]).' ('.$x[$key].'|'.$y[$key].') K'.$continent[$key].'</option>';
			   }  ?>
			 </select>
<?php 
	}
 ?>
			</td>
			<?php endif; ?>
			<td rowspan="2"><input class="button red" name="attack" type="submit" value="Atacar" /></td>
			<td rowspan="2"><input class="button green" name="support" type="submit" value="Apoiar" /></td>
		</tr>
	</table>
</form>
<?php if (count ( $this->_tpl_vars['my_movements'] ) > 0): ?>
<h3>Seus movimentos</h3>
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th>Comando</th>
		<th>Chegada</th>
		<th>Chegada em</th>
	</tr>
	<?php $_from = $this->_tpl_vars['my_movements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
?>
	<tr>
		<td>
			<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_command&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;type=own">
				<img src="../graphic/command/<?php echo $this->_tpl_vars['array']['type']; ?>
.png"> <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['array']['message'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'Angriff auf', "Ataque &agrave;") : smarty_modifier_replace($_tmp, 'Angriff auf', "Ataque &agrave;")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Rückkehr von', 'Retorno de') : smarty_modifier_replace($_tmp, 'Rückkehr von', 'Retorno de')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Rückzug von', 'Retirada de') : smarty_modifier_replace($_tmp, 'Rückzug von', 'Retirada de')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Unterstützung für', "Apoio &agrave;") : smarty_modifier_replace($_tmp, 'Unterstützung für', "Apoio &agrave;")); ?>

			</a>
		</td>
		<td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['array']['end_time'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, 'heute um', "hoje &agrave;s") : smarty_modifier_replace($_tmp, 'heute um', "hoje &agrave;s")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Uhr', "") : smarty_modifier_replace($_tmp, 'Uhr', "")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'am', 'em') : smarty_modifier_replace($_tmp, 'am', 'em')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'um', "&agrave;s") : smarty_modifier_replace($_tmp, 'um', "&agrave;s")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'morgen', "amanh&atilde;") : smarty_modifier_replace($_tmp, 'morgen', "amanh&atilde;")); ?>
</td>
		<?php if ($this->_tpl_vars['array']['arrival_in'] < 0): ?>
		<td><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in']+1)) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
		<?php else: ?>
		<td><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in']+1)) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
		<?php endif; ?>
		<?php if ($this->_tpl_vars['array']['can_cancel']): ?>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;action=cancel&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">Cancelar</a></td>
		<?php endif; ?>
	</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
<?php endif; ?>


<?php if (count ( $this->_tpl_vars['other_movements'] ) > 0): ?>
<h3>Tropas em chegada</h3>
<table class="vis" width="100%" style="border-spacing: 1px; background-color: #FEE47D; border:1px solid #fee47d;-moz-border-radius:5px 5px 5px 5px;-webkit-border-top-left-radius:5px;-webkit-border-top-right-radius:5px;-webkit-border-bottom-left-radius:5px;-webkit-border-bottom-right-radius:5px;">
	<tr>
		<th>Comando</th>
		<th>Chegada</th>
		<th>Chegada em</th>
	</tr>
	<?php $_from = $this->_tpl_vars['other_movements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
?>
	    <tr>
	        <td>
	            <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_command&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;type=other">
	            <img src="../graphic/command/<?php echo $this->_tpl_vars['array']['type']; ?>
.png"> <?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['array']['message'])) ? $this->_run_mod_handler('replace', true, $_tmp, 'Angriff', 'Ataque') : smarty_modifier_replace($_tmp, 'Angriff', 'Ataque')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'von', 'de') : smarty_modifier_replace($_tmp, 'von', 'de')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Unterstützung', 'Apoio') : smarty_modifier_replace($_tmp, 'Unterstützung', 'Apoio')); ?>

	            </a>
	        </td>
	        <td><?php echo ((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['array']['end_time'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)))) ? $this->_run_mod_handler('replace', true, $_tmp, 'heute um', "hoje &agrave;s") : smarty_modifier_replace($_tmp, 'heute um', "hoje &agrave;s")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'Uhr', "") : smarty_modifier_replace($_tmp, 'Uhr', "")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'am', 'em') : smarty_modifier_replace($_tmp, 'am', 'em')))) ? $this->_run_mod_handler('replace', true, $_tmp, 'um', "&agrave;s") : smarty_modifier_replace($_tmp, 'um', "&agrave;s")))) ? $this->_run_mod_handler('replace', true, $_tmp, 'morgen', "amanh&atilde;") : smarty_modifier_replace($_tmp, 'morgen', "amanh&atilde;")); ?>
</td>
	        <?php if ($this->_tpl_vars['array']['arrival_in'] < 0): ?>
	        	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in']+1)) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
	        <?php else: ?>
	        	<td><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in']+1)) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
	        <?php endif; ?>
	    </tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
<?php endif; ?>