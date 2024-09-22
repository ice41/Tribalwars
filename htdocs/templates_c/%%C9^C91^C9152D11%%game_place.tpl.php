<?php /* Smarty version 2.6.14, created on 2017-04-22 13:02:04
         compiled from game_place.tpl */ ?>
<table>
	<tr>
		<td>
			<img src="graphic/big_buildings/place.png" title="Pia&#355;a central&#259;" alt="" />
		</td>
		<td>
			<h2>Pia&#355;a central&#259; (Nivelul <?php echo $this->_tpl_vars['village']['place']; ?>
)</h2>
			<?php echo $this->_tpl_vars['description']; ?>

		</td>
	</tr>
</table>
<br />
<?php if ($this->_tpl_vars['show_build']): ?>

	<table width="100%"><tr><td valign="top" width="100">
	<table class="vis" width="100%">
			<?php if (command == $this->_tpl_vars['mode']): ?>
				<tr>
					<td class="selected" width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;mode=command">Comenzi</a>
					</td>
				</tr>
			<?php else: ?>
                <tr>
                    <td width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;mode=command">Comenzi</a>
					</td>
				</tr>
			<?php endif; ?>
			<?php if (units == $this->_tpl_vars['mode']): ?>
				<tr>
					<td class="selected" width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;mode=units">Trupe</a>
					</td>
				</tr>
			<?php else: ?>
                <tr>
                    <td width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;mode=units">Trupe</a>
					</td>
				</tr>
			<?php endif; ?>
			<?php if (sim == $this->_tpl_vars['mode']): ?>
				<tr>
					<td class="selected" width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;mode=sim">Simulator</a>
					</td>
				</tr>
			<?php else: ?>
                <tr>
                    <td width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=place&amp;mode=sim">Simulator</a>
					</td>
				</tr>
			<?php endif; ?>
	</table>
	
	</td><td valign="top" width="*">
		<?php if (in_array ( $this->_tpl_vars['mode'] , $this->_tpl_vars['allow_mods'] )): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_place_".($this->_tpl_vars['mode']).".tpl", 'smarty_include_vars' => array('title' => 'foo')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endif; ?>
	</td></tr></table>



<?php endif; ?>