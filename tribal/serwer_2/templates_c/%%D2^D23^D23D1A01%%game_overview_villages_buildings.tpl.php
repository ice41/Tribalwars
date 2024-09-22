<?php /* Smarty version 2.6.14, created on 2012-04-27 21:55:55
         compiled from game_overview_villages_buildings.tpl */ ?>
<?php if ($this->_tpl_vars['sekcja']): ?>
	<table class="vis" width="810">
		<tr>
			<td>
				<?php echo $this->_tpl_vars['sekcja_wiosek']; ?>
 
			</td>
		</tr>
	</table>
<?php endif; ?>

<table class="vis">
	<tr>
		<th>Wioska</th>
		<th>Punkty</th>
		<?php $_from = $this->_tpl_vars['cl_builds']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname']):
?>
			<th width="30"><img src="/ds_graphic/buildings/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
" alt="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['dbname']); ?>
"/></th>
		<?php endforeach; endif; unset($_from); ?>
		<th>Budowanie</th>
		<th>Wyburzanie</th>
	</tr>
	<?php $_from = $this->_tpl_vars['villages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arr_id'] => $this->_tpl_vars['id']):
?>
		<tr <?php if ($this->_tpl_vars['village']['id'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['id']): ?>class="selected"<?php else:  if (! $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['parzysta_liczba']): ?>class="row_b"<?php else: ?>class="row_a"<?php endif;  endif; ?>>
			<td>
				<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['attacks'] != 0): ?>
					<img src="/ds_graphic/command/attack.png"> 
				<?php endif; ?>
				<?php echo $this->_tpl_vars['bonus']->get_bonus_mini_image($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['bonus']); ?>

				<a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&screen=main">
					<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['name']; ?>
 (<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['x']; ?>
|<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['y']; ?>
) K<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['continent']; ?>

				</a>
			</td>
			<td>
				<?php echo $this->_tpl_vars['id']['points']; ?>

			</td>
			<?php $_from = $this->_tpl_vars['cl_builds']->get_array('dbname'); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname']):
?>
				<?php if ($this->_tpl_vars['id']['buildings'][$this->_tpl_vars['dbname']] > 0): ?>
					<td><?php echo $this->_tpl_vars['id']['buildings'][$this->_tpl_vars['dbname']]; ?>
</td>
				<?php else: ?>
					<td class="hidden"><?php echo $this->_tpl_vars['id']['buildings'][$this->_tpl_vars['dbname']]; ?>
</td>
				<?php endif; ?>
			<?php endforeach; endif; unset($_from); ?>
			<td>
				<?php $_from = $this->_tpl_vars['id']['build_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['building']):
?>
					<img src="/ds_graphic/buildings/<?php echo $this->_tpl_vars['building']; ?>
.png" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['building']); ?>
" alt=""/>
				<?php endforeach; endif; unset($_from); ?>
			</td>
			<td>
				<?php $_from = $this->_tpl_vars['id']['destroy_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['building']):
?>
					<img src="/ds_graphic/buildings/<?php echo $this->_tpl_vars['building']; ?>
.png" title="<?php echo $this->_tpl_vars['cl_builds']->get_name($this->_tpl_vars['building']); ?>
" alt=""/>
				<?php endforeach; endif; unset($_from); ?>
			</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>