<?php /* Smarty version 2.6.14, created on 2014-07-03 02:59:18
         compiled from game_overview_villages_combined.tpl */ ?>
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
	<th>Aldeia</th>
	<th><img src="/ds_graphic/overview/main.png" title="Edificio Principal" alt="" /></th>
	<th><img src="/ds_graphic/overview/barracks.png" title="Quartel" alt="" /></th>
	<th><img src="/ds_graphic/overview/stable.png" title="Estábulo" alt="" /></th>
	<th><img src="/ds_graphic/overview/garage.png" title="Oficina" alt="" /></th>
	<th><img src="/ds_graphic/overview/smith.png" title="Ferreiro" alt="" /></th>
	<th><img src="/ds_graphic/overview/farm.png" title="Fazenda" alt="" /></th>
	
	<?php $_from = $this->_tpl_vars['unit']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['dbname'] => $this->_tpl_vars['name']):
?>
		<th width="35"><img src="/ds_graphic/unit/<?php echo $this->_tpl_vars['dbname']; ?>
.png" title="<?php echo $this->_tpl_vars['name']; ?>
" alt="" /></th>
	<?php endforeach; endif; unset($_from); ?>
	
	<th><img src="/ds_graphic/overview/trader.png" title="Mercadores" alt="" /></th>

</tr>

<?php $_from = $this->_tpl_vars['villages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['arr_id'] => $this->_tpl_vars['arr']):
?>
	<tr <?php if ($this->_tpl_vars['village']['id'] == $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['id']): ?>class="selected"<?php else:  if (! $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['parzysta_liczba']): ?>class="row_b"<?php else: ?>class="row_a"<?php endif;  endif; ?>>
		<td><?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['attacks'] != 0): ?><img src="/ds_graphic/command/attack.png"> <?php endif;  echo $this->_tpl_vars['bonus']->get_bonus_mini_image($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['bonus']); ?>
<a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&screen=overview"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['name']; ?>
 (<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['x']; ?>
|<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['y']; ?>
) K<?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['continent']; ?>
</a></td>

		<?php if (isset ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_build']['buildname'] )): ?>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=main"><img src="/ds_graphic/overview/prod_running.png" title="" alt="" /></a></td>
		<?php else: ?>
		    <td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=main"><img src="/ds_graphic/overview/prod_avail.png" title="" alt="" /></a></td>
		<?php endif; ?>
		
		<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['barracks'] == 0): ?>
        	<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=barracks"><img src="/ds_graphic/overview/prod_impossible.png" title="" alt="" /></a></td>
		<?php elseif (! empty ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['barracks_prod'] )): ?>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=barracks"><img src="/ds_graphic/overview/prod_running.png" title="" alt="" /></a></td>
		<?php else: ?>
        	<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=barracks"><img src="/ds_graphic/overview/prod_avail.png" title="" alt="" /></a></td>
		<?php endif; ?>
		
		<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['stable'] == 0): ?>
        	<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=stable"><img src="/ds_graphic/overview/prod_impossible.png" title="" alt="" /></a></td>
		<?php elseif (! empty ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['stable_prod'] )): ?>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=stable"><img src="/ds_graphic/overview/prod_running.png" title="" alt="" /></a></td>
		<?php else: ?>
		    <td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=stable"><img src="/ds_graphic/overview/prod_avail.png" title="" alt="" /></a></td>
		<?php endif; ?>

		<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['garage'] == 0): ?>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=garage"><img src="/ds_graphic/overview/prod_impossible.png" title="" alt="" /></a></td>
		<?php elseif (! empty ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['garage_prod'] )): ?>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=garage"><img src="/ds_graphic/overview/prod_running.png" title="" alt="" /></a></td>
		<?php else: ?>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=garage"><img src="/ds_graphic/overview/prod_avail.png" title="" alt="" /></a></td>
		<?php endif; ?>
		
		<?php if ($this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['smith'] == 0): ?>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=smith"><img src="/ds_graphic/overview/prod_impossible.png" title="" alt="" /></a></td>
		<?php elseif (! empty ( $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['first_tec']['tecname'] )): ?>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=smith"><img src="/ds_graphic/overview/prod_running.png" title="" alt="" /></a></td>
		<?php else: ?>
			<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=smith"><img src="/ds_graphic/overview/prod_avail.png" title="" alt="" /></a></td>
		<?php endif; ?>

		<td><a href="game.php?village=<?php echo $this->_tpl_vars['arr_id']; ?>
&amp;screen=farm"><?php echo $this->_tpl_vars['villages'][$this->_tpl_vars['arr_id']]['wolni']; ?>
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