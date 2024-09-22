<?php /* Smarty version 2.6.14, created on 2012-12-29 06:30:42
         compiled from game_market.tpl */ ?>
<table>
	<tr>
		<td>
			<img src="graphic/big_buildings/market.png" title="T&#226;rg" alt="" />
		</td>
		<td>
			<h2>T&#226;rg (Nivelul <?php echo $this->_tpl_vars['village']['market']; ?>
)</h2>
			<?php echo $this->_tpl_vars['description']; ?>

		</td>
	</tr>
</table>
<br />
<?php if ($this->_tpl_vars['show_build']): ?>
	<table width="100%"><tr><td valign="top" width="100">
	<table class="vis" width="100%">
			<?php if (send == $this->_tpl_vars['mode']): ?>
				<tr>
					<td class="selected" width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=market&amp;mode=send">Trimitere de materii prime</a>
					</td>
				</tr>
			<?php else: ?>
                <tr>
                    <td width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=market&amp;mode=send">Trimitere de materii prime</a>
					</td>
				</tr>
			<?php endif; ?>
			<?php if (own_offer == $this->_tpl_vars['mode']): ?>
				<tr>
					<td class="selected" width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=market&amp;mode=own_offer">Oferte proprii</a>
					</td>
				</tr>
			<?php else: ?>
                <tr>
                    <td width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=market&amp;mode=own_offer">Oferte proprii</a>
					</td>
				</tr>
			<?php endif; ?>
			<?php if ($this->_tpl_vars['f_mode'] == $this->_tpl_vars['mode']): ?>
				<tr>
					<td class="selected" width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=market&amp;mode=other_offer">Oferte str&#259;ine</a>
					</td>
				</tr>
			<?php else: ?>
                <tr>
                    <td width="120">
						<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=market&amp;mode=other_offer">Oferte str&#259;ine</a>
					</td>
				</tr>
			<?php endif; ?>
	</table>
	
	</td><td valign="top" width="*">
		<?php if (in_array ( $this->_tpl_vars['mode'] , $this->_tpl_vars['allow_mods'] )): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "game_market_".($this->_tpl_vars['mode']).".tpl", 'smarty_include_vars' => array('title' => 'foo')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endif; ?>
	</td></tr></table>
<?php endif; ?>