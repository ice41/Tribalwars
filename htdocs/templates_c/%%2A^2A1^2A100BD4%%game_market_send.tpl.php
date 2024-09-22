<?php /* Smarty version 2.6.14, created on 2012-12-29 06:30:42
         compiled from game_market_send.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'game_market_send.tpl', 6, false),)), $this); ?>
﻿<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<b><div style="color:red;"><?php echo $this->_tpl_vars['error']; ?>
</div></b><br />
<?php endif; ?>

<table class="vis">
<tr><th>Negustori: <?php echo $this->_tpl_vars['inside_dealers']; ?>
/<?php echo $this->_tpl_vars['max_dealers']; ?>
</th><th>Transport maxim: <?php echo smarty_function_math(array('equation' => "x * 1000",'x' => $this->_tpl_vars['inside_dealers']), $this);?>
</th></tr>
</table>

<form name="units" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=market&amp;try=confirm_send" method="post">

<table>
<tr><td valign="top">

<table class="vis">
<tr><th>Marfuri</th></tr>
<tr><td><img src="graphic/holz.png" title="Lemn" alt="" /><input name="wood" type="text" value="" size="5" />&nbsp;<a href="javascript:insertNumber(document.forms[0].wood, <?php echo $this->_tpl_vars['max']['wood']; ?>
)">(<?php echo $this->_tpl_vars['max']['wood']; ?>
)</a></td></tr>

<tr><td><img src="graphic/lehm.png" title="Argil&#259;" alt="" /><input name="stone" type="text" value="" size="5" />&nbsp;<a href="javascript:insertNumber(document.forms[0].stone, <?php echo $this->_tpl_vars['max']['stone']; ?>
)">(<?php echo $this->_tpl_vars['max']['stone']; ?>
)</a></td></tr>

<tr><td><img src="graphic/eisen.png" title="Fier" alt="" /><input name="iron" type="text" value="" size="5" />&nbsp;<a href="javascript:insertNumber(document.forms[0].iron, <?php echo $this->_tpl_vars['max']['iron']; ?>
)">(<?php echo $this->_tpl_vars['max']['iron']; ?>
)</a></td></tr>

</table>

</td><td valign="top" align="center">

<table class="vis">
<tr><th colspan="1">&#354;int&#259;</th></tr>
<tr>
<td>
x: <input type="text" name="x" value="<?php echo $this->_tpl_vars['coords']['x']; ?>
" size="5" />
y: <input type="text" name="y" value="<?php echo $this->_tpl_vars['coords']['y']; ?>
" size="5" />
<a href="javascript:popup_scroll('targets.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
', 520, 520);">&raquo;Alege satul</a>
</td>
</tr>

</table>

<input type="submit" value="&raquo; OK «" style="font-size: 10pt;" />

</td></tr>
</table>

</form>


<?php if (count ( $this->_tpl_vars['own'] ) > 0): ?>
	<h3>Transporturile dumneavoastr&#259;</h3>

	<table class="vis">
	<tr><th width="200">&#354;int&#259;</th><th width="80">Marfurile</th><th>Negustori</th><th width="70">Durat&#259;</th><th width="100">Sosire</th><th width="70">Sosire &#238;n</th></tr>
		<?php $_from = $this->_tpl_vars['own']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
			<tr>
			<td><?php if ($this->_tpl_vars['arr']['type'] == 'to'): ?>Transport pentru<?php else: ?>&#206;ntoarcere<?php endif; ?><br /><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['arr']['villageid']; ?>
"><?php echo $this->_tpl_vars['arr']['villagename']; ?>
</a></td>
			
			<td><?php if ($this->_tpl_vars['arr']['wood'] > 0): ?><img src="graphic/holz.png" title="Lemn" alt="" /><?php echo $this->_tpl_vars['arr']['wood']; ?>
 <?php endif;  if ($this->_tpl_vars['arr']['stone'] > 0): ?><img src="graphic/lehm.png" title="Argil&#259;" alt="" /><?php echo $this->_tpl_vars['arr']['stone']; ?>
 <?php endif;  if ($this->_tpl_vars['arr']['iron'] > 0): ?><img src="graphic/eisen.png" title="Fier" alt="" /><?php echo $this->_tpl_vars['arr']['iron']; ?>
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
">Anula&#355;i</a></td>
			<?php endif; ?>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>
<?php endif; ?>


<?php if (count ( $this->_tpl_vars['others'] ) > 0): ?>
	<h3>Transporturile sunt pe punctul de a sosi</h3>
<?php endif; ?>
<?php if (count ( $this->_tpl_vars['others'] ) > 0): ?>
	<table class="vis">
	<tr><th width="160">Origine</th><?php if ($this->_tpl_vars['others_see_ress']): ?><th width="80">Marfurile</th><?php endif; ?><th width="100">Sosire</th><th width="70">Sosire &#238;n</th></tr>
		<?php $_from = $this->_tpl_vars['others']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
			<tr>
			<td>Livrarea de<br /><a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_village&amp;id=<?php echo $this->_tpl_vars['arr']['villageid']; ?>
"><?php echo $this->_tpl_vars['arr']['villagename']; ?>
</a></td>
			<?php if ($this->_tpl_vars['arr']['see_ress']): ?>
				<td><?php if ($this->_tpl_vars['arr']['wood'] > 0): ?><img src="graphic/holz.png" title="Lemn" alt="" /><?php echo $this->_tpl_vars['arr']['wood']; ?>
 <?php endif;  if ($this->_tpl_vars['arr']['stone'] > 0): ?><img src="graphic/lehm.png" title="Argil&#259;" alt="" /><?php echo $this->_tpl_vars['arr']['stone']; ?>
 <?php endif;  if ($this->_tpl_vars['arr']['iron'] > 0): ?><img src="graphic/eisen.png" title="Fier" alt="" /><?php echo $this->_tpl_vars['arr']['iron']; ?>
 <?php endif; ?></td>
			<?php else: ?>
				<?php if ($this->_tpl_vars['others_see_ress']): ?>
					<td></td>
				<?php endif; ?>
			<?php endif; ?>
			<td><?php echo $this->_tpl_vars['arr']['arrival']; ?>
</td>
			<td><?php if ($this->_tpl_vars['arr']['arrival_in_sek'] < 0):  echo $this->_tpl_vars['arr']['arrival_in'];  else: ?><span class="timer"><?php echo $this->_tpl_vars['arr']['arrival_in']; ?>
</span><?php endif; ?></td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>
<?php endif; ?>