<?php /* Smarty version 2.6.14, created on 2012-02-12 16:48:47
         compiled from game_ranking_con_player.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'format_number', 'game_ranking_con_player.tpl', 1, false),)), $this); ?>
<?php if (empty ( $this->_tpl_vars['error'] )): ?>	<h3>Ranking graczy na kontynencie <?php echo $this->_tpl_vars['RA_continent']; ?>
</h3>	<div>		<table id="con_player_ranking_table" class="vis" width="100%">			<tbody>				<tr>					<th width="60">Ranking</th>					<th width="160">Nazwa</th>					<th width="60">Plemiê</th>					<th width="100">Punkty</th>					<th width="60">Wioski</th>					<th width="60">Ogólnie wiosek</th>				</tr>				<?php $_from = $this->_tpl_vars['continent_rangs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['rang'] => $this->_tpl_vars['userinfo']):
?>					<tr<?php if ($this->_tpl_vars['rang'] == $this->_tpl_vars['aktu']): ?> class="lit"<?php else:  if ($this->_tpl_vars['rang'] == $this->_tpl_vars['from'] || ( $this->_tpl_vars['userinfo']['ally'] == $this->_tpl_vars['ally'] && $this->_tpl_vars['ally'] != '-1' )): ?> class="lit2"<?php endif;  endif; ?>>						<td class="lit-item">							<?php echo $this->_tpl_vars['rang']; ?>
						</td>						<td class="lit-item">							<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_player&amp;id=<?php echo $this->_tpl_vars['userinfo']['id']; ?>
">								<?php echo $this->_tpl_vars['userinfo']['username']; ?>
							</a>						</td>						<td class="lit-item">							<?php if ($this->_tpl_vars['userinfo']['ally'] != '-1'): ?>								<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=info_ally&amp;id=<?php echo $this->_tpl_vars['userinfo']['ally']; ?>
">									<?php echo $this->_tpl_vars['userinfo']['allyshort']; ?>
								</a>							<?php endif; ?>						</td>						<td class="lit-item">							<?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['points'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
						</td>						<td class="lit-item">							<?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['villages_con'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
						</td>						<td class="lit-item">							<?php echo ((is_array($_tmp=$this->_tpl_vars['userinfo']['villages'])) ? $this->_run_mod_handler('format_number', true, $_tmp) : format_number($_tmp)); ?>
						</td>					</tr>				<?php endforeach; endif; unset($_from); ?>			</tbody>		</table>		<?php if (! $this->_tpl_vars['is_search']): ?>			<table class="vis" width="100%">				<tbody>					<tr>						<?php if ($this->_tpl_vars['aktu_page_ra'] > 0): ?>							<td align="center" width="50%">								<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=con_player&con=<?php echo $this->_tpl_vars['RA_continent']; ?>
&page=<?php echo $this->_tpl_vars['aktu_page_ra']-1; ?>
">&lt;&lt;&lt; do góry</a>							</td>						<?php endif; ?>						<td align="center" width="50%">							<a href="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=con_player&con=<?php echo $this->_tpl_vars['RA_continent']; ?>
&page=<?php echo $this->_tpl_vars['aktu_page_ra']+1; ?>
">na dó³ &gt;&gt;&gt;</a>						</td>					</tr>				</tbody>			</table>		<?php endif; ?>	</div><?php endif; ?><table class="vis" width="100%">	<tbody>		<tr>			<td style="padding-right: 10px;">				<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=con_player" method="post">					Kontynent: <input name="continent" value="" size="2" type="text">					<input value="OK" type="submit">				</form>			</td>			<td style="padding-right: 10px;">				<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=con_player&con=<?php echo $this->_tpl_vars['RA_continent']; ?>
" method="post">					Ranking: <input name="from" value="" size="6" type="text">					<input value="OK" type="submit">				</form>			</td>			<td style="padding-right: 10px;">				<form action="game.php?village=<?php echo $this->_tpl_vars['village']['id']; ?>
&amp;screen=ranking&amp;mode=con_player&con=<?php echo $this->_tpl_vars['RA_continent']; ?>
" method="post">					Szukaj: <input name="search" value="" size="20" type="text">					<input value="OK" type="submit">				</form>			</td>		</tr>	</tbody></table>