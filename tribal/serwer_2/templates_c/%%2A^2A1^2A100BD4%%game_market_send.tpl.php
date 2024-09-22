<?php /* Smarty version 2.6.14, created on 2014-07-03 03:00:56
         compiled from game_market_send.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'game_market_send.tpl', 10, false),array('modifier', 'format_number', 'game_market_send.tpl', 48, false),)), $this); ?>
<script src="/js/popup.js" type="text/javascript"/></script>

<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<b><div style="color:red;"><?php echo $this->_tpl_vars['error']; ?>
</div></b><br />
<?php endif; ?>

<table class="vis">
	<tr>
		<th>Kupcy: <?php echo $this->_tpl_vars['inside_dealers']; ?>
/<?php echo $this->_tpl_vars['max_dealers']; ?>
</th>
		<th>Maksymalna pojemnoœæ transportu: <?php echo smarty_function_math(array('equation' => "x * 1000",'x' => $this->_tpl_vars['inside_dealers']), $this);?>
</th>
	</tr>
</table>

<form name="units" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=market&amp;try=confirm_send" method="post">
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
	<table width="300">
		<tr>
			<td valign="top">
				<table class="vis" width="200">
					<tr>
						<th>surowce</th>
					</tr>
					<tr>
						<td>
							<img src="/ds_graphic/holz.png" title="Drewno" alt="" />
							<input name="wood" type="text" value="" size="5" />
							&nbsp;<a href="javascript:insertNumber(document.forms[0].wood, <?php echo $this->_tpl_vars['max']['wood']; ?>
)">(<?php echo ((is_array($_tmp=$this->_tpl_vars['max']['wood'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
)</a>
						</td>
					</tr>
					<tr>
						<td>
							<img src="/ds_graphic/lehm.png" title="Glina" alt="" />
							<input name="stone" type="text" value="" size="5" />
							&nbsp;<a href="javascript:insertNumber(document.forms[0].stone, <?php echo $this->_tpl_vars['max']['stone']; ?>
)">(<?php echo ((is_array($_tmp=$this->_tpl_vars['max']['stone'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
)</a>
						</td>
					</tr>
					<tr>
						<td>
							<img src="/ds_graphic/eisen.png" title="¯elazo" alt="" />
							<input name="iron" type="text" value="" size="5" />
							&nbsp;<a href="javascript:insertNumber(document.forms[0].iron, <?php echo $this->_tpl_vars['max']['iron']; ?>
)">(<?php echo ((is_array($_tmp=$this->_tpl_vars['max']['iron'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
)</a>
						</td>
					</tr>
				</table>
			</td>
			<td valign="top" align="center">
				<table class="vis" width="200">
					<tr>
						<th colspan="2">Cel</th>
					</tr>
					<tr>
						<td colspan="2">
							x: <input id="x" type="text" name="x" value="<?php echo $this->_tpl_vars['coords']['x']; ?>
" size="5" />
							y: <input id="y" type="text" name="y" value="<?php echo $this->_tpl_vars['coords']['y']; ?>
" size="5" />
						</td>
					</tr>
					<tr>
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
					</tr>
				</table>
				
				<input type="submit" value="OK" style="font-size: 10pt;width:50px;" />
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


<?php if (count ( $this->_tpl_vars['own'] ) > 0): ?>
	<h3>W³asne transporty</h3>

	<table class="vis" width="700">
	<tr><th width="200">Cel</th><th width="180">Iloœæ</th><th>Kupcy</th><th width="70">Trwanie</th><th width="100">Przybycie</th><th width="70">Przybycie za</th></tr>
		<?php $_from = $this->_tpl_vars['own']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
			<tr>
			<td><?php if ($this->_tpl_vars['arr']['type'] == 'to'): ?>Transport do<?php else: ?>Powrót z<?php endif; ?> <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['arr']['villageid']; ?>
"><?php echo $this->_tpl_vars['arr']['villagename']; ?>
</a></td>
			
			<td><?php if ($this->_tpl_vars['arr']['wood'] > 0): ?><img src="/ds_graphic/holz.png" title="Drewno" alt="" /><?php echo $this->_tpl_vars['arr']['wood']; ?>
 <?php endif;  if ($this->_tpl_vars['arr']['stone'] > 0): ?><img src="/ds_graphic/lehm.png" title="Glina" alt="" /><?php echo $this->_tpl_vars['arr']['stone']; ?>
 <?php endif;  if ($this->_tpl_vars['arr']['iron'] > 0): ?><img src="/ds_graphic/eisen.png" title="¯elazo" alt="" /><?php echo $this->_tpl_vars['arr']['iron']; ?>
 <?php endif; ?></td>
		
			<td><?php echo $this->_tpl_vars['arr']['dealers']; ?>
</td>
			<td><?php echo $this->_tpl_vars['arr']['duration']; ?>
</td>
			<td><?php echo $this->_tpl_vars['arr']['arrival']; ?>
</td>
			<td><?php if ($this->_tpl_vars['arr']['arrival_in_sek'] < 0):  echo $this->_tpl_vars['arr']['arrival_in'];  else: ?><span class="timer"><?php echo $this->_tpl_vars['arr']['arrival_in']; ?>
</span><?php endif; ?></td>
			<?php if ($this->_tpl_vars['arr']['can_cancel']): ?>
				<td><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=market&amp;mode=send&amp;action=cancel&amp;id=<?php echo $this->_tpl_vars['id']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
">przerwij</a></td>
			<?php endif; ?>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>
<?php endif; ?>

<?php if (count ( $this->_tpl_vars['others'] ) > 0): ?>
	<h3>Przybywaj¹ce transporty</h3>
<?php endif;  if (count ( $this->_tpl_vars['others'] ) > 0): ?>
	<table class="vis" width="700">
	<tr><th width="160">Pochodzenie</th><th width="180">Iloœæ</th><th width="100">Przybycie</th><th width="70">Przybycie za</th></tr>
		<?php $_from = $this->_tpl_vars['others']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
			<tr>
			<td>Transport z <a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['arr']['villageid']; ?>
"><?php echo $this->_tpl_vars['arr']['villagename']; ?>
</a></td>
			<?php if ($this->_tpl_vars['arr']['see_ress']): ?>
				<td><?php if ($this->_tpl_vars['arr']['wood'] > 0): ?><img src="/ds_graphic/holz.png" title="Drewno" alt="" /><?php echo $this->_tpl_vars['arr']['wood']; ?>
 <?php endif;  if ($this->_tpl_vars['arr']['stone'] > 0): ?><img src="/ds_graphic/lehm.png" title="Glina" alt="" /><?php echo $this->_tpl_vars['arr']['stone']; ?>
 <?php endif;  if ($this->_tpl_vars['arr']['iron'] > 0): ?><img src="/ds_graphic/eisen.png" title="¯elazo" alt="" /><?php echo $this->_tpl_vars['arr']['iron']; ?>
 <?php endif; ?></td>
			<?php else: ?>
				<td></td>
			<?php endif; ?>
			<td><?php echo $this->_tpl_vars['pl']->pl_date($this->_tpl_vars['arr']['arrival']); ?>
</td>
			<td><?php if ($this->_tpl_vars['arr']['arrival_in_sek'] < 0):  echo $this->_tpl_vars['arr']['arrival_in'];  else: ?><span class="timer"><?php echo $this->_tpl_vars['arr']['arrival_in']; ?>
</span><?php endif; ?></td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>
<?php endif; ?>