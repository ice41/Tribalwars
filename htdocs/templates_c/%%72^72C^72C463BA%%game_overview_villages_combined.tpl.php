<?php /* Smarty version 2.6.14, created on 2012-12-29 11:54:00
         compiled from game_overview_villages_combined.tpl */ ?>
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
        <strong>&gt;Atac&lt;</strong>
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
	<th>Sate</th>
	<th><img src="graphic/overview/main.png" title="Cladirea principala" alt="" /></th>
	<th><img src="graphic/overview/barracks.png" title="Cazarma" alt="" /></th>
	<th><img src="graphic/overview/stable.png" title="Grajd" alt="" /></th>
	<th><img src="graphic/overview/garage.png" title="Atelier" alt="" /></th>
	<th><img src="graphic/overview/smith.png" title="Fierarie" alt="" /></th>
	<th><img src="graphic/overview/farm.png" title="Ferma" alt="" /></th>
	
	<?php $_from = $this->_tpl_vars['unit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['name']):
?>
		<th width="35"><img src="graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" /></th>
	<?php endforeach; endif; unset($_from); ?>
	
	<th><img src="graphic/overview/trader.png" title="Targ" alt="" /></th>

</tr>

<?php $_from = $this->_tpl_vars['villages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arr_id'] => $this->_tpl_vars['arr']):
?>
	<tr>
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&screen=overview"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['name']; ?>
 (<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['x']; ?>
|<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['y']; ?>
)</a></td>

		<?php if (isset ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_build']['buildname'] )): ?>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=main"><img src="graphic/overview/prod_running.png" title="<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_build']['buildname']; ?>
: <?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_build']['end_time']; ?>
" alt="" /></a></td>
		<?php else: ?>
		    <td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=main"><img src="graphic/overview/prod_avail.png" title="Keine Produktion" alt="" /></a></td>
		<?php endif; ?>
		
		<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['barracks'] == 0): ?>
        	<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=barracks"><img src="graphic/overview/prod_impossible.png" title="Produktion nicht möglich" alt="" /></a></td>
		<?php elseif (! empty ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['barracks_prod']['unit'] )): ?>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=barracks"><img src="graphic/overview/prod_running.png" title="<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['barracks_prod']['unit']; ?>
: <?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['barracks_prod']['time']; ?>
" alt="" /></a></td>
		<?php else: ?>
        	<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=barracks"><img src="graphic/overview/prod_avail.png" title="Keine Rekrutierung" alt="" /></a></td>
		<?php endif; ?>
		
		<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['stable'] == 0): ?>
        	<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=stable"><img src="graphic/overview/prod_impossible.png" title="Produktion nicht möglich" alt="" /></a></td>
		<?php elseif (! empty ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['stable_prod']['unit'] )): ?>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=stable"><img src="graphic/overview/prod_running.png" title="<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['stable_prod']['unit']; ?>
: <?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['stable_prod']['time']; ?>
" alt="" /></a></td>
		<?php else: ?>
		    <td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=stable"><img src="graphic/overview/prod_avail.png" title="Keine Produktion" alt="" /></a></td>
		<?php endif; ?>

		<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['garage'] == 0): ?>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=garage"><img src="graphic/overview/prod_impossible.png" title="Produktion nicht möglich" alt="" /></a></td>
		<?php elseif (! empty ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['garage_prod']['unit'] )): ?>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=garage"><img src="graphic/overview/prod_running.png" title="<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['garage_prod']['unit']; ?>
: <?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['garage_prod']['time']; ?>
" alt="" /></a></td>
		<?php else: ?>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=garage"><img src="graphic/overview/prod_avail.png" title="Nici o productie" alt="" /></a></td>
		<?php endif; ?>
		
		<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['smith'] == 0): ?>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=smith"><img src="graphic/dots/yellow.png" title="Schmiede nicht vorhanden" alt="" /></a></td>
		<?php elseif (! empty ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_tec']['tecname'] )): ?>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=smith"><img src="graphic/overview/prod_running.png" title="<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_tec']['tecname']; ?>
: <?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_tec']['end_time']; ?>
" alt="" /></a></td>
		<?php else: ?>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=smith"><img src="graphic/overview/prod_avail.png" title="Keine Produktion" alt="" /></a></td>
		<?php endif; ?>

		<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=farm"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['max_farm']-$this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['r_bh']; ?>
 (<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['farm']; ?>
)</a></td>
		
		<?php $_from = $this->_tpl_vars['unit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['name']):
?>
			<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']][$this->_tpl_vars['dbname']] == 0): ?>
					<td class="hidden"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']][$this->_tpl_vars['dbname']]; ?>
</td>
			<?php else: ?>
					<td><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']][$this->_tpl_vars['dbname']]; ?>
</td>
			<?php endif; ?>
		<?php endforeach; endif; unset($_from); ?>
		
		<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=market"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['dealers']['in_village']; ?>
/<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['dealers']['max_dealers']; ?>
</a></td>


	
	</tr>
<?php endforeach; endif; unset($_from); ?>

</table>

<form action="game.php?village=<?php echo $_GET['village']; ?>
&amp;screen=overview_villages&amp;mode=<?php echo $_GET['mode']; ?>
&amp;action=change_page_size" method="post">
  <table class="vis">
    <tr>
      <th colspan="2">Sate pe pagina:</th>
      <td><input name="page_size" size="5" value="<?php echo $this->_tpl_vars['villages_per_page']; ?>
" type="text" /></td>
      <td><input value="OK" type="submit" /></td>
    </tr>
  </table>
</form>