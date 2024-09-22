<?php /* Wersja Smarty_class 2.6.26 Przeróbka By Bartekst221, Plik stworzony 2023-02-26 23:58:15
         Wersja PHP pliku pliki_tpl/game_place_command.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'game_place_command.tpl', 18, false),array('modifier', 'format_time', 'game_place_command.tpl', 112, false),)), $this); ?>
<script src="/js/popup.js" type="text/javascript"/></script>

<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<div style="color:red; font-size:large"><?php echo $this->_tpl_vars['error']; ?>
</div>
<?php endif; ?>

<h3>Dê a ordem</h3>

<form name="kingsage" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
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
									<a href="javascript:popup_scroll('popup_unit.php?unit=<?php echo $this->_tpl_vars['dbname']; ?>
', 520, 520)"><img src="/ds_graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['cl_units']->get_name($this->_tpl_vars['dbname']); ?>
" alt="" /></a> <input name="<?php echo $this->_tpl_vars['dbname']; ?>
" type="text" size="5" max_value="<?php echo $this->_tpl_vars['units'][$this->_tpl_vars['dbname']]; ?>
" tabindex="<?php echo $this->_tpl_vars['counter']; ?>
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
	<span style="font-weight:bold; color: #804000; cursor: pointer; class="click" onclick="selectCoiningNoneMax('Todas as tropas', 'Desmarcar tudo');return false;">
		<span id="select_all_1" class="link">
			Todas as tropas
		</span>
	</span>
	

	<div id="inline_popup" style="display: none; position: absolute; clear: both;">
		<table collspacing="0" collpadding="0" class="<?php if ($this->_tpl_vars['graphic'] == '1'): ?>content-border<?php else: ?>main<?php endif; ?>">
			<tr>
				<th>
					<div id="inline_popup_menu" style="text-align: right;">
						<a href="javascript:inlinePopupClose()">fechar</a>
					</div>
				</th>
			</tr>
			<tr>
				<td>
					<h3>Metas</h3>
					<div>

						<div id="inline_popup_content" style="height: 340px; overflow: auto;">
							<img src="/ds_graphic/throbber.gif" alt="Carregando" />
						</div>
					</div>
				</td>
			</tr>
		</table>
	</div>
	
	<table>
		<tr>
			<td rowspan="2">
				x: <input type="text" name="x" value="<?php echo $this->_tpl_vars['values']['x']; ?>
" id="x" size="5" />
				y: <input type="text" name="y" value="<?php echo $this->_tpl_vars['values']['y']; ?>
" id="y" size="5" />
			</td>
			<td valign="top">
				<a href="#" onclick="return inlinePopup(event, 'bookmark', 'ulubione.php', popup_options)">Favoritos</a><br>
				<a href="#" <?php if ($this->_tpl_vars['user']['villages'] > 1): ?>onclick="return inlinePopup(event, 'bookmark', 'villages.php', popup_options)"<?php else: ?>title="Deve possuir 2 aldeias"<?php endif; ?>>Próprias</a><br>
			</td>
			<td valign="top">
				<a href="#" onclick="return inlinePopup(event, 'bookmark', 'history.php', popup_options)">Histórico</a><br>
				<a href="#" onclick="insertNumId('x',<?php echo $this->_tpl_vars['last_command']['x']; ?>
);insertNumId('y',<?php echo $this->_tpl_vars['last_command']['y']; ?>
);">Anterior</a><br>
		<td valign="right">
				<div class="target-select clearfix vis float_left">
					<h4>Comandos:</h4>

					<table class="vis">
						<tbody><tr>
							<td>
								<input id="target_attack" tabindex="15" class="attack btn btn-attack btn-target-action" name="attack" type="submit" value="Atacar">
								<input id="target_support" tabindex="16" class="support btn btn-support btn-target-action" name="support" type="submit" value="Apoiar">
							</td>
						</tr>
					</tbody></table>
				</div>
			</td>

			</td>	
					
		</tr>
	</table>
	
</form>

<?php echo '
<script type="text/javascript">
//<![CDATA[
	setImageTitles();

	var popup_options = {};
	
	$(document).ready(function(){
		UI.Draggable($(\'#inline_popup\'));
	});
//]]>
</script>
'; ?>


<h3>Movimentos de Tropas</h3>
<?php if (count ( $this->_tpl_vars['my_movements'] ) > 0): ?>
<table class="vis">
	<tr>
		<th width="250">Próprias ordens (<?php echo $this->_tpl_vars['pl']->count($this->_tpl_vars['my_movements']); ?>
)</th>
		<th width="160">Duração</th>
		<th width="80">Chegada</th>
	</tr>
	<?php $_from = $this->_tpl_vars['my_movements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
?>
	    <tr>
	        <td>
	            <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_command&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;type=own">
	            <img src="/ds_graphic/command/<?php echo $this->_tpl_vars['array']['type']; ?>
.png"> <?php echo $this->_tpl_vars['array']['message']; ?>

	            </a>
	        </td>
	        <td><?php echo $this->_tpl_vars['array']['end_time']; ?>
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
">cancelar</a></td>
	        <?php endif; ?>
	    </tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
<br>
<?php endif; ?>


<?php if (count ( $this->_tpl_vars['other_movements'] ) > 0): ?>
<table class="vis">
	<tr>
		<th width="250">O próximo exército (<?php echo $this->_tpl_vars['pl']->count($this->_tpl_vars['other_movements']); ?>
)</th>
		<th width="160">Duração</th>
		<th width="80">Chegada</th>
	</tr>
	<?php $_from = $this->_tpl_vars['other_movements']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['array']):
?>
	    <tr>
	        <td>
	            <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_command&amp;id=<?php echo $this->_tpl_vars['array']['id']; ?>
&amp;type=other">
	            <img src="/ds_graphic/command/<?php echo $this->_tpl_vars['array']['type']; ?>
.png"> <?php echo $this->_tpl_vars['array']['message']; ?>

	            </a>
	        </td>
	        <td><?php echo $this->_tpl_vars['array']['end_time']; ?>
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