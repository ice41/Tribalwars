<?php /* Smarty version 2.6.14, created on 2012-12-29 06:44:21
         compiled from game_overview_villages_prod.tpl */ ?>
<table class="vis" style="width: 100%;">
  <tr>
    <td rowspan="2">
      <a href="javascript:popup_scroll('groups.php', 500, 500);">&raquo;&nbsp;Grupuri</a>
    </td>
    <td align="center" width="100%">
      <?php $_from = $this->_tpl_vars['gruppen']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
        <?php if ($this->_tpl_vars['aktu_group'] == $this->_tpl_vars['value']['id']): ?>
          <strong>&gt;<?php echo $this->_tpl_vars['value']['name']; ?>
&lt;</strong>
        <?php else: ?>
          <a href="?village=<?php echo $_GET['village']; ?>
&amp;screen=overview_villages&amp;mode=<?php echo $_GET['mode']; ?>
&amp;group=<?php echo $this->_tpl_vars['value']['id']; ?>
">[<?php echo $this->_tpl_vars['value']['name']; ?>
]</a>
        <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>
      <?php if ($this->_tpl_vars['aktu_group'] == 0): ?>
        <strong>&gt;Toate&lt;</strong>
      <?php else: ?>
        <a href="?village=<?php echo $_GET['village']; ?>
&amp;screen=overview_villages&amp;mode=<?php echo $_GET['mode']; ?>
&amp;group=0">[Toate]</a>
      <?php endif; ?>
    </td>
  </tr>
  <tr>
    <td align="center">
      <?php $_from = $this->_tpl_vars['page_numbers']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
        <?php if ($this->_tpl_vars['aktu_page_number'] == $this->_tpl_vars['value']): ?>
          <strong>&gt;<?php echo $this->_tpl_vars['value']; ?>
&lt;</strong>
        <?php else: ?>
          <a href="?village=<?php echo $_GET['village']; ?>
&amp;screen=overview_villages&amp;mode=<?php echo $_GET['mode']; ?>
&amp;page=<?php echo $this->_tpl_vars['value']; ?>
">[<?php echo $this->_tpl_vars['value']; ?>
]</a>
        <?php endif; ?>
      <?php endforeach; endif; unset($_from); ?>
      <?php if ($this->_tpl_vars['aktu_page_number'] == 0): ?>
        <strong>&gt;Toate&lt;</strong>
      <?php else: ?>
        <a href="?village=<?php echo $_GET['village']; ?>
&amp;screen=overview_villages&amp;mode=<?php echo $_GET['mode']; ?>
&amp;page=0">[Toate]</a>
      <?php endif; ?>
    </td>
  </tr>
</table>
<br />
<table class="vis">
<tr>
<th>Sate</th><th>Puncte</th><th>Materi prime</th><th>Depozit</th><th>Ferma</th>
<th>Constructii</th><th>Cercetarii</th><th>Recrutarii</th>
</tr>

<?php $_from = $this->_tpl_vars['villages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arr_id'] => $this->_tpl_vars['id']):
?>
	<tr>
		<td><?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['attacks'] != 0): ?><img src="graphic/command/attack.png"> <?php endif; ?><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&screen=overview"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['name']; ?>
 (<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['x']; ?>
|<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['y']; ?>
)</a></td>
		<td><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['points']; ?>
</td>
		<td><img src="graphic/holz.png" title="Holz" alt="" /><?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_wood'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?><span class="warn"><?php endif;  echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_wood'];  if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_wood'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?></span><?php endif; ?> <img src="graphic/lehm.png" title="Lehm" alt="" /><?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_stone'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?><span class="warn"><?php endif;  echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_stone'];  if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_stone'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?></span><?php endif; ?> <img src="graphic/eisen.png" title="Eisen" alt="" /><?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_iron'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?><span class="warn"><?php endif;  echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_iron'];  if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_iron'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']): ?></span><?php endif; ?> </td>
		<td><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_storage']; ?>
</td>
		<td><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_bh']; ?>
/<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_farm']; ?>
</td>
		<?php if (isset ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_build']['buildname'] )): ?>
			<td><b><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_build']['buildname']; ?>
</b><br><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_build']['end_time']; ?>
</td>

		<?php else: ?>
		    <td></td>
		<?php endif; ?>
		<?php if (isset ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_tec']['tecname'] )): ?>
			<td><b><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_tec']['tecname']; ?>
</b><br><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_tec']['end_time']; ?>
</td>

		<?php else: ?>
		    <td></td>
		<?php endif; ?>
		<td><?php $_from = $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['recruits']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['id_rec'] => $this->_tpl_vars['arr_rec']):
?><img src="graphic/unit/<?php echo $this->_tpl_vars['arr_rec']['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['arr_rec']['num']; ?>
 <?php echo $this->_tpl_vars['arr_rec']['unit']; ?>
" alt=""><?php endforeach; endif; unset($_from); ?></td>
	</tr>
<?php endforeach; endif; unset($_from); ?>

</table>