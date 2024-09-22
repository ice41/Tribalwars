<?php /* Smarty version 2.6.14, created on 2012-04-29 13:03:32
         compiled from game_market_other_offer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'game_market_other_offer.tpl', 6, false),array('modifier', 'format_number', 'game_market_other_offer.tpl', 55, false),)), $this); ?>
<?php if (! empty ( $this->_tpl_vars['error'] )): ?>
	<b><div style="color:red;"><?php echo $this->_tpl_vars['error']; ?>
</div></b><br />
<?php endif; ?>

<table class="vis">
<tr><th>Kupcy: <?php echo $this->_tpl_vars['inside_dealers']; ?>
/<?php echo $this->_tpl_vars['max_dealers']; ?>
</th><th>Maksymalna pojemnoœæ transportu: <?php echo smarty_function_math(array('equation' => "x * 1000",'x' => $this->_tpl_vars['inside_dealers']), $this);?>
</th></tr>
</table>

<h3>Szukaj ofery</h3>

<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=market&amp;mode=other_offer&amp;action=search&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
<table class="vis">
<tr>
	<td>Oferujê:</td><td>
		<select name="res_sell">
		<option value="all" <?php if ($this->_tpl_vars['market']['market_sell'] == 'all'): ?>selected="selected"<?php endif; ?>>Wszystko</option>
		<option value="wood" <?php if ($this->_tpl_vars['market']['market_sell'] == 'wood'): ?>selected="selected"<?php endif; ?>>Drewno</option>
		<option value="stone" <?php if ($this->_tpl_vars['market']['market_sell'] == 'stone'): ?>selected="selected"<?php endif; ?>>Glina</option>
		<option value="iron" <?php if ($this->_tpl_vars['market']['market_sell'] == 'iron'): ?>selected="selected"<?php endif; ?>>Ruda</option>
		</select>
	</td><td width="10"></td>
	<td></td><td></td>

	<td rowspan="3"><input type="submit" value="Szukaæ" /></td>
</tr>

<tr>
	<td>Potrzebujê:</td><td>
		<select name="res_buy">
		<option value="all" <?php if ($this->_tpl_vars['market']['market_buy'] == 'all'): ?>selected="selected"<?php endif; ?>>Wszystko</option>
		<option value="wood" <?php if ($this->_tpl_vars['market']['market_buy'] == 'wood'): ?>selected="selected"<?php endif; ?>>Drewno</option>
		<option value="stone" <?php if ($this->_tpl_vars['market']['market_buy'] == 'stone'): ?>selected="selected"<?php endif; ?>>Glina</option>
		<option value="iron" <?php if ($this->_tpl_vars['market']['market_buy'] == 'iron'): ?>selected="selected"<?php endif; ?>>Ruda</option>
		</select>
	</td>
	<td></td>
	<td>Maksymalny stosunek:</td><td><input name="ratio_max" value="<?php echo $this->_tpl_vars['market']['market_ratio_max']; ?>
" type="text" size="4" /> (np: 1.8)</td>
</tr>
</table>
</form>
<?php if ($this->_tpl_vars['section_offers_exists']): ?>
	<table class="vis" width="100%">
		<tr>
			<td align="center">
				<?php echo $this->_tpl_vars['offers_section']; ?>

			</td>
		</tr>
	</table>
<?php endif; ?>
<table class="vis">
	<tr><th>Oferta</th><th>Za</th><th>Gracz</th><th>Czas dostarczenia</th><th>Stosunek</th><th>Dostêpne</th></tr>
	<?php $_from = $this->_tpl_vars['offers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id'] => $this->_tpl_vars['arr']):
?>
		<tr>
			<td>
				<?php if ($this->_tpl_vars['arr']['sell_ress'] == 'wood'): ?><img src="/ds_graphic/holz.png" title="Drewno" alt="" /><?php endif;  if ($this->_tpl_vars['arr']['sell_ress'] == 'stone'): ?><img src="/ds_graphic/lehm.png" title="Glina" alt="" /><?php endif;  if ($this->_tpl_vars['arr']['sell_ress'] == 'iron'): ?><img src="/ds_graphic/eisen.png" title="¯elazo" alt="" /><?php endif;  echo ((is_array($_tmp=$this->_tpl_vars['arr']['sell'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>

			</td>
			<td>
				<?php if ($this->_tpl_vars['arr']['buy_ress'] == 'wood'): ?><img src="/ds_graphic/holz.png" title="Drewno" alt="" /><?php endif;  if ($this->_tpl_vars['arr']['buy_ress'] == 'stone'): ?><img src="/ds_graphic/lehm.png" title="Glina" alt="" /><?php endif;  if ($this->_tpl_vars['arr']['buy_ress'] == 'iron'): ?><img src="/ds_graphic/eisen.png" title="¯elazo" alt="" /><?php endif;  echo ((is_array($_tmp=$this->_tpl_vars['arr']['buy'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>

			</td>
			<td>
				<a href="game.php?village=820&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['arr']['userid']; ?>
"><?php echo $this->_tpl_vars['arr']['username']; ?>
</a>
				<?php if ($this->_tpl_vars['arr']['userally'] != "-1"): ?>
					 [<a href="game.php?village=820&amp;screen=info_ally&amp;id=<?php echo $this->_tpl_vars['arr']['userally']; ?>
"><?php echo $this->_tpl_vars['arr']['user_allyshort']; ?>
</a>]
				<?php endif; ?>
			</td>
			<td><?php echo $this->_tpl_vars['arr']['unit_running']; ?>
</td>
			<td>
			<table width="40"><tr><td style="background-color: rgb(<?php echo $this->_tpl_vars['arr']['ratio_red']; ?>
, <?php echo $this->_tpl_vars['arr']['ratio_green']; ?>
, 100)"><?php echo $this->_tpl_vars['arr']['ratio_max']; ?>
</td></tr></table>
			</td>
				
			<td><?php echo $this->_tpl_vars['arr']['multi']; ?>
x</td>
		
			<td>
				<?php if ($this->_tpl_vars['arr']['message'] == 'nd'): ?>
					Posiadasz za ma³o kupców
				<?php elseif ($this->_tpl_vars['arr']['message'] == 'nr'): ?>
					Posiadasz za ma³o surowców
				<?php else: ?>
					<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=market&amp;mode=other_offer&amp;action=accept_multi&amp;id=<?php echo $this->_tpl_vars['id']; ?>
&amp;page=<?php echo $this->_tpl_vars['aktu_opage']; ?>
&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
						<input type="text" name="count" size="4" value="1" onclick="javascript:this.value=''" />
						<input type="submit" value="Przyj¹æ" size="5" />
					</form>						
				<?php endif; ?>
			</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>