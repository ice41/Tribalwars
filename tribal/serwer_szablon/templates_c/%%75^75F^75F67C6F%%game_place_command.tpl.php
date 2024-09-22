<?php /* Smarty version 2.6.14, created on 2012-04-28 20:44:12
         compiled from game_place_command.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'game_place_command.tpl', 18, false),array('modifier', 'format_time', 'game_place_command.tpl', 112, false),)), $this); ?>
<script src="/js/popup.js" type="text/javascript"/></script>

<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<div style="color:red; font-size:large"><?php echo $this->_tpl_vars['error']; ?>
</div>
<?php endif; ?>

<h3>Daæ rozkaz</h3>

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
	<span class="click" onclick="selectCoiningNoneMax('» Wszystkie wojska', '» Odznacz wszystko');return false;">
		<span id="select_all_1" class="link">
			» Wszystkie wojska
		</span>
	</span>
	

	<div id="inline_popup" style="display: none; position: absolute; clear: both;">
		<table collspacing="0" collpadding="0" class="<?php if ($this->_tpl_vars['graphic'] == '1'): ?>content-border<?php else: ?>main<?php endif; ?>">
			<tr>
				<th>
					<div id="inline_popup_menu" style="text-align: right;">
						<a href="javascript:inlinePopupClose()">Zamkn¹æ</a>
					</div>
				</th>
			</tr>
			<tr>
				<td>
					<h3>Cele</h3>
					<div>

						<div id="inline_popup_content" style="height: 340px; overflow: auto;">
							<img src="/ds_graphic/throbber.gif" alt="£adowanie" />
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
				<a href="#" onclick="return inlinePopup(event, 'bookmark', 'ulubione.php', popup_options)">» Ulubione</a><br>
				<a href="#" <?php if ($this->_tpl_vars['user']['villages'] > 1): ?>onclick="return inlinePopup(event, 'bookmark', 'villages.php', popup_options)"<?php else: ?>title="Musisz posiadaæ 2 wioski"<?php endif; ?>>» W³asne</a><br>
			</td>
			<td valign="top">
				<a href="#" onclick="return inlinePopup(event, 'bookmark', 'history.php', popup_options)">» Historia</a><br>
				<a href="#" onclick="insertNumId('x',<?php echo $this->_tpl_vars['last_command']['x']; ?>
);insertNumId('y',<?php echo $this->_tpl_vars['last_command']['y']; ?>
);">» Poprzednia</a><br>
			</td>
			<td rowspan="2"><input class="attack" name="attack" type="submit" value="Napad" style="font-size: 10pt;" /></td>
			<td rowspan="2"><input class="support" name="support" type="submit" value="Pomoc" style="font-size: 10pt;" /></td>
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


<h3>Ruchy wojsk</h3>
<?php if (count ( $this->_tpl_vars['my_movements'] ) > 0): ?>
<table class="vis">
	<tr>
		<th width="250">W³asne rozkazy (<?php echo $this->_tpl_vars['pl']->count($this->_tpl_vars['my_movements']); ?>
)</th>
		<th width="160">Trwanie</th>
		<th width="80">Przybycie</th>
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
">anuluj</a></td>
	        <?php endif; ?>
	    </tr>
	<?php endforeach; endif; unset($_from); ?>
</table>
<br>
<?php endif; ?>


<?php if (count ( $this->_tpl_vars['other_movements'] ) > 0): ?>
<table class="vis">
	<tr>
		<th width="250">Nadchodz¹ce wojska (<?php echo $this->_tpl_vars['pl']->count($this->_tpl_vars['other_movements']); ?>
)</th>
		<th width="160">Trwanie</th>
		<th width="80">Przybycie</th>
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