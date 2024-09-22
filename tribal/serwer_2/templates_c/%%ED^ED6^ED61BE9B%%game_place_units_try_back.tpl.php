<?php /* Smarty version 2.6.14, created on 2014-07-03 02:57:01
         compiled from game_place_units_try_back.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'math', 'game_place_units_try_back.tpl', 13, false),)), $this); ?>
<?php if (empty ( $this->_tpl_vars['error'] )): ?>
	<h3>Odwo³aæ czêœæ jednostek</h3>

	<form name="units" action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;action=back&amp;unit_id=<?php echo $this->_tpl_vars['unit_id']; ?>
&amp;mode=units&amp;h=<?php echo $this->_tpl_vars['hkey']; ?>
" method="post">
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
" type="text" size="5" tabindex="<?php echo $this->_tpl_vars['counter']; ?>
" value="<?php if ($this->_tpl_vars['arr_units'][$this->_tpl_vars['dbname']] > 0):  echo $this->_tpl_vars['arr_units'][$this->_tpl_vars['dbname']];  endif; ?>" /> <a href="javascript:insertUnit(document.forms[0].<?php echo $this->_tpl_vars['dbname']; ?>
, <?php echo $this->_tpl_vars['arr_units'][$this->_tpl_vars['dbname']]; ?>
)">(<?php echo $this->_tpl_vars['arr_units'][$this->_tpl_vars['dbname']]; ?>
)</a>
									</td>
								</tr>
							<?php endforeach; endif; unset($_from); ?>
						</table>
					</td>
				<?php endforeach; endif; unset($_from); ?>
			</tr>
		</table>
	<input type="submit" value="OK" style="font-size: 10pt;" />
	</form>
<?php else: ?>
	<div style="color:red; font-size:large"><?php echo $this->_tpl_vars['error']; ?>
</div>
<?php endif; ?>