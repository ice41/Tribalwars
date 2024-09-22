<?php /* Smarty version 2.6.14, created on 2017-04-22 13:02:04
         compiled from game_place_command.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'game_place_command.tpl', 28, false),array('modifier', 'format_date', 'game_place_command.tpl', 71, false),array('modifier', 'format_time', 'game_place_command.tpl', 73, false),)), $this); ?>
<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
         <?php if ($this->_tpl_vars['error'] == 'Es wurden keine Einheiten gewählt.'): ?>
            <?php $this->assign('error', 'Nu au fost alese unit&#259;&#355;i'); ?>
         <?php endif; ?>
         <?php if ($this->_tpl_vars['error'] == 'Nicht genügend Einheiten vorhanden.'): ?>
            <?php $this->assign('error', 'Nu ai destule unit&#259;&#355;i'); ?>
         <?php endif; ?>
         <?php if ($this->_tpl_vars['error'] == 'Keine Koordinaten angegeben.'): ?>
            <?php $this->assign('error', 'Nu au fost date coordonatele'); ?>
         <?php endif; ?>
		 <?php if ($this->_tpl_vars['error'] == 'Das Ziel steht noch unter Anfangsschutz. Du darfst erst heute um  Uhr angreifen.'): ?>
            <?php $this->assign('error', 'Juc&#259;torul &#238;nca mai are protec&#355;ie de &#238;ncepator'); ?>
         <?php endif; ?>
	<div style="color:red; font-size:150%"><?php echo $this->_tpl_vars['error']; ?>
</div>
<?php endif; ?>

<h3>D&#259; comand&#259;</h3>

<form name="units" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;try=confirm" method="post">
	<table>
		<tr>
			<?php $this->assign('counter', 0); ?>
			<?php $_from = $this->_tpl_vars['group_units']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['group_name'] => $this->_tpl_vars['value']):
?>
				<td width="150" valign="top">
					<table class="vis" width="100%">
						<?php $_from = $this->_tpl_vars['group_units'][$this->_tpl_vars['group_name']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname']):
?>
														<?php echo smarty_function_math(array('assign' => 'counter','equation' => "x + y",'x' => $this->_tpl_vars['counter'],'y' => 1), $this);?>

							<tr>
								<td>
									<a href="javascript:popup('popup_unit.php?unit=<?php echo $this->_tpl_vars['dbname']; ?>
', 520, 520)"><img src="graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['cl_units']->get_name($this->_tpl_vars['dbname']); ?>
" alt="" /></a> <input name="<?php echo $this->_tpl_vars['dbname']; ?>
" type="text" size="5" tabindex="<?php echo $this->_tpl_vars['counter']; ?>
" value="<?php echo $this->_tpl_vars['values'][$this->_tpl_vars['dbname']]; ?>
" /> <a href="javascript:insertUnit(document.forms[0].<?php echo $this->_tpl_vars['dbname']; ?>
, <?php echo $this->_tpl_vars['units'][$this->_tpl_vars['dbname']]; ?>
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
		<tr>
			<td rowspan="2">
				x: <input type="text" name="x" value="<?php echo $this->_tpl_vars['values']['x']; ?>
" size="5" />
				y: <input type="text" name="y" value="<?php echo $this->_tpl_vars['values']['y']; ?>
" size="5" />
			</td>
			<td valign="top"></td>
			<td valign="top"></td>
			<td rowspan="2"><input class="attack" name="attack" type="submit" value="Atac" style="font-size: 10pt;" /></td>
			<td rowspan="2"><input class="support" name="support" type="submit" value="Sprijin" style="font-size: 10pt;" /></td>
		</tr>
	</table>
</form>

<h3>Miscari de trupe</h3>
<?php if (count ( $this->_tpl_vars['my_movements'] ) > 0): ?>
<table class="vis">
	<tr>
		<th width="250">Trupele tale</th>
		<th width="160">Sosire</th>
		<th width="80">Sosire &#238n</th>
	</tr>
	<?php $_from = $this->_tpl_vars['my_movements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
?>
	    <tr>
	        <td>
	            <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_command&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;type=own">
	            <img src="graphic/command/<?php echo $this->_tpl_vars['array']['type']; ?>
.png"> <?php echo $this->_tpl_vars['array']['message']; ?>

	            </a>
	        </td>
	        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['end_time'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); ?>
</td>
	        <?php if ($this->_tpl_vars['array']['arrival_in'] < 0): ?>
	        	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
	        <?php else: ?>
	        	<td><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
	        <?php endif; ?>
	        <?php if ($this->_tpl_vars['array']['can_cancel']): ?>
	        	<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;action=cancel&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">&#238ntrerupe</a></td>
	        <?php endif; ?>
	    </tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
<?php endif; ?>



<?php if (count ( $this->_tpl_vars['other_movements'] ) > 0): ?>
<table class="vis">
	<tr>
		<th width="250">Trupe care sosesc</th>
		<th width="160">Sosire</th>
		<th width="80">Sosire &#238n</th>
	</tr>
	<?php $_from = $this->_tpl_vars['other_movements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
?>
	    <tr>
	        <td>
	            <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_command&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;type=other">
	            <img src="graphic/command/<?php echo $this->_tpl_vars['array']['type']; ?>
.png"> <?php echo $this->_tpl_vars['array']['message']; ?>

	            </a>
	        </td>
	        <td><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['end_time'])) ? $this->_run_mod_handler('format_date', true, $_tmp) : format_date($_tmp)); ?>
</td>
	        <?php if ($this->_tpl_vars['array']['arrival_in'] < 0): ?>
	        	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</td>
	        <?php else: ?>
	        	<td><span class="timer"><?php echo ((is_array($_tmp=$this->_tpl_vars['array']['arrival_in'])) ? $this->_run_mod_handler('format_time', true, $_tmp) : format_time($_tmp)); ?>
</span></td>
	        <?php endif; ?>
	    </tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
<?php endif; ?>