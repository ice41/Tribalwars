<?php /* Smarty version 2.6.14, created on 2012-04-26 12:49:47
         compiled from game_ranking_kill_ally.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'game_ranking_kill_ally.tpl', 39, false),)), $this); ?>
<?php if (empty ( $this->_tpl_vars['error'] )): ?>
	<h3>Pokonani przeciwnicy</h3>
	
	<div>
		<table id="kill_player_ranking_table" class="vis" width="100%">
			<tbody>
				<tr>
					<?php $_from = $this->_tpl_vars['modes_types']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['type_name'] => $this->_tpl_vars['db_type']):
?>
						<?php if ($this->_tpl_vars['db_type'] == $this->_tpl_vars['type']): ?>
							<td style="text-align: center;" class="selected" width="33%">
								<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=kill_ally&amp;type=<?php echo $this->_tpl_vars['db_type']; ?>
"><?php echo $this->_tpl_vars['type_name']; ?>
</a>
							</td>
						<?php else: ?>
							<td style="text-align: center;" width="33%">
								<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=kill_ally&amp;type=<?php echo $this->_tpl_vars['db_type']; ?>
"><?php echo $this->_tpl_vars['type_name']; ?>
</a>
							</td>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
				</tr>
			</tbody>
		</table>

		<table class="vis" width="100%">
			<tbody>
				<tr>
					<th width="15%">Ranking</th>
					<th width="60%">Nazwa plemienia</th>
					<th width="25%">Pokonany</th>
				</tr>
				<?php $_from = $this->_tpl_vars['ally_rangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['allyinfo']):
?>
					<tr<?php if ($this->_tpl_vars['allyinfo']['rang'] == $this->_tpl_vars['aktu']): ?> class="lit"<?php else:  if ($this->_tpl_vars['allyinfo']['rang'] == $this->_tpl_vars['from'] || ( $this->_tpl_vars['allyinfo']['ally'] == $this->_tpl_vars['ally'] && $this->_tpl_vars['ally'] != '-1' )): ?> class="lit2"<?php endif;  endif; ?>>
						<td class="lit-item">
							<?php echo $this->_tpl_vars['allyinfo']['rang']; ?>

						</td>
						<td class="lit-item">
							<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=<?php echo $this->_tpl_vars['allyinfo']['id']; ?>
">
								<?php echo $this->_tpl_vars['allyinfo']['name']; ?>

							</a>
						<td class="lit-item"><?php echo ((is_array($_tmp=$this->_tpl_vars['allyinfo']['score'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
</td>
					</tr>
				<?php endforeach; endif; unset($_from); ?>
			</tbody>
		</table>
		
		<?php if (! $this->_tpl_vars['is_search']): ?>
			<table class="vis" width="100%">
				<tbody>
					<tr>
						<?php if ($this->_tpl_vars['aktu_page_ra'] > 0): ?>
							<td align="center" width="50%">
								<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=kill_ally&amp;type=<?php echo $this->_tpl_vars['type']; ?>
&page=<?php echo $this->_tpl_vars['aktu_page_ra']-1; ?>
">&lt;&lt;&lt; do góry</a>
							</td>
						<?php endif; ?>
						<td align="center" width="50%">
							<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=kill_ally&amp;type=<?php echo $this->_tpl_vars['type']; ?>
&page=<?php echo $this->_tpl_vars['aktu_page_ra']+1; ?>
">na dó³ &gt;&gt;&gt;</a>
						</td>
					</tr>
				</tbody>
			</table>
		<?php endif; ?>
	</div>
<?php endif; ?>	


<table class="vis" width="100%">
	<tbody>
		<tr>
			<td style="padding-right: 10px;">
				<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=kill_ally&type=<?php echo $this->_tpl_vars['type']; ?>
" method="post">
					Ranking: <input name="from" value="" size="6" type="text">
					<input value="OK" type="submit">
				</form>
			</td>
			<td style="padding-right: 10px;">
				<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=kill_ally&type=<?php echo $this->_tpl_vars['type']; ?>
" method="post">
					Szukaj: <input name="search" value="" size="20" type="text">
					<input value="OK" type="submit">
				</form>
			</td>
		</tr>
	</tbody>
</table>